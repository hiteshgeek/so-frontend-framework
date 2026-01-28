# Components

This document covers the JavaScript components available in SixOrbit UI Framework.

---

## Component Architecture

All components extend `SOComponent`, which provides:

- **Lifecycle Management**: Automatic initialization and cleanup
- **Event Handling**: `on()`, `off()`, `emit()` methods
- **DOM Utilities**: `$()`, `$$()`, `addClass()`, `removeClass()`
- **Instance Management**: `getInstance()` pattern for singleton-per-element

### Base Pattern

```javascript
// Get existing instance or create new one
const modal = SOModal.getInstance('#myModal');

// Or with options
const modal = new SOModal(element, { backdrop: true });
```

---

## Modal (SOModal)

Modal dialogs with focus trapping, backdrop, and keyboard support.

### Basic Usage

```html
<div class="so-modal" id="exampleModal">
  <div class="so-modal-dialog">
    <div class="so-modal-content">
      <div class="so-modal-header">
        <h5 class="so-modal-title">Modal Title</h5>
        <button class="so-modal-close" data-dismiss="modal">
          <span class="material-icons">close</span>
        </button>
      </div>
      <div class="so-modal-body">
        Modal content here...
      </div>
      <div class="so-modal-footer">
        <button class="so-btn so-btn-outline" data-dismiss="modal">Cancel</button>
        <button class="so-btn so-btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
```

### JavaScript API

```javascript
// Get or create instance
const modal = SOModal.getInstance('#exampleModal');

// Methods
modal.show();           // Open modal
modal.hide();           // Close modal
modal.toggle();         // Toggle visibility
modal.isOpen();         // Check if open
modal.setTitle('New Title');
modal.setContent('<p>New content</p>');

// Events
element.addEventListener('modal:show', () => console.log('Opening'));
element.addEventListener('modal:shown', () => console.log('Opened'));
element.addEventListener('modal:hide', () => console.log('Closing'));
element.addEventListener('modal:hidden', () => console.log('Closed'));
```

### Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `backdrop` | boolean | `true` | Show backdrop overlay |
| `keyboard` | boolean | `true` | Close on Escape key |
| `focus` | boolean | `true` | Trap focus inside modal |
| `closable` | boolean | `true` | Allow closing via X button |
| `size` | string | `'default'` | `'sm'`, `'default'`, `'lg'`, `'xl'`, `'fullscreen'` |
| `animation` | boolean | `true` | Enable animations |
| `static` | boolean | `false` | Prevent dismissal (no close, escape, backdrop click) |

### Static Methods

```javascript
// Create modal programmatically
const modal = SOModal.create({
  title: 'Dynamic Modal',
  content: '<p>Created via JavaScript</p>',
  size: 'lg',
  footer: '<button class="so-btn so-btn-primary" data-dismiss="modal">OK</button>'
});
modal.show();

// Confirmation dialog
const confirmed = await SOModal.confirm({
  title: 'Delete Item?',
  message: 'This action cannot be undone.',
  confirmText: 'Delete',
  cancelText: 'Cancel',
  danger: true
});
// confirmed: true/false

// Alert dialog
await SOModal.alert({
  title: 'Success',
  message: 'Your changes have been saved.',
  type: 'success' // info, success, warning, danger
});
```

---

## Toast (SOToast)

Toast notifications with auto-dismiss and stacking.

### Quick Methods

```javascript
// Success toast
SOToast.success('Item saved successfully');

// Error toast (longer duration)
SOToast.error('Failed to save item');

// Warning toast
SOToast.warning('Your session will expire soon');

// Info toast
SOToast.info('New updates available');
```

### Full Options

```javascript
const toast = SOToast.show({
  type: 'success',        // primary, secondary, success, danger, warning, info
  title: 'Success',       // Header title
  message: 'Operation completed',
  position: 'top-right',  // top-left, top-center, top-right, bottom-left, bottom-center, bottom-right
  autohide: true,         // Auto dismiss
  delay: 5000,            // Dismiss after 5 seconds
  showProgress: true,     // Show countdown bar
  pauseOnHover: true,     // Pause timer on hover
  closeButton: true,      // Show close button
  simple: true,           // Compact style without header
  onClick: () => {},      // Click handler
});

// Manual control
toast.pause();   // Pause auto-hide timer
toast.resume();  // Resume timer
toast.hide();    // Dismiss immediately

// Clear all toasts
SOToast.clear();
SOToast.clear('top-right'); // Clear specific position

// Get count
SOToast.getCount(); // Total active toasts
```

