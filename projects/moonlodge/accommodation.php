<?php
$ml_page = 'accommodation';
$ml_hero = 'accommodation/dressing.jpg';
$page_title = 'Accommodation | Moonlodge';
$page_description = 'Stay at Waimaunga Moonlodge: bathroom, kitchen, heating, breakfast, free parking, a private entrance, sunrise and sunset. Book on Airbnb.';
$page_path = '/projects/moonlodge/accommodation.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="fold foldImgAccommodation parallax">
    <?php echo ml_img('accommodation/dressing.jpg', 'Inside Moonlodge: lamps, a chandelier and light through white curtains', '100vw', 'fold-img', true); ?>
    <div class="foldText">
      <h1><span>Waimaunga</span> <span>Moonlodge</span></h1>
      <a class="ml-button ctaButton" href="https://www.airbnb.co.nz/rooms/24138672?source_impression_id=p3_1574236180_BO5CFg7dkMk%2FD2rT" rel="noopener">Book Now</a>
    </div>
  </section>

  <section class="openingText">
    <p>Waimaunga Moonlodge is a private stay set among the hills above Whaingaroa / Raglan. Come in through your own entrance, put the kettle on in the kitchen, and settle in. The bedroom is quiet, the bathroom is close by, and an outdoor bath looks out over the land. Mornings bring sunrise over the maunga; in the evening the light drops slowly toward the west coast. Breakfast is ready for you, parking is free, and a heater keeps the lodge warm when the weather turns. Book your dates on Airbnb, or ask us a question first.</p>
  </section>

  <section class="lodge-features" aria-labelledby="lodge-features-title">
    <header class="lodge-features-intro">
      <p class="ml-kicker">What you will find here</p>
      <h2 class="usualH1" id="lodge-features-title">Lodge Features</h2>
      <p>A private entrance, a kitchen, a quiet bedroom, and an outdoor bath that looks out over the land. Breakfast is ready for you, parking is free, and a heater keeps the lodge warm when the weather turns.</p>
    </header>
    <ul class="feature-cards">
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 13v4h16v-4"/><path d="M6 13V9.5A3.5 3.5 0 0 1 12 9a3.5 3.5 0 0 1 6 0.5V13"/><path d="M4 17v2M20 17v2"/></svg></span>
        <h3>Bathroom</h3>
        <p>Close by the bedroom.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3s3 3.2 3 5.4A3 3 0 1 1 9 8.4C9 6.2 12 3 12 3z"/><path d="M8.2 14.2c1.2-1 2.5-1.5 3.8-1.5s2.6.5 3.8 1.5"/><path d="M6.5 18c1.8-1.4 3.6-2 5.5-2s3.7.6 5.5 2"/></svg></span>
        <h3>Heater</h3>
        <p>Keeps the lodge warm when the weather turns.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 14l1.7-4.3A1.6 1.6 0 0 1 7.7 8.5h8.6c.6 0 1.2.4 1.5 1.02L19.5 14"/><path d="M4 16.5h16v1.2a.8.8 0 0 1-.8.8H4.8a.8.8 0 0 1-.8-.8v-1.2z"/><path d="M5.2 14h13.6"/><circle cx="7.2" cy="17.6" r="1.15"/><circle cx="16.8" cy="17.6" r="1.15"/></svg></span>
        <h3>Free Parking</h3>
        <p>Parking is free, on site.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 21V5.8A1.8 1.8 0 0 1 6.8 4h7.4A1.8 1.8 0 0 1 16 5.8V21"/><path d="M16 10h3.2A1.8 1.8 0 0 1 21 11.8V21H5"/><path d="M9.5 12.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg></span>
        <h3>Private Entrance</h3>
        <p>Come in through your own entrance.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M17.5 15.5a5.5 5.5 0 0 1-10.7-1.6C6.8 10 10 8.5 12.2 6c.7 2.6 4.2 4.2 4.2 7.2 0 .9-.3 1.8-.9 2.3z"/><path d="M8 19h10"/></svg></span>
        <h3>Breakfast</h3>
        <p>Breakfast is ready for you.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 20h5.5a3.5 3.5 0 0 0 0-7H9V4h4.2A3.8 3.8 0 0 1 17 7.8V9"/><path d="M9 11h4"/></svg></span>
        <h3>Fire Extinguisher</h3>
        <p>Kept on site.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 20h16M6 20V10h12v10M9 10V7.5a3 3 0 0 1 6 0V10"/><path d="M10 14h4"/></svg></span>
        <h3>Kitchen</h3>
        <p>Put the kettle on and settle in.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v2M5.2 8.2l1.5 1.5M18.8 8.2l-1.5 1.5M3.5 16h17"/><circle cx="12" cy="13" r="3.2"/></svg></span>
        <h3>Sunrise</h3>
        <p>Mornings bring sunrise over the maunga.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M3.5 17h17"/><path d="M6 17a6 6 0 0 1 12 0"/><path d="M8.5 20h7"/></svg></span>
        <h3>Sunset</h3>
        <p>Evening light drops toward the west coast.</p>
      </li>
      <li>
        <span class="ml-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4v9"/><path d="M8.5 20h7"/><path d="M8 13h8a2 2 0 0 1 0 4H8a2 2 0 0 1 0-4z"/></svg></span>
        <h3>Heating</h3>
        <p>A warm lodge when the weather turns.</p>
      </li>
    </ul>

    <div class="lodge-mosaic">
      <figure class="mosaic-hero"><?php echo ml_img('accommodation/outsidebathview.jpg', 'The view from the outdoor bath', '(min-width: 900px) 50vw, 100vw', '', True); ?></figure>
      <figure><?php echo ml_img('accommodation/moonlodge.jpg', 'Moonlodge from outside', '(min-width: 900px) 25vw, 50vw', '', True); ?></figure>
      <figure><?php echo ml_img('accommodation/Kitchen.jpg', 'The kitchen', '(min-width: 900px) 25vw, 50vw', '', True); ?></figure>
      <figure><?php echo ml_img('accommodation/bathroom.jpg', 'The bathroom', '(min-width: 900px) 25vw, 50vw', '', True); ?></figure>
      <figure><?php echo ml_img('accommodation/dressing.jpg', 'The dressing area with a lamp and chandelier', '(min-width: 900px) 25vw, 50vw', '', True); ?></figure>
      <figure class="mosaic-wide"><?php echo ml_img('accommodation/bedroom.jpeg', 'The bedroom', '(min-width: 900px) 50vw, 100vw', '', True); ?></figure>
    </div>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
