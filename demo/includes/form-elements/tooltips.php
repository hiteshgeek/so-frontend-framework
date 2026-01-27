            <div class="so-tab-pane so-fade" id="pane-tooltips" role="tabpanel">
                <!-- Basic Tooltips -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Basic Tooltips</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-demo-desc">
                            JavaScript-powered tooltips with automatic positioning and animations.
                        </p>
                                                        <div class="so-flex so-gap-3 so-flex-wrap">
                                    <button class="so-btn so-btn-primary" data-so-tooltip="Tooltip on top">Top</button>
                                    <button class="so-btn so-btn-primary" data-so-tooltip="Tooltip on bottom" data-so-tooltip-position="bottom">Bottom</button>
                                    <button class="so-btn so-btn-primary" data-so-tooltip="Tooltip on left" data-so-tooltip-position="left">Left</button>
                                    <button class="so-btn so-btn-primary" data-so-tooltip="Tooltip on right" data-so-tooltip-position="right">Right</button>
                                </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)" data-so-tooltip="Copy code" data-so-shortcut="Ctrl+C">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button data-so-tooltip="Tooltip on top"&gt;Top&lt;/button&gt;
&lt;button data-so-tooltip="Tooltip on bottom" data-so-tooltip-position="bottom"&gt;Bottom&lt;/button&gt;
&lt;button data-so-tooltip="Tooltip on left" data-so-tooltip-position="left"&gt;Left&lt;/button&gt;
&lt;button data-so-tooltip="Tooltip on right" data-so-tooltip-position="right"&gt;Right&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Keyboard Shortcuts -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Keyboard Shortcuts</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-demo-desc">
                            Display keyboard shortcuts alongside tooltip text. Automatically adapts for Mac (⌘) and Windows (Ctrl).
                        </p>
                                                        <div class="so-flex so-gap-3 so-flex-wrap">
                                    <button class="so-btn so-btn-secondary" data-so-tooltip="Copy" data-so-shortcut="Ctrl+C">
                                        <span class="material-icons" class="so-tooltip-demo-icon">content_copy</span>
                                        Copy
                                    </button>
                                    <button class="so-btn so-btn-secondary" data-so-tooltip="Paste" data-so-shortcut="Ctrl+V">
                                        <span class="material-icons" class="so-tooltip-demo-icon">content_paste</span>
                                        Paste
                                    </button>
                                    <button class="so-btn so-btn-secondary" data-so-tooltip="Save" data-so-shortcut="Ctrl+S">
                                        <span class="material-icons" class="so-tooltip-demo-icon">save</span>
                                        Save
                                    </button>
                                    <button class="so-btn so-btn-secondary" data-so-tooltip="Undo" data-so-shortcut="Ctrl+Z">
                                        <span class="material-icons" class="so-tooltip-demo-icon">undo</span>
                                        Undo
                                    </button>
                                    <button class="so-btn so-btn-secondary" data-so-tooltip="Command Palette" data-so-shortcut="Ctrl+Shift+P">
                                        <span class="material-icons" class="so-tooltip-demo-icon">terminal</span>
                                        Commands
                                    </button>
                                </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)" data-so-tooltip="Copy code" data-so-shortcut="Ctrl+C">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button data-so-tooltip="Copy" data-so-shortcut="Ctrl+C"&gt;Copy&lt;/button&gt;
