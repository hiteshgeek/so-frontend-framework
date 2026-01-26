# Trial Balance Plugin

A standalone JavaScript component for displaying trial balance reports with comprehensive column options and responsive design.

## Features

- **Clean Table Layout**: Professional trial balance table with sticky headers and proper alignment
- **Flexible Column Display**: Toggle Opening Balance, Transactions, and Closing Balance columns
- **Debit/Credit Columns**: Option to show or hide debit and credit columns separately
- **Responsive Design**: Optimized for desktop, tablet, and mobile devices
- **Clickable Ledgers**: Interactive rows with callback support for detailed ledger views
- **Material Design**: Uses Google's Material Design principles for consistent UI
- **Framework Agnostic**: Pure JavaScript implementation, no dependencies

## Installation

1. Copy the plugin files to your project:
   ```
   trial-balance.js
   trial-balance.css
   ```

2. Include the required dependencies in your HTML:
   ```html
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

   <!-- Common Styles (optional but recommended) -->
   <link rel="stylesheet" href="../../common/sixorbit-common.css">

   <!-- Plugin Styles -->
   <link rel="stylesheet" href="trial-balance.css">
   ```

3. Include the plugin script:
   ```html
   <script src="trial-balance.js"></script>
   ```

## Usage

### Basic Usage

```html
<div id="trial-balance-container"></div>

<script>
    const trialBalance = new TrialBalance('trial-balance-container', {
        data: trialBalanceData
    });
</script>
```

### With Options

```javascript
const trialBalance = new TrialBalance('trial-balance-container', {
    data: trialBalanceData,
    showOpening: true,
    showTransactions: true,
    showClosing: true,
    showDebitCreditSeparately: true,
    onLedgerClick: function(ledgerData) {
        console.log('Ledger clicked:', ledgerData);
        // Open detailed ledger view
    }
});
```

## Configuration Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `data` | Object | `null` | Trial balance data object |
| `showOpening` | Boolean | `true` | Show opening balance columns |
| `showTransactions` | Boolean | `true` | Show transaction columns |
| `showClosing` | Boolean | `true` | Show closing balance columns |
| `showDebitCreditSeparately` | Boolean | `true` | Show separate debit and credit columns |
| `onLedgerClick` | Function | `null` | Callback function when a ledger is clicked |

## Data Format

```javascript
{
    "company": "Company Name",
    "period": {
        "start": "2025-04-01",
        "end": "2026-03-31"
    },
    "ledgers": [
        {
            "id": "cash_in_hand",
            "name": "Cash in Hand",
            "openingDr": 50000.00,
            "openingCr": 0,
            "debit": 125000.00,
            "credit": 85000.00,
            "closingDr": 90000.00,
            "closingCr": 0
        },
        // ... more ledgers
    ]
}
```

### Ledger Object Properties

| Property | Type | Description |
|----------|------|-------------|
| `id` | String | Unique identifier for the ledger |
| `name` | String | Display name of the ledger |
| `openingDr` | Number | Opening debit balance |
| `openingCr` | Number | Opening credit balance |
| `debit` | Number | Total debit transactions |
| `credit` | Number | Total credit transactions |
| `closingDr` | Number | Closing debit balance |
| `closingCr` | Number | Closing credit balance |

## API Methods

### `loadData(data)`
Load new data into the trial balance.
```javascript
trialBalance.loadData(newTrialBalanceData);
```

### `reload(data)`
Alias for `loadData()`.
```javascript
trialBalance.reload(newTrialBalanceData);
```

### `toggleOpening()`
Toggle the visibility of opening balance columns.
```javascript
trialBalance.toggleOpening();
```

### `toggleTransactions()`
Toggle the visibility of transaction columns.
```javascript
trialBalance.toggleTransactions();
```

### `toggleClosing()`
Toggle the visibility of closing balance columns.
```javascript
trialBalance.toggleClosing();
```

### `toggleDebitCredit()`
Toggle the separate display of debit and credit columns.
```javascript
trialBalance.toggleDebitCredit();
```

## Events

### onLedgerClick
Triggered when a ledger row is clicked.

```javascript
{
    onLedgerClick: function(ledgerData) {
        // ledgerData contains:
        // {
        //     id: "ledger_id",
        //     name: "Ledger Name",
        //     type: "ledger"
        // }
    }
}
```

## Styling

The plugin uses CSS custom properties from the common design system:

```css
--so-primary: #1a73e8;
--so-grey-900: #202124;
--so-grey-700: #5f6368;
/* ... and more */
```

You can override these in your own CSS to customize the appearance.

## Responsive Behavior

- **Desktop (> 1200px)**: Full table with all columns visible
- **Tablet (768px - 1200px)**: Adjusted font sizes and column widths
- **Mobile (< 768px)**: Controls stacked, smaller text, responsive columns
- **Small Mobile (< 480px)**: Transaction columns hidden automatically

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Example

See `index.html` for a complete working example with sample data.

## License

Part of the SixOrbit ERP Plugin System
Version 1.0.0
