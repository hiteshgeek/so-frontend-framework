// ============================================
// SIXORBIT UI ENGINE - MODAL ELEMENT
// Modal dialog with show/hide functionality
// ============================================

import { ContainerElement } from '../../core/ContainerElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Modal - Modal dialog element
 */
class Modal extends ContainerElement {
    static NAME = 'ui-modal';

    static DEFAULTS = {
        ...ContainerElement.DEFAULTS,
        type: 'modal',
        tagName: 'div',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._title = config.title || null;
        this._body = config.body || null;
        this._footer = config.footer || null;
        this._size = config.size || null; // sm, lg, xl
        this._centered = config.centered || false;
        this._scrollable = config.scrollable || false;
        this._backdrop = config.backdrop !== false;
        this._keyboard = config.keyboard !== false;
        this._staticBackdrop = config.staticBackdrop || false;
        this._closeButton = config.closeButton !== false;
        this._footerButtons = config.footerButtons || [];
    }

    // ==================
    // Fluent API
    // ==================

    /**
     * Set title
     * @param {string} title
     * @returns {this}
     */
    title(title) {
        this._title = title;
        return this;
    }

    /**
     * Set body content
     * @param {string} body
     * @returns {this}
     */
    body(body) {
        this._body = body;
        return this;
    }

    /**
     * Set footer content
     * @param {string} footer
     * @returns {this}
     */
    footer(footer) {
        this._footer = footer;
        return this;
    }

    /**
     * Set size
     * @param {string} size - sm, lg, xl, fullscreen
     * @returns {this}
     */
    size(size) {
        this._size = size;
        return this;
    }

    /** Small modal */
    small() { return this.size('sm'); }

    /** Large modal */
    large() { return this.size('lg'); }

    /** Extra large modal */
    extraLarge() { return this.size('xl'); }

    /** Fullscreen modal */
    fullscreen() { return this.size('fullscreen'); }

    /**
     * Center modal vertically
     * @param {boolean} centered
     * @returns {this}
     */
    centered(centered = true) {
        this._centered = centered;
        return this;
    }

    /**
     * Make modal scrollable
     * @param {boolean} scrollable
     * @returns {this}
     */
    scrollable(scrollable = true) {
        this._scrollable = scrollable;
        return this;
    }

    /**
     * Set static backdrop
     * @param {boolean} staticBackdrop
     * @returns {this}
     */
    staticBackdrop(staticBackdrop = true) {
        this._staticBackdrop = staticBackdrop;
        return this;
    }

    /**
     * Hide close button
     * @returns {this}
     */
    noCloseButton() {
        this._closeButton = false;
        return this;
    }

    /**
     * Add footer button
     * @param {Object} button - {text, variant, onClick, dismiss}
     * @returns {this}
     */
    addButton(button) {
        this._footerButtons.push(button);
        return this;
    }

    /**
     * Add cancel button
     * @param {string} text
     * @returns {this}
     */
    cancelButton(text = 'Cancel') {
        return this.addButton({ text, variant: 'secondary', dismiss: true });
    }

    /**
     * Add confirm button
     * @param {string} text
     * @param {Function} onClick
     * @returns {this}
     */
    confirmButton(text = 'Confirm', onClick = null) {
        return this.addButton({ text, variant: 'primary', onClick });
    }

    // ==================
    // Rendering
    // ==================

