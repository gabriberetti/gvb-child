# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**Good Vibe Bottles** is a WordPress website for a German drinkware/bottle company. It uses the **Full Site Editing (FSE)** architecture with a custom child theme (`gvb-child`) built on top of Twenty Twenty-Five.

- **Production:** Live at **https://goodvibebottles.com** (Hostinger Business, since 2026-04-24). `.de` + `.at` parked at Checkdomain.
- **Local dev:** Local by Flywheel at `http://good-vibe-bottles.local` — staging environment. Never push Local DB to prod.
- **Deployment:** Git auto-deploy — `git push origin main` on this theme repo → Hostinger pulls in ~15–20 sec. See parent `/CLAUDE.md` in project root for full deployment details + SSH access (`ssh hostinger-gvb`).
- **Theme:** `gvb-child` child theme (FSE, no page builders)
- **Languages:** Bilingual since **2026-04-30**. German (`de_DE`) is the canonical, English under `/en/` is the parallel section. EN pages = `page` post type under parent slug `en`; EN blog posts = `en_post` CPT at `/en/blog/*`; EN categories = `en_category` taxonomy. Static page pairs hardcoded in `gvb_page_pair_map()`; blog post pairs via ACF `Translation Pairing` field. Two `wp_navigation` posts (DE=ID 6, EN=ID 197) referenced via `"ref"` in respective header parts. EN featured zone uses ACF `is_featured` field (sticky_posts doesn't apply to CPTs). EN Fluent Forms ID 5 (Option A: labels translated, option Values stay German). Full architecture in project root `CLAUDE.md` and memory file `project_bilingual_launch.md`. No multilingual plugin.
- **Key constraint:** Clients author blog posts using only the Gutenberg block editor — no code

## Development

No build step is required for the child theme. CSS and templates are hand-written.

To optionally minify the child theme CSS (PostCSS + cssnano, via the parent theme's package.json):
```bash
# From: app/public/wp-content/themes/twentytwentyfive/
npm run build   # One-time minification
npm run watch   # Watch mode
```

Requires Node ≥20.10.0, npm ≥10.2.3.

There is no linting or test suite configured.

## Architecture

All custom code lives in `app/public/wp-content/themes/gvb-child/`.

```
gvb-child/
├── style.css          # All custom styles (~5,400 lines, 20 sections)
├── theme.json         # Design tokens (colors, fonts, spacing)
├── functions.php      # Theme setup: enqueues, pattern registration, Adobe Fonts
├── templates/         # FSE page templates (21 total, one per page type)
├── patterns/          # Block patterns (70+ PHP files, registered in functions.php)
├── parts/             # FSE template parts: header.html, footer.html
└── assets/
    ├── js/
    │   ├── cases-carousel.js      # Vanilla JS tab switcher
    │   ├── carousel.js            # Generic [data-carousel] horizontal carousel controller
    │   └── scroll-animations.js   # IntersectionObserver fade-up system
    ├── img/                   # Static images / fallback featured image
    └── svg/                   # SVG icons
```

### Unsere Lösungen Sub-pages (all ✅ built March 2026)

Each sub-page lives in `templates/page-{slug}.html` and uses per-page patterns for hero/intro/benefits/faq. Template order: `header → industrie-hero-{slug} → industrie-intro-{slug} → industrie-benefits-{slug} → cases-carousel → logos → losungen-branding → contact-form → industrie-faq-{slug} → brand-promise → footer`

| Page | Template | Hero image |
|------|---------|------------|
| Bedrucken | `page-bedrucken.html` | `hero-bedrucken.jpg` |
| Unternehmen | `page-unternehmen.html` | `hero-unternehmen.jpg` |
| Sportvereine | `page-sportvereine.html` | `hero-sportvereine.jpg` |
| Gesundheitswesen | `page-gesundheitswesen.html` | `hero-gesundheitswesen.jpg` |
| Hotel Wellness und Spa | `page-hotel-wellness-und-spa.html` | `hero-hotel-wellness-und-spa.jpg` |
| Bildungseinrichtungen | `page-bildungseinrichtungen.html` | `hero-bildungseinrichtungen.jpg` |
| Impressum | `page-impressum.html` | `hero-uberuns.jpg` (reused) |
| Download | `page-download.html` | `hero-download.jpg` |
| FAQ | `page-faq.html` | `hero-faq.jpg` |

**Hero H1 standard** (all industry + bedrucken heroes):
```css
font-size: clamp(35.641px, 2.228rem + ((1vw - 3.2px) * 2.621), 65px);
font-weight: 700; line-height: 1; letter-spacing: -1.95px;
color: gvb-linen (#EDE8DB)
```

**Hero content** uses `margin-left: 55% !important` (right-side positioning) via `.gvb-hero--industrie .gvb-hero__content` rule in `style.css`. At `≤784px`, **all** specific hero selectors (`--losungen`, `--bedrucken`, `--industrie`, `--faq`, `--uberuns`, `--blog`) must be re-declared with `margin-left: 0 !important` in the mobile block — the generic `.gvb-hero__content { margin-left: 0 }` reset is not sufficient because `!important` specificity wins. This is already handled in section 16 of `style.css`.

**Hero `object-position` per page** — when a photo's subject (face, bottle, etc.) sits off-centre and gets cropped by the hero's `object-fit: cover`, add a `.gvb-hero__bg--{slug} { object-position: ... }` rule. Convention: hero pattern HTML already includes the per-page bg modifier class (e.g. `gvb-hero__bg--impressum`). Y-position semantics with `object-fit: cover`: lower Y % = visible window slides UP source (subject appears LOWER in frame); higher Y % = visible window slides DOWN source (subject appears HIGHER in frame). Current overrides: `--blog { center 10% }` (girl's head stays in frame), `--borosilikat { center 30% }` (bottle near top of crop), `--tritan { center 80% }` (bottle base inside frame), `--impressum { center 60% }` (Simon Fortmüller portrait pushed up ~65px), `--losungen { 30% center !important }` (X-axis nudge to feature bottle). Default (no override) = `center center` (50% 50%).

**Benefits sections** reuse `.gvb-personalisieren` + `.gvb-personalisieren-card` CSS (no new classes per page).

**FAQ sections** (industry pages): single orange block, linen heading "Du hast Fragen? Wir haben Antworten.", `-1.8px` letter-spacing, 2-column layout (2 items left / 3 items right).

### Design System (`theme.json`)

**Colors:** `gvb-green` (#459271), `gvb-orange` (#F28C3B), `gvb-orange-hover` (#E65620), `gvb-linen` (#EDE8DB), `gvb-graphite` (#2B2B2B), `gvb-white`, `gvb-black`, `gvb-divider` (#E9E9E9)

**Typography:** `scale-variable` (Adobe Fonts, TypeKit ID: `ycw7tlm`). 1440-design sizes: display (65px), h1 (60px), h2 (40px), h3 (32px), h4 (24px), h5 (18px), h6 (30px), body (16px). **Most font-sizes are static at the 1440-design value across all viewports.** A selective fluid-scale 1440→1920 was added 2026-04-28 on specific card-layered sections + chrome — see *Fluid Typography* section below.

### Fluid Typography — partial 1440→1920 scaling (2026-04-28)

**Backstory:** an earlier April 2026 attempt scaled every font-size 1440→2560 (×1.778). It was reverted to static MIN values (Figma 2200 design uses the same type sizes as Figma 1280). Then on 2026-04-28 a **narrower fluid-scale 1440→1920** was reintroduced on a deliberate subset — only the card-layered sections that need to feel proportional on wide monitors, plus a small bump on chrome. Everything else stays static.

**Scope of current fluid scaling** (single `@media (min-width: 1440px)` block in style.css just before the FAQ accordion section):

| Selector | Sizes (1440 → 1920) | Ratio |
|---|---|---|
| `.gvb-personalisieren__heading`, `.gvb-personalisieren-card__title` | 40 → 53px | ×1.333 |
| `.gvb-personalisieren-card__desc` | 16 → 21px | ×1.333 |
| `.gvb-bedrucken-anlass__heading` | 40 → 53px | ×1.333 |
| `.gvb-bedrucken-anlass .gvb-overlay-card__title` | 31 → 41px | ×1.333 |
| `.gvb-bedrucken-anlass .gvb-overlay-card__desc` | 16 → 21px | ×1.333 |
| `.gvb-cases__panel h3.wp-block-heading` (`!important`) | 32 → 43px | ×1.333 |
| `.gvb-cases__panel h4.wp-block-heading` (`!important`) | 40 → 53px | ×1.333 |
| `.gvb-product-card__title` | 32 → 43px | ×1.333 |
| `.gvb-product-card__text` | 16 → 21px | ×1.333 |
| `.gvb-header__nav .wp-block-navigation-item__content` (`!important`) | 15 → 17px | ×1.13 (chrome) |
| `.gvb-footer__nav-heading` (`!important`) | 15 → 17px | ×1.13 (chrome) |
| `.gvb-footer__nav-list` (`!important`) | 16 → 18px | ×1.13 (chrome) |

**Why two ratios:**
- **×1.333** (full proportional to viewport) on content sections — keeps them visually balanced with the wider container at 1920.
- **×1.13** on navbar + footer — they're UI chrome, should defer visually to content. Convention is small or no scaling on these.

**Why `!important` on some rules:** the cases section + navbar + footer all have inline `style="font-size:Xpx"` from the pattern PHP / parts/header.html. Inline beats CSS rules without `!important`. Could be cleaned up later by stripping the inline styles from PHP, but `!important` is consistent with the existing mobile rule pattern (e.g. `.gvb-cases__panel h3.wp-block-heading { font-size: 18px !important }` at ≤784).

**Hero H1 exception (preserved from the freeze):** every hero pattern ships with `style="font-size:clamp(35.641px, 2.228rem + ((1vw - 3.2px) * 2.621), 65px)"` — a custom 320→1440 mobile slope. NOT touched by the new fluid system. The hero stays at 65px on desktop.

**Mobile typography:** none of these clamps fire below 1440 — they all use a clean `clamp(MIN, …vw, MAX)` where the middle value at 1440 viewport equals MIN, so `<1440` resolves to MIN (the original static value). Mobile is untouched.

**Canonical tokens at `:root`** (Section 1 of style.css): `--fs-display`, `--fs-h1`, `--fs-h2`, `--fs-h3`, `--fs-h4`, `--fs-h5`, `--fs-h6`, `--fs-body`, `--fs-label`, `--fs-label-sm`. **Currently static** (1440-design values). If/when the fluid scaling is extended site-wide, these tokens are the natural place to do it — make each token a clamp like the per-element rules above.

**To extend fluid type to other elements** (if the team decides later):
1. Identify the static font-size declaration (in style.css or inline in a pattern/header).
2. Replace with `clamp(Xpx, calc(c + slope×vw), Xnewpx)` using:
   - For ×1.333 ratio: slope = `(Xnew − X) / 480` × 100 → as `vw`. constant = `X − slope_decimal × 1440`.
   - Quick formula: `clamp(X, calc((X−Xnew×3)px + (Xnew−X)/4.8 vw), Xnew)` when Xnew = X × 1.333.
3. Inline-style overrides in PHP need `!important` — or strip the inline style from the pattern.
4. Always anchor at 1440 → MIN and 1920 → MAX so mobile is untouched and desktop caps cleanly.

**Cache-bust**: `functions.php` uses `filemtime( get_stylesheet_directory() . '/style.css' )` for the enqueue version, so every save auto-invalidates the browser cache. Never switch this back to a static `Version` string.

**Spacing:** XS 8px / SM 16px / MD 32px / LG 64px / XL 80px. Content width: 1200px, wide: 1440px.

**Buttons:** orange background (#F28C3B), hover (#E65620), 50px border-radius.

### Animation System (Section 18 of style.css — added April 2026)

Two animation types are active site-wide. All animation CSS lives in **Section 18** at the end of `style.css`. The JS lives in `assets/js/scroll-animations.js`, enqueued globally in `functions.php`.

#### Hover Scale (zoom on hover)
Applied to all interactive buttons and cards. Pure CSS — no JS needed.

| Element | Selector | Effect |
|---|---|---|
| Industry image cards | `.gvb-industry-card` | `translateY(-8px)` lift |
| Blog article cards | `.gvb-blog-card` | `translateY(-6px)` lift + shadow |
| Gutenberg primary buttons | `.wp-block-button.gvb-btn--primary` | `scale(1.08)` |
| Plain anchor primary buttons | `.gvb-btn-primary` | `scale(1.08)` |
| Small buttons (industry card CTAs) | `.gvb-btn-sm` | `scale(1.08)` |
| Form submit button | `.gvb-contact__form-col .ff-btn` | `scale(1.08)` |
| Blog read-more button | `.wp-block-read-more.gvb-btn--orange` | `scale(1.08)` |

All scale buttons use `transition: transform 0.3s ease` and `will-change: transform`.

**Specificity pitfall:** When a button also carries `gvb-fade-up` + `gvb-in-view`, the `.gvb-fade-up.gvb-in-view { transform: translateY(0) }` rule overrides the hover transform (same specificity, later in file). Fix already applied: add `.gvb-btn-primary.gvb-in-view:hover`, `.gvb-btn-sm.gvb-in-view:hover`, `.wp-block-button.gvb-btn--primary.gvb-in-view:hover` rules with 3-class specificity after `.gvb-fade-up.gvb-in-view`.

#### Fade-Up on Scroll
Elements with class `gvb-fade-up` start at `opacity: 0; transform: translateY(30px)` and animate to visible (`opacity: 1; transform: translateY(0)`) when they enter the viewport. Duration: `0.8s ease` (Apple-style).

**JS logic (`scroll-animations.js`):**
- Single `IntersectionObserver` with `rootMargin: '0px 0px -60px 0px'`
- Fires once per element, then stops watching (`observer.unobserve`)
- Auto-staggers direct siblings: finds all `:scope > .gvb-fade-up` children of the same parent, applies `transition-delay` of `index × 0.1s`

**Patterns with `gvb-fade-up` applied:**

| Pattern | Elements animated |
|---|---|
| `intro-text.php` | `<p>` |
| `losungen-intro.php` | `<p>` |
| `bedrucken-intro.php` | `<p>` |
| `blog-intro.php` | `<p>` |
| `flaschen-intro.php` | both `<p>` tags (stagger) |
| `edelstahl-intro.php` | `<p>` |
| `borosilikat-intro.php` | `<p>` |
| `tritan-intro.php` | `<p>` |
| `uberuns-intro.php` | `<p>` |
| `industrie-intro-*.php` (5 files) | `<p>` inside `gvb-flaschen-intro` |
| `product-cards.php` | each `.gvb-product-card` (stagger) |
| `testimonials.php` | `.gvb-testimonials__header` + each `.gvb-testimonial-card` |
| `logos.php` | `.gvb-logos` |
| `brand-promise.php` | h2 + p + buttons div (stagger) |
| `losungen-branchen.php` | heading + each `.gvb-industry-card` |
| `losungen-personalisieren.php` | heading + each `.gvb-personalisieren-card` |
| `losungen-branding.php` | h2 + 2× p + button (stagger) |
| `losungen-steps.php` | each `.gvb-steps__row` |
| `edelstahl-features.php` | heading + each feature card |
| `borosilikat-features.php` | heading + each feature card |
| `tritan-features.php` | heading + each feature card |
| `industrie-benefits-*.php` (5 files) | heading + each `.gvb-personalisieren-card` |

**NOT animated:** hero sections, header/footer, cases carousel, contact form fields, FAQ accordion items.

### Generic Carousel System (`assets/js/carousel.js` — added April 2026)

Any element with `data-carousel` is a carousel root; inside it, `[data-carousel-track]` is the scrollable strip and `.gvb-carousel-nav--prev` / `--next` are clickable chevron buttons. The JS toggles `.is-at-start` / `.is-at-end` on the root based on scroll position; CSS uses those classes to hide the prev chevron at the start and the next chevron at the end. Chevron clicks scroll by one card (`firstCardWidth + columnGap`).

**Current users:**
- `.gvb-bedrucken-anlass` — carousel at 426–784px (2 cards visible, 3rd peeks)
- `.gvb-product-cards` — carousel at 426–784px (same pattern)

**Adding a new carousel:**
1. Add `data-carousel` + `is-at-start` class to the root; `data-carousel-track` to the scroll strip.
2. Inject two `<button class="gvb-carousel-nav gvb-carousel-nav--prev/--next">` with German `aria-label` and an inline SVG chevron.
3. In the section's tablet media block: set root `position: relative`, flip nav `display: grid`, add track scroll styles (`overflow-x: auto; scroll-snap-type: x mandatory; gap: 16px; scrollbar-width: none`) and card sizing (`flex: 0 0 calc(50% - 8px); scroll-snap-align: start`).
4. At phone range, reset the track (`overflow-x: visible; scroll-snap-type: none`) and hide the nav (`display: none`).

Base `.gvb-carousel-nav` styling (size, colour, focus ring, hover scale) lives once at the top of `style.css` — hidden by default, each carousel flips it on within its own media block. State visibility rules are driven off `[data-carousel].is-at-start/.is-at-end`.

### Block Patterns

Patterns are PHP files in `patterns/`, all registered in `functions.php`. Each pattern corresponds to a section of a specific page (e.g., `edelstahl-hero.php`, `edelstahl-product.php`). When adding a new page, create patterns per section and register them in `functions.php`.

### FSE Templates

Templates in `templates/` are HTML files using WordPress block markup. Page-specific templates follow the naming convention `page-{slug}.html`. They are composed by inserting block patterns.

### Key Plugins

| Plugin | Purpose |
|--------|---------|
| Advanced Custom Fields (ACF) | Structured product specs for bottle pages |
| Fluent Forms | Contact/quote forms (supports .eps/.ai/.pdf uploads) |
| RankMath SEO | On-page SEO and sitemaps |

### CSS Utility Classes

| Class | Purpose |
|-------|---------|
| `.gvb-section--green/orange/cream/dark` | Section background variants |
| `.gvb-btn--primary` / `.gvb-btn--secondary` | Gutenberg block button styles |
| `.gvb-btn-primary` | Plain anchor button (orange, pill) |
| `.gvb-btn-sm` | Small orange pill button (used in industry cards) |
| `.gvb-split` | 50/50 image + text layout |
| `.gvb-step-card` | Numbered dark step cards |
| `.gvb-blob` | Organic blob shape (CSS approximation — use SVG exports for pixel-perfect) |
| `.gvb-rounded-img` | Rounded photo corners (16px) |
| `.gvb-fade-up` | Scroll-triggered fade-up animation (JS observer adds `.gvb-in-view`) |

Responsive breakpoints (aligned to Chrome DevTools device presets):

| Preset | Width | Usage |
|---|---|---|
| Mobile S | `≤320px` | `gvb-br-mobile-s` line breaks, Anlass title/desc tightening |
| Mobile M | `321–375px` | `gvb-br-mobile-m` line breaks |
| Mobile L | `≤425px` | Single-column stacks, Anlass carousel reset |
| Tablet | `≤784px` | Main mobile layout block (collapse columns, mobile nav overlay, etc.). Unified 768→784 in April 2026 to align with WP admin-bar at 782/783 + smart-navbar JS guard at 785. |
| Laptop | `≤1024px` | Industry grid stack; `(785–1024)` iPad-only Anlass title clamp + carousel (was 769; bumped after the 768→784 unification) |
| Laptop L | `≥1440px` | Section 19b rules kick in — per-section width caps apply |
| 4K | `2560px` | Outer-shell ceiling — every direct child of `.wp-site-blocks` caps here (except footer) |

Auxiliary breakpoints still in use (not DevTools presets but serve real purpose):
- `≤1199px` — Steps section fluid scaling (avoids overlap with 1200 desktop rules)
- `≤1200px` — desktop → fluid columns
- `≤784px` (8 occurrences) — **canonical mobile/tablet boundary**. Aligns with WP admin-bar breakpoint (782/783, locked by WP core) and smart-navbar JS guard (`min-width: 785px`). Use 784 for ALL new mobile rules — the old 768 boundary was unified up to 784 in April 2026 for navbar/content consistency.
- `≥783px` (1 occurrence, line 258) — WP admin-bar offset. Locked at 783 by WP core CSS — do not change.
- `≥769px` (1 occurrence, line 491) — footer-nav 4-col layout. Harmless residual from the 768→784 unification; flip to 785 next time the footer is touched.
- `≤480px` — consolidated into a single block (global h1/h2/buttons + section-specific overrides)

**Mobile responsive strategy** (sections 16–17 of `style.css`, updated April 2026):
- All fixed-width flex/grid columns (product cards, steps, VM rows, branding) collapse to single-column stacks at 784px (canonical mobile boundary — see breakpoints table above)
- **Mobile width standard:** all sections use `20px` inset on each side → 350px on a 390px device. Card sections use `margin: 0 20px`; content sections use `padding: 0 20px`
- Touch targets: color swatches 44×44px, cases tabs `min-height: 44px` (Apple HIG: 44pt minimum)
- Hero overlay strengthened to `rgba(0,0,0,0.28)` on mobile for text legibility when content is centred
- Feature card images (`gvb-edelstahl-feature-card__image`, `gvb-borosilikat-feature-card__image`): 140×140px + `align-self: center` on mobile; text blocks `text-align: center` + `align-items: center`
- Contact form fields: `gap: 32px` between stacked fields within pairs, `margin-bottom: 32px` between groups
- Page background waves: top wave + green strip live as 2 `background-image` layers on `.wp-site-blocks`; bottom wave lives on `.wp-site-blocks::before` (pseudo) anchored `bottom: var(--bottom-wave-offset)` so it lands at brand-promise's top on every page regardless of length. `.wp-site-blocks { background-color: #EDE8DB }` (linen) is the page bg. `html { overscroll-behavior: none }` disables rubber-band. Per-viewport top-wave SVG: `background-large-top.svg` (≥1920), `desktop-wave-top.svg` (769–1919), `mobile-top-wave.svg` (≤768). Bottom: `background-large-bottom.svg` (≥769) / `background-mobile-bottom.svg` (≤768) — both have linen rect stripped so they don't mask the top wave behind them. Six tuning knobs: `--top-wave-start`, `--top-wave-h`, `--top-wave-zoom`, `--top-wave-fade`, `--bg-h`, `--bottom-wave-offset`. **DO NOT list the bottom-wave SVG in `.wp-site-blocks`'s `background-image`** — bg-image cycling causes it to paint at the top of the page using the top-wave's geometry. Old `wave-*.svg` files are superseded — do not reintroduce.
- **Mobile nav overlay (section 17):** ALL styles targeting `.wp-block-navigation__responsive-container` children must use `.is-menu-open` in the selector — this container is visible on desktop too. Hamburger/close button styles must be inside `@media (max-width: 784px)`. WP-core gotchas we override:
  1. **`.responsive-dialog { margin-top: 46px }` (logged-in admin-only gap)** — WP adds this via `.has-modal-open .admin-bar .is-menu-open .wp-block-navigation__responsive-dialog` to clear the admin bar, but stacks on top of our content padding-top → phantom ~130px gap. Fix: `margin-top: 0 !important` on dialog. Invisible for logged-out visitors so easy to miss when testing.
  2. **`justify-content` flipping on content wrapper** — WP sets it from `--navigation-layout-justify` which resolves from the nav block's `justifyContent:"right"` to `flex-end`. In a `flex-direction: column` container that becomes the main (vertical) axis and pushes the nav `<ul>` to the bottom of the overlay. Force `justify-content: flex-start` on `.responsive-container-content`.
  3. **`align-items` on `.wp-block-navigation-item`** — WP sets it to the same `--navigation-layout-justification-setting` (flex-end for "right" nav). Force `align-items: flex-start`.
  4. **`flex-wrap: wrap` on `.wp-block-navigation__container`** — in flex-column + height-constrained overlay causes items to wrap into multiple side-by-side columns (crashing/overlapping). Force `flex-wrap: nowrap`.
  5. **`.responsive-close` margin:auto crushing** — WP gives it `margin: auto` under `.has-modal-open`, which in flex-column shrinks it to content-width. Fix: `width: 100% !important; height: 100% !important; margin: 0 !important; max-width: none !important`. Also force dialog to `width: 100%; height: 100%; display: flex; flex-direction: column`.
  
  Final content padding: `.responsive-container-content { padding: 72px 32px 80px }` (72 top clears fixed × button at top:24 + 44px height + 4px gap). × button: `position: fixed; top: 24px; right: 24px; z-index: 10; min-width/height: 44px`. Kontakt hidden via `:has(> a[href*="#kontakt"]) { display: none }`.
- Blog page mobile: featured articles stack image-first (`order: -1`) with `height: auto !important` on `<figure>` and `<a>` to override WP inline `height: 432px`; all-articles cards go single-column — use `display: flex; flex-direction: column` on the `ul` (not `grid-template-columns`) to handle both WP flex and grid post-template layouts
- Blog desktop: `.gvb-blog-grid .wp-block-post-template` has `min-height: 520px; align-content: start` so all pages keep consistent section height regardless of article count (6 articles = 3 rows of 2)
- **Bedrucken anlass mobile:** content below image (not overlaid) — `__img` set to `position: relative; height: 280px; border-radius: 20px`; `__content` has `background: none` (section already orange)
- **Bedrucken anlass iPad carousel (426–784px only):** `.gvb-overlay-cards` → `display: flex; overflow-x: auto; scroll-snap-type: x mandatory; gap: 16px`. Cards → `flex: 0 0 calc(50% - 8px); scroll-snap-align: start`. Static chevron scroll-hint via `.gvb-bedrucken-anlass::after` — 36×36 linen circle with inline SVG chevron at `right: 16px; top: 55%`. **No animation** (explicitly rejected). Hidden at `≤425px`. At `≤425` the carousel is reset (`overflow-x: visible; scroll-snap-type: none`) and cards stack single-column.
- **Anlass title/content positioning (revised 2026-04-30):** Title stays absolutely-positioned **inside `__media`** (NOT in `__content`) so the card's cream/linen bg only shows behind desc, never behind title. Desktop: `.gvb-overlay-card__title { bottom: 50px }` + `.gvb-overlay-card__content { padding: 0 24px 24px; margin-top: -50px }` — title bottom-edge meets cream top-edge at the seam, desc starts directly below with no gap (the "title sits on desc" tight-stack visual). iPad band (785–1024): title `bottom: 40px` + `font-size: clamp(20px, 2.3vw, 24px)`. Mobile S (≤320): title `bottom: 90px` + `font-size: 15px !important`, desc `font-size: 10px`. Mobile (≤480): title `25px !important`, desc `13px`. **Don't move H3 into `__content`** — it pulls the cream bg behind the title (tested + reverted, see project_anlass.md).
- **Anlass card height (≥1025, added 2026-04-30):** `.gvb-bedrucken-anlass .gvb-overlay-card { height: 700px }` at desktop. Inside the same media query, media drops `aspect-ratio: 4/5` and uses `flex: 1 1 auto; min-height: 0` so the image fills the remaining space above content. Tablet/mobile keep aspect-ratio. Figma 1280 baseline 574 × 1.125 = 646; bumped to 700 for breathing room.
- **Personalisieren `--industry` modifier (added 2026-04-29/30):** `.gvb-personalisieren--industry { padding-top: 0 }` removes the 80px top padding on the 5 industry-benefits sections + Bedrucken Statement. Applied via `class="gvb-personalisieren gvb-personalisieren--industry"` in `industrie-benefits-{slug}.php` and `bedrucken-statement.php`. Homepage Lösungen Personalisieren section unaffected.
- **Footer stack at 785-1199 (added 2026-04-30):** between `≥1200` (where 33%/67% horizontal layout works) and `≤784` (mobile stack), the footer's nav-wrap can't fit 7 columns horizontally → FAQ overflowed off-screen. Added `@media (max-width: 1199px) and (min-width: 785px) { .gvb-footer__inner { flex-direction: column !important } }` to stack brand+nav vertically. Visual order reversed (`order: 1` on nav-wrap, `order: 2` on brand) so links appear above logo block in this band.
- **Lösungen hero zoom + reframe (added 2026-04-30):** `.gvb-hero__bg--losungen { object-position: 100% 85% !important; transform: scale(1.30) }` — pushes subject left + up + zoom. Pattern only used on `/unsere-losungen/` (product pages have own bg classes). With `object-fit: cover` the image stays edge-to-edge so no off-image area is exposed.
- **Mobile bottle showcase img fix (added 2026-04-29):** at ≤784, `.gvb-bottle-card__image img` uses `height: 100% !important; width: auto !important; max-height: 100% !important; top: 0 !important; left: 50% !important; transform: translateX(-50%) !important` to lock the bottle inside the 280px container. Defeats per-SKU `width: 76%; top: -6%` etc. that made tall bottles overflow `overflow: hidden`. !important needed for specificity vs `.gvb-bottle-card--slim .gvb-bottle-card__image img` (0,3,1).
- **Datenschutz body card (added 2026-04-30):** `.gvb-datenschutz__inner` now styled as an orange card with linen heading/body/links text — matches impressum card pattern. Avoids the page-bg green strip bleeding behind the long policy text. `border-radius: 20px; padding: 48px 52px; box-shadow: 0 25px 33px -15px rgba(149,149,149,0.25)`.
- **FAQ home deep-links to /download/ sections (added 2026-04-30):** `.gvb-download-section` divs in `download-cards.php` carry `id="preisliste"` and `id="druckleitfaden"`. FAQ home links use `/download/#preisliste` and `/download/#druckleitfaden`. Footer "Preisliste" link kept at `/download/` (intentional, top of page).
- **Mobile line-break classes** (used in `patterns/bedrucken-anlass.php` + `industrie-hero-unternehmen.php`): `.gvb-br-mobile` visible at ≤375, `.gvb-br-mobile-m` visible 321–375 only, `.gvb-br-mobile-s` visible ≤320 only, `.gvb-br-card` visible at ≤480 (industry-card H5 word-breaks like Bildungs/einrichtungen), **`.gvb-br-phone` visible at ≤480** (covers typical phones 375–425 where `.gvb-br-mobile`'s ≤375 gate doesn't reach — used for hero H1 long compound German words like "Umweltbewusste"), **`.gvb-only-phone` visible at ≤480** (companion class for visible content, e.g. a soft hyphen `-` between mid-word breaks). All default to `display: none`; each media query flips the relevant one to `inline`. Lets us tune line-breaks per DevTools preset without duplicating markup.
- **WP inline padding cleanup:** When a WP group block carries `style="padding:..."` inline, don't stack `!important` zero-padding overrides in CSS. Strip padding from the pattern PHP instead — edit both the block-comment JSON (`"padding":{...}`) and the div's `style=""`. Example: `.gvb-branchen` had inline `padding: 20px` removed from `patterns/losungen-branchen.php`.
- **Full-bleed padding restore gap:** Base `!important` zero-padding rules (e.g. `.gvb-contact`, `.gvb-branchen`) must have lateral-padding restores at EVERY breakpoint range — the 769–1199 laptop band is commonly missed. Add restore inside `@media (max-width: 1199px)` alongside mobile.
- **Don't merge duplicate `@media (max-width: 784px)` blocks** without auditing: intermediate `(max-width: 1199)` and `(785–1024)` blocks often share selectors with both ≤784 blocks. Equal-specificity later-in-source wins, so merging can flip winners and silently break layouts.
- **Branding section mobile reorder:** `display: contents` on `__content` + `order` on each child + `align-items: stretch` on `__inner`. Order: heading(1) → image(2) → text(3) → button(4). Button needs `align-self: flex-start` to avoid stretching full width
- **Industry intro patterns:** all 5 `industrie-intro-{slug}.php` files have `className="gvb-flaschen-intro"` for shared mobile padding/font-size CSS
- **Steps section:** `.gvb-steps` gets `padding: 0 20px`; `.gvb-steps__rows` gets `padding: 0` (no double inset)
- **Double-padding pitfall:** if outer section has inline `padding: 0 20px`, do NOT repeat on inner wrapper — set inner to `0`
- **Personalisieren grid breakpoints:** 2-column at ≥426px (including 768px tablet), single-column at `≤425px`. The card `aspect-ratio: 4/3` applies at `≤1023px`; `1/1` at ≥1024px. Card titles: `clamp(24px, 3vw, 30px)` at `≤1024px`.
- **Universal content cap (Section 19, retargeted 2026-04-27 → Figma 1920 baseline):** Outer shell still caps every direct child of `.wp-site-blocks` at 2560 as a fail-safe. Inside, Section 19b's `@media (min-width: 1440px)` block applies a single universal cap: `max-width: min(calc(100% - 40px), 1650px) !important; margin-inline: auto !important` to all 27 content sections. Cap engages at viewport ≥1690 (where calc-100%-40 first exceeds 1650). At viewport 1920: 1650 wide, 135px gutter each side (matches the 86.14% content/viewport ratio Figma uses at 1920). At 2560: 455px gutter each side. ≤1440 untouched (`min(1400, 1650) = 1400`). Specials handled separately:
  - **Calc-margin variants** (`.gvb-bedrucken-anlass`, `.gvb-impressum-card`): `margin: max(20px, calc((100% - 1650px) / 2)) !important` — WP flex-stretch pitfall, max-width is ignored on `.wp-site-blocks` direct children.
  - **Branding (own cap + fluid inner):** `.gvb-branding { max-width: 1650px !important }` with proportional inner clamps: image `clamp(501, 34.01vw, 653px)`, image height `clamp(489, 27.19vw, 522px)`, content `clamp(603, 40.78vw, 783px)` — all cap at viewport 1920 to fit inside 1650 with 162px centering slack.
  - **Blog featured (custom cap + nested override):** `clamp(1400px, 85.94vw, 1650px)` on `.gvb-blog-featured > *, .gvb-blog-featured .wp-block-post-template`. Image `clamp(638, 42.34vw, 813px)` (figure + img both forced via `!important`). Content `clamp(600, 33.59vw, 645px)`. At viewport 1920: 128 padding + 813 image + 64 gap + 645 content = 1650 (exact section cap, no slack — `justify-content: space-between` collapses to gap-only).
  - **Footer inner:** `.gvb-footer > .gvb-footer__inner { max-width: clamp(1200px, 85.94vw, 1650px); margin: auto }` — caps at 1650 at viewport 1920.
  - **Header:** `.gvb-header { padding-left/right: max(54px, calc((100% - 1650px) / 2 + 56px)) !important }` — logo/nav cluster tracks the 1650 cap edge with 56px inset. At 1440 → 54px (cluster 1332). At 1920 → 191px (cluster 1538). At 2560 → 511px (cluster 1538).
  - **Hero min-height:** `clamp(604px, calc(264px + 26.5625vw), 774px)` — caps at 774 at viewport 1920 (was 2200 in the previous retarget).
  - **Brand-promise full-bleed (no cap):** `.alignfull.gvb-brand-promise { max-width: none !important; margin-left/right: 0 !important }` — green background bleeds viewport-wide. `!important` required to beat the 2560 outer-shell rule (0,2,0). Inner content stays at block's own `contentSize: 808px`.
  - **Footer template-part full-bleed:** `.wp-site-blocks > .wp-block-template-part:last-child { max-width: none }` (0,3,0 beats 0,2,0). Linen background bleeds viewport-wide.
  - **Page-bg waves:** background-image layers on `.wp-site-blocks` itself; SVG swap + knob retune at `@media (min-width: 1920px)` (collapsed from previous 1950+2200 split). Final `--bg-h` tune at `@media (min-width: 2560px)`.
  - **Bottle card inner:** `.gvb-bottle-card` uses `justify-content: center` + `.gvb-bottle-card__content { max-width: 1000px }` — image (496) + content (max 1000) stay grouped inside the 1650 section.
  - **Contact form columns:** at `≥1440` `flex: 1 1 0 !important` on `.gvb-contact__body > .wp-block-column` — overrides WP's inline flex-basis so columns grow evenly inside the 1650 section.
- **Specificity gotchas:**
  - `.wp-site-blocks > *` needs `:where()` to have ZERO specificity; without it the `.wp-site-blocks > *:not(.gvb-header)` form (0,2,0) overrides Section 19a's 1400 cap (0,1,0).
  - Inline `margin-left: 20px; margin-right: 20px` on hero/cases/faq/anlass patterns beats any CSS `margin-inline: auto` that isn't `!important`. Section 19b uses `!important` on margins to defeat these.
- **Key concrete CSS patterns (memorise these):**
  - Grow-with-cap-and-20px-gutter: `max-width: min(calc(100% - 40px), 1650px) !important; margin-inline: auto !important;`
  - Calc-margin equivalent (sections that ignore max-width): `margin-left/right: max(20px, calc((100% - 1650px) / 2)) !important;`
  - Fluid inner scaling: `flex: 0 0 clamp(MIN_PX, VVw, MAX_PX)` for image width; `max-width: clamp(MIN, Vvw, MAX)` for content. Set Vvw = MAX/19.20 so the cap engages exactly at viewport 1920.
- **Blog cards clickable:** `.gvb-blog-card .wp-block-post-title a::after { content: ''; position: absolute; inset: 0; border-radius: 16px; z-index: 0 }`. `.gvb-blog-card` must have `position: relative`; `.gvb-blog-card__thumb` gets `position: relative; z-index: 1` to stay above the overlay.
- **Cases carousel active tab:** linen pill border — `border: 1.5px solid rgba(237,232,219,0.55); border-radius: 50px; background: rgba(237,232,219,0.08)` on `.is-active`. Non-active tabs have `border: 1.5px solid transparent`. No orange colour on tabs.
- **Product cards responsive:** all 3 PNGs (`card-besser-trinken.png` / `card-genau-dein-vibe.png` / `card-nachhaltigkeit.png`) share a 400×574 aspect ratio with the wave shape baked into the image. Title uses `position: absolute; bottom: 23.8%; left: 7%; right: 13%` (percentages of media height) and content uses `margin-top: -28.7%; padding: 0 13% 32px 7%` (percentages of card width). This is a single-rule-set scaling system — no per-breakpoint recalibration. Tablet carousel at 426–784 via the generic `[data-carousel]` system, single column at ≤425.
- **Product cards section cap (updated 2026-04-29):** `.gvb-product-cards { max-width: min(100%, 1690px) !important }` overrides the universal cap. Section goes full-bleed up to 1690 — the inline `padding: 0 20px` from `patterns/product-cards.php` is the lateral gutter. At 1440 viewport: section 1440, inner 1400 (vs. 1360 under the universal `min(calc(100% - 40px), 1650)`). At ≥1690: section caps at 1690, inner 1650. Don't double-margin (cap + 20px gutter would shrink inner unnecessarily) — use `min(100%, …)` not `min(calc(100% - 40px), …)` for this one section.
- **Blog article hero mobile (added 2026-04-29):** `.gvb-single-hero` only — at `≤784` the H1 is scaled down (`clamp(24px, 5vw, 36px)`, letter-spacing `-0.8px`) and the cover background gets a uniform `rgba(0,0,0,0.28)` dim with `opacity: 1 !important`. Two specificity gotchas: (1) the H1 mobile rule uses doubled-class `.gvb-single-hero .wp-block-post-title.wp-block-post-title` to bump to 0,3,0 — without it the desktop rule wins (same 0,2,0 + !important, later in source). (2) `opacity: 1` defeats WP's `.has-background-dim-50` which sets `opacity: 0.5` on the cover bg span (multiplies our 0.28 → 0.14 effective). Blog homepage (`.gvb-hero--blog`) and category archive heroes are untouched.
- **Steps number on phones (added 2026-04-29):** `.gvb-steps__number` at `≤480` uses `top: 50px` (fixed pixel), not `top: %`. Each `.gvb-steps__content` height varies with title-line count (Step 2's 2-line title made the numeral sit visibly lower under percentage `top`). Tablet (481–784) keeps `top: 50%` from the ≤784 block. Desktop uses `top: 43%` from the base rule.

## ACF Field Groups

> ⚠️ **Status as of 2026-04-24**: The field groups below are **documented but not yet implemented**. ACF plugin is installed on both Local and production; **zero field groups exist in the DB**. All product-page content (bottle models, colors, specs) currently lives hardcoded in pattern PHP files. The `acf-json/` folder exists in the theme (empty, with `.gitkeep`), ready for future ACF work — when field groups are created on Local, ACF will auto-write JSON there and sync to production on next deploy.


**`bottle_details`** (assigned to product pages: Edelstahl, Borosilikat-Glas, Tritan):
- `bottle_material` (Select), `bottle_intro_text` (Textarea), `minimum_order` (Number), `bottle_branding` (Checkbox)
- `bottle_models` repeater: `model_name`, `model_sizes`, `model_closures`, `model_description`, `model_image`
- `bottle_color_variants` repeater: `color_name`, `color_hex`, `color_image` — drives the interactive color switcher

**`solution_targets`** (assigned to Unsere Lösungen page):
- `target_markets` repeater (title, image, description)
- `use_cases` repeater (title, image)

## Color-Changing Bottle (Product Pages)

All three product pages (Edelstahl, Borosilikat, Tritan) have an interactive color switcher: clicking a color swatch swaps the displayed bottle image.

Implementation pattern:
- PHP template loops `bottle_color_variants` ACF repeater → renders all `<img data-color="x">` (hidden except first) + `<button data-color="x">` swatch elements
- Vanilla JS: on swatch click → toggle `.is-active` class + show matching image
- CSS: swatch button is **44×44px** touch target (Apple HIG minimum); the circle inside is 27px. Active state: `box-shadow: 0 0 0 2px white, 0 0 0 4px currentColor`. Image: `transition: opacity 0.2s ease`.

## Blog Setup

- **Blog homepage** (`templates/home.html`) — `header → blog-hero → blog-intro → blog-featured → blog-all-articles → contact-form → faq-blog → brand-promise → footer`
- **Featured zone (top 3):** Query Loop filtered to sticky posts — client marks posts as sticky in the editor
- **All articles grid:** Default Query Loop, auto-paginated, newest first
- **Single article template** (`templates/single.html`): fully automatic — client never edits it. Hero mirrors `.gvb-hero` (rounded 20px inset, fluid `min-height: clamp(604, …, 774)`, in Section 19b's cap group). H1 uses `clamp(35.641px, …, 65px)` + `-1.95px` tracking like every other hero. Body cap fluid `clamp(800px, calc(-100px + 0.625vw), 1100px)` — when changing, also bump the `contentSize` on `<main class="gvb-single-body">` AND inner `<wp:post-content>` so WP's auto-generated child max-width rules don't pin children at the old contentSize (the WP constrained-layout pitfall). Flow: `header → hero → post-content → faq-blog → brand-promise → footer`.
- **Category archive template** (`templates/category.html`) — added 2026-04-29. Mirrors home.html, skips `blog-intro` + `blog-featured`. Uses `patterns/category-hero.php` (renders category name via `<wp:query-title type="archive" showPrefix="false">`, reuses `hero-blog.webp` + `.gvb-hero--blog` styling) and `patterns/category-all-articles.php` (Query Loop with `"inherit":true` so it auto-filters to the current category). Both registered in `functions.php`.
- **Post categories:** Nachhaltigkeit / Trinkkultur / GVB News
- **Fallback thumbnail:** `functions.php` adds default image via `post_thumbnail_html` filter if no featured image is set

## Figma Workflow

Design tokens (colors, fonts, spacing) are extracted via Figma MCP — values in `theme.json` and `style.css` come from Figma, not estimates. Blob/organic shapes must always be SVG exports (not CSS `border-radius` approximations). Place SVGs in `assets/svg/`, images (WebP) in `assets/img/`.

## Page Build Order

`theme.json` + CSS → Header/Footer → Home → Unsere Flaschen → Edelstahl → Borosilikat → Tritan → Unsere Lösungen → Über uns → Blog → Single article template

## Key Reference Files

- `GVB_Master_Plan.md` — Full project roadmap, page section maps, form spec, scope updates
- `fluent-forms-setup-guide.md` — Step-by-step form field configuration (form uses conditional logic — fields show/hide based on material selection)
- `app/public/wp-config.php` — Local DB credentials (MySQL: local/root/root)
