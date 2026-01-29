<?php
$pageTitle = 'About';
$pageDescription = 'About CloudStack - Learn about our team and mission';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<!-- Breadcrumb -->
<section class="so-bg-white so-border-bottom so-py-3">
    <div class="so-container">
        <nav class="so-breadcrumb">
            <a href="index.php" class="so-breadcrumb-item">
                <span class="material-icons so-fs-sm">home</span>
                Home
            </a>
            <span class="so-breadcrumb-item so-active">About</span>
        </nav>
    </div>
</section>

<!-- Hero -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-row so-align-items-center so-gy-4">
            <div class="so-col-12 so-col-lg-6">
                <span class="so-badge so-badge-soft-primary so-mb-2">About Us</span>
                <h1 class="so-fs-3xl so-fw-bold so-mb-3">
                    We're building the future of cloud computing
                </h1>
                <p class="so-text-muted so-fs-lg so-mb-4">
                    Founded in 2020, CloudStack is on a mission to make cloud deployment
                    accessible to every developer. We believe in simplicity, reliability,
                    and exceptional developer experience.
                </p>
                <div class="so-d-flex so-flex-wrap so-gap-2">
                    <span class="so-pill so-pill-soft-primary">
                        <span class="material-icons so-fs-sm so-me-1">rocket_launch</span>
                        Innovation
                    </span>
                    <span class="so-pill so-pill-soft-success">
                        <span class="material-icons so-fs-sm so-me-1">shield</span>
                        Reliability
                    </span>
                    <span class="so-pill so-pill-soft-warning">
                        <span class="material-icons so-fs-sm so-me-1">favorite</span>
                        Developer First
                    </span>
                </div>
            </div>
            <div class="so-col-12 so-col-lg-6">
                <!-- Media Object -->
                <div class="so-media so-gap-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-avatar so-avatar-xl so-avatar-primary">
                        <span class="material-icons" style="font-size: 32px;">cloud</span>
                    </div>
                    <div class="so-media-body">
                        <h5 class="so-fw-semibold so-mb-2">Our Mission</h5>
                        <p class="so-text-muted so-mb-0">
                            "To empower developers worldwide with the tools they need to build,
                            deploy, and scale applications without complexity."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-row so-g-4 so-text-center">
            <div class="so-col-6 so-col-md-3">
                <div class="so-card">
                    <div class="so-card-body">
                        <h2 class="so-fs-3xl so-fw-bold so-text-primary so-mb-0">2020</h2>
                        <p class="so-text-muted so-mb-0">Founded</p>
                    </div>
                </div>
            </div>
            <div class="so-col-6 so-col-md-3">
                <div class="so-card">
                    <div class="so-card-body">
                        <h2 class="so-fs-3xl so-fw-bold so-text-success so-mb-0">150+</h2>
                        <p class="so-text-muted so-mb-0">Employees</p>
                    </div>
                </div>
            </div>
            <div class="so-col-6 so-col-md-3">
                <div class="so-card">
                    <div class="so-card-body">
                        <h2 class="so-fs-3xl so-fw-bold so-text-warning so-mb-0">50K+</h2>
                        <p class="so-text-muted so-mb-0">Customers</p>
                    </div>
                </div>
            </div>
            <div class="so-col-6 so-col-md-3">
                <div class="so-card">
                    <div class="so-card-body">
                        <h2 class="so-fs-3xl so-fw-bold so-text-info so-mb-0">$50M</h2>
                        <p class="so-text-muted so-mb-0">Raised</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section with Profile Cards and Avatars -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-text-center so-mb-5">
            <span class="so-badge so-badge-soft-success so-mb-2">Our Team</span>
            <h2 class="so-fs-2xl so-fw-bold so-mb-2">Meet the leadership</h2>
            <p class="so-text-muted">The people behind CloudStack</p>
        </div>

        <div class="so-row so-g-4">
            <!-- Team Member 1 -->
            <div class="so-col-12 so-col-md-6 so-col-lg-3">
                <div class="so-card so-text-center so-h-100">
                    <div class="so-card-body">
                        <div class="so-avatar so-avatar-2xl so-avatar-primary so-mx-auto so-mb-3" data-so-popover="CEO & Co-Founder. Former Google engineer with 15+ years of experience." data-so-popover-position="top">
                            <span class="material-icons" style="font-size: 48px;">person</span>
                        </div>
                        <div class="so-avatar-status so-avatar-status-online" style="position: absolute; bottom: 0; right: 50%; transform: translateX(30px);"></div>
                        <h5 class="so-fw-semibold so-mb-1">Sarah Chen</h5>
                        <p class="so-text-muted so-fs-sm so-mb-2">CEO & Co-Founder</p>
                        <div class="so-d-flex so-justify-content-center so-gap-1">
                            <span class="so-chip so-chip-sm so-chip-soft-primary">Leadership</span>
                            <span class="so-chip so-chip-sm so-chip-soft-info">Strategy</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="so-col-12 so-col-md-6 so-col-lg-3">
                <div class="so-card so-text-center so-h-100">
                    <div class="so-card-body">
                        <div class="so-avatar so-avatar-2xl so-avatar-success so-mx-auto so-mb-3" data-so-popover="CTO & Co-Founder. Built infrastructure at AWS and Netflix." data-so-popover-position="top">
                            <span class="material-icons" style="font-size: 48px;">person</span>
                        </div>
                        <h5 class="so-fw-semibold so-mb-1">Marcus Johnson</h5>
                        <p class="so-text-muted so-fs-sm so-mb-2">CTO & Co-Founder</p>
                        <div class="so-d-flex so-justify-content-center so-gap-1">
                            <span class="so-chip so-chip-sm so-chip-soft-success">Engineering</span>
                            <span class="so-chip so-chip-sm so-chip-soft-warning">Architecture</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="so-col-12 so-col-md-6 so-col-lg-3">
                <div class="so-card so-text-center so-h-100">
                    <div class="so-card-body">
                        <div class="so-avatar so-avatar-2xl so-avatar-warning so-mx-auto so-mb-3" data-so-popover="VP of Engineering. 10+ years scaling distributed systems." data-so-popover-position="top">
                            <span class="material-icons" style="font-size: 48px;">person</span>
                        </div>
                        <h5 class="so-fw-semibold so-mb-1">Emily Rodriguez</h5>
                        <p class="so-text-muted so-fs-sm so-mb-2">VP of Engineering</p>
                        <div class="so-d-flex so-justify-content-center so-gap-1">
                            <span class="so-chip so-chip-sm so-chip-soft-danger">DevOps</span>
                            <span class="so-chip so-chip-sm so-chip-soft-primary">Scaling</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Team Member 4 -->
            <div class="so-col-12 so-col-md-6 so-col-lg-3">
                <div class="so-card so-text-center so-h-100">
                    <div class="so-card-body">
                        <div class="so-avatar so-avatar-2xl so-avatar-info so-mx-auto so-mb-3" data-so-popover="Head of Design. Award-winning designer focused on developer tools." data-so-popover-position="top">
                            <span class="material-icons" style="font-size: 48px;">person</span>
                        </div>
                        <h5 class="so-fw-semibold so-mb-1">David Kim</h5>
                        <p class="so-text-muted so-fs-sm so-mb-2">Head of Design</p>
                        <div class="so-d-flex so-justify-content-center so-gap-1">
                            <span class="so-chip so-chip-sm so-chip-soft-info">UX/UI</span>
                            <span class="so-chip so-chip-sm so-chip-soft-secondary">Product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Avatar Groups Demo -->
        <div class="so-card so-mt-5">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-primary">groups</span>
                    Full Team
                </h5>
            </div>
            <div class="so-card-body">
                <div class="so-row so-g-4">
                    <div class="so-col-12 so-col-md-4">
                        <h6 class="so-fw-semibold so-mb-3">Engineering (25+)</h6>
                        <div class="so-avatar-group so-avatar-group-stacked">
                            <div class="so-avatar so-avatar-primary">JD</div>
                            <div class="so-avatar so-avatar-success">MK</div>
                            <div class="so-avatar so-avatar-warning">SL</div>
                            <div class="so-avatar so-avatar-info">RK</div>
                            <div class="so-avatar so-avatar-danger">TM</div>
                            <div class="so-avatar so-avatar-secondary">+20</div>
                        </div>
                    </div>
                    <div class="so-col-12 so-col-md-4">
                        <h6 class="so-fw-semibold so-mb-3">Design (10+)</h6>
                        <div class="so-avatar-group so-avatar-group-stacked">
                            <div class="so-avatar so-avatar-info">DK</div>
                            <div class="so-avatar so-avatar-primary">AL</div>
                            <div class="so-avatar so-avatar-success">PM</div>
                            <div class="so-avatar so-avatar-warning">+7</div>
                        </div>
                    </div>
                    <div class="so-col-12 so-col-md-4">
                        <h6 class="so-fw-semibold so-mb-3">Sales & Support (15+)</h6>
                        <div class="so-avatar-group so-avatar-group-stacked">
                            <div class="so-avatar so-avatar-success">JM</div>
                            <div class="so-avatar so-avatar-danger">KL</div>
                            <div class="so-avatar so-avatar-warning">NP</div>
                            <div class="so-avatar so-avatar-info">+12</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company Timeline -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-text-center so-mb-5">
            <span class="so-badge so-badge-soft-info so-mb-2">Our Journey</span>
            <h2 class="so-fs-2xl so-fw-bold so-mb-2">Company Timeline</h2>
            <p class="so-text-muted">Key milestones in our growth</p>
        </div>

        <div class="so-row so-justify-content-center">
            <div class="so-col-12 so-col-lg-8">
                <div class="so-timeline so-timeline-alternate">
                    <div class="so-timeline-item">
                        <div class="so-timeline-marker so-bg-primary">
                            <span class="material-icons so-text-white so-fs-sm">flag</span>
                        </div>
                        <div class="so-timeline-content">
                            <div class="so-card">
                                <div class="so-card-body">
                                    <div class="so-d-flex so-justify-content-between so-align-items-start so-mb-2">
                                        <span class="so-label so-label-primary">2020</span>
                                        <span class="so-pill so-pill-sm so-pill-soft-success">Milestone</span>
                                    </div>
                                    <h5 class="so-fw-semibold">Company Founded</h5>
                                    <p class="so-text-muted so-mb-0">
                                        Started in a small office with just 3 co-founders and a big dream.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="so-timeline-item">
                        <div class="so-timeline-marker so-bg-success">
                            <span class="material-icons so-text-white so-fs-sm">attach_money</span>
                        </div>
                        <div class="so-timeline-content">
                            <div class="so-card">
                                <div class="so-card-body">
                                    <div class="so-d-flex so-justify-content-between so-align-items-start so-mb-2">
                                        <span class="so-label so-label-success">2021</span>
                                        <span class="so-pill so-pill-sm so-pill-soft-warning">Funding</span>
                                    </div>
                                    <h5 class="so-fw-semibold">Series A - $15M</h5>
                                    <p class="so-text-muted so-mb-0">
                                        Raised our first major round to accelerate product development.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="so-timeline-item">
                        <div class="so-timeline-marker so-bg-warning">
                            <span class="material-icons so-text-white so-fs-sm">groups</span>
                        </div>
                        <div class="so-timeline-content">
                            <div class="so-card">
                                <div class="so-card-body">
                                    <div class="so-d-flex so-justify-content-between so-align-items-start so-mb-2">
                                        <span class="so-label so-label-warning">2022</span>
                                        <span class="so-pill so-pill-sm so-pill-soft-info">Growth</span>
                                    </div>
                                    <h5 class="so-fw-semibold">10,000 Customers</h5>
                                    <p class="so-text-muted so-mb-0">
                                        Reached our first major customer milestone across 50+ countries.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="so-timeline-item">
                        <div class="so-timeline-marker so-bg-info">
                            <span class="material-icons so-text-white so-fs-sm">trending_up</span>
                        </div>
                        <div class="so-timeline-content">
                            <div class="so-card">
                                <div class="so-card-body">
                                    <div class="so-d-flex so-justify-content-between so-align-items-start so-mb-2">
                                        <span class="so-label so-label-info">2023</span>
                                        <span class="so-pill so-pill-sm so-pill-soft-success">Funding</span>
                                    </div>
                                    <h5 class="so-fw-semibold">Series B - $35M</h5>
                                    <p class="so-text-muted so-mb-0">
                                        Expanded globally with new data centers in Europe and Asia.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="so-timeline-item">
                        <div class="so-timeline-marker so-bg-danger">
                            <span class="material-icons so-text-white so-fs-sm">star</span>
                        </div>
                        <div class="so-timeline-content">
                            <div class="so-card">
                                <div class="so-card-body">
                                    <div class="so-d-flex so-justify-content-between so-align-items-start so-mb-2">
                                        <span class="so-label so-label-danger">2024</span>
                                        <span class="so-pill so-pill-sm so-pill-soft-primary">Present</span>
                                    </div>
                                    <h5 class="so-fw-semibold">50,000+ Customers</h5>
                                    <p class="so-text-muted so-mb-0">
                                        Serving developers worldwide with 99.99% uptime.
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

