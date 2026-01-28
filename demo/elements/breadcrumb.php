<?php
/**
 * SixOrbit UI Demo - Breadcrumb
 */
$pageTitle = 'Breadcrumb';
$pageDescription = 'Breadcrumb navigation component';

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
            <h1 class="so-page-title">Breadcrumb</h1>
            <p class="so-page-subtitle">Breadcrumb navigation component</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">
<div class="so-grid so-grid-cols-1 so-gap-6">

        <!-- Basic Breadcrumb -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Breadcrumb</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Simple navigation breadcrumb with default slash divider.</p>

                <nav aria-label="breadcrumb" class="so-mb-4">
                    <ol class="so-breadcrumb">
                        <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                        <li class="so-breadcrumb-item"><a href="#">Library</a></li>
                        <li class="so-breadcrumb-item so-active" aria-current="page">Data</li>
                    </ol>
                </nav>

                <nav aria-label="breadcrumb" class="so-mb-6">
                    <ol class="so-breadcrumb">
                        <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                        <li class="so-breadcrumb-item so-active" aria-current="page">Library</li>
                    </ol>
                </nav>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;nav aria-label="breadcrumb"&gt;
    &lt;ol class="so-breadcrumb"&gt;
        &lt;li class="so-breadcrumb-item"&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;
        &lt;li class="so-breadcrumb-item"&gt;&lt;a href="#"&gt;Library&lt;/a&gt;&lt;/li&gt;
        &lt;li class="so-breadcrumb-item so-active" aria-current="page"&gt;Data&lt;/li&gt;
    &lt;/ol&gt;
&lt;/nav&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Divider Variants -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Divider Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Different divider styles available.</p>

                <div class="so-grid so-grid-cols-1 so-gap-4 so-mb-6">
                    <div>
                        <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Slash (default)</label>
                        <nav aria-label="breadcrumb">
                            <ol class="so-breadcrumb so-breadcrumb-slash">
                                <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="so-breadcrumb-item"><a href="#">Products</a></li>
                                <li class="so-breadcrumb-item so-active">Details</li>
                            </ol>
                        </nav>
                    </div>

                    <div>
                        <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Chevron (.so-breadcrumb-chevron)</label>
                        <nav aria-label="breadcrumb">
                            <ol class="so-breadcrumb so-breadcrumb-chevron">
                                <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="so-breadcrumb-item"><a href="#">Products</a></li>
                                <li class="so-breadcrumb-item so-active">Details</li>
                            </ol>
                        </nav>
                    </div>

                    <div>
                        <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Arrow (.so-breadcrumb-arrow)</label>
                        <nav aria-label="breadcrumb">
                            <ol class="so-breadcrumb so-breadcrumb-arrow">
                                <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="so-breadcrumb-item"><a href="#">Products</a></li>
                                <li class="so-breadcrumb-item so-active">Details</li>
                            </ol>
                        </nav>
                    </div>

                    <div>
                        <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Pipe (.so-breadcrumb-pipe)</label>
                        <nav aria-label="breadcrumb">
                            <ol class="so-breadcrumb so-breadcrumb-pipe">
                                <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="so-breadcrumb-item"><a href="#">Products</a></li>
                                <li class="so-breadcrumb-item so-active">Details</li>
                            </ol>
                        </nav>
                    </div>

                    <div>
                        <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Dot (.so-breadcrumb-dot)</label>
                        <nav aria-label="breadcrumb">
                            <ol class="so-breadcrumb so-breadcrumb-dot">
                                <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="so-breadcrumb-item"><a href="#">Products</a></li>
                                <li class="so-breadcrumb-item so-active">Details</li>
                            </ol>
                        </nav>
                    </div>

                    <div>
                        <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Icon (.so-breadcrumb-icon)</label>
                        <nav aria-label="breadcrumb">
                            <ol class="so-breadcrumb so-breadcrumb-icon">
                                <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                                <li class="so-breadcrumb-item"><a href="#">Products</a></li>
                                <li class="so-breadcrumb-item so-active">Details</li>
                            </ol>
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
                    <pre class="so-code-content"><code class="language-html">&lt;ol class="so-breadcrumb so-breadcrumb-chevron"&gt;...&lt;/ol&gt;
