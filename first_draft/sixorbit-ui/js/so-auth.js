/**
 * SixOrbit UI - Authentication JavaScript
 * Handles login, forgot password, and feature carousel functionality
 * Version: 1.0.0
 */

/* ============================================
   FEATURE CAROUSEL CLASS
   ============================================ */
class SixOrbitFeatureCarousel {
    constructor(options = {}) {
        this.container = document.getElementById('featureCarousel');
        this.slidesContainer = document.getElementById('featureSlides');
        this.dotsContainer = document.getElementById('featureDots');

        if (!this.container || !this.slidesContainer) return;

        this.features = options.features || [];
        this.interval = options.interval || 5000;
        this.currentIndex = 0;
        this.autoRotateTimer = null;
        this.isPaused = false;

        this.init();
    }

    init() {
        if (this.features.length === 0) return;

        this.renderSlides();
        this.renderDots();
        this.bindEvents();
        this.showSlide(0);
        this.startAutoRotate();
    }

    renderSlides() {
        this.slidesContainer.innerHTML = this.features.map((feature, index) => `
            <div class="so-feature-slide" data-index="${index}">
                <div class="so-feature-slide-content">
                    <div class="so-feature-icon">
                        <span class="material-icons">${feature.icon}</span>
                    </div>
                    <div class="so-feature-title">${feature.title}</div>
                    <div class="so-feature-description">${feature.description}</div>
                </div>
            </div>
        `).join('');

        this.slides = this.slidesContainer.querySelectorAll('.so-feature-slide');
    }

    renderDots() {
        this.dotsContainer.innerHTML = this.features.map((_, index) => `
            <button class="so-feature-dot" data-index="${index}" aria-label="Go to slide ${index + 1}"></button>
        `).join('');

        this.dots = this.dotsContainer.querySelectorAll('.so-feature-dot');
    }

    bindEvents() {
        // Dot click events
        this.dots.forEach(dot => {
            dot.addEventListener('click', (e) => {
                const index = parseInt(e.target.dataset.index);
                this.showSlide(index);
                this.resetAutoRotate();
            });
        });

        // Pause on hover
        this.container.addEventListener('mouseenter', () => {
            this.isPaused = true;
            this.stopAutoRotate();
        });

        this.container.addEventListener('mouseleave', () => {
            this.isPaused = false;
            this.startAutoRotate();
        });
    }

    showSlide(index) {
        this.currentIndex = index;

        // Update slides
        this.slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });

        // Update dots
        this.dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    nextSlide() {
        const nextIndex = (this.currentIndex + 1) % this.features.length;
        this.showSlide(nextIndex);
    }

    startAutoRotate() {
        if (this.isPaused || this.features.length <= 1) return;

        this.stopAutoRotate();
        this.autoRotateTimer = setInterval(() => {
            this.nextSlide();
        }, this.interval);
    }

    stopAutoRotate() {
        if (this.autoRotateTimer) {
            clearInterval(this.autoRotateTimer);
            this.autoRotateTimer = null;
        }
    }

    resetAutoRotate() {
        this.stopAutoRotate();
        if (!this.isPaused) {
            this.startAutoRotate();
        }
    }
}

/* ============================================
   LOGIN CLASS
   ============================================ */
class SixOrbitLogin {
    constructor() {
        this.form = document.getElementById('loginForm');
        if (!this.form) return;

        this.loginIdInput = document.getElementById('loginId');
        this.passwordInput = document.getElementById('password');
        this.toggleBtn = document.getElementById('togglePassword');
        this.loginBtn = document.getElementById('loginBtn');
        this.rememberMe = document.getElementById('rememberMe');
        this.loginType = 'email';

        this.init();
    }

    init() {
        this.bindLoginTypeToggle();
        this.bindPasswordToggle();
        this.bindFormSubmit();
        this.loadRememberedCredentials();
        this.setupCustomerBranding();
    }

    setupCustomerBranding() {
        const config = window.authConfig || {};

        // Set customer name
        const nameEl = document.getElementById('customerName');
        if (nameEl && config.customerName) {
            nameEl.textContent = config.customerName;
        }

        // Set customer logo or initials
        const logoImg = document.getElementById('customerLogoImg');
        const logoPlaceholder = document.getElementById('customerLogoPlaceholder');
        const initialsEl = document.getElementById('customerInitials');

        if (config.customerLogo && logoImg && logoPlaceholder) {
            logoImg.src = config.customerLogo;
            logoImg.style.display = 'block';
            logoPlaceholder.style.display = 'none';

            // Handle image load error
            logoImg.onerror = () => {
                logoImg.style.display = 'none';
                logoPlaceholder.style.display = 'flex';
            };
        } else if (initialsEl && config.customerInitials) {
            initialsEl.textContent = config.customerInitials;
        }
    }

