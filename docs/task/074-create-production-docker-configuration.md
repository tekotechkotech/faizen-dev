# Create production Docker configuration

## Goal

Prepare production containers for the locked deployment architecture.

## PRD Reference

- `docs/prd/13-deployment-and-infrastructure.md`

## Dependency

- TASK-030
- TASK-061
- TASK-028

## Area / Files

Production Docker

## Implementation

- [ ] Create production frontend configuration
- [ ] Create production Laravel configuration
- [ ] Configure MariaDB production connection
- [ ] Configure environment variables

## Acceptance Criteria

- [ ] Production services can be built without development-only dependencies
- [ ] Secrets are provided through environment configuration

## Definition of Done

- [ ] Production images/builds are reproducible
- [ ] No development credentials are committed

## Technical Notes

Do not introduce Kubernetes.
