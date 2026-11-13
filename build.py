#!/usr/bin/env python3
"""Assemble a static dist/ folder for upload to InfinityFree htdocs."""

from __future__ import annotations

import html
import json
import re
import shutil
from pathlib import Path

ROOT = Path(__file__).resolve().parent
DIST = ROOT / "dist"
CONFIG_PATH = ROOT / "site.config.json"


def money(amount: int) -> str:
    return f"NZ${amount:,.0f}"


def price_cards(packages: list[dict]) -> str:
    parts = []
    for package in packages:
        period = package.get("period", "project")
        figure = money(package["fromNzd"])
        if period == "month":
            price_html = f'From <span>{figure}</span> <small>/ month</small>'
        else:
            price_html = f'From <span>{figure}</span>'
        items = "".join(f"<li>{html.escape(item)}</li>" for item in package["includes"][:3])
        parts.append(
            f"""<article class="price-card" id="price-{html.escape(package["id"])}">
  <p class="kicker">{html.escape(package["kicker"])}</p>
  <h3>{html.escape(package["name"])}</h3>
  <p class="price">{price_html}</p>
  <p class="price-note">{html.escape(package["note"])}</p>
  <ul>{items}</ul>
  <a class="button button-primary" href="#contact" data-project-type="{html.escape(package["projectType"])}">Get a custom quote</a>
</article>"""
        )
    return "\n".join(parts)


def testimonial_cards(entries: list[dict]) -> str:
    parts = []
    for entry in entries:
        parts.append(
            f"""<blockquote class="quote-card">
  <p>{html.escape(entry["quote"])}</p>
  <footer><span class="quote-name">{html.escape(entry["name"])}</span>, <span class="quote-business">{html.escape(entry["business"])}</span></footer>
</blockquote>"""
        )
    return "\n".join(parts)


def replace_block(source: str, start: str, end: str, inner: str) -> str:
    before, _, rest = source.partition(start)
    _, _, after = rest.partition(end)
    if not before or not after and end not in source:
        raise SystemExit(f"Missing markers {start} {end}")
    return f"{before}{start}\n{inner}\n{end}{after}"


def copy_tree(src: Path, dest: Path) -> None:
    if src.is_dir():
        shutil.copytree(src, dest, dirs_exist_ok=True)
    else:
        dest.parent.mkdir(parents=True, exist_ok=True)
        shutil.copy2(src, dest)


def minify_css(text: str) -> str:
    text = re.sub(r"/\*.*?\*/", "", text, flags=re.S)
    text = re.sub(r"\s+", " ", text)
    return text.strip()


def seo_tags(meta: dict, config: dict) -> str:
    base = config["baseUrl"].rstrip("/")
    path = meta["path"]
    url = base + ("/" if path == "/" else path)
    title = html.escape(meta["title"], quote=True)
    desc = html.escape(meta["description"], quote=True)
    image = base + "/Img/og.png"
    name = html.escape(config["businessName"], quote=True)
    kind = meta.get("kind", "page")
    robots = '    <meta name="robots" content="noindex">\n' if kind == "utility" else ""
    if kind == "home":
        linked = {
            "@context": "https://schema.org",
            "@type": ["ProfessionalService", "LocalBusiness"],
            "name": config["businessName"],
            "description": meta["description"],
            "url": url,
            "image": image,
            "email": config["email"],
            "founder": {"@type": "Person", "name": config["founderName"]},
            "areaServed": {"@type": "Country", "name": "New Zealand"},
            "address": {"@type": "PostalAddress", "addressCountry": "NZ"},
        }
    elif kind == "project":
        linked = {
            "@context": "https://schema.org",
            "@type": "CreativeWork",
            "name": meta.get("name", meta["title"]),
            "description": meta["description"],
            "url": url,
            "image": image,
            "creator": {"@type": "Person", "name": config["founderName"]},
            "provider": {
                "@type": "ProfessionalService",
                "name": config["businessName"],
                "url": base + "/",
            },
        }
    else:
        linked = None
    ld = ""
    if linked:
        ld = f'    <script type="application/ld+json">{json.dumps(linked, ensure_ascii=False)}</script>\n'
    return f"""    <link rel="canonical" href="{url}">
{robots}    <meta property="og:title" content="{title}">
    <meta property="og:description" content="{desc}">
    <meta property="og:url" content="{url}">
    <meta property="og:image" content="{image}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{name}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{title}">
    <meta name="twitter:description" content="{desc}">
    <meta name="twitter:image" content="{image}">
    <link rel="icon" href="/Img/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/Img/favicon-32.png" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="/Img/apple-touch-icon.png">
{ld}"""


