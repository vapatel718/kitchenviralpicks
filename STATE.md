# KVP Theme — State

## Current Phase
Phase 4 — Go Live on Hostinger

## Last Completed
Task 4.1 — Internal link audit: all # placeholders and hardcoded URLs replaced with dynamic WordPress functions (2026-05-17)

Files changed:
- header.php: nav fallback 5 category links replaced — now use get_category_by_slug() + get_category_link()
- footer.php: navigate fallback — Reviews now home_url('/'), About and Contact use get_page_by_path() + get_permalink()
- footer.php: legal column — all 3 links (affiliate-disclosure, privacy-policy, terms-of-use) use get_page_by_path() + get_permalink()
- archive.php: breadcrumb "Reviews" link fixed from home_url('/reviews/') to home_url('/')

Already correct (no change):
- header.php logo, footer.php logo, footer.php Home nav: all use home_url('/')
- index.php hero CTA #reviews: intentional same-page anchor
- All post/category links in index.php, single.php, archive.php: use the_permalink(), get_permalink(), get_category_link()
- page-about.php CTA: home_url('/')
- page-contact.php email: mailto: (external, correct)

## Next Action
Phase 4 — Go live on Hostinger.

## Phase 3 Sweep Status — Complete
- Homepage ✅
- Single article ✅
- Category page ✅
- About ✅
- Contact ✅
- Privacy Policy ✅
- Affiliate Disclosure ✅
- Terms of Use ✅

## Pen Name
DEBORAH (never Rick, never anything else)

## Known Issues
None

## Notes
STATE.md was missing and recreated on 2026-05-16
Phase 2H audit and all fixes completed 2026-05-16
Phase 3 completed 2026-05-17 — all pages approved across all viewports
Task 4.1 internal link audit completed 2026-05-17
