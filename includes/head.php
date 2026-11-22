<?php
require_once __DIR__ . '/site.php';
$config_path = dirname(__DIR__) . '/site.config.json';
$site = json_decode((string) @file_get_contents($config_path), true);
if (!is_array($site)) {
    $site = [];
}
$site_name = (string) ($site['businessName'] ?? 'Soffit Web');
$site_base = rtrim((string) ($site['baseUrl'] ?? ''), '/');
$site_email = (string) ($site['email'] ?? '');
$site_founder = (string) ($site['founderName'] ?? 'Dale Hogg');
$page_title = isset($page_title) ? (string) $page_title : $site_name;
$page_description = isset($page_description) ? (string) $page_description : '';
$page_path = isset($page_path) ? (string) $page_path : '/';
if ($page_path === '') {
    $page_path = '/';
}
$canonical = $site_base . ($page_path === '/' ? '/' : $page_path);
if (isset($page_og_image) && $page_og_image !== '') {
    $og_raw = (string) $page_og_image;
    $og_image = str_starts_with($og_raw, 'http') ? site_asset($og_raw) : $site_base . site_asset('/' . ltrim($og_raw, '/'));
} else {
    $og_image = $site_base . site_asset('/Img/og-soffit.png');
}
$og_is_default = !(isset($page_og_image) && $page_og_image !== '');
$og_alt = isset($page_og_alt) ? (string) $page_og_alt : ($og_is_default ? $site_name . ', freelance web design and development by Dale Hogg. Sites that earn their keep.' : $page_title);
$h = static function (string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};
$site_phone = (string) ($site['phone'] ?? '');
$site_phone_schema = (string) ($site['phoneSchema'] ?? $site_phone);
$site_noindex = !empty($site['noindex']);
$page_kind = isset($page_kind) ? (string) $page_kind : '';
$utility_page = in_array($page_path, ['/thanks.php', '/404.php'], true) || $page_kind === 'utility';
$org_id = $site_base . '/#business';
$graph = [];
if ($page_path === '/') {
    $hours = is_array($site['hours'] ?? null) ? $site['hours'] : [];
    $address = is_array($site['address'] ?? null) ? $site['address'] : ['addressCountry' => 'NZ'];
    $gst = !empty($site['pricesIncludeGst']);
    $offers = [];
    $lowest = null;
    foreach (($site['pricing'] ?? []) as $package) {
        $amount = (int) ($package['fromNzd'] ?? 0);
        if (($package['period'] ?? 'project') !== 'month') {
            $lowest = $lowest === null ? $amount : min($lowest, $amount);
        }
        $offer = [
            '@type' => 'Offer',
            'name' => (string) ($package['name'] ?? '') . ' (' . (string) ($package['kicker'] ?? '') . ')',
            'description' => (string) ($package['summary'] ?? ''),
            'priceSpecification' => [
                '@type' => 'PriceSpecification',
                'minPrice' => $amount,
                'priceCurrency' => 'NZD',
                'valueAddedTaxIncluded' => $gst,
            ],
        ];
        if (($package['period'] ?? '') === 'month') {
            $offer['priceSpecification']['@type'] = 'UnitPriceSpecification';
            $offer['priceSpecification']['unitText'] = 'month';
        }
        $offers[] = $offer;
    }
    $business = [
        '@type' => ['ProfessionalService', 'LocalBusiness'],
        '@id' => $org_id,
        'name' => $site_name,
        'description' => $page_description,
        'url' => $site_base . '/',
        'logo' => $site_base . '/Img/icon-512.png',
        'image' => $site_base . '/Img/og-soffit.png',
        'email' => $site_email,
        'founder' => ['@type' => 'Person', 'name' => $site_founder],
        'address' => array_merge(['@type' => 'PostalAddress'], $address),
        'areaServed' => (string) ($site['areaServed'] ?? 'Worldwide'),
        'currenciesAccepted' => 'NZD',
    ];
    if ($site_phone_schema !== '') {
        $business['telephone'] = $site_phone_schema;
    }
    if ($hours) {
        $business['openingHoursSpecification'] = [[
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => $hours['days'] ?? [],
            'opens' => (string) ($hours['opens'] ?? ''),
            'closes' => (string) ($hours['closes'] ?? ''),
        ]];
    }
    if ($lowest !== null) {
        $business['priceRange'] = 'From NZ$' . number_format($lowest) . ' per project' . ($gst ? ', GST included' : '');
        $business['makesOffer'] = $offers;
    }
    if (!empty($site['sameAs']) && is_array($site['sameAs'])) {
        $business['sameAs'] = array_values(array_filter($site['sameAs']));
    }
    $graph[] = $business;
    $graph[] = [
        '@type' => 'WebSite',
        '@id' => $site_base . '/#website',
        'name' => $site_name,
        'url' => $site_base . '/',
        'inLanguage' => 'en-NZ',
        'publisher' => ['@id' => $org_id],
    ];
    if (!empty($page_faqs) && is_array($page_faqs)) {
        $faq = ['@type' => 'FAQPage', 'mainEntity' => []];
        foreach ($page_faqs as $item) {
            $faq['mainEntity'][] = [
                '@type' => 'Question',
                'name' => (string) $item[0],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => (string) $item[1]],
            ];
        }
        $graph[] = $faq;
    }
} elseif (str_starts_with($page_path, '/projects/')) {
    $project_names = [
        'drain-saves' => 'Drain Saves',
        'cornerstone-construction' => 'Cornerstone Construction',
        'exclusive-cuts' => 'Exclusive Cuts',
        'moonlodge' => 'Moonlodge',
        'custom-paint' => 'Custom Paint',
        'job-pack-maker' => 'Job Pack Maker',
    ];
    $parts = explode('/', trim($page_path, '/'));
    $slug = $parts[1] ?? '';
    $project_name = $project_names[$slug] ?? ucwords(str_replace('-', ' ', $slug));
    $crumbs = [
        ['Home', $site_base . '/'],
        [$project_name, $site_base . '/projects/' . $slug . '/'],
    ];
    $leaf = $parts[2] ?? '';
    if ($leaf !== '' && $leaf !== 'index.php') {
        $crumbs[] = [isset($page_crumb) ? (string) $page_crumb : trim(explode('|', $page_title)[0]), $canonical];
    }
    $list = [];
    foreach ($crumbs as $i => $crumb) {
        $list[] = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $crumb[0], 'item' => $crumb[1]];
    }
    $graph[] = [
        '@type' => 'CreativeWork',
        'name' => $page_title,
        'description' => $page_description,
        'url' => $canonical,
        'image' => $og_image,
        'creator' => ['@type' => 'Person', 'name' => $site_founder],
        'provider' => ['@type' => ['ProfessionalService', 'LocalBusiness'], '@id' => $org_id, 'name' => $site_name, 'url' => $site_base . '/'],
    ];
    $graph[] = ['@type' => 'BreadcrumbList', 'itemListElement' => $list];
}
$json = $graph ? ['@context' => 'https://schema.org', '@graph' => $graph] : null;
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $h($page_title); ?></title>
  <meta name="description" content="<?php echo $h($page_description); ?>">
  <link rel="canonical" href="<?php echo $h($canonical); ?>">
