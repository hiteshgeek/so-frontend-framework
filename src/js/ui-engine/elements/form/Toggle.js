// ============================================
// SIXORBIT UI ENGINE - TOGGLE ELEMENT
// Toggle switch input
// ============================================

import { FormElement } from '../../core/FormElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Toggle - Toggle switch
 */
class Toggle extends FormElement {
    static NAME = 'ui-toggle';

    static DEFAULTS = {
        ...FormElement.DEFAULTS,
        type: 'toggle',
        tagName: 'input',
    };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._checked = config.checked || false;
        this._variant = config.variant || 'primary';
        this._switchSize = config.switchSize || config.toggleSize || null;
        this._showLabels = config.showLabels || false;
        this._iconMode = config.iconMode || false;
        this._textMode = config.textMode || false;
        this._onLabel = config.onLabel || 'ON';
        this._offLabel = config.offLabel || 'OFF';
        this._onIcon = config.onIcon || 'check';
        this._offIcon = config.offIcon || 'close';
    }

    // ==================
    // Fluent API - State
    // ==================

    /** Set checked state */
    checked(val = true) { this._checked = val; return this; }

    /** Set unchecked state */
    unchecked() { return this.checked(false); }

    // ==================
    // Fluent API - Variant
    // ==================

    /** Set variant/color */
    variant(v) { this._variant = v; return this; }

    /** Alias for variant */
    color(c) { return this.variant(c); }

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

    // ==================
    // Fluent API - Size
    // ==================

    /** Set switch size */
    size(size) { this._switchSize = size; return this; }

    /** Small size */
    small() { return this.size('sm'); }

    /** Large size */
    large() { return this.size('lg'); }

    // ==================
    // Fluent API - Display Modes
    // ==================

    /** Enable icon mode */
    icon(enable = true) { this._iconMode = enable; return this; }

    /** Enable text mode */
    text(enable = true) { this._textMode = enable; return this; }

    /** Set on icon */
    onIcon(icon) { this._onIcon = icon; this._iconMode = true; return this; }

    /** Set off icon */
    offIcon(icon) { this._offIcon = icon; this._iconMode = true; return this; }

    /** Set on text */
    onText(text) { this._onLabel = text; this._textMode = true; return this; }

    /** Set off text */
    offText(text) { this._offLabel = text; this._textMode = true; return this; }

    /** Set on/off labels */
    labels(on, off) { this._onLabel = on; this._offLabel = off; this._showLabels = true; return this; }

    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('form-check-input'));
        this._extraClasses.add(SixOrbit.cls('toggle-input'));
        if (this._error) this._extraClasses.add(SixOrbit.cls('is-invalid'));
        return super.buildClassString();
    }

    buildAttributes() {
        const attrs = super.buildAttributes();
        attrs.type = 'checkbox';
        attrs.role = 'switch';
        if (this._checked) attrs.checked = true;
        attrs[SixOrbit.data('ui-init')] = 'toggle';

        const config = {
            variant: this._variant,
            showLabels: this._showLabels,
            onLabel: this._onLabel,
            offLabel: this._offLabel,
        };
        if (this._switchSize) config.size = this._switchSize;
        if (this._iconMode) {
            config.iconMode = true;
            config.onIcon = this._onIcon;
            config.offIcon = this._offIcon;
        }
        if (this._textMode) {
            config.textMode = true;
        }

        attrs[SixOrbit.data('ui-config')] = JSON.stringify(config);
        return attrs;
    }

    renderContent() { return ''; }

    toConfig() {
        const config = super.toConfig();
        if (this._checked) config.checked = true;
        if (this._variant !== 'primary') config.variant = this._variant;
        if (this._switchSize) config.switchSize = this._switchSize;
        if (this._iconMode) {
            config.iconMode = true;
            config.onIcon = this._onIcon;
            config.offIcon = this._offIcon;
        }
        if (this._textMode) {
            config.textMode = true;
            config.onLabel = this._onLabel;
            config.offLabel = this._offLabel;
        }
        if (this._showLabels) {
            config.showLabels = true;
            config.onLabel = this._onLabel;
            config.offLabel = this._offLabel;
        }
        return config;
    }
}

export default Toggle;
export { Toggle };
