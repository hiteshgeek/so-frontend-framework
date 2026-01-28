<?php
/**
 * SixOrbit UI Demo - Form Layouts
 */
$pageTitle = 'Form Layouts';
$pageDescription = 'Horizontal, inline, and multi-column form layouts';

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
            <h1 class="so-page-title"><?= htmlspecialchars($pageTitle) ?></h1>
            <p class="so-page-subtitle"><?= htmlspecialchars($pageDescription) ?></p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">

        <!-- Section 1: Horizontal Form -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Horizontal Form</h3>
                <p class="so-card-subtitle">Labels aligned to the right with inputs on the right side.</p>
            </div>
            <div class="so-card-body">
                <form class="so-form-horizontal">
                    <div class="so-form-group">
                        <label class="so-form-label">Full Name</label>
                        <input type="text" class="so-form-control" placeholder="John Doe">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Email</label>
                        <input type="email" class="so-form-control" placeholder="john@example.com">
                        <span class="so-form-hint">We'll never share your email.</span>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Password</label>
                        <input type="password" class="so-form-control" placeholder="Enter password">
                    </div>
                    <div class="so-form-group so-form-group-check">
                        <label class="so-form-label"></label>
                        <label class="so-checkbox">
                            <input type="checkbox">
                            <span class="so-checkbox-box"><span class="material-icons">check</span></span>
                            <span class="so-checkbox-label">Remember me</span>
                        </label>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label"></label>
                        <button type="button" class="so-btn so-btn-primary">Submit</button>
                    </div>
                </form>
                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;form class="so-form-horizontal"&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;Full Name&lt;/label&gt;
        &lt;input type="text" class="so-form-control" placeholder="John Doe"&gt;
    &lt;/div&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;Email&lt;/label&gt;
        &lt;input type="email" class="so-form-control" placeholder="john@example.com"&gt;
        &lt;span class="so-form-hint"&gt;We'll never share your email.&lt;/span&gt;
    &lt;/div&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;&lt;/label&gt;
        &lt;button type="button" class="so-btn so-btn-primary"&gt;Submit&lt;/button&gt;
    &lt;/div&gt;
&lt;/form&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Section 2: Horizontal Form - Label Width Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Horizontal Form - Label Width Variants</h3>
            </div>
            <div class="so-card-body">
                <form class="so-form-horizontal so-form-horizontal-narrow" style="margin-bottom: 2rem;">
                    <p class="so-text-muted so-text-sm so-mb-3"><strong>Narrow (120px)</strong></p>
                    <div class="so-form-group">
                        <label class="so-form-label">Name</label>
                        <input type="text" class="so-form-control" placeholder="Narrow label width">
                    </div>
                </form>
                <form class="so-form-horizontal" style="margin-bottom: 2rem;">
                    <p class="so-text-muted so-text-sm so-mb-3"><strong>Default (180px)</strong></p>
                    <div class="so-form-group">
                        <label class="so-form-label">Full Name</label>
                        <input type="text" class="so-form-control" placeholder="Default label width">
                    </div>
                </form>
                <form class="so-form-horizontal so-form-horizontal-wide">
                    <p class="so-text-muted so-text-sm so-mb-3"><strong>Wide (240px)</strong></p>
                    <div class="so-form-group">
                        <label class="so-form-label">Company Name</label>
                        <input type="text" class="so-form-control" placeholder="Wide label width">
                    </div>
                </form>
                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;form class="so-form-horizontal so-form-horizontal-narrow"&gt;...&lt;/form&gt;
&lt;form class="so-form-horizontal"&gt;...&lt;/form&gt;
&lt;form class="so-form-horizontal so-form-horizontal-wide"&gt;...&lt;/form&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Section 3: Inline Form -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Inline Form</h3>
                <p class="so-card-subtitle">All form elements in a single row. Useful for search bars and filters.</p>
            </div>
            <div class="so-card-body">
                <form class="so-form-inline">
                    <div class="so-form-group">
                        <label class="so-form-label">Search</label>
                        <input type="text" class="so-form-control" placeholder="Keyword..." style="width: 200px;">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Category</label>
                        <select class="so-form-control" data-so-select style="width: 150px;">
                            <option>All</option>
                            <option>Products</option>
                            <option>Services</option>
                        </select>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">&nbsp;</label>
                        <button type="button" class="so-btn so-btn-primary">
                            <span class="material-icons">search</span>
                            Search
                        </button>
                    </div>
                </form>
                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;form class="so-form-inline"&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;Search&lt;/label&gt;
        &lt;input type="text" class="so-form-control" placeholder="Keyword..."&gt;
    &lt;/div&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;Category&lt;/label&gt;
        &lt;select class="so-form-control" data-so-select&gt;
            &lt;option&gt;All&lt;/option&gt;
            &lt;option&gt;Products&lt;/option&gt;
        &lt;/select&gt;
    &lt;/div&gt;
    &lt;div class="so-form-group"&gt;
        &lt;button type="button" class="so-btn so-btn-primary"&gt;Search&lt;/button&gt;
    &lt;/div&gt;
