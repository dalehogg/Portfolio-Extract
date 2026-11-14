(function () {
  var root = document.querySelector("main.ml");
  if (!root) return;

  var shots = Array.prototype.slice.call(document.querySelectorAll(".shot"));
  var lb = document.getElementById("lb");
  if (shots.length && lb) {
    var img = lb.querySelector("img");
    var cap = document.getElementById("lb-cap");
    var index = 0;
    var last = null;
    var startX = null;

    function show(i) {
      index = (i + shots.length) % shots.length;
      var shot = shots[index];
      var figure = shot.closest("figure");
      var caption = figure ? figure.querySelector("figcaption") : null;
      img.src = shot.getAttribute("data-shot");
      img.alt = shot.getAttribute("data-alt") || "";
      cap.textContent = caption ? caption.textContent : "";
    }

    function open(i) {
      last = document.activeElement;
      show(i);
      lb.hidden = false;
      document.body.classList.add("lb-open");
      var close = lb.querySelector(".lb-close");
      if (close) close.focus();
    }

    function close() {
      lb.hidden = true;
      document.body.classList.remove("lb-open");
      img.removeAttribute("src");
      if (last && last.focus) last.focus();
    }

    shots.forEach(function (shot, i) {
      shot.addEventListener("click", function () { open(i); });
    });

    lb.addEventListener("click", function (event) {
      if (event.target.closest("img, .lb-prev, .lb-next, .lb-close")) return;
      close();
    });
    lb.querySelector(".lb-close").addEventListener("click", close);
    lb.querySelector(".lb-next").addEventListener("click", function () { show(index + 1); });
    lb.querySelector(".lb-prev").addEventListener("click", function () { show(index - 1); });

    document.addEventListener("keydown", function (event) {
      if (lb.hidden) return;
      if (event.key === "Escape") {
        event.preventDefault();
        close();
      } else if (event.key === "ArrowRight") {
        event.preventDefault();
        show(index + 1);
      } else if (event.key === "ArrowLeft") {
        event.preventDefault();
        show(index - 1);
      } else if (event.key === "Tab") {
        var controls = Array.prototype.slice.call(lb.querySelectorAll("button"));
        var first = controls[0];
        var lastBtn = controls[controls.length - 1];
        if (event.shiftKey && document.activeElement === first) {
          event.preventDefault();
          lastBtn.focus();
        } else if (!event.shiftKey && document.activeElement === lastBtn) {
          event.preventDefault();
          first.focus();
        }
      }
    });

    lb.addEventListener("touchstart", function (event) {
      startX = event.changedTouches[0].clientX;
    }, { passive: true });
    lb.addEventListener("touchend", function (event) {
      if (startX == null) return;
      var dx = event.changedTouches[0].clientX - startX;
      if (Math.abs(dx) > 42) show(index + (dx < 0 ? 1 : -1));
      startX = null;
    }, { passive: true });
  }

  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce || !window.gsap || !window.ScrollTrigger) return;

  gsap.registerPlugin(ScrollTrigger);

  var moon = document.querySelector(".moon");
  if (moon) {
    gsap.to(moon, {
      y: -22,
      ease: "none",
      scrollTrigger: {
        trigger: ".sky",
        start: "top bottom",
        end: "bottom top",
        scrub: true
      }
    });
  }

  gsap.utils.toArray(".door img").forEach(function (img) {
    gsap.fromTo(img, { scale: 1.06 }, {
      scale: 1,
      ease: "none",
      scrollTrigger: {
        trigger: img,
        start: "top bottom",
        end: "bottom top",
        scrub: true
      }
    });
  });

  gsap.utils.toArray(".sky h1, .place h2, .interview h1").forEach(function (el) {
    gsap.from(el, {
      y: 14,
      opacity: 0,
      duration: 1.05,
      ease: "power1.out",
      scrollTrigger: { trigger: el, start: "top 92%", once: true }
    });
  });
})();
