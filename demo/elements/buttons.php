<?php
/**
 * SixOrbit UI Demo - Buttons
 */
$pageTitle = 'Buttons';
$pageDescription = 'Button components, variants, sizes, and states';

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
            <h1 class="so-page-title">Buttons</h1>
            <p class="so-page-subtitle">Button components, variants, sizes, and states</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">

                <!-- Section 1: Button Variants -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Button Variants</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-flex so-gap-2 so-flex-wrap">
                                    <button class="so-btn so-btn-primary">Primary</button>
                                    <button class="so-btn so-btn-secondary">Secondary</button>
                                    <button class="so-btn so-btn-success">Success</button>
                                    <button class="so-btn so-btn-danger">Danger</button>
                                    <button class="so-btn so-btn-warning">Warning</button>
                                    <button class="so-btn so-btn-info">Info</button>
                                    <button class="so-btn so-btn-light">Light</button>
                                    <button class="so-btn so-btn-dark">Dark</button>
                                </div>                            <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
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
                </div>

                <!-- Section 2: Outline Buttons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Outline Buttons</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-flex so-gap-2 so-flex-wrap">
                                    <button class="so-btn so-btn-outline-primary">Primary</button>
                                    <button class="so-btn so-btn-outline-secondary">Secondary</button>
                                    <button class="so-btn so-btn-outline-success">Success</button>
                                    <button class="so-btn so-btn-outline-danger">Danger</button>
                                    <button class="so-btn so-btn-outline-warning">Warning</button>
                                    <button class="so-btn so-btn-outline-info">Info</button>
                                    <button class="so-btn so-btn-outline-light">Light</button>
                                    <button class="so-btn so-btn-outline-dark">Dark</button>
                                </div>                            <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-outline-primary"&gt;Primary&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-secondary"&gt;Secondary&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-success"&gt;Success&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-danger"&gt;Danger&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-warning"&gt;Warning&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-info"&gt;Info&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-light"&gt;Light&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-dark"&gt;Dark&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Section 3: Light Buttons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Light Buttons (Soft Background)</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-flex so-gap-2 so-flex-wrap">
                                    <button class="so-btn so-btn-light-primary">Primary</button>
                                    <button class="so-btn so-btn-light-secondary">Secondary</button>
                                    <button class="so-btn so-btn-light-success">Success</button>
                                    <button class="so-btn so-btn-light-danger">Danger</button>
                                    <button class="so-btn so-btn-light-warning">Warning</button>
                                    <button class="so-btn so-btn-light-info">Info</button>
                                    <button class="so-btn so-btn-light-light">Light</button>
                                    <button class="so-btn so-btn-light-dark">Dark</button>
                                </div>                            <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-light-primary"&gt;Primary&lt;/button&gt;
&lt;button class="so-btn so-btn-light-secondary"&gt;Secondary&lt;/button&gt;
&lt;button class="so-btn so-btn-light-success"&gt;Success&lt;/button&gt;
&lt;button class="so-btn so-btn-light-danger"&gt;Danger&lt;/button&gt;
&lt;button class="so-btn so-btn-light-warning"&gt;Warning&lt;/button&gt;
&lt;button class="so-btn so-btn-light-info"&gt;Info&lt;/button&gt;
&lt;button class="so-btn so-btn-light-light"&gt;Light&lt;/button&gt;
&lt;button class="so-btn so-btn-light-dark"&gt;Dark&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Section 4: Ghost Buttons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Ghost Buttons</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-flex so-gap-2 so-flex-wrap">
                                    <button class="so-btn so-btn-ghost so-btn-primary">Primary</button>
                                    <button class="so-btn so-btn-ghost so-btn-secondary">Secondary</button>
                                    <button class="so-btn so-btn-ghost so-btn-success">Success</button>
                                    <button class="so-btn so-btn-ghost so-btn-danger">Danger</button>
                                    <button class="so-btn so-btn-ghost so-btn-warning">Warning</button>
                                    <button class="so-btn so-btn-ghost so-btn-info">Info</button>
                                    <button class="so-btn so-btn-ghost so-btn-light">Light</button>
                                    <button class="so-btn so-btn-ghost so-btn-dark">Dark</button>
                                </div>                            <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-ghost so-btn-primary"&gt;Primary&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-secondary"&gt;Secondary&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-success"&gt;Success&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-danger"&gt;Danger&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-warning"&gt;Warning&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-info"&gt;Info&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-light"&gt;Light&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-dark"&gt;Dark&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Section 4b: Link Buttons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Link Buttons</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-3">Link buttons look like text links but behave like buttons. Use text color helper classes for contextual colors.</p>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-link">Default Link</button>
                            <button class="so-btn so-btn-link so-text-primary">Primary</button>
                            <button class="so-btn so-btn-link so-text-secondary">Secondary</button>
                            <button class="so-btn so-btn-link so-text-success">Success</button>
                            <button class="so-btn so-btn-link so-text-danger">Danger</button>
                            <button class="so-btn so-btn-link so-text-warning">Warning</button>
                            <button class="so-btn so-btn-link so-text-info">Info</button>
                            <button class="so-btn so-btn-link so-text-dark">Dark</button>
                        </div>

                        <h5 class="so-mb-3">Link Buttons with Icons</h5>
                        <div class="so-flex so-gap-4 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-link so-text-primary">
                                <span class="material-icons">edit</span>
                                Edit
                            </button>
                            <button class="so-btn so-btn-link so-text-danger">
                                <span class="material-icons">delete</span>
                                Delete
                            </button>
                            <button class="so-btn so-btn-link so-text-success">
                                <span class="material-icons">add</span>
                                Add New
                            </button>
                            <button class="so-btn so-btn-link so-text-info">
                                <span class="material-icons">visibility</span>
                                View
                            </button>
                        </div>

                        <h5 class="so-mb-3">Link Button Sizes</h5>
                        <div class="so-flex so-gap-4 so-items-center so-flex-wrap">
                            <button class="so-btn so-btn-link so-btn-xs so-text-primary">Extra Small</button>
                            <button class="so-btn so-btn-link so-btn-sm so-text-primary">Small</button>
                            <button class="so-btn so-btn-link so-text-primary">Default</button>
                            <button class="so-btn so-btn-link so-btn-lg so-text-primary">Large</button>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Default Link Button --&gt;
