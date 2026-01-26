            <div class="so-tab-pane fade" id="pane-colors" role="tabpanel">
                <!-- Text Colors -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Text Colors</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Apply contextual colors to text elements using <code>.so-text-{color}</code> classes.</p>

                        <h4 class="so-demo-section-heading-spaced">8 Contextual Colors</h4>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <span class="so-text-primary so-fw-medium">Primary</span>
                            <span class="so-text-success so-fw-medium">Success</span>
                            <span class="so-text-warning so-fw-medium">Warning</span>
                            <span class="so-text-info so-fw-medium">Info</span>
                            <span class="so-text-danger so-fw-medium">Danger</span>
                            <span class="so-text-secondary so-fw-medium">Secondary</span>
                            <span class="so-text-dark so-fw-medium">Dark</span>
                            <span class="so-text-light so-bg-dark so-p-2 so-rounded so-fw-medium">Light</span>
                        </div>

                        <h4 class="so-demo-section-heading-spaced">Additional Text Colors</h4>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <span class="so-text-white so-bg-dark so-p-2 so-rounded">White</span>
                            <span class="so-text-black">Black</span>
                            <span class="so-text-muted">Muted</span>
                            <span class="so-text-body">Body</span>
                            <span class="so-text-body-secondary">Body Secondary</span>
                            <span class="so-text-body-tertiary">Body Tertiary</span>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;span class="so-text-primary"&gt;Primary&lt;/span&gt;
&lt;span class="so-text-success"&gt;Success&lt;/span&gt;
&lt;span class="so-text-warning"&gt;Warning&lt;/span&gt;
&lt;span class="so-text-info"&gt;Info&lt;/span&gt;
&lt;span class="so-text-danger"&gt;Danger&lt;/span&gt;
&lt;span class="so-text-secondary"&gt;Secondary&lt;/span&gt;
&lt;span class="so-text-dark"&gt;Dark&lt;/span&gt;
&lt;span class="so-text-light"&gt;Light&lt;/span&gt;

&lt;!-- Additional colors --&gt;
&lt;span class="so-text-white"&gt;White&lt;/span&gt;
&lt;span class="so-text-black"&gt;Black&lt;/span&gt;
&lt;span class="so-text-muted"&gt;Muted&lt;/span&gt;
&lt;span class="so-text-body"&gt;Body (theme-aware)&lt;/span&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Background Colors -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Background Colors</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Apply contextual background colors using <code>.so-bg-{color}</code> classes.</p>

                        <h4 class="so-demo-section-heading-spaced">8 Contextual Backgrounds</h4>
                        <div class="so-grid so-grid-cols-4 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-3 so-mb-4">
                            <div class="so-bg-primary so-text-white so-p-3 so-rounded so-text-center">Primary</div>
                            <div class="so-bg-success so-text-white so-p-3 so-rounded so-text-center">Success</div>
                            <div class="so-bg-warning so-text-dark so-p-3 so-rounded so-text-center">Warning</div>
                            <div class="so-bg-info so-text-white so-p-3 so-rounded so-text-center">Info</div>
                            <div class="so-bg-danger so-text-white so-p-3 so-rounded so-text-center">Danger</div>
                            <div class="so-bg-secondary so-text-white so-p-3 so-rounded so-text-center">Secondary</div>
                            <div class="so-bg-dark so-text-white so-p-3 so-rounded so-text-center">Dark</div>
                            <div class="so-bg-light so-text-dark so-p-3 so-rounded so-text-center" style="border: 1px solid var(--so-border-color)">Light</div>
                        </div>

                        <h4 class="so-demo-section-heading-spaced">Additional Backgrounds</h4>
                        <div class="so-flex so-gap-3 so-flex-wrap so-mb-4">
                            <div class="so-bg-white so-text-dark so-p-3 so-rounded" style="border: 1px solid var(--so-border-color)">White</div>
                            <div class="so-bg-black so-text-white so-p-3 so-rounded">Black</div>
                            <div class="so-bg-transparent so-p-3 so-rounded" style="border: 1px dashed var(--so-border-color)">Transparent</div>
                            <div class="so-bg-body so-p-3 so-rounded" style="border: 1px solid var(--so-border-color)">Body (theme-aware)</div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;div class="so-bg-primary so-text-white"&gt;Primary&lt;/div&gt;
