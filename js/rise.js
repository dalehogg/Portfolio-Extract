(function () {
  var nodes = document.querySelectorAll(".rise");
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  function show(list) {
    list.forEach(function (el) { el.classList.add("on"); });
  }
  try {
    if (reduce || !("IntersectionObserver" in window)) {
      show(nodes);
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add("on");
        io.unobserve(entry.target);
      });
    }, { threshold: 0, rootMargin: "0px 0px 8% 0px" });
    nodes.forEach(function (el) { io.observe(el); });
    document.documentElement.classList.add("can-rise");
  } catch (err) {
    document.documentElement.classList.remove("can-rise");
    show(nodes);
  }
})();
