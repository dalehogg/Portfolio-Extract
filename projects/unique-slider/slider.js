(function () {
  var list = document.getElementById("slideList");
  var windowEl = document.querySelector(".us-window");
  var previous = document.getElementById("PreviousHidden");
  var next = document.getElementById("NextHidden");
  var count = document.getElementById("slide-count");
  if (!list || !windowEl || !previous || !next) return;
  var slides = list.querySelectorAll("li");
  var index = 0;
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var timer = 0;

  function show(nextIndex) {
    index = (nextIndex + slides.length) % slides.length;
    list.style.transform = "translate3d(" + (-index * 100 / slides.length) + "%,0,0)";
    if (count) count.textContent = (index + 1) + " / " + slides.length;
  }

  function arm() {
    if (reduce) return;
    window.clearInterval(timer);
    timer = window.setInterval(function () { show(index + 1); }, 10000);
  }

  next.addEventListener("click", function () { show(index + 1); arm(); });
  previous.addEventListener("click", function () { show(index - 1); arm(); });
  document.addEventListener("keydown", function (event) {
    if (event.key === "ArrowRight") show(index + 1);
    if (event.key === "ArrowLeft") show(index - 1);
    arm();
  });
  list.addEventListener("click", function (event) {
    var card = event.target.closest(".card");
    if (!card) return;
    var open = card.classList.contains("widthIncrease");
    card.classList.toggle("widthIncrease", !open);
    card.classList.toggle("one", open);
  });
  windowEl.addEventListener("mouseenter", function () { window.clearInterval(timer); });
  windowEl.addEventListener("mouseleave", arm);
  show(0);
  arm();
})();
