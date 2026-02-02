// ============================================
// SIXORBIT UI ENGINE - SELECT ELEMENT
// Dropdown select with options support
// ============================================

import { FormElement } from '../../core/FormElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Select - Dropdown select element
 */
class Select extends FormElement {
    static NAME = 'ui-select';

    static DEFAULTS = {
        ...FormElement.DEFAULTS,
        type: 'select',
        tagName: 'select',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._options = config.options || [];
        this._multiple = config.multiple || false;
        this._size = config.size || null;
        this._emptyOption = config.emptyOption ?? null;
        this._emptyOptionText = config.emptyOptionText || '-- Select --';
    }

    // ==================
    // Fluent API
    // ==================

    /**
     * Set options
     * @param {Array} options - Array of {value, label, disabled?, selected?}
     * @returns {this}
     */
    setOptions(options) {
        this._options = options;
        return this;
    }

    /**
     * Add option
     * @param {string} value
     * @param {string} label
     * @param {boolean} disabled
     * @returns {this}
     */
    addOption(value, label, disabled = false) {
        this._options.push({ value, label, disabled });
        return this;
    }

    /**
     * Set multiple selection
     * @param {boolean} multiple
     * @returns {this}
     */
    setMultiple(multiple = true) {
        this._multiple = multiple;
        return this;
    }

    /**
     * Set visible options size
     * @param {number} size
     * @returns {this}
     */
    setSize(size) {
        this._size = size;
        return this;
    }

    /**
     * Add empty option at top
     * @param {string} text
     * @returns {this}
     */
    emptyOption(text = '-- Select --') {
        this._emptyOption = true;
        this._emptyOptionText = text;
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
        return 'select';
    }

    /**
     * Build attributes
     * @returns {Object}
     */
    buildAttributes() {
        const attrs = super.buildAttributes();

        if (this._multiple) attrs.multiple = true;
        if (this._size) attrs.size = this._size;

        // Remove value attribute for select (handled by option selected)
        delete attrs.value;

        return attrs;
    }

    /**
     * Build CSS classes
     * @returns {string}
     */
    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('form-select'));

        if (this._error) {
            this._extraClasses.add(SixOrbit.cls('is-invalid'));
        }

        // Remove form-control (select uses form-select)
        this._extraClasses.delete(SixOrbit.cls('form-control'));

        return super.buildClassString();
    }

    /**
     * Don't render value as attribute
     * @returns {boolean}
     */
    _shouldRenderValueAttr() {
        return false;
    }

    /**
     * Render options HTML
     * @returns {string}
     */
    _renderOptionsHtml() {
        let html = '';

        // Empty option
        if (this._emptyOption) {
            html += `<option value="">${this._escapeHtml(this._emptyOptionText)}</option>`;
        }

        // Regular options
        this._options.forEach(opt => {
            const value = opt.value ?? opt;
            const label = opt.label ?? opt;
            const disabled = opt.disabled ? ' disabled' : '';
            const selected = this._isSelected(value) ? ' selected' : '';
            html += `<option value="${this._escapeHtml(String(value))}"${disabled}${selected}>${this._escapeHtml(String(label))}</option>`;
        });

        return html;
    }

    /**
     * Check if value is selected
     * @param {*} value
     * @returns {boolean}
     * @private
     */
    _isSelected(value) {
        if (this._multiple && Array.isArray(this._value)) {
            return this._value.includes(value);
        }
        return this._value == value;
    }

    /**
     * Render content
     * @returns {string}
     */
    renderContent() {
        return this._renderOptionsHtml();
    }

    /**
     * Render to DOM
     * @returns {HTMLElement}
     */
    render() {
        const el = document.createElement(this.getTagName());

        // Apply attributes
        const attrs = this.buildAttributes();
        Object.entries(attrs).forEach(([name, value]) => {
            if (value === true) {
                el.setAttribute(name, '');
            } else if (value !== false && value !== null && value !== undefined) {
                el.setAttribute(name, value);
            }
        });

        // Add options
        if (this._emptyOption) {
            const emptyOpt = document.createElement('option');
            emptyOpt.value = '';
            emptyOpt.textContent = this._emptyOptionText;
            el.appendChild(emptyOpt);
        }

        this._options.forEach(opt => {
            const option = document.createElement('option');
            option.value = opt.value ?? opt;
            option.textContent = opt.label ?? opt;
            if (opt.disabled) option.disabled = true;
            if (this._isSelected(option.value)) option.selected = true;
            el.appendChild(option);
        });

        this.element = el;
        this._attachEventHandlers();
        return el;
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

        config.options = this._options;
        if (this._multiple) config.multiple = true;
        if (this._size) config.size = this._size;
        if (this._emptyOption) {
            config.emptyOption = true;
            config.emptyOptionText = this._emptyOptionText;
        }

        return config;
    }
}

export default Select;
export { Select };
