<?php
/**
 * Globe & Frame — flattened row fields.
 *
 * The list-shaped fields (sights, day trips, the market order list, …) were ACF
 * repeaters. Reading a repeater works on free ACF, but the repeater *editing*
 * UI is an ACF Pro feature, so on free ACF / Secure Custom Fields nobody could
 * add or change a single row in wp-admin. Excel is the source of truth for this
 * content and WordPress edits are rare, so each of those fields is now a plain
 * textarea carrying the workbook's own format:
 *
 *     one row per line, columns separated by " | ", in the documented order
 *
 * gf_rows() turns that back into the row arrays the templates already expect,
 * and still accepts (a) real ACF repeater arrays, in case ACF Pro is ever
 * active with repeater definitions, and (b) the `field_0_subfield` meta the old
 * repeaters wrote — so the published London cluster keeps rendering untouched.
 */
if (!defined('ABSPATH')) exit;

/**
 * The row model: post type => field => ordered column key => label.
 * This is the single source of truth for the column order, shared by the ACF
 * field instructions, the parser, and the Excel post scheme.
 */
function gf_row_schema() {
  static $schema = null;
  if ($schema === null) {
    $schema = array(
      'city_guide' => array(
        'inShort'  => array('text' => 'Point'),
        'sights'   => array('name' => 'Name', 'note' => 'Note', 'timeToSpend' => 'Time to spend', 'ticketCost' => 'Ticket cost', 'ticketUrl' => 'Ticket URL'),
        'dayTrips' => array('name' => 'Name', 'note' => 'Note'),
      ),
      'day_trip' => array(
        'plan'  => array('part' => 'Part of day', 'text' => 'What you do'),
        'costs' => array('label' => 'Item', 'amount' => 'Amount'),
      ),
      'neighborhood' => array(
        'thingsToDo'  => array('name' => 'Thing to do', 'note' => 'Note'),
        'eatAndDrink' => array('name' => 'Name', 'note' => 'Note', 'link' => 'Link'),
      ),
      'local_dish' => array(
        'spots' => array('name' => 'Name', 'note' => 'Note', 'price' => 'Price', 'type' => 'Spot type'),
      ),
      'market' => array(
        'items' => array('name' => 'Order item', 'note' => 'Note', 'priceBand' => 'Price band'),
      ),
      'gift' => array(
        'items' => array('name' => 'Gift', 'category' => 'Category', 'priceBand' => 'Price band', 'bestFor' => 'Best for', 'note' => 'Note', 'where' => 'Where'),
      ),
    );
  }
  return $schema;
}

/** Columns whose values come from a controlled list (see gf_vocab()). */
function gf_row_vocab() {
  return array(
    'day_trip.plan.part'       => 'dayPart',
    'local_dish.spots.price'   => 'priceBand',
    'local_dish.spots.type'    => 'spotType',
    'market.items.priceBand'   => 'priceBand',
    'gift.items.category'      => 'giftCat',
    'gift.items.priceBand'     => 'priceBand',
    'gift.items.bestFor'       => 'giftBestFor',
  );
}

/**
 * Column map for a field. `items` exists on two post types with different
 * columns, so the post type is resolved from the current post when not given.
 */
function gf_row_columns($field, $post_type = null) {
  $schema = gf_row_schema();
  if (!$post_type) $post_type = get_post_type();
  if ($post_type && isset($schema[$post_type][$field])) return $schema[$post_type][$field];
  foreach ($schema as $fields) {
    if (isset($fields[$field])) return $fields[$field];
  }
  return array();
}

/** The editor-facing "how to fill this in" text for a row field. */
function gf_row_instructions($field, $post_type) {
  $columns = gf_row_columns($field, $post_type);
  if (!$columns) return '';

  if (count($columns) === 1) {
    $text = 'One ' . strtolower(reset($columns)) . ' per line.';
  } else {
    $text = 'One row per line, columns separated by <code>|</code> in this order:<br /><code>'
      . esc_html(implode(' | ', $columns)) . '</code>';
  }

  $vocab = gf_row_vocab();
  $notes = array();
  foreach (array_keys($columns) as $key) {
    $lookup = "{$post_type}.{$field}.{$key}";
    if (!isset($vocab[$lookup]) || !function_exists('gf_vocab')) continue;
    $choices = gf_vocab($vocab[$lookup]);
    if ($choices) {
      $notes[] = '<strong>' . esc_html($columns[$key]) . ':</strong> ' . esc_html(implode(', ', $choices));
    }
  }
  if ($notes) $text .= '<br />' . implode('<br />', $notes);

  return $text;
}

