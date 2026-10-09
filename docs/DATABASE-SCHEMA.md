# Database Schema — CMS Content Model

## Overview

Normalized database design for the custom Laravel-backed CMS, matching the content model defined in PRD 06 and the content architecture in PRD 09. This schema serves as the reference before migrations (TASK-031).

**Principle**: Content is the source of truth. Placement is separate. Hero slides reference existing content rather than duplicating it. No generic CMS entities are included.

---

## Entity: Builds

Proof of what Faizen has built.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| `id` | `BIGINT UNSIGNED` | Primary Key, Auto-Increment | — |
| `title` | `VARCHAR(255)` | Not Null | — |
| `slug` | `VARCHAR(255)` | Unique, Index | URL-friendly identifier |
| `short_description` | `TEXT` | Nullable | Brief summary |
| `description` | `TEXT` | Nullable | Detailed content |
| `thumbnail` | `VARCHAR(255)` | Nullable | Path/URL to thumbnail image |
| `cover` | `VARCHAR(255)` | Nullable | Path/URL to cover image |
| `status` | `ENUM('DRAFT','COMING_SOON','BETA','AVAILABLE','ARCHIVED')` | Default 'DRAFT' | Status lifecycle |
| `published_at` | `DATETIME` | Nullable | Set when status transitions to AVAILABLE |
| `created_at` / `updated_at` | `TIMESTAMP` | — | Laravel defaults |

**Relationships**:
- Many-to-Many with `Articles` (via pivot `article_build`)
- Referenced by `Hero Slides` via `reference_id`

---

## Entity: Solutions

An actual Faizen-owned product that people can use.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| `id` | `BIGINT UNSIGNED` | Primary Key, Auto-Increment | — |
| `name` | `VARCHAR(255)` | Not Null | Product/solution name |
| `slug` | `VARCHAR(255)` | Unique, Index | — |
| `short_description` | `TEXT` | Nullable | — |
| `description` | `TEXT` | Nullable | — |
| `logo` | `VARCHAR(255)` | Nullable | Path/URL |
| `thumbnail` | `VARCHAR(255)` | Nullable | — |
| `cover` | `VARCHAR(255)` | Nullable | — |
| `status` | `ENUM('DRAFT','COMING_SOON','BETA','AVAILABLE','ARCHIVED')` | Default 'DRAFT' | Matches Build statuses |
| `pricing` | `DECIMAL(10,2)` | Nullable | — |
| `url` | `VARCHAR(255)` | Unique, Index, Nullable | External/affiliate URL |
| `published_at` | `DATETIME` | Nullable | — |
| `created_at` / `updated_at` | `TIMESTAMP` | — | — |

**Relationships**:
- Many-to-Many with `Articles` (via pivot `article_solution`)
- Referenced by `Hero Slides` via `reference_id`

---

## Entity: Services

A capability to build something new together.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| `id` | `BIGINT UNSIGNED` | Primary Key, Auto-Increment | — |
| `title` | `VARCHAR(255)` | Not Null | — |
| `slug` | `VARCHAR(255)` | Unique, Index | — |
| `short_description` | `TEXT` | Nullable | — |
| `description` | `TEXT` | Nullable | — |
| `cover` | `VARCHAR(255)` | Nullable | Path/URL |
| `status` | `ENUM('ACTIVE','INACTIVE','ARCHIVED')` | Default 'ACTIVE' | Simpler lifecycle than Builds/Solutions |
| `created_at` / `updated_at` | `TIMESTAMP` | — | — |

**Notes**:
- Standalone capability entity, not a generic CMS placeholder
- Simpler status lifecycle

---

## Entity: Articles

Knowledge, SEO, and discovery content.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| `id` | `BIGINT UNSIGNED` | Primary Key, Auto-Increment | — |
| `title` | `VARCHAR(255)` | Not Null | — |
| `slug` | `VARCHAR(255)` | Unique, Index | — |
| `excerpt` | `TEXT` | Nullable | Summary/teaser |
| `content` | `TEXT` | Nullable | Full article body |
| `cover` | `VARCHAR(255)` | Nullable | Path/URL to featured image |
| `category` | `ENUM('TECHNICAL','BUSINESS','PRODUCT','INSIGHT')` | Default 'TECHNICAL' | Curated categories |
| `author` | `VARCHAR(255)` | Nullable | Name or external author identifier |
| `status` | `ENUM('DRAFT','PUBLISHED','ARCHIVED')` | Default 'DRAFT' | — |
| `published_at` | `DATETIME` | Nullable | Set when status = PUBLISHED |
| `created_at` / `updated_at` | `TIMESTAMP` | — | — |

