<?php
/**
 * SixOrbit UI Demo - Rating
 */
$pageTitle = 'Rating';
$pageDescription = 'Star rating components for user feedback and reviews.';

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
            <h1 class="so-page-title"><?= htmlspecialchars($pageTitle) ?></h1>
            <p class="so-page-subtitle"><?= htmlspecialchars($pageDescription) ?></p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">

<!-- Basic Rating -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Basic Rating</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Interactive star rating component. Click to select a rating.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-rating so-rating-interactive">
                    <input type="radio" name="rating1" value="5" id="rating1-5" class="so-rating-input">
                    <label for="rating1-5" class="so-rating-label"><span class="material-icons">star</span></label>
                    <input type="radio" name="rating1" value="4" id="rating1-4" class="so-rating-input">
                    <label for="rating1-4" class="so-rating-label"><span class="material-icons">star</span></label>
                    <input type="radio" name="rating1" value="3" id="rating1-3" class="so-rating-input" checked>
                    <label for="rating1-3" class="so-rating-label"><span class="material-icons">star</span></label>
                    <input type="radio" name="rating1" value="2" id="rating1-2" class="so-rating-input">
                    <label for="rating1-2" class="so-rating-label"><span class="material-icons">star</span></label>
                    <input type="radio" name="rating1" value="1" id="rating1-1" class="so-rating-input">
                    <label for="rating1-1" class="so-rating-label"><span class="material-icons">star</span></label>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Interactive rating with CSS-only hover effect --&gt;
&lt;div class="so-rating so-rating-interactive"&gt;
    &lt;input type="radio" name="rating" value="5" id="rating-5" class="so-rating-input"&gt;
    &lt;label for="rating-5" class="so-rating-label"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/label&gt;
    &lt;input type="radio" name="rating" value="4" id="rating-4" class="so-rating-input"&gt;
    &lt;label for="rating-4" class="so-rating-label"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/label&gt;
    &lt;input type="radio" name="rating" value="3" id="rating-3" class="so-rating-input" checked&gt;
    &lt;label for="rating-3" class="so-rating-label"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/label&gt;
    &lt;input type="radio" name="rating" value="2" id="rating-2" class="so-rating-input"&gt;
    &lt;label for="rating-2" class="so-rating-label"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/label&gt;
    &lt;input type="radio" name="rating" value="1" id="rating-1" class="so-rating-input"&gt;
    &lt;label for="rating-1" class="so-rating-label"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/label&gt;
&lt;/div&gt;

&lt;!-- Note: Inputs are in reverse order (5-1) for CSS sibling selector hover effect --&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Read-only Rating -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Read-only Rating</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Display-only ratings for showing reviews.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-d-flex so-flex-column so-gap-3">
                    <div class="so-d-flex so-align-items-center so-gap-2">
                        <div class="so-rating so-rating-readonly" data-rating="5">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                        </div>
                        <span class="so-text-muted">5.0 - Excellent</span>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-2">
                        <div class="so-rating so-rating-readonly" data-rating="4">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                        <span class="so-text-muted">4.0 - Very Good</span>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-2">
                        <div class="so-rating so-rating-readonly" data-rating="3">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                        <span class="so-text-muted">3.0 - Good</span>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-2">
                        <div class="so-rating so-rating-readonly" data-rating="2">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                        <span class="so-text-muted">2.0 - Fair</span>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Read-only rating display --&gt;
&lt;div class="so-rating so-rating-readonly"&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star"&gt;&lt;span class="material-icons"&gt;star_border&lt;/span&gt;&lt;/span&gt;
&lt;/div&gt;

