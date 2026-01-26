# SixOrbit ERP - Report Plugin Library

## Project Overview

A comprehensive collection of framework-agnostic, reusable report plugins for SixOrbit ERP, organized by module with a common design system and extensive developer documentation.

---

## 📁 Project Structure

```
sixorbit_plugins/
├── index.html                      # Main landing page with all modules
├── PROJECT_OVERVIEW.md             # This file
├── README.md                       # General repository overview
├── GETTING_STARTED.md              # Developer onboarding guide
├── QUICK_REFERENCE.md              # Quick reference for common tasks
│
├── common/                         # Shared Design System
│   ├── sixorbit-common.css        # Common CSS framework
│   ├── README.md                   # Design system documentation
│   ├── components-showcase.html    # Visual component library
│   ├── plugin-template.html        # HTML template
│   └── plugin-template.css         # CSS template
│
├── finance/                        # Finance Module
│   └── cash_flow_summary/
│       ├── index.html              # Demo page
│       ├── cashflow-dashboard-v2.js
│       ├── cashflow-dashboard.css
│       └── DEVELOPER_GUIDE.md      # Complete developer docs
│
├── hr/                             # HR Module
│   └── multi_employee_attendance_viewer/
│       ├── demo.html               # Demo page
│       ├── attendance-plugin.js
│       ├── attendance-plugin.css
│       └── DEVELOPER_GUIDE.md      # Complete developer docs
│
├── sales/                          # Sales Module (Coming Soon)
├── purchase/                       # Purchase Module (Coming Soon)
├── stock/                          # Stock Module (Coming Soon)
├── production/                     # Production Module (Coming Soon)
│
└── report_list/                    # General Report Listing Plugin
    ├── index.html                  # Demo page
    ├── report-list-plugin.js
    ├── report-list-plugin.css
    └── DEVELOPER_GUIDE.md          # Complete developer docs
```

---

## 🎯 Project Goals

1. **Consistency** - All plugins share the same Material UI/Google-style design
2. **Modularity** - Organized by ERP module (Finance, HR, Sales, etc.)
3. **Reusability** - Framework-agnostic, easy to integrate anywhere
4. **Developer-Friendly** - Comprehensive docs with examples and JSON formats
5. **Scalability** - Easy to add new plugins and modules
6. **Quality** - Production-ready, responsive, cross-browser compatible

---

## 📦 Available Modules

### 1. Finance Module
**Reports:** 1 active
- **Cash Flow Dashboard** - Hierarchical financial reporting with expandable groups

### 2. HR Module
**Reports:** 1 active
- **Multi Employee Attendance** - Multi-day attendance tracking with filtering

### 3. Sales Module
**Reports:** Coming soon

### 4. Purchase Module
**Reports:** Coming soon

### 5. Stock Module
**Reports:** Coming soon

### 6. Production Module
**Reports:** Coming soon

---

## 🔌 Available Plugins

### 1. Cash Flow Dashboard (Finance)
- **File:** `finance/cash_flow_summary/`
- **Version:** 2.0.0
- **Features:**
  - Hierarchical data structure
  - Expand/collapse groups
  - Number format switching (full/short)
  - Visual progress bars
  - Mobile optimized
- **Documentation:** [DEVELOPER_GUIDE.md](finance/cash_flow_summary/DEVELOPER_GUIDE.md)

### 2. Multi Employee Attendance (HR)
- **File:** `hr/multi_employee_attendance_viewer/`
- **Version:** 1.0.0
- **Features:**
  - Multi-day calendar view
  - Real-time statistics
  - Advanced filtering (search, status, department)
  - Frozen employee column
  - Attendance method indicators
- **Documentation:** [DEVELOPER_GUIDE.md](hr/multi_employee_attendance_viewer/DEVELOPER_GUIDE.md)

### 3. Report List Plugin (General)
- **File:** `report_list/`
- **Version:** 1.0.0
- **Features:**
  - Grid/List view modes
  - Real-time search
  - Favorites system
  - Most used tracking
  - Category filtering
- **Documentation:** [DEVELOPER_GUIDE.md](report_list/DEVELOPER_GUIDE.md)

---

## 🎨 Design System

### Common CSS Framework
**File:** `common/sixorbit-common.css`

All plugins use the SixOrbit Common Design System which provides:

- **50+ CSS Variables** - Colors, spacing, typography, shadows
- **20+ Components** - Buttons, cards, forms, tables, badges, etc.
- **Material UI Principles** - Google-style aesthetics
- **Responsive Utilities** - Mobile-first design
- **Consistent Branding** - Same look and feel across all plugins

**Documentation:** [common/README.md](common/README.md)

---

## 📖 Documentation Files

### For Developers

