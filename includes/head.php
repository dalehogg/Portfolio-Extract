<?php
$config_path = dirname(__DIR__) . '/site.config.json';
$site = json_decode((string) @file_get_contents($config_path), true);
if (!is_array($site)) {
    $site = [];
}
$site_name = (string) ($site['businessName'] ?? 'Soffit');
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
    $og_image = str_starts_with($og_raw, 'http') ? $og_raw : $site_base . '/' . ltrim($og_raw, '/');
} else {
    $og_image = $site_base . '/Img/og.png';
}
$h = static function (string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};
$json = null;
if ($page_path === '/') {
    $json = [
        '@context' => 'https://schema.org',
        '@type' => ['ProfessionalService', 'LocalBusiness'],
        'name' => $site_name,
        'description' => $page_description,
        'url' => $canonical,
        'image' => $og_image,
        'email' => $site_email,
        'founder' => ['@type' => 'Person', 'name' => $site_founder],
        'areaServed' => ['@type' => 'Country', 'name' => 'New Zealand'],
        'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'NZ'],
    ];
} elseif (str_starts_with($page_path, '/projects/')) {
    $json = [
        '@context' => 'https://schema.org',
        '@type' => 'CreativeWork',
        'name' => $page_title,
        'description' => $page_description,
        'url' => $canonical,
        'image' => $og_image,
        'creator' => ['@type' => 'Person', 'name' => $site_founder],
        'provider' => ['@type' => 'ProfessionalService', 'name' => $site_name, 'url' => $site_base . '/'],
    ];
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $h($page_title); ?></title>
  <meta name="description" content="<?php echo $h($page_description); ?>">
  <link rel="canonical" href="<?php echo $h($canonical); ?>">
<?php if ($page_path === '/thanks.php' || $page_path === '/404.php') { echo "  <meta name=\"robots\" content=\"noindex\">\n"; } ?>
  <meta property="og:title" content="<?php echo $h($page_title); ?>">
  <meta property="og:description" content="<?php echo $h($page_description); ?>">
  <meta property="og:url" content="<?php echo $h($canonical); ?>">
  <meta property="og:image" content="<?php echo $h($og_image); ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?php echo $h($site_name); ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo $h($page_title); ?>">
  <meta name="twitter:description" content="<?php echo $h($page_description); ?>">
  <meta name="twitter:image" content="<?php echo $h($og_image); ?>">
  <link rel="icon" href="/Img/favicon.svg" type="image/svg+xml">
  <link rel="icon" href="/Img/favicon-32.png" type="image/png" sizes="32x32">
  <link rel="apple-touch-icon" href="/Img/apple-touch-icon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,460;9..144,620&family=IBM+Plex+Mono:wght@400;500&display=swap">
  <link rel="stylesheet" href="/css/tokens.css">
  <link rel="stylesheet" href="/css/services.css">
<?php
if ($json !== null) {
    echo '  <script type="application/ld+json">' . json_encode($json, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "</script>\n";
}
if (!empty($extra_head)) {
    echo $extra_head;
}
?>
</head>
