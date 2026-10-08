# Define page rendering strategy

## Goal

Decide which content-heavy and dynamic page categories are prerendered or SSR within the locked Astro architecture.

## PRD Reference

- `docs/prd/10-technical-stack-and-architecture.md`

## Dependency

- TASK-002

## Area / Files

Astro rendering architecture

## Implementation

- [ ] Map Home, Build, Solution, With Us, Article, Service, and inquiry pages
- [ ] Identify content that can be prerendered
- [ ] Identify content requiring dynamic rendering
- [ ] Record the decision

## Acceptance Criteria

- [ ] Every required page has a documented rendering approach
- [ ] Strategy remains MPA/SSG/SSR-oriented
- [ ] No pure SPA requirement is introduced

## Definition of Done

- [ ] Rendering decisions are documented
- [ ] Decisions do not conflict with performance requirements

## Technical Notes

Use only the rendering modes necessary for the PRD.
