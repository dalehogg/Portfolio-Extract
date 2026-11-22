# Soffit Web: SEO go-live checklist

Use this once Dale has a live domain and has approved going public. Nothing here should be done against the hidden preview at `https://soffit-preview-dh.page.gd`. The preview build stays noindex, and its robots.txt disallows all crawlers.

The intended domain in `site.config.json` is `https://soffit.com`. That name is not confirmed. Replace it with the real domain everywhere below.

## 1. Point the site at the real domain

1. Buy and set up the domain (DNS A or CNAME records to the live host, plus HTTPS).
2. In `/workspace/soffit/site.config.json`, set `baseUrl` to the live origin, with no trailing path, for example `https://soffit.com`. Leave `previewBaseUrl` as the hidden preview.
3. Keep `noindex` as `false` in that file. A production build will write indexable pages. A preview build (`bash build.sh --preview`) still forces noindex and a disallow-all robots.txt, no matter what this flag says.
4. From the repo, run a production build (not preview):

   `bash build.sh`

   This stamps canonical URLs, Open Graph tags, JSON-LD, `sitemap.xml` and `robots.txt` from `baseUrl`, and writes the same sitemap and robots files back into the repo.
5. Upload the production `dist/` to the live host (the approved account and path only, and only after Dale has said to go live). Do not upload a preview zip to the live domain.
6. Open the live homepage and check: the page title, the canonical tag, Open Graph URLs, and the JSON-LD `url` all use the new domain. `https://<domain>/robots.txt` should allow crawling and point at `https://<domain>/sitemap.xml`. View source and confirm there is no `noindex` meta tag and no `X-Robots-Tag: noindex` header.

## 2. Google Search Console (domain property)

1. Sign in at [Google Search Console](https://search.google.com/search-console).
2. Add a **Domain** property for the root domain (for example `soffit.com`), not only the `www` or `https` URL prefix. This covers http, https, www and non-www together.
3. Choose **DNS TXT** verification. Google will show a TXT record.
4. Add that TXT record at the domain registrar or DNS host. Wait until it resolves (often a few minutes, sometimes up to 48 hours).
5. Click **Verify** in Search Console. Leave the TXT record in place after it succeeds.
6. In Search Console, go to **Sitemaps** and submit `https://<domain>/sitemap.xml`.
7. Use **URL inspection** on the homepage (`https://<domain>/`). If it looks correct, click **Request indexing**.
8. Repeat URL inspection and request indexing for the main project pages if you want them considered sooner. Search Console does not guarantee a date.
9. Optional but useful: add the `www` / non-www and http / https variants only if you did not use a Domain property. The site already redirects www to non-www and http to https.

## 3. Link the website on Google Business Profile

1. Open the Soffit Web [Google Business Profile](https://business.google.com/).
2. Set the **Website** field to `https://<domain>/` (the homepage). This should stay blank until the live domain is confirmed.
3. If you use a booking or enquiry link, use `https://<domain>/#contact`.
4. Save. A website change can trigger a review; wait for Google to finish it before assuming the new URL is public.

## 4. Link the website on the Facebook Page

1. Open the Soffit Web Facebook Page settings.
2. Set the **Website** field to `https://<domain>/`. This should also stay blank until the domain is confirmed.
3. If the Page has an action button, switch it from “Send email” to **Contact us** (or similar) pointing at `https://<domain>/#contact`, if Dale wants that.
4. Copy the public Page URL (for example `https://www.facebook.com/soffitweb`, once the handle is confirmed).
5. Add that URL to the `sameAs` array in `site.config.json`:

   `"sameAs": ["https://www.facebook.com/<handle>"]`

   You can add the Google Business Profile public URL to the same list later. Rebuild production (`bash build.sh`) and upload again so the footer shows the link and the JSON-LD `sameAs` list is updated. The footer link stays hidden while `sameAs` is empty.

## 5. Bing Webmaster Tools

1. Sign in at [Bing Webmaster Tools](https://www.bing.com/webmasters).
2. Add the live site. Prefer **Import from Google Search Console** so you do not have to complete a second DNS check if Bing offers that import.
3. If import is not available, verify with a DNS TXT record, as with Google.
4. Submit `https://<domain>/sitemap.xml`.

## 6. After it is live, keep an eye on

- Search Console coverage and sitemap status, over the first couple of weeks.
- FormSubmit on the enquiry form, which needs to be re-activated for the live domain if it was last set up on the preview host.
- The Facebook and Google website fields, if the domain ever changes.
- `sameAs` and a production rebuild, whenever a public profile URL is added or changed.

## Notes that stay in force

- Do not submit the preview host (`soffit-preview-dh.page.gd`) to Search Console, Bing, Facebook or Google Business Profile as the official website.
- Personal details on concept project pages stay as placeholders until Dale replaces them.
- Nothing goes public on Facebook or Google, and the site does not go live, without Dale’s yes.
