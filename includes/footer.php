<footer class="site-footer">
  <div class="footer-bar">
    <p><?php echo htmlspecialchars((string) (($nav_site['businessName'] ?? null) ?: 'Soffit'), ENT_QUOTES, 'UTF-8'); ?> · by Dale Hogg · Freelance web design in New Zealand</p>
    <a href="/#contact">Get a quote</a>
  </div>
</footer>
<a class="sticky-quote" href="/#contact">Get a quote</a>
<?php if (!empty($page_scripts)) { echo $page_scripts; } ?>
<script src="/js/motion.js" defer></script>
