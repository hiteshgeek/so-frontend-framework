<?php
/**
 * SixOrbit UI Engine - Spinner Element Demo
 */

$pageTitle = 'Spinner - UI Engine';
$pageDescription = 'Loading indicators for async operations';

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
                <li class="so-breadcrumb-item"><a href="../index.php#display">Display Elements</a></li>
                <li class="so-breadcrumb-item so-active">Spinner</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">refresh</span>
            Spinner
        </h1>
        <p class="so-page-subtitle">Loading indicators for async operations and content loading states.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Spinners -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Spinners</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-4 so-align-items-center">
                        <div class="so-spinner-border" role="status">
                            <span class="so-visually-hidden">Loading...</span>
                        </div>
                        <div class="so-spinner-grow" role="status">
                            <span class="so-visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-spinner', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

// Border spinner (default)
echo UiEngine::spinner();

// Growing spinner
echo UiEngine::spinner()->grow();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Border spinner (default)
UiEngine.spinner().toHtml();

// Growing spinner
UiEngine.spinner().grow().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-spinner-border" role="status">
    <span class="so-visually-hidden">Loading...</span>
</div>

<div class="so-spinner-grow" role="status">
    <span class="so-visually-hidden">Loading...</span>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Spinner Colors -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Spinner Colors</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-3 so-flex-wrap">
                        <div class="so-spinner-border so-text-primary" role="status"></div>
                        <div class="so-spinner-border so-text-secondary" role="status"></div>
                        <div class="so-spinner-border so-text-success" role="status"></div>
                        <div class="so-spinner-border so-text-danger" role="status"></div>
                        <div class="so-spinner-border so-text-warning" role="status"></div>
                        <div class="so-spinner-border so-text-info" role="status"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('spinner-colors', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::spinner()->variant('primary');
UiEngine::spinner()->variant('secondary');
UiEngine::spinner()->variant('success');
UiEngine::spinner()->variant('danger');
UiEngine::spinner()->variant('warning');
UiEngine::spinner()->variant('info');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.spinner().variant('primary').toHtml();
UiEngine.spinner().variant('secondary').toHtml();
UiEngine.spinner().variant('success').toHtml();
UiEngine.spinner().variant('danger').toHtml();
UiEngine.spinner().variant('warning').toHtml();
UiEngine.spinner().variant('info').toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Spinner Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Spinner Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-4 so-align-items-center">
                        <div class="so-spinner-border so-spinner-border-sm" role="status"></div>
                        <div class="so-spinner-border" role="status"></div>
                        <div class="so-spinner-border" style="width: 3rem; height: 3rem;" role="status"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('spinner-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small
UiEngine::spinner()->size('sm');

// Default
UiEngine::spinner();

// Custom size
UiEngine::spinner()->size(48); // 48px"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small
UiEngine.spinner().size('sm').toHtml();

// Default
UiEngine.spinner().toHtml();

// Custom size
UiEngine.spinner().size(48).toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- In Buttons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">In Buttons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2">
                        <button class="so-btn so-btn-primary" type="button" disabled>
                            <span class="so-spinner-border so-spinner-border-sm"></span>
                            Loading...
                        </button>
                        <button class="so-btn so-btn-secondary" type="button" disabled>
                            <span class="so-spinner-grow so-spinner-grow-sm"></span>
                            Processing
                        </button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('spinner-button', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Button with loading state
UiEngine::button('Loading...')
    ->variant('primary')
    ->loading();

// Or manually
UiEngine::button('Processing')
    ->variant('secondary')
    ->prepend(UiEngine::spinner()->size('sm')->grow())
    ->disabled();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Toggle loading state
const btn = UiEngine.button('Submit').variant('primary');
btn.loading(true);  // Show spinner
btn.loading(false); // Hide spinner

// Or create manually
UiEngine.button('Processing')
    .variant('secondary')
    .prepend(UiEngine.spinner().size('sm').grow())
    .disabled()
    .toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Text -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Text</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('spinner-text', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Spinner with label
UiEngine::spinner()
    ->label('Loading...')
    ->variant('primary');

// Centered loading overlay
UiEngine::spinner()
    ->overlay()
    ->label('Please wait...');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Spinner with label
UiEngine.spinner()
    .label('Loading...')
    .variant('primary')
    .toHtml();

// Centered loading overlay
UiEngine.spinner()
    .overlay()
    .label('Please wait...')
    .toHtml();"
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
                                <td><code>grow()</code></td>
                                <td>-</td>
                                <td>Use growing animation instead of border</td>
                            </tr>
                            <tr>
                                <td><code>variant()</code></td>
                                <td><code>string $variant</code></td>
                                <td>Set color variant</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string|int $size</code></td>
                                <td>Set size: 'sm' or pixel value</td>
                            </tr>
                            <tr>
                                <td><code>label()</code></td>
                                <td><code>string $text</code></td>
                                <td>Add visible loading text</td>
                            </tr>
                            <tr>
                                <td><code>overlay()</code></td>
                                <td>-</td>
                                <td>Use as centered overlay</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
