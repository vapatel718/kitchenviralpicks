<?php
/**
 * Template Name: Default Page
 * The template for displaying all static pages.
 */

get_header();
?>


<main class="page-wrapper">
    <div class="page-container">

        <?php while ( have_posts() ) : the_post(); ?>

            <h1 class="page-title"><?php the_title(); ?></h1>
            <hr class="page-title-underline">

            <div class="page-content">
                <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

    </div>
</main>

<?php get_footer();
