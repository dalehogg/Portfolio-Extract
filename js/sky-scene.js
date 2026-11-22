(function () {
  if (!document.body.classList.contains("backNight")) return;

  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var root = document.documentElement;
  var sky = document.getElementById("nightSky");
  var city = document.querySelector(".skyline");
  var moon = document.querySelector(".realMoon-container");
  var starLayers = sky ? Array.prototype.slice.call(sky.querySelectorAll("canvas")) : [];
  var toggle = document.getElementById("sky-toggle");
  var frame = 0;
  var KEY = "soffit-sky";

  function clamp(n, a, b) { return Math.max(a, Math.min(b, n)); }
  function ease(t) { return t * t * (3 - 2 * t); }
  function range(p, a, b) { return clamp((p - a) / Math.max(0.0001, b - a), 0, 1); }

  function isDay() { return root.classList.contains("is-day"); }

  function applyTheme(day, persist) {
    root.classList.toggle("is-day", day);
    if (toggle) {
      toggle.setAttribute("aria-pressed", day ? "true" : "false");
      toggle.setAttribute("aria-label", day ? "Switch to night" : "Switch to day");
      var label = toggle.querySelector(".sky-toggle-text");
      if (label) label.textContent = day ? "Night" : "Day";
    }
    if (persist) {
      try { localStorage.setItem(KEY, day ? "day" : "night"); } catch (e) {}
    }
    paint();
  }

  function progress() {
    var max = Math.max(1, (document.documentElement.scrollHeight || 0) - window.innerHeight);
    return clamp((window.scrollY || 0) / max, 0, 1);
  }

  function paint() {
    var p = progress();
    var sunset = ease(range(p, 0.22, 0.85));
    var starFade = ease(range(p, 0.4, 0.82));
    var cityIn = ease(range(p, 0.28, 0.86));
    var moonOut = ease(range(p, 0.48, 0.82));
    var day = isDay();

    root.style.setProperty("--cam", p.toFixed(4));
    root.style.setProperty("--sunset-o", day ? "0" : sunset.toFixed(3));
    root.style.setProperty("--star-o", day ? "0" : (1 - starFade).toFixed(3));
    root.style.setProperty("--day-o", day ? "1" : "0");
    root.style.setProperty("--city-in", cityIn.toFixed(3));
    root.style.setProperty("--horizon-o", (day ? cityIn : sunset).toFixed(3));

    if (city) {
      var lift = (1 - cityIn) * 110;
      city.style.transform = "translate3d(0," + lift.toFixed(2) + "%,0)";
      city.style.opacity = cityIn.toFixed(3);
    }

    if (moon) {
      var x = -Math.min(window.innerWidth * 0.36, 480) * p;
      var y = Math.min(window.innerHeight * 0.08, 64) * (1 - moonOut) - moonOut * Math.min(window.innerHeight * 0.38, 280);
      var s = 1 - moonOut * 0.32;
      var o = 1 - moonOut;
      moon.style.transform = "translate3d(" + x.toFixed(1) + "px," + y.toFixed(1) + "px,0) scale(" + s.toFixed(3) + ")";
      moon.style.opacity = o.toFixed(3);
      moon.style.pointerEvents = "none";
    }

    if (!reduce) {
      starLayers.forEach(function (el) {
        if (el.id === "sky-lines") {
          el.style.opacity = day ? "0" : (1 - starFade).toFixed(3);
          return;
        }
        var depth = parseFloat(el.getAttribute("data-depth")) || 24;
        var shift = -p * depth * 5.2;
        el.style.transform = "translate3d(0," + shift.toFixed(1) + "px,0)";
        if (el.id !== "sky-lines") el.style.opacity = day ? "0" : (1 - starFade * 0.85).toFixed(3);
      });
    } else if (sky) {
      sky.style.opacity = day ? "0" : (1 - starFade * 0.6).toFixed(3);
      if (moon) {
        moon.style.transform = "translate3d(0," + (-moonOut * 20) + "vh,0)";
        moon.style.opacity = (1 - moonOut).toFixed(3);
      }
    }
  }

  function onScroll() {
    if (frame) return;
    frame = window.requestAnimationFrame(function () {
      frame = 0;
      paint();
    });
  }

  function bootTheme() {
    var saved = "";
    try { saved = localStorage.getItem(KEY) || ""; } catch (e) {}
    applyTheme(saved === "day", false);
  }

  if (toggle) {
    toggle.addEventListener("click", function () {
      applyTheme(!isDay(), true);
    });
  }

  bootTheme();
  paint();
  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", onScroll);
  window.addEventListener("load", paint);
})();
