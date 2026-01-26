<!-- Modals Pane -->
<div class="so-tab-pane fade" id="pane-modals" role="tabpanel">

    <!-- Basic Modal -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Basic Modal</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">A standard modal with header, body, and footer sections.</p>

            <button type="button" class="so-btn so-btn-primary" onclick="document.getElementById('basicModal').classList.add('show'); document.querySelector('.so-modal-backdrop')?.classList.add('show') || createBackdrop();">
                Launch Basic Modal
            </button>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-modal" id="myModal"&gt;
    &lt;div class="so-modal-dialog"&gt;
        &lt;div class="so-modal-header"&gt;
            &lt;h5 class="so-modal-title"&gt;Modal Title&lt;/h5&gt;
            &lt;button class="so-modal-close" data-dismiss="modal"&gt;
                &lt;span class="material-icons"&gt;close&lt;/span&gt;
            &lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="so-modal-body"&gt;
            Modal content goes here...
        &lt;/div&gt;
        &lt;div class="so-modal-footer"&gt;
            &lt;button class="so-btn so-btn-outline" data-dismiss="modal"&gt;Cancel&lt;/button&gt;
            &lt;button class="so-btn so-btn-primary"&gt;Save Changes&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Modal Sizes -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Modal Sizes</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Modals come in different sizes: small (380px), default (500px), large (720px), extra-large (960px), and fullscreen.</p>

            <div class="so-btn-group so-flex-wrap">
                <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('sm')">Small (380px)</button>
                <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('default')">Default (500px)</button>
                <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('lg')">Large (720px)</button>
                <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('xl')">Extra Large (960px)</button>
                <button type="button" class="so-btn so-btn-outline" onclick="showSizeModal('fullscreen')">Fullscreen</button>
            </div>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Small Modal --&gt;
&lt;div class="so-modal so-modal-sm"&gt;...&lt;/div&gt;

&lt;!-- Default Modal --&gt;
&lt;div class="so-modal"&gt;...&lt;/div&gt;

&lt;!-- Large Modal --&gt;
&lt;div class="so-modal so-modal-lg"&gt;...&lt;/div&gt;

&lt;!-- Extra Large Modal --&gt;
&lt;div class="so-modal so-modal-xl"&gt;...&lt;/div&gt;

&lt;!-- Fullscreen Modal --&gt;
&lt;div class="so-modal so-modal-fullscreen"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Scrollable Modal -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Scrollable Modal</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">When content is longer than the viewport, the modal body becomes scrollable.</p>

            <button type="button" class="so-btn so-btn-primary" onclick="showScrollableModal()">
                Show Scrollable Modal
            </button>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-modal so-modal-scrollable"&gt;
    &lt;div class="so-modal-dialog"&gt;
        &lt;div class="so-modal-header"&gt;...&lt;/div&gt;
        &lt;div class="so-modal-body"&gt;
            &lt;!-- Long scrollable content --&gt;
        &lt;/div&gt;
        &lt;div class="so-modal-footer"&gt;...&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Confirmation Dialogs -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Confirmation Dialogs</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Use <code>SOModal.confirm()</code> for confirmation dialogs that return a Promise.</p>

            <h5 class="so-mb-3">Simple Confirm/Cancel</h5>
            <div class="so-btn-group so-flex-wrap so-mb-4">
                <button type="button" class="so-btn so-btn-primary" onclick="showConfirmDialog()">
                    Standard Confirm
                </button>
                <button type="button" class="so-btn so-btn-danger" onclick="showDeleteConfirm()">
                    Delete Confirm
                </button>
            </div>

            <h5 class="so-mb-3">Multiple Actions</h5>
            <div class="so-btn-group so-flex-wrap">
                <button type="button" class="so-btn so-btn-secondary" onclick="showMultiActionDialog()">
                    Save Changes Dialog
                </button>
                <button type="button" class="so-btn so-btn-info" onclick="showFileActionDialog()">
                    File Conflict Dialog
                </button>
            </div>

            <div id="confirm-result" class="so-mt-3"></div>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-javascript">// Basic confirmation (returns true/false)
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
});

// Multiple actions (returns action id or 'dismiss')
const action = await SOModal.confirm({
    title: 'Unsaved Changes',
    message: 'You have unsaved changes. What would you like to do?',
    actions: [
        { id: 'discard', text: 'Discard', class: 'so-btn-outline' },
        { id: 'save-draft', text: 'Save Draft', class: 'so-btn-secondary' },
        { id: 'save', text: 'Save & Close', class: 'so-btn-primary', primary: true }
    ]
});

