# STATE.md — KitchenViralPicks

Last updated: 2026-05-31
Last commit: ee9c1ff — roundup card redesign + live git sync fixed (2026-05-28)

## Current Phase
Phase 7 — Content Growth

## Last Completed Task
- Micro-niche pivot locked (May 30): Healthy Non-Toxic Cookware. New content targets cast iron, carbon steel, ceramic coated, stainless steel only. Existing air fryer/kettle/bakeware articles stay live — no new ones.
- KitchenAid Artisan (Post 42): kvp_cons, kvp_final_verdict, post_content all fixed to $449.99 on local ✅ and live ✅ — browser verified May 31, 2026.
- Lodge 10.25" Cast Iron Skillet: product research report completed (May 30) — Staple post candidate, $24.90, 164K reviews, 4.7★. Report in RESEARCH_VAULT.md.
- Google Sheets master tracker live: https://docs.google.com/spreadsheets/d/198BvIWWpYhK8b7Pev5lMdyTaSILVq8c6DLJ9brkaYTI — 5 tabs. First data entry July 2026.
- Nordic Ware (Post 107): GSC indexing request submitted May 31, 2026 ✅
- Roundup card (Post 103): full-width featured card, real photo, live ✅ — commit ee9c1ff

## Next Task
1. Keyword research and approval for Lodge 10.25" Cast Iron Skillet article
2. Research reports for GreenLife 16pc Ceramic Set and SENSARTE Ceramic Pan (Varun shares screenshots, Claude builds report)
3. Begin writing Lodge article (Staple post — 1,800–2,200 words)

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
| kvp_price | plain string | e.g. "~$24.90" |
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
Live server on branch main. Last confirmed live commit: ee9c1ff (2026-05-28).

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

---

## Affiliate Links — All Live ✅
Posts 13, 14, 34, 36, 37, 40, 41, 42, 43, 44, 103, 106, 107

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
