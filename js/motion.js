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

    document.querySelectorAll('form[action*="formsubmit.co"]').forEach(function (form) {
      var next = form.querySelector('input[name="_next"]');
      if (next && location.protocol.indexOf("http") === 0) {
        next.value = location.origin + "/thanks.php";
      }
      form.addEventListener("submit", function () {
        var button = form.querySelector('[type="submit"]');
        if (button) {
          button.disabled = true;
          button.textContent = "Sending…";
        }
      });
    });

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
    function showReveals(list) {
      list.forEach(function (el) { el.classList.add("is-in"); });
    }
    try {
      if (reduce || !("IntersectionObserver" in window)) {
        showReveals(reveals);
      } else {
        var observer = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-in");
            observer.unobserve(entry.target);
          });
        }, { threshold: 0, rootMargin: "0px 0px 8% 0px" });
        reveals.forEach(function (el) { observer.observe(el); });
        document.documentElement.classList.add("can-reveal");
        window.setTimeout(function () {
          reveals.forEach(function (el) {
            if (el.classList.contains("is-in")) return;
            var rect = el.getBoundingClientRect();
            if (rect.bottom > 0 && rect.top < window.innerHeight) el.classList.add("is-in");
          });
        }, 400);
      }
    } catch (err) {
      document.documentElement.classList.remove("can-reveal");
      showReveals(reveals);
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

    var shifters = document.querySelectorAll(".band h2, #work .work-media, .promise-row");
    var bands = document.querySelectorAll(".band");
    var scrollFrame = 0;
    var onScroll = function () {
      if (header) header.classList.toggle("is-scrolled", window.scrollY > 12);
      var quote = document.querySelector(".sticky-quote");
      var contact = document.getElementById("contact");
      if (quote && contact) {
        var box = contact.getBoundingClientRect();
        var near = box.top < window.innerHeight * 0.82;
        var onHero = (window.scrollY || 0) < window.innerHeight * 0.72;
        quote.classList.toggle("is-hidden", near || onHero);
      }
      if (reduce) return;
      if (scrollFrame) return;
      scrollFrame = window.requestAnimationFrame(function () {
        scrollFrame = 0;
        var vh = window.innerHeight || 1;
        bands.forEach(function (band) {
          var top = band.getBoundingClientRect().top;
          band.style.setProperty("--shift", ((top / vh) * -72).toFixed(1) + "px");
        });
        shifters.forEach(function (el) {
          var rect = el.getBoundingClientRect();
          var delta = (rect.top + rect.height * 0.5 - vh * 0.5) / vh;
          var amount = el.classList.contains("work-media") ? 16 : 18;
          el.style.transform = "translate3d(0," + (delta * amount).toFixed(1) + "px,0)";
        });
      });
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  });
})();
