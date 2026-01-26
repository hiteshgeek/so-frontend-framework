// ============================================
// SIXORBIT UI - LAYOUT COMPONENTS
// Sidebar and Navbar controllers
// ============================================

import SixOrbit from '../core/so-config.js';
import SOComponent from '../core/so-component.js';

// ============================================
// SIDEBAR COMPONENT
// ============================================

/**
 * SOSidebar - Sidebar layout component
 * Handles sidebar collapse/expand, pinning, mobile menu, and submenu navigation
 */
class SOSidebar extends SOComponent {
  static NAME = 'sidebar';

  static DEFAULTS = {
    mainContentSelector: '.so-main-content',
    overlaySelector: '.so-sidebar-overlay',
    toggleSelector: '.so-sidebar-toggle',
    storageKey: 'sidebar-state',
    breakpoint: 768,
  };

  static EVENTS = {
    TOGGLE: 'sidebar:toggle',
    PIN: 'sidebar:pin',
    MOBILE_OPEN: 'sidebar:mobile:open',
    MOBILE_CLOSE: 'sidebar:mobile:close',
    SUBMENU_TOGGLE: 'sidebar:submenu:toggle',
  };

  /**
   * Initialize the sidebar
   * @private
   */
  _init() {
    // Cache DOM elements
    this._mainContent = document.querySelector(this.options.mainContentSelector);
    this._overlay = document.querySelector(this.options.overlaySelector);
    this._toggle = this.$(this.options.toggleSelector);

    // State
    this._isMobile = false;
    this._isCollapsed = true;
    this._isOpen = false;

    // Disable transitions initially
    this.addClass('no-transition');

    // Check viewport and restore state
    this._checkMobile();
    this._restoreState();

    // Bind events
    this._bindEvents();

    // Initialize submenu state
    this._initSubmenuArrows();
    this._initSubmenuState();

    // Update body class
    this._updateBodyClass();

    // Re-enable transitions after paint
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        this.removeClass('no-transition');
        document.documentElement.classList.remove('sidebar-collapsed', 'sidebar-pinned');
      });
    });
  }

  /**
   * Bind event listeners
   * @private
   */
  _bindEvents() {
    // Window resize
    this.on('resize', SixOrbit.debounce(() => {
      this._checkMobile();
      if (this._isMobile) {
        this._closeMobile();
      }
      this._updateBodyClass();
    }, 150), window);

    // Toggle button (pin/unpin)
    if (this._toggle) {
      this.on('click', this._handleToggleClick, this._toggle);
    }

    // Mobile toggle buttons
    document.querySelectorAll('[data-toggle="sidebar"]').forEach(btn => {
      this.on('click', this._handleMobileToggle, btn);
    });

    // Overlay click
    if (this._overlay) {
      this.on('click', () => this._closeMobile(), this._overlay);
    }

    // Submenu toggle
    this.delegate('click', '.so-sidebar-link', this._handleSubmenuClick);

    // Escape key
    this.on('keydown', this._handleKeydown, document);
  }

  /**
   * Handle toggle button click
   * @param {Event} e - Click event
   * @private
   */
  _handleToggleClick(e) {
    e.preventDefault();
    e.stopPropagation();
    this.togglePinned();
  }

  /**
   * Handle mobile toggle button click
   * @param {Event} e - Click event
   * @private
   */
  _handleMobileToggle(e) {
    e.preventDefault();
    if (this._isMobile) {
      this.toggleMobile();
    } else {
      this.togglePinned();
    }
  }

  /**
   * Handle submenu link click
   * @param {Event} e - Click event
   * @param {Element} link - Clicked link element
   * @private
   */
  _handleSubmenuClick(e, link) {
    const item = link.parentElement;
    const submenu = item.querySelector('.so-sidebar-submenu');

    if (submenu) {
      e.preventDefault();
      this._toggleSubmenu(item);
    }
  }

  /**
   * Handle keyboard events
   * @param {KeyboardEvent} e - Keyboard event
   * @private
   */
  _handleKeydown(e) {
    if (e.key === 'Escape' && this._isMobile && this._isOpen) {
      this._closeMobile();
    }
  }

  /**
   * Check if viewport is mobile
   * @private
   */
  _checkMobile() {
    this._isMobile = window.innerWidth <= this.options.breakpoint;
  }

  /**
   * Update body class based on sidebar state
   * @private
   */
  _updateBodyClass() {
    if (this._isCollapsed && !this._isMobile) {
      document.body.classList.add('sidebar-collapsed');
    } else {
      document.body.classList.remove('sidebar-collapsed');
    }
  }

  // ============================================
  // PIN/COLLAPSE
  // ============================================

  /**
   * Toggle pinned state
   * @returns {this} For chaining
   */
  togglePinned() {
    this._isCollapsed = !this._isCollapsed;

    if (this._isCollapsed) {
      this.addClass('collapsed');
      this.removeClass('pinned');
    } else {
      this.removeClass('collapsed');
      this.addClass('pinned');
    }

    this._updateBodyClass();
    this._saveState(this._isCollapsed ? 'collapsed' : 'pinned');

    this.emit(SOSidebar.EVENTS.PIN, {
      pinned: !this._isCollapsed,
      collapsed: this._isCollapsed,
    });

    return this;
  }

  /**
   * Pin the sidebar (expand)
   * @returns {this} For chaining
   */
  pin() {
    if (!this._isCollapsed) return this;
    return this.togglePinned();
  }

  /**
   * Unpin the sidebar (collapse)
   * @returns {this} For chaining
   */
  unpin() {
    if (this._isCollapsed) return this;
    return this.togglePinned();
  }

  /**
   * Check if sidebar is pinned
   * @returns {boolean} Pinned state
   */
  isPinned() {
    return !this._isCollapsed;
  }

  // ============================================
  // MOBILE
  // ============================================

  /**
   * Toggle mobile sidebar
   * @returns {this} For chaining
   */
  toggleMobile() {
    return this._isOpen ? this._closeMobile() : this._openMobile();
  }

  /**
   * Open mobile sidebar
   * @returns {this} For chaining
   * @private
   */
  _openMobile() {
    this._isOpen = true;
    this.addClass('open');
    this._overlay?.classList.add('active');
    document.body.classList.add('sidebar-open');
    document.body.style.overflow = 'hidden';

    this.emit(SOSidebar.EVENTS.MOBILE_OPEN);
    return this;
  }

  /**
   * Close mobile sidebar
   * @returns {this} For chaining
   * @private
   */
  _closeMobile() {
    this._isOpen = false;
    this.removeClass('open');
    this._overlay?.classList.remove('active');
    document.body.classList.remove('sidebar-open');
    document.body.style.overflow = '';

    this.emit(SOSidebar.EVENTS.MOBILE_CLOSE);
    return this;
  }

  // ============================================
  // SUBMENU
  // ============================================

  /**
   * Toggle submenu
   * @param {Element} item - Sidebar item element
   * @private
   */
  _toggleSubmenu(item) {
    const isOpen = item.classList.contains('open');
    const parent = item.parentElement;

    // Batch DOM changes
    requestAnimationFrame(() => {
      // Close siblings
      parent.querySelectorAll(':scope > .so-sidebar-item.open').forEach(sibling => {
        if (sibling !== item) {
          sibling.classList.remove('open');
        }
      });

      // Toggle current
      item.classList.toggle('open', !isOpen);
    });

    this.emit(SOSidebar.EVENTS.SUBMENU_TOGGLE, {
      item,
      open: !isOpen,
    });
  }

  /**
   * Initialize arrows for nested submenu items
   * @private
   */
  _initSubmenuArrows() {
    this.$$('.so-sidebar-submenu .so-sidebar-item').forEach(item => {
      const nestedSubmenu = item.querySelector(':scope > .so-sidebar-submenu');
      if (nestedSubmenu) {
        item.classList.add('has-children');

        const link = item.querySelector(':scope > .so-sidebar-link');
        if (link && !link.querySelector('.so-sidebar-arrow')) {
          const arrow = document.createElement('span');
          arrow.className = 'so-sidebar-arrow';
          arrow.innerHTML = '<span class="material-icons">chevron_right</span>';
          link.appendChild(arrow);
        }
      }
    });
  }

  /**
   * Initialize submenu state based on active items
   * @private
   */
  _initSubmenuState() {
    this.$$('.so-sidebar-item.current, .so-sidebar-item.active').forEach(item => {
      let parent = item.parentElement.closest('.so-sidebar-item');
      while (parent) {
        parent.classList.add('open');
        parent = parent.parentElement.closest('.so-sidebar-item');
      }
    });
  }

  // ============================================
  // STATE PERSISTENCE
  // ============================================

  /**
   * Save sidebar state to storage
   * @param {string} state - State value
   * @private
   */
  _saveState(state) {
    SixOrbit.setStorage(this.options.storageKey, state);
  }

  /**
   * Restore sidebar state from storage
   * @private
   */
  _restoreState() {
    if (this._isMobile) return;

    const state = SixOrbit.getStorage(this.options.storageKey);
    if (state === 'pinned') {
      this._isCollapsed = false;
      this.removeClass('collapsed');
      this.addClass('pinned');
    } else {
      this._isCollapsed = true;
      this.addClass('collapsed');
    }
  }
}

