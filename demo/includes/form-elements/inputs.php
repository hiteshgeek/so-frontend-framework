            <div class="so-tab-pane fade" id="pane-inputs" role="tabpanel">

                <!-- Section 1: Basic Inputs -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Basic Inputs</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label" for="input-default">Default Input</label>
                                <input type="text" id="input-default" class="so-form-control" placeholder="Enter text...">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-with-value">With Value</label>
                                <input type="text" id="input-with-value" class="so-form-control" value="John Doe">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label required" for="input-required">Required Field</label>
                                <input type="text" id="input-required" class="so-form-control" placeholder="This field is required" required>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-password">Password Input</label>
                                <input type="password" id="input-password" class="so-form-control" placeholder="Enter password">
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-group"&gt;
    &lt;label class="so-form-label" for="my-input"&gt;Default Input&lt;/label&gt;
    &lt;input type="text" id="my-input" class="so-form-control" placeholder="Enter text..."&gt;
&lt;/div&gt;

&lt;div class="so-form-group"&gt;
    &lt;label class="so-form-label required" for="required-input"&gt;Required Field&lt;/label&gt;
    &lt;input type="text" id="required-input" class="so-form-control" placeholder="This field is required" required&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Input Sizes -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Input Sizes</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label" for="input-small">Small Input</label>
                                <input type="text" id="input-small" class="so-form-control so-form-control-sm" placeholder="Small input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-default-size">Default Input</label>
                                <input type="text" id="input-default-size" class="so-form-control" placeholder="Default input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-large">Large Input</label>
                                <input type="text" id="input-large" class="so-form-control so-form-control-lg" placeholder="Large input">
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;label class="so-form-label" for="small"&gt;Small&lt;/label&gt;
&lt;input type="text" id="small" class="so-form-control so-form-control-sm" placeholder="Small"&gt;

&lt;label class="so-form-label" for="default"&gt;Default&lt;/label&gt;
&lt;input type="text" id="default" class="so-form-control" placeholder="Default"&gt;

&lt;label class="so-form-label" for="large"&gt;Large&lt;/label&gt;
&lt;input type="text" id="large" class="so-form-control so-form-control-lg" placeholder="Large"&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Input with Icons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Input with Icons</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label" for="input-search">Left Icon</label>
                                <div class="so-input-wrapper">
                                    <span class="so-input-icon"><span class="material-icons">search</span></span>
                                    <input type="text" id="input-search" class="so-form-control" placeholder="Search...">
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-email-icon">Right Icon</label>
                                <div class="so-input-wrapper icon-right">
                                    <input type="text" id="input-email-icon" class="so-form-control" placeholder="Email address">
                                    <span class="so-input-icon"><span class="material-icons">email</span></span>
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-clearable">Clearable Input</label>
                                <div class="so-input-wrapper icon-right">
                                    <input type="text" id="input-clearable" class="so-form-control" placeholder="Type to clear..." value="Clear me">
                                    <button type="button" class="so-input-clear" aria-label="Clear input">
                                        <span class="material-icons">close</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Left Icon --&gt;
&lt;label class="so-form-label" for="search"&gt;Search&lt;/label&gt;
&lt;div class="so-input-wrapper"&gt;
    &lt;span class="so-input-icon"&gt;&lt;span class="material-icons"&gt;search&lt;/span&gt;&lt;/span&gt;
    &lt;input type="text" id="search" class="so-form-control" placeholder="Search..."&gt;
&lt;/div&gt;

&lt;!-- Right Icon --&gt;
&lt;label class="so-form-label" for="email"&gt;Email&lt;/label&gt;
&lt;div class="so-input-wrapper icon-right"&gt;
    &lt;input type="text" id="email" class="so-form-control" placeholder="Email"&gt;
    &lt;span class="so-input-icon"&gt;&lt;span class="material-icons"&gt;email&lt;/span&gt;&lt;/span&gt;
&lt;/div&gt;

