<?php
$cfg = json_decode((string) @file_get_contents(dirname(__DIR__, 2) . '/site.config.json'), true);
$origin = rtrim((string) (is_array($cfg) ? ($cfg['baseUrl'] ?? '') : ''), '/');
$page_title = 'Exclusive Cuts | Haircuts, fades, and walk-ins';
$page_description = 'Exclusive Cuts: zero fades, shavings, mohawks, razor fades, style cuts, and standard cuts. Open Monday to Saturday, 9:00 to 5:30. Walk-ins welcome. Call 022 430 9918.';
$page_path = '/projects/exclusive-cuts/';
$page_og_image = $origin . '/projects/exclusive-cuts/assets/cut-fade.jpeg';
$chrome = 'minimal';
$extra_head = <<<'HTML'
  <link rel="preload" as="image" href="assets/wood.jpg">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo:wght@400;600&display=swap">
  <link rel="stylesheet" href="site.css">
HTML;
$page_scripts = <<<'HTML'
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
<script src="site.js" defer></script>
HTML;
?>
<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="ec">
<?php include __DIR__ . '/../../includes/nav.php'; ?>
<a class="call-pill" href="tel:0224309918">Call 022 430 9918</a>
<main class="ec">
  <section class="board" id="home">
    <p class="eye">North Shore</p>
    <h1>
      <span class="line">Exclusive</span>
      <span class="line cut">Cuts</span>
    </h1>
    <div class="shear" aria-hidden="true"></div>
    <nav class="rail" aria-label="Exclusive Cuts">
      <a href="#home">Home</a>
      <a href="#gallery">Gallery</a>
      <a href="#services">Services</a>
      <a href="#hours">Hours</a>
      <a href="#contact">Contact</a>
    </nav>
  </section>

  <section class="panel" id="gallery">
    <div class="gallery-head">
      <h2>Gallery</h2>
      <button type="button" id="view-more">View more</button>
    </div>
    <div class="gallery-board">
      <figure data-rise><img src="assets/cut-fade.jpeg" width="960" height="960" alt="A razor fade at Exclusive Cuts" data-pan></figure>
      <figure data-rise><img src="assets/cut-tattoo.jpeg" width="768" height="960" alt="A haircut in black and white" data-pan></figure>
      <figure data-rise><img src="assets/cut-chair.jpeg" width="768" height="960" alt="A cut in the chair" data-pan></figure>
      <figure data-rise><img src="assets/cut-kid.jpeg" width="778" height="960" alt="A child's haircut" data-pan></figure>
    </div>
  </section>

  <dialog id="more-cuts" aria-label="More of the gallery">
    <form method="dialog"><button class="close" value="close">Close</button></form>
    <div class="more-grid">
      <img src="assets/cut-fade.jpeg" width="960" height="960" alt="A razor fade at Exclusive Cuts">
      <img src="assets/cut-tattoo.jpeg" width="768" height="960" alt="A haircut in black and white">
      <img src="assets/cut-chair.jpeg" width="768" height="960" alt="A cut in the chair">
      <img src="assets/cut-kid.jpeg" width="778" height="960" alt="A child's haircut">
      <img src="assets/scissors.jpeg" width="960" height="640" alt="Scissors">
      <img src="assets/clippers.jpeg" width="960" height="640" alt="Clippers">
    </div>
  </dialog>

  <section class="panel cream quality" id="chair">
    <div>
      <p class="eye">The chair</p>
      <h2>Quality<br><span class="accent">cuts</span></h2>
      <a class="phone" href="tel:0224309918">022 430 9918</a>
    </div>
    <div class="tools">
      <figure>
        <img src="assets/scissors.jpeg" width="960" height="640" alt="Scissors" data-pan>
      </figure>
      <figure>
        <img src="assets/clippers.jpeg" width="960" height="640" alt="Clippers" data-pan>
      </figure>
    </div>
  </section>

  <section class="panel services" id="services">
    <p class="eye">We provide</p>
    <ol>
      <li data-rise>Zero Fades</li>
      <li data-rise>Shavings</li>
      <li data-rise>Mohawks</li>
      <li data-rise>Razor Fades</li>
      <li data-rise>Style Cuts</li>
      <li data-rise>Standard Cuts</li>
    </ol>
  </section>

  <section class="panel cream hours" id="hours">
    <p class="eye">Hours</p>
    <div class="when">
      <p>Monday</p>
      <p>Saturday</p>
    </div>
    <p class="clock">9:00 to 5:30</p>
    <p class="walk">Walk-ins<br>welcome</p>
  </section>

  <section class="panel contact" id="contact">
    <div>
      <p class="eye">Get in touch</p>
      <h2>Write, or call.</h2>
      <a class="phone dark" href="tel:0224309918">022 430 9918</a>
    </div>
    <form id="client-form" action="https://formsubmit.co/dhdaleleon@gmail.com" method="POST">
      <input type="hidden" name="_subject" value="Exclusive Cuts website enquiry">
      <input type="hidden" name="_template" value="table">
      <input type="hidden" name="_captcha" value="false">
      <input type="hidden" name="_next" value="">
      <p class="honey" aria-hidden="true">
        <label>Leave this field empty<input type="text" name="_honey" tabindex="-1" autocomplete="off"></label>
      </p>
      <label for="ec-name">Name</label>
      <input id="ec-name" name="name" type="text" autocomplete="name" placeholder="Name" required>
      <label for="ec-email">Email</label>
      <input id="ec-email" name="email" type="email" autocomplete="email" placeholder="Email" required>
      <label for="ec-message">Message</label>
      <textarea id="ec-message" name="message" rows="6" placeholder="Message" required></textarea>
      <button type="submit">Send</button>
    </form>
  </section>

  <p class="colophon">Exclusive Cuts · Copyright 2021 · All Rights Reserved</p>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
