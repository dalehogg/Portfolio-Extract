// Moonlodge: header goes solid on scroll, gentle parallax on the photo fold, full-screen menu.
// A vanilla rewrite of the original js/full.js (which needed jQuery).
(function () {
  var header = document.querySelector("[data-header]");
  var fold = document.querySelector(".fold-img");
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var ticking = false;

  function onScroll() {
    var y = window.scrollY || window.pageYOffset;
    if (header) header.classList.toggle("fullOpac", y >= 100);
    if (fold && !reduce && y < window.innerHeight * 1.2) {
      fold.style.transform = "translate3d(0," + (y * 0.12).toFixed(1) + "px,0)";
    }
    ticking = false;
  }
  window.addEventListener("scroll", function () {
    if (!ticking) { ticking = true; requestAnimationFrame(onScroll); }
  }, { passive: true });
  onScroll();

  var menu = document.querySelector("[data-menu]");
  var openBtn = document.querySelector("[data-menu-open]");
  var closeBtn = document.querySelector("[data-menu-close]");
  if (!menu || !openBtn || !closeBtn) return;

  function open() {
    menu.hidden = false;
    openBtn.setAttribute("aria-expanded", "true");
    document.documentElement.style.overflow = "hidden";
    requestAnimationFrame(function () { menu.classList.add("is-open"); closeBtn.focus(); });
  }
  function close() {
    menu.classList.remove("is-open");
    openBtn.setAttribute("aria-expanded", "false");
    document.documentElement.style.overflow = "";
    setTimeout(function () { menu.hidden = true; }, reduce ? 0 : 300);
    openBtn.focus();
  }
  openBtn.addEventListener("click", open);
  closeBtn.addEventListener("click", close);
  menu.addEventListener("click", function (event) {
    if (event.target === menu || event.target.closest("a")) close();
  });
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && !menu.hidden) close();
  });
})();
