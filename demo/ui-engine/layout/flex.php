<?php
/**
 * SixOrbit UI Engine - Flex Element Demo
 */

$pageTitle = 'Flex - UI Engine';
$pageDescription = 'Flexbox-based layout utilities';

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
                <li class="so-breadcrumb-item so-active">Flex</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">view_agenda</span>
            Flex
        </h1>
        <p class="so-page-subtitle">Flexible box layout for one-dimensional layouts with powerful alignment control.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Flex -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Flex Container</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-3">
                        <div class="so-bg-primary so-text-white so-p-3 so-rounded">Item 1</div>
                        <div class="so-bg-primary so-text-white so-p-3 so-rounded">Item 2</div>
                        <div class="so-bg-primary so-text-white so-p-3 so-rounded">Item 3</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-flex', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$flex = UiEngine::flex()
    ->gap(3)
    ->item('Item 1')
    ->item('Item 2')
    ->item('Item 3');

echo \$flex->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const flex = UiEngine.flex()
    .gap(3)
    .item('Item 1')
    .item('Item 2')
    .item('Item 3');

document.getElementById('container').innerHTML = flex.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-d-flex so-gap-3">
    <div>Item 1</div>
    <div>Item 2</div>
    <div>Item 3</div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Flex Direction -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Flex Direction</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <p class="so-text-muted so-small">Row (default):</p>
                    <div class="so-d-flex so-flex-row so-gap-2 so-mb-4">
                        <div class="so-bg-primary so-text-white so-p-2 so-rounded">1</div>
                        <div class="so-bg-primary so-text-white so-p-2 so-rounded">2</div>
                        <div class="so-bg-primary so-text-white so-p-2 so-rounded">3</div>
                    </div>
                    <p class="so-text-muted so-small">Column:</p>
                    <div class="so-d-flex so-flex-column so-gap-2">
                        <div class="so-bg-success so-text-white so-p-2 so-rounded">1</div>
                        <div class="so-bg-success so-text-white so-p-2 so-rounded">2</div>
                        <div class="so-bg-success so-text-white so-p-2 so-rounded">3</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('flex-direction', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Horizontal row (default)
UiEngine::flex()
    ->direction('row')
    ->items(['1', '2', '3']);

// Horizontal reverse
UiEngine::flex()
    ->direction('row-reverse')
    ->items(['1', '2', '3']);

// Vertical column
UiEngine::flex()
    ->direction('column')
    ->items(['1', '2', '3']);

// Vertical reverse
UiEngine::flex()
    ->direction('column-reverse')
    ->items(['1', '2', '3']);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Horizontal row (default)
UiEngine.flex()
    .direction('row')
    .items(['1', '2', '3']);

// Horizontal reverse
UiEngine.flex()
    .direction('row-reverse')
    .items(['1', '2', '3']);

// Vertical column
UiEngine.flex()
    .direction('column')
    .items(['1', '2', '3']);

// Vertical reverse
UiEngine.flex()
    .direction('column-reverse')
    .items(['1', '2', '3']);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Justify Content -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Justify Content (Main Axis)</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <p class="so-text-muted so-small">Start:</p>
                    <div class="so-d-flex so-justify-content-start so-gap-2 so-mb-3 so-bg-white so-p-2 so-rounded">
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">A</div>
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">B</div>
                    </div>
                    <p class="so-text-muted so-small">Center:</p>
                    <div class="so-d-flex so-justify-content-center so-gap-2 so-mb-3 so-bg-white so-p-2 so-rounded">
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">A</div>
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">B</div>
                    </div>
                    <p class="so-text-muted so-small">End:</p>
                    <div class="so-d-flex so-justify-content-end so-gap-2 so-mb-3 so-bg-white so-p-2 so-rounded">
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">A</div>
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">B</div>
                    </div>
                    <p class="so-text-muted so-small">Space Between:</p>
                    <div class="so-d-flex so-justify-content-between so-mb-3 so-bg-white so-p-2 so-rounded">
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">A</div>
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">B</div>
                    </div>
                    <p class="so-text-muted so-small">Space Around:</p>
                    <div class="so-d-flex so-justify-content-around so-bg-white so-p-2 so-rounded">
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">A</div>
                        <div class="so-bg-info so-text-white so-p-2 so-rounded">B</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('flex-justify', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Align to start (left)
UiEngine::flex()
    ->justify('start')
    ->items(['A', 'B']);

// Align to center
UiEngine::flex()
    ->justify('center')
    ->items(['A', 'B']);

// Align to end (right)
UiEngine::flex()
    ->justify('end')
    ->items(['A', 'B']);

// Space between items
UiEngine::flex()
    ->justify('between')
    ->items(['A', 'B']);

// Space around items
UiEngine::flex()
    ->justify('around')
    ->items(['A', 'B']);

// Space evenly
UiEngine::flex()
    ->justify('evenly')
    ->items(['A', 'B']);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Align to start (left)
UiEngine.flex()
    .justify('start')
    .items(['A', 'B']);

// Align to center
UiEngine.flex()
    .justify('center')
    .items(['A', 'B']);

// Align to end (right)
UiEngine.flex()
    .justify('end')
    .items(['A', 'B']);

// Space between items
UiEngine.flex()
    .justify('between')
    .items(['A', 'B']);

// Space around items
UiEngine.flex()
    .justify('around')
    .items(['A', 'B']);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Align Items -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Align Items (Cross Axis)</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-row so-g-3">
                        <div class="so-col-4">
                            <p class="so-text-muted so-small">Start:</p>
                            <div class="so-d-flex so-align-items-start so-gap-2 so-bg-white so-p-2 so-rounded" style="height:100px;">
                                <div class="so-bg-warning so-text-dark so-p-2 so-rounded">A</div>
                                <div class="so-bg-warning so-text-dark so-p-2 so-rounded" style="padding:1.5rem!important;">B</div>
                            </div>
                        </div>
                        <div class="so-col-4">
                            <p class="so-text-muted so-small">Center:</p>
                            <div class="so-d-flex so-align-items-center so-gap-2 so-bg-white so-p-2 so-rounded" style="height:100px;">
                                <div class="so-bg-warning so-text-dark so-p-2 so-rounded">A</div>
                                <div class="so-bg-warning so-text-dark so-p-2 so-rounded" style="padding:1.5rem!important;">B</div>
                            </div>
                        </div>
                        <div class="so-col-4">
                            <p class="so-text-muted so-small">End:</p>
                            <div class="so-d-flex so-align-items-end so-gap-2 so-bg-white so-p-2 so-rounded" style="height:100px;">
                                <div class="so-bg-warning so-text-dark so-p-2 so-rounded">A</div>
                                <div class="so-bg-warning so-text-dark so-p-2 so-rounded" style="padding:1.5rem!important;">B</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('flex-align', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Align to top
UiEngine::flex()
    ->align('start')
    ->items(['A', 'B']);

// Align to center
UiEngine::flex()
    ->align('center')
    ->items(['A', 'B']);

// Align to bottom
UiEngine::flex()
    ->align('end')
    ->items(['A', 'B']);

// Stretch to fill (default)
UiEngine::flex()
    ->align('stretch')
    ->items(['A', 'B']);

// Align to baseline
UiEngine::flex()
    ->align('baseline')
    ->items(['A', 'B']);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Align to top
UiEngine.flex()
    .align('start')
    .items(['A', 'B']);

// Align to center
UiEngine.flex()
    .align('center')
    .items(['A', 'B']);

// Align to bottom
UiEngine.flex()
    .align('end')
    .items(['A', 'B']);

// Stretch to fill
UiEngine.flex()
    .align('stretch')
    .items(['A', 'B']);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Flex Wrap -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Flex Wrap</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-flex-wrap so-gap-2" style="width:300px;">
                        <div class="so-bg-danger so-text-white so-p-3 so-rounded" style="width:100px;">1</div>
                        <div class="so-bg-danger so-text-white so-p-3 so-rounded" style="width:100px;">2</div>
                        <div class="so-bg-danger so-text-white so-p-3 so-rounded" style="width:100px;">3</div>
                        <div class="so-bg-danger so-text-white so-p-3 so-rounded" style="width:100px;">4</div>
                        <div class="so-bg-danger so-text-white so-p-3 so-rounded" style="width:100px;">5</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('flex-wrap', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// No wrap (default) - items shrink
UiEngine::flex()
    ->wrap('nowrap')
    ->items(['1', '2', '3', '4', '5']);

// Wrap to next line
UiEngine::flex()
    ->wrap('wrap')
    ->items(['1', '2', '3', '4', '5']);

// Wrap reverse
UiEngine::flex()
    ->wrap('wrap-reverse')
    ->items(['1', '2', '3', '4', '5']);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// No wrap (default)
UiEngine.flex()
    .wrap('nowrap')
    .items(['1', '2', '3', '4', '5']);

// Wrap to next line
UiEngine.flex()
    .wrap('wrap')
    .items(['1', '2', '3', '4', '5']);

// Wrap reverse
UiEngine.flex()
    .wrap('wrap-reverse')
    .items(['1', '2', '3', '4', '5']);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Flex Item Properties -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Flex Item Properties</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <p class="so-text-muted so-small">Flex grow:</p>
                    <div class="so-d-flex so-gap-2 so-mb-4">
                        <div class="so-bg-primary so-text-white so-p-2 so-rounded" style="flex-grow:0;">No grow</div>
                        <div class="so-bg-success so-text-white so-p-2 so-rounded" style="flex-grow:1;">Grow</div>
                        <div class="so-bg-primary so-text-white so-p-2 so-rounded" style="flex-grow:0;">No grow</div>
                    </div>
                    <p class="so-text-muted so-small">Flex shrink:</p>
                    <div class="so-d-flex so-gap-2" style="width:250px;">
                        <div class="so-bg-info so-text-white so-p-2 so-rounded" style="flex-shrink:0;width:100px;">No shrink</div>
                        <div class="so-bg-warning so-text-dark so-p-2 so-rounded" style="flex-shrink:1;width:200px;">Shrinks</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('flex-items', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Flex grow - item expands to fill space
UiEngine::flex()
    ->item('Fixed')
    ->item('Grows', ['grow' => true])  // or grow => 1
    ->item('Fixed');

// Flex shrink - item can shrink below its size
UiEngine::flex()
    ->item('No shrink', ['shrink' => false])  // shrink => 0
    ->item('Can shrink', ['shrink' => true]);

// Flex basis - initial size before grow/shrink
UiEngine::flex()
    ->item('200px base', ['basis' => '200px'])
    ->item('Auto base');

// Combined (flex shorthand)
UiEngine::flex()
    ->item('Content', [
        'grow' => 1,
        'shrink' => 0,
        'basis' => '200px',
    ]);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Flex grow - item expands to fill space
UiEngine.flex()
    .item('Fixed')
    .item('Grows', {grow: true})
    .item('Fixed');

// Flex shrink - item can shrink below its size
UiEngine.flex()
    .item('No shrink', {shrink: false})
    .item('Can shrink', {shrink: true});

// Flex basis - initial size
UiEngine.flex()
    .item('200px base', {basis: '200px'})
    .item('Auto base');

// Combined
UiEngine.flex()
    .item('Content', {
        grow: 1,
        shrink: 0,
        basis: '200px',
    });"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Centering Content -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Centering Content</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-justify-content-center so-align-items-center so-bg-white so-rounded" style="height:150px;">
                        <div class="so-bg-primary so-text-white so-p-4 so-rounded">Perfectly Centered</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('flex-center', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Center both horizontally and vertically
\$flex = UiEngine::flex()
    ->justify('center')
    ->align('center')
    ->height(150)
    ->item('Perfectly Centered');

echo \$flex->render();

// Shorthand for centering
\$flex = UiEngine::flex()
    ->center()  // Same as justify('center')->align('center')
    ->item('Centered');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Center both horizontally and vertically
const flex = UiEngine.flex()
    .justify('center')
    .align('center')
    .height(150)
    .item('Perfectly Centered');

// Shorthand
const flex2 = UiEngine.flex()
    .center()
    .item('Centered');"
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
                                <td><code>direction()</code></td>
                                <td><code>string $dir</code></td>
                                <td>Set direction: row, row-reverse, column, column-reverse</td>
                            </tr>
                            <tr>
                                <td><code>justify()</code></td>
                                <td><code>string $justify</code></td>
                                <td>Main axis: start, center, end, between, around, evenly</td>
                            </tr>
                            <tr>
                                <td><code>align()</code></td>
                                <td><code>string $align</code></td>
                                <td>Cross axis: start, center, end, stretch, baseline</td>
                            </tr>
                            <tr>
                                <td><code>wrap()</code></td>
                                <td><code>string $wrap</code></td>
                                <td>Wrap behavior: nowrap, wrap, wrap-reverse</td>
                            </tr>
                            <tr>
                                <td><code>gap()</code></td>
                                <td><code>int $size</code></td>
                                <td>Set gap between items (0-5)</td>
                            </tr>
                            <tr>
                                <td><code>item()</code></td>
                                <td><code>mixed $content, array $options</code></td>
                                <td>Add flex item with optional properties</td>
                            </tr>
                            <tr>
                                <td><code>items()</code></td>
                                <td><code>array $items</code></td>
                                <td>Add multiple items at once</td>
                            </tr>
                            <tr>
                                <td><code>center()</code></td>
                                <td>-</td>
                                <td>Shorthand for centering both axes</td>
                            </tr>
                            <tr>
                                <td><code>inline()</code></td>
                                <td>-</td>
                                <td>Make inline-flex instead of flex</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
