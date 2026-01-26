// ============================================
// SIXORBIT UI - MODAL COMPONENT
// Modal dialogs with focus trapping
// ============================================

import SixOrbit from '../core/so-config.js';
import SOComponent from '../core/so-component.js';

/**
 * SOModal - Modal dialog component
 * Supports standard modals, confirmation dialogs, and alerts
 */
class SOModal extends SOComponent {
  static NAME = 'modal';

  static DEFAULTS = {
    backdrop: true,
    keyboard: true,
    focus: true,
    closable: true,
    size: 'default', // 'sm', 'default', 'lg', 'xl', 'fullscreen'
    animation: true,
  };

  static EVENTS = {
    SHOW: 'modal:show',
    SHOWN: 'modal:shown',
    HIDE: 'modal:hide',
    HIDDEN: 'modal:hidden',
    CONFIRM: 'modal:confirm',
    CANCEL: 'modal:cancel',
  };

  // Track open modals for stacking
  static _openModals = [];

  /**
   * Initialize the modal
   * @private
   */
  _init() {
    // Cache elements
    this._dialog = this.$('.so-modal-dialog');
    this._content = this.$('.so-modal-content');
    this._backdrop = null;

    // State
    this._isOpen = false;
    this._focusTrapCleanup = null;
    this._previousActiveElement = null;

    // Bind events
    this._bindEvents();
  }

  /**
   * Bind event listeners
   * @private
   */
  _bindEvents() {
    // Close button
    this.delegate('click', '.so-modal-close, [data-dismiss="modal"]', () => this.hide());

    // Backdrop click
    if (this.options.backdrop && this.options.closable) {
      this.on('click', (e) => {
        if (e.target === this.element) {
          this.hide();
        }
      });
    }

    // Keyboard events
    if (this.options.keyboard) {
      this.on('keydown', this._handleKeydown);
    }

    // Confirm/Cancel buttons
    this.delegate('click', '[data-modal-confirm]', () => {
      this.emit(SOModal.EVENTS.CONFIRM);
      this.hide();
    });

    this.delegate('click', '[data-modal-cancel]', () => {
      this.emit(SOModal.EVENTS.CANCEL);
      this.hide();
    });
  }

  /**
   * Handle keyboard events
   * @param {KeyboardEvent} e - Keyboard event
   * @private
   */
  _handleKeydown(e) {
    if (e.key === 'Escape' && this.options.closable) {
      e.preventDefault();
      this.hide();
    }
  }

  /**
   * Create and show backdrop
   * @private
   */
  _showBackdrop() {
    if (!this.options.backdrop) return;

    this._backdrop = document.createElement('div');
    this._backdrop.className = 'so-modal-backdrop';

    if (this.options.animation) {
      this._backdrop.classList.add('fade');
    }

    document.body.appendChild(this._backdrop);

    // Force reflow for animation
    this._backdrop.offsetHeight;
    this._backdrop.classList.add('show');
  }

  /**
   * Hide and remove backdrop
   * @private
   */
  _hideBackdrop() {
    if (!this._backdrop) return;

    this._backdrop.classList.remove('show');

    if (this.options.animation) {
      this._backdrop.addEventListener('transitionend', () => {
        this._backdrop?.remove();
        this._backdrop = null;
      }, { once: true });
    } else {
      this._backdrop.remove();
      this._backdrop = null;
    }
  }

  /**
   * Manage body scroll lock
   * @param {boolean} lock - Whether to lock scroll
   * @private
   */
  _manageBodyScroll(lock) {
    if (lock) {
      document.body.classList.add('so-modal-open');
      document.body.style.overflow = 'hidden';
    } else if (SOModal._openModals.length === 0) {
      document.body.classList.remove('so-modal-open');
      document.body.style.overflow = '';
    }
  }

  // ============================================
  // PUBLIC API
  // ============================================

  /**
   * Show the modal
   * @returns {this} For chaining
   */
  show() {
    if (this._isOpen) return this;

    // Emit show event (can be prevented)
    if (!this.emit(SOModal.EVENTS.SHOW)) {
      return this;
    }

    this._isOpen = true;
    this._previousActiveElement = document.activeElement;

    // Add to open modals stack
    SOModal._openModals.push(this);

    // Show backdrop
    this._showBackdrop();

    // Lock body scroll
    this._manageBodyScroll(true);

    // Show modal
    this.element.style.display = 'flex';

    if (this.options.animation) {
      this.addClass('fade');
      // Force reflow
      this.element.offsetHeight;
    }

    this.addClass('show');

    // Set up focus trap
    if (this.options.focus) {
      this._focusTrapCleanup = this.trapFocus();
    }

    // Emit shown event after transition
    if (this.options.animation) {
      this._dialog.addEventListener('transitionend', () => {
        this.emit(SOModal.EVENTS.SHOWN);
      }, { once: true });
    } else {
      this.emit(SOModal.EVENTS.SHOWN);
    }

    return this;
  }

