<?php
/**
 * City Guides landing — organized by Region (the "dedicated cities page").
 * Only published guides appear; drafts stay dark. Regions with no live guides
 * are hidden. Each region header links to its own /region/<slug>/ browse page.
 */
get_header();
$regions = get_terms(array('taxonomy' => 'region', 'hide_empty' => false, 'orderby' => 'name'));
?>
<main id="main">
  <section class="page-hero">
    <div class="container page-hero__inner">
      <p class="eyebrow">Globe &amp; Frame</p>
      <h1>City Guides</h1>
      <p>Destination guides built from real trips, grouped by region. Pick a part of the world and dig in.</p>
    </div>
  </section>

  <div class="container">
    <?php
    $any = false;
    if (!is_wp_error($regions) && $regions) :
      foreach ($regions as $r) :
        $q = new WP_Query(array(
          'post_type'      => 'city_guide',
          'post_status'    => 'publish',
          'posts_per_page' => -1,
          'orderby'        => 'title',
          'order'          => 'ASC',
          'tax_query'      => array(array('taxonomy' => 'region', 'field' => 'term_id', 'terms' => $r->term_id)),
        ));
        if ($q->have_posts()) :
          $any = true; ?>
          <section class="section-block">
            <div class="section-header">
              <div><h2><?php echo esc_html($r->name); ?></h2></div>
              <a class="section-count" href="<?php echo esc_url(get_term_link($r)); ?>"><?php echo (int) $q->found_posts; ?> guides &rarr;</a>
            </div>
            <div class="card-grid">
              <?php while ($q->have_posts()) : $q->the_post(); $hook = get_field('hook'); ?>
                <a class="card" href="<?php the_permalink(); ?>">
                  <h3><?php the_title(); ?></h3>
                  <?php if ($hook) : ?><p><?php echo esc_html($hook); ?></p><?php endif; ?>
                </a>
              <?php endwhile; ?>
            </div>
          </section>
        <?php endif;
        wp_reset_postdata();
      endforeach;
    endif;

    if (!$any) : ?>
      <p class="section__intro empty-state">City guides are publishing soon — check back shortly.</p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
