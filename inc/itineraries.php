<?php
/**
 * Globe & Frame — itineraries as editable content.
 *
 * The 3/7/10-day listings used to come straight out of inc/itineraries-data.php,
 * so adding a route or flipping one from "Coming Soon" to "Available" meant a
 * code change and a theme re-upload — for the only pages on the site that sell
 * anything. They are now `itinerary` posts grouped by a `region` field and a
 * `tier` term, and this file is the read API the tier template uses.
 *
 * inc/itineraries-data.php stays as the seed source (and as a safety net: if no
 * itineraries have been created yet, the listings fall back to it rather than
 * rendering empty).
 */
if (!defined('ABSPATH')) exit;

define('GF_ITINERARY_SEED', '1');

/** The tier term for a slug ('3-day'…), created on first use. Term id or 0. */
function gf_itinerary_tier_term($tier, $create = true) {
  $tier  = gf_itinerary_tier_key($tier);
  if ($tier === '') return 0;
  $term = get_term_by('slug', $tier, 'tier');
  if ($term && !is_wp_error($term)) return (int) $term->term_id;
  if (!$create) return 0;

  $tiers = gf_itinerary_tiers();
  $made  = wp_insert_term($tiers[$tier], 'tier', array('slug' => $tier));
  return is_wp_error($made) ? 0 : (int) $made['term_id'];
}

/** "12 itineraries" — computed, so a region's count can never go stale. */
function gf_itinerary_count_label($count) {
  return sprintf(
    _n('%s itinerary', '%s itineraries', $count, 'globe-and-frame'),
    number_format_i18n($count)
  );
}

/** Group a flat list of itinerary arrays by region, in first-appearance order. */
function gf_itinerary_group($items) {
  $groups = array();
  foreach ($items as $item) {
    $region = isset($item['region']) ? trim((string) $item['region']) : '';
    $key    = $region !== '' ? $region : '__none';
    if (!isset($groups[$key])) {
      $groups[$key] = array('name' => $region, 'countLabel' => '', 'itineraries' => array());
    }
    $groups[$key]['itineraries'][] = $item;
  }
  foreach ($groups as $key => $group) {
    $groups[$key]['countLabel'] = gf_itinerary_count_label(count($group['itineraries']));
  }
  return array_values($groups);
}

/** Published itineraries for one tier, in listing order. */
function gf_itinerary_posts($tier) {
  $term = gf_itinerary_tier_term($tier, false);
  if (!$term) return array();

  $query = new WP_Query(array(
    'post_type'      => 'itinerary',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => array('menu_order' => 'ASC', 'title' => 'ASC'),
    'no_found_rows'  => true,
    'tax_query'      => array(array('taxonomy' => 'tier', 'field' => 'term_id', 'terms' => $term)),
  ));

  $items = array();
  foreach ($query->posts as $post) {
    $destinations = trim((string) gf_field('destinations', $post->ID));
    $items[] = array(
      'destinations' => $destinations !== '' ? $destinations : get_the_title($post),
      'region'       => trim((string) gf_field('region', $post->ID)),
      'bestTime'     => trim((string) gf_field('bestTime', $post->ID)),
      'why'          => trim((string) gf_field('why', $post->ID)),
      'available'    => (bool) gf_field('available', $post->ID),
      'etsyUrl'      => trim((string) gf_field('etsyUrl', $post->ID)),
      'thumbId'      => (int) get_post_thumbnail_id($post->ID),
    );
  }
  return $items;
}

/** The same shape the tier template has always used, whatever the source. */
function gf_itineraries_for_tier($tier) {
  $items = gf_itinerary_posts($tier);
  if ($items) return gf_itinerary_group($items);

  // Nothing seeded yet — read the bundled data so listings are never empty.
  return gf_itinerary_group(gf_itinerary_seed_items($tier));
}

/** Flattened seed rows for a tier, straight from inc/itineraries-data.php. */
function gf_itinerary_seed_items($tier) {
  $tier = gf_itinerary_tier_key($tier);
  $data = require get_theme_file_path('inc/itineraries-data.php');
  if ($tier === '' || !isset($data[$tier])) return array();

  $items = array();
  foreach ($data[$tier] as $region) {
    foreach ($region['itineraries'] as $it) {
      $items[] = array(
        'destinations' => isset($it['destinations']) ? $it['destinations'] : '',
        'region'       => $region['name'],
        'bestTime'     => isset($it['bestTime']) ? $it['bestTime'] : '',
        'why'          => isset($it['why']) ? $it['why'] : '',
        'available'    => !empty($it['available']),
        'etsyUrl'      => isset($it['etsyUrl']) ? $it['etsyUrl'] : '',
        'thumbId'      => 0,
      );
    }
  }
  return $items;
}

/** Write a value the way ACF would, with or without ACF installed. */
function gf_set_acf_value($post_id, $type, $name, $value) {
  $key = "field_gf_{$type}_{$name}";
  if (function_exists('update_field')) {
    update_field($key, $value, $post_id);
    return;
  }
  update_post_meta($post_id, $name, $value);
  update_post_meta($post_id, '_' . $name, $key);
}

/**
 * Create the itinerary posts from the bundled data, once.
 * Idempotent: does nothing when itineraries already exist, so it can't double
 * up on a second theme upload. Pass true to seed anyway.
 */
function gf_seed_itineraries($force = false) {
  if (!post_type_exists('itinerary')) return 0;

  if (!$force) {
    $existing = get_posts(array(
      'post_type'   => 'itinerary',
      'post_status' => 'any',
      'numberposts' => 1,
      'fields'      => 'ids',
    ));
    if ($existing) return 0;
  }

  $made = 0;
  foreach (array_keys(gf_itinerary_tiers()) as $tier) {
    $term  = gf_itinerary_tier_term($tier);
    $order = 0;
    foreach (gf_itinerary_seed_items($tier) as $item) {
      $title = $item['destinations'] !== '' ? $item['destinations'] : $item['region'];
      if ($title === '') continue;

      $post_id = wp_insert_post(array(
        'post_type'   => 'itinerary',
        'post_status' => 'publish',
        'post_title'  => $title,
        'menu_order'  => $order++,
      ), true);
      if (is_wp_error($post_id)) continue;

      if ($term) wp_set_object_terms($post_id, array($term), 'tier');
      foreach (array('destinations', 'region', 'bestTime', 'why', 'etsyUrl') as $field) {
        gf_set_acf_value($post_id, 'itinerary', $field, $item[$field]);
      }
      gf_set_acf_value($post_id, 'itinerary', 'available', $item['available'] ? 1 : 0);
      update_post_meta($post_id, '_gf_seeded', GF_ITINERARY_SEED);
      $made++;
    }
  }

  update_option('gf_itinerary_seed', GF_ITINERARY_SEED);
  return $made;
}

/** Seed on first admin load after the theme is installed or updated. */
function gf_maybe_seed_itineraries() {
  if (get_option('gf_itinerary_seed') === GF_ITINERARY_SEED) return;
  if (!current_user_can('edit_posts')) return;
  gf_seed_itineraries();
}
add_action('admin_init', 'gf_maybe_seed_itineraries');
add_action('after_switch_theme', 'gf_maybe_seed_itineraries');

if (defined('WP_CLI') && WP_CLI) {
  WP_CLI::add_command('gf seed-itineraries', function ($args, $assoc) {
    $made = gf_seed_itineraries(!empty($assoc['force']));
    WP_CLI::success($made ? "Created {$made} itineraries." : 'Itineraries already exist; nothing created.');
  });
}
