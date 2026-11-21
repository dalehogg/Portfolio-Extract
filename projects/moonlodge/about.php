<?php
$ml_page = 'about';
$ml_hero = 'f794a71256a6cc5bb1371ad9b34d4ad3.jpg';
$page_title = 'About Us | Moonlodge';
$page_description = 'About Moonlodge, e pā ana ki a tatou: a welcome, our values and what we do at Waimaunga in Whaingaroa / Raglan.';
$page_path = '/projects/moonlodge/about.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="fold foldImgAbout parallax">
    <?php echo ml_img('f794a71256a6cc5bb1371ad9b34d4ad3.jpg', 'Bush and coastline around Waimaunga', '100vw', 'fold-img', true); ?>
    <div class="foldText">
      <h1>About Us</h1>
      <p class="fold-sub" lang="mi">e pā ana ki a tatou</p>
    </div>
  </section>

  <section class="about-story">
    <figure class="about-story-photo">
      <?php echo ml_img('accommodation/moonlodge.jpg', 'Moonlodge from outside, among the hills at Waimaunga', '(min-width: 800px) 52vw, 100vw'); ?>
    </figure>
    <div class="about-story-copy">
      <p class="ml-kicker">A welcome</p>
      <h2 class="usualH1">Hi there,</h2>
      <p>Welcome to Moonlodge at Waimaunga, in Whaingaroa / Raglan. Our mountain lodge is a quiet place to rest, spend time in nature and make a little space for the spiritual side of life. Whether you have come for a night or two, or to visit the art studio, you are welcome here. The maunga is close, the west coast beaches are a short drive, and Wairenga / Bridal Veil Falls is nearby.</p>
      <blockquote class="ml-pull">
        <p>We hope you leave feeling more settled than when you arrived.</p>
      </blockquote>
    </div>
  </section>

  <section class="about-values">
    <header class="about-values-intro">
      <p class="ml-kicker">How we look after this place</p>
      <h2 class="usualH1">Our Values</h2>
      <p>We look after this place carefully, and we look after our guests the same way. Unhurried mornings, time outdoors and honest materials matter to us. Creativity has a home here too: the lodge and the studio sit together, so rest and making can sit side by side. We try to live lightly on the land, keep the lodge simple and warm, and treat everyone who comes through the door with care.</p>
    </header>
    <ul class="value-cards">
      <li>
        <span class="ml-icon" aria-hidden="true">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-7-4.4-7-10a7 7 0 0 1 14 0c0 5.6-7 10-7 10z"/><path d="M12 11.2a1.6 1.6 0 1 0 0-3.2 1.6 1.6 0 0 0 0 3.2z"/></svg>
        </span>
        <h3>Care</h3>
        <p>We look after this place carefully, and we look after our guests the same way, treating everyone who comes through the door with care.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18l6-7.5 3.2 3.8 2.6-3.3L21 18H3z"/><circle cx="16.8" cy="7.2" r="1.8"/></svg>
        </span>
        <h3>Time outdoors</h3>
        <p>Unhurried mornings, time outdoors and honest materials matter to us. We try to live lightly on the land, and keep the lodge simple and warm.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true">
          <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3.5" y="5" width="17" height="14" rx="1.2"/><path d="M8 5V3.8M16 5V3.8M3.5 10h17"/></svg>
        </span>
        <h3>Rest and making</h3>
        <p>Creativity has a home here too: the lodge and the studio sit together, so rest and making can sit side by side.</p>
      </li>
    </ul>
  </section>

  <section class="about-do">
    <div class="about-do-copy">
      <p class="ml-kicker">Stay, or visit the studio</p>
      <h2 class="usualH1">What We Do</h2>
      <p>Moonlodge is a small private lodge for short stays, with a kitchen, a quiet bedroom, an outdoor bath and a private entrance. Breakfast is included, and there is free parking on site. Next to the lodge, the art studio is open by appointment, with work in clay, mixed media and the Elemental Shrines. If you would like to stay, book through Airbnb, or send us a message on the contact page. If you would like to visit the studio, get in touch and we will find a time.</p>
    </div>
    <div class="about-do-panels">
      <a class="about-do-panel" href="/projects/moonlodge/accommodation.php">
        <?php echo ml_img('45ed6dc7fe443fdc0c907684f82f8daa.jpg', 'Light and trees around the lodge', '(min-width: 800px) 38vw, 100vw', '', True); ?>
        <span>Accommodation</span>
      </a>
      <a class="about-do-panel about-do-panel-offset" href="/projects/moonlodge/art-studio.php">
        <?php echo ml_img('homeArtPanel.jpg', 'Work in the art studio at Waimaunga', '(min-width: 800px) 38vw, 100vw', '', True); ?>
        <span>Art Studio</span>
      </a>
    </div>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
