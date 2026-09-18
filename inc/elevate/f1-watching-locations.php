<?php
/**
 * Elevate article body: f1-watching-locations
 * Extracted verbatim from the old page-f1-watching-locations.php so the copy can move into
 * WordPress. Rendered by page-elevate-article.php until the article's page
 * has content of its own; also the source the Elevate seeder captures.
 */
if (!defined('ABSPATH')) exit;

$f1_continents = array(
	array(
		'name'  => 'Europe',
		'count' => '4 locations',
		'tbd'   => false,
		'locations' => array(
			array(
				'city'        => 'London',
				'venue'       => 'The Court',
				'description' => 'Packed, loud, and exactly what you want when the race is on. This is the kind of spot where F1 feels like an event, not background noise.',
			),
			array(
				'city'        => 'Paris',
				'venue'       => 'The Long Hop',
				'description' => 'Reliable and easy. A good place when you want the race on without spending half the afternoon hunting for a screen.',
			),
			array(
				'city'        => 'Rome',
				'venue'       => 'Finnegan Irish Pub',
				'description' => 'A practical race-day pub in a city where finding the exact sport you want can sometimes take effort.',
			),
			array(
				'city'        => 'Split',
				'venue'       => 'Harat\'s Irish Pub',
				'description' => 'More functional than fancy, but useful when you want a straightforward place to catch a race while traveling.',
			),
		),
	),
	array(
		'name'  => 'North America',
		'count' => '3 locations',
		'tbd'   => false,
		'locations' => array(
			array(
				'city'        => 'New York',
				'venue'       => 'Féile — Midtown South',
				'description' => 'One of the better NYC setups. Early races feel intentional here, with screens, fans, and enough energy to make the alarm worth it.',
			),
			array(
				'city'        => 'New York',
				'venue'       => 'Bailey\'s — Upper East Side',
				'description' => 'A neighborhood option for when you want the race without turning it into a full production.',
			),
			array(
				'city'        => 'San Diego',
				'venue'       => 'Shakespeare\'s Pub',
				'description' => 'A natural fit for international sports. Easy, casual, and reliable enough when you are watching from the West Coast.',
			),
		),
	),
	array(
		'name'  => 'Africa',
		'count' => '1 location',
		'tbd'   => false,
		'locations' => array(
			array(
				'city'        => 'Cape Town',
				'venue'       => 'The Fireman\'s Arms',
				'description' => 'A proper sports pub setup in a great travel city. Familiar, easy, and exactly the type of place you hope to find when a race is on.',
			),
		),
	),
	array(
		'name'  => 'South America',
		'count' => 'Coming soon',
		'tbd'   => true,
		'locations' => array(),
	),
	array(
		'name'  => 'Asia',
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
        <h1>Where to Watch F1 While Traveling</h1>
        <p class="dir-hero__lead">
          Sometimes when you are traveling, it is nice to keep a few familiar rituals. For me, that is Formula 1. It has
          become one of the easiest ways to meet people on the road — a natural connection with others who are tuned into
          the same race. This is a running list of F1-friendly spots I have found while traveling.
        </p>
      </div>
    </section>

    <div class="container">
      <?php foreach ( $f1_continents as $continent ) : ?>
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
          <h3>Know a great spot?</h3>
          <p>
            This list grows as I travel. If you have found a good place to watch F1 somewhere in the world, I'd
            genuinely like to hear about it.
          </p>
        </div>
        <a class="button button--primary" href="mailto:bkeeny8@gmail.com?subject=F1%20Spot%20Recommendation">
          Send a recommendation
        </a>
      </div>
    </section>
