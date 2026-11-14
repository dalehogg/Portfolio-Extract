<?php
$cfg = json_decode((string) @file_get_contents(dirname(__DIR__, 3) . '/site.config.json'), true);
$origin = rtrim((string) (is_array($cfg) ? ($cfg['baseUrl'] ?? '') : ''), '/');
if (!isset($page_og_image) || $page_og_image === '') {
    $page_og_image = $origin . '/projects/moonlodge/assets/hero.jpg';
}
$chrome = 'minimal';
$ml_page = $ml_page ?? 'home';
$extra_head = <<<'HTML'
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=Outfit:wght@300;400&display=swap">
  <link rel="stylesheet" href="/projects/moonlodge/site.css">
HTML;
$page_scripts = '<script src="/projects/moonlodge/site.js" defer></script>';
?>
<!DOCTYPE html>
<html lang="en">
<?php include dirname(__DIR__, 3) . '/includes/head.php'; ?>
<body class="ml">
<?php include dirname(__DIR__, 3) . '/includes/nav.php'; ?>
<main class="ml">
<?php include __DIR__ . '/bar.php'; ?>