&lt;ol class="so-breadcrumb so-breadcrumb-arrow"&gt;...&lt;/ol&gt;
&lt;ol class="so-breadcrumb so-breadcrumb-pipe"&gt;...&lt;/ol&gt;
&lt;ol class="so-breadcrumb so-breadcrumb-dot"&gt;...&lt;/ol&gt;
&lt;ol class="so-breadcrumb so-breadcrumb-icon"&gt;...&lt;/ol&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- With Icons -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">With Icons</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Add Material Icons to breadcrumb items.</p>

                <nav aria-label="breadcrumb" class="so-mb-4">
                    <ol class="so-breadcrumb so-breadcrumb-chevron">
                        <li class="so-breadcrumb-item">
                            <a href="#"><span class="material-icons">home</span> Home</a>
                        </li>
                        <li class="so-breadcrumb-item">
                            <a href="#"><span class="material-icons">folder</span> Projects</a>
                        </li>
                        <li class="so-breadcrumb-item so-active">
                            <span class="material-icons">description</span> Document
                        </li>
                    </ol>
                </nav>

                <nav aria-label="breadcrumb" class="so-mb-6">
                    <ol class="so-breadcrumb so-breadcrumb-arrow">
                        <li class="so-breadcrumb-item">
                            <a href="#"><span class="material-icons">home</span></a>
                        </li>
                        <li class="so-breadcrumb-item">
                            <a href="#">Settings</a>
                        </li>
                        <li class="so-breadcrumb-item so-active">Profile</li>
                    </ol>
                </nav>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;li class="so-breadcrumb-item"&gt;
    &lt;a href="#"&gt;&lt;span class="material-icons"&gt;home&lt;/span&gt; Home&lt;/a&gt;
&lt;/li&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Filled Background -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Filled Background</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Add a background with <code>.so-breadcrumb-filled</code>.</p>

                <nav aria-label="breadcrumb" class="so-mb-4">
                    <ol class="so-breadcrumb so-breadcrumb-filled so-breadcrumb-chevron">
                        <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                        <li class="so-breadcrumb-item"><a href="#">Category</a></li>
                        <li class="so-breadcrumb-item so-active">Current Page</li>
                    </ol>
                </nav>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;ol class="so-breadcrumb so-breadcrumb-filled"&gt;...&lt;/ol&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Color Variants -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Color Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Contextual color variants for breadcrumbs.</p>

                <div class="so-grid so-grid-cols-1 so-gap-3 so-mb-6">
                    <nav aria-label="breadcrumb">
                        <ol class="so-breadcrumb so-breadcrumb-primary so-breadcrumb-chevron">
                            <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                            <li class="so-breadcrumb-item"><a href="#">Library</a></li>
                            <li class="so-breadcrumb-item so-active">Primary</li>
                        </ol>
                    </nav>

                    <nav aria-label="breadcrumb">
                        <ol class="so-breadcrumb so-breadcrumb-success so-breadcrumb-chevron">
                            <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                            <li class="so-breadcrumb-item"><a href="#">Library</a></li>
                            <li class="so-breadcrumb-item so-active">Success</li>
                        </ol>
                    </nav>

                    <nav aria-label="breadcrumb">
                        <ol class="so-breadcrumb so-breadcrumb-danger so-breadcrumb-chevron">
                            <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                            <li class="so-breadcrumb-item"><a href="#">Library</a></li>
                            <li class="so-breadcrumb-item so-active">Danger</li>
                        </ol>
                    </nav>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;ol class="so-breadcrumb so-breadcrumb-primary"&gt;...&lt;/ol&gt;
&lt;ol class="so-breadcrumb so-breadcrumb-success"&gt;...&lt;/ol&gt;
&lt;ol class="so-breadcrumb so-breadcrumb-danger"&gt;...&lt;/ol&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Pill Style -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Pill Style</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Breadcrumb items as pills with <code>.so-breadcrumb-pills</code>.</p>

                <nav aria-label="breadcrumb" class="so-mb-6">
                    <ol class="so-breadcrumb so-breadcrumb-pills">
                        <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                        <li class="so-breadcrumb-item"><a href="#">Products</a></li>
                        <li class="so-breadcrumb-item"><a href="#">Electronics</a></li>
                        <li class="so-breadcrumb-item so-active">Smartphones</li>
                    </ol>
                </nav>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;ol class="so-breadcrumb so-breadcrumb-pills"&gt;
    &lt;li class="so-breadcrumb-item"&gt;&lt;a href="#"&gt;Home&lt;/a&gt;&lt;/li&gt;
    &lt;li class="so-breadcrumb-item"&gt;&lt;a href="#"&gt;Products&lt;/a&gt;&lt;/li&gt;
    &lt;li class="so-breadcrumb-item so-active"&gt;Current&lt;/li&gt;
