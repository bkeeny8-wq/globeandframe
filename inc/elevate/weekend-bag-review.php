<?php
/**
 * Elevate article body: weekend-bag-review
 * Extracted verbatim from the old page-weekend-bag-review.php so the copy can move into
 * WordPress. Rendered by page-elevate-article.php until the article's page
 * has content of its own; also the source the Elevate seeder captures.
 */
if (!defined('ABSPATH')) exit;

$weekend_bags = array(
  array(
    'rank'        => 1,
    'name'        => 'Béis Convertible Weekender',
    'price'       => '$128',
    'rating'      => 'excellent',
    'ratingLabel' => 'Excellent',
    'tagline'     => 'The Mary Poppins bag, but actually built for travel',
    'durability'  => 'Highly durable with thoughtful compartments and easy access throughout',
    'usability'   => 'Flexible, personal-item friendly, and easy to travel with',
    'take'        => 'The Mary Poppins bag. When you open the top, it feels like the suitcase Mary Poppins lugs around pulling out lampshades. It has room for shoes, a separate laptop compartment with a leather sleeve, and easy access to everything you need mid-flight. It also collapses well when you need it to squeeze under a seat, which is a huge advantage when you are pushing airline limits. It may draw a bit more attention than a smaller weekend bag, but the versatility more than makes up for it. At under $200, it was not even a close competition.',
    'photo'       => '/images/weekend-bags/beis-convertible-weekender.jpg',
  ),
  array(
    'rank'        => 2,
    'name'        => 'Lo & Sons Catalina Deluxe',
    'price'       => '$215',
    'rating'      => 'verygood',
    'ratingLabel' => 'Very Good',
    'tagline'     => 'A polished weekender with a genuinely useful shoe compartment',
    'durability'  => 'Strong construction with smart packing separation',
    'usability'   => 'Easy to pack, though slightly less convenient in transit',
    'take'        => 'I had high hopes for this bag, and it mostly lived up to expectations. The shoe compartment underneath the rest of the bag is genuinely useful, and I liked it much more than a side shoe pocket. It feels like a proper weekend bag without becoming ridiculous. It loses the top spot because the Béis bag has better construction, more features, and better access while moving through an airport. Still, this is a very strong option.',
    'photo'       => '/images/weekend-bags/lo-and-sons-catalina-deluxe.jpg',
  ),
  array(
    'rank'        => 3,
    'name'        => 'Stubble & Co The Weekender',
    'price'       => '$235',
    'rating'      => 'verygood',
    'ratingLabel' => 'Very Good',
    'tagline'     => 'A cleaner, more rugged weekender with real travel versatility',
    'durability'  => 'Durable, simple, and easy to work with',
    'usability'   => 'Versatile and travel-friendly, but missing shoe separation',
    'take'        => 'This had many of the same basics as the Monos bag, but the more duffle-like construction and greater versatility made it easier to use. It feels less rigid, more adaptable, and better suited to someone who wants a weekend bag that can handle different kinds of trips. Compared to the top two bags, it loses points for not having a shoe compartment. Still, this is definitely a good men\'s weekend bag.',
    'photo'       => '/images/weekend-bags/stubble-weekender.jpg',
  ),
  array(
    'rank'        => 4,
    'name'        => 'Monos Metro Weekender',
    'price'       => '$250',
    'rating'      => 'good',
    'ratingLabel' => 'Good',
    'tagline'     => 'Massive, structured, and almost too much bag',
    'durability'  => 'Structured and sturdy, but less flexible',
    'usability'   => 'Great capacity, weak personal-item flexibility',
    'take'        => 'This bag is massive. It has space for multiple shoes, fit everything with ease, and is a true weekend bag. If your only goal is packing capacity, it performs well. The problem is that it is so large it could never really be mistaken for a personal item. If I never tried to use this bag as a quasi-personal item, it would rank higher. The rigid construction limits how useful it is once you are actually moving through airports.',
    'photo'       => '/images/weekend-bags/monos-metro-weekender.jpg',
  ),
  array(
    'rank'        => 5,
    'name'        => 'Herschel Novel Duffle',
    'price'       => '$110',
    'rating'      => 'fair',
    'ratingLabel' => 'Fair',
    'tagline'     => 'Affordable and sturdy, but more gym bag than travel system',
    'durability'  => 'Durable enough, but basic organization',
    'usability'   => 'Works for clothes, not ideal for tech or camera gear',
    'take'        => 'It was obvious this was the cheapest bag. That does not make it terrible, but without a laptop compartment and with its basic construction, it feels more like a gym bag than a suitcase. It could not hold my laptop or camera in a way that made sense. Unlike the lower-ranked bags, it did fit all the clothing. Side note: I think the Herschel Novel Duffle Tech is likely a much better weekend bag.',
    'photo'       => '/images/weekend-bags/herschel-novel-duffle.jpg',
  ),
  array(
    'rank'        => 6,
    'name'        => 'Away Weekender',
    'price'       => '$245',
    'rating'      => 'poor',
    'ratingLabel' => 'Poor',
    'tagline'     => 'The replacement bag that made me miss the old one',
    'durability'  => 'Acceptable build, frustrating compartment layout',
    'usability'   => 'Hard to access and smaller in practice than expected',
    'take'        => 'The bag that needed replacing was a former design of the Away Weekender. This new version is atrocious. It scores better than the July bag because it at least fit some clothes, but the split design makes the middle hard to access mid-flight. The compartment is too small, and there is not a good place for shoes. Even with more space than the July bag, it still barely fit two summer outfits.',
    'photo'       => '/images/weekend-bags/away-weekender.jpg',
  ),
  array(
    'rank'        => 7,
    'name'        => 'July Carry All Weekender',
    'price'       => '$195',
    'rating'      => 'poor',
    'ratingLabel' => 'Poor',
    'tagline'     => 'More purse than overnight bag',
    'durability'  => 'Decent build, but almost no useful organization',
    'usability'   => 'Too small to function as a real weekend bag',
    'take'        => 'This bag was terrible. It was more of a purse than an overnight bag. It would hold maybe a T-shirt and a pair of shorts at most, with no extra compartments of any kind. Maybe the larger version works better, but this one is not it.',
    'photo'       => '/images/weekend-bags/july-carry-all-weekender.jpg',
  ),
);

