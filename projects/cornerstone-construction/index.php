<?php
$page_title = 'Cornerstone Construction | Soffit';
$page_description = 'Cornerstone Construction, rebuilt: fast work, the right attitude, and excellent results. What we do, reviews, and a way to get in touch.';
$page_path = '/projects/cornerstone-construction/';
$page_og_image = '/projects/cornerstone-construction/assets/landingPic.jpg';
$extra_head = '<link rel="stylesheet" href="/projects/cornerstone-construction/site.css">';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../includes/head.php'; ?>
<body class="cc">
<?php require __DIR__ . '/../../includes/nav.php'; ?>

<main>
  <section class="cc-hero" id="home">
    <div class="cc-hero-photo" data-parallax="0.18" style="background-image:url('/projects/cornerstone-construction/assets/landingPic.jpg')"></div>
    <div class="cc-hero-copy">
      <p class="cc-mark">Construction</p>
      <h1>Cornerstone</h1>
      <nav class="cc-jump" aria-label="On this page">
        <a href="#about">About</a>
        <a href="#reviews">Reviews</a>
        <a href="#contact">Contact</a>
      </nav>
    </div>
  </section>

  <section class="cc-qualities" aria-label="Fast work, right attitude, excellent results">
    <ul data-parallax="-0.08">
      <li>Fast</li><li>Work</li><li>Right</li><li>Attitude</li><li>Excellent</li><li>Results</li>
    </ul>
  </section>

  <section class="cc-about" id="about">
    <figure class="cc-portrait" data-reveal>
      <img src="/projects/cornerstone-construction/assets/aboutPic.jpg" alt="Cornerstone Construction machinery on site">
    </figure>
    <div data-reveal>
      <p class="kicker">What we do</p>
      <h2>Above expectations.</h2>
      <p>At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations.</p>
      <p>At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations.</p>
      <p>At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations. At Cornerstone Construction we are always ready to put a smile on every customers face as our work is completed above expectations.</p>
    </div>
  </section>

  <section class="cc-reviews" id="reviews">
    <div class="cc-wrap">
      <p class="kicker">What others have to say</p>
      <h2>In their words.</h2>
      <blockquote data-reveal>
        <p>Work was completed ahead of time. Excellent results. I couldn't recommend a better guy to lay your foundation. I'll be recommeneding this company to many people.</p>
      </blockquote>
      <blockquote data-reveal>
        <p>Very friendly. Kept me up to date the whole time. Made sure what was being done was what I wanted the whole time.</p>
      </blockquote>
      <blockquote data-reveal>
        <p>Awesome work well done. Came early all the time and was vey reliable. I recommend his services for big or small jobs.</p>
      </blockquote>
    </div>
  </section>

  <section class="cc-contact" id="contact">
    <div data-reveal>
      <p class="kicker">Contact us</p>
      <h2>Start a job.</h2>
      <p class="cc-phone"><a href="tel:+6421998961">021 998 961</a></p>
    </div>
    <form data-reveal action="https://formsubmit.co/dhdaleleon@gmail.com" method="POST">
      <input type="hidden" name="_subject" value="Cornerstone Construction enquiry">
      <input type="hidden" name="_template" value="table">
      <input type="hidden" name="_captcha" value="false">
      <input type="hidden" name="_next" value="">
      <p class="honey" aria-hidden="true"><label>Leave this field empty<input type="text" name="_honey" tabindex="-1" autocomplete="off"></label></p>
      <label for="cc-name">Name</label>
      <input id="cc-name" name="name" type="text" autocomplete="name" required>
      <label for="cc-phone">Phone No.</label>
      <input id="cc-phone" name="phone" type="tel" autocomplete="tel" required>
      <label for="cc-message">Message</label>
      <textarea id="cc-message" name="message" rows="5" required></textarea>
      <button type="submit">Send</button>
    </form>
  </section>

  <p class="cc-copy">Copyright 2019 All Rights Reserved</p>

  <section class="cc-quote" data-reveal>
    <h2>A site that leads with the work.</h2>
    <p>Soffit designs and builds sites like this. Dale Hogg does the work.</p>
    <a class="button button-primary" href="/#contact">Get a quote</a>
  </section>
</main>

<?php require __DIR__ . '/../../includes/footer.php'; ?>
</body>
</html>
