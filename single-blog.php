<?php
/**
 * Template Name: Blog Post
 * Template Post Type: post
 */

get_header();

while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<!-- Hero: warm cream background, visually distinct from product review pages (#FFF8F5) -->
	<div style="background:#FFF0EB;padding:56px 24px 48px;text-align:center;">
		<h1 style="font-family:'Playfair Display',serif;font-size:clamp(1.75rem,4vw,2.5rem);line-height:1.3;color:#1A1A1A;max-width:720px;margin:0 auto 20px;font-weight:700;">
			<?php the_title(); ?>
		</h1>
		<p style="font-family:'Lato',sans-serif;font-size:14px;color:#555;margin:0;letter-spacing:0.02em;">
			By <strong style="color:#1A1A1A;">Deborah</strong>&nbsp;&middot;&nbsp;<?php echo esc_html( get_the_date() ); ?>
		</p>
	</div>

	<!-- Back link: below hero, left-aligned -->
	<div style="max-width:720px;margin:0 auto;padding:24px 24px 0;">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"
		   style="font-family:'Lato',sans-serif;font-size:14px;color:#E8401C;text-decoration:none;opacity:0.85;">
			&larr; Back to all articles
		</a>
	</div>

	<!-- Article content: single-column reading layout -->
	<div style="max-width:720px;margin:0 auto;padding:36px 24px 80px;">
		<div class="kvp-blog-content" style="font-family:'Lato',sans-serif;font-size:17px;line-height:1.75;color:#1A1A1A;">
			<?php the_content(); ?>
		</div>
	</div>

</article>

<?php endwhile;

get_footer();
