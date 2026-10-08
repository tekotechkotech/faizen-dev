# Define public and private API boundary

## Goal

Separate public content endpoints from authenticated CMS operations.

## PRD Reference

- `docs/prd/12-security-and-authentication.md`

## Dependency

- TASK-002

## Area / Files

API architecture

## Implementation

- [ ] Identify public read operations
- [ ] Identify CMS/private operations
- [ ] Record authentication boundary
- [ ] Record validation and rate-limit requirements

## Acceptance Criteria

- [ ] Public/private responsibilities are explicit
- [ ] No CMS credential is exposed to frontend code

## Definition of Done

- [ ] Boundary is documented
- [ ] Each later API task can reference this boundary

## Technical Notes

Do not introduce JWT/OAuth unless later explicitly required.
