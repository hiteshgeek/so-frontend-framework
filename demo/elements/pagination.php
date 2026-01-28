<?php
/**
 * SixOrbit UI Demo - Pagination
 */
$pageTitle = 'Pagination';
$pageDescription = 'Pagination component for navigation';

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
            <h1 class="so-page-title">Pagination</h1>
            <p class="so-page-subtitle">Pagination component for navigation</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">
<!-- Basic Pagination -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Basic Pagination</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Simple pagination with page numbers and prev/next buttons.</p>

                        <nav class="so-pagination" aria-label="Basic pagination">
                            <ul class="so-pagination-nav">
                                <li class="so-page-item so-disabled">
                                    <a class="so-page-link" href="#" aria-disabled="true">
                                        <span class="material-icons">chevron_left</span>
                                    </a>
                                </li>
                                <li class="so-page-item so-active">
                                    <a class="so-page-link" href="#" aria-current="page">1</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">2</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">3</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">4</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">5</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">
                                        <span class="material-icons">chevron_right</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-pagination"&gt;
    &lt;ul class="so-pagination-nav"&gt;
        &lt;li class="so-page-item so-disabled"&gt;
            &lt;a class="so-page-link" href="#"&gt;&lt;span class="material-icons"&gt;chevron_left&lt;/span&gt;&lt;/a&gt;
        &lt;/li&gt;
        &lt;li class="so-page-item so-active"&gt;
            &lt;a class="so-page-link" href="#"&gt;1&lt;/a&gt;
        &lt;/li&gt;
        &lt;li class="so-page-item"&gt;&lt;a class="so-page-link" href="#"&gt;2&lt;/a&gt;&lt;/li&gt;
        &lt;li class="so-page-item"&gt;
            &lt;a class="so-page-link" href="#"&gt;&lt;span class="material-icons"&gt;chevron_right&lt;/span&gt;&lt;/a&gt;
        &lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- With First/Last Buttons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">With First & Last Buttons</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Include first and last page navigation buttons with ellipsis for large page ranges.</p>

                        <nav class="so-pagination" aria-label="Pagination with first/last">
                            <ul class="so-pagination-nav">
                                <li class="so-page-item so-disabled">
                                    <a class="so-page-link" href="#">
                                        <span class="material-icons">first_page</span>
                                    </a>
                                </li>
                                <li class="so-page-item so-disabled">
                                    <a class="so-page-link" href="#">
                                        <span class="material-icons">chevron_left</span>
                                    </a>
                                </li>
                                <li class="so-page-item so-active">
                                    <a class="so-page-link" href="#">1</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">2</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">3</a>
                                </li>
                                <li class="so-page-ellipsis">...</li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">10</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">
                                        <span class="material-icons">chevron_right</span>
                                    </a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">
                                        <span class="material-icons">last_page</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-pagination"&gt;
    &lt;ul class="so-pagination-nav"&gt;
        &lt;li class="so-page-item"&gt;
            &lt;a class="so-page-link" href="#"&gt;&lt;span class="material-icons"&gt;first_page&lt;/span&gt;&lt;/a&gt;
        &lt;/li&gt;
        &lt;li class="so-page-item"&gt;
            &lt;a class="so-page-link" href="#"&gt;&lt;span class="material-icons"&gt;chevron_left&lt;/span&gt;&lt;/a&gt;
        &lt;/li&gt;
        &lt;li class="so-page-item so-active"&gt;&lt;a class="so-page-link" href="#"&gt;1&lt;/a&gt;&lt;/li&gt;
        &lt;li class="so-page-ellipsis"&gt;...&lt;/li&gt;
        &lt;li class="so-page-item"&gt;&lt;a class="so-page-link" href="#"&gt;10&lt;/a&gt;&lt;/li&gt;
        &lt;li class="so-page-item"&gt;
            &lt;a class="so-page-link" href="#"&gt;&lt;span class="material-icons"&gt;chevron_right&lt;/span&gt;&lt;/a&gt;
        &lt;/li&gt;
        &lt;li class="so-page-item"&gt;
            &lt;a class="so-page-link" href="#"&gt;&lt;span class="material-icons"&gt;last_page&lt;/span&gt;&lt;/a&gt;
        &lt;/li&gt;
    &lt;/ul&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Size Variants -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Size Variants</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Use <code>.so-pagination-sm</code> or <code>.so-pagination-lg</code> for different sizes.</p>

                        <div class="so-d-flex so-flex-column so-gap-4">
                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Small</h4>
                                <nav class="so-pagination so-pagination-sm">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Default</h4>
                                <nav class="so-pagination">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Large</h4>
                                <nav class="so-pagination so-pagination-lg">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-pagination so-pagination-sm"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination so-pagination-lg"&gt;...&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Style Variants -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Style Variants</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Different visual styles for pagination.</p>

                        <div class="so-d-flex so-flex-column so-gap-4">
                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Default (bordered)</h4>
                                <nav class="so-pagination">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Rounded (pill)</h4>
                                <nav class="so-pagination so-pagination-rounded">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Outlined</h4>
                                <nav class="so-pagination so-pagination-outlined">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Minimal (no borders)</h4>
                                <nav class="so-pagination so-pagination-minimal">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-pagination"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination so-pagination-rounded"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination so-pagination-outlined"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination so-pagination-minimal"&gt;...&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Alignment -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Alignment</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Use <code>.so-pagination-center</code> or <code>.so-pagination-end</code> for alignment.</p>

                        <div class="so-d-flex so-flex-column so-gap-4">
                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Start (default)</h4>
                                <nav class="so-pagination">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Center</h4>
                                <nav class="so-pagination so-pagination-center">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">End</h4>
                                <nav class="so-pagination so-pagination-end">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-pagination"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination so-pagination-center"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination so-pagination-end"&gt;...&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Contextual Colors -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Contextual Colors</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Use <code>.so-pagination-{color}</code> for different color schemes.</p>

                        <div class="so-d-flex so-flex-column so-gap-4">
                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Primary</h4>
                                <nav class="so-pagination so-pagination-primary">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Success</h4>
                                <nav class="so-pagination so-pagination-success">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>

                            <div>
                                <h4 class="so-text-sm so-font-semibold so-mb-2">Danger</h4>
                                <nav class="so-pagination so-pagination-danger">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <h4 class="so-text-sm so-font-semibold so-mb-2 so-mt-4">Light Variants</h4>
                        <div class="so-d-flex so-flex-column so-gap-4">
                            <div>
                                <h5 class="so-text-xs so-text-muted so-mb-2">Light Primary</h5>
                                <nav class="so-pagination so-pagination-light-primary">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <h5 class="so-text-xs so-text-muted so-mb-2">Light Success</h5>
                                <nav class="so-pagination so-pagination-light-success">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div>
                                <h5 class="so-text-xs so-text-muted so-mb-2">Light Danger</h5>
                                <nav class="so-pagination so-pagination-light-danger">
                                    <ul class="so-pagination-nav">
                                        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                                        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Solid colors --&gt;
