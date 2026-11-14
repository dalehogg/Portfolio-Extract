(function () {
  var root = document.querySelector("main.ec");
  if (!root) return;

  var more = document.getElementById("view-more");
  var dialog = document.getElementById("more-cuts");
  if (more && dialog && typeof dialog.showModal === "function") {
    more.addEventListener("click", function () {
      dialog.showModal();
    });
    dialog.addEventListener("click", function (event) {
      if (event.target === dialog) dialog.close();
    });
  }

  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce || !window.gsap || !window.ScrollTrigger) return;

  gsap.registerPlugin(ScrollTrigger);

  gsap.from(".line", {
    y: 32,
    opacity: 0,
    duration: 0.9,
    stagger: 0.12,
    ease: "power3.out"
  });
  gsap.from(".shear", {
    scaleX: 0,
    duration: 0.9,
    delay: 0.15,
    ease: "power2.out",
    transformOrigin: "left center"
  });

  gsap.utils.toArray(".panel").forEach(function (panel) {
    gsap.from(panel, {
      y: 40,
      opacity: 0,
      duration: 0.85,
      ease: "power2.out",
      scrollTrigger: { trigger: panel, start: "top 90%", once: true }
    });
  });

  gsap.utils.toArray("[data-pan]").forEach(function (img) {
    gsap.fromTo(img, { yPercent: -5 }, {
      yPercent: 5,
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
