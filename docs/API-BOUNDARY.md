# API Boundary (TASK-004)

Per `docs/prd/12-security-and-authentication.md`. Separate public reads from authenticated CMS writes.

## Public (no auth, read-only, rate-limited where appropriate)

- `GET /api/health`
- `GET /api/builds`, `GET /api/builds/{slug}`
- `GET /api/solutions`, `GET /api/solutions/{slug}`
- `GET /api/services`, `GET /api/services/{slug}`
- `GET /api/articles`, `GET /api/articles/{slug}`
- `GET /api/heros` (active placements only)
- `GET /api/media`, `GET /api/media/{id}` (public assets only)
- `POST /api/inquiry` — `throttle:3,1`, backend validation required
- `GET /api/company-settings` — public profile only (no secrets)

Rules: sensitive data never exposed; only necessary endpoints public; backend validation mandatory; no frontend credentials.

## Private / CMS (session auth + `cms-access` gate + CSRF)

- `POST /cms/login` — `throttle:5,1`; `POST /cms/logout`
- `GET /cms/dashboard`
- CRUD: `/cms/builds`, `/cms/solutions`, `/cms/services`, `/cms/articles`, `/cms/heros`
- Media: `GET/POST /cms/media`, `DELETE /cms/media/{id}` (MIME + size validation)
- Inquiries: `GET /cms/inquiries`, `PATCH /cms/inquiries/{id}`
- Settings: `GET/PUT /cms/settings`

Rules: password hashing, session management, role `ADMIN` only initially, audit trail for important changes, secure uploads, login rate limiting.

## Excluded

JWT/OAuth/microservices — not required for this CMS. Added only on explicit decision.
