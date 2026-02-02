// ============================================
// SIXORBIT UI ENGINE - CARD ELEMENT
// Card container with header/body/footer
// ============================================

import { ContainerElement } from '../../core/ContainerElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * Card - Card container element
 */
class Card extends ContainerElement {
    static NAME = 'ui-card';

    static DEFAULTS = {
        ...ContainerElement.DEFAULTS,
        type: 'card',
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
        this._subtitle = config.subtitle || null;
        this._body = config.body || null;
        this._footer = config.footer || null;
        this._image = config.image || null;
        this._imagePosition = config.imagePosition || 'top';
        this._headerActions = config.headerActions || [];
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
     * Set subtitle
     * @param {string} subtitle
     * @returns {this}
     */
    subtitle(subtitle) {
        this._subtitle = subtitle;
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
     * Set image
     * @param {string} src
     * @param {string} position - top, bottom
     * @returns {this}
     */
    image(src, position = 'top') {
        this._image = src;
        this._imagePosition = position;
        return this;
    }

    /**
     * Add header action
     * @param {Object} action - {icon, onClick, title}
     * @returns {this}
     */
    addHeaderAction(action) {
        this._headerActions.push(action);
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
        this._extraClasses.add(SixOrbit.cls('card'));
        return super.buildClassString();
    }

    /**
     * Render content
     * @returns {string}
     */
    renderContent() {
        let html = '';

        // Image top
        if (this._image && this._imagePosition === 'top') {
            html += `<img src="${this._escapeHtml(this._image)}" class="${SixOrbit.cls('card-img-top')}" alt="">`;
        }

        // Header (title/subtitle)
        if (this._title || this._headerActions.length > 0) {
            html += `<div class="${SixOrbit.cls('card-header')}">`;

            if (this._headerActions.length > 0) {
                html += `<div class="${SixOrbit.cls('d-flex')} ${SixOrbit.cls('justify-content-between')} ${SixOrbit.cls('align-items-center')}">`;
                html += `<div>`;
            }

            if (this._title) {
                html += `<h5 class="${SixOrbit.cls('card-title')} ${SixOrbit.cls('mb-0')}">${this._escapeHtml(this._title)}</h5>`;
            }
            if (this._subtitle) {
                html += `<h6 class="${SixOrbit.cls('card-subtitle')} ${SixOrbit.cls('text-muted')}">${this._escapeHtml(this._subtitle)}</h6>`;
            }

            if (this._headerActions.length > 0) {
                html += `</div>`;
                html += `<div class="${SixOrbit.cls('card-header-actions')}">`;
                this._headerActions.forEach(action => {
                    html += `<button type="button" class="${SixOrbit.cls('btn')} ${SixOrbit.cls('btn-sm')} ${SixOrbit.cls('btn-link')}" title="${this._escapeHtml(action.title || '')}">`;
                    html += `<span class="material-icons">${this._escapeHtml(action.icon)}</span>`;
                    html += `</button>`;
                });
                html += `</div></div>`;
            }

            html += '</div>';
        }

        // Body
        html += `<div class="${SixOrbit.cls('card-body')}">`;

        // Title in body (if no header)
        if (!this._title && this._content) {
            // Just content
        }

        // Body content
        if (this._body) {
            html += `<p class="${SixOrbit.cls('card-text')}">${this._escapeHtml(this._body)}</p>`;
        }

        // Render children
        html += this.renderChildren();

        html += '</div>';

        // Image bottom
        if (this._image && this._imagePosition === 'bottom') {
            html += `<img src="${this._escapeHtml(this._image)}" class="${SixOrbit.cls('card-img-bottom')}" alt="">`;
        }

        // Footer
        if (this._footer) {
            html += `<div class="${SixOrbit.cls('card-footer')}">${this._escapeHtml(this._footer)}</div>`;
        }

        return html;
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
        if (this._subtitle) config.subtitle = this._subtitle;
        if (this._body) config.body = this._body;
        if (this._footer) config.footer = this._footer;
        if (this._image) {
            config.image = this._image;
            if (this._imagePosition !== 'top') config.imagePosition = this._imagePosition;
        }
        if (this._headerActions.length > 0) config.headerActions = this._headerActions;

        return config;
    }
}

export default Card;
export { Card };
