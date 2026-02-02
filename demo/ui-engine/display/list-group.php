<?php
/**
 * SixOrbit UI Engine - List Group Element Demo
 */

$pageTitle = 'List Group - UI Engine';
$pageDescription = 'Flexible list component for content display';

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
                <li class="so-breadcrumb-item so-active">List Group</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">list</span>
            List Group
        </h1>
        <p class="so-page-subtitle">Flexible component for displaying a series of content with optional actions and badges.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic List Group -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic List Group</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <ul class="so-list-group" style="max-width:400px;">
                        <li class="so-list-group-item">First item</li>
                        <li class="so-list-group-item">Second item</li>
                        <li class="so-list-group-item">Third item</li>
                        <li class="so-list-group-item">Fourth item</li>
                    </ul>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-list', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$list = UiEngine::listGroup()
    ->item('First item')
    ->item('Second item')
    ->item('Third item')
    ->item('Fourth item');

echo \$list->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const list = UiEngine.listGroup()
    .item('First item')
    .item('Second item')
    .item('Third item')
    .item('Fourth item');

document.getElementById('container').innerHTML = list.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Active and Disabled -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Active and Disabled States</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <ul class="so-list-group" style="max-width:400px;">
                        <li class="so-list-group-item active">Active item</li>
                        <li class="so-list-group-item">Regular item</li>
                        <li class="so-list-group-item disabled">Disabled item</li>
                        <li class="so-list-group-item">Another item</li>
                    </ul>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('list-states', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$list = UiEngine::listGroup()
    ->item('Active item', ['active' => true])
    ->item('Regular item')
    ->item('Disabled item', ['disabled' => true])
    ->item('Another item');

echo \$list->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const list = UiEngine.listGroup()
    .item('Active item', {active: true})
    .item('Regular item')
    .item('Disabled item', {disabled: true})
    .item('Another item');

document.getElementById('container').innerHTML = list.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Links -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Actionable Items (Links/Buttons)</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-list-group" style="max-width:400px;">
                        <a href="#" class="so-list-group-item so-list-group-item-action active">
                            Active link item
                        </a>
                        <a href="#" class="so-list-group-item so-list-group-item-action">
                            Link item
                        </a>
                        <a href="#" class="so-list-group-item so-list-group-item-action">
                            Another link
                        </a>
                        <a href="#" class="so-list-group-item so-list-group-item-action disabled">
                            Disabled link
                        </a>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('list-links', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$list = UiEngine::listGroup()
    ->actionable()  // Make items clickable
    ->item('Active link item', ['url' => '#', 'active' => true])
    ->item('Link item', ['url' => '/page'])
    ->item('Another link', ['url' => '/another'])
    ->item('Disabled link', ['url' => '#', 'disabled' => true]);

echo \$list->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const list = UiEngine.listGroup()
    .actionable()
    .item('Active link item', {url: '#', active: true})
    .item('Link item', {url: '/page'})
    .item('Another link', {url: '/another'})
    .item('Disabled link', {url: '#', disabled: true});

document.getElementById('container').innerHTML = list.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Badges -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Badges</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <ul class="so-list-group" style="max-width:400px;">
                        <li class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                            Inbox
                            <span class="so-badge so-bg-primary so-rounded-pill">14</span>
                        </li>
                        <li class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                            Drafts
                            <span class="so-badge so-bg-secondary so-rounded-pill">3</span>
                        </li>
                        <li class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                            Sent
                            <span class="so-badge so-bg-success so-rounded-pill">99+</span>
                        </li>
                    </ul>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('list-badges', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$list = UiEngine::listGroup()
    ->item('Inbox', ['badge' => 14, 'badgeVariant' => 'primary'])
    ->item('Drafts', ['badge' => 3, 'badgeVariant' => 'secondary'])
    ->item('Sent', ['badge' => '99+', 'badgeVariant' => 'success']);

echo \$list->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const list = UiEngine.listGroup()
    .item('Inbox', {badge: 14, badgeVariant: 'primary'})
    .item('Drafts', {badge: 3, badgeVariant: 'secondary'})
    .item('Sent', {badge: '99+', badgeVariant: 'success'});

document.getElementById('container').innerHTML = list.toHtml();"
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
                    <div class="so-list-group" style="max-width:400px;">
                        <a href="#" class="so-list-group-item so-list-group-item-action so-d-flex so-align-items-center">
                            <span class="material-icons so-me-3 so-text-primary">home</span>
                            Dashboard
                        </a>
                        <a href="#" class="so-list-group-item so-list-group-item-action so-d-flex so-align-items-center">
                            <span class="material-icons so-me-3 so-text-primary">person</span>
                            Profile
                        </a>
                        <a href="#" class="so-list-group-item so-list-group-item-action so-d-flex so-align-items-center">
                            <span class="material-icons so-me-3 so-text-primary">settings</span>
                            Settings
                        </a>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('list-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$list = UiEngine::listGroup()
    ->actionable()
    ->item('Dashboard', ['icon' => 'home', 'url' => '/dashboard'])
    ->item('Profile', ['icon' => 'person', 'url' => '/profile'])
    ->item('Settings', ['icon' => 'settings', 'url' => '/settings']);

echo \$list->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const list = UiEngine.listGroup()
    .actionable()
    .item('Dashboard', {icon: 'home', url: '/dashboard'})
    .item('Profile', {icon: 'person', url: '/profile'})
    .item('Settings', {icon: 'settings', url: '/settings'});

document.getElementById('container').innerHTML = list.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Flush Style -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Flush Style (No Borders)</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('list-flush', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$list = UiEngine::listGroup()
    ->flush()  // Remove borders and rounded corners
    ->item('First item')
    ->item('Second item')
    ->item('Third item');

echo \$list->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const list = UiEngine.listGroup()
    .flush()
    .item('First item')
    .item('Second item')
    .item('Third item');

document.getElementById('container').innerHTML = list.toHtml();"
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
                                <td><code>string $content, array $options</code></td>
                                <td>Add list item</td>
                            </tr>
                            <tr>
                                <td><code>items()</code></td>
                                <td><code>array $items</code></td>
                                <td>Add multiple items</td>
                            </tr>
                            <tr>
                                <td><code>actionable()</code></td>
                                <td>-</td>
                                <td>Make items clickable</td>
                            </tr>
                            <tr>
                                <td><code>flush()</code></td>
                                <td>-</td>
                                <td>Remove borders</td>
                            </tr>
                            <tr>
                                <td><code>horizontal()</code></td>
                                <td>-</td>
                                <td>Horizontal layout</td>
                            </tr>
                            <tr>
                                <td><code>numbered()</code></td>
                                <td>-</td>
                                <td>Add numbers to items</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
