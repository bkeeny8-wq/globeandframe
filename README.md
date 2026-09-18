# Globe & Frame — WordPress theme

The custom WordPress theme powering **globeandframe.com** (self-hosted on
WordPress.com Business). Ported from the original Astro static site — same design
language (navy `#0c2042` / gold `#d2af3b` palette, Playfair Display + system sans).

> **History note:** this repository previously held the **Astro** static site.
> That version is preserved in git history and tagged **`astro-final`**. From
> this commit forward the repo tracks the WordPress theme.

## What's here

- **Custom post types** (`functions.php`) — `city_guide` + 10 spotlight types
  (beach, day_trip, neighborhood, local_dish, market, bar, walk, experience,
  gift, mcdonalds), plus `city` and `region` taxonomies.
- **Content model** (`inc/acf-fields.php`) — ACF field groups, all editable on
  **free ACF / Secure Custom Fields**.
- **Story sections** (`inc/story-sections.php`) — what each spotlight type
  renders and in what order (lead prose, facts strip, prose sections and row
  lists, the "Good to know" block, the links row). `single.php` is a renderer
  over that spec, so adding a field to a type is a one-line change there. Also
  holds `gf_city_photo_url()`, the bundled-photography lookup shared by the city
  guide hero and the itinerary cards.
- **Row fields** (`inc/rows.php`) — the list-shaped fields (`sights`,
  `dayTrips`, `plan`, `costs`, `items`, `spots`, `thingsToDo`, `eatAndDrink`,
  `inShort`) are textareas in the Excel workbook's format — one row per line,
  columns separated by ` | `. `gf_rows($field)` parses them for the templates
  and also reads the older ACF repeater meta, so content authored before the
  switch still renders. `gf_row_schema()` is the single source of truth for the
  column order.
- **Templates** — `front-page.php`, `single-city_guide.php` (city hub),
  `single.php` (universal story: breadcrumb → pillar CTA → "more from city"),
  `archive-city_guide.php` / `taxonomy-region.php`, `page-itinerary-tier.php`
  (3/7/10-day tiers from `inc/itineraries-data.php`), `page-custom-inquiry.php`
  (native lead form), `search.php` + `searchform.php`, `404.php`, and the
  Elevate + static `page-*.php` pages.
- **Copy that tracks published content** — `gf_city_guide_summary()` computes the
  home page's destination count, and the itinerary tier lookup
  (`gf_itinerary_tier_key()` / `gf_itinerary_tier_url()`) accepts both slug
  conventions (`3-day` and `3-day-itineraries`), so templates never promise or
  link to something that isn't live.
- **Styles** — `assets/global.css` (design tokens + components) and
  `assets/enhance.css` (UX/mobile polish layer, loaded after global).
- **Images** — content photography is served from `assets/images/` via an
  output-buffer rewrite in `functions.php`, so templates can keep root-relative
  `/images/...` paths. Those photos (~57MB) are **gitignored** and re-bundled
  from the source library at packaging time.

## Deploy

Uploaded to WordPress.com (Appearance → Themes → Upload). Requires the
**Advanced Custom Fields** (or Secure Custom Fields) plugin. Not GitHub Pages —
the old deploy workflow was removed at migration.

## Requirements

- WordPress 6.x · PHP 8.x
- Advanced Custom Fields (free) or Secure Custom Fields
