<?php
$pageTitle = 'Pricing';
$pageDescription = 'CloudStack Pricing - Flexible plans for teams of all sizes';
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
            <span class="so-breadcrumb-item so-active">Pricing</span>
        </nav>
    </div>
</section>

<!-- Hero -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-text-center">
            <span class="so-badge so-badge-soft-primary so-mb-2">Pricing</span>
            <h1 class="so-fs-3xl so-fw-bold so-mb-2">Simple, transparent pricing</h1>
            <p class="so-text-muted so-fs-lg so-mb-4">
                Choose the plan that works for you
            </p>

            <!-- Billing Toggle -->
            <div class="so-d-inline-flex so-align-items-center so-gap-3 so-p-2 so-bg-light so-rounded-full">
                <span class="so-fw-medium" id="monthlyLabel">Monthly</span>
                <label class="so-form-switch so-mb-0">
                    <input type="checkbox" id="billingToggle">
                    <span class="so-form-switch-slider"></span>
                </label>
                <span class="so-fw-medium" id="annualLabel">
                    Annual
                    <span class="so-badge so-badge-success so-ms-1">Save 20%</span>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Cards -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-row so-g-4 so-justify-content-center">
            <!-- Free Plan -->
            <div class="so-col-12 so-col-md-6 so-col-lg-4">
                <div class="so-card so-card-bordered so-h-100">
                    <div class="so-card-body so-p-4">
                        <div class="so-text-center so-mb-4">
                            <span class="so-badge so-badge-soft-secondary so-mb-2">Free</span>
                            <h3 class="so-fw-bold so-mb-1">
                                <span class="so-fs-3xl">$0</span>
                                <span class="so-text-muted so-fs-base">/month</span>
                            </h3>
                            <p class="so-text-muted so-fs-sm">Perfect for hobby projects</p>
                        </div>

                        <ul class="so-list-group so-list-group-flush so-mb-4">
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>1 Project</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>100 GB Bandwidth</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>Community Support</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2 so-text-muted">
                                <span class="material-icons so-fs-sm">cancel</span>
                                <span>Custom Domain</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2 so-text-muted">
                                <span class="material-icons so-fs-sm">cancel</span>
                                <span>Analytics</span>
                            </li>
                        </ul>

                        <button class="so-btn so-btn-outline so-btn-block">
                            Get Started
                        </button>
                    </div>
                </div>
            </div>

            <!-- Pro Plan (Popular) -->
            <div class="so-col-12 so-col-md-6 so-col-lg-4">
                <div class="so-card so-card-bordered so-card-border-primary so-h-100" style="transform: scale(1.05); z-index: 1;">
                    <div class="so-card-header so-bg-primary so-text-white so-text-center so-py-2">
                        <span class="so-fw-medium">Most Popular</span>
                    </div>
                    <div class="so-card-body so-p-4">
                        <div class="so-text-center so-mb-4">
                            <span class="so-badge so-badge-soft-primary so-mb-2">Pro</span>
                            <h3 class="so-fw-bold so-mb-1">
                                <span class="so-fs-3xl" id="proPrice">$29</span>
                                <span class="so-text-muted so-fs-base">/month</span>
                            </h3>
                            <p class="so-text-muted so-fs-sm">For growing teams</p>
                        </div>

                        <ul class="so-list-group so-list-group-flush so-mb-4">
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>10 Projects</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>1 TB Bandwidth</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>Priority Support</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>Custom Domain</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>Analytics Dashboard</span>
                            </li>
                        </ul>

                        <button class="so-btn so-btn-primary so-btn-block" id="checkoutBtn">
                            Start Free Trial
                        </button>
                    </div>
                </div>
            </div>

            <!-- Enterprise Plan -->
            <div class="so-col-12 so-col-md-6 so-col-lg-4">
                <div class="so-card so-card-bordered so-h-100">
                    <div class="so-card-body so-p-4">
                        <div class="so-text-center so-mb-4">
                            <span class="so-badge so-badge-soft-dark so-mb-2">Enterprise</span>
                            <h3 class="so-fw-bold so-mb-1">
                                <span class="so-fs-3xl" id="enterprisePrice">$99</span>
                                <span class="so-text-muted so-fs-base">/month</span>
                            </h3>
                            <p class="so-text-muted so-fs-sm">For large organizations</p>
                        </div>

                        <ul class="so-list-group so-list-group-flush so-mb-4">
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>Unlimited Projects</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>Unlimited Bandwidth</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>24/7 Phone Support</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>SLA Guarantee</span>
                            </li>
                            <li class="so-list-group-item so-border-0 so-px-0 so-d-flex so-align-items-center so-gap-2">
                                <span class="material-icons so-text-success so-fs-sm">check_circle</span>
                                <span>Dedicated Account Manager</span>
                            </li>
                        </ul>

                        <button class="so-btn so-btn-dark so-btn-block">
                            Contact Sales
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Comparison with Tooltips -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <h3 class="so-text-center so-fw-bold so-mb-4">Feature Comparison</h3>
        <div class="so-table-responsive">
            <table class="so-table so-table-bordered">
                <thead>
                    <tr>
                        <th>Feature</th>
                        <th class="so-text-center">Free</th>
                        <th class="so-text-center so-bg-primary-50">Pro</th>
                        <th class="so-text-center">Enterprise</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Projects
                            <span class="material-icons so-fs-sm so-text-muted so-ms-1" data-so-tooltip="Number of apps you can deploy">help_outline</span>
                        </td>
                        <td class="so-text-center">1</td>
                        <td class="so-text-center so-bg-primary-50">10</td>
                        <td class="so-text-center">Unlimited</td>
                    </tr>
                    <tr>
                        <td>
                            Bandwidth
                            <span class="material-icons so-fs-sm so-text-muted so-ms-1" data-so-tooltip="Monthly data transfer limit">help_outline</span>
                        </td>
                        <td class="so-text-center">100 GB</td>
                        <td class="so-text-center so-bg-primary-50">1 TB</td>
                        <td class="so-text-center">Unlimited</td>
                    </tr>
                    <tr>
                        <td>SSL Certificate</td>
                        <td class="so-text-center"><span class="material-icons so-text-success">check</span></td>
                        <td class="so-text-center so-bg-primary-50"><span class="material-icons so-text-success">check</span></td>
                        <td class="so-text-center"><span class="material-icons so-text-success">check</span></td>
                    </tr>
                    <tr>
                        <td>Custom Domain</td>
                        <td class="so-text-center"><span class="material-icons so-text-muted">close</span></td>
                        <td class="so-text-center so-bg-primary-50"><span class="material-icons so-text-success">check</span></td>
                        <td class="so-text-center"><span class="material-icons so-text-success">check</span></td>
                    </tr>
                    <tr>
                        <td>Analytics</td>
                        <td class="so-text-center"><span class="material-icons so-text-muted">close</span></td>
                        <td class="so-text-center so-bg-primary-50"><span class="material-icons so-text-success">check</span></td>
                        <td class="so-text-center"><span class="material-icons so-text-success">check</span></td>
                    </tr>
                    <tr>
                        <td>SLA</td>
                        <td class="so-text-center"><span class="material-icons so-text-muted">close</span></td>
                        <td class="so-text-center so-bg-primary-50"><span class="material-icons so-text-muted">close</span></td>
                        <td class="so-text-center"><span class="so-badge so-badge-success">99.99%</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Usage Calculator with Sliders -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-primary">calculate</span>
                    Usage Calculator
                </h5>
            </div>
            <div class="so-card-body">
                <div class="so-row so-g-4">
                    <div class="so-col-12 so-col-md-6">
                        <label class="so-form-label so-d-flex so-justify-content-between">
                            <span>Number of Projects</span>
                            <span class="so-fw-bold" id="projectsValue">5</span>
                        </label>
                        <div class="so-slider" data-so-slider>
                            <input type="range" class="so-slider-input" min="1" max="50" value="5" id="projectsSlider">
                            <div class="so-slider-track">
                                <div class="so-slider-range" style="width: 10%;"></div>
                                <div class="so-slider-thumb" style="left: 10%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="so-col-12 so-col-md-6">
                        <label class="so-form-label so-d-flex so-justify-content-between">
                            <span>Monthly Bandwidth (GB)</span>
                            <span class="so-fw-bold" id="bandwidthValue">500</span>
                        </label>
                        <div class="so-slider" data-so-slider>
                            <input type="range" class="so-slider-input" min="100" max="10000" value="500" step="100" id="bandwidthSlider">
                            <div class="so-slider-track">
                                <div class="so-slider-range" style="width: 5%;"></div>
                                <div class="so-slider-thumb" style="left: 5%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="so-col-12">
                        <div class="so-alert so-alert-info so-d-flex so-align-items-center so-gap-3">
                            <span class="material-icons">lightbulb</span>
                            <div>
                                <strong>Recommended Plan: Pro</strong>
                                <p class="so-mb-0 so-fs-sm">Based on your usage, the Pro plan offers the best value.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Progress Bars Demo -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-success">trending_up</span>
                    Resource Usage
                </h5>
            </div>
            <div class="so-card-body">
                <div class="so-row so-g-4">
                    <div class="so-col-12 so-col-md-6">
                        <div class="so-d-flex so-justify-content-between so-mb-2">
                            <span>Storage (8.5 GB / 10 GB)</span>
                            <span class="so-fw-medium">85%</span>
                        </div>
                        <div class="so-progress so-mb-4">
                            <div class="so-progress-bar so-bg-warning" style="width: 85%;"></div>
                        </div>

                        <div class="so-d-flex so-justify-content-between so-mb-2">
                            <span>Bandwidth (450 GB / 1 TB)</span>
                            <span class="so-fw-medium">45%</span>
                        </div>
                        <div class="so-progress so-mb-4">
                            <div class="so-progress-bar so-bg-success" style="width: 45%;"></div>
                        </div>

                        <div class="so-d-flex so-justify-content-between so-mb-2">
                            <span>CPU Usage</span>
                            <span class="so-fw-medium">23%</span>
                        </div>
                        <div class="so-progress">
                            <div class="so-progress-bar so-bg-info" style="width: 23%;"></div>
                        </div>
                    </div>

                    <div class="so-col-12 so-col-md-6">
                        <h6 class="so-fw-semibold so-mb-3">Striped & Animated</h6>
                        <div class="so-progress so-progress-striped so-progress-animated so-mb-4">
                            <div class="so-progress-bar so-bg-primary" style="width: 60%;"></div>
                        </div>

                        <h6 class="so-fw-semibold so-mb-3">Stacked Progress</h6>
                        <div class="so-progress so-mb-4">
                            <div class="so-progress-bar so-bg-success" style="width: 30%;"></div>
                            <div class="so-progress-bar so-bg-warning" style="width: 25%;"></div>
                            <div class="so-progress-bar so-bg-danger" style="width: 15%;"></div>
                        </div>

                        <h6 class="so-fw-semibold so-mb-3">Loading States</h6>
                        <div class="so-d-flex so-gap-3 so-align-items-center">
                            <div class="so-spinner so-spinner-border so-spinner-primary"></div>
                            <div class="so-spinner so-spinner-border so-spinner-success so-spinner-sm"></div>
                            <div class="so-spinner so-spinner-grow so-spinner-warning"></div>
                            <div class="so-spinner so-spinner-grow so-spinner-danger so-spinner-sm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Button Groups Demo -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-info">toggle_on</span>
                    Button Groups & Toggles
                </h5>
            </div>
            <div class="so-card-body">
                <div class="so-row so-g-4">
                    <div class="so-col-12 so-col-md-6">
                        <h6 class="so-fw-semibold so-mb-3">Region Selection</h6>
                        <div class="so-btn-group so-mb-4">
                            <button class="so-btn so-btn-outline so-active">US East</button>
                            <button class="so-btn so-btn-outline">US West</button>
                            <button class="so-btn so-btn-outline">Europe</button>
                            <button class="so-btn so-btn-outline">Asia</button>
                        </div>

                        <h6 class="so-fw-semibold so-mb-3">View Toggle</h6>
                        <div class="so-btn-group">
                            <button class="so-btn so-btn-primary so-btn-icon">
                                <span class="material-icons">grid_view</span>
                            </button>
                            <button class="so-btn so-btn-outline so-btn-icon">
                                <span class="material-icons">view_list</span>
                            </button>
                        </div>
                    </div>

                    <div class="so-col-12 so-col-md-6">
                        <h6 class="so-fw-semibold so-mb-3">Form Switches</h6>
                        <div class="so-d-flex so-flex-column so-gap-3">
                            <label class="so-form-switch">
                                <input type="checkbox" checked>
                                <span class="so-form-switch-slider"></span>
                                <span class="so-ms-2">Enable notifications</span>
                            </label>
                            <label class="so-form-switch">
                                <input type="checkbox" checked>
                                <span class="so-form-switch-slider"></span>
                                <span class="so-ms-2">Auto-deploy on push</span>
                            </label>
                            <label class="so-form-switch">
                                <input type="checkbox">
                                <span class="so-form-switch-slider"></span>
                                <span class="so-ms-2">Require review before deploy</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Input Groups Demo -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-warning">input</span>
                    Input Groups
                </h5>
            </div>
            <div class="so-card-body">
                <div class="so-row so-g-4">
                    <div class="so-col-12 so-col-md-6">
                        <label class="so-form-label">Domain Name</label>
                        <div class="so-input-group so-mb-3">
                            <span class="so-input-addon">https://</span>
                            <input type="text" class="so-form-control" placeholder="myapp">
                            <span class="so-input-addon">.cloudstack.io</span>
                        </div>

                        <label class="so-form-label">API Key</label>
                        <div class="so-input-group so-mb-3">
                            <input type="password" class="so-form-control" value="sk_live_1234567890" id="apiKey">
                            <button class="so-btn so-btn-outline" id="toggleApiKey">
                                <span class="material-icons">visibility</span>
                            </button>
                            <button class="so-btn so-btn-outline" id="copyApiKey">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                    </div>

                    <div class="so-col-12 so-col-md-6">
                        <label class="so-form-label">Amount</label>
                        <div class="so-input-group so-mb-3">
                            <span class="so-input-addon">$</span>
                            <input type="number" class="so-form-control" placeholder="0.00">
                            <span class="so-input-addon">.00</span>
                        </div>

                        <label class="so-form-label">Search</label>
                        <div class="so-input-group">
                            <span class="so-input-addon">
                                <span class="material-icons so-fs-sm">search</span>
                            </span>
                            <input type="text" class="so-form-control" placeholder="Search projects...">
                            <button class="so-btn so-btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Select Dropdown Demo -->
