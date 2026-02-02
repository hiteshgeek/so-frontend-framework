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
        <nav aria-label="breadcrumb">
            <ol class="so-breadcrumb">
                <li class="so-breadcrumb-item"><a href="../index.php">UI Engine</a></li>
                <li class="so-breadcrumb-item"><a href="../index.php#display">Display Elements</a></li>
                <li class="so-breadcrumb-item so-active">Pagination</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">last_page</span>
            Pagination
        </h1>
        <p class="so-page-subtitle">Navigation component for multi-page content with customizable appearance.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Pagination -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Pagination</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <nav aria-label="Page navigation">
                        <ul class="so-pagination">
                            <li class="so-page-item"><a class="so-page-link" href="#">Previous</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">2</a></li>
                            <li class="so-page-item active"><a class="so-page-link" href="#">3</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">4</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">5</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">Next</a></li>
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
                ]) ?>
            </div>
        </div>

        <!-- With Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Icons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <nav aria-label="Page navigation">
                        <ul class="so-pagination">
                            <li class="so-page-item">
                                <a class="so-page-link" href="#">
                                    <span class="material-icons" style="font-size:18px;">first_page</span>
                                </a>
                            </li>
                            <li class="so-page-item">
                                <a class="so-page-link" href="#">
                                    <span class="material-icons" style="font-size:18px;">chevron_left</span>
                                </a>
                            </li>
                            <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item active"><a class="so-page-link" href="#">2</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                            <li class="so-page-item">
                                <a class="so-page-link" href="#">
                                    <span class="material-icons" style="font-size:18px;">chevron_right</span>
                                </a>
                            </li>
                            <li class="so-page-item">
                                <a class="so-page-link" href="#">
                                    <span class="material-icons" style="font-size:18px;">last_page</span>
                                </a>
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
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <nav class="so-mb-3">
                        <ul class="so-pagination so-pagination-sm">
                            <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item active"><a class="so-page-link" href="#">2</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                        </ul>
                    </nav>
                    <nav class="so-mb-3">
                        <ul class="so-pagination">
                            <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item active"><a class="so-page-link" href="#">2</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">3</a></li>
                        </ul>
                    </nav>
                    <nav>
                        <ul class="so-pagination so-pagination-lg">
                            <li class="so-page-item"><a class="so-page-link" href="#">1</a></li>
                            <li class="so-page-item active"><a class="so-page-link" href="#">2</a></li>
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
                ]) ?>
            </div>
        </div>

        <!-- With Page Info -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Page Info</h3>
            </div>
            <div class="so-card-body">
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
                ]) ?>
            </div>
        </div>

        <!-- Simple Pagination -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Simple Pagination</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <nav aria-label="Page navigation">
                        <ul class="so-pagination">
                            <li class="so-page-item"><a class="so-page-link" href="#">Previous</a></li>
                            <li class="so-page-item"><a class="so-page-link" href="#">Next</a></li>
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
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
