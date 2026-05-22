# KVP Theme — State

## Current Phase
Phase 6 — TBD

## Last Completed
Phase 6 session complete. All changes committed to Git. Deploy to live pending SSH fix. (2026-05-21)

### What was committed (a1438b6):
- index.php: hero card image wired to featured thumbnail; all review card images wired to featured thumbnails
- style.css: full clean rewrite of .kvp-rc-img rules; horiz-mobile scoped to max-width 767px; .kvp-arc-card-img background → #ffffff; CAROTE orphan card rule; .kvp-reviews background restored
- functions.php: kvp_remove_featured_from_content() added
- Deploy to live Hostinger: SSH auth failed in this shell — run 3 scp commands manually

## Next Action
Task 6.2 — Rank Math SEO configuration

## Recent Fixes (uncommitted)
- Fix A: .kvp-rc--horiz-mobile .kvp-rc-img height: 100% → height: 100px (style.css line 491) ✅
- Fix B: .kvp-arc-card-price margin: 0 0 10px → margin: auto 0 10px (style.css line 2169) ✅
- Fix C: .kvp-rc-img img width/height: auto → 100% (style.css line 469-470) ✅
- Fix D: .kvp-grid-3 orphan card rule wrapped in @media (min-width: 1024px) — no longer fires on mobile/tablet (style.css line 476) ✅
- Fix E: .kvp-arc-card-price margin: auto 0 10px confirmed in place — no change needed ✅
- Fix F: .kvp-rc-img img margin: auto added (style.css line 474) ✅
- Fix G: .kvp-rc-price margin: 6px 0 2px → auto 0 2px — top now auto for price push-down (style.css line 565) ✅
- Fix H: .kvp-arc-card-price color: #666 → #E8401C (style.css line 2171) ✅
- Fix I: .kvp-rc-img img width/height reverted 100% → auto; margin: auto retained (style.css line 469-470) ✅
- Fix J: .kvp-rc--horiz-mobile .kvp-rc-img display:flex + align-items:center + justify-content:center added explicitly to mobile override (style.css line 498-500) ✅
- Fix K: .kvp-rc--horiz-mobile .kvp-rc-img img updated inside @media (max-width:767px) — width:auto !important, height:auto !important, max-width/max-height:100% !important, object-fit:contain, object-position:center, display:block, margin:auto — !important overrides WP-injected inline width/height attributes ✅
- Fix L: .kvp-rc--horiz-mobile .kvp-rc-img background: #FFF8F5 added in mobile override — removes white box mismatch against cream card background ✅
- Fix M: .kvp-rc--horiz-mobile .kvp-rc-img + img rewritten inside @media (max-width:767px) — absolute positioning with transform:translate(-50%,-50%) centering; padding:0, overflow:hidden, position:relative on container; height:100%!important, max-width:none!important, object-fit:unset on img — reliably centers images of unknown dimensions regardless of WP-injected attributes (style.css lines 491-514) ✅
- Fix N: .kvp-rc--horiz-mobile .kvp-rc-img + img reverted to white padded box approach (matching live site) — 110px container, padding:8px, background:#ffffff, overflow:hidden; img uses width/height:auto!important, max-width/max-height:100%!important, object-fit:contain, object-position:center, position:static, transform:none, margin:auto — absolute positioning removed (style.css lines 491-515) ✅
- Fix O: .kvp-rc--horiz-mobile .kvp-rc-img background: #ffffff → #FFF8F5 (line 498); .kvp-rc--horiz-mobile .kvp-rc-img img align-self:center added (line 514) ✅
- Fix P: all three .kvp-rc--horiz-mobile rules rewritten inside @media (max-width:767px) — grid-template-columns: 100px→110px; container background:#ffffff, flex-shrink:0 added; img rule: display:block, max-width:94px!important, max-height:94px!important (concrete pixel cap = 110px - 8px padding each side), position/transform/align-self removed — clean slate (style.css lines 487-516) ✅
- Fix Q: align-items:start added to .kvp-rc--horiz-mobile grid inside @media (max-width:767px) — prevents grid from stretching image cell to match card body height (style.css line 490) ✅
- Fix R: three changes inside @media (max-width:767px) — (1) align-items:start removed from .kvp-rc--horiz-mobile (grid stretches both columns to equal height); (2) border-right:1px solid rgba(0,0,0,0.06) added to .kvp-rc--horiz-mobile .kvp-rc-img (subtle boundary between white box and cream body); (3) max-width/max-height on img: 94px→80px !important (more white space around image for visual centering) (style.css lines 487-515) ✅
- Fix S: Phase 6 fix — mobile horizontal card image stretch fixed. .kvp-rc--horiz-mobile .kvp-rc-img img replaced with width:100%, height:100%, object-fit:contain, object-position:center — all !important overrides and max-width/max-height removed (style.css lines 506-512) — local ✅ / live pending (SSH auth failed — run scp manually)
- Fix T: Phase 6 fix — mobile horizontal card image centered with max-width/height 90% and margin auto. .kvp-rc--horiz-mobile .kvp-rc-img img: max-width:90%, max-height:90%, width:auto, height:auto, object-fit:contain, object-position:center, margin:auto (style.css lines 506-515) — local ✅ / not deployed

