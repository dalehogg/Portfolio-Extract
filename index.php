<?php
require __DIR__ . '/includes/site.php';
$page_title = 'Soffit | Freelance web design and development, Auckland NZ';
$page_description = 'Soffit is Dale Hogg\'s freelance web design and development practice, based in Auckland and working with clients worldwide. Landing pages, business sites and custom builds, fixed-quoted.';
$page_path = '/';
$page_faqs = [
    ['How long does a website take?', 'A landing page is often ready in a couple of weeks once I have your words and pictures. A business site is often three to six weeks. A custom build depends on the scope we agree first. The timing goes in the quote.'],
    ['How do revisions work?', 'The quote includes time for you to review the design and the build and ask for changes. I will say how many review rounds are included before you agree. Work outside that scope is quoted separately.'],
    ['Do you host the site?', 'I can launch onto hosting you already pay for, or help you choose a host. Hosting is billed by the host. It is not folded into the starting prices unless the quote says so.'],
    ['Who owns the site?', 'You do. After the final invoice is paid, the design, the pages, and the code are yours, and I hand over the files.'],
    ['What do you need from me to start?', 'A short description of the business, who the site is for, and any logo, photos, or text you already have. If the words are not ready, we can start from a conversation.'],
    ['How do payments work?', 'I send a fixed quote for the agreed scope before I start. The quote sets out when payment is due. I do not publish one price that fits every project.'],
];
$extra_head = '<link rel="stylesheet" href="/css/globals.css">' . "\n" . '<link rel="stylesheet" href="/css/main.css">' . "\n" . '<link rel="stylesheet" href="/css/home.css">';
$page_scripts = '<script src="/js/sky.js?v=r14" defer></script>' . "\n" . '<script src="/js/full.js" defer></script>' . "\n" . '<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>' . "\n" . '<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>' . "\n" . '<script src="/js/gsap-scroll.js?v=r14" defer></script>';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/includes/head.php'; ?>
<body class="backNight">
<?php require __DIR__ . '/includes/nav.php'; ?>

  <div id="nightSky" aria-hidden="true">
    <canvas id="stillfield" data-depth="16"></canvas>
    <canvas id="starfield" data-depth="34"></canvas>
    <canvas id="twinklefield" data-depth="52"></canvas>
    <canvas id="driftfield" data-depth="78"></canvas>
    <canvas id="shooting" data-depth="60"></canvas>
    <canvas id="planet" data-depth="22"></canvas>
    <canvas id="sky-lines"></canvas>
  </div>
  <div class="cloudsLightOne noOpac" aria-hidden="true"></div>
  <div class="cloudsLightTwo noOpac" aria-hidden="true"></div>

  <div id="fullpage">
    <section class="section section-one" id="top">
      <div class="galaxy-center" aria-hidden="true"></div>
      <div class="realMoon-container" aria-hidden="true">
        <div class="realMoon-moonCut"></div>
      </div>
      <div class="flare hide" aria-hidden="true"><div class="in"></div></div>
      <div class="hero-copy">
        <h1>Sites that earn their keep.</h1>
        <p class="lede">Freelance web design and development in New Zealand, by Dale Hogg.</p>
        <div class="hero-actions">
          <a class="button button-primary" href="#contact">Start a project</a>
        </div>
      </div>
      <p class="scroll-cue"><i aria-hidden="true"></i> Scroll</p>
    </section>
  </div>

  <main>
    <section class="band band-alt" id="services" data-reveal>
      <div class="wrap split-head">
        <div class="sticky-head">
          <p class="kicker">Services</p>
          <h2>What I can take on</h2>
        </div>
        <div class="service-grid">
          <article class="service-card reveal">
            <span>01</span>
            <h3>Custom website design</h3>
            <p>A look and a page structure that fit the business, organised around what a visitor needs to do next.</p>
          </article>
          <article class="service-card reveal">
            <span>02</span>
            <h3>Website development</h3>
            <p>The design built into a responsive site you can try on your own phone before it goes live.</p>
          </article>
          <article class="service-card reveal">
            <span>03</span>
            <h3>Redesigns and refreshes</h3>
            <p>Keep what still works on the current site. Replace what is dated, slow, or hard to follow.</p>
          </article>
          <article class="service-card reveal">
            <span>04</span>
            <h3>Landing pages</h3>
            <p>One focused page for a launch, an offer, or a campaign, with a single next step.</p>
          </article>
          <article class="service-card reveal">
            <span>05</span>
            <h3>Care and support</h3>
            <p>After launch: small updates, fixes, and someone to write to so the site does not go stale.</p>
          </article>
        </div>
      </div>
      <p class="band-cta wrap"><a class="button button-primary" href="#contact" data-project-type="Not sure yet">Tell me what you need</a></p>
    </section>

    <section class="band" id="pricing" data-reveal>
      <div class="wrap">
        <p class="kicker">Pricing</p>
        <h2>Starting points.</h2>
        <p class="intro">Typical NZD figures for a straightforward brief, GST included. The quote is a fixed price for an agreed scope.</p>
        <div class="price-grid" id="price-grid">
