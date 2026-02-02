<?php
/**
 * SixOrbit UI Engine - Accordion Element Demo
 */

$pageTitle = 'Accordion - UI Engine';
$pageDescription = 'Collapsible content panels for organizing information';

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
                <li class="so-breadcrumb-item so-active">Accordion</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">expand_more</span>
            Accordion
        </h1>
        <p class="so-page-subtitle">Collapsible content panels for organizing and presenting information in a compact format.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Accordion -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Accordion</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-accordion" id="demo-accordion">
                        <div class="so-accordion-item">
                            <h2 class="so-accordion-header">
                                <button class="so-accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#demo-one">
                                    What is UiEngine?
                                </button>
                            </h2>
                            <div id="demo-one" class="so-accordion-collapse collapse show" data-bs-parent="#demo-accordion">
                                <div class="so-accordion-body">
                                    UiEngine is a programmatic UI generation system that provides symmetric PHP and JavaScript APIs for building user interfaces.
                                </div>
                            </div>
                        </div>
                        <div class="so-accordion-item">
                            <h2 class="so-accordion-header">
                                <button class="so-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#demo-two">
                                    How does it work?
                                </button>
                            </h2>
                            <div id="demo-two" class="so-accordion-collapse collapse" data-bs-parent="#demo-accordion">
                                <div class="so-accordion-body">
                                    You create elements using a fluent API, configure them with methods, and render them to HTML. The same code patterns work in both PHP and JavaScript.
                                </div>
                            </div>
                        </div>
                        <div class="so-accordion-item">
                            <h2 class="so-accordion-header">
                                <button class="so-accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#demo-three">
                                    Why use it?
                                </button>
                            </h2>
                            <div id="demo-three" class="so-accordion-collapse collapse" data-bs-parent="#demo-accordion">
                                <div class="so-accordion-body">
                                    UiEngine provides consistency between server and client rendering, reduces boilerplate code, and offers built-in validation integration.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-accordion', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$accordion = UiEngine::accordion('faq')
    ->item('What is UiEngine?', 'UiEngine is a programmatic UI generation system...', true)
    ->item('How does it work?', 'You create elements using a fluent API...')
    ->item('Why use it?', 'UiEngine provides consistency between server and client...');

echo \$accordion->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const accordion = UiEngine.accordion('faq')
    .item('What is UiEngine?', 'UiEngine is a programmatic UI generation system...', true)
    .item('How does it work?', 'You create elements using a fluent API...')
    .item('Why use it?', 'UiEngine provides consistency between server and client...');

document.getElementById('container').innerHTML = accordion.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Always Open -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Always Open (Multiple Expanded)</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('accordion-open', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$accordion = UiEngine::accordion('features')
    ->alwaysOpen()  // Allow multiple panels to be open
    ->item('Feature 1', 'Description of feature 1', true)
    ->item('Feature 2', 'Description of feature 2', true)
    ->item('Feature 3', 'Description of feature 3');

echo \$accordion->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const accordion = UiEngine.accordion('features')
    .alwaysOpen()
    .item('Feature 1', 'Description of feature 1', true)
    .item('Feature 2', 'Description of feature 2', true)
    .item('Feature 3', 'Description of feature 3');

document.getElementById('container').innerHTML = accordion.toHtml();"
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
                <!-- Code Tabs -->
                <?= so_code_tabs('accordion-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$accordion = UiEngine::accordion('settings')
    ->item('Account Settings', 'Manage your account...', false, 'person')
    ->item('Privacy Settings', 'Control your privacy...', false, 'lock')
    ->item('Notifications', 'Configure notifications...', false, 'notifications');

echo \$accordion->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const accordion = UiEngine.accordion('settings')
    .item('Account Settings', 'Manage your account...', false, 'person')
    .item('Privacy Settings', 'Control your privacy...', false, 'lock')
    .item('Notifications', 'Configure notifications...', false, 'notifications');

document.getElementById('container').innerHTML = accordion.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Flush Style -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Flush Style (Borderless)</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('accordion-flush', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$accordion = UiEngine::accordion('flush-demo')
    ->flush()  // Remove borders and rounded corners
    ->item('Section 1', 'Content for section 1')
    ->item('Section 2', 'Content for section 2')
    ->item('Section 3', 'Content for section 3');

echo \$accordion->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const accordion = UiEngine.accordion('flush-demo')
    .flush()
    .item('Section 1', 'Content for section 1')
    .item('Section 2', 'Content for section 2')
    .item('Section 3', 'Content for section 3');

document.getElementById('container').innerHTML = accordion.toHtml();"
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
                                <td><code>item()</code></td>
                                <td><code>string $title, string $content, bool $expanded, string $icon</code></td>
                                <td>Add an accordion item</td>
                            </tr>
                            <tr>
                                <td><code>items()</code></td>
                                <td><code>array $items</code></td>
                                <td>Add multiple items at once</td>
                            </tr>
                            <tr>
                                <td><code>alwaysOpen()</code></td>
                                <td>-</td>
                                <td>Allow multiple panels to be open</td>
                            </tr>
                            <tr>
                                <td><code>flush()</code></td>
                                <td>-</td>
                                <td>Remove borders and rounded corners</td>
                            </tr>
                            <tr>
                                <td><code>onChange()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Callback when panel opens/closes</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
