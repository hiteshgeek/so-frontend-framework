# SixOrbit Plugin Library

Welcome to the SixOrbit ERP Plugin Library! This repository contains reusable, framework-agnostic UI components built with Material Design principles and Google-style aesthetics.

## 📁 Repository Structure

```
sixorbit_plugins/
├── index.html                          # Plugin library homepage
├── README.md                           # This file
│
├── common/                             # Shared design system
│   ├── sixorbit-common.css            # Common CSS framework
│   ├── README.md                       # Design system documentation
│   ├── plugin-template.html           # HTML template for new plugins
│   └── plugin-template.css            # CSS template for new plugins
│
├── report_list/                        # Report List Plugin
│   ├── index.html                      # Plugin demo
│   ├── report-list-plugin.js          # Plugin JavaScript
│   ├── report-list-plugin.css         # Plugin-specific styles
│   └── report-list-data.js            # Sample data
│
├── cash_flow_summary/                  # Cash Flow Dashboard Plugin
│   ├── index.html                      # Plugin demo
│   ├── cashflow-dashboard-v2.js       # Plugin JavaScript
│   └── cashflow-dashboard.css         # Plugin-specific styles
│
└── multi_employee_attendance_viewer/   # Attendance Plugin
    ├── demo.html                       # Plugin demo
    ├── attendance-plugin.js            # Plugin JavaScript
    └── attendance-plugin.css           # Plugin-specific styles
```

## 🚀 Quick Start

### For Users

1. **View All Plugins**
   - Open `index.html` in your browser to see all available plugins

2. **Try Individual Plugins**
   - Report List: Open `report_list/index.html`
   - Cash Flow Dashboard: Open `cash_flow_summary/index.html`
   - Attendance Manager: Open `multi_employee_attendance_viewer/demo.html`

### For Developers

1. **Create a New Plugin**
   ```bash
   # Create a new directory for your plugin
   mkdir my_new_plugin
   cd my_new_plugin

   # Copy templates
   cp ../common/plugin-template.html index.html
   cp ../common/plugin-template.css my-plugin.css
   ```

2. **Include Common Styles**
   ```html
   <!-- In your plugin's HTML file -->
   <link rel="stylesheet" href="../common/sixorbit-common.css">
   <link rel="stylesheet" href="my-plugin.css">
   ```

3. **Use Design Tokens**
   ```css
   /* In your plugin's CSS file */
   .my-element {
       color: var(--so-primary);
       padding: var(--so-space-lg);
       border-radius: var(--so-radius-md);
   }
   ```

4. **Read the Documentation**
   - [Common Design System Docs](common/README.md)

## 📦 Available Plugins

### 1. Report List Plugin
**Purpose:** Display and manage reports with favorites and search functionality

**Features:**
- Grid/List view modes
- Real-time search filtering
- Favorites system
- Most used tracking
- Fully responsive

**Use Cases:**
- Sales reports dashboard
- Financial reports listing
- Analytics reports catalog

---

### 2. Cash Flow Dashboard
**Purpose:** Visualize hierarchical financial data with detailed cash flow analysis

**Features:**
- Hierarchical data structure
- Expand/collapse groups
- Number format switching (full/short)
- Visual progress bars
- Mobile optimized

**Use Cases:**
- Cash flow analysis
- Financial reporting
- Budget tracking
- Income/expense visualization

---

### 3. Multi Employee Attendance Manager
**Purpose:** Track and visualize employee attendance across multiple days

**Features:**
- Multi-day calendar view
- Real-time statistics
- Advanced filtering (search, status, date range)
- Frozen employee column
- Attendance method indicators

**Use Cases:**
- HR attendance tracking
- Employee presence monitoring
- Attendance reports
- Time and attendance management

## 🎨 Design System

All plugins use the **SixOrbit Common Design System**, which provides:

