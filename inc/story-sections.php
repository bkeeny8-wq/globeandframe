<?php
/**
 * Globe & Frame — what a spotlight story renders, and in what order.
 *
 * `single.php` used to show a fixed handful of fields, so roughly two thirds of
 * the authored ACF model was stored and never seen. Each post type gets an
 * ordered spec here instead:
 *
 *   lead     — first non-empty field becomes the opening prose
 *   facts    — short key/value pairs for the facts strip (arrays are joined)
 *   sections — ordered prose sections and row lists, heading => field
 *   know     — prose that belongs in the "Good to know" block
 *   links    — outbound links for the links row
 *
 * Headings use the field labels from inc/acf-fields.php (the owner's wording),
 * minus the parentheticals that were only there to guide the editor. Anything
 * not listed is deliberately unrendered: `scope`, `region`, `status` and
 * `provenance` are structural or editorial bookkeeping, not page copy.
 */
if (!defined('ABSPATH')) exit;

function gf_story_spec($post_type) {
  static $specs = null;
  if ($specs === null) {
    $specs = array(
      'beach' => array(
        'lead'     => array('take'),
        'facts'    => array('bestFor' => 'Best for', 'water' => 'Water & swimming', 'cost' => 'Cost', 'bestTime' => 'Best time', 'amenities' => 'Amenities', 'nearbyBite' => 'Nearby bite', 'country' => 'Country'),
        'sections' => array('gettingThere' => 'Getting there & parking', 'conditions' => 'Water & conditions', 'vibe' => 'Vibe', 'whatToBring' => 'What to bring', 'skipIf' => 'Skip if'),
        'links'    => array('mapUrl' => 'Map', 'nearbyBiteLink' => 'Nearby bite', 'printLink' => 'Print'),
      ),
      'day_trip' => array(
        'lead'     => array('take'),
        'facts'    => array('journeyTime' => 'Journey time', 'gettingThere' => 'Getting there', 'bestTime' => 'Best time', 'costBand' => 'Cost', 'transport' => 'Transport options', 'country' => 'Country'),
        'sections' => array('plan' => 'The plan', 'gettingDetail' => 'Getting there & back', 'lastTrain' => 'Last-train warning', 'bestTimeDetail' => 'Best time', 'booking' => 'Booking & opening', 'costs' => 'Cost breakdown', 'skipIf' => 'Skip if'),
        'links'    => array('mapUrl' => 'Map'),
      ),
      'neighborhood' => array(
        'lead'     => array('take'),
        'facts'    => array('bestFor' => 'Best for', 'priceToStay' => 'Price to stay', 'gettingAround' => 'Getting around', 'dontMiss' => "Don't miss", 'whenItShines' => 'When it shines', 'country' => 'Country'),
        'sections' => array('shouldYouStay' => 'Should you stay here?', 'thingsToDo' => 'What to do', 'eatAndDrink' => 'Eat & drink', 'gettingAroundDetail' => 'Getting around', 'notForYou' => 'Not for you'),
        'links'    => array('mapUrl' => 'Map'),
      ),
      'local_dish' => array(
        'lead'     => array('whatItIs'),
        'facts'    => array('type' => 'Type', 'price' => 'Typical price', 'orderAs' => 'Order as', 'verdict' => 'Verdict', 'dietary' => 'Dietary', 'country' => 'Country'),
        'sections' => array('story' => 'The story', 'howToOrder' => 'How to order & eat it', 'spots' => 'Where to get it', 'whatToAvoid' => 'What to avoid', 'verdictNote' => 'The verdict'),
        'links'    => array('mapUrl' => 'Map'),
      ),
      'market' => array(
        'lead'     => array('intro'),
        'facts'    => array('marketType' => 'Market type', 'bestTime' => 'Best time', 'budget' => 'Budget', 'nearest' => 'Nearest / area', 'country' => 'Country'),
        'sections' => array('items' => 'What to order'),
        'links'    => array('mapUrl' => 'Map'),
      ),
      'bar' => array(
        'lead'     => array('take'),
        'facts'    => array('scene' => 'Scene', 'bestFor' => 'Best for', 'priceBand' => 'Price', 'verdict' => 'Verdict', 'orderDrink' => 'Order', 'orderAlt' => 'Alternative', 'whenToGo' => 'When to go', 'country' => 'Country'),
        'sections' => array('vibe' => 'Vibe', 'notForYou' => 'Not for you'),
        'know'     => array('goodToKnow'),
        'links'    => array('mapUrl' => 'Map', 'directionsUrl' => 'Directions', 'instagramUrl' => 'Instagram'),
      ),
      'walk' => array(
        'lead'     => array('take'),
        'facts'    => array('distance' => 'Distance', 'time' => 'Time', 'difficulty' => 'Difficulty', 'elevation' => 'Elevation gain', 'terrain' => 'Terrain', 'routeType' => 'Route type', 'bestTimeFact' => 'Best time', 'cost' => 'Cost', 'country' => 'Country'),
        'sections' => array('trailhead' => 'Getting to the trailhead', 'whatToBring' => 'What to bring', 'bestTimeDetail' => 'Best time', 'safety' => 'Safety'),
        'links'    => array('mapUrl' => 'Map', 'directionsUrl' => 'Directions'),
      ),
      'experience' => array(
        'lead'     => array('whatItIs'),
        'facts'    => array('type' => 'Type', 'costBand' => 'Cost', 'when' => 'When', 'bestFor' => 'Best for', 'duration' => 'Duration', 'bestNight' => 'Best night', 'bookAhead' => 'Book ahead', 'familyFriendly' => 'Family-friendly', 'country' => 'Country'),
        'sections' => array('whatItsLike' => "What a night's like", 'howToDoIt' => 'How to do it'),
        'know'     => array('goodToKnow'),
        'links'    => array('mapUrl' => 'Map', 'directionsUrl' => 'Directions', 'instagramUrl' => 'Instagram'),
      ),
      'gift' => array(
        'lead'     => array('overview'),
        'facts'    => array('budget' => 'Budget', 'country' => 'Country'),
        'sections' => array('items' => 'The gifts'),
        'links'    => array('mapUrl' => 'Map'),
      ),
      'mcdonalds' => array(
        'lead'     => array('whatItIs'),
        'facts'    => array('type' => 'Type', 'verdict' => 'Verdict', 'price' => 'Price', 'availability' => 'Availability', 'country' => 'Country'),
        'sections' => array('verdictNote' => 'The verdict', 'howToGetIt' => 'How to get it', 'whyDoThis' => 'Why do this'),
        'links'    => array('mapUrl' => 'Map'),
      ),
    );
  }

  // Regular posts and any future type fall back to the shared prose fields.
  $default = array(
    'lead'     => array('take', 'whatItIs', 'intro', 'overview'),
    'facts'    => array(),
    'sections' => array(),
    'know'     => array(),
    'links'    => array('mapUrl' => 'Map'),
  );
  $spec = isset($specs[$post_type]) ? $specs[$post_type] : array();
  return array_merge($default, $spec);
}

