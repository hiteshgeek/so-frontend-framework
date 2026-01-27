// ============================================
// SIXORBIT UI - TABS COMPONENT
// Navigation tabs with keyboard support
// ============================================

import SixOrbit from '../core/so-config.js';
import SOComponent from '../core/so-component.js';

/**
 * SOTabs - Tab navigation component
 * Supports multiple variants, keyboard navigation, and ARIA
 */
class SOTabs extends SOComponent {
  static NAME = 'tabs';

  static DEFAULTS = {
    autoActivate: false,  // Activate tab on focus (vs on click/enter)
    animation: true,      // Use fade animation for panes
    keyboard: true,       // Enable keyboard navigation
  };

  static EVENTS = {
    SHOW: 'tab:show',
    SHOWN: 'tab:shown',
    HIDE: 'tab:hide',
    HIDDEN: 'tab:hidden',
  };

  // ============================================
  // INITIALIZATION
  // ============================================

  /**
   * Initialize the tabs component
   * @private
   */
  _init() {
    // Cache tab elements
    this._tabs = this.$$('.so-tab');
    this._activeTab = null;
    this._activePane = null;

    // Find initial active tab
    this._findActiveTab();

    // Bind events
    this._bindEvents();

    // Set up ARIA attributes
    this._setupAria();
  }

  /**
   * Find and set the initial active tab
   * @private
   */
  _findActiveTab() {
    // Look for explicitly active tab
    this._activeTab = this.$('.so-tab.so-active') || this.$('.so-tab[aria-selected="true"]');

    // Default to first tab if none active
    if (!this._activeTab && this._tabs.length > 0) {
      this._activeTab = this._tabs[0];
      this._activeTab.classList.add('so-active');
    }

    // Find associated pane
    if (this._activeTab) {
      const target = this._getTabTarget(this._activeTab);
      if (target) {
        this._activePane = document.querySelector(target);
        if (this._activePane) {
          this._activePane.classList.add('so-active');
          if (this.options.animation) {
            this._activePane.classList.add('so-show');
          }
        }
      }
    }
  }

  /**
   * Bind event listeners
   * @private
   */
  _bindEvents() {
    // Click handler for tabs
    this.delegate('click', '.so-tab', this._handleTabClick);

    // Keyboard navigation
    if (this.options.keyboard) {
      this.on('keydown', this._handleKeydown);
    }

    // Auto-activate on focus
    if (this.options.autoActivate) {
      this.delegate('focus', '.so-tab', this._handleTabFocus);
    }
  }

  /**
   * Set up ARIA attributes
   * @private
   */
  _setupAria() {
    // Set role on container if not already set
    if (!this.element.getAttribute('role')) {
      this.element.setAttribute('role', 'tablist');
    }

    // Check for vertical orientation
    if (this.element.classList.contains('so-tabs-vertical')) {
      this.element.setAttribute('aria-orientation', 'vertical');
    }

    // Set up each tab
    this._tabs.forEach((tab, index) => {
      // Generate ID if needed
      if (!tab.id) {
        tab.id = SixOrbit.uniqueId('so-tab');
      }

      // Set role
      if (!tab.getAttribute('role')) {
        tab.setAttribute('role', 'tab');
      }

      // Set aria-selected
      const isActive = tab === this._activeTab;
      tab.setAttribute('aria-selected', isActive ? 'true' : 'false');

      // Set tabindex
      tab.setAttribute('tabindex', isActive ? '0' : '-1');

      // Link to pane
      const target = this._getTabTarget(tab);
      if (target) {
        const pane = document.querySelector(target);
        if (pane) {
          tab.setAttribute('aria-controls', pane.id || target.replace('#', ''));

          // Set up pane ARIA
          if (!pane.getAttribute('role')) {
            pane.setAttribute('role', 'tabpanel');
          }
          pane.setAttribute('aria-labelledby', tab.id);
          if (!pane.hasAttribute('tabindex')) {
            pane.setAttribute('tabindex', '0');
          }
        }
      }
    });
  }

  // ============================================
  // EVENT HANDLERS
  // ============================================

  /**
   * Handle tab click
   * @param {Event} e - Click event
   * @param {Element} tab - Clicked tab element
   * @private
   */
  _handleTabClick(e, tab) {
    e.preventDefault();

    if (tab.classList.contains('so-disabled') || tab.hasAttribute('disabled')) {
      return;
    }

    this._activateTab(tab);
  }

