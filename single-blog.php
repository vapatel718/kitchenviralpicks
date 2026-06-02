<?php
/**
 * Template Name: Blog Post
 * Template Post Type: post
 */

get_header();

while ( have_posts() ) : the_post();

	$cats    = get_the_category();
	$eyebrow = $cats ? $cats[0]->name : __( 'Non-Toxic Cookware', 'kvp-theme' );
	$excerpt = get_the_excerpt();

?>
<main id="kvp-blog-main">
<div class="kvp-blog-wrap">

	<!-- HERO -->
	<div class="kvp-blog-hero">
		<div class="kvp-blog-hero-inner">
			<span class="kvp-blog-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
			<h1 class="kvp-blog-title"><?php the_title(); ?></h1>
			<?php if ( $excerpt ) : ?>
			<p class="kvp-blog-excerpt"><?php echo esc_html( $excerpt ); ?></p>
			<?php endif; ?>
		</div>
	</div>

	<!-- CONTENT -->
	<div class="kvp-blog-content-wrap">
		<div class="kvp-blog-content">
			<?php the_content(); ?>
		</div>
	</div>

</div>
</main>

<?php endwhile; ?>
<?php get_footer();
