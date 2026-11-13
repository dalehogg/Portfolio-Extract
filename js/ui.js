(function () {
  document.documentElement.classList.add("js");
  function ready(fn) {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", fn);
    } else {
      fn();
    }
  }

  ready(function () {
    var header = document.querySelector(".site-header");
    var toggle = document.querySelector(".nav-toggle");
    var nav = document.getElementById("site-nav");
    var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

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

    document.addEventListener("click", function (event) {
      var trigger = event.target.closest("[data-project-type]");
      if (!trigger) return;
      var select = document.getElementById("project-type");
      if (!select) return;
      select.value = trigger.getAttribute("data-project-type");
      var chips = document.querySelectorAll(".type-chip");
      chips.forEach(function (chip) {
        chip.setAttribute("aria-pressed", chip === trigger ? "true" : "false");
      });
    });

    var form = document.getElementById("enquiry-form");
    if (form) {
      var next = form.querySelector('input[name="_next"]');
      if (next && location.protocol.indexOf("http") === 0) {
        var base = location.pathname.replace(/[^/]*$/, "");
        next.value = location.origin + base + "thanks.html";
      }
      form.addEventListener("submit", function () {
        var button = form.querySelector('[type="submit"]');
        if (button) {
          button.disabled = true;
          button.textContent = "Sending…";
        }
      });
    }

    var reveals = document.querySelectorAll(".reveal");
    if (reduce || !("IntersectionObserver" in window)) {
      reveals.forEach(function (el) { el.classList.add("is-in"); });
    } else {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-in");
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12 });
      reveals.forEach(function (el) { observer.observe(el); });
    }

    var sticky = document.querySelector(".sticky-quote");
    var hero = document.getElementById("top");
    var contact = document.getElementById("contact");
    if (sticky && "IntersectionObserver" in window) {
      var heroSeen = true;
      var contactSeen = false;
      function paint() {
        sticky.classList.toggle("is-hidden", heroSeen || contactSeen);
      }
      paint();
      if (hero) {
        new IntersectionObserver(function (entries) {
          heroSeen = entries[0].isIntersecting;
          paint();
        }, { threshold: 0.35 }).observe(hero);
      }
      if (contact) {
        new IntersectionObserver(function (entries) {
          contactSeen = entries[0].isIntersecting;
          paint();
        }, { threshold: 0.2 }).observe(contact);
      }
    }

    var onScroll = function () {
      if (!header) return;
      header.classList.toggle("is-scrolled", window.scrollY > 24);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  });
})();
