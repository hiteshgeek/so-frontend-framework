# Cash Flow Dashboard Plugin

A framework-agnostic JavaScript plugin for displaying hierarchical cash flow data with interactive visualizations.

## Features

✨ **Framework Agnostic** - Works with vanilla JavaScript, React, Vue, Angular, or any framework
📊 **Interactive Charts** - Two-level sunburst charts using ECharts
🎨 **Google Material Design** - Clean, modern UI with Google Sans font
📱 **Fully Responsive** - Works perfectly on desktop, tablet, and mobile
🔢 **Number Formatting** - Toggle between short (₹40.50L) and full (₹40,49,985.91) formats
🌳 **Hierarchical Tree View** - Expandable/collapsible nested data structure
⚡ **Auto-loading Dependencies** - Automatically loads Google Fonts and ECharts if not present
🔄 **Dynamic Data Loading** - Load and reload data at any time
🎯 **No CSS Conflicts** - All styles scoped to `.cashflow-dashboard` class

## File Structure

```
cashflow-dashboard/
├── cashflow-dashboard-v2.js    # Plugin JavaScript
├── cashflow-dashboard.css      # Plugin styles (scoped, no conflicts)
├── cashflow-data.json          # Sample data file
├── example-complete.html       # Complete working example
└── README_PLUGIN.md           # This file
```

## Installation

### Option 1: Direct Include

```html
<!-- Load CSS -->
<link rel="stylesheet" href="cashflow-dashboard.css">

<!-- Your container -->
<div id="my-dashboard"></div>

<!-- Load JS -->
<script src="cashflow-dashboard-v2.js"></script>
```

### Option 2: NPM (if packaged)

```bash
npm install cashflow-dashboard
```

## Quick Start

### 1. Include the files

```html
<link rel="stylesheet" href="cashflow-dashboard.css">
<script src="cashflow-dashboard-v2.js"></script>
```

### 2. Create a container

```html
<div id="my-dashboard"></div>
```

### 3. Initialize the plugin

```javascript
const dashboard = new CashFlowDashboard('my-dashboard', {
    numberFormat: 'short',
    showProgressBarsOnMobile: false
});

// Load data from JSON file
fetch('cashflow-data.json')
    .then(response => response.json())
    .then(data => dashboard.loadData(data));

// OR initialize with data directly
const dashboard = new CashFlowDashboard('my-dashboard', {
    data: yourCashFlowData,
    numberFormat: 'short'
});
```

## Configuration Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `data` | Object | `null` | Initial cash flow data (JSON format) |
| `numberFormat` | String | `'short'` | Number format: `'short'` or `'full'` |
| `showProgressBarsOnMobile` | Boolean | `false` | Show progress bars on mobile devices |

## API Methods

### `loadData(jsonData)`
Load or reload cash flow data.

```javascript
dashboard.loadData(newCashFlowData);
```

### `setNumberFormat(format)`
Change number format between 'short' and 'full'.

```javascript
dashboard.setNumberFormat('full'); // Show full numbers
dashboard.setNumberFormat('short'); // Show abbreviated numbers
```

## Data Format

### JSON Structure

```json
{
  "company": "Company Name",
  "period": {
    "start": "2025-04-01",
    "end": "2025-05-30"
  },
  "cashflow": {
    "inflow": {
      "groups": [...]
    },
    "outflow": {
      "groups": [...]
    }
  }
}
```

### Group Node (Can contain children)

```json
{
  "id": "unique_id",
  "name": "Group Name",
  "type": "group",
  "children": [...]
}
```

### Ledger Node (End node with amount)

```json
{
  "id": "unique_id",
  "name": "Ledger Name",
  "type": "ledger",
  "amount": 123456
}
```

## Examples

### Basic Usage

```html
<!DOCTYPE html>
<html>
<head>
    <title>Cash Flow Dashboard</title>
</head>
<body>
    <div id="dashboard"></div>
    
    <script src="cashflow-dashboard.js"></script>
    <script>
        const data = {
            "company": "ABC Corp",
            "period": {"start": "2025-01-01", "end": "2025-03-31"},
            "cashflow": {
                "inflow": {
                    "groups": [{
                        "id": "revenue",
                        "name": "Revenue",
                        "type": "group",
                        "children": [{
                            "id": "sales",
                            "name": "Sales",
                            "type": "ledger",
                            "amount": 1000000
                        }]
                    }]
                },
                "outflow": {
                    "groups": [{
                        "id": "expenses",
                        "name": "Expenses",
                        "type": "ledger",
                        "amount": 500000
                    }]
                }
            }
        };

        const dashboard = new CashFlowDashboard('dashboard', {
            data: data
        });
    </script>
</body>
</html>
```

### With React

```jsx
import { useEffect, useRef } from 'react';

function CashFlowReport({ data }) {
    const containerRef = useRef(null);
    const dashboardRef = useRef(null);

    useEffect(() => {
        // Initialize dashboard
        dashboardRef.current = new CashFlowDashboard(containerRef.current.id, {
            data: data,
            numberFormat: 'short'
        });

        return () => {
            // Cleanup if needed
        };
    }, []);

    useEffect(() => {
        // Update data when it changes
        if (dashboardRef.current && data) {
            dashboardRef.current.loadData(data);
        }
    }, [data]);

    return <div id="cashflow-dashboard" ref={containerRef}></div>;
}
```

### With Vue

