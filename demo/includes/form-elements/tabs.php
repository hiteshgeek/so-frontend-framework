            <div class="so-tab-pane fade" id="pane-tabs" role="tabpanel">
                <!-- Default (Underline) Tabs -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Default Tabs (Underline)</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-tabs" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab" data-so-target="#demo-default-1">Home</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-default-2">Profile</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-default-3">Settings</button>
                                    <button class="so-tab disabled" role="tab">Disabled</button>
                                </div>
                                <div class="so-tab-content">
                                    <div class="so-tab-pane fade show active" id="demo-default-1" role="tabpanel">
                                        <p>Home tab content. This is the default underline style.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-default-2" role="tabpanel">
                                        <p>Profile tab content with user information.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-default-3" role="tabpanel">
                                        <p>Settings tab content for configuration options.</p>
                                    </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;div class="so-tabs" role="tablist" data-so-tabs&gt;
    &lt;button class="so-tab active" role="tab" data-so-target="#panel1"&gt;Home&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel2"&gt;Profile&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel3"&gt;Settings&lt;/button&gt;
    &lt;button class="so-tab disabled" role="tab"&gt;Disabled&lt;/button&gt;
&lt;/div&gt;

&lt;div class="so-tab-content"&gt;
    &lt;div class="so-tab-pane fade show active" id="panel1" role="tabpanel"&gt;
        &lt;p&gt;Home tab content.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="so-tab-pane fade" id="panel2" role="tabpanel"&gt;
        &lt;p&gt;Profile tab content.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="so-tab-pane fade" id="panel3" role="tabpanel"&gt;
        &lt;p&gt;Settings tab content.&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Pills Variant -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Pills Variant</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-tabs so-tabs-pills" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab" data-so-target="#demo-pills-1">Overview</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-pills-2">Features</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-pills-3">Pricing</button>
                                </div>
                                <div class="so-tab-content">
                                    <div class="so-tab-pane fade show active" id="demo-pills-1" role="tabpanel">
                                        <p>Pills have a rounded background on the active tab.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-pills-2" role="tabpanel">
                                        <p>Features content goes here.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-pills-3" role="tabpanel">
                                        <p>Pricing information displayed here.</p>
                                    </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;div class="so-tabs so-tabs-pills" role="tablist" data-so-tabs&gt;
    &lt;button class="so-tab active" role="tab" data-so-target="#panel1"&gt;Overview&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel2"&gt;Features&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel3"&gt;Pricing&lt;/button&gt;
&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Boxed/Segmented Variant -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Boxed/Segmented Variant</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-tabs so-tabs-boxed" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab" data-so-target="#demo-boxed-1">Day</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-boxed-2">Week</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-boxed-3">Month</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-boxed-4">Year</button>
                                </div>
                                <div class="so-tab-content">
                                    <div class="so-tab-pane fade show active" id="demo-boxed-1" role="tabpanel">
                                        <p>Daily view - Boxed tabs look like a segmented control.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-boxed-2" role="tabpanel">
                                        <p>Weekly view content.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-boxed-3" role="tabpanel">
                                        <p>Monthly view content.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-boxed-4" role="tabpanel">
                                        <p>Yearly view content.</p>
                                    </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;div class="so-tabs so-tabs-boxed" role="tablist" data-so-tabs&gt;
    &lt;button class="so-tab active" role="tab" data-so-target="#panel1"&gt;Day&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel2"&gt;Week&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel3"&gt;Month&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel4"&gt;Year&lt;/button&gt;
&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Ghost Variant -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Ghost Variant</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-tabs so-tabs-ghost" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab" data-so-target="#demo-ghost-1">All</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-ghost-2">Active</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-ghost-3">Completed</button>
                                </div>
                                <div class="so-tab-content">
                                    <div class="so-tab-pane fade show active" id="demo-ghost-1" role="tabpanel">
                                        <p>Ghost tabs have minimal styling with a soft background on active.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-ghost-2" role="tabpanel">
                                        <p>Active items content.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-ghost-3" role="tabpanel">
                                        <p>Completed items content.</p>
                                    </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;div class="so-tabs so-tabs-ghost" role="tablist" data-so-tabs&gt;
    &lt;button class="so-tab active" role="tab" data-so-target="#panel1"&gt;All&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel2"&gt;Active&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel3"&gt;Completed&lt;/button&gt;
