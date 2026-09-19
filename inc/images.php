<?php
/**
 * Globe & Frame — responsive `<img>` helper for the theme's bundled
 * photography (city guides, itinerary cards, Elevate hub cards).
 *
 * These images aren't WordPress attachments — they're static files under
 * assets/images/, served through gf_rewrite_content_images() so templates can
 * write root-relative /images/... paths. That means WordPress's own
 * responsive-image machinery (which only touches attachment `<img>` markup)
 * never sees them, so this theme builds its own srcset instead of hand-writing
 * CSS background-image divs with no lazy loading and no responsive sizing.
 *
 * Zero binaries are assumed to exist. gf_img_srcset() only lists a width
 * variant when the file is actually present in assets/images/ (see
 * bin/optimize-images.sh, which generates them from the source photography
 * library — that library lives outside this repo, so the variants have to be
 * generated locally and bundled in at packaging time, same as the base
 * photos). Until then, gf_img() still renders a correct, lazy `<img>` at the
 * single size that exists today.
 */
if (!defined('ABSPATH')) exit;

/**
 * Build a `srcset` string for a root-relative /images/... path by checking for
 * width-suffixed derivatives (`name-480w.jpg`, `name-960w.jpg`, ...) next to
 * the source file. Returns '' when none exist, so callers can skip the
 * attribute entirely rather than emit an empty one.
 */
function gf_img_srcset($src, $widths = array()) {
  $src = trim((string) $src);
  if ($src === '' || strpos($src, '/images/') !== 0) return '';

  $rel = substr($src, strlen('/images/'));
  $ext = strtolower(pathinfo($rel, PATHINFO_EXTENSION));
  if ($ext === '') return '';
  $base = substr($rel, 0, -(strlen($ext) + 1));

  $set = array();
  foreach ($widths as $w) {
    $w = (int) $w;
    if ($w <= 0) continue;
    $candidate = "images/{$base}-{$w}w.{$ext}";
    if (file_exists(get_theme_file_path('assets/' . $candidate))) {
      $set[] = get_theme_file_uri('assets/' . $candidate) . ' ' . $w . 'w';
    }
  }
  return implode(', ', $set);
}

/**
 * Render a lazy, responsive `<img>` for a bundled photo. `$src` is the same
 * root-relative /images/... path templates already use (rewritten to the
 * theme's asset URL on output by gf_rewrite_content_images()).
 *
 * $args:
 *   class    (string)  CSS class(es)
 *   sizes    (string)  the `sizes` attribute; only emitted when a srcset exists
 *   widths   (int[])   candidate derivative widths to look for
 *   loading  (string)  'lazy' (default) or 'eager'
 *   fetchpriority (string) e.g. 'high' for an eager LCP image
 */
function gf_img($src, $alt, $args = array()) {
  $src = trim((string) $src);
  if ($src === '') return '';

  $args = array_merge(array(
    'class'   => '',
    'id'      => '',
    'sizes'   => '(max-width: 640px) 100vw, 480px',
    'widths'  => array(480, 768, 1200),
    'loading' => 'lazy',
    'fetchpriority' => '',
  ), $args);

  $html = '<img src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '"';
  if ($args['id'] !== '') $html .= ' id="' . esc_attr($args['id']) . '"';
  if ($args['class'] !== '') $html .= ' class="' . esc_attr($args['class']) . '"';

  $srcset = gf_img_srcset($src, $args['widths']);
  if ($srcset !== '') {
    $html .= ' srcset="' . esc_attr($srcset) . '" sizes="' . esc_attr($args['sizes']) . '"';
  }

  $html .= ' loading="' . esc_attr($args['loading']) . '" decoding="async"';
  if ($args['fetchpriority'] !== '') $html .= ' fetchpriority="' . esc_attr($args['fetchpriority']) . '"';
  $html .= ' />';

  return $html;
}
