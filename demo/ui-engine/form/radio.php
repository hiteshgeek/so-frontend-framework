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
        <div class="so-page-header-left">
            <h1 class="so-page-title">Radio</h1>
            <p class="so-page-subtitle">Radio button element for selecting a single option from a group of choices.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Radio Group -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Radio Group</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <label class="so-form-label so-mb-2">Select your gender</label>
                <div class="so-radio-group so-radio-group-vertical">
                    <label class="so-radio">
                        <input type="radio" name="gender" value="male">
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Male</span>
                    </label>
                    <label class="so-radio">
                        <input type="radio" name="gender" value="female">
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Female</span>
                    </label>
                    <label class="so-radio">
                        <input type="radio" name="gender" value="other">
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Other</span>
                    </label>
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
    <label class="so-form-label so-mb-2">Select your gender</label>
    <div class="so-radio-group so-radio-group-vertical">
        <label class="so-radio">
            <input type="radio" name="gender" value="male">
            <span class="so-radio-circle"></span>
            <span class="so-radio-label">Male</span>
        </label>
        <label class="so-radio">
            <input type="radio" name="gender" value="female">
            <span class="so-radio-circle"></span>
            <span class="so-radio-label">Female</span>
        </label>
        <label class="so-radio">
            <input type="radio" name="gender" value="other">
            <span class="so-radio-circle"></span>
            <span class="so-radio-label">Other</span>
        </label>
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
                <label class="so-form-label so-mb-2">Choose a plan</label>
                <div class="so-radio-group so-radio-group-inline">
                    <label class="so-radio">
                        <input type="radio" name="plan" value="basic">
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Basic</span>
                    </label>
                    <label class="so-radio">
                        <input type="radio" name="plan" value="pro">
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Pro</span>
                    </label>
                    <label class="so-radio">
                        <input type="radio" name="plan" value="enterprise">
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Enterprise</span>
                    </label>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<label class="so-form-label">Choose a plan</label>
<div class="so-radio-group so-radio-group-inline">
    <label class="so-radio">
        <input type="radio" name="plan" value="basic">
        <span class="so-radio-circle"></span>
        <span class="so-radio-label">Basic</span>
    </label>
    <label class="so-radio">
        <input type="radio" name="plan" value="pro">
        <span class="so-radio-circle"></span>
        <span class="so-radio-label">Pro</span>
    </label>
    <label class="so-radio">
        <input type="radio" name="plan" value="enterprise">
        <span class="so-radio-circle"></span>
        <span class="so-radio-label">Enterprise</span>
    </label>
</div>'
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
                <label class="so-form-label so-mb-2">Notification preference</label>
                <div class="so-radio-group so-radio-group-vertical">
                    <label class="so-radio">
                        <input type="radio" name="notification" value="email" checked>
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Email</span>
                    </label>
                    <label class="so-radio">
                        <input type="radio" name="notification" value="sms">
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">SMS</span>
                    </label>
                    <label class="so-radio">
                        <input type="radio" name="notification" value="push">
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Push notification</span>
                    </label>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<label class="so-form-label">Notification preference</label>
<div class="so-radio-group so-radio-group-vertical">
    <label class="so-radio">
        <input type="radio" name="notification" value="email" checked>
        <span class="so-radio-circle"></span>
        <span class="so-radio-label">Email</span>
    </label>
    <label class="so-radio">
        <input type="radio" name="notification" value="sms">
        <span class="so-radio-circle"></span>
        <span class="so-radio-label">SMS</span>
    </label>
    <label class="so-radio">
        <input type="radio" name="notification" value="push">
        <span class="so-radio-circle"></span>
        <span class="so-radio-label">Push notification</span>
    </label>
</div>'
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
                <label class="so-form-label so-mb-2">Unavailable options</label>
                <div class="so-radio-group so-radio-group-vertical">
                    <label class="so-radio">
                        <input type="radio" name="tier" value="free" checked>
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Free tier</span>
                    </label>
                    <label class="so-radio so-disabled">
                        <input type="radio" name="tier" value="premium" disabled>
                        <span class="so-radio-circle"></span>
                        <span class="so-radio-label">Premium tier (Coming soon)</span>
                    </label>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<label class="so-form-label">Unavailable options</label>
