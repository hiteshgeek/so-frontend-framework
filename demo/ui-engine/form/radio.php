<?php
/**
 * SixOrbit UI Engine - Radio Element Demo
 */

$pageTitle = 'Radio - UI Engine';
$pageDescription = 'Radio button for single selection from options';

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
                <li class="so-breadcrumb-item so-active">Radio</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">radio_button_checked</span>
            Radio
        </h1>
        <p class="so-page-subtitle">Radio button element for selecting a single option from a group of choices.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Radio Group -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Radio Group</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <label class="so-form-label">Select your gender</label>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="radio" name="gender" id="demo-male" value="male">
                        <label class="so-form-check-label" for="demo-male">Male</label>
                    </div>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="radio" name="gender" id="demo-female" value="female">
                        <label class="so-form-check-label" for="demo-female">Female</label>
                    </div>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="radio" name="gender" id="demo-other" value="other">
                        <label class="so-form-check-label" for="demo-other">Other</label>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-radio', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$radio = UiEngine::radio('gender')
    ->label('Select your gender')
    ->options([
        'male' => 'Male',
        'female' => 'Female',
        'other' => 'Other',
    ]);

echo \$radio->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const radio = UiEngine.radio('gender')
    .label('Select your gender')
    .options({
        male: 'Male',
        female: 'Female',
        other: 'Other',
    });

document.getElementById('container').innerHTML = radio.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label">Select your gender</label>
    <div class="so-form-check">
        <input class="so-form-check-input" type="radio" name="gender" id="gender-male" value="male">
        <label class="so-form-check-label" for="gender-male">Male</label>
    </div>
    <div class="so-form-check">
        <input class="so-form-check-input" type="radio" name="gender" id="gender-female" value="female">
        <label class="so-form-check-label" for="gender-female">Female</label>
    </div>
    <div class="so-form-check">
        <input class="so-form-check-input" type="radio" name="gender" id="gender-other" value="other">
        <label class="so-form-check-label" for="gender-other">Other</label>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Inline Radio -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Inline Radio Buttons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <label class="so-form-label">Choose a plan</label>
                    <div>
                        <div class="so-form-check so-form-check-inline">
                            <input class="so-form-check-input" type="radio" name="plan" id="demo-basic" value="basic">
                            <label class="so-form-check-label" for="demo-basic">Basic</label>
                        </div>
                        <div class="so-form-check so-form-check-inline">
                            <input class="so-form-check-input" type="radio" name="plan" id="demo-pro" value="pro">
                            <label class="so-form-check-label" for="demo-pro">Pro</label>
                        </div>
                        <div class="so-form-check so-form-check-inline">
                            <input class="so-form-check-input" type="radio" name="plan" id="demo-enterprise" value="enterprise">
                            <label class="so-form-check-label" for="demo-enterprise">Enterprise</label>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('radio-inline', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$radio = UiEngine::radio('plan')
    ->label('Choose a plan')
    ->inline()
    ->options([
        'basic' => 'Basic',
        'pro' => 'Pro',
        'enterprise' => 'Enterprise',
    ]);

echo \$radio->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const radio = UiEngine.radio('plan')
    .label('Choose a plan')
    .inline()
    .options({
        basic: 'Basic',
        pro: 'Pro',
        enterprise: 'Enterprise',
    });

document.getElementById('container').innerHTML = radio.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Default Value -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Default Value</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <label class="so-form-label">Notification preference</label>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="radio" name="notification" id="demo-email" value="email" checked>
                        <label class="so-form-check-label" for="demo-email">Email</label>
                    </div>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="radio" name="notification" id="demo-sms" value="sms">
                        <label class="so-form-check-label" for="demo-sms">SMS</label>
                    </div>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="radio" name="notification" id="demo-push" value="push">
                        <label class="so-form-check-label" for="demo-push">Push notification</label>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('radio-default', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$radio = UiEngine::radio('notification')
    ->label('Notification preference')
    ->options([
        'email' => 'Email',
        'sms' => 'SMS',
        'push' => 'Push notification',
    ])
    ->value('email'); // Set default selection

echo \$radio->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const radio = UiEngine.radio('notification')
    .label('Notification preference')
    .options({
        email: 'Email',
        sms: 'SMS',
        push: 'Push notification',
    })
    .value('email'); // Set default selection

document.getElementById('container').innerHTML = radio.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Disabled State -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Disabled State</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <label class="so-form-label">Unavailable options</label>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="radio" name="tier" id="demo-free" value="free" checked>
                        <label class="so-form-check-label" for="demo-free">Free tier</label>
                    </div>
                    <div class="so-form-check">
                        <input class="so-form-check-input" type="radio" name="tier" id="demo-premium" value="premium" disabled>
                        <label class="so-form-check-label" for="demo-premium">Premium tier (Coming soon)</label>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('radio-disabled', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$radio = UiEngine::radio('tier')
    ->label('Unavailable options')
    ->options([
        'free' => 'Free tier',
        'premium' => ['label' => 'Premium tier (Coming soon)', 'disabled' => true],
    ])
    ->value('free');

echo \$radio->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const radio = UiEngine.radio('tier')
    .label('Unavailable options')
    .options({
        free: 'Free tier',
        premium: {label: 'Premium tier (Coming soon)', disabled: true},
    })
    .value('free');

document.getElementById('container').innerHTML = radio.toHtml();"
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
                                <td>Set the group label</td>
                            </tr>
                            <tr>
                                <td><code>options()</code></td>
                                <td><code>array $options</code></td>
                                <td>Set radio options as key-value pairs</td>
                            </tr>
                            <tr>
                                <td><code>value()</code></td>
                                <td><code>mixed $value</code></td>
                                <td>Set the selected value</td>
                            </tr>
                            <tr>
                                <td><code>inline()</code></td>
                                <td>-</td>
                                <td>Display radio buttons inline</td>
                            </tr>
                            <tr>
                                <td><code>required()</code></td>
                                <td>-</td>
                                <td>Mark as required</td>
                            </tr>
                            <tr>
                                <td><code>disabled()</code></td>
                                <td>-</td>
                                <td>Disable all radio buttons</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
