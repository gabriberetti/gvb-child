# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**Good Vibe Bottles** is a WordPress website for a German drinkware/bottle company. It uses the **Full Site Editing (FSE)** architecture with a custom child theme (`gvb-child`) built on top of Twenty Twenty-Five.

- **CMS:** WordPress (local dev via Local by Flywheel — nginx + PHP + MySQL)
- **Theme:** `gvb-child` child theme (FSE, no page builders)
- **Languages:** German (default) + English via Polylang
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
├── style.css          # All custom styles (~4,100+ lines, 18 sections)
├── theme.json         # Design tokens (colors, fonts, spacing)
├── functions.php      # Theme setup: enqueues, pattern registration, Adobe Fonts
├── templates/         # FSE page templates (21 total, one per page type)
├── patterns/          # Block patterns (70+ PHP files, registered in functions.php)
├── parts/             # FSE template parts: header.html, footer.html
└── assets/
    ├── js/
    │   ├── cases-carousel.js      # Vanilla JS tab switcher
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
| Download | `page-download.html` | `hero-uberuns.jpg` (reused) |
| FAQ | `page-faq.html` | `bedrucken-warum.jpg` (reused) |

**Hero H1 standard** (all industry + bedrucken heroes):
```css
font-size: clamp(35.641px, 2.228rem + ((1vw - 3.2px) * 2.621), 65px);
font-weight: 700; line-height: 1; letter-spacing: -1.95px;
color: gvb-linen (#EDE8DB)
```

**Hero content** uses `margin-left: 55% !important` (right-side positioning) via `.gvb-hero--industrie .gvb-hero__content` rule in `style.css`. At `≤768px`, **all** specific hero selectors (`--losungen`, `--bedrucken`, `--industrie`, `--faq`, `--uberuns`, `--blog`) must be re-declared with `margin-left: 0 !important` in the mobile block — the generic `.gvb-hero__content { margin-left: 0 }` reset is not sufficient because `!important` specificity wins. This is already handled in section 16 of `style.css`.

**Benefits sections** reuse `.gvb-personalisieren` + `.gvb-personalisieren-card` CSS (no new classes per page).

**FAQ sections** (industry pages): single orange block, linen heading "Du hast Fragen? Wir haben Antworten.", `-1.8px` letter-spacing, 2-column layout (2 items left / 3 items right).

### Design System (`theme.json`)

