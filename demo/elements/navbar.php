<?php
/**
 * SixOrbit UI Demo - Navbar
 */
$pageTitle = 'Navbar';
$pageDescription = 'Navigation bar component';

require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/sidebar.php';
require_once '../includes/navbar.php';
?>

<!-- Main Content -->
<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Navbar</h1>
            <p class="so-page-subtitle">Navigation bar component</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">
<!-- Section 1: Basic Navbar -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Basic Navbar</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">A simple navbar with brand, navigation links, and responsive collapse behavior.</p>

                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-lg so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">
                                    <span class="material-icons so-text-primary">dashboard</span>
                                    SixOrbit
                                </a>
                                <button class="so-component-navbar-toggler" type="button" aria-expanded="false" aria-label="Toggle navigation" onclick="this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'); this.closest('.so-component-navbar').querySelector('.so-component-navbar-collapse').classList.toggle('show')">
                                    <span class="so-component-navbar-toggler-icon"></span>
                                </button>
                                <div class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav so-component-navbar-nav-start">
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link so-active">Home</a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">Features</a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">Pricing</a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link so-disabled">Disabled</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-lg"&gt;
    &lt;div class="so-component-navbar-container"&gt;
        &lt;a href="#" class="so-component-navbar-brand"&gt;
            &lt;span class="material-icons so-text-primary"&gt;dashboard&lt;/span&gt;
            SixOrbit
        &lt;/a&gt;
        &lt;button class="so-component-navbar-toggler" type="button"&gt;
            &lt;span class="so-component-navbar-toggler-icon"&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;div class="so-component-navbar-collapse"&gt;
            &lt;ul class="so-component-navbar-nav so-component-navbar-nav-start"&gt;
                &lt;li class="so-component-navbar-item"&gt;
                    &lt;a href="#" class="so-component-navbar-link so-active"&gt;Home&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="so-component-navbar-item"&gt;
                    &lt;a href="#" class="so-component-navbar-link"&gt;Features&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="so-component-navbar-item"&gt;
                    &lt;a href="#" class="so-component-navbar-link"&gt;Pricing&lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="so-component-navbar-item"&gt;
                    &lt;a href="#" class="so-component-navbar-link so-disabled"&gt;Disabled&lt;/a&gt;
                &lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Color Themes -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Color Themes</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Navbars come in various color themes including light, dark, and all semantic colors.</p>

                        <!-- Light Theme -->
                        <h6 class="so-mb-2 so-text-muted">Light Theme (Default)</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Light</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Dark Theme -->
                        <h6 class="so-mb-2 so-text-muted">Dark Theme</h6>
                        <nav class="so-component-navbar so-component-navbar-dark so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Dark</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Primary -->
                        <h6 class="so-mb-2 so-text-muted">Primary</h6>
                        <nav class="so-component-navbar so-component-navbar-primary so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Primary</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Secondary -->
                        <h6 class="so-mb-2 so-text-muted">Secondary</h6>
                        <nav class="so-component-navbar so-component-navbar-secondary so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Secondary</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Success -->
                        <h6 class="so-mb-2 so-text-muted">Success</h6>
                        <nav class="so-component-navbar so-component-navbar-success so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Success</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Danger -->
                        <h6 class="so-mb-2 so-text-muted">Danger</h6>
                        <nav class="so-component-navbar so-component-navbar-danger so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Danger</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Warning -->
                        <h6 class="so-mb-2 so-text-muted">Warning</h6>
                        <nav class="so-component-navbar so-component-navbar-warning so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Warning</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Info -->
                        <h6 class="so-mb-2 so-text-muted">Info</h6>
                        <nav class="so-component-navbar so-component-navbar-info so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Info</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Light --&gt;
&lt;nav class="so-component-navbar so-component-navbar-light"&gt;...&lt;/nav&gt;

&lt;!-- Dark --&gt;
&lt;nav class="so-component-navbar so-component-navbar-dark"&gt;...&lt;/nav&gt;

&lt;!-- Primary --&gt;
&lt;nav class="so-component-navbar so-component-navbar-primary"&gt;...&lt;/nav&gt;

&lt;!-- Secondary --&gt;
&lt;nav class="so-component-navbar so-component-navbar-secondary"&gt;...&lt;/nav&gt;

&lt;!-- Success --&gt;
&lt;nav class="so-component-navbar so-component-navbar-success"&gt;...&lt;/nav&gt;

&lt;!-- Danger --&gt;
&lt;nav class="so-component-navbar so-component-navbar-danger"&gt;...&lt;/nav&gt;

&lt;!-- Warning --&gt;
&lt;nav class="so-component-navbar so-component-navbar-warning"&gt;...&lt;/nav&gt;

&lt;!-- Info --&gt;
&lt;nav class="so-component-navbar so-component-navbar-info"&gt;...&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Brand Variants -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Brand Variants</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">The brand area supports text, images, icons, or combinations.</p>

                        <!-- Text Only -->
                        <h6 class="so-mb-2 so-text-muted">Text Only</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">SixOrbit ERP</a>
                            </div>
                        </nav>

                        <!-- Icon + Text -->
                        <h6 class="so-mb-2 so-text-muted">Icon + Text</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">
                                    <span class="material-icons so-text-primary">rocket_launch</span>
                                    SixOrbit
                                </a>
                            </div>
                        </nav>

                        <!-- Image Logo -->
                        <h6 class="so-mb-2 so-text-muted">Image Logo (Inline SVG)</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">
                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="32" height="32" rx="6" fill="#1a73e8"/>
                                        <text x="50%" y="50%" dominant-baseline="central" text-anchor="middle" fill="white" font-size="12" font-weight="bold">SO</text>
                                    </svg>
                                    SixOrbit
                                </a>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Text Only --&gt;
&lt;a href="#" class="so-component-navbar-brand"&gt;SixOrbit ERP&lt;/a&gt;

&lt;!-- Icon + Text --&gt;
&lt;a href="#" class="so-component-navbar-brand"&gt;
    &lt;span class="material-icons so-text-primary"&gt;rocket_launch&lt;/span&gt;
    SixOrbit
&lt;/a&gt;