<?php if ($site_noindex) { echo "  <meta name=\"robots\" content=\"noindex, nofollow\">\n"; } elseif ($utility_page) { echo "  <meta name=\"robots\" content=\"noindex\">\n"; } ?>
  <meta property="og:title" content="<?php echo $h($page_title); ?>">
  <meta property="og:description" content="<?php echo $h($page_description); ?>">
  <meta property="og:url" content="<?php echo $h($canonical); ?>">
  <meta property="og:image" content="<?php echo $h($og_image); ?>">
<?php if ($og_is_default) { echo "  <meta property=\"og:image:width\" content=\"1200\">\n  <meta property=\"og:image:height\" content=\"630\">\n"; } ?>
  <meta property="og:image:alt" content="<?php echo $h($og_alt); ?>">
  <meta property="og:locale" content="en_NZ">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?php echo $h($site_name); ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo $h($page_title); ?>">
  <meta name="twitter:description" content="<?php echo $h($page_description); ?>">
  <meta name="twitter:image" content="<?php echo $h($og_image); ?>">
  <meta name="twitter:image:alt" content="<?php echo $h($og_alt); ?>">
  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" href="/Img/favicon.svg" type="image/svg+xml">
  <link rel="icon" href="/Img/favicon-32.png" type="image/png" sizes="32x32">
  <link rel="apple-touch-icon" href="/Img/apple-touch-icon.png">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="theme-color" content="#07091a">
  <link rel="stylesheet" href="<?php echo $h(site_asset('/css/box.css')); ?>">
  <link rel="stylesheet" href="<?php echo $h(site_asset('/css/media.css')); ?>">
  <link rel="stylesheet" href="<?php echo $h(site_asset('/css/desktop-only.css')); ?>">
<?php if (!empty($desktop_only)): ?>
  <script>if(window.matchMedia&&!window.matchMedia("(any-pointer: fine)").matches){document.documentElement.classList.add("is-touch-only");}</script>
<?php endif; ?>
<?php
// $chrome = 'minimal' loads css/chrome.css only (pill + footer). Set $site_styles = true to also load the main fonts and tokens. Pages override --chrome-fg and --chrome-bg.
$chrome_mode = isset($chrome) ? (string) $chrome : 'full';
if ($chrome_mode === 'minimal' && empty($site_styles)) {
    echo '  <link rel="stylesheet" href="' . $h(site_asset('/css/chrome.css')) . "\">\n";
} else {
    echo "  <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\n";
    echo "  <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\n";
    echo "  <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,460;9..144,620&family=IBM+Plex+Mono:wght@400;500&display=swap\">\n";
    echo '  <link rel="stylesheet" href="' . $h(site_asset('/css/tokens.css')) . "\">\n";
    echo '  <link rel="stylesheet" href="' . $h(site_asset('/css/services.css')) . "\">\n";
}
?>
<?php
if ($json !== null) {
    echo '  <script type="application/ld+json">' . json_encode($json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}
if (!empty($extra_head)) {
    echo site_version_markup((string) $extra_head);
}
?>
</head>
