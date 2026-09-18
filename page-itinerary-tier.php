<?php
/**
 * Template Name: Itinerary Tier
 *
 * One shared template for the 3-day / 7-day / 10-day itinerary listings.
 * The tier comes from the page slug via gf_itinerary_tier_key(), which accepts
 * both slug conventions in use — '3-day' and the live '3-day-itineraries'.
 * Data comes from inc/itineraries-data.php (generated from the Astro
 * src/data/itineraries.ts). Ported from components/ItineraryTierPage.astro +
 * ItineraryCard.astro — reuses the existing .itin-* styles in global.css.
 */
get_header();

$slug = get_queried_object() ? gf_itinerary_tier_key(get_queried_object()->post_name) : '';
$data = require get_theme_file_path('inc/itineraries-data.php');
$meta = array(
  '3-day' => array(
    'daysLabel' => '3 Days',
    'pageTitle' => '3-Day Itineraries',
    'lead'      => 'One city, done well. Built for shorter stays, long weekends, and city breaks where structure matters most. Each guide covers what to see, where to eat, and how to pace it.',
    'ctaTitle'  => 'Want 7 or 10 days?',
    'ctaBody'   => '3-day guides stack into multi-city itineraries. Browse the 7 and 10-day routes built from these same destinations.',
    'cta'       => array(
      array('label' => '7-Day Itineraries', 'tier' => '7-day', 'variant' => 'primary'),
      array('label' => '10-Day Itineraries', 'tier' => '10-day', 'variant' => 'secondary'),
    ),
  ),
  '7-day' => array(
    'daysLabel' => '7 Days',
    'pageTitle' => '7-Day Itineraries',
    'lead'      => "Two cities that fit together. Regional pairings built around how destinations complement each other — not just what's nearby on a map.",
    'ctaTitle'  => 'Want to add a third city?',
    'ctaBody'   => 'Any 7-day itinerary can be extended into a 10-day route. Browse the full multi-city options.',
    'cta'       => array(
      array('label' => 'Browse 10-Day Routes', 'tier' => '10-day', 'variant' => 'primary'),
    ),
  ),
  '10-day' => array(
    'daysLabel' => '10 Days',
    'pageTitle' => '10-Day Itineraries',
    'lead'      => 'Three cities, one coherent trip. Broader regional routes with enough time to connect multiple destinations without turning the trip into a sprint.',
    'ctaTitle'  => 'Need something different?',
    'ctaBody'   => "Different trip length, different destinations, or a specific experience in mind — tell me what you're after.",
    'cta'       => array(
      array('label' => 'Plan a Custom Trip', 'path' => 'custom-inquiry/', 'variant' => 'primary'),
    ),
  ),
);

// Not a recognized tier slug → fall back to the normal page content.
if (!isset($data[$slug]) || !isset($meta[$slug])) {
  while (have_posts()) : the_post(); ?>
    <main id="main" class="page"><div class="container container--narrow"><article class="article-content">
      <h1><?php the_title(); ?></h1><?php the_content(); ?>
    </article></div></main>
  <?php endwhile;
  get_footer();
  return;
}

$m       = $meta[$slug];
$regions = $data[$slug];
$days    = $m['daysLabel'];
$home    = home_url('/');
$tiers   = gf_itinerary_tiers();

/** Tier CTAs resolve through the tier lookup so they never hit a redirect. */
if (!function_exists('gf_itinerary_cta_url')) {
  function gf_itinerary_cta_url($cta) {
    return isset($cta['tier']) ? gf_itinerary_tier_url($cta['tier']) : home_url('/' . ltrim($cta['path'], '/'));
  }
}