&lt;button data-so-tooltip="Paste" data-so-shortcut="Ctrl+V"&gt;Paste&lt;/button&gt;
&lt;button data-so-tooltip="Save" data-so-shortcut="Ctrl+S"&gt;Save&lt;/button&gt;
&lt;button data-so-tooltip="Undo" data-so-shortcut="Ctrl+Z"&gt;Undo&lt;/button&gt;
&lt;button data-so-tooltip="Command Palette" data-so-shortcut="Ctrl+Shift+P"&gt;Commands&lt;/button&gt;</code></pre>
                            </div>

                        <!-- Shortcut-only tooltip -->
                        <h4 class="so-demo-section-heading-spaced">Shortcut Only</h4>
                                                        <div class="so-flex so-gap-3 so-flex-wrap">
                                    <button class="so-btn so-btn-ghost" data-so-shortcut="Escape">
                                        <span class="material-icons" class="so-tooltip-demo-icon">close</span>
                                    </button>
                                    <button class="so-btn so-btn-ghost" data-so-shortcut="Enter">
                                        <span class="material-icons" class="so-tooltip-demo-icon">check</span>
                                    </button>
                                    <button class="so-btn so-btn-ghost" data-so-shortcut="Tab">
                                        <span class="material-icons" class="so-tooltip-demo-icon">keyboard_tab</span>
                                    </button>
                                </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)" data-so-tooltip="Copy code" data-so-shortcut="Ctrl+C">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;!-- Shortcut only (no text) --&gt;
&lt;button data-so-shortcut="Escape"&gt;...&lt;/button&gt;
&lt;button data-so-shortcut="Enter"&gt;...&lt;/button&gt;
&lt;button data-so-shortcut="Tab"&gt;...&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Color Variants -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Color Variants</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-flex so-gap-3 so-flex-wrap">
                                    <button class="so-btn so-btn-outline" data-so-tooltip="Default tooltip">Default</button>
                                    <button class="so-btn so-btn-outline-primary" data-so-tooltip="Primary color" data-so-tooltip-color="primary">Primary</button>
                                    <button class="so-btn so-btn-outline-success" data-so-tooltip="Success message" data-so-tooltip-color="success">Success</button>
                                    <button class="so-btn so-btn-outline-danger" data-so-tooltip="Danger alert" data-so-tooltip-color="danger">Danger</button>
                                    <button class="so-btn so-btn-outline-warning" data-so-tooltip="Warning notice" data-so-tooltip-color="warning">Warning</button>
                                    <button class="so-btn so-btn-outline-info" data-so-tooltip="Info hint" data-so-tooltip-color="info">Info</button>
                                    <button class="so-btn so-btn-outline-secondary" data-so-tooltip="Secondary style" data-so-tooltip-color="secondary">Secondary</button>
                                    <button class="so-btn so-btn-outline-light" data-so-tooltip="Light theme" data-so-tooltip-color="light">Light</button>
                                    <button class="so-btn so-btn-outline-dark" data-so-tooltip="Dark theme" data-so-tooltip-color="dark">Dark</button>
                                </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)" data-so-tooltip="Copy code" data-so-shortcut="Ctrl+C">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button data-so-tooltip="Default tooltip"&gt;Default&lt;/button&gt;
&lt;button data-so-tooltip="Primary color" data-so-tooltip-color="primary"&gt;Primary&lt;/button&gt;
&lt;button data-so-tooltip="Success message" data-so-tooltip-color="success"&gt;Success&lt;/button&gt;
&lt;button data-so-tooltip="Danger alert" data-so-tooltip-color="danger"&gt;Danger&lt;/button&gt;
&lt;button data-so-tooltip="Warning notice" data-so-tooltip-color="warning"&gt;Warning&lt;/button&gt;
&lt;button data-so-tooltip="Info hint" data-so-tooltip-color="info"&gt;Info&lt;/button&gt;
&lt;button data-so-tooltip="Secondary style" data-so-tooltip-color="secondary"&gt;Secondary&lt;/button&gt;
&lt;button data-so-tooltip="Light theme" data-so-tooltip-color="light"&gt;Light&lt;/button&gt;
&lt;button data-so-tooltip="Dark theme" data-so-tooltip-color="dark"&gt;Dark&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Size Variants -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Size Variants</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-flex so-gap-3 so-flex-wrap so-items-center">
                                    <button class="so-btn so-btn-secondary so-btn-sm" data-so-tooltip="Small tooltip" data-so-tooltip-size="sm">Small</button>
                                    <button class="so-btn so-btn-secondary" data-so-tooltip="Default tooltip size">Default</button>
                                    <button class="so-btn so-btn-secondary so-btn-lg" data-so-tooltip="Large tooltip" data-so-tooltip-size="lg">Large</button>
                                </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)" data-so-tooltip="Copy code" data-so-shortcut="Ctrl+C">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button data-so-tooltip="Small tooltip" data-so-tooltip-size="sm"&gt;Small&lt;/button&gt;
