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
    focusElement: 'footer', // 'footer' (first footer button), 'close', 'first', or CSS selector
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
   * Focus the initial element based on focusElement option
   * @private
   */
  _focusInitialElement() {
    if (!this.options.focus) return;

    const focusOption = this.options.focusElement;
    let elementToFocus = null;

    if (focusOption === 'footer') {
      // Focus first button in footer
      const footer = this.$('.so-modal-footer');
      if (footer) {
        elementToFocus = footer.querySelector('button, [tabindex]:not([tabindex="-1"]), a[href]');
      }
      // Fallback to close button if no footer button
      if (!elementToFocus) {
        elementToFocus = this.$('.so-modal-close');
      }
    } else if (focusOption === 'close') {
      // Focus close button
      elementToFocus = this.$('.so-modal-close');
    } else if (focusOption === 'first') {
      // Focus first focusable element (original behavior)
      const focusableElements = this.getFocusableElements();
      elementToFocus = focusableElements[0];
    } else if (typeof focusOption === 'string' && focusOption) {
      // CSS selector
      elementToFocus = this.$(focusOption);
    }

    // Fallback to first focusable element
    if (!elementToFocus) {
      const focusableElements = this.getFocusableElements();
      elementToFocus = focusableElements[0];
    }

    if (elementToFocus && typeof elementToFocus.focus === 'function') {
      // Add class to show focus ring (since :focus-visible doesn't work for programmatic focus)
      elementToFocus.classList.add('so-focus-visible');
      elementToFocus.addEventListener('blur', () => {
        elementToFocus.classList.remove('so-focus-visible');
      }, { once: true });
      elementToFocus.focus();
    }
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

    // Set up focus trap (without initial focus - we'll handle that after animation)
    if (this.options.focus) {
      this._focusTrapCleanup = this.trapFocus({ skipInitialFocus: true });
    }

    // Bind document keyboard listener for Escape
    this._bindDocumentKeydown();

    // Emit shown event after transition and set focus
    if (this.options.animation) {
      let shownEmitted = false;
      const handleShown = () => {
        if (shownEmitted) return;
        shownEmitted = true;
        // Focus the appropriate element after animation completes
        if (this.options.focus) {
          this._focusInitialElement();
        }
        this.emit(SOModal.EVENTS.SHOWN);
      };

      // Listen for transitionend on the dialog itself (not bubbled from children)
      const transitionHandler = (e) => {
        if (e.target === this._dialog) {
          this._dialog.removeEventListener('transitionend', transitionHandler);
          handleShown();
        }
      };
      this._dialog.addEventListener('transitionend', transitionHandler);

      // Fallback timeout in case transitionend doesn't fire
      setTimeout(handleShown, 350);
    } else {
      // Focus immediately when no animation
      if (this.options.focus) {
        this._focusInitialElement();
      }
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
   *
   * @param {Object} options - Modal configuration
   * @param {string} options.title - Modal title
   * @param {string} options.content - Modal body content (HTML string)
   * @param {string} options.size - Modal size: 'sm', 'default', 'lg', 'xl', 'fullscreen'
   * @param {boolean} options.closable - Whether modal can be closed
   * @param {string} options.className - Additional CSS classes
   * @param {boolean} options.static - Cannot be dismissed without button click
   * @param {string|Array} options.footer - Footer content (flexible format):
   *   - String: Raw HTML string
   *   - Array: Array of button configs, each can be:
   *     - String: 'Cancel' (text only, outline style)
   *     - Array: [{ icon: 'save' }, 'Save'] (flexible content)
   *     - Object: { content: [...], class: 'so-btn-primary', dismiss: true, onclick: fn }
   * @param {string} options.footerPosition - Footer alignment: 'left', 'center', 'right', 'between', 'around'
   * @param {string} options.footerLayout - Footer layout: 'inline' or 'stacked'
   * @param {string} options.focusElement - Element to focus on open: 'footer' (default), 'close', 'first', or CSS selector
   * @returns {SOModal} Modal instance
   *
   * @example
   * // String footer (legacy)
   * SOModal.create({
   *   title: 'My Modal',
   *   content: '<p>Content here</p>',
   *   footer: '<button class="so-btn so-btn-primary" data-dismiss="modal">OK</button>'
   * });
   *
   * @example
   * // Flexible footer buttons
   * SOModal.create({
   *   title: 'My Modal',
   *   content: '<p>Content here</p>',
   *   footer: [
   *     { content: 'Cancel', class: 'so-btn-outline', dismiss: true },
   *     { content: [{ icon: 'save' }, 'Save'], class: 'so-btn-primary', dismiss: true }
   *   ],
   *   footerPosition: 'right'
   * });
   */
  static create(options = {}) {
    const {
      title = '',
      content = '',
      size = 'default',
      closable = true,
      footer = null,
      footerPosition = 'right',
      footerLayout = 'inline',
      className = '',
      static: isStatic = false,
      focusElement = 'footer',
    } = options;

    /**
     * Parse button content from various formats (same as confirm)
     */
    const parseButtonContent = (btnContent) => {
      if (typeof btnContent === 'string') {
        return btnContent;
      }
      if (Array.isArray(btnContent)) {
        return btnContent.map(part => {
          if (typeof part === 'string') {
            return part;
          }
          if (part && typeof part === 'object' && part.icon) {
            return `<span class="material-icons">${part.icon}</span>`;
          }
          return '';
        }).join('');
      }
      return '';
    };

    /**
     * Create button HTML from flexible format
     */
    const createButton = (btnConfig, index) => {
      let content, btnClass, dismiss, onclick;

      if (typeof btnConfig === 'string') {
        // Simple string: 'Cancel'
        content = btnConfig;
        btnClass = 'so-btn-outline';
        dismiss = true;
      } else if (Array.isArray(btnConfig)) {
        // Array format: [{ icon: 'save' }, 'Save']
        content = parseButtonContent(btnConfig);
        btnClass = 'so-btn-outline';
        dismiss = true;
      } else if (btnConfig && typeof btnConfig === 'object') {
        // Object format: { content: [...], class: 'so-btn-primary', dismiss: true }
        content = parseButtonContent(btnConfig.content || btnConfig.text || '');
        btnClass = btnConfig.class || 'so-btn-outline';
        dismiss = btnConfig.dismiss !== false;
        onclick = btnConfig.onclick;
      } else {
        return '';
      }

      const dismissAttr = dismiss ? ' data-dismiss="modal"' : '';
      const onclickAttr = onclick ? ` data-modal-btn-index="${index}"` : '';
      return `<button type="button" class="so-btn ${btnClass}"${dismissAttr}${onclickAttr}>${content}</button>`;
    };

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

    // Build footer HTML
    let footerHtml = '';
    let buttonOnclicks = [];
    if (footer) {
      if (typeof footer === 'string') {
        // Legacy string format
        footerHtml = `
          <div class="so-modal-footer">
            ${footer}
          </div>
        `;
      } else if (Array.isArray(footer)) {
        // New flexible array format
        const positionClassMap = {
          left: 'justify-start',
          center: 'justify-center',
          right: 'justify-end',
          between: 'justify-between',
          around: 'justify-around',
        };
        const positionClass = positionClassMap[footerPosition] || 'justify-end';
        const layoutClass = footerLayout === 'stacked' ? 'so-flex-column' : '';
        const footerClasses = [positionClass, layoutClass].filter(Boolean).join(' ');

        const buttons = footer.map((btn, i) => {
          if (btn && typeof btn === 'object' && btn.onclick) {
            buttonOnclicks.push({ index: i, onclick: btn.onclick });
          }
          return createButton(btn, i);
        });

        footerHtml = `
          <div class="so-modal-footer ${footerClasses}">
            ${buttons.join('\n')}
          </div>
        `;
      } else if (typeof footer === 'object' && (footer.left || footer.center || footer.right)) {
        // Sections format: { left: [...], center: [...], right: [...] }
        let btnIndex = 0;

        const createSectionButtons = (buttons) => {
          if (!buttons || !Array.isArray(buttons)) return '';
          return buttons.map(btn => {
            if (btn && typeof btn === 'object' && btn.onclick) {
              buttonOnclicks.push({ index: btnIndex, onclick: btn.onclick });
            }
            return createButton(btn, btnIndex++);
          }).join('\n');
        };

        const leftHtml = footer.left ? `<div class="so-footer-left">${createSectionButtons(footer.left)}</div>` : '<div class="so-footer-left"></div>';
        const centerHtml = footer.center ? `<div class="so-footer-center">${createSectionButtons(footer.center)}</div>` : '<div class="so-footer-center"></div>';
        const rightHtml = footer.right ? `<div class="so-footer-right">${createSectionButtons(footer.right)}</div>` : '<div class="so-footer-right"></div>';

        footerHtml = `
          <div class="so-modal-footer so-footer-sections">
            ${leftHtml}
            ${centerHtml}
            ${rightHtml}
          </div>
        `;
      }
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

    // Attach onclick handlers for buttons that have them
    buttonOnclicks.forEach(({ index, onclick }) => {
      const btn = modal.querySelector(`[data-modal-btn-index="${index}"]`);
      if (btn && typeof onclick === 'function') {
        btn.addEventListener('click', (e) => onclick(e, btn));
      }
    });

    const instance = new SOModal(modal, {
      ...options,
      animation: true,
      static: isStatic,
      focusElement  // Explicitly pass focusElement
    });

    // Store the instance on the element for easy retrieval
    modal._soModalInstance = instance;

    // Remove from DOM when hidden
    modal.addEventListener(SixOrbit.evt(SOModal.EVENTS.HIDDEN), () => {
      modal.remove();
    });

    return instance;
  }

  /**
   * Show a confirmation dialog with flexible button and icon configuration
   *
   * @param {Object} options - Dialog options
   * @param {string} options.title - Dialog title
   * @param {string} options.message - Dialog message
   * @param {Array} options.actions - Array of action objects for multi-action dialogs
   *
   * @param {string|Array|Object} options.confirm - Confirm button (flexible format):
   *   - String: 'Delete' (just text)
   *   - Array: [{ icon: 'delete' }, 'Delete'] (icon + text in order)
   *   - Array: ['Continue', { icon: 'arrow_forward' }] (text + icon)
   *   - Array: [{ icon: 'check' }, 'Save', { icon: 'send' }] (multiple icons)
   *   - Object: { content: [...], class: 'so-btn-danger' } (with class override)
   * @param {string|Array|Object} options.cancel - Cancel button (same format as confirm)
   *
   * @param {string|Object} options.icon - Dialog icon above title:
   *   - String: 'warning' (icon name, type from iconType or auto)
   *   - Object: { name: 'warning', type: 'danger' } (icon with type)
   * @param {string} options.iconType - Icon color: 'danger', 'warning', 'success', 'info'
   *
   * @param {boolean} options.danger - Use danger styling (auto-sets iconType to 'danger')
   * @param {boolean} options.static - Cannot be dismissed without clicking a button
   * @param {string} options.buttonPosition - Footer alignment: 'left', 'center', 'right', 'between', 'around'
   * @param {string} options.buttonLayout - 'inline' (side by side) or 'stacked' (vertical)
   * @param {boolean} options.fullWidthButtons - Make buttons full width
   * @param {boolean} options.reverseButtons - Swap cancel/confirm order
   * @param {boolean} options.showCloseButton - Show X close button in header
   * @param {string} options.focusElement - Element to focus on open: 'footer' (default), 'close', 'first', or CSS selector
   *
   * @param {string} options.confirmText - Legacy: text for confirm button
   * @param {string} options.cancelText - Legacy: text for cancel button
   * @param {string} options.confirmIcon - Legacy: icon on confirm button
   * @param {string} options.confirmIconPosition - Legacy: 'left' or 'right'
   * @param {string} options.cancelIcon - Legacy: icon on cancel button
   * @param {string} options.cancelIconPosition - Legacy: 'left' or 'right'
   *
   * @returns {Promise<string|boolean>} Resolves with action id/true/false or 'dismiss' if closed
   *
   * @example
   * // Flexible button API
   * SOModal.confirm({
   *   title: 'Delete Item',
   *   message: 'This cannot be undone.',
   *   icon: { name: 'delete', type: 'danger' },
   *   confirm: [{ icon: 'delete' }, 'Delete'],
   *   cancel: 'Cancel',
   *   danger: true
   * });
   *
   * @example
   * // Multiple icons on button
   * SOModal.confirm({
   *   confirm: [{ icon: 'cloud_upload' }, 'Upload', { icon: 'check' }]
   * });
   */
  static confirm(options = {}) {
    const {
      title = 'Confirm',
      message = 'Are you sure?',
      actions = null,
      // New flexible button API (takes precedence over legacy options)
      confirm: confirmOpt = null,
      cancel: cancelOpt = null,
      // Legacy button options (for backwards compatibility)
      confirmText = 'Confirm',
      cancelText = 'Cancel',
      confirmClass = 'so-btn-primary',
      confirmIcon = null,
      confirmIconPosition = 'left',
      cancelIcon = null,
      cancelIconPosition = 'left',
      // Styling options
      danger = false,
      closable = true,
      static: isStatic = false,
      // Dialog icon options
      icon = null,
      iconType = null,
      // Layout options
      buttonPosition = 'center',
      buttonLayout = 'inline',
      fullWidthButtons = false,
      reverseButtons = false,
      showCloseButton = false,
      size = 'sm',
      // Focus options
      focusElement = 'footer',
    } = options;

    return new Promise((resolve) => {
      let resolved = false;

      /**
       * Parse button content from various formats:
       * - String: 'Delete' → just text
       * - Array: [{ icon: 'delete' }, 'Delete'] → icon then text
       * - Array: ['Delete', { icon: 'arrow_forward' }] → text then icon
       * - Array: [{ icon: 'check' }, 'Save', { icon: 'send' }] → multiple icons
       * - Object: { content: [...], class: 'so-btn-danger' } → with class override
       */
      const parseButtonContent = (content) => {
        if (typeof content === 'string') {
          return content;
        }
        if (Array.isArray(content)) {
          return content.map(part => {
            if (typeof part === 'string') {
              return part;
            }
            if (part && typeof part === 'object' && part.icon) {
              return `<span class="material-icons">${part.icon}</span>`;
            }
            return '';
          }).join('');
        }
        return '';
      };

      /**
       * Create button HTML from flexible format
       * @param {string|Array|Object} btnConfig - Button configuration
       * @param {string} defaultClass - Default button class
       * @param {string} actionId - Action identifier
       * @param {boolean} isFullWidth - Whether button should be full width
       */
      const createFlexibleButton = (btnConfig, defaultClass, actionId, isFullWidth) => {
        let content, btnClass;

        if (typeof btnConfig === 'string') {
          // Simple string: 'Delete'
          content = btnConfig;
          btnClass = defaultClass;
        } else if (Array.isArray(btnConfig)) {
          // Array format: [{ icon: 'delete' }, 'Delete']
          content = parseButtonContent(btnConfig);
          btnClass = defaultClass;
        } else if (btnConfig && typeof btnConfig === 'object') {
          // Object format: { content: [...], class: 'so-btn-danger' }
          content = parseButtonContent(btnConfig.content || btnConfig.text || '');
          btnClass = btnConfig.class || defaultClass;
        } else {
          content = '';
          btnClass = defaultClass;
        }

        const widthClass = isFullWidth ? ' so-w-100' : '';
        return `<button type="button" class="so-btn ${btnClass}${widthClass}" data-modal-action="${actionId}">${content}</button>`;
      };

      /**
       * Legacy helper to create button HTML with optional icon
       * (kept for backwards compatibility with old options)
       */
      const createLegacyButton = (text, btnClass, actionId, btnIcon, iconPos, isFullWidth) => {
        const iconHtml = btnIcon ? `<span class="material-icons">${btnIcon}</span>` : '';
        const widthClass = isFullWidth ? ' so-w-100' : '';
        if (iconPos === 'right') {
          return `<button type="button" class="so-btn ${btnClass}${widthClass}" data-modal-action="${actionId}">${text}${iconHtml}</button>`;
        }
        return `<button type="button" class="so-btn ${btnClass}${widthClass}" data-modal-action="${actionId}">${iconHtml}${text}</button>`;
      };

      // Build footer HTML
      let footerHtml = '';
      let useSectionsLayout = false;

      if (actions && Array.isArray(actions)) {
        // Multiple actions mode - supports both new and legacy format in action objects
        const buttons = actions.map(action => {
          if (action.content || Array.isArray(action.content)) {
            // New format in actions: { id: 'save', content: [{ icon: 'save' }, 'Save'], class: 'so-btn-primary' }
            return createFlexibleButton(
              { content: action.content, class: action.class || (action.primary ? 'so-btn-primary' : 'so-btn-outline') },
              action.class || (action.primary ? 'so-btn-primary' : 'so-btn-outline'),
              action.id,
              fullWidthButtons
            );
          }
          // Legacy format in actions: { id: 'save', text: 'Save', icon: 'save', class: 'so-btn-primary' }
          const btnClass = action.class || (action.primary ? 'so-btn-primary' : 'so-btn-outline');
          return createLegacyButton(action.text, btnClass, action.id, action.icon, action.iconPosition || 'left', fullWidthButtons);
        });
        footerHtml = buttons.join('\n');
      } else if (actions && typeof actions === 'object' && (actions.left || actions.center || actions.right)) {
        // Sections format: { left: [...], center: [...], right: [...] }
        useSectionsLayout = true;
        const defaultConfirmClass = danger ? 'so-btn-danger' : confirmClass;

        const createSectionButton = (btn) => {
          if (btn.content || Array.isArray(btn.content) || typeof btn === 'string' || Array.isArray(btn)) {
            const btnClass = btn.class || (btn.primary ? defaultConfirmClass : 'so-btn-outline');
            return createFlexibleButton(btn, btnClass, btn.id || btn.action || 'action', fullWidthButtons);
          }
          const btnClass = btn.class || (btn.primary ? defaultConfirmClass : 'so-btn-outline');
          return createLegacyButton(btn.text || '', btnClass, btn.id || btn.action || 'action', btn.icon, btn.iconPosition || 'left', fullWidthButtons);
        };

        const createSection = (buttons) => {
          if (!buttons || !Array.isArray(buttons)) return '';
          return buttons.map(createSectionButton).join('\n');
        };

        const leftHtml = `<div class="so-footer-left">${createSection(actions.left)}</div>`;
        const centerHtml = `<div class="so-footer-center">${createSection(actions.center)}</div>`;
        const rightHtml = `<div class="so-footer-right">${createSection(actions.right)}</div>`;

        footerHtml = `${leftHtml}\n${centerHtml}\n${rightHtml}`;
      } else {
        // Simple confirm/cancel mode
        const defaultConfirmClass = danger ? 'so-btn-danger' : confirmClass;

        let cancelBtn, confirmBtn;

        // Use new flexible API if provided, otherwise fall back to legacy options
        if (cancelOpt !== null) {
          cancelBtn = createFlexibleButton(cancelOpt, 'so-btn-outline', 'cancel', fullWidthButtons);
        } else {
          cancelBtn = createLegacyButton(cancelText, 'so-btn-outline', 'cancel', cancelIcon, cancelIconPosition, fullWidthButtons);
        }

        if (confirmOpt !== null) {
          confirmBtn = createFlexibleButton(confirmOpt, defaultConfirmClass, 'confirm', fullWidthButtons);
        } else {
          confirmBtn = createLegacyButton(confirmText, defaultConfirmClass, 'confirm', confirmIcon, confirmIconPosition, fullWidthButtons);
        }

        // Order buttons based on reverseButtons
        footerHtml = reverseButtons ? `${confirmBtn}\n${cancelBtn}` : `${cancelBtn}\n${confirmBtn}`;
      }

      /**
       * Parse dialog icon from various formats:
       * - String: 'arrow_forward' → use iconType or default
       * - Object: { name: 'arrow_forward', type: 'info' }
       * - Object: { icon: 'arrow_forward', type: 'warning' }
       */
      let resolvedIconName = null;
      let resolvedIconType = iconType || (danger ? 'danger' : 'info');

      if (icon) {
        if (typeof icon === 'string') {
          resolvedIconName = icon;
        } else if (typeof icon === 'object') {
          resolvedIconName = icon.name || icon.icon || null;
          if (icon.type) {
            resolvedIconType = icon.type;
          }
        }
      }

      // Build content HTML
      let contentHtml = '';
      if (resolvedIconName) {
        // Use centered confirm dialog layout
        contentHtml = `
          <div class="so-confirm-icon so-${resolvedIconType}">
            <span class="material-icons">${resolvedIconName}</span>
          </div>
          <h3 class="so-confirm-title">${title}</h3>
          <p class="so-confirm-message">${message}</p>
        `;
      } else {
        contentHtml = `<p>${message}</p>`;
      }

      // Build footer classes
      let footerClasses = '';
      if (useSectionsLayout) {
        footerClasses = 'so-footer-sections';
      } else {
        const positionClassMap = {
          left: 'justify-start',
          center: 'justify-center',
          right: 'justify-end',
          between: 'justify-between',
          around: 'justify-around',
        };
        const positionClass = positionClassMap[buttonPosition] || 'justify-center';
        const layoutClass = buttonLayout === 'stacked' ? 'so-flex-column' : '';
        footerClasses = [positionClass, layoutClass].filter(Boolean).join(' ');
      }

      // Modal classes
      const modalClasses = resolvedIconName ? 'so-confirm-dialog' : '';

      // Create modal with custom structure for centered icon layout
      const modalEl = document.createElement('div');
      modalEl.className = `so-modal so-fade so-modal-${size} ${modalClasses}`.trim();
      modalEl.tabIndex = -1;

      // Build header HTML - only close button if showCloseButton is true
      let headerHtml = '';
      if (resolvedIconName) {
        // For centered layout, header only contains close button (if shown)
        if (showCloseButton && !isStatic) {
          headerHtml = `
            <div class="so-modal-header" style="border-bottom: none; padding-bottom: 0; justify-content: flex-end;">
              <button type="button" class="so-modal-close" data-dismiss="modal">
                <span class="material-icons">close</span>
              </button>
            </div>
          `;
        }
      } else {
        // Regular layout with title in header
        const closeBtn = (showCloseButton && !isStatic)
          ? '<button type="button" class="so-modal-close" data-dismiss="modal"><span class="material-icons">close</span></button>'
          : '';
        headerHtml = `
          <div class="so-modal-header">
            <h5 class="so-modal-title">${title}</h5>
            ${closeBtn}
          </div>
        `;
      }

      modalEl.innerHTML = `
        <div class="so-modal-dialog">
          <div class="so-modal-content">
            ${headerHtml}
            <div class="so-modal-body">
              ${contentHtml}
            </div>
            <div class="so-modal-footer ${footerClasses}">
              ${footerHtml}
            </div>
          </div>
        </div>
      `;

      document.body.appendChild(modalEl);

      const modal = new SOModal(modalEl, {
        animation: true,
        static: isStatic,
        closable: isStatic ? false : closable,
        keyboard: !isStatic,
        focusElement,
      });

      // Store instance on element
      modalEl._soModalInstance = modal;

      // Remove from DOM when hidden
      modalEl.addEventListener(SixOrbit.evt(SOModal.EVENTS.HIDDEN), () => {
        modalEl.remove();
      });

      // Handle action button clicks
      modalEl.querySelectorAll('[data-modal-action]').forEach(btn => {
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
      modalEl.addEventListener(SixOrbit.evt(SOModal.EVENTS.HIDDEN), () => {
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

// Global click handler for data-so-toggle="modal"
document.addEventListener('click', (e) => {
  const trigger = e.target.closest('[data-so-toggle="modal"]');
  if (!trigger) return;

  e.preventDefault();

  const targetSelector = trigger.getAttribute('data-so-target') || trigger.getAttribute('href');
  if (!targetSelector) return;

  const modalEl = document.querySelector(targetSelector);
  if (!modalEl) return;

  const modal = SOModal.getInstance(modalEl);
  if (modal) {
    modal.show();
  }
});

// Expose to global scope
window.SOModal = SOModal;

// Export for ES modules
export default SOModal;
export { SOModal };
