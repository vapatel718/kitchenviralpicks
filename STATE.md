# ARTICLE CONTENT RULES — PERMANENT — DO NOT REMOVE
These rules apply to every article published on KVP without exception.

POST CONTENT (post_content) contains ONLY:
- Intro paragraphs
- Narrative H2 and H3 sections (what it is, buyer insights, care guides, comparisons)
- HTML tables for comparison sections
- Plain prose paragraphs
- NO specs tables using the kvp specs field data
- NO buy it if / skip it if sections
- NO verdict paragraphs
- NO pros and cons lists
- NO final verdict text

CUSTOM FIELDS contain ALL structured sections:
- kvp_verdict_line — one sentence for hero card
- kvp_buy_if — newline separated, one item per line
- kvp_skip_if — newline separated, one item per line
- kvp_pros — newline separated, one item per line
- kvp_cons — newline separated, one item per line
- kvp_specs — Key:Value format, one pair per line
- kvp_final_verdict — full paragraph for Deborah block and red verdict block
- kvp_capacity — fourth metrics tile value (weight, capacity, or key spec)

PRICE FORMAT — always store as numeric only, no dollar sign, no tilde:
- CORRECT: 24.32
- WRONG: ~$24.32 or $24.32

single.php renders the dollar sign and tilde automatically.
Never add formatting to the price field value.

NEVER append to post_content after initial creation.
ALWAYS set post_content in one complete command.
ALWAYS verify with grep after setting to confirm no structured sections leaked in.

---

# STATE.md — KitchenViralPicks

Last updated: June 21, 2026
Last commit: chore: STATE.md — GreenPan post 147 published on local, sync confirmed

## Current Phase
Phase 7 — Content Growth

## Last Session
SESSION END — 2026-06-21
COMPLETED THIS SESSION:
- Post 147 (GreenPan Valencia Pro Review) published on local — was stuck as draft from June 19 session
- wp post update 147 --post_status=publish
- wp post term set 147 category cookware
- Local now matches live: 8 articles in Cookware category, both environments in sync

SESSION END — 2026-06-19
COMPLETED THIS SESSION:
- GreenPan Valencia Pro Review created as draft (Post ID 147, local only)
- post_name: greenpan-valencia-pro-review
- All 19 kvp_* and rank_math_* custom fields set via WordPress PHP bootstrap
- Category: Cookware (term_id=4)
- Author: Deborah (user ID 2)
- Rank Math SEO configured (focus keyword: GreenPan Valencia Pro Review)
- Internal links to GreenLife (/greenlife-cookware-review/) and SENSARTE (/sensarte-ceramic-saute-pan-review/) confirmed in post_content
- Post status: draft — pending local browser verification before publish

SESSION END — 2026-06-14 (session 2)
FIXES COMPLETED THIS SESSION:
- All 18 posts reassigned to author Deborah (user ID 2) on local and live (commit 764983b)
- Post 81 (test fixture) trashed on local — did not exist on live
- functions.php: kvp_get_top_pick() weighted top-pick helper added — auto-crowns most
  credible product per category by composite score (rating × log(review_count)) (commit 764983b)
- archive.php: author-aware rewrite — banner suppressed, heading reads "Articles by Deborah",
  guide-aware buttons ("Read guide" vs "Read review") (commit 764983b)
- single.php, single-blog.php, single-roundup.php: Deborah byline now links to
  /author/deborah/ across all three post templates (commit 1c0f2d1)
- Lodge confirmed as Top Pick on category archive. Clickable byline verified on live iPhone.
- Cache purged. No open bugs.

SESSION END — 2026-06-14 (session 1)
FIXES COMPLETED THIS SESSION:
- STATE.md updated to June 14 reality; tmp-sensarte files deleted (commit 6307356)
- single.php: two dead reads removed — kvp_best_for and kvp_skip_if_detail (commit 6064b08)
- style.css: kvp-internal-link box stripped — background/padding/border-radius removed,
  clean bold-red underline unified across all post types (commit 17427f5)