  /**
   * Handle tab focus (for auto-activate mode)
   * @param {Event} e - Focus event
   * @param {Element} tab - Focused tab element
   * @private
   */
  _handleTabFocus(e, tab) {
    if (tab.classList.contains('so-disabled') || tab.hasAttribute('disabled')) {
      return;
    }

    this._activateTab(tab);
  }

  /**
   * Handle keyboard navigation
   * @param {KeyboardEvent} e - Keyboard event
   * @private
   */
  _handleKeydown(e) {
    const isVertical = this.element.classList.contains('so-tabs-vertical');
    const enabledTabs = this._tabs.filter(
      tab => !tab.classList.contains('so-disabled') && !tab.hasAttribute('disabled')
    );

    if (enabledTabs.length === 0) return;

    const currentIndex = enabledTabs.indexOf(document.activeElement);
    let newIndex = currentIndex;

    switch (e.key) {
      case 'ArrowLeft':
        if (!isVertical) {
          e.preventDefault();
          newIndex = currentIndex - 1;
          if (newIndex < 0) newIndex = enabledTabs.length - 1;
        }
        break;

      case 'ArrowRight':
        if (!isVertical) {
          e.preventDefault();
          newIndex = currentIndex + 1;
          if (newIndex >= enabledTabs.length) newIndex = 0;
        }
        break;

      case 'ArrowUp':
        if (isVertical) {
          e.preventDefault();
          newIndex = currentIndex - 1;
          if (newIndex < 0) newIndex = enabledTabs.length - 1;
        }
        break;

      case 'ArrowDown':
        if (isVertical) {
          e.preventDefault();
          newIndex = currentIndex + 1;
          if (newIndex >= enabledTabs.length) newIndex = 0;
        }
        break;

      case 'Home':
        e.preventDefault();
        newIndex = 0;
        break;

      case 'End':
        e.preventDefault();
        newIndex = enabledTabs.length - 1;
        break;

      case 'Enter':
      case ' ':
        e.preventDefault();
        if (currentIndex >= 0) {
          this._activateTab(enabledTabs[currentIndex]);
        }
        return;

      default:
        return;
    }

    // Focus new tab
    if (newIndex !== currentIndex && newIndex >= 0) {
      enabledTabs[newIndex].focus();

      // Auto-activate on keyboard nav if option enabled
      if (this.options.autoActivate) {
        this._activateTab(enabledTabs[newIndex]);
      }
    }
  }

  // ============================================
  // PRIVATE METHODS
  // ============================================

  /**
   * Get the target selector for a tab
   * @param {Element} tab - Tab element
   * @returns {string|null} Target selector
   * @private
   */
  _getTabTarget(tab) {
    // Check data attribute
    let target = tab.getAttribute('data-so-target') || tab.getAttribute('data-target');

    // Check href for anchor links
    if (!target && tab.tagName === 'A') {
      const href = tab.getAttribute('href');
      if (href && href.startsWith('#') && href.length > 1) {
        target = href;
      }
    }

    return target;
  }

  /**
   * Activate a tab
   * @param {Element} tab - Tab to activate
   * @private
   */
  _activateTab(tab) {
    // Don't do anything if already active
    if (tab === this._activeTab) return;

    const previousTab = this._activeTab;
    const previousPane = this._activePane;
    const target = this._getTabTarget(tab);
    const newPane = target ? document.querySelector(target) : null;

    // Emit hide event on previous tab (cancelable)
    if (previousTab) {
      const hideEvent = this._emitTabEvent(SOTabs.EVENTS.HIDE, previousTab, {
        relatedTarget: tab
      });

      if (!hideEvent) return; // Prevented
    }

    // Emit show event on new tab (cancelable)
    const showEvent = this._emitTabEvent(SOTabs.EVENTS.SHOW, tab, {
      relatedTarget: previousTab
    });

    if (!showEvent) return; // Prevented

    // Deactivate previous tab
    if (previousTab) {
      previousTab.classList.remove('so-active');
      previousTab.setAttribute('aria-selected', 'false');
      previousTab.setAttribute('tabindex', '-1');
    }

    // Deactivate previous pane
    if (previousPane) {
      previousPane.classList.remove('so-active');
      if (this.options.animation) {
        previousPane.classList.remove('so-show');
      }
    }

    // Activate new tab
    tab.classList.add('so-active');
    tab.setAttribute('aria-selected', 'true');
    tab.setAttribute('tabindex', '0');

    // Activate new pane
    if (newPane) {
      newPane.classList.add('so-active');

      if (this.options.animation) {
        // Use requestAnimationFrame for fade animation
        requestAnimationFrame(() => {
          newPane.classList.add('so-show');
        });
      }
    }

    // Update internal state
    this._activeTab = tab;
    this._activePane = newPane;

    // Emit hidden event on previous tab
    if (previousTab) {
      this._emitTabEvent(SOTabs.EVENTS.HIDDEN, previousTab, {
        relatedTarget: tab
      }, false);
    }

    // Emit shown event on new tab
    const emitShown = () => {
      this._emitTabEvent(SOTabs.EVENTS.SHOWN, tab, {
        relatedTarget: previousTab
      }, false);
    };

    if (this.options.animation && newPane) {
      // Wait for transition
      newPane.addEventListener('transitionend', emitShown, { once: true });
    } else {
      emitShown();
    }
  }

