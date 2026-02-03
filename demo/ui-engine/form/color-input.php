<?php
/**
 * SixOrbit UI Engine - Color Input Element Demo
 */

$pageTitle = 'Color Input - UI Engine';
$pageDescription = 'Color picker input with various formats and presets';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Color Input</h1>
            <p class="so-page-subtitle">Color picker input with hex, RGB, and HSL format support, preset colors, and alpha channel.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Color Input -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Color Input</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label" for="demo-color">Choose Color</label>
                    <input type="color" class="so-form-control so-form-control-color" id="demo-color" name="color" value="#3b82f6">
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-color', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$color = UiEngine::color('theme_color')
    ->label('Choose Color')
    ->value('#3b82f6');

echo \$color->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const color = UiEngine.color('theme_color')
    .label('Choose Color')
    .value('#3b82f6');

document.getElementById('container').innerHTML = color.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="theme_color">Choose Color</label>
    <input type="color" class="so-form-control so-form-control-color"
           id="theme_color" name="theme_color" value="#3b82f6">
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Preset Colors -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Preset Colors</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label">Brand Color</label>
                    <div class="so-d-flex so-gap-2 so-mb-2">
                        <button type="button" class="so-btn so-p-0" style="width:32px;height:32px;background:#ef4444;border-radius:4px;border:2px solid transparent;" onclick="document.getElementById('demo-preset').value='#ef4444'"></button>
                        <button type="button" class="so-btn so-p-0" style="width:32px;height:32px;background:#f97316;border-radius:4px;border:2px solid transparent;" onclick="document.getElementById('demo-preset').value='#f97316'"></button>
                        <button type="button" class="so-btn so-p-0" style="width:32px;height:32px;background:#eab308;border-radius:4px;border:2px solid transparent;" onclick="document.getElementById('demo-preset').value='#eab308'"></button>
                        <button type="button" class="so-btn so-p-0" style="width:32px;height:32px;background:#22c55e;border-radius:4px;border:2px solid transparent;" onclick="document.getElementById('demo-preset').value='#22c55e'"></button>
                        <button type="button" class="so-btn so-p-0" style="width:32px;height:32px;background:#3b82f6;border-radius:4px;border:2px solid transparent;" onclick="document.getElementById('demo-preset').value='#3b82f6'"></button>
                        <button type="button" class="so-btn so-p-0" style="width:32px;height:32px;background:#8b5cf6;border-radius:4px;border:2px solid transparent;" onclick="document.getElementById('demo-preset').value='#8b5cf6'"></button>
                    </div>
                    <input type="color" class="so-form-control so-form-control-color" id="demo-preset" value="#3b82f6">
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('color-presets', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$color = UiEngine::color('brand_color')
    ->label('Brand Color')
    ->presets([
        '#ef4444', // Red
        '#f97316', // Orange
        '#eab308', // Yellow
        '#22c55e', // Green
        '#3b82f6', // Blue
        '#8b5cf6', // Purple
    ])
    ->value('#3b82f6');

echo \$color->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const color = UiEngine.color('brand_color')
    .label('Brand Color')
    .presets([
        '#ef4444', // Red
        '#f97316', // Orange
        '#eab308', // Yellow
        '#22c55e', // Green
        '#3b82f6', // Blue
        '#8b5cf6', // Purple
    ])
    .value('#3b82f6');

document.getElementById('container').innerHTML = color.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label">Brand Color</label>
    <div class="so-color-presets so-d-flex so-gap-2 so-mb-2">
        <button type="button" class="so-color-swatch" style="background:#ef4444;"></button>
        <button type="button" class="so-color-swatch" style="background:#f97316;"></button>
        <!-- ... more swatches -->
    </div>
    <input type="color" class="so-form-control so-form-control-color" name="brand_color" value="#3b82f6">
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Color Formats -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Color Formats</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('color-formats', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Hex format (default)
UiEngine::color('hex_color')
    ->format('hex')
    ->value('#3b82f6');

// RGB format
UiEngine::color('rgb_color')
    ->format('rgb')
    ->value('rgb(59, 130, 246)');

// HSL format
UiEngine::color('hsl_color')
    ->format('hsl')
    ->value('hsl(217, 91%, 60%)');

// RGBA with alpha
UiEngine::color('rgba_color')
    ->format('rgba')
    ->alpha() // Enable alpha channel
    ->value('rgba(59, 130, 246, 0.8)');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Hex format (default)
UiEngine.color('hex_color')
    .format('hex')
    .value('#3b82f6');

// RGB format
UiEngine.color('rgb_color')
    .format('rgb')
    .value('rgb(59, 130, 246)');

// HSL format
UiEngine.color('hsl_color')
    .format('hsl')
    .value('hsl(217, 91%, 60%)');

// RGBA with alpha
UiEngine.color('rgba_color')
    .format('rgba')
    .alpha() // Enable alpha channel
    .value('rgba(59, 130, 246, 0.8)');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Text Input -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Text Input</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label">Background Color</label>
                    <div class="so-input-group">
                        <input type="color" class="so-form-control so-form-control-color" id="demo-combined" value="#3b82f6" style="width:50px;">
                        <input type="text" class="so-form-control" id="demo-combined-text" value="#3b82f6" placeholder="#000000">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('color-text', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$color = UiEngine::color('bg_color')
    ->label('Background Color')
    ->showInput() // Show text input alongside color picker
    ->value('#3b82f6');

echo \$color->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const color = UiEngine.color('bg_color')
    .label('Background Color')
    .showInput() // Show text input alongside color picker
    .value('#3b82f6')
    .onChange((value) => {
        console.log('Color changed:', value);
    });

document.getElementById('container').innerHTML = color.toHtml();"
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
                        <h5 class="so-mt-3">Core\\UiEngine\\Elements\\Form\\ColorInput</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine::color(string $name)</code></td>
                                        <td>Create color input with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Color Input Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:35%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>presets(array $colors)</code></td>
                                        <td>Set preset color swatches</td>
                                    </tr>
                                    <tr>
                                        <td><code>addPreset(string $color)</code></td>
                                        <td>Add a single preset color</td>
                                    </tr>
                                    <tr>
                                        <td><code>bootstrapPresets()</code></td>
                                        <td>Use Bootstrap default color palette</td>
                                    </tr>
                                    <tr>
                                        <td><code>showInput(bool $show = true)</code></td>
                                        <td>Show text input for manual entry</td>
                                    </tr>
                                    <tr>
                                        <td><code>hideInput()</code></td>
                                        <td>Hide text input</td>
                                    </tr>
                                    <tr>
                                        <td><code>format(string $format)</code></td>
                                        <td>Set format: 'hex', 'rgb', 'hsl'</td>
                                    </tr>
                                    <tr>
                                        <td><code>hex()</code></td>
                                        <td>Shortcut for format('hex')</td>
                                    </tr>
                                    <tr>
                                        <td><code>rgb()</code></td>
                                        <td>Shortcut for format('rgb')</td>
                                    </tr>
                                    <tr>
                                        <td><code>hsl()</code></td>
                                        <td>Shortcut for format('hsl')</td>
                                    </tr>
                                    <tr>
                                        <td><code>alpha(bool $alpha = true)</code></td>
                                        <td>Enable alpha/opacity channel</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods (FormElement)</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:35%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>name(string $name)</code></td>
                                        <td>Set input name</td>
                                    </tr>
                                    <tr>
                                        <td><code>value(mixed $value)</code></td>
                                        <td>Set color value (e.g., '#3b82f6')</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(string $label)</code></td>
                                        <td>Set form label</td>
                                    </tr>
                                    <tr>
                                        <td><code>placeholder(string $text)</code></td>
                                        <td>Set placeholder text</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(bool $val = true)</code></td>
                                        <td>Disable the input</td>
                                    </tr>
                                    <tr>
                                        <td><code>readonly(bool $val = true)</code></td>
                                        <td>Make input read-only</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(bool $val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>helpText(string $text)</code></td>
                                        <td>Add help text below input</td>
                                    </tr>
                                    <tr>
                                        <td><code>error(string $message)</code></td>
                                        <td>Set validation error message</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Rendering Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:35%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render input HTML only</td>
                                    </tr>
                                    <tr>
                                        <td><code>renderGroup()</code></td>
                                        <td>Render with label, help text, errors</td>
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
                        <h5 class="so-mt-3">UiEngine.color()</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine.color(name)</code></td>
                                        <td>Create color input with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Color Input Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:35%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>presets(colors)</code></td>
                                        <td>Set preset color swatches array</td>
                                    </tr>
                                    <tr>
                                        <td><code>addPreset(color)</code></td>
                                        <td>Add a single preset color</td>
                                    </tr>
                                    <tr>
                                        <td><code>bootstrapPresets()</code></td>
                                        <td>Use Bootstrap default color palette</td>
                                    </tr>
                                    <tr>
                                        <td><code>showInput(show = true)</code></td>
                                        <td>Show text input for manual entry</td>
                                    </tr>
                                    <tr>
                                        <td><code>hideInput()</code></td>
                                        <td>Hide text input</td>
                                    </tr>
                                    <tr>
                                        <td><code>format(fmt)</code></td>
                                        <td>Set format: 'hex', 'rgb', 'hsl'</td>
                                    </tr>
                                    <tr>
                                        <td><code>hex()</code></td>
                                        <td>Shortcut for format('hex')</td>
                                    </tr>
                                    <tr>
                                        <td><code>rgb()</code></td>
                                        <td>Shortcut for format('rgb')</td>
                                    </tr>
                                    <tr>
                                        <td><code>hsl()</code></td>
                                        <td>Shortcut for format('hsl')</td>
                                    </tr>
                                    <tr>
                                        <td><code>alpha(val = true)</code></td>
                                        <td>Enable alpha/opacity channel</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods (FormElement)</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:35%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>name(name)</code></td>
                                        <td>Set input name</td>
                                    </tr>
                                    <tr>
                                        <td><code>value(value)</code></td>
                                        <td>Set color value</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(label)</code></td>
                                        <td>Set form label</td>
                                    </tr>
                                    <tr>
                                        <td><code>placeholder(text)</code></td>
                                        <td>Set placeholder text</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(val = true)</code></td>
                                        <td>Disable the input</td>
                                    </tr>
                                    <tr>
                                        <td><code>readonly(val = true)</code></td>
                                        <td>Make input read-only</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>helpText(text)</code></td>
                                        <td>Add help text below input</td>
                                    </tr>
                                    <tr>
                                        <td><code>error(message)</code></td>
                                        <td>Set validation error message</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Rendering Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:35%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
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

                        <h6 class="so-mt-4">Element Methods (Base)</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:35%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>id(id)</code></td>
                                        <td>Set element ID</td>
                                    </tr>
                                    <tr>
                                        <td><code>addClass(className)</code></td>
                                        <td>Add CSS class</td>
                                    </tr>
                                    <tr>
                                        <td><code>removeClass(className)</code></td>
                                        <td>Remove CSS class</td>
                                    </tr>
                                    <tr>
                                        <td><code>attr(name, value)</code></td>
                                        <td>Set attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>data(key, value)</code></td>
                                        <td>Set data attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>on(event, handler)</code></td>
                                        <td>Attach event handler</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