&lt;button class="so-btn so-btn-link"&gt;Default Link&lt;/button&gt;

&lt;!-- Contextual Colors (use text helper classes) --&gt;
&lt;button class="so-btn so-btn-link so-text-primary"&gt;Primary&lt;/button&gt;
&lt;button class="so-btn so-btn-link so-text-secondary"&gt;Secondary&lt;/button&gt;
&lt;button class="so-btn so-btn-link so-text-success"&gt;Success&lt;/button&gt;
&lt;button class="so-btn so-btn-link so-text-danger"&gt;Danger&lt;/button&gt;
&lt;button class="so-btn so-btn-link so-text-warning"&gt;Warning&lt;/button&gt;
&lt;button class="so-btn so-btn-link so-text-info"&gt;Info&lt;/button&gt;
&lt;button class="so-btn so-btn-link so-text-light"&gt;Light&lt;/button&gt;
&lt;button class="so-btn so-btn-link so-text-dark"&gt;Dark&lt;/button&gt;

&lt;!-- With Icon --&gt;
&lt;button class="so-btn so-btn-link so-text-danger"&gt;
    &lt;span class="material-icons"&gt;delete&lt;/span&gt;
    Delete
&lt;/button&gt;

&lt;!-- Sizes --&gt;
&lt;button class="so-btn so-btn-link so-btn-xs"&gt;Extra Small&lt;/button&gt;
&lt;button class="so-btn so-btn-link so-btn-sm"&gt;Small&lt;/button&gt;
&lt;button class="so-btn so-btn-link"&gt;Default&lt;/button&gt;
&lt;button class="so-btn so-btn-link so-btn-lg"&gt;Large&lt;/button&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 5: Button Sizes -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Button Sizes</h3>
                    </div>
                    <div class="so-card-body">
                                                        <div class="so-flex so-gap-2 so-items-center so-flex-wrap">
                                    <button class="so-btn so-btn-primary so-btn-xs">Extra Small</button>
                                    <button class="so-btn so-btn-primary so-btn-sm">Small</button>
                                    <button class="so-btn so-btn-primary">Default</button>
                                    <button class="so-btn so-btn-primary so-btn-lg">Large</button>
                                </div>                            <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
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
                </div>

                <!-- Section 6: Buttons with Icons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Buttons with Icons</h3>
                    </div>
                    <div class="so-card-body">
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
                                </div>                            <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
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
                </div>

                <!-- Section 7: Icon-Only Buttons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Icon-Only Buttons</h3>
                    </div>
                    <div class="so-card-body">
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
                                </div>                            <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;button class="so-btn so-btn-icon so-btn-primary"&gt;
    &lt;span class="material-icons"&gt;add&lt;/span&gt;
