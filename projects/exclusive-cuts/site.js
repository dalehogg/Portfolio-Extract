(function () {
  var more = document.getElementById("view-more");
  var dialog = document.getElementById("more-cuts");
  if (more && dialog && typeof dialog.showModal === "function") {
    more.addEventListener("click", function () { dialog.showModal(); });
    dialog.addEventListener("click", function (event) {
      if (event.target === dialog) dialog.close();
    });
  }

  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce || !window.gsap || !window.ScrollTrigger) {
    document.documentElement.classList.remove("gsap-on");
    return;
  }
  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.config({ ignoreMobileResize: true });

  gsap.from(".line", { yPercent: 24, stagger: 0.12, duration: 0.95, ease: "power3.out" });
  gsap.from(".shear", { scaleX: 0, duration: 0.8, delay: 0.2, ease: "power2.out", transformOrigin: "left center" });

  var track = document.querySelector("#gallery .h-track");
  var pin = document.querySelector("#gallery");
  var count = document.querySelector(".count");
  var figures = track ? track.querySelectorAll("figure") : [];
  if (track && pin && figures.length) {
    gsap.to(track, {
      x: function () { return Math.min(0, window.innerWidth - track.scrollWidth - 24); },
      ease: "none",
      scrollTrigger: {
        trigger: pin,
        start: "top 68px",
        end: function () { return "+=" + Math.max(track.scrollWidth - window.innerWidth + 60, window.innerHeight); },
        pin: true,
        scrub: 0.7,
        anticipatePin: 1,
        invalidateOnRefresh: true,
        onUpdate: function (self) {
          if (!count) return;
          var n = Math.min(figures.length, Math.max(1, Math.ceil(self.progress * figures.length)));
          count.textContent = String(n).padStart(2, "0") + " / 04";
        }
      }
    });
  }

  gsap.utils.toArray(".tilt").forEach(function (fig, i) {
    gsap.fromTo(fig, { y: 40, rotate: i ? 6 : -7, scale: 0.92 }, {
      y: 0,
      rotate: i ? 3 : -4,
      scale: 1,
      ease: "none",
      scrollTrigger: { trigger: fig, start: "top 90%", end: "top 40%", scrub: true }
    });
  });

  gsap.utils.toArray(".services li").forEach(function (li) {
    gsap.from(li, {
      y: 28,
      duration: 0.7,
      ease: "power2.out",
      scrollTrigger: { trigger: li, start: "top 88%", once: true }
    });
  });

  var clock = document.querySelector(".clock");
  if (clock) {
    gsap.fromTo(clock, { scale: 0.86 }, {
      scale: 1,
      ease: "none",
      scrollTrigger: { trigger: clock, start: "top 90%", end: "top 50%", scrub: true }
    });
  }

  window.addEventListener("load", function () { ScrollTrigger.refresh(); });
})();
