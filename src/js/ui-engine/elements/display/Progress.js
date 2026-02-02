// ============================================
// SIXORBIT UI ENGINE - PROGRESS ELEMENT
// Progress bar display
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Progress - Progress bar element
 */
class Progress extends Element {
    static NAME = 'ui-progress';

    static DEFAULTS = {
        ...Element.DEFAULTS,
        type: 'progress',
        tagName: 'div',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._value = config.value ?? 0;
        this._min = config.min ?? 0;
        this._max = config.max ?? 100;
        this._variant = config.variant || null;
        this._striped = config.striped || false;
        this._animated = config.animated || false;
        this._showLabel = config.showLabel || false;
        this._label = config.label || null;
        this._height = config.height || null;
        this._bars = config.bars || []; // For stacked progress
    }

    // ==================
    // Fluent API
    // ==================

    /**
     * Set value
     * @param {number} value
     * @returns {this}
     */
    value(value) {
        this._value = value;
        return this;
    }

    /**
     * Set minimum value
     * @param {number} min
     * @returns {this}
     */
    min(min) {
        this._min = min;
        return this;
    }

    /**
     * Set maximum value
     * @param {number} max
     * @returns {this}
     */
    max(max) {
        this._max = max;
        return this;
    }

    /**
     * Set variant
     * @param {string} variant
     * @returns {this}
     */
    variant(variant) {
        this._variant = variant;
        return this;
    }

    /** Success variant */
    success() { return this.variant('success'); }

    /** Danger variant */
    danger() { return this.variant('danger'); }

    /** Warning variant */
    warning() { return this.variant('warning'); }

    /** Info variant */
    info() { return this.variant('info'); }

    /**
     * Set striped style
     * @param {boolean} striped
     * @returns {this}
     */
    striped(striped = true) {
        this._striped = striped;
        return this;
    }

    /**
     * Set animated style
     * @param {boolean} animated
     * @returns {this}
     */
    animated(animated = true) {
        this._animated = animated;
        if (animated) this._striped = true; // Animated requires striped
        return this;
    }

    /**
     * Show percentage label
     * @param {boolean} showLabel
     * @returns {this}
     */
    showLabel(showLabel = true) {
        this._showLabel = showLabel;
        return this;
    }

    /**
     * Set custom label
     * @param {string} label
     * @returns {this}
     */
    label(label) {
        this._label = label;
        this._showLabel = true;
        return this;
    }

    /**
     * Set height
     * @param {string} height
     * @returns {this}
     */
    height(height) {
        this._height = height;
        return this;
    }

    /**
     * Add bar for stacked progress
     * @param {Object} bar - {value, variant, striped, animated, label}
     * @returns {this}
     */
    addBar(bar) {
        this._bars.push(bar);
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
        this._extraClasses.add(SixOrbit.cls('progress'));
        return super.buildClassString();
    }

    /**
     * Build attributes
     * @returns {Object}
     */
    buildAttributes() {
        const attrs = super.buildAttributes();

        attrs.role = 'progressbar';
        attrs['aria-valuemin'] = this._min;
        attrs['aria-valuemax'] = this._max;

        if (this._height) {
            attrs.style = (attrs.style || '') + `height: ${this._height};`;
        }

        return attrs;
    }

    /**
     * Build bar class string
     * @param {Object} bar
     * @returns {string}
     */
    _buildBarClass(bar) {
        let cls = SixOrbit.cls('progress-bar');

        if (bar.variant) {
            cls += ` ${SixOrbit.cls('bg', bar.variant)}`;
        }

        if (bar.striped) {
            cls += ` ${SixOrbit.cls('progress-bar-striped')}`;
        }

        if (bar.animated) {
            cls += ` ${SixOrbit.cls('progress-bar-animated')}`;
        }

        return cls;
    }

    /**
     * Render content
     * @returns {string}
     */
    renderContent() {
        // Stacked bars
        if (this._bars.length > 0) {
            let html = '';
            this._bars.forEach(bar => {
                const percent = ((bar.value - this._min) / (this._max - this._min)) * 100;
                html += `<div class="${this._buildBarClass(bar)}" `;
                html += `style="width: ${percent}%" `;
                html += `aria-valuenow="${bar.value}">`;
                if (bar.label) {
                    html += this._escapeHtml(bar.label);
                }
                html += '</div>';
            });
            return html;
        }

        // Single bar
        const percent = ((this._value - this._min) / (this._max - this._min)) * 100;
        let barClass = SixOrbit.cls('progress-bar');

        if (this._variant) {
            barClass += ` ${SixOrbit.cls('bg', this._variant)}`;
        }

        if (this._striped) {
            barClass += ` ${SixOrbit.cls('progress-bar-striped')}`;
        }

        if (this._animated) {
            barClass += ` ${SixOrbit.cls('progress-bar-animated')}`;
        }

        let html = `<div class="${barClass}" `;
        html += `style="width: ${percent}%" `;
        html += `aria-valuenow="${this._value}">`;

        if (this._showLabel) {
            html += this._label || `${Math.round(percent)}%`;
        }

        html += '</div>';

        return html;
    }

    // ==================
    // Progress Methods
    // ==================

    /**
     * Update progress value
     * @param {number} value
     */
    setValue(value) {
        this._value = value;
        if (this.element) {
            const bar = this.element.querySelector(SixOrbit.sel('progress-bar'));
            if (bar) {
                const percent = ((value - this._min) / (this._max - this._min)) * 100;
                bar.style.width = `${percent}%`;
                bar.setAttribute('aria-valuenow', value);
                if (this._showLabel && !this._label) {
                    bar.textContent = `${Math.round(percent)}%`;
                }
            }
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

        config.value = this._value;
        if (this._min !== 0) config.min = this._min;
        if (this._max !== 100) config.max = this._max;
        if (this._variant) config.variant = this._variant;
        if (this._striped) config.striped = true;
        if (this._animated) config.animated = true;
        if (this._showLabel) config.showLabel = true;
        if (this._label) config.label = this._label;
        if (this._height) config.height = this._height;
        if (this._bars.length > 0) config.bars = this._bars;

        return config;
    }
}

export default Progress;
export { Progress };
