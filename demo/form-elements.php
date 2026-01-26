<?php
/**
 * SixOrbit UI Demo - Form Elements
 */
$pageTitle = 'Form Elements';
$pageDescription = 'SixOrbit UI Form Components Showcase';

require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
require_once 'includes/navbar.php';
?>

<!-- Main Content -->
<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Form Elements</h1>
            <p class="so-page-subtitle">A showcase of all form components available in SixOrbit UI</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">
        <!-- Buttons Section -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Buttons</h3>
            </div>
            <div class="so-card-body">
                <!-- Button Variants -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Button Variants</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-flex-wrap">
                            <button class="so-btn so-btn-primary">Primary</button>
                            <button class="so-btn so-btn-secondary">Secondary</button>
                            <button class="so-btn so-btn-success">Success</button>
                            <button class="so-btn so-btn-danger">Danger</button>
                            <button class="so-btn so-btn-warning">Warning</button>
                            <button class="so-btn so-btn-info">Info</button>
                            <button class="so-btn so-btn-light">Light</button>
                            <button class="so-btn so-btn-dark">Dark</button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-primary"&gt;Primary&lt;/button&gt;
&lt;button class="so-btn so-btn-secondary"&gt;Secondary&lt;/button&gt;
&lt;button class="so-btn so-btn-success"&gt;Success&lt;/button&gt;
&lt;button class="so-btn so-btn-danger"&gt;Danger&lt;/button&gt;
&lt;button class="so-btn so-btn-warning"&gt;Warning&lt;/button&gt;
&lt;button class="so-btn so-btn-info"&gt;Info&lt;/button&gt;
&lt;button class="so-btn so-btn-light"&gt;Light&lt;/button&gt;
&lt;button class="so-btn so-btn-dark"&gt;Dark&lt;/button&gt;</code></pre>
                    </div>
                </div>

                <!-- Outline Buttons -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Outline Buttons</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-flex-wrap">
                            <button class="so-btn so-btn-outline">Outline</button>
                            <button class="so-btn so-btn-outline-primary">Primary</button>
                            <button class="so-btn so-btn-outline-success">Success</button>
                            <button class="so-btn so-btn-outline-danger">Danger</button>
                            <button class="so-btn so-btn-outline-warning">Warning</button>
                            <button class="so-btn so-btn-outline-info">Info</button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-outline"&gt;Outline&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-primary"&gt;Primary&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-success"&gt;Success&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-danger"&gt;Danger&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-warning"&gt;Warning&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-info"&gt;Info&lt;/button&gt;</code></pre>
                    </div>
                </div>

                <!-- Light Buttons -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Light Buttons (Soft Background)</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-flex-wrap">
                            <button class="so-btn so-btn-light-primary">Primary</button>
                            <button class="so-btn so-btn-light-success">Success</button>
                            <button class="so-btn so-btn-light-danger">Danger</button>
                            <button class="so-btn so-btn-light-warning">Warning</button>
                            <button class="so-btn so-btn-light-info">Info</button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-light-primary"&gt;Primary&lt;/button&gt;
&lt;button class="so-btn so-btn-light-success"&gt;Success&lt;/button&gt;
&lt;button class="so-btn so-btn-light-danger"&gt;Danger&lt;/button&gt;
&lt;button class="so-btn so-btn-light-warning"&gt;Warning&lt;/button&gt;
&lt;button class="so-btn so-btn-light-info"&gt;Info&lt;/button&gt;</code></pre>
                    </div>
                </div>

                <!-- Ghost Buttons -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Ghost Buttons</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-flex-wrap">
                            <button class="so-btn so-btn-ghost">Ghost</button>
                            <button class="so-btn so-btn-ghost so-btn-primary">Primary</button>
                            <button class="so-btn so-btn-ghost so-btn-success">Success</button>
                            <button class="so-btn so-btn-ghost so-btn-danger">Danger</button>
                            <button class="so-btn so-btn-ghost so-btn-info">Info</button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-ghost"&gt;Ghost&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-primary"&gt;Primary&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-success"&gt;Success&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-danger"&gt;Danger&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-info"&gt;Info&lt;/button&gt;</code></pre>
                    </div>
                </div>

                <!-- Link Buttons -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Link Buttons</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-flex-wrap">
                            <button class="so-btn so-btn-link">Link Button</button>
                            <a href="#" class="so-btn so-btn-link">Link as Anchor</a>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-link"&gt;Link Button&lt;/button&gt;
