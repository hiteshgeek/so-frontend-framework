# Getting Started with SixOrbit Plugin Development

Welcome! This guide will help you quickly get started with creating plugins for SixOrbit ERP using our common design system.

## 📚 Table of Contents

1. [Overview](#overview)
2. [Quick Start](#quick-start)
3. [File Structure](#file-structure)
4. [Creating Your First Plugin](#creating-your-first-plugin)
5. [Using Common Components](#using-common-components)
6. [Best Practices](#best-practices)
7. [Resources](#resources)

## Overview

The SixOrbit Plugin Library provides:

- ✅ **Common CSS Framework** - Material UI and Google-inspired design system
- ✅ **Reusable Components** - Buttons, cards, forms, tables, badges, and more
- ✅ **Design Tokens** - CSS variables for colors, spacing, typography, shadows
- ✅ **Templates** - Ready-to-use HTML and CSS templates
- ✅ **Documentation** - Comprehensive guides and examples
- ✅ **Showcase** - Visual component reference

## Quick Start

### Step 1: View the Component Showcase

Open [common/components-showcase.html](common/components-showcase.html) to see all available components.

### Step 2: Review Existing Plugins

Check out these working examples:
- **Report List:** [report_list/index.html](report_list/index.html)
- **Cash Flow Dashboard:** [cash_flow_summary/index.html](cash_flow_summary/index.html)
- **Attendance Manager:** [multi_employee_attendance_viewer/demo.html](multi_employee_attendance_viewer/demo.html)

### Step 3: Read the Documentation

- [Design System Documentation](common/README.md)
- [Repository Overview](README.md)

## File Structure

```
your_new_plugin/
├── index.html              # Main demo/entry file
├── your-plugin.js          # Plugin JavaScript
├── your-plugin.css         # Plugin-specific styles
└── README.md               # Plugin documentation
```

## Creating Your First Plugin

### 1. Create Plugin Directory

```bash
cd sixorbit_plugins
mkdir my_awesome_plugin
cd my_awesome_plugin
```

### 2. Copy Templates

```bash
# Copy HTML template
cp ../common/plugin-template.html index.html

# Copy CSS template
cp ../common/plugin-template.css my-plugin.css
```

### 3. Update HTML File

Edit `index.html`:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Awesome Plugin - SixOrbit ERP</title>

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- IMPORTANT: Always include common styles first -->
    <link rel="stylesheet" href="../common/sixorbit-common.css">

    <!-- Your plugin-specific styles -->
    <link rel="stylesheet" href="my-plugin.css">
</head>
<body>
    <div class="page-container">
        <!-- Your plugin content here -->
        <h1 class="so-heading-1">My Awesome Plugin</h1>

        <div class="so-card">
            <div class="so-card-body">
                <p>Start building your plugin here!</p>
                <button class="so-btn so-btn-primary">Click Me</button>
            </div>
        </div>
    </div>

    <script src="my-plugin.js"></script>
</body>
</html>
```

### 4. Update CSS File

Edit `my-plugin.css`:

```css
/**
 * My Awesome Plugin Styles
 * Use 'map-' prefix for your plugin classes
 */

/* Use CSS variables from the common design system */
.map-container {
    background: var(--so-grey-50);
    padding: var(--so-space-xl);
    border-radius: var(--so-radius-md);
}

.map-custom-component {
    background: var(--so-white);
    padding: var(--so-space-lg);
    border: 1px solid var(--so-grey-200);
    box-shadow: var(--so-shadow-1);
}

.map-custom-component:hover {
    border-color: var(--so-primary);
    box-shadow: var(--so-shadow-2);
}
```

### 5. Create JavaScript File

Create `my-plugin.js`:

```javascript
/**
 * My Awesome Plugin
 * Version: 1.0.0
 */

class MyAwesomePlugin {
    constructor(containerId, options = {}) {
        this.container = document.getElementById(containerId);
        this.options = options;
        this.init();
    }

    init() {
        console.log('My Awesome Plugin initialized!');
        // Your initialization code here
    }

    // Your methods here
}
```

## Using Common Components

### Cards

```html
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-heading-3">Card Title</h3>
    </div>
    <div class="so-card-body">
        Card content goes here
    </div>
    <div class="so-card-footer">
        <button class="so-btn so-btn-primary">Action</button>
    </div>
</div>
```

### Buttons

```html
<!-- Primary button -->
<button class="so-btn so-btn-primary">Primary</button>

<!-- Button with icon -->
<button class="so-btn so-btn-primary">
    <span class="material-icons">add</span>
    Add New
</button>

<!-- Different sizes -->
<button class="so-btn so-btn-primary so-btn-sm">Small</button>
<button class="so-btn so-btn-primary">Default</button>
<button class="so-btn so-btn-primary so-btn-lg">Large</button>
```

### Form Controls

```html
<div class="so-form-group">
    <label class="so-label">Email</label>
    <input type="email" class="so-input" placeholder="Enter email">
    <span class="so-help-text">We'll never share your email.</span>
</div>

<div class="so-form-group">
    <label class="so-label">Category</label>
    <select class="so-select">
        <option>Option 1</option>
        <option>Option 2</option>
    </select>
</div>
```

### Tables

```html
<div class="so-table-wrapper">
    <table class="so-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td><span class="so-badge so-badge-success">Active</span></td>
            </tr>
        </tbody>
    </table>
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
</div>
```

## Best Practices

### 1. Always Use CSS Variables

❌ **Don't do this:**
```css
.my-element {
    color: #1a73e8;
    padding: 16px;
    border-radius: 8px;
}
```

✅ **Do this:**
```css
.my-element {
    color: var(--so-primary);
    padding: var(--so-space-lg);
    border-radius: var(--so-radius-md);
}
```

### 2. Prefix Your Classes

Use a unique prefix for your plugin classes to avoid conflicts:

```css
/* For "My Awesome Plugin" use 'map-' prefix */
.map-container { }
.map-header { }
.map-content { }
```

### 3. Extend, Don't Recreate

If a common component exists, use it instead of creating your own:

✅ **Good:**
```html
<button class="so-btn so-btn-primary">Click Me</button>
```

❌ **Bad:**
```html
<button class="my-custom-button">Click Me</button>
```

### 4. Test Responsiveness

Always test your plugin at different screen sizes:
- Desktop: 1920px, 1366px, 1024px
- Tablet: 768px
- Mobile: 480px, 375px

### 5. Write Clean Code

- Use semantic HTML
- Add ARIA labels for accessibility
- Comment complex logic
- Keep CSS specificity low
- Follow consistent indentation

### 6. Mobile First

Design for mobile first, then enhance for larger screens:

```css
/* Mobile first */
.map-grid {
    grid-template-columns: 1fr;
}

/* Tablet and up */
@media (min-width: 768px) {
    .map-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Desktop and up */
@media (min-width: 1024px) {
    .map-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}
```

## Resources

### Documentation
- **[Design System Docs](common/README.md)** - Complete component documentation
- **[Repository Overview](README.md)** - Project structure and guidelines

### Visual References
- **[Component Showcase](common/components-showcase.html)** - See all components in action
- **[Plugin Library](index.html)** - Browse all available plugins

### Templates
- **[HTML Template](common/plugin-template.html)** - Starter HTML file
- **[CSS Template](common/plugin-template.css)** - Starter CSS file with examples

### Example Plugins
- **[Report List](report_list/)** - Grid/list view with search and favorites
- **[Cash Flow Dashboard](cash_flow_summary/)** - Hierarchical data visualization
- **[Attendance Manager](multi_employee_attendance_viewer/)** - Multi-day calendar view

## Common CSS Variables Reference

### Colors
```css
--so-primary: #1a73e8;
--so-success: #34a853;
--so-warning: #f9ab00;
--so-error: #ea4335;
--so-grey-50 through --so-grey-900
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
--so-text-xs: 10px;
--so-text-sm: 11px;
--so-text-base: 13px;
--so-text-md: 14px;
--so-text-lg: 16px;
--so-text-xl: 18px;
--so-text-2xl: 20px;
--so-text-3xl: 24px;
--so-text-4xl: 28px;
```

### Border Radius
```css
--so-radius-sm: 4px;
--so-radius-md: 8px;
--so-radius-lg: 12px;
--so-radius-xl: 16px;
--so-radius-round: 50%;
```

### Shadows
```css
--so-shadow-1: /* Light shadow */
--so-shadow-2: /* Medium shadow */
--so-shadow-3: /* Heavy shadow */
--so-shadow-hover: /* Hover effect */
```

## Need Help?

1. Check the [Component Showcase](common/components-showcase.html) for visual examples
2. Review [existing plugin code](report_list/) for implementation patterns
3. Read the [full documentation](common/README.md)
4. Contact the SixOrbit development team

## Next Steps

1. ✅ Create your plugin directory
2. ✅ Copy the templates
3. ✅ Start building with common components
4. ✅ Test on different screen sizes
5. ✅ Add your plugin to the main index
6. ✅ Share with the team!

---

**Happy Coding! 🚀**

Built with ❤️ for SixOrbit ERP
