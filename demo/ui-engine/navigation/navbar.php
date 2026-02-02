<?php
/**
 * SixOrbit UI Engine - Navbar Element Demo
 */

$pageTitle = 'Navbar - UI Engine';
$pageDescription = 'Responsive navigation header with branding and navigation';

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
                <li class="so-breadcrumb-item so-active">Navbar</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">web</span>
            Navbar
        </h1>
        <p class="so-page-subtitle">Responsive navigation header with branding, navigation links, and action items.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Navbar -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Navbar</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-rounded" style="background:#f8f9fa;">
                    <nav class="so-navbar so-navbar-expand-lg so-navbar-light so-bg-light">
                        <div class="so-container-fluid">
                            <a class="so-navbar-brand" href="#">Brand</a>
                            <button class="so-navbar-toggler" type="button">
                                <span class="so-navbar-toggler-icon"></span>
                            </button>
                            <div class="so-navbar-collapse">
                                <ul class="so-navbar-nav so-me-auto">
                                    <li class="so-nav-item">
                                        <a class="so-nav-link active" href="#">Home</a>
                                    </li>
                                    <li class="so-nav-item">
                                        <a class="so-nav-link" href="#">Features</a>
                                    </li>
                                    <li class="so-nav-item">
                                        <a class="so-nav-link" href="#">Pricing</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-navbar', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$navbar = UiEngine::navbar()
    ->brand('Brand', '/')
    ->item('Home', '/', ['active' => true])
    ->item('Features', '/features')
    ->item('Pricing', '/pricing');

echo \$navbar->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const navbar = UiEngine.navbar()
    .brand('Brand', '/')
    .item('Home', '/', {active: true})
    .item('Features', '/features')
    .item('Pricing', '/pricing');

document.getElementById('header').innerHTML = navbar.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<nav class="so-navbar so-navbar-expand-lg so-navbar-light so-bg-light">
    <div class="so-container-fluid">
        <a class="so-navbar-brand" href="/">Brand</a>
        <button class="so-navbar-toggler" type="button"
                data-so-toggle="collapse" data-so-target="#navbarNav">
            <span class="so-navbar-toggler-icon"></span>
        </button>
        <div class="so-collapse so-navbar-collapse" id="navbarNav">
            <ul class="so-navbar-nav so-me-auto">
                <li class="so-nav-item">
                    <a class="so-nav-link active" href="/">Home</a>
                </li>
                <li class="so-nav-item">
                    <a class="so-nav-link" href="/features">Features</a>
                </li>
                <li class="so-nav-item">
                    <a class="so-nav-link" href="/pricing">Pricing</a>
                </li>
            </ul>
        </div>
    </div>
