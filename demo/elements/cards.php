<?php
/**
 * SixOrbit UI Demo - Cards
 */
$pageTitle = 'Cards';
$pageDescription = 'Card components for content containers';

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
            <h1 class="so-page-title">Cards</h1>
            <p class="so-page-subtitle">Card components for content containers</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">
        <!-- Basic Cards -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Cards</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Cards are flexible containers for content with optional header, body, and footer sections.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Card Title</h3>
                            <button class="so-btn so-btn-icon so-btn-ghost">
                                <span class="material-icons">more_vert</span>
                            </button>
                        </div>
                        <div class="so-card-body">
                            <p>This is a basic card with header and body sections.</p>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-body">
                            <h4 class="so-mb-2">Simple Card</h4>
                            <p class="so-text-muted">A card without the header section.</p>
                        </div>
                        <div class="so-card-footer">
                            <button class="so-btn so-btn-outline so-btn-sm">Cancel</button>
                            <button class="so-btn so-btn-primary so-btn-sm">Save</button>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-header">
                            <h3 class="so-card-title">With Badge</h3>
                            <span class="so-badge so-badge-soft-primary">New</span>
                        </div>
                        <div class="so-card-body">
                            <p>Card header with a badge indicator.</p>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Card Title</h3>
    </div>
    <div class="so-card-body">
        <p>Card content goes here.</p>
    </div>
    <div class="so-card-footer">
        <button class="so-btn so-btn-primary">Action</button>
    </div>
