<?php
$cfg = json_decode((string) @file_get_contents(dirname(__DIR__, 2) . '/site.config.json'), true);
$origin = rtrim((string) (is_array($cfg) ? ($cfg['baseUrl'] ?? '') : ''), '/');
$page_title = 'Moonlodge | Accommodation and art studio in Whaingaroa';
$page_description = 'Moonlodge at Waimaunga, Whaingaroa / Raglan: a place to rest, an art studio, and the coast, falls, and maunga around Karioi. Accommodation, artist questions, and enquiries.';
$page_path = '/projects/moonlodge/';
$page_og_image = $origin . '/projects/moonlodge/assets/hero.jpg';
$chrome = 'minimal';
$extra_head = <<<'HTML'
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;1,500&family=Outfit:wght@300;400&display=swap">
  <link rel="stylesheet" href="site.css">
HTML;
$page_scripts = '<script src="site.js" defer></script>';
?>
<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="ml">
<?php include __DIR__ . '/../../includes/nav.php'; ?>
<main class="ml">
  <section class="sky" id="home" data-drift>
    <div class="sky-photo" aria-hidden="true"></div>
    <div class="moon" aria-hidden="true"></div>
    <p class="eye">Whaingaroa</p>
    <h1>Moonlodge</h1>
    <p class="role">Accommodation &amp; Art Studio</p>
    <p class="place">Whaingaroa Wellbeing</p>
    <p class="enquire"><a href="#contact">Enquire about a stay</a></p>
    <nav class="rail" aria-label="Moonlodge">
      <a href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#accommodation">Accommodation</a>
      <a href="#studio">Art Studio</a>
      <a href="#attractions">Attractions</a>
      <a href="#questions">Questions</a>
      <a href="#contact">Contact</a>
    </nav>
  </section>

  <section class="letter">
    <p data-reveal>Our Mountain Moon lodge is a great place to really relax and make space to enjoy the spiritual side of life, by connecting to nature and inspiring your creativity.</p>
    <p data-reveal>Waimaunga in Whaingaroa/Raglan boasts mountain presence, wild west coast beaches and the beauty of Wairenga/Bridal Veil falls.</p>
  </section>

  <section class="doors" aria-label="Enter">
    <a class="door" href="#accommodation" data-drift>
      <img src="assets/home-acc.png" alt="Accommodation at Moonlodge">
      <span>Accommodation</span>
    </a>
    <a class="door" href="#studio" data-drift>
      <img src="assets/home-art.png" alt="The art studio">
      <span>Art Studio</span>
    </a>
    <a class="door door-wide" href="#attractions" data-drift>
      <img src="assets/home-local.jpg" alt="The coast near Whaingaroa">
      <span>Local Attractions &amp; Activities</span>
    </a>
  </section>

  <section class="chapter" id="about">
    <figure class="bleed" data-drift>
      <img src="assets/about.jpg" alt="The hills above the lodge">
      <figcaption>
        <p class="eye">About us</p>
        <h2>e pā ana ki a tatou</h2>
      </figcaption>
    </figure>
    <article class="prose">
      <h3>Hi there,</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor</p>
      <h3>Our Values</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitorLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor</p>
      <h3>What We Do</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitorLorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor</p>
    </article>
  </section>

  <section class="chapter stay" id="accommodation">
    <div class="stay-copy">
      <p class="eye">Waimaunga</p>
      <h2>Moonlodge</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <h3>Lodge Features</h3>
      <ul class="features">
        <li>Bathroom</li>
        <li>Heater</li>
        <li>Free Parking</li>
        <li>Private Entrance</li>
        <li>Breakfast</li>
        <li>Fire Extinguisher</li>
        <li>Kitchen</li>
        <li>Sunrise</li>
        <li>Sunset</li>
        <li>Heating</li>
      </ul>
    </div>
    <div class="stay-photos">
      <figure data-drift><img src="assets/lodge.jpg" alt="The lodge"><figcaption>Lodge</figcaption></figure>
      <figure data-drift><img src="assets/bedroom.jpeg" alt="Bedroom"><figcaption>Bedroom</figcaption></figure>
      <figure data-drift><img src="assets/kitchen.jpg" alt="Kitchen"><figcaption>Kitchen</figcaption></figure>
      <figure data-drift><img src="assets/bathroom.jpg" alt="Bathroom"><figcaption>Bathroom</figcaption></figure>
      <figure data-drift><img src="assets/dressing.jpg" alt="Dressing area"><figcaption>Dressing</figcaption></figure>
      <figure data-drift><img src="assets/bath-view.jpg" alt="View from the bath"><figcaption>Outside the bath</figcaption></figure>
    </div>
  </section>

  <section class="chapter studio" id="studio">
    <div class="studio-intro">
      <p class="eye">Gallery</p>
      <h2>Art Studio</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu condimentum sed.</p>
    </div>
    <div class="shrines">
      <figure data-drift><img src="assets/shrine-fire.jpg" alt="Fire shrine"><figcaption>Fire</figcaption></figure>
      <figure data-drift><img src="assets/studio-1.jpg" alt="Studio work"><figcaption>Studio</figcaption></figure>
      <figure data-drift><img src="assets/studio-1.jpg" alt="Studio work"><figcaption>Studio</figcaption></figure>
      <figure data-drift><img src="assets/studio-2.jpg" alt="Studio work"><figcaption>Studio</figcaption></figure>
      <figure data-drift><img src="assets/studio-3.jpg" alt="Studio work"><figcaption>Studio</figcaption></figure>
      <figure data-drift><img src="assets/studio-4.jpg" alt="Studio work"><figcaption>Studio</figcaption></figure>
      <figure data-drift><img src="assets/studio-5.jpg" alt="Studio work"><figcaption>Studio</figcaption></figure>
      <figure data-drift><img src="assets/shrine-water.jpg" alt="Water shrine"><figcaption>Water</figcaption></figure>
    </div>
  </section>

  <section class="chapter places" id="attractions">
    <div class="places-intro">
      <p class="eye">nga waahi rohe</p>
      <h2>Local Attractions</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <article class="place" data-drift>
      <img src="assets/raglan-beach.jpg" alt="Raglan ocean beach">
      <h3>Raglan</h3>
    </article>
    <article class="place place-alt" data-drift>
      <img src="assets/te-akau.jpg" alt="Te Akau coast">
      <h3>Te Akau</h3>
    </article>
    <article class="place" data-drift>
      <img src="assets/ruapuke.jpg" alt="Ruapuke estuary">
      <h3>Ruapuke</h3>
    </article>
    <article class="place place-alt" data-drift>
      <img src="assets/bridal-veil.jpg" alt="Wairenga, Bridal Veil Falls">
      <h3>Bridal Veil Falls</h3>
    </article>
  </section>

  <section class="chapter interview" id="questions" data-drift>
    <div class="interview-sky" aria-hidden="true"></div>
    <header class="interview-head">
      <p class="eye">Nga uiui toi</p>
      <h2>Artist Questions</h2>
      <p class="who">Tania Mills</p>
      <p class="iwi">Ngati Tuwharetoa Te Iwi</p>
    </header>
    <dl>
      <dt>What is your preferred medium?</dt>
      <dd>Three dimensional medium, clay, papier mache, mixed media</dd>
      <dt>How would you describe your work?</dt>
      <dd>Visual Narrative: I am interested in exploring the mythology of historical archetype, and it’s cross cultural and contemporary significance. I enjoy the creative challenge of the storytelling and problem solving process.</dd>
      <dt>When inspiration hits how do you channel that into your work, what’s the process?</dt>
      <dd>I use visual research to compose a collage of images to create the narrative I seek. Then I choose the medium in which best will serve the purpose, it is usually a combination of 2D and 3D and can be seen in my mind’s eye as completed. I draw this out before beginning the making</dd>
      <dt>What inspires you generally?</dt>
      <dd>A real connection to Papatuanku (mother earth), the indigenous world view. Te Ao Maaori, Early mythology and psychology. Researching the divine elements and the significance of the materials themselves has been an ongoing journey throughout my life.</dd>
      <dt>Where did you get the inspiration from for this particular piece? (Please select one of your latest pieces that you can submit a good photograph of or have Stuart photograph)</dt>
      <dd>“Earth Shrine’ has evolved. Twenty years ago my first exhibition ‘Divine Elements’ (1997) had shadow boxes which paid homage to Papatuanuku. These shrines are more relevant today as they have evolved over time and enable the viewer to become participant, offering a place of contemplation, mindfulness, rest and reflection.</dd>
      <dt>Tell me a little bit about your relationship with art and being creative?</dt>
      <dd>The creative process is necessary for me to be whole, balanced and uplifted. Nature and its earth based ways of being is intuitive and tells my story. I have been an art teacher, facilitator, performer, and maker. This is my first year of opening my studio to the public and I am excited at the opportunity to share my beautiful creative space “Waimaunga “here on Karioi’.</dd>
      <dt>Which artists do you admire, past and present? Why? What draws you to their work?</dt>
      <dd>A huge range from early religious iconography renaissance painters to contemporary feminist and environmental activists. Surrealist narrative painters. Indigenous artists. More recently studying ceramic and clay sculpture artists. There are way too many to list</dd>
      <dt>What are you working on at the moment?</dt>
      <dd>The Elemental Shrines: Earth, Air, Fire and Water which will be available to view during the Arts Trail weekend. Early ancient female archetypes in clay.</dd>
      <dt>Tell me something you like about living in Raglan. How is it special?</dt>
      <dd>Karioi is a sister to Pirongia, I am connected to both these Maunga. The rich soil enables me to grow. My dream to be sustainable and celebrate beauty is possible through my maunga location, the vast horizon of sky and sea. Ruapuke and it’s elemental wildness cleanses, rejuvenates and inspires me.</dd>
      <dt>Where can we see your work?</dt>
      <dd>By appointment at “Waimaunga Studio” 236 Waimaunga Rd. 0278666239</dd>
    </dl>
  </section>

  <section class="chapter reach" id="contact">
    <div>
      <p class="eye">Contact</p>
      <h2>Enquires</h2>
      <ul class="details">
        <li><span>Phone</span> (xx) xxx xxxx</li>
        <li><span>Mob</span> xxx xxx xxxx</li>
        <li><span>Email</span> email@emails.com</li>
        <li><span>Address</span> 123 Town Rd, City</li>
        <li><span>Map</span> 123 Wainui Rd, Raglan 3297</li>
      </ul>
    </div>
    <form id="client-form" action="https://formsubmit.co/dhdaleleon@gmail.com" method="POST">
      <input type="hidden" name="_subject" value="Moonlodge website enquiry">
      <input type="hidden" name="_template" value="table">
      <input type="hidden" name="_captcha" value="false">
      <input type="hidden" name="_next" value="">
      <p class="honey" aria-hidden="true">
        <label>Leave this field empty<input type="text" name="_honey" tabindex="-1" autocomplete="off"></label>
      </p>
      <label for="ml-first">First Name</label>
      <input id="ml-first" name="First name" type="text" autocomplete="given-name" required>
      <label for="ml-last">Last Name</label>
      <input id="ml-last" name="Last name" type="text" autocomplete="family-name" required>
      <label for="ml-email">Email</label>
      <input id="ml-email" name="email" type="email" autocomplete="email" required>
      <label for="ml-message">Message</label>
      <textarea id="ml-message" name="message" rows="6" required></textarea>
      <button type="submit">Send</button>
    </form>
  </section>

  <section class="ask">
    <p>Want something like this?</p>
    <a href="/#contact">Get a quote</a>
  </section>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
