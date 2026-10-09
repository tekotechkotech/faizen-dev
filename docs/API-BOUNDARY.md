# API Boundary — Public vs Private

## Goal

Separate public content read endpoints from authenticated CMS/private operations. This document defines the boundary so that later API tasks can reference consistent responsibilities.

---

## 1. Public Read Operations

These endpoints are **unauthenticated** and intended for the frontend (Astro/MPA) and external consumers. Rate limiting and validation apply.

| Resource | Operation | HTTP Method | Rate Limit* | Validation |
|---|---|---|---|---|
| **Build** | List | `GET /api/builds` | Yes | Query params sanitized |
| **Build** | Detail | `GET /api/builds/{id}` | Yes | ID must be positive integer |
| **Solution** | List | `GET /api/solutions` | Yes | — |
| **Solution** | Detail | `GET /api/solutions/{id}` | Yes | ID must be positive integer |
| **Service** | List | `GET /api/services` | Yes | — |
| **Service** | Detail | `GET /api/services/{id}` | Yes | ID must be positive integer |
| **Article** | List | `GET /api/articles` | Yes | Published filter optional |
| **Article** | Detail | `GET /api/articles/{id}` | Yes | Published check for non-auth |
| **Hero** | List | `GET /api/heros` | Yes | — |
| **Hero** | Detail | `GET /api/heros/{id}` | Yes | — |
| **Media** | List | `GET /api/media` | Yes | Pagination required |
| **Media** | Detail | `GET /api/media/{id}` | Yes | — |
| **Company Settings** | Get | `GET /api/company-settings` | Yes | — |
| **Inquiry Submit** | Submit | `POST /api/inquiry` | Yes | Body validation (name, email, message) |

\* Rate limits are applied per IP; exact thresholds TBD per endpoint (see Section 4).

---

## 2. CMS / Private Operations

These endpoints **require authentication** (session-based, not JWT/OAuth unless later required — see TBD). The frontend must **never** send CMS credentials to these endpoints.

| Resource | Operations | HTTP Methods | Auth Required | Validation |
|---|---|---|---|---|
| **Users** | Create | `POST /api/admin/users` | Session auth | Email format, password minimum length |
| **Users** | List | `GET /api/admin/users` | Session auth | — |
| **Users** | Update | `PUT /api/admin/users/{id}` | Session auth | ID validation, role assignment |
| **Users** | Delete | `DELETE /api/admin/users/{id}` | Session auth | ID validation, soft-delete preferred |
| **Builds** | CRUD | `GET/POST/PUT/DELETE /api/admin/builds` | Session auth | — |
| **Solutions** | CRUD | `GET/POST/PUT/DELETE /api/admin/solutions` | Session auth | — |
| **Services** | CRUD | `GET/POST/PUT/DELETE /api/admin/services` | Session auth | — |
| **Articles** | CRUD | `GET/POST/PUT/DELETE /api/admin/articles` | Session auth | Status validation, publish/unpublish |
| **Heros** | CRUD | `GET/POST/PUT/DELETE /api/admin/heros` | Session auth | — |
| **Media** | CRUD + Upload | `POST /api/admin/media` (multipart) | Session auth | MIME type validation, size limit |
| **Company Settings** | Update | `PUT /api/admin/company-settings` | Session auth | Field validation |
| **Inquiries** | List + Read | `GET /api/admin/inquiries`, `GET /api/admin/inquiries/{id}` | Session auth | — |
| **Inquiries** | Update status | `PUT /api/admin/inquiries/{id}/status` | Session auth | Status value enum |

**Auth mechanism:** Session-based (Laravel default cookie session). No JWT/OAuth in initial scope — marked TBD if required later.

---

## 3. Authentication Boundary

- **Frontend (Astro) never sends** CMS usernames/passwords/tokens to any endpoint.
- Authentication cookies are set by the CMS login flow; the browser automatically sends them on `XMLHttpRequest`/`fetch` calls to `/api/admin/*`.
- Public endpoints (`/api/*` read operations) are **stateless** and do not require cookies.
- If a request to a private endpoint lacks a valid session, return `401 Unauthorized` with a minimal error body (no credential leakage).
- CSRF protection is enabled for all state-changing private requests (Laravel CSRF middleware).

---

## 4. Validation Requirements

### 4.1 Public Endpoints

- All query parameters and body fields must be validated on the backend.
- Return `422 Unprocessable Entity` with structured error messages for invalid input.
- Numeric IDs must be positive integers; return `404` if not found.
- Published/filter parameters must be validated against allowed values.

### 4.2 Private (CMS) Endpoints

- All input fields must be validated against a whitelist of allowed values.
- Media uploads: MIME type whitelist + size limit (e.g., max 10MB, image/* or application/pdf).
- Enum fields (e.g., status, role) must only accept defined values.
- Return `422` with detailed but safe error messages (no stack traces, no password exposure).

---

## 5. Rate-Limit Requirements

| Category | Endpoint Group | Rate Limit Strategy |
|---|---|---|
| **Public read** | All `GET /api/*` read endpoints | Anonymous IP-based rate limiting; exact requests/minute TBD per endpoint. Burst allowed for legitimate content consumption. |
| **CMS login** | `POST /api/admin/login` | Strict rate limiting (e.g., 5 attempts/minute per IP) to prevent brute-force. |
| **CMS general** | All `POST/PUT/DELETE /api/admin/*` | Authenticated user/IP rate limiting; higher threshold than public read. |
| **Inquiry submit** | `POST /api/inquiry` | Moderate rate limiting (e.g., 3 submissions/minute per IP/email) to prevent spam. |

Rate limit responses should return `429 Too Many Requests` with a `Retry-After` header and a JSON body indicating the limit was exceeded.

---

## 6. Error Response Format

### Public & Private (JSON)

```json
{
  "error": {
    "code": "VALIDATION_ERROR | NOT_FOUND | UNAUTHORIZED | RATE_LIMITED | SERVER_ERROR",
    "message": "Human-readable description",
    "details": [] // Optional, field-specific errors for 422
  }
}
```

- **401** for missing/invalid session on private endpoints.
- **403** for authorized user lacking permission (role-based).
- **422** for validation failures.
- **429** for rate limit exceeded.
- **500** for unexpected errors — log internally, return generic message to client.

---

## 7. TBD (Task Later)

- JWT / OAuth integration — not required for initial scope. Marked as `TBD` and will be addressed in a later task when the authentication strategy is revisited.
- Exact rate-limit numeric thresholds — to be determined based on traffic profiling.
- Additional role types beyond `ADMIN` — to be added when needed per PRD § "Additional roles are added only when actually needed."

---

## 8. Summary of Boundary Rules

| Direction | Allowed | Not Allowed |
|---|---|---|
| **Frontend → Public API** | `GET` read operations on Build, Solution, Service, Article, Hero, Media, Company Settings, Inquiry submit | Any `POST/PUT/DELETE`; no write operations from frontend |
| **Frontend → Private API** | None (no CMS credentials sent) | Any authenticated admin endpoint without session |
| **Public API → DB** | Read-only queries with proper sanitization | N/A |
| **Private API → DB** | Full CRUD including file uploads, status changes, user management | N/A |
| **CMS → External** | Secure file uploads with MIME/size validation | Credentials, passwords, session tokens exposed externally |

---

**Document generated from TASK-004, PRD Point 12, and ARCHITECTURE.md.**  
**Do not introduce JWT/OAuth unless later explicitly required.**  
**TBD: numeric rate-limit thresholds, JWT/OAuth future strategy, additional roles.**