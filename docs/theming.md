# Theming & Customization

This guide explains how to customize the SixOrbit UI Framework's appearance through CSS custom properties, SCSS variables, and theme configuration.

---

## Theme System Overview

SixOrbit UI uses a layered theming approach:

1. **SCSS Variables** - Design tokens (colors, spacing, typography)
2. **CSS Custom Properties** - Runtime theme switching (light/dark)
3. **Theme Maps** - Predefined light and dark color schemes

```
SCSS Variables → Theme Maps → CSS Custom Properties → Components
      ↓               ↓                  ↓
 Build time      Build time        Runtime
```

---

## Quick Start: Theme Switching

### Enable Dark Mode

Set the `data-theme` attribute on the `html` element:

```javascript
// Switch to dark mode
document.documentElement.setAttribute('data-theme', 'dark');

// Switch to light mode
document.documentElement.setAttribute('data-theme', 'light');

// Use system preference
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
document.documentElement.setAttribute('data-theme', prefersDark ? 'dark' : 'light');
```

### Using SOTheme Component

```javascript
const theme = SOTheme.getInstance('.so-navbar-theme');

theme.setTheme('dark');      // Set to dark
theme.setTheme('light');     // Set to light
theme.setTheme('system');    // Follow system preference
theme.toggleDarkMode();      // Toggle light/dark
```

---

## CSS Custom Properties

All theme colors are exposed as CSS custom properties with the `--so-` prefix.

### Using CSS Variables

```css
/* In your CSS */
.my-component {
  background: var(--so-card-bg);
  color: var(--so-text-primary);
  border: 1px solid var(--so-border-color);
}

.my-button {
  background: var(--so-accent-primary);
  color: #ffffff;
}

.my-button:hover {
  background: var(--so-accent-primary-hover);
}
```

### Available CSS Variables

#### Background Colors

| Variable | Light Mode | Dark Mode |
|----------|------------|-----------|
| `--so-page-bg` | `#f5f5f5` | `#25293c` |
| `--so-card-bg` | `#ffffff` | `#2f3349` |
| `--so-card-hover-bg` | `#f1f3f4` | `#3b4056` |

#### Text Colors

| Variable | Light Mode | Dark Mode |
|----------|------------|-----------|
| `--so-text-primary` | `#202124` | `#d0d4e4` |
| `--so-text-heading` | `#202124` | `#e7e9f0` |
| `--so-text-secondary` | `#5f6368` | `#a3a8b8` |
| `--so-text-muted` | `#9aa0a6` | `#6c7293` |
| `--so-text-disabled` | `#bdc1c6` | `#4a5068` |

#### Border Colors

| Variable | Light Mode | Dark Mode |
|----------|------------|-----------|
| `--so-border-color` | `#e8eaed` | `#3b4056` |
| `--so-card-border` | `rgba(0,0,0,0.05)` | `rgba(255,255,255,0.05)` |
| `--so-border-light` | `rgba(0,0,0,0.03)` | `rgba(255,255,255,0.03)` |
| `--so-border-dark` | `#dadce0` | `#474d64` |

#### Accent Colors

| Variable | Description |
|----------|-------------|
| `--so-accent-primary` | Primary brand color |
| `--so-accent-primary-hover` | Primary hover state |
| `--so-accent-primary-light` | Light primary background |
| `--so-accent-success` | Success state |
| `--so-accent-danger` | Error/danger state |
| `--so-accent-warning` | Warning state |
| `--so-accent-info` | Info state |

Each accent color also has `-hover` and `-light` variants.

#### Form Elements

| Variable | Description |
|----------|-------------|
| `--so-form-bg` | Input background |
| `--so-form-border` | Input border |
| `--so-form-border-hover` | Input border on hover |
| `--so-form-border-focus` | Input border on focus |
| `--so-form-text` | Input text color |
| `--so-form-placeholder` | Placeholder text |
| `--so-form-disabled-bg` | Disabled input background |
| `--so-form-disabled-text` | Disabled input text |

#### Shadows

| Variable | Description |
|----------|-------------|
| `--so-shadow` | Default shadow |
| `--so-shadow-lg` | Large shadow |
| `--so-shadow-xl` | Extra large shadow |

---

## SCSS Customization

### Overriding Variables

Override default variables **before** importing the framework:

