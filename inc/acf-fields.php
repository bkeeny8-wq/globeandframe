<?php
/**
 * Globe & Frame — ACF field groups for the content model.
 * Mirrors keystatic.config.ts (10 spotlight collections) + the City Guide workbook.
 * Registers on acf/init. Field keys are namespaced per type so they stay unique.
 */
if (!defined('ABSPATH')) exit;

/* ---- controlled vocabularies (self-contained, no globals) ---- */
function gf_vocab($k) {
  static $V = null;
  if ($V === null) {
    $V = array(
      'scope'        => array('City', 'Country'),
      'status'       => array('Draft', 'Ready', 'Published'),
      'provenance'   => array('Your words', 'Expanded (verify)', 'AI draft'),
      'priceBand'    => array('$', '$$', '$$$'),
      'priceStay'    => array('$', '$$', '$$$', '$$$$'),
      'season'       => array('Spring', 'Summer', 'Autumn', 'Winter', 'Shoulder season', 'Year-round'),
      'yesno'        => array('Yes', 'No'),
      'beachBestFor' => array('Surf', 'Calm', 'Family', 'Party', 'Quiet', 'Snorkel'),
      'beachWater'   => array('Surf beach', 'Flat & calm', 'Rocky', 'Rip-prone', 'Not for swimming'),
      'beachCost'    => array('Free', 'Paid parking', 'Paid entry', 'Loungers extra'),
      'amenities'    => array('Lifeguards', 'Restrooms', 'Showers', 'Café / food', 'Rentals', 'Ocean pool'),
      'dtGetting'    => array('Train', 'Coach/bus', 'Car/rental', 'Ferry', 'Walk/bike'),
      'hoodBestFor'  => array('First-timers', 'Nightlife', 'Budget/value', 'Families', 'Quiet/residential', 'Local vibe', 'Romantic', 'Foodies', 'Walkable'),
      'hoodAround'   => array('Walkable', 'Tram/metro', 'Hilly/steep', 'Flat & easy'),
      'dishType'     => array('Pasta', 'Street food', 'Seafood', 'Grilled/BBQ', 'Sandwich', 'Soup/stew', 'Rice/noodle', 'Dessert', 'Drink', 'Snack'),
      'course'       => array('Starter', 'First course', 'Main', 'Side', 'Street snack', 'Dessert', 'Drink'),
      'spotType'     => array('Market stall', 'Street cart', 'Trattoria/tavern', 'Restaurant', 'Bakery', 'Casual counter'),
      'dietary'      => array('Vegetarian', 'Vegan option', 'Contains dairy', 'Contains pork', 'Contains shellfish', 'Contains gluten', 'Nuts', 'Spicy'),
      'marketType'   => array('Food hall', 'Covered market', 'Street market', "Farmers' market"),
      'marketTime'   => array('Weekday morning', 'Early morning', 'Weekend', 'Lunch', 'Evening'),
      'barScene'     => array('Historic pub', 'Cocktail bar', 'Craft-beer bar', 'Wine bar', 'Local/dive', 'Rooftop', 'Live music', 'Speakeasy'),
      'barBestFor'   => array('Cozy/quiet', 'Lively night', 'Date-worthy', 'Groups', 'Solo-friendly', 'People-watching', 'Late-night'),
      'giftCat'      => array('Food/snack', 'Drink', 'Ceramics/homeware', 'Textile', 'Stationery', 'Beauty/skincare', 'Art/print', 'Jewelry', 'Craft'),
      'giftWhere'    => array('Market', 'Department-store food hall', 'Specialist shop', 'Convenience store', 'Craft district', 'Artisan/maker'),
      'giftBestFor'  => array('Foodies', 'Kids', 'Home/host', 'Hard-to-buy-for', 'Yourself', 'Coworkers'),
      'difficulty'   => array('Easy', 'Moderate', 'Hard', 'Strenuous'),
      'routeType'    => array('Loop', 'Out-and-back', 'Point-to-point'),
      'terrain'      => array('Paved', 'Dirt path', 'Rocky', 'Scramble', 'Steps', 'Mixed'),
      'walkCost'     => array('Free', 'Paid entry', 'Permit needed'),
      'walkTime'     => array('Sunrise', 'Morning', 'Golden hour/Sunset', 'Anytime'),
      'expType'      => array('Show/nightlife', 'Outdoors/nature', 'Food & drink', 'Culture/arts', 'Local ritual', 'Sport/adrenaline', 'Market', 'Music', 'Views/transport'),
      'expWhen'      => array('Evenings', 'Weekends', 'Daytime', 'Sundays', 'Year-round', 'Seasonal'),
      'expBestFor'   => array('Groups', 'Solo', 'Families', 'Adventurous', 'Culture lovers', 'Night owls'),
      'mcdType'      => array('Burger', 'Chicken', 'Side', 'Dessert', 'Drink', 'Breakfast', 'Seasonal special'),
      'mcdAvail'     => array('Year-round', 'Seasonal', 'Limited-time'),
      'dayPart'      => array('Morning', 'Midday', 'Afternoon', 'Evening'),
    );
  }
  return isset($V[$k]) ? $V[$k] : array();
}

