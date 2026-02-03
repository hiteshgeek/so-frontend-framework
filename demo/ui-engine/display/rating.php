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
        <div class="so-page-header-left">
            <h1 class="so-page-title">Rating</h1>
            <p class="so-page-subtitle">Star-based rating component for input and display, with customizable appearance.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Rating -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Rating</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-d-flex so-gap-1 so-mb-4">
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-muted">star_border</span>
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
                <!-- Live Demo -->
                <div class="so-mb-4">
                    <label class="so-form-label so-mb-2">Rate this product</label>
                    <div class="so-rating so-rating-editable so-d-flex so-gap-1" id="interactive-rating-demo" style="cursor:pointer;">
                        <span class="material-icons so-text-warning" data-value="1">star</span>
                        <span class="material-icons so-text-warning" data-value="2">star</span>
                        <span class="material-icons so-text-warning" data-value="3">star</span>
                        <span class="material-icons so-text-muted" data-value="4">star_border</span>
                        <span class="material-icons so-text-muted" data-value="5">star_border</span>
                    </div>
                    <input type="hidden" id="interactive-rating-value" value="3">
                    <p class="so-text-muted so-small so-mt-2">Current rating: <span id="rating-display">3</span> stars</p>
                </div>

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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<label class="so-form-label">Rate this product</label>
<div class="so-rating so-rating-editable" data-so-rating>
    <input type="hidden" name="product_rating" value="3">
    <span class="material-icons so-text-warning" data-value="1">star</span>
    <span class="material-icons so-text-warning" data-value="2">star</span>
    <span class="material-icons so-text-warning" data-value="3">star</span>
    <span class="material-icons so-text-muted" data-value="4">star_border</span>
    <span class="material-icons so-text-muted" data-value="5">star_border</span>
</div>'
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
                <div class="so-d-flex so-gap-1 so-align-items-center so-mb-4">
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star_half</span>
                    <span class="material-icons so-text-muted">star_border</span>
                    <span class="so-ms-2 so-text-muted">(3.5)</span>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-rating so-d-flex so-gap-1 so-align-items-center">
    <span class="material-icons so-text-warning">star</span>
    <span class="material-icons so-text-warning">star</span>
    <span class="material-icons so-text-warning">star</span>
    <span class="material-icons so-text-warning">star_half</span>
    <span class="material-icons so-text-muted">star_border</span>
    <span class="so-ms-2 so-text-muted">(3.5)</span>
</div>'
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
                <div class="so-mb-4">
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Small -->
<div class="so-rating so-rating-sm">...</div>

<!-- Default -->
<div class="so-rating">...</div>

<!-- Large -->
<div class="so-rating so-rating-lg">...</div>'
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
                <!-- Live Demo - Custom Icons (Hearts) -->
                <p class="so-text-muted so-mb-2">Custom Icons (Hearts)</p>
                <div class="so-d-flex so-gap-1 so-mb-3">
                    <span class="material-icons so-text-danger">favorite</span>
                    <span class="material-icons so-text-danger">favorite</span>
                    <span class="material-icons so-text-danger">favorite</span>
                    <span class="material-icons so-text-muted">favorite_border</span>
                    <span class="material-icons so-text-muted">favorite_border</span>
                </div>

                <!-- Live Demo - With Count -->
                <p class="so-text-muted so-mb-2">With Review Count</p>
                <div class="so-d-flex so-gap-1 so-align-items-center so-mb-4">
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star</span>
                    <span class="material-icons so-text-warning">star_half</span>
                    <span class="so-ms-2">4.2</span>
                    <span class="so-text-muted">(128 reviews)</span>
                </div>

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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Custom icons (hearts) -->
<div class="so-rating so-rating-danger">
    <span class="material-icons so-text-danger">favorite</span>
    <span class="material-icons so-text-danger">favorite</span>
    <span class="material-icons so-text-danger">favorite</span>
    <span class="material-icons so-text-muted">favorite_border</span>
    <span class="material-icons so-text-muted">favorite_border</span>
</div>

<!-- With review count -->
<div class="so-rating so-d-flex so-align-items-center">
    <!-- stars -->
    <span class="so-rating-value">4.2</span>
    <span class="so-rating-count">(128 reviews)</span>
</div>'
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ratingContainer = document.getElementById('interactive-rating-demo');
    const ratingValue = document.getElementById('interactive-rating-value');
    const ratingDisplay = document.getElementById('rating-display');

    if (ratingContainer) {
        const stars = ratingContainer.querySelectorAll('[data-value]');

        // Update star display based on value
        function updateStars(value) {
            stars.forEach(star => {
                const starValue = parseInt(star.getAttribute('data-value'));
                if (starValue <= value) {
                    star.textContent = 'star';
                    star.classList.remove('so-text-muted');
                    star.classList.add('so-text-warning');
                } else {
                    star.textContent = 'star_border';
                    star.classList.remove('so-text-warning');
                    star.classList.add('so-text-muted');
                }
            });
        }

        // Click handler
        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = parseInt(this.getAttribute('data-value'));
                ratingValue.value = value;
                ratingDisplay.textContent = value;
                updateStars(value);
            });

            // Hover preview
            star.addEventListener('mouseenter', function() {
                const value = parseInt(this.getAttribute('data-value'));
                updateStars(value);
            });
        });

        // Reset to actual value on mouse leave
        ratingContainer.addEventListener('mouseleave', function() {
            updateStars(parseInt(ratingValue.value));
        });
    }
});
</script>

<?php require_once '../../includes/footer.php'; ?>
