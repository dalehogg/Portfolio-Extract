(function () {
  var nodes = document.querySelectorAll(".rise");
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce || !("IntersectionObserver" in window)) {
    nodes.forEach(function (el) { el.classList.add("on"); });
    return;
  }
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add("on");
      io.unobserve(entry.target);
    });
  }, { threshold: 0.18 });
  nodes.forEach(function (el) { io.observe(el); });
})();
