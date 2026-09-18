# CLAUDE.md

Guidance for Claude Code when working in this repository.

## What this is

**Globe & Frame** — the custom **WordPress theme** for globeandframe.com,
self-hosted on WordPress.com Business. Classic PHP theme; no build step. Ported
from the original Astro static site, which is preserved in git history and
tagged `astro-final`.

## Local environment

Developed in **LocalWP** at
`~/Local Sites/globe-frame/app/public/wp-content/themes/globe-and-frame/`; this
repo is the version-controlled copy. WP-CLI runs via LocalWP's bundled PHP + the
mysql socket (no Docker).

## Architecture

- **Content model** — 11 CPTs (`city_guide` + 10 spotlight types) and `city` /
  `region` taxonomies, registered in `functions.php`. ACF field groups in
  `inc/acf-fields.php` (via `acf_add_local_field_group`).
- **Row fields** — the list-shaped fields are textareas in the workbook format
 (one row per line, columns separated by ` | `), because the ACF repeater
 editing UI is Pro-only. Read them with `gf_rows($field)` from `inc/rows.php`,
 never `get_field()`/`have_rows()`/`get_sub_field()`; `gf_rows()` also
 reconstructs the legacy `field_0_subfield` repeater meta. Column order lives in
 `gf_row_schema()`.
- **Templates** — `front-page.php`, `single-city_guide.php` (city hub),
  `single.php` (universal story), `archive-city_guide.php`, `taxonomy-region.php`,
  `page-itinerary-tier.php` (data in `inc/itineraries-data.php`),
  `page-custom-inquiry.php`, and `page-*.php` for the Elevate + static pages.
- **Styles** — `assets/global.css` (tokens: navy/gold/paper/sand, Playfair +
  system sans, `--space-*` scale) + `assets/enhance.css` (polish, loaded after).
  Style with tokens (`var(--color-*)`, `var(--space-*)`), never raw hex.
- **Images** — `functions.php` rewrites root-relative `/images/...` output to the
  theme's `assets/images/`. Photography (~57MB) is gitignored; re-bundle from the
  source `/images/` library when packaging for deploy.
- **Inquiry form** — native handler in `functions.php` (`admin_post_gf_inquiry`),
  emails bkeeny8@gmail.com; nonce + honeypot.

## Content & conventions

- Only the **London** cluster (guide + 8 stories) is published; all other city
  content stays Draft ("dark").
- Nav is hard-coded in `header.php` (no WordPress menu).
- After changing rewrite-affecting things, flush permalinks (Settings →
  Permalinks → Save).

## Deploy

Upload to WordPress.com (Appearance → Themes → Upload). Requires the ACF plugin.
Not GitHub Pages — the deploy workflow was removed at migration.
