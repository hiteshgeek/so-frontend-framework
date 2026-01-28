<?php
/**
 * SixOrbit UI Demo - Badges
 */
$pageTitle = 'Badges';
$pageDescription = 'Badge components for labels and counts';

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
            <h1 class="so-page-title">Badges</h1>
            <p class="so-page-subtitle">Badge components for labels and counts</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">
<div class="so-card">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Badges</h3>
                    </div>
                    <div class="so-card-body">
                        <h4 class="so-demo-badge-title">Solid Badges</h4>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <span class="so-badge so-badge-primary">Primary</span>
                            <span class="so-badge so-badge-secondary">Secondary</span>
                            <span class="so-badge so-badge-success">Success</span>
                            <span class="so-badge so-badge-danger">Danger</span>
                            <span class="so-badge so-badge-warning">Warning</span>
                            <span class="so-badge so-badge-info">Info</span>
                            <span class="so-badge so-badge-light">Light</span>
                            <span class="so-badge so-badge-dark">Dark</span>
                        </div>

                        <h4 class="so-demo-badge-title">Soft Badges</h4>
                        <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                            <span class="so-badge so-badge-soft-primary">Primary</span>
                            <span class="so-badge so-badge-soft-secondary">Secondary</span>
                            <span class="so-badge so-badge-soft-success">Success</span>
                            <span class="so-badge so-badge-soft-danger">Danger</span>
                            <span class="so-badge so-badge-soft-warning">Warning</span>
                            <span class="so-badge so-badge-soft-info">Info</span>
                            <span class="so-badge so-badge-soft-light">Light</span>
                            <span class="so-badge so-badge-soft-dark">Dark</span>
                        </div>

                        <h4 class="so-demo-badge-title">Badge Sizes</h4>
                        <div class="so-flex so-gap-2 so-items-center so-flex-wrap so-mb-4">
                            <span class="so-badge so-badge-primary so-badge-sm">Small</span>
                            <span class="so-badge so-badge-primary">Default</span>
                            <span class="so-badge so-badge-primary so-badge-lg">Large</span>
                        </div>
                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Solid badges (8 contextual colors) --&gt;
&lt;span class="so-badge so-badge-primary"&gt;Primary&lt;/span&gt;
&lt;span class="so-badge so-badge-secondary"&gt;Secondary&lt;/span&gt;
&lt;span class="so-badge so-badge-success"&gt;Success&lt;/span&gt;
&lt;span class="so-badge so-badge-danger"&gt;Danger&lt;/span&gt;
&lt;span class="so-badge so-badge-warning"&gt;Warning&lt;/span&gt;
&lt;span class="so-badge so-badge-info"&gt;Info&lt;/span&gt;
&lt;span class="so-badge so-badge-light"&gt;Light&lt;/span&gt;
&lt;span class="so-badge so-badge-dark"&gt;Dark&lt;/span&gt;

&lt;!-- Soft badges (8 contextual colors) --&gt;
&lt;span class="so-badge so-badge-soft-primary"&gt;Primary&lt;/span&gt;
&lt;span class="so-badge so-badge-soft-secondary"&gt;Secondary&lt;/span&gt;
&lt;span class="so-badge so-badge-soft-success"&gt;Success&lt;/span&gt;
&lt;span class="so-badge so-badge-soft-danger"&gt;Danger&lt;/span&gt;
&lt;span class="so-badge so-badge-soft-warning"&gt;Warning&lt;/span&gt;
&lt;span class="so-badge so-badge-soft-info"&gt;Info&lt;/span&gt;
&lt;span class="so-badge so-badge-soft-light"&gt;Light&lt;/span&gt;
&lt;span class="so-badge so-badge-soft-dark"&gt;Dark&lt;/span&gt;

&lt;!-- Badge sizes --&gt;
&lt;span class="so-badge so-badge-primary so-badge-sm"&gt;Small&lt;/span&gt;
&lt;span class="so-badge so-badge-primary so-badge-lg"&gt;Large&lt;/span&gt;</code></pre>
                        </div>
                    </div>
                </div>
    </div>
</main>

<?php
require_once '../includes/footer.php';
?>
