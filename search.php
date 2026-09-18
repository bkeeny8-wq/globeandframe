<?php
/**
 * Search results — linked, excerpted matches.
 * Without this template WordPress falls back to index.php, which prints
 * the_content() per match: whole articles stacked up with nothing to click.
 * Results are scoped to the editorial content model by gf_scope_search_query().
 */
get_header();
global $wp_query;
$gf_query = get_search_query();
$gf_total = (int) $wp_query->found_posts;
?>
<main id="main" class="page">
  <div class="container">
    <header class="gf-archive-head">
      <p class="eyebrow">Search</p>
      <h1><?php
        if ($gf_query !== '') {
          printf('Results for &ldquo;%s&rdquo;', esc_html($gf_query));
        } else {
          echo 'Search';
        }
      ?></h1>
      <p class="section__intro"><?php
        if ($gf_query === '') {
          echo 'Enter a city, a dish, a neighbourhood &mdash; anything published on the site.';
        } else {
          echo esc_html(sprintf(
            _n('%s result', '%s results', $gf_total, 'globe-and-frame'),
            number_format_i18n($gf_total)
          ));
        }
      ?></p>
      <?php get_search_form(); ?>
    </header>

    <?php if (have_posts()) : ?>
      <div class="card-grid">
        <?php while (have_posts()) : the_post();
          $gf_type  = get_post_type_object(get_post_type());
          $gf_label = $gf_type ? $gf_type->labels->singular_name : '';
          // The hook field is the authored one-liner; fall back to the excerpt.
          $gf_hook  = function_exists('get_field') ? get_field('hook') : '';
          $gf_blurb = $gf_hook ? $gf_hook : get_the_excerpt();
        ?>
          <a class="card" href="<?php the_permalink(); ?>">
            <?php if ($gf_label) : ?><span class="gf-result__cat"><?php echo esc_html($gf_label); ?></span><?php endif; ?>
            <h3><?php the_title(); ?></h3>
            <?php if ($gf_blurb) : ?><p><?php echo esc_html(wp_trim_words($gf_blurb, 28)); ?></p><?php endif; ?>
          </a>
        <?php endwhile; ?>
      </div>
      <?php the_posts_pagination(array('mid_size' => 1)); ?>
    <?php else : ?>
      <p class="section__intro empty-state">
        No matches<?php if ($gf_query !== '') : ?> for &ldquo;<?php echo esc_html($gf_query); ?>&rdquo;<?php endif; ?>.
        Much of the catalogue is still unpublished &mdash; try a broader term, or
        <a href="<?php echo esc_url(get_post_type_archive_link('city_guide')); ?>">browse the city guides</a>.
      </p>
    <?php endif; ?>
  </div>
</main>
<?php get_footer(); ?>
