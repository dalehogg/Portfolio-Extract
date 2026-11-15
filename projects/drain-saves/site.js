(function () {
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce || !window.gsap || !window.ScrollTrigger) {
    document.documentElement.classList.remove("gsap-on");
    return;
  }
  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.config({ ignoreMobileResize: true });

  gsap.from(".well .word", {
    yPercent: 28,
    stagger: 0.08,
    duration: 0.9,
    ease: "power3.out"
  });

  var mark = document.querySelector(".mark");
  if (mark) {
    gsap.to(mark, {
      y: -48,
      rotate: -10,
      ease: "none",
      scrollTrigger: { trigger: ".well", start: "top top", end: "bottom top", scrub: 0.6 }
    });
  }

  var tide = document.querySelector(".tide");
  if (tide) {
    gsap.to(tide, {
      x: 36,
      ease: "none",
      scrollTrigger: { trigger: ".well", start: "top top", end: "bottom top", scrub: true }
    });
  }

  var track = document.querySelector("#services .h-track");
  var pin = document.querySelector("#services");
  var index = document.querySelector(".svc-index");
  if (track && pin) {
    gsap.to(track, {
      x: function () { return Math.min(0, window.innerWidth - track.scrollWidth - 32); },
      ease: "none",
      scrollTrigger: {
        trigger: pin,
        start: "top 70px",
        end: function () { return "+=" + Math.max(track.scrollWidth - window.innerWidth + 80, window.innerHeight * 0.8); },
        pin: true,
        scrub: 0.65,
        anticipatePin: 1,
        invalidateOnRefresh: true,
        onUpdate: function (self) {
          if (!index) return;
          var n = Math.min(4, Math.max(1, Math.ceil(self.progress * 4)));
          index.textContent = String(n).padStart(2, "0");
        }
      }
    });
  }

  gsap.utils.toArray(".reveal-clip").forEach(function (img) {
    gsap.fromTo(img, { clipPath: "inset(14% 10% 14% 10%)" }, {
      clipPath: "inset(0% 0% 0% 0%)",
      ease: "none",
      scrollTrigger: { trigger: img, start: "top 90%", end: "top 40%", scrub: true }
    });
  });

  gsap.utils.toArray(".quote").forEach(function (el, i) {
    gsap.fromTo(el, { y: 36, rotate: i % 2 ? 3 : -3 }, {
      y: 0,
      rotate: 0,
      ease: "none",
      scrollTrigger: { trigger: el, start: "top 92%", end: "top 55%", scrub: true }
    });
  });

  var aboutFig = document.querySelector(".about-figure");
  if (aboutFig) {
    gsap.fromTo(aboutFig, { y: 50 }, {
      y: -20,
      ease: "none",
      scrollTrigger: { trigger: ".about", start: "top bottom", end: "bottom top", scrub: true }
    });
  }

  window.addEventListener("load", function () { ScrollTrigger.refresh(); });
})();