&lt;/ol&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Size Variants -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Size Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Small and large breadcrumb sizes.</p>

                <div class="so-mb-4">
                    <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Small (.so-breadcrumb-sm)</label>
                    <nav aria-label="breadcrumb">
                        <ol class="so-breadcrumb so-breadcrumb-sm so-breadcrumb-chevron">
                            <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                            <li class="so-breadcrumb-item"><a href="#">Products</a></li>
                            <li class="so-breadcrumb-item so-active">Details</li>
                        </ol>
                    </nav>
                </div>

                <div class="so-mb-6">
                    <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Large (.so-breadcrumb-lg)</label>
                    <nav aria-label="breadcrumb">
                        <ol class="so-breadcrumb so-breadcrumb-lg so-breadcrumb-chevron">
                            <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                            <li class="so-breadcrumb-item"><a href="#">Products</a></li>
                            <li class="so-breadcrumb-item so-active">Details</li>
                        </ol>
                    </nav>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;ol class="so-breadcrumb so-breadcrumb-sm"&gt;...&lt;/ol&gt;
&lt;ol class="so-breadcrumb so-breadcrumb-lg"&gt;...&lt;/ol&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Truncated / Collapsed -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Truncated / Collapsed</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Use <code>.so-breadcrumb-truncate</code> for long paths or <code>.so-breadcrumb-collapse</code> for responsive collapse.</p>

                <div class="so-mb-4">
                    <label class="so-d-block so-mb-2 so-text-sm so-font-medium">Truncate long text</label>
                    <nav aria-label="breadcrumb" style="max-width: 400px;">
                        <ol class="so-breadcrumb so-breadcrumb-truncate so-breadcrumb-chevron">
                            <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                            <li class="so-breadcrumb-item"><a href="#">Very Long Category Name That Should Truncate</a></li>
                            <li class="so-breadcrumb-item so-active">Current Page With Long Name</li>
                        </ol>
                    </nav>
                </div>

                <div class="so-mb-6">
                    <label class="so-d-block so-mb-2 so-text-sm so-font-medium">With ellipsis (collapsed)</label>
                    <nav aria-label="breadcrumb">
                        <ol class="so-breadcrumb so-breadcrumb-chevron">
                            <li class="so-breadcrumb-item"><a href="#">Home</a></li>
                            <li class="so-breadcrumb-item so-breadcrumb-ellipsis"><a href="#">...</a></li>
                            <li class="so-breadcrumb-item"><a href="#">Parent</a></li>
                            <li class="so-breadcrumb-item so-active">Current</li>
                        </ol>
                    </nav>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;!-- Truncate long text --&gt;
&lt;ol class="so-breadcrumb so-breadcrumb-truncate"&gt;...&lt;/ol&gt;

&lt;!-- With ellipsis --&gt;
&lt;li class="so-breadcrumb-item so-breadcrumb-ellipsis"&gt;
    &lt;a href="#"&gt;...&lt;/a&gt;
&lt;/li&gt;</code></pre>
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
                                <td><code>.so-breadcrumb</code></td>
                                <td>Base breadcrumb container</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-item</code></td>
                                <td>Individual breadcrumb item</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-slash</code></td>
                                <td>Slash divider (default)</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-chevron</code></td>
                                <td>Chevron divider</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-arrow</code></td>
                                <td>Arrow divider</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-pipe</code></td>
                                <td>Pipe divider</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-dot</code></td>
                                <td>Dot divider</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-icon</code></td>
                                <td>Material icon divider</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-filled</code></td>
                                <td>Background and border</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-pills</code></td>
                                <td>Pill style items</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-{color}</code></td>
                                <td>Color variants</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-sm / .so-breadcrumb-lg</code></td>
                                <td>Size variants</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-truncate</code></td>
                                <td>Truncate long text</td>
                            </tr>
                            <tr>
                                <td><code>.so-breadcrumb-ellipsis</code></td>
                                <td>Collapsed middle items</td>
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
