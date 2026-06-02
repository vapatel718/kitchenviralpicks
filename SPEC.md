# SPEC.md — KitchenViralPicks
# Every feature gets a spec before Claude Code touches anything.
# Format: one entry per feature. Mockup approved, architecture decided, then build.
# Last updated: June 2, 2026

---

## How to Use This File

Before any new template, major feature, or structural change:
1. Claude (chat) writes the spec entry below
2. Varun approves it in chat
3. Claude Code receives the build prompt — reads this file as part of context
4. After build is verified and committed — mark status as BUILT

Never build without an approved spec. Never skip this file.

---

## Active Specs

---

### single-blog.php — Response Post Template

Status: APPROVED — PENDING BUILD
Approved: June 1, 2026

Purpose: Template for Response posts (informational, no affiliate links).
Visually distinct from single.php (product reviews) and single-roundup.php (roundups).

Design:
- Hero background: #FFF0EB (warm cream — distinct from product review pages)
- No affiliate links, no product cards, no buy buttons, no price displays
- Clean reading layout — wide content column, generous line height
- Internal links allowed
- Label decoder cards for PFAS/PFOA/PTFE section (HTML in post_content)

Architecture:
- Template file: single-blog.php
- Isolated stylesheet: single-blog.css
- single-blog.css enqueued only when single-blog.php is active (functions.php)
- Conflicting theme styles dequeued for this template only
- Never patch style.css globally

Build sequence:
1. Claude Code reads style.css, functions.php, single.php — reports conflicts
2. Varun approves conflict report
3. Claude Code builds single-blog.php + single-blog.css in one shot
4. Verify in browser at kitchenviralpicks.local
5. Commit, then deploy to live

---

## Completed Specs

| Feature | Built | Commit | Date |
|---------|-------|--------|------|
| single-roundup.php | ✅ | cad88c24 session | May 25 2026 |
| Global price registry | ✅ | 6fc6d3e | May 28 2026 |
| Homepage roundup card | ✅ | d4bb84a | May 28 2026 |
