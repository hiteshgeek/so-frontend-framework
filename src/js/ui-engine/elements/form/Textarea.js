// ============================================
// SIXORBIT UI ENGINE - TEXTAREA ELEMENT
// Multi-line text input
// ============================================

import { FormElement } from '../../core/FormElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Textarea - Multi-line text input element
 */
class Textarea extends FormElement {
    static NAME = 'ui-textarea';

    static DEFAULTS = {
        ...FormElement.DEFAULTS,
        type: 'textarea',
        tagName: 'textarea',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._rows = config.rows ?? 3;
        this._cols = config.cols ?? null;
        this._maxlength = config.maxlength ?? null;
        this._minlength = config.minlength ?? null;
        this._wrap = config.wrap || null;
        this._resize = config.resize ?? null;
        this._autoResize = config.autoResize ?? false;
        this._showCounter = config.showCounter ?? false;
    }

    // ==================
    // Fluent API - Dimensions
    // ==================

    /**
     * Set rows
     * @param {number} rows
     * @returns {this}
     */
    rows(rows) {
        this._rows = rows;
        return this;
    }

    /**
     * Set cols
     * @param {number} cols
     * @returns {this}
     */
    cols(cols) {
        this._cols = cols;
        return this;
    }

    // ==================
    // Fluent API - Constraints
    // ==================

    /**
     * Set maximum length
     * @param {number} maxlength
     * @returns {this}
     */
    maxlength(maxlength) {
        this._maxlength = maxlength;
        return this;
    }

    /**
     * Set minimum length
     * @param {number} minlength
     * @returns {this}
     */
    minlength(minlength) {
        this._minlength = minlength;
        return this;
    }

    /**
     * Set wrap mode (hard, soft, off)
     * @param {string} wrap
     * @returns {this}
     */
    wrap(wrap) {
        this._wrap = wrap;
        return this;
    }

    // ==================
    // Fluent API - Resize
    // ==================

    /**
     * Set resize behavior
     * @param {string} direction - 'none', 'vertical', 'horizontal', 'both'
     * @returns {this}
     */
    resize(direction) {
        this._resize = direction;
        return this;
    }

    /**
     * Disable resize
     * @returns {this}
     */
    noResize() {
        return this.resize('none');
    }

    /**
     * Allow only vertical resizing
     * @returns {this}
     */
    resizeVertical() {
        return this.resize('vertical');
    }

    /**
     * Allow only horizontal resizing
     * @returns {this}
     */
    resizeHorizontal() {
        return this.resize('horizontal');
    }

    // ==================
    // Fluent API - Features
    // ==================

    /**
     * Enable auto-resize based on content
     * @param {boolean} enable
     * @returns {this}
     */
    autoResize(enable = true) {
        this._autoResize = enable;
        return this;
    }

    /**
     * Show character counter
     * @param {boolean} show
     * @returns {this}
     */
    showCounter(show = true) {
        this._showCounter = show;
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
        return 'textarea';
    }

    /**
     * Build CSS classes
     * @returns {string}
     */
    buildClassString() {
        super.buildClassString();

        // Add resize class if specified
        if (this._resize !== null) {
            this._extraClasses.add(SixOrbit.cls('resize-' + this._resize));
        }

        return Array.from(this._extraClasses).join(' ');
    }

    /**
     * Build attributes
     * @returns {Object}
     */
    buildAttributes() {
        const attrs = super.buildAttributes();

        if (this._rows) attrs.rows = this._rows;
        if (this._cols) attrs.cols = this._cols;
        if (this._maxlength) attrs.maxlength = this._maxlength;
        if (this._minlength) attrs.minlength = this._minlength;
        if (this._wrap) attrs.wrap = this._wrap;

        if (this._autoResize) {
            attrs[SixOrbit.data('auto-resize')] = 'true';
        }

        if (this._showCounter && this._maxlength) {
            attrs[SixOrbit.data('counter')] = 'true';
        }

        // Remove value attribute (textarea uses content)
        delete attrs.value;

        return attrs;
    }

    /**
     * Don't render value as attribute
     * @returns {boolean}
     */
    _shouldRenderValueAttr() {
        return false;
    }

    /**
     * Render content (the textarea value)
     * @returns {string}
     */
    renderContent() {
        return this._value !== null ? this._escapeHtml(String(this._value)) : '';
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

        // Set content/value
        if (this._value !== null) {
            el.value = this._value;
        }

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

        if (this._rows !== 3) config.rows = this._rows;
        if (this._cols) config.cols = this._cols;
        if (this._maxlength) config.maxlength = this._maxlength;
        if (this._minlength) config.minlength = this._minlength;
        if (this._wrap) config.wrap = this._wrap;
        if (this._resize !== null) config.resize = this._resize;
        if (this._autoResize) config.autoResize = true;
        if (this._showCounter) config.showCounter = true;

        return config;
    }
}

export default Textarea;
export { Textarea };
