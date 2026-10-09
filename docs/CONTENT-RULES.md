# Content Statuses and Publishing Rules

## Solution Statuses

**ENUM**: `DRAFT`, `COMING_SOON`, `BETA`, `AVAILABLE`, `ARCHIVED`

- **DRAFT** — Initial creation state; not visible publicly. Default status when creating a new Solution.
- **COMING_SOON** — Visible as "coming soon" placeholder; publicly visible but marked as not yet available. No `published_at` set.
- **BETA** — Active beta release; publicly available for beta testers. May have `published_at` set.
- **AVAILABLE** — Fully released and available for public use. `published_at` must be set when transitioning from another status.
- **ARCHIVED** — Retired; no longer actively marketed or available for new sign-ups. Historical data preserved; publicly archived view only.

**Build** shares the same status ENUM as Solution: `DRAFT`, `COMING_SOON`, `BETA`, `AVAILABLE`, `ARCHIVED` (default `DRAFT`).

**Service** has a simpler lifecycle: `ACTIVE`, `INACTIVE`, `ARCHIVED` (default `ACTIVE`). Services do not use the Solution/Build status enum.

**Article** has its own status enum: `DRAFT`, `PUBLISHED`, `ARCHIVED` (default `DRAFT`).

---

## Publishing Behavior — Unambiguous Rules

| Transition | From → To | Requirements |
|------------|-----------|-------------|
| Initialize | — → DRAFT | Default when creating new content |
| Activate | DRAFT → AVAILABLE | `published_at` must be set to current timestamp |
| Mark coming soon | — → COMING_SOON | No `published_at` required; publicly visible as placeholder |
| Upgrade to beta | DRAFT → BETA / COMING_SOON → BETA | No strict `published_at` requirement; treated as in-development release |
| Deactivate / retire | AVAILABLE → ARCHIVED / INACTIVE → ARCHIVED | Content moved to archive; `published_at` may be preserved for history |
| Reactivate | ARCHIVED → AVAILABLE | Requires explicit decision; `published_at` reset and set to current timestamp |
| Change status without publish | Any → DRAFT | Content withdrawn from public view; `published_at` cleared |

**Key rules**:
- `published_at` is set **only** when a Solution/Build transitions to `AVAILABLE` and must be a valid datetime.
- `published_at` is cleared when transitioning to `DRAFT` or `ARCHIVED`.
- `COMING_SOON` is publicly visible but does **not** have `published_at` set; it serves as a placeholder.
- `BETA` is publicly visible and may have `published_at`, but the status explicitly indicates beta state.
- No status transition is allowed without explicit backend validation.
- **No new status may be invented without a decision recorded in the project documentation.** All statuses must be drawn from the enumerated sets defined above.

---

## Hero Slide — Active/Date Behavior

Hero slides reference existing Build or Solution content via `reference_id`; they do not duplicate content fields.

| Field | Type | Constraints | Behavior |
|-------|------|-------------|----------|
| `is_active` | BOOLEAN | Default `true` | When `true`, hero is eligible for display subject to `starts_at`/`ends_at` |
| `starts_at` | DATETIME | Nullable | Hero becomes active at this time; if `null` and `is_active` = `true`, hero is active immediately |
| `ends_at` | DATETIME | Nullable | Hero expires at this time; if `null`, hero has no end date |

**Hero display logic**:
- Hero is **active** when `is_active` = `true` **AND** (`starts_at` is `null` OR `starts_at` ≤ now) **AND** (`ends_at` is `null` OR `ends_at` > now).
- If `is_active` = `false`, the hero is never displayed regardless of date ranges.
- Admins may set `starts_at`/`ends_at` to control hero visibility window without changing `is_active`.
- Hero type ENUM: `BUILD`, `SOLUTION`, `CUSTOM`. `CUSTOM` heroes do not reference `reference_id`.

---

## Summary of Status Enums by Content Type

| Content Type | Status ENUM | Default |
|--------------|-------------|---------|
| Build | `DRAFT`, `COMING_SOON`, `BETA`, `AVAILABLE`, `ARCHIVED` | `DRAFT` |
| Solution | `DRAFT`, `COMING_SOON`, `BETA`, `AVAILABLE`, `ARCHIVED` | `DRAFT` |
| Service | `ACTIVE`, `INACTIVE`, `ARCHIVED` | `ACTIVE` |
| Article | `DRAFT`, `PUBLISHED`, `ARCHIVED` | `DRAFT` |
| Hero Slide | `is_active` (BOOLEAN), `starts_at` (DATETIME), `ends_at` (DATETIME) | `is_active` = `true` |

---

## Decision Guardrails

- **No new status without decision**: Any addition or modification of status enumerations requires an explicit decision documented in the project records.
- **Publishing consistency**: Backend API and CMS must enforce the publishing behavior table above; client applications must not assume status behavior outside these definitions.
- **Backward compatibility**: When introducing status changes, ensure existing content remains in a valid state or provide migration path.