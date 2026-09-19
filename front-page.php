<?php
/**
 * Front page (home) — ported from the Astro index.astro.
 */
get_header();
$home = home_url('/');
?>
<main id="main" class="home">
  <section class="hero">
    <div class="hero__bg"></div>
    <div class="hero__scrim"></div>
    <div class="container hero__inner">
      <div class="hero__body">
        <p class="eyebrow">Globe &amp; Frame</p>
        <h1>Plan better trips with guides built from real experience.</h1>
        <p class="hero__lead">
          Thoughtful itineraries, honest city breakdowns, and the places that define the experience. Start with a
          destination, or tell me where you want to go and I'll build the plan for you.
        </p>
        <div class="hero-ctas">
          <a class="button button--primary" href="<?php echo esc_url($home . 'custom-inquiry/'); ?>">Plan a Custom Trip</a>
          <a class="button button--ghost" href="<?php echo esc_url($home . 'city-guides/'); ?>">Browse City Guides</a>
          <a class="button button--ghost" href="<?php echo esc_url($home . 'itineraries/'); ?>">Ready-Made Itineraries</a>
        </div>
      </div>
    </div>
  </section>

  <section class="custom-pitch">
    <div class="container custom-pitch__inner">
      <div>
        <div class="custom-pitch__label">Custom Trip Planning</div>
        <h2>Trips built around how you actually travel.</h2>
        <p class="custom-pitch__body">
          Share your destination, how long you have, and the kind of trip you're after. I'll build the plan — as
          detailed or as loose as you need it. Built from 30+ countries of real experience, not a template.
        </p>
        <div class="custom-pitch__details">
          <div class="custom-pitch__detail"><span class="custom-pitch__detail-label">Destination</span><span class="custom-pitch__detail-value">Anywhere</span></div>
          <div class="custom-pitch__detail"><span class="custom-pitch__detail-label">Trip length</span><span class="custom-pitch__detail-value">Your call</span></div>
          <div class="custom-pitch__detail"><span class="custom-pitch__detail-label">Level of detail</span><span class="custom-pitch__detail-value">As much as you want</span></div>
          <div class="custom-pitch__detail"><span class="custom-pitch__detail-label">Built from</span><span class="custom-pitch__detail-value">Real experience</span></div>
        </div>
      </div>
      <div class="custom-pitch__cta">
        <a class="button button--primary" href="<?php echo esc_url($home . 'custom-inquiry/'); ?>">Get Started</a>
      </div>
    </div>
  </section>

  <section class="explore">
    <div class="container">
      <h2 class="section__title">Explore Globe &amp; Frame</h2>
      <div class="explore-grid">
        <a class="explore-card explore-card--featured" href="<?php echo esc_url($home . 'custom-inquiry/'); ?>">
          <?php echo gf_img('/images/city-guides/venice.jpg', 'Venice', array('class' => 'explore-card__bg')); ?>
          <span class="explore-card__overlay"></span>
          <span class="explore-card__body">
            <h3>Custom Trip Planning</h3>
            <p>Tell me your destination, travel style, and how long you have. I'll build a day-by-day plan around the experience you're looking for — restaurants, sights, pacing, and what to skip.</p>
          </span>
        </a>
        <a class="explore-card" href="<?php echo esc_url($home . 'city-guides/'); ?>">
          <?php echo gf_img('/images/city-guides/tokyo.jpg', 'Tokyo', array('class' => 'explore-card__bg')); ?>
          <span class="explore-card__overlay"></span>
          <span class="explore-card__body">
            <h3>Explore Destinations</h3>
            <p>Start with city guides shaped by the places, people, and experiences that stay with you. <?php echo esc_html(gf_city_guide_summary()); ?></p>
          </span>
        </a>
        <a class="explore-card" href="<?php echo esc_url($home . 'itineraries/'); ?>">
          <?php echo gf_img('/images/city-guides/rome.jpg', 'Rome', array('class' => 'explore-card__bg')); ?>
          <span class="explore-card__overlay"></span>
          <span class="explore-card__body">
            <h3>Ready-Made Itineraries</h3>
            <p>Use ready-made itineraries to bring your trip together with more clarity, confidence, and room to enjoy it.</p>
          </span>
        </a>
        <a class="explore-card" href="<?php echo esc_url($home . 'elevate-your-travel/'); ?>">
          <?php echo gf_img('/images/city-guides/rio.jpg', 'Rio de Janeiro', array('class' => 'explore-card__bg')); ?>
          <span class="explore-card__overlay"></span>
          <span class="explore-card__body">
            <h3>Elevate Your Travel</h3>
            <p>Jet lag strategy, business class decisions, packing systems, and how to plan a trip that actually works.</p>
          </span>
        </a>
      </div>
    </div>
  </section>

  <section class="why">
    <div class="container">
      <h2 class="section__title">Why Globe &amp; Frame</h2>
      <p class="section__intro">
        Most travel content tells you what exists. We tell you what's worth experiencing. Every guide is built from real
        experience — structured so you can actually use it.
      </p>
      <div class="why-points">
        <div class="why-point"><span class="why-point__num">01</span><h3>Built from real trips</h3><p>Every guide, itinerary, and ranking comes from a place I've actually been — not a template or an aggregator.</p></div>
        <div class="why-point"><span class="why-point__num">02</span><h3>Structured to use</h3><p>Days are paced, meals are picked, and routes make sense — organized so you can act on them, not just read them.</p></div>
        <div class="why-point"><span class="why-point__num">03</span><h3>Honest takes</h3><p>What's worth your time, what to skip, and where the money actually goes. The good and the overrated.</p></div>
      </div>
    </div>
  </section>

  <section class="dreaming-cta">
    <div class="container dreaming-cta__inner">
      <div>
        <h3>Ready to plan your next trip?</h3>
        <p>Tell me where you want to go and I'll build a plan around the experience you're after — any destination, any length, any level of detail.</p>
      </div>
      <a class="button button--primary" href="<?php echo esc_url($home . 'custom-inquiry/'); ?>">Plan a Custom Trip</a>
    </div>
  </section>
</main>
<?php get_footer(); ?>
