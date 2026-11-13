(function () {
  var root = document.querySelector(".ds");
  if (!root) return;

  var form = document.getElementById("client-form");
  if (form) {
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
  }

  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

  var nodes = Array.prototype.slice.call(root.querySelectorAll("[data-drift]"));
  var span = root.querySelector("[data-span]");
  var ticking = false;

  function clamp(n) {
    return n < 0 ? 0 : n > 1 ? 1 : n;
  }

  function paint() {
    ticking = false;
    var vh = window.innerHeight || 1;
    var doc = document.documentElement.scrollHeight - vh;
    var page = doc > 0 ? (window.scrollY || 0) / doc : 0;
    root.style.setProperty("--page", page.toFixed(4));
    nodes.forEach(function (el) {
      var rect = el.getBoundingClientRect();
      el.style.setProperty("--drift", clamp((vh - rect.top) / (vh + rect.height)).toFixed(4));
    });
    if (span) {
      var rect = span.getBoundingClientRect();
      span.style.setProperty("--span", clamp((vh * 0.45 - rect.top) / (rect.height || 1)).toFixed(4));
    }
  }

  function onScroll() {
    if (ticking) return;
    ticking = true;
    window.requestAnimationFrame(paint);
  }

  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", onScroll);
  paint();
})();
