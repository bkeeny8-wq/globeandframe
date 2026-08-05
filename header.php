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

    <nav class="site-nav" id="site-nav" aria-label="Main">
      <a href="<?php echo esc_url(home_url('/city-guides/')); ?>">City Guides</a>
      <a href="<?php echo esc_url(home_url('/itineraries/')); ?>">Itineraries</a>
      <a href="<?php echo esc_url(home_url('/elevate-your-travel/')); ?>">Elevate Your Travel</a>
      <a href="<?php echo esc_url(home_url('/gallery/')); ?>">Gallery</a>
      <a href="<?php echo esc_url(home_url('/shop/')); ?>">Shop</a>
      <a href="<?php echo esc_url(home_url('/about/')); ?>">About</a>
    </nav>
  </div>
</header>
