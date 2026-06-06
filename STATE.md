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

Last updated: 2026-06-05
Last commit: 19be684 — chore: STATE.md after archive card image contain fix

## Current Phase
Phase 7 — Content Growth

## Last Session
SESSION END — 2026-06-05
FIXES COMPLETED THIS SESSION:
- single.php: pc-col.p and pc-col.c border classes added
- style.css: kvp-internal-link class added
- style.css: comparison table mobile scroll fix
- style.css: archive card image CSS — flex contain with 220px height
- archive.php: plain img tag output (removed figure wrapper)
- archive.php: Cookware Guides excluded from related widget (term_id 30)
- Lodge comparison table: Feature header label added
- All posts: kvp_product_image set for posts 44, 40, 36, 34, 43, 42, 41, 37, 13 on both local and live
- Affiliate URLs fixed for posts 44, 40, 36, 34 on both local and live
- STATE.md: Post 13/14 internal links formally marked deprioritized

CRITICAL LESSON — POST CONTENT UPDATES:
- NEVER use wp post update --post_content="$(cat file)" — corrupts HTML with \\n literals
- ALWAYS use wp eval-file /tmp/update_post.php --path=/app/public (PHP HEREDOC method)

## Last Completed Task
GreenLife Soft Grip 16-Piece Cookware Set review — fully published on local and live.
- Local post ID: 123 | Live post ID: 114
- URL: kitchenviralpicks.com/greenlife-cookware-review/
- All 16 custom fields set on both local and live
- Rank Math SEO fields set on both local and live
- Featured image set (attachment 125 local)
- GSC indexing requested: June 5 2026
- Comparison table: all headers visible, mobile scroll working
- Internal link to /what-is-non-toxic-cookware/ styled with kvp-internal-link class
- Pros/cons and Buy/Skip borders: solid green and dark red confirmed live

## Next Task
SENSARTE Ceramic Pan research — Varun shares Amazon screenshots, Claude builds 9-field report.
(33.5K reviews, ~$20.89 — second in research pipeline)

## Content Strategy — Locked May 30, 2026
Micro-niche: Healthy Non-Toxic Cookware
Target materials: cast iron, carbon steel, ceramic coated, stainless steel
Key signals: PFAS-free, PFOA-free, PTFE-free
Audience: health-conscious buyers with high purchase intent

Three content tiers (Income School model):
- Response posts: 1,200–1,500 words — informational, answer specific non-toxic cookware questions, rank fast
- Staple posts: 1,800–2,200 words — individual product reviews, money pages
- Pillar posts: 2,800–3,200 words — roundups

Publish order: Response first → Staple → Pillar
Cadence: 1–3 articles/month, quality over volume

Content queue (in priority order):
1. GreenLife 16pc Ceramic Set — Staple post (PUBLISHED ✅ — live 2026-06-05)
2. SENSARTE Ceramic Pan — Staple post (research next — 33.5K reviews, ~$20.89)
3. Lodge 10.25" Cast Iron Skillet — Staple post (research complete, keyword pending)
4. Response post — non-toxic cookware question (topic TBD)
5. Pillar roundup — TBD after 3+ staple posts published

Retired from queue:
- Ninja AF101 (retired May 30 — outside micro-niche)
- Chefman TurboFry (retired — outside micro-niche)
- Dash Tasti-Crisp (retired — outside micro-niche)

## Known Issues
- Local post 108 and live post 112 are separate DB entries — content in sync, IDs differ.
- Internal links Post 13/14 → Post 103: DEPRIORITIZED 2026-06-04 — air fryer content not part of active content strategy.

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
Last confirmed live commit: ccb67b5 (2026-06-03).

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