// ============================================
// NAVBAR COMPONENT
// ============================================

/**
 * SONavbar - Navbar component
 * Handles navbar dropdowns and interactions
 */
class SONavbar extends SOComponent {
  static NAME = 'navbar';

  static DEFAULTS = {
    searchInputSelector: '.so-navbar-search-input',
    userBtnSelector: '.so-navbar-user-btn',
    userDropdownSelector: '.so-navbar-user-dropdown',
    appsBtnSelector: '.so-navbar-apps-btn',
    appsContainerSelector: '.so-navbar-apps',
    outletBtnSelector: '.so-navbar-outlet-btn',
    outletDropdownSelector: '.so-navbar-outlet-dropdown',
    statusBtnSelector: '.so-navbar-status-btn',
    statusDropdownSelector: '.so-navbar-status-dropdown',
    themeBtnSelector: '.so-navbar-theme-btn',
    themeDropdownSelector: '.so-navbar-theme-dropdown',
    keyboardBtnSelector: '#keyboardShortcutsBtn',
  };

  static EVENTS = {
    SEARCH: 'navbar:search',
    DROPDOWN_OPEN: 'navbar:dropdown:open',
    DROPDOWN_CLOSE: 'navbar:dropdown:close',
    OUTLET_CHANGE: 'navbar:outlet:change',
    STATUS_CHANGE: 'navbar:status:change',
  };

