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

Last updated: 2026-05-31
Last commit: bad30dd — fix post 99 lodge — add comparison table, fourth metrics tile, breadcrumb category name

## Current Phase
Phase 7 — Content Growth

## Last Completed Task
- index.php price prefix fixed — ~$ added to all four price output lines 2026-05-31 ✅
- All three templates now consistent: single.php, archive.php, index.php
- Deployed to live — commit 531eb13
- kvp_get_price() architecture fixed — returns clean numeric value only 2026-05-31 ✅
- Templates own ~$ prefix — single.php lines 128/161/289, archive.php lines 113/228
- This is the permanent correct architecture — do not add prefix inside kvp_get_price() again
- Deployed to live — commit 90c375d
- archive.php verdict duplicate fixed — only kvp_card_verdict_snippet falls back to kvp_verdict_line 2026-05-31 ✅
- kvp_verdict does not fall back to prevent double rendering
- Deployed to live — commit 61c56e4
- archive.php — kvp_verdict_line fallback added for card verdict and snippet 2026-05-31 ✅
- All future articles using kvp_verdict_line will display correctly on category pages
- Deployed to live — commit b701897
- kvp_get_price() fixed — always returns ~$ prefix, strips existing prefix before adding 2026-05-31 ✅
- Deployed to live — commit 2156867
- archive.php double ~$ prefix fixed — removed hardcoded prefix, kvp_get_price() handles it 2026-05-31 ✅
- Deployed to live — commit 872c5c9
- All kvp_price fields standardized to numeric only on local and live 2026-05-31 ✅
  - 12 posts fixed on live (stripped ~$ prefix): 107, 106, 44, 43, 42, 41, 40, 37, 36, 34, 14, 13
  - 12 posts fixed on local (stripped ~$ prefix): 90, 86, 44, 43, 42, 41, 40, 37, 36, 34, 14, 13
  - Post 99 / 110 already correct at 24.32 ✅
  - Price discrepancies noted (local vs live): post 44 (129.50 vs 69.99), post 14 (89.99 vs 129.99) — review separately
- Lodge post 110 kvp_verdict_line confirmed and corrected on live — ~$24.32 format ✅
- Double prefix bug resolved — template adds ~$ at render, field stores numeric only
- archive.php price prefix fix — ~$ added to all kvp_price outputs (top-pick pill + card price) 2026-05-31 ✅
- archive.php price styling — .kvp-arc-card-price updated to 18px bold on category cards ✅
- Both fixes deployed to live ✅ — commit 89d45db
- Live server: ghost category term_id 29 ("4") deleted 2026-05-31 ✅
  - Post 110 reassigned to Cookware (term_id 4) via wp post update --post_category (ID-safe)
  - Note: wp post term set treats numeric args as names not IDs — always use wp post update --post_category for category assignment
  - Cookware count now 5, Uncategorized count 0, no ghost categories remain
- Lodge Cast Iron Skillet (Post 99): full content clean rewrite 2026-05-31 ✅
  - post_content completely replaced — clean narrative only (5 H2 sections + comparison table)
  - No structured sections in post_content (no specs, no buy/skip, no verdict, no pros/cons)
  - kvp_capacity confirmed at '5.35 lbs'
  - ARTICLE CONTENT RULES added permanently to top of STATE.md
  - kvp_price format corrected in STATE.md (numeric only) and documented in CLAUDE.md
- Micro-niche pivot locked (May 30): Healthy Non-Toxic Cookware. New content targets cast iron, carbon steel, ceramic coated, stainless steel only. Existing air fryer/kettle/bakeware articles stay live — no new ones.
- KitchenAid Artisan (Post 42): kvp_cons, kvp_final_verdict, post_content all fixed to $449.99 on local ✅ and live ✅ — browser verified May 31, 2026.
- Nordic Ware (Post 107): GSC indexing request submitted May 31, 2026 ✅
- Roundup card (Post 103): full-width featured card, real photo, live ✅ — commit ee9c1ff

## Next Task
1. Browser-verify Post 99 at http://kitchenviralpicks.local/?p=99 — confirm layout renders correctly
2. Research reports for GreenLife 16pc Ceramic Set and SENSARTE Ceramic Pan (Varun shares screenshots, Claude builds report)
3. Response post — non-toxic cookware question (topic TBD)

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
1. Lodge 10.25" Cast Iron Skillet — Staple post (research complete, keyword pending)
2. GreenLife 16pc Ceramic Set — Staple post (research pending)
3. SENSARTE Ceramic Pan — Staple post (research pending)
4. Response post — non-toxic cookware question (topic TBD)
5. Pillar roundup — TBD after 3+ staple posts published

Retired from queue:
- Ninja AF101 (retired May 30 — outside micro-niche)
- Chefman TurboFry (retired — outside micro-niche)
- Dash Tasti-Crisp (retired — outside micro-niche)

## Known Issues
- Internal links from Cosori (Post 13) and Ninja (Post 14) reviews pointing to roundup (Post 103) — not yet added.
- single-blog.php template not yet built — needed for future Response/blog posts.

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
Fully deployed and git-synced. Future deploys: git pull only (no SCP).
Live server on branch main. Last confirmed live commit: 063643d (2026-05-31).

---

## Templates
header.php | approved
single.php | approved — updated 2026-05-28
single-roundup.php | approved — updated 2026-05-28
single-blog.php | NOT YET BUILT — needed for Response posts
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
- 2026-05-24: single-blog.php template needed for blog/guide content type
