            <div class="so-tab-pane fade" id="pane-checkboxes" role="tabpanel">

                <!-- Section 1: Basic Checkboxes -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Checkboxes</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1" class="so-demo-grid-gap">
                            <div>
                                <h5 class="so-mb-3" class="so-demo-section-title">States</h5>
                                <div class="so-checkbox-group so-checkbox-group-vertical">
                                    <label class="so-checkbox">
                                        <input type="checkbox">
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                        <span class="so-checkbox-label">Default checkbox</span>
                                    </label>
                                    <label class="so-checkbox">
                                        <input type="checkbox" checked>
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                        <span class="so-checkbox-label">Checked checkbox</span>
                                    </label>
                                    <label class="so-checkbox" id="indeterminate-checkbox">
                                        <input type="checkbox">
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">remove</span>
                                        </span>
                                        <span class="so-checkbox-label">Indeterminate checkbox</span>
                                    </label>
                                    <label class="so-checkbox disabled">
                                        <input type="checkbox" disabled>
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                        <span class="so-checkbox-label">Disabled checkbox</span>
                                    </label>
                                    <label class="so-checkbox disabled">
                                        <input type="checkbox" checked disabled>
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                        <span class="so-checkbox-label">Disabled checked</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <h5 class="so-mb-3" class="so-demo-section-title">Inline Layout</h5>
                                <div class="so-checkbox-group so-checkbox-group-inline so-mb-4">
                                    <label class="so-checkbox">
                                        <input type="checkbox" checked>
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                        <span class="so-checkbox-label">Option A</span>
                                    </label>
                                    <label class="so-checkbox">
                                        <input type="checkbox">
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                        <span class="so-checkbox-label">Option B</span>
                                    </label>
                                    <label class="so-checkbox">
                                        <input type="checkbox">
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                        <span class="so-checkbox-label">Option C</span>
                                    </label>
                                </div>

                                <h5 class="so-mb-3" class="so-demo-section-title">Without Label</h5>
                                <div class="so-flex so-gap-3">
                                    <label class="so-checkbox">
                                        <input type="checkbox">
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                    </label>
                                    <label class="so-checkbox">
                                        <input type="checkbox" checked>
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">check</span>
                                        </span>
                                    </label>
                                    <label class="so-checkbox" id="indeterminate-checkbox-2">
                                        <input type="checkbox">
                                        <span class="so-checkbox-box">
                                            <span class="material-icons">remove</span>
                                        </span>
                                    </label>
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
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Default Checkbox --&gt;
&lt;label class="so-checkbox"&gt;
    &lt;input type="checkbox"&gt;
    &lt;span class="so-checkbox-box"&gt;
        &lt;span class="material-icons"&gt;check&lt;/span&gt;
    &lt;/span&gt;
    &lt;span class="so-checkbox-label"&gt;Default checkbox&lt;/span&gt;
&lt;/label&gt;

&lt;!-- Indeterminate (set via JavaScript) --&gt;
&lt;label class="so-checkbox"&gt;
    &lt;input type="checkbox" id="myCheckbox"&gt;
    &lt;span class="so-checkbox-box"&gt;
        &lt;span class="material-icons"&gt;remove&lt;/span&gt;
    &lt;/span&gt;
    &lt;span class="so-checkbox-label"&gt;Indeterminate&lt;/span&gt;
&lt;/label&gt;
&lt;script&gt;document.getElementById('myCheckbox').indeterminate = true;&lt;/script&gt;

&lt;!-- Disabled --&gt;
&lt;label class="so-checkbox disabled"&gt;
    &lt;input type="checkbox" disabled&gt;
    ...
&lt;/label&gt;

&lt;!-- Inline Group --&gt;
&lt;div class="so-checkbox-group so-checkbox-group-inline"&gt;
    &lt;label class="so-checkbox"&gt;...&lt;/label&gt;
    &lt;label class="so-checkbox"&gt;...&lt;/label&gt;
&lt;/div&gt;

&lt;!-- Vertical Group --&gt;
&lt;div class="so-checkbox-group so-checkbox-group-vertical"&gt;
    &lt;label class="so-checkbox"&gt;...&lt;/label&gt;
    &lt;label class="so-checkbox"&gt;...&lt;/label&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Checkbox Sizes -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Checkbox Sizes</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-flex so-gap-5 so-items-start so-flex-wrap">
                            <label class="so-checkbox so-checkbox-sm">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Small</span>
                            </label>
                            <label class="so-checkbox">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Default</span>
                            </label>
                            <label class="so-checkbox so-checkbox-lg">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Large</span>
                            </label>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;label class="so-checkbox so-checkbox-sm"&gt;...&lt;/label&gt;
