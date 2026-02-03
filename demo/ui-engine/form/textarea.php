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
        <div class="so-page-header-left">
            <h1 class="so-page-title">Textarea</h1>
            <p class="so-page-subtitle">Multi-line text input element with configurable rows, auto-resize, and character counting.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Textarea -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Textarea</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label" for="demo-message">Message</label>
                    <textarea class="so-form-control" id="demo-message" name="message" rows="3" placeholder="Enter your message here..."></textarea>
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
                <div class="so-form-group">
                    <label class="so-form-label" for="demo-bio">Bio</label>
                    <textarea class="so-form-control" id="demo-bio" name="bio" rows="3" maxlength="200" placeholder="Tell us about yourself..."></textarea>
                    <div class="so-d-flex so-justify-content-between so-mt-1">
                        <div class="so-form-hint">Maximum 200 characters</div>
                        <div class="so-form-hint so-form-hint-counter"><span id="demo-bio-count">0</span>/200</div>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="bio">Bio</label>
    <textarea class="so-form-control" id="bio" name="bio" rows="3" maxlength="200" placeholder="Tell us about yourself..."></textarea>
    <div class="so-d-flex so-justify-content-between so-mt-1">
        <div class="so-form-hint">Maximum 200 characters</div>
        <div class="so-form-hint so-form-hint-counter"><span id="bio-count">0</span>/200</div>
    </div>