&lt;!-- Use star_border for empty stars, star for filled --&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Half Star Rating -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Half Star Rating</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Ratings with half-star precision.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-d-flex so-flex-column so-gap-3">
                    <div class="so-d-flex so-align-items-center so-gap-2">
                        <div class="so-rating so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-half"><span class="material-icons">star_half</span></span>
                        </div>
                        <span class="so-text-muted">4.5</span>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-2">
                        <div class="so-rating so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-half"><span class="material-icons">star_half</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                        <span class="so-text-muted">3.5</span>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-2">
                        <div class="so-rating so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-half"><span class="material-icons">star_half</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                        <span class="so-text-muted">2.5</span>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Half star rating using star_half icon --&gt;
&lt;div class="so-rating so-rating-readonly"&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star so-rating-half"&gt;&lt;span class="material-icons"&gt;star_half&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star"&gt;&lt;span class="material-icons"&gt;star_border&lt;/span&gt;&lt;/span&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Fractional Ratings -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Fractional Ratings</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Precise decimal ratings using two-layer overlay for any fraction value.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <h6 class="so-mb-3">Common Fractions</h6>
                <div class="so-d-flex so-flex-column so-gap-3 so-mb-5">
                    <!-- 4.7 rating -->
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 50px;">4.7</span>
                        <div class="so-rating-fraction">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 70%"><span class="material-icons">star</span></span></span>
                        </div>
                    </div>
            <!-- 3.3 rating -->
            <div class="so-d-flex so-align-items-center so-gap-3">
                <span class="so-text-muted" style="width: 50px;">3.3</span>
                <div class="so-rating-fraction">
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 30%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                </div>
            </div>
            <!-- 2.8 rating -->
            <div class="so-d-flex so-align-items-center so-gap-3">
                <span class="so-text-muted" style="width: 50px;">2.8</span>
                <div class="so-rating-fraction">
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 80%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                </div>
            </div>
            <!-- 1.5 rating -->
            <div class="so-d-flex so-align-items-center so-gap-3">
                <span class="so-text-muted" style="width: 50px;">1.5</span>
                <div class="so-rating-fraction">
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 50%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                    <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                </div>
            </div>
        </div>

                <h6 class="so-mb-3 so-mt-4">Fractional Rating Sizes</h6>
                <div class="so-d-flex so-flex-column so-gap-4">
                    <div>
                        <label class="so-form-label">Extra Small (4.6)</label>
                        <div class="so-rating-fraction so-rating-fraction-xs">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 60%"><span class="material-icons">star</span></span></span>
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">Small (4.6)</label>
                        <div class="so-rating-fraction so-rating-fraction-sm">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 60%"><span class="material-icons">star</span></span></span>
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">Medium - Default (4.6)</label>
                        <div class="so-rating-fraction so-rating-fraction-md">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 60%"><span class="material-icons">star</span></span></span>
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">Large (4.6)</label>
                        <div class="so-rating-fraction so-rating-fraction-lg">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 60%"><span class="material-icons">star</span></span></span>
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">Extra Large (4.6)</label>
                        <div class="so-rating-fraction so-rating-fraction-xl">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 60%"><span class="material-icons">star</span></span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Fractional rating with precise percentage fill --&gt;
&lt;div class="so-rating-fraction"&gt;
    &lt;span class="so-rating-star-wrap"&gt;
        &lt;span class="so-rating-star-empty"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
        &lt;span class="so-rating-star-fill" style="width: 100%"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;/span&gt;
    &lt;span class="so-rating-star-wrap"&gt;
        &lt;span class="so-rating-star-empty"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
        &lt;span class="so-rating-star-fill" style="width: 100%"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;/span&gt;
    &lt;span class="so-rating-star-wrap"&gt;
        &lt;span class="so-rating-star-empty"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
        &lt;span class="so-rating-star-fill" style="width: 70%"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;/span&gt;
    &lt;!-- ... more stars --&gt;
&lt;/div&gt;

