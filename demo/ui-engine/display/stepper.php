<?php
/**
 * SixOrbit UI Engine - Stepper Element Demo
 */

$pageTitle = 'Stepper - UI Engine';
$pageDescription = 'Multi-step progress indicator';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Stepper</h1>
            <p class="so-page-subtitle">Multi-step progress indicator for wizards and multi-page forms.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Stepper -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Stepper</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-stepper so-mb-4">
                    <div class="so-stepper-item so-completed">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Account</div>
                            <div class="so-stepper-subtitle">Create your account</div>
                        </div>
                    </div>
                    <div class="so-stepper-item so-completed">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Profile</div>
                            <div class="so-stepper-subtitle">Complete your profile</div>
                        </div>
                    </div>
                    <div class="so-stepper-item so-active">
                        <div class="so-stepper-indicator">3</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Payment</div>
                            <div class="so-stepper-subtitle">Add payment method</div>
                        </div>
                    </div>
                    <div class="so-stepper-item">
                        <div class="so-stepper-indicator">4</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Confirm</div>
                            <div class="so-stepper-subtitle">Review and confirm</div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-stepper', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$stepper = UiEngine::stepper()
    ->step('Account', 'Create your account')
    ->step('Profile', 'Complete your profile')
    ->step('Payment', 'Add payment method')
    ->step('Confirm', 'Review and confirm')
    ->current(2);  // Current step (0-indexed)

echo \$stepper->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const stepper = UiEngine.stepper()
    .step('Account', 'Create your account')
    .step('Profile', 'Complete your profile')
    .step('Payment', 'Add payment method')
    .step('Confirm', 'Review and confirm')
    .current(2);

