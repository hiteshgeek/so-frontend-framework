# Grid System

SixOrbit UI provides two grid systems: a Bootstrap-compatible **Flexbox Grid** and a modern **CSS Grid** system.

---

## Breakpoints

Both grid systems use the same responsive breakpoints:

| Breakpoint | Prefix | Min Width | Target |
|------------|--------|-----------|--------|
| Extra small | None | 0 | Small phones |
| Small | `sm` | 576px | Phones |
| Medium | `md` | 768px | Tablets |
| Large | `lg` | 992px | Laptops |
| Extra large | `xl` | 1200px | Desktops |
| Extra extra large | `xxl` | 1400px | Large screens |

---

## Containers

Containers center and constrain content width.

### Container Types

```html
<!-- Responsive container - changes max-width at breakpoints -->
<div class="so-container">
  Content
</div>

<!-- Fluid container - always 100% wide -->
<div class="so-container-fluid">
  Full-width content
</div>

<!-- Breakpoint containers - 100% until specified breakpoint -->
<div class="so-container-sm">100% until sm (576px)</div>
<div class="so-container-md">100% until md (768px)</div>
<div class="so-container-lg">100% until lg (992px)</div>
<div class="so-container-xl">100% until xl (1200px)</div>
<div class="so-container-xxl">100% until xxl (1400px)</div>
```

### Container Max-Widths

| Breakpoint | Max Width |
|------------|-----------|
| sm (≥576px) | 540px |
| md (≥768px) | 720px |
| lg (≥992px) | 960px |
| xl (≥1200px) | 1140px |
| xxl (≥1400px) | 1320px |

---

## Flexbox Grid (Bootstrap-compatible)

A 12-column grid system using CSS Flexbox.

### Basic Usage

```html
<div class="so-row">
  <div class="so-col-6">Half width</div>
  <div class="so-col-6">Half width</div>
</div>

<div class="so-row">
  <div class="so-col-4">One third</div>
  <div class="so-col-4">One third</div>
  <div class="so-col-4">One third</div>
</div>
```

### Column Classes

| Class | Description |
|-------|-------------|
| `.so-col` | Equal-width auto column |
| `.so-col-auto` | Size to content |
| `.so-col-1` to `.so-col-12` | Fixed width (1/12 to 12/12) |

### Responsive Columns

Use breakpoint infixes for responsive behavior:

```html
<div class="so-row">
  <!-- Full width on mobile, half on md+, third on lg+ -->
  <div class="so-col-12 so-col-md-6 so-col-lg-4">
    Responsive column
  </div>
</div>
```

| Class Pattern | Behavior |
|---------------|----------|
| `.so-col-*` | All screen sizes |
| `.so-col-sm-*` | ≥576px |
| `.so-col-md-*` | ≥768px |
| `.so-col-lg-*` | ≥992px |
| `.so-col-xl-*` | ≥1200px |
| `.so-col-xxl-*` | ≥1400px |

### Row Columns

Control how many columns per row:

```html
<!-- 2 equal columns per row -->
<div class="so-row so-row-cols-2">
  <div class="so-col">Item 1</div>
  <div class="so-col">Item 2</div>
  <div class="so-col">Item 3</div>
  <div class="so-col">Item 4</div>
</div>

<!-- Responsive: 1 on mobile, 2 on md, 3 on lg -->
<div class="so-row so-row-cols-1 so-row-cols-md-2 so-row-cols-lg-3">
  <!-- items -->
</div>
```

### Gutters (Spacing)

Control spacing between columns:

```html
<!-- No gutters -->
<div class="so-row so-g-0">...</div>

<!-- Small gutters -->
<div class="so-row so-g-2">...</div>

<!-- Default gutters (24px) -->
<div class="so-row so-g-4">...</div>

<!-- Large gutters -->
<div class="so-row so-g-5">...</div>

<!-- Horizontal only -->
<div class="so-row so-gx-4 so-gy-0">...</div>

<!-- Vertical only -->
<div class="so-row so-gx-0 so-gy-4">...</div>
```

| Class | Size |
|-------|------|
| `.so-g-0` | 0 |
| `.so-g-1` | 0.25rem (4px) |
| `.so-g-2` | 0.5rem (8px) |
| `.so-g-3` | 1rem (16px) |
| `.so-g-4` | 1.5rem (24px) |
| `.so-g-5` | 3rem (48px) |

### Offsets

Push columns to the right:

```html
<div class="so-row">
  <div class="so-col-4 so-offset-4">Centered column</div>
</div>

<div class="so-row">
  <div class="so-col-3 so-offset-md-3">Offset on md+</div>
</div>
```

### Column Ordering

```html
<div class="so-row">
  <div class="so-col so-order-3">First in HTML, third visually</div>
  <div class="so-col so-order-1">Second in HTML, first visually</div>
  <div class="so-col so-order-2">Third in HTML, second visually</div>
</div>

<!-- Special values -->
<div class="so-col so-order-first">Always first</div>
<div class="so-col so-order-last">Always last</div>
```

