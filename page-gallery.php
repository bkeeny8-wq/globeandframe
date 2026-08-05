<?php
/**
 * Gallery page — shell for now. Print collections are wired in the commerce phase
 * (WooCommerce + print-on-demand); this renders the intro + an empty state.
 */
get_header();
?>
<main id="main" class="page">
  <div class="container">
    <p class="eyebrow">Globe &amp; Frame</p>
    <h1>Gallery</h1>
    <p class="section__intro">Photography from the places, details, and moments that have stayed with me. Prints are coming soon.</p>
    <div class="gallery-soon">
      <p class="gallery-soon__label">Print shop</p>
      <p class="gallery-soon__note">Signed, limited-run prints are on the way. In the meantime, the photography lives inside the city guides.</p>
      <a class="button button--secondary" href="<?php echo esc_url( home_url('/city-guides/') ); ?>">Browse the City Guides</a>
    </div>
  </div>
</main>
<?php get_footer(); ?>
