// ============================================
// SIXORBIT UI ENGINE - LIST GROUP ELEMENT
// List items
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

class ListGroup extends Element {
    static NAME = 'ui-list-group';
    static DEFAULTS = { ...Element.DEFAULTS, type: 'list-group', tagName: 'ul' };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._items = config.items || [];
        this._flush = config.flush || false;
        this._numbered = config.numbered || false;
        this._horizontal = config.horizontal || false;
    }

    items(items) { this._items = items; return this; }
    addItem(content, active = false, disabled = false, variant = null, badge = null, url = null) {
        this._items.push({ content, active, disabled, variant, badge, url });
        return this;
    }
    flush(val = true) { this._flush = val; return this; }
    numbered(val = true) { this._numbered = val; return this; }
    horizontal(val = true) { this._horizontal = val; return this; }

    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('list-group'));
        if (this._flush) this._extraClasses.add(SixOrbit.cls('list-group-flush'));
        if (this._numbered) this._extraClasses.add(SixOrbit.cls('list-group-numbered'));
        if (this._horizontal) this._extraClasses.add(SixOrbit.cls('list-group-horizontal'));
        return super.buildClassString();
    }

    renderContent() {
        let html = '';
        this._items.forEach(item => {
            let itemClass = SixOrbit.cls('list-group-item');
            if (item.active) itemClass += ` ${SixOrbit.cls('active')}`;
            if (item.disabled) itemClass += ' disabled';
            if (item.variant) itemClass += ` ${SixOrbit.cls('list-group-item', item.variant)}`;
            if (item.url) itemClass += ` ${SixOrbit.cls('list-group-item-action')}`;

            const tag = item.url ? 'a' : 'li';
            html += `<${tag} class="${itemClass}"`;
            if (item.url) html += ` href="${this._escapeHtml(item.url)}"`;
            if (item.active) html += ' aria-current="true"';
            html += '>';

            if (item.badge) {
                html += `<div class="${SixOrbit.cls('d-flex')} ${SixOrbit.cls('w-100')} ${SixOrbit.cls('justify-content-between')} ${SixOrbit.cls('align-items-center')}">`;
                html += this._escapeHtml(item.content);
                html += `<span class="${SixOrbit.cls('badge')} ${SixOrbit.cls('bg-primary')} ${SixOrbit.cls('rounded-pill')}">${this._escapeHtml(item.badge)}</span>`;
                html += '</div>';
            } else {
                html += this._escapeHtml(item.content);
            }

            html += `</${tag}>`;
        });
        return html;
    }

    toConfig() {
        const config = super.toConfig();
        if (this._items.length > 0) config.items = this._items;
        if (this._flush) config.flush = true;
        if (this._numbered) config.numbered = true;
        if (this._horizontal) config.horizontal = true;
        return config;
    }
}

export default ListGroup;
export { ListGroup };
