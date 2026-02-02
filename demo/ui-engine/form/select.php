<?php
/**
 * SixOrbit UI Engine - Select Element Demo
 */

$pageTitle = 'Select - UI Engine';
$pageDescription = 'Dropdown select with single and multiple selection support';

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
                <li class="so-breadcrumb-item so-active">Select</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">arrow_drop_down</span>
            Select
        </h1>
        <p class="so-page-subtitle">Dropdown select element with single and multiple selection, option groups, and search functionality.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Select -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Select</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-country">Country</label>
                        <select class="so-form-select" id="demo-country" name="country">
                            <option value="">Select a country</option>
                            <option value="us">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="ca">Canada</option>
                            <option value="au">Australia</option>
                        </select>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-select', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$select = UiEngine::select('country')
    ->label('Country')
    ->placeholder('Select a country')
    ->options([
        'us' => 'United States',
        'uk' => 'United Kingdom',
        'ca' => 'Canada',
        'au' => 'Australia',
    ]);

echo \$select->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const select = UiEngine.select('country')
    .label('Country')
    .placeholder('Select a country')
    .options({
        us: 'United States',
        uk: 'United Kingdom',
        ca: 'Canada',
        au: 'Australia',
    });

document.getElementById('container').innerHTML = select.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="country">Country</label>
    <select class="so-form-select" id="country" name="country">
        <option value="">Select a country</option>
        <option value="us">United States</option>
        <option value="uk">United Kingdom</option>
        <option value="ca">Canada</option>
        <option value="au">Australia</option>
    </select>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Option Groups -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Option Groups</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-car">Car Model</label>
                        <select class="so-form-select" id="demo-car" name="car">
                            <option value="">Select a car</option>
                            <optgroup label="German">
                                <option value="bmw">BMW</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </optgroup>
                            <optgroup label="Japanese">
                                <option value="toyota">Toyota</option>
                                <option value="honda">Honda</option>
                                <option value="nissan">Nissan</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-groups', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$select = UiEngine::select('car')
    ->label('Car Model')
    ->placeholder('Select a car')
    ->optionGroups([
        'German' => [
            'bmw' => 'BMW',
            'mercedes' => 'Mercedes',
            'audi' => 'Audi',
        ],
        'Japanese' => [
            'toyota' => 'Toyota',
            'honda' => 'Honda',
            'nissan' => 'Nissan',
        ],
    ]);

echo \$select->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const select = UiEngine.select('car')
    .label('Car Model')
    .placeholder('Select a car')
    .optionGroups({
        German: {
            bmw: 'BMW',
            mercedes: 'Mercedes',
            audi: 'Audi',
        },
        Japanese: {
            toyota: 'Toyota',
            honda: 'Honda',
            nissan: 'Nissan',
        },
    });

document.getElementById('container').innerHTML = select.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Multiple Select -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Multiple Selection</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-skills">Skills</label>
                        <select class="so-form-select" id="demo-skills" name="skills[]" multiple>
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                            <option value="js">JavaScript</option>
                            <option value="php">PHP</option>
                            <option value="python">Python</option>
                        </select>
                        <small class="so-form-text so-text-muted">Hold Ctrl/Cmd to select multiple</small>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-multiple', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$select = UiEngine::select('skills')
    ->label('Skills')
    ->multiple()
    ->options([
        'html' => 'HTML',
        'css' => 'CSS',
        'js' => 'JavaScript',
        'php' => 'PHP',
        'python' => 'Python',
    ])
    ->help('Hold Ctrl/Cmd to select multiple');

echo \$select->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const select = UiEngine.select('skills')
    .label('Skills')
    .multiple()
    .options({
        html: 'HTML',
        css: 'CSS',
        js: 'JavaScript',
        php: 'PHP',
        python: 'Python',
    })
    .help('Hold Ctrl/Cmd to select multiple');

document.getElementById('container').innerHTML = select.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Select Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Select Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-mb-3">
                        <label class="so-form-label">Small</label>
                        <select class="so-form-select so-form-select-sm">
                            <option>Small select</option>
                        </select>
                    </div>
                    <div class="so-mb-3">
                        <label class="so-form-label">Default</label>
                        <select class="so-form-select">
                            <option>Default select</option>
                        </select>
                    </div>
                    <div>
                        <label class="so-form-label">Large</label>
                        <select class="so-form-select so-form-select-lg">
                            <option>Large select</option>
                        </select>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small select
UiEngine::select('small')->size('sm')->options(['opt' => 'Small select']);

// Default select
UiEngine::select('default')->options(['opt' => 'Default select']);

// Large select
UiEngine::select('large')->size('lg')->options(['opt' => 'Large select']);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small select
UiEngine.select('small').size('sm').options({opt: 'Small select'});

// Default select
UiEngine.select('default').options({opt: 'Default select'});

// Large select
UiEngine.select('large').size('lg').options({opt: 'Large select'});"
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
                                <td><code>options()</code></td>
                                <td><code>array $options</code></td>
                                <td>Set select options as key-value pairs</td>
                            </tr>
                            <tr>
                                <td><code>optionGroups()</code></td>
                                <td><code>array $groups</code></td>
                                <td>Set options with optgroup labels</td>
                            </tr>
                            <tr>
                                <td><code>multiple()</code></td>
                                <td>-</td>
                                <td>Enable multiple selection</td>
                            </tr>
                            <tr>
                                <td><code>searchable()</code></td>
                                <td>-</td>
                                <td>Enable search/filter functionality</td>
                            </tr>
                            <tr>
                                <td><code>placeholder()</code></td>
                                <td><code>string $text</code></td>
                                <td>Set placeholder option text</td>
                            </tr>
                            <tr>
                                <td><code>value()</code></td>
                                <td><code>mixed $value</code></td>
                                <td>Set selected value(s)</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: 'sm' or 'lg'</td>
                            </tr>
                            <tr>
                                <td><code>required()</code></td>
                                <td>-</td>
                                <td>Mark as required</td>
                            </tr>
                            <tr>
                                <td><code>disabled()</code></td>
                                <td>-</td>
                                <td>Disable the select</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