&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Bordered Variant -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Bordered Variant</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-tabs so-tabs-bordered" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab" data-so-target="#demo-bordered-1">Details</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-bordered-2">Reviews</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-bordered-3">FAQ</button>
                                </div>
                                <div class="so-tab-content">
                                    <div class="so-tab-pane fade show active" id="demo-bordered-1" role="tabpanel">
                                        <p>Bordered tabs have individual borders around each tab.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-bordered-2" role="tabpanel">
                                        <p>Reviews content goes here.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-bordered-3" role="tabpanel">
                                        <p>Frequently asked questions.</p>
                                    </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;div class="so-tabs so-tabs-bordered" role="tablist" data-so-tabs&gt;
    &lt;button class="so-tab active" role="tab" data-so-target="#panel1"&gt;Details&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel2"&gt;Reviews&lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel3"&gt;FAQ&lt;/button&gt;
&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Size Variants -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Size Variants</h3>
                    </div>
                    <div class="so-card-body">
                                                        <h5 class="so-demo-section-title">Small Tabs</h5>
                                <div class="so-tabs so-tabs-pills so-tabs-sm so-mb-4" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab" data-so-target="#demo-sm-1">Tab 1</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-sm-2">Tab 2</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-sm-3">Tab 3</button>
                                </div>

                                <h5 class="so-demo-section-title">Default Tabs</h5>
                                <div class="so-tabs so-tabs-pills so-mb-4" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab" data-so-target="#demo-def-1">Tab 1</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-def-2">Tab 2</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-def-3">Tab 3</button>
                                </div>

                                <h5 class="so-demo-section-title">Large Tabs</h5>
                                <div class="so-tabs so-tabs-pills so-tabs-lg" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab" data-so-target="#demo-lg-1">Tab 1</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-lg-2">Tab 2</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-lg-3">Tab 3</button>
                        </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;!-- Small --&gt;
&lt;div class="so-tabs so-tabs-pills so-tabs-sm" role="tablist"&gt;...&lt;/div&gt;

&lt;!-- Default --&gt;
&lt;div class="so-tabs so-tabs-pills" role="tablist"&gt;...&lt;/div&gt;

&lt;!-- Large --&gt;
&lt;div class="so-tabs so-tabs-pills so-tabs-lg" role="tablist"&gt;...&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Contextual Colors -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Contextual Colors</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1" class="so-demo-grid-gap">
                                    <div>
                                        <h5 class="so-demo-section-title-sm">Primary</h5>
                                        <div class="so-tabs so-tabs-pills so-tabs-primary so-tabs-sm" role="tablist" data-so-tabs>
                                            <button class="so-tab active" role="tab">Active</button>
                                            <button class="so-tab" role="tab">Tab 2</button>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="so-demo-section-title-sm">Success</h5>
                                        <div class="so-tabs so-tabs-pills so-tabs-success so-tabs-sm" role="tablist" data-so-tabs>
                                            <button class="so-tab active" role="tab">Active</button>
                                            <button class="so-tab" role="tab">Tab 2</button>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="so-demo-section-title-sm">Danger</h5>
                                        <div class="so-tabs so-tabs-pills so-tabs-danger so-tabs-sm" role="tablist" data-so-tabs>
                                            <button class="so-tab active" role="tab">Active</button>
                                            <button class="so-tab" role="tab">Tab 2</button>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="so-demo-section-title-sm">Warning</h5>
                                        <div class="so-tabs so-tabs-pills so-tabs-warning so-tabs-sm" role="tablist" data-so-tabs>
                                            <button class="so-tab active" role="tab">Active</button>
                                            <button class="so-tab" role="tab">Tab 2</button>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="so-demo-section-title-sm">Info</h5>
                                        <div class="so-tabs so-tabs-pills so-tabs-info so-tabs-sm" role="tablist" data-so-tabs>
                                            <button class="so-tab active" role="tab">Active</button>
                                            <button class="so-tab" role="tab">Tab 2</button>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="so-demo-section-title-sm">Secondary</h5>
                                        <div class="so-tabs so-tabs-pills so-tabs-secondary so-tabs-sm" role="tablist" data-so-tabs>
                                            <button class="so-tab active" role="tab">Active</button>
                                            <button class="so-tab" role="tab">Tab 2</button>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="so-demo-section-title-sm">Light</h5>
                                        <div class="so-tabs so-tabs-pills so-tabs-light so-tabs-sm" role="tablist" data-so-tabs>
                                            <button class="so-tab active" role="tab">Active</button>
                                            <button class="so-tab" role="tab">Tab 2</button>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="so-demo-section-title-sm">Dark</h5>
                                        <div class="so-tabs so-tabs-pills so-tabs-dark so-tabs-sm" role="tablist" data-so-tabs>
                                            <button class="so-tab active" role="tab">Active</button>
                                            <button class="so-tab" role="tab">Tab 2</button>
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
                                <pre class="so-code-content"><code class="language-html">&lt;div class="so-tabs so-tabs-pills so-tabs-primary"&gt;...&lt;/div&gt;