<div class="so-radio-group so-radio-group-vertical">
    <label class="so-radio">
        <input type="radio" name="tier" value="free" checked>
        <span class="so-radio-circle"></span>
        <span class="so-radio-label">Free tier</span>
    </label>
    <label class="so-radio so-disabled">
        <input type="radio" name="tier" value="premium" disabled>
        <span class="so-radio-circle"></span>
        <span class="so-radio-label">Premium tier (Coming soon)</span>
    </label>
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
                <!-- API Tabs -->
                <div class="so-tabs" role="tablist" data-so-tabs>
                    <button class="so-tab so-active" role="tab" data-so-target="#api-php">PHP Class</button>
                    <button class="so-tab" role="tab" data-so-target="#api-js">JS UiEngine</button>
                </div>

                <div class="so-tab-content">
                    <!-- PHP Class Reference -->
                    <div class="so-tab-pane so-fade so-show so-active" id="api-php" role="tabpanel">
                        <h5 class="so-mt-3">Core\\UiEngine\\Elements\\Form\\Radio</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine::radio(string $name)</code></td>
                                        <td>Create radio group with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Options Methods</h6>
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
                                        <td><code>options(array $options)</code></td>
                                        <td>Set radio options (key-value or array of {value, label})</td>
                                    </tr>
                                    <tr>
                                        <td><code>option(mixed $value, string $label)</code></td>
                                        <td>Add a single option</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Style Methods</h6>
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
                                        <td><code>inline(bool $val = true)</code></td>
                                        <td>Display radio buttons inline</td>
                                    </tr>
                                    <tr>
                                        <td><code>buttonStyle(bool $val = true)</code></td>
                                        <td>Use toggle button style</td>
                                    </tr>
                                    <tr>
                                        <td><code>buttonVariant(string $variant)</code></td>
                                        <td>Set button variant (outline-primary, etc.)</td>
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
                                        <td>Set selected value</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(string $label)</code></td>
                                        <td>Set group label</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(bool $val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(bool $val = true)</code></td>
                                        <td>Disable all options</td>
                                    </tr>
                                    <tr>
                                        <td><code>help(string $text)</code></td>
                                        <td>Add help text</td>
                                    </tr>
                                    <tr>
                                        <td><code>error(string $message)</code></td>
                                        <td>Set error message</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render radio group</td>
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
                        <h5 class="so-mt-3">UiEngine.radio()</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine.radio(name)</code></td>
                                        <td>Create radio group with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Options Methods</h6>
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
                                        <td><code>options(opts)</code></td>
                                        <td>Set radio options</td>
                                    </tr>
                                    <tr>
                                        <td><code>option(value, label)</code></td>
                                        <td>Add a single option</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">State Methods</h6>
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
                                        <td><code>checked(val = true)</code></td>
                                        <td>Set checked state (single radio)</td>
                                    </tr>
                                    <tr>
                                        <td><code>isChecked()</code></td>
                                        <td>Check if currently checked</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Style Methods</h6>
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
                                        <td><code>inline(val = true)</code></td>
                                        <td>Display inline</td>
                                    </tr>
                                    <tr>
                                        <td><code>buttonStyle(val = true)</code></td>
                                        <td>Use toggle button style</td>
                                    </tr>
                                    <tr>
                                        <td><code>buttonVariant(variant)</code></td>
                                        <td>Set button variant</td>
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
                                        <td>Set selected value</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(label)</code></td>
                                        <td>Set group label</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(val = true)</code></td>
                                        <td>Disable all options</td>
                                    </tr>
                                    <tr>
                                        <td><code>help(text)</code></td>
                                        <td>Add help text</td>
                                    </tr>
                                    <tr>
                                        <td><code>error(message)</code></td>
                                        <td>Set error message</td>
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
