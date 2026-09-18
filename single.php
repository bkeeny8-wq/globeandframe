<?php
/**
 * Universal single template for the spotlight CPTs (beach, bar, walk, dish…).
 * The reading experience is a cluster page: a breadcrumb back to the city
 * guide, the story itself, then a "post flow" footer — the pillar guide CTA
 * plus sibling stories from the same city. Mobile-first.
 */
get_header();
while (have_posts()) : the_post();
  $pid     = get_the_ID();
  $type    = get_post_type();
  $typeObj = get_post_type_object($type);
  $typeLbl = $typeObj ? $typeObj->labels->singular_name : '';
  $city    = get_field('city');
  $hook    = get_field('hook');
  // What this type renders, and in what order (inc/story-sections.php).
  $spec    = gf_story_spec($type);
  $prose   = gf_first_field($spec['lead'], $pid);

  // Cluster context: this story's city → its pillar guide + sibling stories.
  $storyTypes = array('beach', 'day_trip', 'neighborhood', 'local_dish', 'market', 'bar', 'walk', 'experience', 'gift', 'mcdonalds');
  $cityTerms  = wp_get_post_terms($pid, 'city', array('fields' => 'ids'));
  $cityName   = $city ?: '';
  $guide      = null;
  $siblings   = null;
  if ($cityTerms && !is_wp_error($cityTerms)) {
    if (!$cityName) {
      $t = get_term($cityTerms[0], 'city');
      if ($t && !is_wp_error($t)) $cityName = $t->name;
    }
    $g = get_posts(array(
      'post_type'   => 'city_guide', 'post_status' => 'publish', 'numberposts' => 1,
      'tax_query'   => array(array('taxonomy' => 'city', 'field' => 'term_id', 'terms' => $cityTerms)),
    ));
    if ($g) $guide = $g[0];
    $siblings = new WP_Query(array(
      'post_type'      => $storyTypes, 'post_status' => 'publish', 'posts_per_page' => 4,
      'post__not_in'   => array($pid), 'orderby' => 'rand',
      'tax_query'      => array(array('taxonomy' => 'city', 'field' => 'term_id', 'terms' => $cityTerms)),
    ));
  }
?>
<main id="main" class="page post-single">
  <div class="container container--narrow">

    <nav class="pf-crumb" aria-label="Breadcrumb">
      <a href="<?php echo esc_url(get_post_type_archive_link('city_guide')); ?>">City Guides</a>
      <?php if ($guide) : ?>
        <span aria-hidden="true">›</span>
        <a href="<?php echo esc_url(get_permalink($guide)); ?>"><?php echo esc_html($cityName ?: get_the_title($guide)); ?></a>
      <?php endif; ?>
      <span aria-hidden="true">›</span>
      <span class="pf-crumb__here"><?php echo esc_html($typeLbl); ?></span>
    </nav>

    <article class="article-content">
      <h1><?php the_title(); ?></h1>
      <?php if ($hook) : ?><p class="lead"><?php echo esc_html($hook); ?></p><?php endif; ?>
      <?php if (has_post_thumbnail()) : the_post_thumbnail('large'); endif; ?>
      <?php if ($prose) : ?><div class="gf-prose"><?php echo wp_kses_post($prose); ?></div><?php endif; ?>

      <?php
      // Fallback for anything written in the block editor rather than the
      // fields — a plain post, or a story typed up before the fields existed.
      if (!$prose && trim(get_the_content()) !== '') : ?>
        <div class="gf-prose"><?php the_content(); ?></div>
      <?php endif; ?>

      <?php $facts = gf_story_facts($spec['facts'], $pid); if ($facts) : ?>
        <ul class="gf-facts">
          <?php foreach ($facts as $f) : ?><li><span class="gf-facts__k"><?php echo esc_html($f[0]); ?></span><span class="gf-facts__v"><?php echo esc_html($f[1]); ?></span></li><?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php
      // Sections in the order this type declares. Row fields (the plan, the
      // gifts, where to get it…) come back through gf_rows(), so they work on
      // any ACF edition; everything else is authored plain text.
      foreach ($spec['sections'] as $field => $heading) :
        $body = gf_row_columns($field, $type)
          ? gf_row_list_html($field, null, $pid)
          : gf_prose_html(gf_field($field, $pid));
        if ($body === '') continue; ?>
        <h2><?php echo esc_html($heading); ?></h2>
        <?php echo $body; // escaped in the helpers above ?>
      <?php endforeach; ?>

      <?php echo gf_know_block_html($spec['know'], $pid); ?>

      <?php $links = gf_story_links($spec['links'], $pid); if ($links) : ?>
        <p class="gf-links">
          <?php foreach ($links as $l) : ?>
            <a href="<?php echo esc_url($l[1]); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($l[0]); ?> <span aria-hidden="true">&rarr;</span></a>
          <?php endforeach; ?>
        </p>
      <?php endif; ?>

      <?php echo gf_verified_html($pid); ?>

      <?php if (get_post_status() !== 'publish') : ?>
        <p class="gf-draft-note"><em>Draft — not yet published.</em></p>
      <?php endif; ?>
    </article>

    <?php /* ---- Post flow: back to the pillar, then sideways to siblings ---- */ ?>
    <?php if ($guide) : ?>
      <a class="pf-guide" href="<?php echo esc_url(get_permalink($guide)); ?>">
        <span class="pf-guide__k">Part of the guide</span>
        <span class="pf-guide__t"><?php echo esc_html($cityName ?: get_the_title($guide)); ?> — the complete city guide</span>
        <span class="pf-guide__go">Read the guide&nbsp;<span aria-hidden="true">&rarr;</span></span>
      </a>
    <?php endif; ?>

    <?php if ($siblings && $siblings->have_posts()) : ?>
      <section class="pf-more">
        <h2>More from <?php echo esc_html($cityName ?: 'this city'); ?></h2>
        <div class="pf-more__grid">
          <?php while ($siblings->have_posts()) : $siblings->the_post();
            $sObj = get_post_type_object(get_post_type()); $sLbl = $sObj ? $sObj->labels->singular_name : ''; ?>
            <a class="pf-card" href="<?php the_permalink(); ?>">
              <span class="pf-card__cat"><?php echo esc_html($sLbl); ?></span>
              <span class="pf-card__t"><?php the_title(); ?></span>
            </a>
          <?php endwhile; ?>
        </div>
      </section>
    <?php wp_reset_postdata(); endif; ?>

  </div>
