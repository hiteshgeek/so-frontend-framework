<?php
$pageTitle = 'Home';
$pageDescription = 'CloudStack - Modern cloud infrastructure platform built with SixOrbit UI Framework';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<!-- Hero Section -->
<section class="so-py-5" style="background: linear-gradient(135deg, var(--so-primary-50) 0%, var(--so-bg-primary) 100%);">
    <div class="so-container">
        <div class="so-row so-align-items-center so-gy-4">
            <div class="so-col-12 so-col-lg-6">
                <span class="so-badge so-badge-soft-primary so-mb-3">
                    <span class="material-icons so-fs-sm so-me-1">rocket_launch</span>
                    New: Version 2.0 Released
                </span>
                <h1 class="so-fs-3xl so-fw-bold so-mb-3">
                    Build faster with <span class="so-text-primary">CloudStack</span>
                </h1>
                <p class="so-fs-lg so-text-muted so-mb-4">
                    The modern cloud platform that helps teams deploy, scale, and manage
                    applications with ease. Experience the power of simplicity.
                </p>
                <div class="so-d-flex so-flex-wrap so-gap-2 so-mb-4">
                    <a href="pricing.php" class="so-btn so-btn-primary so-btn-lg">
                        <span class="material-icons so-me-1">play_arrow</span>
                        Get Started Free
                    </a>
                    <a href="features.php" class="so-btn so-btn-outline so-btn-lg">
                        <span class="material-icons so-me-1">info</span>
                        Learn More
                    </a>
                </div>
                <div class="so-d-flex so-align-items-center so-gap-3">
                    <div class="so-avatar-group so-avatar-group-stacked">
                        <div class="so-avatar so-avatar-sm so-avatar-primary">JD</div>
                        <div class="so-avatar so-avatar-sm so-avatar-success">MK</div>
                        <div class="so-avatar so-avatar-sm so-avatar-warning">SL</div>
                        <div class="so-avatar so-avatar-sm so-avatar-info">+5k</div>
                    </div>
                    <span class="so-text-muted so-fs-sm">Join 5,000+ developers</span>
                </div>
            </div>
            <div class="so-col-12 so-col-lg-6">
                <div class="so-card so-card-elevated">
                    <div class="so-card-body so-p-4">
                        <div class="so-d-flex so-justify-content-between so-align-items-center so-mb-3">
                            <span class="so-badge so-badge-success">
                                <span class="material-icons so-fs-xs so-me-1">check_circle</span>
                                Live Demo
                            </span>
                            <div class="so-d-flex so-gap-1">
                                <span class="so-badge so-badge-dot" style="background: #ef4444;"></span>
                                <span class="so-badge so-badge-dot" style="background: #f59e0b;"></span>
                                <span class="so-badge so-badge-dot" style="background: #22c55e;"></span>
                            </div>
                        </div>
                        <div class="so-bg-dark so-rounded so-p-3 so-mb-3" style="font-family: monospace;">
                            <code class="so-text-success">$ cloudstack deploy --app myapp</code><br>
                            <code class="so-text-muted">&gt; Deploying to production...</code><br>
                            <code class="so-text-muted">&gt; Building containers...</code><br>
                            <code class="so-text-primary">&gt; Successfully deployed!</code>
                        </div>
                        <div class="so-progress so-progress-sm so-mb-2">
                            <div class="so-progress-bar so-bg-success" style="width: 100%;"></div>
                        </div>
                        <span class="so-text-muted so-fs-sm">Deployment complete in 2.3s</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-row so-g-4">
            <div class="so-col-6 so-col-md-3">
                <div class="so-card so-card-bordered so-text-center">
                    <div class="so-card-body">
                        <span class="material-icons so-text-primary so-fs-2xl so-mb-2">cloud_upload</span>
                        <h3 class="so-fs-2xl so-fw-bold so-mb-1">10M+</h3>
                        <p class="so-text-muted so-mb-0">Deployments</p>
                    </div>
                </div>
            </div>
            <div class="so-col-6 so-col-md-3">
                <div class="so-card so-card-bordered so-text-center">
                    <div class="so-card-body">
                        <span class="material-icons so-text-success so-fs-2xl so-mb-2">groups</span>
                        <h3 class="so-fs-2xl so-fw-bold so-mb-1">50K+</h3>
                        <p class="so-text-muted so-mb-0">Developers</p>
                    </div>
                </div>
            </div>
            <div class="so-col-6 so-col-md-3">
                <div class="so-card so-card-bordered so-text-center">
                    <div class="so-card-body">
                        <span class="material-icons so-text-warning so-fs-2xl so-mb-2">speed</span>
                        <h3 class="so-fs-2xl so-fw-bold so-mb-1">99.9%</h3>
                        <p class="so-text-muted so-mb-0">Uptime</p>
                    </div>
                </div>
            </div>
            <div class="so-col-6 so-col-md-3">
                <div class="so-card so-card-bordered so-text-center">
                    <div class="so-card-body">
                        <span class="material-icons so-text-info so-fs-2xl so-mb-2">public</span>
                        <h3 class="so-fs-2xl so-fw-bold so-mb-1">25+</h3>
                        <p class="so-text-muted so-mb-0">Regions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Grid -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-text-center so-mb-5">
            <span class="so-badge so-badge-soft-primary so-mb-2">Features</span>
            <h2 class="so-fs-2xl so-fw-bold so-mb-2">Everything you need to scale</h2>
            <p class="so-text-muted so-fs-lg">Powerful features to help your team succeed</p>
        </div>

        <div class="so-row so-g-4">
            <div class="so-col-12 so-col-md-6 so-col-lg-4">
                <div class="so-card so-card-elevated so-card-clickable so-h-100">
                    <div class="so-card-body">
                        <div class="so-d-flex so-align-items-center so-gap-3 so-mb-3">
                            <div class="so-avatar so-avatar-lg so-bg-primary-100 so-text-primary">
                                <span class="material-icons">bolt</span>
                            </div>
                            <div>
                                <h5 class="so-fw-semibold so-mb-0">Lightning Fast</h5>
                                <span class="so-badge so-badge-sm so-badge-soft-success">Popular</span>
                            </div>
                        </div>
                        <p class="so-text-muted">
                            Deploy in seconds with our optimized infrastructure.
                            Experience zero-downtime deployments.
                        </p>
                        <a href="features.php" class="so-btn so-btn-link so-p-0">
                            Learn more <span class="material-icons so-fs-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="so-col-12 so-col-md-6 so-col-lg-4">
                <div class="so-card so-card-elevated so-card-clickable so-h-100">
                    <div class="so-card-body">
                        <div class="so-d-flex so-align-items-center so-gap-3 so-mb-3">
                            <div class="so-avatar so-avatar-lg so-bg-success-100 so-text-success">
                                <span class="material-icons">security</span>
                            </div>
                            <div>
                                <h5 class="so-fw-semibold so-mb-0">Enterprise Security</h5>
                                <span class="so-badge so-badge-sm so-badge-soft-info">Certified</span>
                            </div>
                        </div>
                        <p class="so-text-muted">
                            SOC2 compliant with end-to-end encryption.
                            Your data is protected at all times.
                        </p>
                        <a href="features.php" class="so-btn so-btn-link so-p-0">
                            Learn more <span class="material-icons so-fs-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="so-col-12 so-col-md-6 so-col-lg-4">
                <div class="so-card so-card-elevated so-card-clickable so-h-100">
                    <div class="so-card-body">
                        <div class="so-d-flex so-align-items-center so-gap-3 so-mb-3">
                            <div class="so-avatar so-avatar-lg so-bg-warning-100 so-text-warning">
                                <span class="material-icons">auto_graph</span>
                            </div>
                            <div>
                                <h5 class="so-fw-semibold so-mb-0">Auto Scaling</h5>
                                <span class="so-badge so-badge-sm so-badge-soft-warning">New</span>
                            </div>
                        </div>
                        <p class="so-text-muted">
                            Automatically scale based on traffic.
                            Pay only for what you use.
                        </p>
                        <a href="features.php" class="so-btn so-btn-link so-p-0">
                            Learn more <span class="material-icons so-fs-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="so-col-12 so-col-md-6 so-col-lg-4">
                <div class="so-card so-card-elevated so-card-clickable so-h-100">
                    <div class="so-card-body">
                        <div class="so-d-flex so-align-items-center so-gap-3 so-mb-3">
                            <div class="so-avatar so-avatar-lg so-bg-info-100 so-text-info">
                                <span class="material-icons">dns</span>
                            </div>
                            <h5 class="so-fw-semibold so-mb-0">Global CDN</h5>
                        </div>
                        <p class="so-text-muted">
                            Content delivered from 200+ edge locations worldwide
                            for the fastest experience.
                        </p>
                        <a href="features.php" class="so-btn so-btn-link so-p-0">
                            Learn more <span class="material-icons so-fs-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="so-col-12 so-col-md-6 so-col-lg-4">
                <div class="so-card so-card-elevated so-card-clickable so-h-100">
                    <div class="so-card-body">
                        <div class="so-d-flex so-align-items-center so-gap-3 so-mb-3">
                            <div class="so-avatar so-avatar-lg so-bg-danger-100 so-text-danger">
                                <span class="material-icons">terminal</span>
                            </div>
                            <h5 class="so-fw-semibold so-mb-0">Developer Tools</h5>
                        </div>
                        <p class="so-text-muted">
                            CLI, APIs, and SDKs for every major language.
                            Integrate with your existing workflow.
                        </p>
                        <a href="features.php" class="so-btn so-btn-link so-p-0">
                            Learn more <span class="material-icons so-fs-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="so-col-12 so-col-md-6 so-col-lg-4">
                <div class="so-card so-card-elevated so-card-clickable so-h-100">
                    <div class="so-card-body">
                        <div class="so-d-flex so-align-items-center so-gap-3 so-mb-3">
                            <div class="so-avatar so-avatar-lg so-bg-secondary-100 so-text-secondary">
                                <span class="material-icons">support_agent</span>
                            </div>
                            <h5 class="so-fw-semibold so-mb-0">24/7 Support</h5>
                        </div>
                        <p class="so-text-muted">
                            Expert support team available around the clock.
                            Get help when you need it.
                        </p>
                        <a href="contact.php" class="so-btn so-btn-link so-p-0">
                            Contact us <span class="material-icons so-fs-sm">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Carousel -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-text-center so-mb-5">
            <span class="so-badge so-badge-soft-success so-mb-2">Testimonials</span>
            <h2 class="so-fs-2xl so-fw-bold so-mb-2">Loved by developers</h2>
            <p class="so-text-muted so-fs-lg">See what our customers have to say</p>
        </div>

        <div class="so-carousel" data-so-carousel data-so-interval="5000">
            <div class="so-carousel-inner">
                <div class="so-carousel-item so-active">
                    <div class="so-row so-justify-content-center">
                        <div class="so-col-12 so-col-md-8 so-col-lg-6">
                            <div class="so-card so-text-center">
                                <div class="so-card-body so-p-4">
                                    <div class="so-rating so-rating-warning so-mb-3 so-justify-content-center">
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                    </div>
                                    <p class="so-fs-lg so-mb-4">
                                        "CloudStack transformed how we deploy. What used to take hours
                                        now takes seconds. The team loves it!"
                                    </p>
                                    <div class="so-d-flex so-align-items-center so-justify-content-center so-gap-3">
                                        <div class="so-avatar so-avatar-lg so-avatar-primary">
                                            <span class="material-icons">person</span>
                                        </div>
                                        <div class="so-text-start">
                                            <h6 class="so-fw-semibold so-mb-0">Sarah Johnson</h6>
                                            <span class="so-text-muted so-fs-sm">CTO at TechCorp</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="so-carousel-item">
                    <div class="so-row so-justify-content-center">
                        <div class="so-col-12 so-col-md-8 so-col-lg-6">
                            <div class="so-card so-text-center">
                                <div class="so-card-body so-p-4">
                                    <div class="so-rating so-rating-warning so-mb-3 so-justify-content-center">
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                    </div>
                                    <p class="so-fs-lg so-mb-4">
                                        "The developer experience is unmatched. Easy setup, great docs,
                                        and incredible performance. Highly recommended!"
                                    </p>
                                    <div class="so-d-flex so-align-items-center so-justify-content-center so-gap-3">
                                        <div class="so-avatar so-avatar-lg so-avatar-success">
                                            <span class="material-icons">person</span>
                                        </div>
                                        <div class="so-text-start">
                                            <h6 class="so-fw-semibold so-mb-0">Mike Chen</h6>
                                            <span class="so-text-muted so-fs-sm">Lead Developer at StartupXYZ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="so-carousel-item">
                    <div class="so-row so-justify-content-center">
                        <div class="so-col-12 so-col-md-8 so-col-lg-6">
                            <div class="so-card so-text-center">
                                <div class="so-card-body so-p-4">
                                    <div class="so-rating so-rating-warning so-mb-3 so-justify-content-center">
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star</span>
                                        <span class="material-icons">star_half</span>
                                    </div>
                                    <p class="so-fs-lg so-mb-4">
                                        "Switching to CloudStack cut our infrastructure costs by 40%.
                                        The auto-scaling feature is a game changer."
                                    </p>
                                    <div class="so-d-flex so-align-items-center so-justify-content-center so-gap-3">
                                        <div class="so-avatar so-avatar-lg so-avatar-warning">
                                            <span class="material-icons">person</span>
                                        </div>
                                        <div class="so-text-start">
                                            <h6 class="so-fw-semibold so-mb-0">Emily Rodriguez</h6>
                                            <span class="so-text-muted so-fs-sm">DevOps Manager at BigCo</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="so-carousel-controls so-mt-4 so-d-flex so-justify-content-center so-gap-2">
                <button class="so-btn so-btn-outline so-btn-icon so-btn-sm" data-so-carousel-prev>
                    <span class="material-icons">chevron_left</span>
                </button>
                <button class="so-btn so-btn-outline so-btn-icon so-btn-sm" data-so-carousel-next>
                    <span class="material-icons">chevron_right</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-text-center so-mb-5">
            <span class="so-badge so-badge-soft-info so-mb-2">How it Works</span>
            <h2 class="so-fs-2xl so-fw-bold so-mb-2">Get started in minutes</h2>
            <p class="so-text-muted so-fs-lg">Simple steps to deploy your first app</p>
        </div>

        <div class="so-row so-justify-content-center">
            <div class="so-col-12 so-col-lg-8">
                <div class="so-timeline">
                    <div class="so-timeline-item">
                        <div class="so-timeline-marker so-bg-primary">
                            <span class="material-icons so-text-white so-fs-sm">person_add</span>
                        </div>
                        <div class="so-timeline-content">
                            <div class="so-card">
                                <div class="so-card-body">
                                    <span class="so-badge so-badge-primary so-mb-2">Step 1</span>
                                    <h5 class="so-fw-semibold">Create your account</h5>
                                    <p class="so-text-muted so-mb-0">
                                        Sign up for free in seconds. No credit card required.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="so-timeline-item">
                        <div class="so-timeline-marker so-bg-success">
                            <span class="material-icons so-text-white so-fs-sm">link</span>
                        </div>
                        <div class="so-timeline-content">
                            <div class="so-card">
                                <div class="so-card-body">
                                    <span class="so-badge so-badge-success so-mb-2">Step 2</span>
                                    <h5 class="so-fw-semibold">Connect your repository</h5>
                                    <p class="so-text-muted so-mb-0">
                                        Link your GitHub, GitLab, or Bitbucket repo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="so-timeline-item">
                        <div class="so-timeline-marker so-bg-warning">
                            <span class="material-icons so-text-white so-fs-sm">settings</span>
                        </div>
                        <div class="so-timeline-content">
                            <div class="so-card">
                                <div class="so-card-body">
                                    <span class="so-badge so-badge-warning so-mb-2">Step 3</span>
                                    <h5 class="so-fw-semibold">Configure your app</h5>
                                    <p class="so-text-muted so-mb-0">
                                        Set environment variables and build settings.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="so-timeline-item">
                        <div class="so-timeline-marker so-bg-info">
                            <span class="material-icons so-text-white so-fs-sm">rocket_launch</span>
                        </div>
                        <div class="so-timeline-content">
                            <div class="so-card">
                                <div class="so-card-body">
                                    <span class="so-badge so-badge-info so-mb-2">Step 4</span>
                                    <h5 class="so-fw-semibold">Deploy and scale</h5>
                                    <p class="so-text-muted so-mb-0">
                                        Your app is live! Scale automatically as you grow.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="so-py-5 so-bg-primary">
    <div class="so-container">
        <div class="so-row so-align-items-center so-gy-4">
            <div class="so-col-12 so-col-lg-6">
                <h2 class="so-fs-2xl so-fw-bold so-text-white so-mb-2">
                    Ready to get started?
                </h2>
                <p class="so-text-white so-opacity-75 so-fs-lg so-mb-0">
                    Join thousands of developers building with CloudStack.
                </p>
            </div>
            <div class="so-col-12 so-col-lg-6">
                <div class="so-d-flex so-flex-column so-flex-md-row so-gap-3 so-justify-content-lg-end">
                    <div class="so-input-group" style="max-width: 400px;">
                        <input type="email" class="so-form-control so-form-control-lg" placeholder="Enter your email">
                        <button class="so-btn so-btn-light so-btn-lg so-btn-progress" id="ctaBtn">
                            <span class="so-btn-text">Subscribe</span>
                            <span class="so-btn-progress-bar"></span>
                        </button>
                    </div>
                </div>
                <p class="so-text-white so-opacity-50 so-fs-sm so-mt-2 so-text-lg-end so-mb-0">
                    Free 14-day trial. No credit card required.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Button Variants Demo -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-text-center so-mb-5">
            <span class="so-badge so-badge-soft-secondary so-mb-2">UI Components</span>
            <h2 class="so-fs-2xl so-fw-bold so-mb-2">Button Showcase</h2>
            <p class="so-text-muted so-fs-lg">All button variants available in the framework</p>
        </div>

        <div class="so-row so-g-4">
            <!-- Solid Buttons -->
            <div class="so-col-12 so-col-md-6">
                <div class="so-card">
                    <div class="so-card-header">
                        <h6 class="so-mb-0">Solid Buttons</h6>
                    </div>
                    <div class="so-card-body so-d-flex so-flex-wrap so-gap-2">
                        <button class="so-btn so-btn-primary">Primary</button>
                        <button class="so-btn so-btn-secondary">Secondary</button>
                        <button class="so-btn so-btn-success">Success</button>
                        <button class="so-btn so-btn-danger">Danger</button>
                        <button class="so-btn so-btn-warning">Warning</button>
                        <button class="so-btn so-btn-info">Info</button>
                    </div>
                </div>
            </div>

            <!-- Outline Buttons -->
            <div class="so-col-12 so-col-md-6">
                <div class="so-card">
                    <div class="so-card-header">
                        <h6 class="so-mb-0">Outline Buttons</h6>
                    </div>
                    <div class="so-card-body so-d-flex so-flex-wrap so-gap-2">
                        <button class="so-btn so-btn-outline-primary">Primary</button>
                        <button class="so-btn so-btn-outline-secondary">Secondary</button>
                        <button class="so-btn so-btn-outline-success">Success</button>
                        <button class="so-btn so-btn-outline-danger">Danger</button>
                        <button class="so-btn so-btn-outline-warning">Warning</button>
                        <button class="so-btn so-btn-outline-info">Info</button>
                    </div>
                </div>
            </div>

            <!-- Button Sizes -->
            <div class="so-col-12 so-col-md-6">
                <div class="so-card">
                    <div class="so-card-header">
                        <h6 class="so-mb-0">Button Sizes</h6>
                    </div>
                    <div class="so-card-body so-d-flex so-flex-wrap so-align-items-center so-gap-2">
                        <button class="so-btn so-btn-primary so-btn-xs">Extra Small</button>
                        <button class="so-btn so-btn-primary so-btn-sm">Small</button>
                        <button class="so-btn so-btn-primary">Default</button>
                        <button class="so-btn so-btn-primary so-btn-lg">Large</button>
                    </div>
                </div>
            </div>

            <!-- Icon Buttons -->
            <div class="so-col-12 so-col-md-6">
                <div class="so-card">
                    <div class="so-card-header">
                        <h6 class="so-mb-0">Icon Buttons</h6>
                    </div>
                    <div class="so-card-body so-d-flex so-flex-wrap so-gap-2">
                        <button class="so-btn so-btn-primary so-btn-icon">
                            <span class="material-icons">add</span>
                        </button>
                        <button class="so-btn so-btn-success so-btn-icon so-btn-circle">
                            <span class="material-icons">check</span>
                        </button>
                        <button class="so-btn so-btn-primary">
                            <span class="material-icons so-me-1">download</span>
                            Download
                        </button>
                        <button class="so-btn so-btn-outline">
                            Settings
                            <span class="material-icons so-ms-1">settings</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Button Group -->
            <div class="so-col-12">
                <div class="so-card">
                    <div class="so-card-header">
                        <h6 class="so-mb-0">Button Groups</h6>
                    </div>
                    <div class="so-card-body so-d-flex so-flex-wrap so-gap-3">
                        <div class="so-btn-group">
                            <button class="so-btn so-btn-primary">Left</button>
                            <button class="so-btn so-btn-primary">Middle</button>
                            <button class="so-btn so-btn-primary">Right</button>
                        </div>
                        <div class="so-btn-group">
                            <button class="so-btn so-btn-outline">
                                <span class="material-icons">format_bold</span>
                            </button>
                            <button class="so-btn so-btn-outline">
                                <span class="material-icons">format_italic</span>
                            </button>
                            <button class="so-btn so-btn-outline">
                                <span class="material-icons">format_underlined</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$pageScripts = <<<'SCRIPT'
<script>
    // Progress button demo
    const ctaBtn = document.getElementById('ctaBtn');
    if (ctaBtn) {
        ctaBtn.addEventListener('click', function() {
            this.classList.add('so-progressing');
            setTimeout(() => {
                this.classList.remove('so-progressing');
                this.classList.add('so-completed');
                setTimeout(() => {
                    this.classList.remove('so-completed');
                }, 2000);
            }, 2000);
        });
    }
</script>
SCRIPT;
require_once 'includes/footer.php';
?>
