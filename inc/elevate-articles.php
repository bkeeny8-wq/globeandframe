<?php
/**
 * Globe & Frame — Elevate Your Travel articles.
 *
 * Every Elevate article used to be its own page-<slug>.php with the prose
 * written into the markup, and the hub hardcoded its cards, its article counts
 * and its numbering. So a typo fix was a code change, and the counts drifted.
 *
 * Now: one template (page-elevate-article.php) renders them all, the article
 * bodies live in inc/elevate/*.php until the seeder copies them into the pages
 * themselves (after which they are edited in WordPress), and the hub is built
 * from a query. The registry below is the seed for each article's hub card —
 * once seeded, the ACF fields on the page win, and any page that carries an
 * Elevate section shows up on the hub whether it is listed here or not.
 */
if (!defined('ABSPATH')) exit;

define('GF_ELEVATE_SEED', '1');

/** Hub sections, in order. `grid` is the wrapper for that section's features. */
function gf_elevate_sections() {
  return array(
    'destinations' => array(
      'title' => 'Destinations & Inspiration',
      'intro' => 'Places worth dreaming about, returning to, and experiencing more fully.',
      'grid'  => 'feature-grid',
      'cta'   => array(
        'title'   => 'Plan a Custom Trip',
        'excerpt' => "Tell me where you want to go and I'll help you build a plan around the experience you're looking for.",
        'read'    => 'Get in touch →',
        'path'    => 'custom-inquiry/',
      ),
    ),
    'planning' => array(
      'title' => 'Planning & Pacing',
      'intro' => 'How to structure a trip so the days actually work.',
      'grid'  => 'row-cards',
    ),
    'journey' => array(
      'title' => 'Elevate the Journey',
      'intro' => 'Small upgrades that make flights and travel days feel more intentional.',
      'grid'  => 'feature-grid feature-grid--spaced',
    ),
  );
}

/**
 * Seed metadata for the twelve published articles, taken from the hub markup
 * it replaces. `body` is the bundled partial; `migrate` false keeps an article
 * rendering from that partial rather than copying it into the page.
 */