&lt;div class="so-bg-success so-text-white"&gt;Success&lt;/div&gt;
&lt;div class="so-bg-warning so-text-dark"&gt;Warning&lt;/div&gt;
&lt;div class="so-bg-info so-text-white"&gt;Info&lt;/div&gt;
&lt;div class="so-bg-danger so-text-white"&gt;Danger&lt;/div&gt;
&lt;div class="so-bg-secondary so-text-white"&gt;Secondary&lt;/div&gt;
&lt;div class="so-bg-dark so-text-white"&gt;Dark&lt;/div&gt;
&lt;div class="so-bg-light so-text-dark"&gt;Light&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Subtle Backgrounds -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Subtle Backgrounds</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Light/pastel background variants using <code>.so-bg-{color}-subtle</code> classes. Great for alerts and highlighted sections.</p>

                        <div class="so-grid so-grid-cols-4 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-3 so-mb-4">
                            <div class="so-bg-primary-subtle so-text-primary so-p-3 so-rounded so-text-center">Primary Subtle</div>
                            <div class="so-bg-success-subtle so-text-success so-p-3 so-rounded so-text-center">Success Subtle</div>
                            <div class="so-bg-warning-subtle so-text-warning so-p-3 so-rounded so-text-center">Warning Subtle</div>
                            <div class="so-bg-info-subtle so-text-info so-p-3 so-rounded so-text-center">Info Subtle</div>
                            <div class="so-bg-danger-subtle so-text-danger so-p-3 so-rounded so-text-center">Danger Subtle</div>
                            <div class="so-bg-secondary-subtle so-text-secondary so-p-3 so-rounded so-text-center">Secondary Subtle</div>
                            <div class="so-bg-dark-subtle so-text-white so-p-3 so-rounded so-text-center">Dark Subtle</div>
                            <div class="so-bg-light-subtle so-text-dark so-p-3 so-rounded so-text-center" style="border: 1px solid var(--so-border-color)">Light Subtle</div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;div class="so-bg-primary-subtle so-text-primary"&gt;Primary Subtle&lt;/div&gt;
&lt;div class="so-bg-success-subtle so-text-success"&gt;Success Subtle&lt;/div&gt;
&lt;div class="so-bg-warning-subtle so-text-warning"&gt;Warning Subtle&lt;/div&gt;
&lt;div class="so-bg-info-subtle so-text-info"&gt;Info Subtle&lt;/div&gt;
&lt;div class="so-bg-danger-subtle so-text-danger"&gt;Danger Subtle&lt;/div&gt;
&lt;div class="so-bg-secondary-subtle so-text-secondary"&gt;Secondary Subtle&lt;/div&gt;
&lt;div class="so-bg-dark-subtle so-text-white"&gt;Dark Subtle&lt;/div&gt;
&lt;div class="so-bg-light-subtle so-text-dark"&gt;Light Subtle&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Background Opacity -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Background Opacity</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Control background transparency using <code>.so-bg-opacity-{value}</code> modifiers. Available values: 10, 25, 50, 75, 100.</p>

                        <h4 class="so-demo-section-heading-spaced">Primary with Opacity</h4>
                        <div class="so-flex so-gap-3 so-flex-wrap so-mb-4">
                            <div class="so-bg-primary so-bg-opacity-100 so-text-white so-p-3 so-rounded">100%</div>
                            <div class="so-bg-primary so-bg-opacity-75 so-text-white so-p-3 so-rounded">75%</div>
                            <div class="so-bg-primary so-bg-opacity-50 so-p-3 so-rounded">50%</div>
                            <div class="so-bg-primary so-bg-opacity-25 so-p-3 so-rounded">25%</div>
                            <div class="so-bg-primary so-bg-opacity-10 so-p-3 so-rounded">10%</div>
                        </div>

                        <h4 class="so-demo-section-heading-spaced">All Colors at 50% Opacity</h4>
                        <div class="so-grid so-grid-cols-4 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-3 so-mb-4">
                            <div class="so-bg-primary so-bg-opacity-50 so-p-3 so-rounded so-text-center">Primary 50%</div>
                            <div class="so-bg-success so-bg-opacity-50 so-p-3 so-rounded so-text-center">Success 50%</div>
                            <div class="so-bg-warning so-bg-opacity-50 so-p-3 so-rounded so-text-center">Warning 50%</div>
                            <div class="so-bg-info so-bg-opacity-50 so-p-3 so-rounded so-text-center">Info 50%</div>
                            <div class="so-bg-danger so-bg-opacity-50 so-p-3 so-rounded so-text-center">Danger 50%</div>
                            <div class="so-bg-secondary so-bg-opacity-50 so-p-3 so-rounded so-text-center">Secondary 50%</div>
                            <div class="so-bg-dark so-bg-opacity-50 so-p-3 so-rounded so-text-center">Dark 50%</div>
                            <div class="so-bg-light so-bg-opacity-50 so-p-3 so-rounded so-text-center">Light 50%</div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;div class="so-bg-primary so-bg-opacity-100"&gt;100%&lt;/div&gt;
