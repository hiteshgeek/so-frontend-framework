# Bundle Options

SixOrbit UI provides two JavaScript bundles and two CSS bundles to match different project needs.

---

## Bundle Comparison

| Feature | Core | Full |
|---------|:----:|:----:|
| **File Size** | ~50KB | ~120KB |
| **Use Case** | Lightweight pages | Full-featured apps |
| Theme Switching | ✓ | ✓ |
| Dropdowns | ✓ | ✓ |
| Modals | ✓ | ✓ |
| Ripple Effects | ✓ | ✓ |
| Context Menus | ✓ | ✓ |
| Forms | ✓ | ✓ |
| Chip Inputs | ✓ | ✓ |
| Tabs | ✗ | ✓ |
| Tooltips | ✗ | ✓ |
| OTP Inputs | ✗ | ✓ |
| Progress Buttons | ✗ | ✓ |
| Button Groups | ✗ | ✓ |
| Alerts | ✗ | ✓ |
| Toasts | ✗ | ✓ |
| Custom Selects | ✗ | ✓ |
| Enhanced Tables | ✗ | ✓ |
| Pagination | ✗ | ✓ |
| Auth Features | ✗ | ✓ |

---

## sixorbit-core

**Minimal bundle for lightweight pages.**

### Included Components

```
├── SixOrbit          # Core utilities & configuration
├── SOComponent       # Base component class
├── SOTheme           # Theme switching (light/dark)
├── SODropdown        # Dropdown menus
├── SONavbar          # Navbar interactions
├── SOModal           # Modal dialogs
├── SORipple          # Material ripple effect
├── SOContextMenu     # Right-click context menus
├── SOForms           # Form utilities & validation
└── SOChips           # Chip/tag input fields
```

### When to Use

- Landing pages
- Login/registration pages
- Simple forms
- Pages that don't need advanced components

### Usage

```html
<!-- CSS -->
<link rel="stylesheet" href="dist/css/sixorbit-base.css">

<!-- JS -->
<script src="dist/js/sixorbit-core.js"></script>
```

---

## sixorbit-full

**Complete bundle with all components.**

### Included Components

Everything in Core, plus:

```
├── SOOtpInput        # OTP/verification code inputs
├── SOTabs            # Tab navigation
├── SOTooltip         # Hover tooltips
├── SOProgressButton  # Buttons with loading states
├── SOButtonGroup     # Button group interactions
├── SOAlert           # Dismissible alert messages
├── SOToast           # Toast notifications
├── SOSelect          # Custom select dropdowns
├── SOTable           # Enhanced data tables
├── SOPagination      # Pagination controls
├── SOAuth            # Authentication features
└── SOFeatureCarousel # Feature showcase carousels
```

### When to Use

- Dashboard pages
- Admin panels
- Data-heavy applications
- Pages requiring multiple interactive components

### Usage

```html
<!-- CSS -->
<link rel="stylesheet" href="dist/css/sixorbit-full.css">

<!-- JS -->
<script src="dist/js/sixorbit-full.js"></script>
```

---

## CSS Bundle Differences

### sixorbit-base.css

Contains styles for:
- CSS reset & base typography
- CSS custom properties (variables)
- Grid system & layout utilities
- Core component styles (buttons, cards, forms)
- Spacing, color, and display utilities

### sixorbit-full.css

Everything in Base, plus:
- Tab styles
- Tooltip styles
- Toast notification styles
- Alert styles
- Enhanced table styles
- Pagination styles
- OTP input styles
- Progress button styles

---

## Page-Specific Files

In addition to framework bundles, the build system generates page-specific files:

### global.css / global.js

Located at: `dist/pages/global/`

Contains:
- **Sidebar** - Collapsible navigation sidebar
- **Navbar** - Top navigation bar styles
- **Search Overlay** - Global search functionality

These are separated because they are application-specific layout components, not reusable UI components.

```html
<!-- Include after framework files -->
<link rel="stylesheet" href="dist/pages/global/global.css">
<script src="dist/pages/global/global.js"></script>
```

---

## Choosing the Right Bundle

```
                    ┌─────────────────┐
                    │  Need advanced  │
                    │   components?   │
                    └────────┬────────┘
                             │
              ┌──────────────┴──────────────┐
              │                             │
              ▼                             ▼
        ┌─────────┐                   ┌─────────┐
        │   No    │                   │   Yes   │
        └────┬────┘                   └────┬────┘
             │                              │
             ▼                              ▼
    ┌────────────────┐            ┌────────────────┐
    │ sixorbit-core  │            │ sixorbit-full  │
    │ sixorbit-base  │            │ sixorbit-full  │
    └────────────────┘            └────────────────┘
```

### Decision Checklist

Use **Core** if:
- [ ] Page only needs basic components
- [ ] Performance is critical
- [ ] Bundle size matters (mobile, slow connections)
- [ ] No tabs, tooltips, toasts, or tables needed

Use **Full** if:
- [ ] Building a dashboard or admin panel
- [ ] Need interactive tables with sorting/filtering
- [ ] Require toast notifications
- [ ] Using tabs, tooltips, or advanced inputs