/** First non-empty field from a candidate list, as raw field value. */
function gf_first_field($fields, $post_id = 0) {
  foreach ((array) $fields as $field) {
    $value = gf_field($field, $post_id);
    if (is_string($value) && trim($value) !== '') return $value;
  }
  return '';
}

/** One field value, whichever ACF edition is installed (or none at all). */
function gf_field($field, $post_id = 0) {
  $post_id = $post_id ? (int) $post_id : (int) get_the_ID();
  if (function_exists('get_field')) return get_field($field, $post_id);
  return get_post_meta($post_id, $field, true);
}

/** Plain-text field → escaped paragraphs, preserving the author's line breaks. */
function gf_prose_html($value) {
  $value = trim((string) $value);
  return $value === '' ? '' : wpautop(esc_html($value));
}

/** Label/value pairs for a facts strip; skips anything empty. */
function gf_story_facts($facts, $post_id = 0) {
  $rows = array();
  foreach ((array) $facts as $field => $label) {
    $value = gf_field($field, $post_id);
    if (is_array($value)) $value = implode(', ', array_filter(array_map('strval', $value)));
    $value = is_scalar($value) ? trim((string) $value) : '';
    // The verdict fields are scored out of ten; a bare "8" reads as a typo.
    if ($field === 'verdict' && is_numeric($value)) $value .= ' / 10';
    if ($value !== '') $rows[] = array($label, $value);
  }
  return $rows;
}

/** Label/URL pairs for the links row; skips anything empty. */
function gf_story_links($links, $post_id = 0) {
  $rows = array();
  foreach ((array) $links as $field => $label) {
    $url = gf_field($field, $post_id);
    if (is_string($url) && trim($url) !== '') $rows[] = array($label, trim($url));
  }
  return $rows;
}

/**
 * A row field as a list: first column leads, a note/amount column follows, the
 * remaining short columns become a parenthetical, and a URL column links the
 * lead. Single-column fields (inShort) render as plain points.
 */
