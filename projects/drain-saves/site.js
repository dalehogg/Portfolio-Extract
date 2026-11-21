(function () {
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce || !window.gsap || !window.ScrollTrigger) {
    document.documentElement.classList.remove("gsap-on");
    return;
  }
  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.config({ ignoreMobileResize: true });

  gsap.from(".well .word", {
    yPercent: -22,
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

  // Services are a static grid now (no pin, no sideways tween).

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
