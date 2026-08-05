<?php
/**
 * Default page template (fallback for Pages without a page-{slug}.php).
 * Renders the page content in the long-form article style.
 */
get_header();
?>
<main id="main" class="page">
  <div class="container">
    <?php while (have_posts()) : the_post(); ?>
      <article class="article-content">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </article>
    <?php endwhile; ?>
  </div>
</main>
<?php get_footer(); ?>
