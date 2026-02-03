<?php
/**
 * SixOrbit UI Engine - Form Element Demo
 */

$pageTitle = 'Form - UI Engine';
$pageDescription = 'Form container with validation and submission handling';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Form</h1>
            <p class="so-page-subtitle">Form container element with built-in validation, AJAX submission, and field management.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Form -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Form</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <form action="/api/contact" method="POST">
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label" for="demo-name">Name</label>
                        <input type="text" class="so-form-control" id="demo-name" name="name" required>
                    </div>
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label" for="demo-email">Email</label>
                        <input type="email" class="so-form-control" id="demo-email" name="email" required>
                    </div>
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label" for="demo-message">Message</label>
                        <textarea class="so-form-control" id="demo-message" name="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="so-btn so-btn-primary">Submit</button>
                </form>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-form', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$form = UiEngine::form('/api/contact')
    ->method('POST')
    ->add(UiEngine::input('name')
        ->label('Name')
        ->required())
    ->add(UiEngine::email('email')
        ->label('Email')
        ->required())
    ->add(UiEngine::textarea('message')
        ->label('Message')
        ->rows(3))
    ->add(UiEngine::button('Submit')
        ->type('submit')
        ->variant('primary'));

echo \$form->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const form = UiEngine.form('/api/contact')
    .method('POST')
    .add(UiEngine.input('name')
        .label('Name')
        .required())
    .add(UiEngine.email('email')
        .label('Email')
        .required())
    .add(UiEngine.textarea('message')
        .label('Message')
        .rows(3))
    .add(UiEngine.button('Submit')
        .type('submit')
        .variant('primary'));

document.getElementById('container').innerHTML = form.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<form action="/api/contact" method="POST">
    <div class="so-form-group">
        <label class="so-form-label" for="name">Name</label>
        <input type="text" class="so-form-control" id="name" name="name" required>
    </div>
    <div class="so-form-group">
        <label class="so-form-label" for="email">Email</label>
        <input type="email" class="so-form-control" id="email" name="email" required>
    </div>
    <div class="so-form-group">
        <label class="so-form-label" for="message">Message</label>
        <textarea class="so-form-control" id="message" name="message" rows="3"></textarea>
    </div>
    <button type="submit" class="so-btn so-btn-primary">Submit</button>
