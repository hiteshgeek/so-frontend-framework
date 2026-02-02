<?php
/**
 * SixOrbit UI Engine - Collapse Element Demo
 */

$pageTitle = 'Collapse - UI Engine';
$pageDescription = 'Toggle visibility of content with smooth animations';

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
                <li class="so-breadcrumb-item"><a href="../index.php#navigation">Navigation Elements</a></li>
                <li class="so-breadcrumb-item so-active">Collapse</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">unfold_less</span>
            Collapse
        </h1>
        <p class="so-page-subtitle">Toggle the visibility of content with smooth CSS transitions and animations.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Collapse -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Collapse</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <button class="so-btn so-btn-primary so-mb-3" type="button" data-so-toggle="collapse" data-so-target="#collapseDemo">
                        Toggle Content
                    </button>
                    <div class="so-collapse" id="collapseDemo">
                        <div class="so-card so-card-body">
                            This is collapsible content. It can contain any HTML elements including text, images, forms, and other components.
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-collapse', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

// Create the toggle button
\$button = UiEngine::button('Toggle Content')
    ->variant('primary')
    ->collapse('my-collapse');  // Target collapse ID

// Create the collapsible content
\$collapse = UiEngine::collapse('my-collapse')
    ->content('This is collapsible content.');

echo \$button->render();
echo \$collapse->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Create toggle button
const button = UiEngine.button('Toggle Content')
    .variant('primary')
    .collapse('my-collapse');

// Create collapsible content
const collapse = UiEngine.collapse('my-collapse')
    .content('This is collapsible content.');

document.getElementById('container').innerHTML =
    button.toHtml() + collapse.toHtml();

// Or use the collapse API directly
const collapseEl = document.getElementById('my-collapse');
const bsCollapse = new SoCollapse(collapseEl);

// Toggle programmatically
bsCollapse.toggle();
bsCollapse.show();
bsCollapse.hide();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<button class="so-btn so-btn-primary" type="button"
        data-so-toggle="collapse" data-so-target="#my-collapse">
    Toggle Content
</button>