&lt;!-- Size variants --&gt;
&lt;div class="so-rating-fraction so-rating-fraction-xs"&gt;...&lt;/div&gt;
&lt;div class="so-rating-fraction so-rating-fraction-sm"&gt;...&lt;/div&gt;
&lt;div class="so-rating-fraction so-rating-fraction-md"&gt;...&lt;/div&gt;
&lt;div class="so-rating-fraction so-rating-fraction-lg"&gt;...&lt;/div&gt;
&lt;div class="so-rating-fraction so-rating-fraction-xl"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Interactive Fractional Rating -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Interactive Fractional Rating</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Click on stars to set precise fractional ratings. Click on left half for .5, right half for full star.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-d-flex so-flex-column so-gap-4">
                    <div>
                        <label class="so-form-label">Click to rate (half-star precision)</label>
                        <div class="so-d-flex so-align-items-center so-gap-3">
                            <div class="so-rating-fraction so-rating-fraction-interactive so-rating-fraction-lg" id="interactiveRating1" data-rating="0">
                                <span class="so-rating-star-wrap" data-value="1"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                                <span class="so-rating-star-wrap" data-value="2"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                                <span class="so-rating-star-wrap" data-value="3"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                                <span class="so-rating-star-wrap" data-value="4"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                                <span class="so-rating-star-wrap" data-value="5"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                            </div>
                            <span class="so-text-lg so-fw-semibold" id="ratingValue1">0.0</span>
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">Preset to 3.5</label>
                        <div class="so-d-flex so-align-items-center so-gap-3">
                            <div class="so-rating-fraction so-rating-fraction-interactive" id="interactiveRating2" data-rating="3.5">
                                <span class="so-rating-star-wrap" data-value="1"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                                <span class="so-rating-star-wrap" data-value="2"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                                <span class="so-rating-star-wrap" data-value="3"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                                <span class="so-rating-star-wrap" data-value="4"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 50%"><span class="material-icons">star</span></span></span>
                                <span class="so-rating-star-wrap" data-value="5"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 0%"><span class="material-icons">star</span></span></span>
                            </div>
                            <span class="so-text-lg so-fw-semibold" id="ratingValue2">3.5</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tabbed code blocks for HTML and JavaScript -->
            <div class="so-code-block">
                <div class="so-code-header">
                    <div class="so-code-tabs">
                        <button class="so-code-tab so-active" data-so-target="#rating-interactive-html">
                            <span class="material-icons">code</span> HTML
                        </button>
                        <button class="so-code-tab" data-so-target="#rating-interactive-js">
                            <span class="material-icons">javascript</span> JavaScript
                        </button>
                    </div>
                    <button class="so-code-copy" onclick="copyCode(this)">
                        <span class="material-icons">content_copy</span>
                    </button>
                </div>
                <div class="so-code-body">
                    <div class="so-code-pane so-active" id="rating-interactive-html">
                        <pre class="so-code-content"><code class="language-html">&lt;div class="so-rating-fraction so-rating-fraction-interactive" id="myRating" data-rating="0"&gt;
    &lt;span class="so-rating-star-wrap" data-value="1"&gt;
        &lt;span class="so-rating-star-empty"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
        &lt;span class="so-rating-star-fill" style="width: 0%"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;/span&gt;
    &lt;span class="so-rating-star-wrap" data-value="2"&gt;...&lt;/span&gt;
    &lt;span class="so-rating-star-wrap" data-value="3"&gt;...&lt;/span&gt;
    &lt;span class="so-rating-star-wrap" data-value="4"&gt;...&lt;/span&gt;
    &lt;span class="so-rating-star-wrap" data-value="5"&gt;...&lt;/span&gt;