</main>
<style>
  .post-single .article-content{margin-top:var(--space-md)}
  .post-single .article-content h1{margin-bottom:var(--space-sm)}
  .post-single .lead{color:var(--color-muted-mid,var(--color-muted));font-size:1.15rem;line-height:1.5;margin-bottom:var(--space-lg)}

  .pf-crumb{display:flex;flex-wrap:wrap;align-items:center;gap:8px;font-size:.8rem;margin:0 0 var(--space-md);color:var(--color-muted)}
  .pf-crumb a{color:var(--color-gold-text);text-decoration:none}
  .pf-crumb a:hover{text-decoration:underline}
  .pf-crumb span[aria-hidden]{color:rgba(12,32,66,.32)}

  .gf-facts{list-style:none;display:flex;flex-wrap:wrap;gap:var(--space-md) var(--space-lg);padding:var(--space-md) 0;margin:var(--space-lg) 0;border-top:1px solid var(--color-border);border-bottom:1px solid var(--color-border)}
  .gf-facts__k{display:block;font-size:.62rem;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:var(--color-gold-text)}
  .gf-facts__v{display:block;font-size:.9rem;color:var(--color-text);font-family:var(--font-serif)}
  .gf-draft-note{color:var(--color-muted);border-top:1px dashed var(--color-border);padding-top:var(--space-sm);margin-top:var(--space-lg)}

  /* Post flow */
  .pf-guide{display:block;margin-top:calc(var(--space-xl) + var(--space-md));padding:20px 22px;background:var(--color-navy);border-radius:var(--radius);text-decoration:none;transition:transform .15s ease,box-shadow .15s ease}
  .pf-guide:hover{transform:translateY(-2px);box-shadow:0 12px 28px rgba(12,32,66,.18)}
  /* .pf-guide is navy, so the bright gold is the accessible choice here (7.6:1);
     gold text on the light surfaces uses --color-gold-text instead. */
  .pf-guide__k{display:block;font-size:.6rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--color-gold);margin-bottom:8px}
  .pf-guide__t{display:block;font-family:var(--font-serif);font-size:1.2rem;line-height:1.25;color:#fff;margin-bottom:10px}
  .pf-guide__go{display:inline-block;font-size:.82rem;font-weight:600;color:var(--color-gold)}

  .pf-more{margin-top:calc(var(--space-xl) + var(--space-md))}
  .pf-more h2{font-family:var(--font-serif);font-size:1.4rem;color:var(--color-text);border-bottom:1px solid var(--color-border-gold);padding-bottom:var(--space-sm);margin:0 0 var(--space-md)}
  .pf-more__grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
  .pf-card{display:flex;flex-direction:column;gap:6px;padding:16px 18px;min-height:90px;border:1px solid var(--color-border);border-radius:var(--radius);background:var(--color-surface);text-decoration:none;transition:border-color .15s ease,transform .15s ease}
  .pf-card:hover{border-color:var(--color-border-gold);transform:translateY(-2px)}
  .pf-card__cat{font-size:.58rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--color-gold-text)}
  .pf-card__t{font-family:var(--font-serif);font-size:1.02rem;line-height:1.25;color:var(--color-text)}
  /* one companion story: don't leave an empty right cell */
  .pf-more__grid:has(> .pf-card:only-child){grid-template-columns:1fr}

  @media (min-width:60rem){
    .pf-guide{margin-top:var(--space-xl)}
    .pf-more{margin-top:var(--space-lg)}
  }

  @media(max-width:560px){
    .post-single .lead{font-size:1.08rem}
    .pf-more__grid{grid-template-columns:1fr}
    .pf-guide__t{font-size:1.1rem}
  }
</style>
<?php endwhile; get_footer(); ?>