switch (action) {
    case 'save':
        console.log('User chose to save');
        break;
    case 'save-draft':
        console.log('User chose to save as draft');
        break;
    case 'discard':
        console.log('User chose to discard');
        break;
    case 'dismiss':
        console.log('User dismissed the dialog');
        break;
}</code></pre>
            </div>
        </div>
    </div>

    <!-- Alert Modals -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Alert Modals</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Use <code>SOModal.alert()</code> for simple alert dialogs with different types.</p>

            <div class="so-btn-group so-flex-wrap">
                <button type="button" class="so-btn so-btn-info" onclick="SOModal.alert({ title: 'Information', message: 'This is an informational alert.', type: 'info' })">
                    Info Alert
                </button>
                <button type="button" class="so-btn so-btn-success" onclick="SOModal.alert({ title: 'Success!', message: 'Your operation completed successfully.', type: 'success' })">
                    Success Alert
                </button>
                <button type="button" class="so-btn so-btn-warning" onclick="SOModal.alert({ title: 'Warning', message: 'Please review the following issues.', type: 'warning' })">
                    Warning Alert
                </button>
                <button type="button" class="so-btn so-btn-danger" onclick="SOModal.alert({ title: 'Error', message: 'Something went wrong. Please try again.', type: 'danger' })">
                    Error Alert
                </button>
            </div>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-javascript">// Alert returns a Promise that resolves when closed
await SOModal.alert({
    title: 'Success!',
    message: 'Your file has been uploaded.',
    type: 'success', // info, success, warning, danger
    buttonText: 'OK'
});

console.log('Alert was closed');</code></pre>
            </div>
        </div>
    </div>

    <!-- Contextual Modal Headers -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Contextual Modal Headers</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Modals can have colored headers using contextual classes. Available in solid and light variants for all 8 colors.</p>

            <h5 class="so-mb-3">Solid Headers</h5>
            <div class="so-btn-group so-flex-wrap so-mb-4">
                <button type="button" class="so-btn so-btn-primary" onclick="showContextualModal('primary')">Primary</button>
                <button type="button" class="so-btn so-btn-secondary" onclick="showContextualModal('secondary')">Secondary</button>
                <button type="button" class="so-btn so-btn-success" onclick="showContextualModal('success')">Success</button>
                <button type="button" class="so-btn so-btn-danger" onclick="showContextualModal('danger')">Danger</button>
                <button type="button" class="so-btn so-btn-warning" onclick="showContextualModal('warning')">Warning</button>
                <button type="button" class="so-btn so-btn-info" onclick="showContextualModal('info')">Info</button>
                <button type="button" class="so-btn so-btn-light" onclick="showContextualModal('light')">Light</button>
                <button type="button" class="so-btn so-btn-dark" onclick="showContextualModal('dark')">Dark</button>
            </div>

            <h5 class="so-mb-3">Light Headers</h5>
            <div class="so-btn-group so-flex-wrap">
                <button type="button" class="so-btn so-btn-outline so-btn-primary" onclick="showContextualModal('primary-light')">Primary Light</button>
                <button type="button" class="so-btn so-btn-outline so-btn-secondary" onclick="showContextualModal('secondary-light')">Secondary Light</button>
                <button type="button" class="so-btn so-btn-outline so-btn-success" onclick="showContextualModal('success-light')">Success Light</button>
                <button type="button" class="so-btn so-btn-outline so-btn-danger" onclick="showContextualModal('danger-light')">Danger Light</button>
                <button type="button" class="so-btn so-btn-outline so-btn-warning" onclick="showContextualModal('warning-light')">Warning Light</button>
                <button type="button" class="so-btn so-btn-outline so-btn-info" onclick="showContextualModal('info-light')">Info Light</button>
                <button type="button" class="so-btn so-btn-outline" onclick="showContextualModal('dark-light')">Dark Light</button>
            </div>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Solid colored headers --&gt;
&lt;div class="so-modal so-modal-primary"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-secondary"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-success"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-danger"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-warning"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-info"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-light"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-dark"&gt;...&lt;/div&gt;

&lt;!-- Light colored headers --&gt;
&lt;div class="so-modal so-modal-primary-light"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-secondary-light"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-success-light"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-danger-light"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-warning-light"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-info-light"&gt;...&lt;/div&gt;
&lt;div class="so-modal so-modal-dark-light"&gt;...&lt;/div&gt;</code></pre>
            </div>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-javascript">// Create modal with contextual header using className option
