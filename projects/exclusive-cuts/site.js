(function () {
  var root = document.querySelector(".ec");
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

  var more = document.getElementById("view-more");
  var dialog = document.getElementById("more-cuts");
  if (more && dialog && typeof dialog.showModal === "function") {
    more.addEventListener("click", function () {
      dialog.showModal();
    });
  }

  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    root.classList.add("is-still");
    return;
  }

  var nodes = Array.prototype.slice.call(root.querySelectorAll("[data-drift]"));
  var ticking = false;

  function clamp(n) {
    return n < 0 ? 0 : n > 1 ? 1 : n;
  }

  function paint() {
    ticking = false;
    var vh = window.innerHeight || 1;
    nodes.forEach(function (el) {
      var rect = el.getBoundingClientRect();
      el.style.setProperty("--drift", clamp((vh - rect.top) / (vh + rect.height)).toFixed(4));
    });
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