- **CSS Variables** for colors, spacing, typography, shadows, etc.
- **Reusable Components** (buttons, cards, forms, tables, badges, etc.)
- **Material Design** principles
- **Google-style** aesthetics
- **Responsive utilities**
- **Consistent branding** across all plugins

### Key Design Tokens

```css
/* Colors */
--so-primary: #1a73e8;
--so-success: #34a853;
--so-warning: #f9ab00;
--so-error: #ea4335;

/* Spacing */
--so-space-sm: 8px;
--so-space-md: 12px;
--so-space-lg: 16px;
--so-space-xl: 20px;

/* Typography */
--so-text-base: 13px;
--so-text-lg: 16px;
--so-text-2xl: 20px;

/* Shadows */
--so-shadow-1: /* Light shadow */
--so-shadow-2: /* Medium shadow */
```

[→ Full Design System Documentation](common/README.md)

## 🛠️ Development Guidelines

### Creating a New Plugin

1. **Plan Your Plugin**
   - Define the purpose and features
   - Sketch the UI layout
   - Identify reusable components

2. **Use the Templates**
   - Start with `plugin-template.html` and `plugin-template.css`
   - Customize for your specific needs

3. **Follow Naming Conventions**
   - Prefix plugin-specific classes (e.g., `mp-` for "my-plugin")
   - Use BEM naming: `.block__element--modifier`

4. **Use Common Components**
   - Always check if a common component exists before creating custom styles
   - Extend common components rather than recreating them

5. **Test Responsiveness**
   - Test on desktop (1920px, 1366px, 1024px)
   - Test on tablet (768px)
   - Test on mobile (480px, 375px)

6. **Use CSS Variables**
   - Never hardcode colors, spacing, or design tokens
   - Always use variables from `sixorbit-common.css`

### Code Quality Standards

- ✅ Clean, semantic HTML
- ✅ Accessible (ARIA labels, keyboard navigation)
- ✅ Mobile-first responsive design
- ✅ Cross-browser compatible
- ✅ Well-commented code
- ✅ Consistent indentation (2 or 4 spaces)

## 📖 Documentation

- **Design System:** [common/README.md](common/README.md)
- **HTML Template:** [common/plugin-template.html](common/plugin-template.html)
- **CSS Template:** [common/plugin-template.css](common/plugin-template.css)

## 🌐 Browser Support

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile Safari (iOS)
- Chrome Mobile (Android)

## 📝 Adding Your Plugin to the Library

After creating your plugin:

1. **Test thoroughly** on all supported browsers and devices

2. **Update the main index.html** to include your plugin card:
   ```html
   <div class="plugin-card">
       <div class="plugin-header">
           <div class="plugin-icon">
               <span class="material-icons">your_icon</span>
           </div>
           <h2 class="plugin-title">Your Plugin Name</h2>
           <div class="plugin-version">v1.0.0</div>
       </div>
       <!-- ... rest of the card ... -->
   </div>
   ```

3. **Document your plugin** with a README in its directory

4. **Share with the team** for review and feedback

## 🤝 Contributing

When contributing to the common design system:

1. Follow existing naming conventions (`so-` prefix)
2. Use CSS variables for all values
3. Include hover and focus states
4. Test responsive behavior
5. Update documentation in [common/README.md](common/README.md)

## 📞 Support

For questions or support:
- Contact the SixOrbit development team
- Review the [Design System Documentation](common/README.md)
- Check existing plugin implementations for examples

## 🎯 Goals

- **Consistency:** All plugins share the same look and feel
- **Reusability:** Components can be used across multiple plugins
- **Maintainability:** Common styles in one place for easy updates
- **Scalability:** Easy to add new plugins and components
- **Quality:** High-quality, production-ready UI components

## 📊 Stats

- **Active Plugins:** 3
- **Common Components:** 20+
- **CSS Variables:** 50+
- **Design Tokens:** Comprehensive system

---

**Built with ❤️ for SixOrbit ERP**

Last Updated: 2026-01-08
