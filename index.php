<?php get_header(); ?>

<main id="main" class="page">
  <div class="container">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <article class="article-content">
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <article class="article-content">
        <h1>Nothing here yet</h1>
        <p>Content is on its way.</p>
      </article>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
