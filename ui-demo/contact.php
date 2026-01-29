<?php
$pageTitle = 'Contact';
$pageDescription = 'Contact CloudStack - Get in touch with our team';
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
            <span class="so-breadcrumb-item so-active">Contact</span>
        </nav>
    </div>
</section>

<!-- Hero -->
<section class="so-py-5 so-bg-white">
    <div class="so-container">
        <div class="so-text-center">
            <span class="so-badge so-badge-soft-primary so-mb-2">Contact</span>
            <h1 class="so-fs-3xl so-fw-bold so-mb-2">Get in touch</h1>
            <p class="so-text-muted so-fs-lg so-mb-0">
                We'd love to hear from you. Choose how you'd like to reach us.
            </p>
        </div>
    </div>
</section>

<!-- Contact Methods -->
<section class="so-py-4">
    <div class="so-container">
        <div class="so-row so-g-4">
            <div class="so-col-12 so-col-md-4">
                <div class="so-card so-card-bordered so-text-center so-h-100">
                    <div class="so-card-body">
                        <div class="so-avatar so-avatar-lg so-bg-primary-100 so-text-primary so-mx-auto so-mb-3">
                            <span class="material-icons">email</span>
                        </div>
                        <h5 class="so-fw-semibold">Email Us</h5>
                        <p class="so-text-muted so-fs-sm so-mb-3">support@cloudstack.io</p>
                        <a href="mailto:support@cloudstack.io" class="so-btn so-btn-outline so-btn-sm">
                            Send Email
                        </a>
                    </div>
                </div>
            </div>
            <div class="so-col-12 so-col-md-4">
                <div class="so-card so-card-bordered so-text-center so-h-100">
                    <div class="so-card-body">
                        <div class="so-avatar so-avatar-lg so-bg-success-100 so-text-success so-mx-auto so-mb-3">
                            <span class="material-icons">chat</span>
                        </div>
                        <h5 class="so-fw-semibold">Live Chat</h5>
                        <p class="so-text-muted so-fs-sm so-mb-3">Available 24/7</p>
                        <button class="so-btn so-btn-success so-btn-sm" id="openChatBtn">
                            Start Chat
                        </button>
                    </div>
                </div>
            </div>
            <div class="so-col-12 so-col-md-4">
                <div class="so-card so-card-bordered so-text-center so-h-100">
                    <div class="so-card-body">
                        <div class="so-avatar so-avatar-lg so-bg-warning-100 so-text-warning so-mx-auto so-mb-3">
                            <span class="material-icons">phone</span>
                        </div>
                        <h5 class="so-fw-semibold">Call Us</h5>
                        <p class="so-text-muted so-fs-sm so-mb-3">+1 (555) 123-4567</p>
                        <a href="tel:+15551234567" class="so-btn so-btn-outline so-btn-sm">
                            Call Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Alerts Demo -->
<section class="so-py-4 so-bg-white">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-info">notifications</span>
                    Alert Messages
                </h5>
            </div>
            <div class="so-card-body">
                <div class="so-alert so-alert-success so-alert-dismissible so-mb-3">
                    <span class="material-icons so-alert-icon">check_circle</span>
                    <div class="so-alert-content">
                        <strong>Success!</strong> Your message has been sent successfully.
                    </div>
                    <button class="so-alert-close">
                        <span class="material-icons">close</span>
                    </button>
                </div>

                <div class="so-alert so-alert-warning so-alert-dismissible so-mb-3">
                    <span class="material-icons so-alert-icon">warning</span>
                    <div class="so-alert-content">
                        <strong>Warning!</strong> Please verify your email address.
                    </div>
                    <button class="so-alert-close">
                        <span class="material-icons">close</span>
                    </button>
                </div>

                <div class="so-alert so-alert-danger so-alert-dismissible so-mb-3">
                    <span class="material-icons so-alert-icon">error</span>
                    <div class="so-alert-content">
                        <strong>Error!</strong> Something went wrong. Please try again.
                    </div>
                    <button class="so-alert-close">
                        <span class="material-icons">close</span>
                    </button>
                </div>

                <div class="so-alert so-alert-info so-mb-0">
                    <span class="material-icons so-alert-icon">info</span>
                    <div class="so-alert-content">
                        <strong>Note:</strong> Our support team typically responds within 24 hours.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Contact Form -->