<?php site_pricing(); ?>
        </div>
        <p class="fine-print">Prices include GST. Starting prices in NZD. Hosting, domain names, and third-party services are extra unless the quote says otherwise.</p>
      </div>
    </section>

    <section class="band band-alt" id="work" data-reveal>
      <div class="wrap">
        <p class="kicker">Selected work</p>
        <h2>Projects.</h2>
        <div class="showcase">
          <a class="frame" data-gsap href="/projects/drain-saves/">
            <span class="frame-shot"><img src="/Img/work/drain-saves.jpg" width="1200" height="750" loading="lazy" decoding="async" alt="Drain Saves, overflow and flood prevention with the company mark"></span>
            <span class="frame-meta"><strong>Drain Saves</strong><em>Overflow and flood prevention.</em><span>View project</span></span>
          </a>
          <a class="frame" data-gsap href="/projects/cornerstone-construction/">
            <span class="frame-shot"><img src="/Img/work/cornerstone.jpg" width="1200" height="750" loading="lazy" decoding="async" alt="Cornerstone Construction homepage with an excavator and a gold call button"></span>
            <span class="frame-meta"><strong>Cornerstone</strong><em>Fast work. Right attitude.</em><span>View project</span></span>
          </a>
          <a class="frame" data-gsap href="/projects/exclusive-cuts/">
            <span class="frame-shot"><img src="/Img/work/exclusive-cuts.jpg" width="1200" height="750" loading="lazy" decoding="async" alt="Exclusive Cuts, the name in white and red beside a timber wall"></span>
            <span class="frame-meta"><strong>Exclusive Cuts</strong><em>A North Shore barbershop.</em><span>View project</span></span>
          </a>
          <a class="frame" data-gsap href="/projects/moonlodge/">
            <span class="frame-shot"><img src="/Img/work/moonlodge.jpg" width="1200" height="750" loading="lazy" decoding="async" alt="Moonlodge home page: the name over a west coast beach below green hills"></span>
            <span class="frame-meta"><strong>Moonlodge</strong><em>Stay beside the west coast.</em><span>View project</span></span>
          </a>
          <a class="frame" data-gsap data-desktop-only href="/projects/custom-paint/">
            <span class="frame-shot"><img src="/Img/work/custom-paint.jpg" width="1200" height="750" loading="lazy" decoding="async" alt="Custom Paint landing page, with a button that opens the studio"><span class="desktop-only-tag">Desktop only</span></span>
            <span class="frame-meta"><strong>Custom Paint</strong><em>Mark a photo, then send it.</em><span>View project</span></span>
          </a>
          <a class="frame" data-gsap data-desktop-only href="/projects/job-pack-maker/">
            <span class="frame-shot"><img src="/Img/work/job-pack-maker.jpg" width="1200" height="750" alt="Job Pack Maker landing page, with a shot of the email builder"><span class="desktop-only-tag">Desktop only</span></span>
            <span class="frame-meta"><strong>Job Pack Maker</strong><em>Turn a job into an email draft.</em><span>View project</span></span>
          </a>
        </div>
      </div>
    </section>

    <section class="band" id="why" data-reveal>
      <div class="wrap">
        <p class="kicker">Why work with me</p>
        <h2>Plain terms.</h2>
        <div class="why-grid">
          <article class="why-card" data-reveal><span>01</span><h3>Fixed quote</h3><p>A price for the agreed scope, before I start.</p></article>
          <article class="why-card" data-reveal><span>02</span><h3>Direct</h3><p>You write to me. I reply. Design and build are both done by Dale.</p></article>
          <article class="why-card" data-reveal><span>03</span><h3>Phones first</h3><p>Laid out for a small screen, then widened.</p></article>
          <article class="why-card" data-reveal><span>04</span><h3>Yours</h3><p>After the final invoice, the site and the code are yours. A walkthrough at launch, then care if you want it.</p></article>
        </div>
      </div>
    </section>

    <!--
      TESTIMONIALS TOGGLE
      The only switch is "showTestimonials" in site.config.json.
      Set it to true only after the placeholder quotes in that file are real client words, then run bash build.sh.
      This section stays out of the live page while the flag is false.
    -->
    <section class="band band-alt testimonials" id="testimonials" <?php echo site_testimonial_attrs(); ?>>
      <div class="wrap">
        <p class="kicker">Testimonials</p>
        <h2>In their words</h2>
        <p class="intro">Notes from people Dale has worked with. Placeholder lines stay marked until they are replaced.</p>
        <div class="quote-grid">
