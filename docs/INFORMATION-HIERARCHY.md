# Design Global Information Hierarchy

## Overview

This document defines the site-wide information hierarchy for Faizen Studio, translating the brand statement **BUILD · SOLUTIONS · WITH US** and the primary CTA **Let's build together** into a consistent structure that reinforces the intent-driven visitor journey: *"Can I get this?"* → *"Can you build with me?"*

---

## Primary Navigation

**BUILD · SOLUTIONS · WITH US**

The primary navbar is intentionally minimal and contains exactly three concepts:

| Nav Item | Meaning |
|----------|---------|
| **BUILD** | What Faizen has built: client projects, internal projects, experiments |
| **SOLUTIONS** | Products and solutions people can use |
| **WITH US** | Who Faizen is and how people can work or partner with Faizen (broader than a conventional About page) |

> **Constraint:** Contact, About, Services, Articles, Partnership, and Pricing must NOT appear as primary navbar items.

---

## Primary CTA

**Let's build together →**

- Placement: prominent position adjacent to or beneath the primary navigation
- Purpose: the single primary action path for visitors who want to start a custom build partnership
- Reinforces the "Partnership Over Transaction" principle from PRD 03

---

## Footer Navigation

The footer contains four groups of links, organized by purpose:

### Explore

- Build
- Solutions
- Articles
- About / With Us

### Build With Us

- Custom Software
- Services
- Partnership

### Connect

- (Contact form / email / relevant connect pathways)

### Legal

- Privacy
- Terms

---

## Intent-Driven Navigation

The entire hierarchy is structured around two visitor intents:

| Intent | Question | Path |
|--------|----------|------|
| **Can I get this?** | *Do I want an existing solution?* | Navigate → **SOLUTIONS** → Browse products/projects |
| **Can you build with me?** | *Do I want to co-create a custom solution?* | Navigate → **WITH US** → Learn about partnership |

The primary CTA **"Let's build together"** is the actionable expression of the second intent.

---

## Hierarchy Priority

Per the "One Primary Understanding Per Screen" principle from DESIGN-DIRECTION.md:

1. **What can I build/use here?** — Product/solution showcase (SOLUTIONS page)
2. **How do I get started?** — Primary CTA: Let's build together (WITH US + CTA)
3. **What else is relevant?** — Secondary navigation de-emphasized through hierarchy

---

## Anti-Slop Verification

| Check | Status |
|-------|--------|
| **Color Palette** | Neutral zinc/slate/stone base + 1 functional accent (emerald). No purple/indigo radial gradients. |
| **Typography** | Max 2 fonts: display (`Geist Display` / `Cabinet Grotesk`) + body (`Plus Jakarta Sans` / `Satoshi`). No italic headers. |
| **Information Density** | High density preferred over whitespace raksa. No empty bento grids or floating rounded icon boxes. |
| **Slop-Free** | ✅ No purple/indigo gradients<br>✅ No generic bento grids<br>✅ No floating rounded icon boxes<br>✅ Max 1 functional accent above neutral<br>✅ Max 2 fonts + mono<br>✅ Product-first hierarchy<br>✅ Do More, Less Explain alignment<br>✅ No AI marketing buzzwords in visuals |

---

## Definition of Done

- [ ] Hierarchy is documented in `docs/INFORMATION-HIERARCHY.md`
- [ ] Primary navbar contains exactly: BUILD · SOLUTIONS · WITH US
- [ ] Primary CTA is "Let's build together"
- [ ] Footer includes the required groups (Explore, Build With Us, Connect, Legal)
- [ ] No extra primary navigation category is introduced
- [ ] Intent-driven navigation (Can I get this? / Can you build with me?) is clearly defined
- [ ] Anti-slop compliance verified (no purple gradients, no bento grids, max 1 accent, max 2 fonts)