### Options

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `type` | string | `'info'` | Toast type/color |
| `position` | string | `'top-right'` | Screen position |
| `autohide` | boolean | `true` | Auto dismiss |
| `delay` | number | `5000` | Auto-hide delay in ms |
| `showProgress` | boolean | `true` | Show progress bar |
| `pauseOnHover` | boolean | `true` | Pause on mouse hover |
| `closeButton` | boolean | `true` | Show close button |
| `newestOnTop` | boolean | `true` | Stack newest on top |
| `maxVisible` | number | `5` | Max toasts per position |

---

## Dropdown (SODropdown)

Versatile dropdown menus with search, multi-select, and keyboard navigation.

### Basic Dropdown

```html
<div class="so-dropdown">
  <button class="so-dropdown-trigger">
    <span class="so-dropdown-selected">Select Option</span>
    <span class="material-icons so-dropdown-arrow">expand_more</span>
  </button>
  <div class="so-dropdown-menu">
    <a href="#" class="so-dropdown-item" data-value="1">Option 1</a>
    <a href="#" class="so-dropdown-item" data-value="2">Option 2</a>
    <a href="#" class="so-dropdown-item" data-value="3">Option 3</a>
  </div>
</div>
```

### Searchable Dropdown

```html
<div class="so-dropdown so-dropdown-searchable">
  <button class="so-dropdown-trigger">
    <span class="so-dropdown-selected">Select...</span>
    <span class="material-icons">expand_more</span>
  </button>
  <div class="so-dropdown-menu">
    <div class="so-dropdown-search">
      <input type="text" class="so-dropdown-search-input" placeholder="Search...">
    </div>
    <div class="so-dropdown-items">
      <a href="#" class="so-dropdown-item" data-value="1">Option 1</a>
      <!-- more items -->
    </div>
  </div>
</div>
```

### Multi-Select Dropdown

```html
<div class="so-dropdown"
     data-so-multiple="true"
     data-so-multiple-style="check"
     data-so-min-selections="1"
     data-so-show-actions="true"
     data-so-all-selected-text="All Items"
     data-so-multiple-selected-text="{count} selected">
  <!-- trigger and menu -->
</div>
```

### JavaScript API

```javascript
const dropdown = SODropdown.getInstance('.so-dropdown');

// Methods
dropdown.open();
dropdown.close();
dropdown.toggle();
dropdown.select('value', 'Text');      // Single select
dropdown.toggleSelect('value', 'Text'); // Multi-select toggle
dropdown.selectAll();                   // Select all (multi)
dropdown.selectNone();                  // Deselect all (multi)
dropdown.clearSelection();
dropdown.getValue();         // Get first selected value
dropdown.getValues();        // Get all selected values (array)
dropdown.getText();          // Get first selected text
dropdown.getTexts();         // Get all selected texts (array)
dropdown.enable();
dropdown.disable();
dropdown.isOpen();
dropdown.isDisabled();

// Events
element.addEventListener('dropdown:show', () => {});
element.addEventListener('dropdown:shown', () => {});
element.addEventListener('dropdown:hide', () => {});
element.addEventListener('dropdown:hidden', () => {});
element.addEventListener('dropdown:change', (e) => {
  console.log(e.detail.value, e.detail.values);
});
```

### Data Attributes

| Attribute | Description |
|-----------|-------------|
| `data-so-multiple` | Enable multi-select |
| `data-so-multiple-style` | `'checkbox'` or `'check'` |
| `data-so-max-selections` | Maximum selections allowed |
| `data-so-min-selections` | Minimum selections required |
| `data-so-show-actions` | Show All/None links |
| `data-so-all-selected-text` | Text when all selected |
| `data-so-multiple-selected-text` | Template: `'{count} selected'` |
| `data-so-auto-close` | `true`, `false`, `'inside'`, `'outside'` |
| `data-so-direction` | `'down'`, `'up'`, `'start'`, `'end'` |
| `data-so-alignment` | `'start'`, `'end'` |