**Relationships**:
- Many-to-Many with `Builds` (via pivot `article_build`)
- Many-to-Many with `Solutions` (via pivot `article_solution`)

---

## Entity: Media

Reusable visual assets managed through a central media library.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| `id` | `BIGINT UNSIGNED` | Primary Key, Auto-Increment | — |
| `filename` | `VARCHAR(255)` | Not Null | Original filename |
| `path` | `VARCHAR(255)` | Not Null | Storage path relative to public root |
| `mime_type` | `VARCHAR(100)` | Not Null | e.g., image/jpeg, image/png |
| `size` | `INT UNSIGNED` | Not Null | File size in bytes |
| `width` | `INT UNSIGNED` | Nullable | — |
| `height` | `INT UNSIGNED` | Nullable | — |
| `alt` | `VARCHAR(255)` | Nullable | Accessibility text |
| `created_at` / `updated_at` | `TIMESTAMP` | — | — |

**Notes**:
- Central library — used by Builds, Solutions, Articles, Hero Slides
- No generic "Content" table; media is addressed by filename/path

---

## Entity: Hero Slides

Editorial placement of existing content. **Hero placement remains separate from content source.**

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| `id` | `BIGINT UNSIGNED` | Primary Key, Auto-Increment | — |
| `type` | `ENUM('BUILD','SOLUTION','CUSTOM')` | Not Null | Defines reference_target |
| `reference_id` | `BIGINT UNSIGNED` | Nullable, Index | FK to Build.id or Solution.id; null for CUSTOM placement |
| `title_override` | `VARCHAR(255)` | Nullable | Override title for display |
| `description_override` | `TEXT` | Nullable | Override description for display |
| `image_override` | `VARCHAR(255)` | Nullable | Hero-specific image (different from referenced content's thumbnail/cover) |
| `sort_order` | `INT UNSIGNED` | Default 0 | Order of appearance |
| `is_active` | `BOOLEAN` | Default true | — |
| `starts_at` | `DATETIME` | Nullable | Hero becomes active at this time |
| `ends_at` | `DATETIME` | Nullable | Hero expires at this time |
| `created_at` / `updated_at` | `TIMESTAMP` | — | — |

**Critical Design Note**:
- `reference_id` points to either `Builds.id` or `Solutions.id` — **no duplication** of content fields
- Hero slides are *placement* of existing Build/Solution content, not a content source of their own
- `type` = 'CUSTOM' allows custom hero content that doesn't reference Build/Solution

---

## Entity: Inquiries

Captured user inquiries through the website.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| `id` | `BIGINT UNSIGNED` | Primary Key, Auto-Increment | — |
| `name` | `VARCHAR(255)` | Not Null | Visitor name |
| `email` | `VARCHAR(255)` | Not Null | Visitor email |
| `phone` | `VARCHAR(50)` | Nullable | Optional — WhatsApp or phone |
| `message` | `TEXT` | Not Null | Inquiry content |
| `company_name` | `VARCHAR(255)` | Nullable | Company (if provided) |
| `status` | `ENUM('NEW','CONTACTED','RESOLVED')` | Default 'NEW' | Lifecycle status |
| `source` | `ENUM('WEBSITE','EMAIL','PHONE','SOCIAL')` | Default 'WEBSITE' | Origin of inquiry |
| `created_at` / `updated_at` | `TIMESTAMP` | — | — |

**Notes**:
- Inquiry and Company Settings are the two CMS areas that handle operational data
- No relational link to Build/Solution/Article unless explicitly associated

---

## Entity: Company Settings

Company information editable through the CMS, not hard-coded.

| Field | Type | Constraints | Notes |
|-------|------|-------------|-------|
| `id` | `BIGINT UNSIGNED` | Primary Key, Single-row design | Auto-Increment but intended as singleton (id=1) |
| `company_name` | `VARCHAR(255)` | Not Null | — |
| `tagline` | `VARCHAR(255)` | Nullable | / Descriptor |
| `description` | `TEXT` | Nullable | Company description |
| `logo` | `VARCHAR(255)` | Nullable | Path/URL |
| `favicon` | `VARCHAR(255)` | Nullable | Path/URL |
| `email` | `VARCHAR(255)` | Nullable | — |
| `phone` | `VARCHAR(50)` | Nullable | WhatsApp / landline |
| `address` | `TEXT` | Nullable | — |
| `social_media` | `JSON` | Nullable | `{facebook, twitter, linkedin, instagram}` keys |
| `created_at` / `updated_at` | `TIMESTAMP` | — | — |

**Constraints (from PRD 17)**:
- `.env` is reserved for system configuration and secrets; company profile belongs in the database
- **Website field is intentionally excluded** — this CMS manages the website itself
- Storage: CMS → Settings → Company Profile → Database (not JSON, not .env)

---

## Index Summary (Recommended)

| Table | Index |
|-------|-------|
| `builds` | PRIMARY (`id`), UNIQUE (`slug`), INDEX (`status`) |
| `solutions` | PRIMARY (`id`), UNIQUE (`slug`), INDEX (`status`) |
| `services` | PRIMARY (`id`), UNIQUE (`slug`) |
| `articles` | PRIMARY (`id`), UNIQUE (`slug`), INDEX (`category`), INDEX (`status`) |
| `media` | PRIMARY (`id`), INDEX (`mime_type`) |
| `hero_slides` | PRIMARY (`id`), INDEX (`type`), INDEX (`is_active`), INDEX (`reference_id`), INDEX (`starts_at`), INDEX (`ends_at`) |
| `inquiries` | PRIMARY (`id`), INDEX (`status`), INDEX (`created_at`) |
| `company_settings` | PRIMARY (`id`), UNIQUE KEY `single_row` (`id`) — treated as singleton |

---

## Relationship Diagram (Conceptual)

```
       +-----------+     Many-to-Many     +-----------+
       |   Builds  |  -----------------> |   Articles|
       +-----------+                       +-----------+
           ^                                       ^
           |                                       |
           |                                       |
       +-----------+                       +-----------+
       | Solutions |  -----------------> |   Articles|
       +-----------+                       +-----------+

   Hero Slides (reference_id -> Builds.id OR Solutions.id)
   type: ENUM('BUILD','SOLUTION','CUSTOM')

   Media — reusable assets, referenced by foreign keys or path lookup

   Inquiries — standalone operational entity

   Company Settings — singleton table, no FK relationships
```

---

## Design Notes & Constraints

1. **Hero placement separate from content source** — Hero slides reference Builds or Solutions via `reference_id`; they do not duplicate `title`, `description`, or `content`. The `type` field determines the source type.

2. **No generic CMS entities** — Every table has a specific, bounded purpose:
   - `Builds` → portfolio proof
   - `Solutions` → owned products
   - `Services` → build capabilities
   - `Articles` → knowledge/SEO content
   - `Media` → reusable visual assets
   - `Hero Slides` → editorial placement
   - `Inquiries` → user contact forms
   - `Company Settings` → company profile

3. **Article ↔ Build/Solution relationships** are many-to-many via pivot tables (`article_build`, `article_solution`). These are not separate entities but relationship tables.

4. **Company Settings** is a singleton table — application logic ensures only one row exists. No website field (excluded per PRD 17).

5. **Status enumerations** are consistent where possible (Builds/Solutions share DRAFT/COMING_SOON/BETA/AVAILABLE/ARCHIVED).

6. **Media** is addressable by `path` and `filename`; no need for a generic "attachments" table.

7. **No headless CMS, no Filament, no generic CMS bloat** — each table maps directly to a PRD-defined content type.

---

## Verification Checklist

- [x] All 8 content types from PRD 06 are represented: Build, Solution, Service, Article, Hero Slide, Media, Inquiry, Company Settings
- [x] Inquiry and Company Settings are represented (PRD 06 CMS areas + PRD 17)
- [x] Relationships required by the PRD are explicit: Article↔Build/Solution, Hero Slide↔Build/Solution, Media reuse
- [x] No generic CMS entities are added
- [x] Hero placement separate from content source (type + reference_id pattern)
- [x] Company Settings: no website field, stored in DB not .env (PRD 17)
- [x] MariaDB types used throughout
- [x] Appropriate constraints (UNIQUE slugs, ENUM statuses, NOT NULL where needed)
- [x] Timestamps on all tables
- [x] Migration document separate (TASK-031) — this is schema reference only