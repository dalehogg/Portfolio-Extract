<?php
$cfg = json_decode((string) @file_get_contents(dirname(__DIR__, 2) . '/site.config.json'), true);
$origin = rtrim((string) (is_array($cfg) ? ($cfg['baseUrl'] ?? '') : ''), '/');
$page_title = 'Exclusive Cuts | Haircuts, fades, and walk-ins';
$page_description = 'Exclusive Cuts: zero fades, shavings, mohawks, razor fades, style cuts, and standard cuts. Open Monday to Saturday, 9:00 to 5:30. Walk-ins welcome. Call 022 430 9918.';
$page_path = '/projects/exclusive-cuts/';
$page_og_image = $origin . '/projects/exclusive-cuts/assets/cut-fade.jpeg';
$chrome = 'minimal';
$extra_head = <<<'HTML'
  <link rel="preload" as="image" href="/projects/exclusive-cuts/assets/wood.jpg">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton&family=Archivo:wght@400;600&display=swap">
  <link rel="stylesheet" href="/projects/exclusive-cuts/site.css">
  <script>if(!window.matchMedia("(prefers-reduced-motion: reduce)").matches){document.documentElement.classList.add("gsap-on");}</script>
HTML;
$page_scripts = <<<'HTML'
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
<script src="/projects/exclusive-cuts/site.js" defer></script>
HTML;
?>
<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="ec">
<?php include __DIR__ . '/../../includes/nav.php'; ?>
<a class="call-pill" href="tel:0224309918">Call 022 430 9918</a>
<header class="ec-nav">
  <a class="brand" href="#home">Exclusive <span>Cuts</span></a>
  <nav class="rail" aria-label="Exclusive Cuts">
    <a href="#home">Home</a>
    <a href="#gallery">Gallery</a>
    <a href="#services">Services</a>
    <a href="#hours">Hours</a>
    <a href="#contact">Contact</a>
  </nav>
</header>
<main class="ec">
  <section class="board" id="home">
    <p class="eye">North Shore</p>
    <h1>
      <span class="line">Exclusive</span>
      <span class="line cut">Cuts</span>
    </h1>
    <div class="shear" aria-hidden="true"></div>
  </section>

  <section class="h-pin" id="gallery">
    <div class="h-viewport">
      <div class="wood-cut" aria-hidden="true"></div>
      <div class="gallery-head">
        <h2>Gallery</h2>
        <p class="count" aria-hidden="true">01 / 04</p>
        <button type="button" id="view-more">View more</button>
      </div>
      <div class="h-track">
        <figure><img src="/projects/exclusive-cuts/assets/cut-fade.jpeg" width="960" height="960" alt="A razor fade at Exclusive Cuts"></figure>
        <figure><img src="/projects/exclusive-cuts/assets/cut-tattoo.jpeg" width="768" height="960" alt="A haircut in black and white"></figure>
        <figure><img src="/projects/exclusive-cuts/assets/cut-chair.jpeg" width="768" height="960" alt="A cut in the chair"></figure>
        <figure><img src="/projects/exclusive-cuts/assets/cut-kid.jpeg" width="778" height="960" alt="A child's haircut"></figure>
      </div>
    </div>
  </section>

  <dialog id="more-cuts" aria-label="More of the gallery">
    <form method="dialog"><button class="close" value="close">Close</button></form>
    <div class="more-grid">
      <img src="/projects/exclusive-cuts/assets/cut-fade.jpeg" width="960" height="960" alt="A razor fade at Exclusive Cuts">
      <img src="/projects/exclusive-cuts/assets/cut-tattoo.jpeg" width="768" height="960" alt="A haircut in black and white">
      <img src="/projects/exclusive-cuts/assets/cut-chair.jpeg" width="768" height="960" alt="A cut in the chair">
      <img src="/projects/exclusive-cuts/assets/cut-kid.jpeg" width="778" height="960" alt="A child's haircut">
      <img src="/projects/exclusive-cuts/assets/scissors.jpeg" width="960" height="640" alt="Scissors">
      <img src="/projects/exclusive-cuts/assets/clippers.jpeg" width="960" height="640" alt="Clippers">
    </div>
  </dialog>

  <section class="band cream quality">
    <div class="quality-copy">
      <p class="eye">The chair</p>
      <h2>Quality<br><span class="accent">cuts</span></h2>
      <a class="phone" href="tel:0224309918">022 430 9918</a>
    </div>
    <div class="tools">
      <figure class="tilt">
        <img src="/projects/exclusive-cuts/assets/scissors.jpeg" width="960" height="640" alt="Scissors">
      </figure>
      <figure class="tilt late">
        <img src="/projects/exclusive-cuts/assets/clippers.jpeg" width="960" height="640" alt="Clippers">
      </figure>
    </div>
  </section>

  <section class="band services" id="services">
    <p class="eye">We provide</p>
    <ol>
      <li>Zero Fades</li>
      <li>Shavings</li>
      <li>Mohawks</li>
      <li>Razor Fades</li>
      <li>Style Cuts</li>
      <li>Standard Cuts</li>
    </ol>
  </section>

  <section class="band cream hours" id="hours">
    <p class="eye">Hours</p>
    <div class="when">
      <p>Monday</p>
      <p>Saturday</p>
    </div>
    <p class="clock">9:00 to 5:30</p>
    <p class="walk">Walk-ins welcome</p>
  </section>

  <section class="band contact" id="contact">
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
