# Application Architecture

## Overview

This document locked the application architecture based on the PRD and task decisions. It describes the frontend, backend, database, CMS, and request flow.

---

## Frontend

- **Astro** — HTML-first framework, not a pure SPA.
- **Svelte Islands** — used only for interactivity (e.g., Navbar HTML, Hero HTML, Carousel Island, etc.).
- **Rendering approach** — MPA/SSG/SSR-oriented. Content-heavy pages may be prerendered; dynamic or frequently changing content may use SSR. Interactive functionality uses Svelte Islands.
- **HTML-First Principle** — Basic content must not depend on JavaScript to appear. JavaScript exists primarily to enhance interaction.
- **Not a pure SPA** — SPA-like navigation / view transitions may be used where useful, but the default is MPA/SSG/SSR.

### Example Home Composition

| Component | Technology |
|---|---|
| Navbar | HTML |
| Hero copy | HTML |
| Carousel | Svelte Island |
| What We Build | HTML |
| CTA | HTML |
| Footer | HTML |

---

## Backend

- **Laravel** — REST API (not GraphQL).
- **API Style** — REST, not headless CMS or microservices.

---

## Database

- **MariaDB** — relational database.

---

## CMS

- **Custom CMS** — Laravel-backed, no Filament, no headless CMS.

---

## Request Flow (User → Astro → REST API → Laravel → MariaDB)

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

---

## Excluded Technologies (verified against PRD)

The following are explicitly **excluded** from the locked architecture:

- **Pure SPA** — Astro is MPA/SSG/SSR-oriented, not a default SPA.
- **Headless CMS** — Custom CMS is Laravel-backed; no headless CMS.
- **Filament** — not used.
- **Microservices** — monolithic Laravel REST API.

---

## Consistency

- This document matches `docs/prd/10-technical-stack-and-architecture.md`.
- No undecided technology is presented as decided.
- All choices are finalized per TASK-002 acceptance criteria.