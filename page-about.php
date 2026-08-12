<?php
/**
 * Template Name: About
 * About page — KVP niche positioning and Deborah's rating methodology.
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
                    <p class="kvp-about-eyebrow"><?php esc_html_e( 'LEAD RESEARCHER', 'kvp-theme' ); ?></p>
                    <h1 class="kvp-about-name"><?php esc_html_e( 'Deborah', 'kvp-theme' ); ?></h1>
                    <p class="kvp-about-job-title"><?php esc_html_e( 'Kitchen Researcher & Product Analyst', 'kvp-theme' ); ?></p>
                    <div class="kvp-about-trust">
                        <span class="kvp-about-trust-item">
                            <span class="kvp-about-trust-dot" aria-hidden="true"></span>
                            <?php esc_html_e( 'Every safety claim source-verified', 'kvp-theme' ); ?>
                        </span>
                        <span class="kvp-about-trust-item">
                            <span class="kvp-about-trust-dot" aria-hidden="true"></span>
                            <?php esc_html_e( '5-criteria rating system', 'kvp-theme' ); ?>
                        </span>
                        <span class="kvp-about-trust-item">
                            <span class="kvp-about-trust-dot" aria-hidden="true"></span>
                            <?php esc_html_e( 'Zero sponsored reviews', 'kvp-theme' ); ?>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ================================================================
         SECTION 2 — WHAT WE COVER
         ================================================================ -->
    <div class="kvp-about-story">
        <div class="kvp-about-wrap kvp-about-wrap--narrow">
            <h2 class="kvp-about-section-h2"><?php esc_html_e( 'What We Cover — and Why It Matters', 'kvp-theme' ); ?></h2>
            <div class="kvp-about-red-rule" aria-hidden="true"></div>
            <p class="kvp-about-body-text">
                <?php esc_html_e( 'KitchenViralPicks is a cookware review site focused on one thing: helping you find cookware that is safe for your family.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <?php esc_html_e( 'We cover cast iron, carbon steel, ceramic coated, and stainless steel cookware — materials that do not rely on PFAS, PFOA, or PTFE coatings. Every product we review is evaluated through the lens of safety first, with performance and value close behind.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <?php esc_html_e( 'We do not cover every kitchen gadget. We do not chase trends. We research non-toxic cookware because the choices you make here affect what ends up in your food, and most review sites treat that as an afterthought.', 'kvp-theme' ); ?>
            </p>
        </div>
    </div>

    <!-- ================================================================
         SECTION 3 — MEET DEBORAH
         ================================================================ -->
    <div class="kvp-about-story">
        <div class="kvp-about-wrap kvp-about-wrap--narrow">
            <h2 class="kvp-about-section-h2"><?php esc_html_e( 'Meet Deborah', 'kvp-theme' ); ?></h2>
            <div class="kvp-about-red-rule" aria-hidden="true"></div>
            <p class="kvp-about-body-text">
                <?php esc_html_e( 'Deborah leads product research at KitchenViralPicks. Her process is built on data, not opinion. For every product review, she analyzes hundreds to thousands of verified Amazon buyer reviews, identifies complaint patterns and satisfaction signals, cross-references manufacturer safety claims against primary sources, and distills all of it into a structured rating you can actually use.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <?php esc_html_e( 'What Deborah does not do is just as important. She does not claim to have tested products in a kitchen. She does not present personal anecdotes as evidence. When she writes that a ceramic coating shows signs of degradation after 8 to 12 months, that finding comes from analyzing patterns across verified buyer reports — not from a single experience.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <?php esc_html_e( 'This approach exists for a reason: one person cooking with a pan three times tells you almost nothing. Thousands of buyers using it daily for months tells you everything.', 'kvp-theme' ); ?>
            </p>
        </div>
    </div>

    <!-- ================================================================
         SECTION 4 — HOW THE RATING SYSTEM WORKS
         ================================================================ -->
    <div class="kvp-about-method">
        <div class="kvp-about-wrap">
            <h2 class="kvp-about-section-h2"><?php esc_html_e( 'How Deborah\'s Rating System Works', 'kvp-theme' ); ?></h2>
            <div class="kvp-about-red-rule" aria-hidden="true"></div>
            <p class="kvp-about-body-text" style="max-width:680px;margin:0 auto 2.5rem;">
                <?php esc_html_e( 'Every cookware product we review receives a Deborah\'s Rating — a score from 0.0 to 10.0 calculated across five weighted criteria. The weights reflect what matters most when you are choosing cookware you will use every day and trust around your family.', 'kvp-theme' ); ?>
            </p>
            <div class="kvp-about-steps">

                <div class="kvp-about-step">
                    <span class="kvp-about-step-num" aria-hidden="true">30%</span>
                    <h3 class="kvp-about-step-h3"><?php esc_html_e( 'Safety & Materials', 'kvp-theme' ); ?></h3>
                    <p class="kvp-about-step-text">
                        <?php esc_html_e( 'This carries the most weight because it is the reason this site exists. We verify every safety claim — PFAS-free, PFOA-free, PTFE-free — against the manufacturer\'s own documentation, regulatory filings, or third-party lab results. Never from Amazon listing copy alone. Products with independently verified safety credentials score highest.', 'kvp-theme' ); ?>
                    </p>
                </div>

                <div class="kvp-about-step">
                    <span class="kvp-about-step-num" aria-hidden="true">25%</span>
                    <h3 class="kvp-about-step-h3"><?php esc_html_e( 'Buyer Satisfaction Signal', 'kvp-theme' ); ?></h3>
                    <p class="kvp-about-step-text">
                        <?php esc_html_e( 'We analyze verified buyer reviews at scale to understand what real owners experience after weeks and months of use. This is not a star rating average — it is a structured assessment of satisfaction patterns, repeat-purchase indicators, and the ratio of substantive praise to substantive complaints. A product with deeply consistent positive feedback can outscore a higher-rated product with polarized reviews.', 'kvp-theme' ); ?>
                    </p>
                </div>

                <div class="kvp-about-step">
                    <span class="kvp-about-step-num" aria-hidden="true">20%</span>
                    <h3 class="kvp-about-step-h3"><?php esc_html_e( 'Longevity & Durability', 'kvp-theme' ); ?></h3>
                    <p class="kvp-about-step-text">
                        <?php esc_html_e( 'Cookware is a daily-use tool. We weight durability heavily because a pan that performs beautifully for three months and deteriorates by month eight is not a recommendation — it is a warning. We track complaint frequency around coating degradation, handle loosening, warping, and other failure modes, and assess how durability patterns change over time.', 'kvp-theme' ); ?>
                    </p>
                </div>

                <div class="kvp-about-step">
                    <span class="kvp-about-step-num" aria-hidden="true">15%</span>
                    <h3 class="kvp-about-step-h3"><?php esc_html_e( 'Value for Price', 'kvp-theme' ); ?></h3>
                    <p class="kvp-about-step-text">
                        <?php esc_html_e( 'We evaluate whether what you are paying matches what you are getting. A 45-dollar pan that delivers 90 percent of the performance of a 200-dollar set scores well here. We check price stability over time and factor in what is included — a 16-piece set at 100 dollars carries different value math than a single skillet at 100 dollars.', 'kvp-theme' ); ?>
                    </p>
                </div>

                <div class="kvp-about-step">
                    <span class="kvp-about-step-num" aria-hidden="true">10%</span>
                    <h3 class="kvp-about-step-h3"><?php esc_html_e( 'Ease of Use', 'kvp-theme' ); ?></h3>
                    <p class="kvp-about-step-text">
                        <?php esc_html_e( 'This covers cooktop compatibility (gas, electric, induction), weight and handling, cleaning and maintenance requirements, and oven-safe temperature limits. It is weighted lowest because most cookware in our niche handles reasonably well — but products with standout versatility earn meaningful points here.', 'kvp-theme' ); ?>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- ================================================================
         SECTION 5 — WHAT THE SCORES MEAN
         ================================================================ -->
    <div class="kvp-about-story">
        <div class="kvp-about-wrap kvp-about-wrap--narrow">
            <h2 class="kvp-about-section-h2"><?php esc_html_e( 'What the Scores Mean', 'kvp-theme' ); ?></h2>
            <div class="kvp-about-red-rule" aria-hidden="true"></div>
            <p class="kvp-about-body-text">
                <strong><?php esc_html_e( '9.0 and above — Highly Recommended.', 'kvp-theme' ); ?></strong>
                <?php esc_html_e( 'Exceptional across all criteria. Very few products reach this level.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <strong><?php esc_html_e( '8.0 to 8.9 — Recommended.', 'kvp-theme' ); ?></strong>
                <?php esc_html_e( 'Strong across the board with no major weaknesses. A confident purchase.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <strong><?php esc_html_e( '7.0 to 7.9 — Solid Choice.', 'kvp-theme' ); ?></strong>
                <?php esc_html_e( 'Good product with some trade-offs. Right for specific buyers and use cases.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <strong><?php esc_html_e( '6.0 to 6.9 — Consider Alternatives.', 'kvp-theme' ); ?></strong>
                <?php esc_html_e( 'Notable weaknesses. Better options likely exist at the same price.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <strong><?php esc_html_e( 'Below 6.0 — Skip.', 'kvp-theme' ); ?></strong>
                <?php esc_html_e( 'Significant concerns in safety, durability, or value.', 'kvp-theme' ); ?>
            </p>
        </div>
    </div>

    <!-- ================================================================
         SECTION 6 — EDITORIAL STANDARDS
         ================================================================ -->
    <div class="kvp-about-story">
        <div class="kvp-about-wrap kvp-about-wrap--narrow">
            <h2 class="kvp-about-section-h2"><?php esc_html_e( 'Our Editorial Standards', 'kvp-theme' ); ?></h2>
            <div class="kvp-about-red-rule" aria-hidden="true"></div>
            <p class="kvp-about-body-text">
                <strong><?php esc_html_e( 'No sponsored reviews.', 'kvp-theme' ); ?></strong>
                <?php esc_html_e( 'No brand has ever paid for coverage or influenced a rating on this site.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <strong><?php esc_html_e( 'Every safety claim is source-verified.', 'kvp-theme' ); ?></strong>
                <?php esc_html_e( 'If we say a product is PFAS-free, we have confirmed it against the manufacturer\'s published materials or third-party testing — not marketing copy.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <strong><?php esc_html_e( 'Buyer data is the foundation.', 'kvp-theme' ); ?></strong>
                <?php esc_html_e( 'Our analysis draws from verified purchase reviews, not press samples or influencer kits.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <strong><?php esc_html_e( 'Affiliate transparency.', 'kvp-theme' ); ?></strong>
                <?php esc_html_e( 'KitchenViralPicks earns a commission when you purchase through our Amazon affiliate links. This never affects which products we recommend or how we score them. Products that do not meet our standards do not get recommended, regardless of commission potential.', 'kvp-theme' ); ?>
            </p>
        </div>
    </div>

    <!-- ================================================================
         SECTION 7 — WHY NON-TOXIC COOKWARE
         ================================================================ -->
    <div class="kvp-about-story">
        <div class="kvp-about-wrap kvp-about-wrap--narrow">
            <h2 class="kvp-about-section-h2"><?php esc_html_e( 'Why Non-Toxic Cookware?', 'kvp-theme' ); ?></h2>
            <div class="kvp-about-red-rule" aria-hidden="true"></div>
            <p class="kvp-about-body-text">
                <?php esc_html_e( 'Research over the past decade has raised serious questions about PFAS — per- and polyfluoroalkyl substances — used in traditional nonstick coatings. These chemicals are persistent in the environment and in the human body, and regulatory scrutiny is increasing globally. The EPA, FDA, and European regulators have all taken steps to evaluate or restrict certain PFAS compounds in consumer products.', 'kvp-theme' ); ?>
            </p>
            <p class="kvp-about-body-text">
                <?php esc_html_e( 'We are not here to create panic. We are here to give you the data so you can make an informed choice. If you are looking for cookware free of these chemicals — and you want to know which products actually deliver on that promise — that is exactly what KitchenViralPicks is built for.', 'kvp-theme' ); ?>
            </p>
        </div>
    </div>

    <!-- ================================================================
         SECTION 8 — CTA
         ================================================================ -->
    <div class="kvp-about-cta-section">
        <div class="kvp-about-wrap kvp-about-wrap--narrow">
            <div class="kvp-about-cta-box">
                <p class="kvp-about-cta-heading"><?php esc_html_e( 'Find cookware you can trust', 'kvp-theme' ); ?></p>
                <p class="kvp-about-cta-sub"><?php esc_html_e( 'Every review is built from verified buyer data and independently verified safety claims. Browse the reviews and find non-toxic cookware worth buying.', 'kvp-theme' ); ?></p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="kvp-about-cta-btn">
                    <?php esc_html_e( 'Browse all reviews', 'kvp-theme' ); ?>
                </a>
            </div>
        </div>
    </div>

</main>

<?php get_footer();
