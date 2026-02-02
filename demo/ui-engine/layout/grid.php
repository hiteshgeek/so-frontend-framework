<?php
/**
 * SixOrbit UI Engine - Grid Element Demo
 */

$pageTitle = 'Grid - UI Engine';
$pageDescription = 'CSS Grid-based layout system';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <nav aria-label="breadcrumb">
            <ol class="so-breadcrumb">
                <li class="so-breadcrumb-item"><a href="../index.php">UI Engine</a></li>
                <li class="so-breadcrumb-item"><a href="../index.php#layout">Layout Elements</a></li>
                <li class="so-breadcrumb-item so-active">Grid</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">grid_on</span>
            Grid
        </h1>
        <p class="so-page-subtitle">CSS Grid-based layout system for complex two-dimensional layouts.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Grid -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Grid</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;">
                        <div class="so-bg-primary so-text-white so-p-3 so-rounded">Item 1</div>
                        <div class="so-bg-primary so-text-white so-p-3 so-rounded">Item 2</div>
                        <div class="so-bg-primary so-text-white so-p-3 so-rounded">Item 3</div>
                        <div class="so-bg-primary so-text-white so-p-3 so-rounded">Item 4</div>
                        <div class="so-bg-primary so-text-white so-p-3 so-rounded">Item 5</div>
                        <div class="so-bg-primary so-text-white so-p-3 so-rounded">Item 6</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-grid', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$grid = UiEngine::grid()
    ->columns(3)  // 3 equal columns
    ->gap(4)      // Gap between items
    ->item('Item 1')
    ->item('Item 2')
    ->item('Item 3')
    ->item('Item 4')
    ->item('Item 5')
    ->item('Item 6');

echo \$grid->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const grid = UiEngine.grid()
    .columns(3)
    .gap(4)
    .item('Item 1')
    .item('Item 2')
    .item('Item 3')
    .item('Item 4')
    .item('Item 5')
    .item('Item 6');

