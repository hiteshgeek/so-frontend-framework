// ============================================
// SIXORBIT UI ENGINE - CAROUSEL ELEMENT
// Image slider
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

class Carousel extends Element {
    static NAME = 'ui-carousel';
    static DEFAULTS = { ...Element.DEFAULTS, type: 'carousel', tagName: 'div' };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._slides = config.slides || [];
        this._showControls = config.showControls !== false;
        this._showIndicators = config.showIndicators !== false;
        this._autoplay = config.autoplay || false;
        this._interval = config.interval || 5000;
        this._fade = config.fade || false;
        this._dark = config.dark || false;
    }

    slides(slides) { this._slides = slides; return this; }
    addSlide(image, caption = null, description = null) {
        this._slides.push({ image, caption, description });
        return this;
    }
    showControls(val = true) { this._showControls = val; return this; }
    showIndicators(val = true) { this._showIndicators = val; return this; }
    autoplay(val = true) { this._autoplay = val; return this; }
    interval(ms) { this._interval = ms; return this; }
    fade(val = true) { this._fade = val; return this; }
    dark(val = true) { this._dark = val; return this; }

    buildClassString() {
        this._extraClasses.add(SixOrbit.cls('carousel'));
        this._extraClasses.add(SixOrbit.cls('slide'));
        if (this._fade) this._extraClasses.add(SixOrbit.cls('carousel-fade'));
        if (this._dark) this._extraClasses.add(SixOrbit.cls('carousel-dark'));
        return super.buildClassString();
    }

    buildAttributes() {
        const attrs = super.buildAttributes();
        attrs[SixOrbit.data('ride')] = this._autoplay ? 'carousel' : 'false';
        attrs[SixOrbit.data('interval')] = this._interval;
        attrs[SixOrbit.data('ui-init')] = 'carousel';
        attrs[SixOrbit.data('ui-config')] = JSON.stringify({
            autoplay: this._autoplay,
            interval: this._interval
        });
        return attrs;
    }

    renderContent() {
        const carouselId = this._id || `carousel-${Math.random().toString(36).substr(2, 9)}`;
        let html = '';

        // Indicators
        if (this._showIndicators && this._slides.length > 0) {
            html += `<div class="${SixOrbit.cls('carousel-indicators')}">`;
            this._slides.forEach((_, idx) => {
                const activeClass = idx === 0 ? ` ${SixOrbit.cls('active')}` : '';
                html += `<button type="button" ${SixOrbit.data('target')}="#${carouselId}" ${SixOrbit.data('slide-to')}="${idx}" class="${activeClass}"`;
                if (idx === 0) html += ' aria-current="true"';
                html += `></button>`;
            });
            html += '</div>';
        }

        // Slides
        html += `<div class="${SixOrbit.cls('carousel-inner')}">`;
        this._slides.forEach((slide, idx) => {
            const activeClass = idx === 0 ? ` ${SixOrbit.cls('active')}` : '';
            html += `<div class="${SixOrbit.cls('carousel-item')}${activeClass}">`;
            html += `<img src="${this._escapeHtml(slide.image)}" class="${SixOrbit.cls('d-block')} ${SixOrbit.cls('w-100')}" alt="">`;
            if (slide.caption || slide.description) {
                html += `<div class="${SixOrbit.cls('carousel-caption')} ${SixOrbit.cls('d-none')} ${SixOrbit.cls('d-md-block')}">`;
                if (slide.caption) html += `<h5>${this._escapeHtml(slide.caption)}</h5>`;
                if (slide.description) html += `<p>${this._escapeHtml(slide.description)}</p>`;
                html += '</div>';
            }
            html += '</div>';
        });
        html += '</div>';

        // Controls
        if (this._showControls && this._slides.length > 1) {
            html += `<button class="${SixOrbit.cls('carousel-control-prev')}" type="button" ${SixOrbit.data('target')}="#${carouselId}" ${SixOrbit.data('slide')}="prev">`;
            html += `<span class="${SixOrbit.cls('carousel-control-prev-icon')}" aria-hidden="true"></span>`;
            html += `<span class="${SixOrbit.cls('visually-hidden')}">Previous</span></button>`;

            html += `<button class="${SixOrbit.cls('carousel-control-next')}" type="button" ${SixOrbit.data('target')}="#${carouselId}" ${SixOrbit.data('slide')}="next">`;
            html += `<span class="${SixOrbit.cls('carousel-control-next-icon')}" aria-hidden="true"></span>`;
            html += `<span class="${SixOrbit.cls('visually-hidden')}">Next</span></button>`;
        }

        return html;
    }

    toConfig() {
        const config = super.toConfig();
        if (this._slides.length > 0) config.slides = this._slides;
        if (!this._showControls) config.showControls = false;
        if (!this._showIndicators) config.showIndicators = false;
        if (this._autoplay) config.autoplay = true;
        if (this._interval !== 5000) config.interval = this._interval;
        if (this._fade) config.fade = true;
        if (this._dark) config.dark = true;
        return config;
    }
}

export default Carousel;
export { Carousel };