&lt;/div&gt;
&lt;span id="ratingValue"&gt;0.0&lt;/span&gt;</code></pre>
                    </div>
                    <div class="so-code-pane" id="rating-interactive-js">
                        <pre class="so-code-content"><code class="language-javascript">document.querySelectorAll('.so-rating-fraction-interactive').forEach(container => {
    const stars = container.querySelectorAll('.so-rating-star-wrap');

    function setRating(rating) {
        container.dataset.rating = rating;
        stars.forEach((star, index) => {
            const starValue = index + 1;
            const fill = star.querySelector('.so-rating-star-fill');
            if (rating >= starValue) {
                fill.style.width = '100%';
            } else if (rating >= starValue - 0.5) {
                fill.style.width = '50%';
            } else {
                fill.style.width = '0%';
            }
        });
    }

    stars.forEach((star, index) => {
        star.addEventListener('click', function(e) {
            const rect = star.getBoundingClientRect();
            const isLeftHalf = e.clientX < rect.left + rect.width / 2;
            const rating = isLeftHalf ? index + 0.5 : index + 1;
            setRating(rating);
        });
    });
});</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Interactive fractional rating
    document.querySelectorAll('.so-rating-fraction-interactive').forEach(container => {
        const stars = container.querySelectorAll('.so-rating-star-wrap');
        const valueDisplay = document.getElementById(container.id.replace('interactiveRating', 'ratingValue'));

        function setRating(rating) {
            container.dataset.rating = rating;
            if (valueDisplay) valueDisplay.textContent = rating.toFixed(1);

            stars.forEach((star, index) => {
                const starValue = index + 1;
                const fill = star.querySelector('.so-rating-star-fill');

                if (rating >= starValue) {
                    fill.style.width = '100%';
                } else if (rating >= starValue - 0.5) {
                    fill.style.width = '50%';
                } else {
                    fill.style.width = '0%';
                }
            });
        }

        stars.forEach((star, index) => {
            star.addEventListener('click', function(e) {
                const rect = star.getBoundingClientRect();
                const isLeftHalf = e.clientX < rect.left + rect.width / 2;
                const rating = isLeftHalf ? index + 0.5 : index + 1;
                setRating(rating);
            });

            star.addEventListener('mousemove', function(e) {
                const rect = star.getBoundingClientRect();
                const isLeftHalf = e.clientX < rect.left + rect.width / 2;
                const previewRating = isLeftHalf ? index + 0.5 : index + 1;

                // Preview on hover
                stars.forEach((s, i) => {
                    const fill = s.querySelector('.so-rating-star-fill');
                    const starValue = i + 1;

                    if (previewRating >= starValue) {
                        fill.style.width = '100%';
                    } else if (previewRating >= starValue - 0.5) {
                        fill.style.width = '50%';
                    } else {
                        fill.style.width = '0%';
                    }
                });
            });
        });

        container.addEventListener('mouseleave', function() {
            // Reset to actual rating on mouse leave
            setRating(parseFloat(container.dataset.rating) || 0);
        });
    });
});
</script>

<!-- Fractional Rating Colors -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Fractional Rating Colors</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Fractional ratings in different color variants.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-d-flex so-flex-column so-gap-3">
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 80px;">Default</span>
                        <div class="so-rating-fraction">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 30%"><span class="material-icons">star</span></span></span>
                        </div>
                        <span class="so-text-muted">4.3</span>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 80px;">Primary</span>
                        <div class="so-rating-fraction so-rating-fraction-primary">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 30%"><span class="material-icons">star</span></span></span>
                        </div>
                        <span class="so-text-muted">4.3</span>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 80px;">Success</span>
                        <div class="so-rating-fraction so-rating-fraction-success">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 30%"><span class="material-icons">star</span></span></span>
                        </div>
                        <span class="so-text-muted">4.3</span>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 80px;">Danger</span>
                        <div class="so-rating-fraction so-rating-fraction-danger">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 30%"><span class="material-icons">star</span></span></span>
                        </div>
                        <span class="so-text-muted">4.3</span>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 80px;">Info</span>
                        <div class="so-rating-fraction so-rating-fraction-info">
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 100%"><span class="material-icons">star</span></span></span>
                            <span class="so-rating-star-wrap"><span class="so-rating-star-empty"><span class="material-icons">star</span></span><span class="so-rating-star-fill" style="width: 30%"><span class="material-icons">star</span></span></span>
                        </div>
                        <span class="so-text-muted">4.3</span>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Fractional rating color variants --&gt;