&lt;/form&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Section 4: Form Row -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form Row</h3>
                <p class="so-card-subtitle">Multiple inputs in a single row with equal widths.</p>
            </div>
            <div class="so-card-body">
                <div class="so-form-row">
                    <div class="so-form-group">
                        <label class="so-form-label">First Name</label>
                        <input type="text" class="so-form-control" placeholder="John">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Last Name</label>
                        <input type="text" class="so-form-control" placeholder="Doe">
                    </div>
                </div>
                <div class="so-form-row">
                    <div class="so-form-group">
                        <label class="so-form-label">City</label>
                        <input type="text" class="so-form-control" placeholder="New York">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">State</label>
                        <input type="text" class="so-form-control" placeholder="NY">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">ZIP</label>
                        <input type="text" class="so-form-control" placeholder="10001">
                    </div>
                </div>
                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-row"&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;First Name&lt;/label&gt;
        &lt;input type="text" class="so-form-control" placeholder="John"&gt;
    &lt;/div&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;Last Name&lt;/label&gt;
        &lt;input type="text" class="so-form-control" placeholder="Doe"&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Section 5: Form Row with Column Sizing -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form Row with Column Sizing</h3>
                <p class="so-card-subtitle">Control column widths using <code>so-col-*</code> classes (1-12 grid).</p>
            </div>
            <div class="so-card-body">
                <div class="so-form-row">
                    <div class="so-form-group so-col-8">
                        <label class="so-form-label">Street Address</label>
                        <input type="text" class="so-form-control" placeholder="123 Main Street">
                    </div>
                    <div class="so-form-group so-col-4">
                        <label class="so-form-label">Apt/Suite</label>
                        <input type="text" class="so-form-control" placeholder="Apt 4B">
                    </div>
                </div>
                <div class="so-form-row">
                    <div class="so-form-group so-col-5">
                        <label class="so-form-label">City</label>
                        <input type="text" class="so-form-control" placeholder="New York">
                    </div>
                    <div class="so-form-group so-col-4">
                        <label class="so-form-label">State</label>
                        <select class="so-form-control" data-so-select>
                            <option>Select State</option>
                            <option>New York</option>
                            <option>California</option>
                            <option>Texas</option>
                        </select>
                    </div>
                    <div class="so-form-group so-col-3">
                        <label class="so-form-label">ZIP Code</label>
                        <input type="text" class="so-form-control" placeholder="10001">
                    </div>
                </div>
                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-row"&gt;
    &lt;div class="so-form-group so-col-8"&gt;
        &lt;label class="so-form-label"&gt;Street Address&lt;/label&gt;
        &lt;input type="text" class="so-form-control"&gt;
    &lt;/div&gt;
    &lt;div class="so-form-group so-col-4"&gt;
        &lt;label class="so-form-label"&gt;Apt/Suite&lt;/label&gt;
        &lt;input type="text" class="so-form-control"&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Section 6: Form Row Gap Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form Row Gap Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-text-sm so-mb-2"><strong>Small Gap</strong></p>
                <div class="so-form-row so-form-row-sm">
                    <div class="so-form-group">
                        <input type="text" class="so-form-control" placeholder="Field 1">
                    </div>
                    <div class="so-form-group">
                        <input type="text" class="so-form-control" placeholder="Field 2">
                    </div>
                    <div class="so-form-group">
                        <input type="text" class="so-form-control" placeholder="Field 3">
                    </div>
                </div>
                <p class="so-text-muted so-text-sm so-mb-2 so-mt-4"><strong>Large Gap</strong></p>
                <div class="so-form-row so-form-row-lg">
                    <div class="so-form-group">
                        <input type="text" class="so-form-control" placeholder="Field 1">
                    </div>
                    <div class="so-form-group">
                        <input type="text" class="so-form-control" placeholder="Field 2">
                    </div>
                    <div class="so-form-group">
                        <input type="text" class="so-form-control" placeholder="Field 3">
                    </div>
                </div>
                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-row so-form-row-sm"&gt;...&lt;/div&gt;
