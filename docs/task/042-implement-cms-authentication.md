# Implement CMS authentication

## Goal

Protect the custom CMS with secure authentication.

## PRD Reference

- `docs/prd/12-security-and-authentication.md`

## Dependency

- TASK-028
- TASK-032

## Area / Files

Laravel CMS authentication

## Implementation

- [ ] Implement login
- [ ] Implement password hashing
- [ ] Implement session management
- [ ] Implement logout
- [ ] Implement login rate limiting

## Acceptance Criteria

- [ ] CMS cannot be accessed anonymously
- [ ] Passwords are securely hashed
- [ ] Sessions are managed securely

## Definition of Done

- [ ] Authentication tests pass
- [ ] Failed login behavior is safe

## Technical Notes

Initial role is ADMIN only.