&lt;div class="so-rating-fraction"&gt;...&lt;/div&gt;
&lt;div class="so-rating-fraction so-rating-fraction-primary"&gt;...&lt;/div&gt;
&lt;div class="so-rating-fraction so-rating-fraction-success"&gt;...&lt;/div&gt;
&lt;div class="so-rating-fraction so-rating-fraction-danger"&gt;...&lt;/div&gt;
&lt;div class="so-rating-fraction so-rating-fraction-info"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Size Variants -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Size Variants</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Different sizes for various contexts.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-d-flex so-flex-column so-gap-4">
                    <div>
                        <label class="so-form-label">Small</label>
                        <div class="so-rating so-rating-sm so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">Default</label>
                        <div class="so-rating so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">Large</label>
                        <div class="so-rating so-rating-lg so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Small rating --&gt;
&lt;div class="so-rating so-rating-sm so-rating-readonly"&gt;...&lt;/div&gt;

&lt;!-- Default rating --&gt;
&lt;div class="so-rating so-rating-readonly"&gt;...&lt;/div&gt;

&lt;!-- Large rating --&gt;
&lt;div class="so-rating so-rating-lg so-rating-readonly"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Color Variants -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Color Variants</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Ratings in different colors.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-d-flex so-flex-column so-gap-3">
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 80px;">Default</span>
                        <div class="so-rating so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 80px;">Primary</span>
                        <div class="so-rating so-rating-primary so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 80px;">Success</span>
                        <div class="so-rating so-rating-success so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                    <div class="so-d-flex so-align-items-center so-gap-3">
                        <span class="so-text-muted" style="width: 80px;">Danger</span>
                        <div class="so-rating so-rating-danger so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Color variants --&gt;
&lt;div class="so-rating so-rating-readonly"&gt;...&lt;/div&gt;
&lt;div class="so-rating so-rating-primary so-rating-readonly"&gt;...&lt;/div&gt;
&lt;div class="so-rating so-rating-success so-rating-readonly"&gt;...&lt;/div&gt;
&lt;div class="so-rating so-rating-danger so-rating-readonly"&gt;...&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Icon Variants -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Icon Variants</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Use different icons for ratings.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-d-flex so-flex-column so-gap-4">
                    <div>
                        <label class="so-form-label">Hearts</label>
                        <div class="so-rating so-rating-hearts so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">favorite</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">favorite</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">favorite</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">favorite</span></span>
                            <span class="so-rating-star"><span class="material-icons">favorite_border</span></span>
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">Thumbs</label>
                        <div class="so-rating so-rating-thumbs so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">thumb_up</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">thumb_up</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">thumb_up</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">thumb_up</span></span>
                            <span class="so-rating-star"><span class="material-icons">thumb_up_off_alt</span></span>
                        </div>
                    </div>
                    <div>
                        <label class="so-form-label">Emoji</label>
                        <div class="so-rating so-rating-emoji so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">sentiment_very_satisfied</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">sentiment_satisfied</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">sentiment_neutral</span></span>
                            <span class="so-rating-star"><span class="material-icons">sentiment_dissatisfied</span></span>
                            <span class="so-rating-star"><span class="material-icons">sentiment_very_dissatisfied</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;!-- Hearts --&gt;
&lt;div class="so-rating so-rating-hearts so-rating-readonly"&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;favorite&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star"&gt;&lt;span class="material-icons"&gt;favorite_border&lt;/span&gt;&lt;/span&gt;
&lt;/div&gt;

&lt;!-- Thumbs --&gt;
&lt;div class="so-rating so-rating-thumbs so-rating-readonly"&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;thumb_up&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star"&gt;&lt;span class="material-icons"&gt;thumb_up_off_alt&lt;/span&gt;&lt;/span&gt;
&lt;/div&gt;

