# Profit & Loss Plugin

A comprehensive profit and loss statement plugin for displaying outlet or monthly financial data with visual charts.

## Features

- **Monthly/Outlet View**: Display P&L data by month or outlet with frozen first column
- **Trade Expenses & Income**: Breakdown of opening stock, direct expenses, purchases, sales, direct income, and closing stock
- **Gross Profit**: Automatic calculation with percentage
- **Indirect Expenses & Income**: Personnel, administrative, selling expenses, and other income
- **Net Profit**: Final profit/loss with percentage
- **Interactive Charts**: Stacked bar charts with ECharts showing income, expenses, and profit trends
- **Clickable Groups**: Click on any group to trigger custom callbacks
- **Google Fonts**: Uses Google Sans for modern typography
- **Responsive Design**: Works on all screen sizes

## Installation

Include the required dependencies:

```html
<!-- Google Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

<!-- Common & Plugin Styles -->
<link rel="stylesheet" href="../../common/sixorbit-common.css">
<link rel="stylesheet" href="monthwise-profit-loss.css">

<!-- ECharts Library -->
<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>

<!-- Plugin JavaScript -->
<script src="monthwise-profit-loss.js"></script>
```

## Usage

```javascript
const profitLoss = new ProfitLoss('container-id', {
    data: profitLossData,
    onGroupClick: function(groupData) {
        console.log('Group clicked:', groupData);
        // Handle group click - open detailed view, etc.
    }
});
```

## Configuration Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `data` | Object | `null` | Profit & loss data object |
| `onGroupClick` | Function | `null` | Callback when a group is clicked |

## Data Format

```json
{
    "company": "Company Name",
    "period": {
        "start": "2025-04-01",
        "end": "2026-03-31"
    },
    "viewType": "monthly",
    "profitLoss": [
        {
            "id": "apr_2025",
            "name": "Apr 2025",
            "tradeExpenses": {
                "openingStock": { "value": 0, "groups": [] },
                "directExpenses": { "value": 0, "groups": [] },
                "purchases": { "value": 0, "groups": [] },
                "total": 0
            },
            "tradeIncome": {
                "sales": { "value": 71706846.46, "groups": [...] },
                "directIncome": { "value": 0, "groups": [] },
                "closingStock": { "value": 71706846.46, "groups": [] },
                "total": 71706846.46
            },
            "grossProfit": 40916892.47,
            "grossProfitPercent": 57.06,
            "indirectExpenses": {
                "personnel": { "value": 12000000, "groups": [...] },
                "administrative": { "value": 10789539.99, "groups": [...] },
                "selling": { "value": 8000000, "groups": [...] },
                "total": 30789539.99
            },
            "indirectIncome": {
                "otherIncome": { "value": 0, "groups": [] },
                "total": 0
            },
            "netProfit": 40917304.47,
            "netProfitPercent": 57.06
        }
    ]
}
```

## API Methods

### loadData(data)

Load new profit & loss data.

```javascript
profitLoss.loadData(newData);
```

## Events

### onGroupClick(groupData)

Called when a clickable group cell is clicked.

```javascript
onGroupClick: function(groupData) {
    console.log('Row ID:', groupData.rowId);
    console.log('Group Name:', groupData.groupName);
    console.log('Column Type:', groupData.columnType);
}
```

## Column Structure

1. **First Column (Frozen)**: Month or Outlet name
2. **Trade Expenses**: Opening Stock, Direct Expenses, Purchases, Total
3. **Trade Income**: Sales, Direct Income, Closing Stock, Total
4. **Gross Profit**: Amount and Percentage
5. **Indirect Expenses**: Personnel, Administrative, Selling, Other, Total
6. **Indirect Income**: Other Income, Total
7. **Net Profit**: Amount and Percentage

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Example

See `index.html` for a complete working example with sample data.
