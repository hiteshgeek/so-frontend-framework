<?php
/**
 * SixOrbit UI Demo - Empty States
 */
$pageTitle = 'Empty States';
$pageDescription = 'Placeholder components to display when content is empty, missing, or an action is needed.';

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
            <h1 class="so-page-title"><?= htmlspecialchars($pageTitle) ?></h1>
            <p class="so-page-subtitle"><?= htmlspecialchars($pageDescription) ?></p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">

<!-- Basic Empty State -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Basic Empty State</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Simple empty state with icon, title, and description.</p>

        <div class="so-empty-state">
            <div class="so-empty-state-icon">
                <span class="material-icons">inbox</span>
            </div>
            <h3 class="so-empty-state-title">No messages yet</h3>
            <p class="so-empty-state-text">Your inbox is empty. When you receive new messages, they'll appear here.</p>
        </div>
    </div>
</div>

<!-- Empty State with Action -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Empty State with Action</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Include a call-to-action button to guide users.</p>

        <div class="so-empty-state">
            <div class="so-empty-state-icon">
                <span class="material-icons">folder_open</span>
            </div>
            <h3 class="so-empty-state-title">No projects found</h3>
            <p class="so-empty-state-text">Get started by creating your first project. It only takes a minute.</p>
            <div class="so-empty-state-action">
                <button class="so-btn so-btn-primary">
                    <span class="material-icons">add</span>
                    Create Project
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Search Empty State -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Search Empty State</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Show when search returns no results.</p>

        <div class="so-empty-state">
            <div class="so-empty-state-icon">
                <span class="material-icons">search_off</span>
            </div>
            <h3 class="so-empty-state-title">No results found</h3>
            <p class="so-empty-state-text">We couldn't find anything matching "design system". Try different keywords or check for typos.</p>
            <div class="so-empty-state-action">
                <button class="so-btn so-btn-outline">Clear Search</button>
            </div>
        </div>
    </div>
</div>

<!-- Error State -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Error State</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Display when something goes wrong.</p>

        <div class="so-empty-state so-empty-state-danger">
            <div class="so-empty-state-icon">
                <span class="material-icons">error_outline</span>
            </div>
            <h3 class="so-empty-state-title">Something went wrong</h3>
            <p class="so-empty-state-text">We're having trouble loading your data. Please try again or contact support if the problem persists.</p>
            <div class="so-empty-state-action">
                <button class="so-btn so-btn-danger">
                    <span class="material-icons">refresh</span>
                    Try Again
                </button>
                <button class="so-btn so-btn-outline">Contact Support</button>
            </div>
        </div>
    </div>
</div>

<!-- Success State -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Success State</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Celebrate successful completions.</p>

        <div class="so-empty-state so-empty-state-success">
            <div class="so-empty-state-icon">
                <span class="material-icons">check_circle</span>
            </div>
            <h3 class="so-empty-state-title">All caught up!</h3>
            <p class="so-empty-state-text">You've completed all your tasks for today. Great work!</p>
            <div class="so-empty-state-action">
                <button class="so-btn so-btn-success">View Completed Tasks</button>
            </div>
        </div>
    </div>
</div>

<!-- Size Variants -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Size Variants</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Different sizes for various contexts.</p>

        <div class="so-row so-g-4">
            <div class="so-col-md-4">
                <div class="so-card so-card-bordered">
                    <div class="so-card-body">
                        <h6 class="so-text-muted so-mb-3">Small</h6>
                        <div class="so-empty-state so-empty-state-sm">
                            <div class="so-empty-state-icon">
                                <span class="material-icons">notifications_none</span>
                            </div>
                            <h4 class="so-empty-state-title">No notifications</h4>
                            <p class="so-empty-state-text">You're all caught up.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-col-md-4">
                <div class="so-card so-card-bordered">
                    <div class="so-card-body">
                        <h6 class="so-text-muted so-mb-3">Default</h6>
                        <div class="so-empty-state">
                            <div class="so-empty-state-icon">
                                <span class="material-icons">notifications_none</span>
                            </div>
                            <h4 class="so-empty-state-title">No notifications</h4>
                            <p class="so-empty-state-text">When there's activity, you'll see it here.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-col-md-4">
                <div class="so-card so-card-bordered">
                    <div class="so-card-body">
                        <h6 class="so-text-muted so-mb-3">Large</h6>
                        <div class="so-empty-state so-empty-state-lg">
                            <div class="so-empty-state-icon">
                                <span class="material-icons">notifications_none</span>
                            </div>
                            <h4 class="so-empty-state-title">No notifications</h4>
                            <p class="so-empty-state-text">When there's activity, you'll see it here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Compact Empty State -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Compact Empty State</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Minimal empty state for inline use.</p>

        <div class="so-empty-state so-empty-state-compact">
            <span class="material-icons">inventory_2</span>
            <span>No items in cart</span>
            <a href="#" class="so-link">Start shopping</a>
        </div>

        <div class="so-empty-state so-empty-state-compact so-mt-3">
            <span class="material-icons">schedule</span>
            <span>No recent activity</span>
        </div>
    </div>