  /**
   * Hide the modal
   * @returns {this} For chaining
   */
  hide() {
    if (!this._isOpen) return this;

    // Emit hide event (can be prevented)
    if (!this.emit(SOModal.EVENTS.HIDE)) {
      return this;
    }

    this._isOpen = false;

    // Remove from open modals stack
    const index = SOModal._openModals.indexOf(this);
    if (index > -1) {
      SOModal._openModals.splice(index, 1);
    }

    // Remove focus trap
    if (this._focusTrapCleanup) {
      this._focusTrapCleanup();
      this._focusTrapCleanup = null;
    }

    // Hide modal
    this.removeClass('show');

    const hideComplete = () => {
      this.element.style.display = 'none';
      this._hideBackdrop();
      this._manageBodyScroll(false);

      // Restore focus
      if (this._previousActiveElement && typeof this._previousActiveElement.focus === 'function') {
        this._previousActiveElement.focus();
      }

      this.emit(SOModal.EVENTS.HIDDEN);
    };

    if (this.options.animation) {
      this._dialog.addEventListener('transitionend', hideComplete, { once: true });
    } else {
      hideComplete();
    }

    return this;
  }

  /**
   * Toggle modal visibility
   * @returns {this} For chaining
   */
  toggle() {
    return this._isOpen ? this.hide() : this.show();
  }

  /**
   * Check if modal is open
   * @returns {boolean} Open state
   */
  isOpen() {
    return this._isOpen;
  }

  /**
   * Set modal content
   * @param {string|Element} content - Content to set
   * @returns {this} For chaining
   */
  setContent(content) {
    const body = this.$('.so-modal-body');
    if (!body) return this;

    if (typeof content === 'string') {
      body.innerHTML = content;
    } else if (content instanceof Element) {
      body.innerHTML = '';
      body.appendChild(content);
    }

    return this;
  }

  /**
   * Set modal title
   * @param {string} title - Title text
   * @returns {this} For chaining
   */
  setTitle(title) {
    const titleEl = this.$('.so-modal-title');
    if (titleEl) {
      titleEl.textContent = title;
    }
    return this;
  }

  // ============================================
  // STATIC METHODS
  // ============================================

  /**
   * Create and show a modal programmatically
   * @param {Object} options - Modal configuration
   * @returns {SOModal} Modal instance
   */
  static create(options = {}) {
    const {
      title = '',
      content = '',
      size = 'default',
      closable = true,
      footer = null,
      className = '',
    } = options;

    const modal = document.createElement('div');
    modal.className = `so-modal fade ${className}`;
    modal.tabIndex = -1;

    let footerHtml = '';
    if (footer) {
      footerHtml = `
        <div class="so-modal-footer">
          ${footer}
        </div>
      `;
    }

    modal.innerHTML = `
      <div class="so-modal-dialog so-modal-${size}">
        <div class="so-modal-content">
          <div class="so-modal-header">
            <h5 class="so-modal-title">${title}</h5>
            ${closable ? '<button type="button" class="so-modal-close" data-dismiss="modal"><span class="material-icons">close</span></button>' : ''}
          </div>
          <div class="so-modal-body">
            ${content}
          </div>
          ${footerHtml}
        </div>
      </div>
    `;

    document.body.appendChild(modal);

    const instance = new SOModal(modal, { ...options, animation: true });

    // Remove from DOM when hidden
    modal.addEventListener(SixOrbit.evt(SOModal.EVENTS.HIDDEN), () => {
      modal.remove();
    });

    return instance;
  }

  /**
   * Show a confirmation dialog
   * @param {Object} options - Dialog options
   * @returns {Promise<boolean>} Resolves true if confirmed, false if cancelled
   */
  static confirm(options = {}) {
    const {
      title = 'Confirm',
      message = 'Are you sure?',
      confirmText = 'Confirm',
      cancelText = 'Cancel',
      confirmClass = 'so-btn-primary',
      danger = false,
    } = options;

    return new Promise((resolve) => {
      const modal = SOModal.create({
        title,
        content: `<p>${message}</p>`,
        size: 'sm',
        closable: true,
        footer: `
          <button type="button" class="so-btn so-btn-outline" data-modal-cancel>${cancelText}</button>
          <button type="button" class="so-btn ${danger ? 'so-btn-danger' : confirmClass}" data-modal-confirm>${confirmText}</button>
        `,
      });

      modal.element.addEventListener(SixOrbit.evt(SOModal.EVENTS.CONFIRM), () => resolve(true));
      modal.element.addEventListener(SixOrbit.evt(SOModal.EVENTS.CANCEL), () => resolve(false));
      modal.element.addEventListener(SixOrbit.evt(SOModal.EVENTS.HIDDEN), () => resolve(false));

      modal.show();
    });
  }

  /**
   * Show an alert dialog
   * @param {Object} options - Alert options
   * @returns {Promise<void>} Resolves when closed
   */
  static alert(options = {}) {
    const {
      title = 'Alert',
      message = '',
      buttonText = 'OK',
      type = 'info', // info, success, warning, danger
    } = options;

    const iconMap = {
      info: 'info',
      success: 'check_circle',
      warning: 'warning',
      danger: 'error',
    };

    return new Promise((resolve) => {
      const modal = SOModal.create({
        title,
        content: `
          <div style="text-align: center; padding: 16px 0;">
            <span class="material-icons" style="font-size: 48px; color: var(--so-accent-${type === 'info' ? 'primary' : type}); margin-bottom: 16px; display: block;">
              ${iconMap[type] || 'info'}
            </span>
            <p style="margin: 0;">${message}</p>
          </div>
        `,
        size: 'sm',
        closable: true,
        footer: `<button type="button" class="so-btn so-btn-primary" data-dismiss="modal">${buttonText}</button>`,
      });

      modal.element.addEventListener(SixOrbit.evt(SOModal.EVENTS.HIDDEN), () => resolve());
      modal.show();
    });
  }
}

// Register component
SOModal.register();

// Expose to global scope
window.SOModal = SOModal;

// Export for ES modules
export default SOModal;
export { SOModal };