&lt;/button&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Section 9: Hover Style Modifiers -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Hover Style Modifiers</h3>
                    </div>
                    <div class="so-card-body">
                                                        <p class="so-demo-hint">Combine any button variant with a hover modifier to customize hover behavior</p>

                                <!-- Soft Hover -->
                                <h5 class="so-demo-section-title-sm">.btn-hover-soft (Light tinted background)</h5>
                                <div class="so-flex so-gap-2 so-flex-wrap so-mb-3">
                                    <button class="so-btn so-btn-outline-primary btn-hover-soft">Outline + Soft</button>
                                    <button class="so-btn so-btn-outline-success btn-hover-soft">Outline + Soft</button>
                                    <button class="so-btn so-btn-outline-danger btn-hover-soft">Outline + Soft</button>
                                    <button class="so-btn so-btn-light-primary btn-hover-soft">Light + Soft</button>
                                    <button class="so-btn so-btn-ghost so-btn-primary btn-hover-soft">Ghost + Soft</button>
                                </div>

                                <!-- Solid Hover -->
                                <h5 class="so-demo-section-title-sm">.btn-hover-solid (Fill with solid color)</h5>
                                <div class="so-flex so-gap-2 so-flex-wrap so-mb-3">
                                    <button class="so-btn so-btn-ghost so-btn-primary btn-hover-solid">Ghost + Solid</button>
                                    <button class="so-btn so-btn-ghost so-btn-success btn-hover-solid">Ghost + Solid</button>
                                    <button class="so-btn so-btn-ghost so-btn-danger btn-hover-solid">Ghost + Solid</button>
                                    <button class="so-btn so-btn-light-info btn-hover-solid">Light + Solid</button>
                                </div>

                                <!-- Darken Hover -->
                                <h5 class="so-demo-section-title-sm">.btn-hover-darken (Subtle darkening)</h5>
                                <div class="so-flex so-gap-2 so-flex-wrap so-mb-3">
                                    <button class="so-btn so-btn-light-primary btn-hover-darken">Light + Darken</button>
                                    <button class="so-btn so-btn-light-success btn-hover-darken">Light + Darken</button>
                                    <button class="so-btn so-btn-light-danger btn-hover-darken">Light + Darken</button>
                                    <button class="so-btn so-btn-outline-primary btn-hover-darken">Outline + Darken</button>
                                    <button class="so-btn so-btn-ghost btn-hover-darken">Ghost + Darken</button>
                                </div>

                                <!-- Effect Hovers -->
                                <h5 class="so-demo-section-title-sm">Effect Modifiers (.btn-hover-lift, .btn-hover-scale, .btn-hover-none)</h5>
                                <div class="so-flex so-gap-2 so-flex-wrap so-mb-3">
                                    <button class="so-btn so-btn-primary btn-hover-lift">Lift Effect</button>
                                    <button class="so-btn so-btn-success btn-hover-scale">Scale Effect</button>
                                    <button class="so-btn so-btn-outline-danger btn-hover-lift">Outline + Lift</button>
                                    <button class="so-btn so-btn-light-info btn-hover-none">No Hover</button>
                                </div>                            <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;!-- Soft Hover: Light tinted background on hover --&gt;
&lt;button class="so-btn so-btn-outline-primary btn-hover-soft"&gt;Outline + Soft&lt;/button&gt;
&lt;button class="so-btn so-btn-light-primary btn-hover-soft"&gt;Light + Soft&lt;/button&gt;
&lt;button class="so-btn so-btn-ghost so-btn-primary btn-hover-soft"&gt;Ghost + Soft&lt;/button&gt;

&lt;!-- Solid Hover: Fill with solid color on hover --&gt;
&lt;button class="so-btn so-btn-ghost so-btn-primary btn-hover-solid"&gt;Ghost + Solid&lt;/button&gt;
&lt;button class="so-btn so-btn-light-info btn-hover-solid"&gt;Light + Solid&lt;/button&gt;

&lt;!-- Darken Hover: Subtle darkening on hover --&gt;
&lt;button class="so-btn so-btn-light-primary btn-hover-darken"&gt;Light + Darken&lt;/button&gt;
&lt;button class="so-btn so-btn-outline-primary btn-hover-darken"&gt;Outline + Darken&lt;/button&gt;

&lt;!-- Effect Modifiers --&gt;
&lt;button class="so-btn so-btn-primary btn-hover-lift"&gt;Lift Effect&lt;/button&gt;
&lt;button class="so-btn so-btn-success btn-hover-scale"&gt;Scale Effect&lt;/button&gt;
&lt;button class="so-btn so-btn-light-info btn-hover-none"&gt;No Hover&lt;/button&gt;

&lt;!-- Available hover modifiers:
  .btn-hover-soft   - Light tinted background (like ghost)
  .btn-hover-solid  - Fill with solid color (like outline default)
  .btn-hover-darken - Slightly darker shade
  .btn-hover-lift   - Elevate with shadow
  .btn-hover-scale  - Slight scale up
  .btn-hover-none   - Disable hover effects