function gf_row_list_html($field, $rows = null, $post_id = 0) {
  $rows = ($rows === null) ? gf_rows($field, $post_id) : $rows;
  if (!$rows) return '';

  $post_id = $post_id ? (int) $post_id : (int) get_the_ID();
  $columns = gf_row_columns($field, $post_id ? get_post_type($post_id) : null);
  $keys    = array_keys($columns) ? array_keys($columns) : array('text');
  $single  = (count($keys) === 1);

  $lead_key    = $keys[0];
  $url_keys    = array_values(array_intersect(array('link', 'ticketUrl', 'url'), $keys));
  $detail_keys = array_values(array_intersect(array('note', 'text', 'amount'), array_slice($keys, 1)));
  $meta_keys   = array_values(array_diff($keys, array($lead_key), $detail_keys, $url_keys));

  $items = '';
  foreach ($rows as $row) {
    $lead = isset($row[$lead_key]) ? trim($row[$lead_key]) : '';

    $detail = '';
    foreach ($detail_keys as $key) {
      if (!empty($row[$key])) { $detail = trim($row[$key]); break; }
    }
    $url = '';
    foreach ($url_keys as $key) {
      if (!empty($row[$key])) { $url = trim($row[$key]); break; }
    }
    $meta = array();
    foreach ($meta_keys as $key) {
      if (!empty($row[$key])) $meta[] = trim($row[$key]);
    }

    $li = '';
    if ($lead !== '') {
      $lead_html = esc_html($lead);
      if ($url !== '') {
        $lead_html = '<a href="' . esc_url($url) . '">' . $lead_html . '</a>';
      }
      $li .= $single ? $lead_html : '<strong>' . $lead_html . '.</strong>';
    }
    if ($detail !== '') $li .= ($li === '' ? '' : ' ') . esc_html($detail);
    if ($meta)          $li .= ' <em>(' . esc_html(implode(' · ', $meta)) . ')</em>';

    if (trim(wp_strip_all_tags($li)) !== '') $items .= '<li>' . $li . '</li>';
  }

  return $items === '' ? '' : '<ul>' . $items . '</ul>';
}

/**
 * The "Good to know" block: any goodToKnow prose, then the photo spot and pro
 * tip as tip cards. Returns '' when the post has none of them.
 */
function gf_know_block_html($know_fields, $post_id = 0) {
  $prose = '';
  foreach ((array) $know_fields as $field) {
    $prose .= gf_prose_html(gf_field($field, $post_id));
  }

  $cards = '';
  foreach (array('photoSpot' => 'Photo spot', 'proTip' => 'Pro tip') as $field => $label) {
    $value = trim((string) gf_field($field, $post_id));
    if ($value === '') continue;
    $cards .= '<div class="tip-card"><span class="tip-card__label">' . esc_html($label) . '</span>'
      . '<span class="tip-card__text">' . esc_html($value) . '</span></div>';
  }

  if ($prose === '' && $cards === '') return '';

  return '<h2>Good to know</h2>' . $prose
    . ($cards === '' ? '' : '<div class="tips-grid">' . $cards . '</div>');
}

/** "Verified <Month Year>" line, from the ACF date field. */
function gf_verified_html($post_id = 0) {
  $raw = trim((string) gf_field('verified', $post_id));
  if ($raw === '') return '';
  $time = strtotime($raw);
  $when = $time ? date_i18n('F Y', $time) : $raw;
  return '<p class="gf-verified">Verified ' . esc_html($when) . '</p>';
}

/**
 * Hero photograph for a city: the featured image if one is set, otherwise the
 * theme's bundled city photography (same lookup the itinerary cards use), so a
 * guide isn't text-only just because nothing was uploaded yet.
 */
function gf_city_photo_url($name) {
  $name = trim((string) $name);
  if ($name === '') return '';

  $slug = strtolower($name);
  $slug = strtr($slug, array('á'=>'a','à'=>'a','ã'=>'a','â'=>'a','ä'=>'a','é'=>'e','è'=>'e','ê'=>'e','í'=>'i','ì'=>'i','ó'=>'o','ò'=>'o','ô'=>'o','õ'=>'o','ö'=>'o','ú'=>'u','ü'=>'u','ñ'=>'n','ç'=>'c'));
  $slug = trim(preg_replace('/[^a-z0-9]+/', '-', $slug), '-');
  if ($slug === '') return '';

  $alias = array('new-york-city' => 'new-york', 'rio-de-janeiro' => 'rio', 'val-d-isere' => 'val-disere');
  if (isset($alias[$slug])) $slug = $alias[$slug];

  return file_exists(get_theme_file_path('assets/images/city-guides/' . $slug . '.jpg'))
    ? '/images/city-guides/' . $slug . '.jpg'
    : '';
}
