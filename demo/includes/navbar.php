<?php
/**
 * SixOrbit UI Demo - Navbar Component
 * Matches original first_draft/sixorbit-ui/index.html navbar exactly
 */
?>
<!-- Navbar -->
<nav class="so-navbar">
    <div class="so-navbar-container">
        <!-- Left Section (Mobile toggle only) -->
        <div class="so-navbar-left">
            <button class="so-navbar-toggle" data-toggle="sidebar" title="Toggle Menu">
                <span class="material-icons">menu</span>
            </button>
        </div>

        <!-- Center Section - Search -->
        <div class="so-navbar-center">
            <div class="so-navbar-search">
                <div class="so-navbar-search-wrapper">
                    <span class="material-icons so-navbar-search-icon">search</span>
                    <input type="text" class="so-navbar-search-input" placeholder="Search what you want to do.. [CTRL + K]">
                    <button class="so-navbar-search-clear">
                        <span class="material-icons">close</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div class="so-navbar-right">
            <!-- Outlet Selector -->
            <div class="so-navbar-outlet-selector">
                <button class="so-navbar-outlet-btn" title="Select Outlet">
                    <span class="material-icons">storefront</span>
                    <span class="outlet-text">All Outlets</span>
                    <span class="material-icons">expand_more</span>
                </button>
                <div class="so-navbar-outlet-dropdown">
                    <div class="so-navbar-outlet-search">
                        <input type="text" placeholder="Search outlets...">
                    </div>
                    <div class="so-navbar-outlet-list">
                        <div class="so-navbar-outlet-item selected" data-value="all">
                            <span>All Outlets</span>
                            <span class="material-icons check-icon">check</span>
                        </div>
                        <div class="so-navbar-outlet-item" data-value="head-office">
                            <span>TROVE Head Office</span>
                            <span class="material-icons check-icon">check</span>
                        </div>
                        <div class="so-navbar-outlet-item" data-value="basavanagudi">
                            <span>TROVE Basavanagudi</span>
                            <span class="material-icons check-icon">check</span>
                        </div>
                        <div class="so-navbar-outlet-item" data-value="jayanagar">
                            <span>TROVE Jayanagar</span>
                            <span class="material-icons check-icon">check</span>
                        </div>
                        <div class="so-navbar-outlet-item" data-value="indiranagar">
                            <span>TROVE Indiranagar</span>
                            <span class="material-icons check-icon">check</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="so-navbar-divider"></div>

            <!-- User Status Selector -->
            <div class="so-navbar-status" id="userStatusSelector">
                <button class="so-navbar-status-btn" title="Set your status">
                    <span class="so-navbar-status-indicator available" id="statusIndicator"></span>
                    <span class="so-navbar-status-text" id="statusText">Available</span>
                    <span class="material-icons">expand_more</span>
                </button>
                <div class="so-navbar-status-dropdown">
                    <div class="so-navbar-status-header">
                        <span class="material-icons">schedule</span>
                        Set Your Status
                    </div>
                    <div class="so-navbar-status-list">
                        <button class="so-navbar-status-option selected" data-status="available">
                            <span class="so-navbar-status-option-dot available"></span>
                            <div class="so-navbar-status-option-text">
                                <div>Available</div>
                                <div class="so-navbar-status-option-desc">Ready for new assignments</div>
                            </div>
                            <span class="material-icons check-icon">check</span>
                        </button>
                        <button class="so-navbar-status-option" data-status="with-customer">
                            <span class="so-navbar-status-option-dot with-customer"></span>
                            <div class="so-navbar-status-option-text">
                                <div>With Customer</div>
                                <div class="so-navbar-status-option-desc">Attending a walk-in customer</div>
                            </div>
                            <span class="material-icons check-icon">check</span>
                        </button>
                        <button class="so-navbar-status-option" data-status="in-meeting">
                            <span class="so-navbar-status-option-dot in-meeting"></span>
                            <div class="so-navbar-status-option-text">
                                <div>In Meeting</div>
                                <div class="so-navbar-status-option-desc">In a scheduled meeting</div>
                            </div>
                            <span class="material-icons check-icon">check</span>
                        </button>
                        <button class="so-navbar-status-option" data-status="on-call">
                            <span class="so-navbar-status-option-dot on-call"></span>
                            <div class="so-navbar-status-option-text">
                                <div>On Call</div>
                                <div class="so-navbar-status-option-desc">On a phone/video call</div>
                            </div>
                            <span class="material-icons check-icon">check</span>
                        </button>
                        <button class="so-navbar-status-option" data-status="on-leave">
                            <span class="so-navbar-status-option-dot on-leave"></span>
                            <div class="so-navbar-status-option-text">
                                <div>On Leave</div>
                                <div class="so-navbar-status-option-desc">Not available today</div>
                            </div>
                            <span class="material-icons check-icon">check</span>
                        </button>
                        <button class="so-navbar-status-option" data-status="away">
                            <span class="so-navbar-status-option-dot away"></span>
                            <div class="so-navbar-status-option-text">
                                <div>Away</div>
                                <div class="so-navbar-status-option-desc">Temporarily away from desk</div>
                            </div>
                            <span class="material-icons check-icon">check</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="so-navbar-divider"></div>

            <!-- Keyboard Shortcuts -->
            <button class="so-navbar-icon-btn" id="keyboardShortcutsBtn" title="Keyboard Shortcuts">
                <span class="material-icons">keyboard</span>
            </button>

            <!-- Settings Icon -->
            <button class="so-navbar-icon-btn" title="Settings">
                <span class="material-icons">settings</span>
            </button>

            <!-- Theme Switcher -->
            <div class="so-navbar-theme">
                <button class="so-navbar-icon-btn so-navbar-theme-btn" title="Theme">
                    <span class="material-icons theme-icon">light_mode</span>
                </button>
                <div class="so-navbar-theme-dropdown">
                    <div class="so-navbar-theme-header">Appearance</div>
                    <button class="so-navbar-theme-option" data-theme="light">
                        <span class="material-icons">light_mode</span>
                        <span>Light</span>
                        <span class="material-icons theme-check">check</span>
                    </button>
                    <button class="so-navbar-theme-option" data-theme="dark">
                        <span class="material-icons">dark_mode</span>
                        <span>Dark</span>
                        <span class="material-icons theme-check">check</span>
                    </button>
                    <button class="so-navbar-theme-option" data-theme="system">
                        <span class="material-icons">computer</span>
                        <span>System</span>
                        <span class="material-icons theme-check">check</span>
                    </button>
                    <button class="so-navbar-theme-option" data-theme="sidebar-dark">
                        <span class="material-icons">contrast</span>
                        <span>Dark Sidebar</span>
                        <span class="material-icons theme-check">check</span>
                    </button>
                    <div class="so-navbar-theme-divider"></div>
                    <div class="so-navbar-theme-header">Font Size</div>
                    <button class="so-navbar-theme-option" data-fontsize="small">
                        <span class="material-icons">text_decrease</span>
                        <span>Small</span>
                        <span class="material-icons fontsize-check">check</span>
                    </button>
                    <button class="so-navbar-theme-option" data-fontsize="default">
                        <span class="material-icons">format_size</span>
                        <span>Default</span>
                        <span class="material-icons fontsize-check">check</span>
                    </button>
                    <button class="so-navbar-theme-option" data-fontsize="large">
                        <span class="material-icons">text_increase</span>
                        <span>Large</span>
                        <span class="material-icons fontsize-check">check</span>
                    </button>
                </div>
            </div>

            <!-- Apps Menu (Google-like) -->
            <div class="so-navbar-apps">
                <button class="so-navbar-icon-btn so-navbar-apps-btn" title="Apps">
                    <span class="material-icons">apps</span>
                </button>
                <div class="so-navbar-apps-dropdown">
                    <div class="so-navbar-apps-header">Quick Access</div>
                    <div class="so-navbar-apps-grid">
                        <a href="video-tutorial.php" class="so-navbar-apps-item">
                            <div class="so-navbar-apps-icon" style="background: #ea4335;">
                                <span class="material-icons">play_circle</span>
                            </div>
                            <span class="so-navbar-apps-label">Video Tutorial</span>
                        </a>
                        <a href="#" class="so-navbar-apps-item">
                            <div class="so-navbar-apps-icon" style="background: #4285f4;">
                                <span class="material-icons">auto_fix_high</span>
                            </div>
                            <span class="so-navbar-apps-label">System Wizard</span>
                        </a>
                        <a href="#" class="so-navbar-apps-item">
                            <div class="so-navbar-apps-icon" style="background: #34a853;">
                                <span class="material-icons">help_outline</span>
                            </div>
                            <span class="so-navbar-apps-label">Help Center</span>
                        </a>
                        <a href="#" class="so-navbar-apps-item">
                            <div class="so-navbar-apps-icon" style="background: #fbbc04;">
                                <span class="material-icons">support_agent</span>
                            </div>
                            <span class="so-navbar-apps-label">Support</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="so-navbar-divider"></div>

            <!-- User Menu -->
            <div class="so-navbar-user">
                <button class="so-navbar-user-btn">
                    <div class="so-navbar-user-avatar" data-color="teal"><?= substr(DEMO_USER_NAME, 0, 1) ?></div>
                </button>
                <div class="so-navbar-user-dropdown">
                    <div class="so-navbar-user-header">
                        <div class="so-navbar-user-header-avatar" data-color="teal"><?= substr(DEMO_USER_NAME, 0, 1) ?></div>
                        <div class="so-navbar-user-header-name"><?= DEMO_USER_NAME ?></div>
                        <div class="so-navbar-user-header-email"><?= DEMO_USER_EMAIL ?></div>
                    </div>
                    <div class="so-navbar-user-menu">
                        <a href="#" class="so-navbar-user-menu-item">
                            <span class="material-icons">person</span>
                            <span>My Profile</span>
                        </a>
                        <a href="#" class="so-navbar-user-menu-item">
                            <span class="material-icons">settings</span>
                            <span>Account Settings</span>
                        </a>
                    </div>
                    <div class="so-navbar-user-footer">
                        <button class="so-navbar-user-footer-btn" id="navbarFullscreenBtn" title="Fullscreen">
                            <span class="material-icons">fullscreen</span>
                        </button>
                        <button class="so-navbar-user-footer-btn" id="lockScreenBtn" title="Lock Screen">
                            <span class="material-icons">lock</span>
                        </button>
                        <button class="so-navbar-user-footer-btn" id="navbarLogoutBtn" title="Logout">
                            <span class="material-icons">power_settings_new</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Search Overlay -->
