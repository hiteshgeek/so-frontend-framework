// ============================================
// SIXORBIT UI ENGINE - PAGINATION ELEMENT
// Page navigation
// ============================================

import { Element } from '../../core/Element.js';
import SixOrbit from '../../../core/so-config.js';

class Pagination extends Element {
    static NAME = 'ui-pagination';
    static DEFAULTS = { ...Element.DEFAULTS, type: 'pagination', tagName: 'nav' };

    _initFromConfig(config) {
        super._initFromConfig(config);
        this._currentPage = config.currentPage || 1;
        this._totalPages = config.totalPages || 1;
        this._baseUrl = config.baseUrl || '#';
        this._pageParam = config.pageParam || 'page';
        this._showPrevNext = config.showPrevNext !== false;
        this._showFirstLast = config.showFirstLast || false;
        this._maxVisible = config.maxVisible || 5;
        this._size = config.size || null;
    }

    currentPage(p) { this._currentPage = p; return this; }
    totalPages(p) { this._totalPages = p; return this; }
    baseUrl(url) { this._baseUrl = url; return this; }
    pageParam(param) { this._pageParam = param; return this; }
    showPrevNext(val = true) { this._showPrevNext = val; return this; }
    showFirstLast(val = true) { this._showFirstLast = val; return this; }
    maxVisible(max) { this._maxVisible = max; return this; }
    size(s) { this._size = s; return this; }
    small() { return this.size('sm'); }
    large() { return this.size('lg'); }

    _buildPageUrl(page) {
        const url = new URL(this._baseUrl, window.location.origin);
        url.searchParams.set(this._pageParam, page);
        return url.toString();
    }

    renderContent() {
        let ulClass = SixOrbit.cls('pagination');
        if (this._size) ulClass += ` ${SixOrbit.cls('pagination', this._size)}`;

        let html = `<ul class="${ulClass}">`;

        // First button
        if (this._showFirstLast) {
            html += this._renderPageItem('&laquo;&laquo;', 1, this._currentPage === 1);
        }

        // Previous button
        if (this._showPrevNext) {
            html += this._renderPageItem('&laquo;', this._currentPage - 1, this._currentPage === 1);
        }

        // Page numbers
        const pages = this._getVisiblePages();
        pages.forEach(page => {
            if (page === '...') {
                html += `<li class="${SixOrbit.cls('page-item')} disabled"><span class="${SixOrbit.cls('page-link')}">...</span></li>`;
            } else {
                html += this._renderPageItem(page, page, false, page === this._currentPage);
            }
        });

        // Next button
        if (this._showPrevNext) {
            html += this._renderPageItem('&raquo;', this._currentPage + 1, this._currentPage === this._totalPages);
        }

        // Last button
        if (this._showFirstLast) {
            html += this._renderPageItem('&raquo;&raquo;', this._totalPages, this._currentPage === this._totalPages);
        }

        html += '</ul>';
        return html;
    }

    _renderPageItem(label, page, disabled = false, active = false) {
        let itemClass = SixOrbit.cls('page-item');
        if (disabled) itemClass += ' disabled';
        if (active) itemClass += ` ${SixOrbit.cls('active')}`;

        let html = `<li class="${itemClass}">`;
        if (active) {
            html += `<span class="${SixOrbit.cls('page-link')}">${label}</span>`;
        } else {
            html += `<a class="${SixOrbit.cls('page-link')}" href="${this._buildPageUrl(page)}">${label}</a>`;
        }
        html += '</li>';
        return html;
    }

    _getVisiblePages() {
        const pages = [];
        const half = Math.floor(this._maxVisible / 2);
        let start = Math.max(1, this._currentPage - half);
        let end = Math.min(this._totalPages, start + this._maxVisible - 1);

        if (end - start + 1 < this._maxVisible) {
            start = Math.max(1, end - this._maxVisible + 1);
        }

        if (start > 1) {
            pages.push(1);
            if (start > 2) pages.push('...');
        }

        for (let i = start; i <= end; i++) {
            pages.push(i);
        }

        if (end < this._totalPages) {
            if (end < this._totalPages - 1) pages.push('...');
            pages.push(this._totalPages);
        }

        return pages;
    }

    toConfig() {
        const config = super.toConfig();
        config.currentPage = this._currentPage;
        config.totalPages = this._totalPages;
        if (this._baseUrl !== '#') config.baseUrl = this._baseUrl;
        if (this._pageParam !== 'page') config.pageParam = this._pageParam;
        if (!this._showPrevNext) config.showPrevNext = false;
        if (this._showFirstLast) config.showFirstLast = true;
        if (this._maxVisible !== 5) config.maxVisible = this._maxVisible;
        if (this._size) config.size = this._size;
        return config;
    }
}

export default Pagination;
export { Pagination };
