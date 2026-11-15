<?php
declare(strict_types=1);

function site_config(): array
{
    static $config = null;
    if ($config === null) {
        $path = dirname(__DIR__) . '/site.config.json';
        $raw = file_get_contents($path);
        $config = json_decode($raw === false ? '' : $raw, true);
        if (!is_array($config)) {
            $config = [];
        }
    }
    return $config;
}

function site_h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function site_base(): string
{
    return rtrim((string) (site_config()['baseUrl'] ?? ''), '/');
}

function site_name(): string
{
    return (string) (site_config()['businessName'] ?? 'Soffit');
}

function site_asset_version(): string
{
    $version = trim((string) (site_config()['assetVersion'] ?? ''));
    return $version !== '' ? $version : '1';
}

function site_asset(string $url): string
{
    if ($url === '' || str_starts_with($url, 'data:') || str_starts_with($url, 'mailto:') || str_starts_with($url, 'tel:')) {
        return $url;
    }
    $prefix = '';
    if (preg_match('#^(https?:)?//#i', $url) === 1) {
        $parts = parse_url($url);
        $host = (string) ($parts['host'] ?? '');
        $base_host = (string) parse_url(site_base(), PHP_URL_HOST);
        if ($host === '' || ($base_host !== '' && strcasecmp($host, $base_host) !== 0)) {
            return $url;
        }
        $scheme = (string) ($parts['scheme'] ?? 'https');
        $prefix = $scheme . '://' . $host;
        if (isset($parts['port'])) {
            $prefix .= ':' . $parts['port'];
        }
        $url = (string) ($parts['path'] ?? '/');
        if (isset($parts['query'])) {
            $url .= '?' . $parts['query'];
        }
        if (isset($parts['fragment'])) {
            $url .= '#' . $parts['fragment'];
        }
    }
    $fragment = '';
    $hash = strpos($url, '#');
    if ($hash !== false) {
        $fragment = substr($url, $hash);
        $url = substr($url, 0, $hash);
    }
    $url = preg_replace('/([?&])v=[^&]*/', '$1', $url) ?? $url;
    $url = rtrim($url, '?&');
    $join = str_contains($url, '?') ? '&' : '?';
    return $prefix . $url . $join . 'v=' . rawurlencode(site_asset_version()) . $fragment;
}

function site_version_markup(string $html): string
{
    $versioned = preg_replace_callback(
        '#\b(href|src|srcset)=([\'"])([^\'"]+)\\2#i',
        static function (array $match): string {
            $attr = $match[1];
            $quote = $match[2];
            $url = $match[3];
            if (strcasecmp($attr, 'srcset') === 0) {
                $set = preg_replace_callback(
                    '#\S+\.(?:css|js|png|jpe?g|gif|webp|avif|svg|ico)(?:\?[^\s,]*)?#i',
                    static function (array $part): string {
                        return site_asset($part[0]);
                    },
                    $url
                );
                $set = is_string($set) ? $set : $url;
                return $attr . '=' . $quote . htmlspecialchars($set, ENT_QUOTES, 'UTF-8') . $quote;
            }
            if (preg_match('#\.(?:css|js|png|jpe?g|gif|webp|avif|svg|ico)(?:$|\?)#i', $url) !== 1) {
                return $match[0];
            }
            return $attr . '=' . $quote . htmlspecialchars(site_asset($url), ENT_QUOTES, 'UTF-8') . $quote;
        },
        $html
    );
    return is_string($versioned) ? $versioned : $html;
}

if (PHP_SAPI !== 'cli' && !defined('SITE_ASSET_BUFFER')) {
    define('SITE_ASSET_BUFFER', true);
    ob_start('site_version_markup');
}

function site_canonical(string $path): string
{
    if ($path === '' || $path === '/') {
        return site_base() . '/';
    }
    return site_base() . '/' . ltrim($path, '/');
}

function site_money(int $amount): string
{
    return 'NZ$' . number_format($amount);
}