const modal = SOModal.create({
    title: 'Success',
    content: '&lt;p&gt;Your changes have been saved.&lt;/p&gt;',
    className: 'so-modal-success', // or 'so-modal-success-light'
    footer: '&lt;button class="so-btn so-btn-primary" data-dismiss="modal"&gt;OK&lt;/button&gt;'
});
modal.show();</code></pre>
            </div>
        </div>
    </div>

    <!-- Programmatic Modal -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Programmatic Modal</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Create modals dynamically using <code>SOModal.create()</code>.</p>

            <button type="button" class="so-btn so-btn-primary" onclick="showProgrammaticModal()">
                Create Modal Programmatically
            </button>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-javascript">const modal = SOModal.create({
    title: 'Dynamic Modal',
    content: '&lt;p&gt;This modal was created with JavaScript.&lt;/p&gt;',
    size: 'default', // sm, default, lg, xl, fullscreen
    closable: true,
    footer: `
        &lt;button class="so-btn so-btn-outline" data-dismiss="modal"&gt;Close&lt;/button&gt;
        &lt;button class="so-btn so-btn-primary"&gt;Save&lt;/button&gt;
    `
});

modal.show();</code></pre>
            </div>
        </div>
    </div>

    <!-- Form in Modal -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Form in Modal</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Modals work great for forms like login, signup, or data entry.</p>

            <button type="button" class="so-btn so-btn-primary" onclick="showFormModal()">
                Show Login Form
            </button>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-modal so-modal-sm"&gt;
    &lt;div class="so-modal-dialog"&gt;
        &lt;div class="so-modal-header"&gt;
            &lt;h5 class="so-modal-title"&gt;Login&lt;/h5&gt;
            &lt;button class="so-modal-close" data-dismiss="modal"&gt;...&lt;/button&gt;
        &lt;/div&gt;
        &lt;div class="so-modal-body"&gt;
            &lt;form&gt;
                &lt;div class="so-form-group"&gt;
                    &lt;label class="so-form-label"&gt;Email&lt;/label&gt;
                    &lt;input type="email" class="so-form-control"&gt;
                &lt;/div&gt;
                &lt;div class="so-form-group"&gt;
                    &lt;label class="so-form-label"&gt;Password&lt;/label&gt;
                    &lt;input type="password" class="so-form-control"&gt;
                &lt;/div&gt;
            &lt;/form&gt;
        &lt;/div&gt;
        &lt;div class="so-modal-footer"&gt;
            &lt;button class="so-btn so-btn-primary so-w-100"&gt;Sign In&lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Drawers / Side Panels -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Drawers / Side Panels</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Drawers slide in from the side and are great for detailed views or filters.</p>

            <div class="so-btn-group so-flex-wrap so-mb-3">
                <button type="button" class="so-btn so-btn-outline" onclick="showDrawer('right')">
                    Right Drawer
                </button>
                <button type="button" class="so-btn so-btn-outline" onclick="showDrawer('left')">
                    Left Drawer
                </button>
            </div>

            <h5 class="so-mb-2">Drawer Sizes</h5>
            <div class="so-btn-group so-flex-wrap">
                <button type="button" class="so-btn so-btn-outline" onclick="showDrawer('right', 'sm')">Small (320px)</button>
                <button type="button" class="so-btn so-btn-outline" onclick="showDrawer('right', 'default')">Default (400px)</button>
                <button type="button" class="so-btn so-btn-outline" onclick="showDrawer('right', 'lg')">Large (560px)</button>
                <button type="button" class="so-btn so-btn-outline" onclick="showDrawer('right', 'xl')">Extra Large (720px)</button>
            </div>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Right Drawer (default) --&gt;
&lt;div class="so-drawer"&gt;
    &lt;div class="so-drawer-header"&gt;
        &lt;h5 class="so-drawer-title"&gt;Drawer Title&lt;/h5&gt;
        &lt;button class="so-drawer-close"&gt;...&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class="so-drawer-body"&gt;Content...&lt;/div&gt;
    &lt;div class="so-drawer-footer"&gt;Actions...&lt;/div&gt;
&lt;/div&gt;

&lt;!-- Left Drawer --&gt;
&lt;div class="so-drawer so-drawer-left"&gt;...&lt;/div&gt;

&lt;!-- Drawer Sizes --&gt;
&lt;div class="so-drawer so-drawer-sm"&gt;...&lt;/div&gt;
&lt;div class="so-drawer so-drawer-lg"&gt;...&lt;/div&gt;
&lt;div class="so-drawer so-drawer-xl"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>

    <!-- Static Modal (Non-Dismissable) -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">Static Modal (Non-Dismissable)</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">A static modal cannot be dismissed by clicking the backdrop, pressing Escape, or clicking a close button. The user must interact with footer actions to close it. Use this for mandatory actions like accepting terms, completing required steps, or critical confirmations.</p>

            <div class="so-btn-group so-flex-wrap so-mb-4">
                <button type="button" class="so-btn so-btn-primary" onclick="showStaticModal()">
                    Static Modal
                </button>
                <button type="button" class="so-btn so-btn-warning" onclick="showStaticModalWithLock()">
                    Static Modal with Lock Icon
                </button>
                <button type="button" class="so-btn so-btn-danger" onclick="showStaticConfirmModal()">
                    Mandatory Confirmation
                </button>
            </div>

            <div class="so-alert so-alert-info so-alert-sm so-mb-4">
                <span class="material-icons">info</span>
                <div>Try clicking outside the modal or pressing Escape - it won't close! A subtle shake animation indicates the modal requires action.</div>
            </div>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Static Modal - cannot be dismissed except via footer actions --&gt;
