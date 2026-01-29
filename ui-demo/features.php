<?php
$pageTitle = 'Features';
$pageDescription = 'CloudStack Features - Explore all the capabilities of our platform';
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
            <span class="so-breadcrumb-item so-active">Features</span>
        </nav>
    </div>
</section>

<!-- Hero -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-text-center">
            <span class="so-badge so-badge-soft-primary so-mb-2">
                <span class="material-icons so-fs-xs so-me-1">auto_awesome</span>
                Features
            </span>
            <h1 class="so-fs-3xl so-fw-bold so-mb-2">Powerful Features</h1>
            <p class="so-text-muted so-fs-lg so-mb-0">
                Explore everything CloudStack has to offer
            </p>
        </div>
    </div>
</section>

<!-- Tabs Section -->
<section class="so-py-5" id="tabs">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-primary">tab</span>
                    Tabs Component
                </h5>
            </div>
            <div class="so-card-body">
                <h6 class="so-fw-semibold so-mb-3">Default Tabs</h6>
                <div class="so-tabs so-mb-4" data-so-tabs>
                    <button class="so-tab so-active" data-so-target="#tab1">Overview</button>
                    <button class="so-tab" data-so-target="#tab2">Features</button>
                    <button class="so-tab" data-so-target="#tab3">Pricing</button>
                    <button class="so-tab" data-so-target="#tab4">FAQ</button>
                </div>
                <div class="so-tab-content">
                    <div class="so-tab-pane so-active" id="tab1">
                        <p class="so-text-muted">This is the overview content. CloudStack provides a comprehensive platform for deploying and managing applications.</p>
                    </div>
                    <div class="so-tab-pane" id="tab2">
                        <p class="so-text-muted">Explore our features: auto-scaling, global CDN, and 24/7 support.</p>
                    </div>
                    <div class="so-tab-pane" id="tab3">
                        <p class="so-text-muted">Flexible pricing plans starting from $0/month.</p>
                    </div>
                    <div class="so-tab-pane" id="tab4">
                        <p class="so-text-muted">Have questions? Check our FAQ section.</p>
                    </div>
                </div>

                <div class="so-border-top so-my-4 so-pt-4">
                    <h6 class="so-fw-semibold so-mb-3">Pills Tabs</h6>
                    <div class="so-tabs so-tabs-pills so-tabs-primary so-mb-3" data-so-tabs>
                        <button class="so-tab so-active" data-so-target="#pill1">Dashboard</button>
                        <button class="so-tab" data-so-target="#pill2">Analytics</button>
                        <button class="so-tab" data-so-target="#pill3">Settings</button>
                    </div>
                    <div class="so-tab-content">
                        <div class="so-tab-pane so-active" id="pill1">
                            <div class="so-alert so-alert-info">Dashboard content goes here.</div>
                        </div>
                        <div class="so-tab-pane" id="pill2">
                            <div class="so-alert so-alert-success">Analytics content goes here.</div>
                        </div>
                        <div class="so-tab-pane" id="pill3">
                            <div class="so-alert so-alert-warning">Settings content goes here.</div>
                        </div>
                    </div>
                </div>

                <div class="so-border-top so-my-4 so-pt-4">
                    <h6 class="so-fw-semibold so-mb-3">Boxed Tabs</h6>
                    <div class="so-tabs so-tabs-boxed so-mb-3" data-so-tabs>
                        <button class="so-tab so-active" data-so-target="#box1">
                            <span class="material-icons so-me-1">inbox</span>
                            Inbox
                        </button>
                        <button class="so-tab" data-so-target="#box2">
                            <span class="material-icons so-me-1">send</span>
                            Sent
                        </button>
                        <button class="so-tab" data-so-target="#box3">
                            <span class="material-icons so-me-1">drafts</span>
                            Drafts
                        </button>
                    </div>
                    <div class="so-tab-content">
                        <div class="so-tab-pane so-active" id="box1">Inbox messages...</div>
                        <div class="so-tab-pane" id="box2">Sent messages...</div>
                        <div class="so-tab-pane" id="box3">Draft messages...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Accordion Section -->
