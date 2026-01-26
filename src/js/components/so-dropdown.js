// ============================================
// SIXORBIT UI - DROPDOWN COMPONENT
// Handles all dropdown variations
// ============================================

import SixOrbit from '../core/so-config.js';
import SOComponent from '../core/so-component.js';

/**
 * SODropdown - Base dropdown component
 * Supports standard, searchable, options, and outlet dropdowns
 */
class SODropdown extends SOComponent {
  static NAME = 'dropdown';

  static DEFAULTS = {
    closeOnSelect: true,
    closeOnOutsideClick: true,
    openOnFocus: false,
    searchable: false,
    placeholder: 'Select option',
    searchPlaceholder: 'Search...',
    noResultsText: 'No results found',
  };

  static EVENTS = {
    OPEN: 'dropdown:open',
    CLOSE: 'dropdown:close',
    CHANGE: 'dropdown:change',
    SEARCH: 'dropdown:search',
  };

  /**
   * Initialize the dropdown
   * @private
   */
  _init() {
    // Detect dropdown type
    this._type = this._detectType();

    // Cache elements based on type
    this._cacheElements();

    // State
    this._isOpen = false;
    this._selectedValue = null;
    this._selectedText = null;
    this._originalItems = [];

    // Store original items for filtering
    if (this._itemsList) {
      this._originalItems = Array.from(this._itemsList.children);
    }

    // Get initial selection
    this._getInitialSelection();

    // Bind events
    this._bindEvents();
  }

  /**
   * Detect dropdown type based on classes
   * @returns {string} Dropdown type
   * @private
   */
  _detectType() {
    if (this.hasClass('so-searchable-dropdown')) return 'searchable';
    if (this.hasClass('so-options-dropdown')) return 'options';
    if (this.hasClass('so-outlet-dropdown')) return 'outlet';
    return 'standard';
  }

  /**
   * Cache DOM elements based on type
   * @private
   */
  _cacheElements() {
    switch (this._type) {
      case 'searchable':
        this._trigger = this.$('.so-searchable-trigger');
        this._menu = this.$('.so-searchable-menu');
        this._searchInput = this.$('.so-searchable-input');
        this._itemsList = this.$('.so-searchable-items');
        this._selectedEl = this.$('.so-searchable-selected');
        break;

      case 'options':
        this._trigger = this.$('.so-options-trigger');
        this._menu = this.$('.so-options-menu');
        break;

      case 'outlet':
        this._trigger = this.$('.so-outlet-dropdown-trigger');
        this._menu = this.$('.so-outlet-dropdown-menu');
        this._searchInput = this.$('.so-outlet-dropdown-search input');
        this._itemsList = this.$('.so-outlet-dropdown-list');
        this._selectedEl = this.$('.outlet-text');
        break;

      default:
        this._trigger = this.$('.so-dropdown-trigger');
        this._menu = this.$('.so-dropdown-menu');
        this._selectedEl = this.$('.so-dropdown-selected');
    }
  }

  /**
   * Get initial selection from DOM
   * @private
   */
  _getInitialSelection() {
    const selectedItem = this._menu?.querySelector('.selected');
    if (selectedItem) {
      this._selectedValue = selectedItem.dataset.value;
      this._selectedText = selectedItem.textContent.trim();
    }
  }

  /**
   * Bind event listeners
   * @private
   */
  _bindEvents() {
    // Trigger click
    if (this._trigger) {
      this.on('click', this._handleTriggerClick, this._trigger);
    }

    // Item selection
    const itemSelector = this._getItemSelector();
    if (itemSelector) {
      this.delegate('click', itemSelector, this._handleItemClick);
    }

    // Search input
    if (this._searchInput) {
      this.on('input', this._handleSearch, this._searchInput);
      this.on('click', (e) => e.stopPropagation(), this._searchInput);
    }

    // Prevent menu from closing when clicking inside
    if (this._menu) {
      this.on('click', (e) => e.stopPropagation(), this._menu);
    }

    // Close on outside click
    if (this.options.closeOnOutsideClick) {
      this.on('click', this._handleOutsideClick, document);
    }

    // Keyboard navigation
    this.on('keydown', this._handleKeydown, this.element);
  }

  /**
   * Get item selector based on type
   * @returns {string} CSS selector
   * @private
   */
  _getItemSelector() {
    switch (this._type) {
      case 'searchable': return '.so-searchable-item';
      case 'options': return '.so-options-item';
      case 'outlet': return '.so-outlet-dropdown-item';
      default: return '.so-dropdown-item';
    }
  }

