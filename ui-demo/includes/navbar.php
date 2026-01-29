<?php
/**
 * UI Demo - Fixed Top Navbar
 * Navigation bar with links to all pages
 */
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<header class="so-bg-white so-shadow-sm" style="position: fixed; top: 0; left: 0; right: 0; z-index: 1030;">
    <div class="so-container">
        <div class="so-d-flex so-align-items-center so-justify-content-between" style="height: 64px;">
            <!-- Brand -->
            <a href="index.php" class="so-d-flex so-align-items-center so-text-decoration-none so-gap-2">
                <span class="material-icons so-text-primary" style="font-size: 32px;">cloud</span>
                <span class="so-fw-bold so-fs-lg so-text-dark">CloudStack</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="so-d-none so-d-md-flex so-align-items-center so-gap-1">
                <a href="index.php" class="so-btn so-btn-ghost <?php echo $currentPage === 'index' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    Home
                </a>
                <a href="features.php" class="so-btn so-btn-ghost <?php echo $currentPage === 'features' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    Features
                </a>
                <a href="pricing.php" class="so-btn so-btn-ghost <?php echo $currentPage === 'pricing' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    Pricing
                </a>
                <a href="about.php" class="so-btn so-btn-ghost <?php echo $currentPage === 'about' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    About
                </a>
                <a href="contact.php" class="so-btn so-btn-ghost <?php echo $currentPage === 'contact' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    Contact
                </a>
            </nav>

            <!-- Right Actions -->
            <div class="so-d-flex so-align-items-center so-gap-2">
                <!-- Theme Toggle -->
                <button class="so-btn so-btn-ghost so-btn-icon" id="themeToggle" title="Toggle theme">
                    <span class="material-icons" id="themeIcon">dark_mode</span>
                </button>

                <!-- Demo Home Link - Desktop -->
                <a href="../demo/index.php" class="so-btn so-btn-outline so-btn-sm so-d-none so-d-lg-inline-flex">
                    <span class="material-icons so-fs-sm so-me-1">arrow_back</span>
                    Demo Home
                </a>

                <!-- CTA Button - Desktop -->
                <a href="contact.php" class="so-btn so-btn-primary so-d-none so-d-md-inline-flex">
                    Get Started
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="so-btn so-btn-ghost so-btn-icon so-d-md-none" id="mobileMenuToggle">
                    <span class="material-icons" id="menuIcon">menu</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="so-bg-white so-border-top so-d-none" id="mobileMenu">
        <div class="so-container so-py-3">
            <nav class="so-d-flex so-flex-column so-gap-1">
                <a href="index.php" class="so-btn so-btn-ghost so-justify-content-start <?php echo $currentPage === 'index' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    <span class="material-icons so-me-2">home</span>
                    Home
                </a>
                <a href="features.php" class="so-btn so-btn-ghost so-justify-content-start <?php echo $currentPage === 'features' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    <span class="material-icons so-me-2">apps</span>
                    Features
                </a>
                <a href="pricing.php" class="so-btn so-btn-ghost so-justify-content-start <?php echo $currentPage === 'pricing' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    <span class="material-icons so-me-2">payments</span>
                    Pricing
                </a>
                <a href="about.php" class="so-btn so-btn-ghost so-justify-content-start <?php echo $currentPage === 'about' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    <span class="material-icons so-me-2">info</span>
                    About
                </a>
                <a href="contact.php" class="so-btn so-btn-ghost so-justify-content-start <?php echo $currentPage === 'contact' ? 'so-text-primary so-fw-semibold' : ''; ?>">
                    <span class="material-icons so-me-2">mail</span>
                    Contact
                </a>
                <div class="so-border-top so-my-2"></div>
                <div class="so-d-flex so-gap-2">
                    <a href="../demo/index.php" class="so-btn so-btn-outline so-flex-grow-1">
                        <span class="material-icons so-me-1">arrow_back</span>
                        Demo Home
                    </a>
                    <a href="contact.php" class="so-btn so-btn-primary so-flex-grow-1">
                        Get Started
                    </a>
                </div>
            </nav>
        </div>
    </div>
</header>

<!-- Spacer for fixed header -->
<div style="height: 64px;"></div>