  /**
   * Emit a tab event
   * @param {string} eventName - Event name
   * @param {Element} target - Target element
   * @param {Object} detail - Event detail
   * @param {boolean} cancelable - Whether event is cancelable
   * @returns {boolean} Whether event was not prevented
   * @private
   */
  _emitTabEvent(eventName, target, detail = {}, cancelable = true) {
    const event = new CustomEvent(SixOrbit.evt(eventName), {
      detail: { ...detail, component: this },
      bubbles: true,
      cancelable
    });

    return target.dispatchEvent(event);
  }

  // ============================================
  // PUBLIC API
  // ============================================

  /**
   * Show tab by index
   * @param {number} index - Tab index (0-based)
   * @returns {this} For chaining
   */
  show(index) {
    const tab = this._tabs[index];
    if (tab && !tab.classList.contains('so-disabled') && !tab.hasAttribute('disabled')) {
      this._activateTab(tab);
    }
    return this;
  }

  /**
   * Show tab by target ID
   * @param {string} id - Target pane ID (with or without #)
   * @returns {this} For chaining
   */
  showById(id) {
    const targetId = id.startsWith('#') ? id : `#${id}`;
    const tab = this._tabs.find(t => this._getTabTarget(t) === targetId);
    if (tab && !tab.classList.contains('so-disabled') && !tab.hasAttribute('disabled')) {
      this._activateTab(tab);
    }
    return this;
  }

  /**
   * Move to next tab
   * @returns {this} For chaining
   */
  next() {
    const enabledTabs = this._tabs.filter(
      tab => !tab.classList.contains('so-disabled') && !tab.hasAttribute('disabled')
    );
    const currentIndex = enabledTabs.indexOf(this._activeTab);
    const nextIndex = (currentIndex + 1) % enabledTabs.length;
    this._activateTab(enabledTabs[nextIndex]);
    return this;
  }

  /**
   * Move to previous tab
   * @returns {this} For chaining
   */
  prev() {
    const enabledTabs = this._tabs.filter(
      tab => !tab.classList.contains('so-disabled') && !tab.hasAttribute('disabled')
    );
    const currentIndex = enabledTabs.indexOf(this._activeTab);
    const prevIndex = currentIndex - 1 < 0 ? enabledTabs.length - 1 : currentIndex - 1;
    this._activateTab(enabledTabs[prevIndex]);
    return this;
  }

  /**
   * Get current active tab element
   * @returns {Element|null} Active tab element
   */
  getActiveTab() {
    return this._activeTab;
  }

  /**
   * Get current active tab index
   * @returns {number} Active tab index (-1 if none)
   */
  getActiveIndex() {
    return this._tabs.indexOf(this._activeTab);
  }

  /**
   * Get all tab elements
   * @returns {Element[]} Array of tab elements
   */
  getTabs() {
    return [...this._tabs];
  }

  /**
   * Refresh tabs (re-scan for tab elements)
   * @returns {this} For chaining
   */
  refresh() {
    this._tabs = this.$$('.so-tab');
    this._setupAria();
    return this;
  }
}

// Register component
SOTabs.register();

// Auto-initialize tabs with data attribute
document.addEventListener('DOMContentLoaded', () => {
  SOTabs.initAll('[data-so-tabs]');
});

// Expose to global scope
window.SOTabs = SOTabs;

// Export for ES modules
export default SOTabs;
export { SOTabs };
