<?php
/**
 * SixOrbit UI Demo - Stepper
 */
$pageTitle = 'Stepper';
$pageDescription = 'Step-by-step wizard components for multi-step processes';

require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/sidebar.php';
require_once '../includes/navbar.php';
?>

<!-- Main Content -->
<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title"><?= htmlspecialchars($pageTitle) ?></h1>
            <p class="so-page-subtitle"><?= htmlspecialchars($pageDescription) ?></p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">

<!-- Horizontal Stepper -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Horizontal Stepper</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Basic horizontal stepper with numbered steps.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-stepper so-stepper-horizontal">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Account Setup</div>
                            <div class="so-step-subtitle">Create your account</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Personal Info</div>
                            <div class="so-step-subtitle">Enter your details</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Payment</div>
                            <div class="so-step-subtitle">Add payment method</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">4</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Confirmation</div>
                            <div class="so-step-subtitle">Review and confirm</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-stepper so-stepper-horizontal"&gt;
    &lt;div class="so-step so-step-completed"&gt;
        &lt;div class="so-step-icon"&gt;
            &lt;span class="material-icons"&gt;check&lt;/span&gt;
        &lt;/div&gt;
        &lt;div class="so-step-content"&gt;
            &lt;div class="so-step-title"&gt;Account Setup&lt;/div&gt;
            &lt;div class="so-step-subtitle"&gt;Create your account&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="so-step-connector"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-step so-step-active"&gt;
        &lt;div class="so-step-icon"&gt;2&lt;/div&gt;
        &lt;div class="so-step-content"&gt;...&lt;/div&gt;
        &lt;div class="so-step-connector"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-step"&gt;...&lt;/div&gt;
&lt;/div&gt;

&lt;!-- States: so-step-completed, so-step-active, so-step-error, so-step-disabled --&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Numbered Stepper -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Numbered Stepper</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Stepper with visible step numbers and titles only.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-stepper so-stepper-horizontal so-stepper-numbered">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">1</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Cart</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Shipping</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Payment</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">4</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Confirm</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-stepper so-stepper-horizontal so-stepper-numbered"&gt;
    &lt;div class="so-step so-step-completed"&gt;
        &lt;div class="so-step-icon"&gt;1&lt;/div&gt;
        &lt;div class="so-step-content"&gt;
            &lt;div class="so-step-title"&gt;Cart&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="so-step-connector"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-step so-step-active"&gt;...&lt;/div&gt;
    &lt;div class="so-step"&gt;...&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Vertical Stepper -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Vertical Stepper</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Vertical layout with expanded content areas.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-stepper so-stepper-vertical">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-step-connector"></div>
                        <div class="so-step-content">
                            <div class="so-step-title">Select campaign settings</div>
                            <div class="so-step-subtitle">Configure your campaign type and budget</div>
                            <div class="so-step-body">
                                <p class="so-text-muted">Your campaign has been configured with a daily budget of $50.</p>
                            </div>
                        </div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-connector"></div>
                        <div class="so-step-content">
                            <div class="so-step-title">Create an ad group</div>
                            <div class="so-step-subtitle">Define your target audience</div>
                            <div class="so-step-body">
                                <div class="so-form-group">
                                    <label class="so-form-label">Ad group name</label>
                                    <input type="text" class="so-form-control" placeholder="Enter ad group name">
                                </div>
                                <div class="so-d-flex so-gap-2 so-mt-3">
                                    <button class="so-btn so-btn-primary">Continue</button>
                                    <button class="so-btn so-btn-outline">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-connector"></div>
                        <div class="so-step-content">
                            <div class="so-step-title">Create an ad</div>
                            <div class="so-step-subtitle">Design your advertisement</div>
                        </div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">4</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Review and launch</div>
                            <div class="so-step-subtitle">Preview and publish your campaign</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-stepper so-stepper-vertical"&gt;
    &lt;div class="so-step so-step-completed"&gt;
        &lt;div class="so-step-icon"&gt;
            &lt;span class="material-icons"&gt;check&lt;/span&gt;
        &lt;/div&gt;
        &lt;div class="so-step-connector"&gt;&lt;/div&gt;
        &lt;div class="so-step-content"&gt;
            &lt;div class="so-step-title"&gt;Step Title&lt;/div&gt;
            &lt;div class="so-step-subtitle"&gt;Step description&lt;/div&gt;
            &lt;div class="so-step-body"&gt;
                &lt;!-- Step content here --&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-step so-step-active"&gt;...&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Stepper with Icons -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Stepper with Icons</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Custom icons for each step instead of numbers.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-stepper so-stepper-horizontal so-stepper-icons">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">
                            <span class="material-icons">shopping_cart</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Cart</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">
                            <span class="material-icons">local_shipping</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Shipping</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">
                            <span class="material-icons">payment</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Payment</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">
                            <span class="material-icons">verified</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Done</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-stepper so-stepper-horizontal so-stepper-icons"&gt;
    &lt;div class="so-step so-step-completed"&gt;
        &lt;div class="so-step-icon"&gt;
            &lt;span class="material-icons"&gt;shopping_cart&lt;/span&gt;
        &lt;/div&gt;
        &lt;div class="so-step-content"&gt;
            &lt;div class="so-step-title"&gt;Cart&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="so-step-connector"&gt;&lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- More steps... --&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Error State -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Error State</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Stepper with an error state on a step.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-stepper so-stepper-horizontal">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Account Info</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-error">
                        <div class="so-step-icon">
                            <span class="material-icons">priority_high</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Payment Failed</div>
                            <div class="so-step-subtitle">Please update your payment method</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-disabled">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Confirmation</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-step so-step-error"&gt;
    &lt;div class="so-step-icon"&gt;
        &lt;span class="material-icons"&gt;priority_high&lt;/span&gt;
    &lt;/div&gt;
    &lt;div class="so-step-content"&gt;
        &lt;div class="so-step-title"&gt;Payment Failed&lt;/div&gt;
        &lt;div class="so-step-subtitle"&gt;Please update your payment method&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-step-connector"&gt;&lt;/div&gt;