<section class="so-py-5 so-bg-white" id="accordion">
    <div class="so-container">
        <div class="so-row so-g-4">
            <div class="so-col-12 so-col-lg-6">
                <div class="so-card so-h-100">
                    <div class="so-card-header">
                        <h5 class="so-mb-0">
                            <span class="material-icons so-me-2 so-text-success">unfold_more</span>
                            Default Accordion
                        </h5>
                    </div>
                    <div class="so-card-body">
                        <div class="so-accordion" data-so-accordion>
                            <div class="so-accordion-item">
                                <div class="so-accordion-header">
                                    <button class="so-accordion-button">
                                        What is CloudStack?
                                    </button>
                                </div>
                                <div class="so-accordion-collapse so-show">
                                    <div class="so-accordion-body">
                                        CloudStack is a modern cloud platform that helps teams deploy,
                                        scale, and manage applications with ease.
                                    </div>
                                </div>
                            </div>
                            <div class="so-accordion-item">
                                <div class="so-accordion-header">
                                    <button class="so-accordion-button so-collapsed">
                                        How do I get started?
                                    </button>
                                </div>
                                <div class="so-accordion-collapse">
                                    <div class="so-accordion-body">
                                        Sign up for free, connect your repository, and deploy your
                                        first application in minutes.
                                    </div>
                                </div>
                            </div>
                            <div class="so-accordion-item">
                                <div class="so-accordion-header">
                                    <button class="so-accordion-button so-collapsed">
                                        Is there a free tier?
                                    </button>
                                </div>
                                <div class="so-accordion-collapse">
                                    <div class="so-accordion-body">
                                        Yes! We offer a generous free tier that includes unlimited
                                        deployments for hobby projects.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="so-col-12 so-col-lg-6">
                <div class="so-card so-h-100">
                    <div class="so-card-header">
                        <h5 class="so-mb-0">
                            <span class="material-icons so-me-2 so-text-info">style</span>
                            Bordered Accordion
                        </h5>
                    </div>
                    <div class="so-card-body">
                        <div class="so-accordion so-accordion-bordered so-accordion-primary" data-so-accordion>
                            <div class="so-accordion-item">
                                <div class="so-accordion-header">
                                    <button class="so-accordion-button">
                                        <span class="material-icons so-me-2">security</span>
                                        Security Features
                                    </button>
                                </div>
                                <div class="so-accordion-collapse so-show">
                                    <div class="so-accordion-body">
                                        SOC2 compliant, end-to-end encryption, and advanced access controls.
                                    </div>
                                </div>
                            </div>
                            <div class="so-accordion-item">
                                <div class="so-accordion-header">
                                    <button class="so-accordion-button so-collapsed">
                                        <span class="material-icons so-me-2">speed</span>
                                        Performance
                                    </button>
                                </div>
                                <div class="so-accordion-collapse">
                                    <div class="so-accordion-body">
                                        Global CDN with 200+ edge locations for lightning-fast delivery.
                                    </div>
                                </div>
                            </div>
                            <div class="so-accordion-item">
                                <div class="so-accordion-header">
                                    <button class="so-accordion-button so-collapsed">
                                        <span class="material-icons so-me-2">support</span>
                                        Support Options
                                    </button>
                                </div>
                                <div class="so-accordion-collapse">
                                    <div class="so-accordion-body">
                                        24/7 support via chat, email, and phone for enterprise customers.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stepper Section -->