<section class="so-py-4">
    <div class="so-container">
        <div class="so-row so-g-4">
            <!-- Contact Form -->
            <div class="so-col-12 so-col-lg-8">
                <div class="so-card">
                    <div class="so-card-header">
                        <h5 class="so-mb-0">
                            <span class="material-icons so-me-2 so-text-primary">edit_note</span>
                            Send us a message
                        </h5>
                    </div>
                    <div class="so-card-body">
                        <form id="contactForm" novalidate>
                            <!-- Standard Inputs -->
                            <div class="so-row so-g-3 so-mb-4">
                                <div class="so-col-12 so-col-md-6">
                                    <label class="so-form-label">First Name <span class="so-text-danger">*</span></label>
                                    <input type="text" class="so-form-control" placeholder="John" required>
                                    <div class="so-invalid-feedback">Please enter your first name.</div>
                                </div>
                                <div class="so-col-12 so-col-md-6">
                                    <label class="so-form-label">Last Name <span class="so-text-danger">*</span></label>
                                    <input type="text" class="so-form-control" placeholder="Doe" required>
                                    <div class="so-invalid-feedback">Please enter your last name.</div>
                                </div>
                                <div class="so-col-12 so-col-md-6">
                                    <label class="so-form-label">Email <span class="so-text-danger">*</span></label>
                                    <input type="email" class="so-form-control" placeholder="john@example.com" required>
                                    <div class="so-invalid-feedback">Please enter a valid email.</div>
                                </div>
                                <div class="so-col-12 so-col-md-6">
                                    <label class="so-form-label">Phone</label>
                                    <input type="tel" class="so-form-control" placeholder="+1 (555) 123-4567">
                                </div>
                            </div>

                            <!-- Floating Labels -->
                            <h6 class="so-fw-semibold so-mb-3">Floating Labels Demo</h6>
                            <div class="so-row so-g-3 so-mb-4">
                                <div class="so-col-12 so-col-md-6">
                                    <div class="so-form-floating">
                                        <input type="text" class="so-form-control" id="floatCompany" placeholder="Company">
                                        <label for="floatCompany">Company Name</label>
                                    </div>
                                </div>
                                <div class="so-col-12 so-col-md-6">
                                    <div class="so-form-group">
                                        <label class="so-form-label" for="floatSubject">Subject</label>
                                        <select class="so-form-control" id="floatSubject" data-so-select>
                                            <option value="">Select...</option>
                                            <option value="sales">Sales Inquiry</option>
                                            <option value="support">Technical Support</option>
                                            <option value="billing">Billing Question</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="so-mb-4">
                                <label class="so-form-label">Message <span class="so-text-danger">*</span></label>
                                <textarea class="so-form-control" rows="5" placeholder="How can we help you?" required></textarea>
                                <div class="so-invalid-feedback">Please enter your message.</div>
                                <div class="so-form-text">Minimum 20 characters</div>
                            </div>

                            <!-- Checkboxes and Radios -->
                            <h6 class="so-fw-semibold so-mb-3">Contact Preferences</h6>
                            <div class="so-row so-g-3 so-mb-4">
                                <div class="so-col-12 so-col-md-6">
                                    <p class="so-fs-sm so-text-muted so-mb-2">Preferred contact method:</p>
                                    <div class="so-d-flex so-flex-column so-gap-2">
                                        <label class="so-radio">
                                            <input type="radio" name="contactMethod" value="email" checked>
                                            <span class="so-radio-mark"></span>
                                            <span class="so-ms-2">Email</span>
                                        </label>
                                        <label class="so-radio">
                                            <input type="radio" name="contactMethod" value="phone">
                                            <span class="so-radio-mark"></span>
                                            <span class="so-ms-2">Phone</span>
                                        </label>
                                        <label class="so-radio">
                                            <input type="radio" name="contactMethod" value="chat">
                                            <span class="so-radio-mark"></span>
                                            <span class="so-ms-2">Live Chat</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="so-col-12 so-col-md-6">
                                    <p class="so-fs-sm so-text-muted so-mb-2">Interests:</p>
                                    <div class="so-d-flex so-flex-column so-gap-2">
                                        <label class="so-checkbox">
                                            <input type="checkbox" name="interests" value="product">
                                            <span class="so-checkbox-mark"></span>
                                            <span class="so-ms-2">Product Demo</span>
                                        </label>
                                        <label class="so-checkbox">
                                            <input type="checkbox" name="interests" value="pricing">
                                            <span class="so-checkbox-mark"></span>
                                            <span class="so-ms-2">Pricing Information</span>
                                        </label>
                                        <label class="so-checkbox">
                                            <input type="checkbox" name="interests" value="enterprise">
                                            <span class="so-checkbox-mark"></span>
                                            <span class="so-ms-2">Enterprise Solutions</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- File Upload (Dropzone style) -->
                            <h6 class="so-fw-semibold so-mb-3">Attachments</h6>
                            <div class="so-dropzone so-mb-4" id="dropzone">
                                <div class="so-dropzone-content so-text-center so-py-4">
                                    <span class="material-icons so-fs-3xl so-text-muted so-mb-2">cloud_upload</span>
                                    <p class="so-mb-1">Drag and drop files here, or click to browse</p>
                                    <p class="so-text-muted so-fs-sm so-mb-0">Max file size: 10MB</p>
                                </div>
                                <input type="file" class="so-dropzone-input" multiple accept=".pdf,.doc,.docx,.png,.jpg">
                            </div>

                            <!-- Color Picker Demo -->
                            <div class="so-row so-g-3 so-mb-4">
                                <div class="so-col-12 so-col-md-6">
                                    <label class="so-form-label">Favorite Color (Demo)</label>
                                    <input type="color" class="so-form-control so-form-control-color" value="#6366f1">
                                </div>
                                <div class="so-col-12 so-col-md-6">
                                    <label class="so-form-label">Priority Level</label>
                                    <select class="so-form-control" data-so-select>
                                        <option value="low">Low</option>
                                        <option value="medium" selected>Medium</option>
                                        <option value="high">High</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Terms Checkbox -->
                            <div class="so-mb-4">
                                <label class="so-checkbox">
                                    <input type="checkbox" required>
                                    <span class="so-checkbox-mark"></span>
                                    <span class="so-ms-2">
                                        I agree to the <a href="#" class="so-text-primary">Terms of Service</a>
                                        and <a href="#" class="so-text-primary">Privacy Policy</a>
                                    </span>
                                </label>
                            </div>

                            <!-- Submit -->
                            <div class="so-d-flex so-gap-2">
                                <button type="submit" class="so-btn so-btn-primary so-btn-lg">
                                    <span class="material-icons so-me-1">send</span>
                                    Send Message
                                </button>
                                <button type="reset" class="so-btn so-btn-outline so-btn-lg">
                                    Clear Form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="so-col-12 so-col-lg-4">
                <!-- OTP Verification Demo -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h6 class="so-mb-0">
                            <span class="material-icons so-me-2 so-text-success">verified</span>
                            OTP Verification Demo
                        </h6>
                    </div>
                    <div class="so-card-body">
                        <p class="so-text-muted so-fs-sm so-mb-3">Enter the 6-digit code sent to your phone:</p>
                        <div class="so-otp-input so-d-flex so-gap-2 so-justify-content-center so-mb-3" id="otpContainer">
                            <input type="text" maxlength="1" class="so-form-control so-text-center so-fw-bold" style="width: 45px; height: 45px;">
                            <input type="text" maxlength="1" class="so-form-control so-text-center so-fw-bold" style="width: 45px; height: 45px;">
                            <input type="text" maxlength="1" class="so-form-control so-text-center so-fw-bold" style="width: 45px; height: 45px;">
                            <input type="text" maxlength="1" class="so-form-control so-text-center so-fw-bold" style="width: 45px; height: 45px;">
                            <input type="text" maxlength="1" class="so-form-control so-text-center so-fw-bold" style="width: 45px; height: 45px;">
                            <input type="text" maxlength="1" class="so-form-control so-text-center so-fw-bold" style="width: 45px; height: 45px;">
                        </div>
                        <button class="so-btn so-btn-success so-btn-block" id="verifyOtp">
                            Verify Code
                        </button>
                        <p class="so-text-muted so-fs-sm so-text-center so-mt-2 so-mb-0">
                            Didn't receive? <a href="#" class="so-text-primary">Resend</a>
                        </p>
                    </div>
                </div>

                <!-- Collapsible FAQ -->
                <div class="so-card so-mb-4">
                    <div class="so-card-header">
                        <h6 class="so-mb-0">
                            <span class="material-icons so-me-2 so-text-warning">help</span>
                            Quick FAQ
                        </h6>
                    </div>
                    <div class="so-card-body so-p-0">
                        <div class="so-collapse-group">
                            <div class="so-collapse-item">
                                <button class="so-collapse-header so-p-3" data-so-toggle="collapse" data-so-target="#faq1">
                                    <span>How quickly do you respond?</span>
                                    <span class="material-icons so-collapse-icon">expand_more</span>
                                </button>
                                <div class="so-collapse-body so-p-3 so-pt-0" id="faq1">
                                    <p class="so-text-muted so-mb-0">
                                        We typically respond within 24 hours for standard inquiries
                                        and within 1 hour for enterprise customers.
                                    </p>
                                </div>
                            </div>
                            <div class="so-collapse-item">
                                <button class="so-collapse-header so-p-3" data-so-toggle="collapse" data-so-target="#faq2">
                                    <span>Do you offer phone support?</span>
                                    <span class="material-icons so-collapse-icon">expand_more</span>
                                </button>
                                <div class="so-collapse-body so-p-3 so-pt-0" id="faq2">
                                    <p class="so-text-muted so-mb-0">
                                        Yes! Phone support is available for Pro and Enterprise plans.
                                    </p>
                                </div>
                            </div>
                            <div class="so-collapse-item">
                                <button class="so-collapse-header so-p-3" data-so-toggle="collapse" data-so-target="#faq3">
                                    <span>Can I schedule a demo?</span>
                                    <span class="material-icons so-collapse-icon">expand_more</span>
                                </button>
                                <div class="so-collapse-body so-p-3 so-pt-0" id="faq3">
                                    <p class="so-text-muted so-mb-0">
                                        Absolutely! Fill out the form and select "Product Demo" as your interest.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Office Location -->
                <div class="so-card">
                    <div class="so-card-header">
                        <h6 class="so-mb-0">
                            <span class="material-icons so-me-2 so-text-info">location_on</span>
                            Office Location
                        </h6>
                    </div>
                    <div class="so-card-body">
                        <div class="so-bg-light so-rounded so-p-4 so-text-center so-mb-3" style="min-height: 120px;">
                            <span class="material-icons so-fs-3xl so-text-muted">map</span>
                            <p class="so-text-muted so-fs-sm so-mb-0 so-mt-2">Map placeholder</p>
                        </div>
                        <address class="so-mb-0" style="font-style: normal;">
                            <strong>CloudStack HQ</strong><br>
                            123 Tech Avenue, Suite 500<br>
                            San Francisco, CA 94107<br>
                            United States
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Form Validation States Demo -->
<section class="so-py-4 so-bg-white">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-success">verified</span>
                    Validation States Demo
                </h5>
            </div>
            <div class="so-card-body">
                <div class="so-row so-g-4">
                    <div class="so-col-12 so-col-md-4">
                        <label class="so-form-label">Valid Input</label>
                        <input type="text" class="so-form-control is-valid" value="john@example.com">
                        <div class="so-valid-feedback">Looks good!</div>
                    </div>
                    <div class="so-col-12 so-col-md-4">
                        <label class="so-form-label">Invalid Input</label>
                        <input type="text" class="so-form-control is-invalid" value="invalid-email">
                        <div class="so-invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="so-col-12 so-col-md-4">
                        <label class="so-form-label">With Helper Text</label>
                        <input type="password" class="so-form-control" placeholder="Password">
                        <div class="so-form-text">Must be at least 8 characters.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Context Menu Demo -->