&lt;div class="so-form-row so-form-row-lg"&gt;...&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Section 7: Form Card -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form Card</h3>
                <p class="so-card-subtitle">A styled container for forms with header and footer.</p>
            </div>
            <div class="so-card-body">
                <div class="so-form-card" style="max-width: 500px;">
                    <div class="so-form-card-header">
                        <h4 class="so-form-card-title">Account Settings</h4>
                        <p class="so-form-card-subtitle">Update your personal information</p>
                    </div>
                    <div class="so-form-card-body">
                        <div class="so-form-group">
                            <label class="so-form-label">Display Name</label>
                            <input type="text" class="so-form-control" value="John Doe">
                        </div>
                        <div class="so-form-group">
                            <label class="so-form-label">Email</label>
                            <input type="email" class="so-form-control" value="john@example.com">
                        </div>
                        <div class="so-form-group">
                            <label class="so-form-label">Bio</label>
                            <textarea class="so-form-control" rows="3" placeholder="Tell us about yourself..."></textarea>
                        </div>
                    </div>
                    <div class="so-form-card-footer">
                        <button type="button" class="so-btn so-btn-secondary">Cancel</button>
                        <button type="button" class="so-btn so-btn-primary">Save Changes</button>
                    </div>
                </div>
                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-card"&gt;
    &lt;div class="so-form-card-header"&gt;
        &lt;h4 class="so-form-card-title"&gt;Account Settings&lt;/h4&gt;
        &lt;p class="so-form-card-subtitle"&gt;Update your personal information&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="so-form-card-body"&gt;
        &lt;div class="so-form-group"&gt;...&lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-form-card-footer"&gt;
        &lt;button type="button" class="so-btn so-btn-secondary"&gt;Cancel&lt;/button&gt;
        &lt;button type="button" class="so-btn so-btn-primary"&gt;Save Changes&lt;/button&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Section 8: Form Sections -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form Sections</h3>
                <p class="so-card-subtitle">Organize long forms into logical sections.</p>
            </div>
            <div class="so-card-body">
                <div class="so-form-section">
                    <h5 class="so-form-section-title">Personal Information</h5>
                    <div class="so-form-row">
                        <div class="so-form-group">
                            <label class="so-form-label">First Name</label>
                            <input type="text" class="so-form-control">
                        </div>
                        <div class="so-form-group">
                            <label class="so-form-label">Last Name</label>
                            <input type="text" class="so-form-control">
                        </div>
                    </div>
                </div>
                <div class="so-form-section">
                    <h5 class="so-form-section-title">Contact Details</h5>
                    <p class="so-form-section-subtitle">How can we reach you?</p>
                    <div class="so-form-group">
                        <label class="so-form-label">Email</label>
                        <input type="email" class="so-form-control">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Phone</label>
                        <input type="tel" class="so-form-control">
                    </div>
                </div>
                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-form-section"&gt;
    &lt;h5 class="so-form-section-title"&gt;Personal Information&lt;/h5&gt;
    &lt;div class="so-form-row"&gt;...&lt;/div&gt;
&lt;/div&gt;

&lt;div class="so-form-section"&gt;
    &lt;h5 class="so-form-section-title"&gt;Contact Details&lt;/h5&gt;
    &lt;p class="so-form-section-subtitle"&gt;How can we reach you?&lt;/p&gt;
    ...
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Section 9: Form Divider -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Form Divider</h3>
            </div>
            <div class="so-card-body">
                <div class="so-form-group">
                    <label class="so-form-label">Email</label>
                    <input type="email" class="so-form-control" placeholder="Enter email">
                </div>
                <hr class="so-form-divider">
                <div class="so-form-group">
                    <label class="so-form-label">Password</label>
                    <input type="password" class="so-form-control" placeholder="Enter password">
                </div>
                <div class="so-form-divider-text">or continue with</div>
                <div style="display: flex; gap: 12px; justify-content: center;">
                    <button type="button" class="so-btn so-btn-secondary">
                        <span class="material-icons">g_mobiledata</span> Google
                    </button>
                    <button type="button" class="so-btn so-btn-secondary">
                        <span class="material-icons">facebook</span> Facebook
                    </button>
                </div>
                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;hr class="so-form-divider"&gt;

&lt;div class="so-form-divider-text"&gt;or continue with&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
require_once '../includes/footer.php';
?>
