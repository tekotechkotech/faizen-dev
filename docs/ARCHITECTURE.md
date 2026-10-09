# Application Architecture (TASK-002)

Locked per `docs/prd/10-technical-stack-and-architecture.md`. Source of truth is the PRD; this file records the decision.

## Frontend

- **Astro** — HTML-first, MPA/SSG/SSR-oriented. Not a pure SPA.
- **Svelte Islands** — only for explicit interactivity (carousel, filters, forms). Static content stays server-rendered HTML.
- **View Transitions** — SPA-like navigation may be used where useful, never as default shell.

Example home composition:

| Component | Technology |
| --- | --- |
| Navbar | HTML |
| Hero copy | HTML |
| Carousel | Svelte Island |
| What We Build | HTML |
| CTA | HTML |
| Footer | HTML |

## Backend

- **Laravel** — REST API only (no GraphQL).
- Public read endpoints + authenticated CMS endpoints (see `API-BOUNDARY.md`).
- Session auth for CMS; no JWT/OAuth unless explicitly required later.

## Database

- **MariaDB** — relational, normalized content schema (see `DATABASE-SCHEMA.md`).

## CMS

- **Custom CMS** — Laravel-backed. No Filament, no headless CMS, no generic bloat.

## Request Flow

```
User
  ↓
Astro
  ↓
REST API
  ↓
Laravel
  ↓
MariaDB
```

## Excluded (per PRD 10 + 19)

Pure SPA, headless CMS, Filament, microservices, Kubernetes, generic CMS product, full API/platform ecosystem.