<section class="so-py-5">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-secondary">arrow_drop_down_circle</span>
                    Select & Dropdowns
                </h5>
            </div>
            <div class="so-card-body">
                <div class="so-row so-g-4">
                    <div class="so-col-12 so-col-md-4">
                        <label class="so-form-label">Framework</label>
                        <select class="so-form-control" data-so-select>
                            <option value="">Select framework...</option>
                            <option value="next">Next.js</option>
                            <option value="nuxt">Nuxt.js</option>
                            <option value="gatsby">Gatsby</option>
                            <option value="astro">Astro</option>
                        </select>
                    </div>
                    <div class="so-col-12 so-col-md-4">
                        <label class="so-form-label">Region</label>
                        <select class="so-form-control" data-so-select>
                            <option value="us-east">US East (N. Virginia)</option>
                            <option value="us-west">US West (Oregon)</option>
                            <option value="eu-west">EU (Ireland)</option>
                            <option value="ap-south">Asia Pacific (Mumbai)</option>
                        </select>
                    </div>
                    <div class="so-col-12 so-col-md-4">
                        <label class="so-form-label">Instance Size</label>
                        <select class="so-form-control" data-so-select>
                            <option value="small">Small (1 vCPU, 1GB RAM)</option>
                            <option value="medium">Medium (2 vCPU, 4GB RAM)</option>
                            <option value="large">Large (4 vCPU, 8GB RAM)</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Checkout Modal -->