<div class="so-collapse" id="my-collapse">
    <div class="so-card so-card-body">
        This is collapsible content.
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Link Toggle -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Link Toggle</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <a class="so-btn so-btn-link" data-so-toggle="collapse" href="#collapseLinkDemo">
                        Show More <span class="material-icons so-align-middle">expand_more</span>
                    </a>
                    <div class="so-collapse" id="collapseLinkDemo">
                        <div class="so-mt-3 so-p-3 so-bg-white so-rounded so-border">
                            Additional content revealed when the link is clicked. This pattern is useful for "read more" functionality.
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('collapse-link', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Using a link as toggle
\$link = UiEngine::link('Show More')
    ->collapse('more-content')
    ->icon('expand_more', 'end');

\$collapse = UiEngine::collapse('more-content')
    ->content('Additional content revealed when the link is clicked.');

echo \$link->render();
echo \$collapse->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const link = UiEngine.link('Show More')
    .collapse('more-content')
    .icon('expand_more', 'end');

const collapse = UiEngine.collapse('more-content')
    .content('Additional content revealed when the link is clicked.');

document.getElementById('container').innerHTML =
    link.toHtml() + collapse.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Horizontal Collapse -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Horizontal Collapse</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <button class="so-btn so-btn-primary so-mb-3" type="button" data-so-toggle="collapse" data-so-target="#collapseHorizontal">
                        Toggle Width
                    </button>
                    <div style="min-height:100px;">
                        <div class="so-collapse so-collapse-horizontal" id="collapseHorizontal">
                            <div class="so-card so-card-body" style="width:300px;">
                                This collapses horizontally instead of vertically!
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('collapse-horizontal', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$button = UiEngine::button('Toggle Width')
    ->collapse('sidebar');

\$collapse = UiEngine::collapse('sidebar')
    ->horizontal()  // Collapse horizontally
    ->width(300)    // Set fixed width
    ->content(UiEngine::card()->body('Sidebar content')->render());

echo \$button->render();
echo \$collapse->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const button = UiEngine.button('Toggle Width')
    .collapse('sidebar');

const collapse = UiEngine.collapse('sidebar')
    .horizontal()
    .width(300)
    .content(UiEngine.card().body('Sidebar content').toHtml());"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Multiple Targets -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Multiple Targets</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2 so-mb-3">
                        <button class="so-btn so-btn-primary" type="button" data-so-toggle="collapse" data-so-target="#multiCollapse1">
                            Toggle First
                        </button>
                        <button class="so-btn so-btn-secondary" type="button" data-so-toggle="collapse" data-so-target="#multiCollapse2">
                            Toggle Second
                        </button>
                        <button class="so-btn so-btn-success" type="button" data-so-toggle="collapse" data-so-target=".multi-collapse">
                            Toggle Both
                        </button>
                    </div>
                    <div class="so-row">
                        <div class="so-col">
                            <div class="so-collapse multi-collapse" id="multiCollapse1">
                                <div class="so-card so-card-body">First collapsible element</div>
                            </div>
                        </div>
                        <div class="so-col">
                            <div class="so-collapse multi-collapse" id="multiCollapse2">
                                <div class="so-card so-card-body">Second collapsible element</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('collapse-multiple', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Buttons targeting different collapses
\$btn1 = UiEngine::button('Toggle First')->collapse('#panel1');
\$btn2 = UiEngine::button('Toggle Second')->collapse('#panel2');
\$btnBoth = UiEngine::button('Toggle Both')->collapse('.panels'); // Class selector

// Collapsible panels with shared class
\$panel1 = UiEngine::collapse('panel1')
    ->class('panels')
    ->content('First panel');

\$panel2 = UiEngine::collapse('panel2')
    ->class('panels')
    ->content('Second panel');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Buttons targeting different collapses
const btn1 = UiEngine.button('Toggle First').collapse('#panel1');
const btn2 = UiEngine.button('Toggle Second').collapse('#panel2');
const btnBoth = UiEngine.button('Toggle Both').collapse('.panels');

// Collapsible panels with shared class
const panel1 = UiEngine.collapse('panel1')
    .addClass('panels')
    .content('First panel');

const panel2 = UiEngine.collapse('panel2')
    .addClass('panels')
    .content('Second panel');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Initially Shown -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Initially Shown</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('collapse-shown', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Content visible by default
\$collapse = UiEngine::collapse('details')
    ->show()  // Initially expanded
    ->content('This content is visible by default.');

\$button = UiEngine::button('Hide Details')
    ->collapse('details')
    ->ariaExpanded(true);  // Button shows expanded state

echo \$button->render();
echo \$collapse->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Content visible by default
const collapse = UiEngine.collapse('details')
    .show()  // Initially expanded
    .content('This content is visible by default.');

const button = UiEngine.button('Hide Details')
    .collapse('details')
    .ariaExpanded(true);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Event Handling -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Event Handling</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('collapse-events', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Events are handled in JavaScript
// PHP just renders the markup

\$collapse = UiEngine::collapse('animated')
    ->content('Content with event handling');

echo \$collapse->render();
// Add JS event listeners separately"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const collapseEl = document.getElementById('my-collapse');

// Event fires when show() is called
collapseEl.addEventListener('show.so.collapse', () => {
    console.log('Starting to show');
});

// Event fires when fully shown
collapseEl.addEventListener('shown.so.collapse', () => {
    console.log('Fully visible');
});

// Event fires when hide() is called
collapseEl.addEventListener('hide.so.collapse', () => {
    console.log('Starting to hide');
});

// Event fires when fully hidden
collapseEl.addEventListener('hidden.so.collapse', () => {
    console.log('Fully hidden');
});"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Accordion Pattern -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Accordion Pattern</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('collapse-accordion', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Use parent attribute for accordion behavior
// When one item opens, others close

\$accordion = UiEngine::div()->id('myAccordion');

\$item1 = UiEngine::collapse('item1')
    ->parent('myAccordion')  // Links to accordion container
    ->show()  // First item expanded
    ->content('First item content');

\$item2 = UiEngine::collapse('item2')
    ->parent('myAccordion')
    ->content('Second item content');

\$item3 = UiEngine::collapse('item3')
    ->parent('myAccordion')
    ->content('Third item content');

// Note: For accordions, use UiEngine::accordion() which
// handles all the markup automatically"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Use data-so-parent for accordion behavior
const item1 = UiEngine.collapse('item1')
    .parent('#myAccordion')
    .show()
    .content('First item content');

const item2 = UiEngine.collapse('item2')
    .parent('#myAccordion')
    .content('Second item content');

// Or use the dedicated accordion component
const accordion = UiEngine.accordion('myAccordion')
    .item('Section 1', 'First content', {show: true})
    .item('Section 2', 'Second content')
    .item('Section 3', 'Third content');"
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
                                <td><code>content()</code></td>
                                <td><code>string $html</code></td>
                                <td>Set collapse content</td>
                            </tr>
                            <tr>
                                <td><code>show()</code></td>
                                <td>-</td>
                                <td>Initially expanded</td>
                            </tr>
                            <tr>
                                <td><code>horizontal()</code></td>
                                <td>-</td>
                                <td>Collapse horizontally</td>
                            </tr>
                            <tr>
                                <td><code>width()</code></td>
                                <td><code>int $pixels</code></td>
                                <td>Set width for horizontal collapse</td>
                            </tr>
                            <tr>
                                <td><code>parent()</code></td>
                                <td><code>string $selector</code></td>
                                <td>Parent for accordion behavior</td>
                            </tr>
                            <tr>
                                <td><code>toggle()</code></td>
                                <td>-</td>
                                <td>Toggle visibility (JS)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="so-mt-4">JavaScript Events</h5>
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead class="so-table-light">
                            <tr>
                                <th>Event</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>show.so.collapse</code></td>
                                <td>Fires when show transition starts</td>
                            </tr>
                            <tr>
                                <td><code>shown.so.collapse</code></td>
                                <td>Fires when element is fully visible</td>
                            </tr>
                            <tr>
                                <td><code>hide.so.collapse</code></td>
                                <td>Fires when hide transition starts</td>
                            </tr>
                            <tr>
                                <td><code>hidden.so.collapse</code></td>
                                <td>Fires when element is fully hidden</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
