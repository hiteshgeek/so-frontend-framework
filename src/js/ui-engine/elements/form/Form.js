// ============================================
// SIXORBIT UI ENGINE - FORM ELEMENT
// Form container with validation support
// ============================================

import { ContainerElement } from '../../core/ContainerElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Form - Form container element
 */
class Form extends ContainerElement {
    static NAME = 'ui-form';

    static DEFAULTS = {
        ...ContainerElement.DEFAULTS,
        type: 'form',
        tagName: 'form',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._action = config.action || '';
        this._method = config.method || 'POST';
        this._enctype = config.enctype || null;
        this._target = config.target || null;
        this._novalidate = config.novalidate || false;
        this._autocomplete = config.autocomplete || null;

        // Events
        this._onSubmit = config.onSubmit || null;
    }

    // ==================
    // Fluent API
    // ==================

    /**
     * Set form action
     * @param {string} action
     * @returns {this}
     */
    setAction(action) {
        this._action = action;
        return this;
    }

    /**
     * Set form method
     * @param {string} method
     * @returns {this}
     */
    setMethod(method) {
        this._method = method.toUpperCase();
        return this;
    }

    /** GET method */
    get() { return this.setMethod('GET'); }

    /** POST method */
    post() { return this.setMethod('POST'); }

    /**
     * Set enctype
     * @param {string} enctype
     * @returns {this}
     */
    setEnctype(enctype) {
        this._enctype = enctype;
        return this;
    }

    /** Multipart form data */
    multipart() {
        return this.setEnctype('multipart/form-data');
    }

    /**
     * Set target
     * @param {string} target
     * @returns {this}
     */
    setTarget(target) {
        this._target = target;
        return this;
    }

    /**
     * Disable HTML5 validation
     * @param {boolean} novalidate
     * @returns {this}
     */
    setNovalidate(novalidate = true) {
        this._novalidate = novalidate;
        return this;
    }

    /**
     * Set autocomplete
     * @param {string} autocomplete
     * @returns {this}
     */
    setAutocomplete(autocomplete) {
        this._autocomplete = autocomplete;
        return this;
    }

    /**
     * Set submit handler
     * @param {Function} handler
     * @returns {this}
     */
    onSubmit(handler) {
        this._onSubmit = handler;
        return this;
    }

    // ==================
    // Rendering
    // ==================

    /**
     * Get tag name
     * @returns {string}
     */
    getTagName() {
        return 'form';
    }

    /**
     * Build attributes
     * @returns {Object}
     */
    buildAttributes() {
        const attrs = super.buildAttributes();

        if (this._action) attrs.action = this._action;
        if (this._method) attrs.method = this._method;
        if (this._enctype) attrs.enctype = this._enctype;
        if (this._target) attrs.target = this._target;
        if (this._novalidate) attrs.novalidate = true;
        if (this._autocomplete) attrs.autocomplete = this._autocomplete;

        return attrs;
    }

    /**
     * Render to DOM
     * @returns {HTMLElement}
     */
    render() {
        const el = super.render();

        // Attach submit handler
        if (this._onSubmit) {
            el.addEventListener('submit', (e) => {
                if (typeof this._onSubmit === 'function') {
                    this._onSubmit(e, this);
                }
            });
        }

        return el;
    }

    // ==================
    // Form Methods
    // ==================

    /**
     * Get form data
     * @returns {FormData}
     */
    getFormData() {
        if (this.element) {
            return new FormData(this.element);
        }
        return new FormData();
    }

    /**
     * Get all form values as object
     * @returns {Object}
     */
    getValues() {
        const values = {};
        const formData = this.getFormData();
        formData.forEach((value, key) => {
            if (values[key]) {
                if (!Array.isArray(values[key])) {
                    values[key] = [values[key]];
                }
                values[key].push(value);
            } else {
                values[key] = value;
            }
        });
        return values;
    }

    /**
     * Set form values
     * @param {Object} values
     * @returns {this}
     */
    setValues(values) {
        if (!this.element) return this;

        Object.entries(values).forEach(([name, value]) => {
            const field = this.element.querySelector(`[name="${name}"]`);
            if (field) {
                if (field.type === 'checkbox') {
                    field.checked = !!value;
                } else if (field.type === 'radio') {
                    const radio = this.element.querySelector(`[name="${name}"][value="${value}"]`);
                    if (radio) radio.checked = true;
                } else {
                    field.value = value;
                }
            }
        });

        return this;
    }

    /**
     * Reset form
     * @returns {this}
     */
    resetForm() {
        if (this.element) {
            this.element.reset();
        }
        return this;
    }

    /**
     * Submit form
     * @returns {this}
     */
    submitForm() {
        if (this.element) {
            this.element.submit();
        }
        return this;
    }

    /**
     * Validate form
     * @returns {boolean}
     */
    validate() {
        if (this.element) {
            return this.element.checkValidity();
        }
        return true;
    }

    /**
     * Report validity
     * @returns {boolean}
     */
    reportValidity() {
        if (this.element) {
            return this.element.reportValidity();
        }
        return true;
    }

    /**
     * Export validation rules for all form elements
     * @returns {Object}
     */
    exportValidation() {
        const rules = {};
        const formElements = this.getFormElements();

        formElements.forEach(el => {
            if (el.getName && el.exportValidation) {
                const name = el.getName();
                if (name) {
                    rules[name] = el.exportValidation();
                }
            }
        });

        return rules;
    }

    // ==================
    // Config Export
    // ==================

    /**
     * Convert to config
     * @returns {Object}
     */
    toConfig() {
        const config = super.toConfig();

        if (this._action) config.action = this._action;
        if (this._method !== 'POST') config.method = this._method;
        if (this._enctype) config.enctype = this._enctype;
        if (this._target) config.target = this._target;
        if (this._novalidate) config.novalidate = true;
        if (this._autocomplete) config.autocomplete = this._autocomplete;

        return config;
    }
}

export default Form;
export { Form };
