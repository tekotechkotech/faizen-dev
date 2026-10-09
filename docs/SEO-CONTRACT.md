# SEO Content Contract

## Overview

This contract defines the SEO metadata requirements for all public page types in the faizen.dev application. It is derived from TASK-009 and aligned with PRD Point 11 — Performance & SEO.

---

## 1. Title Requirements

| Page Type | Title Format | Max Length |
|---|---|---|
| **Home** | `Brand Name — Tagline or Value Proposition` | 60 chars |
| **Build** | `Project/Feature Name — Build | Brand Name` | 60 chars |
| **Solution** | `Solution Name — Description | Brand Name` | 60 chars |
| **Service** | `Service Name — Service Type | Brand Name` | 60 chars |
| **Article** | `Article Title — Category | Brand Name` | 60 chars |
| **With Us** | `Application/Role Name — Join Us | Brand Name` | 60 chars |

**Rules:**
- Brand name placed at the end, separated by `—` (en dash).
- Primary keyword placed at the beginning of the title.
- No keyword stuffing; each title must be unique per page.
- `|` separator allowed only for secondary descriptors after the primary keyword.

---

## 2. Meta Description Requirements

| Page Type | Description Format | Max Length |
|---|---|---|
| **Home** | Concise summary of brand, mission, and core offerings. Highlight value proposition. | 150–160 chars |
| **Build** | Description of the build/project focus, target audience, and key benefit. | 150–160 chars |
| **Solution** | Description of the solution problem-solving aspect and primary user benefit. | 150–160 chars |
| **Service** | Description of the service offered, ideal customer, and expected outcome. | 150–160 chars |
| **Article** | Summary of the article content in a compelling way, including primary keyword. | 150–160 chars |
| **With Us** | Description of the opportunity, what the applicant will gain, and how to apply. | 150–160 chars |

**Rules:**
- Primary keyword naturally included in the first 100 characters.
- Action-oriented language where appropriate.
- No duplicate descriptions across pages.
- Must fit within pixel-width constraints (≈ 920 pixels Google).

---

## 3. Canonical Requirements

| Page Type | Canonical URL Pattern | Notes |
|---|---|---|
| **Home** | `https://faizen.dev/` | Self-referencing. |
| **Build** | `https://faizen.dev/build/{slug}` | `{slug}` = lowercase, hyphen-separated, ASCII-only. |
| **Solution** | `https://faizen.dev/solutions/{slug}` | `{slug}` = lowercase, hyphen-separated, ASCII-only. |
| **Service** | `https://faizen.dev/services/{slug}` | `{slug}` = lowercase, hyphen-separated, ASCII-only. |
| **Article** | `https://faizen.dev/articles/{slug}` | `{slug}` = lowercase, hyphen-separated, ASCII-only. |
| **With Us** | `https://faizen.dev/with-us/{slug}` | `{slug}` = lowercase, hyphen-separated, ASCII-only. |

**Rules:**
- Self-referencing canonical on every page.
- Absolute URLs (no protocol-relative).
- Canonical must match the current URL exactly (no pagination params, tracking, or session IDs).
- Duplicate/sort/ filter variants must point to the canonical primary URL via `rel=canonical`.

---

## 4. Open Graph (OG) Metadata

| Property | Value / Format | Applicable Pages |
|---|---|---|
| `og:title` | Same as page `<title>`, or truncated optimally for OG display. | All pages |
| `og:description` | Same as meta description, or first 200 chars of content. | All pages |
| `og:url` | Absolute canonical URL. | All pages |
| `og:type` | `website` (home), `article` (article pages), `profile` (with-us/applicant pages). | Per page type |
| `og:image` | Minimum 1200×630px. WebP or AVIF preferred. Fallback social card image. | All pages except error/empty states. |
| `og:locale` | `en_US` | All pages |
| `og:site_name` | `faizen.dev` | All pages |

**Rules:**
- `og:image` must be relevant to the page content, not just a logo.
- For article pages, include `article:published_time` (ISO 8601) and `article:author` if applicable.
- For `with-us` pages, include `article:section` = `careers` or `jobs`.

---

## 5. Twitter/X Card Metadata

| Field | Value / Format | Card Type |
|---|---|---|
| `twitter:card` | `summary_large_image` (recommended), `summary`, or `player`. | `summary_large_image` for content pages; `summary` for minimal pages. |
| `twitter:title` | Same as `<title>`, max 70 chars. | All pages |
| `twitter:description` | Same as meta description, max 200 chars. | All pages |
| `twitter:image` | 1200×630px minimum. WebP/AVIF. Must be different from og:image only if size/formatting requires. | All pages |
| `twitter:creator` | `@faizenbrand` or Twitter handle. | Home & main pages |
| `twitter:site` | `@faizenbrand` | All pages |
| `twitter:label1` / `twitter:data1` | Optional: price, rating, or date. | Article pages (e.g., review posts). |
| `twitter:label2` / `twitter:data2` | Optional: location, author. | Solution/Build pages. |

**Rules:**
- `twitter:card` = `summary_large_image` when `og:image` is present and ≥ 1200×630px.
- Otherwise fallback to `summary`.
- No `twitter:image` without `og:image`.

