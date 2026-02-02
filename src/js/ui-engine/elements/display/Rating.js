// ============================================
// SIXORBIT UI ENGINE - RATING ELEMENT
// Star rating
// ============================================

import { FormElement } from '../../core/FormElement.js';
import SixOrbit from '../../../core/so-config.js';

class Rating extends FormElement {
    static NAME = 'ui-rating';
    static DEFAULTS = { ...FormElement.DEFAULTS, type: 'rating', tagName: 'div' };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._maxRating = config.maxRating || 5;
        this._allowHalf = config.allowHalf || false;
        this._icon = config.icon || 'star';
        this._emptyIcon = config.emptyIcon || 'star_border';
        this._halfIcon = config.halfIcon || 'star_half';
        this._color = config.color || 'warning';
        this._size = config.size || null;
        this._showValue = config.showValue || false;
    }

    maxRating(max) { this._maxRating = max; return this; }
    allowHalf(val = true) { this._allowHalf = val; return this; }
    icon(icon) { this._icon = icon; return this; }
    emptyIcon(icon) { this._emptyIcon = icon; return this; }
    halfIcon(icon) { this._halfIcon = icon; return this; }
    color(c) { this._color = c; return this; }
    size(s) { this._size = s; return this; }
    showValue(val = true) { this._showValue = val; return this; }

    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('rating'));
        if (this._size) this._extraClasses.add(SixOrbit.cls('rating', this._size));
        if (this._readonly) this._extraClasses.add(SixOrbit.cls('rating-readonly'));
        return super.buildClassString();
    }

    buildAttributes() {
        const attrs = super.buildAttributes();
        attrs[SixOrbit.data('ui-init')] = 'rating';
        attrs[SixOrbit.data('ui-config')] = JSON.stringify({
            maxRating: this._maxRating,
            allowHalf: this._allowHalf,
            value: this._value
        });
        return attrs;
    }

    renderContent() {
        const value = parseFloat(this._value) || 0;
        let html = `<div class="${SixOrbit.cls('rating-stars')}">`;

        for (let i = 1; i <= this._maxRating; i++) {
            let icon = this._emptyIcon;
            let activeClass = '';

            if (i <= Math.floor(value)) {
                icon = this._icon;
                activeClass = ` ${SixOrbit.cls('active')}`;
            } else if (this._allowHalf && i - 0.5 <= value) {
                icon = this._halfIcon;
                activeClass = ` ${SixOrbit.cls('half')}`;
            }

            html += `<span class="${SixOrbit.cls('rating-star')} ${SixOrbit.cls('text', this._color)}${activeClass}" ${SixOrbit.data('value')}="${i}">`;
            html += `<span class="material-icons">${icon}</span>`;
            html += '</span>';
        }

        html += '</div>';

        if (this._showValue) {
            html += `<span class="${SixOrbit.cls('rating-value')}">${value}</span>`;
        }

        // Hidden input for form submission
        if (this._name) {
            html += `<input type="hidden" name="${this._escapeHtml(this._name)}" value="${value}">`;
        }

        return html;
    }

    toConfig() {
        const config = super.toConfig();
        if (this._maxRating !== 5) config.maxRating = this._maxRating;
        if (this._allowHalf) config.allowHalf = true;
        if (this._icon !== 'star') config.icon = this._icon;
        if (this._emptyIcon !== 'star_border') config.emptyIcon = this._emptyIcon;
        if (this._halfIcon !== 'star_half') config.halfIcon = this._halfIcon;
        if (this._color !== 'warning') config.color = this._color;
        if (this._size) config.size = this._size;
        if (this._showValue) config.showValue = true;
        return config;
    }
}

export default Rating;
export { Rating };