--&gt;</code></pre>
                            </div>
                    </div>
                </div>

                <!-- Section 10: Loading Buttons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Loading Buttons</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-3">Add the <code>.so-loading</code> class to show a spinner and disable interaction. Works with all button variants.</p>

                        <h5 class="so-mb-3">Solid Variants</h5>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-primary so-loading">Primary</button>
                            <button class="so-btn so-btn-secondary so-loading">Secondary</button>
                            <button class="so-btn so-btn-success so-loading">Success</button>
                            <button class="so-btn so-btn-danger so-loading">Danger</button>
                            <button class="so-btn so-btn-warning so-loading">Warning</button>
                            <button class="so-btn so-btn-info so-loading">Info</button>
                            <button class="so-btn so-btn-light so-loading">Light</button>
                            <button class="so-btn so-btn-dark so-loading">Dark</button>
                        </div>

                        <h5 class="so-mb-3">Outline Variants</h5>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-outline-primary so-loading">Primary</button>
                            <button class="so-btn so-btn-outline-secondary so-loading">Secondary</button>
                            <button class="so-btn so-btn-outline-success so-loading">Success</button>
                            <button class="so-btn so-btn-outline-danger so-loading">Danger</button>
                            <button class="so-btn so-btn-outline-warning so-loading">Warning</button>
                            <button class="so-btn so-btn-outline-info so-loading">Info</button>
                            <button class="so-btn so-btn-outline-light so-loading">Light</button>
                            <button class="so-btn so-btn-outline-dark so-loading">Dark</button>
                        </div>

                        <h5 class="so-mb-3">Light (Soft) Variants</h5>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-light-primary so-loading">Primary</button>
                            <button class="so-btn so-btn-light-secondary so-loading">Secondary</button>
                            <button class="so-btn so-btn-light-success so-loading">Success</button>
                            <button class="so-btn so-btn-light-danger so-loading">Danger</button>
                            <button class="so-btn so-btn-light-warning so-loading">Warning</button>
                            <button class="so-btn so-btn-light-info so-loading">Info</button>
                            <button class="so-btn so-btn-light-light so-loading">Light</button>
                            <button class="so-btn so-btn-light-dark so-loading">Dark</button>
                        </div>

                        <h5 class="so-mb-3">Ghost & Link Variants</h5>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-ghost so-btn-primary so-loading">Ghost Primary</button>
                            <button class="so-btn so-btn-ghost so-btn-success so-loading">Ghost Success</button>
                            <button class="so-btn so-btn-ghost so-btn-danger so-loading">Ghost Danger</button>
                            <button class="so-btn so-btn-link so-loading">Link Button</button>
                        </div>

                        <h5 class="so-mb-3">Size Variants</h5>
                        <div class="so-flex so-gap-2 so-items-center so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-primary so-btn-xs so-loading">Extra Small</button>
                            <button class="so-btn so-btn-primary so-btn-sm so-loading">Small</button>
                            <button class="so-btn so-btn-primary so-loading">Default</button>
                            <button class="so-btn so-btn-primary so-btn-lg so-loading">Large</button>
                        </div>

                        <h5 class="so-mb-3">Icon Buttons</h5>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-icon so-btn-primary so-loading">
                                <span class="material-icons">add</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-success so-loading">
                                <span class="material-icons">check</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-outline-danger so-loading">
                                <span class="material-icons">delete</span>
                            </button>
                            <button class="so-btn so-btn-icon so-btn-ghost so-loading">
                                <span class="material-icons">more_vert</span>
                            </button>
                        </div>

                        <h5 class="so-mb-3">Interactive Demo</h5>
                        <p class="so-text-muted so-mb-3">Click buttons to toggle loading state</p>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <button class="so-btn so-btn-primary" onclick="this.classList.toggle('so-loading')">
                                <span class="material-icons">save</span>
                                Save Changes
                            </button>
                            <button class="so-btn so-btn-success" onclick="this.classList.toggle('so-loading')">
                                <span class="material-icons">send</span>
                                Submit
                            </button>
                            <button class="so-btn so-btn-outline-primary" onclick="this.classList.toggle('so-loading')">
                                <span class="material-icons">refresh</span>
                                Refresh
                            </button>
                            <button class="so-btn so-btn-light-danger" onclick="this.classList.toggle('so-loading')">
                                <span class="material-icons">delete</span>
                                Delete
                            </button>
                        </div>

                        <div class="so-code-block so-code-block-tabbed so-mt-4">
                            <div class="so-code-header">
                                <div class="so-code-tabs">
                                    <button class="so-code-tab so-active" data-so-target="#loading-btn-html">
                                        <span class="material-icons">code</span> HTML
                                    </button>
                                    <button class="so-code-tab" data-so-target="#loading-btn-js">
                                        <span class="material-icons">javascript</span> JavaScript
                                    </button>
                                </div>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <div class="so-code-body">
                                <div class="so-code-pane so-active" id="loading-btn-html">
                                    <pre class="so-code-content"><code class="language-html">&lt;!-- Add .so-loading class to show spinner --&gt;
&lt;button class="so-btn so-btn-primary so-loading"&gt;Loading...&lt;/button&gt;

