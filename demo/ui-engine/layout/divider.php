<?php
/**
 * SixOrbit UI Engine - Divider Element Demo
 */

$pageTitle = 'Divider - UI Engine';
$pageDescription = 'Horizontal and vertical content separators';

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
                <li class="so-breadcrumb-item so-active">Divider</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">horizontal_rule</span>
            Divider
        </h1>
        <p class="so-page-subtitle">Horizontal and vertical separators to divide content into sections.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Divider -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Divider</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <p>Content above the divider</p>
                    <hr class="so-my-4">
                    <p>Content below the divider</p>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-divider', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

echo '<p>Content above the divider</p>';
echo UiEngine::divider()->render();
echo '<p>Content below the divider</p>';"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const divider = UiEngine.divider();

document.getElementById('container').innerHTML =
    '<p>Content above</p>' +
    divider.toHtml() +
    '<p>Content below</p>';"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<p>Content above the divider</p>
<hr class="so-my-4">
<p>Content below the divider</p>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Divider with Text -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Divider with Text</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-align-items-center so-my-4">
                        <hr class="so-flex-grow-1">
                        <span class="so-px-3 so-text-muted">OR</span>
                        <hr class="so-flex-grow-1">
                    </div>
                    <div class="so-d-flex so-align-items-center so-my-4">
                        <hr class="so-flex-grow-1">
                        <span class="so-px-3 so-text-muted">Continue with</span>
                        <hr class="so-flex-grow-1">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('divider-text', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Divider with centered text
echo UiEngine::divider()
    ->text('OR')
    ->render();

// With custom text
echo UiEngine::divider()
    ->text('Continue with')
    ->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Divider with centered text
const divider = UiEngine.divider()
    .text('OR');

// With custom text
const divider2 = UiEngine.divider()
    .text('Continue with');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Text Alignment -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Text Alignment</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-align-items-center so-my-4">
                        <span class="so-pe-3 so-text-muted">Left aligned</span>
                        <hr class="so-flex-grow-1">
                    </div>
                    <div class="so-d-flex so-align-items-center so-my-4">
                        <hr class="so-flex-grow-1">
                        <span class="so-px-3 so-text-muted">Center aligned</span>
                        <hr class="so-flex-grow-1">
                    </div>
                    <div class="so-d-flex so-align-items-center so-my-4">
                        <hr class="so-flex-grow-1">
                        <span class="so-ps-3 so-text-muted">Right aligned</span>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('divider-align', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Left aligned text
UiEngine::divider()
    ->text('Left aligned')
    ->align('start');

// Center aligned (default)
UiEngine::divider()
    ->text('Center aligned')
    ->align('center');

// Right aligned
UiEngine::divider()
    ->text('Right aligned')
    ->align('end');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Left aligned text
UiEngine.divider()
    .text('Left aligned')
    .align('start');

// Center aligned (default)
UiEngine.divider()
    .text('Center aligned')
    .align('center');

// Right aligned
UiEngine.divider()
    .text('Right aligned')
    .align('end');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Divider Styles -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Divider Styles</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <p class="so-text-muted so-small">Solid (default):</p>
                    <hr class="so-my-2">
                    <p class="so-text-muted so-small so-mt-4">Dashed:</p>
                    <hr class="so-my-2" style="border-style:dashed;">
                    <p class="so-text-muted so-small so-mt-4">Dotted:</p>
                    <hr class="so-my-2" style="border-style:dotted;">
                    <p class="so-text-muted so-small so-mt-4">Thick:</p>
                    <hr class="so-my-2" style="border-width:3px;">
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('divider-styles', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Solid (default)
UiEngine::divider()
    ->style('solid');

// Dashed line
UiEngine::divider()
    ->style('dashed');

// Dotted line
UiEngine::divider()
    ->style('dotted');

// Thick line
UiEngine::divider()
    ->thickness(3);  // 3px"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Solid (default)
UiEngine.divider()
    .style('solid');

// Dashed line
UiEngine.divider()
    .style('dashed');

// Dotted line
UiEngine.divider()
    .style('dotted');

// Thick line
UiEngine.divider()
    .thickness(3);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Colored Dividers -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Colored Dividers</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <hr class="so-my-3 so-border-primary" style="border-color:var(--so-primary)!important;opacity:1;">
                    <hr class="so-my-3" style="border-color:var(--so-success)!important;opacity:1;">
                    <hr class="so-my-3" style="border-color:var(--so-danger)!important;opacity:1;">
                    <hr class="so-my-3" style="border-color:var(--so-warning)!important;opacity:1;">
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('divider-colors', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Primary color
UiEngine::divider()
    ->color('primary');

// Success color
UiEngine::divider()
    ->color('success');

// Danger color
UiEngine::divider()
    ->color('danger');

// Warning color
UiEngine::divider()
    ->color('warning');

// Custom color
UiEngine::divider()
    ->color('#ff5722');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Primary color
UiEngine.divider()
    .color('primary');

// Success color
UiEngine.divider()
    .color('success');

// Custom color
UiEngine.divider()
    .color('#ff5722');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Vertical Divider -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Vertical Divider</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-align-items-center" style="height:100px;">
                        <div class="so-p-3">Left content</div>
                        <div class="so-vr so-mx-3"></div>
                        <div class="so-p-3">Right content</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('divider-vertical', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Vertical divider
\$divider = UiEngine::divider()
    ->vertical()
    ->height(100);  // Optional height

// In a flex container
echo '<div class=\"so-d-flex\">';
echo '<div>Left</div>';
echo \$divider->render();
echo '<div>Right</div>';
echo '</div>';"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Vertical divider
const divider = UiEngine.divider()
    .vertical()
    .height(100);

// In a flex container
container.innerHTML = `
    <div class='so-d-flex'>
        <div>Left</div>
        ${divider.toHtml()}
        <div>Right</div>
    </div>
`;"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Spacing -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Spacing</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('divider-spacing', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// No margin
UiEngine::divider()
    ->margin(0);

// Small margin
UiEngine::divider()
    ->margin(2);

// Large margin
UiEngine::divider()
    ->margin(5);

// Custom margin
UiEngine::divider()
    ->marginY(4)
    ->marginX(0);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// No margin
UiEngine.divider()
    .margin(0);

// Small margin
UiEngine.divider()
    .margin(2);

// Large margin
UiEngine.divider()
    .margin(5);

// Custom margin
UiEngine.divider()
    .marginY(4)
    .marginX(0);"
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
                                <td><code>text()</code></td>
                                <td><code>string $text</code></td>
                                <td>Add text label to divider</td>
                            </tr>
                            <tr>
                                <td><code>align()</code></td>
                                <td><code>string $alignment</code></td>
                                <td>Text alignment: start, center, end</td>
                            </tr>
                            <tr>
                                <td><code>style()</code></td>
                                <td><code>string $style</code></td>
                                <td>Line style: solid, dashed, dotted</td>
                            </tr>
                            <tr>
                                <td><code>thickness()</code></td>
                                <td><code>int $pixels</code></td>
                                <td>Line thickness in pixels</td>
                            </tr>
                            <tr>
                                <td><code>color()</code></td>
                                <td><code>string $color</code></td>
                                <td>Line color (variant or hex)</td>
                            </tr>
                            <tr>
                                <td><code>vertical()</code></td>
                                <td>-</td>
                                <td>Make divider vertical</td>
                            </tr>
                            <tr>
                                <td><code>height()</code></td>
                                <td><code>int $pixels</code></td>
                                <td>Height for vertical divider</td>
                            </tr>
                            <tr>
                                <td><code>margin()</code></td>
                                <td><code>int $size</code></td>
                                <td>Set margin (0-5)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
