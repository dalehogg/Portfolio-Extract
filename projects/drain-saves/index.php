<?php
$cfg = json_decode((string) @file_get_contents(dirname(__DIR__, 2) . '/site.config.json'), true);
$origin = rtrim((string) (is_array($cfg) ? ($cfg['baseUrl'] ?? '') : ''), '/');
$page_title = 'Drain Saves | Overflow and flood prevention in Auckland';
$page_description = 'Drain Saves stops sewer and stormwater backflow before it reaches Auckland homes and businesses. Civil, commercial, residential and maintenance work, with free quotes on the fly.';
$page_path = '/projects/drain-saves/';
$page_og_image = $origin . '/projects/drain-saves/assets/logo.png';
$chrome = 'minimal';
$extra_head = <<<'HTML'
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500;700&display=swap">
  <link rel="stylesheet" href="site.css">
HTML;
$page_scripts = '<script src="site.js" defer></script>';
?>
<!DOCTYPE html>
<html lang="en">
<?php include __DIR__ . '/../../includes/head.php'; ?>
<body class="ds">
<?php include __DIR__ . '/../../includes/nav.php'; ?>
<main class="ds">
  <section class="well" id="home" data-drift>
    <div class="bloom" aria-hidden="true"></div>
    <div class="tide" data-parallax="-0.05" aria-hidden="true"></div>
    <div class="mark-stage">
      <img class="mark" src="assets/logo.png" width="1000" height="1000" alt="Drain Saves">
    </div>
    <p class="eye">Auckland</p>
    <h1>Overflow and flood prevention</h1>
    <p class="lede">Stop sewer and stormwater backflow before it reaches your property.</p>
    <a class="call" href="tel:02108169900">Call 021 081 699 00</a>
    <a class="job-note" href="#contact">Send a job note</a>
    <nav class="rail" aria-label="Drain Saves">
      <a href="#services">Services</a>
      <a href="#about">About</a>
      <a href="#gallery">Gallery</a>
      <a href="#reviews">Reviews</a>
      <a href="#contact">Contact</a>
    </nav>
  </section>

  <section class="shaft" id="services" data-span>
    <div class="staff" aria-hidden="true"><span class="bead"></span></div>
    <p class="eye">Services</p>
    <ol>
      <li data-reveal>
        <span>01</span>
        <div>
          <h2>Civil</h2>
          <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M8 34h32M14 34V22l10-8 10 8v12M20 34v-8h8v8"/></svg>
        </div>
      </li>
      <li data-reveal>
        <span>02</span>
        <div>
          <h2>Commercial</h2>
          <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M10 38V16l8-6h12l8 6v22M18 38V26h12v12M22 20h4M22 26h4"/></svg>
        </div>
      </li>
      <li data-reveal>
        <span>03</span>
        <div>
          <h2>Residential</h2>
          <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M8 24 L24 10 L40 24 V38 H8 Z M20 38 V28 H28 V38"/></svg>
        </div>
      </li>
      <li data-reveal>
        <span>04</span>
        <div>
          <h2>Maintenance</h2>
          <svg viewBox="0 0 48 48" aria-hidden="true"><path d="M18 30l14-14 4 4-14 14H18v-4zM30 14l4 4"/></svg>
        </div>
      </li>
    </ol>
  </section>

  <section class="horizon" data-drift>
    <p data-reveal>Our free quotes or advise can be provided on the fly.</p>
    <a class="phone" href="tel:02108169900">021 081 699 00</a>
  </section>

  <section class="banner" data-drift>
    <div class="banner-photo" style="background-image:url('assets/prevention.jpg')"></div>
    <h2>Reliable back flow prevention solutions</h2>
  </section>

  <section class="about" id="about">
    <div class="about-copy">
      <p class="eye">About us</p>
      <h2 data-reveal>Drain Saves</h2>
      <p data-reveal>At Drain Saves, we are dedicated to providing top-notch drainage solutions across Auckland. With our team of highly skilled professionals, we strive to deliver exceptional service and exceed our clients' expectations. Whether it's a residential or commercial project, we have the expertise and resources to handle any drainage issue efficiently and effectively.</p>
      <p data-reveal>We specialize in advanced overflow solutions and comprehensive flood prevention services, safeguarding your property during severe storms and flash floods. By installing heavy-duty back-flow preventers, non-return valves, and custom storm-water management systems, we minimise the chance for sewage backups and rising waters from breaching your home or business.</p>
      <p data-reveal>Our commitment to quality, reliability, and customer satisfaction sets us apart as a trusted name in the industry. Trust Drain Saves for all your drainage and flood mitigation needs, and experience the difference of working with a reliable, experienced team.</p>
    </div>
    <figure class="about-figure" data-drift>
      <img src="assets/land.jpg" width="1200" height="800" alt="A channel drain being set into paving">
    </figure>
  </section>

  <section class="gallery" id="gallery">
    <p class="eye">Gallery</p>
    <figure data-reveal>
      <img src="assets/repair.jpg" alt="Drainage repair">
    </figure>
    <figure class="shift" data-reveal>
      <img src="assets/site-work.jpg" alt="Drainage work on site">
    </figure>
  </section>

  <section class="banner banner-standards" data-drift>
    <div class="banner-photo" style="background-image:url('assets/standards.jpg')"></div>
    <h2>Highest<br>Standards</h2>
  </section>

  <section class="reviews" id="reviews">
    <p class="eye">Reviews</p>
    <blockquote data-reveal>
      <p>“ Work was completed ahead of time. Excellent results. I couldn't recommend a better guy to lay your foundation. I'll be recommeneding this company to many people. ”</p>
    </blockquote>
    <blockquote data-reveal>
      <p>“ Work was completed ahead of time. Excellent results. I couldn't recommend a better guy to lay your foundation. I'll be recommeneding this company to many people. ”</p>
    </blockquote>
    <blockquote data-reveal>
      <p>“ Awesome work well done. Came early all the time and was vey reliable. I recommend his services for big or small jobs ”</p>
    </blockquote>
  </section>

  <section class="contact" id="contact">
    <div>
      <p class="eye">Contact us</p>
      <h2>Tell us about the water.</h2>
      <p class="note">Name, phone, and a message. The same line is open if you would rather call.</p>
      <a class="phone slim" href="tel:02108169900">021 081 699 00</a>
    </div>
    <form id="client-form" action="https://formsubmit.co/dhdaleleon@gmail.com" method="POST">
      <input type="hidden" name="_subject" value="Drain Saves website enquiry">
      <input type="hidden" name="_template" value="table">
      <input type="hidden" name="_captcha" value="false">
      <input type="hidden" name="_next" value="">
      <p class="honey" aria-hidden="true">
        <label>Leave this field empty<input type="text" name="_honey" tabindex="-1" autocomplete="off"></label>
      </p>
      <label for="ds-name">Name</label>
      <input id="ds-name" name="name" type="text" autocomplete="name" placeholder="John Smith" required>
      <label for="ds-phone">Phone No.</label>
      <input id="ds-phone" name="number" type="tel" autocomplete="tel" placeholder="(+64)" required>
      <label for="ds-message">Message</label>
      <textarea id="ds-message" name="message" rows="6" placeholder="Type query here" required></textarea>
      <button type="submit">Send</button>
    </form>
  </section>

  <p class="colophon">Drain Saves © Copyright 2023 All Rights Reserved</p>

  <section class="ask">
    <p>Want something like this?</p>
    <a href="/#contact">Get a quote</a>
  </section>
</main>
<?php include __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
