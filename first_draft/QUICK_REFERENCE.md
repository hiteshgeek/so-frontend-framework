# SixOrbit Plugin Development - Quick Reference

## 🚀 Start Here

| What | Where |
|------|-------|
| **View all plugins** | Open [index.html](index.html) |
| **Component showcase** | Open [common/components-showcase.html](common/components-showcase.html) |
| **Getting started guide** | Read [GETTING_STARTED.md](GETTING_STARTED.md) |
| **Full documentation** | Read [common/README.md](common/README.md) |

## 📦 Plugin Structure

```
my_plugin/
├── index.html          # Main demo file
├── my-plugin.js        # Plugin JavaScript
├── my-plugin.css       # Plugin-specific styles
└── README.md           # Plugin documentation
```

## 🎨 Essential CSS Classes

### Layout & Cards
```html
<div class="so-card">                          <!-- Card container -->
<div class="so-card-header">...</div>         <!-- Card header -->
<div class="so-card-body">...</div>           <!-- Card body -->
<div class="so-card-footer">...</div>         <!-- Card footer -->
```

### Buttons
```html
<button class="so-btn so-btn-primary">...</button>     <!-- Primary button -->
<button class="so-btn so-btn-secondary">...</button>   <!-- Secondary button -->
<button class="so-btn so-btn-success">...</button>     <!-- Success button -->
<button class="so-btn so-btn-outline">...</button>     <!-- Outline button -->
<button class="so-btn so-btn-sm">...</button>          <!-- Small button -->
<button class="so-btn so-btn-lg">...</button>          <!-- Large button -->
```

### Forms
```html
<div class="so-form-group">                    <!-- Form group wrapper -->
<label class="so-label">...</label>           <!-- Form label -->
<input class="so-input">                       <!-- Text input -->
<select class="so-select">...</select>         <!-- Select dropdown -->
<span class="so-help-text">...</span>          <!-- Help text -->
<span class="so-error-text">...</span>         <!-- Error text -->
```

### Search
```html
<div class="so-search-wrapper">
    <span class="material-icons so-search-icon">search</span>
    <input class="so-input so-search-input" placeholder="Search...">
</div>
```

### Badges
```html
<span class="so-badge so-badge-primary">...</span>     <!-- Primary badge -->
<span class="so-badge so-badge-success">...</span>     <!-- Success badge -->
<span class="so-badge so-badge-warning">...</span>     <!-- Warning badge -->
<span class="so-badge so-badge-error">...</span>       <!-- Error badge -->
```

### Tables
```html
<div class="so-table-wrapper">
    <table class="so-table">
        <thead>...</thead>
        <tbody>...</tbody>
    </table>
</div>
```

### Stats
```html
<div class="so-stats">
    <div class="so-stat">
        <div class="so-stat-icon blue">
            <span class="material-icons">icon_name</span>
        </div>
        <div class="so-stat-content">
            <div class="so-stat-label">Label</div>
            <div class="so-stat-value">Value</div>
        </div>
    </div>
</div>
```

### Avatars
```html
<div class="so-avatar so-avatar-sm">SM</div>   <!-- Small avatar -->
<div class="so-avatar so-avatar-md">MD</div>   <!-- Medium avatar -->
<div class="so-avatar so-avatar-lg">LG</div>   <!-- Large avatar -->
```

### Loading & Empty
```html
<div class="so-loading">
    <div class="so-spinner"></div>             <!-- Loading spinner -->
</div>

<div class="so-empty">
    <span class="material-icons so-empty-icon">inbox</span>
    <div class="so-empty-title">No items found</div>
    <div class="so-empty-description">Description</div>
</div>
```

### Typography
```html
<h1 class="so-heading-1">...</h1>              <!-- Large heading -->
<h2 class="so-heading-2">...</h2>              <!-- Medium heading -->
<h3 class="so-heading-3">...</h3>              <!-- Small heading -->
<p class="so-text-muted">...</p>               <!-- Muted text -->
<p class="so-text-primary">...</p>             <!-- Primary color text -->
```

### Layout Utilities
```html
<div class="so-flex so-items-center so-justify-between so-gap-lg">
    <!-- Flexbox layout -->
</div>

<div class="so-flex-col so-gap-md">
    <!-- Flex column layout -->
</div>
```

## 🎨 CSS Variables

### Colors
```css
var(--so-primary)              /* #1a73e8 - Blue */
var(--so-success)              /* #34a853 - Green */
var(--so-warning)              /* #f9ab00 - Orange */
var(--so-error)                /* #ea4335 - Red */
var(--so-white)                /* #ffffff */
var(--so-grey-50)              /* Lightest grey */
var(--so-grey-900)             /* Darkest grey */
```

### Spacing
```css
var(--so-space-xs)             /* 4px */
var(--so-space-sm)             /* 8px */
var(--so-space-md)             /* 12px */
var(--so-space-lg)             /* 16px */
var(--so-space-xl)             /* 20px */
var(--so-space-2xl)            /* 24px */
var(--so-space-3xl)            /* 32px */
var(--so-space-4xl)            /* 48px */
```

