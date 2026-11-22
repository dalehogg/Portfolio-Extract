# Soffit Web go-live checklist

Work through this when the real domain is ready. Everything SEO-related (canonical links, Open Graph URLs, JSON-LD, `sitemap.xml`, `robots.txt`) is derived from **one value**: `baseUrl` in `site.config.json`.

## 1. Domain and build

- [ ] Confirm the live domain. `baseUrl` is currently `https://soffit.com` (intended, **not yet confirmed**). If it changes, edit `baseUrl` only, then rebuild.
- [ ] Point the domain at the InfinityFree account (add it as a domain in the control panel, set the nameservers or DNS records InfinityFree gives you).
- [ ] Turn on InfinityFree's free SSL for the domain and wait until `https://` loads without a warning. The `.htaccess` forces `http -> https` and `www -> non-www`, so SSL must be working first.
- [ ] Production build: `bash build.sh` (NOT `--preview`). Upload the contents of `dist/` into that domain's `htdocs` folder.
- [ ] Check that `https://<domain>/robots.txt` says `Allow: /` with a `Sitemap:` line, and that no page has `<meta name="robots" content="noindex, nofollow">` (only `/404.php` and `/thanks.php` should be `noindex`).
- [ ] Check `https://www.<domain>/` and `http://<domain>/` both 301 to `https://<domain>/`.
- [ ] Visit a made-up URL (for example `/nope`) and confirm the Soffit Web 404 page shows with status 404.
- [ ] Keep the hidden preview (`soffit-preview-dh.page.gd`) on `bash build.sh --preview` builds only, so it stays `noindex` with a disallow-all `robots.txt`. Consider deleting it after launch so there is only one copy of the site.

## 2. Search engines

- [ ] Google Search Console: add the domain property (DNS TXT verification), then submit `https://<domain>/sitemap.xml`.
- [ ] Use URL Inspection on the home page and request indexing.
- [ ] Optional: Bing Webmaster Tools (can import from Search Console) and submit the same sitemap.
- [ ] Test the home page in Google's Rich Results Test (ProfessionalService, WebSite, FAQPage) and a project page (BreadcrumbList).
- [ ] Test the share card with the Facebook Sharing Debugger and a LinkedIn post inspector (image `Img/og-soffit.png`, 1200x630).

## 3. Forms (FormSubmit)

- [ ] Send a real test enquiry from the **live domain** through every form: home page, Drain Saves, Cornerstone, Exclusive Cuts, Moonlodge contact, Job Pack Maker. FormSubmit treats a new domain as new, so the first submission sends an activation email to dhdaleleon@gmail.com. Click it, then submit again and confirm the email arrives with clear field names.
- [ ] After activation, FormSubmit shows a random alias for the address. Optionally swap `dhdaleleon@gmail.com` in the form `action` URLs for that alias so the email address is not in the page source.
- [ ] Check the `_next` redirect lands on `https://<domain>/thanks.php`.

## 4. Profiles and listings

- [ ] Once the Facebook Page and Google Business Profile exist, add their public URLs to `sameAs` in `site.config.json` (feeds the JSON-LD), and set each profile's website field to `https://<domain>/`.
- [ ] Use exactly the same name, phone (021 0816 9900 / +64 21 0816 9900), hours (Mon to Fri, 9:00 to 5:00 pm NZT) and "Auckland, New Zealand" on every profile so they match the site.
- [ ] Google Business Profile: a service-area business with no street address shown (the site only states Auckland).

## 5. Content still for Dale

- [ ] `showTestimonials` stays `false` until the placeholder quotes are replaced with real client words.
- [ ] Moonlodge is a mirror of moonlodge.netlify.app, which still has lorem ipsum on About, Accommodation, Art Studio and Attractions and placeholder phone/email/address on Contact. Replace with real text if Moonlodge's owner provides it, or leave as a design showcase.
- [ ] Exclusive Cuts and Drain Saves still carry their clients' own phone numbers and details. Confirm each client is happy to be shown.
- [ ] Review the starting prices in `site.config.json` (NZD, GST included).

## 6. After launch

- [ ] Delete the old Netlify site or point `dalehogg.netlify.app` at the new domain (a 301 or a link) so there is no duplicate content.
- [ ] Watch Search Console > Pages for crawl errors in the first two weeks.
- [ ] Run PageSpeed Insights on the home page and one project page.
