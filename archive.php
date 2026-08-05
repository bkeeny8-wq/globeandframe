<?php
/**
 * Universal archive template (CPT indexes + taxonomy/date archives).
 * Only published posts appear — drafts stay dark, per the publishing gate.
 */
get_header();
?>
<main id="main" class="page">
  <div class="container">
    <header class="gf-archive-head">
      <p class="eyebrow">Globe &amp; Frame</p>
      <h1><?php the_archive_title(); ?></h1>
      <?php $desc = get_the_archive_description(); if ($desc) : ?><div class="section__intro"><?php echo wp_kses_post($desc); ?></div><?php endif; ?>
    </header>

    <?php if (have_posts()) : ?>
      <div class="card-grid">
        <?php while (have_posts()) : the_post(); $hook = get_field('hook'); ?>
          <a class="card" href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
            <?php if ($hook) : ?><p><?php echo esc_html($hook); ?></p><?php endif; ?>
          </a>
        <?php endwhile; ?>
      </div>
      <?php the_posts_pagination(array('mid_size' => 1)); ?>
    <?php else : ?>
      <p class="section__intro empty-state">Nothing published here yet — new guides and stories are on the way. <a href="<?php echo esc_url(get_post_type_archive_link('city_guide')); ?>">Browse city guides &rarr;</a></p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