&lt;div class="so-tabs so-tabs-pills so-tabs-success"&gt;...&lt;/div&gt;
&lt;div class="so-tabs so-tabs-pills so-tabs-danger"&gt;...&lt;/div&gt;
&lt;div class="so-tabs so-tabs-pills so-tabs-warning"&gt;...&lt;/div&gt;
&lt;div class="so-tabs so-tabs-pills so-tabs-info"&gt;...&lt;/div&gt;
&lt;div class="so-tabs so-tabs-pills so-tabs-secondary"&gt;...&lt;/div&gt;
&lt;div class="so-tabs so-tabs-pills so-tabs-light"&gt;...&lt;/div&gt;
&lt;div class="so-tabs so-tabs-pills so-tabs-dark"&gt;...&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Tabs with Icons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Tabs with Icons</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-tabs so-tabs-pills" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab" data-so-target="#demo-icons-1">
                                        <span class="material-icons">home</span>
                                        Home
                                    </button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-icons-2">
                                        <span class="material-icons">person</span>
                                        Profile
                                    </button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-icons-3">
                                        <span class="material-icons">mail</span>
                                        Messages
                                    </button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-icons-4">
                                        <span class="material-icons">settings</span>
                                        Settings
                                    </button>
                                </div>
                                <div class="so-tab-content">
                                    <div class="so-tab-pane fade show active" id="demo-icons-1" role="tabpanel">
                                        <p>Home content with icon in tab.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-icons-2" role="tabpanel">
                                        <p>Profile content.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-icons-3" role="tabpanel">
                                        <p>Messages content.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-icons-4" role="tabpanel">
                                        <p>Settings content.</p>
                                    </div>
                        </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;div class="so-tabs so-tabs-pills" role="tablist" data-so-tabs&gt;
    &lt;button class="so-tab active" role="tab" data-so-target="#panel1"&gt;
        &lt;span class="material-icons"&gt;home&lt;/span&gt;
        Home
    &lt;/button&gt;
    &lt;button class="so-tab" role="tab" data-so-target="#panel2"&gt;
        &lt;span class="material-icons"&gt;person&lt;/span&gt;
        Profile
    &lt;/button&gt;
&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Vertical Tabs -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Vertical Tabs</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-tabs-container so-tabs-container-vertical">
                                    <div class="so-tabs so-tabs-vertical" role="tablist" data-so-tabs>
                                        <button class="so-tab active" role="tab" data-so-target="#demo-vert-1">General</button>
                                        <button class="so-tab" role="tab" data-so-target="#demo-vert-2">Security</button>
                                        <button class="so-tab" role="tab" data-so-target="#demo-vert-3">Notifications</button>
                                        <button class="so-tab" role="tab" data-so-target="#demo-vert-4">Privacy</button>
                                    </div>
                                    <div class="so-tab-content">
                                        <div class="so-tab-pane fade show active" id="demo-vert-1" role="tabpanel">
                                            <h5 class="so-demo-card-title">General Settings</h5>
                                            <p>Configure your general application settings here. Vertical tabs are great for settings pages with many sections.</p>
                                        </div>
                                        <div class="so-tab-pane fade" id="demo-vert-2" role="tabpanel">
                                            <h5 class="so-demo-card-title">Security Settings</h5>
                                            <p>Manage your security preferences and two-factor authentication.</p>
                                        </div>
                                        <div class="so-tab-pane fade" id="demo-vert-3" role="tabpanel">
                                            <h5 class="so-demo-card-title">Notification Preferences</h5>
                                            <p>Control which notifications you receive and how.</p>
                                        </div>
                                        <div class="so-tab-pane fade" id="demo-vert-4" role="tabpanel">
                                            <h5 class="so-demo-card-title">Privacy Settings</h5>
                                            <p>Manage your privacy and data sharing preferences.</p>
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
                                <pre class="so-code-content"><code class="language-html">&lt;div class="so-tabs-container so-tabs-container-vertical"&gt;
    &lt;div class="so-tabs so-tabs-vertical" role="tablist" data-so-tabs&gt;
        &lt;button class="so-tab active" role="tab" data-so-target="#panel1"&gt;General&lt;/button&gt;
        &lt;button class="so-tab" role="tab" data-so-target="#panel2"&gt;Security&lt;/button&gt;
        &lt;button class="so-tab" role="tab" data-so-target="#panel3"&gt;Notifications&lt;/button&gt;
    &lt;/div&gt;
    &lt;div class="so-tab-content"&gt;
        &lt;div class="so-tab-pane fade show active" id="panel1"&gt;...&lt;/div&gt;
        &lt;div class="so-tab-pane fade" id="panel2"&gt;...&lt;/div&gt;
        &lt;div class="so-tab-pane fade" id="panel3"&gt;...&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Alignment Options -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Alignment Options</h3>
                    </div>
                    <div class="so-card-body">
                                                        <h5 class="so-demo-section-title-sm">Center Aligned</h5>
                                <div class="so-tabs so-tabs-center so-mb-4" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab">Tab 1</button>
                                    <button class="so-tab" role="tab">Tab 2</button>
                                    <button class="so-tab" role="tab">Tab 3</button>
                                </div>

                                <h5 class="so-demo-section-title-sm">Right Aligned</h5>
                                <div class="so-tabs so-tabs-end so-mb-4" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab">Tab 1</button>
                                    <button class="so-tab" role="tab">Tab 2</button>
                                    <button class="so-tab" role="tab">Tab 3</button>
                                </div>

                                <h5 class="so-demo-section-title-sm">Justified (Full Width)</h5>
                                <div class="so-tabs so-tabs-justified" role="tablist" data-so-tabs>
                                    <button class="so-tab active" role="tab">Tab 1</button>
                                    <button class="so-tab" role="tab">Tab 2</button>
                                    <button class="so-tab" role="tab">Tab 3</button>
                        </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;!-- Center aligned --&gt;