```vue
<template>
    <div ref="dashboardContainer"></div>
</template>

<script>
export default {
    props: ['data'],
    data() {
        return {
            dashboard: null
        };
    },
    mounted() {
        this.dashboard = new CashFlowDashboard(this.$refs.dashboardContainer.id, {
            data: this.data,
            numberFormat: 'short'
        });
    },
    watch: {
        data(newData) {
            if (this.dashboard) {
                this.dashboard.loadData(newData);
            }
        }
    }
};
</script>
```

### Dynamic Data Loading

```javascript
// Initialize without data
const dashboard = new CashFlowDashboard('dashboard', {
    numberFormat: 'short'
});

// Load data from API
fetch('/api/cashflow')
    .then(response => response.json())
    .then(data => {
        dashboard.loadData(data);
    });

// Update with new period data
function loadNewPeriod(startDate, endDate) {
    fetch(`/api/cashflow?start=${startDate}&end=${endDate}`)
        .then(response => response.json())
        .then(data => {
            dashboard.loadData(data);
        });
}
```

### Toggle Number Format

```html
<button onclick="toggleFormat()">Toggle Format</button>

<script>
let currentFormat = 'short';

function toggleFormat() {
    currentFormat = currentFormat === 'short' ? 'full' : 'short';
    dashboard.setNumberFormat(currentFormat);
}
</script>
```

## Features in Detail

### Number Formatting

**Prominent Toggle Section:**
- Located at the top of the dashboard (before metrics)
- Two-button toggle with clear labels
- Shows example format in each button
- Active button highlighted in blue

**Short Format (Default):**
- ₹8.50Cr (8.5 Crores)
- ₹45.50L (45.5 Lakhs)
- ₹12.50K (12.5 Thousand)

**Full Format:**
- ₹8,50,00,000.00
- ₹45,50,000.00
- ₹12,500.00

Users can click the buttons to toggle, or you can change programmatically with `dashboard.setNumberFormat('full')` or `dashboard.setNumberFormat('short')`.

### Charts

**Two-Level Sunburst Charts:**
- Inner ring: Top-level categories (max 9, rest grouped as "Others")
- Outer ring: Sub-categories (first level children)
- Click to zoom into specific categories
- Hover to see exact amounts
- Interactive and animated

### Tree View

**Features:**
- Unlimited nesting depth
- Visual indentation (24px per level)
- Expand/Collapse individual nodes
- "Expand All" / "Collapse All" buttons
- Top-level items highlighted with blue gradient
- Progress bars showing percentage (hidden on mobile by default)
- Icons:
  - Top level (Level 0): Analytics icon
  - Groups: Category icon
  - Ledgers: Receipt icon

### Responsive Design

**Desktop (>1024px):**
- 2-column chart layout
- Progress bars visible
- Full spacing

**Tablet (769-1023px):**
- 2-column chart layout
- Progress bars visible
- Optimized spacing

**Mobile (<768px):**
- Single column layout
- Progress bars hidden (unless `showProgressBarsOnMobile: true`)
- Compact spacing
- Touch-friendly controls

## Browser Support

- Chrome/Edge: ✅ Full support
- Firefox: ✅ Full support
- Safari: ✅ Full support
- Mobile browsers: ✅ Fully responsive

## Dependencies

The plugin automatically loads these dependencies if not present:

- **Google Sans Font** - For typography
- **Material Symbols Rounded** - For icons
- **ECharts 5.4.3** - For charts

No manual installation required!

## Customization

### CSS Isolation

**All styles are scoped to prevent conflicts:**
- All CSS classes prefixed with `cf-` (e.g., `.cf-metric-card`)
- Main container uses `.cashflow-dashboard` class
- No global style pollution
- Safe to use with any existing CSS framework (Bootstrap, Tailwind, etc.)

**Example: Your styles won't be affected**
```css
/* Your existing styles */
.metric-card { /* Won't conflict */ }
.chart-container { /* Won't conflict */ }

/* Plugin styles are scoped */
.cashflow-dashboard .cf-metric-card { /* Plugin styles */ }
```

### Custom Styles

You can override plugin styles by targeting the CSS classes:

```css
/* Change metric card colors */
.cf-metric-card {
    background: #your-color;
}

/* Change chart height */
.cf-chart-container {
    height: 400px;
}

/* Custom tree node styling */
.cf-tree-node.level-0 {
    background: linear-gradient(90deg, #your-gradient);
}
```

### Custom Container Width

```css
.cashflow-dashboard {
    max-width: 1200px; /* Your custom width */
}
```

## Troubleshooting

### Charts not displaying

Make sure the container element exists before initializing:

```javascript
document.addEventListener('DOMContentLoaded', function() {
    const dashboard = new CashFlowDashboard('container-id', { data: data });
});
```

### Data not loading

Check the browser console for errors. Data must follow the correct JSON structure:

```javascript
try {
    dashboard.loadData(yourData);
} catch (error) {
    console.error('Error loading data:', error);
}
```

### Styles not applying

Ensure the plugin script is loaded before creating the dashboard instance.

## Performance

- Handles large datasets efficiently (tested with 100+ categories)
- Chart rendering optimized with ECharts
- Lazy rendering for tree nodes
- Smooth animations and transitions

## License

MIT License

## Support

For issues and questions, please open an issue on GitHub.

## Changelog

### Version 1.0.0
- Initial release
- Two-level sunburst charts
- Hierarchical tree view
- Number format toggling
- Fully responsive design
- Framework-agnostic implementation
- Auto-loading dependencies

## Credits

Built with:
- **ECharts** - For visualization
- **Google Sans** - For typography
- **Material Symbols** - For icons
