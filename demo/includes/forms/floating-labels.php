<div class="so-tab-pane so-fade" id="pane-floating-labels" role="tabpanel">
    <div class="so-card">
        <div class="so-card-header">
            <h3 class="so-card-title">Floating Labels</h3>
            <p class="so-card-subtitle">Material Design style floating labels with 3 variants: Outlined, Filled, and Standard.</p>
        </div>
        <div class="so-card-body">

            <!-- Material Design Variants -->
            <h4 class="so-demo-section-title">Material Design Variants</h4>
            <p class="so-demo-desc">Three distinct styles following Material Design guidelines.</p>
            <div class="so-example-block">
                <div class="so-example-preview">
                    <div class="so-form-row">
                        <div class="so-form-group">
                            <p class="so-text-muted so-text-sm so-mb-2">Outlined (Default)</p>
                            <div class="so-form-floating so-form-floating-outlined">
                                <input type="text" class="so-form-control" id="floatOutlined" placeholder="Enter text">
                                <label for="floatOutlined">Outlined Label</label>
                            </div>
                        </div>
                        <div class="so-form-group">
                            <p class="so-text-muted so-text-sm so-mb-2">Filled</p>
                            <div class="so-form-floating so-form-floating-filled">
                                <input type="text" class="so-form-control" id="floatFilled" placeholder="Enter text">
                                <label for="floatFilled">Filled Label</label>
                            </div>
                        </div>
                        <div class="so-form-group">
                            <p class="so-text-muted so-text-sm so-mb-2">Standard</p>
                            <div class="so-form-floating so-form-floating-standard">
                                <input type="text" class="so-form-control" id="floatStandard" placeholder="Enter text">
                                <label for="floatStandard">Standard Label</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="so-code-block">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;!-- Outlined (Default) --&gt;
&lt;div class="so-form-floating so-form-floating-outlined"&gt;
    &lt;input type="text" class="so-form-control" id="floatOutlined" placeholder="Enter text"&gt;
    &lt;label for="floatOutlined"&gt;Outlined Label&lt;/label&gt;
&lt;/div&gt;

&lt;!-- Filled --&gt;
&lt;div class="so-form-floating so-form-floating-filled"&gt;
    &lt;input type="text" class="so-form-control" id="floatFilled" placeholder="Enter text"&gt;
    &lt;label for="floatFilled"&gt;Filled Label&lt;/label&gt;
&lt;/div&gt;

&lt;!-- Standard --&gt;
&lt;div class="so-form-floating so-form-floating-standard"&gt;
    &lt;input type="text" class="so-form-control" id="floatStandard" placeholder="Enter text"&gt;
    &lt;label for="floatStandard"&gt;Standard Label&lt;/label&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>

            <!-- Outlined Form Example -->
            <h4 class="so-demo-section-title">Outlined Form</h4>
            <p class="so-demo-desc">Full border with label overlapping the top border when active.</p>
            <div class="so-example-block">
                <div class="so-example-preview">
                    <div class="so-form-row">
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-outlined">
                                <input type="text" class="so-form-control" id="outlinedFirst" placeholder="First name">
                                <label for="outlinedFirst">First Name</label>
                            </div>
                        </div>
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-outlined">
                                <input type="text" class="so-form-control" id="outlinedLast" placeholder="Last name">
                                <label for="outlinedLast">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="so-form-group">
                        <div class="so-form-floating so-form-floating-outlined">
                            <input type="email" class="so-form-control" id="outlinedEmail" placeholder="Email">
                                <label for="outlinedEmail">Email Address</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filled Form Example -->
            <h4 class="so-demo-section-title">Filled Form</h4>
            <p class="so-demo-desc">Subtle background with underline emphasis on focus.</p>
            <div class="so-example-block">
                <div class="so-example-preview">
                    <div class="so-form-row">
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-filled">
                                <input type="text" class="so-form-control" id="filledFirst" placeholder="First name">
                                <label for="filledFirst">First Name</label>
                            </div>
                        </div>
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-filled">
                                <input type="text" class="so-form-control" id="filledLast" placeholder="Last name">
                                <label for="filledLast">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="so-form-group">
                        <div class="so-form-floating so-form-floating-filled">
                            <input type="email" class="so-form-control" id="filledEmail" placeholder="Email">
                            <label for="filledEmail">Email Address</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Standard Form Example -->
            <h4 class="so-demo-section-title">Standard Form</h4>
            <p class="so-demo-desc">Minimal underline style with animated focus indicator.</p>
            <div class="so-example-block">
                <div class="so-example-preview">
                    <div class="so-form-row">
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-standard">
                                <input type="text" class="so-form-control" id="standardFirst" placeholder="First name">
                                <label for="standardFirst">First Name</label>
                            </div>
                        </div>
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-standard">
                                <input type="text" class="so-form-control" id="standardLast" placeholder="Last name">
                                <label for="standardLast">Last Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="so-form-group">
                        <div class="so-form-floating so-form-floating-standard">
                            <input type="email" class="so-form-control" id="standardEmail" placeholder="Email">
                            <label for="standardEmail">Email Address</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Size Variants -->
            <h4 class="so-demo-section-title">Size Variants</h4>
            <div class="so-example-block">
                <div class="so-example-preview">
                    <div class="so-form-group">
                        <div class="so-form-floating so-form-floating-sm so-form-floating-outlined">
                            <input type="text" class="so-form-control" id="floatSm" placeholder="Small">
                            <label for="floatSm">Small Floating Label</label>
                        </div>
                    </div>
                    <div class="so-form-group">
                        <div class="so-form-floating so-form-floating-outlined">
                            <input type="text" class="so-form-control" id="floatDefault" placeholder="Default">
                            <label for="floatDefault">Default Floating Label</label>
                        </div>
                    </div>
                    <div class="so-form-group">
                        <div class="so-form-floating so-form-floating-lg so-form-floating-outlined">
                            <input type="text" class="so-form-control" id="floatLg" placeholder="Large">
                            <label for="floatLg">Large Floating Label</label>
                        </div>
                    </div>
                </div>
                <div class="so-code-block">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-floating so-form-floating-sm so-form-floating-outlined"&gt;...&lt;/div&gt;