&lt;!-- Image Logo --&gt;
&lt;a href="#" class="so-component-navbar-brand"&gt;
    &lt;img src="logo.png" alt="Logo"&gt;
    SixOrbit
&lt;/a&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 4: With Dropdowns -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Navbar with Dropdowns</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Integrate dropdown menus into the navbar navigation. Click on dropdown items to toggle.</p>

                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-lg so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">
                                    <span class="material-icons so-text-primary">dashboard</span>
                                    SixOrbit
                                </a>
                                <button class="so-component-navbar-toggler" type="button" aria-expanded="false" onclick="this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'); this.closest('.so-component-navbar').querySelector('.so-component-navbar-collapse').classList.toggle('show')">
                                    <span class="so-component-navbar-toggler-icon"></span>
                                </button>
                                <div class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav so-component-navbar-nav-start">
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link so-active">Dashboard</a>
                                        </li>
                                        <li class="so-component-navbar-item so-dropdown">
                                            <a href="#" class="so-component-navbar-link so-dropdown-toggle" onclick="event.preventDefault(); this.parentElement.classList.toggle('show'); this.nextElementSibling.classList.toggle('show');">
                                                Products
                                            </a>
                                            <div class="so-dropdown-menu">
                                                <a href="#" class="so-dropdown-item">
                                                    <span class="material-icons">inventory_2</span>
                                                    All Products
                                                </a>
                                                <a href="#" class="so-dropdown-item">
                                                    <span class="material-icons">add_box</span>
                                                    Add New
                                                </a>
                                                <a href="#" class="so-dropdown-item">
                                                    <span class="material-icons">category</span>
                                                    Categories
                                                </a>
                                                <div class="so-dropdown-divider"></div>
                                                <a href="#" class="so-dropdown-item">
                                                    <span class="material-icons">archive</span>
                                                    Archived
                                                </a>
                                            </div>
                                        </li>
                                        <li class="so-component-navbar-item so-dropdown">
                                            <a href="#" class="so-component-navbar-link so-dropdown-toggle" onclick="event.preventDefault(); this.parentElement.classList.toggle('show'); this.nextElementSibling.classList.toggle('show');">
                                                Reports
                                            </a>
                                            <div class="so-dropdown-menu">
                                                <a href="#" class="so-dropdown-item">Sales Report</a>
                                                <a href="#" class="so-dropdown-item">Inventory Report</a>
                                                <a href="#" class="so-dropdown-item">Analytics</a>
                                            </div>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">Settings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;li class="so-component-navbar-item so-dropdown" data-so-dropdown&gt;
    &lt;a href="#" class="so-component-navbar-link so-dropdown-toggle"&gt;
        Products
    &lt;/a&gt;
    &lt;div class="so-dropdown-menu"&gt;
        &lt;a href="#" class="so-dropdown-item"&gt;
            &lt;span class="material-icons"&gt;inventory_2&lt;/span&gt;
            All Products
        &lt;/a&gt;
        &lt;a href="#" class="so-dropdown-item"&gt;
            &lt;span class="material-icons"&gt;add_box&lt;/span&gt;
            Add New
        &lt;/a&gt;
        &lt;div class="so-dropdown-divider"&gt;&lt;/div&gt;
        &lt;a href="#" class="so-dropdown-item"&gt;
            &lt;span class="material-icons"&gt;archive&lt;/span&gt;
            Archived
        &lt;/a&gt;
    &lt;/div&gt;
&lt;/li&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 5: Search & Forms -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Search & Forms</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Integrate search inputs, forms, and action buttons in the navbar.</p>

                        <!-- Search + Buttons -->
                        <h6 class="so-mb-2 so-text-muted">With Search & Buttons</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-lg so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">
                                    <span class="material-icons so-text-primary">dashboard</span>
                                    SixOrbit
                                </a>
                                <button class="so-component-navbar-toggler" type="button" aria-expanded="false" onclick="this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'); this.closest('.so-component-navbar').querySelector('.so-component-navbar-collapse').classList.toggle('show')">
                                    <span class="so-component-navbar-toggler-icon"></span>
                                </button>
                                <div class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav so-component-navbar-nav-start">
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link so-active">Home</a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">Features</a>
                                        </li>
                                    </ul>
                                    <form class="so-component-navbar-form so-component-navbar-nav-end">
                                        <div class="so-component-navbar-search">
                                            <span class="material-icons search-icon">search</span>
                                            <input type="search" class="so-form-control" placeholder="Search...">
                                        </div>
                                        <button type="submit" class="so-btn so-btn-primary">Search</button>
                                    </form>
                                </div>
                            </div>
                        </nav>

                        <!-- Login/Signup Buttons -->
                        <h6 class="so-mb-2 so-text-muted">With Auth Buttons</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-lg so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">SixOrbit</a>
                                <button class="so-component-navbar-toggler" type="button" aria-expanded="false" onclick="this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'); this.closest('.so-component-navbar').querySelector('.so-component-navbar-collapse').classList.toggle('show')">
                                    <span class="so-component-navbar-toggler-icon"></span>
                                </button>
                                <div class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav so-component-navbar-nav-start">
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">Features</a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">Pricing</a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">About</a>
                                        </li>
                                    </ul>
                                    <div class="so-component-navbar-nav so-component-navbar-nav-end so-gap-2">
                                        <a href="#" class="so-btn so-btn-outline-primary">Login</a>
                                        <a href="#" class="so-btn so-btn-primary">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Search Form --&gt;
&lt;form class="so-component-navbar-form so-component-navbar-nav-end"&gt;
    &lt;div class="so-component-navbar-search"&gt;
        &lt;span class="material-icons search-icon"&gt;search&lt;/span&gt;
        &lt;input type="search" class="so-form-control" placeholder="Search..."&gt;
    &lt;/div&gt;
    &lt;button type="submit" class="so-btn so-btn-primary"&gt;Search&lt;/button&gt;
&lt;/form&gt;

