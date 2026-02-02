<?php
/**
 * SixOrbit UI Engine - Hidden Element Demo
 */

$pageTitle = 'Hidden - UI Engine';
$pageDescription = 'Hidden input for form data not visible to users';

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
                <li class="so-breadcrumb-item so-active">Hidden</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">visibility_off</span>
            Hidden
        </h1>
        <p class="so-page-subtitle">Hidden input element for storing data that should be submitted with the form but not visible to users.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Hidden Input -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Hidden Input</h3>
            </div>
            <div class="so-card-body">
                <!-- Info -->
                <div class="so-alert so-alert-info so-mb-4">
                    <span class="material-icons">info</span>
                    <div>Hidden inputs are not visible on the page. The code examples below show how to create them.</div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-hidden', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$hidden = UiEngine::hidden('user_id')
    ->value('12345');

echo \$hidden->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const hidden = UiEngine.hidden('user_id')
    .value('12345');

document.getElementById('form').innerHTML += hidden.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<input type="hidden" id="user_id" name="user_id" value="12345">'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Common Use Cases -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Common Use Cases</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('hidden-usecases', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// CSRF Token
UiEngine::hidden('_token')->value(\$csrfToken);

// Record ID for editing
UiEngine::hidden('id')->value(\$record->id);

// HTTP Method Override
UiEngine::hidden('_method')->value('PUT');

// Form action context
UiEngine::hidden('action')->value('update');

// Tracking/referral data
UiEngine::hidden('ref')->value(\$_GET['ref'] ?? '');

// Multiple hidden fields in a form
\$form = UiEngine::form('/users/update')
    ->add(UiEngine::hidden('id')->value(\$user->id))
    ->add(UiEngine::hidden('_token')->value(\$csrfToken))
    ->add(UiEngine::input('name')->label('Name')->value(\$user->name))
    ->add(UiEngine::button('Update')->type('submit'));"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// CSRF Token
UiEngine.hidden('_token').value(csrfToken);

// Record ID for editing
UiEngine.hidden('id').value(record.id);

// HTTP Method Override
UiEngine.hidden('_method').value('PUT');

// Form action context
UiEngine.hidden('action').value('update');

// Dynamic value setting
const hidden = UiEngine.hidden('selected_items');
hidden.value(JSON.stringify(selectedItems));

// Multiple hidden fields in a form
const form = UiEngine.form('/users/update')
    .add(UiEngine.hidden('id').value(user.id))
    .add(UiEngine.hidden('_token').value(csrfToken))
    .add(UiEngine.input('name').label('Name').value(user.name))
    .add(UiEngine.button('Update').type('submit'));"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- In Form Context -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">In Form Context</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <form>
                        <input type="hidden" name="user_id" value="12345">
                        <input type="hidden" name="_token" value="abc123xyz">

                        <div class="so-form-group so-mb-3">
                            <label class="so-form-label" for="demo-name">Name</label>
                            <input type="text" class="so-form-control" id="demo-name" name="name" value="John Doe">
                        </div>
                        <div class="so-form-group so-mb-3">
                            <label class="so-form-label" for="demo-email">Email</label>
                            <input type="email" class="so-form-control" id="demo-email" name="email" value="john@example.com">
                        </div>
                        <button type="submit" class="so-btn so-btn-primary">Update Profile</button>
                    </form>
                    <div class="so-mt-3 so-p-2 so-bg-dark so-text-white so-rounded">
                        <small><strong>Hidden fields in this form:</strong></small>
                        <ul class="so-mb-0 so-mt-1">
                            <li><code>user_id = "12345"</code></li>
                            <li><code>_token = "abc123xyz"</code></li>
                        </ul>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('hidden-form', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$form = UiEngine::form('/profile/update')
    ->method('POST')
    ->add(UiEngine::hidden('user_id')->value('12345'))
    ->add(UiEngine::hidden('_token')->value('abc123xyz'))
    ->add(UiEngine::input('name')
        ->label('Name')
        ->value('John Doe'))
    ->add(UiEngine::email('email')
        ->label('Email')
        ->value('john@example.com'))
    ->add(UiEngine::button('Update Profile')
        ->type('submit')
        ->variant('primary'));

echo \$form->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const form = UiEngine.form('/profile/update')
    .method('POST')
    .add(UiEngine.hidden('user_id').value('12345'))
    .add(UiEngine.hidden('_token').value('abc123xyz'))
    .add(UiEngine.input('name')
        .label('Name')
        .value('John Doe'))
    .add(UiEngine.email('email')
        .label('Email')
        .value('john@example.com'))
    .add(UiEngine.button('Update Profile')
        .type('submit')
        .variant('primary'));

document.getElementById('container').innerHTML = form.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Dynamic Values -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Dynamic Value Updates</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('hidden-dynamic', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Set value from database
\$hidden = UiEngine::hidden('record_id')
    ->value(\$record->id);

// Set JSON data
\$hidden = UiEngine::hidden('metadata')
    ->value(json_encode(['key' => 'value']));

// Set from request
\$hidden = UiEngine::hidden('redirect')
    ->value(\$_GET['redirect'] ?? '/dashboard');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Update hidden input value dynamically
const hidden = UiEngine.hidden('selected_id');

// On selection change
document.querySelector('#items').addEventListener('change', (e) => {
    hidden.value(e.target.value);
});

// Store complex data as JSON
const dataHidden = UiEngine.hidden('form_data');
dataHidden.value(JSON.stringify({
    items: selectedItems,
    timestamp: Date.now()
}));

// Access the DOM element to update
const element = hidden.getElement();
element.value = 'new-value';"
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
                                <td><code>value()</code></td>
                                <td><code>mixed $value</code></td>
                                <td>Set the hidden input value</td>
                            </tr>
                            <tr>
                                <td><code>id()</code></td>
                                <td><code>string $id</code></td>
                                <td>Set custom ID attribute</td>
                            </tr>
                            <tr>
                                <td><code>attr()</code></td>
                                <td><code>string $name, mixed $value</code></td>
                                <td>Set custom HTML attribute</td>
                            </tr>
                            <tr>
                                <td><code>data()</code></td>
                                <td><code>string $key, mixed $value</code></td>
                                <td>Set data-* attribute</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
