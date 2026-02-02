// ============================================
// SIXORBIT UI ENGINE - ACCORDION ELEMENT
// Collapsible accordion component
// ============================================

import { ContainerElement } from '../../core/ContainerElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Accordion - Collapsible accordion element
 */
class Accordion extends ContainerElement {
    static NAME = 'ui-accordion';

    static DEFAULTS = {
        ...ContainerElement.DEFAULTS,
        type: 'accordion',
        tagName: 'div',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._items = config.items || [];
        this._flush = config.flush || false;
        this._alwaysOpen = config.alwaysOpen || false;
    }

    // ==================
    // Fluent API
    // ==================

    /**
     * Add accordion item
     * @param {Object} item - {title, content, expanded, icon}
     * @returns {this}
     */
    addItem(item) {
        this._items.push(item);
        return this;
    }

    /**
     * Set multiple items
     * @param {Array} items
     * @returns {this}
     */
    items(items) {
        this._items = items;
        return this;
    }

    /**
     * Set flush style (removes borders)
     * @param {boolean} flush
     * @returns {this}
     */
    flush(flush = true) {
        this._flush = flush;
        return this;
    }

    /**
     * Allow multiple items open at once
     * @param {boolean} alwaysOpen
     * @returns {this}
     */
    alwaysOpen(alwaysOpen = true) {
        this._alwaysOpen = alwaysOpen;
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
        this._extraClasses.add(SixOrbit.cls('accordion'));

        if (this._flush) {
            this._extraClasses.add(SixOrbit.cls('accordion-flush'));
        }

        return super.buildClassString();
    }

    /**
     * Render content
     * @returns {string}
     */
    renderContent() {
        let html = '';
        const accordionId = this._id || `accordion-${Math.random().toString(36).substr(2, 9)}`;

        this._items.forEach((item, index) => {
            const itemId = `${accordionId}-item-${index}`;
            const headerId = `${itemId}-header`;
            const collapseId = `${itemId}-collapse`;
            const expanded = item.expanded || false;

            html += `<div class="${SixOrbit.cls('accordion-item')}">`;

            // Header
            html += `<h2 class="${SixOrbit.cls('accordion-header')}" id="${headerId}">`;
            html += `<button class="${SixOrbit.cls('accordion-button')}${expanded ? '' : ` ${SixOrbit.cls('collapsed')}`}" `;
            html += `type="button" `;
            html += `${SixOrbit.data('toggle')}="collapse" `;
            html += `${SixOrbit.data('target')}="#${collapseId}" `;
            html += `aria-expanded="${expanded}" `;
            html += `aria-controls="${collapseId}">`;

            if (item.icon) {
                html += `<span class="material-icons ${SixOrbit.cls('me-2')}">${this._escapeHtml(item.icon)}</span>`;
            }

            html += this._escapeHtml(item.title);
            html += '</button></h2>';

            // Collapse content
            html += `<div id="${collapseId}" `;
            html += `class="${SixOrbit.cls('accordion-collapse')} ${SixOrbit.cls('collapse')}${expanded ? ` ${SixOrbit.cls('show')}` : ''}" `;
            html += `aria-labelledby="${headerId}" `;

            if (!this._alwaysOpen) {
                html += `${SixOrbit.data('parent')}="#${accordionId}"`;
            }

            html += '>';
            html += `<div class="${SixOrbit.cls('accordion-body')}">`;
            html += item.content || '';
            html += '</div></div>';

            html += '</div>';
        });

        // Render children
        html += this.renderChildren();

        return html;
    }

    // ==================
    // Accordion Methods
    // ==================

    /**
     * Expand item by index
     * @param {number} index
     */
    expand(index) {
        if (this.element) {
            const collapseEl = this.element.querySelector(`#${this._id}-item-${index}-collapse`);
            if (collapseEl) {
                collapseEl.classList.add(SixOrbit.cls('show'));
                const button = this.element.querySelector(`#${this._id}-item-${index}-header button`);
                if (button) {
                    button.classList.remove(SixOrbit.cls('collapsed'));
                    button.setAttribute('aria-expanded', 'true');
                }
            }
        }
    }

    /**
     * Collapse item by index
     * @param {number} index
     */
    collapse(index) {
        if (this.element) {
            const collapseEl = this.element.querySelector(`#${this._id}-item-${index}-collapse`);
            if (collapseEl) {
                collapseEl.classList.remove(SixOrbit.cls('show'));
                const button = this.element.querySelector(`#${this._id}-item-${index}-header button`);
                if (button) {
                    button.classList.add(SixOrbit.cls('collapsed'));
                    button.setAttribute('aria-expanded', 'false');
                }
            }
        }
    }

    /**
     * Toggle item by index
     * @param {number} index
     */
    toggle(index) {
        if (this.element) {
            const collapseEl = this.element.querySelector(`#${this._id}-item-${index}-collapse`);
            if (collapseEl?.classList.contains(SixOrbit.cls('show'))) {
                this.collapse(index);
            } else {
                this.expand(index);
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

        if (this._items.length > 0) config.items = this._items;
        if (this._flush) config.flush = true;
        if (this._alwaysOpen) config.alwaysOpen = true;

        return config;
    }
}

export default Accordion;
export { Accordion };
