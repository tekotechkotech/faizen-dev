# Accessibility Interaction States

## TASK-021: Define accessibility interaction states

## Goal

Specify focus, keyboard, reduced-motion, form-error, and non-color-dependent states. Accessibility is a design requirement, not a later patch — documented from the outset per PRD 14 and DESIGN-DIRECTION.md.

## Focus States

### Visible Focus

- **`:focus-visible`** outline applies using the functional accent color **emerald** at minimum 3:2 contrast ratio
- Focus outline never removed entirely (`outline: none` without replacement is prohibited)
- Focus state applies to all interactive elements: links, buttons, form fields, navigation items
- Minimum 3 pixels of outline or equivalent visual distinction
- Focus order follows DOM order; logical navigation sequence

### Focus-visible vs Focus

- **`:focus`** may style keyboard focus, but **`:focus-visible`** must be the primary mechanism for keyboard-indicated focus
- `:focus` styles may apply on mouse interaction, but `:focus-visible` appears only when keyboard navigation is used
- Both states must have sufficient contrast; emerald at `--color-neutral-5` minimum contrast against neutral background

### Anti-Slop Compliance (Focus)

| Check | Status |
|-------|--------|
| **Color Palette** | Emerald focus-visible outline on neutral zinc/slate/stone background; no purple/indigo/random gradients |
| **Typography** | N/A — focus is visual outline, not typographic |
| **Information Density** | Focus indicator is minimal and functional; does not clutter the UI |
| **Slop-Free** | ✅ Emerald outline at 3:2+ contrast<br>✅ Not removed entirely<br>✅ Applies to all interactive elements |

## Keyboard Navigation

### Tab Order

- All interactive elements reachable via `Tab` key
- `tabindex` used appropriately: `0` (natural order), `1` (add to end), avoided for non-interative elements
- `Shift+Tab` reverses tab order
- `Skip to main content` link at top of page for keyboard users

### Keyboard Interactions

- **Escape**: Close modals, dropdowns, popovers; return focus to triggering element
- **Arrow keys**: Navigate between items in lists, menus, carousels
- **Enter/Space**: Activate buttons, follow links, select options
- **`Ctrl+F` / `Cmd+F`**: Find functionality within page
- **`Ctrl+Home`/`Cmd+Home`**: Focus top of page; **`Ctrl+End`/`Cmd+End`**: Focus bottom of page

### Skip Navigation

- Persistent "Skip to main content" link as first focusable element
- Hidden visually when not focused; revealed on `:focus-visible` with emerald outline
- Links to main content section or primary navigation

### Anti-Slop Compliance (Keyboard)

| Check | Status |
|-------|--------|
| **Color Palette** | Skip link hidden by default; emerald focus-visible outline when active |
| **Typography** | Link text uses body font (Plus Jakarta Sans/Satoshi); readable size minimum 16px equivalent |
| **Information Density** | Skip link is single line; minimal impact on visual layout |
| **Slop-Free** | ✅ Focus-visible reveals skip link<br>✅ Logical tab order<br>✅ Escape closes modals |

## Form Error Presentation

### Form Error States

- **Inline error messages** associated with specific form fields
- **Error summary** at top of form listing all errors with focus links to respective fields
- Error text uses **`--color-neutral-5`** (darkest body text) on **`--color-neutral-2`** (light input background) — minimum 4.5:1 contrast
- Error messages are descriptive: explain *what* is wrong and *how* to fix it
- Avoid: "Invalid input"; prefer: "Phone number must be 10 digits including country code"

### Validation Timing

- **On submit**: Errors displayed after form submit attempt; focus returns to first error
- **On blur**: Errors validated on field blur; may be abrasive, use cautiously
- **On input**: Real-time validation as user types; may cause excessive interruptions, use with `aria-live="polite"` announcements

### Form Error Announcements

- **`aria-describedby`** links error message to relevant field
- **`aria-invalid="true"`** on erroneous fields
- **`aria-error`** points to error message container
- Live region announcements for screen readers: error count and first error description

### Non-Color-Dependent Error Status

