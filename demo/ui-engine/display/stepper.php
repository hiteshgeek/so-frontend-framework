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
        <nav aria-label="breadcrumb">
            <ol class="so-breadcrumb">
                <li class="so-breadcrumb-item"><a href="../index.php">UI Engine</a></li>
                <li class="so-breadcrumb-item"><a href="../index.php#display">Display Elements</a></li>
                <li class="so-breadcrumb-item so-active">Stepper</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">format_list_numbered</span>
            Stepper
        </h1>
        <p class="so-page-subtitle">Multi-step progress indicator for wizards and multi-page forms.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Stepper -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Stepper</h3>
            </div>
            <div class="so-card-body">
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
                ]) ?>
            </div>
        </div>

        <!-- With Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Icons</h3>
            </div>
            <div class="so-card-body">
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
                ]) ?>
            </div>
        </div>

        <!-- Vertical Stepper -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Vertical Stepper</h3>
            </div>
            <div class="so-card-body">
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
                ]) ?>
            </div>
        </div>

        <!-- With Content -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Step Content</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('stepper-content', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$stepper = UiEngine::stepper()
    ->vertical()
    ->step('Account', null, null, UiEngine::form()
        ->add(UiEngine::email('email')->label('Email'))
        ->add(UiEngine::password('password')->label('Password'))
    )
    ->step('Profile', null, null, UiEngine::form()
        ->add(UiEngine::input('name')->label('Full Name'))
        ->add(UiEngine::input('phone')->label('Phone'))
    )
    ->step('Complete')
    ->current(0);

echo \$stepper->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const stepper = UiEngine.stepper()
    .vertical()
    .step('Account', null, null, UiEngine.form()
        .add(UiEngine.email('email').label('Email'))
        .add(UiEngine.password('password').label('Password'))
    )
    .step('Profile', null, null, UiEngine.form()
        .add(UiEngine.input('name').label('Full Name'))
        .add(UiEngine.input('phone').label('Phone'))
    )
    .step('Complete')
    .current(0)
    .onStepChange((step) => {
        console.log('Now on step:', step);
    });

document.getElementById('container').innerHTML = stepper.toHtml();"
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
                ]) ?>
            </div>
        </div>

        <!-- Interactive Stepper -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Interactive Stepper</h3>
            </div>
            <div class="so-card-body">
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
