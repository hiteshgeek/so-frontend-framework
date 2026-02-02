// ============================================
// SIXORBIT UI ENGINE - ALERT ELEMENT
// Alert/notification display
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Alert - Alert/notification element
 */
class Alert extends Element {
    static NAME = 'ui-alert';

    static DEFAULTS = {
        ...Element.DEFAULTS,
        type: 'alert',
        tagName: 'div',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._variant = config.variant || 'info';
        this._message = config.message || null;
        this._title = config.title || null;
        this._icon = config.icon || null;
        this._dismissible = config.dismissible || false;
        this._autoDismiss = config.autoDismiss || 0;
    }

    // ==================
    // Fluent API
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
    success() { return this.variant('success').icon('check_circle'); }

    /** Danger variant */
    danger() { return this.variant('danger').icon('error'); }

    /** Warning variant */
    warning() { return this.variant('warning').icon('warning'); }

    /** Info variant */
    info() { return this.variant('info').icon('info'); }

    /** Light variant */
    light() { return this.variant('light'); }

    /** Dark variant */
    dark() { return this.variant('dark'); }

    /**
     * Set message
     * @param {string} message
     * @returns {this}
     */
    message(message) {
        this._message = message;
        return this;
    }

    /**
     * Set title
     * @param {string} title
     * @returns {this}
     */
    title(title) {
        this._title = title;
        return this;
    }

    /**
     * Set icon
     * @param {string} icon
     * @returns {this}
     */
    icon(icon) {
        this._icon = icon;
        return this;
    }

    /**
     * Make dismissible
     * @param {boolean} dismissible
     * @returns {this}
     */
    dismissible(dismissible = true) {
        this._dismissible = dismissible;
        return this;
    }

    /**
     * Set auto-dismiss time
     * @param {number} seconds
     * @returns {this}
     */
    autoDismiss(seconds) {
        this._autoDismiss = seconds;
        return this;
    }

    // ==================
    // Rendering
    // ==================

    /**
     * Build CSS classes
     * @returns {string}
     */
    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('alert'));
        this._extraClasses.add(SixOrbit.cls('alert', this._variant));

        if (this._dismissible) {
            this._extraClasses.add(SixOrbit.cls('alert-dismissible'));
            this._extraClasses.add(SixOrbit.cls('fade'));
            this._extraClasses.add(SixOrbit.cls('show'));
        }

        if (this._icon) {
            this._extraClasses.add(SixOrbit.cls('d-flex'));
            this._extraClasses.add(SixOrbit.cls('align-items-center'));
        }

        return super.buildClassString();
    }

    /**
     * Build attributes
     * @returns {Object}
     */
    buildAttributes() {
        const attrs = super.buildAttributes();

        attrs.role = 'alert';

        if (this._autoDismiss > 0) {
            attrs[SixOrbit.data('auto-dismiss')] = this._autoDismiss;
        }

        return attrs;
    }

    /**
     * Render content
     * @returns {string}
     */
    renderContent() {
        let html = '';

        // Icon
        if (this._icon) {
            html += `<span class="material-icons ${SixOrbit.cls('me-2')}">${this._escapeHtml(this._icon)}</span>`;
            html += '<div>';
        }

        // Title
        if (this._title) {
            html += `<h4 class="${SixOrbit.cls('alert-heading')}">${this._escapeHtml(this._title)}</h4>`;
        }

        // Message
        if (this._message) {
            html += this._escapeHtml(this._message);
        }

        // Content from parent
        if (this._content) {
            html += this._escapeHtml(this._content);
        }

        // Close icon wrapper
        if (this._icon) {
            html += '</div>';
        }

        // Dismiss button
        if (this._dismissible) {
            html += `<button type="button" class="${SixOrbit.cls('btn-close')}" ${SixOrbit.data('dismiss')}="alert" aria-label="Close"></button>`;
        }

        return html;
    }

    /**
     * Dismiss the alert
     */
    dismiss() {
        if (this.element) {
            this.element.classList.remove(SixOrbit.cls('show'));
            setTimeout(() => {
                this.element.remove();
            }, 150);
        }
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

        config.variant = this._variant;
        if (this._message) config.message = this._message;
        if (this._title) config.title = this._title;
        if (this._icon) config.icon = this._icon;
        if (this._dismissible) config.dismissible = true;
        if (this._autoDismiss > 0) config.autoDismiss = this._autoDismiss;

        return config;
    }
}

export default Alert;
export { Alert };