&lt;div class="so-modal so-modal-static" data-so-static="true"&gt;
    &lt;div class="so-modal-dialog"&gt;
        &lt;div class="so-modal-header"&gt;
            &lt;h5 class="so-modal-title"&gt;Required Action&lt;/h5&gt;
            &lt;!-- No close button shown --&gt;
        &lt;/div&gt;
        &lt;div class="so-modal-body"&gt;
            &lt;p&gt;You must complete this action to continue.&lt;/p&gt;
        &lt;/div&gt;
        &lt;div class="so-modal-footer"&gt;
            &lt;button class="so-btn so-btn-primary" data-dismiss="modal"&gt;
                Accept &amp; Continue
            &lt;/button&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- With lock icon indicator --&gt;
&lt;div class="so-modal so-modal-static so-modal-show-lock" data-so-static="true"&gt;
    ...
&lt;/div&gt;</code></pre>
            </div>

            <div class="so-code-block so-mt-4">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-javascript">// Create static modal programmatically
const modal = SOModal.create({
    title: 'Terms of Service',
    content: '&lt;p&gt;Please accept our terms to continue.&lt;/p&gt;',
    static: true,  // Prevents backdrop/ESC close, hides close button
    footer: `
        &lt;button class="so-btn so-btn-outline" onclick="handleDecline(this)"&gt;Decline&lt;/button&gt;
        &lt;button class="so-btn so-btn-primary" onclick="handleAccept(this)"&gt;Accept&lt;/button&gt;
    `
});
modal.show();

// Handler functions - close modal after action
function handleAccept(btn) {
    // Perform your action here (e.g., save to server, update state)
    console.log('User accepted');

    // Close the modal
    const modal = btn.closest('.so-modal');
    SOModal.getInstance(modal)?.hide();
}

function handleDecline(btn) {
    // Perform your action here
    console.log('User declined');

    // Close the modal
    const modal = btn.closest('.so-modal');
    SOModal.getInstance(modal)?.hide();
}

// Static confirmation using SOModal.confirm()
const result = await SOModal.confirm({
    title: 'Delete Account',
    message: 'This action is permanent and cannot be undone.',
    static: true,  // Cannot dismiss without clicking a button
    confirmText: 'Delete Account',
    cancelText: 'Keep Account',
    danger: true
});

if (result) {
    console.log('User confirmed deletion');
} else {
    console.log('User cancelled');
}</code></pre>
            </div>
        </div>
    </div>

    <!-- JavaScript API -->
    <div class="so-card so-mb-4">
        <div class="so-card-header">
            <h3 class="so-card-title">JavaScript API</h3>
        </div>
        <div class="so-card-body">
            <p class="so-text-secondary so-mb-4">Full API reference for the modal component.</p>

            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <pre class="so-code-content"><code class="language-javascript">// Get modal instance
const modal = SOModal.getInstance('#myModal');

// Instance Methods
modal.show();           // Show the modal
modal.hide();           // Hide the modal
modal.toggle();         // Toggle visibility
modal.isOpen();         // Check if open
modal.setTitle('New'); // Set modal title
modal.setContent(html); // Set body content

// Static Methods
SOModal.create(options);      // Create modal dynamically
SOModal.confirm(options);     // Confirmation dialog (returns Promise)
SOModal.alert(options);       // Alert dialog (returns Promise)

// Options
{
    backdrop: true,      // Show backdrop
    keyboard: true,      // Close on Escape
    focus: true,         // Focus trap
    closable: true,      // Allow closing
    size: 'default',     // sm, default, lg, xl, fullscreen
    animation: true      // Animate open/close
}

// Events
modal.element.addEventListener('so:modal:show', (e) => {
    // Before modal shows (can call e.preventDefault())
});

modal.element.addEventListener('so:modal:shown', () => {
    // After modal is visible
});

modal.element.addEventListener('so:modal:hide', (e) => {
    // Before modal hides (can call e.preventDefault())
});

modal.element.addEventListener('so:modal:hidden', () => {
    // After modal is hidden
});

modal.element.addEventListener('so:modal:confirm', () => {
    // Confirm button clicked
});

modal.element.addEventListener('so:modal:cancel', () => {
    // Cancel button clicked
});</code></pre>
            </div>
        </div>
    </div>

