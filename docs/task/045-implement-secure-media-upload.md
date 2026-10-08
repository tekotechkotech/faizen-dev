# Implement secure media upload

## Goal

Implement centralized media-library upload with MIME, size, and storage controls.

## PRD Reference

- `docs/prd/06-content-model-and-cms.md`
- `docs/prd/12-security-and-authentication.md`

## Dependency

- TASK-032
- TASK-043

## Area / Files

CMS media upload

## Implementation

- [ ] Validate MIME type
- [ ] Validate file size
- [ ] Generate safe storage name/path
- [ ] Store media metadata
- [ ] Prevent executable upload behavior

## Acceptance Criteria

- [ ] Invalid MIME/size uploads are rejected
- [ ] Uploaded files cannot expose arbitrary server paths
- [ ] Media metadata is stored

## Definition of Done

- [ ] Security tests pass
- [ ] Upload/retrieval round trip works

## Technical Notes

Exact allowed formats/limits must follow an explicit decision if not specified elsewhere.
