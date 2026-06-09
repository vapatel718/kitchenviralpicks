# DECISIONS.md — KitchenViralPicks
# Every locked decision lives here. Date, decision, reason.
# Never delete an entry. Add new entries at the bottom.
# Last updated: June 2, 2026

---

## Locked Decisions

| Date | Decision | Reason |
|------|----------|--------|
| Early May 2026 | Pen name is DEBORAH — permanent, never changes | Deborah is Varun's wife. Name locked early and never changes. |
| May 15 2026 | Brand colors locked — #E8401C red, #FFF8F5 cream, #1A1A1A charcoal | Approved after homepage mockup review. Never override without Varun approval. |
| May 15 2026 | Typography locked — Playfair Display headings, Lato body | Approved after homepage mockup review. Load from Google Fonts only. |
| May 25 2026 | Three WordPress templates — single.php, single-roundup.php, single-blog.php | Each content type gets its own template. Never mix content types in one template. |
| May 25 2026 | kvp_get_price() returns numeric only — templates own the ~$ prefix display | Prevents double-prefix bugs. single.php adds ~$ at render time. |
| May 25 2026 | Global price registry via WP options (kvp_price_{key}) | Prevents price drift across templates. All prices updated monthly via WP-CLI. |
| May 25 2026 | wp post term set uses slugs not numeric IDs | Numeric args create term names not IDs. Caused ghost category "4" bug. Slugs only. |
| May 25 2026 | Dollar signs in WP-CLI escaped as ~\$ | Unescaped $ gets stripped silently. Always escape in Site Shell and SSH. |
| May 25 2026 | post_content = narrative prose only | Structured sections (buy/skip, pros/cons, specs, verdict) live in custom fields read by single.php. Prevents double-rendering. |
| May 25 2026 | Comparison tables belong in post_content as HTML | Not in custom fields. Tables are narrative content, not structured data. |
| May 30 2026 | Micro-niche locked — Healthy Non-Toxic Cookware | Health-conscious buyers have high purchase intent. Thin editorial coverage = opportunity. Existing articles stay live, no new ones outside niche. |
| May 30 2026 | Content tier system — Response, Staple, Pillar | Publish order: Response first to build topical authority, then Staple, then Pillar. |
| May 30 2026 | Tier 1 research by default | Max 5 web searches, max 10 min. Deep Research only on explicit request. |
| May 31 2026 | Amazon Associates tag: kitchenviralp-20 | Locked. All affiliate URLs must include this tag. |
| May 31 2026 | Live server has divergent git history from prior SCP deploy | Use git reset --hard origin/main when rebase conflicts occur. Never force push. |
| May 31 2026 | macOS Desktop folder blocked for terminal processes | Drag files into theme folder for accessible paths. Never save to Desktop for terminal use. |
| June 1 2026 | single-blog.php gets isolated CSS file (single-blog.css) | Enqueued only when single-blog.php is active. Conflicting theme styles dequeued for that template. Prevents CSS conflicts permanently. |
| June 2 2026 | CLAUDE.md compressed to 151 lines — builder protocol added | Removed explanations, kept instructions. Builder Protocol added as Section 5. Goal-Driven Execution added as Section 4. Fail Loud added as Section 7. |
| June 2 2026 | tasks.md deleted — STATE.md is sole source of truth | tasks.md was unreliable and contradicted STATE.md. One source of truth only. |
| June 2 2026 | post_content corruption fix — use wp eval with file_get_contents | wp post update --post_content corrupts HTML with literal \n. Only safe method is wp eval with file_get_contents(). Permanent rule. |
| June 3 2026 | single-blog.php gets isolated single-blog.css | Enqueued only when single-blog.php is active. Never patch style.css for response post styles. |
| June 6 2026 | CLAUDE.md rewritten to executor-only format | Claude Code is hands not brain. Diagnosis and planning happen in chat. Claude Code executes atomic prompts only. 128 lines. |
| June 6 2026 | No .bak files ever — git is the safety net | Deleted 5 stale .bak files. Git history replaces manual backups permanently. |

June 9, 2026 — Publishing pace: 3 articles June 2026, 4/month from July 2026. 5/month earned only after two consecutive clean months. 6/month never planned. Reason: 4 fits 10–20 hrs/week with QA intact; history shows pace beyond verification capacity creates rework debt.
June 9, 2026 — 10-article pipeline locked (see CONTENT_PLAN.md Active Pipeline). Reason: finish clusters before opening new ones; master pillar last so cluster pages exist to feed it internal links.
June 9, 2026 — 3-layer research system adopted (see content-rules.md). Reason: rankings require SERP intelligence and information gain, not only product data; primary-source verification prevents recurrence of past accuracy corrections.
June 9, 2026 — December 2026 checkpoint: by Dec 31, evaluate niche posts on three criteria — average position under 20, impressions trending up month-over-month, at least one Amazon conversion. Clears → scale KVP in 2027. Badly misses → pivot/second project becomes rational. Reason: converts "what if KVP fails" into a dated decision with written criteria.