$review_criteria = array(
  array(
    'name'        => 'Capacity',
    'description' => 'Three days of clothing, shoes, a laptop, and a camera. No capacity, no chance.',
  ),
  array(
    'name'        => 'Durability',
    'description' => 'Built to handle overhead bins, car trunks, and real travel wear.',
  ),
  array(
    'name'        => 'Access',
    'description' => 'Easy to grab essentials mid-flight. This matters more than you think.',
  ),
  array(
    'name'        => 'Usability',
    'description' => 'Can it function as a personal item when needed? This is where most bags fail.',
  ),
  array(
    'name'        => 'Cost',
    'description' => 'Under $300. Spending more for something getting thrown around did not make sense.',
  ),
);
?>
    <section class="review-hero">
      <div class="container">
        <p class="eyebrow">
          <a href="<?php echo esc_url( home_url('/elevate-your-travel/') ); ?>" style="color:inherit;text-decoration:none;">← Elevate Your Travel</a>
        </p>
        <h1>My Favorite Weekend Bags</h1>
        <p class="review-hero__lead">
          I ordered 7 bags. One stood above the rest, the remaining were sent back. Every bag had to handle
          the same setup: a true weekend load plus everything I carry on a long-haul flight.
        </p>
      </div>
    </section>

    <div class="container">
      <div class="review-criteria">
        <h2>What Actually Matters</h2>
        <div class="review-criteria-grid">
          <?php foreach ( $review_criteria as $criterion ) : ?>
            <div class="review-criterion">
              <span class="review-criterion__name"><?php echo $criterion['name']; ?></span>
              <span class="review-criterion__desc"><?php echo $criterion['description']; ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="review-section-header">
        <h2>The Rankings</h2>
        <span>7 bags tested</span>
      </div>

      <div class="bag-rankings">
      <?php foreach ( $weekend_bags as $bag ) : ?>
        <div class="bag-card bag-card--photo">
          <div class="bag-card__rank"><?php echo $bag['rank']; ?></div>
          <div class="bag-card__media">
            <img
              class="bag-card__img"
              src="<?php echo $bag['photo']; ?>"
              alt="<?php echo esc_attr( $bag['name'] ); ?>"
              width="320"
              height="240"
              loading="lazy"
            />
          </div>
          <div class="bag-card__body">
            <div class="bag-card__header">
              <div class="bag-card__name"><?php echo $bag['name']; ?></div>
              <div class="bag-card__meta">
                <span class="bag-card__price"><?php echo $bag['price']; ?></span>
                <span class="bag-card__rating rating--<?php echo $bag['rating']; ?>"><?php echo $bag['ratingLabel']; ?></span>
              </div>
            </div>
            <p class="bag-card__tagline"><?php echo $bag['tagline']; ?></p>
            <div class="bag-card__fields">
              <div class="bag-field">
                <span class="bag-field__label">Durability</span>
                <span class="bag-field__value"><?php echo $bag['durability']; ?></span>
              </div>
              <div class="bag-field">
                <span class="bag-field__label">Usability</span>
                <span class="bag-field__value"><?php echo $bag['usability']; ?></span>
              </div>
            </div>
            <div class="bag-card__take">
              <div class="bag-card__take-label">My Take</div>
              <?php echo $bag['take']; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>

    <section class="dreaming-cta">
      <div class="container dreaming-cta__inner">
        <div>
          <h3>Everything else that goes in the bag.</h3>
          <p>
            Amenity kit, snack box, and the gear worth packing — built from what actually works on a
            long-haul flight.
          </p>
        </div>
        <a class="button button--primary" href="<?php echo esc_url( home_url('/elevate-your-travel/') ); ?>">Back to Elevate Your Travel</a>
      </div>
    </section>
