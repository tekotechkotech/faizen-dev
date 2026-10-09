# Faizen Studio

Repository for the Faizen Studio project — company profile website + custom CMS.

## Stack (locked by `docs/prd/10-technical-stack-and-architecture.md`)

| Layer | Technology |
| :--- | :--- |
| **Frontend** | Astro (HTML-first) + Svelte Islands |
| **Backend** | Laravel REST API |
| **Database** | MariaDB |
| **CMS** | Custom (Laravel-backed, no Filament / headless) |

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

- **HTML-first**: basic content renders without JavaScript; JS only enhances interaction.
- **MPA/SSG/SSR**: content-heavy pages prerendered; dynamic pages use SSR; Svelte only for islands.
- **Branch**: `prd-dev` rebuilt clean from `main` (ignores `opencode`).

## Documentation

- `docs/prd/` — Product Requirements (19 files, source of truth)
- `docs/task/` — Ordered task list (001-096)
- `docs/ARCHITECTURE.md` — Locked architecture decision (TASK-002)
- `docs/RENDERING-STRATEGY.md` — Rendering map (TASK-003)
- `docs/API-BOUNDARY.md` — Public/private API boundary (TASK-004)
- `docs/DATABASE-SCHEMA.md` — Content schema (TASK-005)

## Local Development (dev)

- Frontend (Astro): `http://localhost:3010`
- Backend (Laravel API): `http://localhost:8010`
- Database (MariaDB): `localhost:3310`

```bash
docker compose up --build
```

Env files (never committed):

- `backend/.env` (see `backend/.env.example`)
- `.env` (compose-level, see `.env.example`)

## Scope Rule

Anything not explicitly defined in `docs/prd/` is out of scope.
Unclear requirements must be discussed and explicitly decided before being added.
