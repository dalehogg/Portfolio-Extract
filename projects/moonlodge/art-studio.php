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
      <p class="openingText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.</p>
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