&lt;a href="#" class="so-btn so-btn-link"&gt;Link as Anchor&lt;/a&gt;</code></pre>
                    </div>
                </div>

                <!-- Button Sizes -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Button Sizes</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-items-center so-flex-wrap">
                            <button class="so-btn so-btn-primary so-btn-xs">Extra Small</button>
                            <button class="so-btn so-btn-primary so-btn-sm">Small</button>
                            <button class="so-btn so-btn-primary">Default</button>
                            <button class="so-btn so-btn-primary so-btn-lg">Large</button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-primary so-btn-xs"&gt;Extra Small&lt;/button&gt;
&lt;button class="so-btn so-btn-primary so-btn-sm"&gt;Small&lt;/button&gt;
&lt;button class="so-btn so-btn-primary"&gt;Default&lt;/button&gt;
&lt;button class="so-btn so-btn-primary so-btn-lg"&gt;Large&lt;/button&gt;</code></pre>
                    </div>
                </div>

                <!-- Buttons with Icons -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Buttons with Icons</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-flex-wrap">
                            <button class="so-btn so-btn-primary">
                                <span class="material-icons">add</span>
                                Add New
                            </button>
                            <button class="so-btn so-btn-success">
                                <span class="material-icons">save</span>
                                Save
                            </button>
                            <button class="so-btn so-btn-danger">
                                <span class="material-icons">delete</span>
                                Delete
                            </button>
                            <button class="so-btn so-btn-outline">
                                <span class="material-icons">download</span>
                                Export
                            </button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-primary"&gt;
    &lt;span class="material-icons"&gt;add&lt;/span&gt;
    Add New
&lt;/button&gt;</code></pre>
                    </div>
                </div>

                <!-- Icon-Only Buttons -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Icon-Only Buttons</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-flex-wrap so-items-center">
                            <button class="so-btn so-btn-icon so-btn-primary">
                                <span class="material-icons">add</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-success">
                                <span class="material-icons">check</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-danger">
                                <span class="material-icons">delete</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-outline">
                                <span class="material-icons">edit</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-ghost">
                                <span class="material-icons">more_vert</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-ghost so-btn-xs">
                                <span class="material-icons">close</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-ghost so-btn-sm">
                                <span class="material-icons">settings</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-ghost so-btn-lg">
                                <span class="material-icons">menu</span>
                            </button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-icon so-btn-primary"&gt;
    &lt;span class="material-icons"&gt;add&lt;/span&gt;
&lt;/button&gt;

&lt;button class="so-btn so-btn-icon so-btn-ghost"&gt;
    &lt;span class="material-icons"&gt;more_vert&lt;/span&gt;
&lt;/button&gt;

&lt;!-- Icon button sizes --&gt;
&lt;button class="so-btn so-btn-icon so-btn-ghost so-btn-xs"&gt;...&lt;/button&gt;
&lt;button class="so-btn so-btn-icon so-btn-ghost so-btn-sm"&gt;...&lt;/button&gt;
&lt;button class="so-btn so-btn-icon so-btn-ghost so-btn-lg"&gt;...&lt;/button&gt;</code></pre>
                    </div>
                </div>

                <!-- Circular Buttons -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Circular Buttons</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-flex-wrap so-items-center">
                            <button class="so-btn so-btn-icon so-btn-circle so-btn-primary">
                                <span class="material-icons">add</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-circle so-btn-success">
                                <span class="material-icons">check</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-circle so-btn-danger">
                                <span class="material-icons">close</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-circle so-btn-outline">
                                <span class="material-icons">edit</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-circle so-btn-ghost">
                                <span class="material-icons">favorite</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-circle so-btn-light-primary so-btn-lg">
                                <span class="material-icons">share</span>
                            </button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-icon so-btn-circle so-btn-primary"&gt;
    &lt;span class="material-icons"&gt;add&lt;/span&gt;
&lt;/button&gt;

&lt;button class="so-btn so-btn-icon so-btn-circle so-btn-outline"&gt;
    &lt;span class="material-icons"&gt;edit&lt;/span&gt;
&lt;/button&gt;</code></pre>
                    </div>
                </div>

                <!-- Button States -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Button States</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-2 so-flex-wrap so-items-center">
                            <button class="so-btn so-btn-primary">Normal</button>
                            <button class="so-btn so-btn-primary" disabled>Disabled</button>
                            <button class="so-btn so-btn-primary loading">Loading</button>
                            <button class="so-btn so-btn-outline" disabled>Disabled</button>
                            <button class="so-btn so-btn-outline loading">Loading</button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;!-- Disabled state --&gt;
