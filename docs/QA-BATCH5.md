# QA Gate — Batch 5 (PRD 16, tasks 083-095)

Date: 2026-10-10. Environment: `docker compose` dev (3010/8010/3310), seeded DB.

## Functional (083-086) — PASS

- 13/13 public routes → 200 with real slugs: `/`, `/build`, `/build/sistem-ppdb-smk`, `/solutions`, `/solutions/faizen-biz-starter`, `/services`, `/services/custom-software`, `/articles`, `/articles/html-first-untuk-company-profile`, `/with-us`, `/lets-build-together`, `/privacy`, `/terms`.
- CMS: login 200 (CSRF-cookie flow), dashboard 200 with counts, CRUD create 201 / delete 200, inquiries PATCH, settings PUT (Batch 3 log).
- Inquiry public POST → 201 + row in `inquiries`.
- CTA: nav CTA + final CTA + card CTAs point to `/lets-build-together`; solution CTA `Get Started`.

## Responsive (087-088) — PASS (inspection)

Mobile-first single-column, `max-width: 64rem`, fluid `auto-fill minmax(16rem)` cards, touch-sized CTA padding. Tablet/desktop inherit enhancement. No desktop-only assumptions.

## Performance (089) — PASS (budgets)

`bun run build` green; island JS: inquiry ~5.1kB, carousel ~1.3kB, analytics ~0.2kB; system font stack (0 webfont); images lazy + explicit dimensions. Full Lighthouse on 4 priority pages at release time (see PERFORMANCE-TARGETS.md).

## SEO (090) — PASS

Title + meta description + canonical + OG + Twitter card on all pages (Base.astro); `sitemap.xml` 21 URLs (static + CMS slugs); `robots.txt`; semantic HTML (`header/nav/main/article/footer`, one h1/page — detail pages render CMS title).

## Accessibility (091) — PASS (inspection)

`lang="id"`, skip-link, visible `:focus-visible` (emerald), labeled form controls, `role="alert"` errors, `aria-label` carousel/nav, `prefers-reduced-motion` kill-switch, decorative-free images with alt/loading lazy.

## Security (092) — PASS

401 unauth CMS; 419 CSRF without token; login throttle 429 after 5 tries; wrong creds 422; `.exe` upload 422 (JSON) ; security headers (nosniff, SAMEORIGIN, Referrer-Policy, Permissions-Policy); `expose_php=0`; secrets gitignored (`.env` never committed); backend validation everywhere.

## Browser (093)

Standards HTML/CSS, no experimental APIs. Priority: Mobile Chrome/Safari, then desktop, then Firefox/Edge. Full matrix at release time.

## Regression (094) / DoD (095)

No fake stats/testimonials/jargon sections. Scope rule respected. Remaining known debt: tasks 006-025 intermediate design docs not written as files (decisions live in code + ARCHITECTURE/RENDERING/API-BOUNDARY/DATABASE-SCHEMA); full Lighthouse + browser matrix deferred to release.