&lt;!-- Clearable Input --&gt;
&lt;label class="so-form-label" for="clearable"&gt;Clearable&lt;/label&gt;
&lt;div class="so-input-wrapper icon-right"&gt;
    &lt;input type="text" id="clearable" class="so-form-control" placeholder="Type..." value="Clear me"&gt;
    &lt;button type="button" class="so-input-clear" aria-label="Clear input"&gt;
        &lt;span class="material-icons"&gt;close&lt;/span&gt;
    &lt;/button&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 4: Contextual Inputs -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Contextual Inputs</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label" for="input-ctx-primary">Primary</label>
                                <input type="text" id="input-ctx-primary" class="so-form-control so-form-control-primary" placeholder="Primary input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-ctx-secondary">Secondary</label>
                                <input type="text" id="input-ctx-secondary" class="so-form-control so-form-control-secondary" placeholder="Secondary input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-ctx-success">Success</label>
                                <input type="text" id="input-ctx-success" class="so-form-control so-form-control-success" placeholder="Success input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-ctx-danger">Danger</label>
                                <input type="text" id="input-ctx-danger" class="so-form-control so-form-control-danger" placeholder="Danger input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-ctx-warning">Warning</label>
                                <input type="text" id="input-ctx-warning" class="so-form-control so-form-control-warning" placeholder="Warning input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-ctx-info">Info</label>
                                <input type="text" id="input-ctx-info" class="so-form-control so-form-control-info" placeholder="Info input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-ctx-light">Light</label>
                                <input type="text" id="input-ctx-light" class="so-form-control so-form-control-light" placeholder="Light input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-ctx-dark">Dark</label>
                                <input type="text" id="input-ctx-dark" class="so-form-control so-form-control-dark" placeholder="Dark input">
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;label class="so-form-label" for="primary"&gt;Primary&lt;/label&gt;
&lt;input type="text" id="primary" class="so-form-control so-form-control-primary" placeholder="Primary"&gt;

&lt;label class="so-form-label" for="secondary"&gt;Secondary&lt;/label&gt;
&lt;input type="text" id="secondary" class="so-form-control so-form-control-secondary" placeholder="Secondary"&gt;

&lt;label class="so-form-label" for="success"&gt;Success&lt;/label&gt;
&lt;input type="text" id="success" class="so-form-control so-form-control-success" placeholder="Success"&gt;

&lt;label class="so-form-label" for="danger"&gt;Danger&lt;/label&gt;
&lt;input type="text" id="danger" class="so-form-control so-form-control-danger" placeholder="Danger"&gt;

&lt;label class="so-form-label" for="warning"&gt;Warning&lt;/label&gt;
&lt;input type="text" id="warning" class="so-form-control so-form-control-warning" placeholder="Warning"&gt;

&lt;label class="so-form-label" for="info"&gt;Info&lt;/label&gt;
&lt;input type="text" id="info" class="so-form-control so-form-control-info" placeholder="Info"&gt;

&lt;label class="so-form-label" for="light"&gt;Light&lt;/label&gt;
&lt;input type="text" id="light" class="so-form-control so-form-control-light" placeholder="Light"&gt;

&lt;label class="so-form-label" for="dark"&gt;Dark&lt;/label&gt;
&lt;input type="text" id="dark" class="so-form-control so-form-control-dark" placeholder="Dark"&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 5: Validation States -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Validation States</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                            <div class="so-form-group has-error" id="emailGroup">
                                <label class="so-form-label" for="input-error-state">Error State</label>
                                <input type="email" id="input-error-state" class="so-form-control" value="invalid-email" aria-describedby="emailError">
                                <div class="so-form-error" id="emailError">
                                    <span class="material-icons">error</span>
                                    Please enter a valid email address
                                </div>
                            </div>

                            <div class="so-form-group has-success" id="usernameGroup">
                                <label class="so-form-label" for="input-success-state">Success State</label>
                                <input type="text" id="input-success-state" class="so-form-control" value="johndoe" aria-describedby="usernameSuccess">
                                <div class="so-form-success" id="usernameSuccess">
                                    <span class="material-icons">check_circle</span>
                                    Username is available
                                </div>
                            </div>

                            <div class="so-form-group has-warning" id="passwordGroup">
                                <label class="so-form-label" for="input-warning-state">Warning State</label>
                                <input type="password" id="input-warning-state" class="so-form-control" value="weak123" aria-describedby="passwordWarning">
                                <div class="so-form-warning" id="passwordWarning">
                                    <span class="material-icons">warning</span>
                                    Password is weak, consider adding special characters
                                </div>
                            </div>

                            <div class="so-form-group has-info" id="phoneGroup">
                                <label class="so-form-label" for="input-info-state">Info State</label>
                                <input type="tel" id="input-info-state" class="so-form-control" placeholder="Enter phone number" aria-describedby="phoneInfo">
                                <div class="so-form-info" id="phoneInfo">
                                    <span class="material-icons">info</span>
                                    We'll send a verification code to this number
                                </div>
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Error State --&gt;
&lt;div class="so-form-group has-error"&gt;
    &lt;label class="so-form-label" for="email"&gt;Email&lt;/label&gt;
    &lt;input type="email" id="email" class="so-form-control" value="invalid-email" aria-describedby="email-error"&gt;
    &lt;div class="so-form-error" id="email-error"&gt;
        &lt;span class="material-icons"&gt;error&lt;/span&gt;
        Please enter a valid email address
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Success State --&gt;
&lt;div class="so-form-group has-success"&gt;
    &lt;label class="so-form-label" for="username"&gt;Username&lt;/label&gt;
    &lt;input type="text" id="username" class="so-form-control" value="johndoe" aria-describedby="username-success"&gt;
    &lt;div class="so-form-success" id="username-success"&gt;
        &lt;span class="material-icons"&gt;check_circle&lt;/span&gt;
        Username is available
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Warning State --&gt;
&lt;div class="so-form-group has-warning"&gt;
    &lt;label class="so-form-label" for="password"&gt;Password&lt;/label&gt;
    &lt;input type="password" id="password" class="so-form-control" value="weak" aria-describedby="password-warning"&gt;
    &lt;div class="so-form-warning" id="password-warning"&gt;
        &lt;span class="material-icons"&gt;warning&lt;/span&gt;
        Password is weak
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Info State --&gt;
&lt;div class="so-form-group has-info"&gt;
    &lt;label class="so-form-label" for="phone"&gt;Phone&lt;/label&gt;
    &lt;input type="tel" id="phone" class="so-form-control" placeholder="Enter phone" aria-describedby="phone-info"&gt;
    &lt;div class="so-form-info" id="phone-info"&gt;
        &lt;span class="material-icons"&gt;info&lt;/span&gt;
        We'll send a verification code
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>

                        <h4 class="so-mt-4 so-mb-3">JavaScript Validation Helpers</h4>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-javascript">// Show error state
