#!/usr/bin/env python3
"""Assemble a static dist/ folder for upload to InfinityFree htdocs."""

from __future__ import annotations

import html
import json
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
        items = "".join(f"<li>{html.escape(item)}</li>" for item in package["includes"])
        parts.append(
            f"""<article class="price-card" id="price-{html.escape(package["id"])}">
  <p class="kicker">{html.escape(package["kicker"])}</p>
  <h3>{html.escape(package["name"])}</h3>
  <p class="price">{price_html}</p>
  <p class="price-note">{html.escape(package["note"])}</p>
  <p>{html.escape(package["summary"])}</p>
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


def main() -> None:
    config = json.loads(CONFIG_PATH.read_text(encoding="utf-8"))
    if DIST.exists():
        shutil.rmtree(DIST)
    DIST.mkdir()

    for folder in ("css", "Img", "projects"):
        copy_tree(ROOT / folder, DIST / folder)
    copy_tree(ROOT / "js" / "full.js", DIST / "js" / "full.js")
    copy_tree(ROOT / "js" / "ui.js", DIST / "js" / "ui.js")
    copy_tree(ROOT / "thanks.html", DIST / "thanks.html")
    copy_tree(ROOT / ".htaccess", DIST / ".htaccess")
    photos = ROOT / "Links" / "Slider" / "Photos"
    if photos.is_dir():
        copy_tree(photos, DIST / "Links" / "Slider" / "Photos")

    page = (ROOT / "index.html").read_text(encoding="utf-8")
    page = page.replace("{{AVAILABILITY}}", html.escape(config["availability"]))
    show = bool(config.get("showTestimonials"))
    attrs = (
        'data-show-testimonials="true"'
        if show
        else 'data-show-testimonials="false" hidden'
    )
    page = page.replace("{{TESTIMONIALS_ATTRS}}", attrs)
    page = replace_block(page, "<!--PRICING-->", "<!--/PRICING-->", price_cards(config["pricing"]))
    page = replace_block(
        page,
        "<!--TESTIMONIALS-->",
        "<!--/TESTIMONIALS-->",
        testimonial_cards(config["testimonials"]),
    )
    (DIST / "index.html").write_text(page, encoding="utf-8")

    built = (DIST / "index.html").read_text(encoding="utf-8")
    checks = [
        ("formsubmit.co/dhdaleleon@gmail.com" in built, "FormSubmit action missing"),
        ('name="_honey"' in built, "honeypot missing"),
        ("dhdaleleon@gmail.com" in built, "contact email missing"),
        ("Unqiue" not in built, "slider typo still present"),
        ("Wireframe" not in built, "old Wireframe project still present"),
        ("data-netlify" not in built, "Netlify form attribute still present"),
        ("NZ$1,500" in built and "NZ$3,500" in built and "NZ$8,500" in built and "NZ$150" in built, "prices missing"),
        ('href="projects/drain-saves/"' in built, "internal project link missing"),
        ("https://drainsaves.netlify.app" not in built, "outbound project link on homepage"),
    ]
    if not show:
        checks.append(("data-show-testimonials=\"false\"" in built and "hidden" in built, "testimonials not hidden"))
    failed = [message for ok, message in checks if not ok]
    if failed:
        raise SystemExit("Build checks failed:\n- " + "\n- ".join(failed))
    print(f"Built {DIST}")


if __name__ == "__main__":
    main()