<section class="so-py-4">
    <div class="so-container">
        <div class="so-card">
            <div class="so-card-header">
                <h5 class="so-mb-0">
                    <span class="material-icons so-me-2 so-text-secondary">mouse</span>
                    Context Menu Demo
                </h5>
            </div>
            <div class="so-card-body">
                <div class="so-bg-light so-rounded so-p-5 so-text-center" id="contextArea" style="min-height: 150px;">
                    <span class="material-icons so-fs-3xl so-text-muted so-mb-2">ads_click</span>
                    <p class="so-text-muted so-mb-0">Right-click anywhere in this area to see the context menu</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Context Menu -->
<div class="so-context-menu so-d-none" id="contextMenu">
    <button class="so-context-menu-item">
        <span class="material-icons">content_copy</span>
        Copy
    </button>
    <button class="so-context-menu-item">
        <span class="material-icons">content_cut</span>
        Cut
    </button>
    <button class="so-context-menu-item">
        <span class="material-icons">content_paste</span>
        Paste
    </button>
    <div class="so-context-menu-divider"></div>
    <button class="so-context-menu-item">
        <span class="material-icons">refresh</span>
        Refresh
    </button>
    <button class="so-context-menu-item so-text-danger">
        <span class="material-icons">delete</span>
        Delete
    </button>
