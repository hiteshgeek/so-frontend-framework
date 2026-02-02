<?php
/**
 * SixOrbit UI Engine - Table Element Demo
 */

$pageTitle = 'Table - UI Engine';
$pageDescription = 'Data table with sorting, pagination, and actions';

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
                <li class="so-breadcrumb-item so-active">Table</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">table_chart</span>
            Table
        </h1>
        <p class="so-page-subtitle">Data table element with sorting, pagination, search, and row actions.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Table -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Table</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <table class="so-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>Admin</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>Editor</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Bob Wilson</td>
                                <td>bob@example.com</td>
                                <td>User</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-table', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$table = UiEngine::table()
    ->columns(['#', 'Name', 'Email', 'Role'])
    ->rows([
        [1, 'John Doe', 'john@example.com', 'Admin'],
        [2, 'Jane Smith', 'jane@example.com', 'Editor'],
        [3, 'Bob Wilson', 'bob@example.com', 'User'],
    ]);

echo \$table->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const table = UiEngine.table()
    .columns(['#', 'Name', 'Email', 'Role'])
    .rows([
        [1, 'John Doe', 'john@example.com', 'Admin'],
        [2, 'Jane Smith', 'jane@example.com', 'Editor'],
        [3, 'Bob Wilson', 'bob@example.com', 'User'],
    ]);

document.getElementById('container').innerHTML = table.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Table Styles -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Table Styles</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('table-styles', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Striped rows
UiEngine::table()->striped()->columns([...])->rows([...]);

// Bordered table
UiEngine::table()->bordered()->columns([...])->rows([...]);

// Hover effect on rows
UiEngine::table()->hover()->columns([...])->rows([...]);

// Small/compact table
UiEngine::table()->small()->columns([...])->rows([...]);

// Dark theme
UiEngine::table()->dark()->columns([...])->rows([...]);

// Responsive wrapper
UiEngine::table()->responsive()->columns([...])->rows([...]);

// Combined styles
UiEngine::table()
    ->striped()
    ->hover()
    ->bordered()
    ->responsive()
    ->columns([...])
    ->rows([...]);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Striped rows
UiEngine.table().striped().columns([...]).rows([...]);

// Bordered table
UiEngine.table().bordered().columns([...]).rows([...]);

// Hover effect on rows
UiEngine.table().hover().columns([...]).rows([...]);

// Combined styles
UiEngine.table()
    .striped()
    .hover()
    .bordered()
    .responsive()
    .columns([...])
    .rows([...]);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Data Keys -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Data Objects</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('table-data', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Define columns with data keys
\$table = UiEngine::table()
    ->columns([
        ['key' => 'id', 'label' => 'ID', 'width' => '60px'],
        ['key' => 'name', 'label' => 'Name', 'sortable' => true],
        ['key' => 'email', 'label' => 'Email', 'sortable' => true],
        ['key' => 'status', 'label' => 'Status'],
        ['key' => 'created_at', 'label' => 'Created', 'format' => 'date'],
    ])
    ->data(\$users); // Array of objects/arrays

echo \$table->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const table = UiEngine.table()
    .columns([
        {key: 'id', label: 'ID', width: '60px'},
        {key: 'name', label: 'Name', sortable: true},
        {key: 'email', label: 'Email', sortable: true},
        {key: 'status', label: 'Status'},
        {key: 'created_at', label: 'Created', format: 'date'},
    ])
    .data(users);

document.getElementById('container').innerHTML = table.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Actions -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Row Actions</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('table-actions', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$table = UiEngine::table()
    ->columns(['ID', 'Name', 'Email', 'Actions'])
    ->actions([
        UiEngine::button()->icon('visibility')->variant('info')->size('sm')
            ->attr('data-action', 'view'),
        UiEngine::button()->icon('edit')->variant('primary')->size('sm')
            ->attr('data-action', 'edit'),
        UiEngine::button()->icon('delete')->variant('danger')->size('sm')
            ->attr('data-action', 'delete'),
    ])
    ->data(\$users);

echo \$table->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const table = UiEngine.table()
    .columns(['ID', 'Name', 'Email', 'Actions'])
    .actions([
        {icon: 'visibility', variant: 'info', onClick: (row) => viewUser(row)},
        {icon: 'edit', variant: 'primary', onClick: (row) => editUser(row)},
        {icon: 'delete', variant: 'danger', onClick: (row) => deleteUser(row)},
    ])
    .data(users);

document.getElementById('container').innerHTML = table.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Pagination -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Pagination</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('table-pagination', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$table = UiEngine::table()
    ->columns([...])
    ->data(\$users)
    ->pagination([
        'total' => 150,
        'perPage' => 10,
        'currentPage' => 1,
    ]);

// Or with Laravel pagination
\$table = UiEngine::table()
    ->columns([...])
    ->paginate(\$users); // LengthAwarePaginator

echo \$table->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const table = UiEngine.table()
    .columns([...])
    .data(users)
    .pagination({
        total: 150,
        perPage: 10,
        currentPage: 1,
    })
    .onPageChange((page) => {
        fetchData(page);
    });

document.getElementById('container').innerHTML = table.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Sortable and Searchable -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Sortable and Searchable</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('table-features', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$table = UiEngine::table()
    ->columns([
        ['key' => 'name', 'label' => 'Name', 'sortable' => true],
        ['key' => 'email', 'label' => 'Email', 'sortable' => true, 'searchable' => true],
        ['key' => 'role', 'label' => 'Role', 'filterable' => true],
    ])
    ->data(\$users)
    ->searchable()           // Enable global search
    ->sortBy('name', 'asc')  // Default sort
    ->perPageOptions([10, 25, 50, 100]);

echo \$table->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const table = UiEngine.table()
    .columns([
        {key: 'name', label: 'Name', sortable: true},
        {key: 'email', label: 'Email', sortable: true, searchable: true},
        {key: 'role', label: 'Role', filterable: true},
    ])
    .data(users)
    .searchable()
    .sortBy('name', 'asc')
    .onSort((column, direction) => {
        fetchSorted(column, direction);
    })
    .onSearch((query) => {
        fetchFiltered(query);
    });

document.getElementById('container').innerHTML = table.toHtml();"
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
                                <td><code>columns()</code></td>
                                <td><code>array $columns</code></td>
                                <td>Define table columns</td>
                            </tr>
                            <tr>
                                <td><code>data()</code></td>
                                <td><code>array $data</code></td>
                                <td>Set table data</td>
                            </tr>
                            <tr>
                                <td><code>rows()</code></td>
                                <td><code>array $rows</code></td>
                                <td>Set rows directly</td>
                            </tr>
                            <tr>
                                <td><code>striped()</code></td>
                                <td>-</td>
                                <td>Add striped rows</td>
                            </tr>
                            <tr>
                                <td><code>bordered()</code></td>
                                <td>-</td>
                                <td>Add borders</td>
                            </tr>
                            <tr>
                                <td><code>hover()</code></td>
                                <td>-</td>
                                <td>Add hover effect</td>
                            </tr>
                            <tr>
                                <td><code>actions()</code></td>
                                <td><code>array $actions</code></td>
                                <td>Add row action buttons</td>
                            </tr>
                            <tr>
                                <td><code>pagination()</code></td>
                                <td><code>array $config</code></td>
                                <td>Enable pagination</td>
                            </tr>
                            <tr>
                                <td><code>searchable()</code></td>
                                <td>-</td>
                                <td>Enable search</td>
                            </tr>
                            <tr>
                                <td><code>sortBy()</code></td>
                                <td><code>string $column, string $direction</code></td>
                                <td>Set default sort</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
