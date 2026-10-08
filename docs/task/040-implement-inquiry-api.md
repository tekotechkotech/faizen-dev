# Implement inquiry submission API

## Goal

Create the low-friction conversion endpoint for Let’s Build Together.

## PRD Reference

- `docs/prd/07-page-requirements.md`
- `docs/prd/12-security-and-authentication.md`

## Dependency

- TASK-007
- TASK-032

## Area / Files

Inquiry API

## Implementation

- [ ] Implement submission endpoint
- [ ] Validate intent
- [ ] Validate contact field
- [ ] Validate brief description
- [ ] Store inquiry
- [ ] Return safe success/error responses

## Acceptance Criteria

- [ ] All four intent values are supported
- [ ] Invalid submissions are rejected
- [ ] Inquiry data is stored safely

## Definition of Done

- [ ] API validation tests pass
- [ ] Error handling is verified
- [ ] Rate limiting can be applied

## Technical Notes

Do not add notification integrations unless separately decided.
