<?php
/**
 * 404 — honest "page not found", not the "content is on its way" empty state
 * that index.php used to serve for broken links as well as unpublished sections.
 */
get_header();
$home = home_url('/');
$links = array(
  array('label' => 'City Guides',         'url' => get_post_type_archive_link('city_guide'), 'note' => 'Destination guides, grouped by region.'),
  array('label' => 'Itineraries',         'url' => $home . 'itineraries/',                   'note' => '3, 7 and 10-day routes.'),
  array('label' => 'Elevate Your Travel', 'url' => $home . 'elevate-your-travel/',           'note' => 'Jet lag, business class, packing, planning.'),
  array('label' => 'Plan a Custom Trip',  'url' => $home . 'custom-inquiry/',                'note' => 'Tell me where you want to go.'),
);
?>
<main id="main" class="page">
  <div class="container container--narrow">
    <header class="gf-archive-head">
      <p class="eyebrow">404</p>
      <h1>Page not found</h1>
      <p class="section__intro">That URL doesn&rsquo;t exist &mdash; it may have moved, or the link may be wrong. Here&rsquo;s where to pick things up.</p>
      <?php get_search_form(); ?>
    </header>

    <ul class="gf-notfound__links">
      <?php foreach ($links as $link) : if (!$link['url']) continue; ?>
        <li>
          <a class="card" href="<?php echo esc_url($link['url']); ?>">
            <h3><?php echo esc_html($link['label']); ?></h3>
            <p><?php echo esc_html($link['note']); ?></p>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <p class="gf-notfound__home"><a href="<?php echo esc_url($home); ?>">&larr; Back to the home page</a></p>
  </div>
</main>
<?php get_footer(); ?>
