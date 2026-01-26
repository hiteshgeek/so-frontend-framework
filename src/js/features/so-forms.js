// ============================================
// SIXORBIT UI - FORMS FEATURE
// Form utilities, validation, and enhancements
// ============================================

import SixOrbit from '../core/so-config.js';
import { SODropdown } from '../components/so-dropdown.js';
import { SOOtpInput } from '../components/so-otp.js';

/**
 * SOForms - Form utilities and validation
 * Provides form field enhancements and validation helpers
 */
class SOForms {
  /**
   * Initialize all form components on the page
   */
  static initAll() {
    // Initialize standard dropdowns
    document.querySelectorAll('.so-dropdown').forEach(el => {
      SODropdown.getInstance(el);
    });

    // Initialize searchable dropdowns
    document.querySelectorAll('.so-searchable-dropdown').forEach(el => {
      SODropdown.getInstance(el);
    });

    // Initialize options dropdowns
    document.querySelectorAll('.so-options-dropdown').forEach(el => {
      SODropdown.getInstance(el);
    });

    // Initialize outlet dropdowns
    document.querySelectorAll('.so-outlet-dropdown').forEach(el => {
      SODropdown.getInstance(el);
    });

    // Initialize OTP inputs
    document.querySelectorAll('.so-otp-group').forEach(el => {
      SOOtpInput.getInstance(el);
    });

    // Initialize checkboxes styling
    SOForms._initCheckboxes();

    // Initialize input enhancements
    SOForms._initInputEnhancements();
  }

  /**
   * Initialize custom checkbox styling
   * @private
   */
  static _initCheckboxes() {
    // Style native checkboxes that aren't already wrapped
    document.querySelectorAll('input[type="checkbox"]:not(.so-checkbox input)').forEach(checkbox => {
      if (checkbox.closest('.so-checkbox, .so-toggle')) return;

      const wrapper = document.createElement('label');
      wrapper.className = 'so-checkbox';

      const box = document.createElement('span');
      box.className = 'so-checkbox-box';
      box.innerHTML = '<span class="material-icons">check</span>';

      checkbox.parentNode.insertBefore(wrapper, checkbox);
      wrapper.appendChild(checkbox);
      wrapper.appendChild(box);
    });
  }

  /**
   * Initialize input enhancements
   * @private
   */
  static _initInputEnhancements() {
    // Password toggle
    document.querySelectorAll('.so-password-toggle').forEach(btn => {
      btn.addEventListener('click', () => {
        const wrapper = btn.closest('.so-form-input-wrapper, .so-auth-input-wrapper');
        const input = wrapper?.querySelector('input');
        if (!input) return;

        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        btn.querySelector('.material-icons').textContent = isPassword ? 'visibility_off' : 'visibility';
      });
    });

    // Input clear buttons
    document.querySelectorAll('.so-input-clear').forEach(btn => {
      btn.addEventListener('click', () => {
        const wrapper = btn.closest('.so-form-input-wrapper');
        const input = wrapper?.querySelector('input');
        if (input) {
          input.value = '';
          input.focus();
          input.dispatchEvent(new Event('input', { bubbles: true }));
        }
      });
    });

    // Floating labels
    document.querySelectorAll('.so-form-floating input, .so-form-floating textarea').forEach(input => {
      const updateState = () => {
        const hasValue = input.value.trim() !== '';
        input.classList.toggle('has-value', hasValue);
      };

      input.addEventListener('input', updateState);
      input.addEventListener('change', updateState);
      updateState();
    });
  }

  // ============================================
  // VALIDATION
  // ============================================

  /**
   * Validate an email address
   * @param {string} email - Email to validate
   * @returns {boolean} Whether email is valid
   */
  static validateEmail(email) {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }

  /**
   * Validate a phone number (10 digits)
   * @param {string} phone - Phone number to validate
   * @returns {boolean} Whether phone is valid
   */
  static validatePhone(phone) {
    const cleaned = phone.replace(/[\s\-\(\)]/g, '');
    return /^[0-9]{10}$/.test(cleaned);
  }

  /**
   * Validate a required field
   * @param {string} value - Value to validate
   * @returns {boolean} Whether value is not empty
   */
  static validateRequired(value) {
    return value !== null && value !== undefined && value.toString().trim() !== '';
  }

  /**
   * Validate minimum length
   * @param {string} value - Value to validate
   * @param {number} minLength - Minimum length
   * @returns {boolean} Whether value meets minimum length
   */
  static validateMinLength(value, minLength) {
    return value.length >= minLength;
  }

  /**
   * Validate maximum length
   * @param {string} value - Value to validate
   * @param {number} maxLength - Maximum length
   * @returns {boolean} Whether value is within maximum length
   */
  static validateMaxLength(value, maxLength) {
    return value.length <= maxLength;
  }

