# Connect company settings to public UI

## Goal

Use CMS-backed Company Profile content in global/public surfaces where required.

## PRD Reference

- `docs/prd/17-company-settings.md`

## Dependency

- TASK-041
- TASK-053
- TASK-062

## Area / Files

Public company metadata/content

## Implementation

- [ ] Connect company name/tagline
- [ ] Connect logo/favicon
- [ ] Connect contact information where designed
- [ ] Connect social links where designed

## Acceptance Criteria

- [ ] Public company information comes from database-backed settings
- [ ] No hardcoded secrets are exposed

## Definition of Done

- [ ] Changes in CMS can propagate to intended public surfaces

## Technical Notes

Only render fields where the approved design requires them.