&lt;!-- Works with all variants (8 contextual colors) --&gt;
&lt;button class="so-btn so-btn-primary so-loading"&gt;Primary&lt;/button&gt;
&lt;button class="so-btn so-btn-secondary so-loading"&gt;Secondary&lt;/button&gt;
&lt;button class="so-btn so-btn-success so-loading"&gt;Success&lt;/button&gt;
&lt;button class="so-btn so-btn-danger so-loading"&gt;Danger&lt;/button&gt;
&lt;button class="so-btn so-btn-warning so-loading"&gt;Warning&lt;/button&gt;
&lt;button class="so-btn so-btn-info so-loading"&gt;Info&lt;/button&gt;
&lt;button class="so-btn so-btn-light so-loading"&gt;Light&lt;/button&gt;
&lt;button class="so-btn so-btn-dark so-loading"&gt;Dark&lt;/button&gt;

&lt;!-- Outline variants --&gt;
&lt;button class="so-btn so-btn-outline-primary so-loading"&gt;Outline&lt;/button&gt;

&lt;!-- Light (soft) variants --&gt;
&lt;button class="so-btn so-btn-light-primary so-loading"&gt;Light&lt;/button&gt;

&lt;!-- Ghost variants --&gt;
&lt;button class="so-btn so-btn-ghost so-btn-primary so-loading"&gt;Ghost&lt;/button&gt;

&lt;!-- Link button --&gt;
&lt;button class="so-btn so-btn-link so-loading"&gt;Link&lt;/button&gt;

&lt;!-- Icon button --&gt;
&lt;button class="so-btn so-btn-icon so-btn-primary so-loading"&gt;
    &lt;span class="material-icons"&gt;add&lt;/span&gt;
&lt;/button&gt;

&lt;!-- Button with icon and text --&gt;
&lt;button class="so-btn so-btn-primary so-loading"&gt;
    &lt;span class="material-icons"&gt;save&lt;/span&gt;
    Save Changes
&lt;/button&gt;</code></pre>
                                </div>
                                <div class="so-code-pane" id="loading-btn-js">
                                    <pre class="so-code-content"><code class="language-javascript">// Get button element
const btn = document.querySelector('.so-btn');

// Start loading
btn.classList.add('so-loading');

// Stop loading
btn.classList.remove('so-loading');

// Toggle loading
btn.classList.toggle('so-loading');

// Example: Form submission with loading state
const submitBtn = document.querySelector('#submit-btn');
const form = document.querySelector('#my-form');

form.addEventListener('submit', async (e) =&gt; {
    e.preventDefault();

    // Show loading state
    submitBtn.classList.add('so-loading');
    submitBtn.disabled = true;

    try {
        // Simulate API call
        await fetch('/api/submit', {
            method: 'POST',
            body: new FormData(form)
        });

        // Success handling
        console.log('Form submitted!');
    } catch (error) {
        console.error('Error:', error);
    } finally {
        // Remove loading state
        submitBtn.classList.remove('so-loading');
        submitBtn.disabled = false;
    }
});

