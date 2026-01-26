<?php
/**
 * SixOrbit UI Framework - Root Index
 * Entry point linking to demo pages and documentation
 */
$version = '1.0.0';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SixOrbit UI Framework v<?= $version ?></title>

    <!-- Theme detection -->
    <script>
    (function() {
        var theme = localStorage.getItem('so-theme-preference') || 'light';
        var effectiveTheme = theme === 'sidebar-dark' ? 'light' : (theme === 'system' ?
            (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light') : theme);
        document.documentElement.setAttribute('data-theme', effectiveTheme);
    })();
    </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- SixOrbit UI CSS -->
    <link rel="stylesheet" href="dist/css/<?php
        $manifest = json_decode(file_get_contents('dist/manifest.json'), true);
        echo basename($manifest['css']['sixorbit-full'] ?? 'sixorbit-full.css');
    ?>">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Google Sans', 'Roboto', -apple-system, sans-serif;
            background: var(--so-page-bg, #f5f5f5);
            color: var(--so-text-primary, #202124);
            min-height: 100vh;
        }

        .hero {
            background: linear-gradient(135deg, #1a73e8 0%, #0d47a1 100%);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }

        [data-theme="dark"] .hero {
            background: linear-gradient(135deg, #7367f0 0%, #4839eb 100%);
        }

        .hero-logo {
            display: inline-flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .hero-logo svg {
            width: 72px;
            height: 72px;
        }

        .hero-logo-text {
            font-size: 48px;
            font-weight: 700;
        }

        .hero-logo-text span {
            opacity: 0.9;
        }

        .hero-tagline {
            font-size: 20px;
            opacity: 0.9;
            margin-bottom: 32px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-version {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 24px;
            font-size: 14px;
            font-weight: 500;
        }

        .hero-actions {
            margin-top: 40px;
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }

        .hero-btn-primary {
            background: white;
            color: #1a73e8;
        }

        .hero-btn-primary:hover {
            background: #f1f3f4;
            transform: translateY(-2px);
        }

        .hero-btn-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .section-title {
            font-size: 28px;
            font-weight: 600;
            color: var(--so-text-heading, #202124);
            margin-bottom: 12px;
            text-align: center;
        }

        .section-subtitle {
            font-size: 16px;
            color: var(--so-text-secondary, #5f6368);
            text-align: center;
            margin-bottom: 40px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 60px;
        }

        .feature-card {
            background: var(--so-card-bg, white);
            border: 1px solid var(--so-card-border, rgba(0,0,0,0.05));
            border-radius: 12px;
            padding: 28px;
            text-align: center;
            transition: all 0.2s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            font-size: 28px;
        }

        .feature-icon.blue { background: rgba(26, 115, 232, 0.1); color: #1a73e8; }
        .feature-icon.green { background: rgba(52, 168, 83, 0.1); color: #34a853; }
        .feature-icon.purple { background: rgba(115, 103, 240, 0.1); color: #7367f0; }
        .feature-icon.orange { background: rgba(249, 171, 0, 0.1); color: #f9ab00; }

        .feature-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--so-text-heading, #202124);
            margin-bottom: 8px;
        }

        .feature-desc {
            font-size: 14px;
            color: var(--so-text-secondary, #5f6368);
            line-height: 1.6;
        }

        .demo-section {
            background: var(--so-card-bg, white);
            border-radius: 16px;
            padding: 40px;
            border: 1px solid var(--so-card-border, rgba(0,0,0,0.05));
        }

        .demo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 16px;
        }

        .demo-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px;
            background: var(--so-card-hover-bg, #f8f9fa);
            border-radius: 8px;
            text-decoration: none;
            color: var(--so-text-primary, #202124);
            transition: all 0.2s;
        }

        .demo-link:hover {
            background: var(--so-accent-primary, #1a73e8);
            color: white;
        }

        .demo-link:hover .demo-link-icon {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .demo-link-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(26, 115, 232, 0.1);
            color: var(--so-accent-primary, #1a73e8);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .demo-link-text {
            font-weight: 500;
            font-size: 14px;
        }

        .demo-link-badge {
            margin-left: auto;
            padding: 2px 8px;
            background: rgba(52, 168, 83, 0.1);
            color: #34a853;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
        }

        .demo-link:hover .demo-link-badge {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .footer {
            text-align: center;
            padding: 40px 20px;
            border-top: 1px solid var(--so-border-color, #e8eaed);
            margin-top: 40px;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 32px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .footer-link {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--so-text-secondary, #5f6368);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
        }

        .footer-link:hover {
            color: var(--so-accent-primary, #1a73e8);
        }

        .footer-link .material-icons {
            font-size: 18px;
        }

        .footer-copyright {
            font-size: 13px;
            color: var(--so-text-muted, #9aa0a6);
        }

        .theme-toggle {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--so-card-bg, white);
            border: 1px solid var(--so-border-color, #e8eaed);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            color: var(--so-text-primary, #202124);
            z-index: 100;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }

        .quick-start {
            background: var(--so-card-hover-bg, #f8f9fa);
            border-radius: 8px;
            padding: 20px;
            margin-top: 40px;
        }

        .quick-start-title {
            font-size: 14px;
            font-weight: 600;
            color: var(--so-text-heading, #202124);
            margin-bottom: 12px;
        }

        .quick-start-code {
            background: #1e1e1e;
            color: #d4d4d4;
            padding: 16px;
            border-radius: 6px;
            font-family: 'Roboto Mono', monospace;
            font-size: 13px;
            overflow-x: auto;
        }

        .quick-start-code .comment { color: #6a9955; }
        .quick-start-code .tag { color: #569cd6; }
        .quick-start-code .attr { color: #9cdcfe; }
        .quick-start-code .string { color: #ce9178; }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-logo">
            <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="24" cy="24" rx="22" ry="10" stroke="currentColor" stroke-width="2" fill="none" transform="rotate(-20 24 24)" opacity="0.6"/>
                <path d="M24 6L38.7 15V33L24 42L9.3 33V15L24 6Z" stroke="currentColor" stroke-width="2.5" fill="none"/>
                <circle cx="24" cy="24" r="4" fill="currentColor"/>
                <circle cx="42" cy="18" r="2.5" fill="currentColor"/>
                <circle cx="6" cy="30" r="2.5" fill="currentColor"/>
            </svg>
            <span class="hero-logo-text">Six<span>Orbit</span> UI</span>
        </div>
        <p class="hero-tagline">A modern, modular UI framework for enterprise applications. Built with SCSS, vanilla JavaScript, and designed for maximum flexibility.</p>
        <div class="hero-version">
            <span class="material-icons" style="font-size: 16px;">verified</span>
            Version <?= $version ?>
        </div>
        <div class="hero-actions">
            <a href="demo/" class="hero-btn hero-btn-primary">
                <span class="material-icons">play_arrow</span>
                View Demos
            </a>
            <a href="#quick-start" class="hero-btn hero-btn-secondary">
                <span class="material-icons">code</span>
                Quick Start
            </a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container">
        <h2 class="section-title">Why SixOrbit UI?</h2>
        <p class="section-subtitle">Everything you need to build beautiful enterprise applications</p>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon blue">
                    <span class="material-icons">palette</span>
                </div>
                <h3 class="feature-title">Comprehensive Theming</h3>
                <p class="feature-desc">Light, dark, and sidebar-dark themes with CSS custom properties. Font size scaling for accessibility.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon green">
                    <span class="material-icons">extension</span>
                </div>
                <h3 class="feature-title">Modular Architecture</h3>
                <p class="feature-desc">Import only what you need. SCSS partials and ES6+ modules for tree-shaking support.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon purple">
                    <span class="material-icons">business</span>
                </div>
                <h3 class="feature-title">Enterprise Ready</h3>
                <p class="feature-desc">Built for ERP and business apps. Includes panels, reports, dashboards, and data-heavy layouts.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon orange">
                    <span class="material-icons">speed</span>
                </div>
                <h3 class="feature-title">Zero Dependencies</h3>
                <p class="feature-desc">Pure vanilla JavaScript. No jQuery, no React, no Vue. Works alongside any framework.</p>
            </div>
        </div>

        <!-- Demo Links Section -->
        <div class="demo-section">
            <h2 class="section-title" style="text-align: left; margin-bottom: 24px;">Demo Pages</h2>

            <div class="demo-grid">
                <a href="demo/index.php" class="demo-link">
                    <div class="demo-link-icon">
                        <span class="material-icons">dashboard</span>
                    </div>
                    <span class="demo-link-text">Dashboard</span>
                </a>

                <a href="demo/form-elements.php" class="demo-link">
                    <div class="demo-link-icon">
                        <span class="material-icons">input</span>
                    </div>
                    <span class="demo-link-text">Form Elements</span>
                </a>

                <a href="demo/video-tutorial.php" class="demo-link">
                    <div class="demo-link-icon">
                        <span class="material-icons">play_circle</span>
                    </div>
                    <span class="demo-link-text">Video Tutorials</span>
                    <span class="demo-link-badge">New</span>
                </a>

                <a href="demo/profit-loss.php" class="demo-link">
                    <div class="demo-link-icon">
                        <span class="material-icons">trending_up</span>
                    </div>
                    <span class="demo-link-text">Profit & Loss</span>
                </a>

                <a href="demo/balance-sheet.php" class="demo-link">
                    <div class="demo-link-icon">
                        <span class="material-icons">account_balance_wallet</span>
                    </div>
                    <span class="demo-link-text">Balance Sheet</span>
                </a>

                <a href="demo/cash-flow.php" class="demo-link">
                    <div class="demo-link-icon">
                        <span class="material-icons">payments</span>
                    </div>
                    <span class="demo-link-text">Cash Flow</span>
                </a>

                <a href="demo/trial-balance.php" class="demo-link">
                    <div class="demo-link-icon">
                        <span class="material-icons">receipt_long</span>
                    </div>
                    <span class="demo-link-text">Trial Balance</span>
                </a>

                <a href="demo/login.php" class="demo-link">
                    <div class="demo-link-icon">
                        <span class="material-icons">login</span>
                    </div>
                    <span class="demo-link-text">Login</span>
                </a>

                <a href="demo/forgot-password.php" class="demo-link">
                    <div class="demo-link-icon">
                        <span class="material-icons">vpn_key</span>
                    </div>
                    <span class="demo-link-text">Forgot Password</span>
                </a>
            </div>

            <!-- Quick Start -->
            <div class="quick-start" id="quick-start">
                <div class="quick-start-title">Quick Start</div>
                <pre class="quick-start-code"><span class="comment">&lt;!-- Include CSS --&gt;</span>
<span class="tag">&lt;link</span> <span class="attr">rel</span>=<span class="string">"stylesheet"</span> <span class="attr">href</span>=<span class="string">"dist/css/sixorbit-full.css"</span><span class="tag">&gt;</span>

<span class="comment">&lt;!-- Include JS --&gt;</span>
<span class="tag">&lt;script</span> <span class="attr">src</span>=<span class="string">"dist/js/sixorbit-full.js"</span><span class="tag">&gt;&lt;/script&gt;</span>

<span class="comment">&lt;!-- Or use with manifest for cache-busting --&gt;</span>
<span class="tag">&lt;?php</span>
$manifest = json_decode(file_get_contents('dist/manifest.json'), true);
<span class="tag">?&gt;</span>
<span class="tag">&lt;link</span> <span class="attr">rel</span>=<span class="string">"stylesheet"</span> <span class="attr">href</span>=<span class="string">"dist/&lt;?= $manifest['css']['sixorbit-full'] ?&gt;"</span><span class="tag">&gt;</span></pre>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-links">
            <a href="https://github.com/sixorbit/sixorbit-ui" class="footer-link" target="_blank">
                <span class="material-icons">code</span>
                GitHub
            </a>
            <a href="#" class="footer-link">
                <span class="material-icons">description</span>
                Documentation
            </a>
            <a href="https://sixorbit.com" class="footer-link" target="_blank">
                <span class="material-icons">public</span>
                SixOrbit.com
            </a>
        </div>
        <p class="footer-copyright">
            &copy; <?= date('Y') ?> SixOrbit. Built with care for enterprise applications.
        </p>
    </div>

    <!-- Theme Toggle -->
    <button class="theme-toggle" id="themeToggle" title="Toggle Theme">
        <span class="material-icons" id="themeIcon">dark_mode</span>
    </button>

    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');

        function updateThemeIcon() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            themeIcon.textContent = currentTheme === 'dark' ? 'light_mode' : 'dark_mode';
        }

        themeToggle.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-theme', newTheme);
            localStorage.setItem('so-theme-preference', newTheme);
            updateThemeIcon();
        });

        updateThemeIcon();

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>
