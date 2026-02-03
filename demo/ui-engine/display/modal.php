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
        <div class="so-page-header-left">
            <h1 class="so-page-title">Modal</h1>
            <p class="so-page-subtitle">Dialog overlay for focused user interactions, confirmations, and forms.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Modal -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Modal</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">A standard modal with header, body, and footer sections.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <button type="button" class="so-btn so-btn-primary" onclick="document.getElementById('basicModal').classList.add('so-show'); createBackdrop();">
                        Open Modal
                    </button>
                </div>

                <!-- Modal -->
                <div class="so-modal" id="basicModal">
                    <div class="so-modal-dialog">
                        <div class="so-modal-header">
                            <h5 class="so-modal-title">Modal Title</h5>
                            <button class="so-modal-close" data-dismiss="modal" onclick="closeModal('basicModal')">
                                <span class="material-icons">close</span>
                            </button>
                        </div>
                        <div class="so-modal-body">
                            <p>This is the modal body content. You can put any content here.</p>
                        </div>
                        <div class="so-modal-footer">
                            <button class="so-btn so-btn-outline" data-dismiss="modal" onclick="closeModal('basicModal')">Cancel</button>
                            <button class="so-btn so-btn-primary">Save Changes</button>
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
    ->body('This is the modal body content.')
    ->closeButton('Cancel')
    ->saveButton('Save Changes');

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
    .closeButton('Cancel')
    .saveButton('Save Changes');

// Show the modal
SOModal.show('example-modal');

// Hide the modal
SOModal.hide('example-modal');"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-modal" id="myModal">
    <div class="so-modal-dialog">
        <div class="so-modal-header">
            <h5 class="so-modal-title">Modal Title</h5>
            <button class="so-modal-close" data-dismiss="modal">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="so-modal-body">
            Modal content goes here...
        </div>
        <div class="so-modal-footer">
            <button class="so-btn so-btn-outline" data-dismiss="modal">Cancel</button>
            <button class="so-btn so-btn-primary">Save Changes</button>
        </div>
    </div>
</div>'
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
                <p class="so-text-muted so-mb-4">Modals come in different sizes: small (380px), default (500px), large (720px), extra-large (960px), and fullscreen.</p>

                <!-- Live Demo -->
                <div class="so-btn-group so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('sm')">Small (380px)</button>
                    <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('default')">Default (500px)</button>
                    <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('lg')">Large (720px)</button>
                    <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('xl')">Extra Large (960px)</button>
                    <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('fullscreen')">Fullscreen</button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('modal-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small modal
UiEngine::modal('small-modal')
    ->small()  // or ->size('sm')
    ->title('Small Modal')
    ->body('This is a small modal.');

// Large modal
UiEngine::modal('large-modal')
    ->large()  // or ->size('lg')
    ->title('Large Modal')
    ->body('This is a large modal.');

// Extra large modal
UiEngine::modal('xl-modal')
    ->extraLarge()  // or ->size('xl')
    ->title('Extra Large Modal');

// Fullscreen modal
UiEngine::modal('fullscreen-modal')
    ->fullscreen()
    ->title('Fullscreen Modal');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small modal
UiEngine.modal('small-modal')
    .small()
    .title('Small Modal')
    .body('This is a small modal.');

// Large modal
UiEngine.modal('large-modal')
    .large()
    .title('Large Modal')
    .body('This is a large modal.');

// Fullscreen modal
UiEngine.modal('fullscreen-modal')
    .fullscreen()
    .title('Fullscreen Modal');"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Small Modal -->
<div class="so-modal so-modal-sm">...</div>

<!-- Default Modal -->
<div class="so-modal">...</div>

<!-- Large Modal -->
<div class="so-modal so-modal-lg">...</div>

<!-- Extra Large Modal -->
<div class="so-modal so-modal-xl">...</div>

