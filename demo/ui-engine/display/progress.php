<?php
/**
 * SixOrbit UI Engine - Progress Element Demo
 */

$pageTitle = 'Progress - UI Engine';
$pageDescription = 'Progress bars for displaying completion status';

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
                <li class="so-breadcrumb-item so-active">Progress</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">donut_large</span>
            Progress
        </h1>
        <p class="so-page-subtitle">Progress bars for displaying completion status, loading states, and workflow steps.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Progress -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Progress</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-progress so-mb-3">
                        <div class="so-progress-bar" role="progressbar" style="width: 25%"></div>
                    </div>
                    <div class="so-progress so-mb-3">
                        <div class="so-progress-bar" role="progressbar" style="width: 50%"></div>
                    </div>
                    <div class="so-progress so-mb-3">
                        <div class="so-progress-bar" role="progressbar" style="width: 75%"></div>
                    </div>
                    <div class="so-progress">
                        <div class="so-progress-bar" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-progress', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

echo UiEngine::progress(25);
echo UiEngine::progress(50);
echo UiEngine::progress(75);
echo UiEngine::progress(100);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(25).toHtml();
UiEngine.progress(50).toHtml();
UiEngine.progress(75).toHtml();
UiEngine.progress(100).toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Labels -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Labels</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-progress so-mb-3" style="height: 20px;">
                        <div class="so-progress-bar" role="progressbar" style="width: 25%">25%</div>
                    </div>
                    <div class="so-progress" style="height: 20px;">
                        <div class="so-progress-bar so-bg-success" role="progressbar" style="width: 75%">75% Complete</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-labels', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::progress(25)->label(); // Shows percentage
UiEngine::progress(75)->label('Complete')->variant('success');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(25).label().toHtml();
UiEngine.progress(75).label('Complete').variant('success').toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Color Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Color Variants</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-progress so-mb-2">
                        <div class="so-progress-bar so-bg-success" style="width: 25%"></div>
                    </div>
                    <div class="so-progress so-mb-2">
                        <div class="so-progress-bar so-bg-info" style="width: 50%"></div>
                    </div>
                    <div class="so-progress so-mb-2">
                        <div class="so-progress-bar so-bg-warning" style="width: 75%"></div>
                    </div>
                    <div class="so-progress">
                        <div class="so-progress-bar so-bg-danger" style="width: 100%"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-colors', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::progress(25)->variant('success');
UiEngine::progress(50)->variant('info');
UiEngine::progress(75)->variant('warning');
UiEngine::progress(100)->variant('danger');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(25).variant('success').toHtml();
UiEngine.progress(50).variant('info').toHtml();
UiEngine.progress(75).variant('warning').toHtml();
UiEngine.progress(100).variant('danger').toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Striped and Animated -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Striped and Animated</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-progress so-mb-3">
                        <div class="so-progress-bar so-progress-bar-striped" style="width: 50%"></div>
                    </div>
                    <div class="so-progress">
                        <div class="so-progress-bar so-progress-bar-striped so-progress-bar-animated" style="width: 75%"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-striped', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Striped progress bar
UiEngine::progress(50)->striped();

// Animated striped progress bar
UiEngine::progress(75)->striped()->animated();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Striped progress bar
UiEngine.progress(50).striped().toHtml();

// Animated striped progress bar
UiEngine.progress(75).striped().animated().toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Progress Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Progress Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-progress so-mb-3" style="height: 5px;">
                        <div class="so-progress-bar" style="width: 50%"></div>
                    </div>
                    <div class="so-progress so-mb-3" style="height: 15px;">
                        <div class="so-progress-bar" style="width: 50%"></div>
                    </div>
                    <div class="so-progress" style="height: 25px;">
                        <div class="so-progress-bar" style="width: 50%"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::progress(50)->height(5);   // Thin
UiEngine::progress(50)->height(15);  // Medium
UiEngine::progress(50)->height(25);  // Thick"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.progress(50).height(5).toHtml();
UiEngine.progress(50).height(15).toHtml();
UiEngine.progress(50).height(25).toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Multiple Bars -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Multiple Bars (Stacked)</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-progress">
                        <div class="so-progress-bar so-bg-success" style="width: 30%"></div>
                        <div class="so-progress-bar so-bg-warning" style="width: 20%"></div>
                        <div class="so-progress-bar so-bg-danger" style="width: 10%"></div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('progress-stacked', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$progress = UiEngine::progressStacked()
    ->bar(30, 'success')  // 30% success
    ->bar(20, 'warning')  // 20% warning
    ->bar(10, 'danger');  // 10% danger

echo \$progress->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const progress = UiEngine.progressStacked()
    .bar(30, 'success')
    .bar(20, 'warning')
    .bar(10, 'danger');

document.getElementById('container').innerHTML = progress.toHtml();"
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
                                <td><code>value()</code></td>
                                <td><code>int $percent</code></td>
                                <td>Set progress value (0-100)</td>
                            </tr>
                            <tr>
                                <td><code>variant()</code></td>
                                <td><code>string $variant</code></td>
                                <td>Set color: success, info, warning, danger</td>
                            </tr>
                            <tr>
                                <td><code>label()</code></td>
                                <td><code>string $suffix</code></td>
                                <td>Show percentage label</td>
                            </tr>
                            <tr>
                                <td><code>striped()</code></td>
                                <td>-</td>
                                <td>Use striped style</td>
                            </tr>
                            <tr>
                                <td><code>animated()</code></td>
                                <td>-</td>
                                <td>Animate the stripes</td>
                            </tr>
                            <tr>
                                <td><code>height()</code></td>
                                <td><code>int $pixels</code></td>
                                <td>Set height in pixels</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
