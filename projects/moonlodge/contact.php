<?php
$ml_page = 'contact';
$page_title = 'Contact | Moonlodge';
$page_description = 'Enquire about a stay or a studio visit at Waimaunga Studio, 236 Waimaunga Rd, Whaingaroa. Phone 027 866 6239.';
$page_path = '/projects/moonlodge/contact.php';
require __DIR__ . '/partials/open.php';
?>
  <section class="split reach" id="contact">
    <div>
      <p class="eye">Contact</p>
      <h1>Enquires</h1>
      <ul class="details">
        <li><span>Phone</span> <a href="tel:0278666239">027 866 6239</a></li>
        <li><span>Studio</span> Waimaunga Studio</li>
        <li><span>Address</span> 236 Waimaunga Rd, Whaingaroa</li>
        <li><span>Visits</span> By appointment</li>
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
<?php require __DIR__ . '/partials/close.php'; ?>
