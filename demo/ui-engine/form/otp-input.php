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
        <div class="so-page-header-left">
            <h1 class="so-page-title">OTP Input</h1>
            <p class="so-page-subtitle">One-time password input element with automatic focus navigation, paste support, and validation.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic OTP Input -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic OTP Input</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label">Enter verification code</label>
                    <div class="so-otp-group" id="demo-basic-otp">
                        <div class="so-otp-inputs">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        </div>
                    </div>
                    <input type="hidden" name="verification_code">
                    <div class="so-form-hint so-mt-2">Enter the 6-digit code sent to your phone</div>
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
    <div class="so-otp-group" id="otpInput">
        <div class="so-otp-inputs">
            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
        </div>
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
                <div class="so-mb-4">
                    <label class="so-form-label">4-digit PIN</label>
                    <div class="so-otp-group" id="demo-pin4">
                        <div class="so-otp-inputs">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        </div>
                    </div>
                </div>
                <div>
                    <label class="so-form-label">8-digit code</label>
                    <div class="so-otp-group" id="demo-code8">
                        <div class="so-otp-inputs">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
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

// 8-digit code
UiEngine::otp('long_code')
    ->label('8-digit code')
    ->length(8);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// 4-digit PIN
UiEngine.otp('pin')
    .label('4-digit PIN')
    .length(4);

// 8-digit code
UiEngine.otp('long_code')
    .label('8-digit code')
    .length(8);"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- 4-digit PIN -->
<div class="so-otp-group" id="pin4">
    <div class="so-otp-inputs">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
    </div>
</div>

<!-- 8-digit code -->
<div class="so-otp-group" id="code8">
    <div class="so-otp-inputs">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
        <!-- ... 8 inputs total ... -->
    </div>
</div>'
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
                <!-- Live Demo -->
                <div class="so-mb-4">
                    <label class="so-form-label">Small (<code>.so-otp-group-sm</code>)</label>
                    <div class="so-otp-group so-otp-group-sm" id="demo-otp-sm">
                        <div class="so-otp-inputs">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        </div>
                    </div>
                </div>
                <div class="so-mb-4">
                    <label class="so-form-label">Default</label>
                    <div class="so-otp-group" id="demo-otp-default">
                        <div class="so-otp-inputs">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        </div>
                    </div>
                </div>
                <div>
                    <label class="so-form-label">Large (<code>.so-otp-group-lg</code>)</label>
                    <div class="so-otp-group so-otp-group-lg" id="demo-otp-lg">
                        <div class="so-otp-inputs">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        </div>
                    </div>
                </div>

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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Small OTP -->
<div class="so-otp-group so-otp-group-sm">
    <div class="so-otp-inputs">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
        <!-- ... -->
    </div>
</div>

<!-- Default OTP -->
<div class="so-otp-group">
    <div class="so-otp-inputs">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
        <!-- ... -->
    </div>
</div>

