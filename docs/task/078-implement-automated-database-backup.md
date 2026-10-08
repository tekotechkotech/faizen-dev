# Implement automated database backup

## Goal

Create automated production MariaDB backups with retention.

## PRD Reference

- `docs/prd/13-deployment-and-infrastructure.md`

## Dependency

- TASK-074

## Area / Files

Database backup

## Implementation

- [ ] Configure automated backup schedule
- [ ] Define retention
- [ ] Store backups outside primary database location

## Acceptance Criteria

- [ ] Backups run automatically
- [ ] Retention is defined
- [ ] Off-server backup requirement is satisfied

## Definition of Done

- [ ] Backup execution is verified
- [ ] Backup procedure is documented

## Technical Notes

Exact schedule/retention require operational decision if not specified.
