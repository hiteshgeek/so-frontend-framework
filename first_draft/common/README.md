# SixOrbit Common Design System

A comprehensive Material UI and Google-inspired design system for building consistent, beautiful plugins for SixOrbit ERP.

## Quick Start

### 1. Include the Common CSS

Add this to your plugin's HTML file:

```html
<!-- Common Styles -->
<link rel="stylesheet" href="../common/sixorbit-common.css">

<!-- Optional: Google Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
```

### 2. Use the Components

All classes are prefixed with `so-` (SixOrbit) to avoid conflicts:

```html
<div class="so-card">
    <div class="so-card-header">
        <h2 class="so-heading-2">My Plugin</h2>
    </div>
    <div class="so-card-body">
        <button class="so-btn so-btn-primary">Click Me</button>
    </div>
</div>
```

## Design Tokens (CSS Variables)

All design tokens are available as CSS variables for consistency:

### Colors

```css
/* Primary Colors */
--so-primary: #1a73e8;
--so-primary-dark: #1765cc;
--so-primary-light: #e8f0fe;

/* Secondary Colors */
--so-secondary-green: #34a853;
--so-secondary-yellow: #fbbc04;
--so-secondary-red: #ea4335;
--so-secondary-orange: #f9ab00;

/* Status Colors */
--so-success: #34a853;
--so-warning: #f9ab00;
--so-error: #ea4335;
--so-info: #1a73e8;

/* Greyscale */
--so-grey-50 through --so-grey-900
--so-white: #ffffff;
--so-black: #000000;
```

### Spacing

```css
--so-space-xs: 4px;
--so-space-sm: 8px;
--so-space-md: 12px;
--so-space-lg: 16px;
--so-space-xl: 20px;
--so-space-2xl: 24px;
--so-space-3xl: 32px;
--so-space-4xl: 48px;
```

### Typography

```css
/* Font Families */
--so-font-family: 'Roboto', sans-serif;
--so-font-family-display: 'Google Sans', 'Roboto', sans-serif;
--so-font-family-mono: 'Roboto Mono', 'Courier New', monospace;

/* Font Sizes */
--so-text-xs: 10px;
--so-text-sm: 11px;
--so-text-base: 13px;
--so-text-md: 14px;
--so-text-lg: 16px;
--so-text-xl: 18px;
--so-text-2xl: 20px;
--so-text-3xl: 24px;
--so-text-4xl: 28px;

/* Font Weights */
--so-weight-normal: 400;
--so-weight-medium: 500;
--so-weight-semibold: 600;
--so-weight-bold: 700;
```

### Shadows

```css
--so-shadow-1: /* Light shadow */
--so-shadow-2: /* Medium shadow */
--so-shadow-3: /* Heavy shadow */
--so-shadow-4: /* Extra heavy shadow */
--so-shadow-hover: /* Hover effect shadow */
```

### Border Radius

```css
--so-radius-sm: 4px;
--so-radius-md: 8px;
--so-radius-lg: 12px;
--so-radius-xl: 16px;
--so-radius-round: 50%;
```

## Components

### Cards

```html
<!-- Basic Card -->
<div class="so-card">
    <div class="so-card-header">
        <h3>Card Title</h3>
    </div>
    <div class="so-card-body">
        Card content goes here
    </div>
    <div class="so-card-footer">
        Footer content
    </div>
</div>

<!-- Elevated Card -->
<div class="so-card so-card-elevated">
    Content with more shadow
</div>
```

### Buttons

```html
<!-- Button Variants -->
<button class="so-btn so-btn-primary">Primary</button>
<button class="so-btn so-btn-secondary">Secondary</button>
<button class="so-btn so-btn-success">Success</button>
<button class="so-btn so-btn-danger">Danger</button>
<button class="so-btn so-btn-outline">Outline</button>
<button class="so-btn so-btn-text">Text</button>

<!-- Button Sizes -->
<button class="so-btn so-btn-primary so-btn-sm">Small</button>
<button class="so-btn so-btn-primary">Default</button>
<button class="so-btn so-btn-primary so-btn-lg">Large</button>

<!-- Disabled -->
<button class="so-btn so-btn-primary" disabled>Disabled</button>
```

### Form Controls

```html
<!-- Input -->
<div class="so-form-group">
    <label class="so-label">Email</label>
    <input type="email" class="so-input" placeholder="Enter email">
    <span class="so-help-text">We'll never share your email.</span>
</div>

<!-- Input with Error -->
<div class="so-form-group">
    <label class="so-label">Username</label>
    <input type="text" class="so-input so-input-error" value="ab">
    <span class="so-error-text">Username must be at least 3 characters.</span>
</div>

<!-- Select -->
<div class="so-form-group">
    <label class="so-label">Choose option</label>
    <select class="so-select">
        <option>Option 1</option>
        <option>Option 2</option>
    </select>
</div>

<!-- Search Input -->
<div class="so-search-wrapper">
    <span class="material-icons so-search-icon">search</span>
    <input type="text" class="so-input so-search-input" placeholder="Search...">
</div>
```