function gf_elevate_registry() {
  return array(
    'cities-i-would-visit-again' => array(
      'title' => 'Cities I Would Visit Again', 'section' => 'destinations', 'category' => 'Destinations',
      'excerpt' => 'The cities I would go back to — not because I missed something, but because I know how to be there.',
      'image' => '/images/city-guides/paris.jpg', 'layout' => 'feature', 'accent' => 'ocean',
      'read' => 'Read the guide →', 'order' => 10, 'body' => 'cities-i-would-visit-again',
    ),
    'where-i-am-dreaming' => array(
      'title' => 'Where I Am Dreaming', 'section' => 'destinations', 'category' => 'Inspiration',
      'image' => '/images/dreaming/maldives.jpg', 'layout' => 'feature-sm', 'accent' => 'amber',
      'order' => 20, 'body' => 'where-i-am-dreaming',
    ),
    'top-10-beaches' => array(
      'title' => 'Top 10 Beaches', 'section' => 'destinations', 'category' => 'Beaches',
      'image' => '/images/beaches/bondi-beach.jpg', 'layout' => 'feature-sm', 'accent' => 'teal',
      'order' => 30, 'body' => 'top-10-beaches',
      // Keeps its bundled body: the ranked list is interactive, and its markup
      // carries the script that swaps the featured beach.
      'migrate' => false,
    ),
    'f1-watching-locations' => array(
      'title' => 'F1 Watching Locations', 'section' => 'destinations',
      'excerpt' => "A running list of spots I've found while traveling where the race actually feels like an event, not background noise.",
      'layout' => 'row', 'read' => 'Read →', 'order' => 40, 'body' => 'f1-watching-locations',
    ),
    'global-cigar-bars' => array(
      'title' => 'Global Cigar Bars', 'section' => 'destinations',
      'excerpt' => 'Sometimes the best way to slow down while traveling is with a cigar, a drink, and a good place to sit for a while.',
      'layout' => 'row', 'read' => 'Read →', 'order' => 50, 'body' => 'global-cigar-bars',
    ),
    'how-to-do-3-days' => array(
      'title' => 'How to Do 3 Days', 'section' => 'planning', 'category' => 'Planning',
      'excerpt' => 'A simple framework for getting the feel of a city without overcommitting to it.',
      'image' => '/images/city-guides/prague.jpg', 'layout' => 'feature', 'accent' => 'ocean',
      'read' => 'Read the guide →', 'order' => 10, 'body' => 'how-to-do-3-days',
    ),
    'booking-to-boarding' => array(
      'title' => 'Booking to Boarding', 'section' => 'planning', 'category' => 'Planning',
      'excerpt' => 'A planning timeline for making travel feel smoother before you ever leave home.',
      'image' => '/images/business-class/air-france-1.jpg', 'layout' => 'feature', 'accent' => 'dusk',
      'read' => 'Read the guide →', 'order' => 20, 'body' => 'booking-to-boarding',
    ),
    'jet-lag' => array(
      'title' => 'Jet Lag', 'section' => 'planning', 'category' => 'Planning',
      'excerpt' => 'Jet Lag. 0/10. Would not recommend. 50+ long-haul flights worth of hard-won advice.',
      'image' => '/images/city-guides/tokyo.jpg', 'layout' => 'feature', 'accent' => 'slate',
      'read' => 'Read the guide →', 'order' => 30, 'body' => 'jet-lag',
    ),
    'business-class-rankings' => array(
      'title' => 'Business Class Rankings', 'section' => 'journey', 'category' => 'Reviews',
      'excerpt' => 'A personal look at which business class experiences are actually worth it, and which ones fall short of the price.',
      'image' => '/images/business-class/singapore-1.jpg', 'layout' => 'feature', 'accent' => 'dusk',
      'read' => 'Read the rankings →', 'order' => 10, 'body' => 'business-class-rankings',
    ),
    'amenity-kit-diy' => array(
      'title' => 'Amenity Kit DIY', 'section' => 'journey', 'category' => 'In-flight',
      'image' => '/images/articles/img_0506.jpg', 'layout' => 'feature-sm', 'accent' => 'slate',
      'order' => 20,
    ),
    'snack-box-diy' => array(
      'title' => 'Snack Box DIY', 'section' => 'journey', 'category' => 'In-flight',
      'image' => '/images/articles/IMG_1777.jpeg', 'layout' => 'feature-sm', 'accent' => 'bronze',
      'order' => 30,
    ),
    'weekend-bag-review' => array(
      'title' => 'Weekend Bag Review', 'section' => 'journey',
      'excerpt' => "Breaking a zipper forces your hand. My previous weekend bag had been great — until it wasn't.",
      'layout' => 'list', 'order' => 40, 'body' => 'weekend-bag-review',
    ),
  );
}

/** Path of an article's bundled body, or '' when it has none. */
function gf_elevate_body_path($slug) {
  $registry = gf_elevate_registry();
  $body = isset($registry[$slug]['body']) ? $registry[$slug]['body'] : '';
  if ($body === '') return '';
  $path = get_theme_file_path('inc/elevate/' . $body . '.php');
  return file_exists($path) ? $path : '';
}

/** The published page for an article slug, nested or at the root. */
function gf_elevate_page($slug) {
  static $cache = array();
  if (isset($cache[$slug])) return $cache[$slug];

  $page = null;
  foreach (array('elevate-your-travel/' . $slug, $slug) as $path) {
    $found = get_page_by_path($path);
    if ($found && get_post_status($found) === 'publish') { $page = $found; break; }
  }
  return $cache[$slug] = $page;
}

