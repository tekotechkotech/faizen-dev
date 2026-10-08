# Implement public media delivery

## Goal

Implement safe public access to approved media assets.

## PRD Reference

- `docs/prd/06-content-model-and-cms.md`
- `docs/prd/12-security-and-authentication.md`

## Dependency

- TASK-032

## Area / Files

Media delivery

## Implementation

- [ ] Define public media retrieval behavior
- [ ] Resolve media paths safely
- [ ] Prevent unauthorized filesystem exposure

## Acceptance Criteria

- [ ] Public pages can load approved media
- [ ] Arbitrary filesystem paths cannot be requested

## Definition of Done

- [ ] Media access is verified
- [ ] Sensitive server paths are not exposed

## Technical Notes

Respect secure upload/storage constraints.
