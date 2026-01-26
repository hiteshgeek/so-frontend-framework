# Report List Plugin

A lightweight, framework-agnostic JavaScript plugin for displaying reports with a beautiful Google Material Design interface.

## Features

✅ **Easy Integration** - Just include CSS and JS files  
✅ **No Dependencies** - Pure vanilla JavaScript  
✅ **Responsive Design** - Mobile, tablet, and desktop optimized  
✅ **Two View Modes** - Grid and list layouts  
✅ **Smart Search** - Filter by title, description, or tags  
✅ **Favorites System** - Mark reports as favorites with persistence  
✅ **Most Used Tracking** - Automatically highlights top 10 most viewed reports  
✅ **Material Icons** - Auto-loads Material Icons or uses SVG fallbacks  
✅ **Bootstrap Compatible** - All styles are scoped to avoid conflicts  
✅ **localStorage Persistence** - Saves view preferences and favorites  
✅ **Customizable Callbacks** - Hook into favorite actions and report clicks  

## Quick Start

### 1. Include Files

```html
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="report-list-plugin.css">
</head>
<body>
    <div id="reports-container"></div>
    
    <script src="report-list-plugin.js"></script>
    <script>
        const plugin = new ReportListPlugin('#reports-container', {
            dataSource: 'json',
            jsonData: yourReportsData
        });
    </script>
</body>
</html>
```

### 2. Prepare Your Data

```javascript
const yourReportsData = {
    "categories": [
        {
            "id": "general",
            "name": "General Sales Reports",
            "displayName": "General sales",
            "reports": [
                {
                    "id": "sales-order",
                    "title": "Sales Order Report",
                    "description": "Complete overview of all sales orders",
                    "icon": "receipt_long",
                    "tags": ["Core", "Daily"],
                    "link": "/reports/sales-order",
                    "viewCount": 145,
                    "lastViewed": "2026-01-06T10:30:00Z",
                    "isFavorite": false
                }
            ]
        }
    ]
};
```

## Configuration Options

```javascript
new ReportListPlugin('#container', {
    // Data Source
    dataSource: 'json',              // 'json' or 'url'
    jsonData: data,                  // Inline JSON data
    jsonUrl: '/api/reports',         // OR: URL to fetch data
    
    // Callbacks
    onFavoriteAdd: (id, report) => {
        console.log('Favorited:', report.title);
        // Make your API call here
    },
    onFavoriteRemove: (id, report) => {
        console.log('Unfavorited:', report.title);
    },
    onReportClick: (id, report) => {
        // Custom navigation logic
        window.location = report.link;
    },
    
    // UI Options
    defaultView: 'grid',             // 'grid' or 'list'
    showViewSwitcher: true,          // Show view toggle
    showSearch: true,                // Show search bar
    
    // Persistence
    persistView: true,               // Save view preference
    persistFavorites: true,          // Save favorites
    storageKey: 'salesReports',      // localStorage key
    
    // Icons
    autoLoadMaterialIcons: true,     // Auto-load Material Icons
    useFallbackIcons: true,          // Use SVG fallbacks
    
    // Fonts
    autoLoadGoogleSans: true,        // Auto-load Google Sans font
    
    // Labels (i18n)
    labels: {
        title: 'Sales Reports',
        searchPlaceholder: 'Search reports',
        allReports: 'All reports',
        favoritesAndMostUsed: 'Favorites & Most Used',
        favorites: 'Favorites',
        mostUsed: 'Most Used Reports',
        noResults: 'No reports found',
        tryDifferent: 'Try different keywords'
    }
});
```

## JSON Data Format

### Required Fields

```javascript
{
    "categories": [
        {
            "id": "unique-id",           // Required
            "name": "Category Name",      // Required
            "displayName": "Short Name",  // Required
            "reports": [...]              // Required
        }
    ]
}
```

### Report Object

```javascript
{
    "id": "unique-report-id",        // Required
    "title": "Report Title",         // Required
    "description": "Description",    // Required
    "icon": "material_icon_name",    // Required
    "link": "/path/to/report",       // Required
    "tags": ["Tag1", "Tag2"],        // Optional
    "viewCount": 100,                // Optional
    "lastViewed": "2026-01-06T10:30:00Z",  // Optional (ISO format)
    "isFavorite": false              // Optional (will be set by plugin)
}
```

### Material Icon Names

