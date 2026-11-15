<?php
$ml_page = 'attractions';
$page_title = 'Attractions | Moonlodge';
$page_description = 'Around Moonlodge: Raglan’s west coast beaches, the Te Akau coast, Ruapuke, and Wairenga / Bridal Veil Falls.';
$page_path = '/projects/moonlodge/attractions.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="places-intro">
    <p class="eye">nga waahi rohe</p>
    <h1>Local Attractions</h1>
    <p data-reveal>Waimaunga in Whaingaroa/Raglan boasts mountain presence, wild west coast beaches and the beauty of Wairenga/Bridal Veil falls.</p>
  </section>

  <section class="places">
    <article class="place" data-drift>
      <figure>
        <img src="/projects/moonlodge/assets/raglan-beach.jpg" width="1920" height="1440" alt="Raglan ocean beach">
      </figure>
      <div>
        <h2>Raglan</h2>
        <p>Wild west coast beaches.</p>
      </div>
    </article>
    <article class="place place-flip" data-drift>
      <figure>
        <img src="/projects/moonlodge/assets/te-akau.jpg" width="1920" height="2560" alt="Te Akau coast">
      </figure>
      <div>
        <h2>Te Akau</h2>
        <p>The coast.</p>
      </div>
    </article>
    <article class="place" data-drift>
      <figure>
        <img src="/projects/moonlodge/assets/ruapuke.jpg" width="1920" height="2560" alt="Ruapuke estuary">
      </figure>
      <div>
        <h2>Ruapuke</h2>
        <p>Ruapuke and it’s elemental wildness cleanses, rejuvenates and inspires me.</p>
        <p class="credit">Tania Mills</p>
      </div>
    </article>
    <article class="place place-flip" data-drift>
      <figure>
        <img src="/projects/moonlodge/assets/bridal-veil.jpg" width="1600" height="2134" alt="Wairenga, Bridal Veil Falls">
      </figure>
      <div>
        <h2>Bridal Veil Falls</h2>
        <p>Wairenga / Bridal Veil Falls.</p>
      </div>
    </article>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
