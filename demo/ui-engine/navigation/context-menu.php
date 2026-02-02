<?php
/**
 * SixOrbit UI Engine - Context Menu Element Demo
 */

$pageTitle = 'Context Menu - UI Engine';
$pageDescription = 'Right-click contextual menus for elements';

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
                <li class="so-breadcrumb-item so-active">Context Menu</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">more_vert</span>
            Context Menu
        </h1>
        <p class="so-page-subtitle">Right-click contextual menus with customizable items, icons, and keyboard shortcuts.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Context Menu -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Context Menu</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-p-5 so-bg-white so-border so-rounded so-text-center" style="cursor:context-menu;" data-so-context-menu="demo-menu">
                        <span class="material-icons so-text-muted so-mb-2" style="font-size:48px;">mouse</span>
                        <p class="so-mb-0">Right-click anywhere in this area</p>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-context', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$contextMenu = UiEngine::contextMenu('demo-menu')
    ->item('Cut', 'cut')
    ->item('Copy', 'copy')
    ->item('Paste', 'paste')
    ->divider()
    ->item('Delete', 'delete');

// Attach to element
\$element = UiEngine::div()
    ->contextMenu(\$contextMenu)
    ->content('Right-click me!');

echo \$element->render();
echo \$contextMenu->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const contextMenu = UiEngine.contextMenu('demo-menu')
    .item('Cut', 'cut')
    .item('Copy', 'copy')
    .item('Paste', 'paste')
    .divider()
    .item('Delete', 'delete');

// Attach to element
document.getElementById('myElement').addEventListener('contextmenu', (e) => {
    e.preventDefault();
    contextMenu.show(e.clientX, e.clientY);
});

document.body.appendChild(contextMenu.toElement());"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-context-menu" id="demo-menu" role="menu">
    <div class="so-context-menu-item" role="menuitem" data-action="cut">Cut</div>
    <div class="so-context-menu-item" role="menuitem" data-action="copy">Copy</div>
    <div class="so-context-menu-item" role="menuitem" data-action="paste">Paste</div>
    <div class="so-context-menu-divider"></div>
    <div class="so-context-menu-item" role="menuitem" data-action="delete">Delete</div>