<section class="so-py-5" id="stepper">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-warning">format_list_numbered</span>
                    Stepper Component
                </h5>
            </div>
            <div class="so-card-body">
                <h6 class="so-fw-semibold so-mb-4">Horizontal Stepper</h6>
                <div class="so-stepper so-stepper-horizontal so-mb-5">
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Account Setup</div>
                            <div class="so-step-subtitle">Create your account</div>
                        </div>
                    </div>
                    <div class="so-step so-step-completed">
                        <div class="so-step-icon">
                            <span class="material-icons">check</span>
                        </div>
                        <div class="so-step-content">
                            <div class="so-step-title">Connect Repo</div>
                            <div class="so-step-subtitle">Link your code</div>
                        </div>
                    </div>
                    <div class="so-step so-step-active">
                        <div class="so-step-icon">3</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Configure</div>
                            <div class="so-step-subtitle">Set up your app</div>
                        </div>
                    </div>
                    <div class="so-step">
                        <div class="so-step-icon">4</div>
                        <div class="so-step-content">
                            <div class="so-step-title">Deploy</div>
                            <div class="so-step-subtitle">Go live!</div>
                        </div>
                    </div>
                </div>

                <div class="so-border-top so-pt-4">
                    <h6 class="so-fw-semibold so-mb-4">Vertical Stepper</h6>
                    <div class="so-row">
                        <div class="so-col-12 so-col-md-6">
                            <div class="so-stepper so-stepper-vertical">
                                <div class="so-step so-step-completed">
                                    <div class="so-step-icon so-bg-success">
                                        <span class="material-icons">check</span>
                                    </div>
                                    <div class="so-step-content">
                                        <div class="so-step-title">Order Placed</div>
                                        <div class="so-step-subtitle">Jan 15, 2025 at 10:30 AM</div>
                                    </div>
                                </div>
                                <div class="so-step so-step-completed">
                                    <div class="so-step-icon so-bg-success">
                                        <span class="material-icons">check</span>
                                    </div>
                                    <div class="so-step-content">
                                        <div class="so-step-title">Payment Confirmed</div>
                                        <div class="so-step-subtitle">Jan 15, 2025 at 10:32 AM</div>
                                    </div>
                                </div>
                                <div class="so-step so-step-active">
                                    <div class="so-step-icon so-bg-primary">
                                        <span class="material-icons">local_shipping</span>
                                    </div>
                                    <div class="so-step-content">
                                        <div class="so-step-title">In Transit</div>
                                        <div class="so-step-subtitle">Estimated: Jan 18, 2025</div>
                                    </div>
                                </div>
                                <div class="so-step">
                                    <div class="so-step-icon">
                                        <span class="material-icons">home</span>
                                    </div>
                                    <div class="so-step-content">
                                        <div class="so-step-title">Delivered</div>
                                        <div class="so-step-subtitle">Pending</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Table Section -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header so-d-flex so-justify-content-between so-align-items-center">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-info">table_chart</span>
                    Data Tables
                </h5>
                <div class="so-d-flex so-gap-2">
                    <button class="so-btn so-btn-outline so-btn-sm">
                        <span class="material-icons so-fs-sm">download</span>
                        Export
                    </button>
                    <button class="so-btn so-btn-primary so-btn-sm">
                        <span class="material-icons so-fs-sm">add</span>
                        Add New
                    </button>
                </div>
            </div>
            <div class="so-card-body so-p-0">
                <div class="so-table-responsive">
                    <table class="so-table so-table-hover so-table-striped">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Status</th>
                                <th>Team</th>
                                <th>Progress</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="so-d-flex so-align-items-center so-gap-2">
                                        <span class="material-icons so-text-primary">folder</span>
                                        <span class="so-fw-medium">Website Redesign</span>
                                    </div>
                                </td>
                                <td><span class="so-badge so-badge-soft-success">Active</span></td>
                                <td>
                                    <div class="so-avatar-group so-avatar-group-stacked">
                                        <div class="so-avatar so-avatar-xs so-avatar-primary">JD</div>
                                        <div class="so-avatar so-avatar-xs so-avatar-success">MK</div>
                                        <div class="so-avatar so-avatar-xs so-avatar-warning">+2</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="so-progress so-progress-sm" style="width: 100px;">
                                        <div class="so-progress-bar so-bg-success" style="width: 75%;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="so-btn-group so-btn-group-sm">
                                        <button class="so-btn so-btn-ghost so-btn-icon so-btn-sm">
                                            <span class="material-icons so-fs-sm">edit</span>
                                        </button>
                                        <button class="so-btn so-btn-ghost so-btn-icon so-btn-sm">
                                            <span class="material-icons so-fs-sm">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="so-d-flex so-align-items-center so-gap-2">
                                        <span class="material-icons so-text-success">folder</span>
                                        <span class="so-fw-medium">Mobile App</span>
                                    </div>
                                </td>
                                <td><span class="so-badge so-badge-soft-warning">In Review</span></td>
                                <td>
                                    <div class="so-avatar-group so-avatar-group-stacked">
                                        <div class="so-avatar so-avatar-xs so-avatar-info">SL</div>
                                        <div class="so-avatar so-avatar-xs so-avatar-danger">RK</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="so-progress so-progress-sm" style="width: 100px;">
                                        <div class="so-progress-bar so-bg-warning" style="width: 45%;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="so-btn-group so-btn-group-sm">
                                        <button class="so-btn so-btn-ghost so-btn-icon so-btn-sm">
                                            <span class="material-icons so-fs-sm">edit</span>
                                        </button>
                                        <button class="so-btn so-btn-ghost so-btn-icon so-btn-sm">
                                            <span class="material-icons so-fs-sm">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="so-d-flex so-align-items-center so-gap-2">
                                        <span class="material-icons so-text-warning">folder</span>
                                        <span class="so-fw-medium">API Integration</span>
                                    </div>
                                </td>
                                <td><span class="so-badge so-badge-soft-info">Planning</span></td>
                                <td>
                                    <div class="so-avatar-group so-avatar-group-stacked">
                                        <div class="so-avatar so-avatar-xs so-avatar-secondary">TM</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="so-progress so-progress-sm" style="width: 100px;">
                                        <div class="so-progress-bar so-bg-info" style="width: 10%;"></div>
                                    </div>
                                </td>
                                <td>
                                    <div class="so-btn-group so-btn-group-sm">
                                        <button class="so-btn so-btn-ghost so-btn-icon so-btn-sm">
                                            <span class="material-icons so-fs-sm">edit</span>
                                        </button>
                                        <button class="so-btn so-btn-ghost so-btn-icon so-btn-sm">
                                            <span class="material-icons so-fs-sm">delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="so-card-footer so-d-flex so-justify-content-between so-align-items-center">
                <span class="so-text-muted so-fs-sm">Showing 1-3 of 25 projects</span>
                <nav class="so-pagination so-pagination-sm">
                    <button class="so-page-item" disabled>
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button class="so-page-item so-active">1</button>
                    <button class="so-page-item">2</button>
                    <button class="so-page-item">3</button>
                    <button class="so-page-item">
                        <span class="material-icons">chevron_right</span>
                    </button>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Code Block Section -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-danger">code</span>
                    Code Blocks
                </h5>
            </div>
            <div class="so-card-body">
                <h6 class="so-fw-semibold so-mb-3">Quick Start Example</h6>
                <div class="so-code-block so-mb-4">
                    <div class="so-code-block-header">
                        <span class="so-code-block-lang">bash</span>
                        <button class="so-code-block-copy so-btn so-btn-ghost so-btn-sm">
                            <span class="material-icons so-fs-sm">content_copy</span>
                            Copy
                        </button>
                    </div>
                    <pre class="so-code-block-content"><code># Install CloudStack CLI
