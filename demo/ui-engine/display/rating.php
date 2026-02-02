<?php
/**
 * SixOrbit UI Engine - Rating Element Demo
 */

$pageTitle = 'Rating - UI Engine';
$pageDescription = 'Star rating input and display';

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
                <li class="so-breadcrumb-item so-active">Rating</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">star</span>
            Rating
        </h1>
        <p class="so-page-subtitle">Star-based rating component for input and display, with customizable appearance.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Rating -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Rating</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-1">
                        <span class="material-icons so-text-warning">star</span>
                        <span class="material-icons so-text-warning">star</span>
                        <span class="material-icons so-text-warning">star</span>
                        <span class="material-icons so-text-warning">star</span>
                        <span class="material-icons so-text-muted">star_border</span>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-rating', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

// Display rating (read-only)
\$rating = UiEngine::rating(4); // 4 out of 5 stars

echo \$rating->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Display rating (read-only)
const rating = UiEngine.rating(4); // 4 out of 5 stars

document.getElementById('container').innerHTML = rating.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-rating" data-value="4">
    <span class="material-icons so-text-warning">star</span>
    <span class="material-icons so-text-warning">star</span>
    <span class="material-icons so-text-warning">star</span>
    <span class="material-icons so-text-warning">star</span>
    <span class="material-icons so-text-muted">star_border</span>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Interactive Rating -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Interactive Rating (Input)</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('rating-input', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Interactive rating input
\$rating = UiEngine::rating('product_rating')
    ->editable()
    ->value(3)
    ->label('Rate this product');

echo \$rating->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Interactive rating input
const rating = UiEngine.rating('product_rating')
    .editable()
    .value(3)
    .label('Rate this product')
    .onChange((value) => {
        console.log('New rating:', value);
    });

document.getElementById('container').innerHTML = rating.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Half Stars -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Half Stars</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-1 so-align-items-center">
                        <span class="material-icons so-text-warning">star</span>
                        <span class="material-icons so-text-warning">star</span>
                        <span class="material-icons so-text-warning">star</span>
                        <span class="material-icons so-text-warning">star_half</span>
                        <span class="material-icons so-text-muted">star_border</span>
                        <span class="so-ms-2 so-text-muted">(3.5)</span>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('rating-half', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Half star rating
\$rating = UiEngine::rating(3.5)
    ->allowHalf()
    ->showValue();

echo \$rating->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Half star rating
const rating = UiEngine.rating(3.5)
    .allowHalf()
    .showValue();

document.getElementById('container').innerHTML = rating.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Rating Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Rating Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-mb-3">
                        <small class="so-text-muted">Small</small>
                        <div class="so-d-flex so-gap-1" style="font-size:16px;">
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-muted">star_border</span>
                        </div>
                    </div>
                    <div class="so-mb-3">
                        <small class="so-text-muted">Default</small>
                        <div class="so-d-flex so-gap-1" style="font-size:24px;">
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-muted">star_border</span>
                        </div>
                    </div>
                    <div>
                        <small class="so-text-muted">Large</small>
                        <div class="so-d-flex so-gap-1" style="font-size:32px;">
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-warning">star</span>
                            <span class="material-icons so-text-muted">star_border</span>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('rating-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::rating(4)->size('sm');  // Small
UiEngine::rating(4);               // Default
UiEngine::rating(4)->size('lg');  // Large"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.rating(4).size('sm').toHtml();  // Small
UiEngine.rating(4).toHtml();               // Default
UiEngine.rating(4).size('lg').toHtml();  // Large"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Custom Max and Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Custom Options</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('rating-custom', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Custom max value (10 stars)
UiEngine::rating(7)->max(10);

// Custom icons
UiEngine::rating(3)
    ->icon('favorite', 'favorite_border')  // filled, empty
    ->color('danger');

// With count
UiEngine::rating(4.2)
    ->allowHalf()
    ->showValue()
    ->count(128); // Shows \"4.2 (128 reviews)\""
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Custom max value (10 stars)
UiEngine.rating(7).max(10).toHtml();

// Custom icons (hearts)
UiEngine.rating(3)
    .icon('favorite', 'favorite_border')
    .color('danger')
    .toHtml();

// With count
UiEngine.rating(4.2)
    .allowHalf()
    .showValue()
    .count(128) // Shows \"4.2 (128 reviews)\"
    .toHtml();"
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
                                <td><code>float $value</code></td>
                                <td>Set rating value</td>
                            </tr>
                            <tr>
                                <td><code>max()</code></td>
                                <td><code>int $max</code></td>
                                <td>Set maximum stars (default: 5)</td>
                            </tr>
                            <tr>
                                <td><code>editable()</code></td>
                                <td>-</td>
                                <td>Make rating interactive</td>
                            </tr>
                            <tr>
                                <td><code>allowHalf()</code></td>
                                <td>-</td>
                                <td>Allow half-star values</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: sm, lg</td>
                            </tr>
                            <tr>
                                <td><code>color()</code></td>
                                <td><code>string $color</code></td>
                                <td>Set star color</td>
                            </tr>
                            <tr>
                                <td><code>icon()</code></td>
                                <td><code>string $filled, string $empty</code></td>
                                <td>Set custom icons</td>
                            </tr>
                            <tr>
                                <td><code>showValue()</code></td>
                                <td>-</td>
                                <td>Show numeric value</td>
                            </tr>
                            <tr>
                                <td><code>count()</code></td>
                                <td><code>int $count</code></td>
                                <td>Show review count</td>
                            </tr>
                            <tr>
                                <td><code>onChange()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Value change callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
