# Database Schema (TASK-005)

Conceptual schema per `docs/prd/06-content-model-and-cms.md`. Principle: **content is source of truth; placement is separate** (hero references build/solution, never duplicates).

## builds

- `id`, `title`, `slug` (unique), `short_description`, `description` (markdown)
- `thumbnail`, `cover` (media refs), `status` (`DRAFT|PUBLISHED|ARCHIVED`)
- `published_at`, `timestamps`
- Detail blocks (normalized or JSON): problem/context, solution, key_features, screenshots, result/impact, technology (optional, never leads narrative), cta

## solutions

- `id`, `name`, `slug` (unique), `short_description`, `description`
- `logo`, `thumbnail`, `cover`, `status` (`DRAFT|COMING_SOON|BETA|AVAILABLE|ARCHIVED`)
- `pricing` (nullable; e.g. `contact`), `url` (nullable), `published_at`, `timestamps`

## services

- `id`, `title`, `slug` (unique), `short_description`, `description`, `cover`, `status` (`ACTIVE|INACTIVE`), `timestamps`
- Initial: Custom Software, System Development, API Integration, Maintenance

## articles

- `id`, `title`, `slug` (unique), `excerpt`, `cover`, `content` (markdown)
- `category` (`Technical|Business|Product|Insight`), `author`, `status` (`DRAFT|PUBLISHED|ARCHIVED`)
- `published_at`, `timestamps`; may relate to solutions/builds (pivot)

## hero_slides

- `id`, `type` (`BUILD|SOLUTION|CUSTOM`), `reference_id` (nullable for CUSTOM)
- `title_override`, `description_override`, `image_override` (nullable)
- `sort_order`, `is_active`, `starts_at`, `ends_at`, `timestamps`

## media

- `id`, `filename`, `path` (unique), `mime_type`, `size`, `width`, `height`, `alt`, `timestamps`
- Central library; MIME + size validated on upload.

## inquiries

- `id`, `name`, `contact` (email or WhatsApp), `intent` (`EXISTING|CUSTOM|PARTNERSHIP|OTHER`)
- `message`, `status` (`NEW|READ|REPLIED|ARCHIVED`), `timestamps`

## company_settings (single row)

- `id`, `company_name`, `tagline`, `description`, `logo`, `favicon`
- `email`, `phone_whatsapp`, `address`, `socials` (JSON), `timestamps`

## users (CMS)

- `id`, `name`, `email` (unique), `password` (hashed), `role` (`ADMIN`), `timestamps`

No generic CMS entities. Migrations follow this file in TASK-031.
