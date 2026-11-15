<?php
$ml_page = 'studio';
$page_title = 'Art Studio | Moonlodge';
$page_description = 'Waimaunga Studio at Moonlodge: elemental shrines. Visits by appointment at 236 Waimaunga Rd.';
$page_path = '/projects/moonlodge/art-studio.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="split studio-intro">
    <div>
      <p class="eye">Gallery</p>
      <h1>Art Studio</h1>
      <p class="studio-more"><a href="/projects/moonlodge/questions.php">Artist Questions</a></p>
    </div>
    <p class="studio-lead" data-reveal>This is my first year of opening my studio to the public and I am excited at the opportunity to share my beautiful creative space “Waimaunga “here on Karioi’.</p>
  </section>

  <section class="studio" id="studio">
    <div class="shrines">
      <figure data-reveal>
        <button type="button" class="shot" data-shot="/projects/moonlodge/assets/shrine-fire.jpg" data-alt="Fire shrine">
          <img src="/projects/moonlodge/assets/shrine-fire.jpg" width="1920" height="1440" alt="Fire shrine">
        </button>
        <figcaption>Fire</figcaption>
      </figure>
      <figure class="offset" data-reveal>
        <button type="button" class="shot" data-shot="/projects/moonlodge/assets/studio-1.jpg" data-alt="Studio work">
          <img src="/projects/moonlodge/assets/studio-1.jpg" width="1920" height="1440" alt="Studio work">
        </button>
        <figcaption>Studio</figcaption>
      </figure>
      <figure data-reveal>
        <button type="button" class="shot" data-shot="/projects/moonlodge/assets/studio-2.jpg" data-alt="Studio work">
          <img src="/projects/moonlodge/assets/studio-2.jpg" width="1920" height="1440" alt="Studio work">
        </button>
        <figcaption>Studio</figcaption>
      </figure>
      <figure class="offset" data-reveal>
        <button type="button" class="shot" data-shot="/projects/moonlodge/assets/studio-3.jpg" data-alt="Studio work">
          <img src="/projects/moonlodge/assets/studio-3.jpg" width="1920" height="1440" alt="Studio work">
        </button>
        <figcaption>Studio</figcaption>
      </figure>
      <figure data-reveal>
        <button type="button" class="shot" data-shot="/projects/moonlodge/assets/studio-4.jpg" data-alt="Studio work">
          <img src="/projects/moonlodge/assets/studio-4.jpg" width="1920" height="1440" alt="Studio work">
        </button>
        <figcaption>Studio</figcaption>
      </figure>
      <figure class="offset" data-reveal>
        <button type="button" class="shot" data-shot="/projects/moonlodge/assets/studio-5.jpg" data-alt="Studio work">
          <img src="/projects/moonlodge/assets/studio-5.jpg" width="1920" height="1440" alt="Studio work">
        </button>
        <figcaption>Studio</figcaption>
      </figure>
      <figure data-reveal>
        <button type="button" class="shot" data-shot="/projects/moonlodge/assets/shrine-water.jpg" data-alt="Water shrine">
          <img src="/projects/moonlodge/assets/shrine-water.jpg" width="1920" height="1440" alt="Water shrine">
        </button>
        <figcaption>Water</figcaption>
      </figure>
    </div>
  </section>

  <div class="lb" id="lb" hidden role="dialog" aria-modal="true" aria-label="Studio photograph">
    <button class="lb-close" type="button">Close</button>
    <button class="lb-prev" type="button" aria-label="Previous image">
      <span aria-hidden="true">‹</span>
    </button>
    <figure class="lb-figure">
      <img id="lb-img" alt="">
      <figcaption id="lb-cap"></figcaption>
    </figure>
    <button class="lb-next" type="button" aria-label="Next image">
      <span aria-hidden="true">›</span>
    </button>
  </div>
<?php require __DIR__ . '/partials/close.php'; ?>
