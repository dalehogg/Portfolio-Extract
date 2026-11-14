<?php
$chrome = 'minimal';
$page_title = 'Unique Slider | Soffit';
$page_description = 'Unique Slider: twenty-five photographs in five strips. Click a frame to widen it, or move with the arrows and the keyboard.';
$page_path = '/projects/unique-slider/';
$page_og_image = '/Links/Slider/Photos/coast-2723729_640.jpg';
$extra_head = <<<'HTML'
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&display=swap">
<link rel="stylesheet" href="/projects/unique-slider/site.css">
<style>:root{--chrome-fg:#2a1248;--chrome-bg:#fff4fb}</style>
HTML;
$page_scripts = '<script src="/projects/unique-slider/slider.js" defer></script>';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../includes/head.php'; ?>
<body class="us">
<?php require __DIR__ . '/../../includes/nav.php'; ?>

<main>
  <section class="us-stage" id="slider" aria-roledescription="carousel" aria-label="Photographs">
    <p class="us-kicker">A study in looking</p>
    <h1>Unique Slider</h1>
    <div class="us-window">
      <ul id="slideList">
        <li>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/jaguar-2894706_640.jpg" alt="Jaguar"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/grapes-2715711_640.jpg" alt="Grapes"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/coast-2723729_640.jpg" alt="Coast"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/autumn-2183489_640.jpg" alt="Autumn ridge"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/denmark-2334304_640.jpg" alt="Harbour"></button>
        </li>
        <li>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/banana-2181470_640.jpg" alt="Banana"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/trees-2920264_640.jpg" alt="Trees"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/adler-2611528_640.jpg" alt="Eagle"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/cup-2315563_640.jpg" alt="Cup"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/dandelion-2295441_640.jpg" alt="Dandelion"></button>
        </li>
        <li>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/frog-2240764_640.jpg" alt="Frog"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/money-2696234_640.jpg" alt="Money"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/monkey-2790452_640.jpg" alt="Monkey"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/fischer-2739115_640.jpg" alt="Kingfisher"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/pretzel-2759994_640.jpg" alt="Pretzel"></button>
        </li>
        <li>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/nature-2578114_640.jpg" alt="Forest"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/seascape-2444040_640.jpg" alt="Seascape"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/flash-2568381_640.jpg" alt="Lightning"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/sunset-2180346_640.jpg" alt="Sunset beach"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/highspeed-photography-2437729_640.jpg" alt="High-speed splash"></button>
        </li>
        <li>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/tiger-2320819_640.jpg" alt="Tiger"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/iceland-2700427_640.jpg" alt="Icelandic shore"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/leopard-2895448_640.jpg" alt="Leopard"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/locket-2569573_640.jpg" alt="Locket"></button>
          <button type="button" class="card one"><img src="/Links/Slider/Photos/flower-2919284_640.jpg" alt="Flower"></button>
        </li>
      </ul>
    </div>
    <div class="us-controls">
      <button type="button" id="PreviousHidden">Previous</button>
      <p id="slide-count">1 / 5</p>
      <button type="button" id="NextHidden">Next</button>
    </div>
    <p class="us-note" data-reveal>Click a photograph to widen it. Click again to set it back. The strip also moves with these buttons, the arrow keys, and a ten-second advance. These are the same pictures as the original study.</p>
  </section>
</main>

<?php require __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