  /**
   * Initialize the navbar
   * @private
   */
  _init() {
    this._activeDropdown = null;
    this._bindEvents();
    this._initOutletSelector();
    this._initStatusSelector();
    this._initThemeSwitcher();
    this._initKeyboardShortcuts();
  }

  /**
   * Bind event listeners
   * @private
   */
  _bindEvents() {
    // Search input focus - open search overlay
    const searchInput = this.$(this.options.searchInputSelector);
    if (searchInput) {
      this.on('focus', () => {
        if (window.soSearchOverlay) {
          window.soSearchOverlay.open();
        }
      }, searchInput);
    }

    // User dropdown
    const userBtn = this.$(this.options.userBtnSelector);
    const userDropdown = this.$(this.options.userDropdownSelector);
    if (userBtn && userDropdown) {
      this.on('click', (e) => {
        e.stopPropagation();
        this._toggleDropdown(userDropdown, 'user');
      }, userBtn);
    }

    // Apps dropdown
    const appsContainer = this.$(this.options.appsContainerSelector);
    const appsBtn = this.$(this.options.appsBtnSelector);
    if (appsContainer && appsBtn) {
      this.on('click', (e) => {
        e.stopPropagation();
        this._toggleDropdown(appsContainer, 'apps', 'open');
      }, appsBtn);
    }

    // Close dropdowns on outside click
    this.on('click', (e) => {
      // Don't close if clicking inside a dropdown
      if (!e.target.closest('.so-navbar-outlet-dropdown, .so-navbar-status-dropdown, .so-navbar-theme-dropdown, .so-navbar-user-dropdown, .so-navbar-apps-dropdown')) {
        this.closeAllDropdowns();
      }
    }, document);

    // Close on escape
    this.on('keydown', (e) => {
      if (e.key === 'Escape') {
        this.closeAllDropdowns();
      }
    }, document);

    // Listen for global close event
    this.on('closeAllDropdowns', () => this.closeAllDropdowns(), document);
  }

