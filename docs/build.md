# Build System

This document explains how to build the SixOrbit UI framework CSS and JavaScript files.

---

## Prerequisites

- **Node.js** v16 or higher
- **npm** or **yarn**

---

## Installation

```bash
# Navigate to project directory
cd so-framework

# Install dependencies
npm install
```

### Dependencies

The build system uses:
- `sass` - SCSS compilation
- `esbuild` - JavaScript bundling
- `javascript-obfuscator` - JS obfuscation (production only)

---

## Build Commands

### Production Build (Default)

```bash
node build.js
```

Outputs:
- Minified CSS with content hashing
- Obfuscated JS with content hashing
- Updated manifest.json

### Development Build

```bash
node build.js --dev
```

Outputs:
- Unminified CSS (readable)
- Non-obfuscated JS (debuggable)
- Source maps (if configured)

---

## Build Output

### Directory Structure

```
dist/
├── css/
│   ├── sixorbit-base.abc123.css    # Core styles
│   └── sixorbit-full.def456.css    # All styles
├── js/
│   ├── sixorbit-core.ghi789.js     # Core components
│   └── sixorbit-full.jkl012.js     # All components
├── pages/
│   └── global/
│       ├── global.mno345.css       # Sidebar, navbar, search
│       └── global.pqr678.js        # Sidebar controller, search
└── manifest.json                    # Asset paths with hashes
```

### Manifest File

The build generates a `manifest.json` with versioned file paths:

```json
{
  "css": {
    "sixorbit-base": "css/sixorbit-base.abc123.css",
    "sixorbit-full": "css/sixorbit-full.def456.css"
  },
  "js": {
    "sixorbit-core": "js/sixorbit-core.ghi789.js",
    "sixorbit-full": "js/sixorbit-full.jkl012.js"
  },
  "pages": {
    "global": {
      "css": "pages/global/global.mno345.css",
      "js": "pages/global/global.pqr678.js"
    }
  }
}
```

Use the manifest for cache-busting in your application.

---

## Source Files

### SCSS Structure

```
src/scss/
├── abstracts/           # Variables, mixins, functions
│   ├── _variables.scss
│   ├── _mixins.scss
│   └── _functions.scss
├── base/                # Reset, typography
│   ├── _reset.scss
│   └── _typography.scss
├── components/          # UI components
│   ├── _buttons.scss
│   ├── _cards.scss
│   ├── _modals.scss
│   └── ...
├── layout/              # Grid, containers
│   ├── _grid.scss
│   ├── _containers.scss
│   └── _main-content.scss
├── utilities/           # Helper classes
│   ├── _spacing.scss
│   ├── _display.scss
│   └── ...
├── sixorbit-base.scss   # Core entry point
└── sixorbit-full.scss   # Full entry point
```

### JavaScript Structure

```
src/js/
├── core/                # Core utilities
│   ├── so-config.js     # SixOrbit global config
│   └── so-component.js  # Base component class
├── components/          # UI components
│   ├── so-dropdown.js
│   ├── so-modal.js
│   ├── so-tabs.js
│   └── ...
├── features/            # Feature modules
│   ├── so-forms.js
│   └── so-auth.js
├── sixorbit-core.js     # Core entry point
└── sixorbit-full.js     # Full entry point
```

### Page-Specific Files

```
src/pages/
└── global/
    ├── global.scss      # Sidebar, navbar, search styles
    └── global.js        # SidebarController, GlobalSearchController
```

---

## Build Process

### SCSS Compilation

1. **Read entry files** (`sixorbit-base.scss`, `sixorbit-full.scss`)
2. **Resolve imports** using Sass module system (`@use`, `@forward`)
3. **Compile to CSS** with expanded or compressed output
4. **Generate hash** from content (first 8 chars)
5. **Write output** to `dist/css/`

### JavaScript Bundling

1. **Read entry files** (`sixorbit-core.js`, `sixorbit-full.js`)
2. **Bundle with esbuild** (resolves imports, tree-shaking)
3. **Obfuscate** (production only) with javascript-obfuscator
4. **Generate hash** from content
5. **Write output** to `dist/js/`

### Page Module Building

1. **Scan `src/pages/`** for page directories
2. **Compile SCSS** if `{page}.scss` exists
3. **Bundle JS** if `{page}.js` exists
4. **Output to** `dist/pages/{page}/`

---

## Adding New Components

### 1. Create Component SCSS

```scss
// src/scss/components/_my-component.scss
@use '../abstracts' as *;

.#{$so-prefix}my-component {
  // styles
}
```

### 2. Add to Index

```scss
// src/scss/components/_index.scss
@forward 'my-component';
```

### 3. Create Component JS

```javascript
// src/js/components/so-my-component.js
import SOComponent from '../core/so-component.js';

class SOMyComponent extends SOComponent {
  static NAME = 'myComponent';

  _init() {
    // initialization
  }
}

SOMyComponent.register();
export default SOMyComponent;
```

### 4. Add to Bundle

```javascript
// src/js/sixorbit-full.js
import SOMyComponent from './components/so-my-component.js';

// Add to exports
export { SOMyComponent };
```

### 5. Rebuild

```bash
node build.js
```

---

## Build Configuration

The build configuration is in `build.js`. Key settings:

```javascript
// CSS modules to build
const cssModules = [
  { name: 'sixorbit-base', entry: 'sixorbit-base.scss' },
  { name: 'sixorbit-full', entry: 'sixorbit-full.scss' },
];

// JS modules to build
const jsModules = [
  { name: 'sixorbit-core', entry: 'sixorbit-core.js' },
  { name: 'sixorbit-full', entry: 'sixorbit-full.js' },
];

// Page-specific modules
const pageModules = [
  { name: 'global', hasCSS: true, hasJS: true },
];
```

---

## Troubleshooting

### Build Fails with SCSS Error

Check for:
- Missing `@use` statements
- Invalid variable references
- Circular imports

### JS Bundle Too Large

Consider:
- Moving component to full-only bundle
- Tree-shaking unused exports
- Code splitting for page-specific features

### Hash Not Changing

The hash is based on file content. If output is identical:
- Clear `dist/` directory
- Verify source files changed
- Check for cached builds