// Example: Toggle loading on click
document.querySelector('.toggle-btn').addEventListener('click', function() {
    this.classList.toggle('so-loading');
});</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 11: Progress Buttons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Progress Buttons</h3>
                    </div>
                    <div class="so-card-body">
                                                        <!-- Solid Variants -->
                                <h5 class="so-demo-section-title">Solid Variants</h5>
                                <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-4">
                                    <button class="so-btn so-btn-primary so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Primary</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Done</span>
                                    </button>
                                    <button class="so-btn so-btn-secondary so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Secondary</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-success so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Success</span>
                                        <span class="so-btn-done"><span class="material-icons">check_circle</span></span>
                                    </button>
                                    <button class="so-btn so-btn-danger so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Danger</span>
                                        <span class="so-btn-done"><span class="material-icons">close</span></span>
                                    </button>
                                    <button class="so-btn so-btn-warning so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Warning</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-info so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Info</span>
                                        <span class="so-btn-done">Synced!</span>
                                    </button>
                                </div>

                                <!-- Outline Variants -->
                                <h5 class="so-demo-section-title">Outline Variants</h5>
                                <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-4">
                                    <button class="so-btn so-btn-outline-primary so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Primary</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-outline-success so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Success</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-outline-danger so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Danger</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-outline-warning so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Warning</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-outline-info so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Info</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                </div>

                                <!-- Light Variants -->
                                <h5 class="so-demo-section-title">Light (Soft) Variants</h5>
                                <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-4">
                                    <button class="so-btn so-btn-light-primary so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Primary</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-light-success so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Success</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-light-danger so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Danger</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-light-warning so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Warning</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-light-info so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Info</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                </div>

                                <!-- Size Variants -->
                                <h5 class="so-demo-section-title">Size Variants</h5>
                                <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-4">
                                    <button class="so-btn so-btn-primary so-btn-xs so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Extra Small</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-primary so-btn-sm so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Small</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-primary so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Default</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <button class="so-btn so-btn-primary so-btn-lg so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Large</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                </div>

                                <!-- Content Variants: Text Only, Icon Only, Text + Icon -->
                                <h5 class="so-demo-section-title">Content Variants</h5>
                                <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-3">
                                    <!-- Text Only -->
                                    <button class="so-btn so-btn-primary so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Text Only</span>
                                        <span class="so-btn-done">Done!</span>
                                    </button>
                                    <!-- Icon Only -->
                                    <button class="so-btn so-btn-primary so-btn-icon so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text"><span class="material-icons">cloud_upload</span></span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                    <!-- Icon + Label -->
                                    <button class="so-btn so-btn-success so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text"><span class="material-icons">save</span> Save</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Saved</span>
                                    </button>
                                    <!-- Label + Icon -->
                                    <button class="so-btn so-btn-info so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Sync <span class="material-icons">sync</span></span>
                                        <span class="so-btn-done"><span class="material-icons">cloud_done</span></span>
                                    </button>
                                </div>

                                <!-- Start Content - Different content shown only during progress -->
                                <h5 class="so-demo-section-title">Start Content (Progress-Only)</h5>
                                <p class="so-demo-hint">Use <code>.so-btn-start</code> for content that appears <strong>only during progress</strong> - hidden by default, visible while progressing, hidden on complete. Can be icon, text, or any combination.</p>
                                <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-3">
                                    <!-- Start Icon + Progress Text -->
                                    <button class="so-btn so-btn-primary so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-start"><span class="material-icons">cloud_upload</span></span>
                                        <span class="so-btn-text">Uploading...</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Uploaded</span>
                                    </button>
                                    <!-- Start Label + Progress Text -->
                                    <button class="so-btn so-btn-success so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-start">File:</span>
                                        <span class="so-btn-text">Processing...</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Complete</span>
                                    </button>
                                    <!-- Start Icon + Label + Progress -->
                                    <button class="so-btn so-btn-outline-primary so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-start"><span class="material-icons">folder</span> docs/</span>
                                        <span class="so-btn-text">Syncing...</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Synced</span>
                                    </button>
                                    <!-- Download with filename -->
                                    <button class="so-btn so-btn-light-info so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-start"><span class="material-icons">download</span></span>
                                        <span class="so-btn-text">report.pdf</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span></span>
                                    </button>
                                </div>
                                <p class="so-demo-progress-hint">Click buttons to see progress animation</p>

                                <!-- Done State Color Modifiers -->
                                <h5 class="so-demo-done-state-title">Done State Color Control</h5>
                                <p class="so-demo-hint">Override the completed state color with <code>.so-btn-done-{color}</code> or keep parent color with <code>.so-btn-done-match</code></p>

                                <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-3">
                                    <!-- Default: Primary -> Success -->
                                    <button class="so-btn so-btn-primary so-btn-progress" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Default (→ Success)</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Done</span>
                                    </button>
                                    <!-- Match Parent Color -->
                                    <button class="so-btn so-btn-primary so-btn-progress so-btn-done-match" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Match Parent</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Done</span>
                                    </button>
                                    <!-- Force Danger -->
                                    <button class="so-btn so-btn-primary so-btn-progress so-btn-done-danger" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Force Danger</span>
                                        <span class="so-btn-done"><span class="material-icons">warning</span> Error</span>
                                    </button>
                                    <!-- Force Info -->
                                    <button class="so-btn so-btn-warning so-btn-progress so-btn-done-info" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Warning → Info</span>
                                        <span class="so-btn-done"><span class="material-icons">info</span> Complete</span>
                                    </button>
                                </div>
                                <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-3">
                                    <!-- Outline with Match -->
                                    <button class="so-btn so-btn-outline-danger so-btn-progress so-btn-done-match" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Outline Match</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Done</span>
                                    </button>
                                    <!-- Outline Force Success -->
                                    <button class="so-btn so-btn-outline-secondary so-btn-progress so-btn-done-success" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Secondary → Success</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Done</span>
                                    </button>
                                    <!-- Light with Match -->
                                    <button class="so-btn so-btn-light-info so-btn-progress so-btn-done-match" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Light Match</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Done</span>
                                    </button>
                                    <!-- Light Force Primary -->
                                    <button class="so-btn so-btn-light-danger so-btn-progress so-btn-done-primary" onclick="simulateProgress(this)">
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-text">Light → Primary</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Done</span>
                                    </button>
                                </div>

                                <!-- Programmatic Control -->
                                <h5 class="so-demo-done-state-title">Programmatic Control (SOProgressButton)</h5>
                                <p class="so-demo-hint">Use <code>SOProgressButton</code> class to control progress buttons programmatically with events and API methods.</p>

                                <div class="so-flex so-gap-3 so-flex-wrap so-items-center so-mb-3">
                                    <!-- Demo button with API -->
                                    <button id="demo-progress-btn" class="so-btn so-btn-primary so-btn-progress" data-so-progress>
                                        <span class="so-btn-progress-bar"></span>
                                        <span class="so-btn-start"><span class="material-icons">cloud_upload</span></span>
                                        <span class="so-btn-text">Upload File</span>
                                        <span class="so-btn-done"><span class="material-icons">check</span> Uploaded</span>
                                    </button>
                                </div>

                                <!-- Control buttons -->
                                <div class="so-flex so-gap-2 so-flex-wrap so-mb-3">
                                    <button class="so-btn so-btn-sm so-btn-outline" onclick="demoProgressBtn.start()">start()</button>
                                    <button class="so-btn so-btn-sm so-btn-outline" onclick="demoProgressBtn.setProgress(25)">setProgress(25)</button>
                                    <button class="so-btn so-btn-sm so-btn-outline" onclick="demoProgressBtn.setProgress(50)">setProgress(50)</button>
                                    <button class="so-btn so-btn-sm so-btn-outline" onclick="demoProgressBtn.setProgress(75)">setProgress(75)</button>
                                    <button class="so-btn so-btn-sm so-btn-outline" onclick="demoProgressBtn.complete()">complete()</button>
                                    <button class="so-btn so-btn-sm so-btn-outline" onclick="demoProgressBtn.reset()">reset()</button>
                                    <button class="so-btn so-btn-sm so-btn-outline-success" onclick="demoProgressBtn.simulate()">simulate()</button>
                                </div>

                                <!-- Event output -->
                                <div class="so-card so-card-bordered so-mb-3">
                                    <div class="so-card-body so-p-3">
                                        <p class="so-demo-desc-sm so-mb-2"><strong>Events:</strong></p>
                                        <div id="progress-event-output" class="so-demo-output so-bg-body-secondary so-rounded" style="min-height: 60px; font-size: 12px;">
                                            Click a control button to see events...
                                        </div>
                                    </div>
                                </div>

                                <script>
                                // Initialize progress button
                                let demoProgressBtn;
                                document.addEventListener('DOMContentLoaded', function() {
                                    const btn = document.getElementById('demo-progress-btn');
                                    demoProgressBtn = SOProgressButton.getInstance(btn);
                                    const output = document.getElementById('progress-event-output');

                                    // Listen to events
                                    btn.addEventListener('so:progress:start', (e) => {
                                        output.innerHTML = `<span class="so-text-primary">start</span> - progress: ${e.detail.progress.toFixed(0)}%, state: ${e.detail.state}`;
                                    });
                                    btn.addEventListener('so:progress:update', (e) => {
                                        output.innerHTML = `<span class="so-text-info">update</span> - progress: ${e.detail.progress.toFixed(0)}%, prev: ${e.detail.previousProgress.toFixed(0)}%`;
                                    });
                                    btn.addEventListener('so:progress:complete', (e) => {
                                        output.innerHTML = `<span class="so-text-success">complete</span> - progress: ${e.detail.progress}%, state: ${e.detail.state}`;
                                    });
                                    btn.addEventListener('so:progress:reset', (e) => {
                                        output.innerHTML = `<span class="so-text-secondary">reset</span> - progress: ${e.detail.progress}%, state: ${e.detail.state}`;
                                    });
                                });
                                </script>

                                <div class="so-code-block so-mt-4">
                                <div class="so-code-header">
                                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                    <button class="so-code-copy" onclick="copyCode(this)">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                                <pre class="so-code-content"><code class="language-html">&lt;!-- Text Only --&gt;