&lt;div class="so-bg-primary so-bg-opacity-75"&gt;75%&lt;/div&gt;
&lt;div class="so-bg-primary so-bg-opacity-50"&gt;50%&lt;/div&gt;
&lt;div class="so-bg-primary so-bg-opacity-25"&gt;25%&lt;/div&gt;
&lt;div class="so-bg-primary so-bg-opacity-10"&gt;10%&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Text Opacity -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Text Opacity</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Control text transparency using <code>.so-text-opacity-{value}</code> modifiers. Available values: 25, 50, 75, 100.</p>

                        <h4 class="so-demo-section-heading-spaced">Primary Text with Opacity</h4>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <span class="so-text-primary so-text-opacity-100 so-fw-bold so-text-lg">100%</span>
                            <span class="so-text-primary so-text-opacity-75 so-fw-bold so-text-lg">75%</span>
                            <span class="so-text-primary so-text-opacity-50 so-fw-bold so-text-lg">50%</span>
                            <span class="so-text-primary so-text-opacity-25 so-fw-bold so-text-lg">25%</span>
                        </div>

                        <h4 class="so-demo-section-heading-spaced">All Colors at 75% Opacity</h4>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <span class="so-text-primary so-text-opacity-75 so-fw-medium">Primary</span>
                            <span class="so-text-success so-text-opacity-75 so-fw-medium">Success</span>
                            <span class="so-text-warning so-text-opacity-75 so-fw-medium">Warning</span>
                            <span class="so-text-info so-text-opacity-75 so-fw-medium">Info</span>
                            <span class="so-text-danger so-text-opacity-75 so-fw-medium">Danger</span>
                            <span class="so-text-secondary so-text-opacity-75 so-fw-medium">Secondary</span>
                            <span class="so-text-dark so-text-opacity-75 so-fw-medium">Dark</span>
                            <span class="so-text-light so-text-opacity-75 so-bg-dark so-p-2 so-rounded so-fw-medium">Light</span>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;span class="so-text-primary so-text-opacity-100"&gt;100%&lt;/span&gt;
