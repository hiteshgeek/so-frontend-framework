# Group Summary Report Plugin

A framework-agnostic JavaScript plugin for displaying Group Summary reports with nested groups and ledgers, showing Opening, Net Transactions, and Closing balances.

## Features

- **Nested Groups & Ledgers**: Multi-level hierarchical tree view with expand/collapse functionality
- **Search & Filter**: Real-time search for groups/ledgers with numeric filters (>, <, =) for opening, debit, credit, and closing amounts
- **Flexible Display Options**: Toggle Opening, Net Transactions, and Closing columns independently
- **Debit/Credit Modes**: Switch between separate Dr/Cr columns or combined balance display
- **Click Callbacks**: Configurable callbacks for group and ledger clicks to open detailed views
- **Summary Metrics**: Top-level cards showing total Opening Dr/Cr, Net Dr/Cr, and Closing Dr/Cr
- **Pure JavaScript**: No framework dependencies
- **Responsive Design**: Works on desktop, tablet, and mobile devices

## Files

- `group-summary.js` - Main plugin file
- `group-summary.css` - Plugin-specific styles
- `sample-data.js` - Sample data structure
- `index.html` - Demo page
- `README.md` - This file

## Dependencies

- **Required**:
  - `sixorbit-common.css` (from common folder)

- **Optional**:
  - Google Fonts (Google Sans)
  - Material Symbols Rounded icons

## Installation

1. Include the required CSS files:
```html
<link rel="stylesheet" href="../../common/sixorbit-common.css">
<link rel="stylesheet" href="group-summary.css">
```

2. Include the Group Summary plugin:
```html
<script src="group-summary.js"></script>
```

## Usage

### Basic Usage

```javascript
const groupSummary = new GroupSummary('container-id', {
    data: groupSummaryData
});
```

### With Options

```javascript
const groupSummary = new GroupSummary('container-id', {
    data: groupSummaryData,
    showOpening: true,
    showNetTransactions: true,
    showClosing: true,
    showDebitCreditSeparately: false
});
```

### With Click Callbacks

```javascript
const groupSummary = new GroupSummary('container-id', {
    data: groupSummaryData,
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

### Configuration Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `data` | Object | null | Group summary data in the required format |
| `showOpening` | Boolean | true | Show/hide Opening balance columns |
| `showNetTransactions` | Boolean | true | Show/hide Net Transaction columns |
| `showClosing` | Boolean | true | Show/hide Closing balance columns |
| `showDebitCreditSeparately` | Boolean | false | Show Dr/Cr as separate columns vs combined balance |
| `accountNature` | String | 'debit' | Account nature: 'debit' (assets - Dr positive) or 'credit' (liabilities - Cr positive). Affects color coding. |
| `onGroupClick` | Function | null | Callback when group is clicked |
| `onLedgerClick` | Function | null | Callback when ledger is clicked |

### Data Structure

The plugin expects data in the following format:

```javascript
const groupSummaryData = {
    company: "Company Name",
    groupName: "Current Assets",
    period: {
        start: "2025-04-01",
        end: "2026-01-09"
    },
    groupSummary: {
        id: "root_group",
        name: "Current Assets",
        type: "group",
        children: [
            {
                id: "bank_accounts",
                name: "Bank Accounts",
                type: "group",
                children: [
                    {
                        id: "hdfc_bank",
                        name: "HDFC Bank Current A/C",
                        type: "ledger",
                        openingDr: 2850000,
                        openingCr: 0,
                        debit: 7051606.17,
                        credit: 7025406.17,
                        closingDr: 2876200,
                        closingCr: 0
                    }
                    // More ledgers...
                ]
            }
            // More groups...
        ]
    }
};
```

### Node Structure

Each node (group or ledger) has:

- `id` (string, required): Unique identifier
- `name` (string, required): Display name
- `type` (string, required): Either "group" or "ledger"
- `openingDr` (number): Opening debit balance
- `openingCr` (number): Opening credit balance
- `debit` (number): Net transaction debits
- `credit` (number): Net transaction credits
- `closingDr` (number): Closing debit balance
- `closingCr` (number): Closing credit balance
- `children` (array): Child nodes (for groups)
- `icon` (string, optional): Material Symbols icon name

### Methods

#### `loadData(data)`
Load new data into the plugin.

```javascript
groupSummary.loadData(newData);
```

#### `reload(data)`
Alias for loadData - reloads the plugin with new data.

```javascript
groupSummary.reload(newData);
```

## UI Controls

1. **Expand All**: Expands all groups in the tree
2. **Collapse All**: Collapses all groups
3. **Separate Dr/Cr**: Toggle between separate Dr/Cr columns and combined balance display
4. **Opening**: Show/hide Opening balance columns
5. **Net Txn**: Show/hide Net Transaction columns
6. **Closing**: Show/hide Closing balance columns
7. **Filters**: Toggle filter panel to show/hide advanced numeric filters

### Search and Filter Features

**Search Box**:
- Real-time text search across all group and ledger names
- Shows only matching nodes and their ancestors

**Numeric Filters**:
- **Opening Balance**: Filter by opening balance amount (>, <, =)
- **Net Debit**: Filter by net debit transaction amount (>, <, =)
- **Net Credit**: Filter by net credit transaction amount (>, <, =)
- **Closing Balance**: Filter by closing balance amount (>, <, =)
- **Apply Filters**: Apply the selected numeric filters
- **Clear All**: Reset all search and filter criteria

**Filter Behavior**:
- Multiple filters can be enabled simultaneously (AND logic)
- If a parent group doesn't match but a child does, the parent is still shown
- Search and numeric filters work together

## Customization

### Colors
The plugin uses Google Material Design colors:
- Primary Blue: `#4285f4`
- Success Green: `#34a853`
- Error Red: `#ea4335`
- Text: `#202124`, `#5f6368`

### Styling
Override CSS classes to customize appearance:
- `.gs-statement` - Main container
- `.gs-tree-node` - Tree node
- `.gs-node-label` - Node label
- `.gs-node-amount` - Amount display

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

- **1.1.0** (2026-01-09)
  - Added real-time search functionality for groups and ledgers
  - Added numeric filters for Opening, Net Debit, Net Credit, and Closing amounts
  - Filter operators: greater than (>), less than (<), equal to (=)
  - Multiple filters can be applied simultaneously
  - Smart filtering shows parent groups if any child matches

- **1.0.0** (2026-01-09)
  - Initial release
  - Multi-level nested groups and ledgers
  - Opening, Net Transactions, and Closing balances
  - Flexible column visibility controls
  - Separate Dr/Cr or combined balance display
  - Expand/collapse functionality
  - Click callbacks for groups and ledgers
  - Account nature parameter for color coding
