# Photo and artwork credits

The homepage Auckland skyline is a vector silhouette sitting on a CSS water band, with the page’s own day or night sky showing behind it. The daytime sky is three full-frame cloud photographs stacked down the page and blended with long soft gradients. The moon texture is a cropped full-moon photograph. Required attribution also appears in the site footer.

## Auckland skyline silhouette

- **File:** [Auckland Skyline](https://creazilla.com/media/silhouette/2959/auckland-skyline) (Creazilla, originally published 17 December 2018)
- **Author:** [Bob Comix](https://creazilla.com/user/profile/669a772469021f40ea48fdb3/all)
- **Licence:** [Creative Commons Attribution 4.0 International (CC BY 4.0)](https://creativecommons.org/licenses/by/4.0/)
- **Changes:** The solid base under the waterfront was cropped so the silhouette sits on the page’s water band. The path was optimised. A sparse row of window lights was added for night mode, and the shape is coloured with CSS (`currentColor`) so it can shift from a near-black navy at night to a soft, hazy blue-grey by day. Served as a single SVG (`Img/city/auckland-skyline.svg`).

The earlier cut-out photographs of the Auckland CBD (day: DXR, CC BY-SA 4.0; night: Ssiyamalan, CC BY-SA 4.0) were replaced by this silhouette and are no longer used on the site.

## Day sky (layer A, hero)

- **File:** [Cirrus-cumulus clouds in the sky.jpg](https://commons.wikimedia.org/wiki/File:Cirrus-cumulus_clouds_in_the_sky.jpg)
- **Author:** [Rise DHMN](https://commons.wikimedia.org/wiki/User:Rise_DHMN)
- **Source:** Wikimedia Commons, own work, 15 May 2023 (Wiki Science Competition 2023 in Russia)
- **Licence:** [Creative Commons Attribution 4.0 International (CC BY 4.0)](https://creativecommons.org/licenses/by/4.0/)
- **Original resolution:** 6144 × 8160. Used as the full-bleed daytime sky in the first viewport (graded slightly; highlights lifted). Served at 1280, 1920, 2560, and 3840 (AVIF and WebP; JPEG fallback at 1920). It is never upscaled past 6144.

## Day sky (layer B)

- **File:** [Cumulus Clouds on Horizon.jpg](https://commons.wikimedia.org/wiki/File:Cumulus_Clouds_on_Horizon.jpg)
- **Author:** [Defi22](https://commons.wikimedia.org/wiki/User:Defi22)
- **Source:** Wikimedia Commons, own work, 2 July 2017
- **Licence:** [Creative Commons Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)](https://creativecommons.org/licenses/by-sa/4.0/)
- **Original resolution:** 4928 × 3264. A sky-only crop (trees and the horizon line removed) is stacked further down the page and blended into the layers above and below with a long soft vertical mask. Served at 1280, 1920, and 2560 (AVIF and WebP), never upscaled.

## Day sky (layer C)

- **File:** [Cirrus uncinus clouds in the morning sky.jpg](https://commons.wikimedia.org/wiki/File:Cirrus_uncinus_clouds_in_the_morning_sky.jpg)
- **Author:** [ADARSHluck](https://commons.wikimedia.org/wiki/User:ADARSHluck) (Adarsh Patel)
- **Source:** Wikimedia Commons, own work
- **Licence:** [Creative Commons Attribution-ShareAlike 4.0 International (CC BY-SA 4.0)](https://creativecommons.org/licenses/by-sa/4.0/)
- **Original resolution:** 5278 × 3524. A sky-only crop (hill and branches removed) provides a thinner, wispier stretch of cloud further down the page. Served at 1280, 1920, and 2560 (AVIF and WebP), never upscaled.

The three sky photographs are stacked in document space and drift slowly sideways. There are no cut-out cloud sprites.

## Moon

- **File:** [FullMoon2010.jpg](https://commons.wikimedia.org/wiki/File:FullMoon2010.jpg)
- **Author:** [Gregory H. Revera](https://commons.wikimedia.org/wiki/User:Ghe)
- **Source:** Wikimedia Commons, own work, 10 April 2011
- **Licence:** [Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)](https://creativecommons.org/licenses/by-sa/3.0/)
- **Original resolution:** 2580 × 2452. The disc was cropped and served at 1536px (AVIF and WebP), which covers the on-page moon (230 CSS px) at 3× and more. A separate, slightly brighter day texture (`realmoon-day`) is used in day mode, with a soft feathered edge. The soft-edged night terminator is a separate overlay; it is not a blur on the texture.
