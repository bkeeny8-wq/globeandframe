<?php
/**
 * Elevate Your Travel hub — card-feature grid + row-cards + list-rows linking
 * to all the Elevate articles. Ported from the Astro ElevateLayout page body.
 */
get_header();
?>
<main id="main">
  <section class="page-hero">
    <div class="container page-hero__inner">
      <p class="eyebrow">Go Deeper</p>
      <h1>Elevate Your Travel</h1>
      <p>
        Restaurants, neighborhoods, bars, and the smaller details that give a place its character.
        Practical guides and honest takes built from real experience.
      </p>
    </div>
  </section>

  <div class="container">
    <div class="section-block">
      <div class="section-header">
        <div>
          <h2>Destinations &amp; Inspiration</h2>
          <p>Places worth dreaming about, returning to, and experiencing more fully.</p>
        </div>
        <span class="section-count">5 articles</span>
      </div>

      <div class="feature-grid">
        <a class="card-feature card-feature--ocean" href="<?php echo esc_url( home_url('/elevate-your-travel/cities-i-would-visit-again/') ); ?>">
          <div class="card-feature__img" style="background-image: url('/images/city-guides/paris.jpg')"></div>
          <div class="card-feature__overlay"></div>
          <div class="card-feature__body">
            <span class="card-cat">Destinations</span>
            <div class="card-feature__title">Cities I Would Visit Again</div>
            <div class="card-feature__excerpt">
              The cities I would go back to — not because I missed something, but because I know how to be there.
            </div>
            <span class="card-feature__read">Read the guide →</span>
          </div>
        </a>
        <div class="side-stack">
          <a class="card-feature card-feature--sm card-feature--amber" href="<?php echo esc_url( home_url('/elevate-your-travel/where-i-am-dreaming/') ); ?>">
            <div class="card-feature__img" style="background-image: url('/images/dreaming/maldives.jpg')"></div>
            <div class="card-feature__overlay"></div>
            <div class="card-feature__body">
              <span class="card-cat">Inspiration</span>
              <div class="card-feature__title">Where I Am Dreaming</div>
            </div>
          </a>
          <a class="card-feature card-feature--sm card-feature--teal" href="<?php echo esc_url( home_url('/elevate-your-travel/top-10-beaches/') ); ?>">
            <div class="card-feature__img" style="background-image: url('/images/beaches/bondi-beach.jpg')"></div>
            <div class="card-feature__overlay"></div>
            <div class="card-feature__body">
              <span class="card-cat">Beaches</span>
              <div class="card-feature__title">Top 10 Beaches</div>
            </div>
          </a>
        </div>
      </div>

      <div class="row-cards">
        <a class="row-card" href="<?php echo esc_url( home_url('/elevate-your-travel/f1-watching-locations/') ); ?>">
          <div class="row-card__num">01</div>
          <div class="row-card__title">F1 Watching Locations</div>
          <div class="row-card__excerpt">
            A running list of spots I've found while traveling where the race actually feels like an event,
            not background noise.
          </div>
          <span class="row-card__read">Read →</span>
        </a>
        <a class="row-card" href="<?php echo esc_url( home_url('/elevate-your-travel/global-cigar-bars/') ); ?>">
          <div class="row-card__num">02</div>
          <div class="row-card__title">Global Cigar Bars</div>
          <div class="row-card__excerpt">
            Sometimes the best way to slow down while traveling is with a cigar, a drink, and a good place to
            sit for a while.
          </div>
          <span class="row-card__read">Read →</span>
        </a>
        <a class="row-card row-card--cta" href="<?php echo esc_url( home_url('/custom-inquiry/') ); ?>">
          <div class="row-card__num">✦</div>
          <div class="row-card__title">Plan a Custom Trip</div>
          <div class="row-card__excerpt">
            Tell me where you want to go and I'll help you build a plan around the experience you're looking for.
          </div>
          <span class="row-card__read">Get in touch →</span>
        </a>
      </div>
    </div>

    <div class="section-block">
      <div class="section-header">
        <div>
          <h2>Planning &amp; Pacing</h2>
          <p>How to structure a trip so the days actually work.</p>
        </div>
        <span class="section-count">3 articles</span>
      </div>
      <div class="row-cards">
        <a class="card-feature card-feature--ocean" href="<?php echo esc_url( home_url('/elevate-your-travel/how-to-do-3-days/') ); ?>">
          <div class="card-feature__img" style="background-image: url('/images/city-guides/prague.jpg')"></div>
          <div class="card-feature__overlay"></div>
          <div class="card-feature__body">
            <span class="card-cat">Planning</span>
            <div class="card-feature__title">How to Do 3 Days</div>
            <div class="card-feature__excerpt">A simple framework for getting the feel of a city without overcommitting to it.</div>
            <span class="card-feature__read">Read the guide →</span>
          </div>
        </a>
        <a class="card-feature card-feature--dusk" href="<?php echo esc_url( home_url('/elevate-your-travel/booking-to-boarding/') ); ?>">
          <div class="card-feature__img" style="background-image: url('/images/business-class/air-france-1.jpg')"></div>
          <div class="card-feature__overlay"></div>
          <div class="card-feature__body">
            <span class="card-cat">Planning</span>
            <div class="card-feature__title">Booking to Boarding</div>
            <div class="card-feature__excerpt">A planning timeline for making travel feel smoother before you ever leave home.</div>
            <span class="card-feature__read">Read the guide →</span>
          </div>
        </a>
        <a class="card-feature card-feature--slate" href="<?php echo esc_url( home_url('/elevate-your-travel/jet-lag/') ); ?>">
          <div class="card-feature__img" style="background-image: url('/images/city-guides/tokyo.jpg')"></div>
          <div class="card-feature__overlay"></div>
          <div class="card-feature__body">
            <span class="card-cat">Planning</span>
            <div class="card-feature__title">Jet Lag</div>
            <div class="card-feature__excerpt">Jet Lag. 0/10. Would not recommend. 50+ long-haul flights worth of hard-won advice.</div>
            <span class="card-feature__read">Read the guide →</span>
          </div>
        </a>
      </div>
    </div>

    <div class="section-block">
      <div class="section-header">
        <div>
          <h2>Elevate the Journey</h2>
          <p>Small upgrades that make flights and travel days feel more intentional.</p>
        </div>
        <span class="section-count">4 articles</span>
      </div>

      <div class="feature-grid feature-grid--spaced">
        <a class="card-feature card-feature--dusk" href="<?php echo esc_url( home_url('/elevate-your-travel/business-class-rankings/') ); ?>">
          <div class="card-feature__img" style="background-image: url('/images/business-class/singapore-1.jpg')"></div>
          <div class="card-feature__overlay"></div>
          <div class="card-feature__body">
            <span class="card-cat">Reviews</span>
            <div class="card-feature__title">Business Class Rankings</div>
            <div class="card-feature__excerpt">
              A personal look at which business class experiences are actually worth it, and which ones fall short
              of the price.
            </div>
            <span class="card-feature__read">Read the rankings →</span>
          </div>
        </a>
        <div class="side-stack">
          <a class="card-feature card-feature--sm card-feature--slate" href="<?php echo esc_url( home_url('/elevate-your-travel/amenity-kit-diy/') ); ?>">
            <div class="card-feature__img" style="background-image: url('/images/articles/img_0506.jpg')"></div>
            <div class="card-feature__overlay"></div>
            <div class="card-feature__body">
              <span class="card-cat">In-flight</span>
              <div class="card-feature__title">Amenity Kit DIY</div>
            </div>
          </a>
          <a class="card-feature card-feature--sm card-feature--bronze" href="<?php echo esc_url( home_url('/elevate-your-travel/snack-box-diy/') ); ?>">
            <div class="card-feature__img" style="background-image: url('/images/articles/IMG_1777.jpeg')"></div>
            <div class="card-feature__overlay"></div>
            <div class="card-feature__body">
              <span class="card-cat">In-flight</span>
              <div class="card-feature__title">Snack Box DIY</div>
            </div>
          </a>
        </div>
      </div>

      <div class="list-rows">
        <a class="list-row" href="<?php echo esc_url( home_url('/elevate-your-travel/weekend-bag-review/') ); ?>">
          <span class="list-row__num">iv</span>
          <div>
            <div class="list-row__title">Weekend Bag Review</div>
            <div class="list-row__excerpt">
              Breaking a zipper forces your hand. My previous weekend bag had been great — until it wasn't.
            </div>
          </div>
          <span class="list-row__arrow">→</span>
        </a>
      </div>
    </div>
  </div>

  <section class="cta-editorial">
    <div class="container cta-editorial__inner">
      <div>
        <h3>Not sure where to start?</h3>
        <p>
          Tell me what kind of trip you want to take and I'll help you build a plan around the experience you're
          looking for.
        </p>
      </div>
      <a class="button button--primary" href="<?php echo esc_url( home_url('/custom-inquiry/') ); ?>">Plan a Custom Trip</a>
    </div>
  </section>
</main>
<?php get_footer(); ?>