/** One article's hub card: page data, registry defaults, ACF overrides. */
function gf_elevate_card($slug, $defaults, $page) {
  $field = function ($name) use ($page) {
    if (!$page) return '';
    $value = gf_field($name, $page->ID);
    return is_scalar($value) ? trim((string) $value) : '';
  };
  $pick = function ($override, $default) {
    return $override !== '' ? $override : $default;
  };

  $order = $field('elevateOrder');
  return array(
    'slug'     => $slug,
    'title'    => $pick($field('elevateTitle'), isset($defaults['title']) ? $defaults['title'] : ($page ? get_the_title($page) : '')),
    'section'  => $pick($field('elevateSection'), isset($defaults['section']) ? $defaults['section'] : ''),
    'category' => $pick($field('elevateCategory'), isset($defaults['category']) ? $defaults['category'] : ''),
    'excerpt'  => $pick($field('elevateExcerpt'), isset($defaults['excerpt']) ? $defaults['excerpt'] : ''),
    'image'    => $pick($field('elevateImage'), isset($defaults['image']) ? $defaults['image'] : ''),
    'layout'   => $pick($field('elevateLayout'), isset($defaults['layout']) ? $defaults['layout'] : 'feature'),
    'accent'   => $pick($field('elevateAccent'), isset($defaults['accent']) ? $defaults['accent'] : 'ocean'),
    'read'     => isset($defaults['read']) ? $defaults['read'] : 'Read the guide →',
    'order'    => is_numeric($order) ? (int) $order : (isset($defaults['order']) ? (int) $defaults['order'] : 999),
    'url'      => $page ? get_permalink($page) : home_url('/elevate-your-travel/' . $slug . '/'),
    'thumbId'  => $page ? (int) get_post_thumbnail_id($page->ID) : 0,
    'exists'   => (bool) $page,
  );
}

/**
 * Every Elevate article the hub should show, grouped by section key.
 * Published pages only, so a card can never point at a page that isn't live.
 */
function gf_elevate_articles() {
  $registry = gf_elevate_registry();
  $cards    = array();
  $missing  = 0;

  foreach ($registry as $slug => $defaults) {
    $page = gf_elevate_page($slug);
    if (!$page) { $missing++; continue; }
    $cards[$slug] = gf_elevate_card($slug, $defaults, $page);
  }

  // Articles added in wp-admin: any page carrying an Elevate section.
  $extra = get_posts(array(
    'post_type'   => 'page',
    'post_status' => 'publish',
    'numberposts' => 50,
    'meta_query'  => array(array('key' => 'elevateSection', 'value' => '', 'compare' => '!=')),
  ));
  foreach ($extra as $page) {
    if (isset($cards[$page->post_name])) continue;
    $cards[$page->post_name] = gf_elevate_card($page->post_name, array(), $page);
  }

  // Nothing resolved (fresh install, or the pages live elsewhere): fall back to
  // the registry so the hub still lists the articles it always has.
  if (!$cards && $missing) {
    foreach ($registry as $slug => $defaults) {
      $cards[$slug] = gf_elevate_card($slug, $defaults, null);
    }
  }

  $grouped = array();
  foreach (array_keys(gf_elevate_sections()) as $section) $grouped[$section] = array();
  foreach ($cards as $card) {
    $section = isset($grouped[$card['section']]) ? $card['section'] : '';
    if ($section === '') continue;
    $grouped[$section][] = $card;
  }
  foreach ($grouped as $section => $list) {
    usort($list, function ($a, $b) {
      return $a['order'] === $b['order'] ? strcmp($a['title'], $b['title']) : $a['order'] - $b['order'];
    });
    $grouped[$section] = $list;
  }
  return $grouped;
}

/* ---- Routing ----
   Articles render through page-elevate-article.php without anyone having to
   assign a template in wp-admin. */
