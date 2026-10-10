# Performance Targets (TASK-082)

Core Web Vitals target: **Good** on Home, Build, Solution, Article (PRD 11/16).

Budgets (initial, mobile Moto G4 / 4x CPU / Fast 3G):

- HTML-first: basic content without JS; islands only (carousel, inquiry form).
- Images: responsive + lazy below fold + explicit width/height (see `Base.astro` patterns).
- Fonts: system stack (no webfont download in v1).
- JS: per-island chunks only (measured: inquiry ~5.1kB, carousel ~1.3kB gz smaller).

Verify per release with Lighthouse on the 4 priority pages; record in QA docs.
