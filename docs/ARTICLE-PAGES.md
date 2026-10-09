# Article Listing and Detail Pages

## TASK-019: Design Article listing and detail pages

## Goal

Design knowledge and SEO-oriented article experiences. Articles serve as a knowledge resource and discovery channel, aligned with "Do More, Less Explain" — providing value-driven content without technology leading the narrative.

## Page Structure

### Article Listing Page

Sections:

1. **Hero/Introduction** — Brief statement about the article archive; may include search/filter controls
2. **Article Cards** — List of articles with title, meta (author, date), and excerpt; grouped by category if desired
3. **Category Filter** — Technical, Business, Product, Insight (per TASK-019 Technical Notes)
4. **CTA / Load More** — Primary action to load additional articles or "Write Article" conversion endpoint

#### Article Card Structure

- **Title** — Display font (Geist Display or Cabinet Grotesk), roman style, `font-weight: 600` or `700`
- **Meta** — Date + category badge; body font (Plus Jakarta Sans or Satoshi), muted weight (`--color-neutral-3`)
- **Excerpt** — Body text, concise summary of article content
- **Read Time** — Optional caption-style metadata

#### Category Filter

- Visual filter chips or dropdown
- Active state highlighted with emerald accent
- Non-active states: neutral `--color-neutral-3` text, no background fill
- Focus-visible state: emerald outline (`:focus-visible`)

#### Anti-Slop Compliance

| Check | Status |
|-------|--------|
| **Color Palette** | Neutral zinc/slate/stone base; emerald accent for active filter/primary CTA only. No purple/indigo gradients. |
| **Typography** | Max 2 fonts: Display (Geist Display/Cabinet Grotesk) + Body (Plus Jakarta Sans/Satoshi). All headings roman (`font-style: normal`). |
| **Information Density** | Article cards grouped tightly; wider gutters only for section breaks. No empty bento grids. |
| **Slop-Free** | ✅ No purple/indigo gradients<br>✅ No generic bento grids<br>✅ No floating rounded icon boxes<br>✅ Max 1 functional accent<br>✅ Max 2 fonts + mono<br>✅ Product-first hierarchy<br>✅ Do More, Less Explain alignment<br>✅ No AI marketing buzzwords in visuals |

### Article Detail Page

Sections:

1. **Article Hero** — Article title prominently displayed; may include reading progress indicator; typographic-first; no unnecessary metadata overload
2. **Meta Information** — Author, publish date, category badge; small and de-emphasized
3. **Article Content** — Main body text with proper heading hierarchy (H2, H3); readable line height; images with alt text embedded where applicable
4. **Related Content** — Related Articles + Related Solutions/Builds connection; connects Articles to Solutions/Builds per acceptance criteria
5. **Table of Contents** (for long articles) — Jump links to sections; optional
6. **CTA / Related Actions** — "Back to Articles" or related solution CTA; emerald primary if action-oriented

#### Content Hierarchy

- **Article Title**: 6xl display font, primary weight, maximal contrast
- **Section Headings**: Scale down from 2xl to xl; `font-weight: 600` or `700`; roman style only
- **Body Text**: 1rem to 1.25rem; line-height 1.5–1.6; `--color-neutral-4` for default, `--color-neutral-5` for emphasis
- **Captions/Credit**: 0.875rem, muted weight

#### Related Content Connection

- **Related Articles** — "You might also like" section; 3–4 cards with title + excerpt
- **Related Solutions/Builds** — "This article relates to these projects" — connects knowledge to tangible Faizen work; project cards with title + brief description
- Visual separator or subtle grouping to distinguish article-to-article vs article-to-build connections

#### Anti-Slop Compliance (Detail Page)

| Check | Status |
|-------|--------|
| **Color Palette** | Neutral zinc/slate/stone; emerald for primary CTA / link states only. No rainbow gradients. |
| **Typography** | Max 2 fonts; all headings roman; no italic headers. Display for title, body for content. |
| **Information Density** | Content area high density; whitespace supports reading rhythm, not decoration. |
| **Slop-Free** | ✅ No purple/indigo gradients<br>✅ No generic bento grids<br>✅ No floating rounded icon boxes<br>✅ Max 1 functional accent<br>✅ Max 2 fonts + mono<br>✅ Product-first hierarchy<br>✅ Do More, Less Explain alignment |

## Definition of Done

- [ ] Article listing design complete with category filters and responsive breakpoints (mobile + tablet + desktop)
- [ ] Article detail design complete with content hierarchy, related content, and responsive design
- [ ] CTA hierarchy verified across all screen sizes: one primary understanding per screen
- [ ] Anti-slop compliance confirmed per DESIGN-DIRECTION.md checklist (no purple/indigo gradients, no bento grids, max 1 accent, max 2 fonts)
- [ ] Reading hierarchy is clear: title → meta → content → related → CTA
- [ ] Related content connects Articles to Solutions/Builds (acceptance criteria)

## Technical Notes

- Categories: Technical, Business, Product, Insight
- Related content can connect Articles to Solutions/Builds
- SEO-oriented: each article page has proper meta tags, open graph data, and structured data where applicable
- Categories are Technical, Business, Product, Insight
- Progressive enhancement: core article content accessible without JavaScript; reading flow enhances with client-side interactions