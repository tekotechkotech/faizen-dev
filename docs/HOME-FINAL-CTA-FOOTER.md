# Homepage: Final CTA & Footer

## Final CTA

**Let's build together.**

### Placement & Design

- Positioned as the last prominent action before the footer
- Single primary CTA per the "One Primary Understanding Per Screen" principle
- Emergency: emerald background with white text, prominent size consistent with design direction CTA prominence guidelines
- On desktop: can span full width or be contained within section gutter
- On mobile: full-width button, stacked below any hero or section content

### CTA Alignment

- Reinforces the "Partnership Over Transaction" principle from PRD 03
- Single clear question answered: "Can you build with me?"
- No competing secondary CTAs that dilute the primary action
- `:focus-visible` outline in emerald at minimum 3:2 contrast, never removed entirely
- Hover state: visual feedback through emerald shade change, maintains contrast ratio

## Footer

### Structure (4 Groups of Links)

The footer contains exactly four groups of links, organized by purpose:

#### Explore

- Build
- Solutions
- Articles
- About / With Us

#### Build With Us

- Custom Software
- Services
- Partnership

#### Connect

- Contact form / email / relevant connect pathways

#### Legal

- Privacy
- Terms

### Footer Design Principles

- **Product displayed before company**: visual project/solution references may appear before company navigation
- **One primary understanding per screen**: footer supports the overall hierarchy without overriding it
- **Company narrative supports, never overrides**: the "Let's build together" intent remains primary
- **Spacing**: consistent with neutral 4-point/8-point foundation; footer links use tighter grouping, section breaks with wider gutters
- **Typography**: links in body font (Plus Jakarta Sans / Satoshi), medium weight, muted color (neutral-3 or neutral-4 on light backgrounds, neutral-0 on dark backgrounds)
- **Emerald accent**: may appear in `:focus-visible` states for footer links, or as subtle underlines on hover
- **No decorative spacing**: whitespace exists to clarify hierarchy, not to fill space

### Anti-Slop Verification

| Check | Status |
|-------|--------|
| **Color Palette** | Neutral zinc/slate/stone base + emerald for `:focus-visible` and subtle hover states. No purple/indigo radial gradients. |
| **Typography** | Max 2 fonts: display (Geist Display / Cabinet Grotesk) + body (Plus Jakarta Sans / Satoshi). Footer links in body font, muted weight. |
| **Information Density** | Footer links organized functionally; high density within groups, wider gutter between groups. No empty decorative space. |
| **Slop-Free** | ✅ No purple/indigo gradients<br>✅ No generic bento grids<br>✅ No floating rounded icon boxes<br>✅ Max 1 functional accent above neutral<br>✅ Max 2 fonts + mono<br>✅ Product-first hierarchy<br>✅ Do More, Less Explain alignment<br>✅ No AI marketing buzzwords in visuals |
| **Navbar/Footer Consistency** | ✅ Footer nav groups match primary navigation concepts (BUILD, SOLUTIONS, WITH US)<br>✅ Primary CTA "Let's build together" consistent throughout<br>✅ No contact/about/services links in primary navbar (per PRD 05 constraints) |