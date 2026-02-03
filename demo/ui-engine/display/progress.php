<?php
/**
 * SixOrbit UI Engine - Progress Element Demo
 */

$pageTitle = 'Progress - UI Engine';
$pageDescription = 'Progress bars for displaying completion status';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Progress</h1>
            <p class="so-page-subtitle">Progress bars for displaying completion status, loading states, and workflow steps.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Progress -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Progress</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">A simple linear progress bar with default styling.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <div class="so-progress so-progress-primary so-mb-3">
                        <div class="so-progress-bar" style="width: 25%"></div>
                    </div>
                    <div class="so-progress so-progress-primary so-mb-3">
                        <div class="so-progress-bar" style="width: 50%"></div>
                    </div>
                    <div class="so-progress so-progress-primary so-mb-3">
                        <div class="so-progress-bar" style="width: 75%"></div>
                    </div>
                    <div class="so-progress so-progress-primary">
                        <div class="so-progress-bar" style="width: 100%"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-progress', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

echo UiEngine::progress(25)->primary();
echo UiEngine::progress(50)->primary();
echo UiEngine::progress(75)->primary();
echo UiEngine::progress(100)->primary();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(25).primary().toHtml();
UiEngine.progress(50).primary().toHtml();
UiEngine.progress(75).primary().toHtml();
UiEngine.progress(100).primary().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-progress so-progress-primary" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
    <div class="so-progress-bar" style="width: 25%"></div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Color Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Color Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Eight color variants are available to match your design system.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <div class="so-progress so-progress-primary so-mb-2">
                        <div class="so-progress-bar" style="width: 70%"></div>
                    </div>
                    <div class="so-progress so-progress-secondary so-mb-2">
                        <div class="so-progress-bar" style="width: 70%"></div>
                    </div>
                    <div class="so-progress so-progress-success so-mb-2">
                        <div class="so-progress-bar" style="width: 70%"></div>
                    </div>
                    <div class="so-progress so-progress-danger so-mb-2">
                        <div class="so-progress-bar" style="width: 70%"></div>
                    </div>
                    <div class="so-progress so-progress-warning so-mb-2">
                        <div class="so-progress-bar" style="width: 70%"></div>
                    </div>
                    <div class="so-progress so-progress-info so-mb-2">
                        <div class="so-progress-bar" style="width: 70%"></div>
                    </div>
                    <div class="so-progress so-progress-light so-mb-2">
                        <div class="so-progress-bar" style="width: 70%"></div>
                    </div>
                    <div class="so-progress so-progress-dark">
                        <div class="so-progress-bar" style="width: 70%"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-colors', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::progress(70)->primary();
UiEngine::progress(70)->secondary();
UiEngine::progress(70)->success();
UiEngine::progress(70)->danger();
UiEngine::progress(70)->warning();
UiEngine::progress(70)->info();
UiEngine::progress(70)->light();
UiEngine::progress(70)->dark();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(70).primary().toHtml();
UiEngine.progress(70).secondary().toHtml();
UiEngine.progress(70).success().toHtml();
UiEngine.progress(70).danger().toHtml();
UiEngine.progress(70).warning().toHtml();
UiEngine.progress(70).info().toHtml();
UiEngine.progress(70).light().toHtml();
UiEngine.progress(70).dark().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-progress so-progress-primary">...</div>
<div class="so-progress so-progress-secondary">...</div>
<div class="so-progress so-progress-success">...</div>
<div class="so-progress so-progress-danger">...</div>
<div class="so-progress so-progress-warning">...</div>
<div class="so-progress so-progress-info">...</div>
<div class="so-progress so-progress-light">...</div>
<div class="so-progress so-progress-dark">...</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Size Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Size Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Progress bars come in five sizes: extra small, small, default, large, and extra large.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <div class="so-mb-3">
                        <label class="so-d-block so-mb-1 so-text-sm so-font-medium">Extra Small (4px)</label>
                        <div class="so-progress so-progress-xs so-progress-primary">
                            <div class="so-progress-bar" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="so-mb-3">
                        <label class="so-d-block so-mb-1 so-text-sm so-font-medium">Small (8px)</label>
                        <div class="so-progress so-progress-sm so-progress-primary">
                            <div class="so-progress-bar" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="so-mb-3">
                        <label class="so-d-block so-mb-1 so-text-sm so-font-medium">Default (12px)</label>
                        <div class="so-progress so-progress-primary">
                            <div class="so-progress-bar" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="so-mb-3">
                        <label class="so-d-block so-mb-1 so-text-sm so-font-medium">Large (16px)</label>
                        <div class="so-progress so-progress-lg so-progress-primary">
                            <div class="so-progress-bar" style="width: 60%"></div>
                        </div>
                    </div>
                    <div>
                        <label class="so-d-block so-mb-1 so-text-sm so-font-medium">Extra Large (20px)</label>
                        <div class="so-progress so-progress-xl so-progress-primary">
                            <div class="so-progress-bar" style="width: 60%"></div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::progress(60)->primary()->extraSmall();  // or ->size('xs')