</div>

<!-- Basic Modal (for demo) -->
<div class="so-modal fade" id="basicModal" tabindex="-1">
    <div class="so-modal-dialog">
        <div class="so-modal-header">
            <h5 class="so-modal-title">Basic Modal</h5>
            <button type="button" class="so-modal-close" onclick="closeModal('basicModal')">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="so-modal-body">
            <p>This is a basic modal dialog. You can put any content here including forms, text, images, and more.</p>
            <p>The modal can be closed by clicking the X button, pressing Escape, or clicking outside the modal.</p>
        </div>
        <div class="so-modal-footer">
            <button type="button" class="so-btn so-btn-outline" onclick="closeModal('basicModal')">Cancel</button>
            <button type="button" class="so-btn so-btn-primary" onclick="closeModal('basicModal')">Save Changes</button>
        </div>
    </div>
</div>

<!-- Modal Backdrop -->
<div class="so-modal-backdrop fade" onclick="closeAllModals()"></div>

<script>
function createBackdrop() {
    let backdrop = document.querySelector('.so-modal-backdrop');
    if (!backdrop) {
        backdrop = document.createElement('div');
        backdrop.className = 'so-modal-backdrop fade';
        backdrop.onclick = closeAllModals;
        document.body.appendChild(backdrop);
    }
    setTimeout(() => backdrop.classList.add('show'), 10);
    document.body.style.overflow = 'hidden';
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.classList.remove('show');
    }
    const backdrop = document.querySelector('.so-modal-backdrop');
    if (backdrop) {
        backdrop.classList.remove('show');
    }
    document.body.style.overflow = '';
}

function closeAllModals() {
    document.querySelectorAll('.so-modal.show').forEach(modal => {
        modal.classList.remove('show');
    });
    // Also close any open drawers
    document.querySelectorAll('.so-drawer.show').forEach(drawer => {
        drawer.classList.remove('show');
        setTimeout(() => drawer.remove(), 300);
    });
    const backdrop = document.querySelector('.so-modal-backdrop');
    if (backdrop) {
        backdrop.classList.remove('show');
    }
    document.body.style.overflow = '';
}

function showSizeModal(size) {
    const sizeClass = size === 'default' ? '' : `so-modal-${size}`;
    const modal = SOModal.create({
        title: `${size.charAt(0).toUpperCase() + size.slice(1)} Modal`,
        content: `<p>This is a ${size} modal. The max-width is set based on the size class.</p>`,
        size: size,
        footer: '<button class="so-btn so-btn-primary" data-dismiss="modal">Close</button>'
    });
    modal.show();
}

function showScrollableModal() {
    const longContent = Array(20).fill('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>').join('');

    const modal = SOModal.create({
        title: 'Scrollable Modal',
        content: longContent,
        className: 'so-modal-scrollable',
        footer: '<button class="so-btn so-btn-primary" data-dismiss="modal">Close</button>'
    });
    modal.show();
}

function showContextualModal(variant) {
    const titles = {
        'primary': 'Primary Modal',
        'primary-light': 'Primary Light Modal',
        'secondary': 'Secondary Modal',
        'secondary-light': 'Secondary Light Modal',
        'success': 'Success Modal',
        'success-light': 'Success Light Modal',
        'danger': 'Danger Modal',
        'danger-light': 'Danger Light Modal',
        'warning': 'Warning Modal',
        'warning-light': 'Warning Light Modal',
        'info': 'Info Modal',
        'info-light': 'Info Light Modal',
        'light': 'Light Modal',
        'dark': 'Dark Modal',
        'dark-light': 'Dark Light Modal'
    };

    const messages = {
        'primary': 'This modal has a primary colored header.',
        'primary-light': 'This modal has a light primary colored header.',
        'secondary': 'This modal has a secondary colored header.',
        'secondary-light': 'This modal has a light secondary colored header.',
        'success': 'Great! Your operation was successful.',
        'success-light': 'This modal has a light success colored header.',
        'danger': 'Warning! This action may have serious consequences.',
        'danger-light': 'This modal has a light danger colored header.',
        'warning': 'Please review the following information carefully.',
        'warning-light': 'This modal has a light warning colored header.',
        'info': 'Here is some important information for you.',
        'info-light': 'This modal has a light info colored header.',
        'light': 'This modal has a light colored header.',
        'dark': 'This modal has a dark colored header.',
        'dark-light': 'This modal has a light dark (gray) colored header.'
    };

    const modal = SOModal.create({
        title: titles[variant] || 'Modal',
        content: `<p>${messages[variant] || 'This is a contextual modal.'}</p>
            <p class="so-text-secondary">You can use contextual classes to style the modal header with different colors. Add the class <code>so-modal-${variant}</code> to the modal element.</p>`,
        className: `so-modal-${variant}`,
        footer: '<button class="so-btn so-btn-outline" data-dismiss="modal">Cancel</button><button class="so-btn so-btn-primary" data-dismiss="modal">OK</button>'
    });
    modal.show();
}