### Alignment

#### Vertical Alignment (Row)

```html
<div class="so-row so-align-items-start">Top aligned</div>
<div class="so-row so-align-items-center">Middle aligned</div>
<div class="so-row so-align-items-end">Bottom aligned</div>
<div class="so-row so-align-items-baseline">Baseline aligned</div>
<div class="so-row so-align-items-stretch">Stretch (default)</div>
```

#### Horizontal Alignment (Row)

```html
<div class="so-row so-justify-content-start">Left aligned</div>
<div class="so-row so-justify-content-center">Center aligned</div>
<div class="so-row so-justify-content-end">Right aligned</div>
<div class="so-row so-justify-content-between">Space between</div>
<div class="so-row so-justify-content-around">Space around</div>
<div class="so-row so-justify-content-evenly">Space evenly</div>
```

#### Individual Column Alignment

```html
<div class="so-row">
  <div class="so-col so-align-self-start">Top</div>
  <div class="so-col so-align-self-center">Middle</div>
  <div class="so-col so-align-self-end">Bottom</div>
</div>
```

---

## CSS Grid System

A modern alternative using native CSS Grid.

### Basic Usage

```html
<!-- 12-column grid -->
<div class="so-grid">
  <div class="so-col-span-6">Half width</div>
  <div class="so-col-span-6">Half width</div>
</div>

<!-- Explicit column count -->
<div class="so-grid so-grid-cols-3">
  <div>Column 1</div>
  <div>Column 2</div>
  <div>Column 3</div>
</div>
```

### Auto-fit / Auto-fill

Automatically size columns:

```html
<!-- Columns shrink to fit, minimum 250px -->
<div class="so-grid-auto-fit">
  <div>Card 1</div>
  <div>Card 2</div>
  <div>Card 3</div>
</div>

<!-- Columns maintain size, may have empty space -->
<div class="so-grid-auto-fill">
  <div>Card 1</div>
  <div>Card 2</div>
</div>

<!-- Customize minimum column width -->
<div class="so-grid-auto-fit" style="--so-grid-min-col: 300px;">
  <!-- Min 300px columns -->
</div>
```

### Grid Column Templates

```html
<!-- Fixed column counts -->
<div class="so-grid so-grid-cols-1">1 column</div>
<div class="so-grid so-grid-cols-2">2 columns</div>
<div class="so-grid so-grid-cols-3">3 columns</div>
<div class="so-grid so-grid-cols-4">4 columns</div>
<!-- ... up to so-grid-cols-12 -->

<!-- Responsive columns -->
<div class="so-grid so-grid-cols-1 so-grid-cols-md-2 so-grid-cols-lg-3">
  Responsive grid
</div>
```

### Column Spanning

```html
<div class="so-grid so-grid-cols-12">
  <div class="so-col-span-8">Spans 8 columns</div>
  <div class="so-col-span-4">Spans 4 columns</div>
  <div class="so-col-span-full">Full width</div>
</div>

<!-- Responsive spanning -->
<div class="so-col-span-12 so-col-span-md-6 so-col-span-lg-4">
  Responsive span
</div>
```

### Row Spanning

```html
<div class="so-grid so-grid-cols-3 so-grid-rows-3">
  <div class="so-row-span-2">Spans 2 rows</div>
  <div>Normal cell</div>
  <div class="so-row-span-full">Full height</div>
</div>
```

### Grid Positioning

Control exact placement:

```html
<div class="so-grid so-grid-cols-4">
  <div class="so-col-start-2 so-col-end-4">
    Starts at column 2, ends at column 4
  </div>
</div>
```

### Grid Gap

```html
<!-- Gap sizes -->
<div class="so-grid so-grid-gap-0">No gap</div>
<div class="so-grid so-grid-gap-1">4px</div>
<div class="so-grid so-grid-gap-2">8px</div>
<div class="so-grid so-grid-gap-3">16px</div>
<div class="so-grid so-grid-gap-4">24px (default)</div>
<div class="so-grid so-grid-gap-5">48px</div>
<div class="so-grid so-grid-gap-6">64px</div>

<!-- Directional gaps -->
<div class="so-grid so-grid-gap-x-4 so-grid-gap-y-2">
  Different horizontal/vertical gaps
</div>

<!-- Responsive gap -->
<div class="so-grid so-grid-responsive-gap">
  Auto-scales with viewport
</div>
```

### Grid Flow

Control auto-placement direction:

```html
<div class="so-grid so-grid-flow-row">Left to right, top to bottom</div>
<div class="so-grid so-grid-flow-col">Top to bottom, left to right</div>
<div class="so-grid so-grid-flow-dense">Fill gaps automatically</div>
<div class="so-grid so-grid-flow-row-dense">Row with dense packing</div>
```

### Alignment (CSS Grid)