UiEngine::progress(60)->primary()->small();       // or ->size('sm')
UiEngine::progress(60)->primary();                // Default
UiEngine::progress(60)->primary()->large();       // or ->size('lg')
UiEngine::progress(60)->primary()->extraLarge();  // or ->size('xl')"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(60).primary().extraSmall().toHtml();
UiEngine.progress(60).primary().small().toHtml();
UiEngine.progress(60).primary().toHtml();
UiEngine.progress(60).primary().large().toHtml();
UiEngine.progress(60).primary().extraLarge().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-progress so-progress-xs so-progress-primary">...</div>
<div class="so-progress so-progress-sm so-progress-primary">...</div>
<div class="so-progress so-progress-primary">...</div>
<div class="so-progress so-progress-lg so-progress-primary">...</div>
<div class="so-progress so-progress-xl so-progress-primary">...</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Labels -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Progress with Labels</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Add labels inside the progress bar to display percentage or custom text.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <div class="so-progress so-progress-lg so-progress-primary so-mb-3">
                        <div class="so-progress-bar" style="width: 25%">
                            <span class="so-progress-label">25%</span>
                        </div>
                    </div>
                    <div class="so-progress so-progress-lg so-progress-success so-mb-3">
                        <div class="so-progress-bar" style="width: 50%">
                            <span class="so-progress-label">50%</span>
                        </div>
                    </div>
                    <div class="so-progress so-progress-lg so-progress-info so-mb-3">
                        <div class="so-progress-bar" style="width: 75%">
                            <span class="so-progress-label">75%</span>
                        </div>
                    </div>
                    <div class="so-progress so-progress-lg so-progress-danger">
                        <div class="so-progress-bar" style="width: 100%">
                            <span class="so-progress-label">Complete!</span>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-labels', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::progress(25)->primary()->large()->showLabel();
UiEngine::progress(50)->success()->large()->showLabel();
UiEngine::progress(75)->info()->large()->showLabel();
UiEngine::progress(100)->danger()->large()->showLabel(true, 'Complete!');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(25).primary().large().showLabel().toHtml();
UiEngine.progress(50).success().large().showLabel().toHtml();
UiEngine.progress(75).info().large().showLabel().toHtml();
UiEngine.progress(100).danger().large().showLabel(true, 'Complete!').toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-progress so-progress-lg so-progress-primary">
    <div class="so-progress-bar" style="width: 50%">
        <span class="so-progress-label">50%</span>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Striped Progress -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Striped Progress</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Add stripes to give the progress bar a visual pattern.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <div class="so-progress so-progress-striped so-progress-primary so-mb-3">
                        <div class="so-progress-bar" style="width: 60%"></div>
                    </div>
                    <div class="so-progress so-progress-striped so-progress-success so-mb-3">
                        <div class="so-progress-bar" style="width: 50%"></div>
                    </div>
                    <div class="so-progress so-progress-striped so-progress-warning so-mb-3">
                        <div class="so-progress-bar" style="width: 70%"></div>
                    </div>
                    <div class="so-progress so-progress-striped so-progress-danger">
                        <div class="so-progress-bar" style="width: 40%"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-striped', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::progress(60)->primary()->striped();