&lt;nav class="so-pagination so-pagination-primary"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination so-pagination-success"&gt;...&lt;/nav&gt;

&lt;!-- Light variants --&gt;
&lt;nav class="so-pagination so-pagination-light-primary"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination so-pagination-light-success"&gt;...&lt;/nav&gt;
&lt;nav class="so-pagination so-pagination-light-danger"&gt;...&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- With Page Info -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">With Page Info</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Add <code>.so-pagination-info</code> to show item range.</p>

                        <nav class="so-pagination so-pagination-between">
                            <span class="so-pagination-info">Showing <strong>1-10</strong> of <strong>97</strong> results</span>
                            <ul class="so-pagination-nav">
                                <li class="so-page-item so-disabled">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
                                </li>
                                <li class="so-page-item so-active"><a class="so-page-link" href="#">1</a></li>
                                <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                                <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                                <li class="so-page-ellipsis">...</li>
                                <li class="so-page-item"><a class="so-page-link" href="#">10</a></li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
                                </li>
                            </ul>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-pagination so-pagination-between"&gt;
    &lt;span class="so-pagination-info"&gt;Showing &lt;strong&gt;1-10&lt;/strong&gt; of &lt;strong&gt;97&lt;/strong&gt; results&lt;/span&gt;
    &lt;ul class="so-pagination-nav"&gt;...&lt;/ul&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- With Items Per Page Selector -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">With Items Per Page Selector</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Include a selector to change the number of items per page.</p>

                        <nav class="so-pagination so-pagination-between">
                            <div class="so-pagination-per-page">
                                <span class="so-pagination-label">Rows per page:</span>
                                <select class="so-pagination-select">
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <span class="so-pagination-info">1-10 of 97</span>
                            <ul class="so-pagination-nav">
                                <li class="so-page-item so-disabled">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
                                </li>
                            </ul>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-pagination so-pagination-between"&gt;
    &lt;div class="so-pagination-per-page"&gt;
        &lt;span class="so-pagination-label"&gt;Rows per page:&lt;/span&gt;
        &lt;select class="so-pagination-select"&gt;
            &lt;option value="10"&gt;10&lt;/option&gt;
            &lt;option value="25"&gt;25&lt;/option&gt;
            &lt;option value="50"&gt;50&lt;/option&gt;
        &lt;/select&gt;
    &lt;/div&gt;
    &lt;span class="so-pagination-info"&gt;1-10 of 97&lt;/span&gt;
    &lt;ul class="so-pagination-nav"&gt;...&lt;/ul&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- With Jump to Page -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">With Jump to Page</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Add an input to jump directly to a specific page.</p>

                        <nav class="so-pagination so-pagination-between">
                            <ul class="so-pagination-nav">
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">first_page</span></a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
                                </li>
                                <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                                <li class="so-page-item so-active"><a class="so-page-link" href="#">3</a></li>
                                <li class="so-page-item"><a class="so-page-link" href="#">4</a></li>
                                <li class="so-page-item"><a class="so-page-link" href="#">5</a></li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">last_page</span></a>
                                </li>
                            </ul>
                            <div class="so-pagination-jump">
                                <span class="so-pagination-jump-label">Go to page:</span>
                                <input type="number" class="so-pagination-jump-input" min="1" max="20" value="3">
                                <button class="so-pagination-jump-btn">Go</button>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-pagination so-pagination-between"&gt;
    &lt;ul class="so-pagination-nav"&gt;...&lt;/ul&gt;
    &lt;div class="so-pagination-jump"&gt;
        &lt;span class="so-pagination-jump-label"&gt;Go to page:&lt;/span&gt;
        &lt;input type="number" class="so-pagination-jump-input" min="1" max="20"&gt;
        &lt;button class="so-pagination-jump-btn"&gt;Go&lt;/button&gt;
    &lt;/div&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Interactive Pagination -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Interactive Pagination</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Dynamic pagination with JavaScript. Add <code>data-so-pagination</code> for auto-initialization.</p>

                        <nav class="so-pagination so-pagination-between"
                             id="demo-pagination"
                             data-so-pagination
                             data-so-total-items="97"
                             data-so-items-per-page="10"
                             data-so-show-page-info="true"
                             data-so-show-first-last="true">
                            <span class="so-pagination-info">Showing 1-10 of 97</span>
                            <ul class="so-pagination-nav">
                                <!-- Will be populated by JavaScript -->
                            </ul>
                        </nav>

                        <div class="so-mt-4 so-p-4 so-border so-rounded-lg" style="background: var(--so-bg-tertiary, var(--so-card-bg));">
                            <h4 class="so-text-sm so-font-semibold so-mb-3">JavaScript API</h4>
                            <div class="so-d-flex so-gap-2 so-flex-wrap">
                                <button class="so-btn so-btn-sm so-btn-outline-primary" onclick="demoPaginationFirst()">First</button>
                                <button class="so-btn so-btn-sm so-btn-outline-primary" onclick="demoPaginationPrev()">Prev</button>
                                <button class="so-btn so-btn-sm so-btn-outline-primary" onclick="demoPaginationNext()">Next</button>
                                <button class="so-btn so-btn-sm so-btn-outline-primary" onclick="demoPaginationLast()">Last</button>
                                <button class="so-btn so-btn-sm so-btn-outline-secondary" onclick="demoPaginationGoTo(5)">Go to Page 5</button>
                                <button class="so-btn so-btn-sm so-btn-outline-info" onclick="demoPaginationGetInfo()">Get Info</button>
                            </div>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-javascript">// Get pagination instance
