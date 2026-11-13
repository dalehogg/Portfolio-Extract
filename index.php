<?php
require __DIR__ . '/includes/site.php';
$page_title = 'Soffit | Freelance web design and development in New Zealand';
$page_description = 'Soffit is Dale Hogg\'s freelance web design and development practice in New Zealand. Landing pages, business sites, and custom builds, with a fixed quote before work starts.';
$page_path = '/';
$extra_head = '<link rel="stylesheet" href="/css/globals.css">' . "\n" . '<link rel="stylesheet" href="/css/main.css">' . "\n" . '<link rel="stylesheet" href="/css/home.css">';
$page_scripts = '<script src="/js/sky.js" defer></script>' . "\n" . '<script src="/js/full.js" defer></script>';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/includes/head.php'; ?>
<body class="backNight">
<?php require __DIR__ . '/includes/nav.php'; ?>

  <div id="nightSky" aria-hidden="true">
    <canvas id="stillfield" data-parallax="0.035"></canvas>
    <canvas id="starfield" data-parallax="0.08"></canvas>
    <canvas id="twinklefield" data-parallax="0.15"></canvas>
    <canvas id="driftfield" data-parallax="0.24"></canvas>
    <canvas id="shooting" data-parallax="0.18"></canvas>
    <canvas id="planet" data-parallax="0.05"></canvas>
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
    <section class="band" data-reveal aria-label="What you can expect">
      <div class="wrap">
        <ul class="promise-row">
          <li><strong>Fixed quote</strong> Agreed scope, agreed price, before the build.</li>
          <li><strong>Direct</strong> You email Dale. Dale replies.</li>
          <li><strong>Phones first</strong> Laid out for a small screen, then scaled up.</li>
          <li><strong>Yours</strong> After the final invoice, the site and the code are yours.</li>
        </ul>
      </div>
    </section>

    <section class="band band-alt" id="services" data-reveal>
      <div class="wrap">
        <p class="kicker">Services</p>
        <h2>What I can take on</h2>
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
        <p class="band-cta" style="margin-top:1.4rem"><a class="button button-primary" href="#contact" data-project-type="Not sure yet">Tell me what you need</a></p>
      </div>
    </section>

    <section class="band" id="pricing" data-reveal>
      <div class="wrap">
        <p class="kicker">Pricing</p>
        <h2>Starting points.</h2>
        <p class="intro">Typical NZD figures for a straightforward brief. The quote is a fixed price for an agreed scope.</p>
        <div class="price-grid" id="price-grid">