&lt;!-- Auth Buttons --&gt;
&lt;div class="so-component-navbar-nav so-component-navbar-nav-end so-gap-2"&gt;
    &lt;a href="#" class="so-btn so-btn-outline-primary"&gt;Login&lt;/a&gt;
    &lt;a href="#" class="so-btn so-btn-primary"&gt;Sign Up&lt;/a&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 6: Badges & Icons -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Badges & Icons</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Add badges for notifications and icons for visual clarity.</p>

                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-lg so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">
                                    <span class="material-icons so-text-primary">dashboard</span>
                                    SixOrbit
                                </a>
                                <button class="so-component-navbar-toggler" type="button" aria-expanded="false" onclick="this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'); this.closest('.so-component-navbar').querySelector('.so-component-navbar-collapse').classList.toggle('show')">
                                    <span class="so-component-navbar-toggler-icon"></span>
                                </button>
                                <div class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav so-component-navbar-nav-start">
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link so-active">
                                                <span class="material-icons">home</span>
                                                Home
                                            </a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">
                                                <span class="material-icons">mail</span>
                                                Messages
                                                <span class="so-badge so-badge-danger">5</span>
                                            </a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">
                                                <span class="material-icons">notifications</span>
                                                Alerts
                                                <span class="so-badge so-badge-warning">New</span>
                                            </a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">
                                                <span class="material-icons">shopping_cart</span>
                                                Cart
                                                <span class="so-badge so-badge-primary">3</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="so-component-navbar-nav so-component-navbar-nav-end">
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">
                                                <span class="material-icons">account_circle</span>
                                                Profile
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;a href="#" class="so-component-navbar-link"&gt;
    &lt;span class="material-icons"&gt;mail&lt;/span&gt;
    Messages
    &lt;span class="so-badge so-badge-danger"&gt;5&lt;/span&gt;
&lt;/a&gt;

&lt;a href="#" class="so-component-navbar-link"&gt;
    &lt;span class="material-icons"&gt;notifications&lt;/span&gt;
    Alerts
    &lt;span class="so-badge so-badge-warning"&gt;New&lt;/span&gt;
&lt;/a&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 7: Visual Modifiers -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Visual Modifiers</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Add shadows, borders, or make the navbar transparent.</p>

                        <!-- With Shadow -->
                        <h6 class="so-mb-2 so-text-muted">With Shadow</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand so-component-navbar-shadow so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Shadow Navbar</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- With Border -->
                        <h6 class="so-mb-2 so-text-muted">With Border</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand so-component-navbar-bordered so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Bordered Navbar</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Transparent (on dark background) -->
                        <h6 class="so-mb-2 so-text-muted">Transparent (for hero sections)</h6>
                        <div class="so-p-4 so-rounded-lg" style="background: linear-gradient(135deg, #1a73e8, #174ea6);">
                            <nav class="so-component-navbar so-component-navbar-dark so-component-navbar-expand so-component-navbar-transparent">
                                <div class="so-component-navbar-container">
                                    <a href="#" class="so-component-navbar-brand">Transparent</a>
                                    <ul class="so-component-navbar-nav">
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- With Shadow --&gt;
&lt;nav class="so-component-navbar so-component-navbar-light so-component-navbar-shadow"&gt;...&lt;/nav&gt;

&lt;!-- With Border --&gt;
&lt;nav class="so-component-navbar so-component-navbar-light so-component-navbar-bordered"&gt;...&lt;/nav&gt;

&lt;!-- Transparent --&gt;
&lt;nav class="so-component-navbar so-component-navbar-dark so-component-navbar-transparent"&gt;...&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 8: Responsive Breakpoints -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Responsive Breakpoints</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Control at which breakpoint the navbar expands from collapsed mobile view to full desktop view.</p>

                        <div class="so-alert so-alert-info so-mb-4">
                            <span class="material-icons">info</span>
                            <div>
                                <strong>Tip:</strong> Resize your browser window to see the collapse behavior at different breakpoints.
                            </div>
                        </div>

                        <!-- Expand SM -->
                        <h6 class="so-mb-2 so-text-muted">Expand at SM (576px)</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-sm so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Expand SM</a>
                                <button class="so-component-navbar-toggler" type="button" aria-expanded="false" onclick="this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'); this.closest('.so-component-navbar').querySelector('.so-component-navbar-collapse').classList.toggle('show')">
                                    <span class="so-component-navbar-toggler-icon"></span>
                                </button>
                                <div class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav">
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <!-- Expand MD -->
                        <h6 class="so-mb-2 so-text-muted">Expand at MD (768px)</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-md so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Expand MD</a>
                                <button class="so-component-navbar-toggler" type="button" aria-expanded="false" onclick="this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'); this.closest('.so-component-navbar').querySelector('.so-component-navbar-collapse').classList.toggle('show')">
                                    <span class="so-component-navbar-toggler-icon"></span>
                                </button>
                                <div class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav">
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <!-- Expand LG -->
                        <h6 class="so-mb-2 so-text-muted">Expand at LG (1024px) - Default</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-lg so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Expand LG</a>
                                <button class="so-component-navbar-toggler" type="button" aria-expanded="false" onclick="this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'); this.closest('.so-component-navbar').querySelector('.so-component-navbar-collapse').classList.toggle('show')">
                                    <span class="so-component-navbar-toggler-icon"></span>
                                </button>
                                <div class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav">
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <!-- Always Expanded -->
                        <h6 class="so-mb-2 so-text-muted">Always Expanded (Never Collapse)</h6>
                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Always Expand</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Contact</a></li>
                                </ul>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Expand at SM (576px) --&gt;
&lt;nav class="so-component-navbar so-component-navbar-expand-sm"&gt;...&lt;/nav&gt;

&lt;!-- Expand at MD (768px) --&gt;
&lt;nav class="so-component-navbar so-component-navbar-expand-md"&gt;...&lt;/nav&gt;

&lt;!-- Expand at LG (1024px) - Recommended --&gt;
&lt;nav class="so-component-navbar so-component-navbar-expand-lg"&gt;...&lt;/nav&gt;

&lt;!-- Expand at XL (1200px) --&gt;
&lt;nav class="so-component-navbar so-component-navbar-expand-xl"&gt;...&lt;/nav&gt;

