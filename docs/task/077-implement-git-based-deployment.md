# Implement Git-based deployment

## Goal

Implement the Git → CI/Build → Production flow required by the PRD.

## PRD Reference

- `docs/prd/13-deployment-and-infrastructure.md`

## Dependency

- TASK-074
- TASK-076

## Area / Files

Deployment pipeline

## Implementation

- [ ] Define deployment trigger
- [ ] Build application artifacts
- [ ] Deploy production version
- [ ] Handle environment configuration
- [ ] Document rollback expectation

## Acceptance Criteria

- [ ] Deployment is reproducible from Git
- [ ] Production secrets are not committed
- [ ] Build failure prevents invalid deployment

## Definition of Done

- [ ] Successful deployment is verified
- [ ] Deployment procedure is documented

## Technical Notes

Use the selected CI provider.
