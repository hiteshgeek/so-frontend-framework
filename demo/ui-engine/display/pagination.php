<?php
/**
 * SixOrbit UI Engine - Pagination Element Demo
 */

$pageTitle = 'Pagination - UI Engine';
$pageDescription = 'Navigation for multi-page content';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Pagination</h1>
            <p class="so-page-subtitle">Navigation component for multi-page content with customizable appearance.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Pagination -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Pagination</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-mb-4">
                    <nav class="so-pagination">
                        <ul class="so-pagination-nav">
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
                        </ul>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-pagination', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$pagination = UiEngine::pagination()
    ->total(100)        // Total items
    ->perPage(10)       // Items per page
    ->currentPage(3);   // Current page

echo \$pagination->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const pagination = UiEngine.pagination()
    .total(100)
    .perPage(10)
    .currentPage(3)
    .onChange((page) => {
        loadPage(page);
    });

document.getElementById('container').innerHTML = pagination.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<nav class="so-pagination">
    <ul class="so-pagination-nav">
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
    </ul>
</nav>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With First/Last Icons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-mb-4">
                    <nav class="so-pagination">
                        <ul class="so-pagination-nav">
                            <li class="so-page-item">
                                <a class="so-page-link" href="#"><span class="material-icons">first_page</span></a>
                            </li>
                            <li class="so-page-item">
                                <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
                            </li>
                            <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                            <li class="so-page-item">
                                <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
                            </li>
                            <li class="so-page-item">
                                <a class="so-page-link" href="#"><span class="material-icons">last_page</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('pagination-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$pagination = UiEngine::pagination()
    ->total(50)
    ->perPage(10)
    ->currentPage(2)
    ->useIcons()           // Use icons instead of text
    ->showFirstLast();     // Show first/last page buttons

echo \$pagination->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const pagination = UiEngine.pagination()
    .total(50)
    .perPage(10)
    .currentPage(2)
    .useIcons()
    .showFirstLast();

document.getElementById('container').innerHTML = pagination.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<nav class="so-pagination">
    <ul class="so-pagination-nav">
        <li class="so-page-item">
            <a class="so-page-link" href="#"><span class="material-icons">first_page</span></a>
        </li>
        <li class="so-page-item">
            <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
        </li>
        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
        <li class="so-page-item">
            <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
        </li>
        <li class="so-page-item">
            <a class="so-page-link" href="#"><span class="material-icons">last_page</span></a>
        </li>
    </ul>
</nav>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Pagination Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Pagination Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-mb-4">
                    <p class="so-text-muted so-mb-2">Small</p>
                    <nav class="so-pagination so-pagination-sm so-mb-3">
                        <ul class="so-pagination-nav">
                            <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                        </ul>
                    </nav>

                    <p class="so-text-muted so-mb-2">Default</p>
                    <nav class="so-pagination so-mb-3">
                        <ul class="so-pagination-nav">
                            <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                        </ul>
                    </nav>

                    <p class="so-text-muted so-mb-2">Large</p>
                    <nav class="so-pagination so-pagination-lg">
                        <ul class="so-pagination-nav">
                            <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                        </ul>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('pagination-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small pagination
UiEngine::pagination()->total(30)->perPage(10)->size('sm');

// Default pagination
UiEngine::pagination()->total(30)->perPage(10);

// Large pagination
UiEngine::pagination()->total(30)->perPage(10)->size('lg');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small pagination
UiEngine.pagination().total(30).perPage(10).size('sm');

// Default pagination
UiEngine.pagination().total(30).perPage(10);

// Large pagination
UiEngine.pagination().total(30).perPage(10).size('lg');"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Small -->
<nav class="so-pagination so-pagination-sm">
    <ul class="so-pagination-nav">
        <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
        <li class="so-page-item so-active"><a class="so-page-link" href="#">2</a></li>
        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
    </ul>
</nav>

<!-- Default -->
<nav class="so-pagination">
    <ul class="so-pagination-nav">...</ul>
</nav>

<!-- Large -->
<nav class="so-pagination so-pagination-lg">
    <ul class="so-pagination-nav">...</ul>
</nav>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Disabled States -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Disabled States</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Use <code>so-disabled</code> class to disable navigation items.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <nav class="so-pagination">
                        <ul class="so-pagination-nav">
                            <li class="so-page-item so-disabled">
                                <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
                            </li>
                            <li class="so-page-item so-active"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                            <li class="so-page-item">
                                <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('pagination-disabled', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// First page - previous is disabled
\$pagination = UiEngine::pagination()
    ->total(50)
    ->perPage(10)
    ->currentPage(1);  // On first page, prev is auto-disabled

echo \$pagination->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// First page - previous is disabled
const pagination = UiEngine.pagination()
    .total(50)
    .perPage(10)
    .currentPage(1);

document.getElementById('container').innerHTML = pagination.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<nav class="so-pagination">
    <ul class="so-pagination-nav">
        <li class="so-page-item so-disabled">
            <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
        </li>
        <li class="so-page-item so-active"><a class="so-page-link" href="#">1</a></li>
        <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
        <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
        <li class="so-page-item">
            <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
        </li>
    </ul>
</nav>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Page Info -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Page Info</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Show page info and per-page selector alongside pagination.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <div class="so-d-flex so-justify-content-between so-align-items-center so-flex-wrap so-gap-3">
                        <div class="so-text-muted">
                            Showing <strong>41</strong> to <strong>50</strong> of <strong>150</strong> entries
                        </div>
                        <nav class="so-pagination">
                            <ul class="so-pagination-nav">
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
                                </li>
                                <li class="so-page-item"><a class="so-page-link" href="#">4</a></li>
                                <li class="so-page-item so-active"><a class="so-page-link" href="#">5</a></li>
                                <li class="so-page-item"><a class="so-page-link" href="#">6</a></li>
                                <li class="so-page-item">
                                    <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('pagination-info', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$pagination = UiEngine::pagination()
    ->total(150)
    ->perPage(10)
    ->currentPage(5)
    ->showInfo()  // Shows \"Showing 41-50 of 150\"
    ->showPerPageSelect([10, 25, 50, 100]);

echo \$pagination->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const pagination = UiEngine.pagination()
    .total(150)
    .perPage(10)
    .currentPage(5)
    .showInfo()
    .showPerPageSelect([10, 25, 50, 100])
    .onPerPageChange((perPage) => {
        loadData(1, perPage);
    });

document.getElementById('container').innerHTML = pagination.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-d-flex so-justify-content-between so-align-items-center">
    <div class="so-text-muted">
        Showing <strong>41</strong> to <strong>50</strong> of <strong>150</strong> entries
    </div>
    <nav class="so-pagination">
        <ul class="so-pagination-nav">
            <li class="so-page-item">
                <a class="so-page-link" href="#"><span class="material-icons">chevron_left</span></a>
            </li>
            <li class="so-page-item"><a class="so-page-link" href="#">4</a></li>
            <li class="so-page-item so-active"><a class="so-page-link" href="#">5</a></li>
            <li class="so-page-item"><a class="so-page-link" href="#">6</a></li>
            <li class="so-page-item">
                <a class="so-page-link" href="#"><span class="material-icons">chevron_right</span></a>
            </li>
        </ul>
    </nav>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Simple Pagination -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Simple Pagination</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Simple previous/next navigation without page numbers.</p>

                <!-- Live Demo -->
                <div class="so-mb-4">
                    <nav class="so-pagination">
                        <ul class="so-pagination-nav">
                            <li class="so-page-item">
                                <a class="so-page-link" href="#">
                                    <span class="material-icons">chevron_left</span> Previous
                                </a>
                            </li>
                            <li class="so-page-item">
                                <a class="so-page-link" href="#">
                                    Next <span class="material-icons">chevron_right</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('pagination-simple', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Simple prev/next pagination
\$pagination = UiEngine::pagination()
    ->simple()          // Only shows prev/next
    ->currentPage(5)
    ->hasMore(true);    // Whether there's a next page

echo \$pagination->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Simple prev/next pagination
const pagination = UiEngine.pagination()
    .simple()
    .currentPage(5)
    .hasMore(true);

document.getElementById('container').innerHTML = pagination.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<nav class="so-pagination">
    <ul class="so-pagination-nav">
        <li class="so-page-item">
            <a class="so-page-link" href="#">
                <span class="material-icons">chevron_left</span> Previous
            </a>
        </li>
        <li class="so-page-item">
            <a class="so-page-link" href="#">
                Next <span class="material-icons">chevron_right</span>
            </a>
        </li>
    </ul>
</nav>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- API Reference -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">API Reference</h3>
            </div>
            <div class="so-card-body">
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead class="so-table-light">
                            <tr>
                                <th>Method</th>
                                <th>Parameters</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>total()</code></td>
                                <td><code>int $total</code></td>
                                <td>Set total items</td>
                            </tr>
                            <tr>
                                <td><code>perPage()</code></td>
                                <td><code>int $perPage</code></td>
                                <td>Set items per page</td>
                            </tr>
                            <tr>
                                <td><code>currentPage()</code></td>
                                <td><code>int $page</code></td>
                                <td>Set current page</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: sm, lg</td>
                            </tr>
                            <tr>
                                <td><code>useIcons()</code></td>
                                <td>-</td>
                                <td>Use icons for prev/next</td>
                            </tr>
                            <tr>
                                <td><code>showFirstLast()</code></td>
                                <td>-</td>
                                <td>Show first/last page buttons</td>
                            </tr>
                            <tr>
                                <td><code>simple()</code></td>
                                <td>-</td>
                                <td>Simple prev/next only</td>
                            </tr>
                            <tr>
                                <td><code>showInfo()</code></td>
                                <td>-</td>
                                <td>Show "Showing X-Y of Z"</td>
                            </tr>
                            <tr>
                                <td><code>onChange()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Page change callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="so-mt-4 so-mb-3">HTML Structure</h5>
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead class="so-table-light">
                            <tr>
                                <th>Class</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>so-pagination</code></td>
                                <td>Container nav element</td>
                            </tr>
                            <tr>
                                <td><code>so-pagination-nav</code></td>
                                <td>Inner ul element</td>
                            </tr>
                            <tr>
                                <td><code>so-page-item</code></td>
                                <td>List item wrapper</td>
                            </tr>
                            <tr>
                                <td><code>so-page-link</code></td>
                                <td>Clickable link element</td>
                            </tr>
                            <tr>
                                <td><code>so-active</code></td>
                                <td>Active/current page state</td>
                            </tr>
                            <tr>
                                <td><code>so-disabled</code></td>
                                <td>Disabled state</td>
                            </tr>
                            <tr>
                                <td><code>so-pagination-sm</code></td>
                                <td>Small size modifier</td>
                            </tr>
                            <tr>
                                <td><code>so-pagination-lg</code></td>
                                <td>Large size modifier</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