&lt;button class="so-btn so-btn-primary so-btn-progress"&gt;
    &lt;span class="so-btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="so-btn-text"&gt;Upload File&lt;/span&gt;
    &lt;span class="so-btn-done"&gt;Done!&lt;/span&gt;
&lt;/button&gt;

&lt;!-- Icon Only --&gt;
&lt;button class="so-btn so-btn-primary so-btn-icon so-btn-progress"&gt;
    &lt;span class="so-btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="so-btn-text"&gt;&lt;span class="material-icons"&gt;cloud_upload&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-btn-done"&gt;&lt;span class="material-icons"&gt;check&lt;/span&gt;&lt;/span&gt;
&lt;/button&gt;

&lt;!-- Icon + Label --&gt;
&lt;button class="so-btn so-btn-success so-btn-progress"&gt;
    &lt;span class="so-btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="so-btn-text"&gt;&lt;span class="material-icons"&gt;save&lt;/span&gt; Save&lt;/span&gt;
    &lt;span class="so-btn-done"&gt;&lt;span class="material-icons"&gt;check&lt;/span&gt; Saved&lt;/span&gt;
&lt;/button&gt;

&lt;!-- Start Content (hidden by default, appears only during progress) --&gt;
&lt;!-- Start with Icon only --&gt;
&lt;button class="so-btn so-btn-primary so-btn-progress"&gt;
    &lt;span class="so-btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="so-btn-start"&gt;&lt;span class="material-icons"&gt;cloud_upload&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-btn-text"&gt;Uploading...&lt;/span&gt;
    &lt;span class="so-btn-done"&gt;&lt;span class="material-icons"&gt;check&lt;/span&gt; Uploaded&lt;/span&gt;