&lt;label class="so-checkbox"&gt;...&lt;/label&gt;
&lt;label class="so-checkbox so-checkbox-lg"&gt;...&lt;/label&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Checkbox Colors -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Checkbox Colors</h3>
                    </div>
                    <div class="so-card-body">
                        <h5 class="so-mb-3" class="so-demo-section-title">Color Variants</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <label class="so-checkbox so-checkbox-primary">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Primary</span>
                            </label>
                            <label class="so-checkbox so-checkbox-secondary">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Secondary</span>
                            </label>
                            <label class="so-checkbox so-checkbox-success">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Success</span>
                            </label>
                            <label class="so-checkbox so-checkbox-danger">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Danger</span>
                            </label>
                            <label class="so-checkbox so-checkbox-warning">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Warning</span>
                            </label>
                            <label class="so-checkbox so-checkbox-info">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Info</span>
                            </label>
                            <label class="so-checkbox so-checkbox-light">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Light</span>
                            </label>
                            <label class="so-checkbox so-checkbox-dark">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Dark</span>
                            </label>
                        </div>

                        <h5 class="so-mb-3" class="so-demo-section-title">With Contextual Labels (label color matches when checked)</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap">
                            <label class="so-checkbox so-checkbox-primary so-checkbox-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Primary</span>
                            </label>
                            <label class="so-checkbox so-checkbox-success so-checkbox-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Success</span>
                            </label>
                            <label class="so-checkbox so-checkbox-danger so-checkbox-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Danger</span>
                            </label>
                            <label class="so-checkbox so-checkbox-warning so-checkbox-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Warning</span>
                            </label>
                            <label class="so-checkbox so-checkbox-info so-checkbox-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Info</span>
                            </label>
                            <label class="so-checkbox so-checkbox-secondary so-checkbox-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Secondary</span>
                            </label>
                            <label class="so-checkbox so-checkbox-light so-checkbox-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Light</span>
                            </label>
                            <label class="so-checkbox so-checkbox-dark so-checkbox-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-checkbox-box">
                                    <span class="material-icons">check</span>
                                </span>
                                <span class="so-checkbox-label">Dark</span>
                            </label>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Color variant --&gt;
&lt;label class="so-checkbox so-checkbox-primary"&gt;...&lt;/label&gt;
&lt;label class="so-checkbox so-checkbox-success"&gt;...&lt;/label&gt;
&lt;label class="so-checkbox so-checkbox-danger"&gt;...&lt;/label&gt;
&lt;label class="so-checkbox so-checkbox-warning"&gt;...&lt;/label&gt;
&lt;label class="so-checkbox so-checkbox-info"&gt;...&lt;/label&gt;
&lt;label class="so-checkbox so-checkbox-secondary"&gt;...&lt;/label&gt;
&lt;label class="so-checkbox so-checkbox-light"&gt;...&lt;/label&gt;
&lt;label class="so-checkbox so-checkbox-dark"&gt;...&lt;/label&gt;

&lt;!-- With contextual label color (label matches when checked) --&gt;
&lt;label class="so-checkbox so-checkbox-success so-checkbox-label-contextual"&gt;
    &lt;input type="checkbox"&gt;
    &lt;span class="so-checkbox-box"&gt;
        &lt;span class="material-icons"&gt;check&lt;/span&gt;
    &lt;/span&gt;
    &lt;span class="so-checkbox-label"&gt;Success&lt;/span&gt;