    bindLoginTypeToggle() {
        const toggleBtns = document.querySelectorAll('.so-auth-type-btn');
        const loginIdGroup = document.getElementById('loginIdGroup');
        const loginIdIcon = document.getElementById('loginIdIcon');

        toggleBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Update active state
                toggleBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                this.loginType = btn.dataset.type;

                // Update input field
                if (this.loginType === 'email') {
                    loginIdGroup.querySelector('.so-form-label').textContent = 'Email Address';
                    this.loginIdInput.type = 'email';
                    this.loginIdInput.placeholder = 'Enter your email address';
                    this.loginIdInput.autocomplete = 'email';
                    loginIdIcon.textContent = 'email';
                    document.getElementById('loginIdError').textContent = 'Please enter a valid email address';
                } else {
                    loginIdGroup.querySelector('.so-form-label').textContent = 'Mobile Number';
                    this.loginIdInput.type = 'tel';
                    this.loginIdInput.placeholder = 'Enter your mobile number';
                    this.loginIdInput.autocomplete = 'tel';
                    loginIdIcon.textContent = 'phone';
                    document.getElementById('loginIdError').textContent = 'Please enter a valid 10-digit mobile number';
                }

                // Clear any errors
                this.clearError('loginId');
                this.loginIdInput.value = '';
                this.loginIdInput.focus();
            });
        });
    }

    bindPasswordToggle() {
        if (!this.toggleBtn) return;

        this.toggleBtn.addEventListener('click', () => {
            const isPassword = this.passwordInput.type === 'password';
            this.passwordInput.type = isPassword ? 'text' : 'password';
            this.toggleBtn.querySelector('.material-icons').textContent = isPassword ? 'visibility_off' : 'visibility';
        });
    }

    bindFormSubmit() {
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleSubmit();
        });

        // Clear errors on input
        this.loginIdInput.addEventListener('input', () => this.clearError('loginId'));
        this.passwordInput.addEventListener('input', () => this.clearError('password'));
    }

    handleSubmit() {
        // Clear previous errors
        this.clearError('loginId');
        this.clearError('password');

        const loginId = this.loginIdInput.value.trim();
        const password = this.passwordInput.value;

        // Validate
        let isValid = true;

        if (!loginId) {
            this.showError('loginId', this.loginType === 'email'
                ? 'Email address is required'
                : 'Mobile number is required');
            isValid = false;
        } else if (this.loginType === 'email' && !this.validateEmail(loginId)) {
            this.showError('loginId', 'Please enter a valid email address');
            isValid = false;
        } else if (this.loginType === 'mobile' && !this.validateMobile(loginId)) {
            this.showError('loginId', 'Please enter a valid 10-digit mobile number');
            isValid = false;
        }

        if (!password) {
            this.showError('password', 'Password is required');
            isValid = false;
        } else if (password.length < 6) {
            this.showError('password', 'Password must be at least 6 characters');
            isValid = false;
        }

        if (!isValid) return;

        // Show loading state
        this.setLoading(true);

        // Save credentials if remember me is checked
        if (this.rememberMe.checked) {
            localStorage.setItem('so-auth-remember', JSON.stringify({
                loginId: loginId,
                loginType: this.loginType
            }));
        } else {
            localStorage.removeItem('so-auth-remember');
        }

        // Simulate API call
        setTimeout(() => {
            this.setLoading(false);
            // For demo, redirect to dashboard
            window.location.href = 'index.html';
        }, 1500);
    }

    validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    validateMobile(mobile) {
        const regex = /^[0-9]{10}$/;
        return regex.test(mobile.replace(/[\s-]/g, ''));
    }

    showError(field, message) {
        const group = document.getElementById(`${field}Group`);
        const errorEl = document.getElementById(`${field}Error`);

        if (group) group.classList.add('has-error');
        if (errorEl) errorEl.textContent = message;
    }

    clearError(field) {
        const group = document.getElementById(`${field}Group`);
        if (group) group.classList.remove('has-error');
    }

    setLoading(isLoading) {
        if (isLoading) {
            this.loginBtn.classList.add('loading');
            this.loginBtn.disabled = true;
        } else {
            this.loginBtn.classList.remove('loading');
            this.loginBtn.disabled = false;
        }
    }

    loadRememberedCredentials() {
        try {
            const saved = localStorage.getItem('so-auth-remember');
            if (saved) {
                const data = JSON.parse(saved);
                this.loginIdInput.value = data.loginId || '';
                this.rememberMe.checked = true;

                // Switch to correct login type
                if (data.loginType === 'mobile') {
                    const mobileBtn = document.querySelector('.so-auth-type-btn[data-type="mobile"]');
                    if (mobileBtn) mobileBtn.click();
                }
            }
        } catch (e) {
            // Ignore errors
        }
    }
}