<div class="so-search-overlay">
    <div class="so-search-overlay-backdrop"></div>
    <div class="so-search-overlay-content">
        <!-- Search Header -->
        <div class="so-search-overlay-header">
            <div class="so-search-overlay-input-wrapper">
                <span class="material-icons so-search-overlay-icon">search</span>
                <input type="text" class="so-search-overlay-input" placeholder="Search products, menus, actions... (Type isv: for item search)" autofocus>
                <div class="so-search-overlay-shortcut">
                    <kbd>ESC</kbd>
                </div>
                <button class="so-search-overlay-close" title="Close">
                    <span class="material-icons">close</span>
                </button>
            </div>
        </div>

        <!-- Search Body -->
        <div class="so-search-overlay-body">
            <!-- Quick Links -->
            <div class="so-search-quick-links">
                <div class="so-search-quick-links-title">Quick Links</div>
                <div class="so-search-quick-links-grid">
                    <a href="#" class="so-search-quick-link" data-action="new-order">
                        <div class="so-search-quick-link-icon blue">
                            <span class="material-icons">add_shopping_cart</span>
                        </div>
                        <span class="so-search-quick-link-text">New Order</span>
                    </a>
                    <a href="#" class="so-search-quick-link" data-action="new-customer">
                        <div class="so-search-quick-link-icon green">
                            <span class="material-icons">person_add</span>
                        </div>
                        <span class="so-search-quick-link-text">New Customer</span>
                    </a>
                    <a href="#" class="so-search-quick-link" data-action="new-invoice">
                        <div class="so-search-quick-link-icon orange">
                            <span class="material-icons">receipt_long</span>
                        </div>
                        <span class="so-search-quick-link-text">New Invoice</span>
                    </a>
                    <a href="#" class="so-search-quick-link" data-action="new-purchase">
                        <div class="so-search-quick-link-icon red">
                            <span class="material-icons">shopping_cart</span>
                        </div>
                        <span class="so-search-quick-link-text">New Purchase</span>
                    </a>
                    <a href="#" class="so-search-quick-link" data-action="stock-report">
                        <div class="so-search-quick-link-icon blue">
                            <span class="material-icons">inventory_2</span>
                        </div>
                        <span class="so-search-quick-link-text">Stock Report</span>
                    </a>
                    <a href="#" class="so-search-quick-link" data-action="sales-report">
                        <div class="so-search-quick-link-icon green">
                            <span class="material-icons">bar_chart</span>
                        </div>
                        <span class="so-search-quick-link-text">Sales Report</span>
                    </a>
                </div>
            </div>

            <!-- Empty State (initial) -->
            <div class="so-search-empty visible">
                <span class="material-icons so-search-empty-icon">search</span>
                <div class="so-search-empty-title">Start typing to search</div>
                <div class="so-search-empty-text">Search for menus, customers, vendors, ledgers or type "isv:" for item search</div>
            </div>

            <!-- Results Container (hidden by default) -->
            <div class="so-search-results-container" style="display: none;">
                <!-- Results will be populated dynamically -->
            </div>

            <!-- Loading State -->
            <div class="so-search-loading">
                <div class="so-search-loading-spinner"></div>
            </div>
        </div>

        <!-- Search Footer -->
        <div class="so-search-overlay-footer">
            <div class="so-search-overlay-footer-hint">
                <kbd>↑</kbd><kbd>↓</kbd> to navigate
                <kbd>↵</kbd> to select
                <kbd>ESC</kbd> to close
                <span style="margin-left: auto;">Tip: Type <kbd>isv:</kbd> for item search with filters</span>
            </div>
        </div>
    </div>
</div>

<!-- Recent Searches Section (shown below search) -->
<div class="so-search-overlay-section" id="recentSearches" style="display: none;">
    <div class="so-search-overlay-section-title">Recent Searches</div>
    <div class="so-search-overlay-results">
        <a href="#" class="so-search-overlay-item">
            <div class="so-search-overlay-item-icon blue">
                <span class="material-icons">history</span>
            </div>
            <div class="so-search-overlay-item-content">
                <div class="so-search-overlay-item-title">Ajay Kumar - Customer Ledger</div>
            </div>
        </a>
        <a href="#" class="so-search-overlay-item">
            <div class="so-search-overlay-item-icon blue">
                <span class="material-icons">history</span>
            </div>
            <div class="so-search-overlay-item-content">
                <div class="so-search-overlay-item-title">Sales Report March 2024</div>
            </div>
        </a>
        <a href="#" class="so-search-overlay-item">
            <div class="so-search-overlay-item-icon blue">
                <span class="material-icons">history</span>
            </div>
            <div class="so-search-overlay-item-content">
                <div class="so-search-overlay-item-title">INV-2024-001256</div>
            </div>
        </a>
    </div>
</div>
