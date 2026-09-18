<?php
/**
 * Elevate article body: global-cigar-bars
 * Extracted verbatim from the old page-global-cigar-bars.php so the copy can move into
 * WordPress. Rendered by page-elevate-article.php until the article's page
 * has content of its own; also the source the Elevate seeder captures.
 */
if (!defined('ABSPATH')) exit;

$cigar_continents = array(
  array(
    'name'  => 'Europe',
    'count' => '9 locations',
    'tbd'   => false,
    'locations' => array(
      array(
        'city'        => 'London',
        'venue'       => 'Cigars at No. 10',
        'cigars'      => 'Available',
        'foodDrink'   => 'Drinks / Hotel service',
        'vibe'        => 'Upscale',
        'description' => 'A refined London cigar setup with a polished feel. More of a proper experience than just a place to smoke.',
      ),
      array(
        'city'        => 'Athens',
        'venue'       => "Alexander's Cigar Lounge",
        'cigars'      => 'Available',
        'foodDrink'   => 'Drinks',
        'vibe'        => 'Classic lounge',
        'description' => 'A straightforward cigar lounge option in Athens. Comfortable, focused, and easy to build an evening around.',
      ),
      array(
        'city'        => 'Lisbon',
        'venue'       => 'Bairro Alto Hotel Rooftop',
        'cigars'      => 'Allowed',
        'foodDrink'   => 'Food & Drinks',
        'vibe'        => 'Upscale rooftop',
        'description' => 'Less of a cigar lounge and more of a setting. The rooftop atmosphere makes this a strong option when you want a cigar with a view.',
      ),
      array(
        'city'        => 'Paris',
        'venue'       => 'Cubana Café',
        'cigars'      => 'Available',
        'foodDrink'   => 'Food & Drinks',
        'vibe'        => 'Casual',
        'description' => 'A more relaxed Paris option where the experience feels less formal and easier to drop into.',
      ),
      array(
        'city'        => 'Monaco',
        'venue'       => 'Rampoldi',
        'cigars'      => 'Available',
        'foodDrink'   => 'Food & Drinks',
        'vibe'        => 'Upscale',
        'description' => 'A polished Monaco setting where the cigar is part of a broader elevated evening.',
      ),
      array(
        'city'        => 'Rome',
        'venue'       => 'Aleph Hotel',
        'cigars'      => 'Available',
        'foodDrink'   => 'Hotel bar / Drinks',
        'vibe'        => 'Upscale hotel',
        'description' => 'A hotel setting that works well when you want something comfortable, polished, and easy after a day in Rome.',
      ),
      array(
        'city'        => 'Munich',
        'venue'       => 'Hotel Kempinski',
        'cigars'      => 'Available',
        'foodDrink'   => 'Hotel service',
        'vibe'        => 'Upscale hotel',
        'description' => 'A refined hotel option in Munich with the kind of setting that makes a cigar feel like part of the evening.',
      ),
      array(
        'city'        => 'Barcelona',
        'venue'       => 'Estanc Duaso',
        'cigars'      => 'Available',
        'foodDrink'   => 'Limited',
        'vibe'        => 'Cigar shop',
        'description' => 'More cigar-focused than lounge-focused. A useful Barcelona stop if the priority is finding cigars first.',
      ),
      array(
        'city'        => 'Geneva',
        'venue'       => 'Wall Street Café',
        'cigars'      => 'Allowed',
        'foodDrink'   => 'Food & Drinks',
        'vibe'        => 'Casual polished',
        'description' => 'A Geneva option that feels more approachable than overly formal, while still giving you a place to settle in.',
      ),
    ),
  ),
  array(
    'name'  => 'South America',
    'count' => '1 location',
    'tbd'   => false,
    'locations' => array(
      array(
        'city'        => 'Rio de Janeiro',
        'venue'       => 'Esch Café',
        'cigars'      => 'Available',
        'foodDrink'   => 'Food & Drinks',
        'vibe'        => 'Casual lounge',
        'description' => 'An easygoing Rio option where cigars, food, and drinks all fit naturally into the experience.',
      ),
    ),
  ),
  array(
    'name'  => 'North America',
    'count' => '6 locations',
    'tbd'   => false,
    'locations' => array(
      array(
        'city'        => 'New York',
        'venue'       => 'Merchant Cigar Bar',
        'cigars'      => 'Available',
        'foodDrink'   => 'Food & Drinks',
        'vibe'        => 'Upscale',
        'description' => 'One of the better cigar bar experiences in New York. Proper setup, strong atmosphere, and easy to turn into a full night.',
      ),
      array(
        'city'        => 'Charleston',
        'venue'       => 'Charlestowne Tobacco & Wine',
        'cigars'      => 'Available',
        'foodDrink'   => 'Wine / Drinks',
        'vibe'        => 'Relaxed',
        'description' => 'A slower, more relaxed cigar stop that fits the pace of Charleston well.',
      ),
      array(
        'city'        => 'San Diego',
        'venue'       => 'Cuban Cigar Factory',
        'cigars'      => 'Available',
        'foodDrink'   => 'Drinks',
        'vibe'        => 'Casual',
        'description' => 'A cigar-first stop in San Diego. Better for the smoke itself than a long, polished dinner-and-drinks setup.',
      ),
      array(
        'city'        => 'Nashville',
        'venue'       => 'Casa de Montecristo',
        'cigars'      => 'Available',
        'foodDrink'   => 'Drinks',
        'vibe'        => 'Lounge',
        'description' => 'A reliable cigar lounge setup in Nashville with a more dedicated cigar-bar feel.',
      ),
      array(
        'city'        => 'Key West',
        'venue'       => 'Greene Street Cigar',
        'cigars'      => 'Available',
        'foodDrink'   => 'Drinks',
        'vibe'        => 'Casual island',
        'description' => 'A casual Key West cigar stop that fits the island pace. Easy, unfussy, and better as part of a wandering evening.',
      ),
      array(
        'city'        => 'Las Vegas',
        'venue'       => 'Montecristo Cigar Bar',
        'cigars'      => 'Available',
        'foodDrink'   => 'Food & Drinks',
        'vibe'        => 'Upscale lounge',
        'description' => 'A polished Vegas cigar bar with the kind of full-service setup that makes it easy to stay longer than planned.',
      ),
    ),
  ),
  array(
    'name'  => 'Asia',
    'count' => '1 location',
    'tbd'   => false,
    'locations' => array(
      array(
        'city'        => 'Singapore',
        'venue'       => 'Capitol Cigar & Whisky Lounge',
        'cigars'      => 'Available',
        'foodDrink'   => 'Drinks',
        'vibe'        => 'Upscale lounge',
        'description' => 'A refined Singapore cigar lounge that leans into a proper, slower experience. Strong humidor, serious whisky list, and a setting that feels intentional rather than touristy.',
      ),
    ),
  ),
  array(
    'name'  => 'Africa',
    'count' => 'Coming soon',
    'tbd'   => true,
    'locations' => array(),
  ),
);
?>
    <section class="dir-hero">
      <div class="container">
        <p class="eyebrow">
          <a href="<?php echo esc_url( home_url('/elevate-your-travel/') ); ?>" style="color:inherit;text-decoration:none;">← Elevate Your Travel</a>
        </p>
        <h1>Cigar Bars While Traveling</h1>
        <p class="dir-hero__lead">
          Sometimes the best way to slow down while traveling is with a cigar, a drink, and a good place to sit for a
          while. Some places are proper cigar lounges, others are rooftops, cafés, hotels, or bars where the setting
          makes the experience. This is a running list of cigar-friendly spots found while traveling.
        </p>
      </div>
    </section>

    <div class="container">
      <?php foreach ( $cigar_continents as $continent ) : ?>
        <div class="dir-continent">
          <div class="dir-continent__header">
            <h2 class="dir-continent__name"><?php echo $continent['name']; ?></h2>
            <span class="dir-continent__count"><?php echo $continent['count']; ?></span>
          </div>

          <?php if ( ! empty( $continent['tbd'] ) ) : ?>
            <div class="dir-location dir-location--tbd">
              <div class="dir-location__left">
                <div class="dir-location__venue">Still looking for the right spot.</div>
              </div>
            </div>
          <?php else : ?>
            <?php foreach ( $continent['locations'] as $location ) : ?>
              <div class="dir-location">
                <div class="dir-location__left">
                  <div class="dir-location__city"><?php echo $location['city']; ?></div>
                  <div class="dir-location__venue"><?php echo $location['venue']; ?></div>
                </div>
                <div class="dir-location__right">
                  <div class="dir-location__fields">
                    <div class="dir-field">
                      <span class="dir-field__label">Cigars</span>
                      <span class="dir-field__value"><?php echo $location['cigars']; ?></span>
                    </div>
                    <div class="dir-field">
                      <span class="dir-field__label">Food &amp; Drink</span>
                      <span class="dir-field__value"><?php echo $location['foodDrink']; ?></span>
                    </div>
                    <div class="dir-field">
                      <span class="dir-field__label">Vibe</span>
                      <span class="dir-field__value"><?php echo $location['vibe']; ?></span>
                    </div>
                  </div>
                  <p class="dir-location__desc"><?php echo $location['description']; ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>

    <section class="dreaming-cta">
      <div class="container dreaming-cta__inner">
        <div>
          <h3>Know a good spot?</h3>
          <p>
            This list grows as I travel. If you have found a cigar-friendly spot worth knowing about, I'd like to hear
            about it.
          </p>
        </div>
        <a class="button button--primary" href="mailto:bkeeny8@gmail.com?subject=Cigar%20Spot%20Recommendation">
          Send a recommendation
        </a>
      </div>
    </section>
