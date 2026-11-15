<?php
$config_path = dirname(__DIR__) . '/site.config.json';
$nav_site = json_decode((string) @file_get_contents($config_path), true);
if (!is_array($nav_site)) {
    $nav_site = [];
}
$nav_name = htmlspecialchars((string) ($nav_site['businessName'] ?? 'Soffit'), ENT_QUOTES, 'UTF-8');
$chrome_mode = isset($chrome) ? (string) $chrome : 'full';
if ($chrome_mode === 'minimal') {
    echo '<a class="soffit-pill" href="/"><svg viewBox="0 0 16 16" aria-hidden="true" focusable="false"><path d="M8 1.2 L14 14 H2 Z" fill="currentColor"/></svg>' . $nav_name . "</a>\n";
    return;
}
?>
<a class="skip" href="/#services">Skip to content</a>
<header class="site-header" id="site-header">
  <a class="brand" href="/">
    <svg viewBox="0 0 16 16" aria-hidden="true" focusable="false"><path d="M8 1.2 L14 14 H2 Z" fill="currentColor"/></svg>
    <?php echo $nav_name; ?>
  </a>
  <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">Menu</button>
  <nav class="site-nav" id="site-nav" aria-label="Primary">
    <a href="/#services">Services</a>
    <a href="/#pricing">Pricing</a>
    <a href="/#work">Work</a>
    <a href="/#process">Process</a>
    <a href="/#about">About</a>
    <a href="/#questions">FAQ</a>
    <a class="nav-quote" href="/#contact">Get a quote</a>
  </nav>
</header>
