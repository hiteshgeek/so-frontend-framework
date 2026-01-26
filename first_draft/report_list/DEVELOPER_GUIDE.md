# Report List Plugin - Developer Guide

## Overview

The Report List Plugin is a versatile, framework-agnostic component for displaying and managing reports in grid or list view with search, favorites, and usage tracking features.

**Version:** 1.0.0
**Module:** General (Works with all modules)
**Plugin Type:** Framework-agnostic JavaScript

---

## Table of Contents

1. [Quick Start](#quick-start)
2. [Installation](#installation)
3. [Basic Usage](#basic-usage)
4. [Configuration Options](#configuration-options)
5. [Data Format](#data-format)
6. [Methods](#methods)
7. [Events & Callbacks](#events--callbacks)
8. [Examples](#examples)
9. [Styling](#styling)
10. [Browser Support](#browser-support)

---

## Quick Start

### Minimum Setup

```html
<!DOCTYPE html>
<html>
<head>
    <!-- Required: Common Styles -->
    <link rel="stylesheet" href="../common/sixorbit-common.css">

    <!-- Required: Plugin Styles -->
    <link rel="stylesheet" href="report-list-plugin.css">
</head>
<body>
    <!-- Container -->
    <div id="reports-container"></div>

    <!-- Required: Plugin JavaScript -->
    <script src="report-list-plugin.js"></script>

    <script>
        // Initialize
        const reportsPlugin = new ReportListPlugin('#reports-container', {
            dataSource: 'json',
            jsonData: yourReportsArray
        });
    </script>
</body>
</html>
```

---

## Installation

### Step 1: Include CSS Files

```html
<!-- Common Design System (Required) -->
<link rel="stylesheet" href="../common/sixorbit-common.css">

<!-- Plugin-Specific Styles (Required) -->
<link rel="stylesheet" href="report-list-plugin.css">

<!-- Optional: Google Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
```

### Step 2: Include JavaScript

```html
<!-- Plugin JavaScript (Required) -->
<script src="report-list-plugin.js"></script>
```

### Step 3: Create Container

```html
<!-- Container where the report list will be rendered -->
<div id="reports-container"></div>
```

---

## Basic Usage

### Initialize the Plugin

```javascript
// Create instance
const reportsPlugin = new ReportListPlugin(selector, options);
```

**Parameters:**
- `selector` (String): CSS selector for container (e.g., `'#reports-container'`)
- `options` (Object): Configuration options

**Example:**

```javascript
const reportsPlugin = new ReportListPlugin('#reports-container', {
    dataSource: 'json',
    jsonData: reportsArray,
    defaultView: 'grid',
    labels: {
        title: 'Sales Reports'
    }
});
```

---

## Configuration Options

### All Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `dataSource` | String | `'json'` | Data source type: `'json'` or `'url'` |
| `jsonData` | Array | `null` | Array of report objects (required if dataSource is 'json') |
| `dataUrl` | String | `null` | URL to fetch reports (required if dataSource is 'url') |
| `defaultView` | String | `'grid'` | Default view mode: `'grid'` or `'list'` |
| `enableSearch` | Boolean | `true` | Enable search functionality |
| `enableFavorites` | Boolean | `true` | Enable favorites system |
| `enableViewToggle` | Boolean | `true` | Enable grid/list view toggle |
| `enableMostUsed` | Boolean | `true` | Track and show most used reports |
| `labels` | Object | See below | Custom labels for UI elements |
| `onReportClick` | Function | `null` | Callback when report is clicked |
| `onFavoriteAdd` | Function | `null` | Callback when report is favorited |
| `onFavoriteRemove` | Function | `null` | Callback when favorite is removed |

### Labels Object

```javascript
{
    labels: {
        title: 'Reports',                   // Main title
        searchPlaceholder: 'Search reports...',  // Search input placeholder
        noResults: 'No reports found',     // No results message
        gridView: 'Grid View',              // Grid view tooltip
        listView: 'List View',              // List view tooltip
        favorites: 'Favorites',             // Favorites section title
        mostUsed: 'Most Used',              // Most used section title
        allReports: 'All Reports'           // All reports section title
    }
}
```

---

## Data Format

### Report Object Structure

```javascript
{
    id: "unique_report_id",          // Required: Unique identifier
    title: "Report Title",            // Required: Display name
    description: "Report description", // Required: Description text
    category: "Category Name",        // Required: Report category
    icon: "icon_name",                // Optional: Material icon name
    link: "/path/to/report",          // Required: Report URL
    tags: ["tag1", "tag2"],          // Optional: Search tags
    color: "#hex_color"               // Optional: Custom color
}
```

### Complete Example

```javascript
const reportsData = [
    {
        id: "cashflow_report",
        title: "Cash Flow Analysis",
        description: "Detailed cash flow statement with inflow and outflow analysis",
        category: "Finance",
        icon: "account_balance",
        link: "/finance/cash-flow",
        tags: ["finance", "accounting", "cash", "flow"],
        color: "#34a853"
    },
    {
        id: "attendance_report",
        title: "Employee Attendance",
        description: "Multi-employee attendance tracking and analysis",
        category: "HR",
        icon: "people",
        link: "/hr/attendance",
        tags: ["hr", "attendance", "employees"],
        color: "#f9ab00"
    },
    {
        id: "sales_summary",
        title: "Sales Summary",
        description: "Monthly sales summary with trends and insights",
        category: "Sales",
        icon: "trending_up",
        link: "/sales/summary",
        tags: ["sales", "revenue", "trends"],
        color: "#1a73e8"
    }
];
```

---

## Methods

### Public Methods

#### `setView(viewMode)`

Change the display view mode.

**Parameters:**
- `viewMode` (String): `'grid'` or `'list'`

**Example:**
```javascript
// Switch to grid view
reportsPlugin.setView('grid');

// Switch to list view
reportsPlugin.setView('list');
```

#### `search(query)`

Programmatically search reports.

**Parameters:**
- `query` (String): Search term

**Example:**
```javascript
reportsPlugin.search('finance');
```

#### `clearSearch()`

Clear current search and show all reports.

**Example:**
```javascript
reportsPlugin.clearSearch();
```

#### `toggleFavorite(reportId)`

Toggle favorite status of a report.

**Parameters:**
- `reportId` (String): Report ID

**Example:**
```javascript
reportsPlugin.toggleFavorite('cashflow_report');
```

#### `getFavorites()`

Get list of favorited reports.

**Returns:**
Array of report IDs that are favorited.

**Example:**
```javascript
const favorites = reportsPlugin.getFavorites();
console.log('Favorited reports:', favorites);
```

#### `getMostUsed(limit)`

Get most used reports.

**Parameters:**
- `limit` (Number): Maximum number of reports to return (default: 5)

**Returns:**
Array of report objects sorted by usage count.

**Example:**
```javascript
const topReports = reportsPlugin.getMostUsed(3);
console.log('Top 3 reports:', topReports);
```

#### `reload(newData)`

Reload plugin with new data.

**Parameters:**
- `newData` (Array): New reports array

**Example:**
```javascript
// Fetch fresh data
const freshData = await fetchReports();

// Reload plugin
reportsPlugin.reload(freshData);
```

#### `destroy()`

Remove plugin and clean up event listeners.

**Example:**
```javascript
reportsPlugin.destroy();
```

---

## Events & Callbacks

### onReportClick

Called when a report is clicked.

**Parameters:**
- `reportId` (String): The report ID
- `reportData` (Object): The complete report object

**Example:**
```javascript
const reportsPlugin = new ReportListPlugin('#reports-container', {
    dataSource: 'json',
    jsonData: reportsData,
    onReportClick: function(reportId, reportData) {
        console.log('Report clicked:', reportData.title);
        // Open report in new tab
        window.open(reportData.link, '_blank');
    }
});
```

### onFavoriteAdd

Called when a report is added to favorites.

**Parameters:**
- `reportId` (String): The report ID
- `reportData` (Object): The complete report object

**Example:**
```javascript
const reportsPlugin = new ReportListPlugin('#reports-container', {
    dataSource: 'json',
    jsonData: reportsData,
    onFavoriteAdd: function(reportId, reportData) {
        console.log('Added to favorites:', reportData.title);
        // Save to server
        saveFavorite(reportId);
    }
});
```

### onFavoriteRemove

Called when a report is removed from favorites.

**Parameters:**
- `reportId` (String): The report ID
- `reportData` (Object): The complete report object

**Example:**
```javascript
const reportsPlugin = new ReportListPlugin('#reports-container', {
    dataSource: 'json',
    jsonData: reportsData,
    onFavoriteRemove: function(reportId, reportData) {
        console.log('Removed from favorites:', reportData.title);
        // Remove from server
        removeFavorite(reportId);
    }
});
```

---

## Examples

### Example 1: Basic Implementation

```html
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../common/sixorbit-common.css">
    <link rel="stylesheet" href="report-list-plugin.css">
</head>
<body>
    <div id="reports-container"></div>

    <script src="report-list-plugin.js"></script>
    <script>
        const reports = [
            {
                id: "report1",
                title: "Sales Report",
                description: "Monthly sales analysis",
                category: "Sales",
                icon: "trending_up",
                link: "/reports/sales"
            }
        ];

        const plugin = new ReportListPlugin('#reports-container', {
            dataSource: 'json',
            jsonData: reports
        });
    </script>
</body>
</html>
```

### Example 2: With Custom Labels

```javascript
const reportsPlugin = new ReportListPlugin('#reports-container', {
    dataSource: 'json',
    jsonData: reportsData,
    labels: {
        title: 'Financial Reports',
        searchPlaceholder: 'Search financial reports...',
        noResults: 'No financial reports found',
        favorites: 'My Favorite Reports',
        mostUsed: 'Frequently Used',
        allReports: 'All Financial Reports'
    }
});
```

### Example 3: Loading from URL

```javascript
const reportsPlugin = new ReportListPlugin('#reports-container', {
    dataSource: 'url',
    dataUrl: '/api/reports',
    defaultView: 'list',
    onReportClick: function(reportId, reportData) {
        // Navigate to report
        window.location.href = reportData.link;
    }
});
```

### Example 4: With All Callbacks

```javascript
const reportsPlugin = new ReportListPlugin('#reports-container', {
    dataSource: 'json',
    jsonData: reportsData,
    onReportClick: function(reportId, reportData) {
        // Track usage
        trackReportView(reportId);

        // Open report
        window.open(reportData.link, '_blank');
    },
    onFavoriteAdd: function(reportId, reportData) {
        // Save to localStorage
        saveFavoriteToStorage(reportId);

        // Optionally save to server
        fetch('/api/favorites/add', {
            method: 'POST',
            body: JSON.stringify({ reportId: reportId })
        });

        // Show notification
        showNotification(`"${reportData.title}" added to favorites`);
    },
    onFavoriteRemove: function(reportId, reportData) {
        // Remove from localStorage
        removeFavoriteFromStorage(reportId);

        // Optionally remove from server
        fetch('/api/favorites/remove', {
            method: 'POST',
            body: JSON.stringify({ reportId: reportId })
        });

        // Show notification
        showNotification(`"${reportData.title}" removed from favorites`);
    }
});
```

### Example 5: Dynamic Refresh

```html
<button onclick="refreshReports()">Refresh Reports</button>
<div id="reports-container"></div>

<script>
    let reportsPlugin;

    // Initialize
    document.addEventListener('DOMContentLoaded', async function() {
        const data = await loadReports();
        reportsPlugin = new ReportListPlugin('#reports-container', {
            dataSource: 'json',
            jsonData: data
        });
    });

    // Refresh function
    async function refreshReports() {
        const freshData = await loadReports();
        reportsPlugin.reload(freshData);
    }

    // Load reports from API
    async function loadReports() {
        const response = await fetch('/api/reports');
        return await response.json();
    }
</script>
```

### Example 6: Category Filtering

```html
<select id="categoryFilter" onchange="filterByCategory()">
    <option value="">All Categories</option>
    <option value="Finance">Finance</option>
    <option value="HR">HR</option>
    <option value="Sales">Sales</option>
</select>

<div id="reports-container"></div>

<script>
    let allReports = [/* ... */];
    let reportsPlugin;

    // Initialize
    reportsPlugin = new ReportListPlugin('#reports-container', {
        dataSource: 'json',
        jsonData: allReports
    });

    // Filter by category
    function filterByCategory() {
        const category = document.getElementById('categoryFilter').value;

        if (category === '') {
            reportsPlugin.reload(allReports);
        } else {
            const filtered = allReports.filter(r => r.category === category);
            reportsPlugin.reload(filtered);
        }
    }
</script>
```

---

## Styling

### Custom Styling

The plugin uses CSS classes prefixed with `rp-` (report-plugin). Override these in your CSS:

```css
/* Customize colors */
.rp-card {
    border: 1px solid your-color;
}

.rp-card:hover {
    box-shadow: your-shadow;
}

/* Customize fonts */
.rp-card-title {
    font-family: your-font;
    font-size: your-size;
}

/* Customize grid layout */
.rp-grid {
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}
```

### Using Design Tokens

```css
/* Use common design system variables */
.rp-custom-element {
    color: var(--so-primary);
    padding: var(--so-space-lg);
    border-radius: var(--so-radius-md);
    box-shadow: var(--so-shadow-1);
}
```

---

## Browser Support

- ✅ Chrome/Edge (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Mobile Safari (iOS)
- ✅ Chrome Mobile (Android)

**Minimum Requirements:**
- ES6 JavaScript support
- CSS Grid & Flexbox support
- LocalStorage support (for favorites)

---

## Troubleshooting

### Plugin not appearing

1. **Check selector** - Must be valid CSS selector (e.g., `'#container'`)
2. **Verify CSS files** - Check console for 404 errors
3. **Check data format** - Ensure reports array is valid

### Search not working

```javascript
// Make sure search is enabled
const plugin = new ReportListPlugin('#container', {
    dataSource: 'json',
    jsonData: data,
    enableSearch: true  // Must be true
});
```

### Favorites not persisting

- Favorites are stored in localStorage by default
- Check browser localStorage is enabled
- Implement server-side storage in callbacks if needed

---

## Complete Integration Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Library</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Required Styles -->
    <link rel="stylesheet" href="../common/sixorbit-common.css">
    <link rel="stylesheet" href="report-list-plugin.css">

    <style>
        body {
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }

        .page-header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="page-header">
        <h1>Reports Library</h1>
        <p>Browse and access all available reports</p>
    </div>

    <!-- Reports Container -->
    <div id="reports-container"></div>

    <!-- Plugin JavaScript -->
    <script src="report-list-plugin.js"></script>

    <!-- Integration Code -->
    <script>
        // Your reports data
        const reportsData = [
            {
                id: "cashflow",
                title: "Cash Flow Analysis",
                description: "Detailed cash flow statement with analysis",
                category: "Finance",
                icon: "account_balance",
                link: "/finance/cashflow",
                tags: ["finance", "accounting", "cash"]
            },
            {
                id: "attendance",
                title: "Employee Attendance",
                description: "Multi-employee attendance tracking",
                category: "HR",
                icon: "people",
                link: "/hr/attendance",
                tags: ["hr", "attendance", "employees"]
            }
        ];

        // Initialize plugin
        const reportsPlugin = new ReportListPlugin('#reports-container', {
            dataSource: 'json',
            jsonData: reportsData,
            defaultView: 'grid',
            labels: {
                title: 'Available Reports'
            },
            onReportClick: function(reportId, reportData) {
                // Track usage
                console.log('Opening report:', reportData.title);

                // Open report
                window.open(reportData.link, '_blank');
            },
            onFavoriteAdd: function(reportId, reportData) {
                console.log('Favorited:', reportData.title);
            },
            onFavoriteRemove: function(reportId, reportData) {
                console.log('Unfavorited:', reportData.title);
            }
        });
    </script>
</body>
</html>
```

---

## Support

For questions or issues:
1. Check this guide
2. Review the demo file: `index.html`
3. Check data format examples
4. Contact SixOrbit development team

---

**Plugin:** Report List Plugin v1.0.0
**Last Updated:** 2026-01-08
**Module:** General (All Modules)
