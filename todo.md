# SixOrbit UI Framework - TODO

## Missing/Recommended Features (Priority Order)

---

### HIGH PRIORITY - Essential Components

| Component | Description | Use Case | Status |
| --------- | ----------- | -------- | ------ |
| **Tables** | Styled tables with striped, hover, bordered variants | Data display, reports | ✓ Done |
| **Pagination** | Page navigation with numbered pages, prev/next | Lists, search results | ✓ Done |
| **Spinners/Loaders** | Loading indicators (circle, dots, pulse) | Async operations | ✓ Done |
| **Skeleton Loaders** | Placeholder shapes during content loading | UX improvement | ✓ Done |
| **Offcanvas/Drawer** | Slide-in side panels | Mobile menus, filters | ✓ Done |

---

### MEDIUM PRIORITY - Nice to Have

| Component | Description | Use Case | Status |
| --------- | ----------- | -------- | ------ |
| **Stepper/Wizard** | Multi-step process indicator | Forms, onboarding | |
| **Timeline** | Vertical/horizontal event timeline | Activity logs, history | |
| **File Input/Dropzone** | Styled file upload with drag-drop | Forms | |
| **Popover** | Rich content tooltip (different from tooltip) | Help text, previews | ✓ Done |
| **Rating/Stars** | Star rating input/display | Reviews, feedback | |

---

### LOWER PRIORITY - Enhancement Features

| Feature | Description | Status |
| ------- | ----------- | ------ |
| **RTL Support** | Right-to-left language support (partial exists) | |
| **Expanded Print Styles** | More print-specific utilities | |
| **Code Block Component** | Syntax highlighting integration | |
| **Empty States** | Standardized "no data" patterns | ✓ Done |
| **Media Object** | Image + content pattern | |

---

## New Components (To Be Added)

### High Priority
- [ ] **Date Picker** - Calendar-based date selection (forms, scheduling)
- [ ] **Time Picker** - Hour/minute selection (scheduling, appointments)
- [ ] **Date Range Picker** - Two-date selection with calendar (reports, filters)
- [ ] **Tree View / Tree Select** - Hierarchical data display/selection (file browsers, categories)
- [ ] **Transfer List** - Dual-list selector available → selected (permissions, bulk assignment)

### Medium Priority
- [ ] **Mentions Input** - @user tagging in text (comments, chat)
- [ ] **Avatar Group** - Overlapping avatar stack with "+N" (team displays)
- [ ] **Infinite Scroll** - Load more on scroll (feeds, long lists)
- [ ] **Virtual List** - Virtualized rendering for 1000+ items (large datasets)
- [ ] **Countdown Timer** - Time remaining display (sales, events)
- [x] **Copy Button** - Click-to-copy with feedback (code blocks, IDs) ✓ IMPLEMENTED

### Lower Priority
- [ ] **Image Cropper** - Crop/resize images (profile photos)
- [ ] **Notification Center** - Bell icon with dropdown list (app notifications)
- [ ] **Keyboard Shortcuts** - Hotkey registration & display (power users)
- [ ] **Tour/Onboarding** - Step-by-step feature guide (new user experience)

---

## Existing Components - Improvements

### Table (so-table.js)
- [ ] Column resizing (drag to resize)
- [ ] Fixed/sticky header on scroll
- [ ] Column filtering (per-column dropdowns)
- [ ] Row grouping/aggregation
- [ ] Export to CSV/Excel
- [ ] Virtualization for 1000+ rows
- [ ] Inline cell editing

### Modal (so-modal.js)
- [ ] Draggable modal (movable by header)
- [ ] Maximizable/minimize toggle
- [ ] Nested modal management
- [ ] Mobile fullscreen auto-switch
- [ ] Modal with sidebar layout

### Tabs (so-tabs.js)
- [ ] Closable tabs (X button)
- [ ] Draggable tab reordering
- [ ] Overflow handling (scroll arrows or dropdown when many tabs)
- [ ] Tab badges/indicators
- [ ] Vertical tabs variant

### Dropdown/Select (so-select.js)
- [ ] Grouped options with headers
- [ ] Checkbox mode in multi-select
- [ ] Option icons/avatars
- [ ] "Select All" for multi-select
- [ ] Creatable (add new option inline)

### Toast (so-toast.js)
- [ ] Action buttons ("Undo", "View")
- [ ] Queue similar toasts (batch)
- [ ] Persistent toast (requires manual dismiss)
- [ ] Custom icons
- [ ] HTML content support

### Buttons
- [ ] Split button (button + dropdown arrow)
- [ ] Button with badge/counter
- [x] Async/loading state built-in ✓ IMPLEMENTED (data-loading attribute)
- [ ] Icon-only button sizing fixes

### Forms/Inputs
- [x] Input masking (phone: xxx-xxx-xxxx, card: xxxx xxxx xxxx xxxx) ✓ IMPLEMENTED
- [x] Password strength meter ✓ IMPLEMENTED
- [x] Character counter ✓ IMPLEMENTED
- [x] Clear button (X to clear input) ✓ IMPLEMENTED
- [x] Prefix/suffix improvements ✓ IMPLEMENTED

### Cards
- [x] Card loading/skeleton state ✓ IMPLEMENTED (data-loading attribute)
- [ ] Card selection (checkbox mode)
- [ ] Card actions overlay on hover
- [ ] Expandable card content

### Autocomplete (so-autocomplete.js)
- [ ] Virtualized dropdown (1000+ options)
- [ ] Recent/popular suggestions
- [ ] Keyboard shortcut hints
- [ ] Better mobile drawer mode

### Pagination (so-pagination.js)
- [ ] Jump to page input
- [ ] Items per page selector
- [ ] Total count display
- [ ] Compact mobile mode

---

## Quick Wins (Easy Improvements)

- [x] **Go to Top Button** - Scroll-to-top button that appears after scrolling down (long pages, mobile UX) ✓ IMPLEMENTED
- [x] **Skeleton presets** - so-skeleton-avatar, so-skeleton-card, so-skeleton-table-row, so-skeleton-list-item ✓ IMPLEMENTED
- [x] **Loading states** - Add data-loading attribute support to buttons/cards ✓ IMPLEMENTED
- [x] **Empty state presets** - No search results, No data, Error state, No permissions ✓ IMPLEMENTED
- [x] **Badge improvements** - Dot badge, animated badge, badge positions ✓ ALREADY EXISTS
- [x] **Tooltip enhancements** - Rich tooltips with HTML, images ✓ ALREADY EXISTS (via Popovers)

---

## Implementation Priority

### Phase 1 (High Value)
- [ ] Date Picker
- [ ] Table column resizing + fixed header
- [ ] Split buttons
- [x] Input masking ✓ IMPLEMENTED

### Phase 2 (User Experience)
- [ ] Tabs overflow handling
- [ ] Toast actions
- [x] Copy button utility ✓ IMPLEMENTED
- [x] Skeleton presets ✓ IMPLEMENTED

### Phase 3 (Advanced)
- [ ] Tree View
- [ ] Transfer List
- [ ] Virtual List
- [ ] Draggable modal
