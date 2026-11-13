<?php
$page_title = 'Page not found | Soffit';
$page_description = 'That page is not on the Soffit site.';
$page_path = '/404.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/includes/head.php'; ?>
<body class="backNight">
<?php require __DIR__ . '/includes/nav.php'; ?>
  <main class="thanks-page">
    <div class="thanks-card">
      <p class="eyebrow">404</p>
      <h1>That page is not here.</h1>
      <p>The address does not match a page on this site. You can go back, or ask for a quote.</p>
      <p class="hero-actions">
        <a class="button button-primary" href="/">Soffit home</a>
        <a class="button button-ghost" href="/#contact">Get a quote</a>
      </p>
    </div>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
</body>
</html>