<!-- Large OTP -->
<div class="so-otp-group so-otp-group-lg">
    <div class="so-otp-inputs">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
        <!-- ... -->
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Error State -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Error State</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label">OTP with error state</label>
                    <div class="so-otp-group" id="demo-error-otp">
                        <div class="so-otp-inputs">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        </div>
                    </div>
                    <div class="so-btn-group so-mt-3">
                        <button type="button" class="so-btn so-btn-danger so-btn-sm" onclick="setOtpError(true)">Show Error</button>
                        <button type="button" class="so-btn so-btn-outline so-btn-sm" onclick="setOtpError(false)">Clear Error</button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('otp-error', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$otp = UiEngine::otp('code')
    ->label('OTP with error')
    ->length(6)
    ->error('Invalid code'); // Sets error state

echo \$otp->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const otp = SOOtpInput.getInstance('#errorOtp');

// Show error state
otp.setError(true);

// Clear error state
otp.setError(false);

// Validate against expected value
const isValid = otp.validate('123456');
if (!isValid) {
    // Error state is automatically set
}"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-otp-group" id="errorOtp">
    <div class="so-otp-inputs">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
        <!-- ... -->
    </div>
</div>

<!-- Error state adds .so-otp-error to inputs -->'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Event Handling -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Event Handling</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label">Type to see events</label>
                    <div class="so-otp-group" id="demo-event-otp">
                        <div class="so-otp-inputs">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                            <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        </div>
                    </div>
                    <div class="so-alert so-alert-info so-mt-3" id="eventLog">
                        <span class="material-icons">info</span>
                        <div>
                            <strong>Event Log:</strong> <span id="eventOutput">Type in the OTP field above...</span>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('otp-events', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$otp = UiEngine::otp('code')
    ->label('Verification Code')
    ->length(6)
    ->onComplete('handleComplete')
    ->onInput('handleInput');

echo \$otp->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const otp = SOOtpInput.getInstance('#eventOtp');

// Listen for value changes
otp.element.addEventListener('otp:change', (e) => {
    console.log('Current value:', e.detail.value);
    console.log('Changed index:', e.detail.index);
});

// Listen for completion
otp.element.addEventListener('otp:complete', (e) => {
    console.log('OTP complete:', e.detail.value);
    // Submit form or validate
});"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-otp-group" id="eventOtp">
    <div class="so-otp-inputs">
        <input type="text" class="so-otp-input" maxlength="1" inputmode="numeric">
        <!-- ... -->
    </div>
</div>

<!-- Events: otp:change, otp:complete -->'
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
                        <h5 class="so-mt-3">Core\\UiEngine\\Elements\\Form\\OtpInput</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine::otp(string $name)</code></td>
                                        <td>Create OTP input with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Length Methods</h6>
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
                                        <td><code>length(int $length)</code></td>
                                        <td>Set number of digits (default: 6)</td>
                                    </tr>
                                    <tr>
                                        <td><code>pin4()</code></td>
                                        <td>Set to 4-digit code</td>
                                    </tr>
                                    <tr>
                                        <td><code>pin6()</code></td>
                                        <td>Set to 6-digit code</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Input Type Methods</h6>
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
                                        <td><code>inputType(string $type)</code></td>
                                        <td>Set input type (text, number, password)</td>
                                    </tr>
                                    <tr>
                                        <td><code>numeric()</code></td>
                                        <td>Numbers only</td>
                                    </tr>
                                    <tr>
                                        <td><code>alphanumeric()</code></td>
                                        <td>Letters and numbers</td>
                                    </tr>
                                    <tr>
                                        <td><code>password()</code></td>
                                        <td>Show as password (masked)</td>
                                    </tr>
                                    <tr>
                                        <td><code>masked(bool $val = true)</code></td>
                                        <td>Mask input (show dots)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Behavior Methods</h6>
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
                                        <td><code>autoSubmit(bool $val = true)</code></td>
                                        <td>Auto-submit form when complete</td>
                                    </tr>
                                    <tr>
                                        <td><code>autoFocus(bool $val = true)</code></td>
                                        <td>Auto-focus first input on load</td>
                                    </tr>
                                    <tr>
                                        <td><code>allowPaste(bool $val = true)</code></td>
                                        <td>Allow paste from clipboard</td>
                                    </tr>
                                    <tr>
                                        <td><code>groupSize(int $size)</code></td>
                                        <td>Set group size for visual separation</td>
                                    </tr>
                                    <tr>
                                        <td><code>grouped()</code></td>
                                        <td>Group as XXX-XXX (size 3)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Variant Methods</h6>
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
                                        <td><code>variant(string $variant)</code></td>
                                        <td>Set style variant</td>
                                    </tr>
                                    <tr>
                                        <td><code>outline()</code></td>
                                        <td>Outline style</td>
                                    </tr>
                                    <tr>
                                        <td><code>filled()</code></td>
                                        <td>Filled style</td>
                                    </tr>
                                    <tr>
                                        <td><code>underline()</code></td>
                                        <td>Underline style</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods (from FormElement)</h6>
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
                                        <td><code>name(string $name)</code></td>
                                        <td>Set input name</td>
                                    </tr>
                                    <tr>
                                        <td><code>value(mixed $value)</code></td>
                                        <td>Set initial OTP value</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(string $label)</code></td>
                                        <td>Set input label</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(bool $val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(bool $val = true)</code></td>
                                        <td>Disable input</td>
                                    </tr>
                                    <tr>
                                        <td><code>readonly(bool $val = true)</code></td>
                                        <td>Make read-only</td>
                                    </tr>
                                    <tr>
                                        <td><code>error(string $message)</code></td>
                                        <td>Set error message</td>
                                    </tr>
                                    <tr>
                                        <td><code>help(string $text)</code></td>
                                        <td>Add help text</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render OTP element</td>
                                    </tr>
                                    <tr>
                                        <td><code>renderGroup()</code></td>
                                        <td>Render with label, help, error</td>
                                    </tr>
                                    <tr>
                                        <td><code>toArray()</code></td>
                                        <td>Export configuration array</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- JS UiEngine Reference -->
                    <div class="so-tab-pane so-fade" id="api-js" role="tabpanel">
                        <h5 class="so-mt-3">UiEngine.otp()</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine.otp(name)</code></td>
                                        <td>Create OTP input with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Length Methods</h6>
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
                                        <td><code>length(len)</code></td>
                                        <td>Set number of digits</td>
                                    </tr>
                                    <tr>
                                        <td><code>pin4()</code></td>
                                        <td>Set to 4-digit code</td>
                                    </tr>
                                    <tr>
                                        <td><code>pin6()</code></td>
                                        <td>Set to 6-digit code</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Input Type Methods</h6>
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
                                        <td><code>inputType(type)</code></td>
                                        <td>Set input type</td>
                                    </tr>
                                    <tr>
                                        <td><code>numeric()</code></td>
                                        <td>Numbers only</td>
                                    </tr>
                                    <tr>
                                        <td><code>alphanumeric()</code></td>
                                        <td>Letters and numbers</td>
                                    </tr>
                                    <tr>
                                        <td><code>password()</code></td>
                                        <td>Show as password</td>
                                    </tr>
                                    <tr>
                                        <td><code>masked(val = true)</code></td>
                                        <td>Mask input</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Behavior Methods</h6>
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
                                        <td><code>autoSubmit(val = true)</code></td>
                                        <td>Auto-submit when complete</td>
                                    </tr>
                                    <tr>
                                        <td><code>autoFocus(val = true)</code></td>
                                        <td>Auto-focus first input</td>
                                    </tr>
                                    <tr>
                                        <td><code>allowPaste(val = true)</code></td>
                                        <td>Allow paste from clipboard</td>
                                    </tr>
                                    <tr>
                                        <td><code>groupSize(size)</code></td>
                                        <td>Set group size</td>
                                    </tr>
                                    <tr>
                                        <td><code>grouped()</code></td>
                                        <td>Group as XXX-XXX</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Variant Methods</h6>
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
                                        <td><code>variant(v)</code></td>
                                        <td>Set style variant</td>
                                    </tr>
                                    <tr>
                                        <td><code>outline()</code></td>
                                        <td>Outline style</td>
                                    </tr>
                                    <tr>
                                        <td><code>filled()</code></td>
                                        <td>Filled style</td>
                                    </tr>
                                    <tr>
                                        <td><code>underline()</code></td>
                                        <td>Underline style</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods (from FormElement)</h6>
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
                                        <td><code>name(name)</code></td>
                                        <td>Set input name</td>
                                    </tr>
                                    <tr>
                                        <td><code>value(value)</code></td>
                                        <td>Set initial OTP value</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(label)</code></td>
                                        <td>Set input label</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(val = true)</code></td>
                                        <td>Disable input</td>
                                    </tr>
                                    <tr>
                                        <td><code>readonly(val = true)</code></td>
                                        <td>Make read-only</td>
                                    </tr>
                                    <tr>
                                        <td><code>error(message)</code></td>
                                        <td>Set error message</td>
                                    </tr>
                                    <tr>
                                        <td><code>help(text)</code></td>
                                        <td>Add help text</td>
                                    </tr>
                                    <tr>
                                        <td><code>id(id)</code></td>
                                        <td>Set element ID</td>
                                    </tr>
                                    <tr>
                                        <td><code>addClass(className)</code></td>
                                        <td>Add CSS class</td>
                                    </tr>
                                    <tr>
                                        <td><code>attr(name, value)</code></td>
                                        <td>Set custom attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>data(key, value)</code></td>
                                        <td>Set data-* attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>toHtml()</code></td>
                                        <td>Get HTML string</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render to DOM element</td>
                                    </tr>
                                    <tr>
                                        <td><code>renderGroup()</code></td>
                                        <td>Render with label, help, error</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Runtime Instance Methods (SOOtpInput)</h6>
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
                                        <td><code>getValue()</code></td>
                                        <td>Returns combined OTP value</td>
                                    </tr>
                                    <tr>
                                        <td><code>setValue(value)</code></td>
                                        <td>Sets OTP value and updates UI</td>
                                    </tr>
                                    <tr>
                                        <td><code>clear()</code></td>
                                        <td>Clears all inputs</td>
                                    </tr>
                                    <tr>
                                        <td><code>focus()</code></td>
                                        <td>Focuses on first empty input</td>
                                    </tr>
                                    <tr>
                                        <td><code>setError(hasError)</code></td>
                                        <td>Sets or removes error state</td>
                                    </tr>
                                    <tr>
                                        <td><code>isComplete()</code></td>
                                        <td>Returns true if all inputs filled</td>
                                    </tr>
                                    <tr>
                                        <td><code>validate(expected)</code></td>
                                        <td>Validates OTP against expected value</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Events</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Event</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>otp:change</code></td>
                                        <td>Fired on value change (detail: {value, index})</td>
                                    </tr>
                                    <tr>
                                        <td><code>otp:complete</code></td>
                                        <td>Fired when all digits entered (detail: {value})</td>
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
// Initialize OTP inputs after DOM ready
document.addEventListener('DOMContentLoaded', () => {
    if (typeof SOOtpInput !== 'undefined') {
        initOtpDemos();
    } else {
        setTimeout(initOtpDemos, 100);
    }
});

function initOtpDemos() {
    // Initialize all OTP inputs with autoFocus disabled
    document.querySelectorAll('.so-otp-group').forEach(el => {
        SOOtpInput.getInstance(el, { autoFocus: false });
    });

    // Setup event handling demo
    const eventOtp = document.getElementById('demo-event-otp');
    const eventOutput = document.getElementById('eventOutput');

    if (eventOtp) {
        eventOtp.addEventListener('otp:change', (e) => {
            eventOutput.textContent = `Change: value="${e.detail.value}", index=${e.detail.index ?? 'paste'}`;
        });

        eventOtp.addEventListener('otp:complete', (e) => {
            eventOutput.innerHTML = `<strong class="so-text-success">Complete!</strong> value="${e.detail.value}"`;
        });
    }
}

// Error state demo
function setOtpError(hasError) {
    const otp = SOOtpInput.getInstance('#demo-error-otp');
    otp.setError(hasError);
}
</script>
