(function () {
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  function paint(canvas, count, radius, drift) {
    if (!canvas) return;
    var sky = document.getElementById("nightSky");
    if (!sky) return;
    var width = sky.clientWidth || window.innerWidth;
    var height = sky.clientHeight || window.innerHeight;
    canvas.width = width;
    canvas.height = height;
    var ctx = canvas.getContext("2d");
    var stars = [];
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
    function frame() {
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
        ctx.fillStyle = "rgba(244,240,230," + star.a.toFixed(3) + ")";
        ctx.fillRect(star.x, star.y, star.r, star.r);
      }
      if (drift && !reduce) window.requestAnimationFrame(frame);
    }
    frame();
  }

  function boot() {
    paint(document.getElementById("stillfield"), 1500, 1.35, false);
    paint(document.getElementById("driftfield"), 110, 1.6, true);
  }

  if (document.readyState === "complete") boot();
  else window.addEventListener("load", boot);
})();