&lt;button class="so-btn so-btn-primary" disabled&gt;Disabled&lt;/button&gt;

&lt;!-- Loading state --&gt;
&lt;button class="so-btn so-btn-primary loading"&gt;Loading&lt;/button&gt;</code></pre>
                    </div>
                </div>

                <!-- Button Groups - Horizontal -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Button Groups - Horizontal</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-4 so-flex-wrap so-items-center">
                            <div class="so-btn-group">
                                <button class="so-btn">Left</button>
                                <button class="so-btn active">Center</button>
                                <button class="so-btn">Right</button>
                            </div>
                            <div class="so-btn-group">
                                <button class="so-btn so-btn-primary">
                                    <span class="material-icons">format_align_left</span>
                                </button>
                                <button class="so-btn so-btn-primary">
                                    <span class="material-icons">format_align_center</span>
                                </button>
                                <button class="so-btn so-btn-primary">
                                    <span class="material-icons">format_align_right</span>
                                </button>
                            </div>
                            <div class="so-btn-group">
                                <button class="so-btn so-btn-outline-primary">Day</button>
                                <button class="so-btn so-btn-outline-primary active">Week</button>
                                <button class="so-btn so-btn-outline-primary">Month</button>
                            </div>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;div class="so-btn-group"&gt;
    &lt;button class="so-btn"&gt;Left&lt;/button&gt;
    &lt;button class="so-btn active"&gt;Center&lt;/button&gt;
    &lt;button class="so-btn"&gt;Right&lt;/button&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                <!-- Button Groups - Vertical -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Button Groups - Vertical</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-4 so-flex-wrap">
                            <div class="so-btn-group-vertical">
                                <button class="so-btn">Top</button>
                                <button class="so-btn active">Middle</button>
                                <button class="so-btn">Bottom</button>
                            </div>
                            <div class="so-btn-group-vertical">
                                <button class="so-btn so-btn-outline">
                                    <span class="material-icons">home</span>
                                    Home
                                </button>
                                <button class="so-btn so-btn-outline">
                                    <span class="material-icons">settings</span>
                                    Settings
                                </button>
                                <button class="so-btn so-btn-outline">
                                    <span class="material-icons">person</span>
                                    Profile
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;div class="so-btn-group-vertical"&gt;
    &lt;button class="so-btn"&gt;Top&lt;/button&gt;
    &lt;button class="so-btn active"&gt;Middle&lt;/button&gt;
    &lt;button class="so-btn"&gt;Bottom&lt;/button&gt;
&lt;/div&gt;</code></pre>
                    </div>
                </div>

                <!-- Progress Buttons -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Progress Buttons</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div class="so-flex so-gap-3 so-flex-wrap so-items-center" style="margin-bottom: 16px;">
                            <button class="so-btn so-btn-primary so-btn-progress" onclick="simulateProgress(this)">
                                <span class="btn-progress-bar"></span>
                                <span class="btn-text">Upload File</span>
                                <span class="btn-done"><span class="material-icons">check</span> Done</span>
                            </button>
                            <button class="so-btn so-btn-success so-btn-progress" onclick="simulateProgress(this)">
                                <span class="btn-progress-bar"></span>
                                <span class="btn-text">Save Changes</span>
                                <span class="btn-done"><span class="material-icons">check_circle</span></span>
                            </button>
                            <button class="so-btn so-btn-info so-btn-progress" onclick="simulateProgress(this)">
                                <span class="btn-progress-bar"></span>
                                <span class="btn-text">Sync Data</span>
                                <span class="btn-done">Synced!</span>
                            </button>
                        </div>
                        <div class="so-flex so-gap-3 so-flex-wrap so-items-center" style="margin-bottom: 16px;">
                            <button class="so-btn so-btn-outline-primary so-btn-progress" onclick="simulateProgress(this)">
                                <span class="btn-progress-bar"></span>
                                <span class="btn-text">Download</span>
                                <span class="btn-done"><span class="material-icons">download_done</span> Complete</span>
                            </button>
                            <button class="so-btn so-btn-light-primary so-btn-progress" onclick="simulateProgress(this)">
                                <span class="btn-progress-bar"></span>
                                <span class="btn-text">Process</span>
                                <span class="btn-done"><span class="material-icons">done_all</span></span>
                            </button>
                        </div>
                        <p style="font-size: 12px; color: var(--so-text-secondary); margin: 0;">Click buttons to see progress animation</p>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;!-- Progress button with icon + text on done --&gt;
