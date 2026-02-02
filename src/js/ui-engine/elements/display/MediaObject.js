// ============================================
// SIXORBIT UI ENGINE - MEDIA OBJECT ELEMENT
// Media + content layout
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

class MediaObject extends Element {
    static NAME = 'ui-media-object';
    static DEFAULTS = { ...Element.DEFAULTS, type: 'media-object', tagName: 'div' };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._image = config.image || null;
        this._imageAlt = config.imageAlt || '';
        this._imageSize = config.imageSize || '64px';
        this._title = config.title || null;
        this._body = config.body || null;
        this._align = config.align || 'start';
        this._reverse = config.reverse || false;
    }

    image(src, alt = '') { this._image = src; this._imageAlt = alt; return this; }
    imageSize(size) { this._imageSize = size; return this; }
    title(title) { this._title = title; return this; }
    body(body) { this._body = body; return this; }
    align(a) { this._align = a; return this; }
    alignStart() { return this.align('start'); }
    alignCenter() { return this.align('center'); }
    alignEnd() { return this.align('end'); }
    reverse(val = true) { this._reverse = val; return this; }

    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('media'));
        this._extraClasses.add(SixOrbit.cls('d-flex'));
        if (this._align !== 'start') {
            this._extraClasses.add(SixOrbit.cls('align-items', this._align));
        }
        if (this._reverse) {
            this._extraClasses.add(SixOrbit.cls('flex-row-reverse'));
        }
        return super.buildClassString();
    }

    renderContent() {
        let html = '';

        if (this._image) {
            const marginClass = this._reverse ? SixOrbit.cls('ms-3') : SixOrbit.cls('me-3');
            html += `<img src="${this._escapeHtml(this._image)}" class="${SixOrbit.cls('media-image')} ${marginClass}" alt="${this._escapeHtml(this._imageAlt)}" style="width: ${this._imageSize}; height: ${this._imageSize}; object-fit: cover;">`;
        }

        html += `<div class="${SixOrbit.cls('media-body')}">`;
        if (this._title) {
            html += `<h5 class="${SixOrbit.cls('media-title')} ${SixOrbit.cls('mt-0')}">${this._escapeHtml(this._title)}</h5>`;
        }
        if (this._body) {
            html += this._escapeHtml(this._body);
        }
        html += '</div>';

        return html;
    }

    toConfig() {
        const config = super.toConfig();
        if (this._image) config.image = this._image;
        if (this._imageAlt) config.imageAlt = this._imageAlt;
        if (this._imageSize !== '64px') config.imageSize = this._imageSize;
        if (this._title) config.title = this._title;
        if (this._body) config.body = this._body;
        if (this._align !== 'start') config.align = this._align;
        if (this._reverse) config.reverse = true;
        return config;
    }
}

export default MediaObject;
export { MediaObject };
