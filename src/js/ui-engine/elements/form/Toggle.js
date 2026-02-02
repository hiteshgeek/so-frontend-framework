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
        this._toggleSize = config.toggleSize || null;
        this._showLabels = config.showLabels || false;
        this._onLabel = config.onLabel || 'On';
        this._offLabel = config.offLabel || 'Off';
    }

    checked(val = true) { this._checked = val; return this; }
    unchecked() { return this.checked(false); }
    variant(v) { this._variant = v; return this; }
    primary() { return this.variant('primary'); }
    success() { return this.variant('success'); }
    danger() { return this.variant('danger'); }
    warning() { return this.variant('warning'); }
    info() { return this.variant('info'); }
    toggleSize(size) { this._toggleSize = size; return this; }
    small() { return this.toggleSize('sm'); }
    large() { return this.toggleSize('lg'); }
    showLabels(val = true) { this._showLabels = val; return this; }
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
        if (this._toggleSize) config.size = this._toggleSize;

        attrs[SixOrbit.data('ui-config')] = JSON.stringify(config);
        return attrs;
    }

    renderContent() { return ''; }

    toConfig() {
        const config = super.toConfig();
        if (this._checked) config.checked = true;
        if (this._variant !== 'primary') config.variant = this._variant;
        if (this._toggleSize) config.toggleSize = this._toggleSize;
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
