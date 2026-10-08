# Implement public Hero API

## Goal

Expose active hero placements referencing existing Build/Solution content.

## PRD Reference

- `docs/prd/06-content-model-and-cms.md`
- `docs/prd/05-landing-page.md`

## Dependency

- TASK-032
- TASK-006

## Area / Files

Public Hero API

## Implementation

- [ ] Implement active hero retrieval
- [ ] Resolve referenced content
- [ ] Apply approved overrides
- [ ] Apply sort/order and active-date rules

## Acceptance Criteria

- [ ] Hero references existing content rather than duplicating it
- [ ] Only active placements are returned

## Definition of Done

- [ ] API behavior matches Hero contract
- [ ] Invalid references are handled safely

## Technical Notes

Hero is editorial placement, not duplicated content.