function site_head(array $page): void
{
    $title = (string) $page['title'];
    $description = (string) $page['description'];
    $path = (string) ($page['path'] ?? '/');
    $kind = (string) ($page['kind'] ?? 'page');
    $prefix = (string) ($page['prefix'] ?? '');
    $canonical = site_canonical($path);
    $image = site_base() . '/Img/og.png';
    $name = site_name();
    $founder = (string) (site_config()['founderName'] ?? 'Dale Hogg');
    $email = (string) (site_config()['email'] ?? '');
    $json = null;
    if ($kind === 'home') {
        $json = [
            '@context' => 'https://schema.org',
            '@type' => ['ProfessionalService', 'LocalBusiness'],
            'name' => $name,
            'description' => $description,
            'url' => $canonical,
            'image' => $image,
            'email' => $email,
            'founder' => ['@type' => 'Person', 'name' => $founder],
            'areaServed' => ['@type' => 'Country', 'name' => 'New Zealand'],
            'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'NZ'],
        ];
    } elseif ($kind === 'project') {
        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'CreativeWork',
            'name' => (string) ($page['work'] ?? $title),
            'description' => $description,
            'url' => $canonical,
            'image' => $image,
            'creator' => ['@type' => 'Person', 'name' => $founder],
            'provider' => ['@type' => 'ProfessionalService', 'name' => $name, 'url' => site_base() . '/'],
        ];
    }
    $styles = $page['styles'] ?? [];
    echo "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n";
    echo "  <meta charset=\"utf-8\">\n";
    echo "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n";
    echo '  <title>' . site_h($title) . "</title>\n";
    echo '  <meta name="description" content="' . site_h($description) . "\">\n";
    echo '  <link rel="canonical" href="' . site_h($canonical) . "\">\n";
    if ($kind === 'utility') {
        echo "  <meta name=\"robots\" content=\"noindex\">\n";
    }
    echo '  <meta property="og:title" content="' . site_h($title) . "\">\n";
    echo '  <meta property="og:description" content="' . site_h($description) . "\">\n";
    echo '  <meta property="og:url" content="' . site_h($canonical) . "\">\n";
    echo '  <meta property="og:image" content="' . site_h($image) . "\">\n";
    echo "  <meta property=\"og:type\" content=\"website\">\n";
    echo '  <meta property="og:site_name" content="' . site_h($name) . "\">\n";
    echo "  <meta name=\"twitter:card\" content=\"summary_large_image\">\n";
    echo '  <meta name="twitter:title" content="' . site_h($title) . "\">\n";
    echo '  <meta name="twitter:description" content="' . site_h($description) . "\">\n";
    echo '  <meta name="twitter:image" content="' . site_h($image) . "\">\n";
    echo "  <link rel=\"icon\" href=\"/Img/favicon.svg\" type=\"image/svg+xml\">\n";
    echo "  <link rel=\"icon\" href=\"/Img/favicon-32.png\" type=\"image/png\" sizes=\"32x32\">\n";
    echo "  <link rel=\"apple-touch-icon\" href=\"/Img/apple-touch-icon.png\">\n";
    if (!empty($page['fonts'])) {
        echo "  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\n";
        echo "  <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\n";
        echo "  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,460;9..144,620&family=IBM+Plex+Mono:wght@400;500&display=swap\">\n";
    }
    foreach ($styles as $href) {
        echo '  <link rel="stylesheet" href="' . site_h($prefix . $href) . "\">\n";
    }
    foreach ($page['local_styles'] ?? [] as $href) {
        echo '  <link rel="stylesheet" href="' . site_h((string) $href) . "\">\n";
    }
    if ($json !== null) {
        echo '  <script type="application/ld+json">' . json_encode($json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
    }
    echo "</head>\n";
}

function site_bar(string $home): void
{
    $name = site_name();
    echo '<header class="studio-bar">';
    echo '<a class="brand" href="' . site_h($home) . '"><svg viewBox="0 0 16 16" aria-hidden="true"><path d="M8 1.2 L14 14 H2 Z" fill="currentColor"/></svg> ' . site_h($name) . '</a>';
    echo '<nav class="studio-links" aria-label="Studio">';
    echo '<a href="' . site_h($home) . '#services">Services</a>';
    echo '<a href="' . site_h($home) . '#work">Work</a>';
    echo '<a class="studio-quote" href="' . site_h($home) . '#contact">Get a quote</a>';
    echo '</nav></header>';
}

function site_end(string $home): void
{
    echo '<footer class="studio-foot"><p>' . site_h(site_name()) . ' · by Dale Hogg</p>';
    echo '<a href="' . site_h($home) . '#contact">Start a project</a></footer>';
}

function site_pricing(): void
{
    foreach (site_config()['pricing'] ?? [] as $package) {
        $period = $package['period'] ?? 'project';
        $figure = site_money((int) $package['fromNzd']);
        $price = $period === 'month'
            ? 'From <span>' . site_h($figure) . '</span> <small>/ month</small>'
            : 'From <span>' . site_h($figure) . '</span>';
        $panel_id = 'price-panel-' . (string) $package['id'];
        $includes = '';
        foreach (array_slice($package['includes'] ?? [], 0, 3) as $item) {
            $includes .= '<li>' . site_h((string) $item) . '</li>';
        }
        $note = '<p class="price-note">' . site_h((string) $package['note']) . '</p>';
        $list = '<ul>' . $includes . '</ul>';
        $cta = '<a class="button button-primary" href="#contact" data-project-type="' . site_h((string) $package['projectType']) . '">Get a custom quote</a>';
        echo '<article class="price-card" id="price-' . site_h((string) $package['id']) . '">';
        echo '<div class="price-desk">';
        echo '<p class="kicker">' . site_h((string) $package['kicker']) . '</p>';
        echo '<h3>' . site_h((string) $package['name']) . '</h3>';
        echo '<p class="price">' . $price . '</p>';
        echo $note . $list . $cta;
        echo '</div>';
        echo '<details class="price-fold">';
        echo '<summary aria-controls="' . site_h($panel_id) . '">';
        echo '<p class="kicker">' . site_h((string) $package['kicker']) . '</p>';
        echo '<h3>' . site_h((string) $package['name']) . '</h3>';
        echo '<p class="price">' . $price . '</p>';
        echo '<span class="chev" aria-hidden="true"></span>';
        echo '</summary>';
        echo '<div class="price-panel" id="' . site_h($panel_id) . '"><div class="price-panel-in">';
        echo $note . $list . $cta;
        echo '</div></div></details></article>';
    }
}

function site_testimonial_attrs(): string
{
    if (!empty(site_config()['showTestimonials'])) {
        return 'data-show-testimonials="true"';
    }
    return 'data-show-testimonials="false" hidden';
}