</form>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Form with Validation -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form with Validation</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <form action="/api/register" method="POST" data-validate="true" onsubmit="event.preventDefault(); alert('Form validated!');">
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label so-required" for="demo-username">Username</label>
                        <input type="text" class="so-form-control" id="demo-username" name="username" required minlength="3" maxlength="20">
                    </div>
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label so-required" for="demo-reg-email">Email</label>
                        <input type="email" class="so-form-control" id="demo-reg-email" name="email" required>
                    </div>
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label so-required" for="demo-password">Password</label>
                        <input type="password" class="so-form-control" id="demo-password" name="password" required minlength="8">
                    </div>
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label so-required" for="demo-password-confirm">Confirm Password</label>
                        <input type="password" class="so-form-control" id="demo-password-confirm" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="so-btn so-btn-primary">Register</button>
                </form>

                <!-- Code Tabs -->
                <?= so_code_tabs('form-validation', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$form = UiEngine::form('/api/register')
    ->method('POST')
    ->validate() // Enable client-side validation
    ->add(UiEngine::input('username')
        ->label('Username')
        ->required()
        ->rules('required|min:3|max:20')
        ->messages([
            'required' => 'Username is required',
            'min' => 'Username must be at least 3 characters',
        ]))
    ->add(UiEngine::email('email')
        ->label('Email')
        ->required()
        ->rules('required|email'))
    ->add(UiEngine::password('password')
        ->label('Password')
        ->required()
        ->rules('required|min:8'))
    ->add(UiEngine::password('password_confirmation')
        ->label('Confirm Password')
        ->required()
        ->rules('required|same:password'))
    ->add(UiEngine::button('Register')
        ->type('submit')
        ->variant('primary'));

echo \$form->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const form = UiEngine.form('/api/register')
    .method('POST')
    .validate() // Enable client-side validation
    .add(UiEngine.input('username')
        .label('Username')
        .required()
        .rules('required|min:3|max:20')
        .messages({
            required: 'Username is required',
            min: 'Username must be at least 3 characters',
        }))
    .add(UiEngine.email('email')
        .label('Email')
        .required()
        .rules('required|email'))
    .add(UiEngine.password('password')
        .label('Password')
        .required()
        .rules('required|min:8'))
    .add(UiEngine.password('password_confirmation')
        .label('Confirm Password')
        .required()
        .rules('required|same:password'))
    .add(UiEngine.button('Register')
        .type('submit')
        .variant('primary'));

document.getElementById('container').innerHTML = form.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<form action="/api/register" method="POST" data-validate="true">
    <div class="so-form-group">
        <label class="so-form-label so-required" for="username">Username</label>
        <input type="text" class="so-form-control" id="username" name="username" required>
    </div>
    <div class="so-form-group">
        <label class="so-form-label so-required" for="email">Email</label>
        <input type="email" class="so-form-control" id="email" name="email" required>
    </div>
    <div class="so-form-group">
        <label class="so-form-label so-required" for="password">Password</label>
        <input type="password" class="so-form-control" id="password" name="password" required>
    </div>
    <div class="so-form-group">
        <label class="so-form-label so-required" for="password_confirmation">Confirm Password</label>
        <input type="password" class="so-form-control" id="password_confirmation" name="password_confirmation" required>
    </div>
    <button type="submit" class="so-btn so-btn-primary">Register</button>
</form>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- AJAX Form -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">AJAX Form Submission</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <form action="/api/subscribe" method="POST" data-ajax="true" onsubmit="event.preventDefault(); alert('AJAX form would submit here!');">
                    <div class="so-d-flex so-gap-2 so-align-items-end">
                        <div class="so-form-group so-mb-0" style="flex: 1;">
                            <label class="so-form-label so-required" for="demo-subscribe-email">Email</label>
                            <input type="email" class="so-form-control" id="demo-subscribe-email" name="email" placeholder="your@email.com" required>
                        </div>
                        <button type="submit" class="so-btn so-btn-primary">Subscribe</button>
                    </div>
                </form>

                <!-- Code Tabs -->
                <?= so_code_tabs('form-ajax', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$form = UiEngine::form('/api/subscribe')
    ->method('POST')
    ->ajax() // Enable AJAX submission
    ->onSuccess('handleSuccess')
    ->onError('handleError')
    ->add(UiEngine::email('email')
        ->label('Email')
        ->placeholder('your@email.com')
        ->required())
    ->add(UiEngine::button('Subscribe')
        ->type('submit')
        ->variant('primary'));

echo \$form->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const form = UiEngine.form('/api/subscribe')
    .method('POST')
    .ajax() // Enable AJAX submission
    .onSuccess((response) => {
        alert('Subscribed successfully!');
        form.reset();
    })
    .onError((error) => {
        alert('Subscription failed: ' + error.message);
    })
    .add(UiEngine.email('email')
        .label('Email')
        .placeholder('your@email.com')
        .required())
    .add(UiEngine.button('Subscribe')
        .type('submit')
        .variant('primary'));

document.getElementById('container').innerHTML = form.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<form action="/api/subscribe" method="POST" data-ajax="true">
    <div class="so-form-group">
        <label class="so-form-label so-required" for="email">Email</label>
        <input type="email" class="so-form-control" id="email" name="email" placeholder="your@email.com" required>
    </div>
    <button type="submit" class="so-btn so-btn-primary">Subscribe</button>
</form>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Form Layouts -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form Layouts</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo - Horizontal -->
                <h6 class="so-mb-3">Horizontal Layout</h6>
                <form class="so-mb-4">
                    <div class="so-grid so-grid-cols-12 so-gap-3 so-mb-3 so-align-items-center">
                        <label class="so-col-span-3 so-form-label so-mb-0">Email</label>
                        <div class="so-col-span-9">
                            <input type="email" class="so-form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="so-grid so-grid-cols-12 so-gap-3 so-mb-3 so-align-items-center">
                        <label class="so-col-span-3 so-form-label so-mb-0">Password</label>
                        <div class="so-col-span-9">
                            <input type="password" class="so-form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="so-grid so-grid-cols-12 so-gap-3">
                        <div class="so-col-span-9 so-col-start-4">
                            <button type="submit" class="so-btn so-btn-primary">Sign in</button>
                        </div>
                    </div>
                </form>

                <!-- Code Tabs -->
                <?= so_code_tabs('form-layouts', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Horizontal form layout
\$form = UiEngine::form('/login')
    ->layout('horizontal')
    ->labelWidth(3)
    ->add(UiEngine::email('email')
        ->label('Email')
        ->placeholder('Email'))
    ->add(UiEngine::password('password')
        ->label('Password')
        ->placeholder('Password'))
    ->add(UiEngine::button('Sign in')
        ->type('submit')
        ->variant('primary'));

// Inline form layout
\$form = UiEngine::form('/search')
    ->layout('inline')
    ->add(UiEngine::input('query')
        ->placeholder('Search...'))
    ->add(UiEngine::button('Search')
        ->type('submit')
        ->variant('primary'));"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Horizontal form layout
const form = UiEngine.form('/login')
    .layout('horizontal')
    .labelWidth(3)
    .add(UiEngine.email('email')
        .label('Email')
        .placeholder('Email'))
    .add(UiEngine.password('password')
        .label('Password')
        .placeholder('Password'))
    .add(UiEngine.button('Sign in')
        .type('submit')
        .variant('primary'));

// Inline form layout
const inlineForm = UiEngine.form('/search')
    .layout('inline')
    .add(UiEngine.input('query')
        .placeholder('Search...'))
    .add(UiEngine.button('Search')
        .type('submit')
        .variant('primary'));"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Horizontal Layout -->
<form action="/login" method="POST">
    <div class="so-grid so-grid-cols-12 so-gap-3 so-mb-3 so-align-items-center">
        <label class="so-col-span-3 so-form-label so-mb-0">Email</label>
        <div class="so-col-span-9">
            <input type="email" class="so-form-control" placeholder="Email">
        </div>
    </div>
    <div class="so-grid so-grid-cols-12 so-gap-3 so-mb-3 so-align-items-center">
        <label class="so-col-span-3 so-form-label so-mb-0">Password</label>
        <div class="so-col-span-9">
            <input type="password" class="so-form-control" placeholder="Password">
        </div>
    </div>
    <div class="so-grid so-grid-cols-12 so-gap-3">
        <div class="so-col-span-9 so-col-start-4">
            <button type="submit" class="so-btn so-btn-primary">Sign in</button>
        </div>
    </div>
</form>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Form with File Upload -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form with File Upload</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <form action="/api/profile" method="POST" enctype="multipart/form-data" onsubmit="event.preventDefault(); alert('Profile would be updated!');">
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label so-required" for="demo-profile-name">Name</label>
                        <input type="text" class="so-form-control" id="demo-profile-name" name="name" required>
                    </div>
                    <div class="so-form-group so-mb-3">
                        <label class="so-form-label" for="demo-avatar">Profile Picture</label>
                        <div class="so-form-control-file">
                            <input type="file" id="demo-avatar" name="avatar" accept="image/*">
                            <span class="so-form-file-button">
                                <span class="material-icons">image</span>
                                Browse
                            </span>
                            <span class="so-form-file-text">No file chosen</span>
                        </div>
                        <div class="so-form-hint">Max size: 2MB</div>
                    </div>
                    <button type="submit" class="so-btn so-btn-primary">Update Profile</button>
                </form>

                <!-- Code Tabs -->
                <?= so_code_tabs('form-file', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$form = UiEngine::form('/api/profile')
    ->method('POST')
    ->multipart() // Enable file uploads (enctype=\"multipart/form-data\")
    ->add(UiEngine::input('name')
        ->label('Name')
        ->required())
    ->add(UiEngine::file('avatar')
        ->label('Profile Picture')
        ->accept('image/*')
        ->help('Max size: 2MB'))
    ->add(UiEngine::button('Update Profile')
        ->type('submit')
        ->variant('primary'));

echo \$form->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const form = UiEngine.form('/api/profile')
    .method('POST')
    .multipart() // Enable file uploads
    .add(UiEngine.input('name')
        .label('Name')
        .required())
    .add(UiEngine.file('avatar')
        .label('Profile Picture')
        .accept('image/*')
        .help('Max size: 2MB'))
    .add(UiEngine.button('Update Profile')
        .type('submit')
        .variant('primary'));

document.getElementById('container').innerHTML = form.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<form action="/api/profile" method="POST" enctype="multipart/form-data">
    <div class="so-form-group">
        <label class="so-form-label so-required" for="name">Name</label>
        <input type="text" class="so-form-control" id="name" name="name" required>
    </div>
    <div class="so-form-group">
        <label class="so-form-label" for="avatar">Profile Picture</label>
        <div class="so-form-control-file">
            <input type="file" id="avatar" name="avatar" accept="image/*">
            <span class="so-form-file-button">
                <span class="material-icons">image</span>
                Browse
            </span>
            <span class="so-form-file-text">No file chosen</span>
        </div>
        <div class="so-form-hint">Max size: 2MB</div>
    </div>
    <button type="submit" class="so-btn so-btn-primary">Update Profile</button>
</form>'
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
                        <h5 class="so-mt-3">Core\\UiEngine\\Elements\\Form\\Form</h5>
                        <p class="so-text-muted">Extends ContainerElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine::form(string $action = '')</code></td>
                                        <td>Create form with optional action URL</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">HTTP Method</h6>
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
                                        <td><code>action(string $url)</code></td>
                                        <td>Set form action URL</td>
                                    </tr>
                                    <tr>
                                        <td><code>method(string $method)</code></td>
                                        <td>Set method: GET|POST|PUT|PATCH|DELETE</td>
                                    </tr>
                                    <tr>
                                        <td><code>get()</code></td>
                                        <td>Shortcut for GET method</td>
                                    </tr>
                                    <tr>
                                        <td><code>post()</code></td>
                                        <td>Shortcut for POST method</td>
                                    </tr>
                                    <tr>
                                        <td><code>put()</code></td>
                                        <td>PUT with method override</td>
                                    </tr>
                                    <tr>
                                        <td><code>patch()</code></td>
                                        <td>PATCH with method override</td>
                                    </tr>
                                    <tr>
                                        <td><code>delete()</code></td>
                                        <td>DELETE with method override</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Form Attributes</h6>
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
                                        <td><code>enctype(string $type)</code></td>
                                        <td>Set encoding type</td>
                                    </tr>
                                    <tr>
                                        <td><code>multipart()</code></td>
                                        <td>Multipart/form-data for file uploads</td>
                                    </tr>
                                    <tr>
                                        <td><code>target(string $target)</code></td>
                                        <td>Set form target</td>
                                    </tr>
                                    <tr>
                                        <td><code>newTab()</code></td>
                                        <td>Open in new tab (target="_blank")</td>
                                    </tr>
                                    <tr>
                                        <td><code>novalidate(bool $val = true)</code></td>
                                        <td>Disable browser validation</td>
                                    </tr>
                                    <tr>
                                        <td><code>autocomplete(string $val)</code></td>
                                        <td>Set autocomplete on/off</td>
                                    </tr>
                                    <tr>
                                        <td><code>noAutocomplete()</code></td>
                                        <td>Disable autocomplete</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">AJAX & Security</h6>
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
                                        <td><code>ajax(bool $val = true)</code></td>
                                        <td>Enable AJAX submission</td>
                                    </tr>
                                    <tr>
                                        <td><code>showLoading(bool $val = true)</code></td>
                                        <td>Show loading state on submit</td>
                                    </tr>
                                    <tr>
                                        <td><code>csrf(string $token, string $field = '_token')</code></td>
                                        <td>Add CSRF token hidden field</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Children</h6>
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
                                        <td><code>add(Element $element)</code></td>
                                        <td>Add child element</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render form HTML</td>
                                    </tr>
                                    <tr>
                                        <td><code>renderWithValidation()</code></td>
                                        <td>Render with validation script</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- JS UiEngine Reference -->
                    <div class="so-tab-pane so-fade" id="api-js" role="tabpanel">
                        <h5 class="so-mt-3">UiEngine.form()</h5>
                        <p class="so-text-muted">Extends ContainerElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine.form(action = '')</code></td>
                                        <td>Create form with optional action URL</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">HTTP Method</h6>
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
                                        <td><code>action(url)</code></td>
                                        <td>Set form action URL</td>
                                    </tr>
                                    <tr>
                                        <td><code>method(method)</code></td>
                                        <td>Set method: GET|POST|PUT|PATCH|DELETE</td>
                                    </tr>
                                    <tr>
                                        <td><code>get()</code></td>
                                        <td>Shortcut for GET method</td>
                                    </tr>
                                    <tr>
                                        <td><code>post()</code></td>
                                        <td>Shortcut for POST method</td>
                                    </tr>
                                    <tr>
                                        <td><code>put()</code></td>
                                        <td>PUT with method override</td>
                                    </tr>
                                    <tr>
                                        <td><code>patch()</code></td>
                                        <td>PATCH with method override</td>
                                    </tr>
                                    <tr>
                                        <td><code>delete()</code></td>
                                        <td>DELETE with method override</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Form Attributes</h6>
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
                                        <td><code>enctype(type)</code></td>
                                        <td>Set encoding type</td>
                                    </tr>
                                    <tr>
                                        <td><code>multipart()</code></td>
                                        <td>Multipart for file uploads</td>
                                    </tr>
                                    <tr>
                                        <td><code>target(target)</code></td>
                                        <td>Set form target</td>
                                    </tr>
                                    <tr>
                                        <td><code>newTab()</code></td>
                                        <td>Open in new tab</td>
                                    </tr>
                                    <tr>
                                        <td><code>novalidate(val = true)</code></td>
                                        <td>Disable browser validation</td>
                                    </tr>
                                    <tr>
                                        <td><code>autocomplete(val)</code></td>
                                        <td>Set autocomplete</td>
                                    </tr>
                                    <tr>
                                        <td><code>noAutocomplete()</code></td>
                                        <td>Disable autocomplete</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">AJAX & Events</h6>
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
                                        <td><code>ajax(val = true)</code></td>
                                        <td>Enable AJAX submission</td>
                                    </tr>
                                    <tr>
                                        <td><code>showLoading(val = true)</code></td>
                                        <td>Show loading state on submit</td>
                                    </tr>
                                    <tr>
                                        <td><code>onSubmit(handler)</code></td>
                                        <td>Set submit handler</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Runtime Methods</h6>
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
                                        <td><code>getFormData()</code></td>
                                        <td>Get FormData object</td>
                                    </tr>
                                    <tr>
                                        <td><code>getValues()</code></td>
                                        <td>Get values as object</td>
                                    </tr>
                                    <tr>
                                        <td><code>setValues(values)</code></td>
                                        <td>Set form field values</td>
                                    </tr>
                                    <tr>
                                        <td><code>resetForm()</code></td>
                                        <td>Reset all fields</td>
                                    </tr>
                                    <tr>
                                        <td><code>submitForm()</code></td>
                                        <td>Submit the form</td>
                                    </tr>
                                    <tr>
                                        <td><code>validate()</code></td>
                                        <td>Check form validity</td>
                                    </tr>
                                    <tr>
                                        <td><code>reportValidity()</code></td>
                                        <td>Report validity with UI feedback</td>
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

<script>
// Handle file input display
document.querySelectorAll('.so-form-control-file input[type="file"]').forEach(input => {
    input.addEventListener('change', function() {
        const fileText = this.closest('.so-form-control-file').querySelector('.so-form-file-text');
        if (this.files.length > 0) {
            fileText.textContent = this.files[0].name;
            fileText.classList.add('has-file');
        } else {
            fileText.textContent = 'No file chosen';
            fileText.classList.remove('has-file');
        }
    });
});
</script>
