<?php
/**
 * Elevate article body: top-10-beaches
 * Extracted verbatim from the old page-top-10-beaches.php so the copy can move into
 * WordPress. Rendered by page-elevate-article.php until the article's page
 * has content of its own; also the source the Elevate seeder captures.
 */
if (!defined('ABSPATH')) exit;

$beaches = array(
  array(
    'num'      => 1,
    'name'     => 'Bondi Beach',
    'location' => 'Sydney, Australia',
    'tagline'  => 'Southern California with a better accent',
    'take'     => 'Iconic. A short drive from downtown Sydney, Bondi feels familiar in the best way. It has the surf, the scene, the cafés, the walk, and the kind of energy that makes it feel like more than just a beach. The sun down under is no joke, but that is part of the deal.',
    'type'     => 'Golden sand, classic surf beach',
    'access'   => 'Easy access from Sydney with parking nearby',
    'crowd'    => 'Popular, lively, and iconic',
    'gear'     => 'Sunscreen, sunglasses, towel, and extra water',
    'scene'    => 'Cafés, restaurants, shops, and the coastal walk',
    'water'    => 'Surf, warm water, and very strong sun',
    'emoji'    => '🏖️',
    'tags'     => array('Golden sand', 'Surf', 'Iconic'),
    'photo'    => '/images/beaches/bondi-beach.jpg',
  ),
  array(
    'num'      => 2,
    'name'     => 'Copacabana Beach',
    'location' => 'Rio de Janeiro, Brazil',
    'tagline'  => 'Energy, chaos, and a beach that feels alive at all hours',
    'take'     => 'Copacabana is not subtle, and that is exactly the point. The beach is loud, social, and constantly moving, with vendors, music, and people filling every stretch of sand. If Bondi feels like a polished version of beach culture, Copacabana is the raw, unfiltered version.',
    'type'     => 'Wide golden sand with strong surf',
    'access'   => 'Easy access with hotels, taxis, and public transit nearby',
    'crowd'    => 'Busy, energetic, and always active',
    'gear'     => 'Chair and umbrella rentals everywhere — vendors bring drinks to your spot',
    'scene'    => 'Hotels, bars, restaurants, and the iconic promenade',
    'water'    => 'Strong waves, better for quick dips than long swims',
    'emoji'    => '🌊',
    'tags'     => array('Wide sand', 'Energetic', 'Always active'),
    'photo'    => '/images/beaches/copacabana-beach.jpg',
  ),
  array(
    'num'      => 3,
    'name'     => 'Cala Figuera',
    'location' => 'Mallorca, Spain',
    'tagline'  => 'A rocky cove that rewards the effort',
    'take'     => 'Cala Figuera is not the beach you wander onto by accident, and that is part of why it works. It feels more like finding a pocket of Mallorca than checking off a beach day. The rocky setting, clear water, and slightly harder access make it feel more memorable than easy.',
    'type'     => 'Rocky cove with clear blue water',
    'access'   => 'Requires a 30-minute walk down, but the setting makes it worth it',
    'crowd'    => 'Popular, but still feels tucked away',
    'gear'     => 'Bring your own towel, water, snacks, and shoes you can walk in',
    'scene'    => 'Minimal nearby — which is part of the appeal',
    'water'    => 'Clear, dramatic water with a rocky entry',
    'emoji'    => '🏔️',
    'tags'     => array('Rocky cove', '30-min hike', 'Clear water'),
    'photo'    => '/images/beaches/cala-figuera.jpg',
  ),
  array(
    'num'      => 4,
    'name'     => 'Praia da Ursa',
    'location' => 'Sintra, Portugal',
    'tagline'  => 'Raw, dramatic, and worth every step down',
    'take'     => 'Praia da Ursa feels like the edge of the world. The hike down keeps most people away, and what you are left with is a raw, dramatic stretch of coastline that feels untouched. Its seclusion is a fantastic reward for a hike that feels earned.',
    'type'     => 'Golden sand with towering rock formations',
    'access'   => 'Steep hike down, requiring good footing and effort',
    'crowd'    => 'Secluded, with fewer crowds due to the hike',
    'gear'     => 'No facilities — bring water, snacks, and sturdy shoes',
    'scene'    => 'Nothing nearby — fully natural and untouched',
    'water'    => 'Cold Atlantic water, strong waves, dramatic scenery',
    'emoji'    => '🌅',
    'tags'     => array('Rock formations', 'Steep hike', 'Secluded'),
    'photo'    => '/images/beaches/praia-da-ursa.jpg',
  ),
  array(
    'num'      => 5,
    'name'     => 'Cala Brandinchi',
    'location' => 'Sardinia, Italy',
    'tagline'  => 'Caribbean water with an Italian accent',
    'take'     => 'Cala Brandinchi is the kind of beach that makes you question whether you accidentally flew to the Caribbean instead of Italy. The water is shallow, bright, and almost unfairly pretty. It can get crowded, but the color of the water does enough heavy lifting to make it worth it.',
    'type'     => 'Soft white sand with shallow turquoise water',
    'access'   => 'Easy by car, but parking may require planning in peak season',
    'crowd'    => 'Popular and busy, especially in summer',
    'gear'     => 'Bring sunscreen and a towel — chair rentals may be available nearby',
    'scene'    => 'Beach clubs, casual food, relaxed Sardinian summer feel',
    'water'    => 'Calm, shallow, crystal-clear water made for floating',
    'emoji'    => '🏝️',
    'tags'     => array('Turquoise', 'White sand', 'Calm water'),
    'photo'    => '/images/beaches/cala-brandinchi.jpg',
  ),
  array(
    'num'      => 6,
    'name'     => 'Playa El Bollullo',
    'location' => 'Tenerife, Spain',
    'tagline'  => 'Wild, volcanic, and just enough effort to feel earned',
    'take'     => 'Playa El Bollullo feels like a different side of Tenerife. The black sand, cliffs, and stronger waves give it a more rugged, natural energy. It is just enough effort to get to that it feels earned, but still easy enough to go back again.',
    'type'     => 'Black volcanic sand with dramatic cliffs',
    'access'   => 'Short walk down from parking, slightly uneven but manageable',
    'crowd'    => 'Balanced — popular but never overwhelming',
    'gear'     => 'Small beach bar on site — bring a towel and sandals for the hot sand',
    'scene'    => 'Quiet and natural with minimal development beyond the beach bar',
    'water'    => 'Strong Atlantic waves with deep water and a rugged feel',
    'emoji'    => '🌋',
    'tags'     => array('Black sand', 'Cliffs', 'Atlantic waves'),
    'photo'    => '/images/beaches/playa-el-bollullo.jpg',
  ),
  array(
    'num'      => 7,
    'name'     => 'Huntington Beach',
    'location' => 'California, USA',
    'tagline'  => 'Classic surf culture with room to breathe',
    'take'     => 'Huntington Beach feels like the blueprint for West Coast beach culture. It is wide, easy, and built for spending a full day outside — whether you are surfing, walking the pier, or sitting with a drink watching everything move around you.',
    'type'     => 'Wide sandy beach with consistent surf',
    'access'   => 'Easy access with parking, bike paths, and direct beachfront entry',
    'crowd'    => 'Busy near the pier, quieter as you move away',
    'gear'     => 'Bathrooms and rentals nearby — bring a towel, sunscreen, and something for the breeze',
    'scene'    => 'Pier, bars, restaurants, and a strong surf-town feel',
    'water'    => 'Cool Pacific water with steady waves and consistent wind',
    'emoji'    => '🤙',
    'tags'     => array('Wide sand', 'Surf culture', 'Pier'),
    'photo'    => '/images/beaches/huntington-beach.jpg',
  ),
  array(
    'num'      => 8,
    'name'     => 'Plaža Kašjuni',
    'location' => 'Split, Croatia',
    'tagline'  => 'Clear water, pine trees, and a laid-back Croatian vibe',
    'take'     => 'Plaža Kašjuni strikes a perfect balance between accessibility and atmosphere. Close enough to Split to be easy, but far enough to feel like an escape. The clear water, shaded areas from the trees, and relaxed energy make it an easy place to spend a full afternoon.',
    'type'     => 'Pebble beach with crystal-clear water',
    'access'   => 'Easy access by car, taxi, or a short ride from Split',
    'crowd'    => 'Popular but more relaxed than beaches closer to the city center',
    'gear'     => 'Beach bar and rentals available — bring water shoes for the pebbles',
    'scene'    => 'Beach clubs, bars, and a quieter coastal setting backed by pine trees',
    'water'    => 'Clear, calm water with excellent visibility',
    'emoji'    => '⛵',
    'tags'     => array('Pebble', 'Crystal clear', 'Pine trees'),
    'photo'    => '/images/beaches/plaza-kasjuni.jpg',
  ),
  array(
    'num'      => 9,
    'name'     => 'Plage de Carras',
    'location' => 'Nice, France',
    'tagline'  => 'Riviera sun, cold drinks, and a different kind of beach day',
    'take'     => 'Plage de Carras is a reminder that not every great beach needs soft sand. The pebbles take a minute to adjust to, but the water, the light, and the Riviera setting make up for it quickly. It is less about laying out for hours and more about dipping in, grabbing a drink, and enjoying the atmosphere.',
    'type'     => 'Pebble beach with deep blue water',
    'access'   => 'Easy access along the Promenade des Anglais',
    'crowd'    => 'Busy in summer but more relaxed than central beach clubs',
    'gear'     => 'Bring a towel and water shoes — rentals and food options available nearby',
    'scene'    => 'Promenade, cafés, beach bars, and classic Riviera energy',
    'water'    => 'Clear, deep water with a quick drop-off and refreshing temperature',
    'emoji'    => '🥂',
    'tags'     => array('Riviera', 'Pebble', 'Promenade'),
    'photo'    => '/images/beaches/plage-de-carras.jpg',
  ),
  array(
    'num'      => 10,
    'name'     => 'Clearwater Beach',
    'location' => 'Florida, USA',
    'tagline'  => 'Easy, soft, and built for doing nothing all day',
    'take'     => 'Clearwater Beach is as easy as it gets. The sand is soft, the water is warm, and everything you need is right there. It is not trying to be hidden or dramatic — it is built for relaxing, grabbing a drink, and staying longer than you planned.',
    'type'     => 'Powdery white sand with wide, flat shoreline',
    'access'   => 'Very easy access with parking, hotels, and direct beach entry',
    'crowd'    => 'Busy, especially during peak season and weekends',
    'gear'     => 'Chair and umbrella rentals available — bring sunscreen and something for shade',
    'scene'    => 'Restaurants, bars, and a lively boardwalk-style beach town',
    'water'    => 'Calm, warm Gulf water with gentle waves',
    'emoji'    => '☀️',
    'tags'     => array('White sand', 'Warm Gulf', 'Easy access'),
    'photo'    => '/images/beaches/clearwater-beach.jpg',
  ),
);

