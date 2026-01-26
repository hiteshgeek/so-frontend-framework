# Cash Flow Dashboard - Developer Guide

## Overview

The Cash Flow Dashboard is a hierarchical financial reporting plugin that displays inflow and outflow data with expandable/collapsible groups, visual progress bars, and number formatting options.

**Version:** 2.0.0
**Module:** Finance
**Plugin Type:** Framework-agnostic JavaScript

---

## Table of Contents

1. [Quick Start](#quick-start)
2. [Installation](#installation)
3. [Basic Usage](#basic-usage)
4. [Configuration Options](#configuration-options)
5. [Data Format](#data-format)
6. [Methods](#methods)
7. [Examples](#examples)
8. [Styling](#styling)
9. [Browser Support](#browser-support)

---

## Quick Start

### Minimum Setup

```html
<!DOCTYPE html>
<html>
<head>
    <!-- Required: Common Styles -->
    <link rel="stylesheet" href="../../common/sixorbit-common.css">

    <!-- Required: Plugin Styles -->
    <link rel="stylesheet" href="cashflow-dashboard.css">
</head>
<body>
    <!-- Container -->
    <div id="cashflow-container"></div>

    <!-- Required: Plugin JavaScript -->
    <script src="cashflow-dashboard-v2.js"></script>

    <script>
        // Initialize
        const dashboard = new CashFlowDashboard('cashflow-container', {
            data: yourDataObject,
            numberFormat: 'short'
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
<link rel="stylesheet" href="../../common/sixorbit-common.css">

<!-- Plugin-Specific Styles (Required) -->
<link rel="stylesheet" href="cashflow-dashboard.css">

<!-- Optional: Google Fonts for better typography -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
```

### Step 2: Include JavaScript

```html
<!-- Plugin JavaScript (Required) -->
<script src="cashflow-dashboard-v2.js"></script>
```

### Step 3: Create Container

```html
<!-- Container where the dashboard will be rendered -->
<div id="cashflow-container"></div>
```

---

## Basic Usage

### Initialize the Plugin

```javascript
// Create instance
const dashboard = new CashFlowDashboard(containerId, options);
```

**Parameters:**
- `containerId` (String): ID of the container element (without #)
- `options` (Object): Configuration options

**Example:**

```javascript
const dashboard = new CashFlowDashboard('cashflow-container', {
    data: cashflowData,
    numberFormat: 'short',
    showProgressBarsOnMobile: false
});
```

---

## Configuration Options

### Available Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `data` | Object | **Required** | Cash flow data object (see Data Format below) |
| `numberFormat` | String | `'short'` | Number display format: `'full'` or `'short'` |
| `showProgressBarsOnMobile` | Boolean | `false` | Whether to show progress bars on mobile devices |

### Option Details

#### `data` (Required)

The main data object containing company info and cash flow data.

```javascript
{
    data: {
        company: "Company Name",
        period: {
            start: "2025-04-01",
            end: "2025-05-30"
        },
        cashflow: {
            inflow: { /* ... */ },
            outflow: { /* ... */ }
        }
    }
}
```

#### `numberFormat`

Controls how numbers are displayed:

- `'full'` - Shows full numbers (e.g., `1,234,567.89`)
- `'short'` - Shows abbreviated numbers (e.g., `₹1.23M`, `₹45.6K`)

```javascript
{
    numberFormat: 'short'  // or 'full'
}
```

#### `showProgressBarsOnMobile`

Controls whether progress bars are visible on mobile screens:

```javascript
{
    showProgressBarsOnMobile: false  // Hide on mobile for cleaner UI
}
```

---

## Data Format

### Complete Data Structure

```javascript
const cashflowData = {
    // Company Information
    company: "Your Company Name",

    // Reporting Period
    period: {
        start: "YYYY-MM-DD",  // Start date
        end: "YYYY-MM-DD"      // End date
    },

    // Cash Flow Data
    cashflow: {
        // Inflow Section
        inflow: {
            groups: [
                {
                    id: "unique_group_id",
                    name: "Group Name",
                    type: "group",
                    children: [
                        // Nested groups or ledgers
                    ]
                }
            ]
        },

        // Outflow Section
        outflow: {
            groups: [
                {
                    id: "unique_group_id",
                    name: "Group Name",
                    type: "group",
                    children: [
                        // Nested groups or ledgers
                    ]
                }
            ]
        }
    }
};
```

### Item Types

#### Group Item

A collapsible container that can hold other groups or ledgers:

```javascript
{
    id: "revenue",              // Unique identifier
    name: "Revenue",            // Display name
    type: "group",              // Item type
    children: [                 // Nested items
        // More groups or ledgers
    ]
}
```

#### Ledger Item

A final account entry with an amount:

```javascript
{
    id: "bank_interest",        // Unique identifier
    name: "Bank Interest",      // Display name
    type: "ledger",             // Item type
    amount: 185000              // Amount in base currency
}
```

### Complete Example

```javascript
const cashflowData = {
    company: "Acme Corporation",
    period: {
        start: "2025-01-01",
        end: "2025-03-31"
    },
    cashflow: {
        inflow: {
            groups: [
                {
                    id: "revenue",
                    name: "Revenue",
                    type: "group",
                    children: [
                        {
                            id: "sales",
                            name: "Sales Revenue",
                            type: "group",
                            children: [
                                {
                                    id: "domestic_sales",
                                    name: "Domestic Sales",
                                    type: "ledger",
                                    amount: 5000000
                                },
                                {
                                    id: "export_sales",
                                    name: "Export Sales",
                                    type: "ledger",
                                    amount: 2000000
                                }
                            ]
                        },
                        {
                            id: "interest_income",
                            name: "Interest Income",
                            type: "ledger",
                            amount: 150000
                        }
                    ]
                }
            ]
        },
        outflow: {
            groups: [
                {
                    id: "expenses",
                    name: "Operating Expenses",
                    type: "group",
                    children: [
                        {
                            id: "salaries",
                            name: "Salaries",
                            type: "ledger",
                            amount: 3000000
                        },
                        {
                            id: "rent",
                            name: "Office Rent",
                            type: "ledger",
                            amount: 500000
                        }
                    ]
                }
            ]
        }
    }
};
```

---

## Methods

### Public Methods

#### `setNumberFormat(format)`

Change the number display format.

**Parameters:**
- `format` (String): `'full'` or `'short'`

**Example:**
```javascript
// Switch to full format
dashboard.setNumberFormat('full');

// Switch to short format
dashboard.setNumberFormat('short');
```

#### `expandAll()`

Expand all collapsible groups.

**Example:**
```javascript
dashboard.expandAll();
```

#### `collapseAll()`

Collapse all collapsible groups.

**Example:**
```javascript
dashboard.collapseAll();
```

#### `reload(newData)`

Reload the dashboard with new data.

**Parameters:**
- `newData` (Object): New cash flow data object

**Example:**
```javascript
// Fetch fresh data
const freshData = await fetchCashFlowData();

// Reload dashboard
dashboard.reload(freshData);
```

---

## Examples

### Example 1: Basic Implementation

```html
<!DOCTYPE html>
<html>
<head>
    <title>Cash Flow Dashboard</title>
    <link rel="stylesheet" href="../../common/sixorbit-common.css">
    <link rel="stylesheet" href="cashflow-dashboard.css">
</head>
<body>
    <div id="cashflow-container"></div>

    <script src="cashflow-dashboard-v2.js"></script>
    <script>
        const data = {
            company: "My Company",
            period: { start: "2025-01-01", end: "2025-12-31" },
            cashflow: {
                inflow: { groups: [ /* ... */ ] },
                outflow: { groups: [ /* ... */ ] }
            }
        };

        const dashboard = new CashFlowDashboard('cashflow-container', {
            data: data
        });
    </script>
</body>
</html>
```

### Example 2: With Control Buttons

```html
<div class="controls">
    <button onclick="dashboard.setNumberFormat('full')">Full Format</button>
    <button onclick="dashboard.setNumberFormat('short')">Short Format</button>
    <button onclick="dashboard.expandAll()">Expand All</button>
    <button onclick="dashboard.collapseAll()">Collapse All</button>
</div>

<div id="cashflow-container"></div>

<script>
    const dashboard = new CashFlowDashboard('cashflow-container', {
        data: cashflowData,
        numberFormat: 'short'
    });
</script>
```

### Example 3: Dynamic Data Loading

```javascript
// Function to fetch data from API
async function loadCashFlowReport(startDate, endDate) {
    try {
        const response = await fetch(`/api/cashflow?start=${startDate}&end=${endDate}`);
        const data = await response.json();

        // Initialize or reload dashboard
        if (!window.dashboard) {
            window.dashboard = new CashFlowDashboard('cashflow-container', {
                data: data,
                numberFormat: 'short'
            });
        } else {
            window.dashboard.reload(data);
        }
    } catch (error) {
        console.error('Failed to load cash flow data:', error);
    }
}

// Load report for current quarter
loadCashFlowReport('2025-01-01', '2025-03-31');
```

### Example 4: With Filters

```html
<div class="filters">
    <label>
        Start Date: <input type="date" id="startDate" value="2025-01-01">
    </label>
    <label>
        End Date: <input type="date" id="endDate" value="2025-12-31">
    </label>
    <button onclick="refreshReport()">Refresh</button>
</div>

<div id="cashflow-container"></div>

<script>
    let dashboard;

    async function refreshReport() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        // Fetch data for selected period
        const data = await fetchDataForPeriod(startDate, endDate);

        // Update dashboard
        if (dashboard) {
            dashboard.reload(data);
        } else {
            dashboard = new CashFlowDashboard('cashflow-container', {
                data: data
            });
        }
    }

    // Initial load
    refreshReport();
</script>
```

---

## Styling

### Custom Styling

The plugin uses CSS classes prefixed with `cf-` (cashflow). You can override these in your own CSS:

```css
/* Customize colors */
.cf-inflow-section {
    background: your-color;
}

.cf-outflow-section {
    background: your-color;
}

/* Customize fonts */
.cf-group-name,
.cf-ledger-name {
    font-family: your-font;
}

/* Customize spacing */
.cf-table {
    padding: your-padding;
}
```

### Using Common Design Tokens

The plugin automatically inherits design tokens from `sixorbit-common.css`:

```css
/* Use design system variables */
.cf-custom-element {
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
- CSS Grid support
- Flexbox support

---

## Troubleshooting

### Dashboard not appearing

1. **Check container ID**: Make sure the ID matches exactly (without #)
   ```javascript
   // Correct
   new CashFlowDashboard('cashflow-container', options);

   // Wrong
   new CashFlowDashboard('#cashflow-container', options);
   ```

2. **Verify CSS files are loaded**: Check browser console for 404 errors

3. **Check data format**: Ensure data follows the required structure

### Numbers not formatting correctly

```javascript
// Make sure numberFormat is set correctly
dashboard.setNumberFormat('short');  // for ₹1.23M format
dashboard.setNumberFormat('full');   // for 1,234,567.89 format
```

### Progress bars not showing

- Check `showProgressBarsOnMobile` option
- Verify you're not overriding CSS

---

## Complete Integration Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Flow Dashboard - Integration</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Required Styles -->
    <link rel="stylesheet" href="../../common/sixorbit-common.css">
    <link rel="stylesheet" href="cashflow-dashboard.css">

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
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .controls {
            background: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .controls button {
            padding: 8px 16px;
            background: #1a73e8;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .controls button:hover {
            background: #1765cc;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="page-header">
        <h1>Cash Flow Analysis</h1>
        <p>Comprehensive financial reporting for Q1 2025</p>
    </div>

    <!-- Controls -->
    <div class="controls">
        <button onclick="dashboard.setNumberFormat('full')">Full Numbers</button>
        <button onclick="dashboard.setNumberFormat('short')">Short Format</button>
        <button onclick="dashboard.expandAll()">Expand All</button>
        <button onclick="dashboard.collapseAll()">Collapse All</button>
        <button onclick="refreshData()">Refresh Data</button>
    </div>

    <!-- Dashboard Container -->
    <div id="cashflow-container"></div>

    <!-- Plugin JavaScript -->
    <script src="cashflow-dashboard-v2.js"></script>

    <!-- Your Integration Code -->
    <script>
        // Your cash flow data
        const cashflowData = {
            company: "Acme Corporation",
            period: {
                start: "2025-01-01",
                end: "2025-03-31"
            },
            cashflow: {
                inflow: {
                    groups: [
                        // Your inflow data
                    ]
                },
                outflow: {
                    groups: [
                        // Your outflow data
                    ]
                }
            }
        };

        // Initialize dashboard
        let dashboard;

        document.addEventListener('DOMContentLoaded', function() {
            dashboard = new CashFlowDashboard('cashflow-container', {
                data: cashflowData,
                numberFormat: 'short',
                showProgressBarsOnMobile: false
            });
        });

        // Refresh function
        async function refreshData() {
            // Fetch fresh data from your API
            const response = await fetch('/api/cashflow');
            const newData = await response.json();

            // Reload dashboard
            dashboard.reload(newData);
        }
    </script>
</body>
</html>
```

---

## Support

For questions or issues:
1. Check this guide
2. Review the demo file: `index.html`
3. Check the example data structure
4. Contact SixOrbit development team

---

**Plugin:** Cash Flow Dashboard v2.0.0
**Last Updated:** 2026-01-08
**Module:** Finance
