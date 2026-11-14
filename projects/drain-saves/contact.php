<?php
$ds_page = 'contact';
$page_title = 'Contact | Drain Saves';
$page_description = 'Call Drain Saves on 021 081 699 00 or send a job note. Free quotes or advise can be provided on the fly.';
$page_path = '/projects/drain-saves/contact.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="split contact" id="contact">
    <div>
      <p class="eye">Contact us</p>
      <h1>Tell us about the water.</h1>
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
<?php require __DIR__ . '/partials/close.php'; ?>
