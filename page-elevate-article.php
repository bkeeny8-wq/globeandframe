<?php
/**
 * Template Name: Elevate Article
 *
 * One template for every Elevate Your Travel article, replacing the twelve
 * bespoke page-<slug>.php files. The body comes from the page itself once the
 * copy has been migrated into WordPress (inc/elevate-articles.php seeds it);
 * until then it renders the bundled body in inc/elevate/, so nothing on the
 * live site changes before the copy moves.
 */
get_header();
$gf_hub = home_url('/elevate-your-travel/');

while (have_posts()) : the_post();
  $gf_slug = get_post_field('post_name', get_the_ID());
  $gf_body = gf_elevate_body_path($gf_slug);
  $gf_full = get_post_meta(get_the_ID(), '_gf_elevate_full_body', true) === '1';
  $gf_has  = trim((string) get_the_content()) !== '';
  $gf_lead = trim((string) gf_field('elevateLead', get_the_ID()));
  if ($gf_lead === '') $gf_lead = trim((string) get_the_excerpt());

  // Some articles carry an interactive part (currently just Top 10 Beaches'
  // ranked list) that has to stay theme-owned even once the copy above it is
  // written in wp-admin, so it's appended after the_content() rather than
  // being part of what gets migrated into the page.
  $gf_registry = gf_elevate_registry();
  $gf_append = isset($gf_registry[$gf_slug]['appendAfterContent']) ? $gf_registry[$gf_slug]['appendAfterContent'] : '';
  $gf_append_path = $gf_append !== '' ? get_theme_file_path('inc/elevate/' . $gf_append . '.php') : '';
  if ($gf_append_path !== '' && !file_exists($gf_append_path)) $gf_append_path = '';
?>
<main id="main">
  <?php if ($gf_has && $gf_full) : ?>
    <?php // Migrated article: the stored markup carries its own hero. ?>
    <?php the_content(); ?>

  <?php elseif ($gf_has) : ?>
    <?php // Written in WordPress: the theme supplies the hero. ?>
    <section class="article-hero">
      <div class="container">
        <p class="eyebrow"><a href="<?php echo esc_url($gf_hub); ?>" style="color:inherit;text-decoration:none;">&larr; Elevate Your Travel</a></p>
        <h1><?php the_title(); ?></h1>
        <?php if ($gf_lead) : ?><p class="article-hero__lead"><?php echo esc_html($gf_lead); ?></p><?php endif; ?>
      </div>
    </section>
    <div class="container">
      <div class="article-prose"><?php the_content(); ?></div>
    </div>
    <?php if ($gf_append_path) : ?>
      <?php include $gf_append_path; ?>
    <?php endif; ?>

  <?php elseif ($gf_body) : ?>
    <?php include $gf_body; ?>

  <?php else : ?>
    <section class="article-hero">
      <div class="container">
        <p class="eyebrow"><a href="<?php echo esc_url($gf_hub); ?>" style="color:inherit;text-decoration:none;">&larr; Elevate Your Travel</a></p>
        <h1><?php the_title(); ?></h1>
        <?php if ($gf_lead) : ?><p class="article-hero__lead"><?php echo esc_html($gf_lead); ?></p><?php endif; ?>
      </div>
    </section>
    <?php if ($gf_append_path) : ?>
      <?php include $gf_append_path; ?>
    <?php endif; ?>
  <?php endif; ?>
</main>
<?php endwhile; get_footer();
