# SixOrbit Plugin Library - Directory Structure

## Complete File Organization

```
sixorbit_plugins/
│
├── index.html                          # 🏠 Main landing page (module-organized)
├── PROJECT_OVERVIEW.md                 # 📋 Complete project documentation
├── README.md                           # 📖 Repository overview
├── GETTING_STARTED.md                  # 🚀 Developer onboarding guide
├── QUICK_REFERENCE.md                  # ⚡ Quick reference guide
├── STRUCTURE.md                        # 📁 This file
│
├── common/                             # 🎨 Shared Design System
│   ├── sixorbit-common.css            # Common CSS framework (50+ variables)
│   ├── README.md                       # Design system documentation
│   ├── components-showcase.html        # Visual component library
│   ├── plugin-template.html            # HTML starter template
│   └── plugin-template.css             # CSS starter template
│
├── finance/                            # 💰 Finance Module Reports
│   └── cash_flow_summary/
│       ├── index.html                  # Demo page with "Back" button
│       ├── cashflow-dashboard-v2.js    # Plugin JavaScript
│       ├── cashflow-dashboard.css      # Plugin styles
│       ├── DEVELOPER_GUIDE.md          # 📘 Complete developer docs
│       └── example-complete.html       # Full example
│
├── hr/                                 # 👥 HR Module Reports
│   └── multi_employee_attendance_viewer/
│       ├── demo.html                   # Demo page with "Back" button
│       ├── demo-inline.html            # Inline demo
│       ├── attendance-plugin.js        # Plugin JavaScript
│       ├── attendance-plugin.css       # Plugin styles
│       └── DEVELOPER_GUIDE.md          # 📘 Complete developer docs
│
├── sales/                              # 📈 Sales Module (Ready for future reports)
│
├── purchase/                           # 🛒 Purchase Module (Ready for future reports)
│
├── stock/                              # 📦 Stock Module (Ready for future reports)
│
├── production/                         # 🏭 Production Module (Ready for future reports)
│
└── report_list/                        # 📊 General Utilities (Cross-module)
    ├── index.html                      # Demo page with "Back" button
    ├── report-list-plugin.js           # Plugin JavaScript
    ├── report-list-plugin.css          # Plugin styles
    ├── report-list-data.js             # Sample data
    ├── DEVELOPER_GUIDE.md              # 📘 Complete developer docs
    └── README.md                       # Plugin overview
```

## Plugin Locations Explained

### Module-Specific Plugins

**Finance Module** (`/finance/`)
- ✅ Cash Flow Dashboard - Hierarchical financial reporting

**HR Module** (`/hr/`)
- ✅ Multi Employee Attendance - Multi-day attendance tracking

**Sales Module** (`/sales/`)
- 🔜 Coming soon...

**Purchase Module** (`/purchase/`)
- 🔜 Coming soon...

**Stock Module** (`/stock/`)
- 🔜 Coming soon...

**Production Module** (`/production/`)
- 🔜 Coming soon...

### General Utilities

**Report List Plugin** (`/report_list/`)
- Location: Root level (not in a module folder)
- Reason: Cross-module utility used by all modules
- Purpose: Universal report listing component
- Usage: Can display reports from Finance, HR, Sales, etc.

## Why Report List is at Root Level?

The Report List plugin is a **general-purpose utility** that:

1. **Works across ALL modules** - It can display Finance, HR, Sales reports
2. **Not module-specific** - It's a meta-plugin for listing other reports
3. **Reusable everywhere** - Any module can use it to list their reports
4. **Common component** - Like the design system, it's shared infrastructure

Think of it like this:
- `finance/`, `hr/`, `sales/` = Business modules with domain-specific reports
- `report_list/` = Utility component used BY those modules
- `common/` = Design system used BY all plugins

## File Naming Conventions

### HTML Files
- `index.html` - Main demo page for the plugin
- `demo.html` - Alternative demo page name
- `example-*.html` - Additional examples

### JavaScript Files
- `plugin-name.js` - Main plugin file
- `plugin-name-v2.js` - Versioned plugin file
- `plugin-data.js` - Sample/demo data

### CSS Files
- `plugin-name.css` - Plugin-specific styles
- `sixorbit-common.css` - Shared design system

### Documentation Files
- `DEVELOPER_GUIDE.md` - Complete developer documentation
- `README.md` - Overview and quick info
- `PROJECT_OVERVIEW.md` - Project-level documentation

## Quick Access Paths

| What | Path |
|------|------|
| Main Library | `/index.html` |
| Cash Flow Demo | `/finance/cash_flow_summary/index.html` |
| Attendance Demo | `/hr/multi_employee_attendance_viewer/demo.html` |
| Report List Demo | `/report_list/index.html` |
| Component Showcase | `/common/components-showcase.html` |
| Design System Docs | `/common/README.md` |
| Getting Started | `/GETTING_STARTED.md` |

## Adding New Plugins

### For Module-Specific Reports

Add to the appropriate module folder:
```
finance/your_new_report/
hr/your_new_report/
sales/your_new_report/
etc.
```

### For General Utilities

Add to root level:
```
your_utility_plugin/
```

Only add at root if the plugin:
- Works across multiple modules
- Is a meta-component (like report listing)
- Provides shared functionality

## Summary

- **3 Active Plugins** (Cash Flow, Attendance, Report List)
- **6 Module Folders** (Finance, HR, Sales, Purchase, Stock, Production)
- **1 Common Design System** (Used by all plugins)
- **8+ Documentation Files** (Complete guides)
- **All Demos Have "Back" Buttons** (Easy navigation)

The structure is clean, organized, and ready for growth! 🚀
