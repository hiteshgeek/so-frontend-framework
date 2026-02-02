// ============================================
// SIXORBIT UI ENGINE - AUTOCOMPLETE ELEMENT
// Search input with suggestions
// ============================================

import { FormElement } from '../../core/FormElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Autocomplete - Search with suggestions
 */
class Autocomplete extends FormElement {
    static NAME = 'ui-autocomplete';

    static DEFAULTS = {
        ...FormElement.DEFAULTS,
        type: 'autocomplete',
        tagName: 'input',
    };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._options = config.options || [];
        this._ajaxUrl = config.ajaxUrl || null;
        this._minChars = config.minChars ?? 2;
        this._debounce = config.debounce ?? 300;
        this._maxResults = config.maxResults ?? 10;
        this._freeText = config.freeText !== false;
        this._highlight = config.highlight !== false;
        this._clearable = config.clearable !== false;
        this._itemTemplate = config.itemTemplate || null;
    }

    options(options) { this._options = options; return this; }
    addOption(option) { this._options.push(option); return this; }
    ajaxUrl(url) { this._ajaxUrl = url; return this; }
    minChars(chars) { this._minChars = chars; return this; }
    debounce(ms) { this._debounce = ms; return this; }
    maxResults(max) { this._maxResults = max; return this; }
    freeText(val = true) { this._freeText = val; return this; }
    strict() { return this.freeText(false); }
    highlight(val = true) { this._highlight = val; return this; }
    clearable(val = true) { this._clearable = val; return this; }
    itemTemplate(template) { this._itemTemplate = template; return this; }

    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('form-control'));
        this._extraClasses.add(SixOrbit.cls('autocomplete-input'));
        if (this._size) this._extraClasses.add(SixOrbit.cls('form-control', this._size));
        if (this._error) this._extraClasses.add(SixOrbit.cls('is-invalid'));
        return super.buildClassString();
    }

    buildAttributes() {
        const attrs = super.buildAttributes();
        attrs.type = 'text';
        attrs.autocomplete = 'off';
        attrs[SixOrbit.data('ui-init')] = 'autocomplete';

        const config = {
            minChars: this._minChars,
            debounce: this._debounce,
            maxResults: this._maxResults,
            freeText: this._freeText,
            highlight: this._highlight,
            clearable: this._clearable,
        };
        if (this._options.length > 0) config.options = this._options;
        if (this._ajaxUrl) config.ajaxUrl = this._ajaxUrl;
        if (this._itemTemplate) config.itemTemplate = this._itemTemplate;

        attrs[SixOrbit.data('ui-config')] = JSON.stringify(config);
        return attrs;
    }

    renderContent() { return ''; }

    toConfig() {
        const config = super.toConfig();
        if (this._options.length > 0) config.options = this._options;
        if (this._ajaxUrl) config.ajaxUrl = this._ajaxUrl;
        if (this._minChars !== 2) config.minChars = this._minChars;
        if (this._debounce !== 300) config.debounce = this._debounce;
        if (this._maxResults !== 10) config.maxResults = this._maxResults;
        if (!this._freeText) config.freeText = false;
        if (!this._highlight) config.highlight = false;
        if (!this._clearable) config.clearable = false;
        if (this._itemTemplate) config.itemTemplate = this._itemTemplate;
        return config;
    }
}

export default Autocomplete;
export { Autocomplete };