&lt;!-- Always Expanded --&gt;
&lt;nav class="so-component-navbar so-component-navbar-expand"&gt;...&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 9: Container Options -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Container Options</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Choose between full-width (fluid) or contained (centered with max-width) navbar layouts.</p>

                        <!-- Fluid (Default) -->
                        <h6 class="so-mb-2 so-text-muted">Fluid (Full Width) - Default</h6>
                        <nav class="so-component-navbar so-component-navbar-primary so-component-navbar-expand so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Fluid Navbar</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <!-- Contained -->
                        <h6 class="so-mb-2 so-text-muted">Contained (Centered Max-Width)</h6>
                        <nav class="so-component-navbar so-component-navbar-primary so-component-navbar-expand so-component-navbar-contained so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">Contained Navbar</a>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link so-active">Home</a></li>
                                    <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                </ul>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Fluid (Full Width) --&gt;
&lt;nav class="so-component-navbar"&gt;
    &lt;div class="so-component-navbar-container"&gt;...&lt;/div&gt;
&lt;/nav&gt;

&lt;!-- Contained (Centered Max-Width) --&gt;
&lt;nav class="so-component-navbar so-component-navbar-contained"&gt;
    &lt;div class="so-component-navbar-container"&gt;...&lt;/div&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 10: Positioning -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Positioning</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Position the navbar as fixed or sticky. Below are visual demos showing how fixed positioning works.</p>

                        <div class="so-alert so-alert-warning so-mb-4">
                            <span class="material-icons">warning</span>
                            <div>
                                <strong>Note:</strong> In production, fixed-top navbars require adding padding to the body to prevent content from being hidden behind the navbar.
                            </div>
                        </div>

                        <!-- Fixed Top Demo -->
                        <h6 class="so-mb-2 so-text-muted">Fixed Top (Preview)</h6>
                        <div class="so-border so-rounded-lg so-overflow-hidden so-mb-4" style="height: 180px; position: relative; background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);">
                            <nav class="so-component-navbar so-component-navbar-primary so-component-navbar-expand" style="position: absolute; top: 0; left: 0; right: 0; z-index: 10;">
                                <div class="so-component-navbar-container">
                                    <a href="#" class="so-component-navbar-brand">Fixed Top</a>
                                    <ul class="so-component-navbar-nav">
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Home</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">About</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <div class="so-p-4 so-text-center" style="padding-top: 80px;">
                                <p class="so-text-muted so-mb-2">Content area</p>
                                <p class="so-text-muted so-text-sm">Navbar stays fixed at the top of its container</p>
                            </div>
                        </div>

                        <!-- Fixed Bottom Demo -->
                        <h6 class="so-mb-2 so-text-muted">Fixed Bottom (Preview)</h6>
                        <div class="so-border so-rounded-lg so-overflow-hidden so-mb-4" style="height: 180px; position: relative; background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%);">
                            <div class="so-p-4 so-text-center">
                                <p class="so-text-muted so-mb-2">Content area</p>
                                <p class="so-text-muted so-text-sm">Navbar stays fixed at the bottom of its container</p>
                            </div>
                            <nav class="so-component-navbar so-component-navbar-dark so-component-navbar-expand" style="position: absolute; bottom: 0; left: 0; right: 0; z-index: 10;">
                                <div class="so-component-navbar-container">
                                    <a href="#" class="so-component-navbar-brand">Fixed Bottom</a>
                                    <ul class="so-component-navbar-nav so-component-navbar-nav-end">
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Contact</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Help</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>

                        <!-- Sticky Top Demo -->
                        <h6 class="so-mb-2 so-text-muted">Sticky Top (Preview - scroll inside)</h6>
                        <div class="so-border so-rounded-lg so-overflow-hidden so-mb-4" style="height: 200px; overflow-y: auto; background: #f8f9fa;">
                            <nav class="so-component-navbar so-component-navbar-success so-component-navbar-expand" style="position: sticky; top: 0; z-index: 10;">
                                <div class="so-component-navbar-container">
                                    <a href="#" class="so-component-navbar-brand">Sticky Top</a>
                                    <ul class="so-component-navbar-nav">
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Link</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <div class="so-p-4">
                                <p class="so-text-muted so-mb-3">Scroll down to see sticky behavior...</p>
                                <p class="so-text-muted so-mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p class="so-text-muted so-mb-3">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <p class="so-text-muted so-mb-3">Ut enim ad minim veniam, quis nostrud exercitation.</p>
                                <p class="so-text-muted so-mb-3">Duis aute irure dolor in reprehenderit in voluptate velit.</p>
                                <p class="so-text-muted">The navbar sticks to the top when you scroll past it!</p>
                            </div>
                        </div>

                        <div class="so-code-block">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Fixed to Top --&gt;
&lt;nav class="so-component-navbar so-component-navbar-fixed-top"&gt;...&lt;/nav&gt;

&lt;!-- Fixed to Bottom --&gt;
&lt;nav class="so-component-navbar so-component-navbar-fixed-bottom"&gt;...&lt;/nav&gt;

