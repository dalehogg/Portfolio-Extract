(function () {
  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
  if (!window.gsap || !window.ScrollTrigger) return;
  var root = document.body;
  if (!root.classList.contains("backNight") && !root.classList.contains("cc") && !root.classList.contains("cp") && !root.classList.contains("us")) return;
  gsap.registerPlugin(ScrollTrigger);

  if (root.classList.contains("backNight")) {
    var moon = document.querySelector(".realMoon-container");
    if (moon) {
      gsap.to(moon, {
        y: 140,
        ease: "none",
        scrollTrigger: { trigger: "#top", start: "top top", end: "bottom top", scrub: 0.4 }
      });
    }
    var lines = document.getElementById("sky-lines");
    if (lines) {
      var sky = document.getElementById("nightSky");
      var ctx = lines.getContext("2d");
      var stars = [];
      function size() {
        var w = (sky && sky.clientWidth) || window.innerWidth;
        var h = (sky && sky.clientHeight) || window.innerHeight;
        lines.width = w;
        lines.height = h;
        if (!stars.length) {
          var i;
          for (i = 0; i < 18; i += 1) stars.push({ x: Math.random() * w, y: Math.random() * h * 0.8 });
        }
      }
      size();
      window.addEventListener("resize", size);
      ScrollTrigger.create({
        trigger: document.body,
        start: "top top",
        end: "bottom bottom",
        scrub: 0.3,
        onUpdate: function (self) {
          var p = self.progress;
          ctx.clearRect(0, 0, lines.width, lines.height);
          ctx.strokeStyle = "rgba(226,163,34," + (0.15 + p * 0.45) + ")";
          ctx.lineWidth = 1;
          var n = Math.max(1, Math.floor(p * (stars.length - 1)));
          ctx.beginPath();
          ctx.moveTo(stars[0].x, stars[0].y);
          var i;
          for (i = 1; i <= n; i += 1) ctx.lineTo(stars[i].x, stars[i].y);
          ctx.stroke();
        }
      });
    }
    gsap.utils.toArray(".price-card, .work-card").forEach(function (el) {
      gsap.from(el, {
        y: 24,
        opacity: 0,
        duration: 0.6,
        ease: "power2.out",
        immediateRender: false,
        scrollTrigger: { trigger: el, start: "top 90%", once: true }
      });
    });
  }

  gsap.utils.toArray("[data-gsap]").forEach(function (el) {
    gsap.from(el, {
      y: 22,
      opacity: 0,
      duration: 0.65,
      ease: "power2.out",
      immediateRender: false,
      scrollTrigger: { trigger: el, start: "top 88%", once: true }
    });
  });
})();
