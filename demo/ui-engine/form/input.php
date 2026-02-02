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
        <nav aria-label="breadcrumb">
            <ol class="so-breadcrumb">
                <li class="so-breadcrumb-item"><a href="../index.php">UI Engine</a></li>
                <li class="so-breadcrumb-item"><a href="../index.php#form">Form Elements</a></li>
                <li class="so-breadcrumb-item so-active">Input</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">text_fields</span>
            Input
        </h1>
        <p class="so-page-subtitle">Text input element with various types, validation, and styling options.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Input -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Input</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-username">Username</label>
                        <input type="text" class="so-form-control" id="demo-username" name="username" placeholder="Enter your username">
                    </div>
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
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-row so-g-3">
                        <div class="so-col-md-6">
                            <div class="so-form-group">
                                <label class="so-form-label" for="demo-email">Email</label>
                                <input type="email" class="so-form-control" id="demo-email" placeholder="you@example.com">
                            </div>
                        </div>
                        <div class="so-col-md-6">
                            <div class="so-form-group">
                                <label class="so-form-label" for="demo-password">Password</label>
                                <input type="password" class="so-form-control" id="demo-password" placeholder="Enter password">
                            </div>
                        </div>
                        <div class="so-col-md-6">
                            <div class="so-form-group">
                                <label class="so-form-label" for="demo-number">Number</label>
                                <input type="number" class="so-form-control" id="demo-number" placeholder="0">
                            </div>
                        </div>
                        <div class="so-col-md-6">
                            <div class="so-form-group">
                                <label class="so-form-label" for="demo-date">Date</label>
                                <input type="date" class="so-form-control" id="demo-date">
                            </div>
                        </div>
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
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-email-val">
                            Email Address <span class="so-text-danger">*</span>
                        </label>
                        <input type="email" class="so-form-control" id="demo-email-val" placeholder="you@example.com" required>
                        <small class="so-form-text so-text-muted">We'll never share your email.</small>
                    </div>
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
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-mb-3">
                        <label class="so-form-label">Small</label>
                        <input type="text" class="so-form-control so-form-control-sm" placeholder="Small input">
                    </div>
                    <div class="so-mb-3">
                        <label class="so-form-label">Default</label>
                        <input type="text" class="so-form-control" placeholder="Default input">
                    </div>
                    <div>
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
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-row so-g-3">
                        <div class="so-col-md-6">
                            <label class="so-form-label">With Prefix</label>
                            <div class="so-input-group">
                                <span class="so-input-group-text">$</span>
                                <input type="text" class="so-form-control" placeholder="Amount">
                            </div>
                        </div>
                        <div class="so-col-md-6">
                            <label class="so-form-label">With Suffix</label>
                            <div class="so-input-group">
                                <input type="text" class="so-form-control" placeholder="Username">
                                <span class="so-input-group-text">@example.com</span>
                            </div>
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
                                <td>Set the input label</td>
                            </tr>
                            <tr>
                                <td><code>placeholder()</code></td>
                                <td><code>string $text</code></td>
                                <td>Set the placeholder text</td>
                            </tr>
                            <tr>
                                <td><code>value()</code></td>
                                <td><code>mixed $value</code></td>
                                <td>Set the input value</td>
                            </tr>
                            <tr>
                                <td><code>type()</code></td>
                                <td><code>string $type</code></td>
                                <td>Set input type (text, email, password, etc.)</td>
                            </tr>
                            <tr>
                                <td><code>required()</code></td>
                                <td>-</td>
                                <td>Mark the input as required</td>
                            </tr>
                            <tr>
                                <td><code>disabled()</code></td>
                                <td>-</td>
                                <td>Disable the input</td>
                            </tr>
                            <tr>
                                <td><code>readonly()</code></td>
                                <td>-</td>
                                <td>Make the input read-only</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: 'sm' or 'lg'</td>
                            </tr>
                            <tr>
                                <td><code>prefix()</code></td>
                                <td><code>string $text</code></td>
                                <td>Add input group prefix</td>
                            </tr>
                            <tr>
                                <td><code>suffix()</code></td>
                                <td><code>string $text</code></td>
                                <td>Add input group suffix</td>
                            </tr>
                            <tr>
                                <td><code>rules()</code></td>
                                <td><code>string|array $rules</code></td>
                                <td>Set validation rules</td>
                            </tr>
                            <tr>
                                <td><code>help()</code></td>
                                <td><code>string $text</code></td>
                                <td>Add help text below input</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