&lt;!-- Emoji --&gt;
&lt;div class="so-rating so-rating-emoji so-rating-readonly"&gt;
    &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;sentiment_very_satisfied&lt;/span&gt;&lt;/span&gt;
    &lt;span class="so-rating-star"&gt;&lt;span class="material-icons"&gt;sentiment_dissatisfied&lt;/span&gt;&lt;/span&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Rating with Value Display -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Rating with Value Display</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Show numeric value alongside stars.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-d-flex so-flex-column so-gap-4">
                    <div class="so-rating-display">
                        <div class="so-rating-value">4.8</div>
                        <div class="so-rating so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                        </div>
                        <span class="so-text-muted">(1,234 reviews)</span>
                    </div>

                    <div class="so-rating-display">
                        <div class="so-rating-value">3.5</div>
                        <div class="so-rating so-rating-readonly">
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                            <span class="so-rating-star so-rating-half"><span class="material-icons">star_half</span></span>
                            <span class="so-rating-star"><span class="material-icons">star_border</span></span>
                        </div>
                        <span class="so-text-muted">(567 reviews)</span>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-rating-display"&gt;
    &lt;div class="so-rating-value"&gt;4.8&lt;/div&gt;
    &lt;div class="so-rating so-rating-readonly"&gt;
        &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
        &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
        &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
        &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
        &lt;span class="so-rating-star so-rating-filled"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/span&gt;
    &lt;/div&gt;
    &lt;span class="so-text-muted"&gt;(1,234 reviews)&lt;/span&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Rating Summary -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Rating Summary</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Complete rating breakdown with bars.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <div class="so-rating-summary">
                    <div class="so-rating-summary-header">
                        <div class="so-rating-summary-score">4.5</div>
                        <div class="so-rating-summary-info">
                            <div class="so-rating so-rating-lg so-rating-readonly">
                                <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                                <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                                <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                                <span class="so-rating-star so-rating-filled"><span class="material-icons">star</span></span>
                                <span class="so-rating-star so-rating-half"><span class="material-icons">star_half</span></span>
                            </div>
                            <span class="so-text-muted">Based on 2,456 reviews</span>
                        </div>
                    </div>
                    <div class="so-rating-bars">
                        <div class="so-rating-bar-item">
                            <span class="so-rating-bar-label">5</span>
                            <div class="so-progress so-progress-sm">
                                <div class="so-progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="so-rating-bar-count">1,719</span>
                        </div>
                        <div class="so-rating-bar-item">
                            <span class="so-rating-bar-label">4</span>
                            <div class="so-progress so-progress-sm">
                                <div class="so-progress-bar" style="width: 20%"></div>
                            </div>
                            <span class="so-rating-bar-count">491</span>
                        </div>
                        <div class="so-rating-bar-item">
                            <span class="so-rating-bar-label">3</span>
                            <div class="so-progress so-progress-sm">
                                <div class="so-progress-bar" style="width: 6%"></div>
                            </div>
                            <span class="so-rating-bar-count">147</span>
                        </div>
                        <div class="so-rating-bar-item">
                            <span class="so-rating-bar-label">2</span>
                            <div class="so-progress so-progress-sm">
                                <div class="so-progress-bar" style="width: 3%"></div>
                            </div>
                            <span class="so-rating-bar-count">74</span>
                        </div>
                        <div class="so-rating-bar-item">
                            <span class="so-rating-bar-label">1</span>
                            <div class="so-progress so-progress-sm">
                                <div class="so-progress-bar" style="width: 1%"></div>
                            </div>
                            <span class="so-rating-bar-count">25</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;div class="so-rating-summary"&gt;
    &lt;div class="so-rating-summary-header"&gt;
        &lt;div class="so-rating-summary-score"&gt;4.5&lt;/div&gt;
        &lt;div class="so-rating-summary-info"&gt;
            &lt;div class="so-rating so-rating-lg so-rating-readonly"&gt;...&lt;/div&gt;
            &lt;span class="so-text-muted"&gt;Based on 2,456 reviews&lt;/span&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-rating-bars"&gt;
        &lt;div class="so-rating-bar-item"&gt;
            &lt;span class="so-rating-bar-label"&gt;5&lt;/span&gt;
            &lt;div class="so-progress so-progress-sm"&gt;
                &lt;div class="so-progress-bar" style="width: 70%"&gt;&lt;/div&gt;
            &lt;/div&gt;
            &lt;span class="so-rating-bar-count"&gt;1,719&lt;/span&gt;
        &lt;/div&gt;
        &lt;!-- More rating bars... --&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- Interactive Rating Form -->
