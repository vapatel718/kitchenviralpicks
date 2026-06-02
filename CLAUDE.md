# CLAUDE.md — KitchenViralPicks
# Read this file in full at every session start. Then read STATE.md.
# Content tasks → also read .claude/rules/content-rules.md
# Brand/design tasks → also read .claude/rules/brand-rules.md
# Code tasks → also read .claude/rules/code-rules.md
# Last updated: June 2026

---

## 1. Project Facts

Site: KitchenViralPicks.com | Theme: kvp-theme (WordPress custom)
Local: kitchenviralpicks.local via Local by Flywheel
Live: ssh -p 65002 u834996894@157.173.208.147
WP live path: /home/u834996894/domains/kitchenviralpicks.com/public_html
GitHub: vapatel718/kitchenviralpicks
Pen name: DEBORAH — permanent, locked, never changes, never Rick

---

## 2. Environments

| Task        | Environment                     |
|-------------|---------------------------------|
| WP-CLI      | Site Shell (Local by Flywheel)  |
| Git         | Regular Terminal only           |
| Live server | SSH port 65002                  |

Never mix environments. State which environment and why before every command.
Uncertain which to use — STOP and ask. Never guess.

---

## 3. Think Before Coding

Before writing a single line of code:
- State assumptions explicitly. If uncertain — ask, never guess.
- If multiple interpretations exist — list them, pick none, ask Varun.
- If a simpler approach exists — say so and wait for approval.
- If any file path, selector, or data is missing — STOP. Report exactly
  what is missing. Never fill gaps with assumptions.

Ask: "Would a senior engineer say this is overcomplicated?" If yes — simplify
and propose the simpler version before building anything.

---

## 4. Goal-Driven Execution

Never accept vague task descriptions. Transform every task into a
verifiable goal before starting.

Wrong: "Fix the background color"
Right: ".kvp-blog-hero background must be #FFF0EB — verified by grep on
single-blog.css AND confirmed visually in browser at kitchenviralpicks.local"

For multi-step tasks — state the full plan with a verification check per step
before touching any file:
  1. [Step] → verify: [exact check]
  2. [Step] → verify: [exact check]

After each step — checkpoint: report what was done, what was verified,
what remains. Do not proceed to the next step on a broken state.

---

## 5. Builder Protocol — Every Build or Modification Task

Exists because single-blog.php was built without reading the existing
theme system first, causing conflicts that required a full rebuild. The
same failure mode applies to any file, function, field, or template.

Step 1 — READ: Before writing anything, read the existing files that
the new code will touch, extend, or sit alongside. For templates: cat
style.css, functions.php, and the nearest working template. For
functions: read the full function file first. For custom fields: read
what fields already exist on the post type. Report what you find.

Step 2 — REPORT: Identify conflicts, overlaps, and integration points.
Deliver this report. Wait for Varun's explicit go-ahead.

Step 3 — BUILD: Only after the report is approved. New templates get
their own isolated CSS file, enqueued only when that template is active.
Never patch global files to solve a local problem.

---

## 6. Fix and Change Protocol

Step 1 — READ: View exact file, selector, and line responsible.
         Print findings. If unexpected — STOP, report, wait.
Step 2 — FIX: Touch only what the prompt explicitly names. Nothing else.
         Do not improve, refactor, or touch adjacent code.
         Every changed line must trace directly to the prompt.
Step 3 — VERIFY: Grep to confirm the change. Confirm no other file touched.
Step 4 — COMMIT: git commit -m "fix: [what] — [why]"
Step 5 — STATE: Update STATE.md. Every task. No exceptions.

One fix = one commit. Never batch.

---

## 7. Fail Loud — Never Fake Success

Never report success without verifying it. Specifically:
- Never say "done" without confirming output matches the goal criteria
- If something was skipped, incomplete, or uncertain — say so explicitly
- If a fix works for the tested case but edge cases were not checked — flag it
- "It should work" is not a verification. Show the grep, show the output.

Silent failures are the most expensive failures on this project.

---

## 8. Session Protocol

Start:
1. Read CLAUDE.md in full
2. Read STATE.md in full
3. Report: last commit hash, current phase, next task, open issues
4. Do not touch any file until Varun gives the first instruction

End:
1. Update STATE.md with current status and exact next task
2. Commit and push all changes
3. Report: what was done, commit hash, what is next

---

## 9. Workflow Rules

- Nothing touches live until Varun types "approved" in chat
- One task at a time. Verify before starting the next.
- Claude (chat) plans and writes prompts. Claude Code executes. Never reversed.
- Claude Code never researches products, browses, or makes content decisions.
- If product data is missing from the prompt — STOP. Report. Never fill gaps.
- kvp_price fields: numeric only, no $ no ~. Example: 24.32 not ~$24.32
- Dollar signs in WP-CLI: escape as ~\$ or the $ gets stripped silently.
- wp post term set with numeric args creates term names not IDs — use slugs.

---

## 10. STATE.md Format

Last updated: [date]
Last commit: [hash — message]
Current Phase: [Phase name]
Last Completed Task: [Description]
Next Task: [Description]
Known Issues: [Description or "None"]
Live Server Status: [Deployed up to commit — or "Not yet deployed"]
