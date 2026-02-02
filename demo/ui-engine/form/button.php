<?php
/**
 * SixOrbit UI Engine - Button Element Demo
 */

$pageTitle = 'Button - UI Engine';
$pageDescription = 'Button element with various styles and states';

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
                <li class="so-breadcrumb-item"><a href="../index.php#form">Form Elements</a></li>
                <li class="so-breadcrumb-item so-active">Button</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">smart_button</span>
            Button
        </h1>
        <p class="so-page-subtitle">Button element with multiple variants, sizes, icons, and loading states.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Buttons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Buttons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2 so-flex-wrap">
                        <button type="button" class="so-btn so-btn-primary">Primary</button>
                        <button type="button" class="so-btn so-btn-secondary">Secondary</button>
                        <button type="button" class="so-btn so-btn-success">Success</button>
                        <button type="button" class="so-btn so-btn-danger">Danger</button>
                        <button type="button" class="so-btn so-btn-warning">Warning</button>
                        <button type="button" class="so-btn so-btn-info">Info</button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-buttons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

echo UiEngine::button('Primary')->variant('primary');
echo UiEngine::button('Secondary')->variant('secondary');
echo UiEngine::button('Success')->variant('success');
echo UiEngine::button('Danger')->variant('danger');
echo UiEngine::button('Warning')->variant('warning');
echo UiEngine::button('Info')->variant('info');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.button('Primary').variant('primary').toHtml();
UiEngine.button('Secondary').variant('secondary').toHtml();
UiEngine.button('Success').variant('success').toHtml();
UiEngine.button('Danger').variant('danger').toHtml();
UiEngine.button('Warning').variant('warning').toHtml();
UiEngine.button('Info').variant('info').toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button type="button" class="so-btn so-btn-primary">Primary</button>
<button type="button" class="so-btn so-btn-secondary">Secondary</button>
<button type="button" class="so-btn so-btn-success">Success</button>
<button type="button" class="so-btn so-btn-danger">Danger</button>
<button type="button" class="so-btn so-btn-warning">Warning</button>
<button type="button" class="so-btn so-btn-info">Info</button>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Outline Buttons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Outline Buttons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2 so-flex-wrap">
                        <button type="button" class="so-btn so-btn-outline-primary">Primary</button>
                        <button type="button" class="so-btn so-btn-outline-secondary">Secondary</button>
                        <button type="button" class="so-btn so-btn-outline-success">Success</button>
                        <button type="button" class="so-btn so-btn-outline-danger">Danger</button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('outline-buttons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::button('Primary')->variant('primary')->outline();
UiEngine::button('Secondary')->variant('secondary')->outline();
UiEngine::button('Success')->variant('success')->outline();
UiEngine::button('Danger')->variant('danger')->outline();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.button('Primary').variant('primary').outline().toHtml();
UiEngine.button('Secondary').variant('secondary').outline().toHtml();
UiEngine.button('Success').variant('success').outline().toHtml();
UiEngine.button('Danger').variant('danger').outline().toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Button Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Button Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2 so-align-items-center so-flex-wrap">
                        <button type="button" class="so-btn so-btn-primary so-btn-sm">Small</button>
                        <button type="button" class="so-btn so-btn-primary">Default</button>
                        <button type="button" class="so-btn so-btn-primary so-btn-lg">Large</button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::button('Small')->variant('primary')->size('sm');
UiEngine::button('Default')->variant('primary');
UiEngine::button('Large')->variant('primary')->size('lg');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.button('Small').variant('primary').size('sm').toHtml();
UiEngine.button('Default').variant('primary').toHtml();
UiEngine.button('Large').variant('primary').size('lg').toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Icons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2 so-flex-wrap">
                        <button type="button" class="so-btn so-btn-primary">
                            <span class="material-icons">save</span> Save
                        </button>
                        <button type="button" class="so-btn so-btn-danger">
                            <span class="material-icons">delete</span> Delete
                        </button>
                        <button type="button" class="so-btn so-btn-success">
                            Download <span class="material-icons">download</span>
                        </button>
                        <button type="button" class="so-btn so-btn-secondary">
                            <span class="material-icons">settings</span>
                        </button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Icon before text
UiEngine::button('Save')->variant('primary')->icon('save');

// Icon after text
UiEngine::button('Download')->variant('success')->iconAfter('download');

// Icon only
UiEngine::button()->variant('secondary')->icon('settings');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Icon before text
UiEngine.button('Save').variant('primary').icon('save').toHtml();

// Icon after text
UiEngine.button('Download').variant('success').iconAfter('download').toHtml();

// Icon only
UiEngine.button().variant('secondary').icon('settings').toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Loading State -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Loading State</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2 so-flex-wrap">
                        <button type="button" class="so-btn so-btn-primary" disabled>
                            <span class="so-spinner-border so-spinner-border-sm"></span> Loading...
                        </button>
                        <button type="button" class="so-btn so-btn-secondary" disabled>
                            <span class="so-spinner-border so-spinner-border-sm"></span> Processing
                        </button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-loading', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::button('Loading...')->variant('primary')->loading();
UiEngine::button('Processing')->variant('secondary')->loading();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Set loading state
const btn = UiEngine.button('Submit').variant('primary');
btn.loading(true); // Shows spinner
btn.loading(false); // Restores original state"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Button Types -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Button Types</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2 so-flex-wrap">
                        <button type="button" class="so-btn so-btn-primary">Button</button>
                        <button type="submit" class="so-btn so-btn-success">Submit</button>
                        <button type="reset" class="so-btn so-btn-secondary">Reset</button>
                        <a href="#" class="so-btn so-btn-info">Link Button</a>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-types', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Regular button
UiEngine::button('Button')->type('button');

// Submit button
UiEngine::button('Submit')->type('submit')->variant('success');

// Reset button
UiEngine::button('Reset')->type('reset')->variant('secondary');

// Link styled as button
UiEngine::button('Link Button')->tag('a')->href('#')->variant('info');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Regular button
UiEngine.button('Button').type('button').toHtml();

// Submit button
UiEngine.button('Submit').type('submit').variant('success').toHtml();

// Reset button
UiEngine.button('Reset').type('reset').variant('secondary').toHtml();

// Link styled as button
UiEngine.button('Link Button').tag('a').href('#').variant('info').toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Block Button -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Block Button</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <button type="button" class="so-btn so-btn-primary so-w-100 so-mb-2">Full Width Button</button>
                    <div class="so-d-grid so-gap-2">
                        <button type="button" class="so-btn so-btn-secondary">Grid Button 1</button>
                        <button type="button" class="so-btn so-btn-secondary">Grid Button 2</button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-block', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Full width button
UiEngine::button('Full Width Button')->variant('primary')->block();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Full width button
UiEngine.button('Full Width Button').variant('primary').block().toHtml();"
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
                                <td><code>variant()</code></td>
                                <td><code>string $variant</code></td>
                                <td>Set variant: primary, secondary, success, danger, warning, info</td>
                            </tr>
                            <tr>
                                <td><code>outline()</code></td>
                                <td>-</td>
                                <td>Use outline style</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: 'sm' or 'lg'</td>
                            </tr>
                            <tr>
                                <td><code>icon()</code></td>
                                <td><code>string $icon</code></td>
                                <td>Add icon before text</td>
                            </tr>
                            <tr>
                                <td><code>iconAfter()</code></td>
                                <td><code>string $icon</code></td>
                                <td>Add icon after text</td>
                            </tr>
                            <tr>
                                <td><code>loading()</code></td>
                                <td><code>bool $loading = true</code></td>
                                <td>Show loading spinner</td>
                            </tr>
                            <tr>
                                <td><code>type()</code></td>
                                <td><code>string $type</code></td>
                                <td>Set type: button, submit, reset</td>
                            </tr>
                            <tr>
                                <td><code>block()</code></td>
                                <td>-</td>
                                <td>Make button full width</td>
                            </tr>
                            <tr>
                                <td><code>disabled()</code></td>
                                <td>-</td>
                                <td>Disable the button</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
