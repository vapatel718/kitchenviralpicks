<?php get_header(); ?>

<style>
@media (max-width: 600px) {
  .kvp-pros-cons { grid-template-columns: 1fr !important; }
  .kvp-who { grid-template-columns: 1fr !important; }
  .kvp-verdict-grid { grid-template-columns: 1fr !important; }
}
</style>

<main style="background:#FFF8F5; min-height:100vh; padding: 32px 16px;">
<div style="max-width:740px; margin:0 auto;">

  <!-- BREADCRUMB -->
  <p style="font-size:12px; color:#888; margin-bottom:16px;">
    <a href="<?php echo home_url(); ?>" style="color:#888; text-decoration:none;">Home</a>
    <?php $cats = get_the_category(); if($cats){ echo ' › <a href="'.get_category_link($cats[0]->term_id).'" style="color:#E8401C;text-decoration:none;">'.esc_html($cats[0]->name).'</a>'; } ?>
    › <?php the_title(); ?>
  </p>

  <!-- ARTICLE TITLE -->
  <h1 style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:800; font-size:28px; color:#1A1A1A; line-height:1.25; margin-bottom:10px;">
    <?php the_title(); ?>
  </h1>

  <!-- META -->
  <p style="font-size:12px; color:#888; margin-bottom:18px;">
    By Rick — Kitchen Researcher &nbsp;·&nbsp; <?php echo get_the_date(); ?> &nbsp;·&nbsp;
    <?php echo esc_html(get_post_meta(get_the_ID(), 'kvp_review_count', true)); ?> verified reviews analyzed
  </p>

  <!-- FTC DISCLOSURE -->
  <div style="background:#fff3cd; border:0.5px solid #f0c040; border-radius:8px; padding:10px 14px; font-size:12px; color:#7a5f00; margin-bottom:20px;">
    Disclosure: As an Amazon Associate, I earn from qualifying purchases at no extra cost to you. Recommendations are based on research and verified customer reviews.
  </div>

  <!-- VERDICT BOX -->
  <div style="background:white; border:2px solid #E8401C; border-radius:12px; padding:20px; margin-bottom:24px;">
    <span style="background:#E8401C; color:white; font-size:11px; font-weight:500; padding:3px 12px; border-radius:999px; letter-spacing:0.5px;">Quick verdict</span>

    <div class="kvp-verdict-grid" style="display:grid; grid-template-columns:1fr 1fr; gap:12px; margin:16px 0;">
      <div>
        <p style="font-size:11px; color:#888; text-transform:uppercase; letter-spacing:0.8px; margin-bottom:2px;">Research rating</p>
        <p style="font-size:14px; font-weight:500; color:#1A1A1A;">
          <span style="color:#E8401C;"><?php $kvp_rating = get_post_meta(get_the_ID(), 'kvp_rating', true); echo $kvp_rating ? str_repeat('★', round((float)$kvp_rating)) : '★★★★★'; ?></span>
          <?php echo esc_html(get_post_meta(get_the_ID(), 'kvp_rating', true)); ?> / 5
        </p>
      </div>
      <div>
        <p style="font-size:11px; color:#888; text-transform:uppercase; letter-spacing:0.8px; margin-bottom:2px;">Price (at time of writing)</p>
        <p style="font-size:14px; font-weight:500; color:#1A1A1A;"><?php echo esc_html(get_post_meta(get_the_ID(), 'kvp_price', true)); ?></p>
      </div>
      <div>
        <p style="font-size:11px; color:#888; text-transform:uppercase; letter-spacing:0.8px; margin-bottom:2px;">Best for</p>
        <p style="font-size:14px; font-weight:500; color:#1A1A1A;"><?php echo esc_html(get_post_meta(get_the_ID(), 'kvp_best_for', true)); ?></p>
      </div>
      <div>
        <p style="font-size:11px; color:#888; text-transform:uppercase; letter-spacing:0.8px; margin-bottom:2px;">Skip if</p>
        <p style="font-size:14px; font-weight:500; color:#1A1A1A;"><?php echo esc_html(get_post_meta(get_the_ID(), 'kvp_skip_if', true)); ?></p>
      </div>
    </div>

    <div style="background:#FFF8F5; border-left:3px solid #E8401C; border-radius:0 8px 8px 0; padding:10px 14px; font-size:14px; color:#1A1A1A; font-style:italic; margin-bottom:16px;">
      <?php echo esc_html(get_post_meta(get_the_ID(), 'kvp_verdict_line', true)); ?>
    </div>

    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'kvp_amazon_url', true)); ?>" rel="sponsored nofollow" target="_blank"
      style="display:block; text-align:center; background:#E8401C; color:white; font-size:15px; font-weight:500; padding:14px; border-radius:999px; text-decoration:none;">
      Check Price on Amazon
    </a>
    <p style="font-size:11px; color:#888; text-align:center; margin-top:6px;">Price verified at time of writing — may vary</p>
  </div>

  <!-- ARTICLE CONTENT -->
  <div style="font-size:15px; line-height:1.8; color:#1A1A1A; margin-bottom:24px;">
    <?php the_content(); ?>
  </div>

  <hr style="border:none; border-top:0.5px solid #e0d8d4; margin:24px 0;">

  <!-- PROS AND CONS -->
  <h2 style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:800; font-size:20px; color:#1A1A1A; margin-bottom:16px;">Pros & cons at a glance</h2>
  <div class="kvp-pros-cons" style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:24px;">
    <div style="background:#eaf3de; border:0.5px solid #97c459; border-radius:8px; padding:14px;">
      <h4 style="color:#3b6d11; font-size:13px; font-weight:500; margin-bottom:10px;">✓ What buyers love</h4>
      <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:7px;">
        <?php
        $pros = explode("\n", get_post_meta(get_the_ID(), 'kvp_pros', true));
        foreach($pros as $pro){ if(trim($pro)) echo '<li style="font-size:13px; color:#27500a;">✓ '.esc_html(trim($pro)).'</li>'; }
        ?>
      </ul>
    </div>
    <div style="background:#fcebeb; border:0.5px solid #f09595; border-radius:8px; padding:14px;">
      <h4 style="color:#a32d2d; font-size:13px; font-weight:500; margin-bottom:10px;">✕ Common complaints</h4>
      <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:7px;">
        <?php
        $cons = explode("\n", get_post_meta(get_the_ID(), 'kvp_cons', true));
        foreach($cons as $con){ if(trim($con)) echo '<li style="font-size:13px; color:#791f1f;">✕ '.esc_html(trim($con)).'</li>'; }
        ?>
      </ul>
    </div>
  </div>

  <hr style="border:none; border-top:0.5px solid #e0d8d4; margin:24px 0;">

  <!-- SPECS TABLE -->
  <h2 style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:800; font-size:20px; color:#1A1A1A; margin-bottom:16px;">Quick specs</h2>
  <table style="width:100%; border-collapse:collapse; font-size:13px; margin-bottom:24px;">
    <?php
    $specs = explode("\n", get_post_meta(get_the_ID(), 'kvp_specs', true));
    $alt = false;
    foreach($specs as $spec){
      $parts = explode("|", $spec);
      if(count($parts) === 2){
        $bg = $alt ? 'background:#f9f6f4;' : '';
        echo '<tr style="border-bottom:0.5px solid #e0d8d4;'.$bg.'">
          <td style="padding:9px 6px; color:#888; width:44%;">'.esc_html(trim($parts[0])).'</td>
          <td style="padding:9px 6px; font-weight:500; color:#1A1A1A;">'.esc_html(trim($parts[1])).'</td>
        </tr>';
        $alt = !$alt;
      }
    }
    ?>
  </table>

  <hr style="border:none; border-top:0.5px solid #e0d8d4; margin:24px 0;">

  <!-- WHO SHOULD BUY -->
  <h2 style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:800; font-size:20px; color:#1A1A1A; margin-bottom:16px;">Who should buy this</h2>
  <div class="kvp-who" style="display:grid; grid-template-columns:1fr 1fr; gap:14px; margin-bottom:24px;">
    <div style="background:white; border:0.5px solid #e0d8d4; border-radius:8px; padding:14px;">
      <h4 style="color:#3b6d11; font-size:13px; font-weight:500; margin-bottom:10px;">✓ Buy this if you are...</h4>
      <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:7px;">
        <?php
        $buy = explode("\n", get_post_meta(get_the_ID(), 'kvp_buy_if', true));
        foreach($buy as $item){ if(trim($item)) echo '<li style="font-size:13px; color:#444;">→ '.esc_html(trim($item)).'</li>'; }
        ?>
      </ul>
    </div>
    <div style="background:white; border:0.5px solid #e0d8d4; border-radius:8px; padding:14px;">
      <h4 style="color:#a32d2d; font-size:13px; font-weight:500; margin-bottom:10px;">✕ Skip this if you are...</h4>
      <ul style="list-style:none; padding:0; display:flex; flex-direction:column; gap:7px;">
        <?php
        $skip = explode("\n", get_post_meta(get_the_ID(), 'kvp_skip_if_detail', true));
        foreach($skip as $item){ if(trim($item)) echo '<li style="font-size:13px; color:#444;">→ '.esc_html(trim($item)).'</li>'; }
        ?>
      </ul>
    </div>
  </div>

  <hr style="border:none; border-top:0.5px solid #e0d8d4; margin:24px 0;">

  <!-- FINAL VERDICT -->
  <div style="background:white; border:0.5px solid #e0d8d4; border-radius:12px; padding:20px; margin-bottom:24px;">
    <h2 style="font-family:'Plus Jakarta Sans',sans-serif; font-weight:800; font-size:20px; color:#1A1A1A; margin-bottom:12px;">The verdict</h2>
    <p style="font-size:14px; line-height:1.8; color:#1A1A1A; margin-bottom:16px;">
      <?php echo esc_html(get_post_meta(get_the_ID(), 'kvp_final_verdict', true)); ?>
    </p>
    <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'kvp_amazon_url', true)); ?>" rel="sponsored nofollow" target="_blank"
      style="display:block; text-align:center; background:#E8401C; color:white; font-size:15px; font-weight:500; padding:14px; border-radius:999px; text-decoration:none;">
      Check Current Price on Amazon
    </a>
    <p style="font-size:11px; color:#888; text-align:center; margin-top:6px;">Price verified at time of writing — may vary</p>
  </div>

</div>
</main>

<?php get_footer(); ?>
