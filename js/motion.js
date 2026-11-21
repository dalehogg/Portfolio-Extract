(function () {
  document.documentElement.classList.add("js");
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  function ready(fn) {
    if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", fn);
    else fn();
  }


  function slideMenu(panel, open, apply) {
    if (!panel || reduce || !panel.animate) { apply(open); return; }
    if (panel._menuAnim) { panel._menuAnim.cancel(); panel._menuAnim = null; }
    var shut = { opacity: 0, transform: "translateY(-10px)", clipPath: "inset(0 0 100% 0)" };
    var shown = { opacity: 1, transform: "translateY(0)", clipPath: "inset(0 0 0% 0)" };
    if (open) {
      apply(true);
      panel._menuAnim = panel.animate([shut, shown], { duration: 280, easing: "cubic-bezier(.2,.7,.2,1)" });
      panel._menuAnim.onfinish = function () { panel._menuAnim = null; };
    } else {
      panel._menuAnim = panel.animate([shown, shut], { duration: 220, easing: "ease-in", fill: "forwards" });
      panel._menuAnim.onfinish = function () { apply(false); if (panel._menuAnim) panel._menuAnim.cancel(); panel._menuAnim = null; };
    }
  }

  function setupDetails() {
    // Moonlodge (body.ml) and any details marked data-native keep the UA toggle.
    // The height animation below preventDefault()s that, which made the Questions
    // accordion miss clicks or mis-handle the item that starts open.
    if (document.body.classList.contains("ml")) return;
    document.querySelectorAll("details:not([data-native])").forEach(function (d) {
      var summary = d.querySelector(":scope > summary");
      if (!summary) return;
      summary.addEventListener("click", function (event) {
        if (reduce || !d.animate) return;
        event.preventDefault();
        if (d._anim) { d._anim.cancel(); d._anim = null; }
        var cs = window.getComputedStyle(d);
        var chrome = parseFloat(cs.paddingTop) + parseFloat(cs.paddingBottom) + parseFloat(cs.borderTopWidth) + parseFloat(cs.borderBottomWidth);
        var closedH = summary.offsetHeight + chrome;
        var start = d.offsetHeight;
        d.style.overflow = "hidden";
        var finish = function () { d.style.overflow = ""; d.style.height = ""; d._anim = null; };
        if (!d.open) {
          d.open = true;
          var end = d.offsetHeight;
          d._anim = d.animate({ height: [start + "px", end + "px"] }, { duration: 320, easing: "cubic-bezier(.2,.7,.2,1)" });
          d._anim.onfinish = finish;
        } else {
          d.classList.add("is-closing");
          d._anim = d.animate({ height: [start + "px", closedH + "px"] }, { duration: 260, easing: "ease-in" });
          d._anim.onfinish = function () { d.open = false; d.classList.remove("is-closing"); finish(); };
        }
      });
    });
  }

  ready(function () {
    setupDetails();
    var header = document.querySelector(".site-header");
    var toggle = document.querySelector(".nav-toggle");
    var nav = document.getElementById("site-nav");
    if (toggle && header && nav) {
      var setNav = function (open) {
        toggle.setAttribute("aria-expanded", open ? "true" : "false");
        toggle.textContent = open ? "Close" : "Menu";
        slideMenu(nav, open, function (show) { header.classList.toggle("nav-open", show); });
      };
      toggle.addEventListener("click", function () {
        setNav(toggle.getAttribute("aria-expanded") !== "true");
      });
      nav.addEventListener("click", function (event) {
        if (event.target.closest("a") && toggle.getAttribute("aria-expanded") === "true") setNav(false);
      });
    }

    document.querySelectorAll("[data-menu]").forEach(function (bar) {
      var button = bar.querySelector("[data-menu-toggle]");
      var panel = bar.querySelector("[data-menu-panel]");
      if (!button || !panel) return;
      var label = button.textContent;
      function setOpen(open) {
        var wasOpen = button.getAttribute("aria-expanded") === "true";
        if (open === wasOpen) return;
        button.setAttribute("aria-expanded", open ? "true" : "false");
        button.textContent = open ? "Close" : label;
        slideMenu(panel, open, function (show) { bar.classList.toggle("is-open", show); });
      }
      button.addEventListener("click", function () {
        setOpen(button.getAttribute("aria-expanded") !== "true");
      });
      panel.addEventListener("click", function (event) {
        if (event.target.closest("a")) setOpen(false);
      });
      document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") setOpen(false);
      });
    });

    document.querySelectorAll('form[action*="formsubmit.co"]').forEach(function (form) {
      var next = form.querySelector('input[name="_next"]');
      if (next && location.protocol.indexOf("http") === 0) {
        next.value = location.origin + "/thanks.php";
      }
      form.addEventListener("submit", function () {
        form.querySelectorAll("input[name], select[name], textarea[name]").forEach(function (field) {
          if (field.name.charAt(0) === "_" || field.type === "hidden" || field.value.trim()) return;
          if (field.tagName === "SELECT") {
            var na = document.createElement("option");
            na.value = "N/A";
            na.textContent = "N/A";
            field.appendChild(na);
          }
          field.value = "N/A";
        });
        var reply = form.querySelector('input[name="_replyto"]');
        var mail = form.querySelector('input[type="email"]');
        if (reply && mail) reply.value = mail.value;
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
      var link = event.target.closest("a[href]");
      if (link && link.hash && link.hash.length > 1) {
        var same = link.pathname === location.pathname || (link.pathname === "/" && (location.pathname === "/" || location.pathname === "/index.php"));
        var target = same ? document.querySelector(link.hash) : null;
        if (target) {
          event.preventDefault();
          var top = target.getBoundingClientRect().top + window.scrollY - 76;
          window.scrollTo({ top: Math.max(0, top), behavior: reduce ? "auto" : "smooth" });
        }
      }
      var trigger = event.target.closest("[data-project-type]");
      if (!trigger) return;
      var select = document.getElementById("project-type");
      if (!select) return;
      select.value = trigger.getAttribute("data-project-type");
    });

    var reveals = document.querySelectorAll("[data-reveal]");
    function showReveals(list) {
      list.forEach(function (el) {
        el.classList.add("is-in");
        el.classList.remove("will-animate");
      });
    }
    function inView(el) {
      var rect = el.getBoundingClientRect();
      return rect.bottom > 0 && rect.top < window.innerHeight;
    }
    try {
      if (reduce || !("IntersectionObserver" in window)) {
        showReveals(reveals);
      } else {
        var observer = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-in");
            entry.target.classList.remove("will-animate");
            observer.unobserve(entry.target);
          });
        }, { threshold: 0, rootMargin: "0px 0px 12% 0px" });
        reveals.forEach(function (el) {
          if (inView(el)) {
            el.classList.add("is-in");
          } else {
            el.classList.add("will-animate");
            observer.observe(el);
          }
        });
        document.documentElement.classList.add("can-reveal");
        var catchUp = function () {
          reveals.forEach(function (el) {
            if (!el.classList.contains("is-in") && inView(el)) {
              el.classList.add("is-in");
              el.classList.remove("will-animate");
            }
          });
        };
        window.addEventListener("scroll", catchUp, { passive: true });
        window.addEventListener("resize", catchUp);
        window.setTimeout(catchUp, 250);
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
        if (document.body.classList.contains("backNight")) return;
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

(function () {
  function isTouchOnly() {
    return !(window.matchMedia && window.matchMedia("(any-pointer: fine)").matches);
  }

  function ready(fn) {
    if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", fn);
    else fn();
  }

  ready(function () {
    var modal = document.getElementById("desktop-only-modal");
    if (!modal) return;
    var panel = modal.querySelector(".desktop-only-panel");
    var closeBtn = modal.querySelector("[data-desktop-only-close].button, .desktop-only-panel [data-desktop-only-close]");
    var lastFocus = null;

    function focusables() {
      if (!panel) return [];
      return Array.prototype.slice.call(panel.querySelectorAll('a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'));
    }

    function openModal() {
      lastFocus = document.activeElement;
      modal.hidden = false;
      document.documentElement.style.overflow = "hidden";
      var btn = closeBtn || focusables()[0];
      if (btn) btn.focus();
    }

    function closeModal() {
      modal.hidden = true;
      document.documentElement.style.overflow = "";
      if (lastFocus && typeof lastFocus.focus === "function") lastFocus.focus();
    }

    document.addEventListener("click", function (event) {
      var link = event.target.closest("a[data-desktop-only]");
      if (!link || !isTouchOnly()) return;
      event.preventDefault();
      openModal();
    });

    modal.addEventListener("click", function (event) {
      if (event.target.closest("[data-desktop-only-close]")) {
        event.preventDefault();
        closeModal();
      }
    });

    document.addEventListener("keydown", function (event) {
      if (modal.hidden) return;
      if (event.key === "Escape") {
        event.preventDefault();
        closeModal();
        return;
      }
      if (event.key !== "Tab") return;
      var list = focusables();
      if (!list.length) return;
      var first = list[0];
      var last = list[list.length - 1];
      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
      }
    });
  });
})();
