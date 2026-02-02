<?php
/**
 * SixOrbit UI Engine - Skeleton Element Demo
 */

$pageTitle = 'Skeleton - UI Engine';
$pageDescription = 'Placeholder loading states for content';

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
                <li class="so-breadcrumb-item so-active">Skeleton</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">hourglass_empty</span>
            Skeleton
        </h1>
        <p class="so-page-subtitle">Placeholder loading states that mimic the structure of content being loaded.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Skeleton -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Skeleton</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-placeholder-glow">
                        <span class="so-placeholder so-col-12"></span>
                        <span class="so-placeholder so-col-10"></span>
                        <span class="so-placeholder so-col-8"></span>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-skeleton', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

// Basic text skeleton
echo UiEngine::skeleton()->lines(3);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Basic text skeleton
UiEngine.skeleton().lines(3).toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-placeholder-glow">
    <span class="so-placeholder so-col-12"></span>
    <span class="so-placeholder so-col-10"></span>
    <span class="so-placeholder so-col-8"></span>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Skeleton Shapes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Skeleton Shapes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-4 so-align-items-start">
                        <div class="so-placeholder-glow">
                            <div class="so-placeholder so-rounded-circle" style="width:64px;height:64px;"></div>
                        </div>
                        <div class="so-placeholder-glow">
                            <div class="so-placeholder so-rounded" style="width:150px;height:100px;"></div>
                        </div>
                        <div class="so-placeholder-glow so-flex-grow-1">
                            <span class="so-placeholder so-col-7 so-mb-2"></span>
                            <span class="so-placeholder so-col-4 so-mb-2"></span>
                            <span class="so-placeholder so-col-8"></span>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('skeleton-shapes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Circle (avatar)
UiEngine::skeleton()->circle(64); // 64px diameter

// Rectangle (image)
UiEngine::skeleton()->rectangle(150, 100); // width, height

// Text lines
UiEngine::skeleton()->lines(3);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Circle (avatar)
UiEngine.skeleton().circle(64).toHtml();

// Rectangle (image)
UiEngine.skeleton().rectangle(150, 100).toHtml();

// Text lines
UiEngine.skeleton().lines(3).toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Animation Types -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Animation Types</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-row">
                        <div class="so-col-md-6 so-mb-3">
                            <p class="so-small so-text-muted so-mb-2">Glow Animation</p>
                            <div class="so-placeholder-glow">
                                <span class="so-placeholder so-col-12"></span>
                            </div>
                        </div>
                        <div class="so-col-md-6 so-mb-3">
                            <p class="so-small so-text-muted so-mb-2">Wave Animation</p>
                            <div class="so-placeholder-wave">
                                <span class="so-placeholder so-col-12"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('skeleton-animation', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Glow animation (default)
UiEngine::skeleton()->animation('glow')->lines(2);

// Wave animation
UiEngine::skeleton()->animation('wave')->lines(2);

// No animation
UiEngine::skeleton()->animation('none')->lines(2);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Glow animation (default)
UiEngine.skeleton().animation('glow').lines(2).toHtml();

// Wave animation
UiEngine.skeleton().animation('wave').lines(2).toHtml();

// No animation
UiEngine.skeleton().animation('none').lines(2).toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Card Skeleton -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Card Skeleton</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-card" style="max-width:300px;">
                        <div class="so-placeholder-glow">
                            <div class="so-placeholder" style="height:150px;width:100%;"></div>
                        </div>
                        <div class="so-card-body">
                            <div class="so-placeholder-glow">
                                <span class="so-placeholder so-col-7 so-mb-2"></span>
                                <span class="so-placeholder so-col-12 so-mb-2"></span>
                                <span class="so-placeholder so-col-10 so-mb-3"></span>
                                <span class="so-placeholder so-col-4 so-btn so-btn-primary"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('skeleton-card', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Pre-built card skeleton
UiEngine::skeleton()->card([
    'image' => true,        // Include image placeholder
    'imageHeight' => 150,
    'title' => true,
    'lines' => 2,
    'button' => true,
]);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Pre-built card skeleton
UiEngine.skeleton().card({
    image: true,
    imageHeight: 150,
    title: true,
    lines: 2,
    button: true,
}).toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- List Skeleton -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">List Skeleton</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-list-group" style="max-width:400px;">
                        <?php for ($i = 0; $i < 3; $i++): ?>
                        <div class="so-list-group-item">
                            <div class="so-d-flex so-align-items-center">
                                <div class="so-placeholder-glow so-me-3">
                                    <div class="so-placeholder so-rounded-circle" style="width:40px;height:40px;"></div>
                                </div>
                                <div class="so-placeholder-glow so-flex-grow-1">
                                    <span class="so-placeholder so-col-6 so-mb-1"></span>
                                    <span class="so-placeholder so-col-4"></span>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('skeleton-list', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Pre-built list skeleton
UiEngine::skeleton()->list([
    'items' => 3,
    'avatar' => true,
    'lines' => 2,
]);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Pre-built list skeleton
UiEngine.skeleton().list({
    items: 3,
    avatar: true,
    lines: 2,
}).toHtml();"
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
                                <td><code>lines()</code></td>
                                <td><code>int $count</code></td>
                                <td>Create text line placeholders</td>
                            </tr>
                            <tr>
                                <td><code>circle()</code></td>
                                <td><code>int $size</code></td>
                                <td>Create circular placeholder</td>
                            </tr>
                            <tr>
                                <td><code>rectangle()</code></td>
                                <td><code>int $width, int $height</code></td>
                                <td>Create rectangular placeholder</td>
                            </tr>
                            <tr>
                                <td><code>animation()</code></td>
                                <td><code>string $type</code></td>
                                <td>Set animation: glow, wave, none</td>
                            </tr>
                            <tr>
                                <td><code>card()</code></td>
                                <td><code>array $options</code></td>
                                <td>Create card skeleton template</td>
                            </tr>
                            <tr>
                                <td><code>list()</code></td>
                                <td><code>array $options</code></td>
                                <td>Create list skeleton template</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