Common icons you can use:
- `receipt_long` - Document/invoice
- `description` - File/report
- `assessment` - Chart/analytics
- `star` / `star_outline` - Favorites
- `visibility` - Views
- `schedule` - Time/clock

Full list: [Material Icons](https://fonts.google.com/icons)

## Loading Data from API

```javascript
const plugin = new ReportListPlugin('#reports-container', {
    dataSource: 'url',
    jsonUrl: '/api/report-list',
    onFavoriteAdd: (id, report) => {
        // POST to your API
        fetch('/api/favorites', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ reportId: id })
        });
    },
    onFavoriteRemove: (id, report) => {
        // DELETE from your API
        fetch(`/api/favorites/${id}`, {
            method: 'DELETE'
        });
    }
});
```

## Public Methods

```javascript
// Change view mode
plugin.setView('grid');  // or 'list'

// Get all favorites
const favorites = plugin.getFavorites();

// Get specific report
const report = plugin.getReport('report-id');

// Refresh data
plugin.refresh();

// Destroy plugin
plugin.destroy();
```

## Styling & Customization

All CSS classes are prefixed with `.srp-` to avoid conflicts.

### Custom Colors

```css
.srp-container {
    --srp-primary: #1a73e8;
    --srp-primary-dark: #1557b0;
    --srp-surface: #ffffff;
    --srp-background: #f8f9fa;
    --srp-border: #dadce0;
    --srp-text-primary: #202124;
    --srp-text-secondary: #5f6368;
}
```

### Override Styles

```css
/* Custom button color */
.srp-view-btn.srp-active {
    color: #00897b !important;
}

/* Custom card hover */
.srp-report-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
```

## Bootstrap Compatibility

The plugin is fully compatible with Bootstrap. All styles are scoped with `.srp-` prefix and use `box-sizing: border-box` reset.

```html
<!-- Works perfectly alongside Bootstrap -->
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="report-list-plugin.css">
```

## Browser Support

- Chrome/Edge: ✅ Latest 2 versions
- Firefox: ✅ Latest 2 versions
- Safari: ✅ Latest 2 versions
- Mobile browsers: ✅ iOS Safari, Chrome Android

## File Structure

```
report-list-plugin/
├── report-list-plugin.js      # Plugin JavaScript (20KB)
├── report-list-plugin.css     # Plugin styles (15KB)
├── sample-data.js               # Sample data for testing
├── index.html                   # Demo page
└── README.md                    # This file
```

## Examples

### Example 1: Basic Usage

```javascript
const plugin = new ReportListPlugin('#container', {
    dataSource: 'json',
    jsonData: myReportsData
});
```

### Example 2: With API Integration

```javascript
const plugin = new ReportListPlugin('#container', {
    dataSource: 'url',
    jsonUrl: 'https://api.example.com/reports',
    onFavoriteAdd: async (id, report) => {
        await fetch('/api/favorites', {
            method: 'POST',
            body: JSON.stringify({ id })
        });
        console.log('Saved to server');
    }
});
```

### Example 3: Custom Labels (Internationalization)

```javascript
const plugin = new ReportListPlugin('#container', {
    jsonData: data,
    labels: {
        title: 'Relatórios de Vendas',
        searchPlaceholder: 'Pesquisar relatórios',
        allReports: 'Todos os relatórios',
        noResults: 'Nenhum relatório encontrado'
    }
});
```

### Example 4: Programmatic Control

```javascript
const plugin = new ReportListPlugin('#container', {
    jsonData: data,
    defaultView: 'grid'
});

// Switch to list view after 5 seconds
setTimeout(() => {
    plugin.setView('list');
}, 5000);

// Log all favorites
console.log('Favorites:', plugin.getFavorites());
```

## Troubleshooting

### Icons not showing?

Material Icons will auto-load. If you see circles (●), wait a moment for icons to load or check your internet connection.

### Favorites not persisting?

Make sure `persistFavorites: true` is set in config and localStorage is enabled in your browser.

### Styles conflicting with Bootstrap?

This shouldn't happen, but if it does, increase CSS specificity:

```css
#reports-container .srp-report-card {
    /* your overrides */
}
```

## License

MIT License - Feel free to use in commercial projects

## Support

For issues or questions, please check the demo page (`index.html`) for working examples.

## Version

Current version: **1.0.0**

---

Made with ❤️ for better reporting experiences