npm install -g cloudstack-cli

# Login to your account
cloudstack login

# Deploy your application
cloudstack deploy --app myapp</code></pre>
                </div>

                <h6 class="so-fw-semibold so-mb-3">Configuration Example</h6>
                <div class="so-code-block">
                    <div class="so-code-block-header">
                        <span class="so-code-block-lang">yaml</span>
                        <button class="so-code-block-copy so-btn so-btn-ghost so-btn-sm">
                            <span class="material-icons so-fs-sm">content_copy</span>
                            Copy
                        </button>
                    </div>
                    <pre class="so-code-block-content"><code># cloudstack.yaml
name: my-awesome-app
version: 1.0.0

build:
  command: npm run build
  output: dist

deploy:
  region: us-east-1
  scaling:
    min: 1
    max: 10

env:
  NODE_ENV: production
  API_KEY: ${SECRET_API_KEY}</code></pre>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- List Group Section -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-row so-g-4">
            <div class="so-col-12 so-col-md-6">
                <div class="so-card so-h-100">
                    <div class="so-card-header">
                        <h5 class="so-mb-0">
                            <span class="material-icons so-me-2 so-text-primary">list</span>
                            List Group
                        </h5>
                    </div>
                    <div class="so-card-body so-p-0">
                        <ul class="so-list-group so-list-group-flush">
                            <li class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                                <div class="so-d-flex so-align-items-center so-gap-2">
                                    <span class="material-icons so-text-success">check_circle</span>
                                    <span>Auto-scaling enabled</span>
                                </div>
                                <span class="so-badge so-badge-success">Active</span>
                            </li>
                            <li class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                                <div class="so-d-flex so-align-items-center so-gap-2">
                                    <span class="material-icons so-text-success">check_circle</span>
                                    <span>SSL Certificate</span>
                                </div>
                                <span class="so-badge so-badge-success">Valid</span>
                            </li>
                            <li class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                                <div class="so-d-flex so-align-items-center so-gap-2">
                                    <span class="material-icons so-text-warning">warning</span>
                                    <span>Domain Configuration</span>
                                </div>
                                <span class="so-badge so-badge-warning">Pending</span>
                            </li>
                            <li class="so-list-group-item so-d-flex so-justify-content-between so-align-items-center">
                                <div class="so-d-flex so-align-items-center so-gap-2">
                                    <span class="material-icons so-text-muted">radio_button_unchecked</span>
                                    <span>Custom Domain</span>
                                </div>
                                <span class="so-badge so-badge-secondary">Not Set</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="so-col-12 so-col-md-6">
                <div class="so-card so-h-100">
                    <div class="so-card-header">
                        <h5 class="so-mb-0">
                            <span class="material-icons so-me-2 so-text-secondary">inbox</span>
                            Empty State
                        </h5>
                    </div>
                    <div class="so-card-body">
                        <div class="so-empty-state so-text-center so-py-4">
                            <div class="so-empty-state-icon so-mb-3">
                                <span class="material-icons" style="font-size: 64px; color: var(--so-text-muted);">
                                    folder_open
                                </span>
                            </div>
                            <h5 class="so-empty-state-title so-fw-semibold so-mb-2">No projects yet</h5>
                            <p class="so-empty-state-text so-text-muted so-mb-3">
                                Get started by creating your first project
                            </p>
                            <div class="so-empty-state-action">
                                <button class="so-btn so-btn-primary">
                                    <span class="material-icons so-me-1">add</span>
                                    Create Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
