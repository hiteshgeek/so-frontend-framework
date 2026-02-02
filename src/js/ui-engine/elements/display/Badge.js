// ============================================
// SIXORBIT UI ENGINE - BADGE ELEMENT
// Badge/label display
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Badge - Badge/label element
 */
class Badge extends Element {
    static NAME = 'ui-badge';

    static DEFAULTS = {
        ...Element.DEFAULTS,
        type: 'badge',
        tagName: 'span',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._variant = config.variant || 'primary';
        this._text = config.text || null;
        this._pill = config.pill || false;
        this._size = config.size || null;
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

    /**
     * Set text
     * @param {string} text
     * @returns {this}
     */
    text(text) {
        this._text = text;
        return this;
    }

    /**
     * Set pill style
     * @param {boolean} pill
     * @returns {this}
     */
    pill(pill = true) {
        this._pill = pill;
        return this;
    }

    /**
     * Set size
     * @param {string} size
     * @returns {this}
     */
    size(size) {
        this._size = size;
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
        this._extraClasses.add(SixOrbit.cls('badge'));
        this._extraClasses.add(SixOrbit.cls('bg', this._variant));

        if (this._pill) {
            this._extraClasses.add(SixOrbit.cls('rounded-pill'));
        }

        if (this._size) {
            this._extraClasses.add(SixOrbit.cls('badge', this._size));
        }

        return super.buildClassString();
    }

    /**
     * Render content
     * @returns {string}
     */
    renderContent() {
        if (this._text) {
            return this._escapeHtml(this._text);
        }
        if (this._content) {
            return this._escapeHtml(this._content);
        }
        return '';
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
        if (this._text) config.text = this._text;
        if (this._pill) config.pill = true;
        if (this._size) config.size = this._size;

        return config;
    }
}

export default Badge;
export { Badge };
