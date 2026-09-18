<?php
/**
 * City Guide = the city hub. The guide is the pillar; the city's published
 * stories (pulled by the shared "city" tag) list beneath it. Matches the
 * approved IA mockup: Region → City Guide → Stories.
 */
get_header();
while (have_posts()) : the_post();
  $gid       = get_the_ID();
  $country   = get_field('country');
  $hook      = get_field('hook');
  $overview  = get_field('overview');
  $cityName  = get_field('city') ?: get_the_title();
  $rating    = get_field('overallRating');
  $safetyNum = get_field('safetyRating');
  $facts     = array(
    'Days recommended' => get_field('daysRecommended'),
    'Visited'          => get_field('visited'),
    'Overall'          => $rating ? $rating . ' / 5' : '',
    'Safety'           => get_field('safety'),
    'Safety rating'    => $safetyNum ? $safetyNum . ' / 5' : '',
    'Language'         => get_field('language'),
    'Currency'         => get_field('currency'),
    'Cost of a beer'   => get_field('costOfBeer'),
  );
  // Hero photograph: the featured image, else the theme's bundled city photo.
  $heroFallback = has_post_thumbnail() ? '' : gf_city_photo_url($cityName);
  $cityTerms = wp_get_post_terms($gid, 'city', array('fields' => 'ids'));
  $storyTypes = array('beach', 'day_trip', 'neighborhood', 'local_dish', 'market', 'bar', 'walk', 'experience', 'gift', 'mcdonalds');
  $stories = $cityTerms ? new WP_Query(array(
    'post_type' => $storyTypes, 'post_status' => 'publish', 'posts_per_page' => -1,
    'orderby' => 'title', 'order' => 'ASC',
    'tax_query' => array(array('taxonomy' => 'city', 'field' => 'term_id', 'terms' => $cityTerms)),
  )) : null;