---

## Tabs (SOTabs)

Tab navigation with content panels.

### HTML Structure

```html
<div class="so-tabs">
  <div class="so-tabs-nav">
    <button class="so-tab-btn active" data-tab="tab1">Tab 1</button>
    <button class="so-tab-btn" data-tab="tab2">Tab 2</button>
    <button class="so-tab-btn" data-tab="tab3">Tab 3</button>
  </div>
  <div class="so-tabs-content">
    <div class="so-tab-pane active" id="tab1">Content 1</div>
    <div class="so-tab-pane" id="tab2">Content 2</div>
    <div class="so-tab-pane" id="tab3">Content 3</div>
  </div>
</div>
```

### JavaScript API

```javascript
const tabs = SOTabs.getInstance('.so-tabs');

tabs.show('tab2');  // Show tab by ID
tabs.getActive();   // Get active tab ID

// Events
element.addEventListener('tabs:change', (e) => {
  console.log(e.detail.tab); // New tab ID
});
```

---

## Tooltip (SOTooltip)

Hover tooltips with positioning.

### Usage

```html
<button class="so-btn"
        data-so-tooltip="Tooltip text"
        data-so-placement="top">
  Hover me
</button>
```

### JavaScript API

```javascript
// Initialize all tooltips
SOTooltip.initAll();

// Get instance
const tooltip = SOTooltip.getInstance(element);

// Methods
tooltip.show();
tooltip.hide();
tooltip.setContent('New content');
tooltip.setPlacement('bottom');

// Create programmatically
SOTooltip.create(element, {
  content: 'Tooltip text',
  placement: 'top',  // top, bottom, left, right
  trigger: 'hover',  // hover, click, focus
  delay: 200
});
```

---

## Alert (SOAlert)

Dismissible alert messages.

### HTML Structure

```html
<div class="so-alert so-alert-success" data-dismissible>
  <span class="material-icons so-alert-icon">check_circle</span>
  <div class="so-alert-content">
    <strong>Success!</strong> Your changes have been saved.
  </div>
  <button class="so-alert-close" data-dismiss="alert">
    <span class="material-icons">close</span>
  </button>
</div>
```

### Alert Types

- `.so-alert-primary`
- `.so-alert-secondary`
- `.so-alert-success`
- `.so-alert-danger`
- `.so-alert-warning`
- `.so-alert-info`

### JavaScript API

```javascript
// Initialize all dismissible alerts
SOAlert.initAll();

// Get instance
const alert = SOAlert.getInstance(element);

alert.dismiss(); // Close with animation

// Events
element.addEventListener('alert:dismissed', () => {});
```

---

## Table (SOTable)

Enhanced tables with sorting and selection.

### HTML Structure

```html
<div class="so-table-container" data-so-sortable data-so-selectable>
  <table class="so-table">
    <thead>
      <tr>
        <th data-sort="name">Name</th>
        <th data-sort="date">Date</th>
        <th data-sort="amount" data-sort-type="number">Amount</th>
      </tr>
    </thead>
    <tbody>
      <tr data-row-id="1">
        <td>John Doe</td>
        <td>2024-01-15</td>
        <td>1,500</td>
      </tr>
    </tbody>
  </table>
</div>
```

### JavaScript API

```javascript
const table = SOTable.getInstance('.so-table-container');

// Sorting
table.sort('name', 'asc');  // Sort by column

// Selection
table.selectAll();
table.selectNone();
table.getSelectedIds();     // Array of selected row IDs

// Events
element.addEventListener('table:sort', (e) => {
  console.log(e.detail.column, e.detail.direction);
});
element.addEventListener('table:select', (e) => {
  console.log(e.detail.selectedIds);
});
```

---

## Pagination (SOPagination)

Pagination controls.

### HTML Structure

```html
<nav class="so-pagination" data-total="100" data-per-page="10" data-current="1">
  <!-- Generated automatically -->
</nav>
```

### JavaScript API

