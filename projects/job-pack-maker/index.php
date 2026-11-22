<?php
$chrome = 'minimal';
$desktop_only = true;
$page_title = 'Job Pack Maker | Soffit Web';
$page_description = 'Turn planned work, reactive jobs, and bookings into an unsent email draft, with photos from Custom Paint.';
$page_path = '/projects/job-pack-maker/';
$page_og_image = '/projects/job-pack-maker/assets/app.jpg';
$extra_head = '<link rel="stylesheet" href="/projects/job-pack-maker/site.css">' . "\n"
    . '<style>:root{--chrome-fg:#f4f6f8;--chrome-bg:#0f3d66}</style>';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../includes/head.php'; ?>
<body class="jpm">
<?php require __DIR__ . '/../../includes/nav.php'; ?>
<header class="jpm-bar" data-menu>
  <a class="jpm-brand" href="/projects/job-pack-maker/">Job Pack Maker</a>
  <button class="jpm-menu" type="button" data-menu-toggle aria-expanded="false" aria-controls="jpm-nav">Menu</button>
  <nav id="jpm-nav" data-menu-panel aria-label="Job Pack Maker">
    <a href="/projects/job-pack-maker/" aria-current="page">Home</a>
    <a href="/projects/job-pack-maker/app.php">The app</a>
  </nav>
</header>
<main>
  <section class="jpm-hero" id="top">
    <div class="jpm-copy">
      <p class="jpm-kicker">Email drafts</p>
      <h1>Write the job once. Download the draft.</h1>
      <p>Planned work, reactive jobs, and bookings become one unsent email, with the photos you choose. Nothing is sent from this page.</p>
      <a class="jpm-open" href="/projects/job-pack-maker/app.php">Open the app</a>
    </div>
    <figure class="jpm-shot">
      <img src="/projects/job-pack-maker/assets/app.jpg" width="1200" height="800" alt="Job Pack Maker, the form beside a live email preview" fetchpriority="high">
    </figure>
  </section>
  <section class="jpm-steps" aria-label="What the app covers">
    <article><h2>Planned</h2><p>Notes, tasks, access, pipes, and the people who need a purchase order.</p></article>
    <article><h2>Reactive</h2><p>The same shape of note for work that cannot wait for a plan.</p></article>
    <article><h2>Bookings</h2><p>CCTV, flushing, hydro, sucker, traffic control, or a service locate.</p></article>
  </section>
</main>
<?php require __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
