# Implement Company Settings API

## Goal

Expose approved public company profile settings without exposing system secrets.

## PRD Reference

- `docs/prd/17-company-settings.md`

## Dependency

- TASK-032
- TASK-004

## Area / Files

Company settings API

## Implementation

- [ ] Implement public settings retrieval
- [ ] Map company name/tagline/description
- [ ] Map logo/favicon
- [ ] Map contact details
- [ ] Map address/social media

## Acceptance Criteria

- [ ] Public API exposes only company profile fields
- [ ] Secrets and system environment values are never returned

## Definition of Done

- [ ] Response is verified
- [ ] Database-backed content is used

## Technical Notes

Company content belongs in CMS/database, not JSON or environment configuration.
