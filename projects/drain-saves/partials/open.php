<?php
$cfg = json_decode((string) @file_get_contents(dirname(__DIR__, 3) . '/site.config.json'), true);
$origin = rtrim((string) (is_array($cfg) ? ($cfg['baseUrl'] ?? '') : ''), '/');
if (!isset($page_og_image) || $page_og_image === '') {
    $page_og_image = $origin . '/projects/drain-saves/assets/logo.png';
}
$chrome = 'minimal';
$ds_page = $ds_page ?? 'home';
$extra_head = <<<'HTML'
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;700&family=IBM+Plex+Mono:wght@400;500&display=swap">
  <link rel="stylesheet" href="/projects/drain-saves/site.css">
HTML;
$page_scripts = <<<'HTML'
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
<script src="/projects/drain-saves/site.js" defer></script>
HTML;
?>
<!DOCTYPE html>
<html lang="en">
<?php include dirname(__DIR__, 3) . '/includes/head.php'; ?>
<body class="ds">
<?php include dirname(__DIR__, 3) . '/includes/nav.php'; ?>
<main class="ds">
<?php include __DIR__ . '/nav.php'; ?>
