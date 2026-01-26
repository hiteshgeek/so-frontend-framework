# Migration Guide: Sales Reports Plugin → Report List Plugin

## What Changed?

The plugin has been renamed from **Sales Reports Plugin** to **Report List Plugin** to make it more generic and suitable for any type of reports (sales, analytics, finance, inventory, etc.).

## File Names

| Old Name | New Name |
|----------|----------|
| `sales-reports-plugin.js` | `report-list-plugin.js` |
| `sales-reports-plugin.css` | `report-list-plugin.css` |
| `sample-data.js` | `report-list-data.js` |

## Class Names

### JavaScript
```javascript
// OLD
const plugin = new SalesReportsPlugin('#container', { ... });

// NEW
const plugin = new ReportListPlugin('#container', { ... });
```

### Data Variable
```javascript
// OLD
const sampleReportsData = { ... };

// NEW
const reportListData = { ... };
```

## CSS Classes

All CSS classes have been renamed from `.srp-*` to `.rlp-*`:

| Old Class | New Class |
|-----------|-----------|
| `.srp-container` | `.rlp-container` |
| `.srp-header` | `.rlp-header` |
| `.srp-report-card` | `.rlp-report-card` |
| etc. | etc. |

## CSS Variables

All CSS custom properties renamed from `--srp-*` to `--rlp-*`:

| Old Variable | New Variable |
|--------------|--------------|
| `--srp-primary` | `--rlp-primary` |
| `--srp-surface` | `--rlp-surface` |
| etc. | etc. |

## Migration Steps

### 1. Update File References

```html
<!-- OLD -->
<link rel="stylesheet" href="sales-reports-plugin.css">
<script src="sample-data.js"></script>
<script src="sales-reports-plugin.js"></script>

<!-- NEW -->
<link rel="stylesheet" href="report-list-plugin.css">
<script src="report-list-data.js"></script>
<script src="report-list-plugin.js"></script>
```

### 2. Update JavaScript Initialization

```javascript
// OLD
const plugin = new SalesReportsPlugin('#reports-container', {
    dataSource: 'json',
    jsonData: sampleReportsData
});

// NEW
const plugin = new ReportListPlugin('#reports-container', {
    dataSource: 'json',
    jsonData: reportListData
});
```

### 3. Update Custom CSS (if any)

If you have custom CSS overrides:

```css
/* OLD */
.srp-report-card {
    border: 2px solid red;
}

/* NEW */
.rlp-report-card {
    border: 2px solid red;
}
```

## No Functional Changes

⚠️ **Important**: This is purely a naming change. All functionality remains exactly the same:

- ✅ All features work identically
- ✅ API methods unchanged
- ✅ Configuration options unchanged
- ✅ Event callbacks unchanged
- ✅ Data structure unchanged

## Why This Change?

The plugin is now more versatile and can be used for:
- 📊 Sales reports
- 📈 Analytics dashboards
- 💰 Finance reports
- 📦 Inventory reports
- 🎯 Marketing reports
- 🔧 Operations reports
- ...any other type of reports!

Just customize the `labels.title` in the configuration:

```javascript
new ReportListPlugin('#container', {
    labels: {
        title: 'Analytics Reports'  // or 'Finance Reports', etc.
    }
});
```

## Need Help?

The plugin works exactly the same way - just with new names. Check the README.md for full documentation!