&lt;button class="so-btn so-btn-primary so-btn-progress"&gt;
    &lt;span class="btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="btn-text"&gt;Upload File&lt;/span&gt;
    &lt;span class="btn-done"&gt;
        &lt;span class="material-icons"&gt;check&lt;/span&gt; Done
    &lt;/span&gt;
&lt;/button&gt;

&lt;!-- Progress button with icon only on done --&gt;
&lt;button class="so-btn so-btn-success so-btn-progress"&gt;
    &lt;span class="btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="btn-text"&gt;Save Changes&lt;/span&gt;
    &lt;span class="btn-done"&gt;
        &lt;span class="material-icons"&gt;check_circle&lt;/span&gt;
    &lt;/span&gt;
&lt;/button&gt;

&lt;!-- Progress button with text only on done --&gt;
&lt;button class="so-btn so-btn-info so-btn-progress"&gt;
    &lt;span class="btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="btn-text"&gt;Sync Data&lt;/span&gt;
    &lt;span class="btn-done"&gt;Synced!&lt;/span&gt;
&lt;/button&gt;

&lt;!-- JavaScript to control progress --&gt;
&lt;script&gt;
// Set progress (0-100)
btn.style.setProperty('--progress', '50%');

// Mark as completed
btn.classList.add('completed');

// Reset
btn.classList.remove('completed');
btn.style.setProperty('--progress', '0%');
&lt;/script&gt;</code></pre>
                    </div>
                </div>

                <!-- Block Buttons -->
                <h4 style="margin-bottom: 16px; font-size: 14px; font-weight: 600;">Block Buttons (Full Width)</h4>
                <div class="so-example-block">
                    <div class="so-example-preview">
                        <div style="max-width: 400px;">
                            <button class="so-btn so-btn-primary so-btn-block" style="margin-bottom: 8px;">
                                <span class="material-icons">login</span>
                                Sign In
                            </button>
                            <button class="so-btn so-btn-outline so-btn-block" style="margin-bottom: 8px;">
                                <span class="material-icons">person_add</span>
                                Create Account
                            </button>
                            <button class="so-btn so-btn-light-primary so-btn-block">
                                <span class="material-icons">g_mobiledata</span>
                                Continue with Google
                            </button>
                        </div>
                    </div>
                    <div class="so-code-block">
                        <div class="so-code-header">
                            <span class="so-code-label"><span class="material-icons" style="font-size: 14px; margin-right: 4px;">code</span> HTML</span>
                            <button class="so-code-copy" onclick="copyCode(this)">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                        <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-primary so-btn-block"&gt;
    &lt;span class="material-icons"&gt;login&lt;/span&gt;
    Sign In
&lt;/button&gt;

&lt;button class="so-btn so-btn-outline so-btn-block"&gt;
    &lt;span class="material-icons"&gt;person_add&lt;/span&gt;
    Create Account
