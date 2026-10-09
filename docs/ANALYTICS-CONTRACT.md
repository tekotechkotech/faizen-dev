# Analytics Event Contract

## Purpose

Specify the initial behavior measurement model before implementation. Analytics exists as a feedback loop for understanding visitor behavior and improving the website and product direction. It is not primarily for vanity metrics. This contract defines the core events, their allowed properties, and the funnel stages they support — without assuming any analytics provider.

## Core Events

| Event | Description | Funnel Stage | Allowed Properties |
|---|---|---|---|
| **page_view** | A visitor viewed any page on the site. | DISCOVER | `page_name` (string, required): the page path/name. <br> `referrer` (string, optional): the referring URL. <br> `entry_point` (string, optional): e.g., "navigation", "search", "link". |
| **view_build** | A visitor viewed a build detail page. | DISCOVER | `build_id` (integer, required): the build identifier. <br> `build_name` (string, required): the build display name. |
| **view_solution** | A visitor viewed a solution detail page. | UNDERSTAND | `solution_id` (integer, required): the solution identifier. <br> `solution_name` (string, required): the solution display name. |
| **view_service** | A visitor viewed a service detail page. | UNDERSTAND | `service_id` (integer, required): the service identifier. <br> `service_name` (string, required): the service display name. |
| **view_article** | A visitor viewed an article/blog post. | DISCOVER | `article_id` (integer, required): the article identifier. <br> `article_title` (string, required): the article title. <br> `category` (string, optional): article category/topic. |
| **click_cta** | A visitor clicked a call-to-action button. | TRIGGER (any stage) | `cta_name` (string, required): the CTA identifier/label. <br> `cta_type` (string, required): e.g., "get_started", "contact", "learn_more". <br> `page_name` (string, required): the page where the CTA was clicked. |
| **get_started** | A visitor initiated the "get started" flow. | ACT | None required (standalone event). May be fired without additional properties after a CTA click. |
| **contact_submit** | A visitor submitted a contact form. | ACT | `form_type` (string, required): e.g., "inquiry", "general". <br> `success` (boolean, required): whether submission succeeded. <br> **Excludes**: email body, name, email address — these are PII and must not be sent to analytics. |

## Funnel Stages

Events support the following progression:

> **DISCOVER → UNDERSTAND → TRUST → ACT**

- **DISCOVER**: `page_view`, `view_build`, `view_solution`, `view_service`, `view_article`
- **UNDERSTAND**: `click_cta`, `view_solution`, `view_service` (evaluating options)
- **TRUST**: `view_build`, `click_cta` (engaging with content/Calls-to-Action)
- **ACT**: `get_started`, `contact_submit`

Example funnel path: `view_article` → `view_solution` → `click_cta` (get_started) → `contact_submit`.

## Guidelines

- **No analytics provider is assumed**. This contract is provider-agnostic; implementation chooses the actual collector (Matomo, Google Analytics, Plausible, etc.).
- **Sensitive data is excluded**. PII (names, email addresses, message bodies) must never be sent as analytics properties. The `contact_submit` event only sends `form_type` and `success`; detailed form data is handled server-side, not in analytics.
- **All property values must be sanitized** before sending to the collector.
- **Events are optional** — if a property is not relevant, it may be omitted, but the listed required properties must always be present when the event is fired.
- **`click_cta` `cta_type` values are constrained** to the known set: `"get_started"`, `"contact"`, `"learn_more"`.
- **`form_type` values** for `contact_submit` are constrained to: `"inquiry"`, `"general"`.
- **`success`** in `contact_submit` is a boolean indicating whether the server responded with a success status.

## Event Timeline

| Event | Typical Trigger |
|---|---|
| `page_view` | Page load (Astro navigations, SPA transitions) |
| `view_build` | Build detail page renders |
| `view_solution` | Solution detail page renders |
| `view_service` | Service detail page renders |
| `view_article` | Article page renders |
| `click_cta` | CTA button clicked (handled via event listener) |
| `get_started` | User starts the get-started flow (after CTA click) |
| `contact_submit` | Contact form submitted (after API response) |