document.getElementById('container').innerHTML = stepper.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-stepper">
    <div class="so-stepper-item so-completed">
        <div class="so-stepper-indicator">
            <span class="material-icons">check</span>
        </div>
        <div class="so-stepper-content">
            <div class="so-stepper-title">Account</div>
            <div class="so-stepper-subtitle">Create your account</div>
        </div>
    </div>
    <div class="so-stepper-item so-active">
        <div class="so-stepper-indicator">2</div>
        <div class="so-stepper-content">
            <div class="so-stepper-title">Profile</div>
            <div class="so-stepper-subtitle">Complete your profile</div>
        </div>
    </div>
    <!-- More steps... -->
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Icons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-stepper so-mb-4">
                    <div class="so-stepper-item so-completed">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Cart</div>
                            <div class="so-stepper-subtitle">Review items</div>
                        </div>
                    </div>
                    <div class="so-stepper-item so-active">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">local_shipping</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Shipping</div>
                            <div class="so-stepper-subtitle">Enter address</div>
                        </div>
                    </div>
                    <div class="so-stepper-item">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">payment</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Payment</div>
                            <div class="so-stepper-subtitle">Add payment</div>
                        </div>
                    </div>
                    <div class="so-stepper-item">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">check_circle</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Complete</div>
                            <div class="so-stepper-subtitle">Order confirmed</div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('stepper-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$stepper = UiEngine::stepper()
    ->step('Cart', 'Review items', 'shopping_cart')
    ->step('Shipping', 'Enter address', 'local_shipping')
    ->step('Payment', 'Add payment', 'payment')
    ->step('Complete', 'Order confirmed', 'check_circle')
    ->current(1);

echo \$stepper->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const stepper = UiEngine.stepper()
    .step('Cart', 'Review items', 'shopping_cart')
    .step('Shipping', 'Enter address', 'local_shipping')
    .step('Payment', 'Add payment', 'payment')
    .step('Complete', 'Order confirmed', 'check_circle')
    .current(1);

document.getElementById('container').innerHTML = stepper.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-stepper">
    <div class="so-stepper-item so-completed">
        <div class="so-stepper-indicator">
            <span class="material-icons">check</span>
        </div>
        <div class="so-stepper-content">
            <div class="so-stepper-title">Cart</div>
            <div class="so-stepper-subtitle">Review items</div>
        </div>
    </div>
    <div class="so-stepper-item so-active">
        <div class="so-stepper-indicator">
            <span class="material-icons">local_shipping</span>
        </div>
        <!-- Content... -->
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Vertical Stepper -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Vertical Stepper</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-stepper so-stepper-vertical so-mb-4">
                    <div class="so-stepper-item so-completed">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Personal Info</div>
                            <div class="so-stepper-subtitle">Enter your name and email</div>
                        </div>
                    </div>
                    <div class="so-stepper-item so-active">
                        <div class="so-stepper-indicator">2</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Address</div>
                            <div class="so-stepper-subtitle">Provide your shipping address</div>
                        </div>
                    </div>
                    <div class="so-stepper-item">
                        <div class="so-stepper-indicator">3</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Payment</div>
                            <div class="so-stepper-subtitle">Choose payment method</div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('stepper-vertical', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$stepper = UiEngine::stepper()
    ->vertical()
    ->step('Personal Info', 'Enter your name and email')
    ->step('Address', 'Provide your shipping address')
    ->step('Payment', 'Choose payment method')
    ->current(1);

echo \$stepper->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const stepper = UiEngine.stepper()
    .vertical()
    .step('Personal Info', 'Enter your name and email')
    .step('Address', 'Provide your shipping address')
    .step('Payment', 'Choose payment method')
    .current(1);

document.getElementById('container').innerHTML = stepper.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-stepper so-stepper-vertical">
    <div class="so-stepper-item so-completed">
        <div class="so-stepper-indicator">
            <span class="material-icons">check</span>
        </div>
        <div class="so-stepper-content">
            <div class="so-stepper-title">Personal Info</div>
            <div class="so-stepper-subtitle">Enter your name and email</div>
        </div>
    </div>
    <div class="so-stepper-item so-active">
        <!-- Current step... -->
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- States -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Step States</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-stepper so-mb-4">
                    <div class="so-stepper-item so-completed">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Completed</div>
                        </div>
                    </div>
                    <div class="so-stepper-item so-active">
                        <div class="so-stepper-indicator">2</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Current</div>
                        </div>
                    </div>
                    <div class="so-stepper-item">
                        <div class="so-stepper-indicator">3</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Pending</div>
                        </div>
                    </div>
                    <div class="so-stepper-item so-error">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">error</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Error</div>
                        </div>
                    </div>
                    <div class="so-stepper-item so-disabled">
                        <div class="so-stepper-indicator">5</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Disabled</div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('stepper-states', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$stepper = UiEngine::stepper()
    ->step('Step 1', 'Completed', null, null, 'completed')
    ->step('Step 2', 'Current step', null, null, 'current')
    ->step('Step 3', 'Not started', null, null, 'pending')
    ->step('Step 4', 'Has error', null, null, 'error')
    ->step('Step 5', 'Skipped', null, null, 'skipped');

echo \$stepper->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const stepper = UiEngine.stepper()
    .step('Step 1', 'Completed', null, null, 'completed')
    .step('Step 2', 'Current step', null, null, 'current')
    .step('Step 3', 'Not started', null, null, 'pending')
    .step('Step 4', 'Has error', null, null, 'error')
    .step('Step 5', 'Skipped', null, null, 'skipped');

document.getElementById('container').innerHTML = stepper.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-stepper">
    <div class="so-stepper-item so-completed">...</div>
    <div class="so-stepper-item so-active">...</div>
    <div class="so-stepper-item">...</div>
    <div class="so-stepper-item so-error">...</div>
    <div class="so-stepper-item so-disabled">...</div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Interactive Stepper -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Interactive Stepper</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Allow users to navigate between steps by clicking on them. Control the stepper programmatically with JavaScript.</p>

                <!-- Live Demo -->
                <div class="so-stepper so-stepper-interactive so-mb-4" id="interactive-stepper-demo">
                    <div class="so-stepper-item so-completed" data-step="0" style="cursor: pointer;">
                        <div class="so-stepper-indicator">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Cart</div>
                            <div class="so-stepper-subtitle">Review items</div>
                        </div>
                    </div>
                    <div class="so-stepper-item so-active" data-step="1" style="cursor: pointer;">
                        <div class="so-stepper-indicator">2</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Shipping</div>
                            <div class="so-stepper-subtitle">Enter address</div>
                        </div>
                    </div>
                    <div class="so-stepper-item" data-step="2" style="cursor: pointer;">
                        <div class="so-stepper-indicator">3</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Payment</div>
                            <div class="so-stepper-subtitle">Add payment</div>
                        </div>
                    </div>
                    <div class="so-stepper-item" data-step="3" style="cursor: pointer;">
                        <div class="so-stepper-indicator">4</div>
                        <div class="so-stepper-content">
                            <div class="so-stepper-title">Complete</div>
                            <div class="so-stepper-subtitle">Order confirmed</div>
                        </div>
                    </div>
                </div>

                <div class="so-btn-group so-mb-4">
                    <button class="so-btn so-btn-outline so-btn-sm" onclick="stepperPrev()">
                        <span class="material-icons" style="font-size:16px;">chevron_left</span> Previous
                    </button>
                    <button class="so-btn so-btn-primary so-btn-sm" onclick="stepperNext()">
                        Next <span class="material-icons" style="font-size:16px;">chevron_right</span>
                    </button>
                </div>

                <script>
                (function() {
                    const stepper = document.getElementById('interactive-stepper-demo');
                    if (!stepper) return;

                    const items = stepper.querySelectorAll('.so-stepper-item');
                    let currentStep = 1;

                    function updateStepper(step) {
                        items.forEach((item, index) => {
                            item.classList.remove('so-completed', 'so-active');
                            const indicator = item.querySelector('.so-stepper-indicator');

                            if (index < step) {
                                item.classList.add('so-completed');
                                indicator.innerHTML = '<span class="material-icons">check</span>';
                            } else if (index === step) {
                                item.classList.add('so-active');
                                indicator.innerHTML = (index + 1).toString();
                            } else {
                                indicator.innerHTML = (index + 1).toString();
                            }
                        });
                        currentStep = step;
                    }

                    items.forEach((item, index) => {
                        item.addEventListener('click', () => updateStepper(index));
                    });

                    window.stepperNext = function() {
                        if (currentStep < items.length - 1) updateStepper(currentStep + 1);
                    };

                    window.stepperPrev = function() {
                        if (currentStep > 0) updateStepper(currentStep - 1);
                    };
                })();
                </script>

                <!-- Code Tabs -->
                <?= so_code_tabs('stepper-interactive', [
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const stepper = UiEngine.stepper('checkout-stepper')
    .step('Cart', 'Review items')
    .step('Shipping', 'Enter address')
    .step('Payment', 'Add payment')
    .step('Complete', 'Order confirmed')
    .current(0)
    .interactive()  // Allow clicking on steps
    .validation((step) => {
        // Validate before proceeding
        if (step === 0 && cartIsEmpty()) {
            return {valid: false, message: 'Cart is empty'};
        }
        return {valid: true};
    });

// Navigation methods
stepper.next();     // Go to next step
stepper.prev();     // Go to previous step
stepper.goTo(2);    // Go to specific step
stepper.complete(); // Mark all as complete"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-stepper so-stepper-interactive" id="checkout-stepper">
    <div class="so-stepper-item so-active" data-step="0">
        <div class="so-stepper-indicator">1</div>
        <div class="so-stepper-content">
            <div class="so-stepper-title">Cart</div>
            <div class="so-stepper-subtitle">Review items</div>
        </div>
    </div>
    <!-- More steps... -->
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
                                <td><code>step()</code></td>
                                <td><code>string $title, string $description, string $icon, mixed $content, string $state</code></td>
                                <td>Add a step</td>
                            </tr>
                            <tr>
                                <td><code>current()</code></td>
                                <td><code>int $index</code></td>
                                <td>Set current step (0-indexed)</td>
                            </tr>
                            <tr>
                                <td><code>vertical()</code></td>
                                <td>-</td>
                                <td>Use vertical layout</td>
                            </tr>
                            <tr>
                                <td><code>interactive()</code></td>
                                <td>-</td>
                                <td>Allow clicking on steps</td>
                            </tr>
                            <tr>
                                <td><code>next()</code></td>
                                <td>-</td>
                                <td>Go to next step (JS)</td>
                            </tr>
                            <tr>
                                <td><code>prev()</code></td>
                                <td>-</td>
                                <td>Go to previous step (JS)</td>
                            </tr>
                            <tr>
                                <td><code>goTo()</code></td>
                                <td><code>int $step</code></td>
                                <td>Go to specific step (JS)</td>
                            </tr>
                            <tr>
                                <td><code>onStepChange()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Step change callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