  /**
   * Handle trigger click
   * @param {Event} e - Click event
   * @private
   */
  _handleTriggerClick(e) {
    e.stopPropagation();

    // Close other dropdowns
    this._closeOtherDropdowns();

    // Calculate position for options dropdown
    if (this._type === 'options' && !this._isOpen) {
      this._positionMenu();
    }

    this.toggle();
  }

  /**
   * Handle item click
   * @param {Event} e - Click event
   * @param {Element} item - Clicked item
   * @private
   */
  _handleItemClick(e, item) {
    e.stopPropagation();

    // Options dropdown emits action event
    if (this._type === 'options') {
      const action = item.dataset.action;
      this.emit('action', { action, element: item });
      if (this.options.closeOnSelect) {
        this.close();
      }
      return;
    }

    // Other dropdowns handle selection
    const value = item.dataset.value;
    const text = this._type === 'outlet'
      ? item.querySelector('.outlet-item-text')?.textContent.trim() || item.textContent.trim()
      : item.textContent.trim();

    this.select(value, text);

    if (this.options.closeOnSelect) {
      this.close();
    }
  }

  /**
   * Handle search input
   * @param {Event} e - Input event
   * @private
   */
  _handleSearch(e) {
    const query = e.target.value.toLowerCase().trim();
    this._filterItems(query);

    this.emit(SODropdown.EVENTS.SEARCH, { query });
  }

  /**
   * Filter items by search query
   * @param {string} query - Search query
   * @private
   */
  _filterItems(query) {
    this._originalItems.forEach(item => {
      const text = item.textContent.toLowerCase();
      const matches = !query || text.includes(query);
      item.style.display = matches ? '' : 'none';
    });
  }

  /**
   * Handle outside click
   * @private
   */
  _handleOutsideClick() {
    if (this._isOpen) {
      this.close();
    }
  }

  /**
   * Handle keyboard navigation
   * @param {KeyboardEvent} e - Keyboard event
   * @private
   */
  _handleKeydown(e) {
    if (e.key === 'Escape' && this._isOpen) {
      e.preventDefault();
      this.close();
      this._trigger?.focus();
    }

    if (e.key === 'ArrowDown' && !this._isOpen) {
      e.preventDefault();
      this.open();
    }
  }

  /**
   * Close other open dropdowns
   * @private
   */
  _closeOtherDropdowns() {
    document.querySelectorAll('.so-dropdown.open, .so-searchable-dropdown.open, .so-options-dropdown.open, .so-outlet-dropdown.open').forEach(dropdown => {
      if (dropdown !== this.element) {
        dropdown.classList.remove('open', 'position-left', 'position-top');
      }
    });
  }

  /**
   * Position options dropdown menu
   * @private
   */
  _positionMenu() {
    if (this._type !== 'options') return;

    // Reset position classes
    this.removeClass('position-left', 'position-top');

    const triggerRect = this._trigger.getBoundingClientRect();
    const menuWidth = this._menu.offsetWidth || 180;
    const menuHeight = this._menu.offsetHeight || 150;

    const viewportWidth = window.innerWidth;
    const viewportHeight = window.innerHeight;

    const spaceRight = viewportWidth - triggerRect.right;
    const spaceBottom = viewportHeight - triggerRect.bottom;
    const spaceTop = triggerRect.top;

    // Horizontal position
    if (spaceRight >= menuWidth) {
      this.addClass('position-left');
    }

    // Vertical position
    if (spaceBottom < menuHeight + 10 && spaceTop > menuHeight + 10) {
      this.addClass('position-top');
    }
  }

  // ============================================
  // PUBLIC API
  // ============================================

  /**
   * Open the dropdown
   * @returns {this} For chaining
   */
  open() {
    if (this._isOpen) return this;

    this._isOpen = true;
    this.addClass('open');

    // Focus search input if present
    if (this._searchInput) {
      setTimeout(() => this._searchInput.focus(), 50);
    }

    this.emit(SODropdown.EVENTS.OPEN);
    return this;
  }

  /**
   * Close the dropdown
   * @returns {this} For chaining
   */
  close() {
    if (!this._isOpen) return this;

    this._isOpen = false;
    this.removeClass('open', 'position-left', 'position-top');

    // Clear search
    if (this._searchInput) {
      this._searchInput.value = '';
      this._filterItems('');
    }

    this.emit(SODropdown.EVENTS.CLOSE);
    return this;
  }

  /**
   * Toggle the dropdown
   * @returns {this} For chaining
   */
  toggle() {
    return this._isOpen ? this.close() : this.open();
  }

