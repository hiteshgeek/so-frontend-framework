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
    static: false, // When true, modal cannot be dismissed via backdrop/escape/close button
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

    // Check for static mode from data attribute, class, or options
    // (options.static may already be set from constructor)
    if (this.element.hasAttribute('data-so-static') ||
        this.element.classList.contains('so-modal-static') ||
        this.options.static === true) {
      this.options.static = true;
      this.options.closable = false;
      this.options.keyboard = false;
      // Add static class if not present
      this.element.classList.add('so-modal-static');
    }

    // Bind events
    this._bindEvents();
  }

  /**
   * Bind event listeners
   * @private
   */
  _bindEvents() {
    // Close button (only if closable/not static)
    this.delegate('click', '.so-modal-close, [data-dismiss="modal"]', () => {
      if (!this.options.static) {
        this.hide();
      }
    });

    // Backdrop click
    if (this.options.backdrop) {
      this.on('click', (e) => {
        if (e.target === this.element) {
          if (this.options.static) {
            // Shake animation for static modal
            this._shakeModal();
          } else if (this.options.closable) {
            this.hide();
          }
        }
      });
    }

    // Note: Keyboard events are bound to document in show() and unbound in hide()

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
   * Shake the modal to indicate it cannot be dismissed
   * @private
   */
  _shakeModal() {
    this.element.classList.add('so-modal-static-shake');
    setTimeout(() => {
      this.element.classList.remove('so-modal-static-shake');
    }, 300);
  }

  /**
   * Handle keyboard events
   * @param {KeyboardEvent} e - Keyboard event
   * @private
   */
  _handleKeydown(e) {
    // Only handle if this is the topmost modal
    if (e.key === 'Escape' && this._isOpen) {
      const openModals = SOModal._openModals;
      if (openModals.length > 0 && openModals[openModals.length - 1] === this) {
        e.preventDefault();
        e.stopPropagation();
        if (this.options.static) {
          // Shake animation for static modal
          this._shakeModal();
        } else if (this.options.closable) {
          this.hide();
        }
      }
    }
  }

  /**
   * Bind document keyboard listener
   * @private
   */
  _bindDocumentKeydown() {
    if (!this.options.keyboard) return;
    this._boundKeydown = this._handleKeydown.bind(this);
    document.addEventListener('keydown', this._boundKeydown);
  }

  /**
   * Unbind document keyboard listener
   * @private
   */
  _unbindDocumentKeydown() {
    if (this._boundKeydown) {
      document.removeEventListener('keydown', this._boundKeydown);
      this._boundKeydown = null;
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
      this._backdrop.classList.add('so-fade');
    }

    document.body.appendChild(this._backdrop);

    // Force reflow for animation
    this._backdrop.offsetHeight;
    this._backdrop.classList.add('so-show');
  }

  /**
   * Hide and remove backdrop
   * @private
   */
  _hideBackdrop() {
    if (!this._backdrop) return;

    this._backdrop.classList.remove('so-show');

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
      this.addClass('so-fade');
      // Force reflow
      this.element.offsetHeight;
    }

    this.addClass('so-show');

    // Set up focus trap
    if (this.options.focus) {
      this._focusTrapCleanup = this.trapFocus();
    }

    // Bind document keyboard listener for Escape
    this._bindDocumentKeydown();

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

    // Unbind document keyboard listener
    this._unbindDocumentKeydown();

    // Hide modal
    this.removeClass('so-show');

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

    if (this.options.animation && this._dialog) {
      // Use a flag to prevent double execution
      let completed = false;
      const safeHideComplete = () => {
        if (completed) return;
        completed = true;
        hideComplete();
      };

      this._dialog.addEventListener('transitionend', safeHideComplete, { once: true });
      // Fallback timeout in case transitionend doesn't fire
      setTimeout(safeHideComplete, 350);
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
      static: isStatic = false,
    } = options;

    // Size class goes on the modal container, not the dialog
    const sizeClass = size !== 'default' ? `so-modal-${size}` : '';
    const staticClass = isStatic ? 'so-modal-static' : '';

    const modal = document.createElement('div');
    modal.className = `so-modal so-fade ${sizeClass} ${staticClass} ${className}`.trim().replace(/\s+/g, ' ');
    modal.tabIndex = -1;

    // For static modals, set the data attribute
    if (isStatic) {
      modal.setAttribute('data-so-static', 'true');
    }

    let footerHtml = '';
    if (footer) {
      footerHtml = `
        <div class="so-modal-footer">
          ${footer}
        </div>
      `;
    }

    // Don't show close button if static or not closable
    const showCloseButton = closable && !isStatic;

    modal.innerHTML = `
      <div class="so-modal-dialog">
        <div class="so-modal-content">
          <div class="so-modal-header">
            <h5 class="so-modal-title">${title}</h5>
            ${showCloseButton ? '<button type="button" class="so-modal-close" data-dismiss="modal"><span class="material-icons">close</span></button>' : ''}
          </div>
          <div class="so-modal-body">
            ${content}
          </div>
          ${footerHtml}
        </div>
      </div>
    `;

    document.body.appendChild(modal);

    const instance = new SOModal(modal, { ...options, animation: true, static: isStatic });

    // Store the instance on the element for easy retrieval
    modal._soModalInstance = instance;

    // Remove from DOM when hidden
    modal.addEventListener(SixOrbit.evt(SOModal.EVENTS.HIDDEN), () => {
      modal.remove();
    });

    return instance;
  }

  /**
   * Show a confirmation dialog with multiple action support
   * @param {Object} options - Dialog options
   * @param {string} options.title - Dialog title
   * @param {string} options.message - Dialog message
   * @param {Array} options.actions - Array of action objects: { id, text, class, primary }
   * @param {string} options.confirmText - Text for confirm button (simple mode)
   * @param {string} options.cancelText - Text for cancel button (simple mode)
   * @param {boolean} options.danger - Use danger styling for confirm button
   * @param {boolean} options.static - When true, modal cannot be dismissed without clicking a button
   * @returns {Promise<string|boolean>} Resolves with action id/true/false or 'dismiss' if closed
   */
  static confirm(options = {}) {
    const {
      title = 'Confirm',
      message = 'Are you sure?',
      actions = null,
      confirmText = 'Confirm',
      cancelText = 'Cancel',
      confirmClass = 'so-btn-primary',
      danger = false,
      closable = true,
      static: isStatic = false,
    } = options;

    return new Promise((resolve) => {
      let resolved = false;
      let footerHtml = '';

      // Build footer based on actions or simple confirm/cancel
      if (actions && Array.isArray(actions)) {
        // Multiple actions mode
        footerHtml = actions.map(action => {
          const btnClass = action.class || (action.primary ? 'so-btn-primary' : 'so-btn-outline');
          return `<button type="button" class="so-btn ${btnClass}" data-modal-action="${action.id}">${action.text}</button>`;
        }).join('\n');
      } else {
        // Simple confirm/cancel mode
        footerHtml = `
          <button type="button" class="so-btn so-btn-outline" data-modal-action="cancel">${cancelText}</button>
          <button type="button" class="so-btn ${danger ? 'so-btn-danger' : confirmClass}" data-modal-action="confirm">${confirmText}</button>
        `;
      }

      const modal = SOModal.create({
        title,
        content: `<p>${message}</p>`,
        size: 'sm',
        closable: isStatic ? false : closable,
        static: isStatic,
        footer: footerHtml,
      });

      // Handle action button clicks
      modal.element.querySelectorAll('[data-modal-action]').forEach(btn => {
        btn.addEventListener('click', () => {
          if (resolved) return;
          resolved = true;
          const actionId = btn.getAttribute('data-modal-action');

          // For simple mode, convert to boolean for backwards compatibility
          if (!actions) {
            resolve(actionId === 'confirm');
          } else {
            resolve(actionId);
          }
          modal.hide();
        });
      });

      // Handle dismiss (close button, escape, backdrop click)
      modal.element.addEventListener(SixOrbit.evt(SOModal.EVENTS.HIDDEN), () => {
        if (resolved) return;
        resolved = true;
        // Return false for simple mode, 'dismiss' for actions mode
        resolve(actions ? 'dismiss' : false);
      });

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

  /**
   * Get modal instance from element
   * Override to also check for instance stored on element (from create())
   * @param {Element|string} element - DOM element or selector
   * @param {Object} [options={}] - Component options
   * @returns {SOModal} Modal instance
   */
  static getInstance(element, options = {}) {
    const el = typeof element === 'string' ? document.querySelector(element) : element;
    if (!el) return null;

    // First check for instance stored directly on element (from SOModal.create())
    if (el._soModalInstance) {
      return el._soModalInstance;
    }

    // Fall back to standard SixOrbit instance lookup
    return SixOrbit.getInstance(el, this.NAME, options);
  }
}

// Register component
SOModal.register();

// Expose to global scope
window.SOModal = SOModal;

// Export for ES modules
export default SOModal;
export { SOModal };
