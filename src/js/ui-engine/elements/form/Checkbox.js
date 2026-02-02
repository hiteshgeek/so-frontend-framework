// ============================================
// SIXORBIT UI ENGINE - CHECKBOX ELEMENT
// Checkbox input with label support
// ============================================

import { FormElement } from '../../core/FormElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Checkbox - Checkbox form element
 */
class Checkbox extends FormElement {
    static NAME = 'ui-checkbox';

    static DEFAULTS = {
        ...FormElement.DEFAULTS,
        type: 'checkbox',
        tagName: 'input',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._checked = config.checked || false;
        this._indeterminate = config.indeterminate || false;
        this._switch = config.switch || false;
        this._inline = config.inline || false;
    }

    // ==================
    // Fluent API
    // ==================

    /**
     * Set checked state
     * @param {boolean} checked
     * @returns {this}
     */
    setChecked(checked = true) {
        this._checked = checked;
        if (this.element) {
            this.element.checked = checked;
        }
        return this;
    }

    /**
     * Check if checked
     * @returns {boolean}
     */
    isChecked() {
        if (this.element) {
            return this.element.checked;
        }
        return this._checked;
    }

    /**
     * Set indeterminate state
     * @param {boolean} indeterminate
     * @returns {this}
     */
    setIndeterminate(indeterminate = true) {
        this._indeterminate = indeterminate;
        if (this.element) {
            this.element.indeterminate = indeterminate;
        }
        return this;
    }

    /**
     * Render as switch
     * @param {boolean} isSwitch
     * @returns {this}
     */
    asSwitch(isSwitch = true) {
        this._switch = isSwitch;
        return this;
    }

    /**
     * Render inline
     * @param {boolean} inline
     * @returns {this}
     */
    setInline(inline = true) {
        this._inline = inline;
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
        return 'input';
    }

    /**
     * Build CSS classes (for input)
     * @returns {string}
     */
    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('form-check-input'));

        if (this._error) {
            this._extraClasses.add(SixOrbit.cls('is-invalid'));
        }

        // Remove form-control
        this._extraClasses.delete(SixOrbit.cls('form-control'));

        return super.buildClassString();
    }

    /**
     * Build attributes
     * @returns {Object}
     */
    buildAttributes() {
        const attrs = super.buildAttributes();

        attrs.type = 'checkbox';
        if (this._checked) attrs.checked = true;

        // Remove value if not set
        if (attrs.value === null || attrs.value === undefined) {
            delete attrs.value;
        }

        return attrs;
    }

    /**
     * Don't render value as attribute by default
     * @returns {boolean}
     */
    _shouldRenderValueAttr() {
        return this._value !== null && this._value !== undefined;
    }

    /**
     * Render content (empty for input)
     * @returns {string}
     */
    renderContent() {
        return '';
    }

    /**
     * Render to DOM with wrapper
     * @returns {HTMLElement}
     */
    render() {
        // Create wrapper
        const wrapper = document.createElement('div');
        wrapper.className = SixOrbit.cls('form-check');

        if (this._switch) {
            wrapper.classList.add(SixOrbit.cls('form-switch'));
        }

        if (this._inline) {
            wrapper.classList.add(SixOrbit.cls('form-check-inline'));
        }

        // Create input
        const input = document.createElement('input');
        const attrs = this.buildAttributes();
        Object.entries(attrs).forEach(([name, value]) => {
            if (value === true) {
                input.setAttribute(name, '');
            } else if (value !== false && value !== null && value !== undefined) {
                input.setAttribute(name, value);
            }
        });

        if (this._indeterminate) {
            input.indeterminate = true;
        }

        wrapper.appendChild(input);
        this.element = input;

        // Create label
        if (this._label) {
            const label = document.createElement('label');
            label.className = SixOrbit.cls('form-check-label');
            label.textContent = this._label;
            if (this._id) {
                label.setAttribute('for', this._id);
            }
            wrapper.appendChild(label);
        }

        this._attachEventHandlers();
        return wrapper;
    }

    /**
     * Render to HTML string
     * @returns {string}
     */
    toHtml() {
        const wrapperClass = this._switch
            ? `${SixOrbit.cls('form-check')} ${SixOrbit.cls('form-switch')}`
            : SixOrbit.cls('form-check');

        const inlineClass = this._inline ? ` ${SixOrbit.cls('form-check-inline')}` : '';

        const attrs = this.buildAttributes();
        let attrStr = Object.entries(attrs)
            .filter(([, v]) => v !== false && v !== null && v !== undefined)
            .map(([k, v]) => v === true ? k : `${k}="${this._escapeHtml(String(v))}"`)
            .join(' ');

        let html = `<div class="${wrapperClass}${inlineClass}">`;
        html += `<input ${attrStr}>`;

        if (this._label) {
            const forAttr = this._id ? ` for="${this._escapeHtml(this._id)}"` : '';
            html += `<label class="${SixOrbit.cls('form-check-label')}"${forAttr}>${this._escapeHtml(this._label)}</label>`;
        }

        html += '</div>';

        return html;
    }

    /**
     * Get value
     * @returns {*}
     */
    getValue() {
        if (this.element) {
            return this.element.checked;
        }
        return this._checked;
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

        if (this._checked) config.checked = true;
        if (this._indeterminate) config.indeterminate = true;
        if (this._switch) config.switch = true;
        if (this._inline) config.inline = true;

        return config;
    }
}

export default Checkbox;
export { Checkbox };
