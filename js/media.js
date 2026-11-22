(function () {
  document.documentElement.classList.add("js");

  function armImage(img) {
    if (!img || img.dataset.mediaArmed === "1") return;
    if (img.closest && img.closest(".day-clouds")) return;
    img.dataset.mediaArmed = "1";
    if (!img.classList.contains("media-img")) img.classList.add("media-img");
    var ph = null;
    function addPlaceholder() {
      var host = img.offsetParent;
      if (!host || !img.offsetWidth || !img.offsetHeight) return;
      ph = document.createElement("span");
      ph.className = "media-ph";
      ph.setAttribute("aria-hidden", "true");
      ph.style.top = img.offsetTop + "px";
      ph.style.left = img.offsetLeft + "px";
      ph.style.width = img.offsetWidth + "px";
      ph.style.height = img.offsetHeight + "px";
      var r = window.getComputedStyle(img).borderRadius;
      if (r) ph.style.borderRadius = r;
      host.appendChild(ph);
    }
    function dropPlaceholder() {
      if (!ph) return;
      var el = ph;
      ph = null;
      el.classList.add("is-gone");
      setTimeout(function () { if (el.parentNode) el.parentNode.removeChild(el); }, 600);
    }
    function reveal() {
      var wasHidden = img.classList.contains("is-pending");
      img.classList.remove("is-pending");
      img.classList.add("is-loaded");
      dropPlaceholder();
      if (wasHidden && img.animate && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        var target = window.getComputedStyle(img).opacity;
        img.animate({ opacity: [0, target] }, { duration: 500, easing: "ease" });
      }
    }
    function done() {
      if (img.decode) img.decode().then(reveal, reveal);
      else reveal();
    }
    function fail() {
      dropPlaceholder();
      img.classList.remove("is-pending");
      img.classList.add("is-broken");
      if (!img.nextElementSibling || !img.nextElementSibling.classList.contains("media-fallback")) {
        var note = document.createElement("span");
        note.className = "media-fallback";
        note.textContent = img.alt ? img.alt : "Image unavailable";
        img.insertAdjacentElement("afterend", note);
      }
    }
    if (img.complete && img.naturalWidth > 0) {
      done();
      return;
    }
    if (img.complete && img.naturalWidth === 0 && img.src) {
      fail();
      return;
    }
    img.classList.add("is-pending");
    addPlaceholder();
    img.addEventListener("load", done, { once: true });
    img.addEventListener("error", fail, { once: true });
  }

  function imageUrl(value) {
    var match = /url\((['"]?)(.*?)\1\)/i.exec(value || "");
    return match ? match[2] : "";
  }

  function armBackground(el) {
    if (!el || el.dataset.bgArmed === "1" || el.tagName === "IMG" || el.tagName === "BODY" || el.tagName === "HTML") return;
    var style = window.getComputedStyle(el);
    if (style.position === "fixed") return;
    var url = imageUrl(style.backgroundImage);
    if (!url || url.indexOf("data:") === 0) return;
    el.dataset.bgArmed = "1";
    if (style.position === "static") el.style.position = "relative";
    el.classList.add("bg-pending");
    var probe = new Image();
    probe.onload = function () { el.classList.add("is-loaded"); };
    probe.onerror = function () { el.classList.add("is-loaded"); };
    probe.src = url;
  }

  function scan(root) {
    var scope = root && root.querySelectorAll ? root : document;
    scope.querySelectorAll("img").forEach(armImage);
    scope.querySelectorAll("[style*='url('], figure, .bleed, .frame-shot, .cc-hero-photo, .mark-stage").forEach(armBackground);
  }

  function start() {
    scan(document);
    if (!window.MutationObserver) return;
    var observer = new MutationObserver(function (records) {
      records.forEach(function (record) {
        record.addedNodes.forEach(function (node) {
          if (node.nodeType !== 1) return;
          if (node.tagName === "IMG") armImage(node);
          scan(node);
        });
      });
    });
    observer.observe(document.documentElement, { childList: true, subtree: true });
  }

  if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", start);
  else start();
})();
