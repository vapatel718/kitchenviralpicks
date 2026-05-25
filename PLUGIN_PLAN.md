# KVP — Creators API Plugin Plan

## Purpose
Automatically refresh live Amazon product data (price, star rating, review count) across all KVP articles every 24 hours via WordPress cron.

## Status
BLOCKED — requires 10 qualifying Amazon Associates sales in trailing 30 days.
Current sales: 0. Target: 10.

## API Details
- API: Amazon Creators API (replaces PA-API v5, retired May 15 2026)
- Auth: Bearer token (OAuth2)
- Region: NA (covers US, CA, MX)
- Rate limit at launch: 1 request/second, 8,640 requests/day
- Data available: price, star rating, review count, availability, best-seller rank

## Architecture Plan
- Standalone WordPress plugin (not theme-dependent)
- Plugin name: kvp-amazon-sync
- Custom fields updated: kvp_price, kvp_rating, kvp_review_count
- Cron: WP-Cron daily, cycles through all published posts with an ASIN field
- Fallback: if API call fails, display last cached value with 'price may vary' note
- Per Amazon Operating Agreement: data must refresh at minimum every 24 hours

## Build Plan
Phase 1 (now): Build full plugin skeleton — PHP structure, cron registration, custom fields schema, admin settings page for credentials. No live API calls yet.
Phase 2 (after 10 sales): Obtain Creators API credentials from Associates Central → Tools → Creators API. Wire live calls. Test on staging. Deploy to live.

## Maintenance
- Must sustain 10 qualifying sales/month to keep API access
- If access lapses: plugin falls back to static cached values automatically
- Quarterly: verify ASINs still valid, check for product discontinuations