&lt;span class="so-text-primary so-text-opacity-75"&gt;75%&lt;/span&gt;
&lt;span class="so-text-primary so-text-opacity-50"&gt;50%&lt;/span&gt;
&lt;span class="so-text-primary so-text-opacity-25"&gt;25%&lt;/span&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Link Colors -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Link Colors</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Style links with contextual colors using <code>.so-link-{color}</code> classes. Includes hover states.</p>

                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <a href="#" class="so-link-primary" onclick="return false;">Primary Link</a>
                            <a href="#" class="so-link-success" onclick="return false;">Success Link</a>
                            <a href="#" class="so-link-warning" onclick="return false;">Warning Link</a>
                            <a href="#" class="so-link-info" onclick="return false;">Info Link</a>
                            <a href="#" class="so-link-danger" onclick="return false;">Danger Link</a>
                            <a href="#" class="so-link-secondary" onclick="return false;">Secondary Link</a>
                            <a href="#" class="so-link-dark" onclick="return false;">Dark Link</a>
                            <span class="so-bg-dark so-p-2 so-rounded">
                                <a href="#" class="so-link-light" onclick="return false;">Light Link</a>
                            </span>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;a href="#" class="so-link-primary"&gt;Primary Link&lt;/a&gt;
&lt;a href="#" class="so-link-success"&gt;Success Link&lt;/a&gt;
&lt;a href="#" class="so-link-warning"&gt;Warning Link&lt;/a&gt;
&lt;a href="#" class="so-link-info"&gt;Info Link&lt;/a&gt;
&lt;a href="#" class="so-link-danger"&gt;Danger Link&lt;/a&gt;
&lt;a href="#" class="so-link-secondary"&gt;Secondary Link&lt;/a&gt;
&lt;a href="#" class="so-link-dark"&gt;Dark Link&lt;/a&gt;
&lt;a href="#" class="so-link-light"&gt;Light Link&lt;/a&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Focus Rings -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Focus Rings</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Add colored focus rings to focusable elements using <code>.so-focus-ring-{color}</code> classes. Click or tab to see the focus state.</p>

                        <div class="so-flex so-gap-3 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-outline so-focus-ring-primary">Primary Focus</button>
                            <button class="so-btn so-btn-outline so-focus-ring-success">Success Focus</button>
                            <button class="so-btn so-btn-outline so-focus-ring-warning">Warning Focus</button>
                            <button class="so-btn so-btn-outline so-focus-ring-info">Info Focus</button>
                            <button class="so-btn so-btn-outline so-focus-ring-danger">Danger Focus</button>
                            <button class="so-btn so-btn-outline so-focus-ring-secondary">Secondary Focus</button>
                            <button class="so-btn so-btn-outline so-focus-ring-dark">Dark Focus</button>
                            <button class="so-btn so-btn-outline so-focus-ring-light">Light Focus</button>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-focus-ring-primary"&gt;Primary Focus&lt;/button&gt;
&lt;button class="so-btn so-focus-ring-success"&gt;Success Focus&lt;/button&gt;
&lt;button class="so-btn so-focus-ring-warning"&gt;Warning Focus&lt;/button&gt;
&lt;button class="so-btn so-focus-ring-info"&gt;Info Focus&lt;/button&gt;
&lt;button class="so-btn so-focus-ring-danger"&gt;Danger Focus&lt;/button&gt;
&lt;button class="so-btn so-focus-ring-secondary"&gt;Secondary Focus&lt;/button&gt;
&lt;button class="so-btn so-focus-ring-dark"&gt;Dark Focus&lt;/button&gt;
&lt;button class="so-btn so-focus-ring-light"&gt;Light Focus&lt;/button&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Gradients -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Gradients</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Apply gradient backgrounds using <code>.so-bg-gradient-{color}</code> classes.</p>

                        <div class="so-grid so-grid-cols-4 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-3 so-mb-4">
                            <div class="so-bg-gradient-primary so-text-white so-p-4 so-rounded so-text-center">Primary Gradient</div>
                            <div class="so-bg-gradient-success so-text-white so-p-4 so-rounded so-text-center">Success Gradient</div>
                            <div class="so-bg-gradient-warning so-text-dark so-p-4 so-rounded so-text-center">Warning Gradient</div>
                            <div class="so-bg-gradient-info so-text-white so-p-4 so-rounded so-text-center">Info Gradient</div>
                            <div class="so-bg-gradient-danger so-text-white so-p-4 so-rounded so-text-center">Danger Gradient</div>
                            <div class="so-bg-gradient-secondary so-text-white so-p-4 so-rounded so-text-center">Secondary Gradient</div>
                            <div class="so-bg-gradient-dark so-text-white so-p-4 so-rounded so-text-center">Dark Gradient</div>
                            <div class="so-bg-gradient-light so-text-dark so-p-4 so-rounded so-text-center">Light Gradient</div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;div class="so-bg-gradient-primary so-text-white"&gt;Primary Gradient&lt;/div&gt;