<div class="so-card so-mb-4">
    <div class="so-card-header">
        <h3 class="so-card-title">Rating Form</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Complete rating form with interactive stars.</p>

        <div class="so-example-block">
            <div class="so-example-preview">
                <form class="so-rating-form">
                    <div class="so-form-group">
                        <label class="so-form-label">Your Rating</label>
                        <div class="so-rating" data-rating="0">
                            <input type="radio" name="userRating" value="1" id="userRating-1" class="so-rating-input">
                            <label for="userRating-1" class="so-rating-label"><span class="material-icons">star</span></label>
                            <input type="radio" name="userRating" value="2" id="userRating-2" class="so-rating-input">
                            <label for="userRating-2" class="so-rating-label"><span class="material-icons">star</span></label>
                            <input type="radio" name="userRating" value="3" id="userRating-3" class="so-rating-input">
                            <label for="userRating-3" class="so-rating-label"><span class="material-icons">star</span></label>
                            <input type="radio" name="userRating" value="4" id="userRating-4" class="so-rating-input">
                            <label for="userRating-4" class="so-rating-label"><span class="material-icons">star</span></label>
                            <input type="radio" name="userRating" value="5" id="userRating-5" class="so-rating-input">
                            <label for="userRating-5" class="so-rating-label"><span class="material-icons">star</span></label>
                        </div>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Review Title</label>
                        <input type="text" class="so-form-control" placeholder="Summarize your experience">
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Your Review</label>
                        <textarea class="so-form-control" rows="4" placeholder="Tell us what you liked or didn't like"></textarea>
                    </div>
                    <button type="submit" class="so-btn so-btn-primary">Submit Review</button>
                </form>
            </div>
            <div class="so-code-block">
                <div class="so-code-header">
                    <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                    <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
                </div>
                <pre class="so-code-content"><code class="language-html">&lt;form class="so-rating-form"&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;Your Rating&lt;/label&gt;
        &lt;div class="so-rating"&gt;
            &lt;input type="radio" name="rating" value="1" id="rating-1" class="so-rating-input"&gt;
            &lt;label for="rating-1" class="so-rating-label"&gt;&lt;span class="material-icons"&gt;star&lt;/span&gt;&lt;/label&gt;
            &lt;!-- More rating inputs... --&gt;
        &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;Review Title&lt;/label&gt;
        &lt;input type="text" class="so-form-control" placeholder="Summarize your experience"&gt;
    &lt;/div&gt;
    &lt;div class="so-form-group"&gt;
        &lt;label class="so-form-label"&gt;Your Review&lt;/label&gt;
        &lt;textarea class="so-form-control" rows="4"&gt;&lt;/textarea&gt;
    &lt;/div&gt;
    &lt;button type="submit" class="so-btn so-btn-primary"&gt;Submit Review&lt;/button&gt;
&lt;/form&gt;</code></pre>
            </div>
        </div>
    </div>
</div>

    </div>
</main>

<script>
function copyCode(button) {
    const codeBlock = button.closest('.so-code-block');
    const code = codeBlock.querySelector('.so-code-content code').textContent;
    navigator.clipboard.writeText(code).then(() => {
        button.innerHTML = '<span class="material-icons">check</span>';
        setTimeout(() => {
            button.innerHTML = '<span class="material-icons">content_copy</span>';
        }, 2000);
    });
}
</script>

<?php require_once '../includes/footer.php'; ?>