**Colors:** `gvb-green` (#459271), `gvb-orange` (#F28C3B), `gvb-orange-hover` (#E65620), `gvb-linen` (#EDE8DB), `gvb-graphite` (#2B2B2B), `gvb-white`, `gvb-black`, `gvb-divider` (#E9E9E9)

**Typography:** `scale-variable` (Adobe Fonts, TypeKit ID: `ycw7tlm`). Sizes: display (65px), h1–h6, body (16px).

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

### Block Patterns

Patterns are PHP files in `patterns/`, all registered in `functions.php`. Each pattern corresponds to a section of a specific page (e.g., `edelstahl-hero.php`, `edelstahl-product.php`). When adding a new page, create patterns per section and register them in `functions.php`.

### FSE Templates

Templates in `templates/` are HTML files using WordPress block markup. Page-specific templates follow the naming convention `page-{slug}.html`. They are composed by inserting block patterns.

### Key Plugins

| Plugin | Purpose |
|--------|---------|
| Advanced Custom Fields (ACF) | Structured product specs for bottle pages |
| Fluent Forms | Contact/quote forms (supports .eps/.ai/.pdf uploads) |
| Polylang | DE + EN multilingual routing |
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
| Tablet | `≤768px` | Main mobile layout block (collapse columns, mobile nav overlay, etc.) |
| Laptop | `≤1024px` | Industry grid stack; `(769–1024)` iPad-only Anlass title clamp + carousel |
| Laptop L | `≥1440px` | Large-screen ceiling (`.gvb-hero`, `.gvb-cases`, `.gvb-faq` → `max-width: 1400px`) |
| 4K | `2560px` | No explicit rule — inherits ceiling |

Auxiliary breakpoints still in use (not DevTools presets but serve real purpose):
- `≤1199px` — Steps section fluid scaling (avoids overlap with 1200 desktop rules)
- `≤1200px` — desktop → fluid columns
- `≤784px` (5 occurrences) — WP's internal breakpoint; 16px off from 768, candidate for future cleanup
- `≤480px` — consolidated into a single block (global h1/h2/buttons + section-specific overrides)

**Mobile responsive strategy** (sections 16–17 of `style.css`, updated April 2026):
- All fixed-width flex/grid columns (product cards, steps, VM rows, branding) collapse to single-column stacks at 768px
- **Mobile width standard:** all sections use `20px` inset on each side → 350px on a 390px device. Card sections use `margin: 0 20px`; content sections use `padding: 0 20px`
- Touch targets: color swatches 44×44px, cases tabs `min-height: 44px` (Apple HIG: 44pt minimum)
- Hero overlay strengthened to `rgba(0,0,0,0.28)` on mobile for text legibility when content is centred
- Feature card images (`gvb-edelstahl-feature-card__image`, `gvb-borosilikat-feature-card__image`): 140×140px + `align-self: center` on mobile; text blocks `text-align: center` + `align-items: center`
- Contact form fields: `gap: 32px` between stacked fields within pairs, `margin-bottom: 32px` between groups
- Bottom wave: `wave-bottom-mobile.svg` (full-width concave arc) replaces desktop S-curve on mobile via `background-image` override in `@media (max-width: 768px)`
- **Mobile nav overlay (section 17):** ALL styles targeting `.wp-block-navigation__responsive-container` children must use `.is-menu-open` in the selector — this container is visible on desktop too. Hamburger/close button styles must be inside `@media (max-width: 768px)`. `.wp-block-navigation__responsive-container-content` must also be scoped to `.is-menu-open`. WP 6.5+ adds intermediate layers `responsive-close > responsive-dialog` — WP core gives `.wp-block-navigation__responsive-close { margin: auto }` inside `.has-modal-open`, which in a flex-column context shrinks it to content-width. Fix: force `width: 100% !important; height: 100% !important; margin: 0 !important; max-width: none !important` on `responsive-close` and `width: 100%; height: 100%; display: flex; flex-direction: column` on `responsive-dialog` when `.is-menu-open`.
- Blog page mobile: featured articles stack image-first (`order: -1`) with `height: auto !important` on `<figure>` and `<a>` to override WP inline `height: 432px`; all-articles cards go single-column — use `display: flex; flex-direction: column` on the `ul` (not `grid-template-columns`) to handle both WP flex and grid post-template layouts
- Blog desktop: `.gvb-blog-grid .wp-block-post-template` has `min-height: 520px; align-content: start` so all pages keep consistent section height regardless of article count (6 articles = 3 rows of 2)
- **Bedrucken anlass mobile:** content below image (not overlaid) — `__img` set to `position: relative; height: 280px; border-radius: 20px`; `__content` has `background: none` (section already orange)
- **Bedrucken anlass iPad carousel (426–768px only):** `.gvb-overlay-cards` → `display: flex; overflow-x: auto; scroll-snap-type: x mandatory; gap: 16px`. Cards → `flex: 0 0 calc(50% - 8px); scroll-snap-align: start`. Static chevron scroll-hint via `.gvb-bedrucken-anlass::after` — 36×36 linen circle with inline SVG chevron at `right: 16px; top: 55%`. **No animation** (explicitly rejected). Hidden at `≤425px`. At `≤425` the carousel is reset (`overflow-x: visible; scroll-snap-type: none`) and cards stack single-column.
- **Anlass title/content positioning:** Desktop: `.gvb-overlay-card__title { bottom: 80px }` + `.gvb-overlay-card__content { position: relative; margin-top: -50px }`. iPad band (769–1024): title `bottom: 40px` + `font-size: clamp(20px, 2.3vw, 24px)`. Mobile S (≤320): title `bottom: 90px` + `font-size: 15px !important`, desc `font-size: 10px`.
- **Mobile line-break classes** (used in `patterns/bedrucken-anlass.php`): `.gvb-br-mobile` visible at ≤375, `.gvb-br-mobile-m` visible 321–375 only, `.gvb-br-mobile-s` visible ≤320 only. All three default to `display: none`; each media query flips the relevant one to `inline`. Lets us tune line-breaks per DevTools preset without duplicating markup.
- **WP inline padding cleanup:** When a WP group block carries `style="padding:..."` inline, don't stack `!important` zero-padding overrides in CSS. Strip padding from the pattern PHP instead — edit both the block-comment JSON (`"padding":{...}`) and the div's `style=""`. Example: `.gvb-branchen` had inline `padding: 20px` removed from `patterns/losungen-branchen.php`.
- **Full-bleed padding restore gap:** Base `!important` zero-padding rules (e.g. `.gvb-contact`, `.gvb-branchen`) must have lateral-padding restores at EVERY breakpoint range — the 769–1199 laptop band is commonly missed. Add restore inside `@media (max-width: 1199px)` alongside mobile.
- **Don't merge duplicate `@media (max-width: 768px)` blocks** without auditing: intermediate `(max-width: 1199)` and `(769–1024)` blocks often share selectors with both ≤768 blocks. Equal-specificity later-in-source wins, so merging can flip winners and silently break layouts.
- **Branding section mobile reorder:** `display: contents` on `__content` + `order` on each child + `align-items: stretch` on `__inner`. Order: heading(1) → image(2) → text(3) → button(4). Button needs `align-self: flex-start` to avoid stretching full width
- **Industry intro patterns:** all 5 `industrie-intro-{slug}.php` files have `className="gvb-flaschen-intro"` for shared mobile padding/font-size CSS
- **Steps section:** `.gvb-steps` gets `padding: 0 20px`; `.gvb-steps__rows` gets `padding: 0` (no double inset)
- **Double-padding pitfall:** if outer section has inline `padding: 0 20px`, do NOT repeat on inner wrapper — set inner to `0`
- **Personalisieren grid breakpoints:** 2-column at ≥426px (including 768px tablet), single-column at `≤425px`. The card `aspect-ratio: 4/3` applies at `≤1023px`; `1/1` at ≥1024px. Card titles: `clamp(24px, 3vw, 30px)` at `≤1024px`.
- **Large-screen ceiling (`@media min-width: 1440px`, Section 19):** `.gvb-hero`, `.gvb-cases`, `.gvb-faq` get `max-width: 1400px !important; margin: auto !important`. `.gvb-bedrucken-anlass` uses `margin-left/right: calc((100% - 1400px) / 2) !important` (cannot use `max-width` directly — WP flex-stretch on `.wp-site-blocks` direct children overrides it even with `!important`). Key headings (`.gvb-personalisieren__heading`, `.gvb-edelstahl-features__heading`) have `max-width: 1400px; margin: 0 auto`.
- **Blog cards clickable:** `.gvb-blog-card .wp-block-post-title a::after { content: ''; position: absolute; inset: 0; border-radius: 16px; z-index: 0 }`. `.gvb-blog-card` must have `position: relative`; `.gvb-blog-card__thumb` gets `position: relative; z-index: 1` to stay above the overlay.
- **Cases carousel active tab:** linen pill border — `border: 1.5px solid rgba(237,232,219,0.55); border-radius: 50px; background: rgba(237,232,219,0.08)` on `.is-active`. Non-active tabs have `border: 1.5px solid transparent`. No orange colour on tabs.

## ACF Field Groups

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

- **Featured zone (top 3):** Query Loop filtered to sticky posts — client marks posts as sticky in the editor
- **All articles grid:** Default Query Loop, auto-paginated, newest first
- **Single article template** (`single.html`): fully automatic — client never edits it
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