&lt;div class="so-form-floating so-form-floating-outlined"&gt;...&lt;/div&gt;
&lt;div class="so-form-floating so-form-floating-lg so-form-floating-outlined"&gt;...&lt;/div&gt;</code></pre>
                </div>
            </div>

            <!-- With Prefilled Value -->
            <h4 class="so-demo-section-title">Prefilled Value</h4>
            <p class="so-demo-desc">When an input has a value, the label stays floated.</p>
            <div class="so-example-block">
                <div class="so-example-preview">
                    <div class="so-form-row">
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-outlined">
                                <input type="text" class="so-form-control" id="prefilledOutlined" placeholder="Name" value="John Doe">
                                <label for="prefilledOutlined">Full Name (Outlined)</label>
                            </div>
                        </div>
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-filled">
                                <input type="text" class="so-form-control" id="prefilledFilled" placeholder="Name" value="Jane Smith">
                                <label for="prefilledFilled">Full Name (Filled)</label>
                            </div>
                        </div>
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-standard">
                                <input type="text" class="so-form-control" id="prefilledStandard" placeholder="Name" value="Bob Wilson">
                                <label for="prefilledStandard">Full Name (Standard)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Required Field -->
            <h4 class="so-demo-section-title">Required Field</h4>
            <div class="so-example-block">
                <div class="so-example-preview">
                    <div class="so-form-floating so-form-floating-outlined">
                        <input type="text" class="so-form-control" id="floatRequired" placeholder="Required" required>
                        <label for="floatRequired" class="so-required">Company Name</label>
                    </div>
                </div>
                <div class="so-code-block">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-floating so-form-floating-outlined"&gt;
    &lt;input type="text" class="so-form-control" placeholder="Required" required&gt;
    &lt;label class="so-required"&gt;Company Name&lt;/label&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>

            <!-- Validation States -->
            <h4 class="so-demo-section-title">Validation States</h4>
            <div class="so-example-block">
                <div class="so-example-preview">
                    <div class="so-form-row">
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-outlined has-success">
                                <input type="email" class="so-form-control" id="floatSuccess" placeholder="Email" value="valid@email.com">
                                <label for="floatSuccess">Email (Valid)</label>
                            </div>
                            <span class="so-form-success"><span class="material-icons">check_circle</span> Email is valid</span>
                        </div>
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-outlined has-error">
                                <input type="email" class="so-form-control" id="floatError" placeholder="Email" value="invalid-email">
                                <label for="floatError">Email (Invalid)</label>
                            </div>
                            <span class="so-form-error"><span class="material-icons">error</span> Please enter a valid email</span>
                        </div>
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-outlined has-warning">
                                <input type="text" class="so-form-control" id="floatWarning" placeholder="Username" value="admin">
                                <label for="floatWarning">Username (Warning)</label>
                            </div>
                            <span class="so-form-warning"><span class="material-icons">warning</span> Username is reserved</span>
                        </div>
                    </div>
                </div>
                <div class="so-code-block">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-floating so-form-floating-outlined has-success"&gt;
    &lt;input type="email" class="so-form-control" value="valid@email.com"&gt;
    &lt;label&gt;Email&lt;/label&gt;
&lt;/div&gt;
&lt;span class="so-form-success"&gt;Email is valid&lt;/span&gt;

&lt;div class="so-form-floating so-form-floating-outlined has-error"&gt;
    &lt;input type="email" class="so-form-control" value="invalid"&gt;
    &lt;label&gt;Email&lt;/label&gt;
&lt;/div&gt;
&lt;span class="so-form-error"&gt;Please enter a valid email&lt;/span&gt;

&lt;div class="so-form-floating so-form-floating-outlined has-warning"&gt;
    &lt;input type="text" class="so-form-control" value="admin"&gt;
    &lt;label&gt;Username&lt;/label&gt;
&lt;/div&gt;
&lt;span class="so-form-warning"&gt;Username is reserved&lt;/span&gt;</code></pre>
                </div>
            </div>

            <!-- Textarea with Floating Label -->
            <h4 class="so-demo-section-title">Textarea with Floating Label</h4>
            <div class="so-example-block">
                <div class="so-example-preview">
                    <div class="so-form-row">
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-outlined">
                                <textarea class="so-form-control" id="floatTextareaOutlined" placeholder="Description" style="height: 100px;"></textarea>
                                <label for="floatTextareaOutlined">Description (Outlined)</label>
                            </div>
                        </div>
                        <div class="so-form-group">
                            <div class="so-form-floating so-form-floating-filled">
                                <textarea class="so-form-control" id="floatTextareaFilled" placeholder="Description" style="height: 100px;"></textarea>
                                <label for="floatTextareaFilled">Description (Filled)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="so-code-block">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-floating so-form-floating-outlined"&gt;
    &lt;textarea class="so-form-control" placeholder="Description" style="height: 100px;"&gt;&lt;/textarea&gt;
    &lt;label&gt;Description (Outlined)&lt;/label&gt;
&lt;/div&gt;

&lt;div class="so-form-floating so-form-floating-filled"&gt;
    &lt;textarea class="so-form-control" placeholder="Description" style="height: 100px;"&gt;&lt;/textarea&gt;
    &lt;label&gt;Description (Filled)&lt;/label&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>

        </div>
    </div>
</div>