&lt;/label&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 4: Radio Buttons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Radio Buttons</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1" class="so-demo-grid-gap">
                            <div>
                                <h5 class="so-mb-3" class="so-demo-section-title">Vertical Group (Default)</h5>
                                <div class="so-radio-group so-radio-group-vertical">
                                    <label class="so-radio">
                                        <input type="radio" name="radio-demo-1" value="1">
                                        <span class="so-radio-circle"></span>
                                        <span class="so-radio-label">Option 1</span>
                                    </label>
                                    <label class="so-radio">
                                        <input type="radio" name="radio-demo-1" value="2" checked>
                                        <span class="so-radio-circle"></span>
                                        <span class="so-radio-label">Option 2 (Selected)</span>
                                    </label>
                                    <label class="so-radio">
                                        <input type="radio" name="radio-demo-1" value="3">
                                        <span class="so-radio-circle"></span>
                                        <span class="so-radio-label">Option 3</span>
                                    </label>
                                    <label class="so-radio disabled">
                                        <input type="radio" name="radio-demo-1" value="4" disabled>
                                        <span class="so-radio-circle"></span>
                                        <span class="so-radio-label">Disabled option</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <h5 class="so-mb-3" class="so-demo-section-title">Inline Layout</h5>
                                <div class="so-radio-group so-radio-group-inline so-mb-4">
                                    <label class="so-radio">
                                        <input type="radio" name="radio-demo-2" value="a" checked>
                                        <span class="so-radio-circle"></span>
                                        <span class="so-radio-label">Option A</span>
                                    </label>
                                    <label class="so-radio">
                                        <input type="radio" name="radio-demo-2" value="b">
                                        <span class="so-radio-circle"></span>
                                        <span class="so-radio-label">Option B</span>
                                    </label>
                                    <label class="so-radio">
                                        <input type="radio" name="radio-demo-2" value="c">
                                        <span class="so-radio-circle"></span>
                                        <span class="so-radio-label">Option C</span>
                                    </label>
                                </div>

                                <h5 class="so-mb-3" class="so-demo-section-title">Without Label</h5>
                                <div class="so-flex so-gap-3">
                                    <label class="so-radio">
                                        <input type="radio" name="radio-demo-3" value="1">
                                        <span class="so-radio-circle"></span>
                                    </label>
                                    <label class="so-radio">
                                        <input type="radio" name="radio-demo-3" value="2" checked>
                                        <span class="so-radio-circle"></span>
                                    </label>
                                    <label class="so-radio">
                                        <input type="radio" name="radio-demo-3" value="3">
                                        <span class="so-radio-circle"></span>
                                    </label>
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
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Radio Button --&gt;
&lt;label class="so-radio"&gt;
    &lt;input type="radio" name="group" value="1"&gt;
    &lt;span class="so-radio-circle"&gt;&lt;/span&gt;
    &lt;span class="so-radio-label"&gt;Option 1&lt;/span&gt;
&lt;/label&gt;

&lt;!-- Vertical Group --&gt;
&lt;div class="so-radio-group so-radio-group-vertical"&gt;
    &lt;label class="so-radio"&gt;...&lt;/label&gt;
    &lt;label class="so-radio"&gt;...&lt;/label&gt;
&lt;/div&gt;

&lt;!-- Inline Group --&gt;
&lt;div class="so-radio-group so-radio-group-inline"&gt;
    &lt;label class="so-radio"&gt;...&lt;/label&gt;
    &lt;label class="so-radio"&gt;...&lt;/label&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 5: Radio Sizes -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Radio Sizes</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-flex so-gap-5 so-items-start so-flex-wrap">
                            <label class="so-radio so-radio-sm">
                                <input type="radio" name="radio-size" value="sm" checked>
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Small</span>
                            </label>
                            <label class="so-radio">
                                <input type="radio" name="radio-size" value="md">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Default</span>
                            </label>
                            <label class="so-radio so-radio-lg">
                                <input type="radio" name="radio-size" value="lg">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Large</span>
                            </label>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;label class="so-radio so-radio-sm"&gt;...&lt;/label&gt;
