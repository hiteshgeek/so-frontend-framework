// ============================================
// SIXORBIT UI ENGINE - FILE INPUT ELEMENT
// File upload input
// ============================================

import { FormElement } from '../../core/FormElement.js';
import SixOrbit from '../../../core/so-config.js';

/**
 * FileInput - File upload element
 */
class FileInput extends FormElement {
    static NAME = 'ui-file-input';

    static DEFAULTS = {
        ...FormElement.DEFAULTS,
        type: 'file-input',
        tagName: 'input',
    };

    /**
     * Initialize from config
     * @param {Object} config
     * @private
     */
    _initFromConfig(config) {
        super._initFromConfig(config);

        this._accept = config.accept || null;
        this._multiple = config.multiple || false;
        this._capture = config.capture || null;
    }

    // ==================
    // Fluent API
    // ==================

    /**
     * Set accepted file types
     * @param {string} accept - MIME types or extensions
     * @returns {this}
     */
    setAccept(accept) {
        this._accept = accept;
        return this;
    }

    /**
     * Accept images only
     * @returns {this}
     */
    images() {
        return this.setAccept('image/*');
    }

    /**
     * Accept videos only
     * @returns {this}
     */
    videos() {
        return this.setAccept('video/*');
    }

    /**
     * Accept audio only
     * @returns {this}
     */
    audio() {
        return this.setAccept('audio/*');
    }

    /**
     * Accept PDFs
     * @returns {this}
     */
    pdfs() {
        return this.setAccept('application/pdf');
    }

    /**
     * Set multiple files
     * @param {boolean} multiple
     * @returns {this}
     */
    setMultiple(multiple = true) {
        this._multiple = multiple;
        return this;
    }

    /**
     * Set capture mode (camera, microphone)
     * @param {string} capture - user, environment
     * @returns {this}
     */
    setCapture(capture) {
        this._capture = capture;
        return this;
    }

    /**
     * Use front camera
     * @returns {this}
     */
    frontCamera() {
        return this.setCapture('user');
    }

    /**
     * Use back camera
     * @returns {this}
     */
    backCamera() {
        return this.setCapture('environment');
    }

    // ==================
    // Rendering
    // ==================

    /**
     * Get tag name
     * @returns {string}
     */
    getTagName() {
        return 'input';
    }

    /**
     * Build attributes
     * @returns {Object}
     */
    buildAttributes() {
        const attrs = super.buildAttributes();

        attrs.type = 'file';

        if (this._accept) attrs.accept = this._accept;
        if (this._multiple) attrs.multiple = true;
        if (this._capture) attrs.capture = this._capture;

        // Remove value (not applicable for file inputs)
        delete attrs.value;

        return attrs;
    }

    /**
     * Don't render value as attribute
     * @returns {boolean}
     */
    _shouldRenderValueAttr() {
        return false;
    }

    /**
     * Render content (empty for input)
     * @returns {string}
     */
    renderContent() {
        return '';
    }

    /**
     * Get files
     * @returns {FileList|null}
     */
    getFiles() {
        return this.element?.files || null;
    }

    /**
     * Get value (file names)
     * @returns {string|Array}
     */
    getValue() {
        if (this.element && this.element.files) {
            const files = Array.from(this.element.files);
            if (this._multiple) {
                return files.map(f => f.name);
            }
            return files[0]?.name || '';
        }
        return '';
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

        if (this._accept) config.accept = this._accept;
        if (this._multiple) config.multiple = true;
        if (this._capture) config.capture = this._capture;

        return config;
    }
}

export default FileInput;
export { FileInput };