SOForms.showError('email', 'Please enter a valid email');

// Show success state
SOForms.showSuccess('username', 'Username is available');

// Show warning state
SOForms.showWarning('password', 'Password is weak');

// Show info state
SOForms.showInfo('phone', 'We will send a verification code');

// Clear all validation states
SOForms.clearValidation('email');

// Clear error only
SOForms.clearError('email');</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 6: Help Text & Hints -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Help Text &amp; Hints</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label" for="input-help-text">With Help Text</label>
                                <input type="text" id="input-help-text" class="so-form-control" placeholder="Enter username" aria-describedby="help-text-hint">
                                <div class="so-form-hint" id="help-text-hint">
                                    <span class="material-icons">help_outline</span>
                                    Username must be 3-20 characters long
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-char-counter">With Character Counter</label>
                                <input type="text" id="input-char-counter" class="so-form-control" placeholder="Enter bio" maxlength="100" aria-describedby="char-counter-hint">
                                <div class="so-form-hint so-form-hint-counter" id="char-counter-hint">
                                    0 / 100 characters
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-inline-hint">
                                    Inline Hint
                                    <span class="so-form-hint so-form-hint-inline">
                                        <span class="material-icons">info</span>
                                        Optional
                                    </span>
                                </label>
                                <input type="text" id="input-inline-hint" class="so-form-control" placeholder="Enter middle name">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-multi-hints">Multiple Hints</label>
                                <input type="password" id="input-multi-hints" class="so-form-control" placeholder="Create password" aria-describedby="multi-hint-1 multi-hint-2">
                                <div class="so-form-hint" id="multi-hint-1">
                                    <span class="material-icons">lock</span>
                                    Must contain at least 8 characters
                                </div>
                                <div class="so-form-hint" id="multi-hint-2">
                                    <span class="material-icons">security</span>
                                    Include uppercase, lowercase, and numbers
                                </div>
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Basic Help Text --&gt;
&lt;div class="so-form-group"&gt;
    &lt;label class="so-form-label" for="username"&gt;Username&lt;/label&gt;
    &lt;input type="text" id="username" class="so-form-control" placeholder="Enter username" aria-describedby="username-hint"&gt;
    &lt;div class="so-form-hint" id="username-hint"&gt;
        &lt;span class="material-icons"&gt;help_outline&lt;/span&gt;
        Username must be 3-20 characters long
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Character Counter --&gt;
&lt;div class="so-form-group"&gt;
    &lt;label class="so-form-label" for="bio"&gt;Bio&lt;/label&gt;
    &lt;input type="text" id="bio" class="so-form-control" maxlength="100" aria-describedby="bio-hint"&gt;
    &lt;div class="so-form-hint so-form-hint-counter" id="bio-hint"&gt;
        0 / 100 characters
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Inline Hint --&gt;
&lt;div class="so-form-group"&gt;
    &lt;label class="so-form-label" for="middle-name"&gt;
        Middle Name
        &lt;span class="so-form-hint so-form-hint-inline"&gt;
            &lt;span class="material-icons"&gt;info&lt;/span&gt;
            Optional
        &lt;/span&gt;
    &lt;/label&gt;
    &lt;input type="text" id="middle-name" class="so-form-control"&gt;