</nav>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Logo -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Logo</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-rounded" style="background:#f8f9fa;">
                    <nav class="so-navbar so-navbar-expand-lg so-navbar-light so-bg-light">
                        <div class="so-container-fluid">
                            <a class="so-navbar-brand so-d-flex so-align-items-center" href="#">
                                <span class="material-icons so-me-2 so-text-primary">hexagon</span>
                                <span class="so-fw-bold">SixOrbit</span>
                            </a>
                            <div class="so-navbar-collapse">
                                <ul class="so-navbar-nav so-me-auto">
                                    <li class="so-nav-item"><a class="so-nav-link" href="#">Products</a></li>
                                    <li class="so-nav-item"><a class="so-nav-link" href="#">Solutions</a></li>
                                    <li class="so-nav-item"><a class="so-nav-link" href="#">Resources</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('navbar-logo', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$navbar = UiEngine::navbar()
    ->brand('SixOrbit', '/', [
        'icon' => 'hexagon',
        // or 'logo' => '/images/logo.png',
    ])
    ->item('Products', '/products')
    ->item('Solutions', '/solutions')
    ->item('Resources', '/resources');

echo \$navbar->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const navbar = UiEngine.navbar()
    .brand('SixOrbit', '/', {
        icon: 'hexagon',
        // or logo: '/images/logo.png',
    })
    .item('Products', '/products')
    .item('Solutions', '/solutions')
    .item('Resources', '/resources');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Color Schemes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Color Schemes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-rounded">
                    <nav class="so-navbar so-navbar-dark so-bg-dark so-mb-2">
                        <div class="so-container-fluid">
                            <a class="so-navbar-brand" href="#">Dark Navbar</a>
                        </div>
                    </nav>
                    <nav class="so-navbar so-navbar-dark so-bg-primary so-mb-2">
                        <div class="so-container-fluid">
                            <a class="so-navbar-brand" href="#">Primary Navbar</a>
                        </div>
                    </nav>
                    <nav class="so-navbar so-navbar-light" style="background-color:#e3f2fd;">
                        <div class="so-container-fluid">
                            <a class="so-navbar-brand" href="#">Custom Color</a>
                        </div>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('navbar-colors', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Dark navbar
UiEngine::navbar()
    ->theme('dark')
    ->background('dark')
    ->brand('Dark Navbar');

// Primary colored navbar
UiEngine::navbar()
    ->theme('dark')
    ->background('primary')
    ->brand('Primary Navbar');

// Custom background color
UiEngine::navbar()
    ->theme('light')
    ->style('background-color', '#e3f2fd')
    ->brand('Custom Color');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Dark navbar
UiEngine.navbar()
    .theme('dark')
    .background('dark')
    .brand('Dark Navbar');

// Primary colored navbar
UiEngine.navbar()
    .theme('dark')
    .background('primary')
    .brand('Primary Navbar');

// Custom background color
UiEngine.navbar()
    .theme('light')
    .style('background-color', '#e3f2fd')
    .brand('Custom Color');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Dropdown -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Dropdown</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('navbar-dropdown', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$navbar = UiEngine::navbar()
    ->brand('Brand', '/')
    ->item('Home', '/')
    ->dropdown('Products', [
        ['label' => 'Product A', 'url' => '/products/a'],
        ['label' => 'Product B', 'url' => '/products/b'],
        ['divider' => true],
        ['label' => 'All Products', 'url' => '/products'],
    ])
    ->dropdown('Resources', [
        ['label' => 'Documentation', 'url' => '/docs'],
        ['label' => 'API Reference', 'url' => '/api'],
        ['label' => 'Support', 'url' => '/support'],
    ])
    ->item('Contact', '/contact');

echo \$navbar->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const navbar = UiEngine.navbar()
    .brand('Brand', '/')
    .item('Home', '/')
    .dropdown('Products', [
        {label: 'Product A', url: '/products/a'},
        {label: 'Product B', url: '/products/b'},
        {divider: true},
        {label: 'All Products', url: '/products'},
    ])
    .dropdown('Resources', [
        {label: 'Documentation', url: '/docs'},
        {label: 'API Reference', url: '/api'},
        {label: 'Support', url: '/support'},
    ])
    .item('Contact', '/contact');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Search -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Search Form</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-rounded" style="background:#f8f9fa;">
                    <nav class="so-navbar so-navbar-expand-lg so-navbar-light so-bg-light">
                        <div class="so-container-fluid">
                            <a class="so-navbar-brand" href="#">Brand</a>
                            <div class="so-navbar-collapse">
                                <ul class="so-navbar-nav so-me-auto">
                                    <li class="so-nav-item"><a class="so-nav-link" href="#">Home</a></li>
                                </ul>
                                <form class="so-d-flex" role="search">
                                    <input class="so-form-control so-me-2" type="search" placeholder="Search">
                                    <button class="so-btn so-btn-outline-primary" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('navbar-search', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$navbar = UiEngine::navbar()
    ->brand('Brand', '/')
    ->item('Home', '/')
    ->search('/search', [
        'placeholder' => 'Search...',
        'button' => 'Search',
    ]);

echo \$navbar->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const navbar = UiEngine.navbar()
    .brand('Brand', '/')
    .item('Home', '/')
    .search('/search', {
        placeholder: 'Search...',
        button: 'Search',
    });"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Action Buttons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Action Buttons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-rounded" style="background:#f8f9fa;">
                    <nav class="so-navbar so-navbar-expand-lg so-navbar-light so-bg-light">
                        <div class="so-container-fluid">
                            <a class="so-navbar-brand" href="#">Brand</a>
                            <div class="so-navbar-collapse">
                                <ul class="so-navbar-nav so-me-auto">
                                    <li class="so-nav-item"><a class="so-nav-link" href="#">Features</a></li>
                                    <li class="so-nav-item"><a class="so-nav-link" href="#">Pricing</a></li>
                                </ul>
                                <div class="so-d-flex so-gap-2">
                                    <a href="/login" class="so-btn so-btn-outline-primary">Login</a>
                                    <a href="/register" class="so-btn so-btn-primary">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('navbar-actions', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$navbar = UiEngine::navbar()
    ->brand('Brand', '/')
    ->item('Features', '/features')
    ->item('Pricing', '/pricing')
    ->action('Login', '/login', ['variant' => 'outline-primary'])
    ->action('Sign Up', '/register', ['variant' => 'primary']);

echo \$navbar->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const navbar = UiEngine.navbar()
    .brand('Brand', '/')
    .item('Features', '/features')
    .item('Pricing', '/pricing')
    .action('Login', '/login', {variant: 'outline-primary'})
    .action('Sign Up', '/register', {variant: 'primary'});"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Fixed Position -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Fixed Position</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('navbar-fixed', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Fixed to top
UiEngine::navbar()
    ->fixed('top')
    ->brand('Brand')
    ->item('Home', '/');

// Fixed to bottom
UiEngine::navbar()
    ->fixed('bottom')
    ->brand('Brand')
    ->item('Home', '/');

// Sticky top (scrolls with page then sticks)
UiEngine::navbar()
    ->sticky('top')
    ->brand('Brand')
    ->item('Home', '/');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Fixed to top
UiEngine.navbar()
    .fixed('top')
    .brand('Brand')
    .item('Home', '/');

// Fixed to bottom
UiEngine.navbar()
    .fixed('bottom')
    .brand('Brand')
    .item('Home', '/');

// Sticky top
UiEngine.navbar()
    .sticky('top')
    .brand('Brand')
    .item('Home', '/');"
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
                                <td><code>brand()</code></td>
                                <td><code>string $text, string $url, array $options</code></td>
                                <td>Set brand/logo</td>
                            </tr>
                            <tr>
                                <td><code>item()</code></td>
                                <td><code>string $label, string $url, array $options</code></td>
                                <td>Add navigation item</td>
                            </tr>
                            <tr>
                                <td><code>dropdown()</code></td>
                                <td><code>string $label, array $items</code></td>
                                <td>Add dropdown menu</td>
                            </tr>
                            <tr>
                                <td><code>search()</code></td>
                                <td><code>string $action, array $options</code></td>
                                <td>Add search form</td>
                            </tr>
                            <tr>
                                <td><code>action()</code></td>
                                <td><code>string $label, string $url, array $options</code></td>
                                <td>Add action button</td>
                            </tr>
                            <tr>
                                <td><code>theme()</code></td>
                                <td><code>string $theme</code></td>
                                <td>Color theme: light, dark</td>
                            </tr>
                            <tr>
                                <td><code>background()</code></td>
                                <td><code>string $color</code></td>
                                <td>Background color variant</td>
                            </tr>
                            <tr>
                                <td><code>fixed()</code></td>
                                <td><code>string $position</code></td>
                                <td>Fixed position: top, bottom</td>
                            </tr>
                            <tr>
                                <td><code>sticky()</code></td>
                                <td><code>string $position</code></td>
                                <td>Sticky position: top</td>
                            </tr>
                            <tr>
                                <td><code>expand()</code></td>
                                <td><code>string $breakpoint</code></td>
                                <td>Expand breakpoint: sm, md, lg, xl</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
