# Rendering Strategy (TASK-003)

MPA/SSG/SSR-oriented. No pure SPA. Svelte Islands only for interactivity. HTML-first: basic content must not depend on JS.

Astro `output: 'hybrid'` — per-page mode selection.

| Page | Mode | Rationale |
| --- | --- | --- |
| Home `/` | SSG (prerender) | Static hero + what-we-build + CTA; instant HTML |
| Build listing `/build` | SSG + island | Catalog; island for filter/sort |
| Build detail `/build/[slug]` | SSR | CMS-driven, may change; always current |
| Solutions `/solutions` + detail | SSG | Evergreen product content |
| Services `/services` + detail | SSG | Static offerings |
| Articles `/articles` + detail | SSG | CMS-generated, ISR-friendly |
| With Us `/with-us` | SSG | Static company narrative |
| Inquiry `/lets-build-together` | SSR | Form + validation + server states |

Notes:

- Islands boundary: carousel, filters, client validation only.
- If a data source becomes dynamic, flip frontmatter to SSR without refactor.
- View Transitions only where useful.
