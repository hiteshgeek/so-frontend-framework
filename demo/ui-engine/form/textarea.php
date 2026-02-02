<?php
/**
 * SixOrbit UI Engine - Textarea Element Demo
 */

$pageTitle = 'Textarea - UI Engine';
$pageDescription = 'Multi-line text input with auto-resize and character count';

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
                <li class="so-breadcrumb-item so-active">Textarea</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">notes</span>
            Textarea
        </h1>
        <p class="so-page-subtitle">Multi-line text input element with configurable rows, auto-resize, and character counting.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Textarea -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Textarea</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-message">Message</label>
                        <textarea class="so-form-control" id="demo-message" name="message" rows="3" placeholder="Enter your message here..."></textarea>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-textarea', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$textarea = UiEngine::textarea('message')
    ->label('Message')
    ->placeholder('Enter your message here...')
    ->rows(3);

echo \$textarea->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const textarea = UiEngine.textarea('message')
    .label('Message')
    .placeholder('Enter your message here...')
    .rows(3);

document.getElementById('container').innerHTML = textarea.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="message">Message</label>
    <textarea class="so-form-control" id="message" name="message" rows="3" placeholder="Enter your message here..."></textarea>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Character Count -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Character Count</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-bio">Bio</label>
                        <textarea class="so-form-control" id="demo-bio" name="bio" rows="3" maxlength="200" placeholder="Tell us about yourself..."></textarea>
                        <div class="so-d-flex so-justify-content-between so-mt-1">
                            <small class="so-form-text so-text-muted">Maximum 200 characters</small>
                            <small class="so-form-text so-text-muted"><span id="demo-bio-count">0</span>/200</small>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('textarea-count', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$textarea = UiEngine::textarea('bio')
    ->label('Bio')
    ->placeholder('Tell us about yourself...')
    ->rows(3)
    ->maxLength(200)
    ->showCount(); // Shows character counter

echo \$textarea->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const textarea = UiEngine.textarea('bio')
    .label('Bio')
    .placeholder('Tell us about yourself...')
    .rows(3)
    .maxLength(200)
    .showCount(); // Shows character counter

document.getElementById('container').innerHTML = textarea.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Auto-resize -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Auto-resize</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-content">Content</label>
                        <textarea class="so-form-control" id="demo-content" name="content" rows="2" placeholder="Start typing and the textarea will grow..."></textarea>
                        <small class="so-form-text so-text-muted">This textarea will auto-resize based on content</small>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('textarea-autoresize', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$textarea = UiEngine::textarea('content')
    ->label('Content')
    ->placeholder('Start typing and the textarea will grow...')
    ->rows(2)
    ->autoResize()
    ->help('This textarea will auto-resize based on content');

echo \$textarea->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const textarea = UiEngine.textarea('content')
    .label('Content')
    .placeholder('Start typing and the textarea will grow...')
    .rows(2)
    .autoResize()
    .help('This textarea will auto-resize based on content');

document.getElementById('container').innerHTML = textarea.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Textarea Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Textarea Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-mb-3">
                        <label class="so-form-label">Small</label>
                        <textarea class="so-form-control so-form-control-sm" rows="2" placeholder="Small textarea"></textarea>
                    </div>
                    <div class="so-mb-3">
                        <label class="so-form-label">Default</label>
                        <textarea class="so-form-control" rows="2" placeholder="Default textarea"></textarea>
                    </div>
                    <div>
                        <label class="so-form-label">Large</label>
                        <textarea class="so-form-control so-form-control-lg" rows="2" placeholder="Large textarea"></textarea>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('textarea-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small textarea
UiEngine::textarea('small')->size('sm')->rows(2)->placeholder('Small textarea');

// Default textarea
UiEngine::textarea('default')->rows(2)->placeholder('Default textarea');

// Large textarea
UiEngine::textarea('large')->size('lg')->rows(2)->placeholder('Large textarea');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small textarea
UiEngine.textarea('small').size('sm').rows(2).placeholder('Small textarea');

// Default textarea
UiEngine.textarea('default').rows(2).placeholder('Default textarea');

// Large textarea
UiEngine.textarea('large').size('lg').rows(2).placeholder('Large textarea');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Disabled & Readonly -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Disabled & Readonly</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-row so-g-3">
                        <div class="so-col-md-6">
                            <label class="so-form-label">Disabled</label>
                            <textarea class="so-form-control" rows="2" disabled>This textarea is disabled</textarea>
                        </div>
                        <div class="so-col-md-6">
                            <label class="so-form-label">Readonly</label>
                            <textarea class="so-form-control" rows="2" readonly>This textarea is readonly</textarea>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('textarea-states', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Disabled textarea
UiEngine::textarea('disabled')
    ->value('This textarea is disabled')
    ->disabled();

// Readonly textarea
UiEngine::textarea('readonly')
    ->value('This textarea is readonly')
    ->readonly();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Disabled textarea
UiEngine.textarea('disabled')
    .value('This textarea is disabled')
    .disabled();

// Readonly textarea
UiEngine.textarea('readonly')
    .value('This textarea is readonly')
    .readonly();"
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
                                <td><code>rows()</code></td>
                                <td><code>int $rows</code></td>
                                <td>Set the number of visible rows</td>
                            </tr>
                            <tr>
                                <td><code>cols()</code></td>
                                <td><code>int $cols</code></td>
                                <td>Set the number of visible columns</td>
                            </tr>
                            <tr>
                                <td><code>maxLength()</code></td>
                                <td><code>int $max</code></td>
                                <td>Set maximum character limit</td>
                            </tr>
                            <tr>
                                <td><code>showCount()</code></td>
                                <td>-</td>
                                <td>Show character counter</td>
                            </tr>
                            <tr>
                                <td><code>autoResize()</code></td>
                                <td>-</td>
                                <td>Enable auto-resize based on content</td>
                            </tr>
                            <tr>
                                <td><code>placeholder()</code></td>
                                <td><code>string $text</code></td>
                                <td>Set placeholder text</td>
                            </tr>
                            <tr>
                                <td><code>value()</code></td>
                                <td><code>string $value</code></td>
                                <td>Set the textarea value</td>
                            </tr>
                            <tr>
                                <td><code>required()</code></td>
                                <td>-</td>
                                <td>Mark as required</td>
                            </tr>
                            <tr>
                                <td><code>disabled()</code></td>
                                <td>-</td>
                                <td>Disable the textarea</td>
                            </tr>
                            <tr>
                                <td><code>readonly()</code></td>
                                <td>-</td>
                                <td>Make the textarea read-only</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
