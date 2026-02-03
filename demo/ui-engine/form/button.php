<?php
/**
 * SixOrbit UI Engine - Button Element Demo
 */

$pageTitle = 'Button - UI Engine';
$pageDescription = 'Button element with variants, sizes, icons, and states';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Button</h1>
            <p class="so-page-subtitle">Button element with multiple variants, sizes, icons, and loading states.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Buttons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Button Variants</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-d-flex so-gap-2 so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-primary">Primary</button>
                    <button type="button" class="so-btn so-btn-secondary">Secondary</button>
                    <button type="button" class="so-btn so-btn-success">Success</button>
                    <button type="button" class="so-btn so-btn-danger">Danger</button>
                    <button type="button" class="so-btn so-btn-warning">Warning</button>
                    <button type="button" class="so-btn so-btn-info">Info</button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-buttons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

echo UiEngine::button()->text('Primary')->primary()->render();
echo UiEngine::button()->text('Secondary')->secondary()->render();
echo UiEngine::button()->text('Success')->success()->render();
echo UiEngine::button()->text('Danger')->danger()->render();
echo UiEngine::button()->text('Warning')->warning()->render();
echo UiEngine::button()->text('Info')->info()->render();

// Or use variant() method
echo UiEngine::button()->text('Primary')->variant('primary')->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "import { UiEngine } from 'sixorbit-ui-engine';

UiEngine.button().text('Primary').primary().toHtml();
UiEngine.button().text('Secondary').secondary().toHtml();
UiEngine.button().text('Success').success().toHtml();
UiEngine.button().text('Danger').danger().toHtml();
UiEngine.button().text('Warning').warning().toHtml();
UiEngine.button().text('Info').info().toHtml();

