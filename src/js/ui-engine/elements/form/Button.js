// ============================================
// SIXORBIT UI ENGINE - BUTTON ELEMENT
// Button with variants and states
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Button - Button element with variants
 */
class Button extends Element {
    static NAME = 'ui-button';

    static DEFAULTS = {
        ...Element.DEFAULTS,
        type: 'button',
        tagName: 'button',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._buttonType = config.buttonType || 'button';
        this._variant = config.variant || 'primary';
        this._size = config.size || null;
        this._outline = config.outline || false;
        this._block = config.block || false;
        this._disabled = config.disabled || false;
        this._loading = config.loading || false;
        this._icon = config.icon || null;
        this._iconPosition = config.iconPosition || 'left';
        this._text = config.text || null;

        // Events
        this._eventHandlers = config.events || {};
    }

    // ==================
    // Fluent API - Type
    // ==================

    /**
     * Set button type
     * @param {string} type - button, submit, reset
     * @returns {this}
     */
    buttonType(type) {
        this._buttonType = type;
        return this;
    }

    /** Submit button */
    submit() { return this.buttonType('submit'); }

    /** Reset button */
    reset() { return this.buttonType('reset'); }

    // ==================
    // Fluent API - Variant
    // ==================

    /**
     * Set variant
     * @param {string} variant
     * @returns {this}
     */
    variant(variant) {
        this._variant = variant;
        return this;
    }

    /** Primary variant */
    primary() { return this.variant('primary'); }

    /** Secondary variant */
    secondary() { return this.variant('secondary'); }

    /** Success variant */
    success() { return this.variant('success'); }

    /** Danger variant */
    danger() { return this.variant('danger'); }

    /** Warning variant */
    warning() { return this.variant('warning'); }

    /** Info variant */
    info() { return this.variant('info'); }

    /** Light variant */
    light() { return this.variant('light'); }

    /** Dark variant */
    dark() { return this.variant('dark'); }

    /** Link variant */
    link() { return this.variant('link'); }

    // ==================
    // Fluent API - Style
    // ==================

    /**
     * Set as outline style
     * @param {boolean} outline
     * @returns {this}
     */
    setOutline(outline = true) {
        this._outline = outline;
        return this;
    }

    /**
     * Set size
     * @param {string} size - sm, lg
     * @returns {this}
     */
    setSize(size) {
        this._size = size;
        return this;
    }

    /** Small size */
    small() { return this.setSize('sm'); }

    /** Large size */
    large() { return this.setSize('lg'); }

    /**
     * Set as block button
     * @param {boolean} block
     * @returns {this}
     */
    setBlock(block = true) {
        this._block = block;
        return this;
    }

    /**
     * Set disabled state
     * @param {boolean} disabled
     * @returns {this}
     */
    setDisabled(disabled = true) {
        this._disabled = disabled;
        return this;
    }

    /**
     * Set loading state
     * @param {boolean} loading
     * @returns {this}
     */
    setLoading(loading = true) {
        this._loading = loading;
        return this;
    }

    /**
     * Set icon
     * @param {string} icon
     * @param {string} position - left, right
     * @returns {this}
     */
    setIcon(icon, position = 'left') {
        this._icon = icon;
        this._iconPosition = position;
        return this;
    }

    /**
     * Set button text
     * @param {string} text
     * @returns {this}
     */
    setText(text) {
        this._text = text;
        return this;
    }

    // ==================
    // Events
    // ==================

    /**
     * Set click handler
     * @param {Function|string} handler
     * @returns {this}
     */
    onClick(handler) {
        this._eventHandlers.click = handler;
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
        return 'button';
    }

    /**
     * Build CSS classes
     * @returns {string}
     */
    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('btn'));

        // Variant
        const variantClass = this._outline
            ? SixOrbit.cls('btn', 'outline', this._variant)
            : SixOrbit.cls('btn', this._variant);
        this._extraClasses.add(variantClass);

        // Size
        if (this._size) {
            this._extraClasses.add(SixOrbit.cls('btn', this._size));
        }

        // Block
        if (this._block) {
            this._extraClasses.add(SixOrbit.cls('w-100'));
        }

        return super.buildClassString();
    }

    /**
     * Build attributes
     * @returns {Object}
     */
    buildAttributes() {
        const attrs = super.buildAttributes();

        attrs.type = this._buttonType;

        if (this._disabled || this._loading) {
            attrs.disabled = true;
        }

        return attrs;
    }

    /**
     * Render content
     * @returns {string}
     */
    renderContent() {
        let html = '';

        // Loading spinner
        if (this._loading) {
            html += `<span class="${SixOrbit.cls('spinner-border')} ${SixOrbit.cls('spinner-border-sm')} ${SixOrbit.cls('me-2')}" role="status" aria-hidden="true"></span>`;
        }

        // Icon left
        if (this._icon && this._iconPosition === 'left' && !this._loading) {
            html += `<span class="material-icons ${SixOrbit.cls('me-1')}">${this._escapeHtml(this._icon)}</span>`;
        }

        // Text
        if (this._text) {
            html += this._escapeHtml(this._text);
        } else if (this._content) {
            html += this._escapeHtml(this._content);
        }

        // Icon right
        if (this._icon && this._iconPosition === 'right' && !this._loading) {
            html += `<span class="material-icons ${SixOrbit.cls('ms-1')}">${this._escapeHtml(this._icon)}</span>`;
        }

        return html;
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

        // Set content
        el.innerHTML = this.renderContent();

        // Attach events
        Object.entries(this._eventHandlers).forEach(([event, handler]) => {
            if (typeof handler === 'function') {
                el.addEventListener(event, handler);
            } else if (typeof handler === 'string' && typeof window[handler] === 'function') {
                el.addEventListener(event, window[handler]);
            }
        });

        this.element = el;
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

        if (this._buttonType !== 'button') config.buttonType = this._buttonType;
        if (this._variant !== 'primary') config.variant = this._variant;
        if (this._size) config.size = this._size;
        if (this._outline) config.outline = true;
        if (this._block) config.block = true;
        if (this._disabled) config.disabled = true;
        if (this._loading) config.loading = true;
        if (this._icon) {
            config.icon = this._icon;
            if (this._iconPosition !== 'left') config.iconPosition = this._iconPosition;
        }
        if (this._text) config.text = this._text;

        return config;
    }
}

export default Button;
export { Button };
