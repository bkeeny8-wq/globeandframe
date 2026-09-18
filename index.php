<?php
/**
 * Fallback loop (blog index, and anything without a more specific template).
 * Lists linked, excerpted entries — printing the_content() per post here is
 * what made search results unusable before search.php existed.
 */
get_header(); ?>

<main id="main" class="page">
  <div class="container">
    <?php if (have_posts()) : ?>
      <?php if (!is_front_page() && get_the_title(get_option('page_for_posts'))) : ?>
        <header class="gf-archive-head">
          <h1><?php echo esc_html(get_the_title(get_option('page_for_posts'))); ?></h1>
        </header>
      <?php endif; ?>
      <div class="card-grid">
        <?php while (have_posts()) : the_post(); $gf_blurb = get_the_excerpt(); ?>
          <a class="card" href="<?php the_permalink(); ?>">
            <h3><?php the_title(); ?></h3>
            <?php if ($gf_blurb) : ?><p><?php echo esc_html(wp_trim_words($gf_blurb, 28)); ?></p><?php endif; ?>
          </a>
        <?php endwhile; ?>
      </div>
      <?php the_posts_pagination(array('mid_size' => 1)); ?>
    <?php else : ?>
      <p class="section__intro empty-state">Nothing published here yet &mdash; new guides and stories are on the way. <a href="<?php echo esc_url(get_post_type_archive_link('city_guide')); ?>">Browse city guides &rarr;</a></p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
