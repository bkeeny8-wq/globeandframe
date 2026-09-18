<?php
/**
 * Globe & Frame theme functions.
 * Ported from the Astro site: enqueues the same fonts + global.css, and
 * registers the content model (City taxonomy + City Guide + 10 spotlight CPTs).
 */

if (!defined('ABSPATH')) exit;

/* ---- Assets: fonts, global stylesheet, nav script ---- */
function gf_enqueue_assets() {
    wp_enqueue_style(
        'gf-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );
    $ver = wp_get_theme()->get('Version');
    wp_enqueue_style('gf-global', get_theme_file_uri('assets/global.css'), array('gf-fonts'), $ver);
    wp_enqueue_style('gf-enhance', get_theme_file_uri('assets/enhance.css'), array('gf-global'), $ver);
    wp_enqueue_script('gf-nav', get_theme_file_uri('assets/nav.js'), array(), $ver, true);
}
add_action('wp_enqueue_scripts', 'gf_enqueue_assets');

/* ---- Theme supports ---- */
function gf_theme_supports() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'gallery', 'caption', 'style', 'script'));
    register_nav_menus(array('primary' => 'Primary Menu'));
}
add_action('after_setup_theme', 'gf_theme_supports');

/* ---- Shared "City" taxonomy (spans every guide + spotlight type) ---- */
function gf_register_taxonomies() {
    register_taxonomy('city', array(), array(
        'labels'            => array('name' => 'Cities', 'singular_name' => 'City'),
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'city'),
    ));

    // "Region" groups City Guides (Europe, United States, Asia…) — powers the
    // region-organized City Guides landing and the /region/<slug>/ browse pages.
    register_taxonomy('region', array('city_guide'), array(
        'labels'            => array('name' => 'Regions', 'singular_name' => 'Region'),
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'region'),
    ));
}
add_action('init', 'gf_register_taxonomies', 5);

/* ---- City Guide + 10 spotlight custom post types ----
   key => array(Singular, Plural, url-slug)  (mirrors keystatic.config.ts) */
function gf_register_post_types() {
    $types = array(
        'city_guide'   => array('City Guide', 'City Guides', 'city-guides'),
        'beach'        => array('Beach', 'Beaches', 'beaches'),
        'day_trip'     => array('Day Trip', 'Day Trips', 'day-trips'),
        'neighborhood' => array('Neighborhood', 'Neighborhoods', 'neighborhoods'),
        'local_dish'   => array('Local Dish', 'Local Dishes', 'local-dishes'),
        'market'       => array('Market', 'Markets', 'markets'),
        'bar'          => array('Bar', 'Bars', 'bars'),
        'walk'         => array('Walk', 'Walks', 'walks'),
        'experience'   => array('Experience', 'Experiences', 'experiences'),
        'gift'         => array('Gift', 'Gifts', 'gifts'),
        'mcdonalds'    => array("McDonald's Item", "McDonald's Items", 'mcdonalds'),
    );
    foreach ($types as $key => $t) {
        list($singular, $plural, $slug) = $t;
        register_post_type($key, array(
            'labels' => array(
                'name'          => $plural,
                'singular_name' => $singular,
                'menu_name'     => $plural,
                'add_new_item'  => 'Add New ' . $singular,
                'edit_item'     => 'Edit ' . $singular,
            ),
            'public'       => true,
            'has_archive'  => true,
            'menu_icon'    => ($key === 'city_guide') ? 'dashicons-book' : 'dashicons-location-alt',
            'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions'),
            'taxonomies'   => array('city'),
            'show_in_rest' => true,
            'rewrite'      => array('slug' => $slug, 'with_front' => false),
        ));
    }
}
add_action('init', 'gf_register_post_types', 5);

/* ---- Content model ----
   rows.php first: the field groups build their editor instructions from the
   row schema it defines. */
require get_theme_file_path('inc/rows.php');
require get_theme_file_path('inc/acf-fields.php');

/* ---- Storefront ----
   There is no on-site shop yet; the storefront is Etsy (same link as the
   footer). Filter `gf_shop_url` — or return '' — once a real /shop/ exists. */
