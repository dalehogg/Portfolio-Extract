<?php
// Full-screen gate for Custom Paint and Job Pack Maker on touch-only devices.
function desktop_only_render_overlay(): void
{
    ?>
<div class="desktop-only-overlay" role="dialog" aria-modal="true" aria-labelledby="desktop-only-overlay-title" aria-describedby="desktop-only-overlay-copy">
  <div class="desktop-only-overlay-panel">
    <h2 id="desktop-only-overlay-title">Best on a laptop or desktop</h2>
    <p id="desktop-only-overlay-copy">This project isn't available on mobile or tablet yet. It's built for bigger screens, so please open it on a laptop or desktop.</p>
    <a class="button" id="desktop-only-back" href="/#work">Back to projects</a>
  </div>
</div>
<script>
(function () {
  if (!document.documentElement.classList.contains("is-touch-only")) return;
  var back = document.getElementById("desktop-only-back");
  if (back) back.focus();
})();
</script>
    <?php
}