$first = $beaches[0];
?>
  <section class="beaches-page-hero">
    <div class="container">
      <p class="eyebrow">
        <a href="<?php echo esc_url( home_url('/elevate-your-travel/') ); ?>" style="color:inherit;text-decoration:none;">← Elevate Your Travel</a>
      </p>
      <h1>My Top Beaches Around the World</h1>
      <p>
        The beaches that stay with you are not always the easiest ones to get to. Some are polished and effortless,
        others feel earned. This list is a mix of both.
      </p>
    </div>
  </section>

  <div class="container">
    <article class="beach-feature" id="beach-featured">
      <div class="beach-feature__media">
        <div
          class="beach-feature__img bg-1"
          id="beach-bg"
          <?php echo $first['photo'] ? 'style="background-image: url(\'' . $first['photo'] . '\')"' : ''; ?>
        ></div>
        <span class="beach-feature__badge" id="bf-rank">No. <?php echo $first['num']; ?></span>
        <div class="beach-feature__caption">
          <h2 class="beach-feature__name" id="bf-name"><?php echo $first['name']; ?></h2>
          <p class="beach-feature__location" id="bf-location"><?php echo $first['location']; ?></p>
        </div>
      </div>
      <div class="beach-feature__content" id="bf-content">
        <p class="beach-feature__tagline" id="bf-tagline"><?php echo $first['tagline']; ?></p>
        <p class="beach-feature__take" id="bf-take"><?php echo $first['take']; ?></p>
        <div class="beach-feature__stats">
          <div class="bf-stat"><h4>Beach Type</h4><p id="s-type"><?php echo $first['type']; ?></p></div>
          <div class="bf-stat"><h4>Access</h4><p id="s-access"><?php echo $first['access']; ?></p></div>
          <div class="bf-stat"><h4>Crowd Level</h4><p id="s-crowd"><?php echo $first['crowd']; ?></p></div>
          <div class="bf-stat"><h4>Setup &amp; Gear</h4><p id="s-gear"><?php echo $first['gear']; ?></p></div>
          <div class="bf-stat"><h4>Nearby Scene</h4><p id="s-scene"><?php echo $first['scene']; ?></p></div>
          <div class="bf-stat"><h4>Water &amp; Conditions</h4><p id="s-water"><?php echo $first['water']; ?></p></div>
        </div>
      </div>
    </article>

    <div class="beach-ranked-list" id="beach-ranked-list">
      <?php foreach ( $beaches as $index => $beach ) : ?>
        <div class="beach-rank-item<?php echo $index === 0 ? ' is-active' : ''; ?>" data-index="<?php echo $index; ?>">
          <div class="bri-num"><?php echo $beach['num']; ?></div>
          <div class="bri-thumb">
            <div
              class="bri-thumb__bg th-<?php echo $beach['num']; ?>"
              <?php echo $beach['photo'] ? 'style="background-image: url(\'' . $beach['photo'] . '\')"' : ''; ?>
            ></div>
            <?php if ( empty( $beach['photo'] ) ) : ?>
              <div class="bri-thumb__emoji"><?php echo $beach['emoji']; ?></div>
            <?php endif; ?>
          </div>
          <div class="bri-body">
            <div class="bri-name"><?php echo $beach['name']; ?></div>
            <div class="bri-location"><?php echo $beach['location']; ?></div>
            <div class="bri-tagline"><?php echo $beach['tagline']; ?></div>
          </div>
          <div class="bri-tags">
            <?php foreach ( $beach['tags'] as $tag ) : ?>
              <span class="bri-tag"><?php echo $tag; ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <section class="dreaming-cta">
    <div class="container dreaming-cta__inner">
      <div>
        <h3>Chasing the next one?</h3>
        <p>These ten stuck. The city guides go deeper on where to stay, eat, and spend the days around them.</p>
      </div>
      <a class="button button--primary" href="<?php echo esc_url( home_url('/city-guides/') ); ?>">Explore the City Guides</a>
    </div>
  </section>
