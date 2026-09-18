<?php
/**
 * Search form — used by search.php and 404.php (the only places the theme
 * offers search today; there is no header search box).
 */
if (!defined('ABSPATH')) exit;
$gf_search_id = 'gf-search-' . wp_unique_id();
?>
<form class="gf-searchform" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
  <label class="screen-reader-text" for="<?php echo esc_attr($gf_search_id); ?>">Search Globe &amp; Frame</label>
  <input
    type="search"
    id="<?php echo esc_attr($gf_search_id); ?>"
    name="s"
    value="<?php echo esc_attr(get_search_query()); ?>"
    placeholder="Search guides and stories"
  />
  <button class="button button--secondary" type="submit">Search</button>
</form>
