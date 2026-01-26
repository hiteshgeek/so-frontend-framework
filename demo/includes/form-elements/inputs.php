            <div class="so-tab-pane fade" id="pane-inputs" role="tabpanel">

                <!-- Section 1: Basic Inputs -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Basic Inputs</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label">Default Input</label>
                                <input type="text" class="so-input" placeholder="Enter text...">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">With Value</label>
                                <input type="text" class="so-input" value="John Doe">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label required">Required Field</label>
                                <input type="text" class="so-input" placeholder="This field is required" required>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Password Input</label>
                                <input type="password" class="so-input" placeholder="Enter password">
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
    &lt;label class="so-form-label"&gt;Default Input&lt;/label&gt;
    &lt;input type="text" class="so-input" placeholder="Enter text..."&gt;
&lt;/div&gt;

&lt;div class="so-form-group"&gt;
    &lt;label class="so-form-label required"&gt;Required Field&lt;/label&gt;
    &lt;input type="text" class="so-input" placeholder="This field is required" required&gt;
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
                                <label class="so-form-label">Small Input</label>
                                <input type="text" class="so-input so-input-sm" placeholder="Small input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Default Input</label>
                                <input type="text" class="so-input" placeholder="Default input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Large Input</label>
                                <input type="text" class="so-input so-input-lg" placeholder="Large input">
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;input type="text" class="so-input so-input-sm" placeholder="Small"&gt;
&lt;input type="text" class="so-input" placeholder="Default"&gt;
&lt;input type="text" class="so-input so-input-lg" placeholder="Large"&gt;</code></pre>
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
                                <label class="so-form-label">Left Icon</label>
                                <div class="so-input-wrapper">
                                    <span class="so-input-icon"><span class="material-icons">search</span></span>
                                    <input type="text" class="so-input" placeholder="Search...">
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Right Icon</label>
                                <div class="so-input-wrapper icon-right">
                                    <input type="text" class="so-input" placeholder="Email address">
                                    <span class="so-input-icon"><span class="material-icons">email</span></span>
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Clearable Input</label>
                                <div class="so-input-wrapper icon-right">
                                    <input type="text" class="so-input" placeholder="Type to clear..." value="Clear me">
                                    <button type="button" class="so-input-clear">
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
&lt;div class="so-input-wrapper"&gt;
    &lt;span class="so-input-icon"&gt;&lt;span class="material-icons"&gt;search&lt;/span&gt;&lt;/span&gt;
    &lt;input type="text" class="so-input" placeholder="Search..."&gt;
&lt;/div&gt;

&lt;!-- Right Icon --&gt;
&lt;div class="so-input-wrapper icon-right"&gt;
    &lt;input type="text" class="so-input" placeholder="Email"&gt;
    &lt;span class="so-input-icon"&gt;&lt;span class="material-icons"&gt;email&lt;/span&gt;&lt;/span&gt;
&lt;/div&gt;