```javascript
const pagination = SOPagination.getInstance('.so-pagination');

pagination.setPage(5);      // Go to page 5
pagination.setTotal(200);   // Update total items
pagination.getPage();       // Get current page

// Events
element.addEventListener('pagination:change', (e) => {
  console.log(e.detail.page);
  // Load data for new page
});
```

---

## Select (SOSelect)

Custom styled select dropdowns.

### HTML Structure

```html
<div class="so-select">
  <select name="country">
    <option value="">Select country...</option>
    <option value="us">United States</option>
    <option value="uk">United Kingdom</option>
  </select>
</div>
```

### JavaScript API

```javascript
const select = SOSelect.getInstance('.so-select');

select.setValue('us');
select.getValue();
select.enable();
select.disable();

// Events
element.addEventListener('select:change', (e) => {
  console.log(e.detail.value);
});
```

---

## Progress Button (SOProgressButton)

Buttons with loading states.

### HTML Structure

```html
<button class="so-btn so-btn-primary so-progress-btn">
  <span class="so-btn-text">Submit</span>
  <span class="so-btn-loading">
    <span class="so-spinner-sm"></span>
    Processing...
  </span>
</button>
```

### JavaScript API

```javascript
const btn = SOProgressButton.getInstance('button');

btn.start();        // Show loading state
btn.stop();         // Return to normal
btn.setText('Saved!'); // Change text temporarily

// Auto-reset after async operation
btn.start();
await saveData();
btn.stop();
```

---

## OTP Input (SOOtpInput)

One-time password input fields.

### HTML Structure

```html
<div class="so-otp-group" data-length="6" data-type="number">
  <!-- Inputs generated automatically -->
</div>
```

### JavaScript API

```javascript
const otp = SOOtpInput.getInstance('.so-otp-group');

otp.getValue();     // Get complete OTP value
otp.setValue('123456');
otp.clear();
otp.focus();

// Events
element.addEventListener('otp:complete', (e) => {
  console.log(e.detail.value); // Full OTP entered
});
element.addEventListener('otp:change', (e) => {
  console.log(e.detail.value); // Partial value
});
```

---

## Context Menu (SOContextMenu)

Right-click context menus.

### Usage

```javascript
const menu = new SOContextMenu(triggerElement, {
  items: [
    { label: 'Edit', icon: 'edit', action: 'edit' },
    { label: 'Delete', icon: 'delete', action: 'delete', danger: true },
    { divider: true },
    { label: 'Properties', icon: 'info', action: 'properties' }
  ]
});

menu.on('action', (action, item) => {
  console.log('Selected action:', action);
});
```

---

## Ripple Effect (SORipple)

Material Design ripple effect on click.

### Usage

```html
<!-- Auto-enabled on .so-btn elements -->
<button class="so-btn so-btn-primary">Click Me</button>

<!-- Manual ripple -->
<div class="so-ripple" data-ripple>Click for ripple</div>
```

Ripple effects are automatically initialized on buttons. No JavaScript required.

---

## Theme (SOTheme)

Theme switching (light/dark mode).

### JavaScript API

```javascript
const theme = SOTheme.getInstance('.so-navbar-theme');

theme.setTheme('dark');     // light, dark, system
theme.getTheme();           // Current theme
theme.toggleDarkMode();     // Toggle light/dark

// Listen for changes
document.addEventListener('theme:change', (e) => {
  console.log(e.detail.theme);
});
```

---

## Event Naming Convention

All component events follow the pattern: `componentname:eventtype`

```javascript
// Modal events
'modal:show', 'modal:shown', 'modal:hide', 'modal:hidden'

// Dropdown events
'dropdown:show', 'dropdown:change'

// Toast events
'toast:show', 'toast:hidden', 'toast:click'

// Table events
'table:sort', 'table:select'
```

---

## Initialization

Components are auto-initialized on DOM ready for elements with appropriate classes. For dynamic content:

```javascript
// Initialize single element
const modal = new SOModal(element);

// Initialize all of a type
SODropdown.initAll();
SOTooltip.initAll();
SOAlert.initAll();
SOTabs.initAll();
SOTable.initAll();
SOPagination.initAll();
```
