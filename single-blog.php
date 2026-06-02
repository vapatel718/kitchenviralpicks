<?php
/**
 * Template Name: Blog Post
 * Template Post Type: post
 */
get_header();
?>

<style>
/* =============================================
   KVP BLOG POST TEMPLATE — single-blog.php
   All styles scoped to kvp-blog-* and kvp-*
   ============================================= */

/* Reset conflicts from theme */
.kvp-blog-wrap *{box-sizing:border-box;}
.kvp-blog-wrap p{margin:0 0 20px;}
.kvp-blog-wrap ul{margin:0;padding:0;}
.kvp-blog-wrap h1,.kvp-blog-wrap h2,.kvp-blog-wrap h3{margin:0;}

/* ── HERO ── */
.kvp-blog-hero{background:#FFF0EB;padding:44px 40px 40px;width:100%;}
.kvp-blog-breadcrumb{font-family:'Lato',sans-serif;font-size:11px;color:#A32D0D;opacity:0.7;margin-bottom:14px;display:flex;align-items:center;gap:6px;flex-wrap:wrap;}
.kvp-blog-breadcrumb a{color:inherit;text-decoration:none;}
.kvp-blog-breadcrumb span{opacity:0.5;}
.kvp-blog-cat-pill{display:inline-flex;align-items:center;background:#E8401C;color:#fff;font-family:'Lato',sans-serif;font-size:10px;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;padding:6px 14px;border-radius:999px;margin-bottom:18px;}
.kvp-blog-h1{font-family:'Playfair Display',serif;font-size:clamp(1.8rem,4vw,2.6rem);font-weight:700;color:#1A1A1A;line-height:1.2;margin-bottom:24px;}
.kvp-blog-byline{display:flex;align-items:center;gap:14px;padding-top:18px;border-top:0.5px solid rgba(232,64,28,0.2);}
.kvp-blog-avatar{width:40px;height:40px;border-radius:50%;background:#E8401C;display:flex;align-items:center;justify-content:center;font-family:'Lato',sans-serif;font-size:15px;font-weight:700;color:#fff;flex-shrink:0;}
.kvp-blog-byline-name{font-family:'Lato',sans-serif;font-size:14px;font-weight:700;color:#1A1A1A;display:block;}
.kvp-blog-byline-meta{font-family:'Lato',sans-serif;font-size:11px;color:#888;display:block;margin-top:3px;}

/* ── BODY WRAPPER ── */
.kvp-blog-body{max-width:740px;margin:0 auto;padding:48px 40px 80px;}

/* ── BACK LINK ── */
.kvp-back-link{display:inline-block;font-family:'Lato',sans-serif;font-size:13px;color:#E8401C;text-decoration:none;margin-bottom:36px;opacity:0.85;}
.kvp-back-link:hover{opacity:1;}

/* ── INTRO PARAGRAPH ── */
.kvp-blog-intro{font-family:'Lato',sans-serif;font-size:17px;color:#333;line-height:1.85;margin-bottom:36px;padding-bottom:36px;border-bottom:0.5px solid rgba(232,64,28,0.12);}
.kvp-blog-intro strong{color:#1A1A1A;font-weight:700;}

/* ── TABLE OF CONTENTS ── */
.kvp-toc{background:#FFF8F5;border-radius:10px;border:0.5px solid rgba(232,64,28,0.15);padding:22px 26px;margin-bottom:44px;}
.kvp-toc-label{font-family:'Lato',sans-serif;font-size:10px;font-weight:700;color:#E8401C;letter-spacing:0.12em;text-transform:uppercase;margin-bottom:16px;display:block;}
.kvp-toc-list{list-style:none;display:flex;flex-direction:column;gap:12px;padding:0;margin:0;}
.kvp-toc-list li{display:flex;align-items:center;gap:10px;font-family:'Lato',sans-serif;font-size:14px;color:#444;line-height:1.4;}
.kvp-toc-dot{width:6px;height:6px;border-radius:50%;background:#E8401C;opacity:0.5;flex-shrink:0;display:inline-block;}

/* ── SECTIONS ── */
.kvp-section{margin-bottom:52px;padding-bottom:52px;border-bottom:0.5px solid rgba(232,64,28,0.08);}
.kvp-section:last-of-type{border-bottom:none;margin-bottom:0;padding-bottom:0;}
.kvp-section-num{font-family:'Lato',sans-serif;font-size:10px;font-weight:700;color:#E8401C;letter-spacing:0.14em;text-transform:uppercase;display:block;margin-bottom:12px;}
.kvp-h2{font-family:'Playfair Display',serif;font-size:26px;font-weight:700;color:#1A1A1A;margin-bottom:20px;line-height:1.25;}
.kvp-p{font-family:'Lato',sans-serif;font-size:17px;color:#333;line-height:1.85;margin-bottom:22px;}
.kvp-p:last-child{margin-bottom:0;}

/* ── CALLOUT BOX ── */
.kvp-callout{border-left:3px solid #E8401C;background:#FFF8F5;padding:18px 22px;margin:28px 0;border-radius:0;}
.kvp-callout-label{font-family:'Lato',sans-serif;font-size:10px;font-weight:700;color:#E8401C;letter-spacing:0.1em;text-transform:uppercase;margin-bottom:8px;display:block;}
.kvp-callout-text{font-family:'Lato',sans-serif;font-size:15px;color:#444;line-height:1.75;display:block;}

/* ── DECODER GRID ── */
.kvp-decode-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin:26px 0 14px;}
.kvp-dc{border-radius:10px;padding:20px 22px;border:0.5px solid rgba(232,64,28,0.14);background:#FFF8F5;}
.kvp-dc-full{border-radius:10px;padding:20px 22px;border:0.5px solid rgba(232,64,28,0.14);background:#FFF8F5;margin-top:0;}
.kvp-dc-top{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:12px;gap:10px;}
.kvp-dc-term{font-family:'Lato',sans-serif;font-size:14px;font-weight:700;color:#1A1A1A;}
.kvp-badge{font-family:'Lato',sans-serif;font-size:9px;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;padding:4px 10px;border-radius:999px;white-space:nowrap;flex-shrink:0;}
.kvp-b-strong{background:#edfaf3;color:#1a7a4a;}
.kvp-b-mod{background:#fff8e6;color:#7a5200;}
.kvp-b-weak{background:#FFF0EB;color:#A32D0D;}
.kvp-b-unreg{background:#f0f0f0;color:#555;}
.kvp-dc-def{font-family:'Lato',sans-serif;font-size:13px;color:#444;line-height:1.7;margin-bottom:0;}
.kvp-dc-note{font-family:'Lato',sans-serif;font-size:12px;color:#888;margin-top:12px;padding-top:12px;border-top:0.5px solid rgba(232,64,28,0.1);font-style:italic;margin-bottom:0;display:block;}

/* ── MATERIAL GRID ── */
.kvp-material-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin:26px 0;}
.kvp-mat-card{background:#FFF8F5;border-radius:10px;border:0.5px solid rgba(232,64,28,0.14);padding:22px;}
.kvp-mat-icon{width:38px;height:38px;border-radius:9px;background:rgba(232,64,28,0.1);display:flex;align-items:center;justify-content:center;margin-bottom:14px;}
.kvp-mat-name{font-family:'Lato',sans-serif;font-size:15px;font-weight:700;color:#1A1A1A;margin-bottom:8px;display:block;}
.kvp-mat-safe{display:inline-flex;font-family:'Lato',sans-serif;font-size:10px;font-weight:700;color:#1a7a4a;background:#edfaf3;padding:4px 10px;border-radius:999px;margin-bottom:12px;}
.kvp-mat-p{font-family:'Lato',sans-serif;font-size:13px;color:#555;line-height:1.72;margin-bottom:0;display:block;}
.kvp-mat-tradeoff{font-family:'Lato',sans-serif;font-size:12px;color:#999;margin-top:10px;font-style:italic;display:block;}

/* ── INTERNAL LINK BOX ── */
.kvp-internal-link-box{background:#1A1A1A;border-radius:10px;padding:26px 28px;margin-top:32px;display:flex;align-items:center;gap:20px;}
.kvp-il-icon{width:46px;height:46px;border-radius:10px;background:rgba(232,64,28,0.25);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.kvp-il-text{display:flex;flex-direction:column;}
.kvp-il-label{font-family:'Lato',sans-serif;font-size:10px;font-weight:700;color:rgba(255,255,255,0.4);letter-spacing:0.1em;text-transform:uppercase;display:block;margin-bottom:6px;}
.kvp-il-title{font-family:'Lato',sans-serif;font-size:15px;font-weight:700;color:#fff;display:block;margin-bottom:12px;line-height:1.4;}
.kvp-il-btn{display:inline-block;background:#E8401C;color:#fff;font-family:'Lato',sans-serif;font-size:12px;font-weight:700;padding:10px 20px;border-radius:999px;text-decoration:none;}

/* ── FOOTER STRIP ── */
.kvp-blog-footer-strip{border-top:0.5px solid rgba(232,64,28,0.12);padding:22px 0;margin-top:44px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:14px;}
.kvp-bfs-disc{font-family:'Lato',sans-serif;font-size:12px;color:#aaa;line-height:1.6;}
.kvp-bfs-back{font-family:'Lato',sans-serif;font-size:13px;color:#E8401C;font-weight:700;text-decoration:none;}

/* ── MOBILE ── */
@media(max-width:768px){
  .kvp-blog-hero{padding:28px 20px 24px;}
  .kvp-blog-body{padding:32px 20px 60px;}
  .kvp-blog-h1{font-size:1.7rem;}
  .kvp-h2{font-size:22px;}
  .kvp-decode-grid{grid-template-columns:1fr;}
  .kvp-material-grid{grid-template-columns:1fr;}
  .kvp-internal-link-box{flex-direction:column;align-items:flex-start;gap:14px;}
  .kvp-blog-footer-strip{flex-direction:column;align-items:flex-start;}
}
</style>

<?php while ( have_posts() ) : the_post();
  $categories = get_the_category();
  $cat_name   = !empty($categories) ? esc_html($categories[0]->name) : 'Cookware Guides';
  $cat_link   = !empty($categories) ? esc_url(get_category_link($categories[0]->term_id)) : esc_url(home_url('/cookware-guides/'));
  $word_count = str_word_count(strip_tags(get_the_content()));
  $read_time  = max(1, ceil($word_count / 200));
?>

<div class="kvp-blog-wrap">

  <div class="kvp-blog-hero">
    <div class="kvp-blog-breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
      <span>›</span>
      <a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
      <span>›</span>
      <span style="opacity:0.9;"><?php the_title(); ?></span>
    </div>
    <div class="kvp-blog-cat-pill"><?php echo $cat_name; ?></div>
    <h1 class="kvp-blog-h1"><?php the_title(); ?></h1>
    <div class="kvp-blog-byline">
      <div class="kvp-blog-avatar">D</div>
      <div>
        <span class="kvp-blog-byline-name">Deborah</span>
        <span class="kvp-blog-byline-meta">Kitchen Researcher &amp; Product Analyst &middot; <?php echo esc_html(get_the_date('F Y')); ?> &middot; <?php echo $read_time; ?> min read</span>
      </div>
    </div>
  </div>

  <div class="kvp-blog-body">
    <a href="<?php echo $cat_link; ?>" class="kvp-back-link">&larr; Back to <?php echo $cat_name; ?></a>
    <?php the_content(); ?>
  </div>

</div>

<?php endwhile; ?>
<?php get_footer(); ?>
