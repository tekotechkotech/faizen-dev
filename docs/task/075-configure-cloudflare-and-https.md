# Configure Cloudflare and HTTPS

## Goal

Prepare the production edge and HTTPS layer required by the infrastructure design.

## PRD Reference

- `docs/prd/13-deployment-and-infrastructure.md`

## Dependency

- TASK-074

## Area / Files

Cloudflare/HTTPS

## Implementation

- [ ] Configure DNS/proxy according to actual deployment
- [ ] Configure HTTPS
- [ ] Verify public routing

## Acceptance Criteria

- [ ] Public traffic is served over HTTPS
- [ ] Cloudflare routing reaches intended services

## Definition of Done

- [ ] HTTPS and routing are verified
- [ ] No sensitive origin configuration is exposed

## Technical Notes

Exact domain/subdomain remains a deployment decision if not locked.