<div class="so-modal so-modal-centered" id="checkoutModal">
    <div class="so-modal-backdrop"></div>
    <div class="so-modal-dialog">
        <div class="so-modal-content">
            <div class="so-modal-header">
                <h5 class="so-modal-title">Complete Your Order</h5>
                <button class="so-modal-close" id="closeModal">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="so-modal-body">
                <div class="so-alert so-alert-info so-alert-sm so-mb-4">
                    <span class="material-icons so-alert-icon">info</span>
                    <div>Start your 14-day free trial. No credit card required.</div>
                </div>

                <form>
                    <div class="so-row so-g-3">
                        <div class="so-col-6">
                            <label class="so-form-label">First Name</label>
                            <input type="text" class="so-form-control" placeholder="John">
                        </div>
                        <div class="so-col-6">
                            <label class="so-form-label">Last Name</label>
                            <input type="text" class="so-form-control" placeholder="Doe">
                        </div>
                        <div class="so-col-12">
                            <label class="so-form-label">Email</label>
                            <input type="email" class="so-form-control" placeholder="john@example.com">
                        </div>
                        <div class="so-col-12">
                            <label class="so-form-label">Company (Optional)</label>
                            <input type="text" class="so-form-control" placeholder="Acme Inc.">
                        </div>
                    </div>
                </form>
            </div>
            <div class="so-modal-footer">
                <button class="so-btn so-btn-ghost" id="cancelModal">Cancel</button>
                <button class="so-btn so-btn-primary" id="submitOrder">
                    Start Free Trial
                    <span class="material-icons so-ms-1">arrow_forward</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="so-toast-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;" id="toastContainer">
