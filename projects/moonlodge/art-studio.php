<?php
$ml_page = 'studio';
$ml_hero = 'studio/files_755839_753059_fire_shrine-a5acd5.jpg';

$ml_solid = true;
$page_title = 'Art Studio | Moonlodge';
$page_description = 'Photos from the art studio at Moonlodge, Waimaunga, including the fire and water shrines.';
$page_path = '/projects/moonlodge/art-studio.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="studio-intro">
    <div class="studio-intro-copy">
      <p class="ml-kicker">Waimaunga Studio</p>
      <h1 class="usualH1">Art Studio</h1>
      <p>The studio at Waimaunga is a working space and a place to look slowly. Light comes in through white curtains, the doors open to the garden, and the fire and water shrines sit among the work. Artist Name works here in clay, papier mâché and mixed media, making visual narratives and the Elemental Shrines: Earth, Air, Fire and Water. Visits are by appointment, including during the Arts Trail. If you would like to come in, send a message and we will arrange a time.</p>
      <blockquote class="ml-pull">
        <p>A working space, and a place to look slowly.</p>
      </blockquote>
      <div class="studio-intro-actions">
        <a class="ml-button ml-button-dark" href="/projects/moonlodge/contact.php">Visit the studio</a>
        <a class="studio-text-link" href="/projects/moonlodge/questions.php">Read the artist questions</a>
      </div>
    </div>
    <figure class="studio-intro-photo">
      <?php echo ml_img('studio/files_755839_753059_img_7577-380832.jpg', 'Inside the studio, with doors open to the garden', '(min-width: 900px) 52vw, 100vw', '', True); ?>
    </figure>
  </section>

  <section class="studio-shrines" aria-label="Fire and water shrines">
    <figure class="studio-shrine">
      <?php echo ml_img('studio/files_755839_753059_fire_shrine-a5acd5.jpg', 'The fire shrine, a red open cabinet', '(min-width: 800px) 50vw, 100vw', '', True); ?>
      <figcaption>
        <span class="ml-kicker">Elemental Shrines</span>
        <strong>Fire</strong>
        <p>The fire shrine sits among the work in the studio, a place to look slowly.</p>
      </figcaption>
    </figure>
    <figure class="studio-shrine studio-shrine-offset">
      <?php echo ml_img('studio/files_755839_753059_water_shrine-0f19ff.jpg', 'The water shrine, a blue cabinet', '(min-width: 800px) 50vw, 100vw', '', True); ?>
      <figcaption>
        <span class="ml-kicker">Elemental Shrines</span>
        <strong>Water</strong>
        <p>The water shrine sits with the fire shrine, part of the Elemental Shrines: Earth, Air, Fire and Water.</p>
      </figcaption>
    </figure>
  </section>

  <section class="studio-mosaic-wrap" aria-label="Inside the studio">
    <header class="studio-mosaic-intro">
      <p class="ml-kicker">Inside the studio</p>
      <h2 class="usualH1">Light, the garden, and the work</h2>
    </header>
    <div class="studio-mosaic">
      <figure class="studio-mosaic-lg">
        <?php echo ml_img('studio/files_755839_753059_img_7568-6e44d5.jpg', 'The studio looking out through white curtains', '(min-width: 900px) 50vw, 100vw', '', True); ?>
        <figcaption>Light comes in through white curtains.</figcaption>
      </figure>
      <figure>
        <?php echo ml_img('studio/files_755839_753059_img_7554-fff2a3.jpg', 'Shrines and objects on a table in the studio', '(min-width: 900px) 25vw, 50vw', '', True); ?>
        <figcaption>Shrines and objects on a table.</figcaption>
      </figure>
      <figure>
        <?php echo ml_img('studio/files_755839_753059_img_7555-36a917.jpg', 'Work on display in the studio', '(min-width: 900px) 25vw, 50vw', '', True); ?>
        <figcaption>Work on display.</figcaption>
      </figure>
      <figure class="studio-mosaic-wide">
        <?php echo ml_img('studio/files_755839_753059_img_7574-00db5f.jpg', 'Inside the studio', '(min-width: 900px) 50vw, 100vw', '', True); ?>
        <figcaption>Inside the studio at Waimaunga.</figcaption>
      </figure>
    </div>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