<?php foreach (site_config()['testimonials'] ?? [] as $t): ?>
<blockquote class="quote-card"><p><?php echo site_h($t['quote']); ?></p><footer><?php echo site_h($t['name']); ?>, <?php echo site_h($t['business']); ?></footer></blockquote>
<?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="band band-alt" id="process" data-reveal>
      <div class="wrap">
        <p class="kicker">How I work</p>
        <h2>Four steps.</h2>
        <div class="timeline">
          <article class="step" data-reveal><span>01</span><h3>Discovery</h3><p>Who it is for, and what it needs to do.</p></article>
          <article class="step" data-reveal><span>02</span><h3>Design</h3><p>Pages and a look, reviewed before the build.</p></article>
          <article class="step" data-reveal><span>03</span><h3>Build</h3><p>You try it on your own phone.</p></article>
          <article class="step" data-reveal><span>04</span><h3>Launch</h3><p>Live, with a walkthrough.</p></article>
        </div>
      </div>
    </section>

    <section class="band" id="about" data-reveal>
      <div class="wrap about-layout">
        <div class="about-mark" aria-hidden="true"><span>DH</span></div>
        <div>
          <p class="kicker">About</p>
          <h2>Dale Hogg.</h2>
          <p class="intro">Soffit is my freelance practice. I'm based in Auckland, working with clients worldwide, and you deal with me. Brochure sites through to web apps. If a simpler site will do, I will say so.</p>
          <p class="tools-line">HTML, CSS, Vue, Nuxt, Gulp, Git</p>
        </div>
      </div>
    </section>

    <section class="band band-alt" id="questions" data-reveal>
      <div class="wrap">
        <p class="kicker">Questions</p>
        <h2>Before you write.</h2>
        <div class="faq">
<?php foreach ($page_faqs as $faq_item): ?>
          <details>
            <summary><?php echo site_h($faq_item[0]); ?><span class="chev" aria-hidden="true"></span></summary>
            <div class="faq-panel"><div class="faq-panel-in"><p><?php echo site_h($faq_item[1]); ?></p></div></div>
          </details>
<?php endforeach; ?>
        </div>
        <p class="band-cta" style="margin-top:1.4rem"><a class="button button-primary" href="#contact">Ask a question in the form</a></p>
      </div>
    </section>

    <section class="band" id="contact" data-reveal>
      <div class="wrap contact-layout">
        <div>
          <p class="kicker">Start a project</p>
          <h2>Tell me what you need.</h2>
          <p class="intro">I reply by email with questions, then a fixed quote.</p>
          <p class="contact-email"><a href="mailto:dhdaleleon@gmail.com">dhdaleleon@gmail.com</a></p>
          <ul class="contact-facts">
            <li><span>Phone</span> <a href="tel:+642108169900">021 0816 9900</a></li>
            <li><span>Hours</span> Monday to Friday, 9:00 am to 5:00 pm NZT</li>
            <li><span>Location</span> Based in Auckland, working with clients worldwide</li>
          </ul>
        </div>
        <div>
          <form id="enquiry-form" action="https://formsubmit.co/dhdaleleon@gmail.com" method="POST">
            <input type="hidden" name="_subject" value="Project enquiry from the Soffit website">
            <input type="hidden" name="_template" value="table">
            <input type="hidden" name="_captcha" value="false">
            <input type="hidden" name="_next" value="">
            <input type="hidden" name="_replyto" value="">
            <p class="honey" aria-hidden="true">
              <label>Leave this field empty<input type="text" name="_honey" tabindex="-1" autocomplete="off" style="display:none"></label>
            </p>
            <div class="form-row">
              <div class="field">
                <label for="name">Name</label>
                <input id="name" name="Name" type="text" autocomplete="name" required>
              </div>
              <div class="field">
                <label for="email">Email</label>
                <input id="email" name="Email" type="email" autocomplete="email" required>
              </div>
            </div>
            <div class="form-row">
              <div class="field">
                <label for="budget">Budget <span class="optional">(optional)</span></label>
                <input id="budget" name="Budget" type="text" placeholder="A range is fine" autocomplete="off">
              </div>
              <div class="field">
                <label for="project-type">Project type <span class="optional">(optional)</span></label>
                <select id="project-type" name="Project Type">
                  <option value="">Choose if you know</option>
                  <option>Landing page</option>
                  <option>Business site</option>
                  <option>Redesign or refresh</option>
                  <option>Custom build</option>
                  <option>Care plan</option>
                  <option>Not sure yet</option>
                </select>
              </div>
            </div>
            <div class="field">
              <label for="message">Message</label>
              <textarea id="message" name="Message" rows="6" required></textarea>
            </div>
            <button class="submit-button" type="submit">Send enquiry</button>
          </form>
        </div>
      </div>
    </section>
  </main>

  <div id="desktop-only-modal" class="desktop-only-modal" hidden role="dialog" aria-modal="true" aria-labelledby="desktop-only-title" aria-describedby="desktop-only-copy">
    <div class="desktop-only-backdrop" data-desktop-only-close></div>
    <div class="desktop-only-panel" role="document">
      <h2 id="desktop-only-title">Best on a laptop or desktop</h2>
      <p id="desktop-only-copy">This project isn't available on mobile or tablet yet. It's built for bigger screens, so please open it on a laptop or desktop.</p>
      <button type="button" class="button" data-desktop-only-close>Close</button>
    </div>
  </div>

<?php require __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