/* ---- field helpers ---- */
function gf_choices($arr) { return array_combine($arr, $arr); }
function gf_f($p, $n, $type, $label, $extra = array()) {
  return array_merge(array('key' => "field_gf_{$p}_{$n}", 'label' => $label, 'name' => $n, 'type' => $type), $extra);
}
function gf_sub($p, $rep, $n, $type, $label, $extra = array()) {
  return array_merge(array('key' => "field_gf_{$p}_{$rep}_{$n}", 'label' => $label, 'name' => $n, 'type' => $type), $extra);
}
function gf_txt($p, $n, $l)  { return gf_f($p, $n, 'text', $l); }
function gf_area($p, $n, $l) { return gf_f($p, $n, 'textarea', $l, array('rows' => 3)); }
function gf_wys($p, $n, $l)  { return gf_f($p, $n, 'wysiwyg', $l, array('media_upload' => 0, 'toolbar' => 'basic')); }
function gf_url($p, $n, $l)  { return gf_f($p, $n, 'url', $l); }
function gf_num($p, $n, $l, $min = null, $max = null) {
  $e = array(); if ($min !== null) $e['min'] = $min; if ($max !== null) $e['max'] = $max;
  return gf_f($p, $n, 'number', $l, $e);
}
function gf_date($p, $n, $l) { return gf_f($p, $n, 'date_picker', $l, array('return_format' => 'Y-m-d')); }
function gf_sel($p, $n, $l, $c)   { return gf_f($p, $n, 'select', $l, array('choices' => gf_choices($c), 'allow_null' => 1, 'ui' => 1)); }
function gf_multi($p, $n, $l, $c) { return gf_f($p, $n, 'checkbox', $l, array('choices' => gf_choices($c))); }
function gf_rep($p, $n, $l, $subs, $btn = 'Add row') {
  return gf_f($p, $n, 'repeater', $l, array('layout' => 'block', 'button_label' => $btn, 'sub_fields' => $subs));
}
function gf_selsub($p, $rep, $n, $l, $c) {
  return gf_sub($p, $rep, $n, 'select', $l, array('choices' => gf_choices($c), 'allow_null' => 1, 'ui' => 1));
}
function gf_identity($p) {
  return array(gf_txt($p, 'city', 'City'), gf_txt($p, 'country', 'Country / Region'),
    gf_sel($p, 'scope', 'Scope', gf_vocab('scope')), gf_area($p, 'hook', 'Hook (one line under the title)'));
}
function gf_meta($p) {
  return array(gf_area($p, 'photoSpot', 'Photo spot'), gf_area($p, 'proTip', 'Pro tip'),
    gf_url($p, 'mapUrl', 'Map URL'), gf_date($p, 'verified', 'Verified'),
    gf_sel($p, 'status', 'Status', gf_vocab('status')), gf_sel($p, 'provenance', 'Provenance', gf_vocab('provenance')));
}
function gf_group($type, $title, $fields) {
  acf_add_local_field_group(array(
    'key' => "group_gf_{$type}", 'title' => $title, 'fields' => $fields,
    'location' => array(array(array('param' => 'post_type', 'operator' => '==', 'value' => $type))),
    'menu_order' => 0, 'position' => 'normal', 'style' => 'default', 'label_placement' => 'top',
  ));
}