?>
<main id="main">
  <section class="cg-hero">
    <div class="container">
      <p class="cg-crumb"><a href="<?php echo esc_url(get_post_type_archive_link('city_guide')); ?>">City Guides</a> · <?php echo esc_html($country); ?></p>
      <h1 class="cg-title"><?php the_title(); ?></h1>
      <?php if ($hook) : ?><p class="cg-hook"><?php echo esc_html($hook); ?></p><?php endif; ?>
    </div>
  </section>

  <?php if (has_post_thumbnail() || $heroFallback) : ?>
    <div class="container">
      <figure class="cg-media">
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail('large', array('class' => 'cg-media__img', 'loading' => 'eager'));
        } else { ?>
          <img class="cg-media__img" src="<?php echo esc_url($heroFallback); ?>" alt="<?php echo esc_attr($cityName); ?>" loading="eager" />
        <?php } ?>
      </figure>
    </div>
  <?php endif; ?>

  <?php if (array_filter($facts)) : ?>
  <div class="cg-facts-outer"><div class="container cg-facts">
    <?php foreach ($facts as $k => $v) : if (!$v) continue; ?>
      <div class="cg-fact"><span class="cg-fact__k"><?php echo esc_html($k); ?></span><span class="cg-fact__v"><?php echo esc_html($v); ?></span></div>
    <?php endforeach; ?>
  </div></div>
  <?php endif; ?>

  <div class="container">
    <article class="article-content" style="margin-top:var(--space-lg)">
      <?php // Row fields go through gf_rows()/gf_row_list_html() so the flattened
            // textareas and the legacy repeater meta both render. ?>
      <?php $inShort = gf_row_list_html('inShort', null, $gid); if ($inShort) : ?>
        <h2>In short</h2>
        <?php echo $inShort; // escaped in the helper ?>
      <?php endif; ?>

      <?php if ($overview) : ?><div class="cg-lead"><?php echo wp_kses_post($overview); ?></div><?php endif; ?>

      <?php // Anything written in the block editor instead of the fields. ?>
      <?php if (!$overview && trim(get_the_content()) !== '') : ?>
        <?php the_content(); ?>
      <?php endif; ?>

      <?php $sights = gf_row_list_html('sights', null, $gid); if ($sights || get_field('whatToSeeIntro')) : ?>
        <h2>What to see</h2>
        <?php echo gf_prose_html(get_field('whatToSeeIntro')); ?>
        <?php echo $sights; // escaped in the helper ?>
      <?php endif; ?>

      <?php $mtd = get_field('mustTryDish'); if ($mtd) : ?><p><strong>Must try:</strong> <?php echo esc_html($mtd); ?><?php $n = get_field('mustTryDishNote'); if ($n) echo ' — ' . esc_html($n); ?></p><?php endif; ?>
      <?php $fd = get_field('foodDrink'); if ($fd) : ?><h2>Where I ate &amp; drank</h2><?php echo wp_kses_post($fd); ?><?php endif; ?>

      <?php $ws = get_field('whereStayed'); $ai = get_field('accommodationIntro'); if ($ws || $ai) : ?>
        <h2>Where I stayed</h2>
        <?php echo gf_prose_html($ai); ?>
        <?php if ($ws) : ?><p><strong><?php echo esc_html($ws); ?>.</strong> <?php echo esc_html(get_field('whereStayedNote')); ?></p><?php endif; ?>
      <?php endif; ?>

      <?php $dayTrips = gf_row_list_html('dayTrips', null, $gid); $dtt = get_field('dayTripsTake'); if ($dayTrips || $dtt) : ?>
        <h2>Day trips</h2>
        <?php echo gf_prose_html($dtt); ?>
        <?php echo $dayTrips; // escaped in the helper ?>
      <?php endif; ?>

      <?php $wbh = get_field('whatToBringHome'); if ($wbh) : ?>
        <h2>What to bring home</h2>
        <?php echo gf_prose_html($wbh); ?>
      <?php endif; ?>

      <?php
      $gettingThere = gf_prose_html(get_field('gettingThereSummary')) . gf_prose_html(get_field('flightIn'));
      $operators    = trim((string) get_field('flightOperators'));
      if ($gettingThere || $operators) : ?>
        <h2>Getting there</h2>
        <?php echo $gettingThere; // escaped in the helper ?>
        <?php if ($operators) : ?>
          <div class="tips-grid">
            <div class="tip-card"><span class="tip-card__label">Flight operators</span><span class="tip-card__text"><?php echo esc_html($operators); ?></span></div>
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <?php
      $gettingAround = gf_prose_html(get_field('gettingAroundSummary')) . gf_prose_html(get_field('movingAround'));
      if ($gettingAround) : ?>
        <h2>Getting around</h2>
        <?php echo $gettingAround; // escaped in the helper ?>
      <?php endif; ?>

      <?php
      // Language, currency and visas: the facts strip carries the one-liners,
      // these are the authored notes behind them.
      $visa  = trim(trim((string) get_field('visaStatus')) . ' ' . trim((string) get_field('visaNote')));
      $notes = array(
        'Language' => trim((string) get_field('languageNote')),
        'Currency' => trim((string) get_field('currencyNote')),
        'Visas'    => $visa,
      );
      if (array_filter($notes)) : ?>
        <h2>Language, currency &amp; visas</h2>
        <div class="tips-grid">
          <?php foreach ($notes as $label => $note) : if ($note === '') continue; ?>
            <div class="tip-card"><span class="tip-card__label"><?php echo esc_html($label); ?></span><span class="tip-card__text"><?php echo esc_html($note); ?></span></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php $ib = get_field('itineraryBlurb'); if ($ib) : ?>
        <div class="cg-cta"><p><?php echo esc_html($ib); ?></p><a class="button button--primary" href="<?php echo esc_url(home_url('/custom-inquiry/')); ?>">Plan this trip</a></div>
      <?php endif; ?>

      <?php $cgLinks = gf_story_links(array('itineraryUrl' => 'Itinerary', 'mapUrl' => 'Map'), $gid); if ($cgLinks) : ?>
        <p class="gf-links">
          <?php foreach ($cgLinks as $l) : ?>
            <a href="<?php echo esc_url($l[1]); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($l[0]); ?> <span aria-hidden="true">&rarr;</span></a>
          <?php endforeach; ?>
        </p>
      <?php endif; ?>

      <?php echo gf_verified_html($gid); ?>
    </article>

    <?php if ($stories && $stories->have_posts()) : ?>
    <section class="cg-stories">
      <div class="cg-stories__head"><h2><?php echo esc_html($cityName); ?>, one story at a time</h2></div>
      <div class="card-grid">
        <?php while ($stories->have_posts()) : $stories->the_post();
          $lbl = get_post_type_object(get_post_type())->labels->singular_name; $h = get_field('hook'); ?>
          <a class="card cg-story" href="<?php the_permalink(); ?>">
            <span class="cg-story__cat"><?php echo esc_html($lbl); ?></span>
            <h3><?php the_title(); ?></h3>
            <?php if ($h) : ?><p><?php echo esc_html($h); ?></p><?php endif; ?>
          </a>
        <?php endwhile; ?>
      </div>
    </section>
    <?php wp_reset_postdata(); endif; ?>
  </div>