def apply_seo(page: str, config: dict) -> tuple[str, dict | None]:
    match = re.search(
        r'<script type="application/json" id="page-meta">(.*?)</script>',
        page,
        flags=re.S,
    )
    if not match or "<!--HEAD_SEO-->" not in page:
        return page, None
    meta = json.loads(match.group(1))
    page = page.replace(match.group(0), "")
    page = page.replace("<!--HEAD_SEO-->", seo_tags(meta, config))
    return page, meta


def main() -> None:
    config = json.loads(CONFIG_PATH.read_text(encoding="utf-8"))
    if DIST.exists():
        shutil.rmtree(DIST)
    DIST.mkdir()

    for folder in ("css", "Img", "projects", "includes"):
        copy_tree(ROOT / folder, DIST / folder)
    copy_tree(ROOT / "js" / "full.js", DIST / "js" / "full.js")
    copy_tree(ROOT / "js" / "ui.js", DIST / "js" / "ui.js")
    copy_tree(ROOT / "js" / "rise.js", DIST / "js" / "rise.js")
    copy_tree(ROOT / "js" / "motion.js", DIST / "js" / "motion.js")
    copy_tree(ROOT / "js" / "sky.js", DIST / "js" / "sky.js")
    for name in ("index.php", "thanks.php", "404.php", "site.config.json", ".htaccess"):
        copy_tree(ROOT / name, DIST / name)
    photos = ROOT / "Links" / "Slider" / "Photos"
    if photos.is_dir():
        copy_tree(photos, DIST / "Links" / "Slider" / "Photos")

    show = bool(config.get("showTestimonials"))
    sitemap_paths = [
        "/",
        "/projects/drain-saves/",
        "/projects/cornerstone-construction/",
        "/projects/custom-paint/",
        "/projects/exclusive-cuts/",
        "/projects/moonlodge/",
        "/projects/unique-slider/",
    ]

    base = config["baseUrl"].rstrip("/")
    urls = []
    for path in sitemap_paths:
        loc = base + ("/" if path == "/" else path)
        urls.append(f"  <url><loc>{loc}</loc></url>")
    sitemap = (
        '<?xml version="1.0" encoding="UTF-8"?>\n'
        '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n'
        + "\n".join(urls)
        + "\n</urlset>\n"
    )
    (DIST / "sitemap.xml").write_text(sitemap, encoding="utf-8")
    (DIST / "robots.txt").write_text(
        "User-agent: *\nAllow: /\n\nSitemap: " + base + "/sitemap.xml\n",
        encoding="utf-8",
    )
    for css_path in (DIST / "css").glob("*.css"):
        css_path.write_text(minify_css(css_path.read_text(encoding="utf-8")), encoding="utf-8")

    built = (DIST / "index.php").read_text(encoding="utf-8")
    paint = (DIST / "projects" / "custom-paint" / "index.php").read_text(encoding="utf-8")
    checks = [
        ("formsubmit.co/dhdaleleon@gmail.com" in built, "FormSubmit action missing"),
        ('name="_honey"' in built, "honeypot missing"),
        ("dhdaleleon@gmail.com" in built, "contact email missing"),
        ("Unqiue" not in built, "slider typo still present"),
        ("Wireframe" not in built, "old Wireframe project still present"),
        ("data-netlify" not in built, "Netlify form attribute still present"),
        ("site_pricing()" in built, "pricing renderer missing"),
        ('href="projects/drain-saves/"' in built, "internal project link missing"),
        ("https://drainsaves.netlify.app" not in built, "outbound project link on homepage"),
        ("Soffit" in built, "business name missing"),
        ((DIST / "sitemap.xml").exists() and (DIST / "robots.txt").exists(), "sitemap or robots missing"),
        ((DIST / "404.php").exists() and (DIST / "thanks.php").exists(), "php utility pages missing"),
        ("function setTool" in paint and "function openLongSection3D" in paint, "custom paint features missing"),
        ("DirectoryIndex index.php" in (DIST / ".htaccess").read_text(encoding="utf-8"), "DirectoryIndex missing"),
    ]
    if not show:
        checks.append((
            'data-show-testimonials="false"' in (ROOT / "includes" / "site.php").read_text(encoding="utf-8"),
            "testimonials not hidden",
        ))
    failed = [message for ok, message in checks if not ok]
    if failed:
        raise SystemExit("Build checks failed:\n- " + "\n- ".join(failed))
    print(f"Built {DIST}")


if __name__ == "__main__":
    main()
