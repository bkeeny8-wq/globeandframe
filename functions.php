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

/* ---- ACF field groups (the structured content model) ---- */
require get_theme_file_path('inc/acf-fields.php');

/* ---- Custom-trip inquiry form handler (native, no plugin) ----
   The form on page-custom-inquiry.php posts here; we validate, email the
   inquiry, and redirect back with ?inquiry=ok|err for the on-page message. */
function gf_handle_inquiry() {
    $back = wp_get_referer() ? wp_get_referer() : home_url('/custom-inquiry/');

    // Nonce + honeypot: bail quietly to an error state on any failure.
    if (empty($_POST['gf_inquiry_nonce'])
        || !wp_verify_nonce($_POST['gf_inquiry_nonce'], 'gf_inquiry')
        || !empty($_POST['gf_website'])) {
        wp_safe_redirect(add_query_arg('inquiry', 'err', $back));
        exit;
    }

    $name  = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $dest  = isset($_POST['destination']) ? sanitize_text_field(wp_unslash($_POST['destination'])) : '';
    $len   = isset($_POST['length']) ? sanitize_text_field(wp_unslash($_POST['length'])) : '';
    $det   = isset($_POST['details']) ? sanitize_textarea_field(wp_unslash($_POST['details'])) : '';

    if ($name === '' || !is_email($email) || $det === '') {
        wp_safe_redirect(add_query_arg('inquiry', 'err', $back));
        exit;
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
    wp_safe_redirect(add_query_arg('inquiry', $sent ? 'ok' : 'err', $back));
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
