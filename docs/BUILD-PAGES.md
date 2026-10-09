# Build Listing and Detail Pages

## Overview

This document defines the Build pages structure, translating the brand statement **BUILD · SOLUTIONS · WITH US** into proof-oriented pages that showcase what Faizen has built without letting technology lead the narrative.

---

## Build Listing

### Purpose
Display all of Faizen's completed projects — client projects, internal projects, and experiments — as a browseable catalog of proven work.

### Layout Structure (per "One Primary Understanding Per Screen")

1. **Hero section** — Brief introduction to what was built and the proof value
2. **Project grid/cards** — List of projects with title, short description, and visual preview
3. **CTA** — "Let's build together" or "View project" to detail page

### Anti-Slop Compliance
- **Color Palette**: Neutral zinc/slate/stone base; emerald accent for CTA highlights only
- **Typography**: Max 2 fonts (Display: Geist Display/Cabinet Grotesk; Body: Plus Jakarta Sans/Satoshi); no italic headers
- **Information Density**: High density — project cards grouped tightly; wider gutters only for section breaks
- **No bento grids**: Use structured section rhythm (marquee hero → project cards → CTA)
- **No floating rounded icon boxes**: Project cards contain title/description visuals only
- **Product-first**: Projects displayed before any company/narrative information

### Sections (Build Detail Page)
Per PRD 07 and DESIGN-DIRECTION.md, the Build detail page includes:

1. **Project Hero** — Primary visual + project title; typographic-first; no technology-focused hero
2. **Context/problem** — The problem or challenge the project addressed; human-focused, not tech-focused
3. **Solution** — The approach taken; secondary to the result
4. **Key features** — What was built; functional, not feature-listicle style
5. **Screenshots/visuals** — Actual Faizen-built interfaces; product-over-stock; no generic mockups
6. **Result/impact** — Measurable or qualitative outcomes; carries the narrative
7. **Optional technology area** — Technology mentioned only as supporting detail; not leading the narrative
8. **CTA** — Primary call-to-action obvious through size, contrast, and spacing; emerald accent

### Acceptance Criteria
- [ ] Required Build detail sections are represented (Hero → Context → Solution → Features → Visuals → Result → CTA)
- [ ] Technology remains optional and secondary — does not lead the narrative
- [ ] Listing and detail designs are fully responsive (mobile + desktop)
- [ ] CTA hierarchy is clear: one primary understanding per screen
- [ ] Anti-slop verified: no purple/indigo gradients, no bento grids, max 1 accent, max 2 fonts

### Definition of Done
- [ ] Build listing design complete with responsive breakpoints
- [ ] Build detail page design complete with all 8 sections
- [ ] CTA hierarchy verified across all screen sizes
- [ ] Anti-slop compliance confirmed per DESIGN-DIRECTION.md checklist

---

## Technical Notes
- Build is proof of what Faizen has built
- Technology is never the hero of the narrative
- All imagery shows actual Faizen-built solutions (product-over-stock)
- One primary understanding per screen aligned with "Do More, Less Explain"