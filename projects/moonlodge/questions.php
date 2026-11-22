<?php
$ml_page = 'questions';
$ml_hero = 'shineBeach.jpg';
$page_title = 'Artist Questions with Artist Name | Moonlodge';
$page_description = 'Artist Questions, nga uiui toi: Artist Name on their medium, their inspiration, the Elemental Shrines and living on Karioi.';
$page_path = '/projects/moonlodge/questions.php';
require __DIR__ . '/partials/open.php';

function ml_faq_item(string $question, string $answer, bool $open = false): void
{
    $open_attr = $open ? ' open' : '';
    echo '<details class="faq-item"' . $open_attr . '>';
    echo '<summary><span>' . htmlspecialchars($question, ENT_QUOTES, 'UTF-8') . '</span>';
    echo '<svg class="faq-chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>';
    echo '</summary>';
    echo '<div class="faq-answer">' . $answer . '</div>';
    echo '</details>';
}
?>
  <section class="fold foldImgFaq parallax">
    <?php echo ml_img('shineBeach.jpg', 'Sun on the sea at a west coast beach', '100vw', 'fold-img', true); ?>
    <div class="foldText">
      <h1>Artist Questions</h1>
      <p class="fold-sub" lang="mi">Nga uiui toi</p>
    </div>
  </section>

  <section class="artist-intro">
    <figure class="artist-intro-photo">
      <?php echo ml_img('studio/files_755839_753059_img_7577-380832.jpg', 'Inside the studio at Waimaunga, with doors open to the garden', '(min-width: 900px) 46vw, 100vw'); ?>
    </figure>
    <div class="artist-intro-copy">
      <p class="ml-kicker">Waimaunga Studio</p>
      <h2 class="usualH1">Artist Name</h2>
      <p>Artist Name works at Waimaunga Studio, here on Karioi, in clay, papier mâché and mixed media. In these questions they talk about their medium, their process, the Elemental Shrines, and living in Whaingaroa / Raglan. Visits to the studio are by appointment.</p>
      <a class="studio-text-link" href="/projects/moonlodge/art-studio.php">Visit the art studio</a>
    </div>
  </section>

  <section class="faq-groups" aria-label="Artist questions">
    <div class="faq-group">
      <header class="faq-group-head">
        <p class="ml-kicker">Practice</p>
        <h2 class="usualH1">Medium, process and making</h2>
      </header>
      <div class="faq-list">
        <?php
        ml_faq_item('What is your preferred medium?', '<p>Three dimensional medium, clay, papier mache, mixed media</p>', true);
        ml_faq_item('How would you describe your work?', '<p>Visual Narrative: I am interested in exploring the mythology of historical archetype, and it’s cross cultural and contemporary significance. I enjoy the creative challenge of the storytelling and problem solving process.</p>');
        ml_faq_item('When inspiration hits how do you channel that into your work, what’s the process?', '<p>I use visual research to compose a collage of images to create the narrative I seek. Then I choose the medium in which best will serve the purpose, it is usually a combination of 2D and 3D and can be seen in my mind’s eye as completed. I draw this out before beginning the making</p>');
        ml_faq_item('Tell me a little bit about your relationship with art and being creative?', '<p>The creative process is necessary for me to be whole, balanced and uplifted. Nature and its earth based ways of being is intuitive and tells my story. I have been an art teacher, facilitator, performer, and maker. This is my first year of opening my studio to the public and I am excited at the opportunity to share my beautiful creative space “Waimaunga “here on Karioi’.</p>');
        ?>
      </div>
    </div>

    <div class="faq-group">
      <header class="faq-group-head">
        <p class="ml-kicker">Inspiration</p>
        <h2 class="usualH1">Influences and the Elemental Shrines</h2>
      </header>
      <div class="faq-list">
        <?php
        ml_faq_item('What inspires you generally?', '<p>A real connection to Papatuanku (mother earth), the indigenous world view. Te Ao Maaori, Early mythology and psychology. Researching the divine elements and the significance of the materials themselves has been an ongoing journey throughout my life.</p>');
        ml_faq_item('Where did you get the inspiration from for this particular piece?', '<p>“Earth Shrine’ has evolved. Twenty years ago my first exhibition ‘Divine Elements’ (1997) had shadow boxes which paid homage to Papatuanuku. These shrines are more relevant today as they have evolved over time and enable the viewer to become participant, offering a place of contemplation, mindfulness, rest and reflection.</p>');
        ml_faq_item('Which artists do you admire, past and present? Why? What draws you to their work?', '<p>A huge range from early religious iconography renaissance painters to contemporary feminist and environmental activists. Surrealist narrative painters. Indigenous artists. More recently studying ceramic and clay sculpture artists. There are way too many to list</p>');
        ?>
      </div>
    </div>

    <div class="faq-group">
      <header class="faq-group-head">
        <p class="ml-kicker">Here and now</p>
        <h2 class="usualH1">The work, Raglan, and the studio</h2>
      </header>
      <div class="faq-list">
        <?php
        ml_faq_item('What are you working on at the moment?', '<p>The Elemental Shrines: Earth, Air, Fire and Water which will be available to view during the Arts Trail weekend.<br> Early ancient female archetypes in clay.</p>');
        ml_faq_item('Tell me something you like about living in Raglan. How is it special?', '<p>Karioi is a sister to Pirongia, I am connected to both these Maunga. The rich soil enables me to grow. My dream to be sustainable and celebrate beauty is possible through my maunga location, the vast horizon of sky and sea. Ruapuke and it’s elemental wildness cleanses, rejuvenates and inspires me.</p>');
        ml_faq_item('Where can we see your work?', '<p>By appointment at “Waimaunga Studio”<br> 123 Example Street, Suburb, City. 000 000 0000</p>');
        ?>
      </div>
    </div>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