- Post 131/117 (Is Ceramic Cookware Safe?): two plain links classed kvp-internal-link (#2);
  SENSARTE back-link inserted end of Section 06 (#3)
- Post 123/114 (GreenLife review): SENSARTE single-pan back-link inserted after
  data-confidence paragraph (#3)
- Post 138/122 (SENSARTE review): three plain internal links classed kvp-internal-link
- All changes verified local + live. Scripts deleted both environments. Cache purged.

CRITICAL LESSON — INTERNAL LINK STYLING:
- kvp-internal-link is a global class (style.css loads on all post types).
- The cream box (background/padding/border-radius) caused detached punctuation and
  inconsistent rendering across post types. Stripped permanently June 14.
- Standard: red (#E8401C), bold (700), underline only. No box ever again.

## Last Completed Task
GreenPan Valencia Pro Review (Post 147) published and category-assigned on local.
Local now matches live (8 articles in Cookware category).
- Post 147 was created as draft during June 19 session 2 but never published locally or assigned to Cookware category
- Ran wp post update 147 --post_status=publish
- Ran wp post term set 147 category cookware
- Local and live now in sync

## Next Task
Pillar: Best Non-Toxic Ceramic Cookware (July 2026, first of 4/month pace)

## Content Strategy — Locked May 30, 2026
Micro-niche: Healthy Non-Toxic Cookware
Target materials: cast iron, carbon steel, ceramic coated, stainless steel
Key signals: PFAS-free, PFOA-free, PTFE-free
Audience: health-conscious buyers with high purchase intent

Three content tiers (Income School model):
- Response posts: 2,500+ words — informational, topical authority, no affiliate links
- Staple posts: 1,800–2,200 words — individual product reviews, money pages
- Pillar posts: 2,800–3,200 words — roundups

Publish order: Response first → Staple → Pillar
Cadence: 1–3 articles/month, quality over volume

Content queue: See CONTENT_PLAN.md Active Pipeline (locked June 9, 2026).
Next article: 3rd ceramic Staple (likely GreenPan), pending Ahrefs data.

## Known Issues
- None. All 18 posts unified under Deborah. No open bugs.

## Pending — No Blocker
- June Week 2 keyword approval (non-toxic cookware angle)
- Quarterly content refresh first due 2026-08-24
- Creators API plugin activation after 10 qualifying sales (PA-API v5 retired May 15, 2026)

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
| kvp_specs | Key\|Value per line, newline between rows | e.g. "Material\|Cast Iron\nWeight\|5 lbs" |
| kvp_pros | pipe-separated items | e.g. "Item one\|Item two\|Item three" |
| kvp_cons | pipe-separated items | same format as kvp_pros |
| kvp_product_name | plain string | Full product name for score bar title |
| kvp_card_verdict | plain string | Triggers KVP Pick badge only — NOT the verdict line |
| kvp_price | numeric only — no $ no ~ | e.g. 24.90 not ~$24.90 |
| kvp_rating | numeric | e.g. "4.7" |
| kvp_review_count | plain string | e.g. "164,000+" |
| kvp_amazon_url | URL | Full URL with affiliate tag |
| kvp_product_image | URL | Amazon image URL |

### WRONG keys — never use these:
- kvp_buy_conditions → use kvp_buy_if
- kvp_skip_conditions → use kvp_skip_if
- kvp_spec_material / kvp_spec_* (individual) → use kvp_specs (unified Key\|Value format)
- kvp_card_verdict as verdict text → it only triggers the KVP Badge, not the verdict line

---

## Live Server Status
All changes deployed via git pull origin/main.
Last confirmed live commit: 1c0f2d1 (2026-06-14).
Cache purged after each deploy. No pending deploys.

---

## Templates
header.php | approved
single.php | approved — updated 2026-05-28
single-roundup.php | approved — updated 2026-05-28
single-blog.php | approved ✅ — deployed 2026-06-03
archive.php | approved — updated 2026-05-28
index.php | approved — updated 2026-05-28
footer.php | approved
page.php | approved
page-contact.php | approved

---

## Published Articles
| # | Slug | Post ID (local/live) | Status |
|---|---|---|---|
| 1 | cosori-turboblaze | 13 / 13 | live ✅ |
| 2 | ninja-air-fryer-pro (AF141) | 14 / 14 | live ✅ |
| 3 | carote-19-piece-pots-and-pans | 34 / 34 | live ✅ |
| 4 | tramontina-12-inch-frying-pan | 36 / 36 | live ✅ |
| 5 | cosori-electric-kettle-1-7l | 37 / 37 | live ✅ |
| 6 | lodge-essential-enamel-braiser | 40 / 40 | live ✅ |
| 7 | instant-pot-7-5qt-rio-wide | 41 / 41 | live ✅ |
| 8 | kitchenaid-artisan-5qt-stand-mixer | 42 / 42 | live ✅ — $449.99 confirmed May 31 |
| 9 | ninja-bn701-professional-plus-blender | 43 / 43 | live ✅ |
| 10 | cuisinart-chefs-classic-dutch-oven | 44 / 44 | live ✅ |
| 11 | air-fryers-under-100-most-reviewed (roundup) | 83 / 103 | live ✅ |
| 12 | instant-pot-vortex-plus-6qt | 86 / 106 | live ✅ |
| 13 | nordic-ware-half-sheet-pan | 90 / 107 | live ✅ — GSC submitted 2026-05-31 |
| 14 | lodge-cast-iron-skillet-review | 99 / 110 | live ✅ — published 2026-05-31 |
| 15 | what-is-non-toxic-cookware | 108 / 112 | live ✅ — Category: assigned ✅ — Rank Math: set ✅ — GSC: submitted and indexed ✅ |
| 16 | greenlife-cookware-review | 123 / 114 | live ✅ — GSC: submitted 2026-06-05 |
| 17 | is-ceramic-cookware-safe | 131 / 117 | live ✅ — Response post, category: Cookware Guides |
| 18 | sensarte-ceramic-saute-pan-review | 138 / 122 | live ✅ — Category: Cookware, Deborah assigned |
| 19 | greenpan-valencia-pro-review | 147 / — | published local ✅ — pending deploy to live |

---

## Affiliate Links — All Live ✅
Posts 13, 14, 34, 36, 37, 40, 41, 42, 43, 44, 103, 106, 107, 110

## Pen Name
DEBORAH — never Rick, never anything else. Permanent. Locked.

## Phase History
- Phase 7 in progress: micro-niche pivot to Healthy Non-Toxic Cookware (May 30). Lodge research complete. KitchenAid price confirmed. Nordic Ware GSC submitted.
- Phase 7A complete: single-roundup.php built + deployed, roundup (Post 103) live, real photo set as featured image
- Phase 6 complete: 10 articles live, SEO'd, GA4 + Rank Math live, all indexing submitted, SSH resolved
- Phase 5 complete: all 10 affiliate links live on Hostinger, dynamic homepage deployed
- Phase 3 complete: all pages built

## Decisions Locked
- 2026-05-31: KitchenAid $449.99 browser-verified on live
- 2026-05-31: Nordic Ware GSC indexing submitted
- 2026-05-30: Micro-niche = Healthy Non-Toxic Cookware. Four materials only.
- 2026-05-30: Three-tier content strategy locked (Response / Staple / Pillar)
- 2026-05-30: Ninja AF101 retired from content queue
- 2026-05-28: Post content = 4 narrative sections only (add_filter safeguard in single.php)
- 2026-05-28: Real photo only for roundup thumbnails — never a single product image
- 2026-05-25: Roundup publishes before standalone reviews
- 2026-05-24: Creators API plugin after 10 qualifying sales
- 2026-05-24: single-blog.php template needed for blog/guide content type — COMPLETED 2026-06-03, deployed and verified ✅
- 2026-06-09: No new Staple post template. Inline HTML for one-off elements. Repeating furniture stays in custom fields.
- 2026-06-09: 3-layer research system locked (L1 product data, L2 SERP intel, L3 pre-draft). 60–90 min cap.
- 2026-06-09: 10-article pipeline locked. Material cluster sequencing: ceramic → cast iron/carbon steel → stainless → master pillar.
- 2026-06-10: CSS in-content link selectors require .kvp-single prefix to match specificity of other .article-body sub-rules.
- 2026-06-10: Deborah user created on local (ID 2) and live (ID 2). Author assigned to all niche posts.
- 2026-06-14: All 18 posts unified under Deborah (user ID 2) on local and live. Pre-pivot posts included — single-author byline is the correct E-E-A-T signal site-wide.
- 2026-06-14: kvp_get_top_pick() — weighted composite score (rating × log(review_count)) auto-crowns top pick per category. Logic lives in functions.php.
