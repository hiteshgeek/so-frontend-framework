<?php
/**
 * SixOrbit UI Engine - Checkbox Element Demo
 */

$pageTitle = 'Checkbox - UI Engine';
$pageDescription = 'Checkbox input for boolean and multiple selections';

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
                <li class="so-breadcrumb-item so-active">Checkbox</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">check_box</span>
            Checkbox
        </h1>
        <p class="so-page-subtitle">Checkbox element for boolean values and multiple selections with various styling options.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Checkbox -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Checkbox</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="checkbox" id="demo-terms" name="terms">
                        <label class="so-form-check-label" for="demo-terms">I agree to the terms and conditions</label>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-checkbox', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$checkbox = UiEngine::checkbox('terms')
    ->label('I agree to the terms and conditions');

echo \$checkbox->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const checkbox = UiEngine.checkbox('terms')
    .label('I agree to the terms and conditions');

document.getElementById('container').innerHTML = checkbox.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-check">
    <input class="so-form-check-input" type="checkbox" id="terms" name="terms">
    <label class="so-form-check-label" for="terms">I agree to the terms and conditions</label>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Checkbox Group -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Checkbox Group</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <label class="so-form-label">Select your interests</label>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="checkbox" id="demo-tech" name="interests[]" value="tech">
                        <label class="so-form-check-label" for="demo-tech">Technology</label>
                    </div>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="checkbox" id="demo-sports" name="interests[]" value="sports">
                        <label class="so-form-check-label" for="demo-sports">Sports</label>
                    </div>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="checkbox" id="demo-music" name="interests[]" value="music">
                        <label class="so-form-check-label" for="demo-music">Music</label>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('checkbox-group', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$checkboxGroup = UiEngine::checkboxGroup('interests')
    ->label('Select your interests')
    ->options([
        'tech' => 'Technology',
        'sports' => 'Sports',
        'music' => 'Music',
    ]);

echo \$checkboxGroup->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const checkboxGroup = UiEngine.checkboxGroup('interests')
    .label('Select your interests')
    .options({
        tech: 'Technology',
        sports: 'Sports',
        music: 'Music',
    });

document.getElementById('container').innerHTML = checkboxGroup.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Inline Checkboxes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Inline Checkboxes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <label class="so-form-label">Size options</label>
                    <div>
                        <div class="so-form-check so-form-check-inline">
                            <input class="so-form-check-input" type="checkbox" id="demo-sm" name="sizes[]" value="sm">
                            <label class="so-form-check-label" for="demo-sm">Small</label>
                        </div>
                        <div class="so-form-check so-form-check-inline">
                            <input class="so-form-check-input" type="checkbox" id="demo-md" name="sizes[]" value="md">
                            <label class="so-form-check-label" for="demo-md">Medium</label>
                        </div>
                        <div class="so-form-check so-form-check-inline">
                            <input class="so-form-check-input" type="checkbox" id="demo-lg" name="sizes[]" value="lg">
                            <label class="so-form-check-label" for="demo-lg">Large</label>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('checkbox-inline', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$checkboxGroup = UiEngine::checkboxGroup('sizes')
    ->label('Size options')
    ->inline()
    ->options([
        'sm' => 'Small',
        'md' => 'Medium',
        'lg' => 'Large',
    ]);

echo \$checkboxGroup->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const checkboxGroup = UiEngine.checkboxGroup('sizes')
    .label('Size options')
    .inline()
    .options({
        sm: 'Small',
        md: 'Medium',
        lg: 'Large',
    });

document.getElementById('container').innerHTML = checkboxGroup.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Checked & Disabled States -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">States</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="checkbox" id="demo-checked" checked>
                        <label class="so-form-check-label" for="demo-checked">Checked checkbox</label>
                    </div>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="checkbox" id="demo-disabled" disabled>
                        <label class="so-form-check-label" for="demo-disabled">Disabled checkbox</label>
                    </div>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="checkbox" id="demo-checked-disabled" checked disabled>
                        <label class="so-form-check-label" for="demo-checked-disabled">Checked and disabled</label>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('checkbox-states', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Checked checkbox
UiEngine::checkbox('checked')->label('Checked checkbox')->checked();

// Disabled checkbox
UiEngine::checkbox('disabled')->label('Disabled checkbox')->disabled();

// Checked and disabled
UiEngine::checkbox('both')->label('Checked and disabled')->checked()->disabled();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Checked checkbox
UiEngine.checkbox('checked').label('Checked checkbox').checked();

// Disabled checkbox
UiEngine.checkbox('disabled').label('Disabled checkbox').disabled();

// Checked and disabled
UiEngine.checkbox('both').label('Checked and disabled').checked().disabled();"
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
                                <td><code>label()</code></td>
                                <td><code>string $label</code></td>
                                <td>Set the checkbox label</td>
                            </tr>
                            <tr>
                                <td><code>checked()</code></td>
                                <td><code>bool $checked = true</code></td>
                                <td>Set checked state</td>
                            </tr>
                            <tr>
                                <td><code>value()</code></td>
                                <td><code>mixed $value</code></td>
                                <td>Set the checkbox value</td>
                            </tr>
                            <tr>
                                <td><code>options()</code></td>
                                <td><code>array $options</code></td>
                                <td>Set options for checkbox group</td>
                            </tr>
                            <tr>
                                <td><code>inline()</code></td>
                                <td>-</td>
                                <td>Display checkboxes inline</td>
                            </tr>
                            <tr>
                                <td><code>required()</code></td>
                                <td>-</td>
                                <td>Mark as required</td>
                            </tr>
                            <tr>
                                <td><code>disabled()</code></td>
                                <td>-</td>
                                <td>Disable the checkbox</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