const pagination = SOPagination.getInstance('#demo-pagination');

// Navigate
pagination.goToPage(5);
pagination.nextPage();
pagination.prevPage();
pagination.firstPage();
pagination.lastPage();

// Get info
pagination.getCurrentPage();    // Current page number
pagination.getTotalPages();     // Total page count
pagination.getPageRange();      // { start, end, total }

// Listen to events
element.addEventListener('so:pagination:change', (e) => {
    console.log('Page changed to:', e.detail.page);
});</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Full Featured Example -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Full Featured Example</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Complete pagination with all controls: info, per-page selector, navigation, and jump to page.</p>

                        <nav class="so-pagination so-pagination-between" style="flex-wrap: wrap; gap: 16px;">
                            <div class="so-pagination-per-page">
                                <span class="so-pagination-label">Rows per page:</span>
                                <select class="so-pagination-select">
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                            <span class="so-pagination-info">Showing <strong>21-30</strong> of <strong>256</strong> results</span>

                            <ul class="so-pagination-nav">
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">first_page</span></a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
                                </li>
                                <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                                <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                                <li class="so-page-item so-active"><a class="so-page-link" href="#">3</a></li>
                                <li class="so-page-item"><a class="so-page-link" href="#">4</a></li>
                                <li class="so-page-ellipsis">...</li>
                                <li class="so-page-item"><a class="so-page-link" href="#">26</a></li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">last_page</span></a>
                                </li>
                            </ul>

                            <div class="so-pagination-jump">
                                <span class="so-pagination-jump-label">Go to:</span>
                                <input type="number" class="so-pagination-jump-input" min="1" max="26" value="3">
                                <button class="so-pagination-jump-btn">Go</button>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-pagination so-pagination-between"&gt;
    &lt;div class="so-pagination-per-page"&gt;
        &lt;span class="so-pagination-label"&gt;Rows per page:&lt;/span&gt;
        &lt;select class="so-pagination-select"&gt;...&lt;/select&gt;
    &lt;/div&gt;
    &lt;span class="so-pagination-info"&gt;Showing 21-30 of 256&lt;/span&gt;
    &lt;ul class="so-pagination-nav"&gt;...&lt;/ul&gt;
    &lt;div class="so-pagination-jump"&gt;
        &lt;span class="so-pagination-jump-label"&gt;Go to:&lt;/span&gt;
        &lt;input type="number" class="so-pagination-jump-input"&gt;
        &lt;button class="so-pagination-jump-btn"&gt;Go&lt;/button&gt;
    &lt;/div&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Disabled States -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Disabled States</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Add <code>.so-disabled</code> to page items to disable them.</p>

                        <nav class="so-pagination">
                            <ul class="so-pagination-nav">
                                <li class="so-page-item so-disabled">
                                    <a class="so-page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <span class="material-icons">chevron_left</span>
                                    </a>
                                </li>
                                <li class="so-page-item so-active">
                                    <a class="so-page-link" href="#">1</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">2</a>
                                </li>
                                <li class="so-page-item so-disabled">
                                    <a class="so-page-link" href="#" tabindex="-1" aria-disabled="true">3</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">4</a>
                                </li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#">
                                        <span class="material-icons">chevron_right</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;li class="so-page-item so-disabled"&gt;
    &lt;a class="so-page-link" href="#" tabindex="-1" aria-disabled="true"&gt;
        &lt;span class="material-icons"&gt;chevron_left&lt;/span&gt;
    &lt;/a&gt;
