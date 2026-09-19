<?php
/**
 * Elevate article body: top-10-beaches
 * Extracted verbatim from the old page-top-10-beaches.php so the copy can move into
 * WordPress. Rendered by page-elevate-article.php until the article's page
 * has content of its own; also the source the Elevate seeder captures.
 *
 * The interactive ranked list (the part that genuinely needs code — a script
 * reads the beach data to swap the featured card) lives in
 * top-10-beaches-list.php so it can also be appended after page-authored copy
 * once an editor writes their own hero/intro here. See
 * gf_elevate_registry()['top-10-beaches']['appendAfterContent'] and
 * page-elevate-article.php.
 */
if (!defined('ABSPATH')) exit;
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

  <?php include get_theme_file_path('inc/elevate/top-10-beaches-list.php'); ?>

  <section class="dreaming-cta">
    <div class="container dreaming-cta__inner">
      <div>
        <h3>Chasing the next one?</h3>
        <p>These ten stuck. The city guides go deeper on where to stay, eat, and spend the days around them.</p>
      </div>
      <a class="button button--primary" href="<?php echo esc_url( home_url('/city-guides/') ); ?>">Explore the City Guides</a>
    </div>
  </section>