  /**
   * Initialize outlet selector
   * @private
   */
  _initOutletSelector() {
    const outletBtn = this.$(this.options.outletBtnSelector);
    const outletDropdown = this.$(this.options.outletDropdownSelector);

    if (!outletBtn || !outletDropdown) return;

    // Toggle dropdown
    this.on('click', (e) => {
      e.stopPropagation();
      this._toggleDropdown(outletDropdown, 'outlet');
    }, outletBtn);

    // Handle outlet selection
    outletDropdown.querySelectorAll('.so-navbar-outlet-item').forEach(item => {
      this.on('click', (e) => {
        e.stopPropagation();
        const value = item.dataset.value;
        const text = item.querySelector('span:first-child')?.textContent || item.textContent;

        // Update selected state
        outletDropdown.querySelectorAll('.so-navbar-outlet-item').forEach(i => {
          i.classList.toggle('selected', i === item);
        });

        // Update button text
        const btnText = outletBtn.querySelector('.outlet-text');
        if (btnText) btnText.textContent = text;

        this.emit(SONavbar.EVENTS.OUTLET_CHANGE, { value, text });
        this.closeAllDropdowns();
      }, item);
    });

    // Search filter
    const searchInput = outletDropdown.querySelector('input');
    if (searchInput) {
      this.on('input', (e) => {
        const query = e.target.value.toLowerCase();
        outletDropdown.querySelectorAll('.so-navbar-outlet-item').forEach(item => {
          const text = item.textContent.toLowerCase();
          item.style.display = text.includes(query) ? '' : 'none';
        });
      }, searchInput);
    }
  }

  /**
   * Initialize status selector
   * @private
   */
  _initStatusSelector() {
    const statusBtn = this.$(this.options.statusBtnSelector);
    const statusDropdown = this.$(this.options.statusDropdownSelector);
    // Status dropdown requires 'open' class on parent .so-navbar-status container
    const statusContainer = statusBtn?.closest('.so-navbar-status');

    if (!statusBtn || !statusDropdown || !statusContainer) return;

    // Toggle dropdown - add 'open' to parent container
    this.on('click', (e) => {
      e.stopPropagation();
      this._toggleStatusDropdown(statusContainer);
    }, statusBtn);

    // Handle status selection
    statusDropdown.querySelectorAll('.so-navbar-status-option').forEach(option => {
      this.on('click', (e) => {
        e.stopPropagation();
        const status = option.dataset.status;
        const text = option.querySelector('.so-navbar-status-option-text > div:first-child')?.textContent;

        // Update selected state
        statusDropdown.querySelectorAll('.so-navbar-status-option').forEach(o => {
          o.classList.toggle('selected', o === option);
        });

        // Update button indicator and text
        const indicator = statusBtn.querySelector('.so-navbar-status-indicator');
        const textEl = statusBtn.querySelector('.so-navbar-status-text');
        if (indicator) {
          indicator.className = `so-navbar-status-indicator ${status}`;
        }
        if (textEl && text) {
          textEl.textContent = text;
        }

        this.emit(SONavbar.EVENTS.STATUS_CHANGE, { status, text });
        this.closeAllDropdowns();
      }, option);
    });
  }