    /**
     * Build CSS classes
     * @returns {string}
     */
    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('modal'));
        this._extraClasses.add(SixOrbit.cls('fade'));
        return super.buildClassString();
    }

    /**
     * Build attributes
     * @returns {Object}
     */
    buildAttributes() {
        const attrs = super.buildAttributes();

        attrs.tabindex = '-1';
        attrs['aria-hidden'] = 'true';

        if (this._staticBackdrop) {
            attrs[SixOrbit.data('backdrop')] = 'static';
        } else if (!this._backdrop) {
            attrs[SixOrbit.data('backdrop')] = 'false';
        }

        if (!this._keyboard) {
            attrs[SixOrbit.data('keyboard')] = 'false';
        }

        return attrs;
    }

    /**
     * Render content
     * @returns {string}
     */
    renderContent() {
        let dialogClass = SixOrbit.cls('modal-dialog');

        if (this._size) {
            if (this._size === 'fullscreen') {
                dialogClass += ` ${SixOrbit.cls('modal-fullscreen')}`;
            } else {
                dialogClass += ` ${SixOrbit.cls('modal', this._size)}`;
            }
        }

        if (this._centered) {
            dialogClass += ` ${SixOrbit.cls('modal-dialog-centered')}`;
        }

        if (this._scrollable) {
            dialogClass += ` ${SixOrbit.cls('modal-dialog-scrollable')}`;
        }

        let html = `<div class="${dialogClass}">`;
        html += `<div class="${SixOrbit.cls('modal-content')}">`;

        // Header
        if (this._title || this._closeButton) {
            html += `<div class="${SixOrbit.cls('modal-header')}">`;
            if (this._title) {
                html += `<h5 class="${SixOrbit.cls('modal-title')}">${this._escapeHtml(this._title)}</h5>`;
            }
            if (this._closeButton) {
                html += `<button type="button" class="${SixOrbit.cls('btn-close')}" ${SixOrbit.data('dismiss')}="modal" aria-label="Close"></button>`;
            }
            html += '</div>';
        }

        // Body
        html += `<div class="${SixOrbit.cls('modal-body')}">`;
        if (this._body) {
            html += this._body; // Allow HTML in body
        }
        html += this.renderChildren();
        html += '</div>';

        // Footer
        if (this._footer || this._footerButtons.length > 0) {
            html += `<div class="${SixOrbit.cls('modal-footer')}">`;

            if (this._footer) {
                html += this._footer;
            }

            this._footerButtons.forEach(btn => {
                const variant = btn.variant || 'secondary';
                const dismiss = btn.dismiss ? ` ${SixOrbit.data('dismiss')}="modal"` : '';
                html += `<button type="button" class="${SixOrbit.cls('btn')} ${SixOrbit.cls('btn', variant)}"${dismiss}>${this._escapeHtml(btn.text)}</button>`;
            });

            html += '</div>';
        }

        html += '</div></div>';

        return html;
    }

    // ==================
    // Modal Methods
    // ==================

    /**
     * Show the modal
     */
    show() {
        if (this.element) {
            this.element.classList.add(SixOrbit.cls('show'));
            this.element.style.display = 'block';
            this.element.setAttribute('aria-hidden', 'false');
            document.body.classList.add(SixOrbit.cls('modal-open'));

            // Create backdrop
            if (this._backdrop && !document.querySelector(SixOrbit.sel('modal-backdrop'))) {
                const backdrop = document.createElement('div');
                backdrop.className = `${SixOrbit.cls('modal-backdrop')} ${SixOrbit.cls('fade')} ${SixOrbit.cls('show')}`;
                document.body.appendChild(backdrop);
            }
        }
    }

    /**
     * Hide the modal
     */
    hide() {
        if (this.element) {
            this.element.classList.remove(SixOrbit.cls('show'));
            this.element.style.display = 'none';
            this.element.setAttribute('aria-hidden', 'true');
            document.body.classList.remove(SixOrbit.cls('modal-open'));

            // Remove backdrop
            const backdrop = document.querySelector(SixOrbit.sel('modal-backdrop'));
            if (backdrop) {
                backdrop.remove();
            }
        }
    }

    /**
     * Toggle the modal
     */
    toggle() {
        if (this.element?.classList.contains(SixOrbit.cls('show'))) {
            this.hide();
        } else {
            this.show();
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

        if (this._title) config.title = this._title;
        if (this._body) config.body = this._body;
        if (this._footer) config.footer = this._footer;
        if (this._size) config.size = this._size;
        if (this._centered) config.centered = true;
        if (this._scrollable) config.scrollable = true;
        if (!this._backdrop) config.backdrop = false;
        if (!this._keyboard) config.keyboard = false;
        if (this._staticBackdrop) config.staticBackdrop = true;
        if (!this._closeButton) config.closeButton = false;
        if (this._footerButtons.length > 0) config.footerButtons = this._footerButtons;

        return config;
    }
}

export default Modal;
export { Modal };
