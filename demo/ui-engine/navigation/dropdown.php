<?php
/**
 * SixOrbit UI Engine - Dropdown Element Demo
 */

$pageTitle = 'Dropdown - UI Engine';
$pageDescription = 'Toggle contextual overlays for displaying links and actions';

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
                <li class="so-breadcrumb-item so-active">Dropdown</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">arrow_drop_down_circle</span>
            Dropdown
        </h1>
        <p class="so-page-subtitle">Toggle contextual overlays for displaying lists of links and actions.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Dropdown -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Dropdown</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-dropdown">
                        <button class="so-btn so-btn-primary so-dropdown-toggle" type="button" data-so-toggle="dropdown">
                            Dropdown Button
                        </button>
                        <ul class="so-dropdown-menu">
                            <li><a class="so-dropdown-item" href="#">Action</a></li>
                            <li><a class="so-dropdown-item" href="#">Another action</a></li>
                            <li><a class="so-dropdown-item" href="#">Something else</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-dropdown', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$dropdown = UiEngine::dropdown('Actions')
    ->item('Action', '/action')
    ->item('Another action', '/another')
    ->item('Something else', '/else');

echo \$dropdown->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const dropdown = UiEngine.dropdown('Actions')
    .item('Action', '/action')
    .item('Another action', '/another')
    .item('Something else', '/else');

document.getElementById('container').innerHTML = dropdown.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-dropdown">
    <button class="so-btn so-btn-primary so-dropdown-toggle"
            type="button" data-so-toggle="dropdown">
        Actions
    </button>
    <ul class="so-dropdown-menu">
        <li><a class="so-dropdown-item" href="/action">Action</a></li>
        <li><a class="so-dropdown-item" href="/another">Another action</a></li>
        <li><a class="so-dropdown-item" href="/else">Something else</a></li>
    </ul>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Dropdown Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Dropdown Variants</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex so-gap-2 so-flex-wrap">
                        <div class="so-dropdown">
                            <button class="so-btn so-btn-primary so-dropdown-toggle" type="button" data-so-toggle="dropdown">Primary</button>
                            <ul class="so-dropdown-menu">
                                <li><a class="so-dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                        <div class="so-dropdown">
                            <button class="so-btn so-btn-secondary so-dropdown-toggle" type="button" data-so-toggle="dropdown">Secondary</button>
                            <ul class="so-dropdown-menu">
                                <li><a class="so-dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                        <div class="so-dropdown">
                            <button class="so-btn so-btn-success so-dropdown-toggle" type="button" data-so-toggle="dropdown">Success</button>
                            <ul class="so-dropdown-menu">
                                <li><a class="so-dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                        <div class="so-dropdown">
                            <button class="so-btn so-btn-danger so-dropdown-toggle" type="button" data-so-toggle="dropdown">Danger</button>
                            <ul class="so-dropdown-menu">
                                <li><a class="so-dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('dropdown-variants', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Primary (default)
UiEngine::dropdown('Primary')
    ->variant('primary')
    ->item('Action', '#');

// Secondary
UiEngine::dropdown('Secondary')
    ->variant('secondary')
    ->item('Action', '#');

// Success
UiEngine::dropdown('Success')
    ->variant('success')
    ->item('Action', '#');

// Danger
UiEngine::dropdown('Danger')
    ->variant('danger')
    ->item('Action', '#');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Primary (default)
UiEngine.dropdown('Primary')
    .variant('primary')
    .item('Action', '#');

// Secondary
UiEngine.dropdown('Secondary')
    .variant('secondary')
    .item('Action', '#');

// Success
UiEngine.dropdown('Success')
    .variant('success')
    .item('Action', '#');