</div>

<!-- Empty State with Card Styling -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Empty State with Card</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Empty state wrapped in a card for standalone use.</p>

        <div class="so-empty-state so-empty-state-card">
            <div class="so-empty-state-icon">
                <span class="material-icons">photo_library</span>
            </div>
            <h3 class="so-empty-state-title">No photos uploaded</h3>
            <p class="so-empty-state-text">Drag and drop photos here or click to browse your files.</p>
            <div class="so-empty-state-action">
                <button class="so-btn so-btn-primary">
                    <span class="material-icons">cloud_upload</span>
                    Upload Photos
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Different Icon Styles -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Different Icon Styles</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Various icon presentation styles.</p>

        <div class="so-row so-g-4">
            <div class="so-col-md-6">
                <div class="so-empty-state">
                    <div class="so-empty-state-icon so-empty-state-icon-circle">
                        <span class="material-icons">people</span>
                    </div>
                    <h4 class="so-empty-state-title">No team members</h4>
                    <p class="so-empty-state-text">Invite others to collaborate on this project.</p>
                    <div class="so-empty-state-action">
                        <button class="so-btn so-btn-outline so-btn-sm">Invite Members</button>
                    </div>
                </div>
            </div>
            <div class="so-col-md-6">
                <div class="so-empty-state">
                    <div class="so-empty-state-icon so-empty-state-icon-gradient">
                        <span class="material-icons">rocket_launch</span>
                    </div>
                    <h4 class="so-empty-state-title">Ready to launch?</h4>
                    <p class="so-empty-state-text">Your project is complete. Take it live with one click.</p>
                    <div class="so-empty-state-action">
                        <button class="so-btn so-btn-primary so-btn-sm">Launch Project</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Real World Examples -->
<div class="so-card">
    <div class="so-card-header">
        <h3 class="so-card-title">Real World Examples</h3>
    </div>
    <div class="so-card-body">
        <p class="so-text-muted so-mb-4">Common empty state scenarios.</p>

        <div class="so-row so-g-4">
            <!-- No orders -->
            <div class="so-col-md-6">
                <div class="so-card so-card-bordered">
                    <div class="so-card-header">
                        <h5 class="so-card-title">Recent Orders</h5>
                    </div>
                    <div class="so-card-body">
                        <div class="so-empty-state so-empty-state-sm">
                            <div class="so-empty-state-icon">
                                <span class="material-icons">shopping_bag</span>
                            </div>
                            <h4 class="so-empty-state-title">No orders yet</h4>
                            <p class="so-empty-state-text">Your orders will appear here after your first purchase.</p>
                            <div class="so-empty-state-action">
                                <button class="so-btn so-btn-primary so-btn-sm">Browse Products</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No favorites -->
            <div class="so-col-md-6">
                <div class="so-card so-card-bordered">
                    <div class="so-card-header">
                        <h5 class="so-card-title">Favorites</h5>
                    </div>
                    <div class="so-card-body">
                        <div class="so-empty-state so-empty-state-sm">
                            <div class="so-empty-state-icon">
                                <span class="material-icons">favorite_border</span>
                            </div>
                            <h4 class="so-empty-state-title">No favorites saved</h4>
                            <p class="so-empty-state-text">Items you favorite will be saved here for quick access.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- No data available -->
            <div class="so-col-md-6">
                <div class="so-card so-card-bordered">
                    <div class="so-card-header">
                        <h5 class="so-card-title">Analytics</h5>
                    </div>
                    <div class="so-card-body">
                        <div class="so-empty-state so-empty-state-sm">
                            <div class="so-empty-state-icon">
                                <span class="material-icons">insights</span>
                            </div>
                            <h4 class="so-empty-state-title">No data available</h4>
                            <p class="so-empty-state-text">Analytics will appear once there's enough data to display.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Connection error -->
            <div class="so-col-md-6">
                <div class="so-card so-card-bordered">
                    <div class="so-card-header">
                        <h5 class="so-card-title">Live Feed</h5>
                    </div>
                    <div class="so-card-body">
                        <div class="so-empty-state so-empty-state-sm so-empty-state-warning">
                            <div class="so-empty-state-icon">
                                <span class="material-icons">wifi_off</span>
                            </div>
                            <h4 class="so-empty-state-title">Connection lost</h4>
                            <p class="so-empty-state-text">Please check your internet connection and try again.</p>
                            <div class="so-empty-state-action">
                                <button class="so-btn so-btn-warning so-btn-sm">Reconnect</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</main>

<?php require_once '../includes/footer.php'; ?>
