# Implement media and content backup

## Goal

Back up production media and content needed to restore the website.

## PRD Reference

- `docs/prd/13-deployment-and-infrastructure.md`

## Dependency

- TASK-074
- TASK-078

## Area / Files

Backup infrastructure

## Implementation

- [ ] Identify media storage to back up
- [ ] Back up CMS content required for recovery
- [ ] Store recovery copies separately

## Acceptance Criteria

- [ ] Required media/content can be restored
- [ ] Backup is not dependent on the same failure domain

## Definition of Done

- [ ] Restore procedure is tested
- [ ] Recovery artifacts are documented

## Technical Notes

Do not assume an unselected storage provider.
