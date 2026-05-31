# CLAUDE.md — KitchenViralPicks Master Rules
# Every session: Claude Code reads CLAUDE.md and STATE.md only.
# Reference .claude/rules/ files only when task requires it:
#   brand decision → brand-rules.md
#   code change → code-rules.md  
#   content writing → content-rules.md# Last updated: May 2026

---

## 1. Project Identity

- Site: KitchenViralPicks.com
- Type: Affiliate review site — kitchen products
- Monetization: Amazon Associates
- Stack: Custom WordPress theme (kvp-theme)
- Local dev: kitchenviralpicks.local (Local by Flywheel)
- Live host: Hostinger (SSH port 65002)
- Domain: Namecheap
- Version control: Git + GitHub
- Pen name: Deborah — permanent, locked, never changes
- Author title: Kitchen Researcher & Product Analyst

---

## 1B. Site Direction — Locked May 30, 2026

Micro-niche: Healthy Non-Toxic Cookware
Target materials: cast iron, carbon steel, ceramic coated, stainless steel
Key signals: PFAS-free, PFOA-free, PTFE-free
Audience: health-conscious buyers with high purchase intent

New content targets non-toxic cookware only.
Existing air fryer, kettle, bakeware, blender, multicooker articles stay live — no new ones.

### Three Content Tiers
- Response posts: 1,200–1,500 words · single-blog.php · informational, ranks fast
- Staple posts: 1,800–2,200 words · single.php · product reviews, money pages
- Pillar posts: 2,800–3,200 words · single-roundup.php · roundups, traffic drivers

Publish order: Response first → Staple → Pillar

### Deborah's Voice — Non-Toxic Angle
- Never claim physical testing — Deborah analyzes verified buyer data only
- Safe phrasing: "analyzed X verified Amazon buyer reviews"
- Never: "tested in her kitchen", "after cooking with it", "hands-on testing"
- Always surface PFAS-free / PFOA-free / PTFE-free where relevant to the product

---

## 2. Brand — Never Change

Colors:
- Primary (Flame Red): #E8401C
- Accent (Warm Orange): #F76B35
- Background (Cream): #FFF8F5
- Text (Charcoal): #1A1A1A

Typography:
- Headings: Playfair Display
- Body: Lato

Design principles:
- Mobile-first — majority of visitors are on phones
- Warm and trustworthy — not cold, not corporate
- Clean, fast, easy to read
- Verdict boxes and affiliate buttons must be prominent
- No generic AI aesthetics — must look like a real kitchen brand

---

## 3. Environments — Declare Before Every Command

| Task | Environment |
|------|-------------|
| WP-CLI commands | Site Shell (Local by Flywheel) |
| Git commands | Regular Terminal only |
| Live server changes | SSH: ssh -p 65002 u834996894@157.173.208.147 |

Rule: Never mix environments in a single task.
Rule: State which environment and WHY before running any command.
Rule: If uncertain which environment — STOP and ask. Never guess.

---

## 4. Core Workflow — Every Task Without Exception

1. Claude (chat) plans the task and writes the Claude Code prompt
2. Varun reviews the plan in chat
3. Varun approves
4. Claude Code executes locally (kitchenviralpicks.local)
5. Varun reviews in browser
6. Varun types "approved" or describes what is wrong
7. If approved → Claude Code commits → updates STATE.md
8. If rejected → diagnose root cause → fix → re-review
9. Phase complete → Varun approves deploy → push to Hostinger via SSH

Golden Rule: Nothing touches the live Hostinger site until Varun approves locally.
Golden Rule: One fix = one commit. Never batch fixes into one commit.

---

## 5. Fix Protocol — Every Code Change Without Exception

This is the single most important protocol. Follow it exactly, every time.

Step 1 — SNAPSHOT + READ
Run: bash .claude/hooks/pre-edit.sh
Then grep or view the exact file and selector being changed.
Print the findings — exact lines, exact selectors.

Step 2 — REPORT
State what was found.
State the exact line(s) that will be changed and why.
If findings are unexpected — STOP and report to Varun before proceeding.

Step 3 — FIX
Make the single targeted change based on what was actually found.
Touch ONLY the file and selector explicitly named in the prompt.

Step 4 — VERIFY
Grep again to confirm the change exists in the file exactly as intended.
Confirm no adjacent approved file was touched.

Step 5 — COMMIT
Commit immediately with a clear message: what changed and why.
Format: git commit -m "fix: [what] — [why]"

