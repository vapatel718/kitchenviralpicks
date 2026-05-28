# STATE.md — KitchenViralPicks

Last updated: 2026-05-27
Last commit: fix: correct review count 48k→34k and price 32.99→32.00 on Post 90 Nordic Ware

## Current Phase
Phase 7 — Content Growth

## Last Completed Task
Post 90 Nordic Ware — data corrected 2026-05-27 (DB changes):
- kvp_review_count: 48,000+ → 34,000+
- kvp_price: ~$32.99 → ~$32.00
- post_content: two instances of "48,000" replaced with "34,000" (intro paragraph + h2 heading)
- kvp_final_verdict: "48,000" replaced with "34,000"
- kvp_card_verdict: clean, no changes needed
Article fully verified — all fields and content confirmed correct.

## Next Task
Deploy Post 90 to live Hostinger server via SSH.

## Known Issues
Roundup Post 103 on live has no featured image set yet — waiting for original photography. Temporary Pexels placeholder set on local only (attachment 85).

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
Fully deployed — live at commit 70f0172 as of 2026-05-27. Category icon SVG overhaul + card styling deployed. Post 106 (Instant Pot Vortex Plus 6QT) live.

---

## Templates
header.php | approved
single.php | approved — updated 2026-05-27 (Pack Size fourth metric added; content safeguard filter; kvp_product_image score bar support)
single-roundup.php | approved — committed 2026-05-25, deployed to live 2026-05-25
archive.php | approved
index.php | approved — updated 2026-05-27 (outline-only category SVG icons — local only, deploy pending)
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
13 nordic-ware-half-sheet | published LOCAL ONLY — Post ID 90, slug: nordic-ware-half-sheet-pan-review — 4.7★ / 34,000+ reviews / ~$32.00 — 2026-05-27

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