&lt;/div&gt;

&lt;!-- Disabled step --&gt;
&lt;div class="so-step so-step-disabled"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Size Variants -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Size Variants</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Small and large stepper variants.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <h6 class="so-text-muted so-mb-3">Small Stepper</h6>
                <div class="so-stepper so-stepper-horizontal so-stepper-sm so-mb-5">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon"><span class="material-icons">check</span></div>
                        <div class="so-step-content"><div class="so-step-title">Step 1</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content"><div class="so-step-title">Step 2</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content"><div class="so-step-title">Step 3</div></div>
                    </div>
                </div>

                <h6 class="so-text-muted so-mb-3">Large Stepper</h6>
                <div class="so-stepper so-stepper-horizontal so-stepper-lg">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon"><span class="material-icons">check</span></div>
                        <div class="so-step-content"><div class="so-step-title">Step 1</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content"><div class="so-step-title">Step 2</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content"><div class="so-step-title">Step 3</div></div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Small stepper --&gt;
&lt;div class="so-stepper so-stepper-horizontal so-stepper-sm"&gt;...&lt;/div&gt;

&lt;!-- Large stepper --&gt;
&lt;div class="so-stepper so-stepper-horizontal so-stepper-lg"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Outline Variant -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Outline Variant</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Stepper with outlined step icons.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-stepper so-stepper-horizontal so-stepper-outline">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Account</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Profile</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Settings</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">4</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Finish</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-stepper so-stepper-horizontal so-stepper-outline"&gt;
    &lt;!-- Steps with outlined icons --&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Light (Soft) Variant -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Light (Soft) Variant</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Stepper with soft background step icons.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-stepper so-stepper-horizontal so-stepper-light">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Account</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Profile</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Settings</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">4</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Finish</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-stepper so-stepper-horizontal so-stepper-light"&gt;
    &lt;!-- Steps with soft background icons --&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Color Variants -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Color Variants</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Steppers in different colors.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <h6 class="so-text-muted so-mb-3">Primary</h6>
                <div class="so-stepper so-stepper-horizontal so-stepper-primary so-mb-4">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon"><span class="material-icons">check</span></div>
                        <div class="so-step-content"><div class="so-step-title">Step 1</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content"><div class="so-step-title">Step 2</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content"><div class="so-step-title">Step 3</div></div>
                    </div>
                </div>

                <h6 class="so-text-muted so-mb-3">Success</h6>
                <div class="so-stepper so-stepper-horizontal so-stepper-success so-mb-4">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon"><span class="material-icons">check</span></div>
                        <div class="so-step-content"><div class="so-step-title">Step 1</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content"><div class="so-step-title">Step 2</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content"><div class="so-step-title">Step 3</div></div>
                    </div>
                </div>

                <h6 class="so-text-muted so-mb-3">Warning</h6>
                <div class="so-stepper so-stepper-horizontal so-stepper-warning so-mb-4">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon"><span class="material-icons">check</span></div>
                        <div class="so-step-content"><div class="so-step-title">Step 1</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content"><div class="so-step-title">Step 2</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content"><div class="so-step-title">Step 3</div></div>
                    </div>
                </div>

                <h6 class="so-text-muted so-mb-3">Info (Outline)</h6>
                <div class="so-stepper so-stepper-horizontal so-stepper-info so-stepper-outline so-mb-4">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon"><span class="material-icons">check</span></div>
                        <div class="so-step-content"><div class="so-step-title">Step 1</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content"><div class="so-step-title">Step 2</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content"><div class="so-step-title">Step 3</div></div>
                    </div>
                </div>

                <h6 class="so-text-muted so-mb-3">Danger (Light)</h6>
                <div class="so-stepper so-stepper-horizontal so-stepper-danger so-stepper-light">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon"><span class="material-icons">check</span></div>
                        <div class="so-step-content"><div class="so-step-title">Step 1</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">2</div>
                        <div class="so-step-content"><div class="so-step-title">Step 2</div></div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content"><div class="so-step-title">Step 3</div></div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Color variants --&gt;