&lt;/li&gt;</code></pre>
                        </div>
                    </div>
                </div>

            </div>

<script>
// Pagination demo functions
function demoPaginationFirst() {
    const pagination = SOPagination.getInstance(document.querySelector('#demo-pagination'));
    if (pagination) pagination.firstPage();
}

function demoPaginationPrev() {
    const pagination = SOPagination.getInstance(document.querySelector('#demo-pagination'));
    if (pagination) pagination.prevPage();
}

function demoPaginationNext() {
    const pagination = SOPagination.getInstance(document.querySelector('#demo-pagination'));
    if (pagination) pagination.nextPage();
}

function demoPaginationLast() {
    const pagination = SOPagination.getInstance(document.querySelector('#demo-pagination'));
    if (pagination) pagination.lastPage();
}

function demoPaginationGoTo(page) {
    const pagination = SOPagination.getInstance(document.querySelector('#demo-pagination'));
    if (pagination) pagination.goToPage(page);
}

function demoPaginationGetInfo() {
    const pagination = SOPagination.getInstance(document.querySelector('#demo-pagination'));
    if (pagination) {
        const range = pagination.getPageRange();
        const info = `Current Page: ${pagination.getCurrentPage()}\nTotal Pages: ${pagination.getTotalPages()}\nShowing: ${range.start}-${range.end} of ${range.total}`;
        alert(info);
    }
}
</script>

    </div>
</main>

<?php
require_once '../includes/footer.php';
?>
