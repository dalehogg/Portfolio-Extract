<?php
require __DIR__ . '/includes/site.php';
$page_title = 'Soffit Web | Freelance web design and development, Auckland NZ';
$page_description = 'Soffit Web is Dale Hogg\'s freelance web design and development practice, based in Auckland and working with clients worldwide. Landing pages, business sites and custom builds, fixed-quoted.';
$page_path = '/';
$show_photo_credit = true;
$page_faqs = [
    ['How long does a website take?', 'A landing page is often ready in a couple of weeks once I have your words and pictures. A business site is often three to six weeks. A custom build depends on the scope we agree first. The timing goes in the quote.'],
    ['How do revisions work?', 'The quote includes time for you to review the design and the build and ask for changes. I will say how many review rounds are included before you agree. Work outside that scope is quoted separately.'],
    ['Do you host the site?', 'I can launch onto hosting you already pay for, or help you choose a host. Hosting is billed by the host. It is not folded into the starting prices unless the quote says so.'],
    ['Who owns the site?', 'You do. After the final invoice is paid, the design, the pages, and the code are yours, and I hand over the files.'],
    ['What do you need from me to start?', 'A short description of the business, who the site is for, and any logo, photos, or text you already have. If the words are not ready, we can start from a conversation.'],
    ['How do payments work?', 'I send a fixed quote for the agreed scope before I start. The quote sets out when payment is due. I do not publish one price that fits every project.'],
];
$extra_head = '<link rel="stylesheet" href="/css/globals.css">' . "\n" . '<link rel="stylesheet" href="/css/main.css">' . "\n" . '<link rel="stylesheet" href="/css/home.css">' . "\n" . '<link rel="stylesheet" href="/css/sky-scene.css">' . "\n"
  . '<script>try{if(localStorage.getItem("soffit-sky")==="day")document.documentElement.classList.add("is-day");}catch(e){}</script>';
