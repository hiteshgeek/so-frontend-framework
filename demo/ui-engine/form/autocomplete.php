<?php
/**
 * SixOrbit UI Engine - Autocomplete Element Demo
 */

$pageTitle = 'Autocomplete - UI Engine';
$pageDescription = 'Input with autocomplete suggestions from static or remote data';

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
                <li class="so-breadcrumb-item"><a href="../index.php#form">Form Elements</a></li>
                <li class="so-breadcrumb-item so-active">Autocomplete</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">search</span>
            Autocomplete
        </h1>
        <p class="so-page-subtitle">Input element with autocomplete suggestions from static data or remote API endpoints.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Autocomplete -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Autocomplete</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-country">Country</label>
                        <input type="text" class="so-form-control" id="demo-country" placeholder="Start typing a country name..." list="countries-list">
                        <datalist id="countries-list">
                            <option value="United States">
                            <option value="United Kingdom">
                            <option value="Canada">
                            <option value="Australia">
                            <option value="Germany">
                            <option value="France">
                            <option value="Japan">
                            <option value="India">
                        </datalist>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-autocomplete', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$autocomplete = UiEngine::autocomplete('country')
    ->label('Country')
    ->placeholder('Start typing a country name...')
    ->options([
        'United States',
        'United Kingdom',
        'Canada',
        'Australia',
        'Germany',
        'France',
        'Japan',
        'India',
    ]);

echo \$autocomplete->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const autocomplete = UiEngine.autocomplete('country')
    .label('Country')
    .placeholder('Start typing a country name...')
    .options([
        'United States',
        'United Kingdom',
        'Canada',
        'Australia',
        'Germany',
        'France',
        'Japan',
        'India',
    ]);

document.getElementById('container').innerHTML = autocomplete.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="country">Country</label>
    <input type="text" class="so-form-control" id="country" name="country"
           placeholder="Start typing a country name..." list="country-list">
    <datalist id="country-list">
        <option value="United States">
        <option value="United Kingdom">
        <!-- ... more options -->
    </datalist>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Key-Value Options -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Key-Value Options</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('autocomplete-keyvalue', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$autocomplete = UiEngine::autocomplete('user_id')
    ->label('Select User')
    ->placeholder('Search users...')
    ->options([
        '1' => 'John Doe',
        '2' => 'Jane Smith',
        '3' => 'Bob Wilson',
        '4' => 'Alice Brown',
    ])
    ->displayKey('label')  // Show label in dropdown
    ->valueKey('value');   // Submit value

echo \$autocomplete->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const autocomplete = UiEngine.autocomplete('user_id')
    .label('Select User')
    .placeholder('Search users...')
    .options([
        {value: '1', label: 'John Doe'},
        {value: '2', label: 'Jane Smith'},
        {value: '3', label: 'Bob Wilson'},
        {value: '4', label: 'Alice Brown'},
    ])
    .displayKey('label')
    .valueKey('value');

document.getElementById('container').innerHTML = autocomplete.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Remote Data Source -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Remote Data Source</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('autocomplete-remote', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$autocomplete = UiEngine::autocomplete('product')
    ->label('Search Products')
    ->placeholder('Type to search products...')
    ->remote('/api/products/search')
    ->queryParam('q')           // Query parameter name
    ->minChars(2)               // Min chars before searching
    ->debounce(300);            // Debounce delay in ms

echo \$autocomplete->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const autocomplete = UiEngine.autocomplete('product')
    .label('Search Products')
    .placeholder('Type to search products...')
    .remote('/api/products/search')
    .queryParam('q')
    .minChars(2)
    .debounce(300)
    .onSelect((item) => {
        console.log('Selected:', item);
    });

document.getElementById('container').innerHTML = autocomplete.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Templates -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Custom Templates</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('autocomplete-template', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$autocomplete = UiEngine::autocomplete('user')
    ->label('Search Users')
    ->remote('/api/users/search')
    ->template('<div class=\"d-flex align-items-center\">
        <img src=\"{{avatar}}\" class=\"rounded-circle me-2\" width=\"32\">
        <div>
            <div class=\"fw-bold\">{{name}}</div>
            <small class=\"text-muted\">{{email}}</small>
        </div>
    </div>');

echo \$autocomplete->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const autocomplete = UiEngine.autocomplete('user')
    .label('Search Users')
    .remote('/api/users/search')
    .template((item) => `
        <div class=\"d-flex align-items-center\">
            <img src=\"\${item.avatar}\" class=\"rounded-circle me-2\" width=\"32\">
            <div>
                <div class=\"fw-bold\">\${item.name}</div>
                <small class=\"text-muted\">\${item.email}</small>
            </div>
        </div>
    `);

document.getElementById('container').innerHTML = autocomplete.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Multiple Selection -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Multiple Selection</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('autocomplete-multiple', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$autocomplete = UiEngine::autocomplete('tags')
    ->label('Tags')
    ->placeholder('Add tags...')
    ->multiple()
    ->options(['PHP', 'JavaScript', 'Python', 'Ruby', 'Go', 'Rust'])
    ->maxItems(5)
    ->allowCreate(); // Allow creating new tags

echo \$autocomplete->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const autocomplete = UiEngine.autocomplete('tags')
    .label('Tags')
    .placeholder('Add tags...')
    .multiple()
    .options(['PHP', 'JavaScript', 'Python', 'Ruby', 'Go', 'Rust'])
    .maxItems(5)
    .allowCreate(); // Allow creating new tags

document.getElementById('container').innerHTML = autocomplete.toHtml();"
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
                                <td><code>options()</code></td>
                                <td><code>array $options</code></td>
                                <td>Set static options</td>
                            </tr>
                            <tr>
                                <td><code>remote()</code></td>
                                <td><code>string $url</code></td>
                                <td>Set remote data source URL</td>
                            </tr>
                            <tr>
                                <td><code>queryParam()</code></td>
                                <td><code>string $name</code></td>
                                <td>Set query parameter name for remote search</td>
                            </tr>
                            <tr>
                                <td><code>minChars()</code></td>
                                <td><code>int $chars</code></td>
                                <td>Minimum characters before triggering search</td>
                            </tr>
                            <tr>
                                <td><code>debounce()</code></td>
                                <td><code>int $ms</code></td>
                                <td>Debounce delay in milliseconds</td>
                            </tr>
                            <tr>
                                <td><code>multiple()</code></td>
                                <td>-</td>
                                <td>Allow multiple selections</td>
                            </tr>
                            <tr>
                                <td><code>maxItems()</code></td>
                                <td><code>int $max</code></td>
                                <td>Maximum items for multiple selection</td>
                            </tr>
                            <tr>
                                <td><code>template()</code></td>
                                <td><code>string|callable $template</code></td>
                                <td>Custom item template</td>
                            </tr>
                            <tr>
                                <td><code>onSelect()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Selection callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