// Or use variant() method
UiEngine.button().text('Primary').variant('primary').toHtml();"
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
                <div class="so-d-flex so-gap-2 so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-outline-primary">Primary</button>
                    <button type="button" class="so-btn so-btn-outline-secondary">Secondary</button>
                    <button type="button" class="so-btn so-btn-outline-success">Success</button>
                    <button type="button" class="so-btn so-btn-outline-danger">Danger</button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('outline-buttons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::button()->text('Primary')->primary()->outline()->render();
UiEngine::button()->text('Secondary')->secondary()->outline()->render();
UiEngine::button()->text('Success')->success()->outline()->render();
UiEngine::button()->text('Danger')->danger()->outline()->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.button().text('Primary').primary().outline().toHtml();
UiEngine.button().text('Secondary').secondary().outline().toHtml();
UiEngine.button().text('Success').success().outline().toHtml();
UiEngine.button().text('Danger').danger().outline().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button type="button" class="so-btn so-btn-outline-primary">Primary</button>
<button type="button" class="so-btn so-btn-outline-secondary">Secondary</button>
<button type="button" class="so-btn so-btn-outline-success">Success</button>
<button type="button" class="so-btn so-btn-outline-danger">Danger</button>'
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
                <div class="so-d-flex so-gap-2 so-align-items-center so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-primary so-btn-sm">Small</button>
                    <button type="button" class="so-btn so-btn-primary">Default</button>
                    <button type="button" class="so-btn so-btn-primary so-btn-lg">Large</button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small button
UiEngine::button()->text('Small')->primary()->small()->render();
// or
UiEngine::button()->text('Small')->primary()->size('sm')->render();

// Default button
UiEngine::button()->text('Default')->primary()->render();

// Large button
UiEngine::button()->text('Large')->primary()->large()->render();
// or
UiEngine::button()->text('Large')->primary()->size('lg')->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small button
UiEngine.button().text('Small').primary().small().toHtml();
// or
UiEngine.button().text('Small').primary().size('sm').toHtml();

// Default button
UiEngine.button().text('Default').primary().toHtml();

// Large button
UiEngine.button().text('Large').primary().large().toHtml();
// or
UiEngine.button().text('Large').primary().size('lg').toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button type="button" class="so-btn so-btn-primary so-btn-sm">Small</button>
<button type="button" class="so-btn so-btn-primary">Default</button>
<button type="button" class="so-btn so-btn-primary so-btn-lg">Large</button>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Buttons with Icons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-d-flex so-gap-2 so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-primary">
                        <span class="material-icons">save</span> Save
                    </button>
                    <button type="button" class="so-btn so-btn-danger">
                        <span class="material-icons">delete</span> Delete
                    </button>
                    <button type="button" class="so-btn so-btn-success">
                        Download <span class="material-icons">download</span>
                    </button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Icon on left (default)
UiEngine::button()->text('Save')->icon('save')->primary()->render();

// Icon on left explicitly
UiEngine::button()->text('Delete')->icon('delete', 'left')->danger()->render();

// Icon on right
UiEngine::button()->text('Download')->icon('download', 'right')->success()->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Icon on left (default)
UiEngine.button().text('Save').icon('save').primary().toHtml();

// Icon on left explicitly
UiEngine.button().text('Delete').icon('delete', 'left').danger().toHtml();

// Icon on right
UiEngine.button().text('Download').icon('download', 'right').success().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Icon on left -->
<button type="button" class="so-btn so-btn-primary">
    <span class="material-icons">save</span> Save
</button>

<!-- Icon on left -->
<button type="button" class="so-btn so-btn-danger">
    <span class="material-icons">delete</span> Delete
</button>

<!-- Icon on right -->
<button type="button" class="so-btn so-btn-success">
    Download <span class="material-icons">download</span>
</button>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Icon Only Buttons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Icon-Only Buttons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-d-flex so-gap-2 so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-primary so-btn-icon">
                        <span class="material-icons">add</span>
                    </button>
                    <button type="button" class="so-btn so-btn-success so-btn-icon">
                        <span class="material-icons">check</span>
                    </button>
                    <button type="button" class="so-btn so-btn-outline-danger so-btn-icon">
                        <span class="material-icons">delete</span>
                    </button>
                    <button type="button" class="so-btn so-btn-secondary so-btn-icon so-btn-sm">
                        <span class="material-icons">edit</span>
                    </button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-icon-only', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Icon-only buttons
UiEngine::button()->iconOnly('add')->primary()->render();
UiEngine::button()->iconOnly('check')->success()->render();
UiEngine::button()->iconOnly('delete')->danger()->outline()->render();
UiEngine::button()->iconOnly('edit')->secondary()->small()->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Icon-only buttons
UiEngine.button().iconOnly('add').primary().toHtml();
UiEngine.button().iconOnly('check').success().toHtml();
UiEngine.button().iconOnly('delete').danger().outline().toHtml();
UiEngine.button().iconOnly('edit').secondary().small().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button type="button" class="so-btn so-btn-primary so-btn-icon">
    <span class="material-icons">add</span>
</button>
<button type="button" class="so-btn so-btn-success so-btn-icon">
    <span class="material-icons">check</span>
</button>
<button type="button" class="so-btn so-btn-outline-danger so-btn-icon">
    <span class="material-icons">delete</span>
</button>
<button type="button" class="so-btn so-btn-secondary so-btn-icon so-btn-sm">
    <span class="material-icons">edit</span>
</button>'
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
                <div class="so-d-flex so-gap-2 so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-primary so-btn-loading" disabled>
                        <span class="so-spinner so-spinner-border so-spinner-border-sm" role="status" aria-hidden="true"></span> Loading...
                    </button>
                    <button type="button" class="so-btn so-btn-secondary so-btn-loading" disabled>
                        <span class="so-spinner so-spinner-border so-spinner-border-sm" role="status" aria-hidden="true"></span> Processing
                    </button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-loading', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Loading with default text
UiEngine::button()->text('Submit')->primary()->loading(true, 'Loading...')->render();

// Loading with custom text
UiEngine::button()->text('Save')->secondary()->loading(true, 'Processing')->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Loading with default text
UiEngine.button().text('Submit').primary().loading(true, 'Loading...').toHtml();

// Loading with custom text
UiEngine.button().text('Save').secondary().loading(true, 'Processing').toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button type="button" class="so-btn so-btn-primary so-btn-loading" disabled
        data-so-loading="true" data-so-loading-text="Loading...">
    <span class="so-spinner so-spinner-border so-spinner-border-sm"
          role="status" aria-hidden="true"></span> Loading...
</button>
<button type="button" class="so-btn so-btn-secondary so-btn-loading" disabled
        data-so-loading="true" data-so-loading-text="Processing">
    <span class="so-spinner so-spinner-border so-spinner-border-sm"
          role="status" aria-hidden="true"></span> Processing
</button>'
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
                <div class="so-d-flex so-gap-2 so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-primary">Button</button>
                    <button type="submit" class="so-btn so-btn-success">Submit</button>
                    <button type="reset" class="so-btn so-btn-secondary">Reset</button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-types', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Regular button (default)
UiEngine::button()->text('Button')->primary()->render();

// Submit button
UiEngine::button()->text('Submit')->success()->submit()->render();
// or
UiEngine::button()->text('Submit')->success()->buttonType('submit')->render();

// Reset button
UiEngine::button()->text('Reset')->secondary()->reset()->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Regular button (default)
UiEngine.button().text('Button').primary().toHtml();

// Submit button
UiEngine.button().text('Submit').success().submit().toHtml();
// or
UiEngine.button().text('Submit').success().buttonType('submit').toHtml();

// Reset button
UiEngine.button().text('Reset').secondary().reset().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button type="button" class="so-btn so-btn-primary">Button</button>
<button type="submit" class="so-btn so-btn-success">Submit</button>
<button type="reset" class="so-btn so-btn-secondary">Reset</button>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Link Buttons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Link Buttons (as Anchor)</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-d-flex so-gap-2 so-flex-wrap so-mb-4">
                    <a href="#" class="so-btn so-btn-primary" role="button">Link Button</a>
                    <a href="https://example.com" target="_blank" rel="noopener noreferrer" class="so-btn so-btn-success" role="button">Open in New Tab</a>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-link', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Button as anchor link
UiEngine::button()
    ->text('Link Button')
    ->href('/dashboard')
    ->primary()
    ->render();

// Open in new tab
UiEngine::button()
    ->text('Open in New Tab')
    ->href('https://example.com')
    ->newTab()
    ->success()
    ->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Button as anchor link
UiEngine.button()
    .text('Link Button')
    .href('/dashboard')
    .primary()
    .toHtml();

// Open in new tab
UiEngine.button()
    .text('Open in New Tab')
    .href('https://example.com')
    .newTab()
    .success()
    .toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<a href="/dashboard" class="so-btn so-btn-primary" role="button">Link Button</a>

<a href="https://example.com" target="_blank" rel="noopener noreferrer"
   class="so-btn so-btn-success" role="button">Open in New Tab</a>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Block Button -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Block Button (Full Width)</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-mb-4">
                    <button type="button" class="so-btn so-btn-primary so-w-100 so-mb-2">Full Width Button</button>
                    <button type="button" class="so-btn so-btn-outline-secondary so-w-100">Another Full Width</button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-block', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Full width button
UiEngine::button()->text('Full Width Button')->primary()->block()->render();
UiEngine::button()->text('Another Full Width')->secondary()->outline()->block()->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Full width button
UiEngine.button().text('Full Width Button').primary().block().toHtml();
UiEngine.button().text('Another Full Width').secondary().outline().block().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button type="button" class="so-btn so-btn-primary so-w-100">Full Width Button</button>
<button type="button" class="so-btn so-btn-outline-secondary so-w-100">Another Full Width</button>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Disabled State -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Disabled State</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-d-flex so-gap-2 so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-primary" disabled>Disabled Button</button>
                    <button type="button" class="so-btn so-btn-outline-secondary" disabled>Disabled Outline</button>
                    <a href="#" class="so-btn so-btn-success" aria-disabled="true" tabindex="-1">Disabled Link</a>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('button-disabled', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Disabled button
UiEngine::button()->text('Disabled Button')->primary()->disabled()->render();

// Disabled outline
UiEngine::button()->text('Disabled Outline')->secondary()->outline()->disabled()->render();

// Disabled link button (uses aria-disabled)
UiEngine::button()->text('Disabled Link')->href('#')->success()->disabled()->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Disabled button
UiEngine.button().text('Disabled Button').primary().disabled().toHtml();

// Disabled outline
UiEngine.button().text('Disabled Outline').secondary().outline().disabled().toHtml();

// Disabled link button
UiEngine.button().text('Disabled Link').href('#').success().disabled().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button type="button" class="so-btn so-btn-primary" disabled>Disabled Button</button>
<button type="button" class="so-btn so-btn-outline-secondary" disabled>Disabled Outline</button>

<!-- Link buttons use aria-disabled instead of disabled attribute -->
<a href="#" class="so-btn so-btn-success" aria-disabled="true" tabindex="-1">Disabled Link</a>'
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
                <!-- Tabbed API Reference -->
                <div class="so-tabs" role="tablist" data-so-tabs>
                    <button class="so-tab so-active" role="tab" data-so-target="#api-php">PHP Class</button>
                    <button class="so-tab" role="tab" data-so-target="#api-js">JS UiEngine</button>
                </div>

                <div class="so-tab-content">
                    <!-- PHP Class Reference -->
                    <div class="so-tab-pane so-fade so-show so-active" id="api-php" role="tabpanel">
                        <p class="so-text-secondary so-mb-3"><code>Core\UiEngine\Elements\Form\Button</code></p>

                        <h5 class="so-mt-4 so-mb-3">Fluent Methods</h5>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr><th>Method</th><th>Parameters</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr class="so-table-info"><td colspan="3"><strong>Type</strong></td></tr>
                                    <tr><td><code>buttonType()</code></td><td><code>string $type</code></td><td>Set type: <code>'button'</code>, <code>'submit'</code>, <code>'reset'</code></td></tr>
                                    <tr><td><code>submit()</code></td><td>-</td><td>Set type to submit</td></tr>
                                    <tr><td><code>reset()</code></td><td>-</td><td>Set type to reset</td></tr>

                                    <tr class="so-table-info"><td colspan="3"><strong>Content</strong></td></tr>
                                    <tr><td><code>text()</code></td><td><code>string $text</code></td><td>Set button text</td></tr>
                                    <tr><td><code>icon()</code></td><td><code>string $icon, string $position = 'left'</code></td><td>Set Material icon (left or right)</td></tr>
                                    <tr><td><code>iconOnly()</code></td><td><code>string $icon</code></td><td>Icon-only button (no text)</td></tr>

                                    <tr class="so-table-info"><td colspan="3"><strong>Variant</strong></td></tr>
                                    <tr><td><code>variant()</code></td><td><code>string $variant</code></td><td>Set color variant</td></tr>
                                    <tr><td><code>primary()</code></td><td>-</td><td>Primary variant</td></tr>
                                    <tr><td><code>secondary()</code></td><td>-</td><td>Secondary variant</td></tr>
                                    <tr><td><code>success()</code></td><td>-</td><td>Success variant</td></tr>
                                    <tr><td><code>danger()</code></td><td>-</td><td>Danger variant</td></tr>
                                    <tr><td><code>warning()</code></td><td>-</td><td>Warning variant</td></tr>
                                    <tr><td><code>info()</code></td><td>-</td><td>Info variant</td></tr>
                                    <tr><td><code>light()</code></td><td>-</td><td>Light variant</td></tr>
                                    <tr><td><code>dark()</code></td><td>-</td><td>Dark variant</td></tr>
                                    <tr><td><code>link()</code></td><td>-</td><td>Link variant</td></tr>

                                    <tr class="so-table-info"><td colspan="3"><strong>Style</strong></td></tr>
                                    <tr><td><code>outline()</code></td><td><code>bool $outline = true</code></td><td>Enable outline style</td></tr>
                                    <tr><td><code>size()</code></td><td><code>string $size</code></td><td>Size: <code>'sm'</code> or <code>'lg'</code></td></tr>
                                    <tr><td><code>small()</code></td><td>-</td><td>Small size</td></tr>
                                    <tr><td><code>large()</code></td><td>-</td><td>Large size</td></tr>
                                    <tr><td><code>block()</code></td><td><code>bool $block = true</code></td><td>Full width button</td></tr>

                                    <tr class="so-table-info"><td colspan="3"><strong>State</strong></td></tr>
                                    <tr><td><code>disabled()</code></td><td><code>bool $disabled = true</code></td><td>Disable the button</td></tr>
                                    <tr><td><code>loading()</code></td><td><code>bool $loading = true, ?string $loadingText = null</code></td><td>Show loading spinner</td></tr>

                                    <tr class="so-table-info"><td colspan="3"><strong>Link</strong></td></tr>
                                    <tr><td><code>href()</code></td><td><code>string $href, ?string $target = null</code></td><td>Render as anchor with href</td></tr>
                                    <tr><td><code>newTab()</code></td><td>-</td><td>Open in new tab (_blank)</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="so-mt-4 so-mb-3">Render Methods</h5>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr><th>Method</th><th>Returns</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><code>render()</code></td><td><code>string</code></td><td>Render button HTML</td></tr>
                                    <tr><td><code>toArray()</code></td><td><code>array</code></td><td>Export as config array</td></tr>
                                    <tr><td><code>toJson()</code></td><td><code>string</code></td><td>Export as JSON</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- JS UiEngine Class Reference -->
                    <div class="so-tab-pane so-fade" id="api-js" role="tabpanel">
                        <p class="so-text-secondary so-mb-3"><code>UiEngine.button()</code> - Fluent builder for button HTML generation</p>

                        <h5 class="so-mt-4 so-mb-3">Fluent Methods</h5>
                        <p class="so-text-muted so-mb-2">All methods from PHP class are available with identical signatures:</p>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr><th>Method</th><th>Parameters</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><code>buttonType()</code></td><td><code>string</code></td><td>Set button type</td></tr>
                                    <tr><td><code>submit()</code></td><td>-</td><td>Submit button</td></tr>
                                    <tr><td><code>reset()</code></td><td>-</td><td>Reset button</td></tr>
                                    <tr><td><code>text()</code></td><td><code>string</code></td><td>Button text</td></tr>
                                    <tr><td><code>icon()</code></td><td><code>string, string?</code></td><td>Icon with position</td></tr>
                                    <tr><td><code>iconOnly()</code></td><td><code>string</code></td><td>Icon-only button</td></tr>
                                    <tr><td><code>variant()</code></td><td><code>string</code></td><td>Color variant</td></tr>
                                    <tr><td><code>primary()</code> ... <code>link()</code></td><td>-</td><td>Variant shortcuts</td></tr>
                                    <tr><td><code>outline()</code></td><td><code>boolean?</code></td><td>Outline style</td></tr>
                                    <tr><td><code>size()</code></td><td><code>string</code></td><td>Size (sm/lg)</td></tr>
                                    <tr><td><code>small()</code> / <code>large()</code></td><td>-</td><td>Size shortcuts</td></tr>
                                    <tr><td><code>block()</code></td><td><code>boolean?</code></td><td>Full width</td></tr>
                                    <tr><td><code>disabled()</code></td><td><code>boolean?</code></td><td>Disable button</td></tr>
                                    <tr><td><code>loading()</code></td><td><code>boolean?, string?</code></td><td>Loading state with text</td></tr>
                                    <tr><td><code>href()</code></td><td><code>string, string?</code></td><td>Link URL and target</td></tr>
                                    <tr><td><code>newTab()</code></td><td>-</td><td>Open in new tab</td></tr>
                                    <tr><td><code>onClick()</code></td><td><code>function|string</code></td><td>Click event handler</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="so-mt-4 so-mb-3">Render Methods</h5>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr><th>Method</th><th>Returns</th><th>Description</th></tr>
                                </thead>
                                <tbody>
                                    <tr><td><code>toHtml()</code></td><td><code>string</code></td><td>Generate HTML string</td></tr>
                                    <tr><td><code>render()</code></td><td><code>HTMLElement</code></td><td>Create and return DOM element</td></tr>
                                    <tr><td><code>toConfig()</code></td><td><code>object</code></td><td>Export configuration</td></tr>
                                    <tr><td><code>toJson()</code></td><td><code>string</code></td><td>Export as JSON string</td></tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="so-mt-4 so-mb-3">Event Handler Example</h5>
                        <?= so_code_tabs('button-events', [
                            ['label' => 'JavaScript', 'language' => 'javascript', 'icon' => 'javascript',
                             'code' => "// Create button with click handler
const button = UiEngine.button()
    .text('Click Me')
    .primary()
    .onClick(() => {
        console.log('Button clicked!');
    });

// Render to DOM
document.getElementById('container').appendChild(button.render());

// Or get HTML string
const html = button.toHtml();"]
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