&lt;/button&gt;

&lt;!-- Start with Icon + Text --&gt;
&lt;button class="so-btn so-btn-outline-primary so-btn-progress"&gt;
    &lt;span class="so-btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="so-btn-start"&gt;&lt;span class="material-icons"&gt;folder&lt;/span&gt; docs/&lt;/span&gt;
    &lt;span class="so-btn-text"&gt;Syncing...&lt;/span&gt;
    &lt;span class="so-btn-done"&gt;&lt;span class="material-icons"&gt;check&lt;/span&gt; Synced&lt;/span&gt;
&lt;/button&gt;

&lt;!-- Start with Text only --&gt;
&lt;button class="so-btn so-btn-success so-btn-progress"&gt;
    &lt;span class="so-btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="so-btn-start"&gt;Step 1:&lt;/span&gt;
    &lt;span class="so-btn-text"&gt;Processing...&lt;/span&gt;
    &lt;span class="so-btn-done"&gt;&lt;span class="material-icons"&gt;check&lt;/span&gt; Done&lt;/span&gt;
&lt;/button&gt;

&lt;!-- Done State Color Modifiers --&gt;
&lt;button class="so-btn so-btn-primary so-btn-progress so-btn-done-match"&gt;...&lt;/button&gt;
&lt;button class="so-btn so-btn-primary so-btn-progress so-btn-done-danger"&gt;...&lt;/button&gt;

&lt;!-- Programmatic Control with SOProgressButton --&gt;
&lt;button id="my-btn" class="so-btn so-btn-primary so-btn-progress" data-so-progress&gt;
    &lt;span class="so-btn-progress-bar"&gt;&lt;/span&gt;
    &lt;span class="so-btn-text"&gt;Upload&lt;/span&gt;
    &lt;span class="so-btn-done"&gt;Done&lt;/span&gt;
&lt;/button&gt;

&lt;script&gt;
// Get instance
const btn = SOProgressButton.getInstance('#my-btn');

// API Methods
btn.start();              // Start progress (enters progressing state)
btn.start(25);            // Start at specific progress
btn.setProgress(50);      // Set progress to 50%
btn.increment(10);        // Add 10% to current progress
btn.complete();           // Complete (100% + completed state)
btn.reset();              // Reset to initial state
btn.simulate();           // Auto-simulate progress animation

// Getters
btn.getProgress();        // Returns current progress (0-100)
btn.getState();           // Returns 'idle', 'progressing', or 'completed'
btn.isProgressing();      // Returns true if in progress
btn.isCompleted();        // Returns true if completed
btn.isIdle();             // Returns true if idle

// Content manipulation
btn.setText('&lt;span class="material-icons"&gt;save&lt;/span&gt; Save');
btn.setStartContent('&lt;span class="material-icons"&gt;sync&lt;/span&gt;');
btn.setDoneContent('&lt;span class="material-icons"&gt;check&lt;/span&gt; Saved');

// Events
document.getElementById('my-btn').addEventListener('so:progress:start', (e) =&gt; {
    console.log('Started:', e.detail.progress, e.detail.state);
});
document.getElementById('my-btn').addEventListener('so:progress:update', (e) =&gt; {
    console.log('Progress:', e.detail.progress, e.detail.previousProgress);
});
document.getElementById('my-btn').addEventListener('so:progress:complete', (e) =&gt; {
    console.log('Completed:', e.detail.state);
});
document.getElementById('my-btn').addEventListener('so:progress:reset', (e) =&gt; {
    console.log('Reset:', e.detail.state);
});

// Options (via data attributes)
// data-auto-disable="true"     - Disable button during progress (default: true)
// data-auto-reset="3000"       - Auto reset after complete (ms, 0 = disabled)
// data-simulate-on-click="true" - Auto-simulate on click
&lt;/script&gt;</code></pre>
                            </div>
                    </div>
                </div>
            </div>

<script>
// Progress button demo helper function
function simulateProgress(btn) {
    // Reset if already completed
    if (btn.classList.contains('so-completed')) {
        btn.classList.remove('so-completed');
        btn.style.setProperty('--progress', '0%');
        return;
    }

    let progress = 0;
    btn.disabled = true;
    btn.classList.add('so-progressing');

    const interval = setInterval(() => {
        progress += Math.random() * 15 + 5;
        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
            btn.style.setProperty('--progress', '100%');

            // Add completed class after a brief moment
            setTimeout(() => {
                btn.classList.remove('so-progressing');
                btn.classList.add('so-completed');
                btn.disabled = false;
            }, 200);
        } else {
            btn.style.setProperty('--progress', progress + '%');
        }
    }, 150);
}
</script>

    </div>
</main>

<?php
require_once '../includes/footer.php';
?>