1. **[GETTING_STARTED.md](GETTING_STARTED.md)** - Onboarding guide for new developers
2. **[QUICK_REFERENCE.md](QUICK_REFERENCE.md)** - Quick reference with code examples
3. **[common/README.md](common/README.md)** - Complete design system documentation
4. **[common/components-showcase.html](common/components-showcase.html)** - Visual component reference

### For Each Plugin

Each plugin has a comprehensive `DEVELOPER_GUIDE.md` that includes:

- ✅ Quick start examples
- ✅ Installation instructions
- ✅ Complete configuration options
- ✅ **Data format with JSON examples**
- ✅ **All available methods**
- ✅ **How to reload with fresh data**
- ✅ **Parameter descriptions**
- ✅ Multiple integration examples
- ✅ Troubleshooting guide
- ✅ Custom styling options

---

## 🚀 Quick Start for Developers

### 1. View the Main Library
Open `index.html` to see all available plugins organized by module.

### 2. Try a Plugin Demo
Each plugin has a demo page with a "Back to Main Menu" button:
- Finance: `finance/cash_flow_summary/index.html`
- HR: `hr/multi_employee_attendance_viewer/demo.html`
- Report List: `report_list/index.html`

### 3. Read Plugin Documentation
Each plugin folder contains a `DEVELOPER_GUIDE.md` with:
- Installation steps
- Data JSON format
- Initialization examples
- All methods and parameters
- How to reload with fresh data

### 4. Use the Templates
Copy `common/plugin-template.html` and `common/plugin-template.css` to create new plugins.

---

## 🛠️ Integrating a Plugin

### Basic Integration Steps

1. **Include CSS Files**
   ```html
   <!-- Common design system -->
   <link rel="stylesheet" href="../../common/sixorbit-common.css">

   <!-- Plugin-specific CSS -->
   <link rel="stylesheet" href="plugin-name.css">
   ```

2. **Include JavaScript**
   ```html
   <script src="plugin-name.js"></script>
   ```

3. **Create Container**
   ```html
   <div id="plugin-container"></div>
   ```

4. **Initialize Plugin**
   ```javascript
   const plugin = new PluginClass('plugin-container', {
       // Your configuration
       data: yourData
   });
   ```

5. **Reload with Fresh Data**
   ```javascript
   // Fetch new data
   const freshData = await fetchDataFromAPI();

   // Reload plugin
   plugin.reload(freshData);
   ```

**See each plugin's DEVELOPER_GUIDE.md for specific implementation details.**

---

## 📊 Plugin Features Matrix

| Feature | Cash Flow | Attendance | Report List |
|---------|-----------|------------|-------------|
| Hierarchical Data | ✅ | ❌ | ❌ |
| Search/Filter | ❌ | ✅ | ✅ |
| Export | ❌ | ✅ | ❌ |
| Favorites | ❌ | ❌ | ✅ |
| Grid/List Views | ❌ | ❌ | ✅ |
| Real-time Updates | ✅ | ✅ | ✅ |
| Mobile Optimized | ✅ | ✅ | ✅ |
| Fully Responsive | ✅ | ✅ | ✅ |

---

## 🎯 Adding a New Plugin

### Step-by-Step Process

1. **Determine Module** - Finance, HR, Sales, Purchase, Stock, or Production

2. **Create Directory**
   ```bash
   mkdir module_name/your_plugin_name
   ```

3. **Copy Templates**
   ```bash
   cp common/plugin-template.html module_name/your_plugin_name/index.html
   cp common/plugin-template.css module_name/your_plugin_name/your-plugin.css
   ```

4. **Develop Plugin**
   - Use common CSS variables
   - Prefix your classes (e.g., `yp-` for "your-plugin")
   - Follow existing plugin patterns

5. **Create Developer Guide**
   - Copy structure from existing `DEVELOPER_GUIDE.md`
   - Include JSON data format
   - Document all methods and parameters
   - Add reload examples

6. **Add to Main Index**
   - Update `index.html` with your plugin card
   - Update module stats

7. **Test**
   - Test on desktop (1920px, 1366px, 1024px)
   - Test on tablet (768px)
   - Test on mobile (480px, 375px)
   - Test in all browsers

---

## 🎨 Design Standards

### CSS Class Naming

- **Common classes:** Prefix with `so-` (SixOrbit)
  - Example: `so-btn`, `so-card`, `so-input`

- **Plugin-specific classes:** Use unique prefix
  - Cash Flow: `cf-` (cashflow)
  - Attendance: `am-` (attendance-manager)
  - Report List: `rp-` (report-plugin)

### Always Use CSS Variables

```css
/* ❌ Don't hardcode values */
.my-element {
    color: #1a73e8;
    padding: 16px;
}

/* ✅ Use design tokens */
.my-element {
    color: var(--so-primary);
    padding: var(--so-space-lg);
}
```

### Follow Material Design Principles

- Use elevation (shadows) for depth
- Consistent spacing and alignment
- Clear visual hierarchy
- Responsive and touch-friendly

---