add_action('acf/init', function () {
  if (!function_exists('acf_add_local_field_group')) return;

  /* ---------- CITY GUIDE (pillar) ---------- */
  gf_group('city_guide', 'City Guide — fields', array(
    gf_txt('city_guide', 'city', 'City'),
    gf_txt('city_guide', 'country', 'Country / Region'),
    gf_txt('city_guide', 'region', 'Region (group, e.g. Europe)'),
    gf_txt('city_guide', 'daysRecommended', 'Days recommended'),
    gf_area('city_guide', 'hook', 'Hook'),
    gf_num('city_guide', 'overallRating', 'Overall rating (1–5)', 1, 5),
    gf_num('city_guide', 'safetyRating', 'Safety rating (1–5)', 1, 5),
    gf_txt('city_guide', 'visited', 'Visited (when)'),
    gf_txt('city_guide', 'safety', 'Safety (fact)'),
    gf_txt('city_guide', 'language', 'Language (fact)'),
    gf_txt('city_guide', 'currency', 'Currency (fact)'),
    gf_txt('city_guide', 'costOfBeer', 'Cost of a beer (fact)'),
    gf_wys('city_guide', 'overview', 'Overview (the take)'),
    gf_rep('city_guide', 'inShort', 'In short', array(gf_sub('city_guide', 'inShort', 'text', 'textarea', 'Point')), 'Add point'),
    gf_area('city_guide', 'flightIn', 'The flight in'),
    gf_txt('city_guide', 'flightOperators', 'Flight operators (from NYC)'),
    gf_area('city_guide', 'movingAround', 'Moving around'),
    gf_area('city_guide', 'whatToSeeIntro', 'What to see (intro)'),
    gf_rep('city_guide', 'sights', 'What to see (sights)', array(
      gf_sub('city_guide', 'sights', 'name', 'text', 'Sight name'),
      gf_sub('city_guide', 'sights', 'note', 'textarea', 'Note'),
      gf_sub('city_guide', 'sights', 'timeToSpend', 'text', 'Time to spend'),
      gf_sub('city_guide', 'sights', 'ticketCost', 'text', 'Ticket cost'),
      gf_sub('city_guide', 'sights', 'ticketUrl', 'url', 'Ticket / site URL'),
    ), 'Add sight'),
    gf_txt('city_guide', 'mustTryDish', 'Must-try dish'),
    gf_area('city_guide', 'mustTryDishNote', 'Must-try dish note'),
    gf_wys('city_guide', 'foodDrink', 'Food & drink (the take)'),
    gf_area('city_guide', 'accommodationIntro', 'Accommodation intro'),
    gf_txt('city_guide', 'whereStayed', 'Where I stayed (hotel)'),
    gf_area('city_guide', 'whereStayedNote', 'Where I stayed note'),
    gf_area('city_guide', 'dayTripsTake', 'Day trips (the take)'),
    gf_rep('city_guide', 'dayTrips', 'Day trips', array(
      gf_sub('city_guide', 'dayTrips', 'name', 'text', 'Name'),
      gf_sub('city_guide', 'dayTrips', 'note', 'textarea', 'Note'),
    ), 'Add day trip'),
    gf_area('city_guide', 'whatToBringHome', 'What to bring home'),
    gf_area('city_guide', 'languageNote', 'Language note'),
    gf_area('city_guide', 'currencyNote', 'Currency note'),
    gf_txt('city_guide', 'visaStatus', 'Visa status'),
    gf_area('city_guide', 'visaNote', 'Visa note'),
    gf_area('city_guide', 'gettingThereSummary', 'Getting there (summary)'),
    gf_area('city_guide', 'gettingAroundSummary', 'Getting around (summary)'),
    gf_area('city_guide', 'itineraryBlurb', 'Itinerary CTA blurb'),
    gf_url('city_guide', 'itineraryUrl', 'Itinerary URL'),
    gf_url('city_guide', 'mapUrl', 'Map URL'),
    gf_date('city_guide', 'verified', 'Verified'),
    // Workbook readiness, not visibility — the WordPress post status is what
    // visitors see. Present on the 10 spotlight types via gf_meta(); the guide
    // needs it too so every sheet in the post scheme carries one status column.
    gf_sel('city_guide', 'status', 'Status', gf_vocab('status')),
    gf_sel('city_guide', 'provenance', 'Provenance', gf_vocab('provenance')),
  ));

  /* ---------- BEACH ---------- */
  gf_group('beach', 'Favorite Beach — fields', array_merge(gf_identity('beach'), array(
    gf_sel('beach', 'bestFor', 'Best for', gf_vocab('beachBestFor')),
    gf_sel('beach', 'water', 'Water & swimming', gf_vocab('beachWater')),
    gf_sel('beach', 'cost', 'Cost', gf_vocab('beachCost')),
    gf_area('beach', 'gettingThere', 'Getting there & parking'),
    gf_wys('beach', 'take', 'The take'),
    gf_area('beach', 'vibe', 'Vibe / who for'),
    gf_area('beach', 'conditions', 'Water & conditions'),
    gf_multi('beach', 'amenities', 'Amenities', gf_vocab('amenities')),
    gf_txt('beach', 'bestTime', 'Best time'),
    gf_area('beach', 'whatToBring', 'What to bring'),
    gf_txt('beach', 'nearbyBite', 'Nearby bite (name)'),
    gf_url('beach', 'nearbyBiteLink', 'Nearby bite link'),
    gf_url('beach', 'printLink', 'Print link'),
    gf_area('beach', 'skipIf', 'Skip if'),
  ), gf_meta('beach')));

  /* ---------- DAY TRIP ---------- */
  gf_group('day_trip', 'Day Trip Spotlight — fields', array_merge(gf_identity('day_trip'), array(
    gf_txt('day_trip', 'journeyTime', 'Journey time (each way)'),
    gf_sel('day_trip', 'gettingThere', 'Getting there', gf_vocab('dtGetting')),
    gf_sel('day_trip', 'bestTime', 'Best time', gf_vocab('season')),
    gf_sel('day_trip', 'costBand', 'Cost band', gf_vocab('priceBand')),
    gf_wys('day_trip', 'take', 'The take'),
    gf_area('day_trip', 'gettingDetail', 'Getting there & back (detail)'),
    gf_multi('day_trip', 'transport', 'Transport options', gf_vocab('dtGetting')),
    gf_area('day_trip', 'lastTrain', 'Last-train warning'),
    gf_area('day_trip', 'bestTimeDetail', 'Best time (detail)'),
    gf_area('day_trip', 'booking', 'Booking & opening'),
    gf_rep('day_trip', 'plan', 'The plan (full day)', array(
      gf_selsub('day_trip', 'plan', 'part', 'Part of day', gf_vocab('dayPart')),
      gf_sub('day_trip', 'plan', 'text', 'textarea', 'What you do'),
    ), 'Add stage'),
    gf_rep('day_trip', 'costs', 'Cost breakdown', array(
      gf_sub('day_trip', 'costs', 'label', 'text', 'Item'),
      gf_sub('day_trip', 'costs', 'amount', 'text', 'Amount'),
    ), 'Add cost'),
    gf_area('day_trip', 'skipIf', 'Skip if'),
  ), gf_meta('day_trip')));

  /* ---------- NEIGHBORHOOD ---------- */
  gf_group('neighborhood', 'Neighborhood Spotlight — fields', array_merge(gf_identity('neighborhood'), array(
    gf_multi('neighborhood', 'bestFor', 'Best for', gf_vocab('hoodBestFor')),
    gf_sel('neighborhood', 'priceToStay', 'Price to stay', gf_vocab('priceStay')),
    gf_sel('neighborhood', 'gettingAround', 'Getting around', gf_vocab('hoodAround')),
    gf_txt('neighborhood', 'dontMiss', "Don't miss"),
    gf_wys('neighborhood', 'take', 'The take'),
    gf_area('neighborhood', 'shouldYouStay', 'Should you stay here?'),
    gf_rep('neighborhood', 'thingsToDo', 'What to do', array(
      gf_sub('neighborhood', 'thingsToDo', 'name', 'text', 'Thing to do'),
      gf_sub('neighborhood', 'thingsToDo', 'note', 'textarea', 'Note'),
    ), 'Add item'),
    gf_rep('neighborhood', 'eatAndDrink', 'Eat & drink', array(
      gf_sub('neighborhood', 'eatAndDrink', 'name', 'text', 'Name'),
      gf_sub('neighborhood', 'eatAndDrink', 'note', 'textarea', 'Note'),
      gf_sub('neighborhood', 'eatAndDrink', 'link', 'url', 'Link'),
    ), 'Add spot'),
    gf_area('neighborhood', 'gettingAroundDetail', 'Getting around (detail)'),
    gf_txt('neighborhood', 'whenItShines', 'When it shines'),
    gf_area('neighborhood', 'notForYou', 'Not for you'),
  ), gf_meta('neighborhood')));

  /* ---------- LOCAL DISH ---------- */
  gf_group('local_dish', 'Local Dish Spotlight — fields', array_merge(gf_identity('local_dish'), array(
    gf_sel('local_dish', 'type', 'Type', gf_vocab('dishType')),
    gf_sel('local_dish', 'price', 'Typical price', gf_vocab('priceBand')),
    gf_sel('local_dish', 'orderAs', 'Order as', gf_vocab('course')),
    gf_num('local_dish', 'verdict', 'Verdict (/10)', 1, 10),
    gf_multi('local_dish', 'dietary', 'Good to know', gf_vocab('dietary')),
    gf_wys('local_dish', 'whatItIs', 'What it is'),
    gf_area('local_dish', 'story', 'The story'),
    gf_area('local_dish', 'howToOrder', 'How to order & eat it'),
    gf_rep('local_dish', 'spots', 'Where to get it', array(
      gf_sub('local_dish', 'spots', 'name', 'text', 'Name'),
      gf_sub('local_dish', 'spots', 'note', 'textarea', 'Note'),
      gf_selsub('local_dish', 'spots', 'price', 'Price', gf_vocab('priceBand')),
      gf_selsub('local_dish', 'spots', 'type', 'Spot type', gf_vocab('spotType')),
    ), 'Add spot'),
    gf_area('local_dish', 'whatToAvoid', 'What to avoid'),
    gf_area('local_dish', 'verdictNote', 'Verdict note'),
  ), gf_meta('local_dish')));

  /* ---------- MARKET ---------- */
  gf_group('market', 'What to Eat in the Market — fields', array_merge(gf_identity('market'), array(
    gf_sel('market', 'marketType', 'Market type', gf_vocab('marketType')),
    gf_sel('market', 'bestTime', 'Best time', gf_vocab('marketTime')),
    gf_txt('market', 'budget', 'Budget (e.g. ~€15)'),
    gf_txt('market', 'nearest', 'Nearest / area'),
    gf_wys('market', 'intro', 'Market intro (the take)'),
    gf_rep('market', 'items', 'What to order', array(
      gf_sub('market', 'items', 'name', 'text', 'Order item'),
      gf_sub('market', 'items', 'note', 'textarea', 'Note'),
      gf_selsub('market', 'items', 'priceBand', 'Price band', gf_vocab('priceBand')),
    ), 'Add item'),
  ), gf_meta('market')));

  /* ---------- BAR ---------- */
  gf_group('bar', 'Bar & Pub Spotlight — fields', array_merge(gf_identity('bar'), array(
    gf_sel('bar', 'scene', 'Scene / type', gf_vocab('barScene')),
    gf_multi('bar', 'bestFor', 'Best for', gf_vocab('barBestFor')),
    gf_sel('bar', 'priceBand', 'Price band', gf_vocab('priceBand')),
    gf_num('bar', 'verdict', 'Verdict (/10)', 1, 10),
    gf_wys('bar', 'take', 'The take'),
    gf_txt('bar', 'orderDrink', 'Order — the drink'),
    gf_txt('bar', 'orderAlt', 'Order — alternative'),
    gf_area('bar', 'vibe', 'Vibe / who for'),
    gf_txt('bar', 'whenToGo', 'When to go'),
    gf_area('bar', 'goodToKnow', 'Good to know'),
    gf_url('bar', 'directionsUrl', 'Directions URL'),
    gf_url('bar', 'instagramUrl', 'Instagram URL'),
    gf_area('bar', 'notForYou', 'Not for you'),
  ), gf_meta('bar')));

  /* ---------- WALK ---------- */
  gf_group('walk', 'Best Walk or Hike — fields', array_merge(gf_identity('walk'), array(
    gf_txt('walk', 'distance', 'Distance'),
    gf_txt('walk', 'time', 'Time'),
    gf_sel('walk', 'difficulty', 'Difficulty', gf_vocab('difficulty')),
    gf_sel('walk', 'bestTimeFact', 'Best time', gf_vocab('walkTime')),
    gf_sel('walk', 'routeType', 'Route type', gf_vocab('routeType')),
    gf_txt('walk', 'elevation', 'Elevation gain'),
    gf_sel('walk', 'terrain', 'Terrain', gf_vocab('terrain')),
    gf_sel('walk', 'cost', 'Cost', gf_vocab('walkCost')),
    gf_wys('walk', 'take', 'The take'),
    gf_area('walk', 'trailhead', 'Getting to the trailhead'),
    gf_url('walk', 'directionsUrl', 'Directions URL'),
    gf_area('walk', 'whatToBring', 'What to bring'),
    gf_area('walk', 'bestTimeDetail', 'Best time (detail)'),
    gf_area('walk', 'safety', 'Safety'),
  ), gf_meta('walk')));

  /* ---------- EXPERIENCE ---------- */
  gf_group('experience', 'Unique Thing to Do — fields', array_merge(gf_identity('experience'), array(
    gf_sel('experience', 'type', 'Type', gf_vocab('expType')),
    gf_sel('experience', 'costBand', 'Cost band', gf_vocab('priceBand')),
    gf_sel('experience', 'when', 'When', gf_vocab('expWhen')),
    gf_multi('experience', 'bestFor', 'Best for', gf_vocab('expBestFor')),
    gf_txt('experience', 'duration', 'Duration'),
    gf_txt('experience', 'bestNight', 'Best night / when'),
    gf_sel('experience', 'bookAhead', 'Book ahead', gf_vocab('yesno')),
    gf_sel('experience', 'familyFriendly', 'Family-friendly', gf_vocab('yesno')),
    gf_wys('experience', 'whatItIs', 'What it is'),
    gf_area('experience', 'whatItsLike', "What a night's like"),
    gf_area('experience', 'howToDoIt', 'How to do it'),
    gf_area('experience', 'goodToKnow', 'Good to know'),
    gf_url('experience', 'directionsUrl', 'Directions URL'),
    gf_url('experience', 'instagramUrl', 'Instagram URL'),
  ), gf_meta('experience')));

  /* ---------- GIFTS ---------- */
  gf_group('gift', 'Unique Gifts to Bring Home — fields', array_merge(gf_identity('gift'), array(
    gf_wys('gift', 'overview', 'Where to buy — overview'),
    gf_txt('gift', 'budget', 'Budget'),
    gf_rep('gift', 'items', 'The gifts', array(
      gf_sub('gift', 'items', 'name', 'text', 'Gift'),
      gf_selsub('gift', 'items', 'category', 'Category', gf_vocab('giftCat')),
      gf_selsub('gift', 'items', 'priceBand', 'Price band', gf_vocab('priceBand')),
      gf_selsub('gift', 'items', 'bestFor', 'Best for', gf_vocab('giftBestFor')),
      gf_sub('gift', 'items', 'note', 'textarea', 'Note'),
      gf_sub('gift', 'items', 'where', 'text', 'Where (specific)'),
    ), 'Add gift'),
  ), gf_meta('gift')));

  /* ---------- McDONALD'S ---------- */
  gf_group('mcdonalds', "Best Local McDonald's Item — fields", array_merge(array(
    gf_txt('mcdonalds', 'city', 'Cities (if country-scoped, list them)'),
    gf_txt('mcdonalds', 'country', 'Country / Region'),
    gf_sel('mcdonalds', 'scope', 'Scope', gf_vocab('scope')),
    gf_area('mcdonalds', 'hook', 'Hook'),
    gf_sel('mcdonalds', 'type', 'Type', gf_vocab('mcdType')),
    gf_num('mcdonalds', 'verdict', 'Verdict (/10)', 1, 10),
    gf_txt('mcdonalds', 'price', 'Price (local currency)'),
    gf_sel('mcdonalds', 'availability', 'Availability', gf_vocab('mcdAvail')),
    gf_wys('mcdonalds', 'whatItIs', 'What it is'),
    gf_area('mcdonalds', 'verdictNote', 'Verdict note'),
    gf_area('mcdonalds', 'howToGetIt', 'How to get it'),
    gf_area('mcdonalds', 'whyDoThis', 'Why do this'),
  ), gf_meta('mcdonalds')));
});
