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

  /* SVG artwork aspect (width / city height) after cropping the solid base.
     The Sky Tower sits at ~61% from the left; CSS translateX keeps it on screen. */
  var CITY_ASPECT = 1590 / 512;
  function layoutSkyline(cityIn) {
    var w = window.innerWidth || 1280;
    var vh = window.innerHeight || 800;
    /* Wide viewports show the full silhouette; narrow ones grow the city and crop the sides. */
    var cityH = Math.max(w / CITY_ASPECT, Math.min(vh * 0.24, 280), 160);
    var waterH = Math.max(56, Math.min(vh * 0.15, 180));
    var h = cityH + waterH;
    var hPx = h.toFixed(1) + "px";
    root.style.setProperty("--skyline-h", hPx);
    root.style.setProperty("--city-h", cityH.toFixed(1) + "px");
    root.style.setProperty("--water-h", waterH.toFixed(1) + "px");
    /* Show the full silhouette when it fits; otherwise crop the sides around the Sky Tower. */
    var anchor = (cityH <= (w / CITY_ASPECT) + 0.5) ? "50%" : "61%";
    root.style.setProperty("--skyline-anchor", anchor);
    document.body.style.setProperty("--skyline-h", hPx);
    var se = scrollRoot();
    var pageH = Math.max(se.scrollHeight || 0, (document.body && document.body.scrollHeight) || 0, 400 * vh / 100);
    root.style.setProperty("--page-h", pageH + "px");
    /* Compute from the intended lift, not getBoundingClientRect (that is one frame behind the transform). */
    if (typeof cityIn !== "number") cityIn = 0;
    var liftPct = (1 - cityIn) * 110;
    var horizonBottom = waterH - (liftPct / 100) * h;
    var hb = horizonBottom.toFixed(1) + "px";
    root.style.setProperty("--horizon-bottom", hb);
    document.body.style.setProperty("--horizon-bottom", hb);
    /* Keep the day-sky photo fully visible while the horizon is below the fold.
       Only fade it toward the haze once the waterline is in (or very near) the viewport. */
    var fadeBottom = horizonBottom < 8 ? -2000 : horizonBottom;
    var fb = fadeBottom.toFixed(1) + "px";
    root.style.setProperty("--sky-fade-bottom", fb);
    document.body.style.setProperty("--sky-fade-bottom", fb);
    /* Thin warm glow: just a short band above the rooftops (start of a sunset). */
    var warmPct = ((waterH + cityH * 0.22) / (0.48 * vh)) * 100;
    if (warmPct < 18) warmPct = 18;
    if (warmPct > 55) warmPct = 55;
    root.style.setProperty("--sunset-warm-pct", warmPct.toFixed(2) + "%");
  }

  function paint() {
    var p = progress();
    /* City and a thin sunset only arrive in the last ~18% of the scroll.
       Most of the night page stays a deep starry sky. */
    var sunset = ease(range(p, 0.82, 1.0));
    var starFade = ease(range(p, 0.90, 1.0));
    var cityIn = ease(range(p, 0.82, 1.0));
    var moonOut = ease(range(p, 0.72, 0.90));
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
