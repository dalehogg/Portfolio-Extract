<?php
$ds_page = 'services';
$page_title = 'Services | Drain Saves';
$page_description = 'Civil, commercial, residential, and maintenance drainage work in Auckland, with reliable backflow prevention.';
$page_path = '/projects/drain-saves/services.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="sheet" id="services">
    <p class="eye">Drain Saves</p>
    <h1>Services</h1>
    <ol class="services">
      <li class="service" data-rise>
        <span>01</span>
        <h2>Civil</h2>
        <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M8 34h32M14 34V22l10-8 10 8v12M20 34v-8h8v8"/></svg>
      </li>
      <li class="service" data-rise>
        <span>02</span>
        <h2>Commercial</h2>
        <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M10 38V16l8-6h12l8 6v22M18 38V26h12v12M22 20h4M22 26h4"/></svg>
      </li>
      <li class="service" data-rise>
        <span>03</span>
        <h2>Residential</h2>
        <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M8 24 L24 10 L40 24 V38 H8 Z M20 38 V28 H28 V38"/></svg>
      </li>
      <li class="service" data-rise>
        <span>04</span>
        <h2>Maintenance</h2>
        <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M18 30l14-14 4 4-14 14H18v-4zM30 14l4 4"/></svg>
      </li>
    </ol>
  </section>

  <section class="banner">
    <figure class="banner-frame">
      <img src="/projects/drain-saves/assets/prevention.jpg" width="1600" height="1876" alt="A backflow valve and pipes set into a concrete chamber" data-pan>
    </figure>
    <h2 data-rise>Reliable back flow prevention solutions</h2>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
