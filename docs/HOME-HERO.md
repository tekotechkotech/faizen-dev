# Homepage Hero

## Design According to Wireframe + Brand

The hero section follows a **mobile-first, two-column desktop** layout structure:

### Mobile Layout (single column, stacked vertically)

- **Background**: Neutral zinc/slate/stone base, minimal or no imagery (typographic-first per design direction)
- **Heading**: Main value proposition in Geist Display or Cabinet Grotesk, font-size scale appropriate for mobile (e.g., 2xl to 4xl on the vertical scale), `font-weight: 700`, `font-style: normal`
- **Subheading**: Supporting text in Plus Jakarta Sans or Satoshi, medium weight, muted color (neutral-4 or neutral-3)
- **Primary CTA**: "Let's build together" button in emerald, full-width on mobile, with `:focus-visible` outline in emerald at 3:2+ contrast
- **Secondary actions**: De-emphasized, smaller text, no competing visual weight

### Desktop Layout (two-column, side by side)

- **Left column (copy area, ~60% width)**:
  - Heading: Main value proposition in Geist Display / Cabinet Grotesk, larger scale (e.g., 5xl or 6xl)
  - Subheading: Supporting text in Plus Jakarta Sans / Satoshi
  - Primary CTA: "Let's build together" button with emerald background, white text, some padding
  - Secondary/Beneath CTA: Brief supporting text or tagline, de-emphasized
  - No fake statistics, no generic jargon

- **Right column (product teaser, ~40% width)**:
  - Selected project/product showcase (maximum 3–4 strongest items per PRD 05)
  - Each item: screenshot/image with muted, high-contrast tone + title/context
  - Optional "View Case Study" link in emerald text
  - Images are product-over-stock: actual Faizen-built solutions, real interfaces
  - No floating icon boxes, no generic bento grid pattern

### Hero Copy Guidelines

- One primary understanding per screen: "What can I build/use here?"
- Visuals carry information; text supports only what's necessary
- Heading establishes the topic immediately
- No italic headers (`font-style: normal` per anti-slop discipline)
- Display font maximum 2 fonts total (Geist Display / Cabinet Grotesk for headings, Plus Jakarta Sans / Satoshi for body/captions)

### Interaction Tone

- Primary CTA is obvious through size, contrast, and placement (emerald on neutral)
- `:focus-visible` outlines use emerald accent at minimum 3:2 contrast
- Hover state: emerald background darkens or shifts slightly, maintains contrast
- Loading, error, and success states are functional, not decorative
- Microinteractions communicate status change, not purely ornamental motion

### Anti-Slop Verification

| Check | Status |
|-------|--------|
| **Color Palette** | Neutral zinc/slate/stone base + emerald accent only. No purple/indigo radial gradients. |
| **Typography** | Max 2 fonts: display (Geist Display / Cabinet Grotesk) + body (Plus Jakarta Sans / Satoshi). All headings roman. No italic headers. |
| **Information Density** | High density preferred; tight section grouping, wider gutters only for distinct section breaks. No empty bento grids. |
| **Slop-Free** | ✅ No purple/indigo gradients<br>✅ No generic bento grids<br>✅ No floating rounded icon boxes<br>✅ Max 1 functional accent above neutral<br>✅ Max 2 fonts + mono<br>✅ Product-first hierarchy<br>✅ Do More, Less Explain alignment<br>✅ No AI marketing buzzwords in visuals |