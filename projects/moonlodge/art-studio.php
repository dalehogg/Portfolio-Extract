<?php
$ml_page = 'studio';
$ml_hero = 'studio/files_755839_753059_fire_shrine-a5acd5.jpg';

$ml_solid = true;
$page_title = 'Art Studio | Moonlodge';
$page_description = 'Photos from the art studio at Moonlodge, Waimaunga, including the fire and water shrines.';
$page_path = '/projects/moonlodge/art-studio.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="artSection">
    <header class="page-head">
      <h1 class="usualH1">Art Studio</h1>
      <p class="openingText">The studio at Waimaunga is a working space and a place to look slowly. Light comes in through white curtains, the doors open to the garden, and the fire and water shrines sit among the work. Tania Mills works here in clay, papier mâché and mixed media, making visual narratives and the Elemental Shrines: Earth, Air, Fire and Water. Visits are by appointment, including during the Arts Trail. If you would like to come in, send a message and we will arrange a time.</p>
    </header>
    <div class="art-grid">
      <figure class="artImage"><?php echo ml_img('studio/files_755839_753059_fire_shrine-a5acd5.jpg', 'The fire shrine, a red open cabinet', '(min-width: 900px) 50vw, 100vw'); ?></figure>
      <figure class="artImage"><?php echo ml_img('studio/files_755839_753059_img_7554-fff2a3.jpg', 'Shrines and objects on a table in the studio', '(min-width: 900px) 25vw, 50vw'); ?></figure>
      <figure class="artImage"><?php echo ml_img('studio/files_755839_753059_img_7555-36a917.jpg', 'Work on display in the studio', '(min-width: 900px) 25vw, 50vw'); ?></figure>
      <figure class="artImage"><?php echo ml_img('studio/files_755839_753059_img_7568-6e44d5.jpg', 'The studio looking out through white curtains', '(min-width: 900px) 25vw, 50vw'); ?></figure>
      <figure class="artImage"><?php echo ml_img('studio/files_755839_753059_img_7574-00db5f.jpg', 'Inside the studio', '(min-width: 900px) 25vw, 50vw'); ?></figure>
      <figure class="artImage"><?php echo ml_img('studio/files_755839_753059_img_7577-380832.jpg', 'Inside the studio, with doors open to the garden', '(min-width: 900px) 50vw, 50vw'); ?></figure>
      <figure class="artImage"><?php echo ml_img('studio/files_755839_753059_water_shrine-0f19ff.jpg', 'The water shrine, a blue cabinet', '(min-width: 900px) 50vw, 50vw'); ?></figure>
    </div>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