</div>'
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
                <p class="so-text-secondary so-mb-3">Add <code>so-form-control-autosize</code> class to enable automatic height adjustment based on content. Use size variants for different min/max height ranges.</p>

                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-autosize-sm">Small Autosize</label>
                        <textarea class="so-form-control so-form-control-autosize-sm" id="demo-autosize-sm" placeholder="Small (60-200px)"></textarea>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-autosize">Default Autosize</label>
                        <textarea class="so-form-control so-form-control-autosize" id="demo-autosize" placeholder="Start typing and this will grow... (80-400px)"></textarea>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-autosize-lg">Large Autosize</label>
                        <textarea class="so-form-control so-form-control-autosize-lg" id="demo-autosize-lg" placeholder="Large (120-600px)"></textarea>
                    </div>
                </div>

                <div class="so-form-group so-mt-3">
                    <label class="so-form-label" for="demo-autosize-custom">Custom Min/Max Height</label>
                    <textarea class="so-form-control so-form-control-autosize" id="demo-autosize-custom" data-min-height="100" data-max-height="250" placeholder="Custom range: 100-250px"></textarea>
                    <div class="so-form-hint">Uses <code>data-min-height="100"</code> and <code>data-max-height="250"</code></div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('textarea-autoresize', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Default autosize (80-400px)
\$textarea = UiEngine::textarea('content')
    ->label('Content')
    ->placeholder('Start typing...')
    ->autoResize();

// Size variants
UiEngine::textarea('small')->autoResize('sm');   // 60-200px
UiEngine::textarea('large')->autoResize('lg');   // 120-600px

// Custom min/max heights
\$textarea = UiEngine::textarea('notes')
    ->autoResize()
    ->attr('data-min-height', '100')
    ->attr('data-max-height', '250');

echo \$textarea->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Default autosize
const textarea = UiEngine.textarea('content')
    .label('Content')
    .placeholder('Start typing...')
    .autoResize();

// Size variants
UiEngine.textarea('small').autoResize('sm');   // 60-200px
UiEngine.textarea('large').autoResize('lg');   // 120-600px

// Custom min/max heights
UiEngine.textarea('notes')
    .autoResize()
    .attr('data-min-height', '100')
    .attr('data-max-height', '250');

// Direct JS API
const el = document.querySelector('.so-form-control-autosize');
const autosize = SOTextareaAutosize.getInstance(el, {
    minHeight: 100,
    maxHeight: 300
});

// Listen for resize events
el.addEventListener('so:autosize', (e) => {
    console.log('Height:', e.detail.height);
});"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Default autosize (80-400px) -->
<textarea class="so-form-control so-form-control-autosize"
    placeholder="Start typing..."></textarea>

<!-- Small autosize (60-200px) -->
<textarea class="so-form-control so-form-control-autosize-sm"
    placeholder="Small"></textarea>

<!-- Large autosize (120-600px) -->
<textarea class="so-form-control so-form-control-autosize-lg"
    placeholder="Large"></textarea>

<!-- Custom min/max heights -->
<textarea class="so-form-control so-form-control-autosize"
    data-min-height="100"
    data-max-height="250"
    placeholder="Custom range"></textarea>'
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
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">Small</label>
                        <textarea class="so-form-control so-form-control-sm" rows="2" placeholder="Small textarea"></textarea>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Default</label>
                        <textarea class="so-form-control" rows="2" placeholder="Default textarea"></textarea>
                    </div>
                    <div class="so-form-group">
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Small -->
<textarea class="so-form-control so-form-control-sm" rows="2" placeholder="Small textarea"></textarea>

<!-- Default -->
<textarea class="so-form-control" rows="2" placeholder="Default textarea"></textarea>

<!-- Large -->
<textarea class="so-form-control so-form-control-lg" rows="2" placeholder="Large textarea"></textarea>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Resize Modifiers -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Resize Modifiers</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-secondary so-mb-3">Control textarea resize behavior with utility classes.</p>

                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-4 so-grid-cols-md-2 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">Vertical Only (Default)</label>
                        <textarea class="so-form-control so-resize-vertical" rows="3" placeholder="so-resize-vertical"></textarea>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">No Resize</label>
                        <textarea class="so-form-control so-resize-none" rows="3" placeholder="so-resize-none"></textarea>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Horizontal Only</label>
                        <textarea class="so-form-control so-resize-horizontal" rows="3" placeholder="so-resize-horizontal"></textarea>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Both Directions</label>
                        <textarea class="so-form-control so-resize-both" rows="3" placeholder="so-resize-both"></textarea>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('textarea-resize', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Vertical resize only (default)
UiEngine::textarea('note')->resize('vertical');

// No resize
UiEngine::textarea('note')->resize('none');

// Horizontal resize only
UiEngine::textarea('note')->resize('horizontal');

// Both directions
UiEngine::textarea('note')->resize('both');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Vertical resize only (default)
UiEngine.textarea('note').resize('vertical');

// No resize
UiEngine.textarea('note').resize('none');

// Horizontal resize only
UiEngine.textarea('note').resize('horizontal');

// Both directions
UiEngine.textarea('note').resize('both');"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Vertical only (default) -->
<textarea class="so-form-control so-resize-vertical" rows="3"></textarea>

<!-- No resize -->
<textarea class="so-form-control so-resize-none" rows="3"></textarea>

<!-- Horizontal only -->
<textarea class="so-form-control so-resize-horizontal" rows="3"></textarea>

<!-- Both directions -->
<textarea class="so-form-control so-resize-both" rows="3"></textarea>'
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
                <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">Disabled</label>
                        <textarea class="so-form-control" rows="2" disabled>This textarea is disabled</textarea>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Readonly</label>
                        <textarea class="so-form-control" rows="2" readonly>This textarea is readonly</textarea>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Disabled -->
<textarea class="so-form-control" rows="2" disabled>This textarea is disabled</textarea>

<!-- Readonly -->
<textarea class="so-form-control" rows="2" readonly>This textarea is readonly</textarea>'
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
                <!-- API Tabs -->
                <div class="so-tabs" role="tablist" data-so-tabs>
                    <button class="so-tab so-active" role="tab" data-so-target="#api-php">PHP Class</button>
                    <button class="so-tab" role="tab" data-so-target="#api-js">JS UiEngine</button>
                </div>

                <div class="so-tab-content">
                    <!-- PHP Class Reference -->
                    <div class="so-tab-pane so-fade so-show so-active" id="api-php" role="tabpanel">
                        <h5 class="so-mt-3">Core\\UiEngine\\Elements\\Form\\Textarea</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine::textarea(string $name)</code></td>
                                        <td>Create textarea with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Dimension Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>rows(int $rows)</code></td>
                                        <td>Set visible rows (default: 3)</td>
                                    </tr>
                                    <tr>
                                        <td><code>cols(int $cols)</code></td>
                                        <td>Set visible columns</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Constraint Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>maxlength(int $maxlength)</code></td>
                                        <td>Set maximum character limit</td>
                                    </tr>
                                    <tr>
                                        <td><code>minlength(int $minlength)</code></td>
                                        <td>Set minimum character limit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Resize Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>resize(string $direction)</code></td>
                                        <td>Set resize: none, vertical, horizontal, both</td>
                                    </tr>
                                    <tr>
                                        <td><code>noResize()</code></td>
                                        <td>Disable resizing</td>
                                    </tr>
                                    <tr>
                                        <td><code>resizeVertical()</code></td>
                                        <td>Allow vertical resize only</td>
                                    </tr>
                                    <tr>
                                        <td><code>resizeHorizontal()</code></td>
                                        <td>Allow horizontal resize only</td>
                                    </tr>
                                    <tr>
                                        <td><code>autoResize(bool $enable = true)</code></td>
                                        <td>Enable auto-resize based on content</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Feature Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>showCounter(bool $show = true)</code></td>
                                        <td>Show character counter (requires maxlength)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>name(string $name)</code></td>
                                        <td>Set input name</td>
                                    </tr>
                                    <tr>
                                        <td><code>id(string $id)</code></td>
                                        <td>Set element ID</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(string $label)</code></td>
                                        <td>Set label text</td>
                                    </tr>
                                    <tr>
                                        <td><code>placeholder(string $text)</code></td>
                                        <td>Set placeholder text</td>
                                    </tr>
                                    <tr>
                                        <td><code>value(mixed $value)</code></td>
                                        <td>Set textarea value</td>
                                    </tr>
                                    <tr>
                                        <td><code>required()</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled()</code></td>
                                        <td>Disable the textarea</td>
                                    </tr>
                                    <tr>
                                        <td><code>readonly()</code></td>
                                        <td>Make textarea read-only</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render textarea HTML</td>
                                    </tr>
                                    <tr>
                                        <td><code>renderGroup()</code></td>
                                        <td>Render with form group wrapper</td>
                                    </tr>
                                    <tr>
                                        <td><code>toArray()</code></td>
                                        <td>Export configuration array</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- JS UiEngine Reference -->
                    <div class="so-tab-pane so-fade" id="api-js" role="tabpanel">
                        <h5 class="so-mt-3">UiEngine.textarea()</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine.textarea(name)</code></td>
                                        <td>Create textarea with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Dimension Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>rows(rows)</code></td>
                                        <td>Set visible rows (default: 3)</td>
                                    </tr>
                                    <tr>
                                        <td><code>cols(cols)</code></td>
                                        <td>Set visible columns</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Constraint Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>maxlength(maxlength)</code></td>
                                        <td>Set maximum character limit</td>
                                    </tr>
                                    <tr>
                                        <td><code>minlength(minlength)</code></td>
                                        <td>Set minimum character limit</td>
                                    </tr>
                                    <tr>
                                        <td><code>wrap(wrap)</code></td>
                                        <td>Set wrap mode (hard, soft, off)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Resize Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>resize(direction)</code></td>
                                        <td>Set resize: none, vertical, horizontal, both</td>
                                    </tr>
                                    <tr>
                                        <td><code>noResize()</code></td>
                                        <td>Disable resizing</td>
                                    </tr>
                                    <tr>
                                        <td><code>resizeVertical()</code></td>
                                        <td>Allow vertical resize only</td>
                                    </tr>
                                    <tr>
                                        <td><code>resizeHorizontal()</code></td>
                                        <td>Allow horizontal resize only</td>
                                    </tr>
                                    <tr>
                                        <td><code>autoResize(enable = true)</code></td>
                                        <td>Enable auto-resize based on content</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Feature Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>showCounter(show = true)</code></td>
                                        <td>Show character counter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>name(name)</code></td>
                                        <td>Set input name</td>
                                    </tr>
                                    <tr>
                                        <td><code>id(id)</code></td>
                                        <td>Set element ID</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(label)</code></td>
                                        <td>Set label text</td>
                                    </tr>
                                    <tr>
                                        <td><code>placeholder(text)</code></td>
                                        <td>Set placeholder text</td>
                                    </tr>
                                    <tr>
                                        <td><code>value(value)</code></td>
                                        <td>Set textarea value</td>
                                    </tr>
                                    <tr>
                                        <td><code>required()</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled()</code></td>
                                        <td>Disable the textarea</td>
                                    </tr>
                                    <tr>
                                        <td><code>readonly()</code></td>
                                        <td>Make textarea read-only</td>
                                    </tr>
                                    <tr>
                                        <td><code>attr(name, value)</code></td>
                                        <td>Set custom attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>data(key, value)</code></td>
                                        <td>Set data-* attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>toHtml()</code></td>
                                        <td>Get HTML string</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render to DOM element</td>
                                    </tr>
                                    <tr>
                                        <td><code>toConfig()</code></td>
                                        <td>Export configuration object</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Events</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Event</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>input</code></td>
                                        <td>Fires on input</td>
                                    </tr>
                                    <tr>
                                        <td><code>change</code></td>
                                        <td>Fires on value change</td>
                                    </tr>
                                    <tr>
                                        <td><code>so:autosize</code></td>
                                        <td>Fires when auto-resize adjusts height (detail: {height})</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h5 class="so-mt-6 so-mb-3">CSS Classes Reference</h5>
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered so-table-sm">
                        <thead class="so-table-light">
                            <tr>
                                <th style="width:40%">Class</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>.so-form-control</code></td>
                                <td>Base textarea styling</td>
                            </tr>
                            <tr>
                                <td><code>.so-form-control-sm</code></td>
                                <td>Small textarea size</td>
                            </tr>
                            <tr>
                                <td><code>.so-form-control-lg</code></td>
                                <td>Large textarea size</td>
                            </tr>
                            <tr>
                                <td><code>.so-form-control-autosize</code></td>
                                <td>Enable auto-resize (80-400px)</td>
                            </tr>
                            <tr>
                                <td><code>.so-form-control-autosize-sm</code></td>
                                <td>Small auto-resize (60-200px)</td>
                            </tr>
                            <tr>
                                <td><code>.so-form-control-autosize-lg</code></td>
                                <td>Large auto-resize (120-600px)</td>
                            </tr>
                            <tr>
                                <td><code>.so-resize-none</code></td>
                                <td>Disable resizing</td>
                            </tr>
                            <tr>
                                <td><code>.so-resize-vertical</code></td>
                                <td>Vertical resize only</td>
                            </tr>
                            <tr>
                                <td><code>.so-resize-horizontal</code></td>
                                <td>Horizontal resize only</td>
                            </tr>
                            <tr>
                                <td><code>.so-resize-both</code></td>
                                <td>Both directions</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
// Character counter for textarea
document.addEventListener('DOMContentLoaded', function() {
    const bioTextarea = document.getElementById('demo-bio');
    const bioCount = document.getElementById('demo-bio-count');

    if (bioTextarea && bioCount) {
        // Update counter on input
        bioTextarea.addEventListener('input', function() {
            bioCount.textContent = this.value.length;

            // Optional: Add warning class when near limit
            const maxLength = parseInt(this.getAttribute('maxlength')) || 200;
            const parent = bioCount.parentElement;
            if (this.value.length >= maxLength * 0.9) {
                parent.classList.add('so-text-warning');
            } else {
                parent.classList.remove('so-text-warning');
            }
            if (this.value.length >= maxLength) {
                parent.classList.remove('so-text-warning');
                parent.classList.add('so-text-danger');
            } else {
                parent.classList.remove('so-text-danger');
            }
        });

        // Initialize count
        bioCount.textContent = bioTextarea.value.length;
    }
});
</script>

<?php require_once '../../includes/footer.php'; ?>