&lt;!-- Sticky Top (sticks on scroll) --&gt;
&lt;nav class="so-component-navbar so-component-navbar-sticky-top"&gt;...&lt;/nav&gt;</code></pre>
                        </div>

                        <h6 class="so-mt-4 so-mb-2 so-text-muted">Positioning Classes</h6>
                        <table class="so-table">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>so-component-navbar-fixed-top</code></td>
                                    <td>Fixed to the top of the viewport, stays in place during scroll</td>
                                </tr>
                                <tr>
                                    <td><code>so-component-navbar-fixed-bottom</code></td>
                                    <td>Fixed to the bottom of the viewport</td>
                                </tr>
                                <tr>
                                    <td><code>so-component-navbar-sticky-top</code></td>
                                    <td>Sticks to top when scrolling past it (position: sticky)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section 11: Complete Example -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Complete Example</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">A fully-featured navbar combining multiple features.</p>

                        <nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-lg so-component-navbar-shadow so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">
                                    <span class="material-icons so-text-primary">rocket_launch</span>
                                    SixOrbit ERP
                                </a>
                                <button class="so-component-navbar-toggler" type="button" aria-expanded="false" onclick="this.setAttribute('aria-expanded', this.getAttribute('aria-expanded') === 'true' ? 'false' : 'true'); this.closest('.so-component-navbar').querySelector('.so-component-navbar-collapse').classList.toggle('show')">
                                    <span class="so-component-navbar-toggler-icon"></span>
                                </button>
                                <div class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav so-component-navbar-nav-start">
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link so-active">
                                                <span class="material-icons">dashboard</span>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="so-component-navbar-item so-dropdown">
                                            <a href="#" class="so-component-navbar-link so-dropdown-toggle" onclick="event.preventDefault(); this.parentElement.classList.toggle('show'); this.nextElementSibling.classList.toggle('show');">
                                                <span class="material-icons">inventory_2</span>
                                                Products
                                            </a>
                                            <div class="so-dropdown-menu">
                                                <a href="#" class="so-dropdown-item">All Products</a>
                                                <a href="#" class="so-dropdown-item">Add New</a>
                                                <a href="#" class="so-dropdown-item">Categories</a>
                                                <div class="so-dropdown-divider"></div>
                                                <a href="#" class="so-dropdown-item">Import/Export</a>
                                            </div>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">
                                                <span class="material-icons">people</span>
                                                Customers
                                            </a>
                                        </li>
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">
                                                <span class="material-icons">analytics</span>
                                                Reports
                                            </a>
                                        </li>
                                    </ul>

                                    <span class="so-component-navbar-divider"></span>

                                    <form class="so-component-navbar-form">
                                        <div class="so-component-navbar-search">
                                            <span class="material-icons search-icon">search</span>
                                            <input type="search" class="so-form-control so-form-control-sm" placeholder="Search...">
                                        </div>
                                    </form>

                                    <ul class="so-component-navbar-nav so-component-navbar-nav-end">
                                        <li class="so-component-navbar-item">
                                            <a href="#" class="so-component-navbar-link">
                                                <span class="material-icons">notifications</span>
                                                <span class="so-badge so-badge-danger">3</span>
                                            </a>
                                        </li>
                                        <li class="so-component-navbar-item so-dropdown">
                                            <a href="#" class="so-component-navbar-link so-dropdown-toggle" onclick="event.preventDefault(); this.parentElement.classList.toggle('show'); this.nextElementSibling.classList.toggle('show');">
                                                <span class="material-icons">account_circle</span>
                                                John Doe
                                            </a>
                                            <div class="so-dropdown-menu dropdown-menu-end">
                                                <a href="#" class="so-dropdown-item">
                                                    <span class="material-icons">person</span>
                                                    Profile
                                                </a>
                                                <a href="#" class="so-dropdown-item">
                                                    <span class="material-icons">settings</span>
                                                    Settings
                                                </a>
                                                <div class="so-dropdown-divider"></div>
                                                <a href="#" class="so-dropdown-item so-text-danger">
                                                    <span class="material-icons">logout</span>
                                                    Logout
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;nav class="so-component-navbar so-component-navbar-light so-component-navbar-expand-lg so-component-navbar-shadow"&gt;
    &lt;div class="so-component-navbar-container"&gt;
        &lt;a href="#" class="so-component-navbar-brand"&gt;
            &lt;span class="material-icons so-text-primary"&gt;rocket_launch&lt;/span&gt;
            SixOrbit ERP
        &lt;/a&gt;
        &lt;button class="so-component-navbar-toggler" type="button"&gt;
            &lt;span class="so-component-navbar-toggler-icon"&gt;&lt;/span&gt;
        &lt;/button&gt;
        &lt;div class="so-component-navbar-collapse"&gt;
            &lt;ul class="so-component-navbar-nav so-component-navbar-nav-start"&gt;
                &lt;li class="so-component-navbar-item"&gt;
                    &lt;a href="#" class="so-component-navbar-link so-active"&gt;
                        &lt;span class="material-icons"&gt;dashboard&lt;/span&gt;
                        Dashboard
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="so-component-navbar-item so-dropdown" data-so-dropdown&gt;
                    &lt;a href="#" class="so-component-navbar-link so-dropdown-toggle"&gt;
                        &lt;span class="material-icons"&gt;inventory_2&lt;/span&gt;
                        Products
                    &lt;/a&gt;
                    &lt;div class="so-dropdown-menu"&gt;
                        &lt;a href="#" class="so-dropdown-item"&gt;All Products&lt;/a&gt;
                        &lt;a href="#" class="so-dropdown-item"&gt;Add New&lt;/a&gt;
                    &lt;/div&gt;
                &lt;/li&gt;
            &lt;/ul&gt;

            &lt;span class="so-component-navbar-divider"&gt;&lt;/span&gt;

            &lt;form class="so-component-navbar-form"&gt;
                &lt;div class="so-component-navbar-search"&gt;
                    &lt;span class="material-icons search-icon"&gt;search&lt;/span&gt;
                    &lt;input type="search" class="so-form-control" placeholder="Search..."&gt;
                &lt;/div&gt;
            &lt;/form&gt;

            &lt;ul class="so-component-navbar-nav so-component-navbar-nav-end"&gt;
                &lt;li class="so-component-navbar-item"&gt;
                    &lt;a href="#" class="so-component-navbar-link"&gt;
                        &lt;span class="material-icons"&gt;notifications&lt;/span&gt;
                        &lt;span class="so-badge so-badge-danger"&gt;3&lt;/span&gt;
                    &lt;/a&gt;
                &lt;/li&gt;
                &lt;li class="so-component-navbar-item so-dropdown" data-so-dropdown&gt;
                    &lt;a href="#" class="so-component-navbar-link so-dropdown-toggle"&gt;
                        &lt;span class="material-icons"&gt;account_circle&lt;/span&gt;
                        John Doe
                    &lt;/a&gt;
                    &lt;div class="so-dropdown-menu dropdown-menu-end"&gt;
                        &lt;a href="#" class="so-dropdown-item"&gt;Profile&lt;/a&gt;
                        &lt;a href="#" class="so-dropdown-item"&gt;Settings&lt;/a&gt;
                        &lt;div class="so-dropdown-divider"&gt;&lt;/div&gt;
                        &lt;a href="#" class="so-dropdown-item so-text-danger"&gt;Logout&lt;/a&gt;
                    &lt;/div&gt;
                &lt;/li&gt;
            &lt;/ul&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                    </div>
                </div>

                <!-- Section 12: Mobile Offcanvas Menu -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Mobile Offcanvas Menu</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Slide-out menus from left or right side for mobile navigation. Click the buttons to see offcanvas menus in action.</p>

                        <div class="so-d-flex so-gap-3 so-mb-4">
                            <!-- Left Side Button -->
                            <button class="so-btn so-btn-primary" onclick="document.getElementById('demo-offcanvas-left').classList.add('show'); document.getElementById('demo-offcanvas-backdrop').classList.add('show');">
                                <span class="material-icons so-mr-2">menu</span>
                                Open Left Menu
                            </button>

                            <!-- Right Side Button -->
                            <button class="so-btn so-btn-secondary" onclick="document.getElementById('demo-offcanvas-right').classList.add('show'); document.getElementById('demo-offcanvas-backdrop').classList.add('show');">
                                <span class="material-icons so-mr-2">menu_open</span>
                                Open Right Menu
                            </button>
                        </div>

                        <!-- Offcanvas Left -->
                        <div id="demo-offcanvas-left" class="so-component-navbar-offcanvas">
                            <div class="so-component-navbar-offcanvas-header">
                                <h5 class="so-component-navbar-offcanvas-title">
                                    <span class="material-icons so-text-primary so-mr-2">dashboard</span>
                                    SixOrbit
                                </h5>
                                <button class="so-component-navbar-offcanvas-close" onclick="document.getElementById('demo-offcanvas-left').classList.remove('show'); document.getElementById('demo-offcanvas-backdrop').classList.remove('show');">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>
                            <div class="so-component-navbar-offcanvas-body">
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item">
                                        <a href="#" class="so-component-navbar-link so-active">
                                            <span class="material-icons">home</span>
                                            Home
                                        </a>
                                    </li>
                                    <li class="so-component-navbar-item">
                                        <a href="#" class="so-component-navbar-link">
                                            <span class="material-icons">inventory_2</span>
                                            Products
                                        </a>
                                    </li>
                                    <li class="so-component-navbar-item">
                                        <a href="#" class="so-component-navbar-link">
                                            <span class="material-icons">people</span>
                                            Customers
                                        </a>
                                    </li>
                                    <li class="so-component-navbar-item">
                                        <a href="#" class="so-component-navbar-link">
                                            <span class="material-icons">analytics</span>
                                            Reports
                                        </a>
                                    </li>
                                    <li class="so-component-navbar-item">
                                        <a href="#" class="so-component-navbar-link">
                                            <span class="material-icons">settings</span>
                                            Settings
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Offcanvas Right -->
                        <div id="demo-offcanvas-right" class="so-component-navbar-offcanvas so-component-navbar-offcanvas-end">
                            <div class="so-component-navbar-offcanvas-header">
                                <h5 class="so-component-navbar-offcanvas-title">
                                    <span class="material-icons so-text-primary so-mr-2">account_circle</span>
                                    Account
                                </h5>
                                <button class="so-component-navbar-offcanvas-close" onclick="document.getElementById('demo-offcanvas-right').classList.remove('show'); document.getElementById('demo-offcanvas-backdrop').classList.remove('show');">
                                    <span class="material-icons">close</span>
                                </button>
                            </div>
                            <div class="so-component-navbar-offcanvas-body">
                                <div class="so-text-center so-mb-4">
                                    <div class="so-avatar so-avatar-xl so-mb-2" style="width: 80px; height: 80px; background: #e3f2fd; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center;">
                                        <span class="material-icons so-text-primary" style="font-size: 40px;">person</span>
                                    </div>
                                    <h6 class="so-mb-1">John Doe</h6>
                                    <p class="so-text-muted so-text-sm">john@sixorbit.com</p>
                                </div>
                                <ul class="so-component-navbar-nav">
                                    <li class="so-component-navbar-item">
                                        <a href="#" class="so-component-navbar-link">
                                            <span class="material-icons">person</span>
                                            My Profile
                                        </a>
                                    </li>
                                    <li class="so-component-navbar-item">
                                        <a href="#" class="so-component-navbar-link">
                                            <span class="material-icons">notifications</span>
                                            Notifications
                                            <span class="so-badge so-badge-danger so-ml-auto">5</span>
                                        </a>
                                    </li>
                                    <li class="so-component-navbar-item">
                                        <a href="#" class="so-component-navbar-link">
                                            <span class="material-icons">settings</span>
                                            Settings
                                        </a>
                                    </li>
                                    <li class="so-component-navbar-item">
                                        <a href="#" class="so-component-navbar-link so-text-danger">
                                            <span class="material-icons">logout</span>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Shared Backdrop -->
                        <div id="demo-offcanvas-backdrop" class="so-component-navbar-offcanvas-backdrop" onclick="document.getElementById('demo-offcanvas-left').classList.remove('show'); document.getElementById('demo-offcanvas-right').classList.remove('show'); this.classList.remove('show');"></div>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Left Side Offcanvas (Default) --&gt;