## 📱 Browser Support

All plugins support:

- ✅ Chrome/Edge (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Mobile Safari (iOS)
- ✅ Chrome Mobile (Android)

**Minimum Requirements:**
- ES6 JavaScript
- CSS Grid & Flexbox
- CSS Variables

---

## 🔄 Plugin Development Workflow

### For New Features

1. Review existing plugins for patterns
2. Check if common component exists
3. Read design system docs
4. Develop using templates
5. Test responsiveness
6. Write developer documentation
7. Add to main index

### For Updates

1. Update plugin files
2. Update version number
3. Update DEVELOPER_GUIDE.md
4. Test backwards compatibility
5. Update main index if needed

---

## 📝 Documentation Standards

Each plugin MUST have a `DEVELOPER_GUIDE.md` that includes:

### Required Sections

1. **Overview** - What the plugin does
2. **Quick Start** - Minimal working example
3. **Installation** - Step-by-step setup
4. **Configuration Options** - All options with descriptions
5. **Data Format** - Complete JSON structure with examples
6. **Methods** - All public methods with parameters
7. **Examples** - Multiple real-world examples
8. **How to Reload** - How to refresh with new data
9. **Styling** - Customization options
10. **Troubleshooting** - Common issues

### Format Guidelines

- Use clear headings
- Include code examples for everything
- Show both minimal and complete examples
- Explain each parameter
- Include TypeScript-style type information

---

## 🤝 Team Collaboration

### File Organization

- Keep plugin files in their module folder
- Use consistent naming conventions
- Don't duplicate common code

### Code Reviews

Before merging new plugins:
- ✅ Follows naming conventions
- ✅ Uses CSS variables
- ✅ Has complete documentation
- ✅ Tested on all browsers
- ✅ Mobile responsive
- ✅ Accessible (ARIA labels)

### Communication

- Document all changes
- Update version numbers
- Notify team of breaking changes
- Share reusable components

---

## 🔧 Troubleshooting

### Plugin Not Appearing

1. Check container ID/selector
2. Verify CSS files are loaded
3. Check JavaScript console for errors
4. Verify data format is correct

### Styles Not Applied

1. Ensure `sixorbit-common.css` is loaded first
2. Check CSS file paths
3. Clear browser cache
4. Verify CSS variables are used

### Data Not Loading

1. Check data format matches documentation
2. Verify JSON is valid
3. Check browser console for errors
4. Review DEVELOPER_GUIDE.md for examples

---

## 📞 Support & Resources

### Documentation
- **Main Overview:** [README.md](README.md)
- **Getting Started:** [GETTING_STARTED.md](GETTING_STARTED.md)
- **Quick Reference:** [QUICK_REFERENCE.md](QUICK_REFERENCE.md)
- **Design System:** [common/README.md](common/README.md)

### Visual References
- **Main Library:** [index.html](index.html)
- **Component Showcase:** [common/components-showcase.html](common/components-showcase.html)

### Plugin Documentation
- **Cash Flow:** [finance/cash_flow_summary/DEVELOPER_GUIDE.md](finance/cash_flow_summary/DEVELOPER_GUIDE.md)
- **Attendance:** [hr/multi_employee_attendance_viewer/DEVELOPER_GUIDE.md](hr/multi_employee_attendance_viewer/DEVELOPER_GUIDE.md)
- **Report List:** [report_list/DEVELOPER_GUIDE.md](report_list/DEVELOPER_GUIDE.md)

---

## 📈 Future Roadmap

### Planned Modules

- [ ] Sales Reports (Customer analytics, order tracking)
- [ ] Purchase Reports (Vendor analysis, procurement)
- [ ] Stock Reports (Inventory management, valuations)
- [ ] Production Reports (Manufacturing analytics, efficiency)

### Planned Features

- [ ] Dark mode support
- [ ] Export to PDF/Excel
- [ ] Print-friendly views
- [ ] Keyboard navigation
- [ ] Advanced animations
- [ ] More chart types

---

## 📊 Project Stats

- **Total Plugins:** 3 active, multiple modules ready
- **Common Components:** 20+
- **CSS Variables:** 50+
- **Documentation Pages:** 8
- **Browser Support:** 5 major browsers
- **Mobile Support:** Full responsive design

---

## 🎉 Summary

The SixOrbit Report Plugin Library is a production-ready, well-documented collection of reusable UI components designed for enterprise ERP systems. With a strong focus on:

- **Developer Experience** - Easy to integrate with comprehensive docs
- **Consistency** - Shared design system across all plugins
- **Quality** - Production-ready, tested, responsive
- **Scalability** - Easy to add new plugins and modules
- **Modularity** - Organized by business function

Perfect for building consistent, beautiful reports across the entire SixOrbit ERP platform.

---

**Last Updated:** 2026-01-08
**Version:** 1.0.0
**Maintained By:** SixOrbit Development Team