- Error status conveyed via **text**, **icon**, and ** ARIA**, NOT color alone
- Error border uses `--color-neutral-4` (medium dark gray) — distinguishable from focus emerald and neutral states
- Error icon has `aria-hidden="true"` with accompanying text; or use `badge` with descriptive text
- Hover/focus states on error fields also convey status through style change, not red alone

### Anti-Slop Compliance (Form Errors)

| Check | Status |
|-------|--------|
| **Color Palette** | Error border: `--color-neutral-4`; NOT red alone. Success: `--color-emerald-500` when appropriate. All other text in neutral palette. |
| **Typography** | Error message body font; sentence case; descriptive text. No ALL CAPS unless acronym. |
| **Information Density** | Error summary at top of form; inline errors compact but readable. |
| **Slop-Free** | ✅ Error not conveyed by color alone<br>✅ Descriptive text<br>✅ ARIA annotations<br>✅ Focus-visible on error fields |

## Reduced-Motion Behavior

### Respect User Preferences

- Respect the `prefers-reduced-motion` media query
- Disable or simplify animations, transitions, and microinteractions when reduced-motion is preferred
- **Transitions**: reduce duration or remove non-essential motion; essential transitions (e.g., accordion open/close) may remain but at reduced speed
- **Parallax, hover effects, floating animations**: disabled entirely when `prefers-reduced-motion: reduce` is active
- **Spinners/loaders**: static alternatives when reduced-motion is preferred; no spinning animation

### Implementation Pattern

```css
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
  }
}
```

### Anti-Slop Compliance (Reduced-Motion)

| Check | Status |
|-------|--------|
| **Color Palette** | N/A — motion reduction is independent of color |
| **Typography** | Text remains fully readable regardless of motion settings |
| **Information Density** | Content layout unchanged; only animation duration/quality affected |
| **Slop-Free** | ✅ `prefers-reduced-motion` respected<br>✅ No infinite spinning loaders<br>✅ Essential transitions retained at reduced speed |

## Non-Color-Dependent Status Presentation

### Principle

**Information must not rely on color alone** — per PRD 14 and WCAG guidance. All status communication uses multiple sensory channels.

### Status Types and Non-Color Indicators

| Status | Color Indicator | Non-Color Indicator |
|--------|----------------|---------------------|
| **Primary CTA** | Emerald background | Bold text + button shape + positioning |
| **Link Text** | Emerald color | Underline on hover/focus; descriptive link text |
| **Error State** | Neutral-4 border | Text description + icon + `aria-invalid` |
| **Success State** | Emerald tint/shade | Checkmark icon + text confirmation |
| **Loading State** | Spinner or skeleton | Text: "Saving..." or "Loading..." + disabled state |
| **Disabled State** | Neutral-3 background | Cursor: `not-appearant`; text: disabled label; `aria-disabled="true"` |

### Focus-visible Outline (Reiteration)

- **`:focus-visible`** outlines use **emerald** at minimum 3:2 contrast against background
- Outline never removed with `outline: none` without providing visible alternative
- Focus-visible is the single mechanism distinguishing keyboard vs mouse focus

### Anti-Slop Compliance (Non-Color Status)

| Check | Status |
|-------|--------|
| **Color Palette** | Max 1 functional accent (emerald); all other status in neutral zinc/scale/stone. No rainbow/gradient status indicators. |
| **Typography** | Descriptive text always present; never rely on color to convey meaning. |
| **Information Density** | Status indicators are compact but comprehensive — text + icon + color each contribute. |
| **Slop-Free** | ✅ No purple/indigo gradients<br>✅ Max 1 functional accent<br>✅ Text always supplements color<br>✅ Underlines on links (not purely color-dependent) |

## Definition of Done

- [ ] Visible focus states designed and documented for all interactive elements
- [ ] Keyboard navigation behavior specified: tab order, skip links, modal management
- [ ] Form error presentation designed: inline errors, error summary, non-color-dependent status
- [ ] Reduced-motion behavior documented: `prefers-reduced-motion` respect, alternative static loaders
- [ ] Non-color-dependent status presentation verified: text + icon + color each convey status independently
- [ ] Acceptance criteria verified: interactive states understandable without color alone; keyboard users have visible focus
- [ ] Anti-slop compliance confirmed per DESIGN-DIRECTION.md checklist
- [ ] Documentation states are ready for implementation (not left as "later patch")