<?php
// Shared top of every Moonlodge page. Set $ml_page, $page_title, $page_description, $page_path,
// and optionally $ml_hero (image path under img/) and $ml_solid (true when the page has no photo hero).
$ml_root = '/projects/moonlodge';
$ml_page = $ml_page ?? 'home';
$ml_solid = !empty($ml_solid);
$cfg = json_decode((string) @file_get_contents(dirname(__DIR__, 3) . '/site.config.json'), true);
$origin = rtrim((string) (is_array($cfg) ? ($cfg['baseUrl'] ?? '') : ''), '/');
if (!isset($page_og_image) || $page_og_image === '') {
    $page_og_image = $origin . $ml_root . '/img/' . ($ml_hero ?? 'homeFoldImg.jpg');
}
$chrome = 'minimal';
$extra_head = <<<'HTML'
  <link rel="preload" href="/projects/moonlodge/fonts/raleway-regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="/projects/moonlodge/fonts/raleway-semibold.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="/projects/moonlodge/site.css">
  <style>:root{--chrome-fg:#ffffff;--chrome-bg:#495159}</style>
HTML;
$page_scripts = '<script src="/projects/moonlodge/site.js" defer></script>';

$ml_links = [
    'home' => ['Home', $ml_root . '/'],
    'about' => ['About', $ml_root . '/about.php'],
    'accommodation' => ['Accommodation', $ml_root . '/accommodation.php'],
    'studio' => ['Art Studio', $ml_root . '/art-studio.php'],
    'attractions' => ['Attractions', $ml_root . '/attractions.php'],
    'questions' => ['Questions', $ml_root . '/questions.php'],
    'contact' => ['Contact', $ml_root . '/contact.php'],
];

function ml_links(array $links, string $current, string $label = ''): void
{
    foreach ($links as $id => $item) {
        $text = ($label === 'footer' && $id === 'about') ? 'About Us' : $item[0];
        $aria = $id === $current ? ' aria-current="page"' : '';
        echo '<a href="' . htmlspecialchars($item[1], ENT_QUOTES, 'UTF-8') . '"' . $aria . '>' . htmlspecialchars($text, ENT_QUOTES, 'UTF-8') . '</a>';
    }
}

/** An <img> with real width/height, an optional 800px srcset, lazy by default. */
function ml_img(string $file, string $alt, string $sizes = '100vw', string $class = '', bool $eager = false): string
{
    $dir = dirname(__DIR__) . '/img/';
    $url = '/projects/moonlodge/img/' . $file;
    $size = @getimagesize($dir . $file);
    $attrs = ' src="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"';
    $dot = strrpos($file, '.');
    $small = substr($file, 0, (int) $dot) . '-800' . substr($file, (int) $dot);
    $small_size = @getimagesize($dir . $small);
    if ($size && $small_size) {
        $attrs .= ' srcset="/projects/moonlodge/img/' . htmlspecialchars($small, ENT_QUOTES, 'UTF-8') . ' ' . $small_size[0] . 'w, '
            . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . ' ' . $size[0] . 'w" sizes="' . htmlspecialchars($sizes, ENT_QUOTES, 'UTF-8') . '"';
    }
    if ($size) {
        $attrs .= ' width="' . $size[0] . '" height="' . $size[1] . '"';
    }
    $attrs .= ' alt="' . htmlspecialchars($alt, ENT_QUOTES, 'UTF-8') . '"';
    $attrs .= $eager ? ' loading="eager" fetchpriority="high"' : ' loading="lazy"';
    $attrs .= ' decoding="async"';
    if ($class !== '') {
        $attrs .= ' class="' . htmlspecialchars($class, ENT_QUOTES, 'UTF-8') . '"';
    }
    return '<img' . $attrs . '>';
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include dirname(__DIR__, 3) . '/includes/head.php'; ?>
<body class="ml ml-<?php echo htmlspecialchars((string) $ml_page, ENT_QUOTES, 'UTF-8'); ?><?php echo $ml_solid ? ' ml-solid' : ''; ?>">
<?php include dirname(__DIR__, 3) . '/includes/nav.php'; ?>
<a class="ml-skip" href="#main">Skip to content</a>
<header class="header" data-header>
  <a class="brand" href="<?php echo $ml_root; ?>/">
    <span class="brand-name">Moonlodge</span>
    <span class="brand-sub">Accommodation &amp; Art Studio</span>
  </a>
  <nav class="topList" aria-label="Moonlodge">
    <?php ml_links($ml_links, $ml_page); ?>
  </nav>
  <button class="burgerIcon" type="button" aria-expanded="false" aria-controls="ml-menu" data-menu-open>
    <span class="burger-lines" aria-hidden="true"><i></i><i></i><i></i></span>
    <span class="sr-only">Open menu</span>
  </button>
</header>
<div class="overlayFullMenu" id="ml-menu" hidden data-menu>
  <button class="exitBurgerMenu" type="button" data-menu-close>
    <span aria-hidden="true">&times;</span>
    <span class="sr-only">Close menu</span>
  </button>
  <nav class="burgerLinks" aria-label="Moonlodge menu">
    <?php ml_links($ml_links, $ml_page); ?>
  </nav>
</div>
<main id="main">