function gf_shop_url() {
    return apply_filters('gf_shop_url', 'https://globeandframeco.etsy.com');
}

/** True when a URL leaves the site, so nav/footer links can open in a new tab. */
function gf_is_external_url($url) {
    $host = wp_parse_url($url, PHP_URL_HOST);
    return $host && $host !== wp_parse_url(home_url('/'), PHP_URL_HOST);
}

/* ---- Itinerary tiers ----
   Tier data in inc/itineraries-data.php is keyed '3-day' | '7-day' | '10-day',
   but the live pages are published at /3-day-itineraries/ etc. Everything goes
   through these helpers so either slug form resolves, and so internal links
   point at the page that actually exists instead of a 301. */
function gf_itinerary_tiers() {
    return array('3-day' => '3 Days', '7-day' => '7 Days', '10-day' => '10 Days');
}

/** '3-day-itineraries', '/itineraries/3-day/', '3-day' → '3-day' ('' if not a tier). */
function gf_itinerary_tier_key($slug) {
    $parts = array_filter(explode('/', strtolower((string) $slug)));
    $last  = $parts ? (string) end($parts) : '';
    $last  = preg_replace('/-(itineraries|itinerary)$/', '', $last);
    $tiers = gf_itinerary_tiers();
    return isset($tiers[$last]) ? $last : '';
}

/** Permalink of the published page for a tier, whichever slug convention it uses. */
function gf_itinerary_tier_url($tier) {
    static $cache = array();
    $tier = gf_itinerary_tier_key($tier);
    if ($tier === '') return home_url('/itineraries/');
    if (isset($cache[$tier])) return $cache[$tier];

    $url = home_url('/itineraries/' . $tier . '/');
    foreach (array('itineraries/' . $tier, $tier . '-itineraries', $tier) as $path) {
        $page = get_page_by_path($path);
        if ($page && get_post_status($page) === 'publish') {
            $url = get_permalink($page);
            break;
        }
    }
    return $cache[$tier] = $url;
}

/* ---- Published-content counts (so copy can't overstate the catalogue) ----
   Everything except the London cluster is intentionally Draft, so any
   hardcoded destination total is a promise the site doesn't keep. */
function gf_city_guide_summary() {
    $counts = wp_count_posts('city_guide');
    $guides = $counts ? (int) $counts->publish : 0;
    if ($guides === 0) {
        return 'The first destination guides publish soon, with new cities landing through the year.';
    }

    $regions = get_terms(array('taxonomy' => 'region', 'hide_empty' => true, 'fields' => 'ids'));
    $regions = is_wp_error($regions) ? 0 : count($regions);
    if ($guides > 1 && $regions > 1) {
        return sprintf(
            '%s destinations across %s regions, with more publishing through the year.',
            number_format_i18n($guides),
            number_format_i18n($regions)
        );
    }
    return sprintf(
        _n(
            '%s destination live now, with more publishing through the year.',
            '%s destinations live now, with more publishing through the year.',
            $guides,
            'globe-and-frame'
        ),
        number_format_i18n($guides)
    );
}

/* ---- Search ----
   Keep results inside the editorial content model. Without this, an active
   commerce plugin puts products and downloads in front of visitors searching
   for destinations. Filter `gf_search_post_types` when the shop is real. */
function gf_search_post_types() {
    $types = array_merge(
        array('post', 'page', 'city_guide'),
        array('beach', 'day_trip', 'neighborhood', 'local_dish', 'market', 'bar', 'walk', 'experience', 'gift', 'mcdonalds')
    );
    return apply_filters('gf_search_post_types', $types);
}

function gf_scope_search_query($query) {
    if (is_admin() || !$query->is_main_query() || !$query->is_search()) return;
    $query->set('post_type', gf_search_post_types());
}
add_action('pre_get_posts', 'gf_scope_search_query');

/* ---- Custom-trip inquiry form handler (native, no plugin) ----
   The form on page-custom-inquiry.php posts here; we validate, email the
   inquiry, and redirect back with ?inquiry=<state> for the on-page message.
   States: ok | expired (nonce/honeypot) | invalid (validation) | mailfail. */

