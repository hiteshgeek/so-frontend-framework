<?php
/**
 * SixOrbit UI Engine - Input Element Demo
 */

$pageTitle = 'Input - UI Engine';
$pageDescription = 'Text input with various types and configurations';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Input</h1>
            <p class="so-page-subtitle">Text input element with various types, validation, and styling options.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Input -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Input</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label" for="demo-username">Username</label>
                    <input type="text" class="so-form-control" id="demo-username" name="username" placeholder="Enter your username">
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-input', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$input = UiEngine::input('username')
    ->label('Username')
    ->placeholder('Enter your username');

echo \$input->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const input = UiEngine.input('username')
    .label('Username')
    .placeholder('Enter your username');

document.getElementById('container').innerHTML = input.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="username">Username</label>
    <input type="text" class="so-form-control" id="username" name="username" placeholder="Enter your username">
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Input Types -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Input Types</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-email">Email</label>
                        <input type="email" class="so-form-control" id="demo-email" placeholder="you@example.com">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-password">Password</label>
                        <input type="password" class="so-form-control" id="demo-password" placeholder="Enter password">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-number">Number</label>
                        <input type="number" class="so-form-control" id="demo-number" placeholder="0">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-date">Date</label>
                        <input type="date" class="so-form-control" id="demo-date">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('input-types', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Email input
\$email = UiEngine::email('email')
    ->label('Email')
    ->placeholder('you@example.com');

// Password input
\$password = UiEngine::password('password')
    ->label('Password')
    ->placeholder('Enter password');

// Number input
\$number = UiEngine::number('age')
    ->label('Age')
    ->min(0)
    ->max(120);

// Date input
\$date = UiEngine::date('birthdate')
    ->label('Birth Date');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Email input
const email = UiEngine.email('email')
    .label('Email')
    .placeholder('you@example.com');

// Password input
const password = UiEngine.password('password')
    .label('Password')
    .placeholder('Enter password');

// Number input
const number = UiEngine.number('age')
    .label('Age')
    .min(0)
    .max(120);

// Date input
const date = UiEngine.date('birthdate')
    .label('Birth Date');"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="email">Email</label>
    <input type="email" class="so-form-control" id="email" name="email" placeholder="you@example.com">
</div>

<div class="so-form-group">
    <label class="so-form-label" for="password">Password</label>
    <input type="password" class="so-form-control" id="password" name="password" placeholder="Enter password">
</div>

<div class="so-form-group">
    <label class="so-form-label" for="age">Age</label>
    <input type="number" class="so-form-control" id="age" name="age" min="0" max="120">
</div>

<div class="so-form-group">
    <label class="so-form-label" for="birthdate">Birth Date</label>
    <input type="date" class="so-form-control" id="birthdate" name="birthdate">
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Validation -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Validation</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label so-required" for="demo-email-val">Email Address</label>
                    <input type="email" class="so-form-control" id="demo-email-val" placeholder="you@example.com" required>
                    <div class="so-form-hint">We'll never share your email.</div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('input-validation', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$email = UiEngine::email('email')
    ->label('Email Address')
    ->placeholder('you@example.com')
    ->required()
    ->rules('required|email|max:255')
    ->messages([
        'required' => 'Please enter your email address',
        'email' => 'Please enter a valid email address',
    ])
    ->help('We\\'ll never share your email.');

echo \$email->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const email = UiEngine.email('email')
    .label('Email Address')
    .placeholder('you@example.com')
    .required()
    .rules('required|email|max:255')
    .messages({
        required: 'Please enter your email address',
        email: 'Please enter a valid email address',
    })
    .help('We\\'ll never share your email.');

document.getElementById('container').innerHTML = email.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label so-required" for="email">Email Address</label>
    <input type="email" class="so-form-control" id="email" name="email" placeholder="you@example.com" required>
    <div class="so-form-hint">We\'ll never share your email.</div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Input Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Input Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">Small</label>
                        <input type="text" class="so-form-control so-form-control-sm" placeholder="Small input">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Default</label>
                        <input type="text" class="so-form-control" placeholder="Default input">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Large</label>
                        <input type="text" class="so-form-control so-form-control-lg" placeholder="Large input">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('input-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small input
UiEngine::input('small')->size('sm')->placeholder('Small input');

// Default input
UiEngine::input('default')->placeholder('Default input');

// Large input
UiEngine::input('large')->size('lg')->placeholder('Large input');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small input
UiEngine.input('small').size('sm').placeholder('Small input');

// Default input
UiEngine.input('default').placeholder('Default input');

// Large input
UiEngine.input('large').size('lg').placeholder('Large input');"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Small -->
<input type="text" class="so-form-control so-form-control-sm" placeholder="Small input">

<!-- Default -->
<input type="text" class="so-form-control" placeholder="Default input">

<!-- Large -->
<input type="text" class="so-form-control so-form-control-lg" placeholder="Large input">'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Input with Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Input with Prefix/Suffix</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">With Prefix</label>
                        <div class="so-input-group">
                            <span class="so-input-addon">$</span>
                            <input type="text" class="so-form-control" placeholder="Amount">
                        </div>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">With Suffix</label>
                        <div class="so-input-group">
                            <input type="text" class="so-form-control" placeholder="Username">
                            <span class="so-input-addon">@example.com</span>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('input-addons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Input with prefix
UiEngine::input('amount')
    ->prefix('\$')
    ->placeholder('Amount');

// Input with suffix
UiEngine::input('username')
    ->suffix('@example.com')
    ->placeholder('Username');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Input with prefix
UiEngine.input('amount')
    .prefix('\$')
    .placeholder('Amount');

// Input with suffix
UiEngine.input('username')
    .suffix('@example.com')
    .placeholder('Username');"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Input with prefix -->
<div class="so-input-group">
    <span class="so-input-addon">$</span>
    <input type="text" class="so-form-control" placeholder="Amount">
</div>

<!-- Input with suffix -->
<div class="so-input-group">
    <input type="text" class="so-form-control" placeholder="Username">
    <span class="so-input-addon">@example.com</span>
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
                <!-- API Tabs -->
                <div class="so-tabs" role="tablist" data-so-tabs>
                    <button class="so-tab so-active" role="tab" data-so-target="#api-php">PHP Class</button>
                    <button class="so-tab" role="tab" data-so-target="#api-js">JS UiEngine</button>
                </div>

                <div class="so-tab-content">
                    <!-- PHP Class Reference -->
                    <div class="so-tab-pane so-fade so-show so-active" id="api-php" role="tabpanel">
                        <h5 class="so-mt-3">Core\\UiEngine\\Elements\\Form\\Input</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine::input(string $name)</code></td>
                                        <td>Create text input with name</td>
                                    </tr>
                                    <tr>
                                        <td><code>UiEngine::email(string $name)</code></td>
                                        <td>Create email input</td>
                                    </tr>
                                    <tr>
                                        <td><code>UiEngine::password(string $name)</code></td>
                                        <td>Create password input</td>
                                    </tr>
                                    <tr>
                                        <td><code>UiEngine::number(string $name)</code></td>
                                        <td>Create number input</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Input Type Methods</h6>
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
                                        <td><code>inputType(string $type)</code></td>
                                        <td>Set input type (text, email, password, etc.)</td>
                                    </tr>
                                    <tr>
                                        <td><code>email()</code></td>
                                        <td>Set as email input</td>
                                    </tr>
                                    <tr>
                                        <td><code>password()</code></td>
                                        <td>Set as password input</td>
                                    </tr>
                                    <tr>
                                        <td><code>number()</code></td>
                                        <td>Set as number input</td>
                                    </tr>
                                    <tr>
                                        <td><code>tel()</code></td>
                                        <td>Set as telephone input</td>
                                    </tr>
                                    <tr>
                                        <td><code>url()</code></td>
                                        <td>Set as URL input</td>
                                    </tr>
                                    <tr>
                                        <td><code>search()</code></td>
                                        <td>Set as search input</td>
                                    </tr>
                                    <tr>
                                        <td><code>date()</code></td>
                                        <td>Set as date input</td>
                                    </tr>
                                    <tr>
                                        <td><code>time()</code></td>
                                        <td>Set as time input</td>
                                    </tr>
                                    <tr>
                                        <td><code>datetime()</code></td>
                                        <td>Set as datetime-local input</td>
                                    </tr>
                                    <tr>
                                        <td><code>month()</code></td>
                                        <td>Set as month input</td>
                                    </tr>
                                    <tr>
                                        <td><code>week()</code></td>
                                        <td>Set as week input</td>
                                    </tr>
                                    <tr>
                                        <td><code>color()</code></td>
                                        <td>Set as color input</td>
                                    </tr>
                                    <tr>
                                        <td><code>range()</code></td>
                                        <td>Set as range input</td>
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
                                        <td><code>min(mixed $min)</code></td>
                                        <td>Set minimum value (for number, date, range)</td>
                                    </tr>
                                    <tr>
                                        <td><code>max(mixed $max)</code></td>
                                        <td>Set maximum value</td>
                                    </tr>
                                    <tr>
                                        <td><code>step(mixed $step)</code></td>
                                        <td>Set step value (for number, range)</td>
                                    </tr>
                                    <tr>
                                        <td><code>minlength(int $length)</code></td>
                                        <td>Set minimum character length</td>
                                    </tr>
                                    <tr>
                                        <td><code>maxlength(int $length)</code></td>
                                        <td>Set maximum character length</td>
                                    </tr>
                                    <tr>
                                        <td><code>pattern(string $regex)</code></td>
                                        <td>Set validation regex pattern</td>
                                    </tr>
                                    <tr>
                                        <td><code>autocomplete(string $value)</code></td>
                                        <td>Set autocomplete attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>noAutocomplete()</code></td>
                                        <td>Disable autocomplete</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Addon Methods</h6>
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
                                        <td><code>prefix(string $text)</code></td>
                                        <td>Add input group prefix</td>
                                    </tr>
                                    <tr>
                                        <td><code>suffix(string $text)</code></td>
                                        <td>Add input group suffix</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods (from FormElement)</h6>
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
                                        <td><code>value(mixed $value)</code></td>
                                        <td>Set input value</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(string $label)</code></td>
                                        <td>Set input label</td>
                                    </tr>
                                    <tr>
                                        <td><code>placeholder(string $text)</code></td>
                                        <td>Set placeholder text</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(bool $val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(bool $val = true)</code></td>
                                        <td>Disable input</td>
                                    </tr>
                                    <tr>
                                        <td><code>readonly(bool $val = true)</code></td>
                                        <td>Make read-only</td>
                                    </tr>
                                    <tr>
                                        <td><code>help(string $text)</code></td>
                                        <td>Add help text below input</td>
                                    </tr>
                                    <tr>
                                        <td><code>error(string $message)</code></td>
                                        <td>Set error message</td>
                                    </tr>
                                    <tr>
                                        <td><code>rules(string|array $rules)</code></td>
                                        <td>Set validation rules</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render input element only</td>
                                    </tr>
                                    <tr>
                                        <td><code>renderGroup()</code></td>
                                        <td>Render with label, help, error</td>
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
                        <h5 class="so-mt-3">UiEngine.input()</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine.input(name)</code></td>
                                        <td>Create text input with name</td>
                                    </tr>
                                    <tr>
                                        <td><code>UiEngine.email(name)</code></td>
                                        <td>Create email input</td>
                                    </tr>
                                    <tr>
                                        <td><code>UiEngine.password(name)</code></td>
                                        <td>Create password input</td>
                                    </tr>
                                    <tr>
                                        <td><code>UiEngine.number(name)</code></td>
                                        <td>Create number input</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Input Type Methods</h6>
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
                                        <td><code>inputType(type)</code></td>
                                        <td>Set input type</td>
                                    </tr>
                                    <tr>
                                        <td><code>email()</code></td>
                                        <td>Set as email input</td>
                                    </tr>
                                    <tr>
                                        <td><code>password()</code></td>
                                        <td>Set as password input</td>
                                    </tr>
                                    <tr>
                                        <td><code>number()</code></td>
                                        <td>Set as number input</td>
                                    </tr>
                                    <tr>
                                        <td><code>tel()</code></td>
                                        <td>Set as telephone input</td>
                                    </tr>
                                    <tr>
                                        <td><code>url()</code></td>
                                        <td>Set as URL input</td>
                                    </tr>
                                    <tr>
                                        <td><code>search()</code></td>
                                        <td>Set as search input</td>
                                    </tr>
                                    <tr>
                                        <td><code>date()</code></td>
                                        <td>Set as date input</td>
                                    </tr>
                                    <tr>
                                        <td><code>time()</code></td>
                                        <td>Set as time input</td>
                                    </tr>
                                    <tr>
                                        <td><code>datetime()</code></td>
                                        <td>Set as datetime-local input</td>
                                    </tr>
                                    <tr>
                                        <td><code>month()</code></td>
                                        <td>Set as month input</td>
                                    </tr>
                                    <tr>
                                        <td><code>week()</code></td>
                                        <td>Set as week input</td>
                                    </tr>
                                    <tr>
                                        <td><code>color()</code></td>
                                        <td>Set as color input</td>
                                    </tr>
                                    <tr>
                                        <td><code>range()</code></td>
                                        <td>Set as range input</td>
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
                                        <td><code>min(min)</code></td>
                                        <td>Set minimum value</td>
                                    </tr>
                                    <tr>
                                        <td><code>max(max)</code></td>
                                        <td>Set maximum value</td>
                                    </tr>
                                    <tr>
                                        <td><code>step(step)</code></td>
                                        <td>Set step value</td>
                                    </tr>
                                    <tr>
                                        <td><code>minlength(length)</code></td>
                                        <td>Set minimum character length</td>
                                    </tr>
                                    <tr>
                                        <td><code>maxlength(length)</code></td>
                                        <td>Set maximum character length</td>
                                    </tr>
                                    <tr>
                                        <td><code>pattern(regex)</code></td>
                                        <td>Set validation regex pattern</td>
                                    </tr>
                                    <tr>
                                        <td><code>autocomplete(value)</code></td>
                                        <td>Set autocomplete attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>noAutocomplete()</code></td>
                                        <td>Disable autocomplete</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Addon Methods</h6>
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
                                        <td><code>prefix(text)</code></td>
                                        <td>Add input group prefix</td>
                                    </tr>
                                    <tr>
                                        <td><code>suffix(text)</code></td>
                                        <td>Add input group suffix</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods (from FormElement)</h6>
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
                                        <td><code>value(value)</code></td>
                                        <td>Set input value</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(label)</code></td>
                                        <td>Set input label</td>
                                    </tr>
                                    <tr>
                                        <td><code>placeholder(text)</code></td>
                                        <td>Set placeholder text</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(val = true)</code></td>
                                        <td>Disable input</td>
                                    </tr>
                                    <tr>
                                        <td><code>readonly(val = true)</code></td>
                                        <td>Make read-only</td>
                                    </tr>
                                    <tr>
                                        <td><code>help(text)</code></td>
                                        <td>Add help text below input</td>
                                    </tr>
                                    <tr>
                                        <td><code>error(message)</code></td>
                                        <td>Set error message</td>
                                    </tr>
                                    <tr>
                                        <td><code>rules(rules)</code></td>
                                        <td>Set validation rules</td>
                                    </tr>
                                    <tr>
                                        <td><code>id(id)</code></td>
                                        <td>Set element ID</td>
                                    </tr>
                                    <tr>
                                        <td><code>addClass(className)</code></td>
                                        <td>Add CSS class</td>
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
                                        <td><code>renderGroup()</code></td>
                                        <td>Render with label, help, error</td>
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
