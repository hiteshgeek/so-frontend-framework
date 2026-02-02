<?php
/**
 * SixOrbit UI Engine - Slider Element Demo
 */

$pageTitle = 'Slider - UI Engine';
$pageDescription = 'Range slider for numeric value selection';

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
                <li class="so-breadcrumb-item so-active">Slider</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">tune</span>
            Slider
        </h1>
        <p class="so-page-subtitle">Range slider element for numeric value selection with min/max bounds and step increments.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Slider -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Slider</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-volume">Volume</label>
                        <input type="range" class="so-form-range" id="demo-volume" name="volume" min="0" max="100" value="50">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-slider', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$slider = UiEngine::slider('volume')
    ->label('Volume')
    ->min(0)
    ->max(100)
    ->value(50);

echo \$slider->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const slider = UiEngine.slider('volume')
    .label('Volume')
    .min(0)
    .max(100)
    .value(50);

document.getElementById('container').innerHTML = slider.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="volume">Volume</label>
    <input type="range" class="so-form-range" id="volume" name="volume" min="0" max="100" value="50">
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Step -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Step Increments</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label">Step: 10</label>
                        <input type="range" class="so-form-range" min="0" max="100" step="10" value="50">
                    </div>
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label">Step: 25</label>
                        <input type="range" class="so-form-range" min="0" max="100" step="25" value="50">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Step: 0.1 (decimal)</label>
                        <input type="range" class="so-form-range" min="0" max="1" step="0.1" value="0.5">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('slider-step', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Step of 10
UiEngine::slider('tens')
    ->min(0)->max(100)->step(10)->value(50);

// Step of 25
UiEngine::slider('quarters')
    ->min(0)->max(100)->step(25)->value(50);

// Decimal step
UiEngine::slider('decimal')
    ->min(0)->max(1)->step(0.1)->value(0.5);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Step of 10
UiEngine.slider('tens')
    .min(0).max(100).step(10).value(50);

// Step of 25
UiEngine.slider('quarters')
    .min(0).max(100).step(25).value(50);

// Decimal step
UiEngine.slider('decimal')
    .min(0).max(1).step(0.1).value(0.5);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Value Display -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Value Display</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <div class="so-d-flex so-justify-content-between so-align-items-center so-mb-2">
                            <label class="so-form-label so-mb-0" for="demo-brightness">Brightness</label>
                            <span class="so-badge so-bg-primary" id="demo-brightness-value">75%</span>
                        </div>
                        <input type="range" class="so-form-range" id="demo-brightness" min="0" max="100" value="75"
                               oninput="document.getElementById('demo-brightness-value').textContent = this.value + '%'">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('slider-display', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$slider = UiEngine::slider('brightness')
    ->label('Brightness')
    ->min(0)->max(100)->value(75)
    ->showValue()           // Display current value
    ->suffix('%');          // Add suffix to value

echo \$slider->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const slider = UiEngine.slider('brightness')
    .label('Brightness')
    .min(0).max(100).value(75)
    .showValue()
    .suffix('%')
    .onChange((value) => {
        console.log('Brightness:', value);
    });

document.getElementById('container').innerHTML = slider.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Range Slider (Dual Handles) -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Range Slider (Dual Handles)</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('slider-range', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Price range slider
\$priceRange = UiEngine::rangeSlider('price')
    ->label('Price Range')
    ->min(0)
    ->max(1000)
    ->values([100, 500])   // [min value, max value]
    ->prefix('\$')
    ->showValues();

echo \$priceRange->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Price range slider
const priceRange = UiEngine.rangeSlider('price')
    .label('Price Range')
    .min(0)
    .max(1000)
    .values([100, 500])
    .prefix('$')
    .showValues()
    .onChange((min, max) => {
        console.log('Price range:', min, 'to', max);
    });

document.getElementById('container').innerHTML = priceRange.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Marks/Ticks -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Marks/Ticks</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('slider-marks', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// With automatic marks
\$slider = UiEngine::slider('rating')
    ->label('Rating')
    ->min(1)->max(5)->step(1)
    ->marks(); // Show tick marks

// With custom marks
\$slider = UiEngine::slider('temperature')
    ->label('Temperature')
    ->min(0)->max(100)
    ->marks([
        0 => 'Cold',
        50 => 'Warm',
        100 => 'Hot',
    ]);

echo \$slider->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// With automatic marks
const slider = UiEngine.slider('rating')
    .label('Rating')
    .min(1).max(5).step(1)
    .marks();

// With custom marks
const tempSlider = UiEngine.slider('temperature')
    .label('Temperature')
    .min(0).max(100)
    .marks({
        0: 'Cold',
        50: 'Warm',
        100: 'Hot',
    });

document.getElementById('container').innerHTML = slider.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Slider Colors -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Slider Colors</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('slider-colors', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Primary (default)
UiEngine::slider('primary')->color('primary')->value(50);

// Success
UiEngine::slider('success')->color('success')->value(50);

// Warning
UiEngine::slider('warning')->color('warning')->value(50);

// Danger
UiEngine::slider('danger')->color('danger')->value(50);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Primary (default)
UiEngine.slider('primary').color('primary').value(50);

// Success
UiEngine.slider('success').color('success').value(50);

// Warning
UiEngine.slider('warning').color('warning').value(50);

// Danger
UiEngine.slider('danger').color('danger').value(50);"
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
                                <td><code>min()</code></td>
                                <td><code>number $min</code></td>
                                <td>Set minimum value</td>
                            </tr>
                            <tr>
                                <td><code>max()</code></td>
                                <td><code>number $max</code></td>
                                <td>Set maximum value</td>
                            </tr>
                            <tr>
                                <td><code>step()</code></td>
                                <td><code>number $step</code></td>
                                <td>Set step increment</td>
                            </tr>
                            <tr>
                                <td><code>value()</code></td>
                                <td><code>number $value</code></td>
                                <td>Set current value</td>
                            </tr>
                            <tr>
                                <td><code>showValue()</code></td>
                                <td>-</td>
                                <td>Display current value</td>
                            </tr>
                            <tr>
                                <td><code>prefix()</code></td>
                                <td><code>string $prefix</code></td>
                                <td>Add prefix to value display</td>
                            </tr>
                            <tr>
                                <td><code>suffix()</code></td>
                                <td><code>string $suffix</code></td>
                                <td>Add suffix to value display</td>
                            </tr>
                            <tr>
                                <td><code>marks()</code></td>
                                <td><code>array|bool $marks</code></td>
                                <td>Show tick marks</td>
                            </tr>
                            <tr>
                                <td><code>color()</code></td>
                                <td><code>string $color</code></td>
                                <td>Set slider color</td>
                            </tr>
                            <tr>
                                <td><code>onChange()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Value change callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
