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
        <div class="so-page-header-left">
            <h1 class="so-page-title">Hidden</h1>
            <p class="so-page-subtitle">Hidden input element for storing data that should be submitted with the form but not visible to users.</p>
        </div>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- CSRF Token -->
<input type="hidden" name="_token" value="abc123xyz">

<!-- Record ID -->
<input type="hidden" name="id" value="12345">

<!-- HTTP Method Override -->
<input type="hidden" name="_method" value="PUT">

<!-- Form action context -->
<input type="hidden" name="action" value="update">'
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
                <form class="so-mb-4">
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
                <div class="so-p-2 so-bg-dark so-text-white so-rounded">
                    <small><strong>Hidden fields in this form:</strong></small>
                    <ul class="so-mb-0 so-mt-1">
                        <li><code>user_id = "12345"</code></li>
                        <li><code>_token = "abc123xyz"</code></li>
                    </ul>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<form action="/profile/update" method="POST">
    <input type="hidden" name="user_id" value="12345">
    <input type="hidden" name="_token" value="abc123xyz">
    <div class="so-form-group">
        <label class="so-form-label" for="name">Name</label>
        <input type="text" class="so-form-control" id="name" name="name" value="John Doe">
    </div>
    <div class="so-form-group">
        <label class="so-form-label" for="email">Email</label>
        <input type="email" class="so-form-control" id="email" name="email" value="john@example.com">
    </div>
    <button type="submit" class="so-btn so-btn-primary">Update Profile</button>
</form>'
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Dynamic value from database -->
<input type="hidden" name="record_id" value="12345">

<!-- JSON data -->
<input type="hidden" name="metadata" value="{\"key\":\"value\"}">

<!-- Redirect URL -->
<input type="hidden" name="redirect" value="/dashboard">'
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
                        <h5 class="so-mt-3">Core\\UiEngine\\Elements\\Form\\Hidden</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine::hidden(string $name)</code></td>
                                        <td>Create hidden input with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Methods</h6>
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
                                        <td>Set hidden input value</td>
                                    </tr>
                                    <tr>
                                        <td><code>id(string $id)</code></td>
                                        <td>Set element ID</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render the hidden input</td>
                                    </tr>
                                    <tr>
                                        <td><code>renderGroup()</code></td>
                                        <td>Same as render() for hidden inputs</td>
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
                        <h5 class="so-mt-3">UiEngine.hidden()</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine.hidden(name)</code></td>
                                        <td>Create hidden input with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Methods</h6>
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
                                        <td>Set hidden input value</td>
                                    </tr>
                                    <tr>
                                        <td><code>id(id)</code></td>
                                        <td>Set element ID</td>
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
                                        <td>Same as render() for hidden inputs</td>
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