&lt;label class="so-radio"&gt;...&lt;/label&gt;
&lt;label class="so-radio so-radio-lg"&gt;...&lt;/label&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 6: Radio Colors -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Radio Colors</h3>
                    </div>
                    <div class="so-card-body">
                        <h5 class="so-mb-3" class="so-demo-section-title">Color Variants</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <label class="so-radio so-radio-primary">
                                <input type="radio" name="radio-color" value="primary" checked>
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Primary</span>
                            </label>
                            <label class="so-radio so-radio-secondary">
                                <input type="radio" name="radio-color" value="secondary">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Secondary</span>
                            </label>
                            <label class="so-radio so-radio-success">
                                <input type="radio" name="radio-color" value="success">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Success</span>
                            </label>
                            <label class="so-radio so-radio-danger">
                                <input type="radio" name="radio-color" value="danger">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Danger</span>
                            </label>
                            <label class="so-radio so-radio-warning">
                                <input type="radio" name="radio-color" value="warning">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Warning</span>
                            </label>
                            <label class="so-radio so-radio-info">
                                <input type="radio" name="radio-color" value="info">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Info</span>
                            </label>
                            <label class="so-radio so-radio-light">
                                <input type="radio" name="radio-color" value="light">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Light</span>
                            </label>
                            <label class="so-radio so-radio-dark">
                                <input type="radio" name="radio-color" value="dark">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Dark</span>
                            </label>
                        </div>

                        <h5 class="so-mb-3" class="so-demo-section-title">With Contextual Labels (label color matches when selected)</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap">
                            <label class="so-radio so-radio-primary so-radio-label-contextual">
                                <input type="radio" name="radio-color-contextual" value="primary" checked>
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Primary</span>
                            </label>
                            <label class="so-radio so-radio-success so-radio-label-contextual">
                                <input type="radio" name="radio-color-contextual" value="success">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Success</span>
                            </label>
                            <label class="so-radio so-radio-danger so-radio-label-contextual">
                                <input type="radio" name="radio-color-contextual" value="danger">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Danger</span>
                            </label>
                            <label class="so-radio so-radio-warning so-radio-label-contextual">
                                <input type="radio" name="radio-color-contextual" value="warning">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Warning</span>
                            </label>
                            <label class="so-radio so-radio-info so-radio-label-contextual">
                                <input type="radio" name="radio-color-contextual" value="info">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Info</span>
                            </label>
                            <label class="so-radio so-radio-secondary so-radio-label-contextual">
                                <input type="radio" name="radio-color-contextual" value="secondary">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Secondary</span>
                            </label>
                            <label class="so-radio so-radio-light so-radio-label-contextual">
                                <input type="radio" name="radio-color-contextual" value="light">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Light</span>
                            </label>
                            <label class="so-radio so-radio-dark so-radio-label-contextual">
                                <input type="radio" name="radio-color-contextual" value="dark">
                                <span class="so-radio-circle"></span>
                                <span class="so-radio-label">Dark</span>
                            </label>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Color variant --&gt;
&lt;label class="so-radio so-radio-primary"&gt;...&lt;/label&gt;
&lt;label class="so-radio so-radio-success"&gt;...&lt;/label&gt;
&lt;label class="so-radio so-radio-danger"&gt;...&lt;/label&gt;
&lt;label class="so-radio so-radio-secondary"&gt;...&lt;/label&gt;
&lt;label class="so-radio so-radio-light"&gt;...&lt;/label&gt;
&lt;label class="so-radio so-radio-dark"&gt;...&lt;/label&gt;

&lt;!-- With contextual label color --&gt;
&lt;label class="so-radio so-radio-success so-radio-label-contextual"&gt;
    &lt;input type="radio" name="group" value="1"&gt;
    &lt;span class="so-radio-circle"&gt;&lt;/span&gt;
    &lt;span class="so-radio-label"&gt;Success&lt;/span&gt;