</div>

<!-- Confirmation Modal -->
<div class="so-modal so-modal-centered" id="confirmModal">
    <div class="so-modal-backdrop"></div>
    <div class="so-modal-dialog so-modal-sm">
        <div class="so-modal-content">
            <div class="so-modal-body so-text-center so-py-4">
                <div class="so-avatar so-avatar-xl so-bg-success-100 so-text-success so-mx-auto so-mb-3">
                    <span class="material-icons" style="font-size: 32px;">check_circle</span>
                </div>
                <h5 class="so-fw-semibold so-mb-2">Message Sent!</h5>
                <p class="so-text-muted so-mb-0">
                    We've received your message and will get back to you shortly.
                </p>
            </div>
            <div class="so-modal-footer so-justify-content-center">
                <button class="so-btn so-btn-primary" id="closeConfirmModal">
                    Got it!
                </button>
            </div>
        </div>
    </div>
</div>

<?php
$pageScripts = <<<'SCRIPT'
<script>
    // Alert dismissal
    document.querySelectorAll('.so-alert-close').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.so-alert').remove();
        });
    });

    // Dropzone
    const dropzone = document.getElementById('dropzone');
    const dropzoneInput = dropzone?.querySelector('.so-dropzone-input');

    dropzone?.addEventListener('click', () => dropzoneInput?.click());
    dropzone?.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('so-dropzone-active');
    });
    dropzone?.addEventListener('dragleave', () => {
        dropzone.classList.remove('so-dropzone-active');
    });
    dropzone?.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('so-dropzone-active');
        // Handle files here
    });

    // OTP Input handling
    const otpInputs = document.querySelectorAll('#otpContainer input');
    otpInputs.forEach((input, index) => {
        input.addEventListener('input', function() {
            if (this.value.length === 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
        });
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !this.value && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
    });

    document.getElementById('verifyOtp')?.addEventListener('click', function() {
        const code = Array.from(otpInputs).map(i => i.value).join('');
        if (code.length === 6) {
            alert('Code verified: ' + code);
        }
    });

    // Collapse toggles
    document.querySelectorAll('[data-so-toggle="collapse"]').forEach(btn => {
        btn.addEventListener('click', function() {
            const target = document.querySelector(this.getAttribute('data-so-target'));
            if (target) {
                target.classList.toggle('so-show');
                this.querySelector('.so-collapse-icon')?.classList.toggle('so-rotate-180');
            }
        });
    });

    // Context menu
    const contextArea = document.getElementById('contextArea');
    const contextMenu = document.getElementById('contextMenu');

    contextArea?.addEventListener('contextmenu', function(e) {
        e.preventDefault();
        contextMenu.classList.remove('so-d-none');
        contextMenu.style.position = 'fixed';
        contextMenu.style.left = e.clientX + 'px';
        contextMenu.style.top = e.clientY + 'px';
        contextMenu.style.zIndex = '9999';
    });

    document.addEventListener('click', () => {
        contextMenu?.classList.add('so-d-none');
    });

    contextMenu?.querySelectorAll('.so-context-menu-item').forEach(item => {
        item.addEventListener('click', function() {
            alert('Action: ' + this.textContent.trim());
            contextMenu.classList.add('so-d-none');
        });
    });

    // Form validation
    const contactForm = document.getElementById('contactForm');
    const confirmModal = document.getElementById('confirmModal');

    contactForm?.addEventListener('submit', function(e) {
        e.preventDefault();
        this.classList.add('so-was-validated');

        if (this.checkValidity()) {
            confirmModal.classList.add('so-show');
            document.body.style.overflow = 'hidden';
        }
    });

    document.getElementById('closeConfirmModal')?.addEventListener('click', function() {
        confirmModal.classList.remove('so-show');
        document.body.style.overflow = '';
        contactForm.reset();
        contactForm.classList.remove('so-was-validated');
    });

    confirmModal?.querySelector('.so-modal-backdrop')?.addEventListener('click', function() {
        confirmModal.classList.remove('so-show');
        document.body.style.overflow = '';
    });

    // Chat button alert
    document.getElementById('openChatBtn')?.addEventListener('click', function() {
        alert('Live chat would open here!');
    });
</script>
SCRIPT;
require_once 'includes/footer.php';
?>
