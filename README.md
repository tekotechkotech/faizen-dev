# Faizen Studio

Repository for the Faizen Studio project — a website built with Astro + Svelte Islands frontend, Laravel REST API, and MariaDB backend.

## Stack

| Layer | Technology |
| :--- | :--- |
| **Frontend** | Astro (HTML-first) + Svelte Islands |
| **Backend** | Laravel REST API |
| **Database** | MariaDB |
| **CMS** | Custom (Laravel-backed, no Filament/headless) |

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

## Overview

- **HTML-first**: Basic content does not depend on JavaScript. JavaScript enhances interaction only.
- **MPA/SSG/SSR**: Content-heavy pages are prerendered; dynamic pages use SSR. Svelte Islands provide interactive parts.
- **Navigation**: SPA-like navigation / view transitions may be used where useful.

## Documentation

- `docs/ARCHITECTURE.md` — Application architecture (this repo's locked decision record)
- `docs/prd/` — Product Requirements (19 files, `10-technical-stack-and-architecture.md` is the stack reference)
- `docs/task/` — Task list (96+ files, starting with `001-initialize-project-repository.md`)

## Quick Links

- [Technical Stack & Architecture](docs/prd/10-technical-stack-and-architecture.md)
- [Project Tasks](docs/task/001-initialize-project-repository.md)
- [Frontend (Astro)](frontend/README.md)
- [Backend (Laravel)](backend/README.md)

## Local Development

TBD — will be defined in tasks 026 (Astro) and 028 (Laravel).