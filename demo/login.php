<?php
/**
 * SixOrbit UI Demo - Login Page
 */
$pageTitle = 'Login';
$pageDescription = 'Login to SixOrbit ERP';

require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> - SixOrbit UI</title>

    <!-- Prevent theme flash -->
    <script>
    (function() {
        try {
            var theme = localStorage.getItem('so-theme-preference') || 'sidebar-dark';
            var effectiveTheme = (theme === 'sidebar-dark' || theme === 'light') ? 'light' :
                                  (theme === 'system' && window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) ? 'dark' :
                                  (theme === 'dark') ? 'dark' : 'light';
            document.documentElement.setAttribute('data-theme', effectiveTheme);
        } catch(e) {
            document.documentElement.setAttribute('data-theme', 'light');
        }
    })();
    </script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- SixOrbit UI CSS -->
    <link rel="stylesheet" href="<?= so_asset('css', 'sixorbit-full') ?>">
</head>
<body class="so-auth-page">

<div class="so-auth-wrapper">
    <div class="so-auth-container">
        <!-- Left Panel - Branding -->
        <div class="so-auth-branding">
            <div class="so-auth-branding-content">
                <!-- SixOrbit Logo -->
                <div class="so-auth-logo">
                    <span class="material-icons">hexagon</span>
                    <span class="so-auth-logo-text">SixOrbit</span>
                </div>

                <!-- Feature Carousel -->
                <div class="so-auth-features" id="featureCarousel">
                    <div class="so-feature-slides" id="featureSlides">
                        <!-- Slides will be rendered by JS -->
                    </div>
                    <div class="so-feature-dots" id="featureDots">
                        <!-- Dots will be rendered by JS -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Login Form -->
        <div class="so-auth-form-panel">
            <div class="so-auth-form-content">
                <!-- Customer Logo -->
                <div class="so-auth-customer-logo">
                    <div class="so-auth-customer-logo-placeholder" id="customerLogoPlaceholder">
                        <span id="customerInitials"><?= DEMO_COMPANY_INITIALS ?></span>
                    </div>
                    <img id="customerLogoImg" src="" alt="Customer Logo" style="display: none;">
                </div>

                <div class="so-auth-customer-name" id="customerName"><?= DEMO_COMPANY_NAME ?></div>

                <h2 class="so-auth-title">Welcome back!</h2>
                <p class="so-auth-subtitle">Sign in to continue to your account</p>

                <!-- Login Type Toggle -->
                <div class="so-auth-type-toggle">
                    <button type="button" class="so-auth-type-btn active" data-type="email">
                        <span class="material-icons">email</span>
                        Email
                    </button>
                    <button type="button" class="so-auth-type-btn" data-type="mobile">
                        <span class="material-icons">phone</span>
                        Mobile
                    </button>
                </div>

                <!-- Login Form -->
                <form id="loginForm" class="so-auth-form">
                    <!-- Email/Mobile Input -->
                    <div class="so-form-group" id="loginIdGroup">
                        <label class="so-form-label">Email Address</label>
                        <div class="so-auth-input-wrapper">
                            <span class="material-icons so-auth-input-icon" id="loginIdIcon">email</span>
                            <input type="email"
                                   id="loginId"
                                   class="so-form-input"
                                   placeholder="Enter your email address"
                                   autocomplete="email"
                                   required>
                        </div>
                        <span class="so-form-error" id="loginIdError">Please enter a valid email address</span>
                    </div>

                    <!-- Password Input -->
                    <div class="so-form-group" id="passwordGroup">
                        <label class="so-form-label">Password</label>
                        <div class="so-auth-input-wrapper">
                            <span class="material-icons so-auth-input-icon">lock</span>
                            <input type="password"
                                   id="password"
                                   class="so-form-input"
                                   placeholder="Enter your password"
                                   autocomplete="current-password"
                                   required>
                            <button type="button" class="so-password-toggle" id="togglePassword">
                                <span class="material-icons">visibility</span>
                            </button>
                        </div>
                        <span class="so-form-error" id="passwordError">Password is required</span>
                    </div>

                    <!-- Remember & Forgot -->
                    <div class="so-auth-options">
                        <label class="so-checkbox">
                            <input type="checkbox" id="rememberMe">
                            <span class="so-checkbox-box">
                                <span class="material-icons">check</span>
                            </span>
                            <span class="so-checkbox-label">Remember me</span>
                        </label>
                        <a href="forgot-password.php" class="so-auth-link">Forgot password?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="so-btn so-btn-primary so-btn-lg so-btn-block" id="loginBtn">
                        <span class="so-btn-text">Sign In</span>
                        <span class="so-btn-loader"></span>
                    </button>
                </form>

                <!-- Footer -->
                <div class="so-auth-footer">
                    <p>
                        Powered by
                        <a href="#" target="_blank">SixOrbit ERP</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SixOrbit UI JavaScript -->
<script src="<?= so_asset('js', 'sixorbit-full') ?>"></script>

<script>
// Auth configuration
window.authConfig = {
    customerName: '<?= DEMO_COMPANY_NAME ?>',
    customerInitials: '<?= DEMO_COMPANY_INITIALS ?>',
    customerLogo: null,
    features: [
        {
            icon: 'inventory_2',
            title: 'Inventory Management',
            description: 'Track stock levels, manage items, and automate reordering with our powerful inventory system.'
        },
        {
            icon: 'receipt_long',
            title: 'Financial Reports',
            description: 'Generate comprehensive financial reports including P&L, Balance Sheet, and Cash Flow statements.'
        },
        {
            icon: 'people',
            title: 'Multi-User Access',
            description: 'Collaborate with your team with role-based access control and activity tracking.'
        },
        {
            icon: 'cloud_done',
            title: 'Cloud-Based',
            description: 'Access your business data anytime, anywhere with our secure cloud infrastructure.'
        }
    ],
    carouselInterval: 5000
};

// Initialize auth
document.addEventListener('DOMContentLoaded', function() {
    const auth = new SOAuth({
        ...window.authConfig,
        onLogin: function(data) {
            // Simulate login
            setTimeout(function() {
                auth.completeLogin({
                    remember: document.getElementById('rememberMe').checked,
                    loginId: data.loginId,
                    loginType: data.loginType,
                    redirectUrl: 'index.php'
                });
            }, 1500);
        }
    });
});
</script>

</body>
</html>
