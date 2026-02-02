// ============================================
// SIXORBIT UI ENGINE - EMPTY STATE ELEMENT
// Empty state placeholder
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

class EmptyState extends Element {
    static NAME = 'ui-empty-state';
    static DEFAULTS = { ...Element.DEFAULTS, type: 'empty-state', tagName: 'div' };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._icon = config.icon || 'inbox';
        this._title = config.title || null;
        this._description = config.description || null;
        this._actionLabel = config.actionLabel || null;
        this._actionUrl = config.actionUrl || null;
        this._actionVariant = config.actionVariant || 'primary';
        this._size = config.size || null;
    }

    icon(icon) { this._icon = icon; return this; }
    title(title) { this._title = title; return this; }
    description(desc) { this._description = desc; return this; }
    action(label, url = '#') { this._actionLabel = label; this._actionUrl = url; return this; }
    actionVariant(v) { this._actionVariant = v; return this; }
    size(s) { this._size = s; return this; }
    small() { return this.size('sm'); }
    large() { return this.size('lg'); }

    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('empty-state'));
        if (this._size) this._extraClasses.add(SixOrbit.cls('empty-state', this._size));
        return super.buildClassString();
    }

    renderContent() {
        let html = '';

        if (this._icon) {
            html += `<div class="${SixOrbit.cls('empty-state-icon')}">`;
            html += `<span class="material-icons">${this._escapeHtml(this._icon)}</span>`;
            html += '</div>';
        }

        if (this._title) {
            html += `<h5 class="${SixOrbit.cls('empty-state-title')}">${this._escapeHtml(this._title)}</h5>`;
        }

        if (this._description) {
            html += `<p class="${SixOrbit.cls('empty-state-description')}">${this._escapeHtml(this._description)}</p>`;
        }

        if (this._actionLabel) {
            html += `<div class="${SixOrbit.cls('empty-state-action')}">`;
            html += `<a href="${this._escapeHtml(this._actionUrl || '#')}" class="${SixOrbit.cls('btn')} ${SixOrbit.cls('btn', this._actionVariant)}">`;
            html += this._escapeHtml(this._actionLabel);
            html += '</a></div>';
        }

        return html;
    }

    toConfig() {
        const config = super.toConfig();
        if (this._icon !== 'inbox') config.icon = this._icon;
        if (this._title) config.title = this._title;
        if (this._description) config.description = this._description;
        if (this._actionLabel) config.actionLabel = this._actionLabel;
        if (this._actionUrl) config.actionUrl = this._actionUrl;
        if (this._actionVariant !== 'primary') config.actionVariant = this._actionVariant;
        if (this._size) config.size = this._size;
        return config;
    }
}

export default EmptyState;
export { EmptyState };