```scss
// _custom-variables.scss
$so-primary: #7367f0;           // Custom primary color
$so-primary-hover: #6054e6;
$so-success: #28c76f;
$so-danger: #ea5455;

$so-font-family: 'Inter', sans-serif;
$so-navbar-height: 64px;
$so-sidebar-width: 280px;

// Then import the framework
@use 'sixorbit-full' with (
  $so-primary: #7367f0,
  $so-primary-hover: #6054e6
);
```

### Variable Reference

#### Colors

```scss
// Primary colors
$so-primary: #1a73e8;
$so-primary-hover: #1557b0;
$so-primary-light: #e8f0fe;

// Semantic colors
$so-success: #34a853;
$so-danger: #ea4335;
$so-warning: #f9ab00;
$so-info: #17a2b8;
$so-secondary: #6c757d;

// Grayscale
$so-grey-50: #f8f9fa;
$so-grey-100: #f1f3f4;
$so-grey-200: #e8eaed;
$so-grey-300: #dadce0;
$so-grey-400: #bdc1c6;
$so-grey-500: #9aa0a6;
$so-grey-600: #80868b;
$so-grey-700: #5f6368;
$so-grey-800: #3c4043;
$so-grey-900: #202124;
```

#### Typography

```scss
$so-font-family: 'Google Sans', 'Roboto', sans-serif;
$so-font-family-mono: 'Roboto Mono', monospace;

// Font sizes (use font-size() function)
$so-font-sizes: (
  'xs': 0.6875rem,    // 11px
  'sm': 0.8125rem,    // 13px
  'base': 0.875rem,   // 14px
  'md': 0.9375rem,    // 15px
  'lg': 1rem,         // 16px
  'xl': 1.125rem,     // 18px
  '2xl': 1.25rem,     // 20px
);

// Font weights (use font-weight() function)
$so-font-weights: (
  'light': 300,
  'regular': 400,
  'medium': 500,
  'semibold': 600,
  'bold': 700,
);
```

#### Spacing

```scss
$so-spacing-unit: 4px;

// Use spacing() function
$so-spacings: (
  '0': 0,
  '1': 4px,
  '2': 8px,
  '3': 12px,
  '4': 16px,
  '5': 20px,
  '6': 24px,
  '8': 32px,
  '10': 40px,
  '12': 48px,
);
```

#### Border Radius

```scss
// Use radius() function
$so-radii: (
  'none': 0,
  'sm': 3px,
  'base': 4px,
  'md': 6px,
  'lg': 8px,
  'xl': 10px,
  '2xl': 12px,
  'full': 9999px,
);
```

#### Layout Dimensions

```scss
$so-navbar-height: 56px;
$so-navbar-height-mobile: 50px;
$so-sidebar-width: 260px;
$so-sidebar-collapsed-width: 56px;
$so-mobile-bottom-bar-height: 60px;
```

---

## Creating Custom Themes

### Modifying Theme Maps

Edit the theme maps in `src/scss/abstracts/_themes.scss`:

```scss
// Override the light theme
$so-theme-light: (
  'page-bg': #f0f4f8,
  'card-bg': #ffffff,
  'accent-primary': #7367f0,
  'accent-primary-hover': #6054e6,
  // ... other overrides
) !default;

// Override the dark theme
$so-theme-dark: (
  'page-bg': #1e1e2d,
  'card-bg': #2b2b40,
  'accent-primary': #7367f0,
  // ... other overrides
) !default;
```

### Adding Custom Themes

Create additional theme variants:

```scss
// Custom "Ocean" theme
$so-theme-ocean: (
  'page-bg': #e3f2fd,
  'card-bg': #ffffff,
  'accent-primary': #0277bd,
  'accent-primary-hover': #01579b,
  'accent-success': #00897b,
  // ... complete map
);

// Apply via attribute
[data-theme='ocean'] {
  @include generate-theme-vars($so-theme-ocean);
}
```

Then switch programmatically:

```javascript
document.documentElement.setAttribute('data-theme', 'ocean');
```

---

## Feature Toggles

Control framework features via configuration variables:

```scss
// In _config.scss or before importing

$so-enable-dark-mode: true;        // Enable dark mode support
$so-enable-sidebar-dark-mode: true; // Enable dark sidebar on light page
$so-enable-font-scaling: true;      // Enable font size scaling
$so-enable-rtl: false;              // Enable right-to-left support
$so-enable-responsive: true;        // Enable responsive breakpoints
$so-enable-ripple-effect: true;     // Enable Material ripple effect
```

