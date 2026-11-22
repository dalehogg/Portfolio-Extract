(function () {
  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
  if (!window.gsap || !window.ScrollTrigger) return;
  var root = document.body;
  if (!root.classList.contains("backNight") && !root.classList.contains("cc") && !root.classList.contains("cp") && !root.classList.contains("us")) return;
  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.config({ ignoreMobileResize: true });

  if (root.classList.contains("backNight")) {
    /* Moon and star parallax are driven by js/sky-scene.js so the camera
       can descend toward the city without fighting ScrollTrigger. */

    var lines = document.getElementById("sky-lines");
    var sky = document.getElementById("nightSky");
    if (lines && sky) {
      var ctx = lines.getContext("2d");
      var figures = [
        { sel: "#services", pts: [[0.03, 0.18], [0.055, 0.34], [0.02, 0.52], [0.06, 0.7]] },
        { sel: "#pricing", pts: [[0.95, 0.16], [0.975, 0.34], [0.94, 0.5], [0.97, 0.68]] },
        { sel: "#work", pts: [[0.025, 0.22], [0.06, 0.4], [0.03, 0.62]] },
        { sel: "#why", pts: [[0.94, 0.2], [0.97, 0.38], [0.93, 0.56], [0.965, 0.74]] },
        { sel: "#process", pts: [[0.03, 0.24], [0.055, 0.42], [0.02, 0.6]] },
        { sel: "#about", pts: [[0.96, 0.22], [0.935, 0.4], [0.97, 0.58], [0.945, 0.76]] },
        { sel: "#questions", pts: [[0.04, 0.28], [0.02, 0.48], [0.055, 0.66]] },
        { sel: "#contact", pts: [[0.95, 0.24], [0.975, 0.42], [0.94, 0.62]] }
      ];
      var progress = {};
      function sizeLines() {
        lines.width = sky.clientWidth || window.innerWidth;
        lines.height = sky.clientHeight || window.innerHeight;
      }
      function paintLines() {
        ctx.clearRect(0, 0, lines.width, lines.height);
        ctx.lineWidth = 1.25;
        figures.forEach(function (fig) {
          var amount = progress[fig.sel] || 0;
          if (amount <= 0) return;
          var count = Math.max(1, Math.ceil(amount * (fig.pts.length - 1)));
          ctx.strokeStyle = "rgba(226,163,34," + (0.18 + amount * 0.55).toFixed(3) + ")";
          ctx.beginPath();
          ctx.moveTo(fig.pts[0][0] * lines.width, fig.pts[0][1] * lines.height);
          var i;
          for (i = 1; i <= count && i < fig.pts.length; i += 1) {
            ctx.lineTo(fig.pts[i][0] * lines.width, fig.pts[i][1] * lines.height);
          }
          ctx.stroke();
        });
      }
      sizeLines();
      var linesW = window.innerWidth;
      window.addEventListener("resize", function () {
        if (window.innerWidth === linesW) return;
        linesW = window.innerWidth;
        sizeLines(); paintLines();
      });
      figures.forEach(function (fig) {
        if (!document.querySelector(fig.sel)) return;
        ScrollTrigger.create({
          trigger: fig.sel,
          start: "top 75%",
          end: "bottom 25%",
          onUpdate: function (self) {
            progress[fig.sel] = self.progress;
            paintLines();
          }
        });
      });
    }

    gsap.utils.toArray(".price-card, .frame, .service-card, .why-card, .step").forEach(function (el) {
      gsap.from(el, {
        y: 28,
        opacity: 0,
        duration: 0.7,
        ease: "power2.out",
        force3D: true,
        immediateRender: true,
        clearProps: "transform,opacity",
        scrollTrigger: { trigger: el, start: "top 92%", once: true }
      });
    });
  }

  if (root.classList.contains("cc")) {
    var heroImg = document.querySelector(".cc-hero-photo img");
    if (heroImg) {
      gsap.fromTo(heroImg, { yPercent: -8 }, {
        yPercent: 10,
        ease: "none",
        scrollTrigger: { trigger: ".cc-hero", start: "top top", end: "bottom top", scrub: true }
      });
    }

    var aboutImg = document.querySelector(".cc-about img");
    if (aboutImg) {
      gsap.to(aboutImg, {
        yPercent: 10,
        ease: "none",
        scrollTrigger: { trigger: ".cc-about", start: "top bottom", end: "bottom top", scrub: true }
      });
    }

    gsap.to(".cc-marks li", {
      y: -28,
      ease: "none",
      stagger: 0.12,
      scrollTrigger: { trigger: ".cc-marks", start: "top bottom", end: "bottom top", scrub: true }
    });

    var pin = document.querySelector(".cc-pin");
    var track = document.querySelector(".cc-track");
    if (pin && track && window.matchMedia("(min-width: 801px)").matches) {
      pin.classList.add("is-pinned");
      gsap.to(track, {
        x: function () { return Math.min(0, pin.clientWidth - track.scrollWidth); },
        ease: "none",
        scrollTrigger: {
          trigger: pin,
          start: "top top",
          end: function () { return "+=" + Math.max(track.scrollWidth - pin.clientWidth, 1); },
          pin: true,
          scrub: 0.65,
          invalidateOnRefresh: true,
          anticipatePin: 1
        }
      });
    }

    gsap.utils.toArray("[data-clip]").forEach(function (el) {
      ScrollTrigger.create({
        trigger: el,
        start: "top 86%",
        once: true,
        onEnter: function () {
          gsap.fromTo(el, { clipPath: "inset(12% 10% 12% 10%)" }, { clipPath: "inset(0% 0% 0% 0%)", duration: 0.95, ease: "power2.out", overwrite: "auto" });
        }
      });
    });

    gsap.utils.toArray("[data-split]").forEach(function (el) {
      ScrollTrigger.create({
        trigger: el,
        start: "top 92%",
        once: true,
        onEnter: function () {
          if (el.getAttribute("data-split-ready") === "1") return;
          var label = el.textContent.replace(/\s+/g, " ").trim();
          var words = label.split(" ");
          el.setAttribute("data-split-ready", "1");
          el.setAttribute("aria-label", label);
          el.textContent = "";
          var inners = words.map(function (word, index) {
            var wrap = document.createElement("span");
            wrap.className = "cc-word";
            var inner = document.createElement("span");
            inner.textContent = word;
            wrap.appendChild(inner);
            el.appendChild(wrap);
            if (index < words.length - 1) el.appendChild(document.createTextNode(" "));
            return inner;
          });
          gsap.fromTo(inners, { yPercent: 110 }, { yPercent: 0, duration: 0.75, stagger: 0.045, ease: "power3.out" });
        }
      });
    });
  }

  gsap.utils.toArray("[data-gsap]").forEach(function (el) {
    ScrollTrigger.create({
      trigger: el,
      start: "top 88%",
      once: true,
      onEnter: function () {
        gsap.fromTo(el, { y: 22, opacity: 0 }, { y: 0, opacity: 1, duration: 0.65, ease: "power2.out", overwrite: "auto" });
      }
    });
  });
})();
