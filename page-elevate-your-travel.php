<?php
/**
 * Elevate Your Travel hub — built from a query, not hand-written cards.
 * Sections, cards, counts and numbering all come from gf_elevate_articles()
 * (inc/elevate-articles.php), so counts can't drift and an article added in
 * wp-admin appears here on its own.
 */
get_header();
$sections = gf_elevate_sections();
$articles = gf_elevate_articles();

/** One card, in whichever of the four layouts the article uses. */
if (!function_exists('gf_elevate_card_html')) :
function gf_elevate_card_html($card, $number = 0) {
  $thumb = !empty($card['thumbId']) ? wp_get_attachment_image_url($card['thumbId'], 'large') : '';
  $image = $thumb ? $thumb : $card['image'];
  $url   = esc_url($card['url']);
  $title = esc_html($card['title']);
  $cat   = $card['category'] !== '' ? '<span class="card-cat">' . esc_html($card['category']) . '</span>' : '';
  $num   = $number ? sprintf('%02d', $number) : '';

  if ($card['layout'] === 'row' || $card['layout'] === 'list') {
    $excerpt = $card['excerpt'] !== '' ? esc_html($card['excerpt']) : '';
    if ($card['layout'] === 'row') {
      return '<a class="row-card" href="' . $url . '">'
        . ($num ? '<div class="row-card__num">' . esc_html($num) . '</div>' : '')
        . '<div class="row-card__title">' . $title . '</div>'
        . ($excerpt ? '<div class="row-card__excerpt">' . $excerpt . '</div>' : '')
        . '<span class="row-card__read">' . esc_html($card['read']) . '</span></a>';
    }
    return '<a class="list-row" href="' . $url . '">'
      . ($num ? '<span class="list-row__num">' . esc_html($num) . '</span>' : '')
      . '<div><div class="list-row__title">' . $title . '</div>'
      . ($excerpt ? '<div class="list-row__excerpt">' . $excerpt . '</div>' : '')
      . '</div><span class="list-row__arrow" aria-hidden="true">&rarr;</span></a>';
  }

  $small   = ($card['layout'] === 'feature-sm');
  $classes = 'card-feature' . ($small ? ' card-feature--sm' : '') . ' card-feature--' . sanitize_html_class($card['accent']);
  $body    = $cat . '<div class="card-feature__title">' . $title . '</div>';
  if (!$small && $card['excerpt'] !== '') {
    $body .= '<div class="card-feature__excerpt">' . esc_html($card['excerpt']) . '</div>'
      . '<span class="card-feature__read">' . esc_html($card['read']) . '</span>';
  }

  return '<a class="' . esc_attr($classes) . '" href="' . $url . '">'
    . ($image ? gf_img($image, $card['title'], array('class' => 'card-feature__img', 'sizes' => $small ? '(max-width: 640px) 100vw, 320px' : '(max-width: 640px) 100vw, 640px')) : '')
    . '<div class="card-feature__overlay"></div>'
    . '<div class="card-feature__body">' . $body . '</div></a>';
}
endif;
?>
<main id="main">
  <section class="page-hero">
    <div class="container page-hero__inner">
      <p class="eyebrow">Go Deeper</p>
      <h1>Elevate Your Travel</h1>
      <p>
        Restaurants, neighborhoods, bars, and the smaller details that give a place its character.
        Practical guides and honest takes built from real experience.
      </p>
    </div>
  </section>

  <div class="container">
    <?php foreach ($sections as $key => $section) :
      $cards = isset($articles[$key]) ? $articles[$key] : array();
      if (!$cards) continue;

      // Position in the section drives the numbering, so it can't go stale.
      $number  = 0;
      $features = $smalls = $rows = $lists = array();
      foreach ($cards as $card) {
        $number++;
        if ($card['layout'] === 'feature-sm')   { $smalls[]   = array($card, $number); }
        elseif ($card['layout'] === 'row')      { $rows[]     = array($card, $number); }
        elseif ($card['layout'] === 'list')     { $lists[]    = array($card, $number); }
        else                                    { $features[] = array($card, $number); }
      }
    ?>
      <div class="section-block">
        <div class="section-header">
          <div>
            <h2><?php echo esc_html($section['title']); ?></h2>
            <p><?php echo esc_html($section['intro']); ?></p>
          </div>
          <span class="section-count"><?php
            echo esc_html(sprintf(
              _n('%s article', '%s articles', count($cards), 'globe-and-frame'),
              number_format_i18n(count($cards))
            ));
          ?></span>
        </div>

        <?php if ($features || $smalls) : ?>
          <div class="<?php echo esc_attr($section['grid']); ?>">
            <?php foreach ($features as $entry) echo gf_elevate_card_html($entry[0]); ?>
            <?php if ($smalls) : ?>
              <div class="side-stack">
                <?php foreach ($smalls as $entry) echo gf_elevate_card_html($entry[0]); ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($rows || !empty($section['cta'])) : ?>
          <div class="row-cards">
            <?php foreach ($rows as $entry) echo gf_elevate_card_html($entry[0], $entry[1]); ?>
            <?php if (!empty($section['cta'])) : $cta = $section['cta']; ?>
              <a class="row-card row-card--cta" href="<?php echo esc_url(home_url('/' . ltrim($cta['path'], '/'))); ?>">
                <div class="row-card__title"><?php echo esc_html($cta['title']); ?></div>
                <div class="row-card__excerpt"><?php echo esc_html($cta['excerpt']); ?></div>
                <span class="row-card__read"><?php echo esc_html($cta['read']); ?></span>
              </a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($lists) : ?>
          <div class="list-rows">
            <?php foreach ($lists as $entry) echo gf_elevate_card_html($entry[0], $entry[1]); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>

  <section class="cta-editorial">
    <div class="container cta-editorial__inner">
      <div>
        <h3>Not sure where to start?</h3>
        <p>
          Tell me what kind of trip you want to take and I'll help you build a plan around the experience you're
          looking for.
        </p>
      </div>
      <a class="button button--primary" href="<?php echo esc_url(home_url('/custom-inquiry/')); ?>">Plan a Custom Trip</a>
    </div>
  </section>
</main>
<?php get_footer(); ?>