$page_scripts = '<script src="/js/sky.js?v=r14" defer></script>' . "\n" . '<script src="/js/full.js" defer></script>' . "\n" . '<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js" defer></script>' . "\n" . '<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js" defer></script>' . "\n" . '<script src="/js/gsap-scroll.js?v=r14" defer></script>' . "\n" . '<script src="/js/sky-scene.js" defer></script>';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/includes/head.php'; ?>
<body class="backNight">
<?php require __DIR__ . '/includes/nav.php'; ?>

  <button type="button" class="sky-toggle" id="sky-toggle" aria-pressed="false" aria-label="Switch to day">
    <span class="sky-toggle-icons" aria-hidden="true">
      <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round">
        <circle cx="12" cy="12" r="4" fill="currentColor" stroke="none"/>
        <path d="M12 3v2.2M12 18.8V21M3 12h2.2M18.8 12H21M5.6 5.6l1.6 1.6M16.8 16.8l1.6 1.6M5.6 18.4l1.6-1.6M16.8 7.2l1.6-1.6"/>
      </svg>
      <svg class="icon-moon" viewBox="0 0 24 24" fill="currentColor">
        <path d="M14.2 3.1A8.5 8.5 0 1 0 20.9 14 7 7 0 0 1 14.2 3.1z"/>
      </svg>
    </span>
    <span class="sky-toggle-text">Day</span>
  </button>

  <div id="nightSky" aria-hidden="true">
    <div class="sky-wash" aria-hidden="true">
      <span class="sky-wash-night"></span>
      <span class="sky-wash-sunset"></span>
      <span class="sky-wash-day"></span>
      <span class="sky-wash-day-horizon"></span>
      <span class="sky-grad-noise"></span>
    </div>
    <div class="star-mask" aria-hidden="true">
      <div class="star-track">
        <canvas id="stillfield" data-depth="16"></canvas>
        <canvas id="starfield" data-depth="34"></canvas>
        <canvas id="twinklefield" data-depth="52"></canvas>
        <canvas id="driftfield" data-depth="78"></canvas>
        <canvas id="shooting" data-depth="60"></canvas>
        <canvas id="planet" data-depth="22"></canvas>
      </div>
    </div>
    <canvas id="sky-lines"></canvas>
  </div>
  <div class="cloudsLightOne noOpac" aria-hidden="true"></div>
  <div class="cloudsLightTwo noOpac" aria-hidden="true"></div>
  <div class="day-clouds" aria-hidden="true">
    <div class="cloud-item" style="top:3vh;width:44vw;--dur:52s;--delay:-11s;--sx:1;opacity:0.95;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-a.webp')); ?>" width="954" height="483" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:1vh;width:18vw;--dur:64s;--delay:-13s;--sx:-1;opacity:0.88;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-i.webp')); ?>" width="690" height="913" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:8vh;width:12vw;--dur:40s;--delay:-9s;--sx:1;opacity:0.9;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:14vh;width:28vw;--dur:58s;--delay:-12s;--sx:-1;opacity:0.86;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-e.webp')); ?>" width="1126" height="423" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:6vh;width:10vw;--dur:46s;--delay:-8s;--sx:1;opacity:0.82;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-n.webp')); ?>" width="637" height="317" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:18vh;width:22vw;--dur:54s;--delay:-15s;--sx:1;opacity:0.9;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-o.webp')); ?>" width="635" height="424" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:11vh;width:16vw;--dur:70s;--delay:-10s;--sx:-1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-h.webp')); ?>" width="975" height="471" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:20vh;width:8vw;--dur:36s;--delay:-14s;--sx:-1;opacity:0.78;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:48vh;width:11vw;--dur:62s;--delay:-28s;--sx:1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-n.webp')); ?>" width="637" height="317" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:78vh;width:9vw;--dur:44s;--delay:-4s;--sx:-1;opacity:0.76;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:108vh;width:52vw;--dur:68s;--delay:-18s;--sx:1;opacity:0.92;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-k.webp')); ?>" width="1200" height="237" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:118vh;width:30vw;--dur:50s;--delay:-20s;--sx:-1;opacity:0.9;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-b.webp')); ?>" width="997" height="422" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:112vh;width:16vw;--dur:42s;--delay:-16s;--sx:1;opacity:0.84;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-f.webp')); ?>" width="781" height="413" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:126vh;width:15vw;--dur:72s;--delay:-22s;--sx:1;opacity:0.86;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-j.webp')); ?>" width="565" height="868" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:122vh;width:9vw;--dur:38s;--delay:-17s;--sx:-1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:134vh;width:24vw;--dur:56s;--delay:-19s;--sx:1;opacity:0.88;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-d.webp')); ?>" width="728" height="488" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:140vh;width:12vw;--dur:47s;--delay:-21s;--sx:-1;opacity:0.82;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-n.webp')); ?>" width="637" height="317" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:188vh;width:14vw;--dur:60s;--delay:-33s;--sx:1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-h.webp')); ?>" width="975" height="471" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:230vh;width:8vw;--dur:41s;--delay:-6s;--sx:1;opacity:0.75;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:278vh;width:50vw;--dur:74s;--delay:-24s;--sx:1;opacity:0.9;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-q.webp')); ?>" width="1200" height="233" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:292vh;width:36vw;--dur:55s;--delay:-26s;--sx:-1;opacity:0.88;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-l.webp')); ?>" width="986" height="282" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:286vh;width:18vw;--dur:43s;--delay:-23s;--sx:1;opacity:0.86;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-o.webp')); ?>" width="635" height="424" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:304vh;width:20vw;--dur:66s;--delay:-27s;--sx:1;opacity:0.84;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-c.webp')); ?>" width="671" height="722" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:298vh;width:11vw;--dur:39s;--delay:-22s;--sx:-1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-n.webp')); ?>" width="637" height="317" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:316vh;width:40vw;--dur:58s;--delay:-25s;--sx:1;opacity:0.87;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-p.webp')); ?>" width="1155" height="330" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:310vh;width:9vw;--dur:35s;--delay:-28s;--sx:1;opacity:0.78;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:328vh;width:15vw;--dur:48s;--delay:-24s;--sx:-1;opacity:0.82;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-f.webp')); ?>" width="781" height="413" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:390vh;width:18vw;--dur:63s;--delay:-40s;--sx:-1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-a.webp')); ?>" width="954" height="483" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:445vh;width:8vw;--dur:37s;--delay:-3s;--sx:1;opacity:0.74;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:498vh;width:20vw;--dur:69s;--delay:-30s;--sx:1;opacity:0.88;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-i.webp')); ?>" width="690" height="913" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:510vh;width:32vw;--dur:51s;--delay:-32s;--sx:-1;opacity:0.9;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-e.webp')); ?>" width="1126" height="423" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:506vh;width:22vw;--dur:45s;--delay:-29s;--sx:1;opacity:0.85;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-b.webp')); ?>" width="997" height="422" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:518vh;width:10vw;--dur:36s;--delay:-31s;--sx:-1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:524vh;width:13vw;--dur:42s;--delay:-28s;--sx:1;opacity:0.82;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-n.webp')); ?>" width="637" height="317" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:532vh;width:18vw;--dur:57s;--delay:-33s;--sx:1;opacity:0.86;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-f.webp')); ?>" width="781" height="413" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:540vh;width:16vw;--dur:40s;--delay:-30s;--sx:-1;opacity:0.84;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-o.webp')); ?>" width="635" height="424" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:640vh;width:28vw;--dur:71s;--delay:-12s;--sx:1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-p.webp')); ?>" width="1155" height="330" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:705vh;width:10vw;--dur:46s;--delay:-7s;--sx:-1;opacity:0.76;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-n.webp')); ?>" width="637" height="317" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:758vh;width:48vw;--dur:64s;--delay:-36s;--sx:-1;opacity:0.92;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-k.webp')); ?>" width="1200" height="237" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:770vh;width:16vw;--dur:73s;--delay:-38s;--sx:1;opacity:0.86;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-j.webp')); ?>" width="565" height="868" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:764vh;width:26vw;--dur:49s;--delay:-35s;--sx:1;opacity:0.88;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-d.webp')); ?>" width="728" height="488" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:776vh;width:9vw;--dur:34s;--delay:-37s;--sx:-1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:784vh;width:12vw;--dur:44s;--delay:-34s;--sx:1;opacity:0.82;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-n.webp')); ?>" width="637" height="317" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:796vh;width:28vw;--dur:53s;--delay:-39s;--sx:-1;opacity:0.9;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-a.webp')); ?>" width="954" height="483" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:808vh;width:15vw;--dur:61s;--delay:-36s;--sx:1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-h.webp')); ?>" width="975" height="471" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:900vh;width:22vw;--dur:67s;--delay:-15s;--sx:1;opacity:0.82;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-l.webp')); ?>" width="986" height="282" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:1020vh;width:46vw;--dur:70s;--delay:-42s;--sx:1;opacity:0.9;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-q.webp')); ?>" width="1200" height="233" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:1032vh;width:28vw;--dur:52s;--delay:-44s;--sx:-1;opacity:0.88;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-b.webp')); ?>" width="997" height="422" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:1026vh;width:10vw;--dur:38s;--delay:-41s;--sx:1;opacity:0.8;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:1044vh;width:16vw;--dur:47s;--delay:-43s;--sx:1;opacity:0.84;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-f.webp')); ?>" width="781" height="413" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:1056vh;width:17vw;--dur:76s;--delay:-45s;--sx:-1;opacity:0.86;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-i.webp')); ?>" width="690" height="913" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:1048vh;width:11vw;--dur:40s;--delay:-42s;--sx:-1;opacity:0.78;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-n.webp')); ?>" width="637" height="317" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:1070vh;width:20vw;--dur:55s;--delay:-46s;--sx:1;opacity:0.85;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-o.webp')); ?>" width="635" height="424" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item" style="top:1100vh;width:18vw;--dur:59s;--delay:-20s;--sx:1;opacity:0.82;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-h.webp')); ?>" width="975" height="471" alt="" decoding="async" draggable="false">
    </div>
    <div class="cloud-item is-flip" style="top:1140vh;width:9vw;--dur:43s;--delay:-8s;--sx:-1;opacity:0.76;">
      <img src="<?php echo site_h(site_asset('/Img/clouds/photo-m.webp')); ?>" width="466" height="355" alt="" decoding="async" draggable="false">
    </div>
  </div>
  <div class="realMoon-track" aria-hidden="true">
    <div class="realMoon-container">
      <div class="realMoon-moonCut"></div>
    </div>
  </div>
  <div class="skyline" aria-hidden="true">
    <div class="skyline-city">
      <?php include __DIR__ . '/Img/city/auckland-skyline.svg'; ?>
    </div>
  </div>

  <div id="fullpage">
    <section class="section section-one" id="top">
      <div class="galaxy-center" aria-hidden="true"></div>
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
          <p class="intro">Soffit Web is my freelance practice. I'm based in Auckland, working with clients worldwide, and you deal with me. Brochure sites through to web apps. If a simpler site will do, I will say so.</p>
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
            <input type="hidden" name="_subject" value="Project enquiry from the Soffit Web website">
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