&lt;/button&gt;</code></pre>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Inputs Section -->
        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1" style="margin-top: 20px;">
            <div class="so-card">
                <div class="so-card-header">
                    <h3 class="so-card-title">Text Inputs</h3>
                </div>
                <div class="so-card-body">
                    <div class="so-form-group">
                        <label class="so-form-label">Default Input</label>
                        <input type="text" class="so-form-input" placeholder="Enter text...">
                    </div>

                    <div class="so-form-group">
                        <label class="so-form-label">Input with Icon</label>
                        <div class="so-form-input-wrapper">
                            <span class="material-icons so-form-input-icon">search</span>
                            <input type="text" class="so-form-input" placeholder="Search...">
                        </div>
                    </div>

                    <div class="so-form-group">
                        <label class="so-form-label">Disabled Input</label>
                        <input type="text" class="so-form-input" placeholder="Disabled" disabled>
                    </div>

                    <div class="so-form-group has-error">
                        <label class="so-form-label">Error State</label>
                        <input type="text" class="so-form-input" value="Invalid value">
                        <span class="so-form-error">This field has an error</span>
                    </div>

                    <div class="so-form-group">
                        <label class="so-form-label">Textarea</label>
                        <textarea class="so-form-textarea" rows="3" placeholder="Enter description..."></textarea>
                    </div>
                </div>
            </div>

            <div class="so-card">
                <div class="so-card-header">
                    <h3 class="so-card-title">Select & Dropdowns</h3>
                </div>
                <div class="so-card-body">
                    <div class="so-form-group">
                        <label class="so-form-label">Standard Dropdown</label>
                        <div class="so-dropdown">
                            <button type="button" class="so-dropdown-trigger">
                                <span class="so-dropdown-selected">Select option</span>
                                <span class="material-icons so-dropdown-arrow">expand_more</span>
                            </button>
                            <div class="so-dropdown-menu">
                                <div class="so-dropdown-item" data-value="1">Option 1</div>
                                <div class="so-dropdown-item" data-value="2">Option 2</div>
                                <div class="so-dropdown-item" data-value="3">Option 3</div>
                            </div>
                        </div>
                    </div>

                    <div class="so-form-group">
                        <label class="so-form-label">Searchable Dropdown</label>
                        <div class="so-searchable-dropdown">
                            <button type="button" class="so-searchable-trigger">
                                <span class="so-searchable-selected">Select customer</span>
                                <span class="material-icons so-dropdown-arrow">expand_more</span>
                            </button>
                            <div class="so-searchable-menu">
                                <div class="so-searchable-search">
                                    <span class="material-icons">search</span>
                                    <input type="text" class="so-searchable-input" placeholder="Search...">
                                </div>
                                <div class="so-searchable-items">
                                    <div class="so-searchable-item" data-value="1">Ajay Kumar</div>
                                    <div class="so-searchable-item" data-value="2">Priya Sharma</div>
                                    <div class="so-searchable-item" data-value="3">Rahul Singh</div>
                                    <div class="so-searchable-item" data-value="4">Meera Patel</div>
                                    <div class="so-searchable-item" data-value="5">Vikash Gupta</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="so-form-group">
                        <label class="so-form-label">Native Select</label>
                        <select class="so-form-select">
                            <option value="">Choose...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkboxes, Radios, Toggles -->
        <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1" style="margin-top: 20px;">
            <div class="so-card">
                <div class="so-card-header">
                    <h3 class="so-card-title">Checkboxes</h3>
                </div>
                <div class="so-card-body">
                    <div class="so-form-group">
                        <label class="so-checkbox">
                            <input type="checkbox">
                            <span class="so-checkbox-box">
                                <span class="material-icons">check</span>
                            </span>
                            <span class="so-checkbox-label">Default checkbox</span>
                        </label>
                    </div>
                    <div class="so-form-group">
                        <label class="so-checkbox">
                            <input type="checkbox" checked>
                            <span class="so-checkbox-box">
                                <span class="material-icons">check</span>
                            </span>
                            <span class="so-checkbox-label">Checked checkbox</span>
                        </label>
                    </div>
                    <div class="so-form-group">
                        <label class="so-checkbox">
                            <input type="checkbox" disabled>
                            <span class="so-checkbox-box">
                                <span class="material-icons">check</span>
                            </span>
                            <span class="so-checkbox-label">Disabled checkbox</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="so-card">
                <div class="so-card-header">
                    <h3 class="so-card-title">Radio Buttons</h3>
                </div>
                <div class="so-card-body">
                    <div class="so-form-group">
                        <label class="so-radio">
                            <input type="radio" name="demo-radio" value="1">
                            <span class="so-radio-circle"></span>
                            <span class="so-radio-label">Option 1</span>
                        </label>
                    </div>
                    <div class="so-form-group">
                        <label class="so-radio">
                            <input type="radio" name="demo-radio" value="2" checked>
                            <span class="so-radio-circle"></span>
                            <span class="so-radio-label">Option 2 (Selected)</span>
                        </label>
                    </div>
                    <div class="so-form-group">
                        <label class="so-radio">
                            <input type="radio" name="demo-radio" value="3">
                            <span class="so-radio-circle"></span>
                            <span class="so-radio-label">Option 3</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="so-card">
                <div class="so-card-header">
                    <h3 class="so-card-title">Toggle Switches</h3>
                </div>
                <div class="so-card-body">
                    <div class="so-form-group">
                        <label class="so-toggle">
                            <input type="checkbox">
                            <span class="so-toggle-track">
                                <span class="so-toggle-thumb"></span>
                            </span>
                            <span class="so-toggle-label">Default toggle</span>
                        </label>
                    </div>
                    <div class="so-form-group">
                        <label class="so-toggle so-toggle-success">
                            <input type="checkbox" checked>
                            <span class="so-toggle-track">
                                <span class="so-toggle-thumb"></span>
                            </span>
                            <span class="so-toggle-label">Success toggle (On)</span>
                        </label>
                    </div>
                    <div class="so-form-group">
                        <label class="so-toggle so-toggle-sm">
                            <input type="checkbox">
                            <span class="so-toggle-track">
                                <span class="so-toggle-thumb"></span>
                            </span>
                            <span class="so-toggle-label">Small toggle</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Badges Section -->
        <div class="so-card" style="margin-top: 20px;">
            <div class="so-card-header">
                <h3 class="so-card-title">Badges</h3>
            </div>
            <div class="so-card-body">
                <h4 style="margin-bottom: 12px; font-size: 14px; color: var(--so-text-secondary);">Solid Badges</h4>
                <div class="so-flex so-gap-2 so-flex-wrap" style="margin-bottom: 20px;">
                    <span class="so-badge so-badge-primary">Primary</span>
                    <span class="so-badge so-badge-secondary">Secondary</span>
                    <span class="so-badge so-badge-success">Success</span>
                    <span class="so-badge so-badge-danger">Danger</span>
                    <span class="so-badge so-badge-warning">Warning</span>
                    <span class="so-badge so-badge-info">Info</span>
                </div>

                <h4 style="margin-bottom: 12px; font-size: 14px; color: var(--so-text-secondary);">Soft Badges</h4>
                <div class="so-flex so-gap-2 so-flex-wrap" style="margin-bottom: 20px;">
                    <span class="so-badge so-badge-soft-primary">Primary</span>
                    <span class="so-badge so-badge-soft-success">Success</span>
                    <span class="so-badge so-badge-soft-danger">Danger</span>
                    <span class="so-badge so-badge-soft-warning">Warning</span>
                    <span class="so-badge so-badge-soft-info">Info</span>
                </div>

                <h4 style="margin-bottom: 12px; font-size: 14px; color: var(--so-text-secondary);">Badge Sizes</h4>
                <div class="so-flex so-gap-2 so-items-center so-flex-wrap">
                    <span class="so-badge so-badge-primary so-badge-sm">Small</span>
                    <span class="so-badge so-badge-primary">Default</span>
                    <span class="so-badge so-badge-primary so-badge-lg">Large</span>
                </div>
            </div>
        </div>

        <!-- Cards Section -->
        <div class="so-card" style="margin-top: 20px;">
            <div class="so-card-header">
                <h3 class="so-card-title">Cards</h3>
            </div>
            <div class="so-card-body">
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1">
                    <div class="so-card">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Card Title</h3>
                            <button class="so-btn so-btn-icon so-btn-ghost">
                                <span class="material-icons">more_vert</span>
                            </button>
                        </div>
                        <div class="so-card-body">
                            <p>This is a basic card with header and body sections.</p>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-body">
                            <h4 style="margin-bottom: 8px;">Simple Card</h4>
                            <p style="color: var(--so-text-secondary);">A card without the header section.</p>
                        </div>
                        <div class="so-card-footer">
                            <button class="so-btn so-btn-outline so-btn-sm">Cancel</button>
                            <button class="so-btn so-btn-primary so-btn-sm">Save</button>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-header">
                            <h3 class="so-card-title">With Badge</h3>
                            <span class="so-badge so-badge-soft-primary">New</span>
                        </div>
                        <div class="so-card-body">
                            <p>Card header with a badge indicator.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
$inlineJs = <<<'JS'
function simulateProgress(btn) {
    // Reset if already completed
    if (btn.classList.contains('completed')) {
        btn.classList.remove('completed');
        btn.style.setProperty('--progress', '0%');
        return;
    }

    let progress = 0;
    btn.disabled = true;

    const interval = setInterval(() => {
        progress += Math.random() * 15 + 5;
        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
            btn.style.setProperty('--progress', '100%');

            // Add completed class after a brief moment
            setTimeout(() => {
                btn.classList.add('completed');
                btn.disabled = false;
            }, 200);
        } else {
            btn.style.setProperty('--progress', progress + '%');
        }
    }, 150);
}
JS;

require_once 'includes/footer.php';
?>
