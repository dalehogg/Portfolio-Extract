<?php
$ml_links = [
    'home' => ['Home', '/projects/moonlodge/'],
    'accommodation' => ['Accommodation', '/projects/moonlodge/accommodation.php'],
    'studio' => ['Art Studio', '/projects/moonlodge/art-studio.php'],
    'attractions' => ['Attractions', '/projects/moonlodge/attractions.php'],
    'about' => ['About', '/projects/moonlodge/about.php'],
    'contact' => ['Contact', '/projects/moonlodge/contact.php'],
];
$ml_current = $ml_page ?? '';
echo '<nav class="rail" aria-label="Moonlodge">';
foreach ($ml_links as $id => $item) {
    $current = $ml_current === $id ? ' aria-current="page"' : '';
    echo '<a href="' . $item[1] . '"' . $current . '>' . $item[0] . '</a>';
}
echo '</nav>';