---

## Font Size Scaling

Enable compact or large font modes:

```html
<!-- Compact mode -->
<html data-fontsize="small">

<!-- Default mode -->
<html data-fontsize="default">

<!-- Large/accessibility mode -->
<html data-fontsize="large">
```

### Size Comparison

| Variable | Small | Default | Large |
|----------|-------|---------|-------|
| `--so-text-xs` | 9px | 11px | 12px |
| `--so-text-sm` | 11px | 13px | 14px |
| `--so-text-base` | 12px | 14px | 15px |
| `--so-text-lg` | 14px | 16px | 18px |

---

## SCSS Helper Functions

### Usage in Your Styles

```scss
@use '../abstracts' as *;

.my-component {
  // Spacing
  padding: spacing('4');          // 16px
  margin-bottom: spacing('2');    // 8px
  gap: spacing('3');              // 12px

  // Typography
  font-size: font-size('lg');     // 16px
  font-weight: font-weight('medium'); // 500
  line-height: line-height('normal'); // 1.4

  // Border radius
  border-radius: radius('lg');    // 8px

  // CSS variables
  background: css-var('card-bg');
  color: css-var('text-primary');
  border: 1px solid css-var('border-color');

  // Color functions
  &:hover {
    background: color-hover($so-primary);
  }
}
```

### Available Functions

| Function | Description | Example |
|----------|-------------|---------|
| `spacing($key)` | Get spacing value | `spacing('4')` → `16px` |
| `font-size($key)` | Get font size | `font-size('lg')` → `1rem` |
| `font-weight($key)` | Get font weight | `font-weight('medium')` → `500` |
| `radius($key)` | Get border radius | `radius('lg')` → `8px` |
| `z-index($key)` | Get z-index | `z-index('modal')` → `1050` |
| `css-var($name)` | Reference CSS variable | `css-var('card-bg')` |
| `alpha($color, $opacity)` | Add transparency | `alpha($so-primary, 0.1)` |
| `color-hover($color)` | Get hover color | `color-hover($so-primary)` |
| `contrast-color($bg)` | Get contrast text | `contrast-color($so-primary)` |

---

## Responsive Mixins

```scss
@use '../abstracts' as *;

.my-component {
  padding: spacing('4');

  // Mobile styles (< 768px)
  @include mobile {
    padding: spacing('3');
  }

  // Tablet styles (768px - 1024px)
  @include tablet {
    padding: spacing('3');
  }

  // Desktop styles (>= 1024px)
  @include desktop {
    padding: spacing('5');
  }

  // Custom breakpoints
  @include media-up('lg') {
    // 1024px and up
  }

  @include media-down('md') {
    // Below 768px
  }
}
```

---

## Dark Mode Mixin

Apply dark-mode-specific styles:

```scss
.my-card {
  background: css-var('card-bg');
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);

  @include dark-mode {
    // Styles only in dark mode
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    border: 1px solid css-var('border-color');
  }
}
```

---

## Best Practices

### 1. Use CSS Variables for Colors

```scss
// Good - responds to theme changes
.component {
  color: css-var('text-primary');
  background: css-var('card-bg');
}

// Avoid - won't respond to theme
.component {
  color: #202124;
  background: white;
}
```

### 2. Use Spacing Functions

```scss
// Good - consistent spacing
.component {
  padding: spacing('4');
  margin: spacing('2') 0;
}

// Avoid - inconsistent magic numbers
.component {
  padding: 15px;
  margin: 7px 0;
}
```

### 3. Respect System Preference

```javascript
// Check and apply system preference on load
const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
const savedTheme = localStorage.getItem('theme') || 'system';

if (savedTheme === 'system') {
  document.documentElement.setAttribute('data-theme', prefersDark ? 'dark' : 'light');
} else {
  document.documentElement.setAttribute('data-theme', savedTheme);
}

// Listen for system changes
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
  if (localStorage.getItem('theme') === 'system') {
    document.documentElement.setAttribute('data-theme', e.matches ? 'dark' : 'light');
  }
});
```

### 4. Provide Semantic Color Names

```scss
// Good - semantic naming
--so-text-primary
--so-accent-danger
--so-card-bg

// Avoid - value-based naming
--so-dark-gray
--so-red
--so-white
```