  /**
   * Initialize theme switcher
   * @private
   */
  _initThemeSwitcher() {
    const themeBtn = this.$(this.options.themeBtnSelector);
    const themeDropdown = this.$(this.options.themeDropdownSelector);

    if (!themeBtn || !themeDropdown) return;

    // Toggle dropdown
    this.on('click', (e) => {
      e.stopPropagation();
      this._toggleDropdown(themeDropdown, 'theme');
    }, themeBtn);

    // Theme options handled by so-theme.js
  }

  /**
   * Initialize keyboard shortcuts button
   * @private
   */
  _initKeyboardShortcuts() {
    const keyboardBtn = this.$(this.options.keyboardBtnSelector);
    if (!keyboardBtn) return;

    this.on('click', (e) => {
      e.stopPropagation();
      // Trigger keyboard shortcuts modal
      if (window.soKeyboardShortcuts) {
        window.soKeyboardShortcuts.show();
      } else {
        // Simple alert for now - should be replaced with proper modal
        console.log('Keyboard shortcuts modal not implemented yet');
        alert('Keyboard Shortcuts:\n\nCtrl+K - Open Search\nCtrl+S - New Sales Invoice\nCtrl+P - New Purchase Bill\nCtrl+R - Receipt Entry\nCtrl+Y - Payment Entry\nEsc - Close dialogs');
      }
    }, keyboardBtn);
  }

  /**
   * Toggle a dropdown
   * @param {Element} dropdown - Dropdown element
   * @param {string} type - Dropdown type identifier
   * @param {string} activeClass - Class to toggle (default: 'active')
   * @private
   */
  _toggleDropdown(dropdown, type, activeClass = 'active') {
    const isActive = dropdown.classList.contains(activeClass);

    // Close all first
    this.closeAllDropdowns();

    if (!isActive) {
      dropdown.classList.add(activeClass);
      this._activeDropdown = { dropdown, type };

      this.emit(SONavbar.EVENTS.DROPDOWN_OPEN, { dropdown, type });
    }
  }

  /**
   * Toggle status dropdown (uses 'open' on parent container)
   * @param {Element} container - Status container element (.so-navbar-status)
   * @private
   */
  _toggleStatusDropdown(container) {
    const isOpen = container.classList.contains('open');

    // Close all first
    this.closeAllDropdowns();

    if (!isOpen) {
      container.classList.add('open');
      this._activeDropdown = { dropdown: container, type: 'status' };

      this.emit(SONavbar.EVENTS.DROPDOWN_OPEN, { dropdown: container, type: 'status' });
    }
  }

  /**
   * Close all dropdowns
   * @returns {this} For chaining
   */
  closeAllDropdowns() {
    // Close user dropdown
    this.$$('.so-navbar-user-dropdown').forEach(dropdown => {
      dropdown.classList.remove('active');
    });
    this.$$('.so-navbar-user-btn').forEach(btn => {
      btn.classList.remove('active');
    });

    // Close apps dropdown
    const appsContainer = this.$(this.options.appsContainerSelector);
    if (appsContainer) {
      appsContainer.classList.remove('open');
    }

    // Close outlet dropdown
    this.$$('.so-navbar-outlet-dropdown').forEach(dropdown => {
      dropdown.classList.remove('active');
    });

    // Close status dropdown (uses 'open' on parent container)
    this.$$('.so-navbar-status').forEach(container => {
      container.classList.remove('open');
    });

    // Close theme dropdown
    this.$$('.so-navbar-theme-dropdown').forEach(dropdown => {
      dropdown.classList.remove('active');
    });

    this._activeDropdown = null;
    this.emit(SONavbar.EVENTS.DROPDOWN_CLOSE);
    return this;
  }
}

// Register components
SOSidebar.register();
SONavbar.register();

// Expose to global scope
window.SOSidebar = SOSidebar;
window.SONavbar = SONavbar;

// Export for ES modules
export { SOSidebar, SONavbar };
export default SOSidebar;