---

## 6. Sitemap & Robots

### Sitemap (`sitemap.xml`)

| Page Type | Priority | Frequency |
|---|---|---|
| **Home** | `1.0` | `daily` |
| **Build** | `0.8` | `weekly` |
| **Solution** | `0.7` | `weekly` |
| **Service** | `0.7` | `weekly` |
| **Article** | `0.5` | `weekly` |
| **With Us** | `0.5` | `monthly` |

**Rules:**
- Include only canonical, indexable pages.
- Exclude CMS draft, authentication, and internal routes.
- Update automatically on new content publish.
- Include lastmod based on content modification time.

### robots.txt

| Directive | Value |
|---|---|
| `User-agent` | `*` |
| `Allow` | All public routes (`/build/*`, `/solutions/*`, `/services/*`, `/articles/*`, `/with-us/*`, `/`). |
| `Disallow` | `/cms/*`, `/admin/*`, `/api/*`, `/auth/*`, `/tmp/*`, `/private/*` |
| `Sitemap` | `https://faizen.dev/sitemap.xml` |

**Rules:**
- Public-facing content must be crawlable.
- Admin/CMS routes must never appear in search results.
- API routes must not be indexed.
- Update sitemap URL if deployment path changes.

---

## 7. Structured Data Opportunities (JSON-LD)

| Page Type | Recommended Schema.org Type | Required Properties |
|---|---|---|
| **Home** | `Organization` | `name`, `url`, `logo`, `sameAs` (social profiles) |
| **Build** | `SoftwareApplication` or `Project` | `name`, `url`, `description`, `operatingSystem`, `keywords` |
| **Solution** | `WebApplication` or `SoftwareSourceCode` | `name`, `url`, `description`, `applicationCategory` |
| **Service** | `SoftwareService` or `Service` | `name`, `description`, `provider`, `areaServed`, `price` (if applicable) |
| **Article** | `Article` | `headline`, `image`, `author`, `datePublished`, `dateModified`, `keywords` |
| **With Us** | `JobPosting` or `Organization` | `title`, `description`, `datePosted`, `validThrough`, `jobLocation`, `baseSalary` |

**Rules:**
- Only add structured data types with a genuine page/content basis (per TASK-064 technical notes).
- JSON-LD blocks must be unique per page (no templated duplication without dynamic values).
- Validate with Google Rich Results Test and Bing Markup Validator.
- Do not add `FAQ`, `How-To`, or `Review` schema without corresponding content.

---

## 8. Clean URL Patterns

| Page Type | URL Pattern | Example |
|---|---|---|
| **Home** | `/` | `https://faizen.dev/` |
| **Build** | `/build/{slug}` | `https://faizen.dev/build/sistem-ppdb-smk` |
| **Solution** | `/solutions/{slug}` | `https://faizen.dev/solutions/whatsapp-api` |
| **Service** | `/services/{slug}` | `https://faizen.dev/services/custom-software` |
| **Article** | `/articles/{slug}` | `https://faizen.dev/articles/cara-membangun-sistem-ppdb` |
| **With Us** | `/with-us/{slug}` | `https://faizen.dev/with-us/software-engineer-opening` |

**URL Rules:**
- All slugs: lowercase, ASCII-only, hyphen-separated (`[a-z0-9]+(?:-[a-z0-9]+)*`).
- No file extensions (`.html`, `.php`).
- Trailing slash optional for root only (`/`, not `/` for subpaths).
- Canonical URLs must enforce consistent trailing-slash behavior (301 redirect if needed).
- Parameters only for filtering/pagination, never for content identity.

---

## 9. No Unsupported SEO Features

The following are explicitly **excluded** from this contract:
- `keywords` meta tag (not supported by major search engines as a ranking factor).
- `googlebot`-specific meta tags (e.g., `notranslate`, `noarchive`) unless a verified business need exists.
- `verify-via` or `google-site-verification` in the HTML markup (use separate HTML verification method instead).
- Open Graph `og:audio` or `og:video` without corresponding rich media content.
- Twitter Cards `player` card without a hosted video player implementation.
- Schema types without page-level justification (per TASK-064).

---

## Summary Checklist (Per Page Type)

| Element | Home | Build | Solution | Service | Article | With Us |
|---|---|---|---|---|---|---|
| `<title>` | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ |
| `meta description` | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ |
| `rel=canonical` | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ |
| `og:title` / `og:description` | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ |
| `og:type` | `website` | `article` | `article` | `article` | `article` | `profile` |
| `og:image` | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ |
| `twitter:card` | `summary_large_image` | `summary_large_image` | `summary_large_image` | `summary` | `summary_large_image` | `summary` |
| `sitemap` inclusion | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ |
| `robots.txt` allowance | ✅ | ✅ | ✅ | ✅ | ✅ | ✅ |
| JSON-LD structured data | `Organization` | `SoftwareApplication` | `WebApplication` | `SoftwareService` | `Article` | `JobPosting` |
| Clean URL pattern | `/` | `/build/{slug}` | `/solutions/{slug}` | `/services/{slug}` | `/articles/{slug}` | `/with-us/{slug}` |

---