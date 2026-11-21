// Moonlodge: header goes solid on scroll, gentle parallax on the photo fold, full-screen menu.
// A vanilla rewrite of the original js/full.js (which needed jQuery).
(function () {
  var header = document.querySelector("[data-header]");
  var fold = document.querySelector(".fold-img");
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var ticking = false;

  function onScroll() {
    var y = window.scrollY || window.pageYOffset;
    if (header) header.classList.toggle("fullOpac", y >= 100);
    if (fold && !reduce && y < window.innerHeight * 1.2) {
      fold.style.transform = "translate3d(0," + (y * 0.12).toFixed(1) + "px,0)";
    }
    ticking = false;
  }
  window.addEventListener("scroll", function () {
    if (!ticking) { ticking = true; requestAnimationFrame(onScroll); }
  }, { passive: true });
  onScroll();

  var menu = document.querySelector("[data-menu]");
  var openBtn = document.querySelector("[data-menu-open]");
  var closeBtn = document.querySelector("[data-menu-close]");
  if (!menu || !openBtn || !closeBtn) return;

  function open() {
    menu.hidden = false;
    openBtn.setAttribute("aria-expanded", "true");
    document.documentElement.style.overflow = "hidden";
    requestAnimationFrame(function () { menu.classList.add("is-open"); closeBtn.focus(); });
  }
  function close() {
    menu.classList.remove("is-open");
    openBtn.setAttribute("aria-expanded", "false");
    document.documentElement.style.overflow = "";
    setTimeout(function () { menu.hidden = true; }, reduce ? 0 : 300);
    openBtn.focus();
  }
  openBtn.addEventListener("click", open);
  closeBtn.addEventListener("click", close);
  menu.addEventListener("click", function (event) {
    if (event.target === menu || event.target.closest("a")) close();
  });
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && !menu.hidden) close();
  });
})();

// Questions accordion: slide the answer open and closed. Native <details> still
// toggles if this never runs, or if the visitor prefers reduced motion.
(function () {
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var items = document.querySelectorAll("details.faq-item");
  if (!items.length) return;
  if (reduce || typeof document.body.animate !== "function") return;

  document.documentElement.classList.add("ml-faq-js");

  items.forEach(function (d) {
    var summary = d.querySelector(":scope > summary");
    var panel = d.querySelector(":scope > .faq-answer");
    if (!summary || !panel) return;

    function stop() {
      if (!d._anim) return;
      d._anim.onfinish = null;
      d._anim.oncancel = null;
      d._anim.cancel();
      d._anim = null;
    }

    function settleOpen() {
      d.open = true;
      d.classList.remove("is-closing");
      panel.style.height = "";
      panel.style.overflow = "";
      d._phase = null;
    }

    function settleClosed() {
      d.open = false;
      d.classList.remove("is-closing");
      panel.style.height = "";
      panel.style.overflow = "";
      d._phase = null;
    }

    function currentHeight() {
      return panel.getBoundingClientRect().height;
    }

    function openHeight() {
      var prev = panel.style.height;
      panel.style.height = "auto";
      var h = panel.scrollHeight;
      panel.style.height = prev;
      return h;
    }

    function slide(from, to, onDone) {
      stop();
      panel.style.overflow = "hidden";
      panel.style.height = from + "px";
      var anim = panel.animate(
        { height: [from + "px", to + "px"] },
        { duration: to > from ? 320 : 260, easing: to > from ? "cubic-bezier(.2,.7,.2,1)" : "ease-in" }
      );
      d._anim = anim;
      anim.onfinish = function () {
        if (d._anim !== anim) return;
        d._anim = null;
        onDone();
      };
    }

    summary.addEventListener("click", function (event) {
      event.preventDefault();
      // Mid-close (open is still true) should reverse and open; otherwise a
      // closed item opens, and an open or mid-open item closes.
      if (!d.open || d._phase === "closing") {
        var from = d.open ? currentHeight() : 0;
        d.open = true;
        d.classList.remove("is-closing");
        d._phase = "opening";
        slide(from, openHeight(), settleOpen);
      } else {
        d.classList.add("is-closing");
        d._phase = "closing";
        slide(currentHeight() || openHeight(), 0, settleClosed);
      }
    });
  });
})();
