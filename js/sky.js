(function () {
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var lastW = window.innerWidth;
  function widthChanged() {
    var w = window.innerWidth;
    if (w === lastW) return false;
    lastW = w;
    return true;
  }

  function paint(canvas, count, radius, drift) {
    if (!canvas) return;
    var sky = document.getElementById("nightSky");
    if (!sky) return;
    var width = canvas.clientWidth || sky.clientWidth || window.innerWidth;
    var height = canvas.clientHeight || sky.clientHeight || window.innerHeight;
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

  function shootingStars(canvas) {
    if (!canvas || reduce) return;
    var sky = document.getElementById("nightSky");
    if (!sky) return;
    var width = 0;
    var height = 0;
    var ctx = canvas.getContext("2d");
    var bolts = [];
    var wait = 90;
    function size() {
      width = canvas.clientWidth || sky.clientWidth || window.innerWidth;
      height = canvas.clientHeight || sky.clientHeight || window.innerHeight;
      canvas.width = width;
      canvas.height = height;
    }
    size();
    window.addEventListener("resize", function () { if (widthChanged()) size(); });
    function frame() {
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

  function boot() {
    paint(document.getElementById("stillfield"), 1500, 1.35, false);
    paint(document.getElementById("driftfield"), 110, 1.6, true);
    shootingStars(document.getElementById("shooting"));
  }

  if (document.readyState === "complete") boot();
  else window.addEventListener("load", boot);
})();
