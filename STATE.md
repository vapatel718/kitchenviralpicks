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

Last updated: June 14, 2026
Last commit: 7f5ec20 — fix: use slug lookup for Cookware Guides exclusion in archive.php

## Current Phase
Phase 7 — Content Growth

## Last Session
SESSION END — 2026-06-14
FIXES COMPLETED THIS SESSION:
- single.php: verdict duplication removed — DEBORAH'S VERDICT box deleted, FINAL VERDICT retained (commit 94d582a). Affects SENSARTE (138/122) and GreenLife (123/114).
- archive.php: Cookware Guides excluded from archive grid on live via slug lookup (commit 7f5ec20).
- Local Post 138 post_content synced with live Post 122 (complaint frequency table, checksum 3546251a5fe45f7f).
- Duplicate "What Is Non-Toxic Cookware?" on local resolved — Post 118 (-2 slug) trashed, Post 108 (clean slug) retained.

## Last Completed Task
SENSARTE Ceramic Saute Pan — Staple post fully published and verified
- Local post ID: 138 | Live post ID: 122
- URL: kitchenviralpicks.com/sensarte-ceramic-saute-pan-review/
- All custom fields set on both local and live
- Deborah author assigned on both local and live
- Category: Cookware (assigned June 10)
- In-content links: 3 links verified red/underlined on live
- Complaint frequency table: corrected on live (checksum 3546251a5fe45f7f)
- Internal links from Post 117 and Post 114 to SENSARTE: not yet added (scheduled)

## Next Task
single.php audit against Staple post spec (PROJECT.md §5). Confirm structured sections render from custom fields, post_content is narrative-only, no duplicated template furniture. Expect three small patches at most.

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
- NOTED: single.php audit after verdict fix — expect three small patches at most.
- NOTED: Response post link styling — verify single-blog.php uses article-body wrapper or needs its own rule.
- NOTED: Add back-links from Posts 117 and 114 to SENSARTE post.
- NOTED: Pre-pivot posts (99, 90, 86, 83, 81, 44, 43, 42, 41, 40, 37, 36, 34, 14, 13) assigned to admin. Decision needed: Deborah for E-E-A-T or leave admin on out-of-niche.

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
Deployed — single-blog.css, single-blog.php, functions.php deployed via SCP. Post 112 created directly on live.
Last confirmed live commit: d2197ad (2026-06-10).
Deployed via git pull origin/main.

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