<!-- Fullscreen Modal -->
<div class="so-modal so-modal-fullscreen">...</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Scrollable Modal -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Scrollable Modal</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">When content is longer than the viewport, the modal body becomes scrollable.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <button type="button" class="so-btn so-btn-primary" onclick="showScrollableModal()">Show Scrollable Modal</button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('modal-scrollable', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::modal('scrollable-modal')
    ->scrollable()
    ->title('Scrollable Modal')
    ->body('Long content here that will scroll...');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.modal('scrollable-modal')
    .scrollable()
    .title('Scrollable Modal')
    .body('Long content here...')
    .toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-modal so-modal-scrollable">
    <div class="so-modal-dialog">
        <div class="so-modal-header">...</div>
        <div class="so-modal-body">
            <!-- Long scrollable content -->
        </div>
        <div class="so-modal-footer">...</div>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Modal Options -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Modal Options</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Configure modal behavior with various options.</p>

                <!-- Live Demo -->
                <div class="so-btn-group so-flex-wrap so-mb-4">
                    <button type="button" class="so-btn so-btn-outline" onclick="showStaticModal()">Static Backdrop</button>
                    <button type="button" class="so-btn so-btn-outline" onclick="showCenteredModal()">Centered Modal</button>
                </div>

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

// Vertically centered
UiEngine::modal('centered-modal')
    ->centered()
    ->title('Centered Modal')
    ->body('This modal is vertically centered.');

// No close button
UiEngine::modal('no-close-modal')
    ->hideClose()
    ->title('Important Notice')
    ->body('You must acknowledge this.')
    ->addButton('I Understand', 'primary', true);

// Disable keyboard close (Escape key)
UiEngine::modal('no-keyboard-modal')
    ->noKeyboard()
    ->title('No Escape')
    ->body('Escape key will not close this modal.');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Static backdrop
UiEngine.modal('static-modal')
    .staticBackdrop()
    .title('Static Backdrop')
    .body('Click outside will not close.');

// Vertically centered
UiEngine.modal('centered-modal')
    .centered()
    .title('Centered Modal')
    .body('This modal is vertically centered.');

// Programmatic control
SOModal.show('my-modal');
SOModal.hide('my-modal');
SOModal.toggle('my-modal');"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Static backdrop -->
<div class="so-modal" data-so-backdrop="static">
    <div class="so-modal-dialog">...</div>
</div>

<!-- Centered dialog -->
<div class="so-modal">
    <div class="so-modal-dialog so-modal-dialog-centered">...</div>
</div>

<!-- Keyboard disabled -->
<div class="so-modal" data-so-keyboard="false">
    <div class="so-modal-dialog">...</div>
