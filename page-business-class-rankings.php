<?php
/**
 * Business Class Rankings — ported from the Astro
 * elevate-your-travel/business-class-rankings/index.astro.
 * Ranked airline review cards with photo galleries.
 */
get_header();
$home = home_url('/');

$airlineRankings = array(
  array(
    'rank'       => 1,
    'name'       => 'Singapore Airlines',
    'score'      => '9.2',
    'badge'      => 'Top Pick',
    'badgeClass' => 'excellent',
    'route'      => 'Singapore → New York JFK',
    'aircraft'   => 'Airbus A350-900 ULR',
    'flown'      => 'November 2025',
    'bestFor'    => 'Getting to Asia in style',
    'categories' => array(
      array('label' => 'Lounge', 'text' => 'At SIN, the flagship lounge has strong food and drink options with plenty of space. Clean, comfortable, and easy to settle into.'),
      array('label' => 'Seat', 'text' => 'A good seat, not great. The additional bedding is the real highlight and makes a noticeable difference on a flight this long.'),
      array('label' => 'Meals & Drinks', 'text' => 'Excellent pacing throughout the flight with an extremely well curated food and drink selection.'),
      array('label' => 'Amenity Kit', 'text' => 'The weakest part of the experience. Average and feels below what you would expect at this level.'),
      array('label' => 'Service', 'text' => 'Easily the highlight. The crew is attentive throughout, proactively making your bed and keeping service flowing without being intrusive.'),
      array('label' => 'Value', 'text' => '180,000 Chase miles for an 18-hour flight. Strong value given the length of the flight and the level of service.'),
    ),
    'verdict'    => 'A world-renowned product for a reason. From check-in to deplaning, the experience is consistently excellent. The only real miss is the amenity kit, but everything else delivers at a high level and justifies the cost on a flight of this length.',
    'photos'     => array(
      '/images/business-class/singapore-1.jpg',
      '/images/business-class/singapore-2.jpg',
      '/images/business-class/singapore-3.jpg',
    ),
  ),
  array(
    'rank'       => 2,
    'name'       => 'Air France',
    'score'      => '9.0',
    'badge'      => 'Excellent',
    'badgeClass' => 'excellent',
    'route'      => 'NYC → Paris → Marrakech',
    'aircraft'   => 'Airbus A350-1000',
    'flown'      => 'November 2024',
    'bestFor'    => 'Business class points redemptions',
    'categories' => array(
      array('label' => 'Lounge', 'text' => 'At JFK, the lounge felt underwhelming. If you are not checking a bag, the Delta One lounge can meaningfully improve the pre-flight experience.'),
      array('label' => 'Seat', 'text' => 'The A350 product is excellent. Direct aisle access, closing doors, and a clean, modern cabin make it feel private and refined.'),
      array('label' => 'Meals & Drinks', 'text' => 'Authentically French cuisine paired with a strong wine selection. One of the better food and beverage programs in business class.'),
      array('label' => 'Amenity Kit', 'text' => 'Standard kit with socks, dental set, earplugs, and eye mask. Functional, but not a standout.'),
      array('label' => 'Service', 'text' => 'Polished and relaxed. The self-serve drinks concept adds a casual luxury feel that makes the experience more enjoyable.'),
      array('label' => 'Value', 'text' => 'Booked at 35,000 miles plus roughly $200 — one of the best value business class experiences available.'),
    ),
    'verdict'    => 'Air France delivers one of the most complete business class experiences available. The A350 seat, strong food and wine, and polished service set a high bar. Note: the Air France 777 experience is not the same — make sure you are on the A350 before booking.',
    'photos'     => array(
      '/images/business-class/air-france-1.jpg',
      '/images/business-class/air-france-2.jpg',
      '/images/business-class/air-france-3.jpg',
    ),
  ),
  array(
    'rank'       => 3,
    'name'       => 'United Polaris',
    'score'      => '8.7',
    'badge'      => 'Very Good',
    'badgeClass' => 'verygood',
    'route'      => 'Paris → Newark',
    'aircraft'   => 'Boeing 777-200',
    'flown'      => 'November 2024',
    'bestFor'    => 'Consistent product',
    'categories' => array(
      array('label' => 'Lounge', 'text' => 'The Star Alliance lounge at CDG was solid, though not especially memorable. United\'s Polaris lounges are stronger when departing from a United hub.'),
      array('label' => 'Seat', 'text' => 'Reliable and consistent across the wide-body fleet. Not the flashiest seat, but gives you a predictable lie-flat experience.'),
      array('label' => 'Meals & Drinks', 'text' => 'Good enough to keep you satisfied, but not a standout. The drink selection is solid, though the food can feel repetitive.'),
      array('label' => 'Amenity Kit', 'text' => 'Standard and useful. Covers the basics without becoming a major reason to choose the product.'),
      array('label' => 'Service', 'text' => 'Dependable, but not a wow experience. It avoids being disappointing, which matters more than people think on long-haul flights.'),
      array('label' => 'Value', 'text' => 'A strong balance of quality and cost. Rarely the most exciting option, but one of the most predictable.'),
    ),
    'verdict'    => 'United Polaris ranks here because it is consistent. If you want to ensure a reliable experience without researching plane and route differences on every booking, this is a home run.',
    'photos'     => array(
      '/images/business-class/united-polaris-1.jpg',
      '/images/business-class/united-polaris-2.jpg',
      '/images/business-class/united-polaris-3.jpg',
    ),
  ),
  array(
    'rank'       => 4,
    'name'       => 'Delta One',
    'score'      => '7.0',
    'badge'      => 'Good',
    'badgeClass' => 'good',
    'route'      => 'New York JFK → Stockholm',
    'aircraft'   => 'Boeing 767-300',
    'flown'      => 'October 2024',
    'bestFor'    => 'Best lounge experience',
    'categories' => array(
      array('label' => 'Lounge', 'text' => 'The Delta One Lounge at JFK is the highlight. From check-in to security to the lounge itself, the ground experience feels genuinely premium.'),
      array('label' => 'Seat', 'text' => 'The older 767-300 product is the weak point. It feels dated and does not live up to the Delta One name or price.'),
      array('label' => 'Meals & Drinks', 'text' => 'The food and beverage experience needs improvement if Delta wants to compete with stronger international carriers.'),
      array('label' => 'Amenity Kit', 'text' => 'Standard and serviceable, but not enough to lift the overall onboard experience.'),
      array('label' => 'Service', 'text' => 'Fine, but the dated onboard product made it hard for the flight to feel truly elevated.'),
      array('label' => 'Value', 'text' => 'The lounge experience helps, but hard to justify paying for Delta One again on one of the older aircraft products.'),
    ),
    'verdict'    => 'Delta One ranks here because the ground experience is excellent but the onboard product does not match it. The Delta One Lounge at JFK is genuinely impressive, but the older 767-300 seat makes the overall experience feel incomplete. With the right aircraft, Delta could rank higher.',
    'photos'     => array(
      '/images/business-class/delta-one-1.jpg',
      '/images/business-class/delta-one-2.jpg',
      '/images/business-class/delta-one-3.jpg',
    ),
  ),
  array(
    'rank'       => 5,
    'name'       => 'ANA',
    'score'      => '7.0',
    'badge'      => 'Good',
    'badgeClass' => 'good',
    'route'      => 'Chicago → Tokyo',
    'aircraft'   => 'Boeing 777-300',
    'flown'      => 'November 2025',
    'bestFor'    => 'Service and food',
    'categories' => array(
      array('label' => 'Lounge', 'text' => 'Access to the Polaris Lounge in Chicago is a major plus. Strong food, good drinks, and a comfortable space before a long-haul flight.'),
      array('label' => 'Seat', 'text' => 'The older 777 product feels dated and lacks the privacy of newer business class seats. Functional, but clearly behind modern competitors.'),
      array('label' => 'Meals & Drinks', 'text' => 'The Japanese meal option is excellent — thoughtful, well prepared, and a clear step above standard airline food.'),
      array('label' => 'Amenity Kit', 'text' => 'A solid kit with useful items, but not something that stands out compared to top-tier airlines.'),
      array('label' => 'Service', 'text' => 'Exceptional. Attentive, respectful, and consistently thoughtful throughout. One of the best service experiences in business class.'),
      array('label' => 'Value', 'text' => 'Strong on the soft product side, but harder to justify compared to newer seats offered by other airlines.'),
    ),
    'verdict'    => 'ANA stands out for its service and food, both among the best in business class. However, the older seat holds it back from ranking higher. If the hard product matched the soft product, this would be a top-tier experience across the board.',
    'photos'     => array(
      '/images/business-class/ana-1.jpg',
      '/images/business-class/ana-2.jpg',
      '/images/business-class/ana-3.jpg',
    ),
  ),
  array(
    'rank'       => 6,
    'name'       => 'Lufthansa 747-8',
    'score'      => '6.8',
    'badge'      => 'Fair',
    'badgeClass' => 'fair',
    'route'      => 'Newark → Budapest',
    'aircraft'   => 'Boeing 747-8',
    'flown'      => 'June 2026',
    'bestFor'    => '747 nostalgia',
    'categories' => array(
      array('label' => 'Lounge', 'text' => 'Weak for the price point. Better lounges are available for the same money, which makes the pre-flight experience feel behind before boarding even starts.'),
      array('label' => 'Seat', 'text' => 'The upper deck has real novelty, but the 2-2 business class layout feels badly outdated. No direct aisle access is hard to justify when it has become the global standard.'),
      array('label' => 'Meals & Drinks', 'text' => 'The inability to request advance specialty meals is a clear miss, especially compared with stronger long-haul business class products.'),
      array('label' => 'Amenity Kit', 'text' => 'Not a standout and not enough to offset the larger product gaps. The overall experience needs a more serious refresh.'),
      array('label' => 'Service', 'text' => 'The cabin crew was delightful and the clear bright spot of the flight. The people helped, but they could not fully overcome the aging hard product.'),
      array('label' => 'Value', 'text' => '$2,075 bought the novelty of flying one of the last 747s more than a competitive business class experience. I would not choose it again unless the aircraft itself was the point.'),
    ),
    'verdict'    => 'It\'s a novelty at this point. With only a handful of airlines still flying the 747, my window to experience it is closing as these beautiful planes are slowly retired. Onboard, the cabin crew was delightful — but the product gaps are glaring. No advance specialty meals, and a hard product that feels badly outdated. No direct aisle access, which has become the global business-class standard. It\'s all underscored by a weak lounge experience, when far better lounges are available for the same money. The cost here bought a novelty — the aircraft itself — and I doubt these planes will ever get the refurbishment they\'d need to truly shine in their last remaining years.',
    'photos'     => array(
      '/images/business-class/lufthansa-seat.jpg',
      '/images/business-class/lufthansa-suite.jpg',
    ),
  ),
);
?>
<main id="main">
  <section class="review-hero">
    <div class="container">
      <p class="eyebrow">
        <a href="<?php echo esc_url($home . 'elevate-your-travel/'); ?>" style="color:inherit;text-decoration:none;">← Elevate Your Travel</a>
      </p>
      <h1>Business Class Rankings</h1>
      <p class="review-hero__lead">
        A personal look at which business class experiences are actually worth it, and which ones fall short.
        Airlines vary wildly in what they offer — even the same airline can feel different depending on the route
        and aircraft. This is a direct, personal comparison designed to help you figure out when the upgrade
        actually delivers.
      </p>
    </div>
  </section>

  <div class="container">
    <div class="review-section-header">
      <h2>The Rankings</h2>
      <span>6 airlines reviewed</span>
    </div>

    <div class="bag-rankings">
      <?php foreach ($airlineRankings as $airline) : ?>
        <div class="bag-card">
          <div class="bag-card__rank"><?php echo $airline['rank']; ?></div>
          <div class="bag-card__body">
            <div class="bag-card__header">
              <div class="bag-card__name"><?php echo $airline['name']; ?></div>
              <div class="bag-card__meta">
                <div class="airline-score">
                  <span class="airline-score__num"><?php echo $airline['score']; ?></span>
                  <span class="airline-score__denom">/10</span>
                </div>
                <span class="bag-card__rating rating--<?php echo $airline['badgeClass']; ?>"><?php echo $airline['badge']; ?></span>
              </div>
            </div>

            <div class="airline-meta">
              <div class="airline-meta__item">
                <span class="airline-meta__label">Route</span>
                <span class="airline-meta__value"><?php echo $airline['route']; ?></span>
              </div>
              <div class="airline-meta__item">
                <span class="airline-meta__label">Aircraft</span>
                <span class="airline-meta__value"><?php echo $airline['aircraft']; ?></span>
              </div>
              <div class="airline-meta__item">
                <span class="airline-meta__label">Flown</span>
                <span class="airline-meta__value"><?php echo $airline['flown']; ?></span>
              </div>
              <div class="airline-meta__item">
                <span class="airline-meta__label">Best For</span>
                <span class="airline-meta__value"><?php echo $airline['bestFor']; ?></span>
              </div>
            </div>

            <div class="airline-categories">
              <?php foreach ($airline['categories'] as $category) : ?>
                <div class="airline-cat">
                  <span class="airline-cat__label"><?php echo $category['label']; ?></span>
                  <span class="airline-cat__text"><?php echo $category['text']; ?></span>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="bag-card__take">
              <div class="bag-card__take-label">Verdict</div>
              <?php echo $airline['verdict']; ?>
            </div>

            <?php if (!empty($airline['photos'])) : ?>
              <div class="airline-gallery">
                <?php foreach ($airline['photos'] as $photo) : ?>
                  <img
                    class="airline-gallery__img"
                    src="<?php echo $photo; ?>"
                    alt="<?php echo $airline['name']; ?> business class"
                    loading="lazy"
                  />
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <section class="dreaming-cta">
    <div class="container dreaming-cta__inner">
      <div>
        <h3>Worth the upgrade?</h3>
        <p>Depends entirely on the aircraft. Read the jet lag guide for what to look for before you book.</p>
      </div>
      <a class="button button--primary" href="<?php echo esc_url($home . 'elevate-your-travel/jet-lag/'); ?>">Read the Jet Lag Guide</a>
    </div>
  </section>
</main>
<?php get_footer(); ?>
