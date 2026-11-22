(function () {
  if (!document.body.classList.contains("backNight")) return;

  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var root = document.documentElement;
  var sky = document.getElementById("nightSky");
  var city = document.querySelector(".skyline");
  var moonTrack = document.querySelector(".realMoon-track");
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
    setClouds(day);
    paint();
  }

  function setClouds(day) {
    var el = document.querySelector(".day-clouds");
    if (!el) return;
    var play = !!day && !document.hidden && !reduce;
    el.classList.toggle("is-paused", !play);
  }

  function scrollRoot() {
    return document.scrollingElement || document.documentElement;
  }
  function scrollTop() {
    return scrollRoot().scrollTop || 0;
  }
  function scrollMax() {
    var se = scrollRoot();
    return Math.max(1, (se.scrollHeight || 0) - (window.innerHeight || 0));
  }
  function progress() {
    return clamp(scrollTop() / scrollMax(), 0, 1);
  }

  /* Visible city+water aspect (width/height) and water band as a fraction of that height. */
  var ASPECT = { day: 2.5309, night: 2.0830 };
  var WATER = { day: 0.2385, night: 0.2147 };

  function layoutSkyline(cityIn) {
    var day = isDay();
    var aspect = day ? ASPECT.day : ASPECT.night;
    var frac = day ? WATER.day : WATER.night;
    var w = window.innerWidth || 1280;
    var h = w / aspect;
    var hPx = h.toFixed(1) + "px";
    root.style.setProperty("--skyline-h", hPx);
    document.body.style.setProperty("--skyline-h", hPx);
    var se = scrollRoot();
    var pageH = Math.max(se.scrollHeight || 0, (document.body && document.body.scrollHeight) || 0, 400 * (window.innerHeight || 800) / 100);
    root.style.setProperty("--page-h", pageH + "px");
    /* Compute from the intended lift, not getBoundingClientRect (that is one frame behind the transform). */
    if (typeof cityIn !== "number") cityIn = 0;
    var liftPct = (1 - cityIn) * 110;
    var horizonBottom = h * frac - (liftPct / 100) * h;
    var hb = horizonBottom.toFixed(1) + "px";
    root.style.setProperty("--horizon-bottom", hb);
    document.body.style.setProperty("--horizon-bottom", hb);
    /* Keep the day-sky photo fully visible while the horizon is below the fold.
       Only fade it toward the haze once the waterline is in (or very near) the viewport. */
    var fadeBottom = horizonBottom < 8 ? -2000 : horizonBottom;
    var fb = fadeBottom.toFixed(1) + "px";
    root.style.setProperty("--sky-fade-bottom", fb);
    document.body.style.setProperty("--sky-fade-bottom", fb);
  }

  function paint() {
    var p = progress();
    var sunset = ease(range(p, 0.22, 0.85));
    var starFade = ease(range(p, 0.4, 0.82));
    var cityIn = ease(range(p, 0.28, 0.86));
    var moonOut = ease(range(p, 0.48, 0.82));
    var day = isDay();

    layoutSkyline(cityIn);
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

    if (moonTrack) {
      var x = -Math.min(window.innerWidth * 0.36, 480) * p;
      var y = Math.min(window.innerHeight * 0.08, 64) * (1 - moonOut) - moonOut * Math.min(window.innerHeight * 0.38, 280);
      var s = 1 - moonOut * 0.32;
      var o = 1 - moonOut;
      moonTrack.style.transform = "translate3d(" + x + "px," + y + "px,0) scale(" + s + ")";
      moonTrack.style.opacity = String(o);
      moonTrack.style.pointerEvents = "none";
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
      if (moonTrack) {
        moonTrack.style.transform = "translate3d(0," + (-moonOut * 20) + "vh,0)";
        moonTrack.style.opacity = String(1 - moonOut);
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
  setClouds(isDay());
  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", function () { onScroll(); });
  window.addEventListener("load", function () { paint(); });
  document.addEventListener("visibilitychange", function () { setClouds(isDay()); });
})();