UiEngine::progress(50)->success()->striped();
UiEngine::progress(70)->warning()->striped();
UiEngine::progress(40)->danger()->striped();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(60).primary().striped().toHtml();
UiEngine.progress(50).success().striped().toHtml();
UiEngine.progress(70).warning().striped().toHtml();
UiEngine.progress(40).danger().striped().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-progress so-progress-striped so-progress-primary">
    <div class="so-progress-bar" style="width: 60%"></div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Animated Stripes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Animated Stripes</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Animate the stripes for an active loading effect.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <div class="so-progress so-progress-striped so-progress-animated so-progress-primary so-mb-3">
                        <div class="so-progress-bar" style="width: 75%"></div>
                    </div>
                    <div class="so-progress so-progress-striped so-progress-animated so-progress-success so-mb-3">
                        <div class="so-progress-bar" style="width: 60%"></div>
                    </div>
                    <div class="so-progress so-progress-striped so-progress-animated so-progress-info">
                        <div class="so-progress-bar" style="width: 85%"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-animated', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// animated() automatically enables striped
UiEngine::progress(75)->primary()->animated();
UiEngine::progress(60)->success()->animated();
UiEngine::progress(85)->info()->animated();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// animated() automatically enables striped
UiEngine.progress(75).primary().animated().toHtml();
UiEngine.progress(60).success().animated().toHtml();
UiEngine.progress(85).info().animated().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-progress so-progress-striped so-progress-animated so-progress-primary">
    <div class="so-progress-bar" style="width: 75%"></div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Stacked Progress -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Stacked Progress</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Stack multiple progress bars to show segmented data.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Disk Usage</label>
                    <div class="so-progress so-progress-stacked so-mb-2">
                        <div class="so-progress so-progress-success" style="width: 25%">
                            <div class="so-progress-bar" style="width: 100%"></div>
                        </div>
                        <div class="so-progress so-progress-warning" style="width: 35%">
                            <div class="so-progress-bar" style="width: 100%"></div>
                        </div>
                        <div class="so-progress so-progress-danger" style="width: 15%">
                            <div class="so-progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="so-d-flex so-gap-4 so-text-sm">
                        <span><span class="so-badge so-badge-success"></span> Documents (25%)</span>
                        <span><span class="so-badge so-badge-warning"></span> Media (35%)</span>
                        <span><span class="so-badge so-badge-danger"></span> System (15%)</span>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-stacked', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$progress = UiEngine::progress()
    ->segment(25, 'success')  // Documents
    ->segment(35, 'warning')  // Media
    ->segment(15, 'danger');  // System

echo \$progress->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const progress = UiEngine.progress()
    .segment(25, 'success')
    .segment(35, 'warning')
    .segment(15, 'danger');

document.getElementById('container').innerHTML = progress.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-progress so-progress-stacked">
    <div class="so-progress so-progress-success" style="width: 25%">
        <div class="so-progress-bar" style="width: 100%"></div>
    </div>
    <div class="so-progress so-progress-warning" style="width: 35%">
        <div class="so-progress-bar" style="width: 100%"></div>
    </div>
    <div class="so-progress so-progress-danger" style="width: 15%">
        <div class="so-progress-bar" style="width: 100%"></div>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Progress with External Label -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Progress with External Label</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Display progress information outside the bar using wrapper and header elements.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <div class="so-progress-wrapper so-mb-4">
                        <div class="so-progress-header">
                            <span class="so-progress-title">Uploading file...</span>
                            <span class="so-progress-value">68%</span>
                        </div>
                        <div class="so-progress so-progress-primary">
                            <div class="so-progress-bar" style="width: 68%"></div>
                        </div>
                    </div>
                    <div class="so-progress-wrapper">
                        <div class="so-progress-header">
                            <span class="so-progress-title">Storage Used</span>
                            <span class="so-progress-value">7.5 GB / 10 GB</span>
                        </div>
                        <div class="so-progress so-progress-warning">
                            <div class="so-progress-bar" style="width: 75%"></div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-external-label', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::progress(68)
    ->primary()
    ->title('Uploading file...')
    ->externalLabel();

UiEngine::progress(75)
    ->warning()
    ->title('Storage Used')
    ->labelFormat('{value} GB / {max} GB')
    ->max(10)
    ->value(7.5)
    ->externalLabel();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(68)
    .primary()
    .title('Uploading file...')
    .externalLabel()
    .toHtml();