&lt;button data-so-tooltip="Default tooltip size"&gt;Default&lt;/button&gt;
&lt;button data-so-tooltip="Large tooltip" data-so-tooltip-size="lg"&gt;Large&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Light Theme -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Light Theme</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-demo-desc">
                            Light themed tooltips that adapt to light/dark mode.
                        </p>
                                                        <div class="so-flex so-gap-3 so-flex-wrap">
                                    <button class="so-btn so-btn-light" data-so-tooltip="Light themed tooltip" data-so-tooltip-theme="light">Light Theme</button>
                                    <button class="so-btn so-btn-light" data-so-tooltip="With shortcut" data-so-shortcut="Ctrl+L" data-so-tooltip-theme="light">Light + Shortcut</button>
                                </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)" data-so-tooltip="Copy code" data-so-shortcut="Ctrl+C">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button data-so-tooltip="Light themed tooltip" data-so-tooltip-theme="light"&gt;Light Theme&lt;/button&gt;
&lt;button data-so-tooltip="With shortcut" data-so-shortcut="Ctrl+L" data-so-tooltip-theme="light"&gt;Light + Shortcut&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Animation Variants -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Animation Variants</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-flex so-gap-3 so-flex-wrap">
                                    <button class="so-btn so-btn-outline" data-so-tooltip="Fade animation" data-so-tooltip-animation="fade">Fade</button>
                                    <button class="so-btn so-btn-outline" data-so-tooltip="Scale animation (default)" data-so-tooltip-animation="scale">Scale</button>
                                    <button class="so-btn so-btn-outline" data-so-tooltip="Slide animation" data-so-tooltip-animation="slide">Slide</button>
                                </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)" data-so-tooltip="Copy code" data-so-shortcut="Ctrl+C">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button data-so-tooltip="Fade animation" data-so-tooltip-animation="fade"&gt;Fade&lt;/button&gt;
&lt;button data-so-tooltip="Scale animation (default)" data-so-tooltip-animation="scale"&gt;Scale&lt;/button&gt;
&lt;button data-so-tooltip="Slide animation" data-so-tooltip-animation="slide"&gt;Slide&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- JavaScript API -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">JavaScript API</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-demo-desc">
                            Use the JavaScript API for programmatic control and temporary feedback tooltips.
                        </p>
                        <div class="so-flex so-gap-3 so-flex-wrap">
                            <button class="so-btn so-btn-primary" id="tooltip-api-demo" onclick="showApiTooltip(this)">
                                <span class="material-icons">mouse</span>
                                Click for Tooltip
                            </button>
                            <button class="so-btn so-btn-success" onclick="showSuccessTooltip(this)">
                                <span class="material-icons">check</span>
                                Show Success
                            </button>
                            <button class="so-btn so-btn-danger" onclick="showErrorTooltip(this)">
                                <span class="material-icons">error</span>
                                Show Error
                            </button>
                        </div>
                        <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                                    <button class="so-code-copy" onclick="copyCode(this)" data-so-tooltip="Copy code" data-so-shortcut="Ctrl+C">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-javascript">// Get or create tooltip instance
const tooltip = SOTooltip.getInstance(element, {
    content: 'Tooltip text',
    shortcut: 'Ctrl+S',
    position: 'top',
    color: 'primary',
    size: 'sm',
    theme: 'light',
    animation: 'scale',
    trigger: 'hover'
});