## Phase 6 Status
- Task 6.1: Equal-height cards, align-items + height:100% on .kvp-rc ✅
- Task 6.1B: display:grid added to .kvp-grid ✅
- Task 6.1C: .kvp-rc height:auto, .kvp-rc-body height:100% ✅
- Task 6.1D: margin-top:auto on .kvp-arc-card-btn ✅
- Phase 6 fix: featured image removed from article body content filter ✅
- Phase 6 fix: wp:post-featured-image block removed from all 10 posts — local + live ✅
- Phase 6 fix: score bar image background #ffffff at all breakpoints — local + live ✅
- Phase 6 fix: score bar image object-fit contain + object-position center at all breakpoints — local + live ✅
- Phase 6 fix: Post 14 kvp_product_name corrected — local + live ✅
- Phase 6 fix: Post 37 kvp_product_name shortened — local + live ✅
- Phase 6 fix: homepage card images wired to featured images — local + live ✅
- Phase 6 fix: homepage card image container switched to aspect-ratio:1/1 + padding (Option C) — local ✅ / live pending
- Phase 6 fix: max-height:180px added to .kvp-rc-img — local ✅ / live pending

## Phase 5 Status — Complete ✅
- Task 5.4A: COSORI TurboBlaze affiliate link live ✅
- Task 5.5: All 9 affiliate URLs + prices set on live server ✅
- Task 5.5C: All 9 kvp_amazon_url force-updated and verified ✅
- Task 5.6: Dynamic homepage deployed to live server ✅

## Phase 3 Sweep Status — Complete ✅
- Homepage ✅
- Single article ✅
- Category page ✅
- About ✅
- Contact ✅
- Privacy Policy ✅
- Affiliate Disclosure ✅
- Terms of Use ✅
- All internal links ✅

## Affiliate Links Status — Complete ✅
- Post 13 (COSORI TurboBlaze): live ✅ (Task 5.4A)
- Post 14 (Ninja Air Fryer Pro): live ✅ (Task 5.5C)
- Post 34 (CAROTE Pots and Pans): live ✅ (Task 5.5C)
- Post 36 (Tramontina Frying Pan): live ✅ (Task 5.5C)
- Post 37 (COSORI Electric Kettle): live ✅ (Task 5.5C)
- Post 40 (Lodge Braiser): live ✅ (Task 5.5C)
- Post 41 (Instant Pot RIO Wide): live ✅ (Task 5.5C)
- Post 42 (KitchenAid Stand Mixer): live ✅ (Task 5.5C)
- Post 43 (Ninja Blender): live ✅ (Task 5.5C)
- Post 44 (Cuisinart Dutch Oven): live ✅ (Task 5.5C)

## Pen Name
DEBORAH (never Rick, never anything else)

## Known Issues
None

## Notes
Phase 2H audit and all fixes completed 2026-05-16
Phase 3 all pages approved across all viewports 2026-05-17
Phase 3 internal links audit and fix completed 2026-05-17
Phase 3 fully closed 2026-05-17
Task 5.5 affiliate links live on Hostinger 2026-05-19
Task 5.5C force-update confirmed 9/9 — 2026-05-19
Task 5.6 dynamic homepage deployed — 2026-05-19
Phase 5 fully complete — 2026-05-19
Phase 6 fix: kvp_remove_featured_from_content() added to functions.php — 2026-05-21
Phase 6 fix: wp:post-featured-image block removed from all 10 posts local + live — 2026-05-21
Phase 6 fix: score bar image background set to #ffffff all breakpoints — local + live — 2026-05-21
Phase 6 fix: score bar image object-fit contain + object-position center — local + live — 2026-05-21
Phase 6 fix: Post 14 kvp_product_name corrected — local + live — 2026-05-21
Phase 6 fix: Post 37 kvp_product_name shortened — local + live — 2026-05-21
Phase 6 fix: homepage card images wired to featured images, SVG fallback — local + live — 2026-05-21
Phase 6 fix: homepage card image container aspect-ratio:1/1 + padding:16px (Option C) — local 2026-05-21 / live pending
Phase 6 fix: max-height:180px added to .kvp-rc-img — local 2026-05-21 / live pending
Phase 6 fix: .kvp-rc--horiz-mobile .kvp-rc-img fixed — width:80px, aspect-ratio:unset — local 2026-05-21 / live pending
Phase 6 fix: hero card image wired to featured thumbnail ($h_img_url) — local 2026-05-21 / live pending
Phase 6 fix: .kvp-rc-meta flex:1 removed from tablet media query — local 2026-05-21 / live pending
Phase 6 fix: .kvp-rc-spacer flex:0 removed from tablet media query — local 2026-05-21 / live pending
Phase 6 fix: .kvp-rc height auto → 100% — local 2026-05-21 / live pending
Phase 6 fix: hero card + review card images re-applied after revert; hero card CSS corrected — local 2026-05-21 / live pending
Phase 6 fix: style.css reverted to HEAD; .kvp-hero-card-img background → #ffffff — local 2026-05-21 / live pending
Phase 6 fix: .kvp-rc--horiz-mobile 90px grid column + .kvp-rc-img 90px fixed — local 2026-05-21 / live pending (SSH auth failed)
Phase 6 fix: .kvp-rc--horiz-mobile rules moved into @media (max-width: 767px) — local 2026-05-21 / live pending (SSH auth failed)
Phase 6 fix: horizontal mobile card background: #ffffff — local 2026-05-21 / live pending (SSH auth failed)
Phase 6 fix: full clean rewrite of card image CSS; .kvp-reviews background restored — local 2026-05-21 / live pending (SSH auth failed)
Phase 6 fix: .kvp-arc-card-img background → #ffffff; CAROTE orphan card grid-column rule added — local 2026-05-21 / live pending (SSH auth failed)
