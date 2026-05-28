# STATE.md — KitchenViralPicks

Last updated: 2026-05-28
Last commit: 05de78c — fix: roundup card eyebrow — reads kvp_card_picks from meta instead of hardcoded 4 picks

## Current Phase
Phase 7 — Content Growth

## Last Completed Task
- Global price registry complete — kvp_get_price() + kvp_get_price_key() added to functions.php. All 15 products registered as WP options on local and live. All prices, ratings, review counts updated to May 2026 Amazon data. Roundup card fixed to 5 picks. Live git conflict resolved via reset --hard.

## Next Task
- Content decision — Ninja AF101 review vs second Kettles/Bakeware article. Also fix KitchenAid body text ($439.95 → $449.99 in kvp_final_verdict and kvp_skip_if on Post 42/live).

## Known Issues
LIVE NOT YET DEPLOYED — SSH auth failed in Claude Code terminal. Run manually:

DEPLOY COMMAND:
ssh -p 65002 u834996894@157.173.208.147 "cd /home/u834996894/domains/kitchenviralpicks.com/public_html/wp-content/themes/kvp-theme && git pull origin main && wp cache flush --path=/home/u834996894/domains/kitchenviralpicks.com/public_html"

WP OPTIONS — register on live via SSH after deploy:
wp option update kvp_price_ninja_af101 "~$89.99" --path=/home/...
wp option update kvp_price_cosori_turboblaze "~$99.99" --path=/home/...
wp option update kvp_price_instant_vortex_plus "~$89.99" --path=/home/...
wp option update kvp_price_chefman_turbofry "~$49.99" --path=/home/...
wp option update kvp_price_dash_tasti_crisp "~$49.99" --path=/home/...
wp option add kvp_price_nordic_ware_half_sheet_pan "~$32.00" --path=/home/...
wp option add kvp_price_cuisinart_dutch_oven "~$59.99" --path=/home/...
wp option add kvp_price_ninja_blender_bn701 "~$99.99" --path=/home/...
wp option add kvp_price_kitchenaid_artisan_5qt "~$449.99" --path=/home/...
wp option add kvp_price_instant_pot_rio "~$119.99" --path=/home/...
wp option add kvp_price_lodge_enamel_braiser "~$79.99" --path=/home/...
wp option add kvp_price_cosori_electric_kettle "~$25.99" --path=/home/...
wp option add kvp_price_tramontina_frying_pan "~$28.99" --path=/home/...
wp option add kvp_price_carote_pots_pans "~$49.99" --path=/home/...
wp option add kvp_price_ninja_air_fryer_5qt "~$129.99" --path=/home/...
(replace /home/... with /home/u834996894/domains/kitchenviralpicks.com/public_html)

LOCAL badge pill also hardcoded: index.php line 217 has <?php esc_html_e( '4 picks', 'kvp-theme' ); ?> — fix separately if needed.

---

## CRITICAL — Correct Meta Keys for All Future Articles
Use ONLY these key names when publishing articles. Single.php reads these exact keys.

### Keys and formats:
| Key | Format | Notes |
|---|---|---|
| kvp_verdict_line | plain string | Short one-liner for hero score bar |
| kvp_final_verdict | plain string (one paragraph) | Used in Deborah block AND red verdict block |
| kvp_buy_if | newline-separated items | Parsed by kvp_split_lines() — NOT pipe-separated |
| kvp_skip_if | newline-separated items | Parsed by kvp_split_lines() — NOT pipe-separated |
| kvp_specs | Key\|Value per line, newline between rows | e.g. "Material\|Aluminum\nWeight\|1.5 lbs" |
| kvp_pros | pipe-separated items | e.g. "Item one\|Item two\|Item three" |
| kvp_cons | pipe-separated items | same format as kvp_pros |
| kvp_product_name | plain string | Full product name for score bar title |
| kvp_card_verdict | plain string | Triggers KVP Pick badge only — NOT the verdict line |
| kvp_price | plain string | e.g. "~$32.99" |
| kvp_rating | numeric | e.g. "4.7" |
| kvp_review_count | plain string | e.g. "48,000+" |
| kvp_amazon_url | URL | Full URL with affiliate tag |
| kvp_product_image | URL | Amazon image URL |

### WRONG keys — never use these again:
- kvp_buy_conditions → use kvp_buy_if
- kvp_skip_conditions → use kvp_skip_if
- kvp_spec_material / kvp_spec_* (individual) → use kvp_specs (unified Key\|Value format)
- kvp_card_verdict as verdict text → it only triggers the KVP badge, not the verdict line

## Live Server Status
Fully deployed and git-synced — live as of 2026-05-28. Live server on branch main, merge commit 77e8ccc. Git pull now unblocked. Roundup featured card live. Post 103 featured image live (kvp-roundup-hero.jpg). Post 107 (Nordic Ware Half Sheet Pan) live.

---

## Templates
header.php | approved
single.php | approved — updated 2026-05-28 (kvp_get_price_key explicit map)
single-roundup.php | approved — updated 2026-05-28 (kvp_get_price with $price_keys map for p1–p5 + toppick)
archive.php | approved — updated 2026-05-28 (kvp_get_price_key explicit map)
index.php | approved — updated 2026-05-28 (kvp_get_price_key; eyebrow line 213 reads kvp_card_picks from meta)
footer.php | approved
page.php | approved
page-contact.php | approved — all viewports (390px, 768px, 1280px)

