# Analytics Provider (TASK-068)

Chosen: **Plausible** (privacy-friendly, no cookies). No PII in event props (keys truncated to 120 chars client-side).

Events (PRD 15): `page_view`, `view_build`, `view_solution`, `view_service`, `view_article`, `click_cta`, `get_started`, `contact_submit`.

Implementation: `frontend/src/lib/analytics.ts` (`track()`), wired to CTA clicks (`data-track`) and inquiry submit. In dev the tracker is a console stub; production loads the Plausible script. Alternative if self-host required: Umami (same event names).
