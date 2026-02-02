// ============================================
// SIXORBIT UI ENGINE - SLIDER ELEMENT
// Range slider input
// ============================================

import { FormElement } from '../../core/FormElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Slider - Range slider
 */
class Slider extends FormElement {
    static NAME = 'ui-slider';

    static DEFAULTS = {
        ...FormElement.DEFAULTS,
        type: 'slider',
        tagName: 'input',
    };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._min = config.min ?? 0;
        this._max = config.max ?? 100;
        this._step = config.step ?? 1;
        this._range = config.range || false;
        this._valueEnd = config.valueEnd ?? null;
        this._showTooltip = config.showTooltip !== false;
        this._showLabels = config.showLabels || false;
        this._ticks = config.ticks || [];
        this._variant = config.variant || 'primary';
        this._suffix = config.suffix || null;
        this._prefix = config.prefix || null;
    }

    min(val) { this._min = val; return this; }
    max(val) { this._max = val; return this; }
    step(val) { this._step = val; return this; }
    range(min, max, step = 1) { this._min = min; this._max = max; this._step = step; return this; }
    dualRange(val = true) { this._range = val; return this; }
    valueEnd(val) { this._valueEnd = val; this._range = true; return this; }
    showTooltip(val = true) { this._showTooltip = val; return this; }
    hideTooltip() { return this.showTooltip(false); }
    showLabels(val = true) { this._showLabels = val; return this; }
    ticks(arr) { this._ticks = arr; return this; }
    variant(v) { this._variant = v; return this; }
    primary() { return this.variant('primary'); }
    success() { return this.variant('success'); }
    danger() { return this.variant('danger'); }
    suffix(s) { this._suffix = s; return this; }
    prefix(p) { this._prefix = p; return this; }

    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('form-range'));
        this._extraClasses.add(SixOrbit.cls('slider-input'));
        this._extraClasses.add(SixOrbit.cls('slider', this._variant));
        if (this._error) this._extraClasses.add(SixOrbit.cls('is-invalid'));
        return super.buildClassString();
    }

    buildAttributes() {
        const attrs = super.buildAttributes();
        attrs.type = 'range';
        attrs.min = this._min;
        attrs.max = this._max;
        attrs.step = this._step;
        attrs[SixOrbit.data('ui-init')] = 'slider';

        const config = {
            min: this._min,
            max: this._max,
            step: this._step,
            range: this._range,
            showTooltip: this._showTooltip,
            showLabels: this._showLabels,
            variant: this._variant,
        };
        if (this._valueEnd !== null) config.valueEnd = this._valueEnd;
        if (this._ticks.length > 0) config.ticks = this._ticks;
        if (this._suffix) config.suffix = this._suffix;
        if (this._prefix) config.prefix = this._prefix;

        attrs[SixOrbit.data('ui-config')] = JSON.stringify(config);
        return attrs;
    }

    renderContent() { return ''; }

    toConfig() {
        const config = super.toConfig();
        if (this._min !== 0) config.min = this._min;
        if (this._max !== 100) config.max = this._max;
        if (this._step !== 1) config.step = this._step;
        if (this._range) config.range = true;
        if (this._valueEnd !== null) config.valueEnd = this._valueEnd;
        if (!this._showTooltip) config.showTooltip = false;
        if (this._showLabels) config.showLabels = true;
        if (this._ticks.length > 0) config.ticks = this._ticks;
        if (this._variant !== 'primary') config.variant = this._variant;
        if (this._suffix) config.suffix = this._suffix;
        if (this._prefix) config.prefix = this._prefix;
        return config;
    }
}

export default Slider;
export { Slider };
