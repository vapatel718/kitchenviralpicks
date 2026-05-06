# CLAUDE.md — KitchenViralPicks Master Rules
# Every agent reads this file before doing anything else.
# Last updated: May 2026

---

## Project Identity

- Site: KitchenViralPicks.com
- Type: Affiliate marketing site — kitchen product reviews
- Monetization: Amazon Associates
- Stack: Custom WordPress theme (kvp-theme)
- Local dev: kitchenviralpicks.local (Local by Flywheel)
- Live host: Hostinger
- Domain: Namecheap
- Version control: Git + GitHub
- Pen name: Rick
- Author title: Kitchen Researcher & Product Analyst

---

## Operator

- Name: Varun
- Technical level: Beginner — explain every term first time it appears
- Goal: Passive income for family financial freedom
- Rule: One task at a time. Never jump ahead.

---

## Brand Colors — Never Change These

- Primary (Flame Red): #E8401C
- Accent (Warm Orange): #F76B35
- Background (Cream): #FFF8F5
- Text (Charcoal): #1A1A1A

---

## Brand Typography — Never Change These

- Headings: Playfair Display
- Body: Lato

---

## Design Rules — Never Compromise

- Mobile-first — majority of visitors are on phones
- Warm and trustworthy — not cold, not corporate
- Clean and uncluttered — fast loading, easy to read
- Verdict boxes and affiliate buttons must be prominent
- No generic AI aesthetics — must look like a real kitchen brand

---

## Agent Rules

- kvp-architect: Plans only. Never writes code. Never touches WordPress.
- kvp-builder: Builds theme files only. Never touches live site.
- kvp-reviewer: Checks code quality and brand compliance. Never touches WordPress.
- kvp-publisher: Deploys to Hostinger ONLY after explicit Varun approval in chat.

---

## Workflow — Every Task Without Exception

1. Plan the task in chat
2. Varun reviews the plan
3. Varun approves
4. Execute locally (kitchenviralpicks.local)
5. pre-edit hook runs — Git snapshot taken
6. Varun reviews in browser
7. Varun approves or rejects
8. If approved — update tasks.md — move to next task
9. If rejected — fix — re-review
10. Phase complete — push to Hostinger

Golden Rule: Nothing touches the live Hostinger site until Varun approves it locally.

---

## Safety Rules

- Git snapshot taken before EVERY file change (pre-edit hook)
- If anything breaks: git checkout . restores previous version instantly
- Nothing in review-queue.md executes without Varun typing "approved"
- Publisher agent never runs without explicit Varun approval in chat

---

## Content Rules — Non-Negotiable

- NEVER claim personal product usage — Varun has not tested these products
- ALWAYS use research-based voice: "Based on X verified reviews..."
- FTC disclosure must appear BEFORE the first affiliate link on every page
- NEVER copy Amazon product descriptions — always rewrite in original words
- Prices always: "at the time of writing, priced around $X"
- Amazon ratings always: "X.X stars on Amazon (XX,XXX reviews)"
- All Amazon links must include rel="sponsored nofollow" in HTML
- NEVER use: game-changer, must-have, look no further, boasts, features, we tested

---

## Rule Files

- Brand rules: .claude/rules/brand-rules.md
- Code rules: .claude/rules/code-rules.md
- Content rules: .claude/rules/content-rules.md

---

## Hook Files

- Pre-edit (auto Git snapshot): .claude/hooks/pre-edit.sh
- Post-edit (auto verify): .claude/hooks/post-edit.sh

---

## Current Task Board

See: tasks.md