</div>', 'html') ?>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Stats Cards</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Dashboard-style stats cards built with utility classes. Perfect for KPI displays and metrics.</p>
                <div class="so-grid so-grid-cols-4 so-grid-cols-lg-2 so-grid-cols-sm-1 so-gap-3 so-mb-4">

                    <!-- Total Sales -->
                    <div class="so-card so-card-padded">
                        <div class="so-d-flex so-justify-content-between so-align-items-center so-mb-2">
                            <span class="so-text-muted so-fs-xs so-text-uppercase so-fw-medium">Total Sales</span>
                            <span class="so-d-flex so-align-items-center so-justify-content-center so-rounded-full so-bg-info-subtle so-w-8 so-h-8">
                                <span class="material-icons so-text-info so-fs-lg">trending_up</span>
                            </span>
                        </div>
                        <div class="so-fs-2xl so-fw-medium so-mb-1">₹12,45,890</div>
                        <div class="so-d-flex so-align-items-center so-gap-1">
                            <span class="material-icons so-text-success so-fs-base">arrow_upward</span>
                            <span class="so-text-success so-fs-xs so-fw-medium">12.5% from last month</span>
                        </div>
                    </div>

                    <!-- Total Purchase -->
                    <div class="so-card so-card-padded">
                        <div class="so-d-flex so-justify-content-between so-align-items-center so-mb-2">
                            <span class="so-text-muted so-fs-xs so-text-uppercase so-fw-medium">Total Purchase</span>
                            <span class="so-d-flex so-align-items-center so-justify-content-center so-rounded-full so-bg-danger-subtle so-w-8 so-h-8">
                                <span class="material-icons so-text-danger so-fs-lg">shopping_cart</span>
                            </span>
                        </div>
                        <div class="so-fs-2xl so-fw-medium so-mb-1">₹8,34,560</div>
                        <div class="so-d-flex so-align-items-center so-gap-1">
                            <span class="material-icons so-text-danger so-fs-base">arrow_downward</span>
                            <span class="so-text-danger so-fs-xs so-fw-medium">3.2% from last month</span>
                        </div>
                    </div>

                    <!-- Pending Orders -->
                    <div class="so-card so-card-padded">
                        <div class="so-d-flex so-justify-content-between so-align-items-center so-mb-2">
                            <span class="so-text-muted so-fs-xs so-text-uppercase so-fw-medium">Pending Orders</span>
                            <span class="so-d-flex so-align-items-center so-justify-content-center so-rounded-full so-bg-warning-subtle so-w-8 so-h-8">
                                <span class="material-icons so-text-warning so-fs-lg">pending_actions</span>
                            </span>
                        </div>
                        <div class="so-fs-2xl so-fw-medium so-mb-1">47</div>
                        <div class="so-d-flex so-align-items-center so-gap-1">
                            <span class="material-icons so-text-success so-fs-base">arrow_upward</span>
                            <span class="so-text-success so-fs-xs so-fw-medium">8 new today</span>
                        </div>
                    </div>

                    <!-- Active Customers -->
                    <div class="so-card so-card-padded">
                        <div class="so-d-flex so-justify-content-between so-align-items-center so-mb-2">
                            <span class="so-text-muted so-fs-xs so-text-uppercase so-fw-medium">Active Customers</span>
                            <span class="so-d-flex so-align-items-center so-justify-content-center so-rounded-full so-bg-success-subtle so-w-8 so-h-8">
                                <span class="material-icons so-text-success so-fs-lg">people</span>
                            </span>
                        </div>
                        <div class="so-fs-2xl so-fw-medium so-mb-1">1,284</div>
                        <div class="so-d-flex so-align-items-center so-gap-1">
                            <span class="material-icons so-text-success so-fs-base">arrow_upward</span>
                            <span class="so-text-success so-fs-xs so-fw-medium">24 new this week</span>
                        </div>
                    </div>

                </div>
                <?= so_code_block('<div class="so-card so-card-padded">
    <div class="so-d-flex so-justify-content-between so-align-items-center so-mb-2">
        <span class="so-text-muted so-fs-xs so-text-uppercase so-fw-medium">Total Sales</span>
        <span class="so-d-flex so-align-items-center so-justify-content-center so-rounded-full so-bg-info-subtle so-w-8 so-h-8">
            <span class="material-icons so-text-info so-fs-lg">trending_up</span>
        </span>
    </div>
    <div class="so-fs-2xl so-fw-medium so-mb-1">₹12,45,890</div>
    <div class="so-d-flex so-align-items-center so-gap-1">
        <span class="material-icons so-text-success so-fs-base">arrow_upward</span>
        <span class="so-text-success so-fs-xs so-fw-medium">12.5% from last month</span>
    </div>
</div>

<!-- Utility Classes Used:
     Card: so-card-padded (compact padding)
     Label: so-fs-xs (12px), so-text-uppercase, so-fw-medium, so-text-muted
     Icon Container: so-w-8 so-h-8 (32px), so-rounded-full, so-bg-{color}-subtle
     Icon: so-fs-lg (18px), so-text-{color}
     Value: so-fs-2xl (24px), so-fw-medium
     Trend: so-fs-xs, so-fw-medium, so-text-{success|danger}
-->', 'html') ?>
            </div>
        </div>

        <!-- Contextual Header Colors -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Contextual Header Colors</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Add colored backgrounds to card headers using contextual classes.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card so-card-header-primary">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Primary Header</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with primary colored header.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-success">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Success Header</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with success colored header.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-danger">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Danger Header</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with danger colored header.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-warning">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Warning Header</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with warning colored header.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-info">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Info Header</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with info colored header.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-secondary">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Secondary Header</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with secondary colored header.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-light">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Light Header</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with light colored header.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-dark">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Dark Header</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with dark colored header.</p>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<div class="so-card so-card-header-primary">
    <div class="so-card-header">
        <h3 class="so-card-title">Primary Header</h3>
    </div>
    <div class="so-card-body">
        <p>Card content here.</p>
    </div>
</div>

<!-- Available: so-card-header-primary, so-card-header-success,
     so-card-header-danger, so-card-header-warning,
     so-card-header-info, so-card-header-secondary,
     so-card-header-light, so-card-header-dark -->', 'html') ?>
            </div>
        </div>

        <!-- Soft Header Colors -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Soft Header Colors</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Light/soft variants for a more subtle appearance.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card so-card-header-soft-primary">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Soft Primary</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Light primary header background.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-soft-success">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Soft Success</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Light success header background.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-soft-danger">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Soft Danger</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Light danger header background.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-soft-warning">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Soft Warning</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Light warning header background.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-soft-info">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Soft Info</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Light info header background.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-soft-secondary">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Soft Secondary</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Light secondary header background.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-soft-light">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Soft Light</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Light grey header background.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-header-soft-dark">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Soft Dark</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Light dark header background.</p>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<div class="so-card so-card-header-soft-primary">
    <div class="so-card-header">
        <h3 class="so-card-title">Soft Primary</h3>
    </div>
    <div class="so-card-body">
        <p>Card content here.</p>
    </div>
</div>

<!-- Available: so-card-header-soft-primary, so-card-header-soft-secondary,
     so-card-header-soft-success, so-card-header-soft-danger,
     so-card-header-soft-warning, so-card-header-soft-info,
     so-card-header-soft-light, so-card-header-soft-dark -->', 'html') ?>
            </div>
        </div>

        <!-- Border Color Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Border Color Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Apply contextual border colors to cards.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card so-card-border-primary">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Primary Border</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with primary border color.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-border-success">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Success Border</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with success border color.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-border-danger">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Danger Border</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with danger border color.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-border-warning">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Warning Border</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with warning border color.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-border-info">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Info Border</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with info border color.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-border-secondary">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Secondary Border</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with secondary border color.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-border-light">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Light Border</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with light border color.</p>
                        </div>
                    </div>

                    <div class="so-card so-card-border-dark">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Dark Border</h3>
                        </div>
                        <div class="so-card-body">
                            <p>Card with dark border color.</p>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<div class="so-card so-card-border-primary">
    <div class="so-card-header">
        <h3 class="so-card-title">Primary Border</h3>
    </div>
    <div class="so-card-body">
        <p>Card content here.</p>
    </div>
</div>

<!-- Available: so-card-border-primary, so-card-border-secondary,
     so-card-border-success, so-card-border-danger,
     so-card-border-warning, so-card-border-info,
     so-card-border-light, so-card-border-dark -->', 'html') ?>
            </div>
        </div>

        <!-- Spacing Modes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Spacing Modes</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Three spacing modes: compact for dense layouts, default, and spacious for extra breathing room.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card so-card-compact">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Compact</h3>
                            <span class="so-badge so-badge-soft-info">Dense</span>
                        </div>
                        <div class="so-card-body">
                            <p>Minimal padding for dense UI layouts. Great for dashboards with many cards.</p>
                        </div>
                        <div class="so-card-footer">
                            <button class="so-btn so-btn-primary so-btn-sm">Action</button>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Default</h3>
                            <span class="so-badge so-badge-soft-primary">Standard</span>
                        </div>
                        <div class="so-card-body">
                            <p>Standard padding for most use cases. Balanced spacing for readability.</p>
                        </div>
                        <div class="so-card-footer">
                            <button class="so-btn so-btn-primary so-btn-sm">Action</button>
                        </div>
                    </div>

                    <div class="so-card so-card-spacious">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Spacious</h3>
                            <span class="so-badge so-badge-soft-success">Relaxed</span>
                        </div>
                        <div class="so-card-body">
                            <p>Extra breathing room for featured content or marketing pages.</p>
                        </div>
                        <div class="so-card-footer">
                            <button class="so-btn so-btn-primary so-btn-sm">Action</button>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<!-- Compact spacing -->
<div class="so-card so-card-compact">
    <div class="so-card-header">...</div>
    <div class="so-card-body">...</div>
</div>

<!-- Default spacing (no modifier needed) -->
<div class="so-card">
    <div class="so-card-header">...</div>
    <div class="so-card-body">...</div>
</div>

<!-- Spacious spacing -->
<div class="so-card so-card-spacious">
    <div class="so-card-header">...</div>
    <div class="so-card-body">...</div>
</div>', 'html') ?>
            </div>
        </div>

        <!-- Card Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Card Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Different visual styles for cards with full header, body, and footer sections.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Default</h3>
                            <span class="so-badge so-badge-soft-primary">Shadow</span>
                        </div>
                        <div class="so-card-body">
                            <p class="so-text-muted so-text-sm">Standard card with shadow, no border. This is the default appearance for all cards.</p>
                        </div>
                        <div class="so-card-footer">
                            <button class="so-btn so-btn-outline so-btn-sm">Cancel</button>
                            <button class="so-btn so-btn-primary so-btn-sm">Save</button>
                        </div>
                    </div>

                    <div class="so-card so-card-bordered">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Bordered</h3>
                            <span class="so-badge so-badge-soft-secondary">Border</span>
                        </div>
                        <div class="so-card-body">
                            <p class="so-text-muted so-text-sm">Card with border, no shadow. Great for flat design layouts.</p>
                        </div>
                        <div class="so-card-footer">
                            <button class="so-btn so-btn-outline so-btn-sm">Cancel</button>
                            <button class="so-btn so-btn-primary so-btn-sm">Save</button>
                        </div>
                    </div>

                    <div class="so-card so-card-flat">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Flat</h3>
                            <span class="so-badge so-badge-soft-light so-text-dark">Minimal</span>
                        </div>
                        <div class="so-card-body">
                            <p class="so-text-muted so-text-sm">No shadow, no border. Clean and minimal appearance.</p>
                        </div>
                        <div class="so-card-footer">
                            <button class="so-btn so-btn-outline so-btn-sm">Cancel</button>
                            <button class="so-btn so-btn-primary so-btn-sm">Save</button>
                        </div>
                    </div>

                    <div class="so-card so-card-elevated">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Elevated</h3>
                            <span class="so-badge so-badge-soft-info">Raised</span>
                        </div>
                        <div class="so-card-body">
                            <p class="so-text-muted so-text-sm">Larger shadow for emphasis. Perfect for featured content.</p>
                        </div>
                        <div class="so-card-footer">
                            <button class="so-btn so-btn-outline so-btn-sm">Cancel</button>
                            <button class="so-btn so-btn-primary so-btn-sm">Save</button>
                        </div>
                    </div>

                    <div class="so-card so-card-padded">
                        <h4 class="so-mb-2">Padded</h4>
                        <p class="so-text-muted so-text-sm so-mb-3">Direct padding on card (no header/body needed). Useful for simple content.</p>
                        <div class="so-d-flex so-gap-2">
                            <button class="so-btn so-btn-outline so-btn-sm">Cancel</button>
                            <button class="so-btn so-btn-primary so-btn-sm">Save</button>
                        </div>
                    </div>

                    <div class="so-card so-card-bordered so-card-padded">
                        <h4 class="so-mb-2">Bordered + Padded</h4>
                        <p class="so-text-muted so-text-sm so-mb-3">Combine classes for border and direct padding.</p>
                        <div class="so-d-flex so-gap-2">
                            <button class="so-btn so-btn-outline so-btn-sm">Cancel</button>
                            <button class="so-btn so-btn-primary so-btn-sm">Save</button>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<!-- Default: shadow, no border -->
<div class="so-card">
    <div class="so-card-body">...</div>
</div>

<!-- Bordered: border, no shadow -->
<div class="so-card so-card-bordered">...</div>

<!-- Flat: no shadow, no border -->
<div class="so-card so-card-flat">...</div>

<!-- Elevated: larger shadow -->
<div class="so-card so-card-elevated">...</div>

<!-- Padded: adds padding directly to card -->
<div class="so-card so-card-padded">
    Content without header/body wrapper
</div>

<!-- Combine classes -->
<div class="so-card so-card-bordered so-card-padded">
    Bordered card with direct padding
</div>', 'html') ?>
            </div>
        </div>

        <!-- Cards with Avatar -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Cards with Avatar</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Material Design inspired cards with avatar headers. Uses the reusable <code>.so-avatar</code> component with status indicators.</p>
                <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card">
                        <div class="so-card-header so-card-header-avatar">
                            <div class="so-avatar so-avatar-status so-avatar-status-online">
                                <img src="https://i.pravatar.cc/80?img=1" alt="User">
                            </div>
                            <div class="so-card-header-content">
                                <h3 class="so-card-title">John Doe</h3>
                                <p class="so-card-subtitle">2 hours ago</p>
                            </div>
                            <button class="so-btn so-btn-icon so-btn-ghost">
                                <span class="material-icons">more_vert</span>
                            </button>
                        </div>
                        <div class="so-card-body">
                            <p>Just shipped a new feature! The team has been working hard on this for weeks. Really proud of what we accomplished together.</p>
                        </div>
                        <div class="so-card-actions so-card-actions-start">
                            <button class="so-btn so-btn-ghost so-btn-sm">
                                <span class="material-icons">favorite_border</span> Like
                            </button>
                            <button class="so-btn so-btn-ghost so-btn-sm">
                                <span class="material-icons">chat_bubble_outline</span> Comment
                            </button>
                            <button class="so-btn so-btn-ghost so-btn-sm">
                                <span class="material-icons">share</span> Share
                            </button>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-header so-card-header-avatar">
                            <div class="so-avatar so-avatar-status so-avatar-status-away">
                                <img src="https://i.pravatar.cc/80?img=5" alt="User">
                            </div>
                            <div class="so-card-header-content">
                                <h3 class="so-card-title">Sarah Wilson</h3>
                                <p class="so-card-subtitle">Product Designer</p>
                            </div>
                            <button class="so-btn so-btn-primary so-btn-sm">Follow</button>
                        </div>
                        <div class="so-card-body">
                            <p>Designing user experiences that delight. Currently working on the new dashboard redesign.</p>
                        </div>
                        <div class="so-card-footer">
                            <div class="so-flex so-gap-4 so-text-sm so-text-muted">
                                <span><strong>1.2k</strong> followers</span>
                                <span><strong>89</strong> posts</span>
                            </div>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-header so-card-header-avatar">
                            <div class="so-avatar so-avatar-primary">
                                <span>JD</span>
                            </div>
                            <div class="so-card-header-content">
                                <h3 class="so-card-title">Jane Davis</h3>
                                <p class="so-card-subtitle">Engineering Lead</p>
                            </div>
                            <span class="so-badge so-badge-soft-success">Pro</span>
                        </div>
                        <div class="so-card-body">
                            <p>Building scalable systems. Avatar with initials using contextual colors.</p>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-header so-card-header-avatar">
                            <div class="so-avatar so-avatar-lg so-avatar-status so-avatar-status-busy">
                                <img src="https://i.pravatar.cc/80?img=12" alt="User">
                            </div>
                            <div class="so-card-header-content">
                                <h3 class="so-card-title">Mike Johnson</h3>
                                <p class="so-card-subtitle">In a meeting</p>
                            </div>
                        </div>
                        <div class="so-card-body">
                            <p>Larger avatar size with busy status indicator.</p>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<!-- Card with avatar and status indicator -->
<div class="so-card">
    <div class="so-card-header so-card-header-avatar">
        <div class="so-avatar so-avatar-status so-avatar-status-online">
            <img src="avatar.jpg" alt="User">
        </div>
        <div class="so-card-header-content">
            <h3 class="so-card-title">John Doe</h3>
            <p class="so-card-subtitle">2 hours ago</p>
        </div>
        <button class="so-btn so-btn-icon so-btn-ghost">
            <span class="material-icons">more_vert</span>
        </button>
    </div>
    <div class="so-card-body">
        <p>Card content here...</p>
    </div>
</div>

<!-- Card with initial avatar -->
<div class="so-card">
    <div class="so-card-header so-card-header-avatar">
        <div class="so-avatar so-avatar-primary">
            <span>JD</span>
        </div>
        <div class="so-card-header-content">
            <h3 class="so-card-title">Jane Davis</h3>
            <p class="so-card-subtitle">Engineering Lead</p>
        </div>
    </div>
    <div class="so-card-body">...</div>
</div>

<!-- Status options: so-avatar-status-online, so-avatar-status-away,
     so-avatar-status-busy, so-avatar-status-offline -->', 'html') ?>
            </div>
        </div>

        <!-- Cards with Dropdowns -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Cards with Dropdowns</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Integrate dropdowns in card headers for actions, filters, or navigation.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-md-2 so-grid-cols-sm-1 so-gap-4">
                    <!-- Card with Options Dropdown (Icon) -->
                    <div class="so-card">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Project Overview</h3>
                            <div class="so-dropdown" data-so-dropdown>
                                <button type="button" class="so-btn so-btn-icon so-btn-ghost so-dropdown-trigger">
                                    <span class="material-icons">more_vert</span>
                                </button>
                                <div class="so-dropdown-menu so-dropdown-menu-end">
                                    <div class="so-dropdown-item" data-action="edit">
                                        <span class="material-icons">edit</span>
                                        <span>Edit</span>
                                    </div>
                                    <div class="so-dropdown-item" data-action="duplicate">
                                        <span class="material-icons">content_copy</span>
                                        <span>Duplicate</span>
                                    </div>
                                    <div class="so-dropdown-item" data-action="share">
                                        <span class="material-icons">share</span>
                                        <span>Share</span>
                                    </div>
                                    <div class="so-dropdown-divider"></div>
                                    <div class="so-dropdown-item so-dropdown-item-danger" data-action="delete">
                                        <span class="material-icons">delete</span>
                                        <span>Delete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="so-card-body">
                            <p class="so-text-muted so-text-sm">Card with icon-only options dropdown for quick actions. Great for minimal UI with multiple actions.</p>
                            <div class="so-d-flex so-gap-4 so-mt-3">
                                <div>
                                    <p class="so-text-muted so-fs-xs">Tasks</p>
                                    <p class="so-fw-semibold">24</p>
                                </div>
                                <div>
                                    <p class="so-text-muted so-fs-xs">Progress</p>
                                    <p class="so-fw-semibold">68%</p>
                                </div>
                            </div>
                        </div>
                        <div class="so-card-footer">
                            <span class="so-badge so-badge-soft-success">Active</span>
                            <button class="so-btn so-btn-primary so-btn-sm">View Details</button>
                        </div>
                    </div>

                    <!-- Card with Filter/Select Dropdown -->
                    <div class="so-card">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Sales Report</h3>
                            <div class="so-dropdown" data-so-dropdown>
                                <button type="button" class="so-btn so-btn-light so-btn-sm so-dropdown-trigger">
                                    <span class="so-dropdown-selected">This Week</span>
                                    <span class="material-icons so-dropdown-arrow">expand_more</span>
                                </button>
                                <div class="so-dropdown-menu so-dropdown-menu-end">
                                    <div class="so-dropdown-item active" data-value="week">This Week</div>
                                    <div class="so-dropdown-item" data-value="month">This Month</div>
                                    <div class="so-dropdown-item" data-value="quarter">This Quarter</div>
                                    <div class="so-dropdown-item" data-value="year">This Year</div>
                                    <div class="so-dropdown-divider"></div>
                                    <div class="so-dropdown-item" data-value="custom">Custom Range</div>
                                </div>
                            </div>
                        </div>
                        <div class="so-card-body">
                            <p class="so-text-muted so-text-sm">Card with select/filter dropdown for time periods or categories. Ideal for reports and dashboards.</p>
                            <div class="so-d-flex so-gap-4 so-mt-3">
                                <div>
                                    <p class="so-text-muted so-fs-xs">Revenue</p>
                                    <p class="so-fw-semibold so-text-success">$12,450</p>
                                </div>
                                <div>
                                    <p class="so-text-muted so-fs-xs">Orders</p>
                                    <p class="so-fw-semibold">156</p>
                                </div>
                            </div>
                        </div>
                        <div class="so-card-footer">
                            <span class="so-text-success so-fs-sm"><span class="material-icons so-fs-sm">trending_up</span> +12.5%</span>
                            <button class="so-btn so-btn-outline so-btn-sm">Export</button>
                        </div>
                    </div>

                    <!-- Card with Searchable Dropdown -->
                    <div class="so-card">
                        <div class="so-card-header">
                            <h3 class="so-card-title">Team Members</h3>
                            <div class="so-dropdown so-dropdown-searchable" data-so-dropdown>
                                <button type="button" class="so-btn so-btn-soft-primary so-btn-sm so-dropdown-trigger">
                                    <span class="material-icons">person_add</span>
                                    <span class="so-dropdown-selected">Add Member</span>
                                    <span class="material-icons so-dropdown-arrow">expand_more</span>
                                </button>
                                <div class="so-dropdown-menu so-dropdown-menu-end">
                                    <div class="so-dropdown-search">
                                        <input type="text" class="so-dropdown-search-input" placeholder="Search users...">
                                    </div>
                                    <div class="so-dropdown-items">
                                        <div class="so-dropdown-item" data-value="john">
                                            <span class="material-icons">person</span>
                                            John Doe
                                        </div>
                                        <div class="so-dropdown-item" data-value="sarah">
                                            <span class="material-icons">person</span>
                                            Sarah Wilson
                                        </div>
                                        <div class="so-dropdown-item" data-value="mike">
                                            <span class="material-icons">person</span>
                                            Mike Johnson
                                        </div>
                                        <div class="so-dropdown-item" data-value="emma">
                                            <span class="material-icons">person</span>
                                            Emma Davis
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="so-card-body">
                            <p class="so-text-muted so-text-sm">Card with searchable dropdown for adding team members or selecting from large lists.</p>
                            <div class="so-avatar-group so-avatar-group-stacked so-mt-3">
                                <div class="so-avatar so-avatar-sm"><img src="https://i.pravatar.cc/80?img=1" alt=""></div>
                                <div class="so-avatar so-avatar-sm"><img src="https://i.pravatar.cc/80?img=5" alt=""></div>
                                <div class="so-avatar so-avatar-sm"><img src="https://i.pravatar.cc/80?img=12" alt=""></div>
                                <div class="so-avatar so-avatar-sm so-avatar-secondary"><span>+3</span></div>
                            </div>
                        </div>
                        <div class="so-card-footer">
                            <span class="so-text-muted so-fs-sm">6 members</span>
                            <button class="so-btn so-btn-ghost so-btn-sm">Manage Team</button>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<!-- Card with Icon Options Dropdown -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Project Overview</h3>
        <div class="so-dropdown" data-so-dropdown>
            <button type="button" class="so-btn so-btn-icon so-btn-ghost so-dropdown-trigger">
                <span class="material-icons">more_vert</span>
            </button>
            <div class="so-dropdown-menu so-dropdown-menu-end">
                <div class="so-dropdown-item">Edit</div>
                <div class="so-dropdown-item">Duplicate</div>
                <div class="so-dropdown-divider"></div>
                <div class="so-dropdown-item so-dropdown-item-danger">Delete</div>
            </div>
        </div>
    </div>
    <div class="so-card-body">...</div>
    <div class="so-card-footer">...</div>
</div>

<!-- Card with Filter/Select Dropdown -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Sales Report</h3>
        <div class="so-dropdown" data-so-dropdown>
            <button type="button" class="so-btn so-btn-light so-btn-sm so-dropdown-trigger">
                <span class="so-dropdown-selected">This Week</span>
                <span class="material-icons so-dropdown-arrow">expand_more</span>
            </button>
            <div class="so-dropdown-menu so-dropdown-menu-end">
                <div class="so-dropdown-item active">This Week</div>
                <div class="so-dropdown-item">This Month</div>
                <div class="so-dropdown-item">This Year</div>
            </div>
        </div>
    </div>
    <div class="so-card-body">...</div>
    <div class="so-card-footer">...</div>
</div>

<!-- Card with Searchable Dropdown -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Team Members</h3>
        <div class="so-dropdown so-dropdown-searchable" data-so-dropdown>
            <button type="button" class="so-btn so-btn-soft-primary so-btn-sm so-dropdown-trigger">
                <span class="material-icons">person_add</span>
                <span class="so-dropdown-selected">Add Member</span>
                <span class="material-icons so-dropdown-arrow">expand_more</span>
            </button>
            <div class="so-dropdown-menu so-dropdown-menu-end">
                <div class="so-dropdown-search">
                    <input type="text" class="so-dropdown-search-input" placeholder="Search...">
                </div>
                <div class="so-dropdown-items">
                    <div class="so-dropdown-item">John Doe</div>
                    <div class="so-dropdown-item">Sarah Wilson</div>
                </div>
            </div>
        </div>
    </div>
    <div class="so-card-body">...</div>
    <div class="so-card-footer">...</div>
</div>', 'html') ?>
            </div>
        </div>

        <!-- Horizontal Cards -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Horizontal Cards</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Cards with side-by-side image and content layout.</p>
                <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card so-card-horizontal">
                        <img class="so-card-img" src="https://picsum.photos/seed/card1/400/300" alt="Card image">
                        <div class="so-card-content">
                            <div class="so-card-body">
                                <h4 class="so-mb-2">Horizontal Card</h4>
                                <p class="so-text-muted so-text-sm">Content displayed beside the image. The layout stacks on mobile for better readability.</p>
                            </div>
                            <div class="so-card-footer">
                                <button class="so-btn so-btn-primary so-btn-sm">Learn More</button>
                            </div>
                        </div>
                    </div>

                    <div class="so-card so-card-horizontal">
                        <img class="so-card-img" src="https://picsum.photos/seed/card2/400/300" alt="Card image">
                        <div class="so-card-content">
                            <div class="so-card-body">
                                <span class="so-badge so-badge-soft-success so-mb-2">Featured</span>
                                <h4 class="so-mb-2">Product Highlight</h4>
                                <p class="so-text-muted so-text-sm">Showcase products or features with this horizontal layout.</p>
                            </div>
                            <div class="so-card-footer">
                                <span class="so-text-lg so-font-bold">$99</span>
                                <button class="so-btn so-btn-primary so-btn-sm">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<div class="so-card so-card-horizontal">
    <img class="so-card-img" src="image.jpg" alt="Card image">
    <div class="so-card-content">
        <div class="so-card-body">
            <h4>Horizontal Card</h4>
            <p>Content beside the image.</p>
        </div>
        <div class="so-card-footer">
            <button class="so-btn so-btn-primary">Action</button>
        </div>
    </div>
</div>', 'html') ?>
            </div>
        </div>

        <!-- Cards with Images -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Cards with Images</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Cards featuring images at the top, bottom, or as overlays.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card">
                        <img class="so-card-img-top" src="https://picsum.photos/seed/top/400/200" alt="Card image">
                        <div class="so-card-body">
                            <h4 class="so-mb-2">Image Top</h4>
                            <p class="so-text-muted so-text-sm">Card with image at the top.</p>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-body">
                            <h4 class="so-mb-2">Image Bottom</h4>
                            <p class="so-text-muted so-text-sm">Card with image at the bottom.</p>
                        </div>
                        <img class="so-card-img-bottom" src="https://picsum.photos/seed/bottom/400/200" alt="Card image">
                    </div>

                    <div class="so-card so-card-has-overlay">
                        <img class="so-card-img" src="https://picsum.photos/seed/overlay/400/300" alt="Card image">
                        <div class="so-card-overlay">
                            <h4 class="so-mb-2">Image Overlay</h4>
                            <p class="so-text-sm">Content overlaid on the image.</p>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<!-- Image top -->
<div class="so-card">
    <img class="so-card-img-top" src="image.jpg" alt="">
    <div class="so-card-body">...</div>
</div>

<!-- Image bottom -->
<div class="so-card">
    <div class="so-card-body">...</div>
    <img class="so-card-img-bottom" src="image.jpg" alt="">
</div>

<!-- Image overlay -->
<div class="so-card so-card-has-overlay">
    <img class="so-card-img" src="image.jpg" alt="">
    <div class="so-card-overlay">
        <h4>Title</h4>
        <p>Content overlaid on image.</p>
    </div>
</div>', 'html') ?>
            </div>
        </div>

        <!-- Card Actions -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Card Actions</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Different action area layouts for cards.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1 so-gap-4">
                    <a href="#" class="so-card so-card-action-area" style="text-decoration: none;">
                        <div class="so-card-body">
                            <h4 class="so-mb-2">Clickable Card</h4>
                            <p class="so-text-muted so-text-sm">Entire card is clickable. Hover to see the effect.</p>
                        </div>
                    </a>

                    <div class="so-card">
                        <div class="so-card-body">
                            <h4 class="so-mb-2">Actions Start</h4>
                            <p class="so-text-muted so-text-sm">Action buttons aligned to start.</p>
                        </div>
                        <div class="so-card-actions so-card-actions-start">
                            <button class="so-btn so-btn-ghost so-btn-sm">
                                <span class="material-icons">thumb_up</span>
                            </button>
                            <button class="so-btn so-btn-ghost so-btn-sm">
                                <span class="material-icons">comment</span>
                            </button>
                            <button class="so-btn so-btn-ghost so-btn-sm">
                                <span class="material-icons">share</span>
                            </button>
                        </div>
                    </div>

                    <div class="so-card">
                        <div class="so-card-body">
                            <h4 class="so-mb-2">Actions Between</h4>
                            <p class="so-text-muted so-text-sm">Space between action buttons.</p>
                        </div>
                        <div class="so-card-actions so-card-actions-between">
                            <button class="so-btn so-btn-ghost so-btn-sm">
                                <span class="material-icons">favorite</span> 24
                            </button>
                            <button class="so-btn so-btn-primary so-btn-sm">View</button>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<!-- Clickable card -->
<a href="#" class="so-card so-card-action-area">
    <div class="so-card-body">...</div>
</a>

<!-- Actions aligned start -->
<div class="so-card-actions so-card-actions-start">
    <button class="so-btn so-btn-ghost">Like</button>
    <button class="so-btn so-btn-ghost">Share</button>
</div>

<!-- Actions space between -->
<div class="so-card-actions so-card-actions-between">
    <span>Info</span>
    <button class="so-btn so-btn-primary">Action</button>
</div>', 'html') ?>
            </div>
        </div>

        <!-- Loading Skeleton State -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Loading / Skeleton State</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Placeholder animations while content is loading.</p>
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1 so-gap-4">
                    <div class="so-card so-card-loading">
                        <div class="so-card-header so-card-header-avatar">
                            <div class="so-skeleton so-skeleton-avatar"></div>
                            <div class="so-card-header-content">
                                <div class="so-skeleton so-skeleton-title"></div>
                                <div class="so-skeleton so-skeleton-text" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="so-card-body">
                            <div class="so-skeleton so-skeleton-text"></div>
                            <div class="so-skeleton so-skeleton-text"></div>
                            <div class="so-skeleton so-skeleton-text" style="width: 75%"></div>
                        </div>
                    </div>

                    <div class="so-card so-card-loading">
                        <div class="so-skeleton so-skeleton-img"></div>
                        <div class="so-card-body">
                            <div class="so-skeleton so-skeleton-title"></div>
                            <div class="so-skeleton so-skeleton-text"></div>
                            <div class="so-skeleton so-skeleton-text" style="width: 60%"></div>
                        </div>
                    </div>

                    <div class="so-card so-card-loading">
                        <div class="so-card-body">
                            <div class="so-skeleton so-skeleton-title" style="width: 70%"></div>
                            <div class="so-skeleton so-skeleton-text"></div>
                            <div class="so-skeleton so-skeleton-text"></div>
                            <div class="so-skeleton so-skeleton-text"></div>
                            <div class="so-skeleton so-skeleton-text" style="width: 50%"></div>
                        </div>
                        <div class="so-card-footer">
                            <div class="so-skeleton" style="width: 80px; height: 32px;"></div>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<div class="so-card so-card-loading">
    <div class="so-card-header so-card-header-avatar">
        <div class="so-skeleton so-skeleton-avatar"></div>
        <div class="so-card-header-content">
            <div class="so-skeleton so-skeleton-title"></div>
            <div class="so-skeleton so-skeleton-text" style="width: 40%"></div>
        </div>
    </div>
    <div class="so-card-body">
        <div class="so-skeleton so-skeleton-text"></div>
        <div class="so-skeleton so-skeleton-text"></div>
        <div class="so-skeleton so-skeleton-text"></div>
    </div>
</div>

<!-- With image placeholder -->
<div class="so-card so-card-loading">
    <div class="so-skeleton so-skeleton-img"></div>
    <div class="so-card-body">
        <div class="so-skeleton so-skeleton-title"></div>
        <div class="so-skeleton so-skeleton-text"></div>
    </div>
</div>', 'html') ?>
            </div>
        </div>

        <!-- Card Group -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Card Group</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Group multiple cards together in a connected layout.</p>
                <div class="so-card-group so-mb-4">
                    <div class="so-card">
                        <img class="so-card-img-top" src="https://picsum.photos/seed/group1/400/200" alt="Card image">
                        <div class="so-card-body">
                            <h4 class="so-mb-2">Card One</h4>
                            <p class="so-text-muted so-text-sm">First card in the group.</p>
                        </div>
                    </div>
                    <div class="so-card">
                        <img class="so-card-img-top" src="https://picsum.photos/seed/group2/400/200" alt="Card image">
                        <div class="so-card-body">
                            <h4 class="so-mb-2">Card Two</h4>
                            <p class="so-text-muted so-text-sm">Second card in the group.</p>
                        </div>
                    </div>
                    <div class="so-card">
                        <img class="so-card-img-top" src="https://picsum.photos/seed/group3/400/200" alt="Card image">
                        <div class="so-card-body">
                            <h4 class="so-mb-2">Card Three</h4>
                            <p class="so-text-muted so-text-sm">Third card in the group.</p>
                        </div>
                    </div>
                </div>
                <?= so_code_block('<div class="so-card-group">
    <div class="so-card">
        <img class="so-card-img-top" src="image1.jpg" alt="">
        <div class="so-card-body">...</div>
    </div>
    <div class="so-card">
        <img class="so-card-img-top" src="image2.jpg" alt="">
        <div class="so-card-body">...</div>
    </div>
    <div class="so-card">
        <img class="so-card-img-top" src="image3.jpg" alt="">
        <div class="so-card-body">...</div>
    </div>
</div>', 'html') ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once '../includes/footer.php';
?>