```html
<!-- Align all items -->
<div class="so-grid so-place-items-center">Centered items</div>
<div class="so-grid so-place-items-start">Top-left items</div>
<div class="so-grid so-place-items-end">Bottom-right items</div>

<!-- Justify items (horizontal) -->
<div class="so-grid so-justify-items-start">Left aligned</div>
<div class="so-grid so-justify-items-center">Center aligned</div>
<div class="so-grid so-justify-items-end">Right aligned</div>

<!-- Individual item -->
<div class="so-place-self-center">This item is centered</div>
```

### Grid Template Areas

For named grid areas:

```html
<div class="so-grid so-grid-areas" style="--so-grid-areas: 'header header' 'sidebar main' 'footer footer'; grid-template-columns: 200px 1fr; grid-template-rows: auto 1fr auto;">
  <header style="grid-area: header;">Header</header>
  <aside style="grid-area: sidebar;">Sidebar</aside>
  <main style="grid-area: main;">Main</main>
  <footer style="grid-area: footer;">Footer</footer>
</div>
```

---

## Preset Layouts

Ready-to-use layout patterns:

### Dashboard Grid

```html
<div class="so-grid-dashboard">
  <div class="so-card">Card 1</div>
  <div class="so-card">Card 2</div>
  <div class="so-card">Card 3</div>
  <div class="so-card">Card 4</div>
</div>
```
Auto-fits cards with minimum 300px width.

### Sidebar Layout

```html
<!-- Sidebar left -->
<div class="so-grid-sidebar">
  <aside>Sidebar (250px)</aside>
  <main>Main content (flexible)</main>
</div>

<!-- Sidebar right -->
<div class="so-grid-sidebar-right">
  <main>Main content (flexible)</main>
  <aside>Sidebar (250px)</aside>
</div>
```

### Holy Grail Layout

```html
<div class="so-grid-holy-grail">
  <header style="grid-area: header;">Header</header>
  <nav style="grid-area: nav;">Navigation</nav>
  <main style="grid-area: main;">Main Content</main>
  <aside style="grid-area: aside;">Sidebar</aside>
  <footer style="grid-area: footer;">Footer</footer>
</div>
```

---

## Flexbox Grid vs CSS Grid

### When to Use Flexbox Grid

- Bootstrap migration
- Simple row/column layouts
- Content that flows in one direction
- Older browser support needed

### When to Use CSS Grid

- Complex two-dimensional layouts
- Overlapping elements
- Named grid areas
- Auto-fit responsive designs
- Modern browsers only

### Comparison

| Feature | Flexbox Grid | CSS Grid |
|---------|-------------|----------|
| Dimension | 1D (row or column) | 2D (rows and columns) |
| Sizing | Proportional (1-12) | Flexible (fr units) |
| Gaps | Via margins | Native `gap` property |
| Positioning | Flow-based | Explicit placement |
| Overlap | Limited | Supported |
| Browser Support | IE11+ | Modern browsers |

---

## Examples

### Responsive Card Grid

```html
<div class="so-row so-row-cols-1 so-row-cols-md-2 so-row-cols-lg-3 so-g-4">
  <div class="so-col">
    <div class="so-card">Card 1</div>
  </div>
  <div class="so-col">
    <div class="so-card">Card 2</div>
  </div>
  <div class="so-col">
    <div class="so-card">Card 3</div>
  </div>
</div>
```

### Blog Layout

```html
<div class="so-row">
  <!-- Main content: 8 columns on lg+, full on smaller -->
  <main class="so-col-12 so-col-lg-8">
    <article>Blog post content</article>
  </main>
  <!-- Sidebar: 4 columns on lg+, full on smaller -->
  <aside class="so-col-12 so-col-lg-4">
    <div class="so-card">Sidebar widgets</div>
  </aside>
</div>
```

### Form Layout

```html
<div class="so-row so-g-3">
  <div class="so-col-md-6">
    <label>First Name</label>
    <input type="text" class="so-input">
  </div>
  <div class="so-col-md-6">
    <label>Last Name</label>
    <input type="text" class="so-input">
  </div>
  <div class="so-col-12">
    <label>Email</label>
    <input type="email" class="so-input">
  </div>
  <div class="so-col-12">
    <button class="so-btn so-btn-primary">Submit</button>
  </div>
</div>
```

### Dashboard with CSS Grid

```html
<div class="so-grid so-grid-cols-1 so-grid-cols-md-2 so-grid-cols-xl-4 so-grid-gap-4">
  <!-- Stats cards -->
  <div class="so-card">Revenue: $12,500</div>
  <div class="so-card">Orders: 150</div>
  <div class="so-card">Customers: 1,200</div>
  <div class="so-card">Products: 85</div>

  <!-- Charts spanning multiple columns -->
  <div class="so-card so-col-span-1 so-col-span-md-2">
    Sales Chart
  </div>
  <div class="so-card so-col-span-1 so-col-span-md-2">
    Traffic Chart
  </div>
</div>
```
