<?php
/**
 * SENSARTE Ceramic Saute Pan — Post Creation Script
 * Run in Site Shell: wp eval-file tmp-sensarte-setup.php
 * Creates draft post + sets all custom fields + assigns category
 */

// Read the HTML content file (must be in same directory)
$content_file = __DIR__ . '/tmp-sensarte-content.html';
if (!file_exists($content_file)) {
    echo "ERROR: Content file not found at $content_file\n";
    exit(1);
}
$content = file_get_contents($content_file);
if (empty($content)) {
    echo "ERROR: Content file is empty\n";
    exit(1);
}

// Verify content checksum before proceeding
$hash = substr(hash('sha256', $content), 0, 16);
if ($hash !== '563b180bbc474aed') {
    echo "ERROR: Content checksum mismatch. Expected 563b180bbc474aed, got $hash\n";
    echo "The content file may have been modified. Aborting.\n";
    exit(1);
}
echo "Content checksum verified: $hash\n";

// Create the post as draft
$post_id = wp_insert_post([
    'post_title'   => 'SENSARTE Ceramic Saute Pan Review: What 13,041 Buyer Reviews Reveal',
    'post_content' => $content,
    'post_status'  => 'draft',
    'post_type'    => 'post',
    'post_name'    => 'sensarte-ceramic-saute-pan-review',
]);

if (is_wp_error($post_id)) {
    echo 'ERROR creating post: ' . $post_id->get_error_message() . "\n";
    exit(1);
}

echo "Post created as DRAFT — ID: $post_id\n";

// Set all custom fields
$meta = [
    'kvp_product_name'  => 'SENSARTE Nonstick Ceramic Saute Pan 12-Inch, 5QT with Lid',
    'kvp_price'         => '49.83',
    'kvp_rating'        => '4.6',
    'kvp_review_count'  => '13,041+',
    'kvp_capacity'      => '5 Qt',
    'kvp_amazon_url'    => 'https://www.amazon.com/SENSARTE-Nonstick-Non-toxic-Induction-Compatible/dp/B0BZCTLMBF?ie=UTF8&th=1&linkCode=ll2&tag=kitchenviralp-20&linkId=7944d8655059da87486f7d3215ea9a18&language=en_US&ref_=as_li_ss_tl',
    'kvp_product_image' => 'https://m.media-amazon.com/images/I/71qEnpEKyHL._AC_SL1500_.jpg',
    'kvp_verdict_line'  => 'The best ceramic saute pan under $50 — if you treat the lid gently and keep the heat at medium.',
    'kvp_card_verdict'  => 'PFAS-free 5QT ceramic saute pan with 13,000+ reviews and induction support.',
    'kvp_buy_if'        => 'You want a deep, do-everything ceramic pan on any stovetop — induction included — for under $50.',
    'kvp_skip_if'       => 'You expect nonstick to survive high heat and dishwasher abuse for years — ceramic coatings don\'t.',
    'kvp_best_for'      => 'Health-conscious home cooks who want one versatile PFAS-free pan instead of a full set.',
    'kvp_final_verdict' => 'Deborah analyzed data across 13,041 verified Amazon buyer reviews — with particular attention to the 327 one-star reviews — and the picture is consistent: the SENSARTE 12-Inch Ceramic Saute Pan delivers the best nonstick performance and versatility available under $50, confirmed at a scale few pans can match. The trade-offs are real: a ceramic coating that realistically lasts one to two years even with good care, a glass lid that demands gentle handling, and a small QC lottery worth checking in week one. Buy it if you want one deep, PFAS-conscious pan that does nearly everything on any stovetop and you accept the coating as a consumable. Skip it if you expect a decade of high-heat, dishwasher-friendly service — that\'s cast iron or stainless territory.',
    'kvp_pros'          => 'Genuinely slick ceramic nonstick with minimal oil|Rivet-free interior wipes clean in seconds|Works on every stovetop including induction|5QT depth handles frying, sauces, and one-pan dinners|Stable $43–$50 price, often dips to ~$44',
    'kvp_cons'          => 'Coating lifespan is ceramic\'s weak spot — realistically a 1–2 year pan|Glass lid and handle hardware draw scattered but serious complaints|QC lottery on arrival condition and pan flatness|Customer service draws consistent complaints',
    'kvp_specs'         => 'Brand|SENSARTE|Capacity|5 Quarts|Diameter|12 inches|Body|Cast aluminum|Base|Stainless steel (induction)|Coating|Ceramic nonstick, PFAS/PFOA/PTFE free|Lid|Tempered glass|Oven Safe|Up to 550°F|Weight|6.0 lbs|Model|SJ7',
];

$success = 0;
$fail = 0;
foreach ($meta as $key => $value) {
    $result = update_post_meta($post_id, $key, $value);
    if ($result === false) {
        echo "FAILED: $key\n";
        $fail++;
    } else {
        $success++;
    }
}

// Assign category by slug
$term_result = wp_set_post_terms($post_id, ['cookware'], 'category');
if (is_wp_error($term_result)) {
    echo 'Category assignment FAILED: ' . $term_result->get_error_message() . "\n";
} else {
    echo "Category 'cookware' assigned.\n";
}

echo "\nDONE — $success meta fields set, $fail failed.\n";
echo "Post ID: $post_id\n";
echo "Slug: sensarte-ceramic-saute-pan-review\n";
echo "Status: DRAFT\n";
echo "\nNEXT STEPS:\n";
echo "1. Preview at: /sensarte-ceramic-saute-pan-review/ (or ?p=$post_id&preview=true)\n";
echo "2. Verify desktop + iPhone\n";
echo "3. If good: wp post update $post_id --post_status=publish\n";
