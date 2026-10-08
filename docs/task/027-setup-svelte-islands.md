# Set up Svelte Islands

## Goal

Enable Svelte components for explicitly interactive UI without converting the site to a SPA.

## PRD Reference

- `docs/prd/10-technical-stack-and-architecture.md`

## Dependency

- TASK-026

## Area / Files

Astro/Svelte integration

## Implementation

- [ ] Configure Svelte integration
- [ ] Verify an isolated interactive component
- [ ] Verify non-interactive HTML remains server-rendered

## Acceptance Criteria

- [ ] Svelte component can be hydrated as an island
- [ ] Static content does not require Svelte

## Definition of Done

- [ ] Build succeeds
- [ ] Client JS is limited to interactive islands

## Technical Notes

Do not introduce global client state without a requirement.
