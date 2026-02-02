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
        <nav aria-label="breadcrumb">
            <ol class="so-breadcrumb">
                <li class="so-breadcrumb-item"><a href="../index.php">UI Engine</a></li>
                <li class="so-breadcrumb-item"><a href="../index.php#form">Form Elements</a></li>
                <li class="so-breadcrumb-item so-active">Form</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">description</span>
            Form
        </h1>
        <p class="so-page-subtitle">Form container element with built-in validation, AJAX submission, and field management.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Form -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Form</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
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
                </div>

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
                ]) ?>
            </div>
        </div>

        <!-- AJAX Form -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">AJAX Form Submission</h3>
            </div>
            <div class="so-card-body">
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
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <h6 class="so-mb-3">Horizontal Layout</h6>
                    <form>
                        <div class="so-row so-mb-3">
                            <label class="so-col-sm-3 so-col-form-label">Email</label>
                            <div class="so-col-sm-9">
                                <input type="email" class="so-form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="so-row so-mb-3">
                            <label class="so-col-sm-3 so-col-form-label">Password</label>
                            <div class="so-col-sm-9">
                                <input type="password" class="so-form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="so-row">
                            <div class="so-col-sm-9 so-offset-sm-3">
                                <button type="submit" class="so-btn so-btn-primary">Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>

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
                ]) ?>
            </div>
        </div>

        <!-- Form with File Upload -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form with File Upload</h3>
            </div>
            <div class="so-card-body">
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
                                <td><code>action()</code></td>
                                <td><code>string $url</code></td>
                                <td>Set form action URL</td>
                            </tr>
                            <tr>
                                <td><code>method()</code></td>
                                <td><code>string $method</code></td>
                                <td>Set HTTP method (GET, POST, PUT, DELETE)</td>
                            </tr>
                            <tr>
                                <td><code>add()</code></td>
                                <td><code>Element $element</code></td>
                                <td>Add form element</td>
                            </tr>
                            <tr>
                                <td><code>layout()</code></td>
                                <td><code>string $layout</code></td>
                                <td>Set layout: 'vertical', 'horizontal', 'inline'</td>
                            </tr>
                            <tr>
                                <td><code>validate()</code></td>
                                <td>-</td>
                                <td>Enable client-side validation</td>
                            </tr>
                            <tr>
                                <td><code>ajax()</code></td>
                                <td>-</td>
                                <td>Enable AJAX submission</td>
                            </tr>
                            <tr>
                                <td><code>multipart()</code></td>
                                <td>-</td>
                                <td>Enable file uploads</td>
                            </tr>
                            <tr>
                                <td><code>onSuccess()</code></td>
                                <td><code>string|callable $handler</code></td>
                                <td>Set success callback</td>
                            </tr>
                            <tr>
                                <td><code>onError()</code></td>
                                <td><code>string|callable $handler</code></td>
                                <td>Set error callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
