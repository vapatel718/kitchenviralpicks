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
	<div class="kvp-blog-hero" style="background:#FFF0EB;">
		<div class="kvp-blog-hero-inner">
			<?php
			$categories = get_the_category();
			$cat_name   = ! empty( $categories ) ? esc_html( $categories[0]->name ) : 'Cookware Guides';
			$cat_link   = ! empty( $categories ) ? get_category_link( $categories[0]->term_id ) : get_home_url() . '/cookware/';
			?>
			<nav class="kvp-blog-breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
				<span>›</span>
				<a href="<?php echo esc_url( $cat_link ); ?>"><?php echo $cat_name; ?></a>
			</nav>
			<span class="kvp-blog-cat-pill"><?php echo $cat_name; ?></span>
			<h1 class="kvp-blog-title" style="font-size:30px;line-height:1.25;font-family:'Playfair Display',serif;font-weight:600;color:#1A1A1A;"><?php the_title(); ?></h1>
			<div class="kvp-blog-byline">
				<div class="kvp-blog-avatar">D</div>
				<div>
					<span class="kvp-blog-byline-name">Deborah</span>
					<span class="kvp-blog-byline-meta">Kitchen Researcher &amp; Product Analyst &middot; <?php echo get_the_date( 'F Y' ); ?> &middot; 7 min read</span>
				</div>
			</div>
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
