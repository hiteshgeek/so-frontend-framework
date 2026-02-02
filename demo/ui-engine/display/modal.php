<?php
/**
 * SixOrbit UI Engine - Modal Element Demo
 */

$pageTitle = 'Modal - UI Engine';
$pageDescription = 'Dialog overlay for focused user interactions';

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
                <li class="so-breadcrumb-item"><a href="../index.php#display">Display Elements</a></li>
                <li class="so-breadcrumb-item so-active">Modal</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">open_in_new</span>
            Modal
        </h1>
        <p class="so-page-subtitle">Dialog overlay for focused user interactions, confirmations, and forms.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Modal -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Modal</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <button type="button" class="so-btn so-btn-primary" data-bs-toggle="modal" data-bs-target="#demo-modal">
                        Open Modal
                    </button>
                    <div class="so-modal fade" id="demo-modal" tabindex="-1">
                        <div class="so-modal-dialog">
                            <div class="so-modal-content">
                                <div class="so-modal-header">
                                    <h5 class="so-modal-title">Modal Title</h5>
                                    <button type="button" class="so-btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="so-modal-body">
                                    <p>This is the modal body content. You can put any content here.</p>
                                </div>
                                <div class="so-modal-footer">
                                    <button type="button" class="so-btn so-btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="so-btn so-btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-modal', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$modal = UiEngine::modal('example-modal')
    ->title('Modal Title')
    ->body('This is the modal body content. You can put any content here.')
    ->footer([
        UiEngine::button('Close')->variant('secondary')->dismiss(),
        UiEngine::button('Save changes')->variant('primary'),
    ]);

// Trigger button
echo UiEngine::button('Open Modal')
    ->variant('primary')
    ->modal('example-modal');

echo \$modal->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const modal = UiEngine.modal('example-modal')
    .title('Modal Title')
    .body('This is the modal body content.')
    .footer([
        UiEngine.button('Close').variant('secondary').dismiss(),
        UiEngine.button('Save changes').variant('primary'),
    ]);

// Open modal programmatically
modal.show();

// Close modal
modal.hide();

