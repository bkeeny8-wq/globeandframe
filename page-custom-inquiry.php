<?php
/**
 * Custom Inquiry page (slug: custom-inquiry). A native, no-plugin lead form
 * that posts to admin-post.php and emails the inquiry (handler: gf_handle_inquiry
 * in functions.php). Ported from the Astro custom-inquiry.astro.
 */
get_header();
$state = isset($_GET['inquiry']) ? sanitize_key($_GET['inquiry']) : '';

// A failed submission is parked in a transient and handed back by token, so the
// visitor doesn't retype the long answer. 'err' is the pre-0.3.3 generic state.
$draft = ($state !== '' && $state !== 'ok' && isset($_GET['gf_draft']))
  ? gf_get_stashed_inquiry($_GET['gf_draft'])
  : array();
$val = function ($key) use ($draft) {
  return isset($draft[$key]) ? $draft[$key] : '';
};
$errors = array(
  'expired'  => 'That form had been open long enough for its security token to expire, so nothing was sent. Your answers are still below &mdash; send it again and it will go through.',
  'invalid'  => 'Please check your name, a valid email address, and the last question &mdash; those three are required. Everything you typed is still below.',
  'mailfail' => 'The site couldn&rsquo;t hand the email off. Nothing was lost &mdash; try sending again in a moment, or email me directly.',
  'err'      => 'Something went wrong sending the form.',
);
?>
<main id="main" class="page">
  <div class="container container--narrow">
    <article class="article-content">
      <h1>Plan a Custom Trip</h1>
      <p class="lead">Not sure where to start? Tell me about the kind of trip you want to take and I&rsquo;ll help you build a plan around the experience you&rsquo;re looking for.</p>

      <?php if ($state === 'ok') : ?>
        <div class="inq-note inq-note--ok" role="status">Thanks &mdash; your inquiry is on its way. I&rsquo;ll be in touch by email soon.</div>
      <?php elseif (isset($errors[$state])) : ?>
        <div class="inq-note inq-note--err" role="alert"><?php echo wp_kses_post($errors[$state]); ?> You can also email me directly at <a href="mailto:bkeeny8@gmail.com">bkeeny8@gmail.com</a>.</div>
      <?php endif; ?>

      <form class="inquiry-form" method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <input type="hidden" name="action" value="gf_inquiry" />
        <?php wp_nonce_field('gf_inquiry', 'gf_inquiry_nonce'); ?>
        <div class="inq-hp" aria-hidden="true"><label>Leave this field empty<input type="text" name="gf_website" tabindex="-1" autocomplete="off" /></label></div>

        <div class="inq-row">
          <label class="inq-field">
            <span class="inq-label">Name <span class="inq-req" aria-hidden="true">*</span></span>
            <input type="text" name="name" value="<?php echo esc_attr($val('name')); ?>" required />
          </label>
          <label class="inq-field">
            <span class="inq-label">Email <span class="inq-req" aria-hidden="true">*</span></span>
            <input type="email" name="email" value="<?php echo esc_attr($val('email')); ?>" required />
          </label>
        </div>

        <label class="inq-field">
          <span class="inq-label">Destination or region</span>
          <input type="text" name="destination" value="<?php echo esc_attr($val('destination')); ?>" placeholder="e.g. Italy, Japan, Caribbean" />
        </label>

        <label class="inq-field">
          <span class="inq-label">Trip length</span>
          <select name="length">
            <option value="">Select one</option>
            <?php foreach (array('Weekend (2-3 days)', 'About a week', '10+ days', 'Not sure yet') as $opt) : ?>
              <option<?php selected($val('length'), $opt); ?>><?php echo esc_html($opt); ?></option>
            <?php endforeach; ?>
          </select>
        </label>

        <label class="inq-field">
          <span class="inq-label">What kind of experience are you looking for? <span class="inq-req" aria-hidden="true">*</span></span>
          <textarea name="details" rows="6" required placeholder="Tell me about your travel style, priorities, and anything you already have in mind."><?php echo esc_textarea($val('details')); ?></textarea>
        </label>

        <p class="inq-required-note"><span class="inq-req" aria-hidden="true">*</span> Required</p>

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
  /* Label text + asterisk share one flex item, or the * lands on its own line. */
  .inq-label{display:block}
  .inq-req{color:var(--color-gold-text)}
  .inq-required-note{margin:0;font-size:.78rem;color:var(--color-muted-mid)}
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
  .inq-note--err a,.inq-alt a{color:var(--color-gold-text)}
  .inq-alt{margin-top:var(--space-md);color:var(--color-muted-mid);font-size:.95rem}
  @media(max-width:560px){
    .inq-row{grid-template-columns:1fr}
    .inquiry-form .button{align-self:stretch;text-align:center}
  }
</style>
<?php get_footer();
