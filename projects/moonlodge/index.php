<?php
$ml_page = 'home';
$page_title = 'Moonlodge | Accommodation and art studio in Whaingaroa';
$page_description = 'Moonlodge at Waimaunga, Whaingaroa / Raglan: a place to rest, an art studio, and the coast, falls, and maunga around Karioi.';
$page_path = '/projects/moonlodge/';
require __DIR__ . '/partials/open.php';
?>
  <section class="sky" id="home" data-drift>
    <div class="sky-copy">
      <p class="eye">Whaingaroa</p>
      <h1>Moonlodge</h1>
      <p class="role">Accommodation &amp; Art Studio</p>
      <p class="locale">Whaingaroa Wellbeing</p>
      <p class="enquire"><a href="/projects/moonlodge/contact.php">Enquire about a stay</a></p>
    </div>
    <figure class="sky-frame">
      <img src="/projects/moonlodge/assets/hero.jpg" width="960" height="547" alt="West-coast beach and green hills at Whaingaroa" data-parallax="0.02">
      <span class="moon" aria-hidden="true"></span>
    </figure>
  </section>

  <section class="letter">
    <p data-reveal>Our Mountain Moon lodge is a great place to really relax and make space to enjoy the spiritual side of life, by connecting to nature and inspiring your creativity.</p>
    <p data-reveal>Waimaunga in Whaingaroa/Raglan boasts mountain presence, wild west coast beaches and the beauty of Wairenga/Bridal Veil falls.</p>
  </section>

  <section class="doors" aria-label="Enter">
    <a class="door" href="/projects/moonlodge/accommodation.php">
      <img src="/projects/moonlodge/assets/home-acc.png" width="514" height="419" alt="Accommodation at Moonlodge">
      <span>Accommodation</span>
    </a>
    <a class="door" href="/projects/moonlodge/art-studio.php">
      <img src="/projects/moonlodge/assets/home-art.png" width="511" height="419" alt="The art studio">
      <span>Art Studio</span>
    </a>
    <a class="door door-wide" href="/projects/moonlodge/attractions.php">
      <img src="/projects/moonlodge/assets/home-local.jpg" width="1024" height="351" alt="The coast near Whaingaroa">
      <span>Local Attractions &amp; Activities</span>
    </a>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
