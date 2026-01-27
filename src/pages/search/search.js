/**
 * SixOrbit Demo - Global Search Controller
 * Handles search overlay with quick links, filters, and ISV search
 * This is a demo/app-level JS, not part of the SO Framework
 * Version: 1.0.0
 */

(function (global) {
  "use strict";

  // ============================================
  // GLOBAL SEARCH CLASS
  // ============================================
  class GlobalSearchController {
    constructor(options = {}) {
      this.options = {
        overlaySelector: ".so-search-overlay",
        backdropSelector: ".so-search-overlay-backdrop",
        inputSelector: ".so-search-overlay-input",
        closeSelector: ".so-search-overlay-close",
        quickLinksSelector: ".so-search-quick-links",
        quickLinkSelector: ".so-search-quick-link",
        emptyStateSelector: ".so-search-empty",
        loadingSelector: ".so-search-loading",
        resultsContainerSelector: ".so-search-results-container",
        filterBarSelector: ".so-search-filter-bar",
        categoryTabsSelector: ".so-search-category-tabs",
        resultsGridSelector: ".so-search-results-grid",
        resultsListSelector: ".so-search-results-list",
        footerHintSelector: ".so-search-overlay-footer-hint",
        // URL Configuration (for real API integration)
        searchUrl: null,
        isvSearchUrl: null,
        // Path to JSON data files (relative to page location)
        dataBasePath: "data",
        debounceDelay: 300,
        minQueryLength: 1,
        // Help Text Configuration
        helpText: {
          icon: "search",
          title: "Start typing to search",
          subtitle:
            'Search for menus, customers, vendors, ledgers or type "isv:" for item search',
        },
        // Footer Shortcuts Configuration
        footerHint: {
          navigate: "to navigate",
          select: "to select",
          close: "to close",
          tip: "Tip: Type",
          tipKeyword: "isv:",
          tipSuffix: "for item search with filters",
        },
        // Callbacks
        onSearchResult: null,
        onItemClick: null,
        onAccountClick: null,
        onQuickActionClick: null,
        ...options,
      };

      // DOM elements
      this.overlay = null;
      this.input = null;
      this.backdrop = null;
      this.closeBtn = null;
      this.quickLinks = null;
      this.emptyState = null;
      this.loading = null;
      this.resultsContainer = null;
      this.filterBar = null;
      this.categoryTabs = null;
      this.resultsGrid = null;
      this.resultsList = null;

      // State
      this.isOpen = false;
      this.isISVSearch = false;
      this.searchQuery = "";
      this.currentView = "grid";
      this.activeFilters = { stock: "all", status: "all" };
      this.activeCategory = "all";
      this.debounceTimer = null;
      this.currentSearchData = null;
      this.items = [];
      this.focusedIndex = -1;

      // Loaded JSON data (from demo/data/)
      this.searchData = null;
      this.isvData = null;
      this.dataLoaded = false;

      this.init();
    }

    /**
     * Configure search URLs, callbacks, and text content
     */
    configure(config = {}) {
      if (config.searchUrl) this.options.searchUrl = config.searchUrl;
      if (config.isvSearchUrl) this.options.isvSearchUrl = config.isvSearchUrl;
      if (config.debounceDelay !== undefined)
        this.options.debounceDelay = config.debounceDelay;
      if (config.minQueryLength !== undefined)
        this.options.minQueryLength = config.minQueryLength;
      if (config.onSearchResult)
        this.options.onSearchResult = config.onSearchResult;
      if (config.onItemClick) this.options.onItemClick = config.onItemClick;
      if (config.onAccountClick)
        this.options.onAccountClick = config.onAccountClick;
      if (config.onQuickActionClick)
        this.options.onQuickActionClick = config.onQuickActionClick;

      // Configure help text
      if (config.helpText) {
        this.options.helpText = {
          ...this.options.helpText,
          ...config.helpText,
        };
        this.updateHelpText();
      }

      // Configure footer hint
      if (config.footerHint) {
        this.options.footerHint = {
          ...this.options.footerHint,
          ...config.footerHint,
        };
        this.updateFooterHint();
      }

      console.log("GlobalSearch configured:", {
        searchUrl: this.options.searchUrl,
        isvSearchUrl: this.options.isvSearchUrl,
      });
    }

    /**
     * Update the help text in the empty state
     */
    updateHelpText() {
      if (!this.emptyState) return;

      const iconEl = this.emptyState.querySelector(".so-search-empty-icon");
      const titleEl = this.emptyState.querySelector(".so-search-empty-title");
      const textEl = this.emptyState.querySelector(".so-search-empty-text");

      if (iconEl && this.options.helpText.icon) {
        iconEl.textContent = this.options.helpText.icon;
      }
      if (titleEl && this.options.helpText.title) {
        titleEl.textContent = this.options.helpText.title;
      }
      if (textEl && this.options.helpText.subtitle) {
        textEl.textContent = this.options.helpText.subtitle;
      }
    }

    /**
     * Update the footer hint with keyboard shortcuts
     */
    updateFooterHint() {
      const footerHint = this.overlay?.querySelector(
        this.options.footerHintSelector,
      );
      if (!footerHint) return;

      const hint = this.options.footerHint;
      footerHint.innerHTML = `
        <kbd>↑</kbd><kbd>↓</kbd> ${this.escapeHtml(hint.navigate)}
        <kbd>↵</kbd> ${this.escapeHtml(hint.select)}
        <kbd>ESC</kbd> ${this.escapeHtml(hint.close)}
        <span style="margin-left: auto;">${this.escapeHtml(hint.tip)} <kbd>${this.escapeHtml(hint.tipKeyword)}</kbd> ${this.escapeHtml(hint.tipSuffix)}</span>
      `;
    }

    init() {
      this.overlay = document.querySelector(this.options.overlaySelector);
      if (!this.overlay) return;

      // Cache DOM elements
      this.input = this.overlay.querySelector(this.options.inputSelector);
      this.backdrop = this.overlay.querySelector(this.options.backdropSelector);
      this.closeBtn = this.overlay.querySelector(this.options.closeSelector);
      this.quickLinks = this.overlay.querySelector(
        this.options.quickLinksSelector,
      );
      this.emptyState = this.overlay.querySelector(
        this.options.emptyStateSelector,
      );
      this.loading = this.overlay.querySelector(this.options.loadingSelector);
      this.resultsContainer = this.overlay.querySelector(
        this.options.resultsContainerSelector,
      );
      this.filterBar = this.overlay.querySelector(
        this.options.filterBarSelector,
      );
      this.categoryTabs = this.overlay.querySelector(
        this.options.categoryTabsSelector,
      );
      this.resultsGrid = this.overlay.querySelector(
        this.options.resultsGridSelector,
      );
      this.resultsList = this.overlay.querySelector(
        this.options.resultsListSelector,
      );

      this.bindEvents();
      this.initQuickLinks();
      this.initFilters();
      this.initViewToggle();
      this.initCategoryTabs();

      // Initialize text content
      this.updateHelpText();
      this.updateFooterHint();

      // Load JSON data files
      this.loadDataFiles();

      console.log("GlobalSearch initialized");
    }

    /**
     * Load JSON data files from demo/data/ directory
     */
    async loadDataFiles() {
      const basePath = this.options.dataBasePath || "demo/data";

      try {
        // Load both JSON files in parallel
        const [searchResponse, isvResponse] = await Promise.all([
          fetch(`${basePath}/search-results.json`),
          fetch(`${basePath}/isv-search-results.json`),
        ]);

        if (searchResponse.ok) {
          this.searchData = await searchResponse.json();
          console.log("Search data loaded:", Object.keys(this.searchData));
        }

        if (isvResponse.ok) {
          this.isvData = await isvResponse.json();
          console.log("ISV data loaded:", this.isvData.items?.length, "items");
        }

        this.dataLoaded = true;
      } catch (error) {
        console.warn("Failed to load JSON data files, using hardcoded fallback:", error);
        this.dataLoaded = false;
      }
    }

    bindEvents() {
      // Ctrl+K / Cmd+K to open
      document.addEventListener("keydown", (e) => {
        if ((e.ctrlKey || e.metaKey) && e.key === "k") {
          e.preventDefault();
          this.open();
        }
      });

      // Escape to close
      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && this.isOpen) {
          e.preventDefault();
          this.close();
        }
      });

      // Close on backdrop click
      if (this.backdrop) {
        this.backdrop.addEventListener("click", () => this.close());
      }

      // Close button
      if (this.closeBtn) {
        this.closeBtn.addEventListener("click", () => this.close());
      }

      // Input events
      if (this.input) {
        console.log("Input element found, binding event listener");
        this.input.addEventListener("input", () => {
          console.log("Input event fired, value:", this.input.value);
          this.handleSearch(this.input.value);
        });

        this.input.addEventListener("keydown", (e) => {
          this.handleKeydown(e);
        });
      }

      // Close filter dropdowns on outside click
      document.addEventListener("click", (e) => {
        if (!e.target.closest(".so-search-filter-dropdown")) {
          this.closeAllFilterDropdowns();
        }
      });

      // Navbar search click - open overlay
      const navbarSearch = document.querySelector(".so-navbar-search");
      if (navbarSearch) {
        navbarSearch.addEventListener("click", (e) => {
          e.preventDefault();
          this.open();
        });
      }

      // Also handle click on navbar search input directly
      const navbarSearchInput = document.querySelector(".so-navbar-search-input");
      if (navbarSearchInput) {
        navbarSearchInput.addEventListener("click", (e) => {
          e.preventDefault();
          e.stopPropagation();
          this.open();
        });
        navbarSearchInput.addEventListener("focus", (e) => {
          e.preventDefault();
          this.open();
        });
      }
    }

    // ============================================
    // QUICK LINKS
    // ============================================
    initQuickLinks() {
      if (!this.quickLinks) return;

      const links = this.quickLinks.querySelectorAll(
        this.options.quickLinkSelector,
      );
      links.forEach((link) => {
        link.addEventListener("click", (e) => {
          const action = link.dataset.action;
          if (action) {
            e.preventDefault();
            this.handleQuickLinkClick(action, link);
          }
        });
      });
    }

    handleQuickLinkClick(action, link) {
      // Call callback if provided
      if (this.options.onQuickActionClick) {
        this.options.onQuickActionClick(action, link);
      }

      // Emit custom event
      const event = new CustomEvent("searchQuickLinkClick", {
        detail: { action, element: link },
      });
      document.dispatchEvent(event);

      // Close overlay if link has href
      if (link.href && link.href !== "#" && !link.href.endsWith("void(0)")) {
        this.close();
      }
    }

    // ============================================
    // FILTERS (for ISV search)
    // ============================================
    initFilters() {
      if (!this.filterBar) return;

      const dropdowns = this.filterBar.querySelectorAll(
        ".so-search-filter-dropdown",
      );

      dropdowns.forEach((dropdown) => {
        const btn = dropdown.querySelector(".so-search-filter-btn");
        const menu = dropdown.querySelector(".so-search-filter-menu");
        const filterType = dropdown.dataset.filter;

        if (!btn || !menu) return;

        // Toggle dropdown
        btn.addEventListener("click", (e) => {
          e.stopPropagation();
          dropdowns.forEach((d) => {
            if (d !== dropdown) {
              d.querySelector(".so-search-filter-menu")?.classList.remove(
                "open",
              );
            }
          });
          menu.classList.toggle("open");
        });

        // Handle option selection
        menu.querySelectorAll(".so-search-filter-option").forEach((option) => {
          option.addEventListener("click", (e) => {
            e.stopPropagation();
            const value = option.dataset.value;
            this.selectFilter(filterType, value, btn, menu);
          });
        });
      });
    }

    selectFilter(filterType, value, btn, menu) {
      this.activeFilters[filterType] = value;

      // Update button text
      const selectedOption = menu.querySelector(`[data-value="${value}"]`);
      if (selectedOption) {
        const labelSpan = btn.querySelector(".filter-label");
        if (labelSpan) {
          labelSpan.textContent = selectedOption.textContent.trim();
        }
      }

      // Mark selected option
      menu.querySelectorAll(".so-search-filter-option").forEach((opt) => {
        opt.classList.toggle("selected", opt.dataset.value === value);
      });

      // Update button state
      btn.classList.toggle("active", value !== "all");

      // Close menu
      menu.classList.remove("open");

      // Re-fetch with new filters for ISV search
      if (this.isISVSearch) {
        const actualQuery = this.searchQuery.toLowerCase().startsWith("isv:")
          ? this.searchQuery.substring(4).trim()
          : this.searchQuery;
        this.performISVSearch(actualQuery);
      }
    }

    closeAllFilterDropdowns() {
      if (!this.filterBar) return;
      this.filterBar
        .querySelectorAll(".so-search-filter-menu")
        .forEach((menu) => {
          menu.classList.remove("open");
        });
    }

    // ============================================
    // VIEW TOGGLE (grid/list for ISV)
    // ============================================
    initViewToggle() {
      const toggle = this.filterBar?.querySelector(".so-search-view-toggle");
      if (!toggle) return;

      const buttons = toggle.querySelectorAll(".so-search-view-btn");

      buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
          const view = btn.dataset.view;
          this.setView(view);
          buttons.forEach((b) => b.classList.toggle("active", b === btn));
        });
      });
    }

    setView(view) {
      this.currentView = view;

      if (this.resultsGrid) {
        this.resultsGrid.classList.toggle("visible", view === "grid");
      }
      if (this.resultsList) {
        this.resultsList.classList.toggle("visible", view === "list");
      }
    }

    // ============================================
    // CATEGORY TABS
    // ============================================
    initCategoryTabs() {
      if (!this.categoryTabs) return;

      const tabs = this.categoryTabs.querySelectorAll(
        ".so-search-category-tab",
      );

      tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
          this.activeCategory = tab.dataset.category;
          tabs.forEach((t) => t.classList.toggle("active", t === tab));

          // Re-render with new category filter
          if (this.currentSearchData) {
            this.renderNormalSearchResults(
              this.currentSearchData,
              this.searchQuery,
            );
          }
        });
      });
    }

    updateCategoryCounts(counts) {
      if (!this.categoryTabs) return;

      Object.keys(counts).forEach((category) => {
        const tab = this.categoryTabs.querySelector(
          `[data-category="${category}"]`,
        );
        if (tab) {
          const countSpan = tab.querySelector(".so-search-category-count");
          if (countSpan) {
            countSpan.textContent = counts[category];
          }
        }
      });
    }

    // ============================================
    // SEARCH HANDLING
    // ============================================
    handleSearch(query) {
      console.log("handleSearch called with:", query);
      this.searchQuery = query;

      // Debounce search
      clearTimeout(this.debounceTimer);
      this.debounceTimer = setTimeout(() => {
        console.log("Debounce complete, calling performSearch");
        this.performSearch(query);
      }, this.options.debounceDelay);
    }

    performSearch(query) {
      console.log("performSearch called with:", query);
      console.log("searchUrl configured:", this.options.searchUrl);
      console.log("isvSearchUrl configured:", this.options.isvSearchUrl);
      const trimmedQuery = query.trim();

      // Check for ISV prefix
      const isISV = trimmedQuery.toLowerCase().startsWith("isv:");
      this.isISVSearch = isISV;

      // Show/hide UI elements based on search state
      this.updateSearchUI(trimmedQuery, isISV);

      // Get actual search query (without prefix)
      const actualQuery = isISV
        ? trimmedQuery.substring(4).trim()
        : trimmedQuery;

      // If search is completely empty, show default view with quick actions
      if (!trimmedQuery || trimmedQuery.length === 0) {
        this.showDefaultQuickActions();
        return;
      }

      // If only "isv:" prefix is typed without search term
      if (
        isISV &&
        (!actualQuery || actualQuery.length < this.options.minQueryLength)
      ) {
        this.showISVHint();
        return;
      }

      // Check minimum query length for normal search
      if (
        !isISV &&
        (!actualQuery || actualQuery.length < this.options.minQueryLength)
      ) {
        this.showDefaultQuickActions();
        return;
      }

      if (isISV) {
        this.performISVSearch(actualQuery);
      } else {
        this.performNormalSearch(actualQuery);
      }
    }

    /**
     * Perform normal search
     */
    async performNormalSearch(query) {
      console.log("Normal Search triggered:", query);
      // Hide sections during search
      this.hideLegacySections();
      if (this.quickLinks) this.quickLinks.style.display = "none";

      this.showLoading();

      try {
        let data;

        if (this.options.searchUrl) {
          // For relative URLs, use fetch directly (resolves relative to page)
          // For absolute URLs, use URL constructor
          let fetchUrl = this.options.searchUrl;
          if (this.options.searchUrl.startsWith('http')) {
            const url = new URL(this.options.searchUrl);
            url.searchParams.append("query", query);
            fetchUrl = url.toString();
          } else {
            // Relative URL - just append query string
            fetchUrl = this.options.searchUrl + (this.options.searchUrl.includes('?') ? '&' : '?') + 'query=' + encodeURIComponent(query);
          }
          console.log("Making API call to:", fetchUrl);

          const response = await fetch(fetchUrl);
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }
          data = await response.json();

          // Filter client-side since static JSON returns all data
          // (Real API would filter server-side and return only matching results)
          data = this.filterFallbackData(data, query);
          console.log("Filtered results - menus:", data.menus?.length, "customers:", data.customers?.length);
        } else {
          // Use fallback data for demo - filter client-side
          console.log("Using local JSON data (no API configured)");
          const searchData = this.getFallbackSearchData();
          console.log("Search data source:", this.searchData ? "JSON file" : "hardcoded fallback");
          data = this.filterFallbackData(searchData, query);
          console.log("Filtered results - menus:", data.menus?.length, "customers:", data.customers?.length);
        }

        this.currentSearchData = data;
        this.hideLoading();

        if (this.options.onSearchResult) {
          this.options.onSearchResult(data, query, false);
        }

        this.renderNormalSearchResults(data, query);
      } catch (error) {
        console.warn("Search error, using fallback:", error);
        this.hideLoading();

        const data = this.filterFallbackData(
          this.getFallbackSearchData(),
          query,
        );
        this.currentSearchData = data;
        this.renderNormalSearchResults(data, query);
      }
    }

    /**
     * Filter fallback data based on query (client-side filtering for demo)
     */
    filterFallbackData(data, query) {
      const q = query.toLowerCase();
      return {
        menus: (data.menus || []).filter(
          (item) =>
            item.title.toLowerCase().includes(q) ||
            (item.path && item.path.toLowerCase().includes(q)),
        ),
        customers: (data.customers || []).filter(
          (item) =>
            item.title.toLowerCase().includes(q) ||
            (item.mobile && item.mobile.includes(q)) ||
            (item.gstin && item.gstin.toLowerCase().includes(q)),
        ),
        vendors: (data.vendors || []).filter(
          (item) =>
            item.title.toLowerCase().includes(q) ||
            (item.mobile && item.mobile.includes(q)) ||
            (item.gstin && item.gstin.toLowerCase().includes(q)),
        ),
        ledgers: (data.ledgers || []).filter(
          (item) =>
            item.title.toLowerCase().includes(q) ||
            (item.group && item.group.toLowerCase().includes(q)),
        ),
      };
    }

    /**
     * Perform ISV (Item Search View) search
     */
    async performISVSearch(query) {
      console.log("ISV Search triggered:", query);
      console.log("isvSearchUrl:", this.options.isvSearchUrl);
      console.log("resultsGrid element:", this.resultsGrid);
      this.hideLegacySections();
      if (this.quickLinks) this.quickLinks.style.display = "none";

      if (!query || query.trim() === "") {
        this.showISVHint();
        return;
      }

      this.showLoading();

      try {
        let data;

        if (this.options.isvSearchUrl) {
          // For relative URLs, use fetch directly (resolves relative to page)
          // For absolute URLs, use URL constructor
          let fetchUrl = this.options.isvSearchUrl;
          const params = new URLSearchParams();
          params.append("query", query);
          params.append("stock", this.activeFilters.stock);
          params.append("status", this.activeFilters.status);

          if (this.options.isvSearchUrl.startsWith('http')) {
            const url = new URL(this.options.isvSearchUrl);
            params.forEach((value, key) => url.searchParams.append(key, value));
            fetchUrl = url.toString();
          } else {
            // Relative URL - just append query string
            fetchUrl = this.options.isvSearchUrl + (this.options.isvSearchUrl.includes('?') ? '&' : '?') + params.toString();
          }
          console.log("Making API call to:", fetchUrl);

          const response = await fetch(fetchUrl);
          if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
          }
          data = await response.json();

          // Filter client-side since static JSON returns all data
          // (Real API would filter server-side and return only matching results)
          data = this.filterISVFallbackData(data, query);
          console.log("Filtered results:", data.items?.length);
        } else {
          // Use fallback data - filter client-side
          console.log("Using local JSON data (no API configured)");
          const isvData = this.getFallbackISVData();
          console.log("ISV data source:", this.isvData ? "JSON file" : "hardcoded fallback", "items:", isvData.items?.length);
          data = this.filterISVFallbackData(isvData, query);
          console.log("Filtered results:", data.items?.length);
        }

        this.hideLoading();
        console.log("ISV data after filtering:", data.items?.length, "items");

        if (this.options.onSearchResult) {
          this.options.onSearchResult(data, query, true);
        }

        console.log("Calling renderISVSearchResults with", data.items?.length, "items");
        this.renderISVSearchResults(data, query);
      } catch (error) {
        console.warn("ISV Search error, using fallback:", error);
        this.hideLoading();

        const data = this.filterISVFallbackData(
          this.getFallbackISVData(),
          query,
        );
        this.renderISVSearchResults(data, query);
      }
    }

    /**
     * Filter ISV fallback data
     */
    filterISVFallbackData(data, query) {
      const q = query.toLowerCase();
      let items = (data.items || []).filter(
        (item) =>
          (item.name && item.name.toLowerCase().includes(q)) ||
          (item.sku && item.sku.toLowerCase().includes(q)),
      );

      // Apply stock filter
      if (this.activeFilters.stock !== "all") {
        if (this.activeFilters.stock === "in-stock") {
          items = items.filter((item) => item.stock > 0);
        } else if (this.activeFilters.stock === "out-of-stock") {
          items = items.filter((item) => item.stock === 0);
        } else if (this.activeFilters.stock === "low-stock") {
          items = items.filter((item) => item.stock > 0 && item.stock <= 10);
        }
      }

      // Apply status filter
      if (this.activeFilters.status !== "all") {
        items = items.filter(
          (item) =>
            item.status &&
            item.status.toLowerCase() ===
              this.activeFilters.status.toLowerCase(),
        );
      }

      return { items };
    }

    // ============================================
    // UI STATE MANAGEMENT
    // ============================================
    updateSearchUI(query, isISV) {
      const hasQuery = query.length > 0;

      // Show/hide quick links
      if (this.quickLinks) {
        this.quickLinks.style.display = hasQuery ? "none" : "";
      }

      // Show/hide filter bar (only for ISV search)
      if (this.filterBar) {
        this.filterBar.classList.toggle("visible", isISV && hasQuery);
      }

      // Show/hide category tabs (for non-ISV search with results)
      if (this.categoryTabs) {
        this.categoryTabs.classList.toggle("visible", hasQuery && !isISV);
      }
    }

    showDefaultQuickActions() {
      console.log("showDefaultQuickActions called");
      this.hideLoading();
      this.hideResults();
      this.hideLegacySections();

      // Show quick links
      if (this.quickLinks) this.quickLinks.style.display = "";

      // Show hint message using configured help text
      if (this.emptyState) {
        this.updateEmptyState(
          this.options.helpText.icon,
          this.options.helpText.title,
          this.options.helpText.subtitle,
        );
        this.emptyState.classList.add("visible");
        console.log("showDefaultQuickActions - empty state visible:", this.emptyState.classList.contains("visible"));
      } else {
        console.error("showDefaultQuickActions - emptyState element is null!");
      }
    }

    showISVHint() {
      console.log("showISVHint called");
      this.hideLoading();
      this.hideResults();
      this.hideLegacySections();

      if (this.quickLinks) this.quickLinks.style.display = "none";

      if (this.emptyState) {
        this.updateEmptyState(
          "inventory_2",
          "Item Search Mode",
          "Type further to search for products by name or SKU",
        );
        this.emptyState.classList.add("visible");
        console.log("showISVHint - empty state visible:", this.emptyState.classList.contains("visible"));
      } else {
        console.error("showISVHint - emptyState element is null!");
      }
    }

    showNoResultsFound() {
      this.hideLoading();
      this.hideResults();
      this.hideLegacySections();

      // Hide quick links when showing no results
      if (this.quickLinks) this.quickLinks.style.display = "none";

      if (this.emptyState) {
        this.updateEmptyState(
          "search_off",
          "No results found",
          "Try adjusting your search query or filters",
        );
        this.emptyState.classList.add("visible");
        console.log("showNoResultsFound - empty state visible:", this.emptyState.classList.contains("visible"));
      } else {
        console.error("showNoResultsFound - emptyState element is null!");
      }
    }

    updateEmptyState(icon, title, text) {
      if (!this.emptyState) return;

      const iconEl = this.emptyState.querySelector(".so-search-empty-icon");
      const titleEl = this.emptyState.querySelector(".so-search-empty-title");
      const textEl = this.emptyState.querySelector(".so-search-empty-text");

      if (iconEl) iconEl.textContent = icon;
      if (titleEl) titleEl.textContent = title;
      if (textEl) textEl.textContent = text;
    }

    showLoading() {
      if (this.loading) this.loading.classList.add("visible");
      this.hideEmptyState();
      this.hideResults();
    }

    hideLoading() {
      if (this.loading) this.loading.classList.remove("visible");
    }

    hideEmptyState() {
      if (this.emptyState) this.emptyState.classList.remove("visible");
    }

    hideResults() {
      if (this.resultsGrid) this.resultsGrid.classList.remove("visible");
      if (this.resultsList) this.resultsList.classList.remove("visible");
      if (this.resultsContainer) this.resultsContainer.style.display = "none";
    }

    hideLegacySections() {
      const sections = this.overlay?.querySelectorAll(
        ".so-search-overlay-section",
      );
      sections?.forEach((s) => (s.style.display = "none"));
    }

    // ============================================
    // RESULTS RENDERING
    // ============================================
    renderNormalSearchResults(data, query) {
      const menuResults = data.menus || [];
      const customers = data.customers || [];
      const vendors = data.vendors || [];
      const ledgers = data.ledgers || [];

      // Update category counts
      const counts = {
        all:
          menuResults.length +
          customers.length +
          vendors.length +
          ledgers.length,
        menus: menuResults.length,
        customers: customers.length,
        vendors: vendors.length,
        ledgers: ledgers.length,
      };
      this.updateCategoryCounts(counts);

      // Apply category filter
      let filteredMenus = menuResults;
      let accountResults = [...customers, ...vendors, ...ledgers];

      if (this.activeCategory !== "all") {
        if (this.activeCategory === "menus") {
          accountResults = [];
        } else {
          filteredMenus = [];
          if (this.activeCategory === "customers") accountResults = customers;
          else if (this.activeCategory === "vendors") accountResults = vendors;
          else if (this.activeCategory === "ledgers") accountResults = ledgers;
        }
      }

      this.hideEmptyState();
      this.hideResults();

      // Check if all results are empty
      if (filteredMenus.length === 0 && accountResults.length === 0) {
        this.showNoResultsFound();
        return;
      }

      // Show results container
      if (this.resultsContainer) {
        this.resultsContainer.style.display = "block";
        this.resultsContainer.innerHTML = "";

        // Render menu results section
        if (filteredMenus.length > 0) {
          const menuSection = this.createResultSection(
            "Menu & Actions",
            filteredMenus
              .slice(0, 10)
              .map((item) => this.renderMenuItem(item, query))
              .join(""),
          );
          this.resultsContainer.appendChild(menuSection);
        }

        // Render account results section
        if (accountResults.length > 0) {
          const accountSection = this.createResultSection(
            "Accounts",
            `<div class="so-search-account-cards">${accountResults
              .slice(0, 12)
              .map((item) => this.renderAccountCard(item, query))
              .join("")}</div>`,
          );
          this.resultsContainer.appendChild(accountSection);
        }

        // Bind click handlers
        this.bindResultClickHandlers();
      }

      // Update keyboard navigation items
      this.updateNavigableItems();
    }

    renderISVSearchResults(data, query) {
      const items = data.items || [];
      console.log("=== renderISVSearchResults START ===");
      console.log("Items count:", items.length);
      console.log("resultsContainer element:", this.resultsContainer);
      console.log("resultsGrid element:", this.resultsGrid);
      console.log("resultsList element:", this.resultsList);
      console.log("currentView:", this.currentView);

      this.hideEmptyState();
      this.hideLegacySections();

      if (items.length === 0) {
        console.log("No items, showing no results found");
        this.showNoResultsFound();
        return;
      }

      // Ensure results containers exist
      this.ensureISVResultsContainers();
      console.log("After ensureISVResultsContainers - resultsGrid:", this.resultsGrid);

      // Show the results container (it may be hidden)
      if (this.resultsContainer) {
        this.resultsContainer.style.display = "block";
        console.log("resultsContainer.style.display set to 'block'");
        console.log("resultsContainer computed display:", window.getComputedStyle(this.resultsContainer).display);
      } else {
        console.error("resultsContainer is null! Cannot show results.");
      }

      // Clear and render grid
      if (this.resultsGrid) {
        const gridHTML = items.map((item) => this.renderItemCard(item, query)).join("");
        this.resultsGrid.innerHTML = gridHTML;
        console.log("Grid innerHTML set, length:", gridHTML.length);
      } else {
        console.error("resultsGrid is null!");
      }

      // Clear and render list
      if (this.resultsList) {
        this.resultsList.innerHTML =
          `
                    <div class="so-search-list-header">
                        <span>Item</span>
                        <span>Stock</span>
                        <span>Price</span>
                        <span>Cost</span>
                        <span>Status</span>
                    </div>
                ` +
          items.map((item) => this.renderItemRow(item, query)).join("");
      }

      // Show appropriate view
      if (this.currentView === "grid") {
        if (this.resultsGrid) {
          this.resultsGrid.classList.add("visible");
          console.log("Grid classList after add:", this.resultsGrid.classList.toString());
          console.log("Grid computed display:", window.getComputedStyle(this.resultsGrid).display);
        }
        this.resultsList?.classList.remove("visible");
      } else {
        if (this.resultsList) {
          this.resultsList.classList.add("visible");
          console.log("List classList after add:", this.resultsList.classList.toString());
        }
        this.resultsGrid?.classList.remove("visible");
      }

      console.log("=== renderISVSearchResults END ===");

      // Bind click handlers
      this.bindISVResultClickHandlers();

      // Update keyboard navigation items
      this.updateNavigableItems();
    }

    ensureISVResultsContainers() {
      const body = this.overlay?.querySelector(".so-search-overlay-body");
      if (!body) return;

      // Create results grid if not exists
      if (!this.resultsGrid) {
        this.resultsGrid = document.createElement("div");
        this.resultsGrid.className = "so-search-results-grid";
        body.appendChild(this.resultsGrid);
      }

      // Create results list if not exists
      if (!this.resultsList) {
        this.resultsList = document.createElement("div");
        this.resultsList.className = "so-search-results-list";
        body.appendChild(this.resultsList);
      }
    }

    createResultSection(title, content) {
      const section = document.createElement("div");
      section.className = "so-search-overlay-section";
      section.style.display = "block";
      section.innerHTML = `
                <div class="so-search-overlay-section-title">${title}</div>
                <div class="so-search-overlay-results">${content}</div>
            `;
      return section;
    }

    renderMenuItem(item, query) {
      return `
                <a href="${item.href || "#"}" class="so-search-overlay-item" data-id="${item.id}" data-type="menu">
                    <div class="so-search-overlay-item-icon ${item.color || ""}">
                        <span class="material-icons">${item.icon || "folder"}</span>
                    </div>
                    <div class="so-search-overlay-item-content">
                        <div class="so-search-overlay-item-title">${this.highlightMatch(item.title, query)}</div>
                        <div class="so-search-overlay-item-path">${item.path || ""}</div>
                    </div>
                    <span class="material-icons so-search-overlay-item-arrow">arrow_forward</span>
                </a>
            `;
    }

    renderAccountCard(item, query) {
      const balanceClass =
        item.walletBalance > 0
          ? "positive"
          : item.walletBalance < 0
            ? "negative"
            : "neutral";
      const formattedBalance = this.formatWalletBalance(item.walletBalance);

      let categoryLabel = "";
      if (item.category === "customers") categoryLabel = "Customer";
      else if (item.category === "vendors") categoryLabel = "Vendor";
      else if (item.category === "ledgers") categoryLabel = "Ledger";

      let detailsHTML = "";
      if (item.category === "customers" || item.category === "vendors") {
        detailsHTML = `
                    <div class="so-search-account-card-details">
                        <div class="so-search-account-card-detail">
                            <span class="so-search-account-card-detail-label">Mobile</span>
                            <span class="so-search-account-card-detail-value">${item.mobile || "-"}</span>
                        </div>
                        <div class="so-search-account-card-detail">
                            <span class="so-search-account-card-detail-label">City</span>
                            <span class="so-search-account-card-detail-value">${item.city || "-"}</span>
                        </div>
                        <div class="so-search-account-card-detail" style="grid-column: span 2;">
                            <span class="so-search-account-card-detail-label">GSTIN</span>
                            <span class="so-search-account-card-detail-value">${item.gstin || "-"}</span>
                        </div>
                    </div>
                `;
      } else if (item.category === "ledgers") {
        detailsHTML = `
                    <div class="so-search-account-card-details">
                        <div class="so-search-account-card-detail" style="grid-column: span 2;">
                            <span class="so-search-account-card-detail-label">Group</span>
                            <span class="so-search-account-card-detail-value">${item.group || "-"}</span>
                        </div>
                    </div>
                `;
      }

      return `
                <div class="so-search-account-card" data-id="${item.id}" data-category="${item.category}">
                    <div class="so-search-account-card-header">
                        <div class="so-search-account-card-icon ${item.color || ""}">
                            <span class="material-icons">${item.icon || "account_circle"}</span>
                        </div>
                        <div class="so-search-account-card-info">
                            <div class="so-search-account-card-name">${this.highlightMatch(item.title, query)}</div>
                            <div class="so-search-account-card-category">${categoryLabel}</div>
                        </div>
                        <div class="so-search-account-card-balance ${balanceClass}">${formattedBalance}</div>
                    </div>
                    ${detailsHTML}
                </div>
            `;
    }

    renderItemCard(item, query) {
      const stockClass = this.getStockClass(item.stock);
      const statusClass = item.status ? item.status.toLowerCase() : "";
      const highlightedName = this.highlightMatch(
        item.name || item.title || "",
        query,
      );

      return `
                <div class="so-search-item-card" data-id="${item.id}">
                    <div class="so-search-item-card-header">
                        <span class="so-search-item-card-sku">${this.escapeHtml(item.sku || "")}</span>
                        ${item.status ? `<span class="so-search-item-card-status ${statusClass}">${this.escapeHtml(item.status)}</span>` : ""}
                    </div>
                    <div class="so-search-item-card-title">${highlightedName}</div>
                    <div class="so-search-item-card-details">
                        <div class="so-search-item-card-detail">
                            <span class="so-search-item-card-detail-label">Stock</span>
                            <span class="so-search-item-card-detail-value ${stockClass}">${item.stock ?? "N/A"}</span>
                        </div>
                        <div class="so-search-item-card-detail">
                            <span class="so-search-item-card-detail-label">Price</span>
                            <span class="so-search-item-card-detail-value">${this.formatCurrency(item.price)}</span>
                        </div>
                        <div class="so-search-item-card-detail">
                            <span class="so-search-item-card-detail-label">Cost</span>
                            <span class="so-search-item-card-detail-value">${this.formatCurrency(item.cost)}</span>
                        </div>
                        <div class="so-search-item-card-detail">
                            <span class="so-search-item-card-detail-label">Vendor Stock</span>
                            <span class="so-search-item-card-detail-value">${item.vendorStock ?? "N/A"}</span>
                        </div>
                    </div>
                </div>
            `;
    }

    renderItemRow(item, query) {
      const stockClass = this.getStockClass(item.stock);
      const highlightedName = this.highlightMatch(
        item.name || item.title || "",
        query,
      );

      return `
                <div class="so-search-item-row" data-id="${item.id}">
                    <div class="so-search-item-row-info">
                        <span class="so-search-item-row-title">${highlightedName}</span>
                        <span class="so-search-item-row-sku">${this.escapeHtml(item.sku || "")}</span>
                    </div>
                    <span class="so-search-item-row-value ${stockClass}">${item.stock ?? "N/A"}</span>
                    <span class="so-search-item-row-value">${this.formatCurrency(item.price)}</span>
                    <span class="so-search-item-row-value">${this.formatCurrency(item.cost)}</span>
                    <span class="so-search-item-row-value">${this.escapeHtml(item.status || "")}</span>
                </div>
            `;
    }

    bindResultClickHandlers() {
      // Menu item clicks
      this.resultsContainer
        ?.querySelectorAll(".so-search-overlay-item")
        .forEach((el) => {
          el.addEventListener("click", (e) => {
            const id = el.dataset.id;
            if (this.options.onItemClick) {
              this.options.onItemClick(id, "menu", el);
            }
          });
        });

      // Account card clicks
      this.resultsContainer
        ?.querySelectorAll(".so-search-account-card")
        .forEach((card) => {
          card.addEventListener("click", () => {
            const id = card.dataset.id;
            const category = card.dataset.category;

            if (this.options.onAccountClick) {
              this.options.onAccountClick(id, category, card);
            }

            const event = new CustomEvent("searchAccountClick", {
              detail: { id, category, query: this.searchQuery },
            });
            document.dispatchEvent(event);

            this.close();
          });
        });
    }

    bindISVResultClickHandlers() {
      // Card clicks
      this.resultsGrid
        ?.querySelectorAll(".so-search-item-card")
        .forEach((card) => {
          card.addEventListener("click", () => {
            const id = card.dataset.id;
            if (this.options.onItemClick) {
              this.options.onItemClick(id, "item", card);
            }

            const event = new CustomEvent("searchResultClick", {
              detail: { id, isISV: true, query: this.searchQuery },
            });
            document.dispatchEvent(event);
          });
        });

      // Row clicks
      this.resultsList
        ?.querySelectorAll(".so-search-item-row")
        .forEach((row) => {
          row.addEventListener("click", () => {
            const id = row.dataset.id;
            if (this.options.onItemClick) {
              this.options.onItemClick(id, "item", row);
            }

            const event = new CustomEvent("searchResultClick", {
              detail: { id, isISV: true, query: this.searchQuery },
            });
            document.dispatchEvent(event);
          });
        });
    }

    updateNavigableItems() {
      this.items = Array.from(
        this.overlay.querySelectorAll(
          ".so-search-overlay-item, .so-search-account-card, .so-search-item-card, .so-search-item-row",
        ),
      );
      this.focusedIndex = -1;
    }

    // ============================================
    // FALLBACK DATA (for demo without backend)
    // ============================================
    getFallbackSearchData() {
      // Return loaded JSON data if available
      if (this.searchData) {
        return this.searchData;
      }

      // Hardcoded fallback if JSON files not loaded
      return {
        menus: [
          {
            id: "menu-si-1",
            title: "Create Sales Invoice",
            path: "Finance > Sales Invoice > Add",
            icon: "receipt_long",
            color: "blue",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-si-2",
            title: "Sales Invoice List",
            path: "Finance > Sales Invoice > List",
            icon: "list_alt",
            color: "blue",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-pi-1",
            title: "Create Purchase Invoice",
            path: "Finance > Purchase Invoice > Add",
            icon: "request_quote",
            color: "green",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-pi-2",
            title: "Purchase Invoice List",
            path: "Finance > Purchase Invoice > List",
            icon: "list_alt",
            color: "green",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-rc-1",
            title: "Create Receipt",
            path: "Finance > Receipt > Add",
            icon: "call_received",
            color: "blue",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-pm-1",
            title: "Create Payment",
            path: "Finance > Payment > Add",
            icon: "payments",
            color: "red",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-po-1",
            title: "Create Purchase Order",
            path: "Office > Purchase Order > Add",
            icon: "shopping_cart",
            color: "green",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-so-1",
            title: "Create Sales Order",
            path: "Office > Sales Order > Add",
            icon: "add_shopping_cart",
            color: "blue",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-stk-1",
            title: "Stock Report",
            path: "Inventory > Reports > Stock",
            icon: "inventory_2",
            color: "orange",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-sal-1",
            title: "Sales Report",
            path: "Reports > Sales > Summary",
            icon: "bar_chart",
            color: "green",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-cust-1",
            title: "Customer Master",
            path: "Master > Customer",
            icon: "people",
            color: "blue",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-vend-1",
            title: "Vendor Master",
            path: "Master > Vendor",
            icon: "storefront",
            color: "green",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-item-1",
            title: "Item Master",
            path: "Master > Item",
            icon: "inventory",
            color: "orange",
            href: "#",
            category: "menus",
          },
          {
            id: "menu-led-1",
            title: "Ledger Master",
            path: "Master > Ledger",
            icon: "account_balance",
            color: "purple",
            href: "#",
            category: "menus",
          },
        ],
        customers: [
          {
            id: "cust-1",
            title: "LATHA MOHAN",
            mobile: "9876543210",
            gstin: "29AABCT1234F1ZP",
            city: "Bangalore",
            walletBalance: 15000,
            icon: "person",
            color: "blue",
            category: "customers",
          },
          {
            id: "cust-2",
            title: "RAJESH KUMAR",
            mobile: "9876543211",
            gstin: "27AABCT5678G2ZQ",
            city: "Mumbai",
            walletBalance: -5000,
            icon: "person",
            color: "blue",
            category: "customers",
          },
          {
            id: "cust-3",
            title: "PRIYA SHARMA",
            mobile: "9876543212",
            gstin: "07AABCT9012H3ZR",
            city: "Delhi",
            walletBalance: 25000,
            icon: "person",
            color: "blue",
            category: "customers",
          },
          {
            id: "cust-4",
            title: "AMIT PATEL",
            mobile: "9876543213",
            gstin: "24AABCT3456I4ZS",
            city: "Ahmedabad",
            walletBalance: 0,
            icon: "person",
            color: "blue",
            category: "customers",
          },
        ],
        vendors: [
          {
            id: "vend-1",
            title: "ABC Suppliers Pvt Ltd",
            mobile: "9988776655",
            gstin: "29AABCS1234A1ZA",
            city: "Bangalore",
            walletBalance: -125000,
            icon: "storefront",
            color: "green",
            category: "vendors",
          },
          {
            id: "vend-2",
            title: "XYZ Distributors",
            mobile: "9988776656",
            gstin: "27AABCS5678B2ZB",
            city: "Mumbai",
            walletBalance: -75000,
            icon: "storefront",
            color: "green",
            category: "vendors",
          },
          {
            id: "vend-3",
            title: "Global Tech Solutions",
            mobile: "9988776657",
            gstin: "07AABCS9012C3ZC",
            city: "Delhi",
            walletBalance: -250000,
            icon: "storefront",
            color: "green",
            category: "vendors",
          },
        ],
        ledgers: [
          {
            id: "led-1",
            title: "Cash Account",
            group: "Cash-in-Hand",
            walletBalance: 150000,
            icon: "account_balance_wallet",
            color: "orange",
            category: "ledgers",
          },
          {
            id: "led-2",
            title: "HDFC Bank Account",
            group: "Bank Accounts",
            walletBalance: 2500000,
            icon: "account_balance",
            color: "orange",
            category: "ledgers",
          },
          {
            id: "led-3",
            title: "ICICI Bank Account",
            group: "Bank Accounts",
            walletBalance: 1800000,
            icon: "account_balance",
            color: "orange",
            category: "ledgers",
          },
          {
            id: "led-4",
            title: "Sales Account",
            group: "Sales Accounts",
            walletBalance: 5000000,
            icon: "trending_up",
            color: "green",
            category: "ledgers",
          },
          {
            id: "led-5",
            title: "Purchase Account",
            group: "Purchase Accounts",
            walletBalance: -3500000,
            icon: "trending_down",
            color: "red",
            category: "ledgers",
          },
        ],
      };
    }

    getFallbackISVData() {
      // Return loaded JSON data if available
      if (this.isvData) {
        return this.isvData;
      }

      // Hardcoded fallback if JSON files not loaded
      return {
        items: [
          {
            id: "prod-1",
            sku: "PHONE-IP14-128",
            name: "iPhone 14 Pro Max 128GB Space Black",
            stock: 25,
            price: 134900,
            cost: 120000,
            vendorStock: 150,
            status: "active",
          },
          {
            id: "prod-2",
            sku: "PHONE-IP14-256",
            name: "iPhone 14 Pro Max 256GB Deep Purple",
            stock: 8,
            price: 144900,
            cost: 128000,
            vendorStock: 80,
            status: "active",
          },
          {
            id: "prod-3",
            sku: "PHONE-IP15-128",
            name: "iPhone 15 Pro 128GB Natural Titanium",
            stock: 45,
            price: 134900,
            cost: 118000,
            vendorStock: 200,
            status: "active",
          },
          {
            id: "prod-4",
            sku: "PHONE-S23-256",
            name: "Samsung Galaxy S23 Ultra 256GB Phantom Black",
            stock: 0,
            price: 124999,
            cost: 105000,
            vendorStock: 0,
            status: "liquidation",
          },
          {
            id: "prod-5",
            sku: "PHONE-S24-256",
            name: "Samsung Galaxy S24 Ultra 256GB Titanium Gray",
            stock: 32,
            price: 134999,
            cost: 115000,
            vendorStock: 120,
            status: "active",
          },
          {
            id: "prod-6",
            sku: "LAPTOP-MB-M2",
            name: "MacBook Air M2 256GB Midnight",
            stock: 12,
            price: 114900,
            cost: 98000,
            vendorStock: 35,
            status: "active",
          },
          {
            id: "prod-7",
            sku: "LAPTOP-MB-M3",
            name: "MacBook Pro M3 512GB Space Gray",
            stock: 5,
            price: 169900,
            cost: 145000,
            vendorStock: 20,
            status: "active",
          },
          {
            id: "prod-8",
            sku: "AUDIO-APP-2",
            name: "AirPods Pro 2nd Gen with MagSafe Case",
            stock: 45,
            price: 26900,
            cost: 22000,
            vendorStock: 300,
            status: "active",
          },
          {
            id: "prod-9",
            sku: "AUDIO-APP-MAX",
            name: "AirPods Max Silver",
            stock: 3,
            price: 59900,
            cost: 50000,
            vendorStock: 15,
            status: "active",
          },
          {
            id: "prod-10",
            sku: "WATCH-AW9-45",
            name: "Apple Watch Series 9 45mm GPS",
            stock: 0,
            price: 45900,
            cost: 38000,
            vendorStock: 50,
            status: "active",
          },
          {
            id: "prod-11",
            sku: "TABLET-IPP-11",
            name: 'iPad Pro 11" M2 128GB WiFi',
            stock: 18,
            price: 84900,
            cost: 72000,
            vendorStock: 60,
            status: "active",
          },
          {
            id: "prod-12",
            sku: "TABLET-IPP-13",
            name: 'iPad Pro 12.9" M2 256GB WiFi',
            stock: 7,
            price: 119900,
            cost: 100000,
            vendorStock: 25,
            status: "active",
          },
        ],
      };
    }

    // ============================================
    // OPEN / CLOSE
    // ============================================
    open() {
      if (!this.overlay) return;

      this.overlay.classList.add("active");
      this.isOpen = true;
      document.body.style.overflow = "hidden";

      // Reset state
      this.isISVSearch = false;
      this.searchQuery = "";
      this.activeFilters = { stock: "all", status: "all" };
      this.activeCategory = "all";
      this.resetFiltersUI();
      this.resetCategoryTabs();

      // Hide filter bar and category tabs
      if (this.filterBar) this.filterBar.classList.remove("visible");
      if (this.categoryTabs) this.categoryTabs.classList.remove("visible");

      // Hide sections and results
      this.hideLegacySections();
      this.hideResults();

      // Show default view
      this.showDefaultQuickActions();

      // Focus input
      setTimeout(() => {
        if (this.input) {
          this.input.value = "";
          this.input.focus();
        }
      }, 100);

      // Reset navigation
      this.items = [];
      this.focusedIndex = -1;
    }

    close() {
      if (!this.overlay) return;

      this.overlay.classList.remove("active");
      this.isOpen = false;
      document.body.style.overflow = "";

      // Clear input
      if (this.input) {
        this.input.value = "";
      }

      this.clearFocus();
    }

    resetFiltersUI() {
      if (!this.filterBar) return;

      this.filterBar
        .querySelectorAll(".so-search-filter-btn")
        .forEach((btn) => {
          btn.classList.remove("active");
          const labelSpan = btn.querySelector(".filter-label");
          const filterType = btn.closest(".so-search-filter-dropdown")?.dataset
            .filter;
          if (labelSpan && filterType) {
            labelSpan.textContent =
              filterType.charAt(0).toUpperCase() + filterType.slice(1);
          }
        });

      this.filterBar
        .querySelectorAll(".so-search-filter-option")
        .forEach((opt) => {
          opt.classList.toggle("selected", opt.dataset.value === "all");
        });
    }

    resetCategoryTabs() {
      if (!this.categoryTabs) return;

      const tabs = this.categoryTabs.querySelectorAll(
        ".so-search-category-tab",
      );
      tabs.forEach((tab) => {
        tab.classList.toggle("active", tab.dataset.category === "all");
      });
    }

    // ============================================
    // KEYBOARD NAVIGATION
    // ============================================
    handleKeydown(e) {
      if (e.key === "ArrowDown") {
        e.preventDefault();
        this.focusNext();
      } else if (e.key === "ArrowUp") {
        e.preventDefault();
        this.focusPrev();
      } else if (e.key === "Enter") {
        e.preventDefault();
        this.selectFocused();
      }
    }

    focusNext() {
      this.clearFocus();
      this.focusedIndex = Math.min(
        this.focusedIndex + 1,
        this.items.length - 1,
      );
      this.applyFocus();
    }

    focusPrev() {
      this.clearFocus();
      this.focusedIndex = Math.max(this.focusedIndex - 1, 0);
      this.applyFocus();
    }

    clearFocus() {
      this.items.forEach((item) => item.classList.remove("focused"));
    }

    applyFocus() {
      if (this.focusedIndex >= 0 && this.focusedIndex < this.items.length) {
        this.items[this.focusedIndex].classList.add("focused");
        this.items[this.focusedIndex].scrollIntoView({ block: "nearest" });
      }
    }

    selectFocused() {
      if (this.focusedIndex >= 0 && this.focusedIndex < this.items.length) {
        const item = this.items[this.focusedIndex];
        if (item.href && item.href !== "#") {
          window.location.href = item.href;
        } else {
          item.click();
        }
        this.close();
      }
    }

    // ============================================
    // UTILITY FUNCTIONS
    // ============================================
    getStockClass(stock) {
      if (stock === undefined || stock === null) return "";
      if (stock > 10) return "in-stock";
      if (stock > 0) return "low-stock";
      return "out-of-stock";
    }

    formatCurrency(value) {
      if (value === undefined || value === null) return "N/A";
      return (
        "\u20B9" +
        parseFloat(value).toLocaleString("en-IN", {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2,
        })
      );
    }

    formatWalletBalance(value) {
      if (value === undefined || value === null) return "\u20B90";
      const absValue = Math.abs(value);
      const formatted = "\u20B9" + absValue.toLocaleString("en-IN");
      if (value < 0) return formatted + " Dr";
      if (value > 0) return formatted + " Cr";
      return formatted;
    }

    escapeHtml(text) {
      if (!text) return "";
      const div = document.createElement("div");
      div.textContent = text;
      return div.innerHTML;
    }

    highlightMatch(text, query) {
      if (!query || !text) return this.escapeHtml(text);
      const escapedText = this.escapeHtml(text);
      const escapedQuery = query.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
      const regex = new RegExp(`(${escapedQuery})`, "gi");
      return escapedText.replace(regex, "<mark>$1</mark>");
    }
  }

  // ============================================
  // AUTO-INITIALIZE & EXPOSE
  // ============================================

  // Expose class immediately so configure() can be called
  global.GlobalSearchController = GlobalSearchController;

  // Create instance - this needs DOM to be ready
  function initGlobalSearch() {
    // Only init if not already initialized
    if (global.globalSearch) return;

    const searchController = new GlobalSearchController();
    global.globalSearch = searchController;

    console.log(
      "GlobalSearch initialized. Use globalSearch.configure({...}) to set up API URLs.",
    );
  }

  // Initialize when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initGlobalSearch);
  } else {
    initGlobalSearch();
  }
})(typeof window !== "undefined" ? window : this);
