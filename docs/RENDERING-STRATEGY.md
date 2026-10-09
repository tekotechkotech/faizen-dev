# Rendering Strategy

## Goal

Decide which content-heavy and dynamic page categories are prerendered (SSG) or SSR within the locked Astro architecture. The strategy remains MPA/SSG/SSR-oriented with no pure SPA requirement.

## Guiding Principles (from PRD & Architecture)

- **Astro** is MPA/SSG/SSR-oriented — not a default SPA.
- **Svelte Islands** are used only for interactivity (carousel, filters, etc.).
- **HTML-First**: Basic content must not depend on JavaScript to appear.
- **Content-heavy pages** may be prerendered.
- **Dynamic or frequently changing content** may use SSR.
- **SPA-like navigation / view transitions** may be used where useful, but the default is MPA.

## Rendering Mode Decision Table

| Page Category | Rendering Mode | Rationale |
|---|---|---|
| **Home** | **SSG (Prerender)** | Primary entry point with relatively static content (hero, navbar, CTA, what we build). Changes infrequently; prerendering gives instant HTML on first load with zero JS dependency for basic content. |
| **Build (Listing)** | **SSG (Prerender) + client-side island** | Listing page shows catalog of builds. Can be prerendered as core list data is static. Island used for filtering/sorting interactivity. If filters are fully dynamic, fallback to SSR for filtered results. |
| **Build (Detail)** | **SSR** | Detail page pulls specific build data from CMS/database. Data may change frequently (specifications, pricing, availability). SSR ensures always-current content without rebuild. |
| **Solution** | **SSG (Prerender)** | Solution descriptions are typically evergreen content. Prerendering provides fast initial load; islands add interactive demos or comparison tables where needed. |
| **Service** | **SSG (Prerender)** | Service offerings are static by nature. Prerendering ensures HTML-first delivery; islands enhance with feature comparisons or quote forms. |
| **Article** | **SSG (Prerender)** | Articles/blog posts are generated from CMS. Each article can be prerendered at build time or on-demand ISR. Core content is static HTML; island used for "related articles" or comment section if needed. |
| **With Us** (About/Team) | **SSG (Prerender)** | Static team, mission, and history content. Prerendering gives instant content display; islands may add interactive team member profiles or contact forms. |
| **Inquiry** (Contact/Request) | **SSR** | Inquiry page involves form submission, validation, and backend API interaction. Must use SSR to handle server-side form processing, flash messages, and dynamic error/success states. |

## Notes

- **No pure SPA**: The app is MPA/SSG/SSR-oriented by default. Navigation between pages full-page or via view transitions, never a single-page app shell.
- **Islands boundary**: Svelte Islands are reserved for interactive components only (carousels, filters, forms with client-side validation, comparison tools). All basic layout, typography, and content remain HTML.
- **ISR (Incremental Static Regeneration)**: For Article and Build Listing, on-demand revalidation can be used to refresh content without full rebuild, keeping SSG benefits while allowing updates.
- **Build Detail & Inquiry are SSR**: These two pages are the only fully dynamic render modes because they involve real-time data and form handling.
- **Home can stay SSG**: Even though it's the entry point, its content block structure (hero → what we build → CTA → footer) is fully composable from static HTML blocks.

## Implementation Guidelines

1. **Astro config**: Set `output: 'hybrid'` (default) to allow per-page mode selection.
2. **Per-page frontmatter**: Use `rendering: 'auto'` or explicit `rendering: 'ssg'` / `rendering: 'ssr'` in page frontmatter.
3. **Islands registration**: Register Svelte Islands only on pages that need interactivity; keep pages HTML-first by default.
4. **Fallback**: If a page's data source becomes dynamic unexpectedly, mode can be toggled to SSR via frontmatter without refactoring the whole component.