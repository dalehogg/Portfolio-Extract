(function () {
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var lastW = 0;
  var frozenH = 0;
  var painters = [];

  function dpr() {
    var n = window.devicePixelRatio || 1;
    return n > 3 ? 3 : n;
  }

  function largeViewportHeight() {
    var ih = window.innerHeight || 0;
    var lvh = ih;
    try {
      var probe = document.createElement("div");
      probe.style.cssText = "position:fixed;top:0;left:0;height:100lvh;width:0;pointer-events:none;visibility:hidden;";
      document.documentElement.appendChild(probe);
      lvh = probe.offsetHeight || ih;
      probe.remove();
    } catch (e) {}
    var vv = window.visualViewport;
    return Math.max(ih, lvh, (vv && vv.height) || 0);
  }

  function freezeSkyHeight() {
    var w = window.innerWidth || 0;
    var h = largeViewportHeight();
    if (!frozenH || w !== lastW) {
      frozenH = h;
      lastW = w;
    } else if (h > frozenH) {
      frozenH = h;
    }
    var root = document.documentElement;
    root.style.setProperty("--sky-h", frozenH + "px");
    return frozenH;
  }

  function trackBox() {
    var track = document.querySelector("#nightSky .star-track");
    var sky = document.getElementById("nightSky");
    var w = (track && track.clientWidth) || (sky && sky.clientWidth) || window.innerWidth || 1;
    var h = (track && track.clientHeight) || 0;
    if (h < 2) {
      var skyH = (sky && sky.clientHeight) || frozenH || window.innerHeight || 800;
      h = Math.round(skyH * 2.6);
    }
    if (w < 2) w = window.innerWidth || 1280;
    return { w: w, h: h };
  }

  function fitCanvas(canvas, cssW, cssH) {
    if (!canvas) return null;
    var ratio = dpr();
    var bw = Math.max(1, Math.round(cssW * ratio));
    var bh = Math.max(1, Math.round(cssH * ratio));
    var resized = canvas.width !== bw || canvas.height !== bh;
    if (resized) {
      canvas.width = bw;
      canvas.height = bh;
    }
    canvas.style.width = cssW + "px";
    canvas.style.height = cssH + "px";
    var ctx = canvas.getContext("2d");
    ctx.setTransform(ratio, 0, 0, ratio, 0, 0);
    return { ctx: ctx, resized: resized, ratio: ratio };
  }

  function paint(canvas, count, radius, drift) {
    if (!canvas) return;
    var width = 0;
    var height = 0;
    var ctx = null;
    var stars = [];

    function rebuild(keep) {
      var box = trackBox();
      var prevW = width;
      var prevH = height;
      width = box.w;
      height = box.h;
      var fit = fitCanvas(canvas, width, height);
      if (!fit) return;
      ctx = fit.ctx;
      if (keep && stars.length && prevW > 1 && prevH > 1 && Math.abs(width - prevW) / prevW <= 0.02) {
        return;
      }
      stars = [];
      var i;
      for (i = 0; i < count; i += 1) {
        stars.push({
          x: Math.random() * width,
          y: Math.random() * height,
          r: Math.random() * radius + 0.35,
          a: 0.28 + Math.random() * 0.72,
          vx: drift ? (Math.random() - 0.45) * 0.22 : 0,
          vy: drift ? 0.04 + Math.random() * 0.16 : 0
        });
      }
    }

    function frame() {
      if (!ctx) return;
      ctx.clearRect(0, 0, width, height);
      var n;
      for (n = 0; n < stars.length; n += 1) {
        var star = stars[n];
        if (drift && !reduce) {
          star.x += star.vx;
          star.y += star.vy;
          if (star.x < 0) star.x = width;
          if (star.x > width) star.x = 0;
          if (star.y > height) star.y = 0;
        }
        /* Fixed CSS-pixel radius, drawn as a circle so a later box change
           cannot turn a 1x1 rect into a streak. */
        ctx.fillStyle = "rgba(244,240,230," + star.a.toFixed(3) + ")";
        ctx.beginPath();
        ctx.arc(star.x, star.y, star.r, 0, Math.PI * 2);
        ctx.fill();
      }
      if (drift && !reduce) window.requestAnimationFrame(frame);
    }

    function resize() {
      rebuild(true);
      if (!drift) frame();
    }

    rebuild(false);
    frame();
    painters.push(resize);
  }

  function shootingStars(canvas) {
    if (!canvas || reduce) return;
    var width = 0;
    var height = 0;
    var ctx = null;
    var bolts = [];
    var wait = 90;

    function size() {
      var box = trackBox();
      width = box.w;
      height = box.h;
      var fit = fitCanvas(canvas, width, height);
      if (fit) ctx = fit.ctx;
    }

    size();
    painters.push(size);

    function frame() {
      if (!ctx) return;
      ctx.clearRect(0, 0, width, height);
      wait -= 1;
      if (wait <= 0 && bolts.length < 2) {
        bolts.push({
          x: Math.random() * width * 0.75,
          y: Math.random() * height * 0.45,
          vx: 7 + Math.random() * 4,
          vy: 2.2 + Math.random() * 2,
          life: 0,
          max: 26 + Math.random() * 14
        });
        wait = 200 + Math.random() * 260;
      }
      var i;
      for (i = bolts.length - 1; i >= 0; i -= 1) {
        var bolt = bolts[i];
        bolt.x += bolt.vx;
        bolt.y += bolt.vy;
        bolt.life += 1;
        var alpha = 1 - bolt.life / bolt.max;
        ctx.strokeStyle = "rgba(244,240,230," + Math.max(alpha, 0).toFixed(3) + ")";
        ctx.lineWidth = 1.5;
        ctx.beginPath();
        ctx.moveTo(bolt.x, bolt.y);
        ctx.lineTo(bolt.x - bolt.vx * 5, bolt.y - bolt.vy * 5);
        ctx.stroke();
        if (bolt.life > bolt.max) bolts.splice(i, 1);
      }
      window.requestAnimationFrame(frame);
    }
    frame();
  }

  function resizeStars() {
    freezeSkyHeight();
    var i;
    for (i = 0; i < painters.length; i += 1) painters[i]();
    if (typeof window.soffitFullStarsResize === "function") {
      window.soffitFullStarsResize();
    }
  }

  window.soffitResizeStars = resizeStars;

  function boot() {
    freezeSkyHeight();
    paint(document.getElementById("stillfield"), 1500, 1.35, false);
    paint(document.getElementById("driftfield"), 110, 1.6, true);
    shootingStars(document.getElementById("shooting"));
    resizeStars();
  }

  if (document.readyState === "complete") boot();
  else window.addEventListener("load", boot);

  window.addEventListener("resize", resizeStars);
  if (window.visualViewport) {
    window.visualViewport.addEventListener("resize", resizeStars);
  }
})();