---

## Published Articles
1  cosori-turboblaze    | published — Post ID 13
2  ninja-air-fryer-pro  | published — Post ID 14
3  carote-pots-pans     | published — Post ID 34, slug: carote-19-piece-pots-and-pans-set-review
4  tramontina-pan       | published — Post ID 36, slug: tramontina-12-inch-frying-pan-review
5  cosori-kettle        | published — Post ID 37, slug: cosori-electric-kettle-1-7l-review-2026 — 4.5★ / 47,807 reviews / $53.99
6  lodge-cast-iron      | published — Post ID 40, slug: lodge-essential-enamel-braiser-review-2026 — 4.7★ / 8,943 reviews / $79.90
7  instant-pot-rio      | published — Post ID 41, slug: instant-pot-7-5qt-rio-wide-review-2026 — 4.5★ / 5,856 reviews / $119.99
8  kitchenaid-artisan   | published — Post ID 42, slug: kitchenaid-artisan-5qt-stand-mixer-review-2026 — 4.7★ / 22,713 reviews / $439.95
9  ninja-bn701-blender  | published — Post ID 43, slug: ninja-bn701-professional-plus-blender-review-2026 — 4.7★ / 19,114 reviews / $109.99
10 cuisinart-dutch-oven | published — Post ID 44, slug: cuisinart-chefs-classic-enameled-cast-iron-dutch-oven-review-2026 — 4.6★ / 5,273 reviews / $129.50
11 roundup-air-fryers   | published LIVE — Local ID 83, Live ID 103, slug: air-fryers-under-100-most-reviewed — DEPLOYED 2026-05-25
12 instant-vortex-plus  | published LIVE — Local ID 86, Live ID 106, slug: instant-pot-vortex-plus-6qt-air-fryer-review — DEPLOYED 2026-05-27
13 nordic-ware-half-sheet | published LIVE — Local ID 90, Live ID 107, slug: nordic-ware-half-sheet-pan-review — 4.7★ / 34,000+ reviews / ~$32.00 — DEPLOYED 2026-05-27

---

## Affiliate Links — All Live
- Post 13 (COSORI TurboBlaze): live
- Post 14 (Ninja Air Fryer Pro): live
- Post 34 (CAROTE Pots and Pans): live
- Post 36 (Tramontina Frying Pan): live
- Post 37 (COSORI Electric Kettle): live
- Post 40 (Lodge Braiser): live
- Post 41 (Instant Pot RIO Wide): live
- Post 42 (KitchenAid Stand Mixer): live
- Post 43 (Ninja Blender): live
- Post 44 (Cuisinart Dutch Oven): live
- Post 103 (Roundup — Air Fryers Under $100): live
- Post 106 (Instant Pot Vortex Plus 6QT): live
- Post 107 (Nordic Ware Half Sheet Pan 2-Pack): live

## Pen Name
DEBORAH (never Rick, never anything else)

## Phase History
- Phase 7 in progress: Ninja review (Post 14) fully corrected on live, single.php updated + deployed, roundup (Post 103) live and approved
- Phase 7A complete: single-roundup.php built + deployed, roundup article live on Hostinger (Post 103)
- Phase 6 complete: 10 articles live, SEO'd, GA4 + Rank Math live, all indexing requests submitted, SSH resolved, all CSS deployed to live server, CONTENT_PLAN.md + RESEARCH_VAULT.md created (2026-05-24)
- Phase 5 complete: all 10 affiliate links live on Hostinger, dynamic homepage deployed
- Phase 3 complete: all pages built — Homepage, Single, Category, About, Contact, Privacy Policy, Affiliate Disclosure, Terms of Use

## Decisions Made 2026-05-24
- Blog section approved: /blog/ URL, single-blog.php template (to be built)
- Three content types confirmed: Single Reviews, Roundups, Blog/Guides
- Creators API (replaces retired PA-API v5): locked until 10 qualifying sales. Plugin skeleton to be built in parallel with content. Activate after credentials obtained.
- Immediate priority: publish June Week 1 roundup article first — every sale counts toward API unlock

## Decisions Made 2026-05-25 — Roundup Strategy Locked
- Roundup layout: Magazine hero + card stack hybrid
- Word count target: 2,800–3,200 words
- Deborah voice rule locked
- SiteStripe image method confirmed going forward
- Roundup publishes first (Option A) — three standalone reviews follow

### Roundup Button Mapping
- Ninja AF101 → Check price on Amazon (no review yet)
- Cosori TurboBlaze → Read full review (live)
- Instant Vortex Plus → Read full review (live — Post 106)
- Chefman TurboFry → Check price on Amazon (no review yet)
- Dash Tasti-Crisp → Check price on Amazon (no review yet)

### Templates Needed
- single-roundup.php (built, approved, deployed — 2026-05-25)
- single-blog.php (new — to be built)
- single.php already exists (approved)

### Content Queue (in order)
1. Roundup article — COMPLETE (live as Post 103)
2. Ninja AF101 review
3. Instant Vortex Plus review — COMPLETE (live as Post 106)
4. Chefman TurboFry review
5. Update roundup links (after reviews are live)