/* ============================================
   FORGOT PASSWORD CLASS
   ============================================ */
class SixOrbitForgotPassword {
    constructor() {
        this.container = document.querySelector('.so-auth-body');
        if (!this.container) return;

        this.currentStep = 1;
        this.recoveryType = 'email';
        this.recoveryValue = '';
        this.resendTimer = null;
        this.resendSeconds = 30;

        this.init();
    }

    init() {
        this.bindStepNavigation();
        this.bindRecoveryTypeToggle();
        this.bindOtpInputs();
        this.bindPasswordToggles();
        this.bindFormSubmits();
        this.bindPasswordStrength();
    }

    bindStepNavigation() {
        // Back buttons
        document.querySelectorAll('.so-auth-back').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const targetStep = parseInt(btn.dataset.step);
                if (targetStep) {
                    this.showStep(targetStep);
                } else if (btn.href && btn.href.includes('login')) {
                    window.location.href = btn.href;
                }
            });
        });
    }

    bindRecoveryTypeToggle() {
        const toggleBtns = document.querySelectorAll('.so-auth-type-btn');
        const recoveryIdGroup = document.getElementById('recoveryIdGroup');
        const recoveryIdIcon = document.getElementById('recoveryIdIcon');
        const recoveryIdInput = document.getElementById('recoveryId');

        if (!toggleBtns.length || !recoveryIdInput) return;

        toggleBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                toggleBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                this.recoveryType = btn.dataset.type;

                if (this.recoveryType === 'email') {
                    recoveryIdGroup.querySelector('.so-form-label').textContent = 'Email Address';
                    recoveryIdInput.type = 'email';
                    recoveryIdInput.placeholder = 'Enter your email address';
                    recoveryIdIcon.textContent = 'email';
                } else {
                    recoveryIdGroup.querySelector('.so-form-label').textContent = 'Mobile Number';
                    recoveryIdInput.type = 'tel';
                    recoveryIdInput.placeholder = 'Enter your mobile number';
                    recoveryIdIcon.textContent = 'phone';
                }

                this.clearError('recoveryId');
                recoveryIdInput.value = '';
                recoveryIdInput.focus();
            });
        });
    }

    bindOtpInputs() {
        const otpInputs = document.querySelectorAll('.so-otp-input');
        if (!otpInputs.length) return;

        otpInputs.forEach((input, index) => {
            // Handle input
            input.addEventListener('input', (e) => {
                const value = e.target.value;

                // Only allow digits
                e.target.value = value.replace(/[^0-9]/g, '').slice(0, 1);

                // Mark as filled
                if (e.target.value) {
                    e.target.classList.add('filled');
                    // Move to next input
                    if (index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                } else {
                    e.target.classList.remove('filled');
                }
            });

            // Handle backspace
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) {
                    otpInputs[index - 1].focus();
                    otpInputs[index - 1].value = '';
                    otpInputs[index - 1].classList.remove('filled');
                }
            });

            // Handle paste
            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const pastedData = (e.clipboardData || window.clipboardData).getData('text');
                const digits = pastedData.replace(/[^0-9]/g, '').split('');

                digits.forEach((digit, i) => {
                    if (otpInputs[index + i]) {
                        otpInputs[index + i].value = digit;
                        otpInputs[index + i].classList.add('filled');
                    }
                });

                // Focus on next empty or last input
                const nextEmpty = Array.from(otpInputs).findIndex(inp => !inp.value);
                if (nextEmpty !== -1) {
                    otpInputs[nextEmpty].focus();
                } else {
                    otpInputs[otpInputs.length - 1].focus();
                }
            });
        });
    }

    bindPasswordToggles() {
        document.querySelectorAll('.so-password-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const wrapper = btn.closest('.so-auth-input-wrapper');
                const input = wrapper.querySelector('input');
                const isPassword = input.type === 'password';

                input.type = isPassword ? 'text' : 'password';
                btn.querySelector('.material-icons').textContent = isPassword ? 'visibility_off' : 'visibility';
            });
        });
    }

    bindFormSubmits() {
        // Step 1: Send OTP
        const sendOtpForm = document.getElementById('sendOtpForm');
        if (sendOtpForm) {
            sendOtpForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleSendOTP();
            });
        }

        // Step 2: Verify OTP
        const verifyOtpForm = document.getElementById('verifyOtpForm');
        if (verifyOtpForm) {
            verifyOtpForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleVerifyOTP();
            });
        }

        // Step 3: Reset Password
        const resetPasswordForm = document.getElementById('resetPasswordForm');
        if (resetPasswordForm) {
            resetPasswordForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleResetPassword();
            });
        }

        // Resend OTP button
        const resendBtn = document.getElementById('resendOtpBtn');
        if (resendBtn) {
            resendBtn.addEventListener('click', () => {
                if (!resendBtn.disabled) {
                    this.handleResendOTP();
                }
            });
        }
    }

    bindPasswordStrength() {
        const newPasswordInput = document.getElementById('newPassword');
        if (!newPasswordInput) return;

        newPasswordInput.addEventListener('input', () => {
            this.updatePasswordStrength(newPasswordInput.value);
        });
    }

    showStep(stepNumber) {
        document.querySelectorAll('.so-auth-step').forEach(step => {
            step.classList.remove('active');
        });

        const targetStep = document.querySelector(`.so-auth-step[data-step="${stepNumber}"]`);
        if (targetStep) {
            targetStep.classList.add('active');
        }

        // Update step dots
        document.querySelectorAll('.so-auth-step-dot').forEach((dot, index) => {
            dot.classList.remove('active', 'completed');
            if (index + 1 < stepNumber) {
                dot.classList.add('completed');
            } else if (index + 1 === stepNumber) {
                dot.classList.add('active');
            }
        });

        this.currentStep = stepNumber;

        // Focus first input in new step
        const firstInput = targetStep?.querySelector('input');
        if (firstInput) {
            setTimeout(() => firstInput.focus(), 100);
        }
    }

    handleSendOTP() {
        const recoveryIdInput = document.getElementById('recoveryId');
        const recoveryId = recoveryIdInput?.value.trim();

        this.clearError('recoveryId');

        // Validate
        if (!recoveryId) {
            this.showError('recoveryId', this.recoveryType === 'email'
                ? 'Email address is required'
                : 'Mobile number is required');
            return;
        }

        if (this.recoveryType === 'email' && !this.validateEmail(recoveryId)) {
            this.showError('recoveryId', 'Please enter a valid email address');
            return;
        }

        if (this.recoveryType === 'mobile' && !this.validateMobile(recoveryId)) {
            this.showError('recoveryId', 'Please enter a valid 10-digit mobile number');
            return;
        }

        this.recoveryValue = recoveryId;

        // Show loading
        const btn = document.getElementById('sendOtpBtn');
        btn?.classList.add('loading');

        // Simulate API call
        setTimeout(() => {
            btn?.classList.remove('loading');

            // Update step 2 text to show where OTP was sent
            const otpSentText = document.getElementById('otpSentText');
            if (otpSentText) {
                otpSentText.textContent = this.recoveryType === 'email'
                    ? `We sent a verification code to ${this.maskEmail(recoveryId)}`
                    : `We sent a verification code to ${this.maskMobile(recoveryId)}`;
            }

            this.showStep(2);
            this.startResendTimer();
        }, 1500);
    }

    handleVerifyOTP() {
        const otpInputs = document.querySelectorAll('.so-otp-input');
        const otp = Array.from(otpInputs).map(input => input.value).join('');

        // Clear error styling
        otpInputs.forEach(input => input.classList.remove('error'));

        // For demo: accept any 6-digit OTP
        if (otp.length !== 6) {
            otpInputs.forEach(input => {
                if (!input.value) input.classList.add('error');
            });
            return;
        }

        // Show loading
        const btn = document.getElementById('verifyOtpBtn');
        btn?.classList.add('loading');

        // Simulate verification
        setTimeout(() => {
            btn?.classList.remove('loading');
            this.stopResendTimer();
            this.showStep(3);
        }, 1000);
    }

    handleResetPassword() {
        const newPasswordInput = document.getElementById('newPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');

        const newPassword = newPasswordInput?.value;
        const confirmPassword = confirmPasswordInput?.value;

        this.clearError('newPassword');
        this.clearError('confirmPassword');

        // Validate
        let isValid = true;

        if (!newPassword || newPassword.length < 8) {
            this.showError('newPassword', 'Password must be at least 8 characters');
            isValid = false;
        } else if (!/[A-Z]/.test(newPassword)) {
            this.showError('newPassword', 'Password must contain at least one uppercase letter');
            isValid = false;
        } else if (!/[0-9]/.test(newPassword)) {
            this.showError('newPassword', 'Password must contain at least one number');
            isValid = false;
        }

        if (!confirmPassword) {
            this.showError('confirmPassword', 'Please confirm your password');
            isValid = false;
        } else if (newPassword !== confirmPassword) {
            this.showError('confirmPassword', 'Passwords do not match');
            isValid = false;
        }

        if (!isValid) return;

        // Show loading
        const btn = document.getElementById('resetPasswordBtn');
        btn?.classList.add('loading');

        // Simulate password reset
        setTimeout(() => {
            btn?.classList.remove('loading');
            this.showStep(4);
        }, 1500);
    }

    handleResendOTP() {
        const btn = document.getElementById('resendOtpBtn');
        if (!btn) return;

        btn.disabled = true;
        btn.textContent = 'Sending...';

        // Simulate resend
        setTimeout(() => {
            this.startResendTimer();
        }, 1000);
    }

    startResendTimer() {
        this.resendSeconds = 30;
        const btn = document.getElementById('resendOtpBtn');

        if (!btn) return;

        btn.disabled = true;

        const updateTimer = () => {
            btn.textContent = `Resend in ${this.resendSeconds}s`;
        };

        updateTimer();

        this.resendTimer = setInterval(() => {
            this.resendSeconds--;

            if (this.resendSeconds <= 0) {
                this.stopResendTimer();
                btn.disabled = false;
                btn.textContent = 'Resend Code';
            } else {
                updateTimer();
            }
        }, 1000);
    }

    stopResendTimer() {
        if (this.resendTimer) {
            clearInterval(this.resendTimer);
            this.resendTimer = null;
        }
    }

    updatePasswordStrength(password) {
        const requirements = document.querySelectorAll('.so-password-requirements li');

        requirements.forEach(req => {
            const type = req.dataset.requirement;
            let isValid = false;

            switch (type) {
                case 'length':
                    isValid = password.length >= 8;
                    break;
                case 'uppercase':
                    isValid = /[A-Z]/.test(password);
                    break;
                case 'number':
                    isValid = /[0-9]/.test(password);
                    break;
                case 'special':
                    isValid = /[!@#$%^&*(),.?":{}|<>]/.test(password);
                    break;
            }

            req.classList.toggle('valid', isValid);
        });
    }

    validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    validateMobile(mobile) {
        return /^[0-9]{10}$/.test(mobile.replace(/[\s-]/g, ''));
    }

    maskEmail(email) {
        const [local, domain] = email.split('@');
        const maskedLocal = local.charAt(0) + '*'.repeat(Math.min(local.length - 2, 4)) + local.charAt(local.length - 1);
        return `${maskedLocal}@${domain}`;
    }

    maskMobile(mobile) {
        const cleaned = mobile.replace(/[\s-]/g, '');
        return cleaned.slice(0, 2) + '*'.repeat(6) + cleaned.slice(-2);
    }

    showError(field, message) {
        const group = document.getElementById(`${field}Group`);
        const errorEl = document.getElementById(`${field}Error`);

        if (group) group.classList.add('has-error');
        if (errorEl) errorEl.textContent = message;
    }

    clearError(field) {
        const group = document.getElementById(`${field}Group`);
        if (group) group.classList.remove('has-error');
    }
}

/* ============================================
   INITIALIZE ON DOM READY
   ============================================ */
document.addEventListener('DOMContentLoaded', () => {
    const config = window.authConfig || {};

    // Initialize feature carousel if on login page
    if (document.getElementById('featureCarousel')) {
        new SixOrbitFeatureCarousel({
            features: config.features || [],
            interval: config.carouselInterval || 5000
        });
    }

    // Initialize login if form exists
    if (document.getElementById('loginForm')) {
        new SixOrbitLogin();
    }

    // Initialize forgot password if steps exist
    if (document.querySelector('.so-auth-step')) {
        new SixOrbitForgotPassword();
    }
});
