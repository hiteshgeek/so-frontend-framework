<?php
/**
 * SixOrbit UI Demo - List Group
 */
$pageTitle = 'List Group';
$pageDescription = 'List group component for displaying lists';

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
            <h1 class="so-page-title">List Group</h1>
            <p class="so-page-subtitle">List group component for displaying lists</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">
<div class="so-grid so-grid-cols-1 so-gap-6">

        <!-- Basic List Group -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic List Group</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">A simple list group with static items.</p>

                <ul class="so-list-group so-mb-6" style="max-width: 400px;">
                    <li class="so-list-group-item">First item</li>
                    <li class="so-list-group-item">Second item</li>
                    <li class="so-list-group-item">Third item</li>
                    <li class="so-list-group-item">Fourth item</li>
                    <li class="so-list-group-item">Fifth item</li>
                </ul>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;ul class="so-list-group"&gt;
    &lt;li class="so-list-group-item"&gt;First item&lt;/li&gt;
    &lt;li class="so-list-group-item"&gt;Second item&lt;/li&gt;
    &lt;li class="so-list-group-item"&gt;Third item&lt;/li&gt;
&lt;/ul&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Active and Disabled States -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Active and Disabled States</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Add <code>.active</code> or <code>.disabled</code> classes to indicate state.</p>

                <ul class="so-list-group so-mb-6" style="max-width: 400px;">
                    <li class="so-list-group-item so-active">Active item</li>
                    <li class="so-list-group-item">Normal item</li>
                    <li class="so-list-group-item">Normal item</li>
                    <li class="so-list-group-item so-disabled">Disabled item</li>
                    <li class="so-list-group-item">Normal item</li>
                </ul>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;li class="so-list-group-item so-active"&gt;Active item&lt;/li&gt;
&lt;li class="so-list-group-item so-disabled"&gt;Disabled item&lt;/li&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Actionable Items -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Actionable Items</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Use <code>.so-list-group-item-action</code> for clickable items with hover states.</p>

                <div class="so-list-group so-mb-6" style="max-width: 400px;">
                    <a href="#" class="so-list-group-item so-list-group-item-action so-active">
                        Active link item
                    </a>
                    <a href="#" class="so-list-group-item so-list-group-item-action">
                        Standard link item
                    </a>
                    <button type="button" class="so-list-group-item so-list-group-item-action">
                        Button item
                    </button>
                    <a href="#" class="so-list-group-item so-list-group-item-action so-disabled">
                        Disabled link item
                    </a>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-list-group"&gt;
    &lt;a href="#" class="so-list-group-item so-list-group-item-action so-active"&gt;
        Active link item
    &lt;/a&gt;
    &lt;button class="so-list-group-item so-list-group-item-action"&gt;
        Button item
    &lt;/button&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Color Variants -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Color Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Contextual color classes for list items.</p>

                <ul class="so-list-group so-mb-6" style="max-width: 400px;">
                    <li class="so-list-group-item so-list-group-item-primary">Primary item</li>
                    <li class="so-list-group-item so-list-group-item-secondary">Secondary item</li>
                    <li class="so-list-group-item so-list-group-item-success">Success item</li>
                    <li class="so-list-group-item so-list-group-item-danger">Danger item</li>
                    <li class="so-list-group-item so-list-group-item-warning">Warning item</li>
                    <li class="so-list-group-item so-list-group-item-info">Info item</li>
                    <li class="so-list-group-item so-list-group-item-light">Light item</li>
                    <li class="so-list-group-item so-list-group-item-dark">Dark item</li>
                </ul>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;li class="so-list-group-item so-list-group-item-primary"&gt;Primary&lt;/li&gt;
&lt;li class="so-list-group-item so-list-group-item-success"&gt;Success&lt;/li&gt;
&lt;li class="so-list-group-item so-list-group-item-danger"&gt;Danger&lt;/li&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Flush Variant -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Flush Variant</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Remove borders and rounded corners with <code>.so-list-group-flush</code>.</p>

                <ul class="so-list-group so-list-group-flush so-mb-6" style="max-width: 400px;">
                    <li class="so-list-group-item">First item</li>
                    <li class="so-list-group-item">Second item</li>
                    <li class="so-list-group-item">Third item</li>
                    <li class="so-list-group-item">Fourth item</li>
                </ul>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;ul class="so-list-group so-list-group-flush"&gt;
    &lt;li class="so-list-group-item"&gt;First item&lt;/li&gt;
    &lt;li class="so-list-group-item"&gt;Second item&lt;/li&gt;
&lt;/ul&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Numbered List -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Numbered List</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Automatically numbered items with <code>.so-list-group-numbered</code>.</p>

                <ol class="so-list-group so-list-group-numbered so-mb-6" style="max-width: 400px;">
                    <li class="so-list-group-item">Install the package</li>
                    <li class="so-list-group-item">Import the styles</li>
                    <li class="so-list-group-item">Configure your settings</li>
                    <li class="so-list-group-item">Start building</li>
                </ol>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;ol class="so-list-group so-list-group-numbered"&gt;
    &lt;li class="so-list-group-item"&gt;Install the package&lt;/li&gt;
    &lt;li class="so-list-group-item"&gt;Import the styles&lt;/li&gt;