document.getElementById('container').innerHTML = grid.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-grid" style="grid-template-columns:repeat(3,1fr);gap:var(--so-gap-4);">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
    <div>Item 4</div>
    <div>Item 5</div>
    <div>Item 6</div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Responsive Columns -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Responsive Columns</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-grid so-grid-cols-1 so-grid-cols-sm-2 so-grid-cols-md-3 so-grid-cols-lg-4 so-gap-3">
                        <div class="so-bg-success so-text-white so-p-3 so-rounded">1</div>
                        <div class="so-bg-success so-text-white so-p-3 so-rounded">2</div>
                        <div class="so-bg-success so-text-white so-p-3 so-rounded">3</div>
                        <div class="so-bg-success so-text-white so-p-3 so-rounded">4</div>
                        <div class="so-bg-success so-text-white so-p-3 so-rounded">5</div>
                        <div class="so-bg-success so-text-white so-p-3 so-rounded">6</div>
                        <div class="so-bg-success so-text-white so-p-3 so-rounded">7</div>
                        <div class="so-bg-success so-text-white so-p-3 so-rounded">8</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('grid-responsive', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$grid = UiEngine::grid()
    ->columns(1)      // 1 column on mobile
    ->columnsSm(2)    // 2 columns on small
    ->columnsMd(3)    // 3 columns on medium
    ->columnsLg(4)    // 4 columns on large
    ->gap(3)
    ->items(['Item 1', 'Item 2', 'Item 3', 'Item 4',
             'Item 5', 'Item 6', 'Item 7', 'Item 8']);

echo \$grid->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const grid = UiEngine.grid()
    .columns(1)
    .columnsSm(2)
    .columnsMd(3)
    .columnsLg(4)
    .gap(3)
    .items(['Item 1', 'Item 2', 'Item 3', 'Item 4',
            'Item 5', 'Item 6', 'Item 7', 'Item 8']);

document.getElementById('container').innerHTML = grid.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Auto-fit Columns -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Auto-fit Columns</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(150px,1fr));gap:1rem;">
                        <div class="so-bg-info so-text-white so-p-3 so-rounded">Auto</div>
                        <div class="so-bg-info so-text-white so-p-3 so-rounded">Auto</div>
                        <div class="so-bg-info so-text-white so-p-3 so-rounded">Auto</div>
                        <div class="so-bg-info so-text-white so-p-3 so-rounded">Auto</div>
                        <div class="so-bg-info so-text-white so-p-3 so-rounded">Auto</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('grid-autofit', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Auto-fit: fills available space, wraps when needed
\$grid = UiEngine::grid()
    ->autoFit(150)  // Min 150px per column
    ->gap(4)
    ->items(['Card 1', 'Card 2', 'Card 3', 'Card 4', 'Card 5']);

// Auto-fill: creates empty columns if space allows
\$grid = UiEngine::grid()
    ->autoFill(200)  // Min 200px per column
    ->gap(4)
    ->items(['Card 1', 'Card 2']);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Auto-fit: fills available space, wraps when needed
const grid = UiEngine.grid()
    .autoFit(150)
    .gap(4)
    .items(['Card 1', 'Card 2', 'Card 3', 'Card 4', 'Card 5']);

// Auto-fill: creates empty columns if space allows
const grid2 = UiEngine.grid()
    .autoFill(200)
    .gap(4)
    .items(['Card 1', 'Card 2']);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Custom Column Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Custom Column Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div style="display:grid;grid-template-columns:200px 1fr 100px;gap:1rem;">
                        <div class="so-bg-warning so-text-dark so-p-3 so-rounded">200px</div>
                        <div class="so-bg-warning so-text-dark so-p-3 so-rounded">1fr (flexible)</div>
                        <div class="so-bg-warning so-text-dark so-p-3 so-rounded">100px</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('grid-custom', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Custom column template
\$grid = UiEngine::grid()
    ->templateColumns('200px 1fr 100px')  // Sidebar - Main - Aside
    ->gap(4)
    ->item('Sidebar')
    ->item('Main Content')
    ->item('Aside');

// Using fractions
\$grid = UiEngine::grid()
    ->templateColumns('1fr 2fr 1fr')  // 1:2:1 ratio
    ->gap(4)
    ->items(['Left', 'Center', 'Right']);

// Mix of units
\$grid = UiEngine::grid()
    ->templateColumns('auto 1fr minmax(100px, 300px)')
    ->gap(4);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Custom column template
const grid = UiEngine.grid()
    .templateColumns('200px 1fr 100px')
    .gap(4)
    .item('Sidebar')
    .item('Main Content')
    .item('Aside');

// Using fractions
const grid2 = UiEngine.grid()
    .templateColumns('1fr 2fr 1fr')
    .gap(4)
    .items(['Left', 'Center', 'Right']);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Grid with Rows -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Grid with Row Template</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div style="display:grid;grid-template-columns:1fr 1fr;grid-template-rows:auto 1fr auto;gap:1rem;height:250px;">
                        <div class="so-bg-primary so-text-white so-p-2 so-rounded" style="grid-column:span 2;">Header</div>
                        <div class="so-bg-secondary so-text-white so-p-2 so-rounded">Sidebar</div>
                        <div class="so-bg-success so-text-white so-p-2 so-rounded">Main</div>
                        <div class="so-bg-dark so-text-white so-p-2 so-rounded" style="grid-column:span 2;">Footer</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('grid-rows', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$grid = UiEngine::grid()
    ->templateColumns('1fr 1fr')
    ->templateRows('auto 1fr auto')  // Header, Content, Footer
    ->height(250)
    ->gap(4)
    ->item('Header', ['colSpan' => 2])
    ->item('Sidebar')
    ->item('Main Content')
    ->item('Footer', ['colSpan' => 2]);

echo \$grid->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const grid = UiEngine.grid()
    .templateColumns('1fr 1fr')
    .templateRows('auto 1fr auto')
    .height(250)
    .gap(4)
    .item('Header', {colSpan: 2})
    .item('Sidebar')
    .item('Main Content')
    .item('Footer', {colSpan: 2});

document.getElementById('container').innerHTML = grid.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Grid Item Span -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Grid Item Spanning</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div style="display:grid;grid-template-columns:repeat(4,1fr);grid-auto-rows:100px;gap:1rem;">
                        <div class="so-bg-primary so-text-white so-p-2 so-rounded so-d-flex so-align-items-center so-justify-content-center" style="grid-column:span 2;">Span 2 cols</div>
                        <div class="so-bg-success so-text-white so-p-2 so-rounded so-d-flex so-align-items-center so-justify-content-center">1</div>
                        <div class="so-bg-success so-text-white so-p-2 so-rounded so-d-flex so-align-items-center so-justify-content-center" style="grid-row:span 2;">Span 2 rows</div>
                        <div class="so-bg-info so-text-white so-p-2 so-rounded so-d-flex so-align-items-center so-justify-content-center">2</div>
                        <div class="so-bg-info so-text-white so-p-2 so-rounded so-d-flex so-align-items-center so-justify-content-center">3</div>
                        <div class="so-bg-info so-text-white so-p-2 so-rounded so-d-flex so-align-items-center so-justify-content-center">4</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('grid-span', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$grid = UiEngine::grid()
    ->columns(4)
    ->autoRows(100)  // Each row 100px
    ->gap(4)
    ->item('Wide item', ['colSpan' => 2])   // Spans 2 columns
    ->item('Normal')
    ->item('Tall item', ['rowSpan' => 2])   // Spans 2 rows
    ->item('Item 2')
    ->item('Item 3')
    ->item('Item 4');

// Both column and row span
\$grid->item('Large', [
    'colSpan' => 2,
    'rowSpan' => 2,
]);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const grid = UiEngine.grid()
    .columns(4)
    .autoRows(100)
    .gap(4)
    .item('Wide item', {colSpan: 2})
    .item('Normal')
    .item('Tall item', {rowSpan: 2})
    .item('Item 2')
    .item('Item 3')
    .item('Item 4');

// Both column and row span
grid.item('Large', {
    colSpan: 2,
    rowSpan: 2,
});"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Grid Alignment -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Grid Alignment</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('grid-align', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Align all items
\$grid = UiEngine::grid()
    ->columns(3)
    ->justifyItems('center')   // Horizontal: start, center, end, stretch
    ->alignItems('center')     // Vertical: start, center, end, stretch
    ->items(['A', 'B', 'C']);

// Align the grid itself within container
\$grid = UiEngine::grid()
    ->columns(3)
    ->justifyContent('center')  // Horizontal grid position
    ->alignContent('center')    // Vertical grid position
    ->items(['A', 'B', 'C']);

// Per-item alignment
\$grid->item('Centered', [
    'justifySelf' => 'center',
    'alignSelf' => 'center',
]);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Align all items
const grid = UiEngine.grid()
    .columns(3)
    .justifyItems('center')
    .alignItems('center')
    .items(['A', 'B', 'C']);

// Align the grid itself
const grid2 = UiEngine.grid()
    .columns(3)
    .justifyContent('center')
    .alignContent('center')
    .items(['A', 'B', 'C']);

// Per-item alignment
grid.item('Centered', {
    justifySelf: 'center',
    alignSelf: 'center',
});"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- API Reference -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">API Reference</h3>
            </div>
            <div class="so-card-body">
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead class="so-table-light">
                            <tr>
                                <th>Method</th>
                                <th>Parameters</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>columns()</code></td>
                                <td><code>int $count</code></td>
                                <td>Set number of equal columns</td>
                            </tr>
                            <tr>
                                <td><code>templateColumns()</code></td>
                                <td><code>string $template</code></td>
                                <td>Set custom column template</td>
                            </tr>
                            <tr>
                                <td><code>templateRows()</code></td>
                                <td><code>string $template</code></td>
                                <td>Set custom row template</td>
                            </tr>
                            <tr>
                                <td><code>autoFit()</code></td>
                                <td><code>int $minWidth</code></td>
                                <td>Auto-fit columns with minimum width</td>
                            </tr>
                            <tr>
                                <td><code>autoFill()</code></td>
                                <td><code>int $minWidth</code></td>
                                <td>Auto-fill columns with minimum width</td>
                            </tr>
                            <tr>
                                <td><code>gap()</code></td>
                                <td><code>int $size</code></td>
                                <td>Set gap between items (0-5)</td>
                            </tr>
                            <tr>
                                <td><code>item()</code></td>
                                <td><code>mixed $content, array $options</code></td>
                                <td>Add grid item with optional span</td>
                            </tr>
                            <tr>
                                <td><code>items()</code></td>
                                <td><code>array $items</code></td>
                                <td>Add multiple items at once</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
