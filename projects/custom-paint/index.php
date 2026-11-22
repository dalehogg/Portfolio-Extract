<?php
$chrome = 'minimal';
$desktop_only = true;
$page_title = 'Custom Paint | Photo Markup Studio | Soffit Web';
$page_description = 'Photo Markup Studio: paste a photo, mark it up with boxes, arrows, measurements and pipe slopes, then copy or download it.';
$page_path = '/projects/custom-paint/';
$page_og_image = '/Img/recreations/custom-paint/studio.jpg';
$extra_head = '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n"
    . '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n"
    . '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;700;800&display=swap">' . "\n"
    . '<link rel="stylesheet" href="/projects/custom-paint/site.css">' . "\n"
    . '<style>:root{--chrome-fg:#087cbb;--chrome-bg:#ffffff}</style>' . "\n"
    . '<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>' . "\n"
    . '<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>' . "\n"
    . '<script src="/js/gsap-scroll.js" defer></script>';
?>
<!DOCTYPE html>
<html lang="en-NZ">
<?php require __DIR__ . '/../../includes/head.php'; ?>
<body class="cp">
<?php require __DIR__ . '/../../includes/nav.php'; ?>
<main>
  <section class="cp-hero" id="top">
    <div class="cp-hero-copy" data-gsap>
      <p class="kicker">Photo Markup Studio</p>
      <h1>Mark it. Measure it. Send it.</h1>
      <p>Paste a photograph, then draw boxes, arrows, text, dimensions, and pipe slopes. The studio is the full tool, on its own page.</p>
      <a class="button button-primary" href="/projects/custom-paint/studio.php">Open the studio</a>
    </div>
    <figure class="cp-hero-shot" data-parallax="0.08">
      <img src="/Img/recreations/custom-paint/studio.jpg" alt="Photo Markup Studio, a dark drawing surface with tools along the side" width="1200" height="800">
    </figure>
  </section>
  <section class="cp-points" data-gsap>
    <article><h2>Draw</h2><p>Boxes, arrows, text, measurements, and pipe slopes on the photograph.</p></article>
    <article><h2>Keep</h2><p>Layers, history, undo, and a job stamp stay with the picture.</p></article>
    <article><h2>Send</h2><p>Copy, download, or pass the marked photo to a job pack.</p></article>
  </section>
</main>
<?php require __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
