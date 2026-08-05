<?php
/**
 * Custom Inquiry page (slug: custom-inquiry). A native, no-plugin lead form
 * that posts to admin-post.php and emails the inquiry (handler: gf_handle_inquiry
 * in functions.php). Ported from the Astro custom-inquiry.astro.
 */
get_header();
$state = isset($_GET['inquiry']) ? sanitize_key($_GET['inquiry']) : '';
?>
<main id="main" class="page">
  <div class="container container--narrow">
    <article class="article-content">
      <h1>Plan a Custom Trip</h1>
      <p class="lead">Not sure where to start? Tell me about the kind of trip you want to take and I&rsquo;ll help you build a plan around the experience you&rsquo;re looking for.</p>

      <?php if ($state === 'ok') : ?>
        <div class="inq-note inq-note--ok" role="status">Thanks &mdash; your inquiry is on its way. I&rsquo;ll be in touch by email soon.</div>
      <?php elseif ($state === 'err') : ?>
        <div class="inq-note inq-note--err" role="alert">Something went wrong sending the form. Please email me directly at <a href="mailto:bkeeny8@gmail.com">bkeeny8@gmail.com</a>.</div>
      <?php endif; ?>

      <form class="inquiry-form" method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="gf_inquiry" />
        <?php wp_nonce_field('gf_inquiry', 'gf_inquiry_nonce'); ?>
        <div class="inq-hp" aria-hidden="true"><label>Leave this field empty<input type="text" name="gf_website" tabindex="-1" autocomplete="off" /></label></div>

        <div class="inq-row">
          <label class="inq-field">Name <span class="inq-req">*</span>
            <input type="text" name="name" required />
          </label>
          <label class="inq-field">Email <span class="inq-req">*</span>
            <input type="email" name="email" required />
          </label>
        </div>

        <label class="inq-field">Destination or region
          <input type="text" name="destination" placeholder="e.g. Italy, Japan, Caribbean" />
        </label>

        <label class="inq-field">Trip length
          <select name="length">
            <option value="">Select one</option>
            <option>Weekend (2-3 days)</option>
            <option>About a week</option>
            <option>10+ days</option>
            <option>Not sure yet</option>
          </select>
        </label>

        <label class="inq-field">What kind of experience are you looking for? <span class="inq-req">*</span>
          <textarea name="details" rows="6" required placeholder="Tell me about your travel style, priorities, and anything you already have in mind."></textarea>
        </label>

        <button class="button button--primary" type="submit">Send Inquiry</button>
      </form>

      <p class="inq-alt">Prefer email directly? <a href="mailto:bkeeny8@gmail.com">bkeeny8@gmail.com</a></p>
    </article>
  </div>
</main>
<style>
  .inquiry-form{display:flex;flex-direction:column;gap:var(--space-md);margin:var(--space-lg) 0 0}
  .inq-row{display:grid;grid-template-columns:1fr 1fr;gap:var(--space-md)}
  .inq-field{display:flex;flex-direction:column;gap:7px;font-size:.82rem;font-weight:600;letter-spacing:.02em;color:var(--color-text)}
  .inq-req{color:var(--color-gold)}
  .inquiry-form input,.inquiry-form select,.inquiry-form textarea{
    font-family:inherit;font-size:1rem;font-weight:400;color:var(--color-text);
    background:var(--color-surface);border:1px solid var(--color-border);border-radius:var(--radius);
    padding:.7rem .85rem;width:100%;transition:border-color .15s,box-shadow .15s}
  .inquiry-form input:focus,.inquiry-form select:focus,.inquiry-form textarea:focus{
    outline:none;border-color:var(--color-gold);box-shadow:0 0 0 3px var(--color-gold-ghost)}
  .inquiry-form textarea{resize:vertical;min-height:8rem;line-height:1.6}
  .inquiry-form .button{align-self:flex-start}
  .inq-hp{position:absolute!important;left:-9999px!important;width:1px;height:1px;overflow:hidden}
  .inq-note{padding:var(--space-md);border-radius:var(--radius);margin:var(--space-md) 0 0;font-size:.95rem;line-height:1.5}
  .inq-note--ok{background:var(--color-gold-ghost);border:1px solid var(--color-border-gold);color:var(--color-text)}
  .inq-note--err{background:rgba(190,60,60,.08);border:1px solid rgba(190,60,60,.35);color:var(--color-text)}
  .inq-note--err a,.inq-alt a{color:var(--color-gold)}
  .inq-alt{margin-top:var(--space-md);color:var(--color-muted-mid);font-size:.95rem}
  @media(max-width:560px){
    .inq-row{grid-template-columns:1fr}
    .inquiry-form .button{align-self:stretch;text-align:center}
  }
</style>
<?php get_footer();
