# code-rules.md — KitchenViralPicks Code Standards
# Agents must read this before writing any code.
# These rules apply to every file in the kvp-theme.

---

## Theme Folder

- Theme location: wp-content/themes/kvp-theme/
- Never modify any other theme folder
- Never touch wp-core files
- Never touch plugin files

---

## WordPress Standards

- All PHP files start with: <?php (no closing PHP tag at end of file)
- Use WordPress template hierarchy — never invent custom routing
- All database queries use WP_Query — never raw SQL
- All output is escaped: esc_html(), esc_url(), esc_attr()
- All translations use __() or _e() functions
- Enqueue all scripts and styles via functions.php — never hardcode in templates
- Never use jQuery unless absolutely required — use vanilla JS

---

## CSS Standards

- All brand colors defined as CSS custom properties in style.css
- Never hardcode hex values in component CSS — always use variables
- CSS variables:
  --color-primary: #E8401C;
  --color-accent: #F76B35;
  --color-bg: #FFF8F5;
  --color-text: #1A1A1A;
  --font-heading: 'Playfair Display', serif;
  --font-body: 'Lato', sans-serif;
- Mobile-first — write base styles for mobile, use min-width media queries to scale up
- Breakpoints:
  --bp-tablet: 768px;
  --bp-desktop: 1024px;

---

## Performance Rules

- No render-blocking scripts — all JS loads with defer or async
- Images use width and height attributes to prevent layout shift
- Google Fonts loaded via preconnect + single combined URL
- No unused CSS — only write styles that are actually used
- Target: page load under 3 seconds on mobile

---

## Security Rules

- Never expose file paths in output
- Never echo raw $_GET, $_POST, or $_REQUEST values
- All form inputs sanitized before use
- Nonces used on all forms

---

## File Naming

- PHP templates: lowercase, hyphenated (single.php, archive.php, page.php)
- CSS files: lowercase, hyphenated (style.css, single.css)
- JS files: lowercase, hyphenated (navigation.js)
- No spaces in filenames. Ever.

---

## Git Rules

- pre-edit hook must run before every file change
- Every completed task gets its own commit
- Commit message format: [Task X.X] Short description of what was built
- Never commit broken code
- Never force push to main branch

---

## What Agents Must Never Do

- Never edit live Hostinger files directly
- Never skip the pre-edit Git snapshot
- Never write inline styles in PHP templates — use CSS classes
- Never use !important in CSS unless absolutely unavoidable
- Never install plugins without Varun approval
- Never modify wp-config.php