async function showConfirmDialog() {
    const result = await SOModal.confirm({
        title: 'Confirm Action',
        message: 'Are you sure you want to proceed with this action?',
        confirmText: 'Yes, Continue',
        cancelText: 'Cancel'
    });

    document.getElementById('confirm-result').innerHTML = result
        ? '<div class="so-alert so-alert-success so-alert-sm"><span class="material-icons">check_circle</span> User confirmed the action</div>'
        : '<div class="so-alert so-alert-warning so-alert-sm"><span class="material-icons">cancel</span> User cancelled the action</div>';
}

async function showDeleteConfirm() {
    const result = await SOModal.confirm({
        title: 'Delete Item',
        message: 'This will permanently delete the item. This action cannot be undone.',
        confirmText: 'Delete',
        cancelText: 'Keep It',
        danger: true
    });

    document.getElementById('confirm-result').innerHTML = result
        ? '<div class="so-alert so-alert-danger so-alert-sm"><span class="material-icons">delete</span> Item was deleted</div>'
        : '<div class="so-alert so-alert-info so-alert-sm"><span class="material-icons">info</span> Delete was cancelled</div>';
}

async function showMultiActionDialog() {
    const action = await SOModal.confirm({
        title: 'Unsaved Changes',
        message: 'You have unsaved changes. What would you like to do?',
        actions: [
            { id: 'discard', text: 'Discard', class: 'so-btn-outline' },
            { id: 'save-draft', text: 'Save Draft', class: 'so-btn-secondary' },
            { id: 'save', text: 'Save & Close', class: 'so-btn-primary' }
        ]
    });

    const messages = {
        'save': '<div class="so-alert so-alert-success so-alert-sm"><span class="material-icons">save</span> User chose: Save & Close</div>',
        'save-draft': '<div class="so-alert so-alert-info so-alert-sm"><span class="material-icons">drafts</span> User chose: Save Draft</div>',
        'discard': '<div class="so-alert so-alert-warning so-alert-sm"><span class="material-icons">delete_outline</span> User chose: Discard</div>',
        'dismiss': '<div class="so-alert so-alert-secondary so-alert-sm"><span class="material-icons">close</span> User dismissed the dialog</div>'
    };
    document.getElementById('confirm-result').innerHTML = messages[action] || messages['dismiss'];
}

async function showFileActionDialog() {
    const action = await SOModal.confirm({
        title: 'File Already Exists',
        message: 'A file with this name already exists in the destination folder.',
        actions: [
            { id: 'cancel', text: 'Cancel', class: 'so-btn-outline' },
            { id: 'keep-both', text: 'Keep Both', class: 'so-btn-secondary' },
            { id: 'skip', text: 'Skip', class: 'so-btn-secondary' },
            { id: 'replace', text: 'Replace', class: 'so-btn-danger' }
        ]
    });

    const messages = {
        'replace': '<div class="so-alert so-alert-danger so-alert-sm"><span class="material-icons">sync</span> User chose: Replace existing file</div>',
        'keep-both': '<div class="so-alert so-alert-info so-alert-sm"><span class="material-icons">file_copy</span> User chose: Keep both files</div>',
        'skip': '<div class="so-alert so-alert-warning so-alert-sm"><span class="material-icons">skip_next</span> User chose: Skip this file</div>',
        'cancel': '<div class="so-alert so-alert-secondary so-alert-sm"><span class="material-icons">cancel</span> User chose: Cancel</div>',
        'dismiss': '<div class="so-alert so-alert-secondary so-alert-sm"><span class="material-icons">close</span> User dismissed the dialog</div>'
    };
    document.getElementById('confirm-result').innerHTML = messages[action] || messages['dismiss'];
}

function showProgrammaticModal() {
    const modal = SOModal.create({
        title: 'Dynamic Modal',
        content: `
            <p>This modal was created entirely with JavaScript using <code>SOModal.create()</code>.</p>
            <p>You can pass any HTML content and it will be rendered in the modal body.</p>
            <div class="so-alert so-alert-info so-alert-sm so-mt-3">
                <span class="material-icons">lightbulb</span>
                <div>Tip: The modal is automatically removed from DOM when closed.</div>
            </div>
        `,
        size: 'default',
        footer: `
            <button class="so-btn so-btn-outline" data-dismiss="modal">Cancel</button>
            <button class="so-btn so-btn-primary" data-dismiss="modal">Got It</button>
        `
    });
    modal.show();
}