<!-- Values Section with Pills and Labels -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-text-center so-mb-5">
            <span class="so-badge so-badge-soft-warning so-mb-2">Our Values</span>
            <h2 class="so-fs-2xl so-fw-bold so-mb-2">What we stand for</h2>
        </div>

        <div class="so-row so-g-4">
            <div class="so-col-12 so-col-md-6 so-col-lg-3">
                <div class="so-card so-card-bordered so-h-100">
                    <div class="so-card-body so-text-center">
                        <span class="so-label so-label-lg so-label-primary so-mb-3">
                            <span class="material-icons">lightbulb</span>
                        </span>
                        <h5 class="so-fw-semibold">Innovation</h5>
                        <p class="so-text-muted so-fs-sm so-mb-0">
                            We push boundaries and explore new ideas every day.
                        </p>
                    </div>
                </div>
            </div>
            <div class="so-col-12 so-col-md-6 so-col-lg-3">
                <div class="so-card so-card-bordered so-h-100">
                    <div class="so-card-body so-text-center">
                        <span class="so-label so-label-lg so-label-success so-mb-3">
                            <span class="material-icons">handshake</span>
                        </span>
                        <h5 class="so-fw-semibold">Trust</h5>
                        <p class="so-text-muted so-fs-sm so-mb-0">
                            We build relationships based on transparency and reliability.
                        </p>
                    </div>
                </div>
            </div>
            <div class="so-col-12 so-col-md-6 so-col-lg-3">
                <div class="so-card so-card-bordered so-h-100">
                    <div class="so-card-body so-text-center">
                        <span class="so-label so-label-lg so-label-warning so-mb-3">
                            <span class="material-icons">diversity_3</span>
                        </span>
                        <h5 class="so-fw-semibold">Collaboration</h5>
                        <p class="so-text-muted so-fs-sm so-mb-0">
                            We work together as one team toward shared goals.
                        </p>
                    </div>
                </div>
            </div>
            <div class="so-col-12 so-col-md-6 so-col-lg-3">
                <div class="so-card so-card-bordered so-h-100">
                    <div class="so-card-body so-text-center">
                        <span class="so-label so-label-lg so-label-info so-mb-3">
                            <span class="material-icons">emoji_people</span>
                        </span>
                        <h5 class="so-fw-semibold">Customer First</h5>
                        <p class="so-text-muted so-fs-sm so-mb-0">
                            Every decision starts with what's best for our users.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skeleton Loading Demo -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header so-d-flex so-justify-content-between so-align-items-center">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-secondary">hourglass_empty</span>
                    Skeleton Loading Demo
                </h5>
                <button class="so-btn so-btn-outline so-btn-sm" id="toggleSkeleton">
                    <span class="material-icons so-fs-sm so-me-1">refresh</span>
                    Toggle Loading
                </button>
            </div>
            <div class="so-card-body">
                <div class="so-row so-g-4">
                    <div class="so-col-12 so-col-md-6">
                        <div class="skeleton-demo">
                            <!-- Profile Skeleton -->
                            <div class="so-d-flex so-align-items-center so-gap-3 so-mb-4">
                                <div class="so-skeleton so-skeleton-avatar" style="width: 64px; height: 64px;"></div>
                                <div class="so-flex-grow-1">
                                    <div class="so-skeleton so-skeleton-text so-mb-2" style="width: 60%;"></div>
                                    <div class="so-skeleton so-skeleton-text" style="width: 40%;"></div>
                                </div>
                            </div>
                            <!-- Content Skeleton -->
                            <div class="so-skeleton so-skeleton-text so-mb-2" style="width: 100%;"></div>
                            <div class="so-skeleton so-skeleton-text so-mb-2" style="width: 90%;"></div>
                            <div class="so-skeleton so-skeleton-text so-mb-3" style="width: 75%;"></div>
                            <div class="so-skeleton so-skeleton-btn" style="width: 120px;"></div>
                        </div>
                        <div class="content-demo so-d-none">
                            <div class="so-d-flex so-align-items-center so-gap-3 so-mb-4">
                                <div class="so-avatar so-avatar-xl so-avatar-primary">SC</div>
                                <div>
                                    <h5 class="so-fw-semibold so-mb-0">Sarah Chen</h5>
                                    <p class="so-text-muted so-mb-0">CEO & Co-Founder</p>
                                </div>
                            </div>
                            <p class="so-text-muted">
                                Leading CloudStack's mission to democratize cloud computing.
                                With 15+ years of experience in tech, Sarah brings a unique
                                perspective to developer tools.
                            </p>
                            <button class="so-btn so-btn-primary">View Profile</button>
                        </div>
                    </div>

                    <div class="so-col-12 so-col-md-6">
                        <div class="skeleton-demo">
                            <!-- Card Skeleton -->
                            <div class="so-skeleton so-skeleton-img so-mb-3" style="height: 150px;"></div>
                            <div class="so-skeleton so-skeleton-title so-mb-2" style="width: 70%;"></div>
                            <div class="so-skeleton so-skeleton-text so-mb-2" style="width: 100%;"></div>
                            <div class="so-skeleton so-skeleton-text so-mb-3" style="width: 85%;"></div>
                            <div class="so-d-flex so-gap-2">
                                <div class="so-skeleton so-skeleton-btn" style="width: 80px;"></div>
                                <div class="so-skeleton so-skeleton-btn" style="width: 80px;"></div>
                            </div>
                        </div>
                        <div class="content-demo so-d-none">
                            <div class="so-bg-primary so-rounded so-mb-3 so-d-flex so-align-items-center so-justify-content-center" style="height: 150px;">
                                <span class="material-icons so-text-white" style="font-size: 48px;">cloud</span>
                            </div>
                            <h5 class="so-fw-semibold">CloudStack Platform</h5>
                            <p class="so-text-muted">
                                Deploy, scale, and manage your applications with our
                                cutting-edge cloud infrastructure.
                            </p>
                            <div class="so-d-flex so-gap-2">
                                <button class="so-btn so-btn-primary so-btn-sm">Learn More</button>
                                <button class="so-btn so-btn-outline so-btn-sm">Docs</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-text-center so-mb-5">
            <span class="so-badge so-badge-soft-secondary so-mb-2">Partners</span>
            <h2 class="so-fs-2xl so-fw-bold so-mb-2">Trusted by industry leaders</h2>
        </div>

        <div class="so-row so-g-4 so-align-items-center so-justify-content-center">
            <div class="so-col-6 so-col-md-4 so-col-lg-2 so-text-center">
                <div class="so-p-3 so-bg-light so-rounded so-d-flex so-align-items-center so-justify-content-center" style="height: 80px;">
                    <span class="so-fw-bold so-fs-xl so-text-muted">TechCorp</span>
                </div>
            </div>
            <div class="so-col-6 so-col-md-4 so-col-lg-2 so-text-center">
                <div class="so-p-3 so-bg-light so-rounded so-d-flex so-align-items-center so-justify-content-center" style="height: 80px;">
                    <span class="so-fw-bold so-fs-xl so-text-muted">StartupXYZ</span>
                </div>
            </div>
            <div class="so-col-6 so-col-md-4 so-col-lg-2 so-text-center">
                <div class="so-p-3 so-bg-light so-rounded so-d-flex so-align-items-center so-justify-content-center" style="height: 80px;">
                    <span class="so-fw-bold so-fs-xl so-text-muted">BigCo</span>
                </div>
            </div>
            <div class="so-col-6 so-col-md-4 so-col-lg-2 so-text-center">
                <div class="so-p-3 so-bg-light so-rounded so-d-flex so-align-items-center so-justify-content-center" style="height: 80px;">
                    <span class="so-fw-bold so-fs-xl so-text-muted">DevHub</span>
                </div>
            </div>
            <div class="so-col-6 so-col-md-4 so-col-lg-2 so-text-center">
                <div class="so-p-3 so-bg-light so-rounded so-d-flex so-align-items-center so-justify-content-center" style="height: 80px;">
                    <span class="so-fw-bold so-fs-xl so-text-muted">CloudNow</span>
                </div>
            </div>
            <div class="so-col-6 so-col-md-4 so-col-lg-2 so-text-center">
                <div class="so-p-3 so-bg-light so-rounded so-d-flex so-align-items-center so-justify-content-center" style="height: 80px;">
                    <span class="so-fw-bold so-fs-xl so-text-muted">Scaleup</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$pageScripts = <<<'SCRIPT'
