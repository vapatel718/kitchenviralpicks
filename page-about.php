<?php
/**
 * Template Name: About
 * About page — Deborah's story and research method.
 */

get_header();
?>

<main id="kvp-about-main">

    <!-- ================================================================
         SECTION 1 — HERO
         ================================================================ -->
    <div class="kvp-about-hero">
        <div class="kvp-about-wrap">
            <div class="kvp-about-hero-grid">

                <div class="kvp-about-photo-col">
                    <div class="kvp-about-photo">
                        <img src="https://kitchenviralpicks.com/wp-content/uploads/2026/05/deborah-author-kitchenviralpicks.jpg.jpg" alt="Deborah — Kitchen Researcher and Product Analyst" style="width:100%;height:100%;object-fit:cover;border-radius:50%;" />
                    </div>
                </div>

                <div class="kvp-about-hero-right">
                    <p class="kvp-about-eyebrow"><?php _e( 'FOUNDER &amp; CURATOR', 'kvp-theme' ); ?></p>
                    <h1 class="kvp-about-name"><?php _e( 'Deborah', 'kvp-theme' ); ?></h1>
                    <p class="kvp-about-job-title"><?php _e( 'Kitchen Researcher &amp; Product Analyst', 'kvp-theme' ); ?></p>
                    <div class="kvp-about-trust">
                        <span class="kvp-about-trust-item">
                            <span class="kvp-about-trust-dot" aria-hidden="true"></span>
                            <?php _e( 'Every pick is research-backed', 'kvp-theme' ); ?>
                        </span>
                        <span class="kvp-about-trust-item">
                            <span class="kvp-about-trust-dot" aria-hidden="true"></span>
                            <?php _e( '5-point rating system', 'kvp-theme' ); ?>
                        </span>
                        <span class="kvp-about-trust-item">
                            <span class="kvp-about-trust-dot" aria-hidden="true"></span>
                            <?php _e( '100% independent', 'kvp-theme' ); ?>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ================================================================
         SECTION 2 — STORY
         ================================================================ -->
    <div class="kvp-about-story">
        <div class="kvp-about-wrap kvp-about-wrap--narrow">
            <h2 class="kvp-about-section-h2"><?php _e( 'Why I Started This Site', 'kvp-theme' ); ?></h2>
            <div class="kvp-about-red-rule" aria-hidden="true"></div>
            <p class="kvp-about-body-text">
                <?php _e( 'I started KitchenViralPicks.com after one too many disappointing purchases. A pan that warped after three uses. An air fryer that looked great in photos and arrived feeling cheap. I kept spending money on kitchen gear that influencers loved and real cooks returned.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <?php _e( 'So I built the site I wished existed. Every review here is built from hundreds of verified buyer reviews, real ratings data, and independent research. No brand pays me to say nice things. No products are sent to me for free. If something has problems, I tell you. My only job is helping you spend your money wisely.', 'kvp-theme' ); ?>
            </p>
        </div>
    </div>

    <!-- ================================================================
         SECTION 3 — HOW EVERY REVIEW IS BUILT
         ================================================================ -->
    <div class="kvp-about-method">
        <div class="kvp-about-wrap">
            <h2 class="kvp-about-section-h2"><?php _e( 'How Every Review Is Built', 'kvp-theme' ); ?></h2>
            <div class="kvp-about-red-rule" aria-hidden="true"></div>
            <div class="kvp-about-steps">

                <div class="kvp-about-step">
                    <span class="kvp-about-step-num" aria-hidden="true">01</span>
                    <h3 class="kvp-about-step-h3"><?php _e( 'Read the verified reviews', 'kvp-theme' ); ?></h3>
                    <p class="kvp-about-step-text">
                        <?php _e( 'I start with hundreds of verified buyer reviews on Amazon &#8212; not just the five-star ones. I look for patterns: what breaks, what surprises people, what they wish they&#8217;d known before buying.', 'kvp-theme' ); ?>
                    </p>
                </div>

                <div class="kvp-about-step">
                    <span class="kvp-about-step-num" aria-hidden="true">02</span>
                    <h3 class="kvp-about-step-h3"><?php _e( 'Cross-check the specs', 'kvp-theme' ); ?></h3>
                    <p class="kvp-about-step-text">
                        <?php _e( 'I compare what the manufacturer claims against what buyers actually report. Capacity, materials, wattage, warranty &#8212; I pull the data from the product page and hold it next to real-world feedback.', 'kvp-theme' ); ?>
                    </p>
                </div>

                <div class="kvp-about-step">
                    <span class="kvp-about-step-num" aria-hidden="true">03</span>
                    <h3 class="kvp-about-step-h3"><?php _e( 'Write the honest verdict', 'kvp-theme' ); ?></h3>
                    <p class="kvp-about-step-text">
                        <?php _e( 'If a product has a recurring complaint, it goes in the cons section. No brand relationship changes what I write. The goal is simple: give you a clear picture so you can decide for yourself.', 'kvp-theme' ); ?>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- ================================================================
         SECTION 4 — BROWSE REVIEWS CTA
         ================================================================ -->
    <div class="kvp-about-cta-section">
        <div class="kvp-about-wrap kvp-about-wrap--narrow">
            <div class="kvp-about-cta-box">
                <p class="kvp-about-cta-heading"><?php _e( 'Ready to find your next kitchen pick?', 'kvp-theme' ); ?></p>
                <p class="kvp-about-cta-sub"><?php _e( 'Every review is built from real buyer data. Browse the categories and find gear worth buying.', 'kvp-theme' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="kvp-about-cta-btn">
                    <?php _e( 'Browse all reviews', 'kvp-theme' ); ?>
                </a>
            </div>
        </div>
    </div>

</main>

<?php get_footer();