&lt;div class="so-component-navbar-offcanvas"&gt;
    &lt;div class="so-component-navbar-offcanvas-header"&gt;
        &lt;h5 class="so-component-navbar-offcanvas-title"&gt;Menu&lt;/h5&gt;
        &lt;button class="so-component-navbar-offcanvas-close"&gt;
            &lt;span class="material-icons"&gt;close&lt;/span&gt;
        &lt;/button&gt;
    &lt;/div&gt;
    &lt;div class="so-component-navbar-offcanvas-body"&gt;
        &lt;ul class="so-component-navbar-nav"&gt;
            &lt;li class="so-component-navbar-item"&gt;
                &lt;a href="#" class="so-component-navbar-link"&gt;Link&lt;/a&gt;
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;
&lt;/div&gt;

&lt;!-- Right Side Offcanvas --&gt;
&lt;div class="so-component-navbar-offcanvas so-component-navbar-offcanvas-end"&gt;
    ...
&lt;/div&gt;

&lt;!-- Backdrop --&gt;
&lt;div class="so-component-navbar-offcanvas-backdrop"&gt;&lt;/div&gt;</code></pre>
                        </div>

                        <h6 class="so-mt-4 so-mb-2 so-text-muted">Offcanvas Position Classes</h6>
                        <table class="so-table">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>so-component-navbar-offcanvas</code></td>
                                    <td>Base offcanvas (left side by default)</td>
                                </tr>
                                <tr>
                                    <td><code>so-component-navbar-offcanvas-start</code></td>
                                    <td>Explicit left-side positioning</td>
                                </tr>
                                <tr>
                                    <td><code>so-component-navbar-offcanvas-end</code></td>
                                    <td>Right-side positioning</td>
                                </tr>
                                <tr>
                                    <td><code>so-component-navbar-offcanvas-full</code></td>
                                    <td>Full-width offcanvas</td>
                                </tr>
                                <tr>
                                    <td><code>show</code></td>
                                    <td>Add to show the offcanvas</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section 13: Animated Hamburger Menu -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">Animated Hamburger Menu</h3>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-mb-4">Beautiful hamburger icon animations with smooth transitions. Inspired by <a href="https://codepen.io/RRoberts/pen/ZBYaJr" target="_blank" rel="noopener">CodePen by RRoberts</a>. Click each icon to see the animation.</p>

                        <div class="so-d-flex so-flex-wrap so-gap-6 so-mb-6">
                            <!-- Squeeze -->
                            <div class="so-text-center">
                                <button class="so-hamburger so-hamburger--squeeze" type="button" onclick="this.classList.toggle('is-active')">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                                <p class="so-text-sm so-text-muted so-mt-2">Squeeze</p>
                            </div>

                            <!-- Spin -->
                            <div class="so-text-center">
                                <button class="so-hamburger so-hamburger--spin" type="button" onclick="this.classList.toggle('is-active')">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                                <p class="so-text-sm so-text-muted so-mt-2">Spin</p>
                            </div>

                            <!-- Elastic -->
                            <div class="so-text-center">
                                <button class="so-hamburger so-hamburger--elastic" type="button" onclick="this.classList.toggle('is-active')">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                                <p class="so-text-sm so-text-muted so-mt-2">Elastic</p>
                            </div>

                            <!-- Arrow -->
                            <div class="so-text-center">
                                <button class="so-hamburger so-hamburger--arrow" type="button" onclick="this.classList.toggle('is-active')">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                                <p class="so-text-sm so-text-muted so-mt-2">Arrow</p>
                            </div>

                            <!-- Collapse -->
                            <div class="so-text-center">
                                <button class="so-hamburger so-hamburger--collapse" type="button" onclick="this.classList.toggle('is-active')">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                                <p class="so-text-sm so-text-muted so-mt-2">Collapse</p>
                            </div>
                        </div>

                        <!-- Size Variants -->
                        <h6 class="so-mb-3 so-text-muted">Size Variants</h6>
                        <div class="so-d-flex so-flex-wrap so-align-items-center so-gap-6 so-mb-6">
                            <!-- Small -->
                            <div class="so-text-center">
                                <button class="so-hamburger so-hamburger--squeeze so-hamburger--sm" type="button" onclick="this.classList.toggle('is-active')">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                                <p class="so-text-sm so-text-muted so-mt-2">Small</p>
                            </div>

                            <!-- Default -->
                            <div class="so-text-center">
                                <button class="so-hamburger so-hamburger--squeeze" type="button" onclick="this.classList.toggle('is-active')">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                                <p class="so-text-sm so-text-muted so-mt-2">Default</p>
                            </div>

                            <!-- Large -->
                            <div class="so-text-center">
                                <button class="so-hamburger so-hamburger--squeeze so-hamburger--lg" type="button" onclick="this.classList.toggle('is-active')">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                                <p class="so-text-sm so-text-muted so-mt-2">Large</p>
                            </div>
                        </div>

                        <!-- On Different Backgrounds -->
                        <h6 class="so-mb-3 so-text-muted">On Different Backgrounds</h6>
                        <div class="so-d-flex so-flex-wrap so-gap-4 so-mb-6">
                            <div class="so-p-3 so-rounded-lg" style="background: #f5f5f5;">
                                <button class="so-hamburger so-hamburger--squeeze" type="button" onclick="this.classList.toggle('is-active')" style="color: #333;">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                            <div class="so-p-3 so-rounded-lg" style="background: #1a73e8;">
                                <button class="so-hamburger so-hamburger--squeeze" type="button" onclick="this.classList.toggle('is-active')" style="color: white;">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                            <div class="so-p-3 so-rounded-lg" style="background: #34a853;">
                                <button class="so-hamburger so-hamburger--squeeze" type="button" onclick="this.classList.toggle('is-active')" style="color: white;">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                            <div class="so-p-3 so-rounded-lg" style="background: #333;">
                                <button class="so-hamburger so-hamburger--squeeze" type="button" onclick="this.classList.toggle('is-active')" style="color: white;">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!-- Integration Example -->
                        <h6 class="so-mb-3 so-text-muted">Navbar Integration</h6>
                        <nav class="so-component-navbar so-component-navbar-primary so-mb-4">
                            <div class="so-component-navbar-container">
                                <a href="#" class="so-component-navbar-brand">SixOrbit</a>
                                <button class="so-hamburger so-hamburger--squeeze" type="button" style="color: white;" onclick="this.classList.toggle('is-active'); document.getElementById('demo-hamburger-collapse').classList.toggle('show');">
                                    <span class="so-hamburger-box">
                                        <span class="so-hamburger-inner"></span>
                                    </span>
                                </button>
                                <div id="demo-hamburger-collapse" class="so-component-navbar-collapse">
                                    <ul class="so-component-navbar-nav">
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Home</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">About</a></li>
                                        <li class="so-component-navbar-item"><a href="#" class="so-component-navbar-link">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>

                        <div class="so-code-block so-mt-4">
                            <div class="so-code-header">
                                <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                                <button class="so-code-copy" onclick="copyCode(this)">
                                    <span class="material-icons">content_copy</span>
                                </button>
                            </div>
                            <pre class="so-code-content"><code class="language-html">&lt;!-- Squeeze Animation --&gt;