</div>'
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
                <p class="so-text-muted so-mb-4">Use <code>SOModal.confirm()</code> for confirmation dialogs that return a Promise.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <button type="button" class="so-btn so-btn-danger" onclick="showConfirmModal()">Delete Item</button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('modal-confirm', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Create a confirm modal
\$modal = UiEngine::modal('delete-confirm')
    ->title('Confirm Delete')
    ->body('Are you sure you want to delete this item? This action cannot be undone.')
    ->addButton('Cancel', 'outline', true)
    ->addButton('Delete', 'danger', false, ['onclick' => 'deleteItem()']);

echo \$modal->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Using the confirm helper (returns Promise)
const confirmed = await SOModal.confirm({
    title: 'Confirm Action',
    message: 'Are you sure you want to proceed?',
    confirmText: 'Yes, Continue',
    cancelText: 'Cancel'
});

if (confirmed) {
    console.log('User confirmed');
} else {
    console.log('User cancelled');
}

// Danger confirmation
const deleted = await SOModal.confirm({
    title: 'Delete Item',
    message: 'This action cannot be undone.',
    confirmText: 'Delete',
    cancelText: 'Cancel',
    danger: true  // Red confirm button
});"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-modal so-modal-sm" id="confirm-modal">
    <div class="so-modal-dialog so-modal-dialog-centered">
        <div class="so-modal-header">
            <h5 class="so-modal-title">Confirm Delete</h5>
            <button class="so-modal-close" data-dismiss="modal">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="so-modal-body">
            Are you sure you want to delete this item?
        </div>
        <div class="so-modal-footer">
            <button class="so-btn so-btn-outline" data-dismiss="modal">Cancel</button>
            <button class="so-btn so-btn-danger">Delete</button>
        </div>
    </div>
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
                                <td><code>addButton()</code></td>
                                <td><code>string $text, string $variant, bool $dismiss, array $attrs</code></td>
                                <td>Add a footer button</td>
                            </tr>
                            <tr>
                                <td><code>closeButton()</code></td>
                                <td><code>string $text = 'Close'</code></td>
                                <td>Add close/cancel button</td>
                            </tr>
                            <tr>
                                <td><code>saveButton()</code></td>
                                <td><code>string $text = 'Save', string $variant = 'primary'</code></td>
                                <td>Add save/submit button</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: sm, md, lg, xl</td>
                            </tr>
                            <tr>
                                <td><code>small()</code></td>
                                <td>-</td>
                                <td>Small size (380px)</td>
                            </tr>
                            <tr>
                                <td><code>large()</code></td>
                                <td>-</td>
                                <td>Large size (720px)</td>
                            </tr>
                            <tr>
                                <td><code>extraLarge()</code></td>
                                <td>-</td>
                                <td>Extra large size (960px)</td>
                            </tr>
                            <tr>
                                <td><code>fullscreen()</code></td>
                                <td>-</td>
                                <td>Fullscreen modal</td>
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
                                <td><code>hideClose()</code></td>
                                <td>-</td>
                                <td>Hide the X close button</td>
                            </tr>
                            <tr>
                                <td><code>noKeyboard()</code></td>
                                <td>-</td>
                                <td>Disable Escape key closing</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="so-mt-4 so-mb-3">CSS Classes Reference</h5>
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead class="so-table-light">
                            <tr>
                                <th>Class</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>.so-modal</code></td>
                                <td>Base modal container</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-dialog</code></td>
                                <td>Modal dialog wrapper</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-header</code></td>
                                <td>Modal header section</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-title</code></td>
                                <td>Modal title text</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-close</code></td>
                                <td>Close button in header</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-body</code></td>
                                <td>Modal body section</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-footer</code></td>
                                <td>Modal footer section</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-sm/lg/xl</code></td>
                                <td>Size variants</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-fullscreen</code></td>
                                <td>Fullscreen modal</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-scrollable</code></td>
                                <td>Scrollable body content</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-dialog-centered</code></td>
                                <td>Vertically centered dialog</td>
                            </tr>
                            <tr>
                                <td><code>.so-show</code></td>
                                <td>Show/visible state</td>
                            </tr>
                            <tr>
                                <td><code>.so-modal-backdrop</code></td>
                                <td>Background overlay</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
// Track dynamically created modals
const dynamicModals = new Set();

function createBackdrop(isStatic = false) {
    if (!document.querySelector('.so-modal-backdrop')) {
        const backdrop = document.createElement('div');
        backdrop.className = 'so-modal-backdrop so-show';
        backdrop.onclick = function() {
            if (isStatic) {
                // Shake effect for static backdrop
                const modal = document.querySelector('.so-modal.so-show');
                if (modal) {
                    modal.classList.add('so-modal-shake');
                    setTimeout(() => modal.classList.remove('so-modal-shake'), 300);
                }
                return;
            }
            closeAllModals();
        };
        document.body.appendChild(backdrop);
    }
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.remove('so-show');
        // Remove dynamically created modals from DOM
        if (dynamicModals.has(id)) {
            setTimeout(() => {
                modal.remove();
                dynamicModals.delete(id);
            }, 150);
        }
    }
    // Remove backdrop if no modals are open
    setTimeout(() => {
        if (!document.querySelector('.so-modal.so-show')) {
            const backdrop = document.querySelector('.so-modal-backdrop');
            if (backdrop) backdrop.remove();
        }
    }, 50);
}

function closeAllModals() {
    document.querySelectorAll('.so-modal.so-show').forEach(modal => {
        // Check if it's a static backdrop modal
        if (modal.dataset.soBackdrop === 'static') return;

        modal.classList.remove('so-show');
        // Remove dynamically created modals from DOM
        if (dynamicModals.has(modal.id)) {
            setTimeout(() => {
                modal.remove();
                dynamicModals.delete(modal.id);
            }, 150);
        }
    });
    const backdrop = document.querySelector('.so-modal-backdrop');
    if (backdrop) backdrop.remove();
}

// Handle Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const openModal = document.querySelector('.so-modal.so-show');
        if (openModal) {
            // Check if it's a static backdrop or no-keyboard modal
            if (openModal.dataset.soBackdrop === 'static' || openModal.dataset.soKeyboard === 'false') {
                // Shake effect
                openModal.classList.add('so-modal-shake');
                setTimeout(() => openModal.classList.remove('so-modal-shake'), 300);
                return;
            }
            closeModal(openModal.id);
        }
    }
});