function gf_elevate_template($template) {
  if (!is_page()) return $template;

  $post = get_queried_object();
  if (!$post || !isset($post->post_name)) return $template;
  if (!isset(gf_elevate_registry()[$post->post_name])) return $template;

  // Respect a template the owner picked on purpose.
  $assigned = get_page_template_slug($post->ID);
  if ($assigned !== '' && $assigned !== 'page-elevate-article.php') return $template;

  $found = locate_template('page-elevate-article.php');
  return $found ? $found : $template;
}
add_filter('template_include', 'gf_elevate_template');

/** Either URL convention resolves: /elevate-your-travel/<slug>/ and /<slug>/. */
function gf_elevate_redirect() {
  if (!is_404()) return;

  $path  = trim((string) wp_parse_url(add_query_arg(array()), PHP_URL_PATH), '/');
  $parts = array_filter(explode('/', $path));
  if (!$parts) return;

  $slug = (string) end($parts);
  if (!isset(gf_elevate_registry()[$slug])) return;

  $page = gf_elevate_page($slug);
  if (!$page) return;

  wp_safe_redirect(get_permalink($page), 301);
  exit;
}
add_action('template_redirect', 'gf_elevate_redirect');

/* ---- Seeding: move the copy into WordPress ---- */

/** Render a bundled article body to HTML, exactly as the front end would. */
function gf_elevate_capture($slug) {
  $path = gf_elevate_body_path($slug);
  if ($path === '') return '';
  ob_start();
  include $path;
  return trim((string) ob_get_clean());
}

/**
 * Copy each article's bundled body into its page, and its hub card metadata
 * into that page's fields, so both become editable in wp-admin.
 * Only ever fills blanks: a page that already has content is left alone.
 */
function gf_seed_elevate($force = false) {
  $done = 0;

  foreach (gf_elevate_registry() as $slug => $defaults) {
    $page = gf_elevate_page($slug);
    if (!$page) continue;

    // Hub card metadata → fields (so the registry becomes a fallback, not a rule).
    foreach (array('title', 'section', 'category', 'excerpt', 'image', 'layout', 'accent', 'order') as $key) {
      if (!isset($defaults[$key])) continue;
      $field = 'elevate' . ucfirst($key);
      $current = gf_field($field, $page->ID);
      if ($force || !is_scalar($current) || trim((string) $current) === '') {
        gf_set_acf_value($page->ID, 'page', $field, $defaults[$key]);
      }
    }

    if (get_page_template_slug($page->ID) === '') {
      update_post_meta($page->ID, '_wp_page_template', 'page-elevate-article.php');
    }

    $migrate = !isset($defaults['migrate']) || $defaults['migrate'];
    if ($migrate && trim((string) $page->post_content) === '') {
      $html = gf_elevate_capture($slug);
      if ($html !== '') {
        // Stored as one HTML block: the block editor leaves it untouched and
        // the_content() renders it verbatim, so the copy is preserved exactly.
        $content = "<!-- wp:html -->\n" . $html . "\n<!-- /wp:html -->";
        $kses = has_filter('content_save_pre', 'wp_filter_post_kses');
        if ($kses) kses_remove_filters();
        wp_update_post(array('ID' => $page->ID, 'post_content' => $content));
        if ($kses) kses_init_filters();
        update_post_meta($page->ID, '_gf_elevate_full_body', '1');
        $done++;
      }
    }
  }

  update_option('gf_elevate_seed', GF_ELEVATE_SEED);
  return $done;
}

function gf_maybe_seed_elevate() {
  if (get_option('gf_elevate_seed') === GF_ELEVATE_SEED) return;
  if (!current_user_can('edit_pages')) return;
  gf_seed_elevate();
}
add_action('admin_init', 'gf_maybe_seed_elevate');
add_action('after_switch_theme', 'gf_maybe_seed_elevate');

if (defined('WP_CLI') && WP_CLI) {
  WP_CLI::add_command('gf seed-elevate', function ($args, $assoc) {
    $done = gf_seed_elevate(!empty($assoc['force']));
    WP_CLI::success("Migrated {$done} Elevate article bodies into page content.");
  });
}
