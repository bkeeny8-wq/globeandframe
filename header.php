<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header" id="site-header">
  <div class="container site-header__inner">
    <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Globe &amp; Frame home">
      <img class="site-logo__img" src="<?php echo esc_url(get_theme_file_uri('assets/images/logo-on-light.svg')); ?>" alt="Globe &amp; Frame" width="382" height="52" />
    </a>

    <button class="site-nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav" aria-label="Open menu">
      <span class="site-nav-toggle__bar" aria-hidden="true"></span>
      <span class="site-nav-toggle__bar" aria-hidden="true"></span>
      <span class="site-nav-toggle__bar" aria-hidden="true"></span>
    </button>

    <?php
    // Hard-coded nav (no WordPress menu). "Shop" points at the Etsy storefront
    // via gf_shop_url() — /shop/ doesn't exist, so linking it here 404s. The
    // item drops out entirely if that URL is ever filtered to empty.
    $gf_shop = gf_shop_url();
    $gf_nav  = array(
      array('label' => 'City Guides',        'url' => home_url('/city-guides/')),
      array('label' => 'Itineraries',        'url' => home_url('/itineraries/')),
      array('label' => 'Elevate Your Travel','url' => home_url('/elevate-your-travel/')),
      array('label' => 'Gallery',            'url' => home_url('/gallery/')),
      array('label' => 'About',              'url' => home_url('/about/')),
    );
    if ($gf_shop) {
      array_splice($gf_nav, 4, 0, array(array('label' => 'Shop', 'url' => $gf_shop)));
    }
    ?>
    <nav class="site-nav" id="site-nav" aria-label="Main">
      <?php foreach ($gf_nav as $gf_item) :
        $gf_external = gf_is_external_url($gf_item['url']); ?>
        <a href="<?php echo esc_url($gf_item['url']); ?>"<?php if ($gf_external) echo ' target="_blank" rel="noopener noreferrer"'; ?>>
          <?php echo esc_html($gf_item['label']); ?><?php if ($gf_external) : ?><span class="screen-reader-text"> (Etsy, opens in a new tab)</span><?php endif; ?>
        </a>
      <?php endforeach; ?>
    </nav>
  </div>
</header>