<script>
  const beaches = <?php echo json_encode( $beaches, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>;

  let currentIndex = 0;

  function selectBeach(index) {
    if (index === currentIndex) return;
    const b = beaches[index];

    document.querySelectorAll(".beach-rank-item").forEach((el, i) => {
      el.classList.toggle("is-active", i === index);
    });

    const bg = document.getElementById("beach-bg");
    if (bg) {
      bg.className = "beach-feature__img bg-" + (index + 1);
      bg.style.backgroundImage = b.photo ? `url('${b.photo}')` : "";
    }

    const content = document.getElementById("bf-content");
    if (content) {
      content.classList.remove("animating");
      void content.offsetWidth;
      content.classList.add("animating");
    }

    const setText = (id, value) => {
      const el = document.getElementById(id);
      if (el) el.textContent = value;
    };

    setText("bf-rank", `No. ${b.num}`);
    setText("bf-name", b.name);
    setText("bf-location", b.location);
    setText("bf-tagline", b.tagline);
    setText("bf-take", b.take);
    setText("s-type", b.type);
    setText("s-access", b.access);
    setText("s-crowd", b.crowd);
    setText("s-gear", b.gear);
    setText("s-scene", b.scene);
    setText("s-water", b.water);

    document.getElementById("beach-featured")?.scrollIntoView({ behavior: "smooth", block: "nearest" });
    currentIndex = index;
  }

  document.querySelectorAll(".beach-rank-item").forEach((el, i) => {
    el.addEventListener("click", () => selectBeach(i));
  });
</script>
