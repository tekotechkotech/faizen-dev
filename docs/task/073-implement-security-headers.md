# Configure production security headers

## Goal

Apply the approved security-header requirements to public and CMS responses.

## PRD Reference

- `docs/prd/12-security-and-authentication.md`

## Dependency

- TASK-044
- TASK-030

## Area / Files

Production security

## Implementation

- [ ] Configure HTTPS-aware headers
- [ ] Configure appropriate content/security policies
- [ ] Verify headers on public and CMS responses

## Acceptance Criteria

- [ ] Required security headers are present
- [ ] Configuration does not break required functionality

## Definition of Done

- [ ] Header verification passes
- [ ] No sensitive information is exposed

## Technical Notes

Exact policy follows actual application requirements.
