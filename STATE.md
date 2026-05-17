# KVP Theme — State

## Current Phase
Phase 4 — Go Live on Hostinger

## Last Completed
Task 4.2 — Permanent dynamic permalink fix for all nav and footer links (2026-05-17)
Commit: 941878d

### Files changed and links updated:

**header.php** — fallback nav (fires only when no WordPress primary menu is assigned):
- All 5 category links upgraded from get_category_by_slug() + get_category_link() to get_term_by('slug', $slug, 'category') + get_term_link($term)
- Null/WP_Error check: falls back to home_url('/category/slug/') if term not found

**footer.php** — navigate fallback + legal column (fires only when no WordPress footer menu is assigned):
- Home: home_url('/')
- Reviews: home_url('/')
- About: get_page_by_path('about') + get_permalink() — fallback to home_url('/about/')
- Contact: get_page_by_path('contact') + get_permalink() — fallback to home_url('/contact/')
- Affiliate disclosure: get_page_by_path('affiliate-disclosure') + get_permalink() — fallback to home_url('/affiliate-disclosure/')
- Privacy policy: get_page_by_path('privacy-policy') + get_permalink() — fallback to home_url('/privacy-policy/')
- Terms of use: get_page_by_path('terms-of-use') + get_permalink() — fallback to home_url('/terms-of-use/')

**archive.php** — breadcrumb:
- Reviews link: changed from home_url('/reviews/') (would 404) to home_url('/')

**index.php, single.php, page.php** — no changes needed:
- All post/category links already use the_permalink(), get_permalink(), get_category_link()
- index.php href="#reviews" is an intentional same-page anchor — correct

## Next Action
Phase 4 — Go live on Hostinger.

## Phase 3 Sweep Status — Complete ✅
All pages approved across desktop, tablet, mobile.

## Pen Name
DEBORAH (never Rick, never anything else)

## Known Issues
None

## Notes
STATE.md was missing and recreated on 2026-05-16
Phase 2H audit and all fixes completed 2026-05-16
Phase 3 completed 2026-05-17 — all pages approved across all viewports
Task 4.1 initial link audit completed 2026-05-17
Task 4.2 permanent link fix committed 2026-05-17
