# CLAUDE.md — KitchenViralPicks

---

## 1. Project Facts

Site: KitchenViralPicks.com | Theme: kvp-theme (WordPress custom)
Local: ~/Local Sites/kitchenviralpicks/app/public
Live: /home/u834996894/domains/kitchenviralpicks.com/public_html
Theme subfolder: wp-content/themes/kvp-theme
GitHub: vapatel718/kitchenviralpicks
Pen name: DEBORAH — permanent, locked, never changes

---

## 2. Your Only Job

You are a code executor. Not a planner. Not a researcher. Not a
decision-maker. Every prompt has already been diagnosed and planned
in chat. Execute exactly what the prompt says and report back.
If the prompt is ambiguous — STOP. Report what is unclear.
Never fill gaps with assumptions.

---

## 3. Environments

| Task          | Environment                    |
|---------------|--------------------------------|
| WP-CLI        | Site Shell (Local by Flywheel) |
| Git           | Regular Terminal only          |
| File edits    | Claude Code only               |
| Live server   | SSH -p 65002                   |

Never mix environments.

---

## 4. File Architecture

Three content templates:
- single.php → Product reviews → reads style.css
- single-roundup.php → Pillar roundups → reads style.css
- single-blog.php → Response posts → reads single-blog.css only

Two CSS files:
- style.css → Global. All templates except response posts.
- single-blog.css → Response posts only. Never touch for other templates.

One functions file:
- functions.php → All hooks, enqueue logic, price helpers.

Never add template-specific styles to style.css.
Never create .bak files. Git is the safety net.
Never touch single.php structure without explicit instruction.

---

## 5. Fix Protocol

1. FIND — locate exact file, selector, line. grep first.
2. CHANGE — touch only what the prompt explicitly names. Nothing else.
3. VERIFY — grep confirms the change persisted.
4. COMMIT — git add [file] && git commit -m "fix: [what] — [why]"
5. REPORT — paste grep output + commit hash. Stop.

One fix = one commit. Never batch unrelated changes.
Never report done without showing grep output.

---

## 6. Build Protocol

For new features only:

1. READ — cat the files the new code will touch or sit alongside.
   For templates: cat style.css + functions.php + nearest working
   template. Report what you find.
2. REPORT — identify conflicts and integration points. Wait for
   go-ahead before writing a single line.
3. BUILD — new templates get isolated CSS, enqueued conditionally.
   Never patch global files to solve a local problem.

---

## 7. Deploy Protocol

Local verify → git add → git commit → git push → SCP to live → Hostinger cache purge.

Nothing goes to live until Varun types "approved" in chat.
SCP format: scp -P 65002 [local-file] u834996894@157.173.208.147:[live-path]

---

## 8. Commit Format

fix: description — reason
feat: description
chore: description
content: description
state: description

---

## 9. Reporting Format

Every response must follow this structure:

What I did: [one line]
File changed: [filename]
Grep confirmation: [paste output]
Commit hash: [hash]
Next: [what remains or "nothing — waiting"]

---

## 10. Hard Rules

- Never open a file not named in the prompt
- Never update STATE.md unless the prompt explicitly says to
- Never run SCP or SSH unless the prompt explicitly says to
- Never make content decisions or fill in product data
- Never create backup files (.bak, .bak2, etc)
- Never batch multiple fixes into one commit
- Never say done without grep confirmation
- Never write code based on assumptions about file contents
- Never proceed past a broken verification step
- Never mix WP-CLI and Git in the same terminal environment