// Toggle modal
modal.toggle();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Modal Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Modal Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('modal-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small modal
UiEngine::modal('small-modal')
    ->size('sm')
    ->title('Small Modal')
    ->body('This is a small modal.');

// Default modal
UiEngine::modal('default-modal')
    ->title('Default Modal')
    ->body('This is a default sized modal.');

// Large modal
UiEngine::modal('large-modal')
    ->size('lg')
    ->title('Large Modal')
    ->body('This is a large modal.');

// Extra large modal
UiEngine::modal('xl-modal')
    ->size('xl')
    ->title('Extra Large Modal')
    ->body('This is an extra large modal.');

// Fullscreen modal
UiEngine::modal('fullscreen-modal')
    ->fullscreen()
    ->title('Fullscreen Modal')
    ->body('This modal takes up the entire screen.');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small modal
UiEngine.modal('small-modal')
    .size('sm')
    .title('Small Modal')
    .body('This is a small modal.');

// Large modal
UiEngine.modal('large-modal')
    .size('lg')
    .title('Large Modal')
    .body('This is a large modal.');

// Fullscreen modal
UiEngine.modal('fullscreen-modal')
    .fullscreen()
    .title('Fullscreen Modal')
    .body('This modal takes up the entire screen.');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Modal with Form -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Modal with Form</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('modal-form', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$form = UiEngine::form('/api/users')
    ->add(UiEngine::input('name')->label('Name')->required())
    ->add(UiEngine::email('email')->label('Email')->required());

\$modal = UiEngine::modal('user-modal')
    ->title('Add New User')
    ->body(\$form)
    ->footer([
        UiEngine::button('Cancel')->variant('secondary')->dismiss(),
        UiEngine::button('Create User')
            ->variant('primary')
            ->type('submit')
            ->form('user-form'),
    ]);

echo \$modal->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const form = UiEngine.form('/api/users')
    .id('user-form')
    .add(UiEngine.input('name').label('Name').required())
    .add(UiEngine.email('email').label('Email').required());

const modal = UiEngine.modal('user-modal')
    .title('Add New User')
    .body(form)
    .footer([
        UiEngine.button('Cancel').variant('secondary').dismiss(),
        UiEngine.button('Create User')
            .variant('primary')
            .type('submit')
            .form('user-form'),
    ])
    .onSubmit((data) => {
        console.log('Form submitted:', data);
    });

document.body.innerHTML += modal.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Confirmation Modal -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Confirmation Modal</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('modal-confirm', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$modal = UiEngine::confirmModal('delete-confirm')
    ->title('Confirm Delete')
    ->message('Are you sure you want to delete this item? This action cannot be undone.')
    ->icon('warning', 'danger')
    ->confirmButton('Delete', 'danger')
    ->cancelButton('Cancel');

echo \$modal->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Using the confirm helper
UiEngine.confirm({
    title: 'Confirm Delete',
    message: 'Are you sure you want to delete this item?',
    icon: 'warning',
    confirmText: 'Delete',
    confirmVariant: 'danger',
    onConfirm: () => {
        // Delete action
        deleteItem(itemId);
    },
    onCancel: () => {
        console.log('Cancelled');
    }
});"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Static Backdrop -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Options</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('modal-options', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Static backdrop (won't close on outside click)
UiEngine::modal('static-modal')
    ->staticBackdrop()
    ->title('Static Backdrop')
    ->body('Click outside will not close this modal.');

// Scrollable body
UiEngine::modal('scrollable-modal')
    ->scrollable()
    ->title('Scrollable Modal')
    ->body('Long content here...');

// Vertically centered
UiEngine::modal('centered-modal')
    ->centered()
    ->title('Centered Modal')
    ->body('This modal is vertically centered.');

// No close button
UiEngine::modal('no-close-modal')
    ->hideCloseButton()
    ->title('Important Notice')
    ->body('You must acknowledge this.');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Static backdrop
UiEngine.modal('static-modal')
    .staticBackdrop()
    .title('Static Backdrop')
    .body('Click outside will not close this modal.');

// Scrollable body
UiEngine.modal('scrollable-modal')
    .scrollable()
    .title('Scrollable Modal')
    .body('Long content here...');

// Vertically centered
UiEngine.modal('centered-modal')
    .centered()
    .title('Centered Modal')
    .body('This modal is vertically centered.');"
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
                                <td><code>title()</code></td>
                                <td><code>string $title</code></td>
                                <td>Set modal title</td>
                            </tr>
                            <tr>
                                <td><code>body()</code></td>
                                <td><code>string|Element $content</code></td>
                                <td>Set modal body content</td>
                            </tr>
                            <tr>
                                <td><code>footer()</code></td>
                                <td><code>array $buttons</code></td>
                                <td>Set footer buttons</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: sm, lg, xl</td>
                            </tr>
                            <tr>
                                <td><code>fullscreen()</code></td>
                                <td>-</td>
                                <td>Make modal fullscreen</td>
                            </tr>
                            <tr>
                                <td><code>centered()</code></td>
                                <td>-</td>
                                <td>Vertically center modal</td>
                            </tr>
                            <tr>
                                <td><code>scrollable()</code></td>
                                <td>-</td>
                                <td>Make body scrollable</td>
                            </tr>
                            <tr>
                                <td><code>staticBackdrop()</code></td>
                                <td>-</td>
                                <td>Prevent closing on outside click</td>
                            </tr>
                            <tr>
                                <td><code>show()</code></td>
                                <td>-</td>
                                <td>Open the modal (JS only)</td>
                            </tr>
                            <tr>
                                <td><code>hide()</code></td>
                                <td>-</td>
                                <td>Close the modal (JS only)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