/** Serialize row arrays back into the one-line-per-row textarea format. */
function gf_rows_to_text($rows, $columns) {
  $keys  = array_keys($columns);
  $lines = array();
  foreach ($rows as $row) {
    $cells = array();
    foreach ($keys as $key) {
      $cells[] = isset($row[$key]) ? trim((string) $row[$key]) : '';
    }
    // Trailing empties add nothing but noise in the editor.
    while ($cells && end($cells) === '') array_pop($cells);
    if ($cells) $lines[] = implode(' | ', $cells);
  }
  return implode("\n", $lines);
}

/** Parse the textarea format into row arrays keyed by column. */
function gf_parse_rows($text, $columns) {
  $keys = array_keys($columns);
  if (!$keys) $keys = array('text');
  $rows = array();

  foreach (preg_split('/\r\n|\r|\n/', (string) $text) as $line) {
    // Tolerate lists pasted from Word or Excel with bullet characters.
    $line = trim(preg_replace('/^\s*[-–•*]\s+/u', '', $line));
    if ($line === '') continue;

    // Single-column fields take the whole line, so a stray "|" in the prose
    // can't truncate the point.
    $cells = (count($keys) === 1) ? array($line) : array_map('trim', explode('|', $line));
    $row   = array();
    foreach ($keys as $i => $key) {
      $row[$key] = isset($cells[$i]) ? $cells[$i] : '';
    }
    if (trim(implode('', $row)) === '') continue;
    $rows[] = $row;
  }
  return $rows;
}

/** True when this field still holds ACF repeater meta (value = row count). */
function gf_has_legacy_rows($field, $columns, $post_id) {
  foreach (array_keys($columns) as $key) {
    if (metadata_exists('post', $post_id, "{$field}_0_{$key}")) return true;
  }
  return false;
}

/** Rebuild rows from the `field_0_subfield` meta the old repeaters wrote. */
function gf_legacy_rows($field, $columns, $post_id, $count) {
  $rows = array();
  for ($i = 0; $i < $count; $i++) {
    $row   = array();
    $empty = true;
    foreach (array_keys($columns) as $key) {
      $value = get_post_meta($post_id, "{$field}_{$i}_{$key}", true);
      $row[$key] = is_scalar($value) ? (string) $value : '';
      if ($row[$key] !== '') $empty = false;
    }
    if (!$empty) $rows[] = $row;
  }
  return $rows;
}

/**
 * Rows for a list-shaped field, whichever way the data is stored.
 * Templates call this instead of get_field() for the fields in gf_row_schema().
 */
function gf_rows($field, $post_id = 0) {
  $post_id = $post_id ? (int) $post_id : (int) get_the_ID();
  $columns = gf_row_columns($field, $post_id ? get_post_type($post_id) : null);
  $value   = function_exists('get_field')
    ? get_field($field, $post_id)
    : get_post_meta($post_id, $field, true);

  // An ACF Pro repeater (or an importer writing rows directly) already has rows.
  if (is_array($value)) {
    $keys = array_keys($columns) ?: array('text');
    $rows = array();
    foreach ($value as $row) {
      if (!is_array($row)) continue;
      $out = array();
      foreach ($keys as $key) {
        $out[$key] = isset($row[$key]) && is_scalar($row[$key]) ? (string) $row[$key] : '';
      }
      if (trim(implode('', $out)) !== '') $rows[] = $out;
    }
    return $rows;
  }

  // A bare number is a repeater row count, never row content: either the old
  // repeater meta is still in place (the published London cluster) or the field
  // holds an emptied repeater and there is nothing to show.
  if ($columns && is_numeric(trim((string) $value))) {
    return ($post_id && gf_has_legacy_rows($field, $columns, $post_id))
      ? gf_legacy_rows($field, $columns, $post_id, (int) $value)
      : array();
  }

  return gf_parse_rows($value, $columns);
}

/**
 * Show legacy repeater data as editable text in wp-admin.
 * Without this the textarea would display the old row count ("3") and saving
 * would overwrite the rows with it. Runs on read only, so the migration happens
 * naturally the first time someone saves the post.
 */
function gf_row_load_value($value, $post_id, $field) {
  if (is_array($value) || !is_numeric($value) || !is_numeric($post_id)) return $value;

  $name    = isset($field['name']) ? $field['name'] : '';
  $columns = $name ? gf_row_columns($name, get_post_type((int) $post_id)) : array();
  if (!$columns || !gf_has_legacy_rows($name, $columns, (int) $post_id)) return $value;

  return gf_rows_to_text(gf_legacy_rows($name, $columns, (int) $post_id, (int) $value), $columns);
}

foreach (gf_row_schema() as $gf_row_fields) {
  foreach (array_keys($gf_row_fields) as $gf_row_field) {
    add_filter("acf/load_value/name={$gf_row_field}", 'gf_row_load_value', 10, 3);
  }
}