### Typography
```css
var(--so-text-xs)              /* 10px */
var(--so-text-sm)              /* 11px */
var(--so-text-base)            /* 13px */
var(--so-text-md)              /* 14px */
var(--so-text-lg)              /* 16px */
var(--so-text-xl)              /* 18px */
var(--so-text-2xl)             /* 20px */
var(--so-text-3xl)             /* 24px */
var(--so-text-4xl)             /* 28px */
```

### Border Radius
```css
var(--so-radius-sm)            /* 4px */
var(--so-radius-md)            /* 8px */
var(--so-radius-lg)            /* 12px */
var(--so-radius-xl)            /* 16px */
var(--so-radius-round)         /* 50% - Circle */
```

### Shadows
```css
var(--so-shadow-1)             /* Light shadow */
var(--so-shadow-2)             /* Medium shadow */
var(--so-shadow-3)             /* Heavy shadow */
var(--so-shadow-hover)         /* Hover effect shadow */
```

### Font Weights
```css
var(--so-weight-normal)        /* 400 */
var(--so-weight-medium)        /* 500 */
var(--so-weight-semibold)      /* 600 */
var(--so-weight-bold)          /* 700 */
```

## 📝 HTML Template

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Plugin - SixOrbit ERP</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Common Styles - ALWAYS INCLUDE FIRST -->
    <link rel="stylesheet" href="../common/sixorbit-common.css">

    <!-- Plugin Styles -->
    <link rel="stylesheet" href="my-plugin.css">
</head>
<body>
    <div class="page-container">
        <!-- Your plugin content -->
    </div>

    <script src="my-plugin.js"></script>
</body>
</html>
```

## 🎨 CSS Template

```css
/**
 * My Plugin Styles
 * Prefix: mp- (my-plugin)
 */

/* Use CSS variables */
.mp-container {
    background: var(--so-grey-50);
    padding: var(--so-space-xl);
    border-radius: var(--so-radius-md);
}

.mp-card {
    background: var(--so-white);
    padding: var(--so-space-lg);
    box-shadow: var(--so-shadow-1);
    transition: box-shadow var(--so-transition-base);
}

.mp-card:hover {
    box-shadow: var(--so-shadow-2);
}

/* Responsive */
@media (max-width: 768px) {
    .mp-container {
        padding: var(--so-space-md);
    }
}
```

## ✅ Checklist for New Plugin

- [ ] Create plugin directory
- [ ] Copy templates from `common/`
- [ ] Include `sixorbit-common.css` in HTML
- [ ] Use `so-` classes for common components
- [ ] Prefix plugin classes (e.g., `mp-`)
- [ ] Use CSS variables for all values
- [ ] Test responsive design (mobile, tablet, desktop)
- [ ] Add Material Icons if needed
- [ ] Create README.md for plugin
- [ ] Add plugin to main index.html
- [ ] Test in different browsers

## 📖 Where to Find Things

| Need | Location |
|------|----------|
| Common CSS file | [common/sixorbit-common.css](common/sixorbit-common.css) |
| HTML template | [common/plugin-template.html](common/plugin-template.html) |
| CSS template | [common/plugin-template.css](common/plugin-template.css) |
| Component showcase | [common/components-showcase.html](common/components-showcase.html) |
| Design system docs | [common/README.md](common/README.md) |
| Getting started | [GETTING_STARTED.md](GETTING_STARTED.md) |
| Example plugins | `report_list/`, `cash_flow_summary/`, `multi_employee_attendance_viewer/` |

## 🎯 Best Practices

1. **Always use CSS variables** - Never hardcode colors or spacing
2. **Prefix your classes** - Use unique prefix like `mp-` for "my-plugin"
3. **Extend, don't recreate** - Use common components when available
4. **Mobile first** - Design for mobile, enhance for desktop
5. **Test responsiveness** - Check all breakpoints
6. **Use semantic HTML** - Proper tags and ARIA labels
7. **Keep it simple** - Don't over-engineer

## 🔗 Material Icons

Browse icons at: https://fonts.google.com/icons

Usage:
```html
<span class="material-icons">icon_name</span>
```

Common icons:
- `add`, `edit`, `delete`, `search`, `filter_list`
- `people`, `person`, `group`, `account_circle`
- `assessment`, `analytics`, `trending_up`, `bar_chart`
- `check_circle`, `cancel`, `error`, `warning`
- `chevron_left`, `chevron_right`, `expand_more`

## 🆘 Common Issues

**Issue:** Styles not applying
- ✅ Make sure `sixorbit-common.css` is included BEFORE your plugin CSS
- ✅ Check that CSS variables are used correctly: `var(--so-primary)`

**Issue:** Components look wrong
- ✅ Use exact class names from documentation
- ✅ Check HTML structure matches examples

**Issue:** Responsive issues
- ✅ Test at different breakpoints (768px, 480px)
- ✅ Use common responsive utilities

## 📞 Support

- Check [Component Showcase](common/components-showcase.html)
- Review [existing plugins](report_list/) for examples
- Read [full documentation](common/README.md)
- Contact SixOrbit dev team

---

**Quick Tip:** Open [components-showcase.html](common/components-showcase.html) in one tab while developing to reference components!