// Manual show/hide
tooltip.show();
tooltip.hide();
tooltip.toggle();

// Update content dynamically
tooltip.setContent('New content');
tooltip.setShortcut('Ctrl+N');
tooltip.setColor('success');
tooltip.setPosition('bottom');

// Enable/disable
tooltip.enable();
tooltip.disable();

// Show temporary feedback tooltip (auto-hides)
SOTooltip.showTemporary(button, {
    content: 'Copied!',
    color: 'success',
    position: 'top',
    autoHide: 2000
});

// Events
element.addEventListener('so:tooltip:show', (e) => {
    console.log('Showing via:', e.detail.trigger);
    // e.preventDefault(); // Cancel show
});

element.addEventListener('so:tooltip:shown', (e) => {
    console.log('Tooltip visible:', e.detail.tooltipEl);
});

element.addEventListener('so:tooltip:hide', (e) => {
    console.log('Hiding via:', e.detail.trigger);
});

element.addEventListener('so:tooltip:hidden', (e) => {
    console.log('Tooltip hidden');
});</code></pre>
                            </div>

                    </div>
                </div>

                <!-- Interactive Demo - All Actions -->
                <div class="so-card">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Interactive Demo - All Tooltip Actions</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-demo-desc">
                            Try all tooltip methods interactively. The target button shows the tooltip, use the control buttons to manipulate it.
                        </p>

                        <!-- Target Element -->
                        <h4 class="so-demo-section-heading-spaced">Target Element</h4>
                        <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-4">
                            <button class="so-btn so-btn-primary so-btn-lg" id="demo-tooltip-target" data-so-tooltip="Hello! I am a tooltip" data-so-shortcut="Ctrl+T">
                                <span class="material-icons">smart_button</span>
                                Hover or Control Me
                            </button>
                            <span class="so-text-muted">← This button has a tooltip attached</span>
                        </div>

                        <!-- Show/Hide/Toggle -->
                        <h4 class="so-demo-section-heading-spaced">Show / Hide / Toggle</h4>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.show()">
                                <span class="material-icons">visibility</span>
                                show()
                            </button>
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.hide()">
                                <span class="material-icons">visibility_off</span>
                                hide()
                            </button>
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.toggle()">
                                <span class="material-icons">swap_horiz</span>
                                toggle()
                            </button>
                        </div>

                        <!-- Update Content -->
                        <h4 class="so-demo-section-heading-spaced">Update Content Dynamically</h4>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setContent('Content changed!')">
                                <span class="material-icons">edit</span>
                                setContent('Content changed!')
                            </button>
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setContent('Hello! I am a tooltip')">
                                <span class="material-icons">restore</span>
                                Reset Content
                            </button>
                        </div>

                        <!-- Update Shortcut -->
                        <h4 class="so-demo-section-heading-spaced">Update Shortcut</h4>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setShortcut('Ctrl+Shift+T')">
                                <span class="material-icons">keyboard</span>
                                setShortcut('Ctrl+Shift+T')
                            </button>
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setShortcut('Alt+S')">
                                <span class="material-icons">keyboard</span>
                                setShortcut('Alt+S')
                            </button>
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setShortcut('Ctrl+T')">
                                <span class="material-icons">restore</span>
                                Reset Shortcut
                            </button>
                        </div>

                        <!-- Change Position -->
                        <h4 class="so-demo-section-heading-spaced">Change Position</h4>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setPosition('top')">
                                <span class="material-icons">arrow_upward</span>
                                setPosition('top')
                            </button>
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setPosition('bottom')">
                                <span class="material-icons">arrow_downward</span>
                                setPosition('bottom')
                            </button>
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setPosition('left')">
                                <span class="material-icons">arrow_back</span>
                                setPosition('left')
                            </button>
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setPosition('right')">
                                <span class="material-icons">arrow_forward</span>
                                setPosition('right')
                            </button>
                        </div>

                        <!-- Change Color -->
                        <h4 class="so-demo-section-heading-spaced">Change Color</h4>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-outline" onclick="demoTooltip.setColor('default')">
                                Default
                            </button>
                            <button class="so-btn so-btn-outline-primary" onclick="demoTooltip.setColor('primary')">
                                setColor('primary')
                            </button>
                            <button class="so-btn so-btn-outline-success" onclick="demoTooltip.setColor('success')">
                                setColor('success')
                            </button>
                            <button class="so-btn so-btn-outline-danger" onclick="demoTooltip.setColor('danger')">
                                setColor('danger')
                            </button>
                            <button class="so-btn so-btn-outline-warning" onclick="demoTooltip.setColor('warning')">
                                setColor('warning')
                            </button>
                            <button class="so-btn so-btn-outline-info" onclick="demoTooltip.setColor('info')">
                                setColor('info')
                            </button>
                        </div>

                        <!-- Enable/Disable -->
                        <h4 class="so-demo-section-heading-spaced">Enable / Disable</h4>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-outline-success" onclick="demoTooltip.enable()">
                                <span class="material-icons">check_circle</span>
                                enable()
                            </button>
                            <button class="so-btn so-btn-outline-danger" onclick="demoTooltip.disable()">
                                <span class="material-icons">block</span>
                                disable()
                            </button>
                        </div>

                        <!-- Temporary Tooltips -->
                        <h4 class="so-demo-section-heading-spaced">Temporary Feedback Tooltips</h4>
                        <p class="so-text-muted so-mb-3">Show temporary tooltips that auto-hide (great for feedback messages)</p>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-primary" onclick="showTempDefault(this)">
                                <span class="material-icons">info</span>
                                Default (2s)
                            </button>
                            <button class="so-btn so-btn-success" onclick="showTempSuccess(this)">
                                <span class="material-icons">check</span>
                                Success
                            </button>
                            <button class="so-btn so-btn-danger" onclick="showTempDanger(this)">
                                <span class="material-icons">error</span>
                                Error
                            </button>
                            <button class="so-btn so-btn-warning" onclick="showTempWarning(this)">
                                <span class="material-icons">warning</span>
                                Warning
                            </button>
                            <button class="so-btn so-btn-info" onclick="showTempInfo(this)">
                                <span class="material-icons">lightbulb</span>
                                Info
                            </button>
                        </div>

                        <!-- Event Log -->
                        <h4 class="so-demo-section-heading-spaced">Event Log</h4>
                        <p class="so-text-muted so-mb-3">Events fired by the target tooltip (hover over target to see events)</p>
                        <div id="tooltip-event-log" class="so-p-3 so-bg-light so-rounded" style="max-height: 150px; overflow-y: auto; font-family: monospace; font-size: 12px;">
                            <div class="so-text-muted">Waiting for events...</div>
                        </div>
                        <button class="so-btn so-btn-outline so-btn-sm so-mt-2" onclick="clearEventLog()">
                            <span class="material-icons">delete</span>
                            Clear Log
                        </button>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                                <button class="so-code-copy" onclick="copyCode(this)" data-so-tooltip="Copy code" data-so-shortcut="Ctrl+C">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-javascript">// Get tooltip instance
