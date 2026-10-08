# Implement analytics event tracking

## Goal

Implement the selected analytics provider using the approved event contract.

## PRD Reference

- `docs/prd/15-analytics-measurement-and-product-intelligence.md`

## Dependency

- TASK-008
- TASK-068
- TASK-061
- TASK-055
- TASK-056
- TASK-057
- TASK-058
- TASK-060

## Area / Files

Analytics implementation

## Implementation

- [ ] Implement page_view
- [ ] Implement view_build
- [ ] Implement view_solution
- [ ] Implement view_service
- [ ] Implement view_article
- [ ] Implement click_cta
- [ ] Implement get_started
- [ ] Implement contact_submit

## Acceptance Criteria

- [ ] All required events are emitted at correct actions
- [ ] Event data follows approved contract
- [ ] Unnecessary personal data is not collected

## Definition of Done

- [ ] Events are verified in provider
- [ ] Tracking does not block core functionality

## Technical Notes

Do not add vanity metrics without a decision.