Step 6 — UPDATE STATE.md
Update STATE.md as the final step, every time, no exceptions.

---

## 6. Chat Prompt Standard — Claude (chat) Before Writing Any Claude Code Prompt

Before writing any Claude Code prompt, answer these internally:
1. What is the root cause — not the symptom?
2. Which exact file, selector, and line is responsible?
3. What could conflict — specificity, inheritance, breakpoints, caching?
4. Is the fix local-only or does it also need to deploy to live?

If any answer is uncertain → instruct Claude Code to READ the file first and report back.
Never write a fix prompt based on assumption.

---

## 7. Surgical Change Rule — Absolute

- Touch ONLY the file and function explicitly named in the prompt
- Do NOT refactor, reformat, or improve adjacent code
- Do NOT touch functions.php, style.css, or any approved file unless it is the explicit target
- If something unrelated looks wrong — report it, do not fix it
- Approved files are protected: single.php, archive.php, index.php, footer.php, page.php, style.css

---

## 8. Pen Name — Pre-Flight Check Every Session

- Pen name is Deborah. Permanent. Non-negotiable.
- Before writing ANY article content or author attribution — verify pen name is Deborah
- If any content in the session used a different name — flag it immediately

---

## 9. Content Rules — Non-Negotiable

- NEVER claim personal product usage — Varun has not tested these products
- ALWAYS use research-based voice: "Based on X verified reviews..."
- FTC disclosure must appear BEFORE the first affiliate link on every page
- NEVER copy Amazon product descriptions — always rewrite in original words
- Prices always: "at the time of writing, priced around $X"
- Amazon ratings always: "X.X stars on Amazon (XX,XXX reviews)"
- All Amazon links must include rel="sponsored nofollow"
- NEVER use: game-changer, must-have, look no further, boasts, features, we tested

---

## 10. Article Workflow — Split Approach

Research is always done by Claude (chat). Claude Code never researches independently.

Step 1 — Claude (chat) researches the product and compiles a data block:
- Full product name, ASIN, current price, badges
- Amazon star rating and review count
- Minimum 4 buyer praise themes (from verified review patterns)
- Minimum 2 buyer complaints (honest negatives)
- Full spec sheet
- Primary SEO keyword and search intent

Step 2 — Varun reviews and approves the data block in chat.

Step 3 — Claude (chat) writes the Claude Code prompt with all data pre-filled.

Step 4 — Claude Code receives the prompt, writes the article using provided data only,
publishes via WP-CLI, updates STATE.md, and commits.

Rule: Claude Code must never browse, search, or independently research any product.
Rule: If product data is missing from the prompt — STOP and report what is missing. Never guess.

---

## 11. Research Ethics

1. Only use real, verifiable data — never fabricate ratings, review counts, or prices
2. Always note "at time of writing — price may vary" next to any price cited
3. Never cherry-pick only positive reviews — complaints must be represented honestly
4. Never claim data is from Amazon if it was not verified there directly
5. Tier 1 research by default: max 5 web searches, max 10 minutes, one clear recommendation with honest caveats. Deep Research tool only when Varun explicitly requests it. Never use Deep Research for standard keyword or product validation.

---

## 12. No Speculative Work

- Build exactly what was asked. Nothing more.
- No extra fields, hooks, or "while I'm here" additions
- No future-proofing for single-use code
- If a simpler approach exists — say so before coding, then wait for approval

---

## 13. STATE.md — Required Format

STATE.md must be updated before every session-end commit. It must reflect: current phase, last completed task, resolved issues, and exact next action. No session closes without STATE.md being current. This is non-negotiable.

Claude Code updates STATE.md after every task using this exact format:

```
# STATE.md — KitchenViralPicks

Last updated: [date]
Last commit: [hash — message]

## Current Phase
[Phase number and name]

## Last Completed Task
[Task ID and description]

## Next Task
[Task ID and description]

## Known Issues
[Any open issues — or "None"]

## Live Server Status
[Deployed up to which commit — or "Not yet deployed"]
```

---

## 14. Safety Rules

- Git snapshot taken before EVERY file change via pre-edit hook
- If anything breaks: git checkout . restores the previous version instantly
- Nothing deploys to live without Varun typing "approved" in chat
- One fix = one commit — never batch multiple fixes into one commit

---

## 15. Assumptions Rule

- If the prompt has more than one valid interpretation — list them, pick none, ask Varun
- If any file path, URL, or product data is missing — STOP and report exactly what is missing
- Never proceed on an assumption that has not been stated out loud first