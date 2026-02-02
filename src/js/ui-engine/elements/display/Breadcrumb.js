// ============================================
// SIXORBIT UI ENGINE - BREADCRUMB ELEMENT
// Navigation breadcrumbs
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

class Breadcrumb extends Element {
    static NAME = 'ui-breadcrumb';
    static DEFAULTS = { ...Element.DEFAULTS, type: 'breadcrumb', tagName: 'nav' };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._items = config.items || [];
        this._divider = config.divider || '/';
    }

    items(items) { this._items = items; return this; }
    addItem(label, url = null, active = false) {
        this._items.push({ label, url, active });
        return this;
    }
    divider(d) { this._divider = d; return this; }

    buildAttributes() {
        const attrs = super.buildAttributes();
        attrs['aria-label'] = 'breadcrumb';
        if (this._divider !== '/') {
            attrs.style = `--${SixOrbit.getPrefix()}-breadcrumb-divider: '${this._divider}';`;
        }
        return attrs;
    }

    renderContent() {
        let html = `<ol class="${SixOrbit.cls('breadcrumb')}">`;
        this._items.forEach((item, idx) => {
            const isLast = idx === this._items.length - 1;
            let itemClass = SixOrbit.cls('breadcrumb-item');
            if (item.active || isLast) itemClass += ` ${SixOrbit.cls('active')}`;

            html += `<li class="${itemClass}"`;
            if (item.active || isLast) html += ' aria-current="page"';
            html += '>';

            if (item.url && !item.active && !isLast) {
                html += `<a href="${this._escapeHtml(item.url)}">${this._escapeHtml(item.label)}</a>`;
            } else {
                html += this._escapeHtml(item.label);
            }
            html += '</li>';
        });
        html += '</ol>';
        return html;
    }

    toConfig() {
        const config = super.toConfig();
        if (this._items.length > 0) config.items = this._items;
        if (this._divider !== '/') config.divider = this._divider;
        return config;
    }
}

export default Breadcrumb;
export { Breadcrumb };