/** Park a failed submission for 30 minutes so the form can come back filled in. */
function gf_stash_inquiry($fields) {
    $token = wp_generate_password(20, false, false);
    set_transient('gf_inquiry_' . $token, $fields, 30 * MINUTE_IN_SECONDS);
    return $token;
}

/** Read back a stashed submission. Left in place so a page reload doesn't
 *  throw the visitor's answers away again; it expires on its own. */
function gf_get_stashed_inquiry($token) {
    $token = sanitize_key($token);
    if ($token === '') return array();
    $fields = get_transient('gf_inquiry_' . $token);
    return is_array($fields) ? $fields : array();
}

function gf_inquiry_fail($state, $back, $fields = array()) {
    $args = array('inquiry' => $state);
    if ($fields) $args['gf_draft'] = gf_stash_inquiry($fields);
    wp_safe_redirect(add_query_arg($args, $back));
    exit;
}

function gf_handle_inquiry() {
    $back = wp_get_referer() ? wp_get_referer() : home_url('/custom-inquiry/');
    $back = remove_query_arg(array('inquiry', 'gf_draft'), $back);

    $fields = array(
        'name'        => isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '',
        'email'       => isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '',
        'destination' => isset($_POST['destination']) ? sanitize_text_field(wp_unslash($_POST['destination'])) : '',
        'length'      => isset($_POST['length']) ? sanitize_text_field(wp_unslash($_POST['length'])) : '',
        'details'     => isset($_POST['details']) ? sanitize_textarea_field(wp_unslash($_POST['details'])) : '',
    );

    // Honeypot: a filled hidden field is a bot, so drop it without stashing.
    if (!empty($_POST['gf_website'])) {
        gf_inquiry_fail('expired', $back);
    }
    // Nonce: usually a page left open until the nonce aged out — retrying works.
    if (empty($_POST['gf_inquiry_nonce']) || !wp_verify_nonce($_POST['gf_inquiry_nonce'], 'gf_inquiry')) {
        gf_inquiry_fail('expired', $back, $fields);
    }

    $name  = $fields['name'];
    $email = $fields['email'];
    $dest  = $fields['destination'];
    $len   = $fields['length'];
    $det   = $fields['details'];

    if ($name === '' || !is_email($email) || $det === '') {
        gf_inquiry_fail('invalid', $back, $fields);
    }

    $subject = 'Custom Trip Inquiry — Globe & Frame';
    $body    = "New custom-trip inquiry from the website:\n\n"
             . "Name: {$name}\n"
             . "Email: {$email}\n"
             . 'Destination: ' . ($dest !== '' ? $dest : 'Not specified') . "\n"
             . 'Trip length: ' . ($len !== '' ? $len : 'Not specified') . "\n\n"
             . "Details:\n{$det}\n";
    $headers = array('Reply-To: ' . $name . ' <' . $email . '>');

    $sent = wp_mail('bkeeny8@gmail.com', $subject, $body, $headers);
    if (!$sent) {
        gf_inquiry_fail('mailfail', $back, $fields);
    }
    wp_safe_redirect(add_query_arg('inquiry', 'ok', $back));
    exit;
}
add_action('admin_post_nopriv_gf_inquiry', 'gf_handle_inquiry');
add_action('admin_post_gf_inquiry', 'gf_handle_inquiry');

/* ---- Serve content images from the theme (no web-root /images/ needed) ----
   Templates reference photos at root-relative paths like /images/city-guides/london.jpg.
   Those files are bundled in the theme at assets/images/, so on any host we rewrite
   the root-relative URLs to the theme copy at output time. The regex only matches
   /images/ at the START of a URL (right after a quote or paren), so it never touches
   /wp-content/themes/.../assets/images/ or any absolute external URL. */
function gf_rewrite_content_images($html) {
    $base = get_theme_file_uri('assets/images');
    return preg_replace('#([\'"(])/images/#', '$1' . $base . '/', $html);
}
function gf_start_image_rewrite() {
    if (is_admin() || is_feed() || (defined('REST_REQUEST') && REST_REQUEST)) return;
    ob_start('gf_rewrite_content_images');
}
add_action('template_redirect', 'gf_start_image_rewrite', 0);
