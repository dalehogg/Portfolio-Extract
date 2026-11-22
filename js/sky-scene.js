(function () {
  if (!document.body.classList.contains("backNight")) return;

  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var root = document.documentElement;
  var sky = document.getElementById("nightSky");
  var city = document.querySelector(".skyline");
  var moonTrack = document.querySelector(".realMoon-track");
  var starTrack = sky ? sky.querySelector(".star-track") : null;
  var toggle = document.getElementById("sky-toggle");
  var frame = 0;
  var KEY = "soffit-sky";
  var frozenSkyH = 0;
  var frozenSkyW = 0;
  var baselineProbe = document.createElement("div");
  baselineProbe.setAttribute("aria-hidden", "true");
  baselineProbe.style.cssText = "position:fixed;left:0;bottom:0;height:0;width:0;pointer-events:none;visibility:hidden;";
  document.body.appendChild(baselineProbe);

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
    resizeStarsSoon();
  }

  function resizeStarsSoon() {
    var run = function () {
      if (typeof window.soffitResizeStars === "function") {
        window.soffitResizeStars();
      } else if (typeof window.soffitFullStarsResize === "function") {
        window.soffitFullStarsResize();
      }
    };
    run();
    window.requestAnimationFrame(function () {
      run();
    });
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
    /* Scroll range may use the current viewport; sunset/city layout does not. */
    var viewH = baselineProbe.getBoundingClientRect().top;
    if (!(viewH > 0)) viewH = window.innerHeight || 0;
    return Math.max(1, (se.scrollHeight || 0) - viewH);
  }
  function progress() {
    return clamp(scrollTop() / scrollMax(), 0, 1);
  }
  /* Moon parallax uses the grow-only large viewport, not the current
     innerHeight, so a URL bar cannot change its progress, offset or size. */
  function stableProgress() {
    return clamp(scrollTop() / Math.max(1, (scrollRoot().scrollHeight || 0) - stableVh()), 0, 1);
  }

  function readSkyH() {
    var n = parseFloat(getComputedStyle(root).getPropertyValue("--sky-h"));
    return n > 1 ? n : 0;
  }

  function largeViewportHeight() {
    var h = 0;
    try {
      var probe = document.createElement("div");
      probe.style.cssText = "position:fixed;top:0;left:0;height:100lvh;width:0;pointer-events:none;visibility:hidden;";
      document.documentElement.appendChild(probe);
      h = probe.offsetHeight || 0;
      probe.remove();
    } catch (e) {}
    return h;
  }

  /* Grow-only cached large-viewport height. A showing URL bar must not
     shrink city or sunset sizing, or they drift apart. Width changes reset. */
  function stableVh() {
    var w = window.innerWidth || 0;
    var h = Math.max(readSkyH(), largeViewportHeight(), frozenSkyH);
    if (!frozenSkyH || w !== frozenSkyW) {
      frozenSkyH = h;
      frozenSkyW = w;
    } else if (h > frozenSkyH) {
      frozenSkyH = h;
    }
    if (frozenSkyH) root.style.setProperty("--sky-h", frozenSkyH + "px");
    return frozenSkyH || 800;
  }

  /* SVG artwork aspect (width / city height) after cropping the solid base.
     The Sky Tower sits at ~61% from the left; CSS translateX keeps it on screen. */
  var CITY_ASPECT = 1590 / 512;
  function layoutSkyline(cityIn) {
    var w = window.innerWidth || 1280;
    var vh = stableVh();
    /* Wide viewports show the full silhouette; narrow ones grow the city and crop the sides. */
    var cityH = Math.max(w / CITY_ASPECT, Math.min(vh * 0.24, 280), 160);
    var waterH = 0; /* no water band: the city sits flush on the bottom edge */
    var h = cityH;
    var hPx = h.toFixed(1) + "px";
    root.style.setProperty("--skyline-h", hPx);
    root.style.setProperty("--city-h", cityH.toFixed(1) + "px");
    root.style.setProperty("--water-h", "0px");
    /* Main rooftops (excluding the Sky Tower spire) sit at ~40% of city height. */
    root.style.setProperty("--roof-h", (cityH * 0.40).toFixed(1) + "px");
    /* Show the full silhouette when it fits; otherwise crop the sides around the Sky Tower. */
    var anchor = (cityH <= (w / CITY_ASPECT) + 0.5) ? "50%" : "61%";
    root.style.setProperty("--skyline-anchor", anchor);
    document.body.style.setProperty("--skyline-h", hPx);
    /* Height of the in-flow page only. Do not use scrollHeight: .day-clouds is
       absolutely positioned and a 400vh fallback was inflating the document,
       leaving a variable empty gap after the footer. */
    var yDoc = scrollTop();
    var contentBottom = 0;
    var full = document.getElementById("fullpage");
    var footer = document.querySelector(".site-footer");
    if (full) contentBottom = Math.max(contentBottom, full.getBoundingClientRect().bottom + yDoc);
    if (footer) contentBottom = Math.max(contentBottom, footer.getBoundingClientRect().bottom + yDoc);
    if (!(contentBottom > 0)) contentBottom = (document.body && document.body.scrollHeight) || (4 * vh);
    root.style.setProperty("--page-h", Math.round(contentBottom) + "px");
    /* Shared pixel lift for the city and the sunset/day washes. Not a % of
       each box, and not innerHeight/vh, so they stay locked when the URL bar toggles. */
    if (typeof cityIn !== "number") cityIn = 0;
    var liftPx = ((1 - cityIn) * 110 / 100) * h;
    var shift = liftPx.toFixed(1) + "px";
    root.style.setProperty("--horizon-shift", shift);
    document.body.style.setProperty("--horizon-shift", shift);
    /* Star-mask fade, measured from #nightSky's bottom to the city baseline. */
    var skyBottom = sky ? sky.getBoundingClientRect().bottom : vh;
    var base = baselineProbe.getBoundingClientRect().top;
    /* Subtract lift: when the city is below the fold, this is negative so
       the star mask does not wipe the visible night sky. Adding lift (r47)
       left only a sliver of stars at the top of the hero. */
    var horizonBottom = (skyBottom - base) - liftPx;
    var hb = horizonBottom.toFixed(1) + "px";
    root.style.setProperty("--horizon-bottom", hb);
    document.body.style.setProperty("--horizon-bottom", hb);
    /* Keep the day-sky photo fully visible while the horizon is below the fold.
       Only fade it toward the haze once the waterline is in (or very near) the viewport. */
    var fadeBottom = horizonBottom < 8 ? -2000 : horizonBottom;
    var fb = fadeBottom.toFixed(1) + "px";
    root.style.setProperty("--sky-fade-bottom", fb);
    document.body.style.setProperty("--sky-fade-bottom", fb);
    /* Warm gold/pink only behind the main rooftops; the rest of the wash eases into night. */
    var washH = 0.36 * vh;
    root.style.setProperty("--sunset-h", washH.toFixed(1) + "px");
    var warmPct = ((cityH * 0.32) / washH) * 100;
    if (warmPct < 16) warmPct = 16;
    if (warmPct > 36) warmPct = 36;
    root.style.setProperty("--sunset-warm-pct", warmPct.toFixed(2) + "%");
  }

  function cityHeightNow() {
    var w = window.innerWidth || 1280;
    var vh = stableVh();
    return Math.max(w / CITY_ASPECT, Math.min(vh * 0.24, 280), 160);
  }

  /* City and sunset arrive over the last ~city-height of scroll, measured
     from the footer, not as a fraction of the whole page (that left a
     long empty run after the contact section on some viewport heights). */
  function horizonArrival() {
    var footer = document.querySelector(".site-footer");
    var tail = Math.max(cityHeightNow() * 1.15, 180);
    if (!footer) return ease(range(stableProgress(), 0.82, 1.0));
    var y = scrollTop();
    var endY = footer.getBoundingClientRect().bottom + y;
    var dist = endY - (y + stableVh());
    return ease(clamp(1 - dist / tail, 0, 1));
  }

  function paint() {
    var p = progress();
    var arrived = horizonArrival();
    var sunset = arrived;
    /* Stars stay in the night sky; a CSS mask fades them only into the thin glow. */
    var starFade = 0;
    var cityIn = arrived;
    var moonP = stableProgress();
    var moonOut = ease(range(moonP, 0.72, 0.90));
    var day = isDay();

    layoutSkyline(cityIn);
    root.style.setProperty("--cam", p.toFixed(4));
    root.style.setProperty("--sunset-o", day ? "0" : sunset.toFixed(3));
    root.style.setProperty("--star-o", day ? "0" : (1 - starFade).toFixed(3));
    root.style.setProperty("--day-o", day ? "1" : "0");
    root.style.setProperty("--city-in", cityIn.toFixed(3));
    root.style.setProperty("--horizon-o", (day ? cityIn : sunset).toFixed(3));

    if (city) {
      /* Transform comes from --horizon-shift so it stays in lockstep with the sunset. */
      city.style.opacity = cityIn.toFixed(3);
    }

    if (moonTrack) {
      var moonH = stableVh();
      var x = -Math.min(window.innerWidth * 0.36, 480) * moonP;
      var y = Math.min(moonH * 0.08, 64) * (1 - moonOut) - moonOut * Math.min(moonH * 0.38, 280);
      var s = 1 - moonOut * 0.32;
      var o = 1 - moonOut;
      moonTrack.style.transform = "translate3d(" + x + "px," + y + "px,0) scale(" + s + ")";
      moonTrack.style.opacity = String(o);
      moonTrack.style.pointerEvents = "none";
    }

    /* One writer, one wrapper. Drive from scrollTop (not a ratio of scrollMax)
       so a changing viewport or page height cannot reverse the layer. */
    if (starTrack) {
      if (reduce) {
        starTrack.style.transform = "translate3d(0,0,0)";
      } else {
        var starY = -scrollTop() * 0.035;
        starTrack.style.transform = "translate3d(0," + starY + "px,0)";
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

  if (typeof window.soffitResizeStars !== "function") {
    /* Set a stable sky height even if sky.js has not booted yet. */
    try {
      var probe = document.createElement("div");
      probe.style.cssText = "position:fixed;top:0;left:0;height:100lvh;width:0;pointer-events:none;visibility:hidden;";
      document.documentElement.appendChild(probe);
      var h = Math.max(window.innerHeight || 0, probe.offsetHeight || 0);
      probe.remove();
      if (h) root.style.setProperty("--sky-h", h + "px");
    } catch (e) {}
  }

  bootTheme();
  paint();
  setClouds(isDay());
  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", function () { onScroll(); });
  if (window.visualViewport) {
    window.visualViewport.addEventListener("resize", onScroll, { passive: true });
    window.visualViewport.addEventListener("scroll", onScroll, { passive: true });
  }
  window.addEventListener("load", function () { paint(); });
  document.addEventListener("visibilitychange", function () { setClouds(isDay()); });
})();