  /**
   * Validate password strength
   * @param {string} password - Password to validate
   * @param {Object} options - Validation options
   * @returns {Object} Validation result with individual checks
   */
  static validatePassword(password, options = {}) {
    const {
      minLength = 8,
      requireUppercase = true,
      requireLowercase = true,
      requireNumber = true,
      requireSpecial = false,
    } = options;

    const result = {
      valid: true,
      length: password.length >= minLength,
      uppercase: !requireUppercase || /[A-Z]/.test(password),
      lowercase: !requireLowercase || /[a-z]/.test(password),
      number: !requireNumber || /[0-9]/.test(password),
      special: !requireSpecial || /[!@#$%^&*(),.?":{}|<>]/.test(password),
    };

    result.valid = result.length && result.uppercase && result.lowercase && result.number && result.special;

    return result;
  }

  /**
   * Validate that two values match
   * @param {string} value1 - First value
   * @param {string} value2 - Second value
   * @returns {boolean} Whether values match
   */
  static validateMatch(value1, value2) {
    return value1 === value2;
  }

  // ============================================
  // FORM STATE
  // ============================================

  /**
   * Show error state on a form group
   * @param {string} fieldId - Field ID (without 'Group' suffix)
   * @param {string} message - Error message
   */
  static showError(fieldId, message) {
    const group = document.getElementById(`${fieldId}Group`);
    const errorEl = document.getElementById(`${fieldId}Error`);

    if (group) {
      group.classList.add('has-error');
    }
    if (errorEl) {
      errorEl.textContent = message;
    }
  }

  /**
   * Clear error state on a form group
   * @param {string} fieldId - Field ID (without 'Group' suffix)
   */
  static clearError(fieldId) {
    const group = document.getElementById(`${fieldId}Group`);
    if (group) {
      group.classList.remove('has-error');
    }
  }

  /**
   * Clear all errors in a form
   * @param {HTMLFormElement|string} form - Form element or selector
   */
  static clearAllErrors(form) {
    const formEl = typeof form === 'string' ? document.querySelector(form) : form;
    if (!formEl) return;

    formEl.querySelectorAll('.has-error').forEach(el => {
      el.classList.remove('has-error');
    });
  }

  /**
   * Set loading state on a button
   * @param {HTMLButtonElement|string} button - Button element or selector
   * @param {boolean} isLoading - Whether to show loading state
   */
  static setButtonLoading(button, isLoading) {
    const btn = typeof button === 'string' ? document.querySelector(button) : button;
    if (!btn) return;

    if (isLoading) {
      btn.classList.add('loading');
      btn.disabled = true;
    } else {
      btn.classList.remove('loading');
      btn.disabled = false;
    }
  }

  /**
   * Get form data as an object
   * @param {HTMLFormElement|string} form - Form element or selector
   * @returns {Object} Form data object
   */
  static getFormData(form) {
    const formEl = typeof form === 'string' ? document.querySelector(form) : form;
    if (!formEl) return {};

    const formData = new FormData(formEl);
    const data = {};

    for (const [key, value] of formData.entries()) {
      // Handle multiple values (like checkboxes)
      if (data[key]) {
        if (!Array.isArray(data[key])) {
          data[key] = [data[key]];
        }
        data[key].push(value);
      } else {
        data[key] = value;
      }
    }

    return data;
  }

  /**
   * Set form data from an object
   * @param {HTMLFormElement|string} form - Form element or selector
   * @param {Object} data - Data object
   */
  static setFormData(form, data) {
    const formEl = typeof form === 'string' ? document.querySelector(form) : form;
    if (!formEl) return;

    Object.entries(data).forEach(([name, value]) => {
      const field = formEl.elements[name];
      if (!field) return;

      if (field.type === 'checkbox') {
        field.checked = !!value;
      } else if (field.type === 'radio') {
        const radio = formEl.querySelector(`input[name="${name}"][value="${value}"]`);
        if (radio) radio.checked = true;
      } else {
        field.value = value;
      }
    });
  }

  /**
   * Reset form to initial state
   * @param {HTMLFormElement|string} form - Form element or selector
   */
  static resetForm(form) {
    const formEl = typeof form === 'string' ? document.querySelector(form) : form;
    if (!formEl) return;

    formEl.reset();
    SOForms.clearAllErrors(formEl);
  }

  // ============================================
  // MASKING
  // ============================================

  /**
   * Mask an email address
   * @param {string} email - Email to mask
   * @returns {string} Masked email
   */
  static maskEmail(email) {
    const [local, domain] = email.split('@');
    if (!domain) return email;

    const maskedLocal = local.charAt(0) +
      '*'.repeat(Math.min(local.length - 2, 4)) +
      local.charAt(local.length - 1);

    return `${maskedLocal}@${domain}`;
  }

  /**
   * Mask a phone number
   * @param {string} phone - Phone number to mask
   * @returns {string} Masked phone
   */
  static maskPhone(phone) {
    const cleaned = phone.replace(/[\s\-\(\)]/g, '');
    if (cleaned.length < 4) return phone;

    return cleaned.slice(0, 2) + '*'.repeat(cleaned.length - 4) + cleaned.slice(-2);
  }
}

// Auto-initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
  SOForms.initAll();
});

// Expose to global scope
window.SOForms = SOForms;

// Export for ES modules
export default SOForms;
export { SOForms };