function showFormModal() {
    const modal = SOModal.create({
        title: 'Sign In',
        content: `
            <form>
                <div class="so-form-group">
                    <label class="so-form-label">Email Address</label>
                    <div class="so-input-wrapper">
                        <span class="so-input-icon"><span class="material-icons">email</span></span>
                        <input type="email" class="so-form-control" placeholder="Enter your email">
                    </div>
                </div>
                <div class="so-form-group">
                    <label class="so-form-label">Password</label>
                    <div class="so-input-wrapper">
                        <span class="so-input-icon"><span class="material-icons">lock</span></span>
                        <input type="password" class="so-form-control" placeholder="Enter your password">
                    </div>
                </div>
                <div class="so-form-group">
                    <label class="so-checkbox">
                        <input type="checkbox">
                        <span class="so-checkbox-mark"></span>
                        <span class="so-checkbox-label">Remember me</span>
                    </label>
                </div>
            </form>
        `,
        size: 'sm',
        footer: `
            <button class="so-btn so-btn-primary so-w-100" data-dismiss="modal">Sign In</button>
        `
    });
    modal.show();
}

function showDrawer(position, size = 'default') {
    const sizeClass = size === 'default' ? '' : `so-drawer-${size}`;
    const positionClass = position === 'left' ? 'so-drawer-left' : '';

    // Create drawer element
    const drawer = document.createElement('div');
    drawer.className = `so-drawer ${positionClass} ${sizeClass}`.trim();
    drawer.innerHTML = `
        <div class="so-drawer-header">
            <h5 class="so-drawer-title">${position.charAt(0).toUpperCase() + position.slice(1)} Drawer (${size})</h5>
            <button type="button" class="so-drawer-close" onclick="closeDrawer(this)">
                <span class="material-icons">close</span>
            </button>
        </div>
        <div class="so-drawer-body">
            <p>This is a ${position} drawer panel with ${size} size.</p>
            <p>Drawers are useful for:</p>
            <ul>
                <li>Detailed item views</li>
                <li>Filter panels</li>
                <li>Settings panels</li>
                <li>Quick edit forms</li>
            </ul>
            <div class="so-form-group so-mt-4">
                <label class="so-form-label">Sample Input</label>
                <input type="text" class="so-form-control" placeholder="Type something...">
            </div>
        </div>
        <div class="so-drawer-footer">
            <button class="so-btn so-btn-outline" onclick="closeDrawer(this)">Cancel</button>
            <button class="so-btn so-btn-primary" onclick="closeDrawer(this)">Save</button>
        </div>
    `;

    document.body.appendChild(drawer);
    createBackdrop();

    // Trigger animation
    setTimeout(() => drawer.classList.add('show'), 10);
}

function closeDrawer(btn) {
    const drawer = btn.closest('.so-drawer');
    if (drawer) {
        drawer.classList.remove('show');
        setTimeout(() => drawer.remove(), 300);
    }
    closeAllModals();
}

// Close on Escape key - only for manually created modals (not SOModal instances)
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        // Check for static modals first - don't close them, just shake
        const staticModals = document.querySelectorAll('.so-modal-static.show');
        if (staticModals.length > 0) {
            staticModals.forEach(modal => {
                modal.classList.add('modal-static-shake');
                setTimeout(() => modal.classList.remove('modal-static-shake'), 300);
            });
            return; // Don't close anything
        }

        // Only close the static demo modal (basicModal)
        const basicModal = document.getElementById('basicModal');
        if (basicModal && basicModal.classList.contains('show')) {
            closeModal('basicModal');
        }
        // Close any drawers
        document.querySelectorAll('.so-drawer.show').forEach(drawer => {
            drawer.classList.remove('show');
            setTimeout(() => drawer.remove(), 300);
        });
        // Close demo backdrop if no modals are open
        const demoBackdrop = document.querySelector('.so-modal-backdrop');
        const anyDemoModalOpen = document.querySelectorAll('.so-modal.show:not([data-so-component])').length > 0;
        if (demoBackdrop && !anyDemoModalOpen) {
            demoBackdrop.classList.remove('show');
        }
    }
});

