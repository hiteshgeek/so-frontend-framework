<?php
/**
 * SixOrbit UI Engine - Toggle Element Demo
 */

$pageTitle = 'Toggle - UI Engine';
$pageDescription = 'Toggle switch for boolean on/off states';

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
                <li class="so-breadcrumb-item so-active">Toggle</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">toggle_on</span>
            Toggle
        </h1>
        <p class="so-page-subtitle">Toggle switch element for boolean on/off states with labels and various sizes.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Toggle -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Toggle</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-check so-form-switch">
                        <input class="so-form-check-input" type="checkbox" role="switch" id="demo-notifications">
                        <label class="so-form-check-label" for="demo-notifications">Enable notifications</label>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-toggle', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$toggle = UiEngine::toggle('notifications')
    ->label('Enable notifications');

echo \$toggle->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const toggle = UiEngine.toggle('notifications')
    .label('Enable notifications');

document.getElementById('container').innerHTML = toggle.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-check so-form-switch">
    <input class="so-form-check-input" type="checkbox" role="switch" id="notifications" name="notifications">
    <label class="so-form-check-label" for="notifications">Enable notifications</label>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Toggle States -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Toggle States</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-check so-form-switch so-mb-2">
                        <input class="so-form-check-input" type="checkbox" role="switch" id="demo-off">
                        <label class="so-form-check-label" for="demo-off">Default (Off)</label>
                    </div>
                    <div class="so-form-check so-form-switch so-mb-2">
                        <input class="so-form-check-input" type="checkbox" role="switch" id="demo-on" checked>
                        <label class="so-form-check-label" for="demo-on">Checked (On)</label>
                    </div>
                    <div class="so-form-check so-form-switch so-mb-2">
                        <input class="so-form-check-input" type="checkbox" role="switch" id="demo-disabled-off" disabled>
                        <label class="so-form-check-label" for="demo-disabled-off">Disabled (Off)</label>
                    </div>
                    <div class="so-form-check so-form-switch">
                        <input class="so-form-check-input" type="checkbox" role="switch" id="demo-disabled-on" checked disabled>
                        <label class="so-form-check-label" for="demo-disabled-on">Disabled (On)</label>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('toggle-states', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Default (Off)
UiEngine::toggle('default')->label('Default (Off)');

// Checked (On)
UiEngine::toggle('checked')->label('Checked (On)')->checked();

// Disabled (Off)
UiEngine::toggle('disabled_off')->label('Disabled (Off)')->disabled();

// Disabled (On)
UiEngine::toggle('disabled_on')->label('Disabled (On)')->checked()->disabled();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Default (Off)
UiEngine.toggle('default').label('Default (Off)');

// Checked (On)
UiEngine.toggle('checked').label('Checked (On)').checked();

// Disabled (Off)
UiEngine.toggle('disabled_off').label('Disabled (Off)').disabled();

// Disabled (On)
UiEngine.toggle('disabled_on').label('Disabled (On)').checked().disabled();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With On/Off Labels -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With On/Off Labels</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('toggle-labels', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$toggle = UiEngine::toggle('dark_mode')
    ->label('Theme Mode')
    ->onLabel('Dark')
    ->offLabel('Light');

// Or with icons
\$toggle = UiEngine::toggle('dark_mode')
    ->label('Theme Mode')
    ->onIcon('dark_mode')
    ->offIcon('light_mode');

echo \$toggle->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const toggle = UiEngine.toggle('dark_mode')
    .label('Theme Mode')
    .onLabel('Dark')
    .offLabel('Light');

// Or with icons
const iconToggle = UiEngine.toggle('dark_mode')
    .label('Theme Mode')
    .onIcon('dark_mode')
    .offIcon('light_mode');

document.getElementById('container').innerHTML = toggle.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Toggle Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Toggle Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('toggle-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small toggle
UiEngine::toggle('small')->size('sm')->label('Small toggle');

// Default toggle
UiEngine::toggle('default')->label('Default toggle');

// Large toggle
UiEngine::toggle('large')->size('lg')->label('Large toggle');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small toggle
UiEngine.toggle('small').size('sm').label('Small toggle');

// Default toggle
UiEngine.toggle('default').label('Default toggle');

// Large toggle
UiEngine.toggle('large').size('lg').label('Large toggle');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Toggle Colors -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Toggle Colors</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('toggle-colors', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Primary (default)
UiEngine::toggle('primary')->color('primary')->label('Primary')->checked();

// Success
UiEngine::toggle('success')->color('success')->label('Success')->checked();

// Warning
UiEngine::toggle('warning')->color('warning')->label('Warning')->checked();

// Danger
UiEngine::toggle('danger')->color('danger')->label('Danger')->checked();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Primary (default)
UiEngine.toggle('primary').color('primary').label('Primary').checked();

// Success
UiEngine.toggle('success').color('success').label('Success').checked();

// Warning
UiEngine.toggle('warning').color('warning').label('Warning').checked();

// Danger
UiEngine.toggle('danger').color('danger').label('Danger').checked();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Settings Example -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Settings Example</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-list-group">
                        <div class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                            <div>
                                <div class="so-fw-medium">Email Notifications</div>
                                <small class="so-text-muted">Receive email updates about your account</small>
                            </div>
                            <div class="so-form-check so-form-switch so-mb-0">
                                <input class="so-form-check-input" type="checkbox" role="switch" id="demo-email-notif" checked>
                            </div>
                        </div>
                        <div class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                            <div>
                                <div class="so-fw-medium">SMS Notifications</div>
                                <small class="so-text-muted">Receive text messages for important alerts</small>
                            </div>
                            <div class="so-form-check so-form-switch so-mb-0">
                                <input class="so-form-check-input" type="checkbox" role="switch" id="demo-sms-notif">
                            </div>
                        </div>
                        <div class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                            <div>
                                <div class="so-fw-medium">Two-Factor Authentication</div>
                                <small class="so-text-muted">Add an extra layer of security</small>
                            </div>
                            <div class="so-form-check so-form-switch so-mb-0">
                                <input class="so-form-check-input" type="checkbox" role="switch" id="demo-2fa" checked>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('toggle-settings', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$settings = [
    UiEngine::toggle('email_notifications')
        ->checked()
        ->label('Email Notifications')
        ->description('Receive email updates about your account'),
    UiEngine::toggle('sms_notifications')
        ->label('SMS Notifications')
        ->description('Receive text messages for important alerts'),
    UiEngine::toggle('two_factor')
        ->checked()
        ->label('Two-Factor Authentication')
        ->description('Add an extra layer of security'),
];

foreach (\$settings as \$toggle) {
    echo \$toggle->renderSettingItem();
}"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const settings = [
    UiEngine.toggle('email_notifications')
        .checked()
        .label('Email Notifications')
        .description('Receive email updates about your account'),
    UiEngine.toggle('sms_notifications')
        .label('SMS Notifications')
        .description('Receive text messages for important alerts'),
    UiEngine.toggle('two_factor')
        .checked()
        .label('Two-Factor Authentication')
        .description('Add an extra layer of security'),
];

const html = settings.map(t => t.toSettingItem()).join('');
document.getElementById('settings-list').innerHTML = html;"
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
                                <td><code>checked()</code></td>
                                <td><code>bool $checked = true</code></td>
                                <td>Set checked state</td>
                            </tr>
                            <tr>
                                <td><code>label()</code></td>
                                <td><code>string $label</code></td>
                                <td>Set the toggle label</td>
                            </tr>
                            <tr>
                                <td><code>onLabel()</code></td>
                                <td><code>string $label</code></td>
                                <td>Set label for on state</td>
                            </tr>
                            <tr>
                                <td><code>offLabel()</code></td>
                                <td><code>string $label</code></td>
                                <td>Set label for off state</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: 'sm' or 'lg'</td>
                            </tr>
                            <tr>
                                <td><code>color()</code></td>
                                <td><code>string $color</code></td>
                                <td>Set color: primary, success, warning, danger</td>
                            </tr>
                            <tr>
                                <td><code>disabled()</code></td>
                                <td>-</td>
                                <td>Disable the toggle</td>
                            </tr>
                            <tr>
                                <td><code>onChange()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Toggle change callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
