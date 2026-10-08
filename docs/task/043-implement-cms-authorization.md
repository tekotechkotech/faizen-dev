# Implement CMS authorization

## Goal

Enforce the initial ADMIN authorization boundary for CMS operations.

## PRD Reference

- `docs/prd/12-security-and-authentication.md`

## Dependency

- TASK-042

## Area / Files

CMS authorization

## Implementation

- [ ] Define ADMIN authorization rule
- [ ] Protect content management routes
- [ ] Protect settings management
- [ ] Protect media operations
- [ ] Protect inquiry access

## Acceptance Criteria

- [ ] Unauthorized users cannot perform CMS operations
- [ ] ADMIN can perform required CMS operations

## Definition of Done

- [ ] Authorization tests pass
- [ ] No unnecessary roles are introduced

## Technical Notes

Add roles only when explicitly needed.
