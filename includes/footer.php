<?php
require_once __DIR__ . '/site.php';
$chrome_mode = isset($chrome) ? (string) $chrome : 'full';
if ($chrome_mode === 'minimal') {
    if (!isset($nav_site) || !is_array($nav_site)) {
        $nav_config = dirname(__DIR__) . '/site.config.json';
        $nav_site = json_decode((string) @file_get_contents($nav_config), true);
        if (!is_array($nav_site)) {
            $nav_site = [];
        }
    }
    $chrome_name = htmlspecialchars((string) (($nav_site['businessName'] ?? null) ?: 'Soffit Web'), ENT_QUOTES, 'UTF-8');
    echo '<footer class="soffit-foot"><p>' . $chrome_name . '</p><a href="/#contact">Get a quote</a></footer>';
    if (!empty($page_scripts)) {
        echo site_version_markup((string) $page_scripts);
    }
    echo '<script src="' . site_h(site_asset('/js/media.js')) . '" defer></script>';
    echo '<script src="' . site_h(site_asset('/js/motion.js')) . '" defer></script>';
    return;
}
?>
<footer class="site-footer">
  <div class="footer-bar">
    <p><?php echo htmlspecialchars((string) (($nav_site['businessName'] ?? null) ?: 'Soffit Web'), ENT_QUOTES, 'UTF-8'); ?> · by Dale Hogg · <?php echo htmlspecialchars((string) ($nav_site['locationLine'] ?? 'Based in Auckland, working with clients worldwide'), ENT_QUOTES, 'UTF-8'); ?></p>
<?php if (!empty($nav_site['phone'])): ?>
    <p class="footer-facts"><a href="tel:<?php echo htmlspecialchars(str_replace(' ', '', (string) $nav_site['phone']), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars((string) ($nav_site['phoneDisplay'] ?? $nav_site['phone']), ENT_QUOTES, 'UTF-8'); ?></a> · Mon to Fri, 9:00 am to 5:00 pm NZT · Prices include GST</p>
<?php endif; ?>
    <a href="/#contact">Get a quote</a>
<?php if (!empty($show_photo_credit)): ?>
    <p class="photo-credit">Photos: day skyline, <a href="https://commons.wikimedia.org/wiki/File:Auckland_Skyline_as_seen_from_Devonport_20100128_3.jpg">DXR</a> (<a href="https://creativecommons.org/licenses/by-sa/4.0/">CC BY-SA 4.0</a>); night skyline, <a href="https://commons.wikimedia.org/wiki/File:Auckland_Skyline_383495.jpg">Ssiyamalan</a> (<a href="https://creativecommons.org/licenses/by-sa/4.0/">CC BY-SA 4.0</a>); clouds, <a href="https://www.pexels.com/photo/white-cumulus-clouds-in-bright-blue-sky-16735355/">Mehmet Turgut Kirkgoz</a> (Pexels licence); moon, <a href="https://commons.wikimedia.org/wiki/File:FullMoon2010.jpg">Gregory H. Revera</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC BY-SA 3.0</a>). Skyline photos cropped and the sky faded to blend with the page.</p>
<?php endif; ?>
  </div>
</footer>
<a class="sticky-quote" href="/#contact">Get a quote</a>
<?php if (!empty($page_scripts)) { echo site_version_markup((string) $page_scripts); } ?>
<script src="<?php echo site_h(site_asset('/js/media.js')); ?>" defer></script>
<script src="<?php echo site_h(site_asset('/js/motion.js')); ?>" defer></script>