&lt;!-- Clearable Input --&gt;
&lt;div class="so-input-wrapper icon-right"&gt;
    &lt;input type="text" class="so-input" placeholder="Type..." value="Clear me"&gt;
    &lt;button type="button" class="so-input-clear"&gt;
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
                                <label class="so-form-label">Primary</label>
                                <input type="text" class="so-input so-input-primary" placeholder="Primary input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Secondary</label>
                                <input type="text" class="so-input so-input-secondary" placeholder="Secondary input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Success</label>
                                <input type="text" class="so-input so-input-success" placeholder="Success input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Danger</label>
                                <input type="text" class="so-input so-input-danger" placeholder="Danger input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Warning</label>
                                <input type="text" class="so-input so-input-warning" placeholder="Warning input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Info</label>
                                <input type="text" class="so-input so-input-info" placeholder="Info input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Light</label>
                                <input type="text" class="so-input so-input-light" placeholder="Light input">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Dark</label>
                                <input type="text" class="so-input so-input-dark" placeholder="Dark input">
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;input type="text" class="so-input so-input-primary" placeholder="Primary"&gt;
&lt;input type="text" class="so-input so-input-secondary" placeholder="Secondary"&gt;
&lt;input type="text" class="so-input so-input-success" placeholder="Success"&gt;
&lt;input type="text" class="so-input so-input-danger" placeholder="Danger"&gt;
&lt;input type="text" class="so-input so-input-warning" placeholder="Warning"&gt;
&lt;input type="text" class="so-input so-input-info" placeholder="Info"&gt;
&lt;input type="text" class="so-input so-input-light" placeholder="Light"&gt;
&lt;input type="text" class="so-input so-input-dark" placeholder="Dark"&gt;</code></pre>
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
                                <label class="so-form-label">Error State</label>
                                <input type="email" class="so-input" value="invalid-email">
                                <div class="so-form-error" id="emailError">
                                    <span class="material-icons">error</span>
                                    Please enter a valid email address
                                </div>
                            </div>

                            <div class="so-form-group has-success" id="usernameGroup">
                                <label class="so-form-label">Success State</label>
                                <input type="text" class="so-input" value="johndoe">
                                <div class="so-form-success" id="usernameSuccess">
                                    <span class="material-icons">check_circle</span>
                                    Username is available
                                </div>
                            </div>

                            <div class="so-form-group has-warning" id="passwordGroup">
                                <label class="so-form-label">Warning State</label>
                                <input type="password" class="so-input" value="weak123">
                                <div class="so-form-warning" id="passwordWarning">
                                    <span class="material-icons">warning</span>
                                    Password is weak, consider adding special characters
                                </div>
                            </div>

                            <div class="so-form-group has-info" id="phoneGroup">
                                <label class="so-form-label">Info State</label>
                                <input type="tel" class="so-input" placeholder="Enter phone number">
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
&lt;div class="so-form-group has-error" id="emailGroup"&gt;
    &lt;label class="so-form-label"&gt;Email&lt;/label&gt;
    &lt;input type="email" class="so-input" value="invalid-email"&gt;
    &lt;div class="so-form-error" id="emailError"&gt;
        &lt;span class="material-icons"&gt;error&lt;/span&gt;
        Please enter a valid email address
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Success State --&gt;
&lt;div class="so-form-group has-success"&gt;
    &lt;label class="so-form-label"&gt;Username&lt;/label&gt;
    &lt;input type="text" class="so-input" value="johndoe"&gt;
    &lt;div class="so-form-success"&gt;
        &lt;span class="material-icons"&gt;check_circle&lt;/span&gt;
        Username is available
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Warning State --&gt;
&lt;div class="so-form-group has-warning"&gt;
    &lt;label class="so-form-label"&gt;Password&lt;/label&gt;
    &lt;input type="password" class="so-input" value="weak"&gt;
    &lt;div class="so-form-warning"&gt;
        &lt;span class="material-icons"&gt;warning&lt;/span&gt;
        Password is weak
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Info State --&gt;
&lt;div class="so-form-group has-info"&gt;
    &lt;label class="so-form-label"&gt;Phone&lt;/label&gt;
    &lt;input type="tel" class="so-input" placeholder="Enter phone"&gt;
    &lt;div class="so-form-info"&gt;
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
                                <label class="so-form-label">With Help Text</label>
                                <input type="text" class="so-input" placeholder="Enter username">
                                <div class="so-form-hint">
                                    <span class="material-icons">help_outline</span>
                                    Username must be 3-20 characters long
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">With Character Counter</label>
                                <input type="text" class="so-input" placeholder="Enter bio" maxlength="100">
                                <div class="so-form-hint so-form-hint-counter">
                                    0 / 100 characters
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">
                                    Inline Hint
                                    <span class="so-form-hint so-form-hint-inline">
                                        <span class="material-icons">info</span>
                                        Optional
                                    </span>
                                </label>
                                <input type="text" class="so-input" placeholder="Enter middle name">
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Multiple Hints</label>
                                <input type="password" class="so-input" placeholder="Create password">
                                <div class="so-form-hint">
                                    <span class="material-icons">lock</span>
                                    Must contain at least 8 characters
                                </div>
                                <div class="so-form-hint">
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
    &lt;label class="so-form-label"&gt;Username&lt;/label&gt;
    &lt;input type="text" class="so-input" placeholder="Enter username"&gt;
    &lt;div class="so-form-hint"&gt;
        &lt;span class="material-icons"&gt;help_outline&lt;/span&gt;
        Username must be 3-20 characters long
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Character Counter --&gt;
&lt;div class="so-form-group"&gt;
    &lt;label class="so-form-label"&gt;Bio&lt;/label&gt;
    &lt;input type="text" class="so-input" maxlength="100"&gt;
    &lt;div class="so-form-hint so-form-hint-counter"&gt;
        0 / 100 characters
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Inline Hint --&gt;
&lt;div class="so-form-group"&gt;
    &lt;label class="so-form-label"&gt;
        Middle Name
        &lt;span class="so-form-hint so-form-hint-inline"&gt;
            &lt;span class="material-icons"&gt;info&lt;/span&gt;
            Optional
        &lt;/span&gt;
    &lt;/label&gt;
    &lt;input type="text" class="so-input"&gt;
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
                                <label class="so-form-label">Disabled Input</label>
                                <input type="text" class="so-input" value="Cannot edit this" disabled>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Readonly Input</label>
                                <input type="text" class="so-input" value="Read only value" readonly>
                            </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;input type="text" class="so-input" value="Cannot edit" disabled&gt;
&lt;input type="text" class="so-input" value="Read only" readonly&gt;</code></pre>
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
                                <label class="so-form-label">Basic Textarea</label>
                                <textarea class="so-textarea" rows="4" placeholder="Enter description..."></textarea>
                                <div class="so-form-hint">
                                    <span class="material-icons">drag_indicator</span>
                                    Drag corner to resize
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Autosize Textarea</label>
                                <textarea class="so-textarea so-textarea-autosize" placeholder="Start typing... height will grow automatically" data-min-height="80" data-max-height="300"></textarea>
                                <div class="so-form-hint">
                                    <span class="material-icons">expand</span>
                                    Auto-expands as you type (no resize handle)
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Small Autosize</label>
                                <textarea class="so-textarea so-textarea-autosize-sm" placeholder="Small autosize (60-200px)"></textarea>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Large Autosize</label>
                                <textarea class="so-textarea so-textarea-autosize-lg" placeholder="Large autosize (120-600px)"></textarea>
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
&lt;textarea class="so-textarea" rows="4" placeholder="Enter description..."&gt;&lt;/textarea&gt;

&lt;!-- Autosize Textarea (no resize, auto-grows) --&gt;
&lt;textarea class="so-textarea so-textarea-autosize"
    placeholder="Start typing..."
    data-min-height="80"
    data-max-height="300"&gt;&lt;/textarea&gt;

&lt;!-- Size Variants --&gt;
&lt;textarea class="so-textarea so-textarea-autosize-sm"&gt;&lt;/textarea&gt;
&lt;textarea class="so-textarea so-textarea-autosize-lg"&gt;&lt;/textarea&gt;</code></pre>
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
const textarea = document.querySelector('.so-textarea-autosize');
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
