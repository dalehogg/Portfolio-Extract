<?php
$ml_page = 'home';
$ml_hero = 'homeFoldImg.jpg';
$page_title = 'Moonlodge | Accommodation & Art Studio in Whaingaroa / Raglan';
$page_description = 'Moonlodge, Whaingaroa Wellbeing: accommodation and an art studio at Waimaunga in Whaingaroa / Raglan, with mountain presence, wild west coast beaches and Wairenga / Bridal Veil Falls.';
$page_path = '/projects/moonlodge/';
require __DIR__ . '/partials/open.php';
?>
  <section class="fold foldImgHome parallax">
    <?php echo ml_img('homeFoldImg.jpg', 'A west coast beach at low tide below green hills near Whaingaroa / Raglan', '100vw', 'fold-img', true); ?>
    <div class="foldText">
      <h1>Moonlodge</h1>
      <p class="fold-sub">Whaingaroa Wellbeing</p>
      <a class="ml-button" href="/projects/moonlodge/about.php">View more</a>
    </div>
  </section>

  <section class="openingText openingText-home">
    <p>Our Mountain Moon lodge is a great place to really relax and make space to enjoy the spiritual side of life, by connecting to nature and inspiring your creativity.</p>
    <p>Waimaunga in Whaingaroa/Raglan boasts mountain presence, wild west coast beaches and the beauty of Wairenga/Bridal Veil falls.</p>
  </section>

  <section class="bigHomeButtons" aria-label="Explore Moonlodge">
    <a class="panel" href="/projects/moonlodge/accommodation.php">
      <?php echo ml_img('45ed6dc7fe443fdc0c907684f82f8daa.jpg', '', '(min-width: 700px) 50vw, 100vw'); ?>
      <h2>Accommodation</h2>
    </a>
    <a class="panel" href="/projects/moonlodge/art-studio.php">
      <?php echo ml_img('homeArtPanel.jpg', '', '(min-width: 700px) 50vw, 100vw'); ?>
      <h2>Art Studio</h2>
    </a>
    <a class="panel panel-wide" href="/projects/moonlodge/attractions.php">
      <?php echo ml_img('homeLocalPanel.jpg', '', '100vw'); ?>
      <h2>Local Attractions &amp; Activities</h2>
    </a>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