&lt;/label&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 7: Switches -->
                <div class="so-card so-mt-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Switches</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1" class="so-demo-grid-gap">
                            <div>
                                <h5 class="so-mb-3" class="so-demo-section-title">Basic Switches</h5>
                                <div class="so-flex so-flex-col so-gap-3">
                                    <label class="so-switch">
                                        <input type="checkbox">
                                        <span class="so-switch-track"></span>
                                        <span class="so-switch-label">Default switch</span>
                                    </label>
                                    <label class="so-switch">
                                        <input type="checkbox" checked>
                                        <span class="so-switch-track"></span>
                                        <span class="so-switch-label">Checked switch</span>
                                    </label>
                                    <label class="so-switch disabled">
                                        <input type="checkbox" disabled>
                                        <span class="so-switch-track"></span>
                                        <span class="so-switch-label">Disabled switch</span>
                                    </label>
                                    <label class="so-switch disabled">
                                        <input type="checkbox" checked disabled>
                                        <span class="so-switch-track"></span>
                                        <span class="so-switch-label">Disabled checked</span>
                                    </label>
                                </div>
                            </div>
                            <div>
                                <h5 class="so-mb-3" class="so-demo-section-title">Switch Sizes</h5>
                                <div class="so-flex so-flex-col so-gap-3">
                                    <label class="so-switch so-switch-sm">
                                        <input type="checkbox" checked>
                                        <span class="so-switch-track"></span>
                                        <span class="so-switch-label">Small</span>
                                    </label>
                                    <label class="so-switch">
                                        <input type="checkbox" checked>
                                        <span class="so-switch-track"></span>
                                        <span class="so-switch-label">Default</span>
                                    </label>
                                    <label class="so-switch so-switch-lg">
                                        <input type="checkbox" checked>
                                        <span class="so-switch-track"></span>
                                        <span class="so-switch-label">Large</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <h5 class="so-mb-3 so-mt-4" class="so-demo-section-title">Color Variants</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <label class="so-switch so-switch-primary">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Primary</span>
                            </label>
                            <label class="so-switch so-switch-secondary">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Secondary</span>
                            </label>
                            <label class="so-switch so-switch-success">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Success</span>
                            </label>
                            <label class="so-switch so-switch-danger">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Danger</span>
                            </label>
                            <label class="so-switch so-switch-warning">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Warning</span>
                            </label>
                            <label class="so-switch so-switch-info">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Info</span>
                            </label>
                            <label class="so-switch so-switch-light">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Light</span>
                            </label>
                            <label class="so-switch so-switch-dark">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Dark</span>
                            </label>
                        </div>

                        <h5 class="so-mb-3" class="so-demo-section-title">Contextual Label Colors</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <label class="so-switch so-switch-success so-switch-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Success contextual</span>
                            </label>
                            <label class="so-switch so-switch-danger so-switch-label-contextual">
                                <input type="checkbox" checked>
                                <span class="so-switch-track"></span>
                                <span class="so-switch-label">Danger contextual</span>
                            </label>
                        </div>

                        <h5 class="so-mb-3" class="so-demo-section-title">Switch with Inner Icons</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap so-items-center so-mb-4">
                            <label class="so-switch so-switch-icon so-switch-success">
                                <input type="checkbox">
                                <span class="so-switch-track">
                                    <span class="so-switch-on"><span class="material-icons">check</span></span>
                                    <span class="so-switch-off"><span class="material-icons">close</span></span>
                                </span>
                                <span class="so-switch-label">Icon switch</span>
                            </label>
                            <label class="so-switch so-switch-icon so-switch-success">
                                <input type="checkbox" checked>
                                <span class="so-switch-track">
                                    <span class="so-switch-on"><span class="material-icons">check</span></span>
                                    <span class="so-switch-off"><span class="material-icons">close</span></span>
                                </span>
                                <span class="so-switch-label">Checked</span>
                            </label>
                            <label class="so-switch so-switch-icon so-switch-danger">
                                <input type="checkbox" checked>
                                <span class="so-switch-track">
                                    <span class="so-switch-on"><span class="material-icons">notifications_active</span></span>
                                    <span class="so-switch-off"><span class="material-icons">notifications_off</span></span>
                                </span>
                                <span class="so-switch-label">Notifications</span>
                            </label>
                        </div>

                        <h5 class="so-mb-3" class="so-demo-section-title">Switch with Inner Text</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap so-items-center so-mb-4">
                            <label class="so-switch so-switch-text so-switch-success">
                                <input type="checkbox">
                                <span class="so-switch-track">
                                    <span class="so-switch-on">ON</span>
                                    <span class="so-switch-off">OFF</span>
                                </span>
                                <span class="so-switch-label">Text switch</span>
                            </label>
                            <label class="so-switch so-switch-text so-switch-success">
                                <input type="checkbox" checked>
                                <span class="so-switch-track">
                                    <span class="so-switch-on">ON</span>
                                    <span class="so-switch-off">OFF</span>
                                </span>
                                <span class="so-switch-label">Checked</span>
                            </label>
                            <label class="so-switch so-switch-text so-switch-primary">
                                <input type="checkbox" checked>
                                <span class="so-switch-track">
                                    <span class="so-switch-on">YES</span>
                                    <span class="so-switch-off">NO</span>
                                </span>
                                <span class="so-switch-label">Yes/No</span>
                            </label>
                        </div>

                        <h5 class="so-mb-3" class="so-demo-section-title">Switch with Icon + Text</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap so-items-center so-mb-4">
                            <label class="so-switch so-switch-icon-text so-switch-success">
                                <input type="checkbox">
                                <span class="so-switch-track">
                                    <span class="so-switch-on"><span class="material-icons">check</span>ON</span>
                                    <span class="so-switch-off">OFF<span class="material-icons">close</span></span>
                                </span>
                                <span class="so-switch-label">Icon + Text</span>
                            </label>
                            <label class="so-switch so-switch-icon-text so-switch-success">
                                <input type="checkbox" checked>
                                <span class="so-switch-track">
                                    <span class="so-switch-on"><span class="material-icons">check</span>ON</span>
                                    <span class="so-switch-off">OFF<span class="material-icons">close</span></span>
                                </span>
                                <span class="so-switch-label">Checked</span>
                            </label>
                        </div>

                        <h5 class="so-mb-3" class="so-demo-section-title">Inner Switch Sizes</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap so-items-center">
                            <label class="so-switch so-switch-icon so-switch-icon-sm so-switch-success">
                                <input type="checkbox" checked>
                                <span class="so-switch-track">
                                    <span class="so-switch-on"><span class="material-icons">check</span></span>
                                    <span class="so-switch-off"><span class="material-icons">close</span></span>
                                </span>
                                <span class="so-switch-label">Small</span>
                            </label>
                            <label class="so-switch so-switch-icon so-switch-success">
                                <input type="checkbox" checked>
                                <span class="so-switch-track">
                                    <span class="so-switch-on"><span class="material-icons">check</span></span>
                                    <span class="so-switch-off"><span class="material-icons">close</span></span>
                                </span>
                                <span class="so-switch-label">Default</span>
                            </label>
                            <label class="so-switch so-switch-icon so-switch-icon-lg so-switch-success">
                                <input type="checkbox" checked>
                                <span class="so-switch-track">
                                    <span class="so-switch-on"><span class="material-icons">check</span></span>
                                    <span class="so-switch-off"><span class="material-icons">close</span></span>
                                </span>
                                <span class="so-switch-label">Large</span>
                            </label>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Basic Switch --&gt;