&lt;div class="so-tabs so-tabs-center" role="tablist"&gt;...&lt;/div&gt;

&lt;!-- Right aligned --&gt;
&lt;div class="so-tabs so-tabs-end" role="tablist"&gt;...&lt;/div&gt;

&lt;!-- Justified (equal width) --&gt;
&lt;div class="so-tabs so-tabs-justified" role="tablist"&gt;...&lt;/div&gt;

&lt;!-- Fill (proportional) --&gt;
&lt;div class="so-tabs so-tabs-fill" role="tablist"&gt;...&lt;/div&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- JavaScript Events -->
                <div class="so-card">
                    <div class="so-card-header">
                        <h3 class="so-card-title">JavaScript API & Events</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-tabs so-tabs-pills" role="tablist" data-so-tabs id="demo-events-tabs">
                                    <button class="so-tab active" role="tab" data-so-target="#demo-events-1">Tab 1</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-events-2">Tab 2</button>
                                    <button class="so-tab" role="tab" data-so-target="#demo-events-3">Tab 3</button>
                                </div>
                                <div class="so-tab-content">
                                    <div class="so-tab-pane fade show active" id="demo-events-1" role="tabpanel">
                                        <p>Tab 1 content - Check the console to see events firing.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-events-2" role="tabpanel">
                                        <p>Tab 2 content.</p>
                                    </div>
                                    <div class="so-tab-pane fade" id="demo-events-3" role="tabpanel">
                                        <p>Tab 3 content.</p>
                                    </div>
                                </div>
                                <div>
                                    <button class="so-btn so-btn-outline so-btn-sm" onclick="demoTabsNext()">Next Tab</button>
                                    <button class="so-btn so-btn-outline so-btn-sm" onclick="demoTabsPrev()">Previous Tab</button>
                                    <button class="so-btn so-btn-outline so-btn-sm" onclick="demoTabsShowById()">Show Tab 3</button>
                                </div>
                                <p class="so-demo-note">Open browser console to see event logs</p>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-javascript">// Get tabs instance
const tabsEl = document.querySelector('#my-tabs');
const tabs = SOTabs.getInstance(tabsEl);

// Public methods
tabs.show(2);           // Show tab by index (0-based)
tabs.showById('panel3'); // Show tab by target ID
tabs.next();            // Go to next tab
tabs.prev();            // Go to previous tab
tabs.getActiveTab();    // Get active tab element
tabs.getActiveIndex();  // Get active tab index

// Events (use 'so:' prefix)
tabsEl.addEventListener('so:tab:show', (e) => {
    console.log('About to show:', e.target);
    console.log('Previous tab:', e.detail.relatedTarget);
    // e.preventDefault(); // Can cancel tab change
});

tabsEl.addEventListener('so:tab:shown', (e) => {
    console.log('Tab shown:', e.target);
});

tabsEl.addEventListener('so:tab:hide', (e) => {
    console.log('About to hide:', e.target);
});

tabsEl.addEventListener('so:tab:hidden', (e) => {
    console.log('Tab hidden:', e.target);
});</code></pre>
                            </div>
                    </div>
                </div>
            </div>