&lt;/ol&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Horizontal List -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Horizontal List</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Display items horizontally with <code>.so-list-group-horizontal</code>.</p>

                <ul class="so-list-group so-list-group-horizontal so-mb-6">
                    <li class="so-list-group-item">First</li>
                    <li class="so-list-group-item">Second</li>
                    <li class="so-list-group-item">Third</li>
                </ul>

                <p class="so-text-muted so-mb-2">Responsive horizontal (horizontal on md and up):</p>
                <ul class="so-list-group so-list-group-horizontal-md so-mb-6">
                    <li class="so-list-group-item">First</li>
                    <li class="so-list-group-item">Second</li>
                    <li class="so-list-group-item">Third</li>
                </ul>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;ul class="so-list-group so-list-group-horizontal"&gt;...&lt;/ul&gt;
&lt;ul class="so-list-group so-list-group-horizontal-md"&gt;...&lt;/ul&gt;
&lt;ul class="so-list-group so-list-group-horizontal-lg"&gt;...&lt;/ul&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- With Icons -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">With Icons</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Add Material Icons to list items.</p>

                <ul class="so-list-group so-mb-6" style="max-width: 400px;">
                    <li class="so-list-group-item">
                        <span class="material-icons">home</span>
                        Home
                    </li>
                    <li class="so-list-group-item so-active">
                        <span class="material-icons">dashboard</span>
                        Dashboard
                    </li>
                    <li class="so-list-group-item">
                        <span class="material-icons">settings</span>
                        Settings
                    </li>
                    <li class="so-list-group-item">
                        <span class="material-icons">help</span>
                        Help & Support
                    </li>
                </ul>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;li class="so-list-group-item"&gt;
    &lt;span class="material-icons"&gt;home&lt;/span&gt;
    Home
&lt;/li&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- With Badges -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">With Badges</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Badges are automatically pushed to the right.</p>

                <ul class="so-list-group so-mb-6" style="max-width: 400px;">
                    <li class="so-list-group-item">
                        <span class="material-icons">inbox</span>
                        Inbox
                        <span class="so-badge so-badge-primary so-badge-pill">14</span>
                    </li>
                    <li class="so-list-group-item">
                        <span class="material-icons">star</span>
                        Starred
                        <span class="so-badge so-badge-warning so-badge-pill">3</span>
                    </li>
                    <li class="so-list-group-item">
                        <span class="material-icons">send</span>
                        Sent
                    </li>
                    <li class="so-list-group-item">
                        <span class="material-icons">delete</span>
                        Trash
                        <span class="so-badge so-badge-danger so-badge-pill">99+</span>
                    </li>
                </ul>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;li class="so-list-group-item"&gt;
    &lt;span class="material-icons"&gt;inbox&lt;/span&gt;
    Inbox
    &lt;span class="so-badge so-badge-primary so-badge-pill"&gt;14&lt;/span&gt;
&lt;/li&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Custom Content -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Custom Content</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Use <code>.so-list-group-item-content</code>, <code>.so-list-group-item-heading</code>, and <code>.so-list-group-item-text</code> for rich content.</p>

                <div class="so-list-group so-mb-6" style="max-width: 500px;">
                    <a href="#" class="so-list-group-item so-list-group-item-action so-active">
                        <div class="so-list-group-item-content">
                            <h5 class="so-list-group-item-heading">List group item heading</h5>
                            <p class="so-list-group-item-text">Some placeholder content in a paragraph below the heading.</p>
                        </div>
                        <small>3 days ago</small>
                    </a>
                    <a href="#" class="so-list-group-item so-list-group-item-action">
                        <div class="so-list-group-item-content">
                            <h5 class="so-list-group-item-heading">Another item heading</h5>
                            <p class="so-list-group-item-text">Some placeholder content in a paragraph.</p>
                        </div>
                        <small class="so-text-muted">5 days ago</small>
                    </a>
                    <a href="#" class="so-list-group-item so-list-group-item-action">
                        <div class="so-list-group-item-content">
                            <h5 class="so-list-group-item-heading">Third item</h5>
                            <p class="so-list-group-item-text">More content here.</p>
                        </div>
                        <small class="so-text-muted">1 week ago</small>
                    </a>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;a href="#" class="so-list-group-item so-list-group-item-action"&gt;
    &lt;div class="so-list-group-item-content"&gt;
        &lt;h5 class="so-list-group-item-heading"&gt;Heading&lt;/h5&gt;
        &lt;p class="so-list-group-item-text"&gt;Description text&lt;/p&gt;
    &lt;/div&gt;
    &lt;small class="so-text-muted"&gt;3 days ago&lt;/small&gt;