<script>
    // Skeleton toggle demo
    const toggleSkeletonBtn = document.getElementById('toggleSkeleton');
    const skeletonDemos = document.querySelectorAll('.skeleton-demo');
    const contentDemos = document.querySelectorAll('.content-demo');
    let showingSkeleton = true;

    toggleSkeletonBtn?.addEventListener('click', function() {
        showingSkeleton = !showingSkeleton;
        skeletonDemos.forEach(el => el.classList.toggle('so-d-none', !showingSkeleton));
        contentDemos.forEach(el => el.classList.toggle('so-d-none', showingSkeleton));
    });

    // Simple popover initialization
    document.querySelectorAll('[data-so-popover]').forEach(el => {
        el.style.cursor = 'pointer';
        el.addEventListener('mouseenter', function() {
            const text = this.getAttribute('data-so-popover');
            const popover = document.createElement('div');
            popover.className = 'so-popover so-show';
            popover.innerHTML = `<div class="so-popover-body">${text}</div>`;
            popover.style.cssText = 'position: absolute; z-index: 1000; background: var(--so-bg-primary); border: 1px solid var(--so-border-color); border-radius: 8px; padding: 8px 12px; box-shadow: var(--so-shadow-md); max-width: 250px; font-size: 14px;';

            document.body.appendChild(popover);

            const rect = this.getBoundingClientRect();
            popover.style.left = (rect.left + rect.width / 2 - popover.offsetWidth / 2) + 'px';
            popover.style.top = (rect.top - popover.offsetHeight - 10 + window.scrollY) + 'px';

            this._popover = popover;
        });

        el.addEventListener('mouseleave', function() {
            if (this._popover) {
                this._popover.remove();
                this._popover = null;
            }
        });
    });
</script>
SCRIPT;
require_once 'includes/footer.php';
?>
