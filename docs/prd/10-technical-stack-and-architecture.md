# Point 10 — Technical Stack & Architecture

## Frontend

- Astro
- Svelte Islands for interaction
- Not a pure SPA
- SPA-like navigation/View Transitions may be used where useful

## Backend

- Laravel
- REST API

## Database

- MariaDB

## CMS

- Custom CMS
- Laravel backend
- No Filament
- No headless CMS

## Architecture

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

## Astro Rendering Approach

The website is not a default SPA.

Use an MPA/SSG/SSR-oriented architecture with SPA-like navigation where useful.

Content-heavy pages may be prerendered. Dynamic or frequently changing content may use SSR. Interactive functionality should use Svelte Islands.

The exact rendering strategy can be refined during implementation without changing the locked stack.

## HTML-First Principle

> HTML-first, JavaScript only when needed.

Basic content must not depend on JavaScript to appear. JavaScript exists primarily to enhance interaction.

## Example Home Composition

- Navbar → HTML
- Hero copy → HTML
- Carousel → Svelte Island
- What We Build → HTML
- CTA → HTML
- Footer → HTML