/** First-city → city-guide photo, mirroring lib/itinerary-images.ts. */
if (!function_exists('gf_itinerary_image')) {
  function gf_itinerary_image($destinations) {
    $parts = preg_split('/[,&\/+]|→|–|—|\band\b/i', $destinations);
    $first = trim($parts[0]);
    if ($first === '') return null;
    $slug = strtolower($first);
    $slug = strtr($slug, array('á'=>'a','à'=>'a','ã'=>'a','â'=>'a','ä'=>'a','é'=>'e','è'=>'e','ê'=>'e','í'=>'i','ì'=>'i','ó'=>'o','ò'=>'o','ô'=>'o','õ'=>'o','ö'=>'o','ú'=>'u','ü'=>'u','ñ'=>'n','ç'=>'c'));
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
    $slug = trim($slug, '-');
    $alias = array('new-york-city' => 'new-york', 'rio-de-janeiro' => 'rio', 'val-d-isere' => 'val-disere');
    if (isset($alias[$slug])) $slug = $alias[$slug];
    if ($slug && file_exists(get_theme_file_path('assets/images/city-guides/' . $slug . '.jpg'))) {
      return '/images/city-guides/' . $slug . '.jpg';
    }
    return null;
  }
}
?>
<main id="main">
  <section class="itin-hero">
    <div class="container">
      <p class="eyebrow"><a href="<?php echo esc_url($home . 'itineraries/'); ?>" style="color:inherit;text-decoration:none;">&larr; All Itineraries</a></p>
      <h1><?php echo esc_html($m['pageTitle']); ?></h1>
      <p class="itin-hero__lead"><?php echo esc_html($m['lead']); ?></p>
      <div class="itin-hero__tiers">
        <?php foreach ($tiers as $tid => $tlabel) :
          $active = ($tid === $slug) ? ' itin-tier-link--active' : ''; ?>
          <a class="itin-tier-link<?php echo $active; ?>" href="<?php echo esc_url(gf_itinerary_tier_url($tid)); ?>"><?php echo esc_html($tlabel); ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <div class="container">
    <?php foreach ($regions as $region) : ?>
      <section class="itin-region">
        <div class="itin-region__header">
          <h2 class="itin-region__name"><?php echo esc_html($region['name']); ?></h2>
          <span class="itin-region__count"><?php echo esc_html($region['countLabel']); ?></span>
        </div>
        <div class="itin-grid">
          <?php foreach ($region['itineraries'] as $it) :
            $img     = gf_itinerary_image($it['destinations']);
            $initial = strtoupper(mb_substr(trim($it['destinations']), 0, 1)); ?>
            <div class="itin-card">
              <?php if ($img) : ?>
                <div class="itin-card__thumb" style="background-image:url('<?php echo esc_url($img); ?>')"></div>
              <?php else : ?>
                <div class="itin-card__thumb itin-card__thumb--placeholder"><span><?php echo esc_html($initial); ?></span></div>
              <?php endif; ?>
              <div class="itin-card__destinations"><?php echo esc_html($it['destinations']); ?></div>
              <div class="itin-card__meta">
                <span class="itin-card__days"><?php echo esc_html($days); ?></span>
                <?php if (!empty($it['bestTime'])) : ?><span class="itin-card__time"><?php echo esc_html($it['bestTime']); ?></span><?php endif; ?>
              </div>
              <p class="itin-card__why"><?php echo esc_html($it['why']); ?></p>
              <div class="itin-card__footer">
                <?php if (!empty($it['available'])) : ?>
                  <span class="itin-card__status itin-card__status--available">Available</span>
                  <a class="itin-card__buy" href="<?php echo esc_url($it['etsyUrl']); ?>" target="_blank" rel="noopener noreferrer">Buy on Etsy &rarr;</a>
                <?php else : ?>
                  <span class="itin-card__status itin-card__status--soon">Coming Soon</span>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>
    <?php endforeach; ?>
  </div>

  <section class="dreaming-cta">
    <div class="container dreaming-cta__inner">
      <div>
        <h3><?php echo esc_html($m['ctaTitle']); ?></h3>
        <p><?php echo esc_html($m['ctaBody']); ?></p>
      </div>
      <?php if (count($m['cta']) > 1) : ?>
        <div style="display:flex;gap:var(--space-sm);flex-wrap:wrap;">
          <?php foreach ($m['cta'] as $a) :
            $cls = ($a['variant'] === 'secondary') ? 'button--secondary' : 'button--primary'; ?>
            <a class="button <?php echo $cls; ?>" href="<?php echo esc_url(gf_itinerary_cta_url($a)); ?>"><?php echo esc_html($a['label']); ?></a>
          <?php endforeach; ?>
        </div>
      <?php else : $a = $m['cta'][0]; ?>
        <a class="button button--primary" href="<?php echo esc_url(gf_itinerary_cta_url($a)); ?>"><?php echo esc_html($a['label']); ?></a>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer();
