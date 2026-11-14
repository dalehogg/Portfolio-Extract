(function () {
  var root = document.querySelector("main.ds");
  if (!root) return;

  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce || !window.gsap || !window.ScrollTrigger) return;

  gsap.registerPlugin(ScrollTrigger);

  var heroBits = document.querySelectorAll(".well-copy > *");
  if (heroBits.length) {
    gsap.from(heroBits, {
      y: 26,
      opacity: 0,
      duration: 0.85,
      stagger: 0.1,
      ease: "power2.out"
    });
  }

  var mark = document.querySelector(".mark");
  if (mark) {
    gsap.to(mark, {
      y: -26,
      ease: "none",
      scrollTrigger: {
        trigger: ".well",
        start: "top top",
        end: "bottom top",
        scrub: 0.6
      }
    });
  }

  var tide = document.querySelector("[data-tide]");
  if (tide) {
    gsap.to(tide, {
      x: 24,
      ease: "none",
      scrollTrigger: {
        trigger: ".well",
        start: "top top",
        end: "bottom top",
        scrub: true
      }
    });
  }

  gsap.utils.toArray("[data-rise]").forEach(function (el) {
    gsap.from(el, {
      y: 28,
      opacity: 0,
      duration: 0.8,
      ease: "power2.out",
      scrollTrigger: { trigger: el, start: "top 88%", once: true }
    });
  });

  gsap.utils.toArray("[data-pan]").forEach(function (img) {
    gsap.fromTo(img, { yPercent: -6 }, {
      yPercent: 6,
      ease: "none",
      scrollTrigger: {
        trigger: img.parentElement,
        start: "top bottom",
        end: "bottom top",
        scrub: true
      }
    });
  });
})();
