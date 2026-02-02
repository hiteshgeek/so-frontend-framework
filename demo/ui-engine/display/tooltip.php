<?php
/**
 * SixOrbit UI Engine - Tooltip Element Demo
 */

$pageTitle = 'Tooltip - UI Engine';
$pageDescription = 'Contextual hints on hover or focus';

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
                <li class="so-breadcrumb-item so-active">Tooltip</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">chat_bubble_outline</span>
            Tooltip
        </h1>
        <p class="so-page-subtitle">Contextual hints that appear on hover or focus to provide additional information.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Tooltip -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Tooltip</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <button type="button" class="so-btn so-btn-secondary" data-bs-toggle="tooltip" title="This is a tooltip">
                        Hover over me
                    </button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-tooltip', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$button = UiEngine::button('Hover over me')
    ->tooltip('This is a tooltip');

echo \$button->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const button = UiEngine.button('Hover over me')
    .tooltip('This is a tooltip');

document.getElementById('container').innerHTML = button.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button type="button" class="so-btn so-btn-secondary" data-bs-toggle="tooltip" title="This is a tooltip">
    Hover over me
</button>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Tooltip Positions -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Tooltip Positions</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2 so-flex-wrap">
                        <button type="button" class="so-btn so-btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Tooltip on top">
                            Top
                        </button>
                        <button type="button" class="so-btn so-btn-secondary" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
                            Right
                        </button>
                        <button type="button" class="so-btn so-btn-secondary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom">
                            Bottom
                        </button>
                        <button type="button" class="so-btn so-btn-secondary" data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left">
                            Left
                        </button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('tooltip-positions', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::button('Top')->tooltip('Tooltip on top', 'top');
UiEngine::button('Right')->tooltip('Tooltip on right', 'right');
UiEngine::button('Bottom')->tooltip('Tooltip on bottom', 'bottom');
UiEngine::button('Left')->tooltip('Tooltip on left', 'left');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.button('Top').tooltip('Tooltip on top', 'top');
UiEngine.button('Right').tooltip('Tooltip on right', 'right');
UiEngine.button('Bottom').tooltip('Tooltip on bottom', 'bottom');
UiEngine.button('Left').tooltip('Tooltip on left', 'left');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Tooltip on Various Elements -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">On Various Elements</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <p>
                        You can add tooltips to
                        <a href="#" data-bs-toggle="tooltip" title="This is a link with tooltip">links</a>,
                        <span data-bs-toggle="tooltip" title="This is a span with tooltip" class="so-text-decoration-underline">inline text</span>,
                        and
                        <span class="so-badge so-bg-primary" data-bs-toggle="tooltip" title="Badge tooltip">badges</span>.
                    </p>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('tooltip-elements', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// On a link
UiEngine::link('links', '#')->tooltip('This is a link with tooltip');

// On a badge
UiEngine::badge('badges')->variant('primary')->tooltip('Badge tooltip');

// Using the tooltip wrapper
UiEngine::tooltip('Hover text goes here')
    ->content('This is a span with tooltip')
    ->tag('span');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// On a link
UiEngine.link('links', '#').tooltip('This is a link with tooltip');

// On a badge
UiEngine.badge('badges').variant('primary').tooltip('Badge tooltip');

// Using the tooltip wrapper
UiEngine.tooltip('Hover text goes here')
    .content('This is a span with tooltip')
    .tag('span');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- HTML Content -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With HTML Content</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('tooltip-html', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$button = UiEngine::button('HTML Tooltip')
    ->tooltip('<strong>Bold</strong> and <em>italic</em> text', 'top', true);
    // Third parameter enables HTML content

echo \$button->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const button = UiEngine.button('HTML Tooltip')
    .tooltip('<strong>Bold</strong> and <em>italic</em> text', 'top')
    .tooltipHtml(true); // Enable HTML content

document.getElementById('container').innerHTML = button.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Trigger Options -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Trigger Options</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('tooltip-triggers', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Hover trigger (default)
UiEngine::button('Hover')
    ->tooltip('Shows on hover', 'top', false, 'hover');

// Focus trigger
UiEngine::input('focus_input')
    ->tooltip('Shows on focus', 'top', false, 'focus');

// Click trigger
UiEngine::button('Click')
    ->tooltip('Shows on click', 'top', false, 'click');

// Multiple triggers
UiEngine::button('Hover & Focus')
    ->tooltip('Shows on hover and focus', 'top', false, 'hover focus');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Hover trigger (default)
UiEngine.button('Hover')
    .tooltip('Shows on hover')
    .tooltipTrigger('hover');

// Focus trigger
UiEngine.input('focus_input')
    .tooltip('Shows on focus')
    .tooltipTrigger('focus');

// Click trigger
UiEngine.button('Click')
    .tooltip('Shows on click')
    .tooltipTrigger('click');

// Manual trigger (programmatic control)
const tooltip = UiEngine.button('Manual')
    .tooltip('Manual tooltip')
    .tooltipTrigger('manual');

// Show/hide programmatically
tooltip.showTooltip();
tooltip.hideTooltip();"
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
                                <td><code>tooltip()</code></td>
                                <td><code>string $text, string $position, bool $html, string $trigger</code></td>
                                <td>Add tooltip to element</td>
                            </tr>
                            <tr>
                                <td><code>tooltipHtml()</code></td>
                                <td><code>bool $enabled</code></td>
                                <td>Enable HTML content in tooltip</td>
                            </tr>
                            <tr>
                                <td><code>tooltipTrigger()</code></td>
                                <td><code>string $trigger</code></td>
                                <td>Set trigger: hover, focus, click, manual</td>
                            </tr>
                            <tr>
                                <td><code>tooltipDelay()</code></td>
                                <td><code>int $delay</code></td>
                                <td>Set show/hide delay in ms</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(el) {
        return new bootstrap.Tooltip(el);
    });
});
</script>

<?php require_once '../../includes/footer.php'; ?>