&lt;div class="so-stepper so-stepper-horizontal so-stepper-primary"&gt;...&lt;/div&gt;
&lt;div class="so-stepper so-stepper-horizontal so-stepper-success"&gt;...&lt;/div&gt;
&lt;div class="so-stepper so-stepper-horizontal so-stepper-warning"&gt;...&lt;/div&gt;
&lt;div class="so-stepper so-stepper-horizontal so-stepper-danger"&gt;...&lt;/div&gt;
&lt;div class="so-stepper so-stepper-horizontal so-stepper-info"&gt;...&lt;/div&gt;

&lt;!-- Combined with variants --&gt;
&lt;div class="so-stepper so-stepper-horizontal so-stepper-info so-stepper-outline"&gt;...&lt;/div&gt;
&lt;div class="so-stepper so-stepper-horizontal so-stepper-danger so-stepper-light"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Clickable Steps -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Clickable Steps</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Interactive stepper where users can click to navigate between completed steps.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-stepper so-stepper-horizontal so-stepper-clickable">
                    <div class="so-step so-step-completed" onclick="alert('Go to step 1')">
                        <div class="so-step-icon">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Completed</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-completed" onclick="alert('Go to step 2')">
                        <div class="so-step-icon">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Completed</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Current</div>
                        </div>
                        <div class="so-step-connector"></div>
                    </div>
                    <div class="so-step so-step-disabled">
                        <div class="so-step-icon">4</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Locked</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-stepper so-stepper-horizontal so-stepper-clickable"&gt;
    &lt;div class="so-step so-step-completed" onclick="goToStep(1)"&gt;...&lt;/div&gt;
    &lt;div class="so-step so-step-completed" onclick="goToStep(2)"&gt;...&lt;/div&gt;
    &lt;div class="so-step so-step-active"&gt;...&lt;/div&gt;
    &lt;div class="so-step so-step-disabled"&gt;...&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Progress Stepper -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Progress Stepper</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Minimal progress-style stepper.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-stepper so-stepper-progress">
                    <div class="so-step so-step-completed">
                        <div class="so-step-dot"></div>
                        <div class="so-step-label">Order Placed</div>
                    </div>
                    <div class="so-step so-step-completed">
                        <div class="so-step-dot"></div>
                        <div class="so-step-label">Processing</div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-dot"></div>
                        <div class="so-step-label">Shipped</div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-dot"></div>
                        <div class="so-step-label">Delivered</div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-stepper so-stepper-progress"&gt;
    &lt;div class="so-step so-step-completed"&gt;
        &lt;div class="so-step-dot"&gt;&lt;/div&gt;
        &lt;div class="so-step-label"&gt;Order Placed&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-step so-step-completed"&gt;
        &lt;div class="so-step-dot"&gt;&lt;/div&gt;
        &lt;div class="so-step-label"&gt;Processing&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-step so-step-active"&gt;
        &lt;div class="so-step-dot"&gt;&lt;/div&gt;
        &lt;div class="so-step-label"&gt;Shipped&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-step"&gt;
        &lt;div class="so-step-dot"&gt;&lt;/div&gt;
        &lt;div class="so-step-label"&gt;Delivered&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

    </div>
</main>

<script>
function copyCode(button) {
    const codeBlock = button.closest('.so-code-block');
    const code = codeBlock.querySelector('.so-code-content code').textContent;
    navigator.clipboard.writeText(code).then(() => {
        button.innerHTML = '<span class="material-icons">check</span>';
        setTimeout(() => {
            button.innerHTML = '<span class="material-icons">content_copy</span>';
        }, 2000);
    });
}
</script>

<?php require_once '../includes/footer.php'; ?>
