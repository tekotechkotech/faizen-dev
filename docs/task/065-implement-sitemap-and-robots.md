# Implement sitemap and robots

## Goal

Publish crawl-control files required by the SEO requirements.

## PRD Reference

- `docs/prd/11-performance-and-seo.md`

## Dependency

- TASK-064
- TASK-055
- TASK-056
- TASK-057
- TASK-058

## Area / Files

SEO infrastructure

## Implementation

- [ ] Generate sitemap
- [ ] Configure robots.txt
- [ ] Include public indexable routes appropriately
- [ ] Exclude non-public CMS routes

## Acceptance Criteria

- [ ] sitemap.xml is available
- [ ] robots.txt is available
- [ ] CMS/private routes are not exposed for indexing

## Definition of Done

- [ ] Crawl files validate
- [ ] URLs are correct

## Technical Notes

Follow the actual route structure.