  /**
   * Select an option
   * @param {string} value - Option value
   * @param {string} [text] - Display text
   * @returns {this} For chaining
   */
  select(value, text) {
    const previousValue = this._selectedValue;

    this._selectedValue = value;
    this._selectedText = text;

    // Update display
    if (this._selectedEl) {
      this._selectedEl.textContent = text;
    }

    // Update selected state in menu
    const itemSelector = this._getItemSelector();
    this.$$(itemSelector).forEach(item => {
      item.classList.toggle('selected', item.dataset.value === value);
    });

    // Emit change event
    this.emit(SODropdown.EVENTS.CHANGE, {
      value,
      text,
      previousValue,
    });

    return this;
  }

  /**
   * Get selected value
   * @returns {string|null} Selected value
   */
  getValue() {
    return this._selectedValue;
  }

  /**
   * Get selected text
   * @returns {string|null} Selected text
   */
  getText() {
    return this._selectedText;
  }

  /**
   * Check if dropdown is open
   * @returns {boolean} Open state
   */
  isOpen() {
    return this._isOpen;
  }

  // ============================================
  // STATIC FACTORY METHODS
  // ============================================

  /**
   * Create a standard dropdown programmatically
   * @param {Object} options - Dropdown configuration
   * @returns {HTMLElement} Created dropdown element
   */
  static create(options = {}) {
    const { placeholder = 'Select option', items = [], className = '' } = options;

    const dropdown = document.createElement('div');
    dropdown.className = `so-dropdown ${className}`.trim();

    const selectedItem = items.find(i => i.selected);

    dropdown.innerHTML = `
      <button type="button" class="so-dropdown-trigger">
        <span class="so-dropdown-selected">${selectedItem?.label || placeholder}</span>
        <span class="material-icons so-dropdown-arrow">expand_more</span>
      </button>
      <div class="so-dropdown-menu">
        ${items.map(item => `
          <div class="so-dropdown-item ${item.selected ? 'selected' : ''}" data-value="${item.value}">
            ${item.label}
          </div>
        `).join('')}
      </div>
    `;

    return dropdown;
  }

  /**
   * Create a searchable dropdown programmatically
   * @param {Object} options - Dropdown configuration
   * @returns {HTMLElement} Created dropdown element
   */
  static createSearchable(options = {}) {
    const {
      placeholder = 'Select option',
      searchPlaceholder = 'Search...',
      items = [],
      className = ''
    } = options;

    const dropdown = document.createElement('div');
    dropdown.className = `so-searchable-dropdown ${className}`.trim();

    const selectedItem = items.find(i => i.selected);

    dropdown.innerHTML = `
      <button type="button" class="so-searchable-trigger">
        <span class="so-searchable-selected">${selectedItem?.label || placeholder}</span>
        <span class="material-icons so-dropdown-arrow">expand_more</span>
      </button>
      <div class="so-searchable-menu">
        <div class="so-searchable-search">
          <span class="material-icons">search</span>
          <input type="text" class="so-searchable-input" placeholder="${searchPlaceholder}">
        </div>
        <div class="so-searchable-items">
          ${items.map(item => `
            <div class="so-searchable-item ${item.selected ? 'selected' : ''}" data-value="${item.value}">
              ${item.label}
            </div>
          `).join('')}
        </div>
      </div>
    `;

    return dropdown;
  }

  /**
   * Create an options dropdown programmatically
   * @param {Object} options - Dropdown configuration
   * @returns {HTMLElement} Created dropdown element
   */
  static createOptions(options = {}) {
    const { icon = 'more_vert', items = [], className = '' } = options;

    const dropdown = document.createElement('div');
    dropdown.className = `so-options-dropdown ${className}`.trim();

    dropdown.innerHTML = `
      <button type="button" class="so-options-trigger">
        <span class="material-icons">${icon}</span>
      </button>
      <div class="so-options-menu">
        ${items.map(item => {
          if (item.divider) {
            return '<div class="so-options-divider"></div>';
          }
          return `
            <div class="so-options-item ${item.danger ? 'danger' : ''}" data-action="${item.action || ''}">
              ${item.icon ? `<span class="material-icons">${item.icon}</span>` : ''}
              <span>${item.label}</span>
            </div>
          `;
        }).join('')}
      </div>
    `;

    return dropdown;
  }
}

// Register component
SODropdown.register();

// Expose to global scope
window.SODropdown = SODropdown;

// Export for ES modules
export default SODropdown;
export { SODropdown };
