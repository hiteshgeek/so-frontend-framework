# Profit & Loss Statement - Developer Guide

## Overview

The Profit & Loss Statement is a comprehensive financial reporting plugin that displays a two-part accounting statement for calculating gross profit and net profit. The plugin features expandable/collapsible account groups, visual pie charts for expense and revenue breakdowns, and optional percentage-of-sales calculations.

**Key Features:**
- **Two-Part Structure:** Trading Account (calculates Gross Profit) + P&L Account (calculates Net Profit)
- **Expandable Groups:** Drill down into expense and revenue categories
- **Visual Charts:** Pie charts showing expense and revenue composition
- **Percentage Analysis:** Display amounts as percentage of total sales
- **Full Indian Numbering:** All currency values displayed with Indian number formatting (₹1,23,45,678.90)
- **Debit/Credit Columns:** Standard accounting format with balance calculations

**Version:** 1.0.0
**Module:** Finance
**Plugin Type:** Framework-agnostic JavaScript

---

## Table of Contents

1. [Quick Start](#quick-start)
2. [Installation](#installation)
3. [Basic Usage](#basic-usage)
4. [Configuration Options](#configuration-options)
5. [Data Format](#data-format)
6. [Understanding the Two-Part Structure](#understanding-the-two-part-structure)
7. [Methods](#methods)
8. [Examples](#examples)
9. [Styling](#styling)
10. [Browser Support](#browser-support)
11. [Troubleshooting](#troubleshooting)

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
    <link rel="stylesheet" href="pl-statement.css">
</head>
<body>
    <!-- Container -->
    <div id="pl-container"></div>

    <!-- Required: Plugin JavaScript -->
    <script src="pl-statement.js"></script>

    <script>
        // Initialize
        const plStatement = new ProfitLossStatement('pl-container', {
            data: yourDataObject,
            showPercentageOfSales: false
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
<link rel="stylesheet" href="pl-statement.css">

<!-- Optional: Google Fonts for better typography -->
<link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
```

### Step 2: Include JavaScript

```html
<!-- Plugin JavaScript (Required) -->
<script src="pl-statement.js"></script>

<!-- Optional: ECharts for better chart performance (auto-loaded by plugin) -->
<!-- The plugin will auto-load ECharts from CDN if not present -->
```

### Step 3: Create Container

```html
<!-- Container where the P&L statement will be rendered -->
<div id="pl-container"></div>
```

---

## Basic Usage

### Initialize the Plugin

```javascript
// Create instance
const plStatement = new ProfitLossStatement(containerId, options);
```

**Parameters:**
- `containerId` (String): ID of the container element (without #)
- `options` (Object): Configuration options

**Example:**

```javascript
const plStatement = new ProfitLossStatement('pl-container', {
    data: plData,
    showPercentageOfSales: false
});
```

---

## Configuration Options

### Available Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `data` | Object | **Required** | P&L statement data object (see Data Format below) |
| `showPercentageOfSales` | Boolean | `false` | Whether to show percentage of sales column in tables |

### Option Details

#### `data` (Required)

The main data object containing company info and P&L statement data.

```javascript
{
    data: {
        company: "Company Name",
        period: {
            start: "2025-04-01",
            end: "2026-03-31"
        },
        plstatement: {
            expenses: { /* ... */ },
            revenue: { /* ... */ }
        }
    }
}
```

#### `showPercentageOfSales`

Controls whether the "% of Sales" column is displayed:

- `false` - Hides the percentage column (default)
- `true` - Shows percentage of total sales for each item

```javascript
{
    showPercentageOfSales: true  // or false
}
```

---

## Data Format

### Understanding the Two-Part Structure

The P&L statement consists of two parts:

**Part 1: Trading Account**
- Calculates **Gross Profit**
- Left side: Opening Stock + Purchases + Direct Expenses
- Right side: Sales + Direct Incomes + Closing Stock
- Balancing item: Gross Profit (if profit)

**Part 2: P&L Account**
- Calculates **Net Profit**
- Left side: Gross Profit (b/f) + Indirect Expenses
- Right side: Gross Profit (b/f) + Indirect Incomes
- Balancing item: Net Profit (if profit)

### Complete Data Structure

```javascript
const plData = {
    // Company Information
    company: "Your Company Name",

    // Reporting Period
    period: {
        start: "YYYY-MM-DD",  // Start date
        end: "YYYY-MM-DD"      // End date
    },

    // P&L Statement Data
    plstatement: {
        // Expense Side (Left side of Trading Account + P&L Account)
        expenses: {
            // Opening Stock (beginning inventory value)
            openingStock: {
                id: "opening_stock",
                name: "Opening Stock",
                type: "ledger",
                debit: 0,      // Amount debited
                credit: 0      // Amount credited
            },

            // Purchase Accounts (goods purchased for resale)
            purchaseAccounts: {
                id: "purchase_accounts",
                name: "Purchase Accounts",
                type: "group",
                children: [
                    // Nested ledgers or groups
                ]
            },

            // Direct Expenses (directly related to production)
            directExpenses: {
                id: "direct_expenses",
                name: "Direct Expenses",
                type: "group",
                children: [
                    // Nested ledgers or groups
                ]
            },

            // Indirect Expenses (operating & admin expenses)
            indirectExpenses: {
                id: "indirect_expenses",
                name: "Indirect Expenses",
                type: "group",
                children: [
                    // Nested ledgers or groups
                ]
            }
        },

        // Revenue Side (Right side of Trading Account + P&L Account)
        revenue: {
            // Sales Accounts (revenue from sales of goods)
            salesAccounts: {
                id: "sales_accounts",
                name: "Sales Accounts",
                type: "group",
                children: [
                    // Nested ledgers or groups
                ]
            },

            // Direct Incomes (income directly from production)
            directIncomes: {
                id: "direct_incomes",
                name: "Direct Incomes",
                type: "group",
                children: [
                    // Nested ledgers or groups
                ]
            },

            // Closing Stock (ending inventory value)
            closingStock: {
                id: "closing_stock",
                name: "Closing Stock",
                type: "ledger",
                debit: 0,      // Amount debited
                credit: 0      // Amount credited
            },

            // Indirect Incomes (other revenue sources)
            indirectIncomes: {
                id: "indirect_incomes",
                name: "Indirect Incomes",
                type: "group",
                children: [
                    // Nested ledgers or groups
                ]
            }
        }
    }
};
```

### Item Types

#### Group Item

A collapsible container for organizing related accounts:

```javascript
{
    id: "salary_expenses",                // Unique identifier
    name: "Salary Expenses",              // Display name
    type: "group",                        // Item type
    children: [                           // Nested items
        {
            id: "basic_salary",
            name: "Basic Salary",
            type: "ledger",
            debit: 500000,
            credit: 0
        },
        {
            id: "allowances",
            name: "Allowances",
            type: "ledger",
            debit: 200000,
            credit: 0
        }
    ]
}
```

#### Ledger Item

A final account entry with debit and credit amounts:

```javascript
{
    id: "server_expense",                 // Unique identifier
    name: "Server Expense",               // Display name
    type: "ledger",                       // Item type
    debit: 3926206,                       // Debit amount
    credit: 0                             // Credit amount
}
```

### Balance Calculation

The balance for each ledger is calculated as: **Credit - Debit**

- Positive balance = Credit balance (Cr)
- Negative balance = Debit balance (Dr)

### Complete Example with All Sections

```javascript
const plData = {
    company: "Acme Manufacturing Ltd",
    period: {
        start: "2025-04-01",
        end: "2026-03-31"
    },
    plstatement: {
        expenses: {
            // TRADING ACCOUNT LEFT SIDE
            openingStock: {
                id: "opening_stock",
                name: "Opening Stock",
                type: "ledger",
                debit: 0,
                credit: 500000
            },

            purchaseAccounts: {
                id: "purchase_accounts",
                name: "Purchases",
                type: "group",
                children: [
                    {
                        id: "raw_materials",
                        name: "Raw Materials Purchased",
                        type: "ledger",
                        debit: 5000000,
                        credit: 0
                    },
                    {
                        id: "components",
                        name: "Components Purchased",
                        type: "ledger",
                        debit: 2000000,
                        credit: 0
                    }
                ]
            },

            directExpenses: {
                id: "direct_expenses",
                name: "Direct Expenses",
                type: "group",
                children: [
                    {
                        id: "freight_inward",
                        name: "Freight Inward",
                        type: "ledger",
                        debit: 300000,
                        credit: 0
                    },
                    {
                        id: "labor_cost",
                        name: "Direct Labor Cost",
                        type: "ledger",
                        debit: 1500000,
                        credit: 0
                    }
                ]
            },

            // P&L ACCOUNT LEFT SIDE
            indirectExpenses: {
                id: "indirect_expenses",
                name: "Operating Expenses",
                type: "group",
                children: [
                    {
                        id: "office_rent",
                        name: "Office Rent",
                        type: "ledger",
                        debit: 1200000,
                        credit: 0
                    },
                    {
                        id: "utilities",
                        name: "Utilities",
                        type: "ledger",
                        debit: 300000,
                        credit: 0
                    },
                    {
                        id: "salaries",
                        name: "Salaries & Wages",
                        type: "group",
                        children: [
                            {
                                id: "admin_salaries",
                                name: "Admin Salaries",
                                type: "ledger",
                                debit: 2000000,
                                credit: 0
                            },
                            {
                                id: "marketing_salaries",
                                name: "Marketing Salaries",
                                type: "ledger",
                                debit: 1000000,
                                credit: 0
                            }
                        ]
                    }
                ]
            }
        },

        revenue: {
            // TRADING ACCOUNT RIGHT SIDE
            salesAccounts: {
                id: "sales_accounts",
                name: "Sales",
                type: "group",
                children: [
                    {
                        id: "domestic_sales",
                        name: "Domestic Sales",
                        type: "ledger",
                        debit: 500000,
                        credit: 8000000
                    },
                    {
                        id: "export_sales",
                        name: "Export Sales",
                        type: "ledger",
                        debit: 200000,
                        credit: 2500000
                    }
                ]
            },

            directIncomes: {
                id: "direct_incomes",
                name: "Direct Incomes",
                type: "group",
                children: []
            },

            closingStock: {
                id: "closing_stock",
                name: "Closing Stock",
                type: "ledger",
                debit: 0,
                credit: 800000
            },

            // P&L ACCOUNT RIGHT SIDE
            indirectIncomes: {
                id: "indirect_incomes",
                name: "Other Income",
                type: "group",
                children: [
                    {
                        id: "interest_income",
                        name: "Interest Income",
                        type: "ledger",
                        debit: 0,
                        credit: 100000
                    },
                    {
                        id: "commission_income",
                        name: "Commission Income",
                        type: "ledger",
                        debit: 0,
                        credit: 150000
                    }
                ]
            }
        }
    }
};
```

---

## Understanding the Two-Part Structure

### Part 1: Trading Account

The Trading Account calculates **Gross Profit** or **Gross Loss**.

**Left Side (Debit/Expense side):**
- Opening Stock
- Purchases
- Direct Expenses
- **Gross Profit** (if total debit < total credit)

**Right Side (Credit/Revenue side):**
- Sales
- Direct Incomes
- Closing Stock
- **Gross Profit** (if total credit > total debit, appears for balancing)

**Calculation:**
```
Gross Profit = (Sales + Direct Incomes + Closing Stock) - (Opening Stock + Purchases + Direct Expenses)
```

### Part 2: P&L Account (Profit & Loss Account)

The P&L Account calculates **Net Profit** or **Net Loss**.

**Left Side (Debit/Expense side):**
- Gross Profit Brought Forward
- Indirect Expenses
- **Net Profit** (if total debit < total credit)

**Right Side (Credit/Revenue side):**
- Gross Profit Brought Forward
- Indirect Incomes
- **Net Loss** (if total debit > total credit, appears for balancing)

**Calculation:**
```
Net Profit = Gross Profit + Indirect Incomes - Indirect Expenses
```

### Key Accounting Principles

1. **Debit and Credit:**
   - Debit column shows amounts charged to the account
   - Credit column shows amounts credited to the account
   - Balance = Credit - Debit

2. **Balance Format:**
   - Positive balance shown as "Cr" (Credit balance)
   - Negative balance shown as "Dr" (Debit balance)

3. **Percentage of Sales:**
   - When enabled, shows each item as percentage of total sales
   - Formula: (Item Balance / Total Sales) × 100
   - Always displayed in full format (never abbreviated)

---

## Methods

### Public Methods

#### `expandAll()`

Expand all collapsible account groups in both Trading Account and P&L Account.

**Example:**
```javascript
plStatement.expandAll();
```

#### `collapseAll()`

Collapse all collapsible account groups in both accounts.

**Example:**
```javascript
plStatement.collapseAll();
```

#### `togglePercentage()`

Toggle the display of the percentage of sales column.

**Example:**
```javascript
plStatement.togglePercentage();
```

#### `reload(newData)`

Reload the P&L statement with new data without reinitializing.

**Parameters:**
- `newData` (Object): New P&L statement data object

**Example:**
```javascript
// Fetch fresh data from server
const freshData = await fetch('/api/pl-statement').then(r => r.json());

// Reload dashboard
plStatement.reload(freshData);
```

---

## Examples

### Example 1: Basic Implementation

```html
<!DOCTYPE html>
<html>
<head>
    <title>Profit & Loss Statement</title>
    <link rel="stylesheet" href="../../common/sixorbit-common.css">
    <link rel="stylesheet" href="pl-statement.css">
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
</head>
<body>
    <div id="pl-container"></div>

    <script src="pl-statement.js"></script>
    <script>
        const data = {
            company: "My Company Ltd",
            period: { start: "2025-01-01", end: "2025-12-31" },
            plstatement: {
                expenses: { /* ... */ },
                revenue: { /* ... */ }
            }
        };

        const plStatement = new ProfitLossStatement('pl-container', {
            data: data
        });
    </script>
</body>
</html>
```

### Example 2: With Control Buttons

```html
<div class="controls">
    <button onclick="plStatement.expandAll()">Expand All</button>
    <button onclick="plStatement.collapseAll()">Collapse All</button>
    <button onclick="plStatement.togglePercentage()">Show % of Sales</button>
    <button onclick="refreshReport()">Refresh Data</button>
</div>

<div id="pl-container"></div>

<script>
    let plStatement;

    // Function to refresh data
    async function refreshReport() {
        const freshData = await fetch('/api/pl-statement').then(r => r.json());
        if (plStatement) {
            plStatement.reload(freshData);
        }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        const initialData = { /* ... */ };
        plStatement = new ProfitLossStatement('pl-container', {
            data: initialData,
            showPercentageOfSales: false
        });
    });
</script>
```

### Example 3: Dynamic Data Loading

```javascript
// Function to fetch data from API
async function loadPLReport(startDate, endDate) {
    try {
        const response = await fetch(`/api/pl-statement?start=${startDate}&end=${endDate}`);
        const data = await response.json();

        // Initialize or reload statement
        if (!window.plStatement) {
            window.plStatement = new ProfitLossStatement('pl-container', {
                data: data,
                showPercentageOfSales: false
            });
        } else {
            window.plStatement.reload(data);
        }
    } catch (error) {
        console.error('Failed to load P&L statement:', error);
    }
}

// Load report for fiscal year
loadPLReport('2025-04-01', '2026-03-31');
```

### Example 4: With Date Range Filter

```html
<div class="filters">
    <label>
        Start Date: <input type="date" id="startDate" value="2025-04-01">
    </label>
    <label>
        End Date: <input type="date" id="endDate" value="2026-03-31">
    </label>
    <button onclick="refreshReport()">Generate Report</button>
</div>

<div id="pl-container"></div>

<script>
    let plStatement;

    async function refreshReport() {
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        // Fetch data for selected period
        const response = await fetch(`/api/pl-statement?start=${startDate}&end=${endDate}`);
        const data = await response.json();

        // Update statement
        if (plStatement) {
            plStatement.reload(data);
        } else {
            plStatement = new ProfitLossStatement('pl-container', {
                data: data,
                showPercentageOfSales: false
            });
        }
    }

    // Initial load
    refreshReport();
</script>
```

### Example 5: Multiple Statement Comparison

```html
<div class="comparison-container">
    <div style="display: flex; gap: 20px;">
        <div style="flex: 1;">
            <h2>FY 2024-25</h2>
            <div id="pl-container-2024"></div>
        </div>
        <div style="flex: 1;">
            <h2>FY 2025-26</h2>
            <div id="pl-container-2025"></div>
        </div>
    </div>
</div>

<script>
    // Load both years' data
    async function loadComparison() {
        const [data2024, data2025] = await Promise.all([
            fetch('/api/pl-statement?year=2024').then(r => r.json()),
            fetch('/api/pl-statement?year=2025').then(r => r.json())
        ]);

        new ProfitLossStatement('pl-container-2024', { data: data2024 });
        new ProfitLossStatement('pl-container-2025', { data: data2025 });
    }

    loadComparison();
</script>
```

---

## Styling

### Custom Styling

The plugin uses CSS classes prefixed with `pl-` (profit loss). You can override these in your own CSS:

```css
/* Customize colors */
.pl-statement {
    background: your-color;
}

.pl-section-header {
    background: your-section-color;
}

/* Customize table appearance */
.pl-table {
    border-spacing: 0;
    width: 100%;
}

.pl-td-debit,
.pl-td-credit,
.pl-td-balance,
.pl-td-percentage {
    text-align: right;
}

/* Customize profit/loss color */
.pl-profit {
    color: #34a853;  /* Green for profit */
}

.pl-loss {
    color: #ea4335;   /* Red for loss */
}

/* Customize group appearance */
.pl-account-name {
    font-weight: 500;
}

.pl-toggle {
    cursor: pointer;
    user-select: none;
}

.pl-toggle.expanded {
    transform: rotate(90deg);
}

/* Customize metrics cards */
.pl-metric-card {
    background: white;
    padding: 16px;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

/* Customize control buttons */
.pl-control-btn {
    padding: 8px 16px;
    background: #f0f0f0;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.2s;
}

.pl-control-btn:hover {
    background: #e0e0e0;
}

.pl-control-btn.active {
    background: #4285f4;
    color: white;
    border-color: #4285f4;
}
```

### Using Common Design Tokens

The plugin automatically inherits design tokens from `sixorbit-common.css`:

```css
/* Use design system variables */
.pl-custom-element {
    color: var(--so-primary);
    padding: var(--so-space-lg);
    border-radius: var(--so-radius-md);
    box-shadow: var(--so-shadow-1);
}
```

### Important CSS Classes

Key classes for styling the P&L statement:

| Class | Purpose |
|-------|---------|
| `.pl-statement` | Main container |
| `.pl-header` | Header section with company info |
| `.pl-metrics-grid` | Grid of metric cards (Sales, Gross Profit, Net Profit) |
| `.pl-metric-card` | Individual metric card |
| `.pl-controls` | Control buttons container |
| `.pl-charts-grid` | Grid for expense and revenue charts |
| `.pl-section` | Trading Account or P&L Account section |
| `.pl-two-column-grid` | Two-column layout for debit/credit sides |
| `.pl-table` | Account table |
| `.pl-table-header` | Table header row |
| `.pl-table-row` | Individual row |
| `.pl-td-particulars` | Account name column |
| `.pl-td-debit` | Debit amount column |
| `.pl-td-credit` | Credit amount column |
| `.pl-td-balance` | Balance column |
| `.pl-td-percentage` | Percentage of sales column |
| `.pl-debit` | Debit balance indicator |
| `.pl-credit` | Credit balance indicator |
| `.pl-total-row` | Total row styling |
| `.pl-balancing-row` | Balancing item (Gross/Net Profit) row |

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
- ResizeObserver API (for chart resizing)

---

## Troubleshooting

### Statement not appearing

1. **Check container ID**: Make sure the ID matches exactly (without #)
   ```javascript
   // Correct
   new ProfitLossStatement('pl-container', options);

   // Wrong
   new ProfitLossStatement('#pl-container', options);
   ```

2. **Verify CSS files are loaded**: Check browser console for 404 errors
   - sixorbit-common.css should load
   - pl-statement.css should load
   - Google Fonts should load

3. **Check data format**: Ensure data follows the required structure with:
   - `company` property
   - `period` object with start and end dates
   - `plstatement` object with `expenses` and `revenue` sections

### Data not displaying correctly

1. **Verify debit/credit values**: Each ledger must have both `debit` and `credit` properties
   ```javascript
   // Correct
   {
       id: "sales",
       name: "Sales",
       type: "ledger",
       debit: 100000,      // Both required
       credit: 500000
   }

   // Wrong
   {
       id: "sales",
       name: "Sales",
       type: "ledger",
       amount: 400000      // Use debit/credit instead
   }
   ```

2. **Check account structure**: Each expenses/revenue section must have the required subsections
   - expenses: openingStock, purchaseAccounts, directExpenses, indirectExpenses
   - revenue: salesAccounts, directIncomes, closingStock, indirectIncomes

3. **Verify group children**: Groups must have a `children` array (can be empty)
   ```javascript
   // Correct
   {
       id: "expenses",
       name: "Expenses",
       type: "group",
       children: [ /* ... */ ]  // Required for groups
   }
   ```

### Calculations seem incorrect

1. **Balance formula**: Verify that balance = credit - debit
   - Positive = Credit balance (Cr)
   - Negative = Debit balance (Dr)

2. **Gross Profit calculation**: Should be
   - Right side total: Sales + Direct Incomes + Closing Stock (credits)
   - Left side total: Opening Stock + Purchases + Direct Expenses (debits)
   - Gross Profit = Right side - Left side

3. **Net Profit calculation**: Should be
   - Gross Profit + Indirect Incomes - Indirect Expenses

### Charts not showing

1. **Check ECharts library**: The plugin auto-loads ECharts from CDN
   - If CDN is blocked, manually include: `<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>`

2. **Check data values**: Charts filter out zero values
   - Ensure at least one category has a non-zero balance

3. **Check chart container size**: Charts need a defined height
   - Chart containers have `height: 300px` by default

### Percentage column not showing

```javascript
// Make sure showPercentageOfSales is set correctly
plStatement = new ProfitLossStatement('pl-container', {
    data: plData,
    showPercentageOfSales: true  // Must be true to show percentages
});

// Or toggle using method
plStatement.togglePercentage();
```

### Performance issues with large data sets

1. **Lazy load child groups**: Start with groups collapsed
   ```javascript
   // Initialize without expanded nodes
   const plStatement = new ProfitLossStatement('pl-container', {
       data: largeDataSet,
       showPercentageOfSales: false
   });
   // Users can expand as needed
   ```

2. **Optimize data structure**: Avoid deeply nested groups
   - Keep nesting to maximum 3-4 levels

3. **Monitor chart performance**: Charts resize automatically
   - Disable if unnecessary or move to separate pages

---

## Complete Integration Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profit & Loss Statement - Full Integration</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <!-- Required Styles -->
    <link rel="stylesheet" href="../../common/sixorbit-common.css">
    <link rel="stylesheet" href="pl-statement.css">

    <style>
        body {
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
            font-family: 'Google Sans', 'Roboto', sans-serif;
        }

        .page-header {
            background: linear-gradient(135deg, #34a853 0%, #2d8e47 100%);
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }

        .page-header h1 {
            margin: 0 0 10px 0;
            font-size: 28px;
            font-weight: 500;
        }

        .page-header p {
            margin: 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .filters {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filters label {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .filters input {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .filters button {
            padding: 8px 20px;
            background: #1a73e8;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
        }

        .filters button:hover {
            background: #1765cc;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
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
            background: #f0f0f0;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
        }

        .controls button:hover {
            background: #e0e0e0;
        }

        .controls button.active {
            background: #4285f4;
            color: white;
            border-color: #4285f4;
        }

        .statement-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .error-message {
            background: #ffebee;
            color: #c62828;
            padding: 16px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid #c62828;
        }

        .success-message {
            background: #e8f5e9;
            color: #2e7d32;
            padding: 16px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid #2e7d32;
        }

        .loading {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .loading .spinner {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 4px solid #f0f0f0;
            border-top: 4px solid #1a73e8;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="page-header">
        <h1>Profit & Loss Statement</h1>
        <p>Comprehensive financial analysis with two-part accounting structure</p>
    </div>

    <!-- Messages Container -->
    <div id="messagesContainer"></div>

    <!-- Filters -->
    <div class="filters">
        <label>
            Start Date: <input type="date" id="startDate" value="2025-04-01">
        </label>
        <label>
            End Date: <input type="date" id="endDate" value="2026-03-31">
        </label>
        <button onclick="refreshReport()">Generate Report</button>
    </div>

    <!-- Controls -->
    <div class="controls">
        <button onclick="plStatement && plStatement.expandAll()">Expand All</button>
        <button onclick="plStatement && plStatement.collapseAll()">Collapse All</button>
        <button onclick="plStatement && plStatement.togglePercentage()" id="percentageBtn">Show % of Sales</button>
    </div>

    <!-- Statement Container -->
    <div class="statement-container">
        <div id="pl-container"></div>
    </div>

    <!-- Plugin JavaScript -->
    <script src="pl-statement.js"></script>

    <!-- Integration Script -->
    <script>
        let plStatement;
        let isLoading = false;

        // Show message function
        function showMessage(message, type) {
            const container = document.getElementById('messagesContainer');
            const className = type === 'error' ? 'error-message' : 'success-message';
            const messageEl = document.createElement('div');
            messageEl.className = className;
            messageEl.textContent = message;
            container.innerHTML = '';
            container.appendChild(messageEl);

            // Auto-hide after 5 seconds
            setTimeout(() => {
                messageEl.remove();
            }, 5000);
        }

        // Show loading state
        function showLoading(show) {
            isLoading = show;
            const container = document.getElementById('pl-container');
            if (show) {
                container.innerHTML = '<div class="loading"><div class="spinner"></div><p>Loading P&L statement...</p></div>';
            }
        }

        // Refresh report
        async function refreshReport() {
            if (isLoading) return;

            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            if (!startDate || !endDate) {
                showMessage('Please select both start and end dates', 'error');
                return;
            }

            showLoading(true);

            try {
                // Fetch data from API or use static data
                // For demo purposes, using static data
                const plData = {
                    company: "Sample Company Ltd",
                    period: {
                        start: startDate,
                        end: endDate
                    },
                    plstatement: {
                        expenses: {
                            openingStock: {
                                id: "opening_stock",
                                name: "Opening Stock",
                                type: "ledger",
                                debit: 0,
                                credit: 500000
                            },
                            purchaseAccounts: {
                                id: "purchase_accounts",
                                name: "Purchases",
                                type: "group",
                                children: [
                                    {
                                        id: "raw_materials",
                                        name: "Raw Materials",
                                        type: "ledger",
                                        debit: 5000000,
                                        credit: 0
                                    }
                                ]
                            },
                            directExpenses: {
                                id: "direct_expenses",
                                name: "Direct Expenses",
                                type: "group",
                                children: [
                                    {
                                        id: "labor",
                                        name: "Direct Labor",
                                        type: "ledger",
                                        debit: 1500000,
                                        credit: 0
                                    }
                                ]
                            },
                            indirectExpenses: {
                                id: "indirect_expenses",
                                name: "Indirect Expenses",
                                type: "group",
                                children: [
                                    {
                                        id: "salaries",
                                        name: "Salaries",
                                        type: "ledger",
                                        debit: 3000000,
                                        credit: 0
                                    }
                                ]
                            }
                        },
                        revenue: {
                            salesAccounts: {
                                id: "sales_accounts",
                                name: "Sales",
                                type: "group",
                                children: [
                                    {
                                        id: "sales",
                                        name: "Sales",
                                        type: "ledger",
                                        debit: 0,
                                        credit: 10000000
                                    }
                                ]
                            },
                            directIncomes: {
                                id: "direct_incomes",
                                name: "Direct Incomes",
                                type: "group",
                                children: []
                            },
                            closingStock: {
                                id: "closing_stock",
                                name: "Closing Stock",
                                type: "ledger",
                                debit: 0,
                                credit: 800000
                            },
                            indirectIncomes: {
                                id: "indirect_incomes",
                                name: "Other Income",
                                type: "group",
                                children: [
                                    {
                                        id: "interest",
                                        name: "Interest Income",
                                        type: "ledger",
                                        debit: 0,
                                        credit: 100000
                                    }
                                ]
                            }
                        }
                    }
                };

                showLoading(false);

                // Initialize or reload
                if (plStatement) {
                    plStatement.reload(plData);
                } else {
                    plStatement = new ProfitLossStatement('pl-container', {
                        data: plData,
                        showPercentageOfSales: false
                    });
                }

                showMessage('P&L statement loaded successfully', 'success');
            } catch (error) {
                showLoading(false);
                showMessage('Failed to load P&L statement: ' + error.message, 'error');
                console.error('Error:', error);
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            refreshReport();
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
3. Check the example data structures
4. Verify all required CSS and JS files are loaded
5. Contact SixOrbit development team

---

**Plugin:** Profit & Loss Statement v1.0.0
**Last Updated:** 2026-01-08
**Module:** Finance