</main>

<style>
  .cg-hero{background:var(--color-surface);padding:var(--space-xl) 0 var(--space-md);border-bottom:1px solid var(--color-border)}
  .cg-crumb{font-size:.78rem;color:var(--color-muted);margin:0 0 12px}
  .cg-crumb a{color:var(--color-gold-text);text-decoration:none}
  .cg-title{font-family:var(--font-serif);font-size:clamp(2.4rem,6vw,3.6rem);font-weight:600;color:var(--color-text);line-height:1;margin:0 0 12px}
  .cg-hook{font-size:1.05rem;color:var(--color-muted-mid);max-width:48ch;margin:0}
  .cg-media{margin:var(--space-lg) 0}
  .cg-media__img{display:block;width:100%;aspect-ratio:16/9;object-fit:cover;border-radius:var(--radius);margin:0}
  .cg-facts-outer{background:var(--color-gold)}
  .cg-facts{display:grid;grid-template-columns:repeat(4,1fr)}
  .cg-fact{padding:14px 16px 14px 0;border-right:1px solid rgba(12,32,66,.15)}
  .cg-fact:last-child{border-right:none}
  .cg-fact__k{display:block;font-size:.62rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:rgba(12,32,66,.8);margin-bottom:5px}
  .cg-fact__v{display:block;font-size:.95rem;color:var(--color-navy);font-weight:600;font-family:var(--font-serif)}
  .cg-lead{font-size:1.08rem}
  .cg-cta{margin-top:var(--space-lg);padding:var(--space-md) var(--space-lg);background:var(--color-gold-ghost);border:1px solid var(--color-border-gold);border-radius:var(--radius);display:flex;align-items:center;justify-content:space-between;gap:var(--space-md);flex-wrap:wrap}
  .cg-cta p{margin:0;color:var(--color-text)}
  .cg-stories{padding:var(--space-xl) 0}
  .cg-stories__head h2{font-family:var(--font-serif);font-size:clamp(1.6rem,3vw,2rem);color:var(--color-text);border-bottom:1px solid var(--color-border-gold);padding-bottom:var(--space-sm);margin-bottom:var(--space-lg)}
  .cg-story__cat{display:block;font-size:.6rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--color-gold-text);margin-bottom:6px}
  @media(max-width:640px){
    .cg-facts{grid-template-columns:1fr 1fr}
    .cg-media{margin:var(--space-md) 0}
    .cg-media__img{aspect-ratio:4/3}
  }
</style>
<?php endwhile; get_footer(); ?>