</div>

<?php
$pageScripts = <<<'SCRIPT'
<script>
    // Billing toggle
    const billingToggle = document.getElementById('billingToggle');
    const proPrice = document.getElementById('proPrice');
    const enterprisePrice = document.getElementById('enterprisePrice');

    billingToggle?.addEventListener('change', function() {
        if (this.checked) {
            proPrice.textContent = '$23';
            enterprisePrice.textContent = '$79';
        } else {
            proPrice.textContent = '$29';
            enterprisePrice.textContent = '$99';
        }
    });

    // Sliders
    const projectsSlider = document.getElementById('projectsSlider');
    const projectsValue = document.getElementById('projectsValue');
    const bandwidthSlider = document.getElementById('bandwidthSlider');
    const bandwidthValue = document.getElementById('bandwidthValue');

    projectsSlider?.addEventListener('input', function() {
        projectsValue.textContent = this.value;
        const percent = (this.value - 1) / 49 * 100;
        this.parentElement.querySelector('.so-slider-range').style.width = percent + '%';
        this.parentElement.querySelector('.so-slider-thumb').style.left = percent + '%';
    });

    bandwidthSlider?.addEventListener('input', function() {
        bandwidthValue.textContent = this.value;
        const percent = (this.value - 100) / 9900 * 100;
        this.parentElement.querySelector('.so-slider-range').style.width = percent + '%';
        this.parentElement.querySelector('.so-slider-thumb').style.left = percent + '%';
    });

    // Modal
    const checkoutBtn = document.getElementById('checkoutBtn');
    const checkoutModal = document.getElementById('checkoutModal');
    const closeModal = document.getElementById('closeModal');
    const cancelModal = document.getElementById('cancelModal');
    const submitOrder = document.getElementById('submitOrder');
    const toastContainer = document.getElementById('toastContainer');

    function openModal() {
        checkoutModal.classList.add('so-show');
        document.body.style.overflow = 'hidden';
    }

    function closeModalFn() {
        checkoutModal.classList.remove('so-show');
        document.body.style.overflow = '';
    }

    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `so-toast so-toast-${type} so-show`;
        toast.innerHTML = `
            <div class="so-toast-header">
                <span class="material-icons so-me-2">${type === 'success' ? 'check_circle' : 'error'}</span>
                <strong class="so-me-auto">${type === 'success' ? 'Success' : 'Error'}</strong>
                <button class="so-toast-close">
                    <span class="material-icons">close</span>
                </button>
            </div>
            <div class="so-toast-body">${message}</div>
        `;
        toastContainer.appendChild(toast);

        toast.querySelector('.so-toast-close').addEventListener('click', () => {
            toast.remove();
        });

        setTimeout(() => toast.remove(), 5000);
    }

    checkoutBtn?.addEventListener('click', openModal);
    closeModal?.addEventListener('click', closeModalFn);
    cancelModal?.addEventListener('click', closeModalFn);
    checkoutModal?.querySelector('.so-modal-backdrop')?.addEventListener('click', closeModalFn);

    submitOrder?.addEventListener('click', function() {
        closeModalFn();
        showToast('Your free trial has been activated!', 'success');
    });

    // API Key toggle
    const apiKey = document.getElementById('apiKey');
    const toggleApiKey = document.getElementById('toggleApiKey');
    const copyApiKey = document.getElementById('copyApiKey');

    toggleApiKey?.addEventListener('click', function() {
        const type = apiKey.type === 'password' ? 'text' : 'password';
        apiKey.type = type;
        this.querySelector('.material-icons').textContent = type === 'password' ? 'visibility' : 'visibility_off';
    });

    copyApiKey?.addEventListener('click', function() {
        navigator.clipboard.writeText(apiKey.value);
        showToast('API key copied to clipboard!', 'success');
    });
</script>
SCRIPT;
require_once 'includes/footer.php';
?>