// Danger
UiEngine.dropdown('Danger')
    .variant('danger')
    .item('Action', '#');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Dividers and Headers -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Dividers and Headers</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-dropdown">
                        <button class="so-btn so-btn-primary so-dropdown-toggle" type="button" data-so-toggle="dropdown">
                            Actions
                        </button>
                        <ul class="so-dropdown-menu">
                            <li><h6 class="so-dropdown-header">Actions</h6></li>
                            <li><a class="so-dropdown-item" href="#">Edit</a></li>
                            <li><a class="so-dropdown-item" href="#">Duplicate</a></li>
                            <li><hr class="so-dropdown-divider"></li>
                            <li><h6 class="so-dropdown-header">Danger Zone</h6></li>
                            <li><a class="so-dropdown-item so-text-danger" href="#">Delete</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('dropdown-dividers', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$dropdown = UiEngine::dropdown('Actions')
    ->header('Actions')
    ->item('Edit', '/edit')
    ->item('Duplicate', '/duplicate')
    ->divider()
    ->header('Danger Zone')
    ->item('Delete', '/delete', ['class' => 'so-text-danger']);

echo \$dropdown->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const dropdown = UiEngine.dropdown('Actions')
    .header('Actions')
    .item('Edit', '/edit')
    .item('Duplicate', '/duplicate')
    .divider()
    .header('Danger Zone')
    .item('Delete', '/delete', {class: 'so-text-danger'});

document.getElementById('container').innerHTML = dropdown.toHtml();"
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
                    <div class="so-dropdown">
                        <button class="so-btn so-btn-primary so-dropdown-toggle" type="button" data-so-toggle="dropdown">
                            <span class="material-icons so-me-1">settings</span>
                            Settings
                        </button>
                        <ul class="so-dropdown-menu">
                            <li><a class="so-dropdown-item so-d-flex so-align-items-center" href="#">
                                <span class="material-icons so-me-2">person</span> Profile
                            </a></li>
                            <li><a class="so-dropdown-item so-d-flex so-align-items-center" href="#">
                                <span class="material-icons so-me-2">settings</span> Settings
                            </a></li>
                            <li><hr class="so-dropdown-divider"></li>
                            <li><a class="so-dropdown-item so-d-flex so-align-items-center" href="#">
                                <span class="material-icons so-me-2">logout</span> Logout
                            </a></li>
                        </ul>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('dropdown-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$dropdown = UiEngine::dropdown('Settings')
    ->icon('settings')
    ->item('Profile', '/profile', ['icon' => 'person'])
    ->item('Settings', '/settings', ['icon' => 'settings'])
    ->divider()
    ->item('Logout', '/logout', ['icon' => 'logout']);

echo \$dropdown->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const dropdown = UiEngine.dropdown('Settings')
    .icon('settings')
    .item('Profile', '/profile', {icon: 'person'})
    .item('Settings', '/settings', {icon: 'settings'})
    .divider()
    .item('Logout', '/logout', {icon: 'logout'});

document.getElementById('container').innerHTML = dropdown.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Dropdown Directions -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Dropdown Directions</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('dropdown-directions', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Dropdown (default - opens down)
UiEngine::dropdown('Dropdown')
    ->direction('down')
    ->item('Action', '#');

// Dropup (opens up)
UiEngine::dropdown('Dropup')
    ->direction('up')
    ->item('Action', '#');

// Dropstart (opens left)
UiEngine::dropdown('Dropstart')
    ->direction('start')
    ->item('Action', '#');

// Dropend (opens right)
UiEngine::dropdown('Dropend')
    ->direction('end')
    ->item('Action', '#');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Dropdown (default - opens down)
UiEngine.dropdown('Dropdown')
    .direction('down')
    .item('Action', '#');

// Dropup (opens up)
UiEngine.dropdown('Dropup')
    .direction('up')
    .item('Action', '#');

// Dropstart (opens left)
UiEngine.dropdown('Dropstart')
    .direction('start')
    .item('Action', '#');

// Dropend (opens right)
UiEngine.dropdown('Dropend')
    .direction('end')
    .item('Action', '#');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Split Button Dropdown -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Split Button Dropdown</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-btn-group">
                        <button type="button" class="so-btn so-btn-primary">Save</button>
                        <button type="button" class="so-btn so-btn-primary so-dropdown-toggle so-dropdown-toggle-split" data-so-toggle="dropdown">
                            <span class="so-visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="so-dropdown-menu">
                            <li><a class="so-dropdown-item" href="#">Save as Draft</a></li>
                            <li><a class="so-dropdown-item" href="#">Save and Publish</a></li>
                            <li><a class="so-dropdown-item" href="#">Save and Close</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('dropdown-split', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$dropdown = UiEngine::dropdown('Save')
    ->split()  // Create split button
    ->variant('primary')
    ->item('Save as Draft', '/save-draft')
    ->item('Save and Publish', '/save-publish')
    ->item('Save and Close', '/save-close');

echo \$dropdown->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const dropdown = UiEngine.dropdown('Save')
    .split()
    .variant('primary')
    .item('Save as Draft', '/save-draft')
    .item('Save and Publish', '/save-publish')
    .item('Save and Close', '/save-close');

document.getElementById('container').innerHTML = dropdown.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Menu Alignment -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Menu Alignment</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('dropdown-align', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Left aligned (default)
UiEngine::dropdown('Left Aligned')
    ->align('start')
    ->item('Action', '#');

// Right aligned
UiEngine::dropdown('Right Aligned')
    ->align('end')
    ->item('Action', '#');

// Responsive alignment
UiEngine::dropdown('Responsive')
    ->align('lg-end')  // Right aligned on large screens
    ->item('Action', '#');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Left aligned (default)
UiEngine.dropdown('Left Aligned')
    .align('start')
    .item('Action', '#');

// Right aligned
UiEngine.dropdown('Right Aligned')
    .align('end')
    .item('Action', '#');

// Responsive alignment
UiEngine.dropdown('Responsive')
    .align('lg-end')
    .item('Action', '#');"
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
                                <td><code>string $label, string $url, array $options</code></td>
                                <td>Add dropdown item</td>
                            </tr>
                            <tr>
                                <td><code>items()</code></td>
                                <td><code>array $items</code></td>
                                <td>Add multiple items at once</td>
                            </tr>
                            <tr>
                                <td><code>divider()</code></td>
                                <td>-</td>
                                <td>Add horizontal divider</td>
                            </tr>
                            <tr>
                                <td><code>header()</code></td>
                                <td><code>string $text</code></td>
                                <td>Add section header</td>
                            </tr>
                            <tr>
                                <td><code>variant()</code></td>
                                <td><code>string $variant</code></td>
                                <td>Button variant: primary, secondary, etc.</td>
                            </tr>
                            <tr>
                                <td><code>direction()</code></td>
                                <td><code>string $direction</code></td>
                                <td>Open direction: up, down, start, end</td>
                            </tr>
                            <tr>
                                <td><code>align()</code></td>
                                <td><code>string $alignment</code></td>
                                <td>Menu alignment: start, end</td>
                            </tr>
                            <tr>
                                <td><code>split()</code></td>
                                <td>-</td>
                                <td>Create split button dropdown</td>
                            </tr>
                            <tr>
                                <td><code>icon()</code></td>
                                <td><code>string $icon</code></td>
                                <td>Add icon to toggle button</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
