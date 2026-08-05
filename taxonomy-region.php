<?php
/**
 * Region browse page — the City Guides in one region (e.g. /region/europe/).
 * "I'm going to Europe" → every European city guide in one place.
 */
get_header();
?>
<main id="main">
  <section class="page-hero">
    <div class="container page-hero__inner">
      <p class="eyebrow">City Guides · Region</p>
      <h1><?php single_term_title(); ?></h1>
      <?php $d = term_description(); if ($d) : ?><p><?php echo wp_kses_post($d); ?></p><?php endif; ?>
    </div>
  </section>

  <div class="container">
    <?php if (have_posts()) : ?>
      <div class="card-grid" style="margin-top:var(--space-xl);">
        <?php while (have_posts()) : the_post(); $hook = get_field('hook'); ?>
          <a class="card" href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
            <?php if ($hook) : ?><p><?php echo esc_html($hook); ?></p><?php endif; ?>
          </a>
        <?php endwhile; ?>
      </div>
    <?php else : ?>
      <p class="section__intro empty-state">Guides for this region are on the way.</p>
    <?php endif; ?>
    <p style="margin-top:var(--space-lg);"><a href="<?php echo esc_url(get_post_type_archive_link('city_guide')); ?>">&larr; All city guides</a></p>
  </div>
</main>
<?php get_footer(); ?>
