<?php
$ml_page = 'contact';
$ml_solid = true;
$page_title = 'Contact | Moonlodge';
$page_description = 'Contact Moonlodge at Waimaunga, Whaingaroa / Raglan, or send an enquiry about a stay or the art studio.';
$page_path = '/projects/moonlodge/contact.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="contact-page">
    <div class="contact-copy">
      <p class="ml-kicker">Waimaunga, Whaingaroa / Raglan</p>
      <h1 class="usualH1">Contact</h1>
      <p>Get in touch about a stay at the lodge, or to visit the art studio by appointment. We are at Waimaunga, in Whaingaroa / Raglan.</p>

      <!-- Sample details for this concept site. Not a real lodge or listing. -->
      <ul class="contact-facts">
        <li>
          <span class="ml-icon" aria-hidden="true">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8.2 3.8h2.1l1 2.6-1.6 1.1a11 11 0 0 0 5.7 5.7l1.1-1.6 2.6 1v2.1c0 .9-.8 1.6-1.7 1.5C10.6 16.6 3.4 9.4 3.3 5.5c-.1-.9.6-1.7 1.5-1.7z"/></svg>
          </span>
          <div>
            <h2>Phone</h2>
            <p>(07) 555 0182</p>
          </div>
        </li>
        <li>
          <span class="ml-icon" aria-hidden="true">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="3.5" width="12" height="17" rx="2"/><path d="M10 18.5h4"/></svg>
          </span>
          <div>
            <h2>Mob</h2>
            <p>021 555 0182</p>
          </div>
        </li>
        <li>
          <span class="ml-icon" aria-hidden="true">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="3.5" y="6" width="17" height="12" rx="1.5"/><path d="M4.5 8l7.5 5 7.5-5"/></svg>
          </span>
          <div>
            <h2>Email</h2>
            <p>stay@moonlodge.example</p>
          </div>
        </li>
      </ul>

      <div class="contact-location">
        <?php echo ml_img('localAttractions/Raglan/RaglanOceanBeach.jpg', 'The west coast near Whaingaroa / Raglan', '(min-width: 900px) 36vw, 100vw'); ?>
        <div class="contact-location-text">
          <p class="ml-kicker">Address</p>
          <p>Waimaunga Road, Whaingaroa / Raglan</p>
          <p class="contact-location-note">Studio visits are by appointment.</p>
        </div>
      </div>
    </div>

    <div class="contact-form">
      <p class="ml-kicker">Write to us</p>
      <h2 class="usualH1">Enquires</h2>
      <form id="ml-form" action="https://formsubmit.co/dhdaleleon@gmail.com" method="POST">
        <input type="hidden" name="_subject" value="Moonlodge website enquiry">
        <input type="hidden" name="_template" value="table">
        <input type="hidden" name="_captcha" value="false">
        <input type="hidden" name="_next" value="">
        <input type="hidden" name="_replyto" value="">
        <p class="honey" aria-hidden="true">
          <label>Leave this field empty<input type="text" name="_honey" tabindex="-1" autocomplete="off"></label>
        </p>
        <div class="enquiresInputs-row">
          <div class="enquiresInputs">
            <label for="ml-first">First Name</label>
            <input id="ml-first" name="First Name" type="text" autocomplete="given-name" required>
          </div>
          <div class="enquiresInputs">
            <label for="ml-last">Last Name</label>
            <input id="ml-last" name="Last Name" type="text" autocomplete="family-name">
          </div>
        </div>
        <div class="enquiresInputs">
          <label for="ml-email">Email</label>
          <input id="ml-email" name="Email" type="email" autocomplete="email" required>
        </div>
        <div class="enquiresInputs">
          <label for="ml-message">Message</label>
          <textarea id="ml-message" name="Message" rows="8" required></textarea>
        </div>
        <div class="enquiresInputs">
          <button class="ml-button ml-button-dark submit" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </section>
<?php require __DIR__ . '/partials/close.php'; ?>
