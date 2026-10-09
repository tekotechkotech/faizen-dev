# Inquiry Data Contract

## Intent Values

The inquiry form supports the following four intent values. These are **closed enumerations** — only the values below are accepted:

| Value | Description |
|---|---|
| **Existing solution** | The prospect already has a solution (possibly from us or a competitor) and is seeking information or comparison. |
| **Custom solution** | The prospect has a specific custom requirement and wants a tailored proposal. |
| **Partnership** | The prospect is interested in a partnership opportunity (reseller, integration, collaboration). |
| **Other** | Any inquiry that does not fit the above categories. |

## Fields

| Field | Type | Required | Description |
|---|---|---|---|
| **intent** | enum (string) | ✅ Yes | Must be one of: `existing_solution`, `custom_solution`, `partnership`, `other`. |
| **name** | string | ✅ Yes | The requester's full name. Minimum 2 characters, maximum 100. |
| **email_or_whatsapp** | string | ✅ Yes | Contact method. Must be a valid email address **or** a WhatsApp number (E.164 format, e.g., `+628123456789`). |
| **brief_description** | string | ✅ Yes | A concise description of the inquiry purpose. Minimum 10 characters, maximum 500 characters. |

## Validation Expectations

| Validation | Rule | Error Status |
|---|---|---|
| **intent** | Must be one of the four defined enum values. | 422 Unprocessable Entity |
| **name** | Minimum 2 characters, maximum 100 characters. | 422 |
| **email_or_whatsapp** | Must pass email validation **OR** match E.164 WhatsApp format (`^\+[1-9]\d{1,14}$`). | 422 |
| **brief_description** | Minimum 10 characters, maximum 500 characters. | 422 |
| **Cross-field** | At least one of `email` or `whatsapp` contact must be provided (enforced by `email_or_whatsapp` field). | 422 |

**Note:** No additional personal data (e.g., company name, job title, phone number beyond WhatsApp, address) should be collected. The contract is deliberately minimal to preserve privacy and reduce friction.

## Stored Fields (Database)

The inquiry record stores the following fields. Timestamps and audit fields are managed by the ORM/framework and are **not** part of the contract input.

| Field | Type | Constraints |
|---|---|---|
| **id** | integer (auto-increment) | Primary key |
| **intent** | enum | `existing_solution`, `custom_solution`, `partnership`, `other` |
| **name** | varchar(100) | Not null |
| **contact_type** | enum | `email`, `whatsapp` (derived from `email_or_whatsapp` validation) |
| **contact_value** | varchar(255) | The validated email address or WhatsApp number in E.164 format |
| **brief_description** | text | Not null |
| **status** | enum | default: `pending` (e.g., `pending`, `contacted`, `converted`, `closed`) |
| **created_at** | datetime | Server-generated, not client-settable |
| **updated_at** | datetime | Server-generated, not client-settable |

## API Boundary Reference

- **Endpoint:** `POST /api/inquiry` (public, unauthenticated)
- **Rate Limit:** 3 submissions per minute per IP/email (per API-BOUNDARY.md §4.2, §5)
- **Response format:** Per API-BOUNDARY.md §6 (standard JSON error/success format)
- **Validation:** 422 with structured error messages for invalid input (per API-BOUNDARY.md §4.1)

## Design Rationale

- **Closed intent enum** ensures consistent categorization for downstream processing (admin routing, reporting).
- **Single contact field** (`email_or_whatsapp`) avoids collecting redundant data; the `contact_type` derived value simplifies downstream categorization.
- **Minimal field set** aligns with PRD § "Let's Build Together" and the principle of no unnecessary personal data.
- **Rate‑limited public endpoint** prevents spam without requiring authentication for this low‑friction conversion.