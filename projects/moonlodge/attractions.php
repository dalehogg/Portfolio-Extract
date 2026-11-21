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
    <p>From Moonlodge you are close to some of the best of the west coast. Whaingaroa / Raglan has the harbour, the township and the well-known surf beaches. A little further on, Ruapuke opens out to a wilder shoreline and a wide horizon. Inland, a short walk through the bush brings you to Wairenga / Bridal Veil Falls, a high drop into a clear pool. All three are an easy outing from the lodge, whether you want a swim, a slow drive, or an afternoon among the trees.</p>
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
