# Balance Sheet Plugin

A framework-agnostic JavaScript plugin for displaying Balance Sheet with nested groups and ledgers in a clean, interactive interface.

## Features

- **Two-Section Display**: Liabilities and Assets side by side with highlighted section headers
- **Nested Groups & Ledgers**: Hierarchical tree view with expand/collapse functionality
- **Interactive Charts**: Two sunburst charts showing distribution of Liabilities and Assets with percentages
- **Debit/Credit Columns**: Toggle to show/hide Dr/Cr columns with section-specific color coding
- **Click Callbacks**: Configurable callbacks for group and ledger clicks to open detailed views
- **Pure JavaScript**: No framework dependencies
- **Responsive Design**: Works on desktop, tablet, and mobile devices
- **Accounting Logic**:
  - Liabilities: Credit is positive (Cr - Dr), Credit=Green, Debit=Red
  - Assets: Debit is positive (Dr - Cr), Debit=Green, Credit=Red

## Files

- `balance-sheet.js` - Main plugin file
- `balance-sheet.css` - Plugin-specific styles
- `sample-data.js` - Sample data structure
- `index.html` - Demo page
- `README.md` - This file

## Dependencies

- **Required**:
  - `sixorbit-common.css` (from common folder)
  - [ECharts](https://echarts.apache.org/) v5.4.3+ for charts

- **Optional**:
  - Google Fonts (Google Sans)
  - Material Symbols Rounded icons

## Installation

1. Include the required CSS files:
```html
<link rel="stylesheet" href="../../common/sixorbit-common.css">
<link rel="stylesheet" href="balance-sheet.css">
```

2. Include ECharts library:
```html
<script src="https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js"></script>
```

3. Include the Balance Sheet plugin:
```html
<script src="balance-sheet.js"></script>
```

## Usage

### Basic Usage

```javascript
const balanceSheet = new BalanceSheet('container-id', {
    data: balanceSheetData
});
```

### With Click Callbacks

```javascript
const balanceSheet = new BalanceSheet('container-id', {
    data: balanceSheetData,
    // Callback when a group is clicked
    onGroupClick: function(groupData) {
        console.log('Group clicked:', groupData);
        // Open group summary report
        // groupData contains: { id, name, type }
    },
    // Callback when a ledger is clicked
    onLedgerClick: function(ledgerData) {
        console.log('Ledger clicked:', ledgerData);
        // Open detailed ledger view
        // ledgerData contains: { id, name, type }
    }
});
```

### Data Structure

The plugin expects data in the following format:

```javascript
const balanceSheetData = {
    company: "Company Name",
    asOnDate: "2026-01-08",
    balancesheet: {
        liabilities: {
            id: "liabilities_root",
            name: "Liabilities",
            type: "group",
            children: [
                // Nested groups and ledgers
                {
                    id: "capital_account",
                    name: "Capital Account",
                    type: "group",
                    children: [
                        {
                            id: "share_capital",
                            name: "Share Capital",
                            type: "ledger",
                            debit: 0,
                            credit: 5000000
                        }
                        // More ledgers...
                    ]
                }
                // More groups...
            ]
        },
        assets: {
            id: "assets_root",
            name: "Assets",
            type: "group",
            children: [
                // Nested groups and ledgers
                {
                    id: "fixed_assets",
                    name: "Fixed Assets",
                    type: "group",
                    children: [
                        {
                            id: "land_building",
                            name: "Land and Building",
                            type: "ledger",
                            debit: 5000000,
                            credit: 0
                        }
                        // More ledgers...
                    ]
                }
                // More groups...
            ]
        }
    }
};
```

### Node Structure

Each node (group or ledger) has:

- `id` (string, required): Unique identifier
- `name` (string, required): Display name
- `type` (string, required): Either "group" or "ledger"
- `debit` (number): Debit amount (for ledgers)
- `credit` (number): Credit amount (for ledgers)
- `children` (array): Child nodes (for groups)
- `icon` (string, optional): Material Symbols icon name

### Methods

#### `loadData(data)`
Load new data into the plugin.

```javascript
balanceSheet.loadData(newData);
```

#### `reload(data)`
Alias for loadData - reloads the plugin with new data.

```javascript
balanceSheet.reload(newData);
```

## Accounting Logic

### Liabilities
- **Credit is positive**: Balance = Credit - Debit
- Examples: Share Capital, Loans, Creditors
- **Color Coding**: Credit amounts are green (normal), Debit amounts are red (abnormal)
- Abnormal: Debit balance (shown in red)

### Assets
- **Debit is positive**: Balance = Debit - Credit
- Examples: Fixed Assets, Debtors, Cash & Bank
- **Color Coding**: Debit amounts are green (normal), Credit amounts are red (abnormal)
- Abnormal: Credit balance (shown in red)

## UI Controls

1. **Expand All**: Expands all groups in the tree
2. **Collapse All**: Collapses all groups
3. **Dr/Cr Columns**: Toggles visibility of Debit and Credit columns

## Customization

### Colors
The plugin uses Google Material Design colors:
- Primary Blue: `#4285f4`
- Success Green: `#34a853`
- Error Red: `#ea4335`
- Text: `#202124`, `#5f6368`

### Styling
Override CSS classes to customize appearance:
- `.bs-statement` - Main container
- `.bs-tree-node` - Tree node
- `.bs-node-label` - Node label
- `.bs-chart-container` - Chart container

### Chart Configuration
Modify chart options in `createLiabilitiesChart()` and `createAssetsChart()` methods.

## Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers

## Examples

See `index.html` for a complete working example with sample data.

## License

Proprietary - SixOrbit Plugins

## Version History

- **1.0.0** (2026-01-09)
  - Initial release
  - Two-section balance sheet (Liabilities & Assets)
  - Nested groups and ledgers
  - Sunburst charts with percentages
  - Expand/collapse functionality
  - Dr/Cr column toggle