</div>'
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
                <?= so_code_tabs('context-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$contextMenu = UiEngine::contextMenu('file-menu')
    ->item('Open', 'open', ['icon' => 'folder_open'])
    ->item('Edit', 'edit', ['icon' => 'edit'])
    ->item('Rename', 'rename', ['icon' => 'drive_file_rename_outline'])
    ->divider()
    ->item('Download', 'download', ['icon' => 'download'])
    ->item('Share', 'share', ['icon' => 'share'])
    ->divider()
    ->item('Delete', 'delete', ['icon' => 'delete', 'class' => 'so-text-danger']);

echo \$contextMenu->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const contextMenu = UiEngine.contextMenu('file-menu')
    .item('Open', 'open', {icon: 'folder_open'})
    .item('Edit', 'edit', {icon: 'edit'})
    .item('Rename', 'rename', {icon: 'drive_file_rename_outline'})
    .divider()
    .item('Download', 'download', {icon: 'download'})
    .item('Share', 'share', {icon: 'share'})
    .divider()
    .item('Delete', 'delete', {icon: 'delete', class: 'so-text-danger'});"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Keyboard Shortcuts -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Keyboard Shortcuts</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('context-shortcuts', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$contextMenu = UiEngine::contextMenu('edit-menu')
    ->item('Undo', 'undo', [
        'icon' => 'undo',
        'shortcut' => 'Ctrl+Z',
    ])
    ->item('Redo', 'redo', [
        'icon' => 'redo',
        'shortcut' => 'Ctrl+Y',
    ])
    ->divider()
    ->item('Cut', 'cut', [
        'icon' => 'content_cut',
        'shortcut' => 'Ctrl+X',
    ])
    ->item('Copy', 'copy', [
        'icon' => 'content_copy',
        'shortcut' => 'Ctrl+C',
    ])
    ->item('Paste', 'paste', [
        'icon' => 'content_paste',
        'shortcut' => 'Ctrl+V',
    ]);

echo \$contextMenu->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const contextMenu = UiEngine.contextMenu('edit-menu')
    .item('Undo', 'undo', {
        icon: 'undo',
        shortcut: 'Ctrl+Z',
    })
    .item('Redo', 'redo', {
        icon: 'redo',
        shortcut: 'Ctrl+Y',
    })
    .divider()
    .item('Cut', 'cut', {
        icon: 'content_cut',
        shortcut: 'Ctrl+X',
    })
    .item('Copy', 'copy', {
        icon: 'content_copy',
        shortcut: 'Ctrl+C',
    })
    .item('Paste', 'paste', {
        icon: 'content_paste',
        shortcut: 'Ctrl+V',
    });"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Submenus -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Submenus</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('context-submenu', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$contextMenu = UiEngine::contextMenu('view-menu')
    ->item('New', 'new', ['icon' => 'add'])
    ->submenu('View', 'view', ['icon' => 'visibility'], function(\$sub) {
        \$sub->item('List', 'view-list', ['icon' => 'view_list'])
            ->item('Grid', 'view-grid', ['icon' => 'grid_view'])
            ->item('Table', 'view-table', ['icon' => 'table_chart']);
    })
    ->submenu('Sort by', 'sort', ['icon' => 'sort'], function(\$sub) {
        \$sub->item('Name', 'sort-name')
            ->item('Date', 'sort-date')
            ->item('Size', 'sort-size')
            ->item('Type', 'sort-type');
    })
    ->divider()
    ->item('Refresh', 'refresh', ['icon' => 'refresh', 'shortcut' => 'F5']);

echo \$contextMenu->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const contextMenu = UiEngine.contextMenu('view-menu')
    .item('New', 'new', {icon: 'add'})
    .submenu('View', 'view', {icon: 'visibility'}, (sub) => {
        sub.item('List', 'view-list', {icon: 'view_list'})
           .item('Grid', 'view-grid', {icon: 'grid_view'})
           .item('Table', 'view-table', {icon: 'table_chart'});
    })
    .submenu('Sort by', 'sort', {icon: 'sort'}, (sub) => {
        sub.item('Name', 'sort-name')
           .item('Date', 'sort-date')
           .item('Size', 'sort-size')
           .item('Type', 'sort-type');
    })
    .divider()
    .item('Refresh', 'refresh', {icon: 'refresh', shortcut: 'F5'});"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Disabled Items -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Disabled Items</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('context-disabled', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$contextMenu = UiEngine::contextMenu('action-menu')
    ->item('Undo', 'undo', ['disabled' => true])  // Disabled
    ->item('Redo', 'redo', ['disabled' => true])  // Disabled
    ->divider()
    ->item('Cut', 'cut')
    ->item('Copy', 'copy')
    ->item('Paste', 'paste', ['disabled' => \$clipboardEmpty]);

echo \$contextMenu->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const contextMenu = UiEngine.contextMenu('action-menu')
    .item('Undo', 'undo', {disabled: true})
    .item('Redo', 'redo', {disabled: true})
    .divider()
    .item('Cut', 'cut')
    .item('Copy', 'copy')
    .item('Paste', 'paste', {disabled: clipboardEmpty});

// Enable/disable dynamically
contextMenu.setItemDisabled('undo', canUndo === false);
contextMenu.setItemDisabled('paste', clipboardEmpty);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Checkbox and Radio Items -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Checkbox and Radio Items</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('context-checkable', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$contextMenu = UiEngine::contextMenu('options-menu')
    // Checkbox items
    ->checkbox('Show Hidden Files', 'show-hidden', true)  // Checked
    ->checkbox('Show Extensions', 'show-ext', true)       // Checked
    ->checkbox('Show Thumbnails', 'show-thumb', false)    // Unchecked
    ->divider()
    // Radio group
    ->radioGroup('view-mode', [
        ['label' => 'Icons', 'value' => 'icons'],
        ['label' => 'List', 'value' => 'list', 'checked' => true],
        ['label' => 'Details', 'value' => 'details'],
    ]);

echo \$contextMenu->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const contextMenu = UiEngine.contextMenu('options-menu')
    // Checkbox items
    .checkbox('Show Hidden Files', 'show-hidden', true)
    .checkbox('Show Extensions', 'show-ext', true)
    .checkbox('Show Thumbnails', 'show-thumb', false)
    .divider()
    // Radio group
    .radioGroup('view-mode', [
        {label: 'Icons', value: 'icons'},
        {label: 'List', value: 'list', checked: true},
        {label: 'Details', value: 'details'},
    ]);

// Handle selection
contextMenu.on('select', (action, value, checked) => {
    console.log(`${action}: ${checked}`)
});"
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
                <?= so_code_tabs('context-events', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Define menu items with action handlers
\$contextMenu = UiEngine::contextMenu('file-actions')
    ->item('Open', 'open', ['icon' => 'open_in_new'])
    ->item('Edit', 'edit', ['icon' => 'edit'])
    ->item('Delete', 'delete', ['icon' => 'delete', 'confirm' => true]);

// The frontend JS handles the action events
echo \$contextMenu->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const contextMenu = UiEngine.contextMenu('file-actions')
    .item('Open', 'open', {icon: 'open_in_new'})
    .item('Edit', 'edit', {icon: 'edit'})
    .item('Delete', 'delete', {icon: 'delete'});

// Listen for item selection
contextMenu.on('select', (action, element) => {
    switch (action) {
        case 'open':
            openFile(element.dataset.fileId);
            break;
        case 'edit':
            editFile(element.dataset.fileId);
            break;
        case 'delete':
            if (confirm('Are you sure?')) {
                deleteFile(element.dataset.fileId);
            }
            break;
    }
});

// Listen for menu open/close
contextMenu.on('show', (e) => console.log('Menu opened'));
contextMenu.on('hide', () => console.log('Menu closed'));"
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
                                <td><code>string $label, string $action, array $options</code></td>
                                <td>Add menu item</td>
                            </tr>
                            <tr>
                                <td><code>divider()</code></td>
                                <td>-</td>
                                <td>Add horizontal divider</td>
                            </tr>
                            <tr>
                                <td><code>submenu()</code></td>
                                <td><code>string $label, string $id, array $options, callable $builder</code></td>
                                <td>Add nested submenu</td>
                            </tr>
                            <tr>
                                <td><code>checkbox()</code></td>
                                <td><code>string $label, string $action, bool $checked</code></td>
                                <td>Add checkbox item</td>
                            </tr>
                            <tr>
                                <td><code>radioGroup()</code></td>
                                <td><code>string $name, array $items</code></td>
                                <td>Add radio button group</td>
                            </tr>
                            <tr>
                                <td><code>show()</code></td>
                                <td><code>int $x, int $y</code></td>
                                <td>Show menu at coordinates (JS)</td>
                            </tr>
                            <tr>
                                <td><code>hide()</code></td>
                                <td>-</td>
                                <td>Hide the menu (JS)</td>
                            </tr>
                            <tr>
                                <td><code>on()</code></td>
                                <td><code>string $event, callable $handler</code></td>
                                <td>Listen for events (JS)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