<?php site_pricing(); ?>
        </div>
        <p class="fine-print">Starting prices in NZD. Hosting, domain names, and third-party services are extra unless the quote says otherwise. The quote will also say whether GST is added.</p>
      </div>
    </section>

    <section class="band band-alt" id="work" data-reveal>
      <div class="wrap">
        <p class="kicker">Selected work</p>
        <h2>Projects.</h2>
        <div class="work-grid">
          <article class="work-card reveal">
            <a class="work-media" href="/projects/drain-saves/">
              <img src="Img/projects/DrainSavesScreenshot.avif" loading="lazy" decoding="async" alt="Drain Saves homepage, navy logo on a dark field">
            </a>
            <div class="work-body">
              <p class="kicker">Client site</p>
              <h3>Drain Saves</h3>
              <ul class="tags"><li>Design</li><li>Development</li></ul>
              <p>An Auckland drainage company needed the services — overflow, flood prevention, residential and commercial — and a way to ask for a quote.</p>
              <a class="text-link" href="/projects/drain-saves/">View project</a>
            </div>
          </article>
          <article class="work-card reveal">
            <a class="work-media" href="/projects/cornerstone-construction/">
              <img src="Img/projects/CornerstoneScreenshot.avif" loading="lazy" decoding="async" alt="Cornerstone Construction homepage with an excavator and a gold navigation bar">
            </a>
            <div class="work-body">
              <p class="kicker">Client site</p>
              <h3>Cornerstone Construction</h3>
              <ul class="tags"><li>Design</li><li>Development</li></ul>
              <p>A construction company site built around the work itself, with room for about, reviews, and contact.</p>
              <a class="text-link" href="/projects/cornerstone-construction/">View project</a>
            </div>
          </article>
          <article class="work-card reveal">
            <a class="work-media" href="/projects/custom-paint/">
              <img src="Img/recreations/custom-paint/studio.jpg" loading="lazy" decoding="async" alt="Photo Markup Studio, a dark interface with drawing tools and a blank canvas">
            </a>
            <div class="work-body">
              <p class="kicker">Web app</p>
              <h3>Custom Paint</h3>
              <ul class="tags"><li>Design</li><li>Development</li></ul>
              <p>Photo Markup Studio: paste a photo, mark it up with boxes, arrows, and measurements, then copy or download it.</p>
              <a class="text-link" href="/projects/custom-paint/">View project</a>
            </div>
          </article>
          <article class="work-card reveal">
            <a class="work-media" href="/projects/exclusive-cuts/">
              <img src="Img/projects/ExclusiveCuts_Screenshot.avif" loading="lazy" decoding="async" alt="Exclusive Cuts homepage, white type on a dark timber wall">
            </a>
            <div class="work-body">
              <p class="kicker">Client site</p>
              <h3>Exclusive Cuts</h3>
              <ul class="tags"><li>Design</li><li>Development</li></ul>
              <p>A barbershop site for services, a gallery, hours, and a way to get in touch. Walk-ins are welcome.</p>
              <a class="text-link" href="/projects/exclusive-cuts/">View project</a>
            </div>
          </article>
          <article class="work-card reveal">
            <a class="work-media" href="/projects/moonlodge/">
              <img src="Img/projects/MoonlodgeScreenshot.avif" loading="lazy" decoding="async" alt="Moonlodge homepage over a west-coast beach and green hills">
            </a>
            <div class="work-body">
              <p class="kicker">Client site</p>
              <h3>Moonlodge</h3>
              <ul class="tags"><li>Design</li><li>Development</li></ul>
              <p>Accommodation and an art studio in Whaingaroa, with the coast, the mountain, and Bridal Veil Falls nearby.</p>
              <a class="text-link" href="/projects/moonlodge/">View project</a>
            </div>
          </article>
          <article class="work-card reveal">
            <a class="work-media" href="/projects/unique-slider/">
              <img src="Img/projects/SliderScreenshot.avif" loading="lazy" decoding="async" alt="A row of photographs in an image slider">
            </a>
            <div class="work-body">
              <p class="kicker">Study</p>
              <h3>Unique Slider</h3>
              <ul class="tags"><li>Development</li><li>Interaction</li></ul>
              <p>A self-initiated study: move through a set of photographs on one page, without a cluttered gallery.</p>
              <a class="text-link" href="/projects/unique-slider/">View project</a>
            </div>
          </article>
        </div>
        <p class="band-cta" style="margin-top:1.4rem"><a class="button button-primary" href="#contact">Start a project in this vein</a></p>
      </div>
    </section>

    <section class="band" id="why" data-reveal>
      <div class="wrap">
        <p class="kicker">Why work with me</p>
        <h2>Plain terms.</h2>
        <div class="why-grid">
          <article class="why-card"><h3>Fixed quote</h3><p>A price for the agreed scope, before I start.</p></article>
          <article class="why-card"><h3>Direct</h3><p>You write to me. I reply.</p></article>
          <article class="why-card"><h3>Phones first</h3><p>Laid out for a small screen, then widened.</p></article>
          <article class="why-card"><h3>Yours</h3><p>After the final invoice, the site and the code are yours.</p></article>
          <article class="why-card"><h3>After launch</h3><p>A walkthrough, then care if you want it.</p></article>
          <article class="why-card"><h3>No queue</h3><p>Design and build are both done by Dale.</p></article>
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
        <div class="steps">
          <article class="step"><span>01</span><h3>Discovery</h3><p>Who it is for, and what it needs to do.</p></article>
          <article class="step"><span>02</span><h3>Design</h3><p>Pages and a look, reviewed before the build.</p></article>
          <article class="step"><span>03</span><h3>Build</h3><p>You try it on your own phone.</p></article>
          <article class="step"><span>04</span><h3>Launch</h3><p>Live, with a walkthrough.</p></article>
        </div>
      </div>
    </section>

    <section class="band" id="about" data-reveal>
      <div class="wrap about-layout">
        <div>
          <p class="kicker">About</p>
          <h2>Dale Hogg.</h2>
          <p class="intro">Soffit is my freelance practice. I design and build sites from New Zealand, and you deal with me. Brochure sites through to web apps. If a simpler site will do, I will say so.</p>
          <p><a class="github-link" href="https://github.com/dalehogg" target="_blank" rel="noopener">GitHub</a></p>
        </div>
        <p class="tools-line">HTML, CSS, Vue, Nuxt, Gulp, Git</p>
      </div>
    </section>

    <section class="band band-alt" id="questions" data-reveal>
      <div class="wrap">
        <p class="kicker">Questions</p>
        <h2>Before you write.</h2>
        <div class="faq">
          <details>
            <summary>How long does a website take?</summary>
            <p>A landing page is often ready in a couple of weeks once I have your words and pictures. A business site is often three to six weeks. A custom build depends on the scope we agree first. The timing goes in the quote.</p>
          </details>
          <details>
            <summary>How do revisions work?</summary>
            <p>The quote includes time for you to review the design and the build and ask for changes. I will say how many review rounds are included before you agree. Work outside that scope is quoted separately.</p>
          </details>
          <details>
            <summary>Do you host the site?</summary>
            <p>I can launch onto hosting you already pay for, or help you choose a host. Hosting is billed by the host. It is not folded into the starting prices unless the quote says so.</p>
          </details>
          <details>
            <summary>Who owns the site?</summary>
            <p>You do. After the final invoice is paid, the design, the pages, and the code are yours, and I hand over the files.</p>
          </details>
          <details>
            <summary>What do you need from me to start?</summary>
            <p>A short description of the business, who the site is for, and any logo, photos, or text you already have. If the words are not ready, we can start from a conversation.</p>
          </details>
          <details>
            <summary>How do payments work?</summary>
            <p>I send a fixed quote for the agreed scope before I start. The quote sets out when payment is due. I do not publish one price that fits every project.</p>
          </details>
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
        </div>
        <div>
          <form id="enquiry-form" action="https://formsubmit.co/dhdaleleon@gmail.com" method="POST">
            <input type="hidden" name="_subject" value="Project enquiry from the Soffit website">
            <input type="hidden" name="_template" value="table">
            <input type="hidden" name="_captcha" value="false">
            <input type="hidden" name="_next" value="">
            <p class="honey" aria-hidden="true">
              <label>Leave this field empty<input type="text" name="_honey" tabindex="-1" autocomplete="off" style="display:none"></label>
            </p>
            <div class="form-row">
              <div class="field">
                <label for="name">Name</label>
                <input id="name" name="name" type="text" autocomplete="name" required>
              </div>
              <div class="field">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" autocomplete="email" required>
              </div>
            </div>
            <div class="form-row">
              <div class="field">
                <label for="project-type">Project type <span class="optional">(optional)</span></label>
                <select id="project-type" name="Project type">
                  <option value="">Choose if you know</option>
                  <option>Landing page</option>
                  <option>Business site</option>
                  <option>Redesign or refresh</option>
                  <option>Custom build</option>
                  <option>Care plan</option>
                  <option>Not sure yet</option>
                </select>
              </div>
              <div class="field">
                <label for="budget">Budget <span class="optional">(optional)</span></label>
                <input id="budget" name="Budget" type="text" placeholder="A range is fine" autocomplete="off">
              </div>
            </div>
            <div class="field">
              <label for="message">Message</label>
              <textarea id="message" name="message" rows="6" required></textarea>
            </div>
            <button class="submit-button" type="submit">Send enquiry</button>
          </form>
        </div>
      </div>
    </section>
  </main>

<?php require __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
