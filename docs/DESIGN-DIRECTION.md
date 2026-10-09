# Design Direction

## Visual Hierarchy

- **One primary understanding per screen** — Each screen communicates a single, clear purpose aligned with "Do More, Less Explain." Secondary information is de-emphasized through hierarchy, not eliminated.
- **Headings before action** — Display typography establishes the topic immediately; supporting text elaborates only what's necessary.
- **CTA prominence** — The primary call-to-action is obvious through size, contrast, and spacing, consistent with "The primary CTA must be obvious."
- **Information density over whitespace** — High information density is preferred; whitespace serves to group, not decorate. Sections are separated by clear visual breaks, not empty spacing.
- **Product-first storytelling** — Visuals carry information about what Faizen has built; imagery and components demonstrate real solutions rather than abstract concepts.

## Spacing Principles

- **Neutral 4-point / 8-point foundation** — Spacing follows a consistent scale (4pt / 8pt) applied uniformly across all screens. Vertical rhythm is maintained through consistent margin/padding ratios.
- **Tight section grouping** — Related components share closer spacing; distinct sections use wider gutters to signal separation.
- **No decorative spacing** — Whitespace exists to clarify hierarchy and density, not to fill space. Avoid raksa whitespace that reduces information density.
- **Alignment to baseline grid** — All text and interactive elements align to a consistent vertical grid, ensuring rhythm across mobile and desktop.

## Typography Direction

**Display font (maximum 2 fonts total):**

- **Display:** `Geist Display` or `Cabinet Grotesk` — characterful, high-impact, roman style only (no italic headers, per anti-slop discipline). Used for main headings and hero sections.
- **Body:** `Plus Jakarta Sans` or `Satoshi` — highly legible, medium weight for body copy, captions, and UI text.

**Mono (technical):**

- **Monospace:** `Geist Mono` or `Roboto Mono` — used exclusively for code snippets, technical labels, and data display. Mono is separate from the 2-font limit for display/body.

**Typographic scale:**

- Headings: scale from 2xl to 6xl depending on hierarchy level, all roman (`font-style: normal`).
- Body: 1rem to 1.25rem with line-height 1.5–1.6.
- Caption: 0.875rem, muted weight.
- All headings use `font-weight: 600` or `700` for contrast; body uses `400`–`500`.

**Color:** Text on neutral background (zinc/slate/stone). Accent color (emerald) used sparingly for link states, primary buttons, and highlight text.

## Imagery Direction

- **Product-over-stock** — Imagery always shows actual Faizen-built solutions, real interfaces, or real-world usage. No generic stock photos that add no informational value.
- **Hero: typographic-first** — Strong typographic hero is preferred. When imagery is used, it is high-contrast, muted-toned, and always anchored to the product narrative.
- **No floating icon boxes** — Icons are inline with text or part of a structured illustration, not wrapped in isolated `p-2 rounded-lg bg-white/5` containers.
- **No generic bento grids** — Layouts use structured section rhythm (marquee hero → stat-led → features → CTA → footer) rather than empty grid patterns.
- **Imagery tone:** Muted, high-contrast, with any accent color (emerald) applied sparingly as a highlight, not as a dominant overlay.

## Interaction Tone

- **Obvious primary CTA** — The main action on each screen is visually unambiguous through size, contrast, and placement.
- **Progressive disclosure** — Secondary actions are available but de-emphasized; they do not compete with the primary understanding of the screen.
- **Stateful interactions** — All interactive elements support default, hover, `:focus-visible`, `:active`, disabled, loading, error, and success states with clear visual feedback.
- **Microinteractions are functional, not decorative** — Transitions and microstates communicate status change (e.g., button hover → disabled → loading), not purely ornamental motion.
- **Focus-visible** — `:focus-visible` outlines use the accent color (emerald) at minimum 3:2 contrast, never removed entirely.

## Brand Alignment: Product First, Company Second

- **Product displayed before company** — What Faizen has built takes visual precedence over company information. Company details appear secondary, typically in the footer or side panels.
- **One primary understanding per screen** — Every screen answers one clear question: *What can I build/use here?* Company narrative supports, never overrides, this question.
- **Partnership-over-transaction tone** — Language and visuals communicate "Let's build together" rather than "Buy now." This is reflected in:
  - Navbar phrase: `BUILD · SOLUTIONS · WITH US`
  - CTA text emphasizing collaboration over transaction.
  - Imagery showing real interfaces and real use cases.

## Palette

**Neutral foundation:** `zinc` / `slate` / `stone` — warm-neutral base for backgrounds, borders, and surface layers. Specific tokens:

- `--color-neutral-0`: pure white (backgrounds)
- `--color-neutral-1`: very light warm gray (surfaces)
- `--color-neutral-2`: light gray (borders, input backgrounds)
- `--color-neutral-3`: medium gray (dividers, muted text)
- `--color-neutral-4`: dark gray (body text)
- `--color-neutral-5`: very dark gray (heading text, interactive defaults)
- `--color-neutral-6`: near-black (maximal contrast text)

**One functional accent:** `emerald` — used exclusively for:

- Primary CTA background and hover state
- `:focus-visible` outlines
- Link text (default, not hovered)
- Micro-interaction success states

Accent is applied at 100% saturation in its primary role; never mixed with purple, indigo, or cyan gradients. No other accent colors are introduced.

## Anti-Slop Verification (Anti-AI-Slop Checklist)

| Check | Status |
|-------|--------|
| **Color Palette** | Neutral zinc/slate/stone base + 1 functional accent (emerald). No purple/indigo radial gradients. No rainbow/gradual multi-color overlays. |
| **Typography** | Max 2 fonts: display (`Geist Display` / `Cabinet Grotesk`) + body (`Plus Jakarta Sans` / `Satoshi`). Mono separate for technical. All headings roman (`font-style: normal`). No italic headers. |
| **Information Density** | High density preferred over whitespace raksa. Sections grouped tightly; wider gutters only for distinct section breaks. No empty bento grids or floating icon boxes. |
| **Slop-Free** | ✅ No purple/indigo radial gradients<br>✅ No generic bento grids<br>✅ No floating rounded icon boxes<br>✅ Max 1 functional accent above neutral<br>✅ Max 2 fonts + mono<br>✅ Product-first hierarchy<br>✅ Do More, Less Explain alignment<br>✅ No AI marketing buzzwords in visuals |

## One Primary Understanding Per Screen

Every screen in the Faizen experience communicates exactly one primary understanding, ordered by priority:

1. **What can I build/use here?** — Product showcase or solution preview (Product First)
2. **How do I get started?** — Primary CTA or action path
3. **What else is relevant?** — Secondary information de-emphasized through hierarchy, not buried

This alignment ensures each screen reinforces "Do More, Less Explain" — visuals carry the burden, text supports only what's necessary.