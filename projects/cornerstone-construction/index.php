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
HTML;
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../includes/head.php'; ?>
<body class="cc">
<?php require __DIR__ . '/../../includes/nav.php'; ?>

<main>
  <header class="cc-bar">
    <p class="cc-brand">Cornerstone<span>Construction</span></p>
    <nav aria-label="On this page">
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
      <h1>Fast work. Right attitude. Excellent results.</h1>
      <div class="cc-actions">
        <a class="cc-call" href="tel:+6421998961">Call 021 998 961</a>
        <a class="cc-send" href="#contact">Send a job</a>
      </div>
    </div>
  </section>

  <section class="cc-about" id="about">
    <figure>
      <img src="/projects/cornerstone-construction/assets/aboutPic.jpg" alt="Cornerstone Construction machinery on site">
      <figcaption>Plant on site</figcaption>
    </figure>
    <div>
      <p class="cc-kicker">What we do</p>
      <h2>Above expectations.</h2>
      <p>At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations.</p>
      <p>At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations.</p>
      <p>At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations.</p>
    </div>
  </section>

  <section class="cc-reviews" id="reviews">
    <p class="cc-kicker">What others have to say</p>
    <h2>Job notes.</h2>
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
      <h2>Book the job.</h2>
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
