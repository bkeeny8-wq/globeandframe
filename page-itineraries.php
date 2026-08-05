<?php
/**
 * Itineraries hub — ported from the Astro itineraries/index.astro.
 * Tier detail pages + WooCommerce products come in the commerce phase.
 */
get_header();
$home = home_url('/');
?>
<main id="main">
  <section class="itin-hero">
    <div class="container">
      <p class="eyebrow">Globe &amp; Frame</p>
      <h1>Itineraries</h1>
      <p class="itin-hero__lead">
        Structured trips built from real experience — one city done well, two-city regional pairs, or a broader
        multi-destination route. Every itinerary is available as an instant download.
      </p>
    </div>
  </section>

  <div class="container">
    <div class="itin-tier-grid" style="margin-top:var(--space-lg);">
      <a class="itin-tier-card" href="<?php echo esc_url($home . 'itineraries/3-day/'); ?>">
        <span class="itin-tier-card__days">3</span>
        <span class="itin-tier-card__label">Days — Single City</span>
        <p class="itin-tier-card__desc">One city done well. Built for shorter stays, long weekends, and city breaks where structure matters most.</p>
        <span class="itin-tier-card__cta">Browse 3-day itineraries &rarr;</span>
      </a>
      <a class="itin-tier-card" href="<?php echo esc_url($home . 'itineraries/7-day/'); ?>">
        <span class="itin-tier-card__days">7</span>
        <span class="itin-tier-card__label">Days — Two Cities</span>
        <p class="itin-tier-card__desc">Regional pairings that feel coherent, not stitched together. Two cities connected by how they complement each other.</p>
        <span class="itin-tier-card__cta">Browse 7-day itineraries &rarr;</span>
      </a>
      <a class="itin-tier-card" href="<?php echo esc_url($home . 'itineraries/10-day/'); ?>">
        <span class="itin-tier-card__days">10</span>
        <span class="itin-tier-card__label">Days — Three Cities</span>
        <p class="itin-tier-card__desc">Broader regional routes with enough time to connect multiple destinations without turning the trip into a sprint.</p>
        <span class="itin-tier-card__cta">Browse 10-day itineraries &rarr;</span>
      </a>
    </div>
  </div>

  <section class="dreaming-cta">
    <div class="container dreaming-cta__inner">
      <div>
        <h3>Need something built for you?</h3>
        <p>Tell me where you want to go and I'll build a plan around the experience you're after — any destination, any length, any level of detail.</p>
      </div>
      <div style="display:flex;gap:var(--space-sm);flex-wrap:wrap;">
        <a class="button button--primary" href="<?php echo esc_url($home . 'custom-inquiry/'); ?>">Plan a Custom Trip</a>
        <a class="button button--secondary" href="<?php echo esc_url($home . 'city-guides/'); ?>">Explore City Guides</a>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
