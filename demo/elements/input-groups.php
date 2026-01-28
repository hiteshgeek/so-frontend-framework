<?php
/**
 * SixOrbit UI Demo - Input Groups
 */
$pageTitle = 'Input Groups';
$pageDescription = 'Input group components with addons';

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
            <h1 class="so-page-title">Input Groups</h1>
            <p class="so-page-subtitle">Input group components with addons</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">
            <!-- Basic Input Groups -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Basic Input Groups</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-secondary so-mb-4">Combine inputs with text addons, icons, or buttons.</p>
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label">With Text Prefix</label>
                                <div class="so-input-group">
                                    <span class="so-input-addon">$</span>
                                    <input type="text" class="so-form-control" placeholder="0.00">
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">With Text Suffix</label>
                                <div class="so-input-group">
                                    <input type="text" class="so-form-control" placeholder="Username">
                                    <span class="so-input-addon">@example.com</span>
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Both Sides</label>
                                <div class="so-input-group">
                                    <span class="so-input-addon">https://</span>
                                    <input type="text" class="so-form-control" placeholder="domain">
                                    <span class="so-input-addon">.com</span>
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Numeric with Unit</label>
                                <div class="so-input-group">
                                    <input type="number" class="so-form-control" placeholder="0">
                                    <span class="so-input-addon">kg</span>
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
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Text Prefix --&gt;
&lt;div class="so-input-group"&gt;
    &lt;span class="so-input-addon"&gt;$&lt;/span&gt;
    &lt;input type="text" class="so-form-control" placeholder="0.00"&gt;
&lt;/div&gt;

&lt;!-- Text Suffix --&gt;
&lt;div class="so-input-group"&gt;
    &lt;input type="text" class="so-form-control" placeholder="Username"&gt;
    &lt;span class="so-input-addon"&gt;@example.com&lt;/span&gt;
&lt;/div&gt;

&lt;!-- Both Sides --&gt;
&lt;div class="so-input-group"&gt;
    &lt;span class="so-input-addon"&gt;https://&lt;/span&gt;
    &lt;input type="text" class="so-form-control" placeholder="domain"&gt;
    &lt;span class="so-input-addon"&gt;.com&lt;/span&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Icon Addons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Icon Addons</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label">Email</label>
                                <div class="so-input-group">
                                    <span class="so-input-addon"><span class="material-icons">email</span></span>
                                    <input type="email" class="so-form-control" placeholder="Email address">
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Phone</label>
                                <div class="so-input-group">
                                    <span class="so-input-addon"><span class="material-icons">phone</span></span>
                                    <input type="tel" class="so-form-control" placeholder="Phone number">
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Website</label>
                                <div class="so-input-group">
                                    <span class="so-input-addon"><span class="material-icons">link</span></span>
                                    <input type="url" class="so-form-control" placeholder="https://example.com">
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Location</label>
                                <div class="so-input-group">
                                    <span class="so-input-addon"><span class="material-icons">location_on</span></span>
                                    <input type="text" class="so-form-control" placeholder="Enter address">
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
                            <pre class="so-code-content"><code class="language-html">&lt;div class="so-input-group"&gt;
    &lt;span class="so-input-addon"&gt;&lt;span class="material-icons"&gt;email&lt;/span&gt;&lt;/span&gt;
    &lt;input type="email" class="so-form-control" placeholder="Email address"&gt;
&lt;/div&gt;

&lt;div class="so-input-group"&gt;
    &lt;span class="so-input-addon"&gt;&lt;span class="material-icons"&gt;phone&lt;/span&gt;&lt;/span&gt;
    &lt;input type="tel" class="so-form-control" placeholder="Phone number"&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Input Group with Button -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Input Group with Button</h3>
                    </div>
                    <div class="so-card-body">
                        <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                            <div class="so-form-group">
                                <label class="so-form-label">Search</label>
                                <div class="so-input-group">
                                    <input type="text" class="so-form-control" placeholder="Search...">
                                    <button type="button" class="so-btn so-btn-primary">Search</button>
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Subscribe</label>
                                <div class="so-input-group">
                                    <input type="email" class="so-form-control" placeholder="Enter email">
                                    <button type="button" class="so-btn so-btn-success">Subscribe</button>
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Copy Link</label>
                                <div class="so-input-group">
                                    <input type="text" class="so-form-control" value="https://sixorbit.com/invite/abc123" readonly>
                                    <button type="button" class="so-btn so-btn-secondary">
                                        <span class="material-icons">content_copy</span>
                                    </button>
                                </div>
                            </div>

                            <div class="so-form-group">
                                <label class="so-form-label">Upload</label>
                                <div class="so-input-group">
                                    <input type="text" class="so-form-control" placeholder="Choose file..." readonly>
                                    <button type="button" class="so-btn so-btn-light">Browse</button>
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
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Search --&gt;
&lt;div class="so-input-group"&gt;
    &lt;input type="text" class="so-form-control" placeholder="Search..."&gt;
    &lt;button type="button" class="so-btn so-btn-primary"&gt;Search&lt;/button&gt;
&lt;/div&gt;

&lt;!-- Icon Button --&gt;
&lt;div class="so-input-group"&gt;
    &lt;input type="text" class="so-form-control" value="https://..." readonly&gt;
    &lt;button type="button" class="so-btn so-btn-secondary"&gt;
        &lt;span class="material-icons"&gt;content_copy&lt;/span&gt;
    &lt;/button&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>
    
</main>

<?php
require_once '../includes/footer.php';
?>
