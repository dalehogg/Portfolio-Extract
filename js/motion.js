(function () {
  document.documentElement.classList.add("js");
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  function ready(fn) {
    if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", fn);
    else fn();
  }

  ready(function () {
    var header = document.querySelector(".site-header");
    var toggle = document.querySelector(".nav-toggle");
    var nav = document.getElementById("site-nav");
    if (toggle && header && nav) {
      toggle.addEventListener("click", function () {
        var open = header.classList.toggle("nav-open");
        toggle.setAttribute("aria-expanded", open ? "true" : "false");
        toggle.textContent = open ? "Close" : "Menu";
      });
      nav.addEventListener("click", function (event) {
        if (event.target.closest("a")) {
          header.classList.remove("nav-open");
          toggle.setAttribute("aria-expanded", "false");
          toggle.textContent = "Menu";
        }
      });
    }

    var form = document.getElementById("enquiry-form");
    if (form) {
      var next = form.querySelector('input[name="_next"]');
      if (next && location.protocol.indexOf("http") === 0) {
        var base = location.pathname.replace(/[^/]*$/, "");
        next.value = location.origin + base + "thanks.php";
      }
      form.addEventListener("submit", function () {
        var button = form.querySelector('[type="submit"]');
        if (button) {
          button.disabled = true;
          button.textContent = "Sending…";
        }
      });
    }

    var preset = new URLSearchParams(location.search).get("project");
    var presetSelect = document.getElementById("project-type");
    if (preset && presetSelect) presetSelect.value = preset;

    document.addEventListener("click", function (event) {
      var trigger = event.target.closest("[data-project-type]");
      if (!trigger) return;
      var select = document.getElementById("project-type");
      if (!select) return;
      select.value = trigger.getAttribute("data-project-type");
    });

    var reveals = document.querySelectorAll("[data-reveal]");
    if (reduce || !("IntersectionObserver" in window)) {
      reveals.forEach(function (el) { el.classList.add("is-in"); });
    } else {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-in");
          observer.unobserve(entry.target);
        });
      }, { threshold: 0.14 });
      reveals.forEach(function (el) { observer.observe(el); });
    }

    var layers = document.querySelectorAll("[data-parallax]");
    if (!reduce && layers.length) {
      var frame = 0;
      var paint = function () {
        frame = 0;
        var y = window.scrollY || 0;
        layers.forEach(function (el) {
          var factor = parseFloat(el.getAttribute("data-parallax")) || 0;
          el.style.transform = "translate3d(0," + (y * factor).toFixed(2) + "px,0)";
        });
      };
      window.addEventListener("scroll", function () {
        if (frame) return;
        frame = window.requestAnimationFrame(paint);
      }, { passive: true });
      paint();
    }

    var onScroll = function () {
      if (!header) return;
      header.classList.toggle("is-scrolled", window.scrollY > 12);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  });
})();