function showSizeModal(size) {
    const sizeClass = size === 'default' ? '' : 'so-modal-' + size;
    const modalId = 'size-modal-' + size + '-' + Date.now();
    const modal = document.createElement('div');
    modal.className = 'so-modal so-show ' + sizeClass;
    modal.id = modalId;
    modal.innerHTML = `
        <div class="so-modal-dialog">
            <div class="so-modal-header">
                <h5 class="so-modal-title">${size.charAt(0).toUpperCase() + size.slice(1)} Modal</h5>
                <button class="so-modal-close" onclick="closeModal('${modalId}')">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="so-modal-body">
                <p>This is a ${size} modal dialog.</p>
            </div>
            <div class="so-modal-footer">
                <button class="so-btn so-btn-outline" onclick="closeModal('${modalId}')">Close</button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    dynamicModals.add(modalId);
    createBackdrop();
}

function showScrollableModal() {
    const modalId = 'scrollable-modal-' + Date.now();
    const modal = document.createElement('div');
    modal.className = 'so-modal so-modal-scrollable so-show';
    modal.id = modalId;
    modal.innerHTML = `
        <div class="so-modal-dialog">
            <div class="so-modal-header">
                <h5 class="so-modal-title">Scrollable Modal</h5>
                <button class="so-modal-close" onclick="closeModal('${modalId}')">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="so-modal-body">
                <p>This modal has a scrollable body. When the content is too long to fit in the viewport, the body section becomes scrollable while the header and footer remain fixed.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
            </div>
            <div class="so-modal-footer">
                <button class="so-btn so-btn-outline" onclick="closeModal('${modalId}')">Close</button>
                <button class="so-btn so-btn-primary">Save Changes</button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    dynamicModals.add(modalId);
    createBackdrop();
}

function showStaticModal() {
    const modalId = 'static-modal-' + Date.now();
    const modal = document.createElement('div');
    modal.className = 'so-modal so-show';
    modal.id = modalId;
    modal.dataset.soBackdrop = 'static';
    modal.innerHTML = `
        <div class="so-modal-dialog">
            <div class="so-modal-header">
                <h5 class="so-modal-title">Static Backdrop</h5>
                <button class="so-modal-close" onclick="closeModal('${modalId}')">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="so-modal-body">
                <p>Click outside this modal and it will <strong>not</strong> close. You must use the close button or cancel button to dismiss it.</p>
            </div>
            <div class="so-modal-footer">
                <button class="so-btn so-btn-outline" onclick="closeModal('${modalId}')">Close</button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    dynamicModals.add(modalId);
    createBackdrop(true); // true = static backdrop
}

function showCenteredModal() {
    const modalId = 'centered-modal-' + Date.now();
    const modal = document.createElement('div');
    modal.className = 'so-modal so-show';
    modal.id = modalId;
    modal.innerHTML = `
        <div class="so-modal-dialog so-modal-dialog-centered">
            <div class="so-modal-header">
                <h5 class="so-modal-title">Centered Modal</h5>
                <button class="so-modal-close" onclick="closeModal('${modalId}')">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="so-modal-body">
                <p>This modal is vertically centered in the viewport using the <code>.so-modal-dialog-centered</code> class.</p>
            </div>
            <div class="so-modal-footer">
                <button class="so-btn so-btn-outline" onclick="closeModal('${modalId}')">Close</button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    dynamicModals.add(modalId);
    createBackdrop();
}

let currentConfirmModalId = null;

function showConfirmModal() {
    const modalId = 'confirm-modal-' + Date.now();
    currentConfirmModalId = modalId;
    const modal = document.createElement('div');
    modal.className = 'so-modal so-modal-sm so-show';
    modal.id = modalId;
    modal.innerHTML = `
        <div class="so-modal-dialog so-modal-dialog-centered">
            <div class="so-modal-header">
                <h5 class="so-modal-title">Confirm Delete</h5>
                <button class="so-modal-close" onclick="closeModal('${modalId}')">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="so-modal-body">
                <p>Are you sure you want to delete this item? This action cannot be undone.</p>
            </div>
            <div class="so-modal-footer">
                <button class="so-btn so-btn-outline" onclick="closeModal('${modalId}')">Cancel</button>
                <button class="so-btn so-btn-danger" onclick="handleDelete()">Delete</button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    dynamicModals.add(modalId);
    createBackdrop();
}

function handleDelete() {
    if (currentConfirmModalId) {
        closeModal(currentConfirmModalId);
        currentConfirmModalId = null;
    }
    // Show success toast or notification
    alert('Item deleted successfully!');
}
</script>

<?php require_once '../../includes/footer.php'; ?>