&lt;/div&gt;

&lt;!-- Multiple Hints --&gt;
&lt;div class="so-form-group"&gt;
    &lt;label class="so-form-label" for="password"&gt;Password&lt;/label&gt;
    &lt;input type="password" id="password" class="so-form-control" aria-describedby="hint-1 hint-2"&gt;
    &lt;div class="so-form-hint" id="hint-1"&gt;Must contain at least 8 characters&lt;/div&gt;
    &lt;div class="so-form-hint" id="hint-2"&gt;Include uppercase, lowercase, and numbers&lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 7: Disabled & Readonly -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Disabled &amp; Readonly</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label" for="input-disabled">Disabled Input</label>
                                <input type="text" id="input-disabled" class="so-form-control" value="Cannot edit this" disabled>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="input-readonly">Readonly Input</label>
                                <input type="text" id="input-readonly" class="so-form-control" value="Read only value" readonly>
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;label class="so-form-label" for="disabled"&gt;Disabled&lt;/label&gt;
&lt;input type="text" id="disabled" class="so-form-control" value="Cannot edit" disabled&gt;

&lt;label class="so-form-label" for="readonly"&gt;Readonly&lt;/label&gt;
&lt;input type="text" id="readonly" class="so-form-control" value="Read only" readonly&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 8: Textarea -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Textarea</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label" for="textarea-basic">Basic Textarea</label>
                                <textarea id="textarea-basic" class="so-form-control" rows="4" placeholder="Enter description..." aria-describedby="textarea-basic-hint"></textarea>
                                <div class="so-form-hint" id="textarea-basic-hint">
                                    <span class="material-icons">drag_indicator</span>
                                    Drag corner to resize
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="textarea-autosize">Autosize Textarea</label>
                                <textarea id="textarea-autosize" class="so-form-control so-form-control-autosize" placeholder="Start typing... height will grow automatically" data-min-height="80" data-max-height="300" aria-describedby="textarea-autosize-hint"></textarea>
                                <div class="so-form-hint" id="textarea-autosize-hint">
                                    <span class="material-icons">expand</span>
                                    Auto-expands as you type (no resize handle)
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="textarea-sm">Small Autosize</label>
                                <textarea id="textarea-sm" class="so-form-control so-form-control-autosize-sm" placeholder="Small autosize (60-200px)"></textarea>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label" for="textarea-lg">Large Autosize</label>
                                <textarea id="textarea-lg" class="so-form-control so-form-control-autosize-lg" placeholder="Large autosize (120-600px)"></textarea>
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Basic Textarea (with resize) --&gt;
&lt;label class="so-form-label" for="description"&gt;Description&lt;/label&gt;
&lt;textarea id="description" class="so-form-control" rows="4" placeholder="Enter description..."&gt;&lt;/textarea&gt;

&lt;!-- Autosize Textarea (no resize, auto-grows) --&gt;
&lt;label class="so-form-label" for="bio"&gt;Bio&lt;/label&gt;
&lt;textarea id="bio" class="so-form-control so-form-control-autosize"
    placeholder="Start typing..."
    data-min-height="80"
    data-max-height="300"&gt;&lt;/textarea&gt;

&lt;!-- Size Variants --&gt;
&lt;label class="so-form-label" for="small-textarea"&gt;Small&lt;/label&gt;
&lt;textarea id="small-textarea" class="so-form-control so-form-control-autosize-sm"&gt;&lt;/textarea&gt;

&lt;label class="so-form-label" for="large-textarea"&gt;Large&lt;/label&gt;
&lt;textarea id="large-textarea" class="so-form-control so-form-control-autosize-lg"&gt;&lt;/textarea&gt;</code></pre>
                        </div>

                        <h4 class="so-mt-4 so-mb-3">JavaScript API</h4>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-javascript">// Get or create autosize instance
const textarea = document.querySelector('.so-form-control-autosize');
const autosize = SOTextareaAutosize.getInstance(textarea, {
    minHeight: 80,
    maxHeight: 400
});

// Update content programmatically
autosize.update('New content here');

// Listen for resize events
textarea.addEventListener('so:autosize', (e) => {
    console.log('Height:', e.detail.height);
    console.log('Scroll height:', e.detail.scrollHeight);
});

// Destroy instance
autosize.destroy();</code></pre>
                        </div>
                    </div>
                </div>


            </div>
