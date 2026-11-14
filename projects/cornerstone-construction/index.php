<?php
$chrome = 'minimal';
$page_title = 'Cornerstone Construction | Soffit';
$page_description = 'Cornerstone Construction, rebuilt: fast work, the right attitude, and excellent results. What we do, reviews, and a way to get in touch.';
$page_path = '/projects/cornerstone-construction/';
$page_og_image = '/projects/cornerstone-construction/assets/landingPic.jpg';
$extra_head = <<<'HTML'
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Archivo:wght@400;600&family=Roboto+Mono:wght@400;500&display=swap">
<link rel="stylesheet" href="/projects/cornerstone-construction/site.css">
<style>:root{--chrome-fg:#1c1c1c;--chrome-bg:#d2b62a}</style>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>
<script src="/js/gsap-scroll.js" defer></script>
HTML;
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../includes/head.php'; ?>
<body class="cc">
<?php require __DIR__ . '/../../includes/nav.php'; ?>

<main>
  <header class="cc-bar" data-menu>
    <a class="cc-logo" href="#home" aria-label="Cornerstone Construction">
      <svg class="homeLiLogo" width="480" height="84" viewBox="0 0 480 104" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Desktop-HD" transform="translate(-518.000000, -312.000000)" fill="#000000">
            <text id="Construction" font-family="GillSans-Bold, Gill Sans" font-size="32" font-weight="bold" letter-spacing="3.76470757">
              <tspan x="639.653942" y="403">CONSTRUCTION</tspan>
            </text>
            <text id="Cornerstone" font-family="GillSans-Bold, Gill Sans" font-size="48" font-weight="bold" letter-spacing="2">
              <tspan x="577.355469" y="358">CORNERSTONE</tspan>
            </text>
            <g id="Main-Logo" transform="translate(518.000000, 312.000000)">
              <g id="Group">
                <rect id="Rectangle" x="0" y="0" width="50.6976744" height="48.195122" rx="4"></rect>
                <rect id="Rectangle" x="0" y="55.804878" width="50.6976744" height="48.195122" rx="4"></rect>
                <rect id="Rectangle" x="58.3023256" y="55.804878" width="50.6976744" height="48.195122" rx="4"></rect>
              </g>
            </g>
          </g>
        </g>
      </svg>
    </a>
    <button class="cc-menu" type="button" data-menu-toggle aria-expanded="false" aria-controls="cc-nav">Menu</button>
    <nav id="cc-nav" data-menu-panel aria-label="On this page">
      <a href="#about">About</a>
      <a href="#reviews">Reviews</a>
      <a href="#contact">Contact</a>
    </nav>
    <a class="cc-call" href="tel:+6421998961">Call 021 998 961</a>
  </header>

  <section class="cc-hero" id="home">
    <div class="cc-hero-photo">
      <img src="/projects/cornerstone-construction/assets/landingPic.jpg" alt="Cornerstone Construction excavator on a job site" width="2048" height="1152" fetchpriority="high">
    </div>
    <div class="cc-hero-spec">
      <p>Site photograph</p>
      <h1 data-split>Fast work. Right attitude. Excellent results.</h1>
      <div class="cc-actions">
        <a class="cc-call" href="tel:+6421998961">Call 021 998 961</a>
        <a class="cc-send" href="#contact">Send a job</a>
      </div>
    </div>
  </section>

  <section class="cc-marks" aria-label="Fast work, right attitude, excellent results">
    <p class="cc-kicker">The standard</p>
    <ul>
      <li><strong>Fast</strong><span>Work</span></li>
      <li><strong>Right</strong><span>Attitude</span></li>
      <li><strong>Excellent</strong><span>Results</span></li>
    </ul>
  </section>

  <section class="cc-about" id="about">
    <h2 class="cc-display" data-split>Above expectations.</h2>
    <div class="cc-about-grid">
      <figure data-clip>
        <img src="/projects/cornerstone-construction/assets/aboutPic.jpg" alt="Cornerstone Construction machinery on site" width="1600" height="1067">
        <figcaption>Plant on site</figcaption>
      </figure>
      <div>
        <p class="cc-kicker">What we do</p>
        <p>At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations.</p>
        <p>At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations.</p>
        <p>At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations.</p>
      </div>
    </div>
  </section>

  <section class="cc-pin" aria-label="Photographs from the site">
    <div class="cc-pin-head">
      <p class="cc-kicker">On site</p>
      <h2 data-split>The plant and the ground.</h2>
    </div>
    <div class="cc-track">
      <figure data-clip><img src="/projects/cornerstone-construction/assets/stock/site.jpg" alt="A building frame on a construction site" width="1600" height="1067"><figcaption>The frame</figcaption></figure>
      <figure data-clip><img src="/projects/cornerstone-construction/assets/stock/crew.jpg" alt="Crew on a construction site" width="1600" height="1060"><figcaption>The crew</figcaption></figure>
      <figure data-clip><img src="/projects/cornerstone-construction/assets/stock/frame.jpg" alt="Architectural drawings on a desk" width="1600" height="900"><figcaption>The drawings</figcaption></figure>
    </div>
  </section>

  <section class="cc-reviews" id="reviews">
    <div class="cc-reviews-intro">
      <p class="cc-kicker">What others have to say</p>
      <h2 data-split>Job notes.</h2>
    </div>
    <blockquote>
      <p>Work was completed ahead of time. Excellent results. I couldn't recommend a better guy to lay your foundation. I'll be recommeneding this company to many people.</p>
    </blockquote>
    <blockquote>
      <p>Very friendly. Kept me up to date the whole time. Made sure what was being done was what I wanted the whole time.</p>
    </blockquote>
    <blockquote>
      <p>Awesome work well done. Came early all the time and was vey reliable. I recommend his services for big or small jobs.</p>
    </blockquote>
  </section>

  <section class="cc-contact" id="contact">
    <div>
      <p class="cc-kicker">Contact us</p>
      <h2 data-split>Book the job.</h2>
      <a class="cc-phone" href="tel:+6421998961">021 998 961</a>
    </div>
    <form action="https://formsubmit.co/dhdaleleon@gmail.com" method="POST">
      <input type="hidden" name="_subject" value="Cornerstone Construction enquiry">
      <input type="hidden" name="_template" value="table">
      <input type="hidden" name="_captcha" value="false">
      <input type="hidden" name="_next" value="">
      <p class="cc-honey"><label>Leave this field empty<input type="text" name="_honey" tabindex="-1" autocomplete="off"></label></p>
      <label for="cc-name">Name</label>
      <input id="cc-name" name="name" type="text" autocomplete="name" required>
      <label for="cc-phone">Phone No.</label>
      <input id="cc-phone" name="phone" type="tel" autocomplete="tel" required>
      <label for="cc-message">Message</label>
      <textarea id="cc-message" name="message" rows="5" required></textarea>
      <button type="submit">Send the job</button>
    </form>
  </section>

  <p class="cc-copy">Copyright 2019 All Rights Reserved</p>
</main>

<?php require __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
