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

  <section class="featuresPhotos">
    <div class="features">
      <h2 class="usualH1">Lodge Features</h2>
      <div class="feature-lists">
        <ul>
          <li>Bathroom</li>
          <li>Heater</li>
          <li>Free Parking</li>
          <li>Private Entrance</li>
          <li>Breakfast</li>
        </ul>
        <ul>
          <li>Fire Extinguisher</li>
          <li>Kitchen</li>
          <li>Sunrise</li>
          <li>Sunset</li>
          <li>Heating</li>
        </ul>
      </div>
    </div>
    <div class="photos">
      <figure><?php echo ml_img('accommodation/outsidebathview.jpg', 'The view from the outdoor bath', '(min-width: 1000px) 18vw, (min-width: 700px) 30vw, 46vw'); ?></figure>
      <figure><?php echo ml_img('accommodation/moonlodge.jpg', 'Moonlodge from outside', '(min-width: 1000px) 18vw, (min-width: 700px) 30vw, 46vw'); ?></figure>
      <figure><?php echo ml_img('accommodation/Kitchen.jpg', 'The kitchen', '(min-width: 1000px) 18vw, (min-width: 700px) 30vw, 46vw'); ?></figure>
      <figure><?php echo ml_img('accommodation/bathroom.jpg', 'The bathroom', '(min-width: 1000px) 18vw, (min-width: 700px) 30vw, 46vw'); ?></figure>
      <figure><?php echo ml_img('accommodation/dressing.jpg', 'The dressing area with a lamp and chandelier', '(min-width: 1000px) 18vw, (min-width: 700px) 30vw, 46vw'); ?></figure>
      <figure><?php echo ml_img('accommodation/bedroom.jpeg', 'The bedroom', '(min-width: 1000px) 18vw, (min-width: 700px) 30vw, 46vw'); ?></figure>
    </div>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