&lt;div class="so-bg-gradient-success so-text-white"&gt;Success Gradient&lt;/div&gt;
&lt;div class="so-bg-gradient-warning so-text-dark"&gt;Warning Gradient&lt;/div&gt;
&lt;div class="so-bg-gradient-info so-text-white"&gt;Info Gradient&lt;/div&gt;
&lt;div class="so-bg-gradient-danger so-text-white"&gt;Danger Gradient&lt;/div&gt;
&lt;div class="so-bg-gradient-secondary so-text-white"&gt;Secondary Gradient&lt;/div&gt;
&lt;div class="so-bg-gradient-dark so-text-white"&gt;Dark Gradient&lt;/div&gt;
&lt;div class="so-bg-gradient-light so-text-dark"&gt;Light Gradient&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Combined Examples -->
                <div class="so-card">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Combined Examples</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Real-world usage combining multiple color utilities.</p>

                        <h4 class="so-demo-section-heading-spaced">Alert-style Boxes</h4>
                        <div class="so-flex so-flex-col so-gap-3 so-mb-4">
                            <div class="so-bg-primary-subtle so-text-primary so-p-3 so-rounded so-flex so-items-center so-gap-2">
                                <span class="material-icons">info</span>
                                <span>This is a primary alert message with subtle background.</span>
                            </div>
                            <div class="so-bg-success-subtle so-text-success so-p-3 so-rounded so-flex so-items-center so-gap-2">
                                <span class="material-icons">check_circle</span>
                                <span>Success! Your changes have been saved.</span>
                            </div>
                            <div class="so-bg-warning-subtle so-text-warning so-p-3 so-rounded so-flex so-items-center so-gap-2">
                                <span class="material-icons">warning</span>
                                <span>Warning! Please review before proceeding.</span>
                            </div>
                            <div class="so-bg-danger-subtle so-text-danger so-p-3 so-rounded so-flex so-items-center so-gap-2">
                                <span class="material-icons">error</span>
                                <span>Error! Something went wrong.</span>
                            </div>
                            <div class="so-bg-info-subtle so-text-info so-p-3 so-rounded so-flex so-items-center so-gap-2">
                                <span class="material-icons">lightbulb</span>
                                <span>Tip: You can use keyboard shortcuts for faster navigation.</span>
                            </div>
                            <div class="so-bg-secondary-subtle so-text-secondary so-p-3 so-rounded so-flex so-items-center so-gap-2">
                                <span class="material-icons">chat</span>
                                <span>Note: This is a secondary message.</span>
                            </div>
                            <div class="so-bg-dark-subtle so-text-white so-p-3 so-rounded so-flex so-items-center so-gap-2">
                                <span class="material-icons">dark_mode</span>
                                <span>Dark mode notification style.</span>
                            </div>
                            <div class="so-bg-light-subtle so-text-dark so-p-3 so-rounded so-flex so-items-center so-gap-2" style="border: 1px solid var(--so-border-color)">
                                <span class="material-icons">light_mode</span>
                                <span>Light notification style.</span>
                            </div>
                        </div>

                        <h4 class="so-demo-section-heading-spaced">Status Indicators</h4>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <div class="so-flex so-items-center so-gap-2">
                                <span class="so-bg-success so-rounded" style="width: 10px; height: 10px; display: inline-block;"></span>
                                <span>Online</span>
                            </div>
                            <div class="so-flex so-items-center so-gap-2">
                                <span class="so-bg-warning so-rounded" style="width: 10px; height: 10px; display: inline-block;"></span>
                                <span>Away</span>
                            </div>
                            <div class="so-flex so-items-center so-gap-2">
                                <span class="so-bg-danger so-rounded" style="width: 10px; height: 10px; display: inline-block;"></span>
                                <span>Busy</span>
                            </div>
                            <div class="so-flex so-items-center so-gap-2">
                                <span class="so-bg-secondary so-rounded" style="width: 10px; height: 10px; display: inline-block;"></span>
                                <span>Offline</span>
                            </div>
                        </div>

                        <h4 class="so-demo-section-heading-spaced">Inline Badges with Colors</h4>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <span class="so-bg-primary so-text-white so-px-2 so-py-1 so-rounded so-text-sm">Primary</span>
                            <span class="so-bg-success so-text-white so-px-2 so-py-1 so-rounded so-text-sm">Success</span>
                            <span class="so-bg-warning so-text-dark so-px-2 so-py-1 so-rounded so-text-sm">Warning</span>
                            <span class="so-bg-info so-text-white so-px-2 so-py-1 so-rounded so-text-sm">Info</span>
                            <span class="so-bg-danger so-text-white so-px-2 so-py-1 so-rounded so-text-sm">Danger</span>
                            <span class="so-bg-secondary so-text-white so-px-2 so-py-1 so-rounded so-text-sm">Secondary</span>
                            <span class="so-bg-dark so-text-white so-px-2 so-py-1 so-rounded so-text-sm">Dark</span>
                            <span class="so-bg-light so-text-dark so-px-2 so-py-1 so-rounded so-text-sm" style="border: 1px solid var(--so-border-color)">Light</span>
                        </div>

                        <h4 class="so-demo-section-heading-spaced">Cards with Colored Headers</h4>
                        <div class="so-grid so-grid-cols-4 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-3">
                            <div class="so-card so-card-bordered">
                                <div class="so-bg-primary so-text-white so-p-3" style="border-radius: 7px 7px 0 0;">
                                    <strong>Primary</strong>
                                </div>
                                <div class="so-p-3">Card content here.</div>
                            </div>
                            <div class="so-card so-card-bordered">
                                <div class="so-bg-success so-text-white so-p-3" style="border-radius: 7px 7px 0 0;">
                                    <strong>Success</strong>
                                </div>
                                <div class="so-p-3">Card content here.</div>
                            </div>
                            <div class="so-card so-card-bordered">
                                <div class="so-bg-danger so-text-white so-p-3" style="border-radius: 7px 7px 0 0;">
                                    <strong>Danger</strong>
                                </div>
                                <div class="so-p-3">Card content here.</div>
                            </div>
                            <div class="so-card so-card-bordered">
                                <div class="so-bg-gradient-info so-text-white so-p-3" style="border-radius: 7px 7px 0 0;">
                                    <strong>Gradient</strong>
                                </div>
                                <div class="so-p-3">Card with gradient header.</div>
                            </div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Alert box --&gt;
&lt;div class="so-bg-success-subtle so-text-success so-p-3 so-rounded so-flex so-items-center so-gap-2"&gt;
    &lt;span class="material-icons"&gt;check_circle&lt;/span&gt;
    &lt;span&gt;Success! Your changes have been saved.&lt;/span&gt;
&lt;/div&gt;

&lt;!-- Status indicator --&gt;
&lt;div class="so-flex so-items-center so-gap-2"&gt;
    &lt;span class="so-bg-success so-rounded" style="width: 10px; height: 10px;"&gt;&lt;/span&gt;
    &lt;span&gt;Online&lt;/span&gt;
&lt;/div&gt;

&lt;!-- Inline badge --&gt;
&lt;span class="so-bg-primary so-text-white so-px-2 so-py-1 so-rounded so-text-sm"&gt;Badge&lt;/span&gt;

&lt;!-- Card with colored header --&gt;
&lt;div class="so-card so-card-bordered"&gt;
    &lt;div class="so-bg-primary so-text-white so-p-3" style="border-radius: 7px 7px 0 0;"&gt;
        &lt;strong&gt;Title&lt;/strong&gt;
    &lt;/div&gt;
    &lt;div class="so-p-3"&gt;Content&lt;/div&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </div>