const tooltip = SOTooltip.getInstance(element);

// Show/Hide/Toggle
tooltip.show();
tooltip.hide();
tooltip.toggle();

// Update content dynamically
tooltip.setContent('New content');
tooltip.setShortcut('Ctrl+N');
tooltip.setPosition('bottom');  // top, bottom, left, right
tooltip.setColor('success');    // default, primary, success, danger, warning, info

// Enable/Disable
tooltip.enable();
tooltip.disable();

// Show temporary feedback tooltip
SOTooltip.showTemporary(element, {
    content: 'Saved!',
    color: 'success',
    position: 'top',
    autoHide: 2000  // milliseconds
});

// Listen to events
element.addEventListener('so:tooltip:show', (e) => {});
element.addEventListener('so:tooltip:shown', (e) => {});
element.addEventListener('so:tooltip:hide', (e) => {});
element.addEventListener('so:tooltip:hidden', (e) => {});</code></pre>
                        </div>

                        <script>
                        // Initialize demo tooltip
                        let demoTooltip;
                        let eventListenersAdded = false;

                        function initDemoTooltip() {
                            const target = document.getElementById('demo-tooltip-target');
                            if (!target) return;

                            // Add event listeners only once
                            if (!eventListenersAdded) {
                                target.addEventListener('so:tooltip:show', (e) => logEvent('so:tooltip:show', 'About to show tooltip'));
                                target.addEventListener('so:tooltip:shown', (e) => logEvent('so:tooltip:shown', 'Tooltip is now visible'));
                                target.addEventListener('so:tooltip:hide', (e) => logEvent('so:tooltip:hide', 'About to hide tooltip'));
                                target.addEventListener('so:tooltip:hidden', (e) => logEvent('so:tooltip:hidden', 'Tooltip is now hidden'));
                                eventListenersAdded = true;
                            }

                            // Initialize tooltip instance when SOTooltip is available
                            if (typeof SOTooltip !== 'undefined' && !demoTooltip) {
                                demoTooltip = SOTooltip.getInstance(target);
                            }
                        }

                        // Initialize when DOM is ready
                        if (document.readyState === 'loading') {
                            document.addEventListener('DOMContentLoaded', initDemoTooltip);
                        } else {
                            initDemoTooltip();
                        }

                        // Also try again after window load (ensures JS bundle is loaded)
                        window.addEventListener('load', initDemoTooltip);

                        function logEvent(eventName, message) {
                            const log = document.getElementById('tooltip-event-log');
                            const time = new Date().toLocaleTimeString();
                            const color = eventName.includes('show') ? '#22c55e' : '#ef4444';
                            log.innerHTML = `<div><span style="color: #666">[${time}]</span> <span style="color: ${color}">${eventName}</span> - ${message}</div>` + log.innerHTML;
                        }

                        function clearEventLog() {
                            document.getElementById('tooltip-event-log').innerHTML = '<div class="so-text-muted">Waiting for events...</div>';
                        }

                        // Temporary tooltip functions
                        function showApiTooltip(btn) {
                            SOTooltip.showTemporary(btn, { content: 'Tooltip shown via API!', position: 'top', autoHide: 2000 });
                        }
                        function showSuccessTooltip(btn) {
                            SOTooltip.showTemporary(btn, { content: 'Success! Action completed.', color: 'success', position: 'top', autoHide: 2000 });
                        }
                        function showErrorTooltip(btn) {
                            SOTooltip.showTemporary(btn, { content: 'Error! Something went wrong.', color: 'danger', position: 'top', autoHide: 2000 });
                        }
                        function showTempDefault(btn) {
                            SOTooltip.showTemporary(btn, { content: 'Default temporary tooltip', position: 'top', autoHide: 2000 });
                        }
                        function showTempSuccess(btn) {
                            SOTooltip.showTemporary(btn, { content: 'Saved successfully!', color: 'success', position: 'top', autoHide: 2000 });
                        }
                        function showTempDanger(btn) {
                            SOTooltip.showTemporary(btn, { content: 'Operation failed!', color: 'danger', position: 'top', autoHide: 2000 });
                        }
                        function showTempWarning(btn) {
                            SOTooltip.showTemporary(btn, { content: 'Please review before continuing', color: 'warning', position: 'top', autoHide: 2000 });
                        }
                        function showTempInfo(btn) {
                            SOTooltip.showTemporary(btn, { content: 'Tip: You can also use keyboard shortcuts', color: 'info', position: 'top', autoHide: 2500 });
                        }
                        </script>
                    </div>
                </div>
            </div>

