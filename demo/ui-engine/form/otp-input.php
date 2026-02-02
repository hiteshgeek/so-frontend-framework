<?php
/**
 * SixOrbit UI Engine - OTP Input Element Demo
 */

$pageTitle = 'OTP Input - UI Engine';
$pageDescription = 'One-time password input with auto-focus and paste support';

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
                <li class="so-breadcrumb-item so-active">OTP Input</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">pin</span>
            OTP Input
        </h1>
        <p class="so-page-subtitle">One-time password input element with automatic focus navigation, paste support, and validation.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic OTP Input -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic OTP Input</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label">Enter verification code</label>
                        <div class="so-d-flex so-gap-2 so-justify-content-center">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                        </div>
                        <small class="so-form-text so-text-muted so-text-center so-d-block so-mt-2">Enter the 6-digit code sent to your phone</small>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-otp', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$otp = UiEngine::otp('verification_code')
    ->label('Enter verification code')
    ->length(6)
    ->help('Enter the 6-digit code sent to your phone');

echo \$otp->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const otp = UiEngine.otp('verification_code')
    .label('Enter verification code')
    .length(6)
    .help('Enter the 6-digit code sent to your phone');

document.getElementById('container').innerHTML = otp.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label">Enter verification code</label>
    <div class="so-otp-input" data-length="6">
        <input type="text" maxlength="1" class="so-otp-digit">
        <input type="text" maxlength="1" class="so-otp-digit">
        <input type="text" maxlength="1" class="so-otp-digit">
        <input type="text" maxlength="1" class="so-otp-digit">
        <input type="text" maxlength="1" class="so-otp-digit">
        <input type="text" maxlength="1" class="so-otp-digit">
    </div>
    <input type="hidden" name="verification_code">
    <small class="so-form-text">Enter the 6-digit code sent to your phone</small>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Different Lengths -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Different Lengths</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-mb-4">
                        <label class="so-form-label">4-digit PIN</label>
                        <div class="so-d-flex so-gap-2">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:50px;height:50px;font-size:1.5rem;" maxlength="1">
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">8-digit code</label>
                        <div class="so-d-flex so-gap-2">
                            <input type="text" class="so-form-control so-text-center" style="width:40px;height:45px;font-size:1.25rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:40px;height:45px;font-size:1.25rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:40px;height:45px;font-size:1.25rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:40px;height:45px;font-size:1.25rem;" maxlength="1">
                            <span class="so-mx-1">-</span>
                            <input type="text" class="so-form-control so-text-center" style="width:40px;height:45px;font-size:1.25rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:40px;height:45px;font-size:1.25rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:40px;height:45px;font-size:1.25rem;" maxlength="1">
                            <input type="text" class="so-form-control so-text-center" style="width:40px;height:45px;font-size:1.25rem;" maxlength="1">
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('otp-lengths', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// 4-digit PIN
UiEngine::otp('pin')
    ->label('4-digit PIN')
    ->length(4);

// 8-digit code with separator
UiEngine::otp('long_code')
    ->label('8-digit code')
    ->length(8)
    ->separator(4); // Add separator after 4th digit"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// 4-digit PIN
UiEngine.otp('pin')
    .label('4-digit PIN')
    .length(4);

// 8-digit code with separator
UiEngine.otp('long_code')
    .label('8-digit code')
    .length(8)
    .separator(4); // Add separator after 4th digit"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Input Types -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Input Types</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('otp-types', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Numbers only (default)
UiEngine::otp('numeric')
    ->label('Numeric OTP')
    ->type('numeric');

// Alphanumeric
UiEngine::otp('alphanumeric')
    ->label('Alphanumeric Code')
    ->type('alphanumeric');

// Password style (masked)
UiEngine::otp('secure')
    ->label('Secure PIN')
    ->type('password')
    ->length(4);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Numbers only (default)
UiEngine.otp('numeric')
    .label('Numeric OTP')
    .type('numeric');

// Alphanumeric
UiEngine.otp('alphanumeric')
    .label('Alphanumeric Code')
    .type('alphanumeric');

// Password style (masked)
UiEngine.otp('secure')
    .label('Secure PIN')
    .type('password')
    .length(4);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Auto Submit -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Auto Submit</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('otp-autosubmit', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$otp = UiEngine::otp('code')
    ->label('Verification Code')
    ->length(6)
    ->autoSubmit() // Submit form when complete
    ->autoFocus(); // Focus first input on load

echo \$otp->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const otp = UiEngine.otp('code')
    .label('Verification Code')
    .length(6)
    .autoSubmit()
    .autoFocus()
    .onComplete((value) => {
        console.log('OTP entered:', value);
        // Auto-verify the code
        verifyOTP(value);
    });

document.getElementById('container').innerHTML = otp.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- OTP Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">OTP Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('otp-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small
UiEngine::otp('small')
    ->label('Small OTP')
    ->length(6)
    ->size('sm');

// Default
UiEngine::otp('default')
    ->label('Default OTP')
    ->length(6);

// Large
UiEngine::otp('large')
    ->label('Large OTP')
    ->length(6)
    ->size('lg');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small
UiEngine.otp('small')
    .label('Small OTP')
    .length(6)
    .size('sm');

// Default
UiEngine.otp('default')
    .label('Default OTP')
    .length(6);

// Large
UiEngine.otp('large')
    .label('Large OTP')
    .length(6)
    .size('lg');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Resend -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Resend Link</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('otp-resend', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$otp = UiEngine::otp('code')
    ->label('Verification Code')
    ->length(6)
    ->help('Enter the code sent to your phone')
    ->resendLink('/api/resend-otp')
    ->resendText('Didn\\'t receive code?')
    ->resendCooldown(60); // 60 second cooldown

echo \$otp->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const otp = UiEngine.otp('code')
    .label('Verification Code')
    .length(6)
    .help('Enter the code sent to your phone')
    .showResend(true)
    .resendCooldown(60)
    .onResend(async () => {
        await fetch('/api/resend-otp', {method: 'POST'});
        alert('Code resent!');
    });

document.getElementById('container').innerHTML = otp.toHtml();"
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
                                <td><code>length()</code></td>
                                <td><code>int $length</code></td>
                                <td>Set number of digits (default: 6)</td>
                            </tr>
                            <tr>
                                <td><code>type()</code></td>
                                <td><code>string $type</code></td>
                                <td>Set type: numeric, alphanumeric, password</td>
                            </tr>
                            <tr>
                                <td><code>separator()</code></td>
                                <td><code>int $position</code></td>
                                <td>Add visual separator after position</td>
                            </tr>
                            <tr>
                                <td><code>autoFocus()</code></td>
                                <td>-</td>
                                <td>Auto-focus first input on load</td>
                            </tr>
                            <tr>
                                <td><code>autoSubmit()</code></td>
                                <td>-</td>
                                <td>Submit form when complete</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: 'sm' or 'lg'</td>
                            </tr>
                            <tr>
                                <td><code>onComplete()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Callback when all digits entered</td>
                            </tr>
                            <tr>
                                <td><code>onResend()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Callback for resend action</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