&lt;button class="so-hamburger so-hamburger--squeeze" type="button"&gt;
    &lt;span class="so-hamburger-box"&gt;
        &lt;span class="so-hamburger-inner"&gt;&lt;/span&gt;
    &lt;/span&gt;
&lt;/button&gt;

&lt;!-- Spin Animation --&gt;
&lt;button class="so-hamburger so-hamburger--spin"&gt;...&lt;/button&gt;

&lt;!-- Elastic Animation --&gt;
&lt;button class="so-hamburger so-hamburger--elastic"&gt;...&lt;/button&gt;

&lt;!-- Arrow Animation --&gt;
&lt;button class="so-hamburger so-hamburger--arrow"&gt;...&lt;/button&gt;

&lt;!-- Collapse Animation --&gt;
&lt;button class="so-hamburger so-hamburger--collapse"&gt;...&lt;/button&gt;

&lt;!-- Size Variants --&gt;
&lt;button class="so-hamburger so-hamburger--squeeze so-hamburger--sm"&gt;...&lt;/button&gt;
&lt;button class="so-hamburger so-hamburger--squeeze so-hamburger--lg"&gt;...&lt;/button&gt;

&lt;!-- Toggle active state with JavaScript --&gt;
&lt;script&gt;
hamburger.addEventListener('click', function() {
    this.classList.toggle('is-active');
});
&lt;/script&gt;</code></pre>
                        </div>

                        <h6 class="so-mt-4 so-mb-2 so-text-muted">Hamburger Classes</h6>
                        <table class="so-table">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>so-hamburger</code></td>
                                    <td>Base hamburger button</td>
                                </tr>
                                <tr>
                                    <td><code>so-hamburger--squeeze</code></td>
                                    <td>Squeeze to X animation</td>
                                </tr>
                                <tr>
                                    <td><code>so-hamburger--spin</code></td>
                                    <td>Spin to X animation</td>
                                </tr>
                                <tr>
                                    <td><code>so-hamburger--elastic</code></td>
                                    <td>Elastic bounce animation</td>
                                </tr>
                                <tr>
                                    <td><code>so-hamburger--arrow</code></td>
                                    <td>Transform to arrow animation</td>
                                </tr>
                                <tr>
                                    <td><code>so-hamburger--collapse</code></td>
                                    <td>Collapse animation</td>
                                </tr>
                                <tr>
                                    <td><code>so-hamburger--sm</code></td>
                                    <td>Small size variant</td>
                                </tr>
                                <tr>
                                    <td><code>so-hamburger--lg</code></td>
                                    <td>Large size variant</td>
                                </tr>
                                <tr>
                                    <td><code>is-active</code></td>
                                    <td>Active state (shows X)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Section 14: CSS Classes Reference -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h3 class="so-card-title">CSS Classes Reference</h3>
                    </div>
                    <div class="so-card-body">
                        <h6 class="so-mb-3">Structure Classes</h6>
                        <table class="so-table so-mb-4">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><code>so-component-navbar</code></td><td>Base navbar wrapper</td></tr>
                                <tr><td><code>so-component-navbar-container</code></td><td>Inner container for content</td></tr>
                                <tr><td><code>so-component-navbar-brand</code></td><td>Brand/logo area</td></tr>
                                <tr><td><code>so-component-navbar-nav</code></td><td>Navigation items wrapper</td></tr>
                                <tr><td><code>so-component-navbar-item</code></td><td>Individual nav item</td></tr>
                                <tr><td><code>so-component-navbar-link</code></td><td>Nav link</td></tr>
                                <tr><td><code>so-component-navbar-text</code></td><td>Plain text content</td></tr>
                                <tr><td><code>so-component-navbar-divider</code></td><td>Vertical divider</td></tr>
                                <tr><td><code>so-component-navbar-toggler</code></td><td>Mobile hamburger toggle</td></tr>
                                <tr><td><code>so-component-navbar-collapse</code></td><td>Collapsible content area</td></tr>
                                <tr><td><code>so-component-navbar-form</code></td><td>Form wrapper</td></tr>
                                <tr><td><code>so-component-navbar-search</code></td><td>Search input with icon</td></tr>
                            </tbody>
                        </table>

                        <h6 class="so-mb-3">Color Classes</h6>
                        <table class="so-table so-mb-4">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><code>so-component-navbar-light</code></td><td>Light background, dark text</td></tr>
                                <tr><td><code>so-component-navbar-dark</code></td><td>Dark background, light text</td></tr>
                                <tr><td><code>so-component-navbar-primary</code></td><td>Primary color background</td></tr>
                                <tr><td><code>so-component-navbar-secondary</code></td><td>Secondary color background</td></tr>
                                <tr><td><code>so-component-navbar-success</code></td><td>Success color background</td></tr>
                                <tr><td><code>so-component-navbar-danger</code></td><td>Danger color background</td></tr>
                                <tr><td><code>so-component-navbar-warning</code></td><td>Warning color background</td></tr>
                                <tr><td><code>so-component-navbar-info</code></td><td>Info color background</td></tr>
                            </tbody>
                        </table>

                        <h6 class="so-mb-3">Modifier Classes</h6>
                        <table class="so-table">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><code>so-component-navbar-expand-{sm|md|lg|xl}</code></td><td>Expand at breakpoint</td></tr>
                                <tr><td><code>so-component-navbar-expand</code></td><td>Always expanded</td></tr>
                                <tr><td><code>so-component-navbar-fixed-top</code></td><td>Fixed to top</td></tr>
                                <tr><td><code>so-component-navbar-fixed-bottom</code></td><td>Fixed to bottom</td></tr>
                                <tr><td><code>so-component-navbar-sticky-top</code></td><td>Sticky positioning</td></tr>
                                <tr><td><code>so-component-navbar-contained</code></td><td>Centered with max-width</td></tr>
                                <tr><td><code>so-component-navbar-shadow</code></td><td>Add drop shadow</td></tr>
                                <tr><td><code>so-component-navbar-bordered</code></td><td>Add bottom border</td></tr>
                                <tr><td><code>so-component-navbar-transparent</code></td><td>Transparent background</td></tr>
                                <tr><td><code>so-component-navbar-nav-start</code></td><td>Align nav to start</td></tr>
                                <tr><td><code>so-component-navbar-nav-end</code></td><td>Align nav to end</td></tr>
                                <tr><td><code>so-component-navbar-nav-center</code></td><td>Center nav items</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
</main>

<?php
require_once '../includes/footer.php';
?>