### Badges

```html
<span class="so-badge so-badge-primary">Primary</span>
<span class="so-badge so-badge-success">Success</span>
<span class="so-badge so-badge-warning">Warning</span>
<span class="so-badge so-badge-error">Error</span>
<span class="so-badge so-badge-grey">Grey</span>
```

### Tables

```html
<div class="so-table-wrapper">
    <table class="so-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>john@example.com</td>
                <td><span class="so-badge so-badge-success">Active</span></td>
            </tr>
        </tbody>
    </table>
</div>
```

### Avatars

```html
<!-- Text Avatar -->
<div class="so-avatar so-avatar-md">JD</div>

<!-- Image Avatar -->
<div class="so-avatar so-avatar-lg">
    <img src="avatar.jpg" alt="User">
</div>

<!-- Sizes -->
<div class="so-avatar so-avatar-sm">SM</div>
<div class="so-avatar so-avatar-md">MD</div>
<div class="so-avatar so-avatar-lg">LG</div>
```

### Loading States

```html
<!-- Spinner -->
<div class="so-loading">
    <div class="so-spinner"></div>
</div>

<!-- Spinner Sizes -->
<div class="so-spinner so-spinner-sm"></div>
<div class="so-spinner"></div>
<div class="so-spinner so-spinner-lg"></div>
```

### Empty States

```html
<div class="so-empty">
    <span class="material-icons so-empty-icon">inbox</span>
    <div class="so-empty-title">No items found</div>
    <div class="so-empty-description">Try adjusting your filters</div>
</div>
```

### Stats/Metrics

```html
<div class="so-stats">
    <div class="so-stat">
        <div class="so-stat-icon blue">
            <span class="material-icons">people</span>
        </div>
        <div class="so-stat-content">
            <div class="so-stat-label">Total Users</div>
            <div class="so-stat-value">1,234</div>
        </div>
    </div>

    <div class="so-stat">
        <div class="so-stat-icon green">
            <span class="material-icons">trending_up</span>
        </div>
        <div class="so-stat-content">
            <div class="so-stat-label">Revenue</div>
            <div class="so-stat-value">$45.2K</div>
        </div>
    </div>
</div>
```

## Typography

```html
<h1 class="so-heading-1">Heading 1</h1>
<h2 class="so-heading-2">Heading 2</h2>
<h3 class="so-heading-3">Heading 3</h3>

<p class="so-text-muted">Muted text</p>
<p class="so-text-primary">Primary text</p>
<p class="so-text-success">Success text</p>
<p class="so-text-error">Error text</p>
<p class="so-text-warning">Warning text</p>
```

## Layout Utilities

```html
<!-- Flexbox -->
<div class="so-flex so-items-center so-justify-between so-gap-lg">
    <div>Item 1</div>
    <div>Item 2</div>
</div>

<div class="so-flex-col so-gap-md">
    <div>Stacked Item 1</div>
    <div>Stacked Item 2</div>
</div>
```

## Responsive Utilities

Hide elements at different breakpoints:

```html
<div class="so-hide-lg">Hidden on large screens (< 1024px)</div>
<div class="so-hide-md">Hidden on medium screens (< 768px)</div>
<div class="so-hide-sm">Hidden on small screens (< 480px)</div>
```

## Creating Plugin-Specific Styles

1. Create your plugin-specific CSS file (e.g., `my-plugin.css`)
2. Import common styles OR use CSS variables
3. Add plugin-specific classes with your own prefix

Example `my-plugin.css`:

```css
/* Use common design tokens */
.my-plugin-container {
    background: var(--so-grey-50);
    padding: var(--so-space-xl);
    border-radius: var(--so-radius-md);
}

.my-plugin-header {
    color: var(--so-primary);
    font-size: var(--so-text-2xl);
    font-weight: var(--so-weight-medium);
    margin-bottom: var(--so-space-lg);
}

.my-plugin-card {
    /* Extend common card with plugin-specific styles */
    box-shadow: var(--so-shadow-2);
    /* ... add your custom styles */
}
```

## Best Practices

1. **Always use CSS variables** for colors, spacing, and other design tokens
2. **Prefix your plugin classes** to avoid conflicts (e.g., `mp-` for "my-plugin")
3. **Use common components** wherever possible before creating custom styles
4. **Follow Material Design principles** for consistency
5. **Test responsive behavior** at different screen sizes
6. **Use semantic HTML** with appropriate ARIA labels

## Examples

See the following plugins for real-world usage:

- **Report List Plugin**: `/report_list/`
- **Cash Flow Dashboard**: `/cash_flow_summary/`
- **Multi Employee Attendance**: `/multi_employee_attendance_viewer/`

## Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Contributing

When adding new common components:

1. Follow the existing naming convention (`so-` prefix)
2. Use CSS variables for all values
3. Include hover and focus states
4. Test responsive behavior
5. Update this documentation

## Questions?

Contact the SixOrbit development team for support.
