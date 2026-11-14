<?php
$ds_links = [
    'home' => ['Home', '/projects/drain-saves/'],
    'services' => ['Services', '/projects/drain-saves/services.php'],
    'about' => ['About', '/projects/drain-saves/about.php'],
    'gallery' => ['Gallery', '/projects/drain-saves/gallery.php'],
    'reviews' => ['Reviews', '/projects/drain-saves/reviews.php'],
    'contact' => ['Contact', '/projects/drain-saves/contact.php'],
];
$ds_current = $ds_page ?? '';
?>
<header class="ds-bar">
  <a class="ds-brand" href="/projects/drain-saves/">Drain Saves</a>
  <nav class="rail" aria-label="Drain Saves">
<?php foreach ($ds_links as $id => $item): ?>
    <a href="<?php echo $item[1]; ?>"<?php echo $ds_current === $id ? ' aria-current="page"' : ''; ?>><?php echo $item[0]; ?></a>
<?php endforeach; ?>
  </nav>
</header>