UiEngine.progress(75)
    .warning()
    .title('Storage Used')
    .labelFormat('{value} GB / {max} GB')
    .max(10)
    .value(7.5)
    .externalLabel()
    .toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-progress-wrapper">
    <div class="so-progress-header">
        <span class="so-progress-title">Uploading file...</span>
        <span class="so-progress-value">68%</span>
    </div>
    <div class="so-progress so-progress-primary">
        <div class="so-progress-bar" style="width: 68%"></div>
    </div>
</div>'
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
                                <td><code>value()</code></td>
                                <td><code>int|float $value</code></td>
                                <td>Set progress value (0-100 by default)</td>
                            </tr>
                            <tr>
                                <td><code>min()</code></td>
                                <td><code>int|float $min</code></td>
                                <td>Set minimum value (default: 0)</td>
                            </tr>
                            <tr>
                                <td><code>max()</code></td>
                                <td><code>int|float $max</code></td>
                                <td>Set maximum value (default: 100)</td>
                            </tr>
                            <tr>
                                <td><code>variant()</code></td>
                                <td><code>string $variant</code></td>
                                <td>Set color variant</td>
                            </tr>
                            <tr>
                                <td><code>primary()</code></td>
                                <td>-</td>
                                <td>Primary color variant</td>
                            </tr>
                            <tr>
                                <td><code>secondary()</code></td>
                                <td>-</td>
                                <td>Secondary color variant</td>
                            </tr>
                            <tr>
                                <td><code>success()</code></td>
                                <td>-</td>
                                <td>Success color variant</td>
                            </tr>
                            <tr>
                                <td><code>danger()</code></td>
                                <td>-</td>
                                <td>Danger color variant</td>
                            </tr>
                            <tr>
                                <td><code>warning()</code></td>
                                <td>-</td>
                                <td>Warning color variant</td>
                            </tr>
                            <tr>
                                <td><code>info()</code></td>
                                <td>-</td>
                                <td>Info color variant</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: xs, sm, lg, xl</td>
                            </tr>
                            <tr>
                                <td><code>extraSmall()</code></td>
                                <td>-</td>
                                <td>Extra small size (4px)</td>
                            </tr>
                            <tr>
                                <td><code>small()</code></td>
                                <td>-</td>
                                <td>Small size (8px)</td>
                            </tr>
                            <tr>
                                <td><code>large()</code></td>
                                <td>-</td>
                                <td>Large size (16px)</td>
                            </tr>
                            <tr>
                                <td><code>extraLarge()</code></td>
                                <td>-</td>
                                <td>Extra large size (20px)</td>
                            </tr>
                            <tr>
                                <td><code>showLabel()</code></td>
                                <td><code>bool $show, ?string $format</code></td>
                                <td>Show percentage label inside bar</td>
                            </tr>
                            <tr>
                                <td><code>striped()</code></td>
                                <td><code>bool $striped</code></td>
                                <td>Enable striped pattern</td>
                            </tr>
                            <tr>
                                <td><code>animated()</code></td>
                                <td><code>bool $animated</code></td>
                                <td>Animate the stripes</td>
                            </tr>
                            <tr>
                                <td><code>segment()</code></td>
                                <td><code>int|float $value, ?string $variant</code></td>
                                <td>Add a segment for stacked progress</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="so-mt-4 so-mb-3">CSS Classes Reference</h5>
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead class="so-table-light">
                            <tr>
                                <th>Class</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>.so-progress</code></td>
                                <td>Base progress container</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-bar</code></td>
                                <td>Progress indicator bar</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-label</code></td>
                                <td>Label inside progress bar</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-{color}</code></td>
                                <td>Color variants (primary, secondary, success, etc.)</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-xs/sm/lg/xl</code></td>
                                <td>Size variants</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-striped</code></td>
                                <td>Striped pattern</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-animated</code></td>
                                <td>Animated stripes (use with striped)</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-stacked</code></td>
                                <td>Container for multiple stacked bars</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-wrapper</code></td>
                                <td>Wrapper for external label layout</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-header</code></td>
                                <td>Header row for title and value</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-title</code></td>
                                <td>Title text in header</td>
                            </tr>
                            <tr>
                                <td><code>.so-progress-value</code></td>
                                <td>Value text in header</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
