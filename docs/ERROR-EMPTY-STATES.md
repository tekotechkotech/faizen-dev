# Error and Empty States

## TASK-020: Design consistent error and empty states

## Goal

Design consistent 404, 403, 419, 429, 500 and content empty states. All states must remain within the Faizen visual system, explain context, and never become unexplained blank pages. Navbar and footer must remain present where required, and no sensitive technical information may be exposed.

## Error Pages

### Required Error States

| Error Code | Description |
|------------|-------------|
| **404** | Page Not Found — requested resource does not exist |
| **403** | Forbidden — authorized user lacks permission to view the resource |
| **419** | Page Expired — session/CSRF token expired; typical for form resubmission |
| **429** | Too Many Requests — rate limit exceeded |
| **500** | Internal Server Error — unexpected server-side failure |

### Error Page Layout (per PRD 18)

```
Navbar

[Error Code]
[Error Title/Label]

Clear Error Message

[Context explanation — what happened, what the user can do]

[Back to Home] button or link

Footer
```

### Specific Guidelines

- **404**: "Page Not Found" as error title; brief explanation that the link may be broken or URL typed incorrectly; "Back to Home" primary action.
- **403**: "Access Denied" or "Forbidden"; explain permission limitation without revealing system details; "Back to Home" or "View Solutions" secondary action.
- **419**: "Session Expired"; prompt to refresh page or re-authenticate; clear CTA to continue.
- **429**: "Too Many Requests"; explain rate limiting; suggest waiting before retrying; display retry-after if available.
- **500**: "Something went wrong"; generic message avoiding stack traces or technical details; "Back to Home" primary action.

### Anti-Slop Compliance (Error Pages)

| Check | Status |
|-------|--------|
| **Color Palette** | Neutral zinc/slate/stone base; emerald used sparingly for primary CTA only. No decorative gradients. |
| **Typography** | Max 2 fonts; headings use display font for error code/titles; body for explanation. All headings roman. |
| **Information Density** | Minimal but contextual — enough to explain situation without overwhelming. Whitespace clarifies hierarchy. |
| **Slop-Free** | ✅ No purple/indigo gradients<br>✅ No generic bento grids<br>✅ No floating rounded icon boxes<br>✅ Max 1 functional accent<br>✅ Max 2 fonts + mono<br>✅ Product-first hierarchy alignment |

## Empty States

### Purpose

Empty states must remain within the Faizen visual system and explain the context. They must not become unexplained blank pages.

### Empty State Categories

| Empty State | Context | Required Elements |
|-------------|---------|-------------------|
| **No Articles** | Article listing with no articles matching filters/categories | Image/illustration + Title explaining "No articles yet" + CTA to "Write your first article" or apply filters |
| **No Projects** | Build/Solution listing with no projects | Illustration + Title + Subtitle explaining why the list is empty + CTA to create first project |
| **No Search Results** | Search performed with no matching results | Search query reminder + suggestions for refining search + CTA to adjust filters |
| **No Content** | Any page where expected content is absent | Context-specific explanation + appropriate illustration + next-step action |

### Empty State Layout

```
[Illustration / Image — product-over-stock, no generic stock photos]

[Title: Contextual headline — e.g., "No articles yet"]
[Subtitle: Brief explanation — e.g., "Start by writing your first article to share knowledge."]

[Primary CTA — emerald accent, e.g., "Write Your First Article"]
```

### Anti-Slop Compliance (Empty States)

| Check | Status |
|-------|--------|
| **Color Palette** | Neutral zinc/slate/stone; emerald CTA accent only. No purple/indigo gradients. |
| **Typography** | Max 2 fonts; title uses display font for emphasis; body uses readable body font. All headings roman. |
| **Information Density** | Compact but contextual — explains reason for emptiness + clear next step. No raksa whitespace. |
| **Slop-Free** | ✅ No purple/indigo gradients<br>✅ No generic bento grids<br>✅ No floating rounded icon boxes<br>✅ Max 1 functional accent<br>✅ Max 2 fonts + mono<br>✅ Product-first hierarchy<br>✅ Do More, Less Explain alignment<br>✅ Product-over-stock imagery<br>✅ No AI marketing buzzwords |

## Definition of Done

- [ ] All 5 error states (404, 403, 419, 429, 500) designed with responsive layouts
- [ ] Empty states designed for minimum 3 contexts: no articles, no projects, no search results
- [ ] Navbar and footer present on all error and empty pages where applicable
- [ ] No sensitive technical information exposed (no stack traces, no DB details, no secrets)
- [ ] States use consistent Faizen UI: neutral palette + emerald accent only
- [ ] Empty states explain context and provide clear next-step CTA
- [ ] Anti-slop compliance confirmed per DESIGN-DIRECTION.md checklist
- [ ] All states have responsive designs (mobile + tablet + desktop)