# Point 06 — Content Model & CMS

## Content Types

The CMS contains these content types:

1. BUILD
2. SOLUTION
3. SERVICE
4. ARTICLE
5. HERO SLIDE
6. MEDIA

## Principle

> Content is the source of truth. Placement is separate.

Hero slides reference existing Build or Solution content instead of duplicating it.

## Hero Slide — Conceptual Fields

- id
- type
- reference_id
- title_override
- description_override
- image_override
- sort_order
- is_active
- starts_at
- ends_at
- timestamps

Possible hero reference types are Build, Solution, or Custom placement. The final relation strategy can be refined during implementation without changing the requirement.

## Build — Conceptual Fields

- id
- title
- slug
- short_description
- description
- thumbnail
- cover
- status
- published_at
- timestamps

Build detail content:
- Problem/context
- Solution
- Key features
- Screenshots/visuals
- Result/impact
- Optional technology
- CTA

## Solution — Conceptual Fields

- id
- name
- slug
- short_description
- description
- logo
- thumbnail
- cover
- status
- pricing
- url
- published_at
- timestamps

Example statuses:
- DRAFT
- COMING_SOON
- BETA
- AVAILABLE
- ARCHIVED

## Service — Conceptual Fields

- id
- title
- slug
- short_description
- description
- cover
- status
- timestamps

## Article — Conceptual Fields

- id
- title
- slug
- excerpt
- cover
- content
- category
- author
- status
- published_at
- timestamps

Categories:
- Technical
- Business
- Product
- Insight

Articles may relate to Solutions and Builds.

## Media — Conceptual Fields

- id
- filename
- path
- mime_type
- size
- width
- height
- alt

Media is managed through a central media library.

## CMS Areas

Initial CMS areas:
- Dashboard
- Builds
- Solutions
- Services
- Articles
- Hero
- Media
- Inquiries
- Settings

The CMS is custom and follows **Do More, Less Explain**.

Constraints:
- No Filament.
- No headless CMS.
- No generic CMS bloat.
