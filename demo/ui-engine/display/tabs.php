<?php
/**
 * SixOrbit UI Engine - Tabs Element Demo
 */

$pageTitle = 'Tabs - UI Engine';
$pageDescription = 'Tabbed navigation for organizing content';

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
                <li class="so-breadcrumb-item so-active">Tabs</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">tab</span>
            Tabs
        </h1>
        <p class="so-page-subtitle">Tabbed navigation for organizing content into separate, switchable panels.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Tabs -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Tabs</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <ul class="so-nav so-nav-tabs" role="tablist">
                        <li class="so-nav-item">
                            <button class="so-nav-link active" data-bs-toggle="tab" data-bs-target="#demo-home">Home</button>
                        </li>
                        <li class="so-nav-item">
                            <button class="so-nav-link" data-bs-toggle="tab" data-bs-target="#demo-profile">Profile</button>
                        </li>
                        <li class="so-nav-item">
                            <button class="so-nav-link" data-bs-toggle="tab" data-bs-target="#demo-contact">Contact</button>
                        </li>
                    </ul>
                    <div class="so-tab-content so-p-3 so-border so-border-top-0">
                        <div class="so-tab-pane so-fade so-show so-active" id="demo-home">
                            <p>This is the home tab content.</p>
                        </div>
                        <div class="so-tab-pane so-fade" id="demo-profile">
                            <p>This is the profile tab content.</p>
                        </div>
                        <div class="so-tab-pane so-fade" id="demo-contact">
                            <p>This is the contact tab content.</p>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-tabs', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$tabs = UiEngine::tabs('main-tabs')
    ->tab('home', 'Home', 'This is the home tab content.', true)
    ->tab('profile', 'Profile', 'This is the profile tab content.')
    ->tab('contact', 'Contact', 'This is the contact tab content.');

echo \$tabs->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const tabs = UiEngine.tabs('main-tabs')
    .tab('home', 'Home', 'This is the home tab content.', true)
    .tab('profile', 'Profile', 'This is the profile tab content.')
    .tab('contact', 'Contact', 'This is the contact tab content.');

document.getElementById('container').innerHTML = tabs.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Pills Style -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Pills Style</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <ul class="so-nav so-nav-pills so-mb-3">
                        <li class="so-nav-item">
                            <button class="so-nav-link active" data-bs-toggle="pill" data-bs-target="#pill-home">Home</button>
                        </li>
                        <li class="so-nav-item">
                            <button class="so-nav-link" data-bs-toggle="pill" data-bs-target="#pill-profile">Profile</button>
                        </li>
                        <li class="so-nav-item">
                            <button class="so-nav-link" data-bs-toggle="pill" data-bs-target="#pill-messages">Messages</button>
                        </li>
                    </ul>
                    <div class="so-tab-content">
                        <div class="so-tab-pane so-fade so-show so-active" id="pill-home">Home content</div>
                        <div class="so-tab-pane so-fade" id="pill-profile">Profile content</div>
                        <div class="so-tab-pane so-fade" id="pill-messages">Messages content</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('pills-tabs', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$tabs = UiEngine::tabs('pill-tabs')
    ->pills()  // Use pill style
    ->tab('home', 'Home', 'Home content', true)
    ->tab('profile', 'Profile', 'Profile content')
    ->tab('messages', 'Messages', 'Messages content');

echo \$tabs->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const tabs = UiEngine.tabs('pill-tabs')
    .pills()
    .tab('home', 'Home', 'Home content', true)
    .tab('profile', 'Profile', 'Profile content')
    .tab('messages', 'Messages', 'Messages content');

document.getElementById('container').innerHTML = tabs.toHtml();"
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
                <?= so_code_tabs('tabs-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$tabs = UiEngine::tabs('icon-tabs')
    ->tab('home', 'Home', 'Home content', true, 'home')
    ->tab('profile', 'Profile', 'Profile content', false, 'person')
    ->tab('settings', 'Settings', 'Settings content', false, 'settings');

echo \$tabs->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const tabs = UiEngine.tabs('icon-tabs')
    .tab('home', 'Home', 'Home content', true, 'home')
    .tab('profile', 'Profile', 'Profile content', false, 'person')
    .tab('settings', 'Settings', 'Settings content', false, 'settings');

document.getElementById('container').innerHTML = tabs.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Vertical Tabs -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Vertical Tabs</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('tabs-vertical', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$tabs = UiEngine::tabs('vertical-tabs')
    ->vertical()           // Vertical layout
    ->navWidth(3)          // Navigation column width (out of 12)
    ->pills()              // Often used with pills for vertical
    ->tab('overview', 'Overview', 'Overview content', true)
    ->tab('details', 'Details', 'Details content')
    ->tab('history', 'History', 'History content');

echo \$tabs->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const tabs = UiEngine.tabs('vertical-tabs')
    .vertical()
    .navWidth(3)
    .pills()
    .tab('overview', 'Overview', 'Overview content', true)
    .tab('details', 'Details', 'Details content')
    .tab('history', 'History', 'History content');

document.getElementById('container').innerHTML = tabs.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Justified and Fill -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Justified and Fill</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('tabs-layout', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Fill - proportionally fill available space
\$tabs = UiEngine::tabs('fill-tabs')
    ->fill()
    ->tab('short', 'Short', 'Short tab content')
    ->tab('much-longer-tab', 'Much Longer Tab', 'Longer tab content');

// Justified - equal width tabs
\$tabs = UiEngine::tabs('justified-tabs')
    ->justified()
    ->tab('tab1', 'Tab 1', 'Content 1')
    ->tab('tab2', 'Tab 2', 'Content 2')
    ->tab('tab3', 'Tab 3', 'Content 3');

echo \$tabs->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Fill - proportionally fill available space
const fillTabs = UiEngine.tabs('fill-tabs')
    .fill()
    .tab('short', 'Short', 'Short tab content')
    .tab('much-longer-tab', 'Much Longer Tab', 'Longer tab content');

// Justified - equal width tabs
const justifiedTabs = UiEngine.tabs('justified-tabs')
    .justified()
    .tab('tab1', 'Tab 1', 'Content 1')
    .tab('tab2', 'Tab 2', 'Content 2')
    .tab('tab3', 'Tab 3', 'Content 3');"
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
                                <td><code>tab()</code></td>
                                <td><code>string $id, string $label, string $content, bool $active, string $icon</code></td>
                                <td>Add a tab</td>
                            </tr>
                            <tr>
                                <td><code>pills()</code></td>
                                <td>-</td>
                                <td>Use pills style</td>
                            </tr>
                            <tr>
                                <td><code>vertical()</code></td>
                                <td>-</td>
                                <td>Vertical layout</td>
                            </tr>
                            <tr>
                                <td><code>fill()</code></td>
                                <td>-</td>
                                <td>Fill available width proportionally</td>
                            </tr>
                            <tr>
                                <td><code>justified()</code></td>
                                <td>-</td>
                                <td>Equal width tabs</td>
                            </tr>
                            <tr>
                                <td><code>navWidth()</code></td>
                                <td><code>int $columns</code></td>
                                <td>Nav column width for vertical tabs</td>
                            </tr>
                            <tr>
                                <td><code>onChange()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Tab change callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
