<?php
$ml_page = 'contact';
$ml_solid = true;
$page_title = 'Contact | Moonlodge';
$page_description = 'Contact Moonlodge at Waimaunga, Whaingaroa / Raglan, or send an enquiry about a stay or the art studio.';
$page_path = '/projects/moonlodge/contact.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="contactContain">
    <div class="contact">
      <h1 class="usualH1">Contact</h1>
      <!-- Sample details for this concept site. Not a real lodge or listing. -->
      <dl class="contact-list">
        <div><dt>Phone:</dt><dd>(07) 555 0182</dd></div>
        <div><dt>Mob:</dt><dd>021 555 0182</dd></div>
        <div><dt>Email:</dt><dd>stay@moonlodge.example</dd></div>
        <div><dt>Address:</dt><dd>Waimaunga Road, Whaingaroa / Raglan</dd></div>
      </dl>
    </div>
    <div class="enquires">
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