&lt;label class="so-switch"&gt;
    &lt;input type="checkbox"&gt;
    &lt;span class="so-switch-track"&gt;&lt;/span&gt;
    &lt;span class="so-switch-label"&gt;Switch label&lt;/span&gt;
&lt;/label&gt;

&lt;!-- Size Variants --&gt;
&lt;label class="so-switch so-switch-sm"&gt;...&lt;/label&gt;
&lt;label class="so-switch"&gt;...&lt;/label&gt;
&lt;label class="so-switch so-switch-lg"&gt;...&lt;/label&gt;

&lt;!-- Color Variants --&gt;
&lt;label class="so-switch so-switch-primary"&gt;...&lt;/label&gt;
&lt;label class="so-switch so-switch-success"&gt;...&lt;/label&gt;
&lt;label class="so-switch so-switch-danger"&gt;...&lt;/label&gt;

&lt;!-- Contextual Label Color --&gt;
&lt;label class="so-switch so-switch-success so-switch-label-contextual"&gt;
    &lt;input type="checkbox" checked&gt;
    &lt;span class="so-switch-track"&gt;&lt;/span&gt;
    &lt;span class="so-switch-label"&gt;Success&lt;/span&gt;
&lt;/label&gt;

&lt;!-- Switch with Inner Icons --&gt;
&lt;label class="so-switch so-switch-icon so-switch-success"&gt;
    &lt;input type="checkbox"&gt;
    &lt;span class="so-switch-track"&gt;
        &lt;span class="so-switch-on"&gt;&lt;span class="material-icons"&gt;check&lt;/span&gt;&lt;/span&gt;
        &lt;span class="so-switch-off"&gt;&lt;span class="material-icons"&gt;close&lt;/span&gt;&lt;/span&gt;
    &lt;/span&gt;
    &lt;span class="so-switch-label"&gt;Icon switch&lt;/span&gt;
&lt;/label&gt;

&lt;!-- Switch with Inner Text --&gt;
&lt;label class="so-switch so-switch-text so-switch-success"&gt;
    &lt;input type="checkbox"&gt;
    &lt;span class="so-switch-track"&gt;
        &lt;span class="so-switch-on"&gt;ON&lt;/span&gt;
        &lt;span class="so-switch-off"&gt;OFF&lt;/span&gt;
    &lt;/span&gt;
    &lt;span class="so-switch-label"&gt;Text switch&lt;/span&gt;
&lt;/label&gt;

&lt;!-- Switch with Icon + Text --&gt;
&lt;label class="so-switch so-switch-icon-text so-switch-success"&gt;
    &lt;input type="checkbox"&gt;
    &lt;span class="so-switch-track"&gt;
        &lt;span class="so-switch-on"&gt;&lt;span class="material-icons"&gt;check&lt;/span&gt;ON&lt;/span&gt;
        &lt;span class="so-switch-off"&gt;OFF&lt;span class="material-icons"&gt;close&lt;/span&gt;&lt;/span&gt;
    &lt;/span&gt;
    &lt;span class="so-switch-label"&gt;Icon + Text&lt;/span&gt;
&lt;/label&gt;</code></pre>
                        </div>
                    </div>
                </div>

            </div>

