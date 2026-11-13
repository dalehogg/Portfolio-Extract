<?php
$chrome_mode = isset($chrome) ? (string) $chrome : 'full';
if ($chrome_mode === 'minimal') {
    if (!isset($nav_site) || !is_array($nav_site)) {
        $nav_config = dirname(__DIR__) . '/site.config.json';
        $nav_site = json_decode((string) @file_get_contents($nav_config), true);
        if (!is_array($nav_site)) {
            $nav_site = [];
        }
    }
    $chrome_name = htmlspecialchars((string) (($nav_site['businessName'] ?? null) ?: 'Soffit'), ENT_QUOTES, 'UTF-8');
    echo '<footer class="soffit-foot"><p>' . $chrome_name . '</p><a href="/#contact">Get a quote</a></footer>';
    if (!empty($page_scripts)) {
        echo $page_scripts;
    }
    echo '<script src="/js/motion.js" defer></script>';
    return;
}
?>
<footer class="site-footer">
  <div class="footer-bar">
    <p><?php echo htmlspecialchars((string) (($nav_site['businessName'] ?? null) ?: 'Soffit'), ENT_QUOTES, 'UTF-8'); ?> · by Dale Hogg · Freelance web design in New Zealand</p>
    <a href="/#contact">Get a quote</a>
  </div>
</footer>
<a class="sticky-quote" href="/#contact">Get a quote</a>
<?php if (!empty($page_scripts)) { echo $page_scripts; } ?>
<script src="/js/motion.js" defer></script>
