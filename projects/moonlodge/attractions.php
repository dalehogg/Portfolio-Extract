<?php
$ml_page = 'attractions';
$ml_hero = 'localAttractions/Raglan/RaglanOceanBeach.jpg';
$page_title = 'Local Attractions | Moonlodge';
$page_description = 'Local attractions near Moonlodge, nga waahi rohe: Raglan, Ruapuke and Wairenga / Bridal Veil Falls.';
$page_path = '/projects/moonlodge/attractions.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="fold foldImgAttractions parallax">
    <?php echo ml_img('localAttractions/Raglan/RaglanOceanBeach.jpg', 'Raglan ocean beach', '100vw', 'fold-img', true); ?>
    <div class="foldText">
      <h1>Local Attractions</h1>
      <p class="fold-sub" lang="mi">nga waahi rohe</p>
    </div>
  </section>

  <section class="openingText">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </section>

  <section class="veticalImageContain" aria-label="Places to visit">
    <a class="verticalBox" href="https://www.facebook.com/places/Things-to-do-in-Raglan-New-Zealand/105557729478205/" rel="noopener">
      <?php echo ml_img('localAttractions/Raglan/TeAkau.jpg', '', '(min-width: 760px) 33vw, 100vw'); ?>
      <h2>Raglan</h2>
    </a>
    <a class="verticalBox" href="https://www.facebook.com/places/Things-to-do-in-Ruapuke/105550289477446/" rel="noopener">
      <?php echo ml_img('localAttractions/RuapukeBeach/esturary.jpg', '', '(min-width: 760px) 33vw, 100vw'); ?>
      <h2>Ruapuke</h2>
    </a>
    <a class="verticalBox" href="https://www.facebook.com/pages/Bridal-Veil-Falls-Waikato/110353062348054" rel="noopener">
      <?php echo ml_img('localAttractions/WairengaBridalVeil/IMG_2176.jpg', '', '(min-width: 760px) 33vw, 100vw'); ?>
      <h2>Bridal Veil Falls</h2>
    </a>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
