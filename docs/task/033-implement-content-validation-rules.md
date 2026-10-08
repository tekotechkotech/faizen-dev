# Implement content validation rules

## Goal

Implement validation for CMS-managed content according to the content contracts.

## PRD Reference

- `docs/prd/06-content-model-and-cms.md`

## Dependency

- TASK-006
- TASK-032

## Area / Files

Laravel validation

## Implementation

- [ ] Validate Build fields
- [ ] Validate Solution fields
- [ ] Validate Service fields
- [ ] Validate Article fields
- [ ] Validate Hero references/overrides
- [ ] Validate Media metadata

## Acceptance Criteria

- [ ] Invalid content is rejected
- [ ] Required fields are enforced
- [ ] Status values follow approved rules

## Definition of Done

- [ ] Validation is testable
- [ ] Error responses are understandable

## Technical Notes

Do not invent constraints where the PRD gives no basis.