// Static Modal functions
function showStaticModal() {
    const modal = SOModal.create({
        title: 'Terms of Service',
        content: `
            <p>Please read and accept our Terms of Service to continue using the application.</p>
            <div class="so-border so-rounded-md so-p-3 so-bg-light" style="max-height: 200px; overflow-y: auto;">
                <h6>1. Acceptance of Terms</h6>
                <p class="so-text-secondary so-text-sm">By accessing or using our service, you agree to be bound by these Terms of Service.</p>
                <h6>2. Use of Service</h6>
                <p class="so-text-secondary so-text-sm">You agree to use the service only for lawful purposes and in accordance with these Terms.</p>
                <h6>3. Privacy Policy</h6>
                <p class="so-text-secondary so-text-sm">Your use of the service is also governed by our Privacy Policy.</p>
            </div>
            <div class="so-mt-3">
                <label class="so-checkbox">
                    <input type="checkbox" id="accept-terms">
                    <span class="so-checkbox-mark"></span>
                    <span class="so-checkbox-label">I have read and agree to the Terms of Service</span>
                </label>
            </div>
        `,
        className: 'so-modal-static',
        static: true,
        footer: `
            <button class="so-btn so-btn-outline" onclick="handleDeclineTerms(this)">Decline</button>
            <button class="so-btn so-btn-primary" onclick="handleAcceptTerms(this)">Accept & Continue</button>
        `
    });
    modal.show();
}

function handleAcceptTerms(btn) {
    const modal = btn.closest('.so-modal');
    if (modal) {
        SOModal.getInstance(modal)?.hide();
    }
    SOToast?.show({ message: 'Terms accepted! Welcome aboard.', type: 'success' });
}

function handleDeclineTerms(btn) {
    const modal = btn.closest('.so-modal');
    SOModal.getInstance(modal)?.hide();
    SOToast?.show({ message: 'You declined the terms of service.', type: 'warning' });
}

function showStaticModalWithLock() {
    const modal = SOModal.create({
        title: 'Session Timeout Warning',
        content: `
            <div class="so-text-center so-py-3">
                <div class="so-confirm-icon warning so-mx-auto">
                    <span class="material-icons">timer</span>
                </div>
                <h5 class="so-mt-3">Your session is about to expire</h5>
                <p class="so-text-secondary">Due to inactivity, you will be logged out in <strong id="countdown">30</strong> seconds.</p>
                <p class="so-text-secondary so-text-sm">Click "Stay Logged In" to continue your session.</p>
            </div>
        `,
        className: 'so-modal-static so-modal-show-lock',
        static: true,
        size: 'sm',
        footer: `
            <button class="so-btn so-btn-outline" onclick="handleLogout(this)">Log Out Now</button>
            <button class="so-btn so-btn-primary" onclick="handleStayLoggedIn(this)">Stay Logged In</button>
        `
    });
    modal.show();

    // Simulate countdown
    let count = 30;
    const countdownEl = document.getElementById('countdown');
    const countdownInterval = setInterval(() => {
        count--;
        if (countdownEl) countdownEl.textContent = count;
        if (count <= 0) {
            clearInterval(countdownInterval);
            handleLogout(document.querySelector('.so-modal-static .so-btn-outline'));
        }
    }, 1000);

    // Store interval ID to clear if modal is closed
    modal.element._countdownInterval = countdownInterval;
}

function handleStayLoggedIn(btn) {
    const modal = btn.closest('.so-modal');
    if (modal?._countdownInterval) clearInterval(modal._countdownInterval);
    SOModal.getInstance(modal)?.hide();
    SOToast?.show({ message: 'Session extended successfully!', type: 'success' });
}

function handleLogout(btn) {
    const modal = btn.closest('.so-modal');
    if (modal?._countdownInterval) clearInterval(modal._countdownInterval);
    SOModal.getInstance(modal)?.hide();
    SOToast?.show({ message: 'You have been logged out.', type: 'info' });
}

function showStaticConfirmModal() {
    const modal = SOModal.create({
        title: 'Delete Your Account',
        content: `
            <div class="so-text-center so-py-2">
                <div class="so-confirm-icon danger so-mx-auto">
                    <span class="material-icons">warning</span>
                </div>
                <h5 class="so-mt-3 so-text-danger">This action is irreversible!</h5>
                <p class="so-text-secondary">All your data, including files, settings, and history will be permanently deleted.</p>
                <p class="so-text-secondary so-text-sm so-mt-2">Are you sure you want to proceed?</p>
            </div>
        `,
        className: 'so-modal-static so-modal-danger',
        static: true,
        footer: `
            <button class="so-btn so-btn-outline" onclick="handleCancelDelete(this)">Cancel</button>
            <button class="so-btn so-btn-danger" onclick="handleConfirmDelete(this)">Delete Account</button>
        `
    });
    modal.show();
}

function handleCancelDelete(btn) {
    const modal = btn.closest('.so-modal');
    SOModal.getInstance(modal)?.hide();
    SOToast?.show({ message: 'Account deletion cancelled.', type: 'info' });
}

function handleConfirmDelete(btn) {
    const modal = btn.closest('.so-modal');
    SOModal.getInstance(modal)?.hide();
    SOToast?.show({ message: 'Account has been deleted.', type: 'danger' });
}
</script>