&lt;/a&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Contextual Content with Custom Content -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Contextual Colors with Rich Content</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Combine contextual color classes with heading and text elements for rich colored items.</p>

                <div class="so-list-group so-mb-6" style="max-width: 500px;">
                    <a href="#" class="so-list-group-item so-list-group-item-action so-list-group-item-primary">
                        <div class="so-list-group-item-content">
                            <h5 class="so-list-group-item-heading">Primary Notification</h5>
                            <p class="so-list-group-item-text">You have a new message from the system administrator.</p>
                        </div>
                        <small>Just now</small>
                    </a>
                    <a href="#" class="so-list-group-item so-list-group-item-action so-list-group-item-success">
                        <div class="so-list-group-item-content">
                            <h5 class="so-list-group-item-heading">Success Alert</h5>
                            <p class="so-list-group-item-text">Your payment has been processed successfully.</p>
                        </div>
                        <small>2 hours ago</small>
                    </a>
                    <a href="#" class="so-list-group-item so-list-group-item-action so-list-group-item-warning">
                        <div class="so-list-group-item-content">
                            <h5 class="so-list-group-item-heading">Warning Notice</h5>
                            <p class="so-list-group-item-text">Your subscription will expire in 3 days.</p>
                        </div>
                        <small>Yesterday</small>
                    </a>
                    <a href="#" class="so-list-group-item so-list-group-item-action so-list-group-item-danger">
                        <div class="so-list-group-item-content">
                            <h5 class="so-list-group-item-heading">Error Report</h5>
                            <p class="so-list-group-item-text">Failed to sync data with the server. Please try again.</p>
                        </div>
                        <small>2 days ago</small>
                    </a>
                    <a href="#" class="so-list-group-item so-list-group-item-action so-list-group-item-info">
                        <div class="so-list-group-item-content">
                            <h5 class="so-list-group-item-heading">Information Update</h5>
                            <p class="so-list-group-item-text">New features are available in the latest version.</p>
                        </div>
                        <small>1 week ago</small>
                    </a>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;a href="#" class="so-list-group-item so-list-group-item-action so-list-group-item-success"&gt;
    &lt;div class="so-list-group-item-content"&gt;
        &lt;h5 class="so-list-group-item-heading"&gt;Success Alert&lt;/h5&gt;
        &lt;p class="so-list-group-item-text"&gt;Your payment has been processed.&lt;/p&gt;
    &lt;/div&gt;
    &lt;small&gt;2 hours ago&lt;/small&gt;
&lt;/a&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Size Variants -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Size Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Small and large size variants.</p>

                <div class="so-grid so-grid-cols-1 md:so-grid-cols-2 so-gap-4 so-mb-6">
                    <div>
                        <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Small (.so-list-group-sm)</label>
                        <ul class="so-list-group so-list-group-sm">
                            <li class="so-list-group-item">First item</li>
                            <li class="so-list-group-item">Second item</li>
                            <li class="so-list-group-item">Third item</li>
                        </ul>
                    </div>
                    <div>
                        <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Large (.so-list-group-lg)</label>
                        <ul class="so-list-group so-list-group-lg">
                            <li class="so-list-group-item">First item</li>
                            <li class="so-list-group-item">Second item</li>
                            <li class="so-list-group-item">Third item</li>
                        </ul>
                    </div>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;ul class="so-list-group so-list-group-sm"&gt;...&lt;/ul&gt;
&lt;ul class="so-list-group so-list-group-lg"&gt;...&lt;/ul&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- CSS Classes Reference -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">CSS Classes Reference</h3>
            </div>
            <div class="so-card-body">
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>.so-list-group</code></td>
                                <td>Base list group container</td>
                            </tr>
                            <tr>
                                <td><code>.so-list-group-item</code></td>
                                <td>List item</td>
                            </tr>
                            <tr>
                                <td><code>.so-list-group-item-action</code></td>
                                <td>Clickable item with hover state</td>
                            </tr>
                            <tr>
                                <td><code>.so-list-group-flush</code></td>
                                <td>Remove borders and rounded corners</td>
                            </tr>
                            <tr>
                                <td><code>.so-list-group-numbered</code></td>
                                <td>Auto-numbered items</td>
                            </tr>
                            <tr>
                                <td><code>.so-list-group-horizontal</code></td>
                                <td>Horizontal layout</td>
                            </tr>
                            <tr>
                                <td><code>.so-list-group-horizontal-{sm|md|lg|xl}</code></td>
                                <td>Responsive horizontal</td>
                            </tr>
                            <tr>
                                <td><code>.so-list-group-sm / .so-list-group-lg</code></td>
                                <td>Size variants</td>
                            </tr>
                            <tr>
                                <td><code>.so-list-group-item-{color}</code></td>
                                <td>Color variants</td>
                            </tr>
                            <tr>
                                <td><code>.active / .disabled</code></td>
                                <td>State classes</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
</main>

<?php
require_once '../includes/footer.php';
?>
