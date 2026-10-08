# Define content statuses and publishing rules

## Goal

Formalize status values and publication behavior already specified by the PRD.

## PRD Reference

- `docs/prd/06-content-model-and-cms.md`

## Dependency

- TASK-005

## Area / Files

Content domain rules

## Implementation

- [ ] Define Solution statuses
- [ ] Define Build status behavior
- [ ] Define Service status behavior
- [ ] Define Article status behavior
- [ ] Define Hero active/date behavior

## Acceptance Criteria

- [ ] Solution statuses include DRAFT, COMING_SOON, BETA, AVAILABLE, ARCHIVED
- [ ] Publishing behavior is unambiguous
- [ ] No new status is invented without decision

## Definition of Done

- [ ] Rules are documented
- [ ] Rules can be enforced consistently in API and CMS

## Technical Notes

Only statuses explicitly supported by the PRD are treated as requirements.
