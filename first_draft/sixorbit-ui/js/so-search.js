/**
 * SixOrbit UI - Search Overlay Controller
 * Handles search overlay with quick links, filters, and ISV search
 * Supports configurable URLs for normal and ISV search
 * Version: 2.0.0
 */

(function(global) {
    'use strict';

    // ============================================
    // SEARCH OVERLAY CLASS
    // ============================================
    class SixOrbitSearchOverlay {
        constructor(options = {}) {
            this.options = {
                overlaySelector: '.so-search-overlay',
                backdropSelector: '.so-search-overlay-backdrop',
                inputSelector: '.so-search-overlay-input',
                itemSelector: '.so-search-overlay-item',
                quickLinksSelector: '.so-search-quick-links',
                filterBarSelector: '.so-search-filter-bar',
                categoryTabsSelector: '.so-search-category-tabs',
                resultsContainerSelector: '.so-search-results-container',
                resultsGridSelector: '.so-search-results-grid',
                resultsListSelector: '.so-search-results-list',
                emptyStateSelector: '.so-search-empty',
                loadingSelector: '.so-search-loading',
                // URL Configuration
                searchUrl: null,           // URL for normal search (receives: query)
                isvSearchUrl: null,        // URL for ISV search (receives: query, stock, status)
                debounceDelay: 300,        // Debounce delay in ms
                minQueryLength: 1,         // Minimum query length to trigger search
                // Callbacks
                onSearchResult: null,      // Called when search results are received
                onItemClick: null,         // Called when item is clicked
                onAccountClick: null,      // Called when account card is clicked
                onQuickActionClick: null,  // Called when quick action is clicked
                ...options
            };

            // DOM elements
            this.overlay = null;
            this.input = null;
            this.backdrop = null;
            this.quickLinks = null;
            this.filterBar = null;
            this.categoryTabs = null;
            this.resultsContainer = null;
            this.resultsGrid = null;
            this.resultsList = null;
            this.emptyState = null;
            this.loading = null;

            // State
            this.items = [];
            this.focusedIndex = -1;
            this.isOpen = false;
            this.currentView = 'grid';
            this.activeFilters = { stock: 'all', status: 'all' };
            this.activeCategory = 'all';
            this.isISVSearch = false;
            this.searchQuery = '';
            this.searchResults = [];
            this.debounceTimer = null;
            this.currentSearchData = null;  // Holds the current search data (from URL or fallback)
            this.isvSearchData = null;      // Holds ISV search data

            this.init();
        }

        /**
         * Initialize the search overlay with URL configuration
         * @param {Object} config - Configuration object with searchUrl and isvSearchUrl
         */
        configure(config = {}) {
            if (config.searchUrl) {
                this.options.searchUrl = config.searchUrl;
            }
            if (config.isvSearchUrl) {
                this.options.isvSearchUrl = config.isvSearchUrl;
            }
            if (config.debounceDelay !== undefined) {
                this.options.debounceDelay = config.debounceDelay;
            }
            if (config.minQueryLength !== undefined) {
                this.options.minQueryLength = config.minQueryLength;
            }
            if (config.onSearchResult) {
                this.options.onSearchResult = config.onSearchResult;
            }
            if (config.onItemClick) {
                this.options.onItemClick = config.onItemClick;
            }
            if (config.onAccountClick) {
                this.options.onAccountClick = config.onAccountClick;
            }
            if (config.onQuickActionClick) {
                this.options.onQuickActionClick = config.onQuickActionClick;
            }

            console.log('SixOrbit Search configured:', {
                searchUrl: this.options.searchUrl,
                isvSearchUrl: this.options.isvSearchUrl
            });
        }

        init() {
            this.overlay = document.querySelector(this.options.overlaySelector);
            if (!this.overlay) return;

            // Cache DOM elements
            this.input = this.overlay.querySelector(this.options.inputSelector);
            this.backdrop = this.overlay.querySelector(this.options.backdropSelector);
            this.quickLinks = this.overlay.querySelector(this.options.quickLinksSelector);
            this.filterBar = this.overlay.querySelector(this.options.filterBarSelector);
            this.categoryTabs = this.overlay.querySelector(this.options.categoryTabsSelector);
            this.resultsContainer = this.overlay.querySelector(this.options.resultsContainerSelector);
            this.resultsGrid = this.overlay.querySelector(this.options.resultsGridSelector);
            this.resultsList = this.overlay.querySelector(this.options.resultsListSelector);
            this.emptyState = this.overlay.querySelector(this.options.emptyStateSelector);
            this.loading = this.overlay.querySelector(this.options.loadingSelector);

            this.bindEvents();
            this.initFilters();
            this.initViewToggle();
            this.initCategoryTabs();
            this.initQuickLinks();
        }

        bindEvents() {
            // Ctrl+K / Cmd+K to open
            document.addEventListener('keydown', (e) => {
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    this.open();
                }
            });

            // Close on backdrop click
            if (this.backdrop) {
                this.backdrop.addEventListener('click', () => {
                    this.close();
                });
            }

            // Close button click
            const closeBtn = this.overlay?.querySelector('.so-search-overlay-close');
            if (closeBtn) {
                closeBtn.addEventListener('click', () => {
                    this.close();
                });
            }

            // Input events
            if (this.input) {
                this.input.addEventListener('input', () => {
                    this.handleSearch(this.input.value);
                });

                this.input.addEventListener('keydown', (e) => {
                    this.handleKeydown(e);
                });
            }

            // Escape to close
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.isOpen) {
                    e.preventDefault();
                    this.close();
                }
            });

            // Close filter dropdowns on outside click
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.so-search-filter-dropdown')) {
                    this.closeAllFilterDropdowns();
                }
            });
        }

        // ============================================
        // QUICK LINKS
        // ============================================
        initQuickLinks() {
            if (!this.quickLinks) return;

            const links = this.quickLinks.querySelectorAll('.so-search-quick-link');
            links.forEach(link => {
                link.addEventListener('click', (e) => {
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
            const event = new CustomEvent('searchQuickLinkClick', {
                detail: { action, element: link }
            });
            document.dispatchEvent(event);

            // Close overlay if link has href
            if (link.href && link.href !== '#' && !link.href.endsWith('void(0)')) {
                this.close();
            }
        }

        // ============================================
        // FILTERS
        // ============================================
        initFilters() {
            if (!this.filterBar) return;

            const dropdowns = this.filterBar.querySelectorAll('.so-search-filter-dropdown');

            dropdowns.forEach(dropdown => {
                const btn = dropdown.querySelector('.so-search-filter-btn');
                const menu = dropdown.querySelector('.so-search-filter-menu');
                const filterType = dropdown.dataset.filter;

                if (!btn || !menu) return;

                // Toggle dropdown
                btn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    // Close other dropdowns
                    dropdowns.forEach(d => {
                        if (d !== dropdown) {
                            d.querySelector('.so-search-filter-menu')?.classList.remove('open');
                        }
                    });
                    menu.classList.toggle('open');
                });

                // Handle option selection
                menu.querySelectorAll('.so-search-filter-option').forEach(option => {
                    option.addEventListener('click', (e) => {
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
                const labelSpan = btn.querySelector('.filter-label');
                if (labelSpan) {
                    labelSpan.textContent = selectedOption.textContent.trim();
                }
            }

            // Mark selected option
            menu.querySelectorAll('.so-search-filter-option').forEach(opt => {
                opt.classList.toggle('selected', opt.dataset.value === value);
            });

            // Update button state
            btn.classList.toggle('active', value !== 'all');

            // Close menu
            menu.classList.remove('open');

            // Re-fetch with new filters for ISV search
            if (this.isISVSearch) {
                const actualQuery = this.searchQuery.toLowerCase().startsWith('isv:')
                    ? this.searchQuery.substring(4).trim()
                    : this.searchQuery;
                this.performISVSearch(actualQuery);
            }
        }

        closeAllFilterDropdowns() {
            if (!this.filterBar) return;
            this.filterBar.querySelectorAll('.so-search-filter-menu').forEach(menu => {
                menu.classList.remove('open');
            });
        }

        // ============================================
        // VIEW TOGGLE
        // ============================================
        initViewToggle() {
            const toggle = this.filterBar?.querySelector('.so-search-view-toggle');
            if (!toggle) return;

            const buttons = toggle.querySelectorAll('.so-search-view-btn');

            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const view = btn.dataset.view;
                    this.setView(view);

                    // Update active state
                    buttons.forEach(b => b.classList.toggle('active', b === btn));
                });
            });
        }

        setView(view) {
            this.currentView = view;

            if (this.resultsGrid) {
                this.resultsGrid.classList.toggle('visible', view === 'grid');
            }
            if (this.resultsList) {
                this.resultsList.classList.toggle('visible', view === 'list');
            }

            // Emit event
            const event = new CustomEvent('searchViewChanged', {
                detail: { view }
            });
            document.dispatchEvent(event);
        }

        // ============================================
        // CATEGORY TABS
        // ============================================
        initCategoryTabs() {
            if (!this.categoryTabs) return;

            const tabs = this.categoryTabs.querySelectorAll('.so-search-category-tab');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    this.activeCategory = tab.dataset.category;
                    tabs.forEach(t => t.classList.toggle('active', t === tab));

                    // Re-render with new category filter
                    if (this.currentSearchData) {
                        this.renderNormalSearchResults(this.currentSearchData, this.searchQuery);
                    }
                });
            });
        }

        updateCategoryCounts(counts) {
            if (!this.categoryTabs) return;

            Object.keys(counts).forEach(category => {
                const tab = this.categoryTabs.querySelector(`[data-category="${category}"]`);
                if (tab) {
                    const countSpan = tab.querySelector('.so-search-category-count');
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
            this.searchQuery = query;

            // Debounce search
            clearTimeout(this.debounceTimer);
            this.debounceTimer = setTimeout(() => {
                this.performSearch(query);
            }, this.options.debounceDelay);
        }

        performSearch(query) {
            const trimmedQuery = query.trim();

            // Check for ISV prefix
            const isISV = trimmedQuery.toLowerCase().startsWith('isv:');
            this.isISVSearch = isISV;

            // Show/hide UI elements based on search state
            this.updateSearchUI(trimmedQuery, isISV);

            // Get actual search query (without prefix)
            const actualQuery = isISV ? trimmedQuery.substring(4).trim() : trimmedQuery;

            // If search is completely empty, show default view with quick actions
            if (!trimmedQuery || trimmedQuery.length === 0) {
                this.showDefaultQuickActions();
                return;
            }

            // If only "isv:" prefix is typed without search term
            if (isISV && (!actualQuery || actualQuery.length < this.options.minQueryLength)) {
                this.showISVHint();
                return;
            }

            // Check minimum query length for normal search
            if (!isISV && (!actualQuery || actualQuery.length < this.options.minQueryLength)) {
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
         * Perform normal search - fetches from URL and displays results directly
         * No client-side filtering - server returns filtered results based on query
         */
        async performNormalSearch(query) {
            // Hide legacy sections during search
            const sections = this.overlay?.querySelectorAll('.so-search-overlay-section');
            sections?.forEach(s => s.style.display = 'none');

            // Hide quick links
            if (this.quickLinks) this.quickLinks.style.display = 'none';

            this.showLoading();

            try {
                let data;

                if (this.options.searchUrl) {
                    // Fetch from configured URL - server handles filtering
                    const url = new URL(this.options.searchUrl, window.location.origin);
                    url.searchParams.append('query', query);

                    const response = await fetch(url.toString());
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    data = await response.json();
                } else {
                    // Use fallback data for demo
                    data = this.getFallbackSearchData();
                }

                this.currentSearchData = data;
                this.hideLoading();

                // Call callback if provided
                if (this.options.onSearchResult) {
                    this.options.onSearchResult(data, query, false);
                }

                // Render results directly (no filtering)
                this.renderNormalSearchResults(data, query);

            } catch (error) {
                console.warn('Search error, using fallback:', error);
                this.hideLoading();

                // Use fallback data on error
                const data = this.getFallbackSearchData();
                this.currentSearchData = data;
                this.renderNormalSearchResults(data, query);
            }
        }

        /**
         * Perform ISV search - fetches from URL with stock/status filters
         * No client-side filtering - server returns filtered results
         */
        async performISVSearch(query) {
            // Hide legacy sections
            const sections = this.overlay?.querySelectorAll('.so-search-overlay-section');
            sections?.forEach(s => s.style.display = 'none');

            // Hide quick links
            if (this.quickLinks) this.quickLinks.style.display = 'none';

            // Show hint if query is empty
            if (!query || query.trim() === '') {
                this.showISVHint();
                return;
            }

            this.showLoading();

            try {
                let data;

                if (this.options.isvSearchUrl) {
                    // Fetch from configured URL with filters - server handles filtering
                    const url = new URL(this.options.isvSearchUrl, window.location.origin);
                    url.searchParams.append('query', query);
                    url.searchParams.append('stock', this.activeFilters.stock);
                    url.searchParams.append('status', this.activeFilters.status);

                    const response = await fetch(url.toString());
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    data = await response.json();
                } else {
                    // Use fallback data for demo
                    data = this.getFallbackISVData();
                }

                this.isvSearchData = data;
                this.hideLoading();

                // Call callback if provided
                if (this.options.onSearchResult) {
                    this.options.onSearchResult(data, query, true);
                }

                // Render results directly (no filtering)
                this.renderISVSearchResults(data, query);

            } catch (error) {
                console.warn('ISV Search error, using fallback:', error);
                this.hideLoading();

                // Use fallback data on error
                const data = this.getFallbackISVData();
                this.isvSearchData = data;
                this.renderISVSearchResults(data, query);
            }
        }

        showISVHint() {
            this.hideLoading();
            if (this.resultsGrid) this.resultsGrid.classList.remove('visible');
            if (this.resultsList) this.resultsList.classList.remove('visible');

            // Hide legacy sections
            const sections = this.overlay?.querySelectorAll('.so-search-overlay-section');
            sections?.forEach(s => s.style.display = 'none');

            // Hide quick links
            if (this.quickLinks) this.quickLinks.style.display = 'none';

            if (this.emptyState) {
                const iconEl = this.emptyState.querySelector('.so-search-empty-icon');
                const titleEl = this.emptyState.querySelector('.so-search-empty-title');
                const textEl = this.emptyState.querySelector('.so-search-empty-text');

                if (iconEl) iconEl.textContent = 'inventory_2';
                if (titleEl) titleEl.textContent = 'Item Search Mode';
                if (textEl) textEl.textContent = 'Type further to search for products by name or SKU';

                this.emptyState.classList.add('visible');
            }
        }

        /**
         * Show default view with quick actions when search is empty
         */
        showDefaultQuickActions() {
            this.hideLoading();
            this.hideEmptyState();
            if (this.resultsGrid) this.resultsGrid.classList.remove('visible');
            if (this.resultsList) this.resultsList.classList.remove('visible');

            // Hide legacy sections
            const sections = this.overlay?.querySelectorAll('.so-search-overlay-section');
            sections?.forEach(s => s.style.display = 'none');

            // Show quick links
            if (this.quickLinks) this.quickLinks.style.display = '';

            // Show hint message
            if (this.emptyState) {
                const iconEl = this.emptyState.querySelector('.so-search-empty-icon');
                const titleEl = this.emptyState.querySelector('.so-search-empty-title');
                const textEl = this.emptyState.querySelector('.so-search-empty-text');

                if (iconEl) iconEl.textContent = 'search';
                if (titleEl) titleEl.textContent = 'Start typing to search';
                if (textEl) textEl.textContent = 'Search for menus, customers, vendors, ledgers or type "isv:" for item search';

                this.emptyState.classList.add('visible');
            }
        }

        resetToDefaultView() {
            // Reset to default view with quick actions and hint
            this.hideLoading();
            this.showDefaultQuickActions();
        }

        updateSearchUI(query, isISV) {
            const hasQuery = query.length > 0;

            // Show/hide quick links
            if (this.quickLinks) {
                this.quickLinks.style.display = hasQuery ? 'none' : '';
            }

            // Show/hide filter bar (only for ISV search)
            if (this.filterBar) {
                this.filterBar.classList.toggle('visible', isISV && hasQuery);
            }

            // Show/hide category tabs (for non-ISV search with results)
            if (this.categoryTabs) {
                this.categoryTabs.classList.toggle('visible', hasQuery && !isISV);
            }
        }

        // ============================================
        // RESULTS RENDERING
        // ============================================
        /**
         * Render normal search results - displays data directly from server
         * No client-side filtering - server already filtered the results
         */
        renderNormalSearchResults(data, query) {
            // Get results directly from data (no filtering)
            const menuResults = data.menus || [];
            const customers = data.customers || [];
            const vendors = data.vendors || [];
            const ledgers = data.ledgers || [];

            // Update category counts
            const counts = {
                all: menuResults.length + customers.length + vendors.length + ledgers.length,
                menus: menuResults.length,
                customers: customers.length,
                vendors: vendors.length,
                ledgers: ledgers.length
            };
            this.updateCategoryCounts(counts);

            // Apply category filter (client-side category switching)
            let filteredMenus = menuResults;
            let accountResults = [...customers, ...vendors, ...ledgers];

            if (this.activeCategory !== 'all') {
                if (this.activeCategory === 'menus') {
                    accountResults = [];
                } else {
                    filteredMenus = [];
                    if (this.activeCategory === 'customers') {
                        accountResults = customers;
                    } else if (this.activeCategory === 'vendors') {
                        accountResults = vendors;
                    } else if (this.activeCategory === 'ledgers') {
                        accountResults = ledgers;
                    }
                }
            }

            // Get sections
            const sections = this.overlay?.querySelectorAll('.so-search-overlay-section');
            const recentSection = sections?.[0];
            const actionsSection = sections?.[1];

            // Hide empty state and results containers
            this.hideEmptyState();
            if (this.resultsGrid) this.resultsGrid.classList.remove('visible');
            if (this.resultsList) this.resultsList.classList.remove('visible');

            // Check if all results are empty
            if (filteredMenus.length === 0 && accountResults.length === 0) {
                // Hide sections and show empty state with "no results found"
                if (recentSection) recentSection.style.display = 'none';
                if (actionsSection) actionsSection.style.display = 'none';
                this.showNoResultsFound();
                return;
            }

            // Render menu results
            if (recentSection) {
                const titleEl = recentSection.querySelector('.so-search-overlay-section-title');
                const resultsEl = recentSection.querySelector('.so-search-overlay-results');

                if (titleEl) titleEl.textContent = 'Menu & Actions';
                if (filteredMenus.length > 0) {
                    recentSection.style.display = '';
                    if (resultsEl) {
                        resultsEl.innerHTML = filteredMenus.slice(0, 10).map(item => `
                            <a href="${item.href || '#'}" class="so-search-overlay-item" data-id="${item.id}">
                                <div class="so-search-overlay-item-icon ${item.color || ''}">
                                    <span class="material-icons">${item.icon || 'folder'}</span>
                                </div>
                                <div class="so-search-overlay-item-content">
                                    <div class="so-search-overlay-item-title">${this.highlightMatch(item.title, query)}</div>
                                    <div class="so-search-overlay-item-path">${item.path || ''}</div>
                                </div>
                                <span class="material-icons so-search-overlay-item-arrow">arrow_forward</span>
                            </a>
                        `).join('');

                        // Bind click handlers
                        resultsEl.querySelectorAll('.so-search-overlay-item').forEach(el => {
                            el.addEventListener('click', (e) => {
                                const id = el.dataset.id;
                                if (this.options.onItemClick) {
                                    this.options.onItemClick(id, 'menu', el);
                                }
                            });
                        });
                    }
                } else {
                    recentSection.style.display = 'none';
                }
            }

            // Render account results (customers, vendors, ledgers)
            if (actionsSection) {
                const titleEl = actionsSection.querySelector('.so-search-overlay-section-title');
                const resultsEl = actionsSection.querySelector('.so-search-overlay-results');

                if (titleEl) titleEl.textContent = 'Accounts';
                if (accountResults.length > 0) {
                    actionsSection.style.display = '';
                    if (resultsEl) {
                        resultsEl.innerHTML = `<div class="so-search-account-cards">${accountResults.slice(0, 12).map(item => this.renderAccountCard(item, query)).join('')}</div>`;

                        // Bind click handlers
                        resultsEl.querySelectorAll('.so-search-account-card').forEach(card => {
                            card.addEventListener('click', () => {
                                const id = card.dataset.id;
                                const category = card.dataset.category;

                                if (this.options.onAccountClick) {
                                    this.options.onAccountClick(id, category, card);
                                }

                                // Emit custom event
                                const event = new CustomEvent('searchAccountClick', {
                                    detail: { id, category, query }
                                });
                                document.dispatchEvent(event);

                                this.close();
                            });
                        });
                    }
                } else {
                    actionsSection.style.display = 'none';
                }
            }

            // Update keyboard navigation items
            this.items = Array.from(this.overlay.querySelectorAll('.so-search-overlay-item, .so-search-account-card'));
            this.focusedIndex = -1;
        }

        /**
         * Render ISV search results - displays data directly from server
         * No client-side filtering - server already filtered by query, stock, and status
         */
        renderISVSearchResults(data, query) {
            // Get items directly from data (no filtering - server already filtered)
            const items = data.items || [];

            this.hideEmptyState();

            // Check if no results
            if (items.length === 0) {
                this.showNoResultsFound();
                return;
            }

            // Clear and render grid
            if (this.resultsGrid) {
                this.resultsGrid.innerHTML = items.map(item => this.renderItemCard(item, query)).join('');
            }

            // Clear and render list
            if (this.resultsList) {
                this.resultsList.innerHTML = `
                    <div class="so-search-list-header">
                        <span>Item</span>
                        <span>Stock</span>
                        <span>Price</span>
                        <span>Cost</span>
                        <span>Status</span>
                    </div>
                ` + items.map(item => this.renderItemRow(item, query)).join('');
            }

            // Show appropriate view
            if (this.currentView === 'grid') {
                this.resultsGrid?.classList.add('visible');
                this.resultsList?.classList.remove('visible');
            } else {
                this.resultsList?.classList.add('visible');
                this.resultsGrid?.classList.remove('visible');
            }

            // Bind click handlers
            this.bindISVResultClickHandlers();

            // Update items for keyboard navigation
            this.items = Array.from(this.overlay.querySelectorAll('.so-search-item-card, .so-search-item-row'));
            this.focusedIndex = -1;
        }

        renderAccountCard(item, query) {
            const balanceClass = item.walletBalance > 0 ? 'positive' : (item.walletBalance < 0 ? 'negative' : 'neutral');
            const formattedBalance = this.formatWalletBalance(item.walletBalance);

            let categoryLabel = '';
            if (item.category === 'customers') categoryLabel = 'Customer';
            else if (item.category === 'vendors') categoryLabel = 'Vendor';
            else if (item.category === 'ledgers') categoryLabel = 'Ledger';

            let detailsHTML = '';
            if (item.category === 'customers' || item.category === 'vendors') {
                detailsHTML = `
                    <div class="so-search-account-card-details">
                        <div class="so-search-account-card-detail">
                            <span class="so-search-account-card-detail-label">Mobile</span>
                            <span class="so-search-account-card-detail-value">${item.mobile || '-'}</span>
                        </div>
                        <div class="so-search-account-card-detail">
                            <span class="so-search-account-card-detail-label">City</span>
                            <span class="so-search-account-card-detail-value">${item.city || '-'}</span>
                        </div>
                        <div class="so-search-account-card-detail" style="grid-column: span 2;">
                            <span class="so-search-account-card-detail-label">GSTIN</span>
                            <span class="so-search-account-card-detail-value">${item.gstin || '-'}</span>
                        </div>
                    </div>
                `;
            } else if (item.category === 'ledgers') {
                detailsHTML = `
                    <div class="so-search-account-card-details">
                        <div class="so-search-account-card-detail" style="grid-column: span 2;">
                            <span class="so-search-account-card-detail-label">Group</span>
                            <span class="so-search-account-card-detail-value">${item.group || '-'}</span>
                        </div>
                    </div>
                `;
            }

            return `
                <div class="so-search-account-card" data-id="${item.id}" data-category="${item.category}">
                    <div class="so-search-account-card-header">
                        <div class="so-search-account-card-icon ${item.color || ''}">
                            <span class="material-icons">${item.icon || 'account_circle'}</span>
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
            const statusClass = item.status ? item.status.toLowerCase() : '';
            const highlightedName = this.highlightMatch(item.name || item.title || '', query);

            return `
                <div class="so-search-item-card" data-id="${item.id}">
                    <div class="so-search-item-card-header">
                        <span class="so-search-item-card-sku">${this.escapeHtml(item.sku || '')}</span>
                        ${item.status ? `<span class="so-search-item-card-status ${statusClass}">${this.escapeHtml(item.status)}</span>` : ''}
                    </div>
                    <div class="so-search-item-card-title">${highlightedName}</div>
                    <div class="so-search-item-card-details">
                        <div class="so-search-item-card-detail">
                            <span class="so-search-item-card-detail-label">Stock</span>
                            <span class="so-search-item-card-detail-value ${stockClass}">${item.stock ?? 'N/A'}</span>
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
                            <span class="so-search-item-card-detail-value">${item.vendorStock ?? 'N/A'}</span>
                        </div>
                    </div>
                </div>
            `;
        }

        renderItemRow(item, query) {
            const stockClass = this.getStockClass(item.stock);
            const highlightedName = this.highlightMatch(item.name || item.title || '', query);

            return `
                <div class="so-search-item-row" data-id="${item.id}">
                    <div class="so-search-item-row-info">
                        <span class="so-search-item-row-title">${highlightedName}</span>
                        <span class="so-search-item-row-sku">${this.escapeHtml(item.sku || '')}</span>
                    </div>
                    <span class="so-search-item-row-value ${stockClass}">${item.stock ?? 'N/A'}</span>
                    <span class="so-search-item-row-value">${this.formatCurrency(item.price)}</span>
                    <span class="so-search-item-row-value">${this.formatCurrency(item.cost)}</span>
                    <span class="so-search-item-row-value">${this.escapeHtml(item.status || '')}</span>
                </div>
            `;
        }

        bindISVResultClickHandlers() {
            // Card clicks
            this.resultsGrid?.querySelectorAll('.so-search-item-card').forEach(card => {
                card.addEventListener('click', () => {
                    const id = card.dataset.id;
                    if (this.options.onItemClick) {
                        this.options.onItemClick(id, 'item', card);
                    }

                    const event = new CustomEvent('searchResultClick', {
                        detail: { id, isISV: true, query: this.searchQuery }
                    });
                    document.dispatchEvent(event);
                });
            });

            // Row clicks
            this.resultsList?.querySelectorAll('.so-search-item-row').forEach(row => {
                row.addEventListener('click', () => {
                    const id = row.dataset.id;
                    if (this.options.onItemClick) {
                        this.options.onItemClick(id, 'item', row);
                    }

                    const event = new CustomEvent('searchResultClick', {
                        detail: { id, isISV: true, query: this.searchQuery }
                    });
                    document.dispatchEvent(event);
                });
            });
        }

        // ============================================
        // FALLBACK DATA
        // ============================================
        getFallbackSearchData() {
            return {
                quickActions: [
                    { id: 'qa-1', title: 'New Sales Invoice', path: 'Finance > Sales Invoice > Add', icon: 'add_circle', color: 'blue', href: '#' },
                    { id: 'qa-2', title: 'New Purchase Order', path: 'Office > Purchase Order > Add', icon: 'add_circle', color: 'green', href: '#' }
                ],
                menus: [
                    { id: 'menu-si-1', title: 'Create Sales Invoice', path: 'Finance > Sales Invoice > Add', icon: 'receipt_long', color: 'blue', href: '#', category: 'menus' },
                    { id: 'menu-pi-1', title: 'Create Purchase Invoice', path: 'Finance > Purchase Invoice > Add', icon: 'request_quote', color: 'green', href: '#', category: 'menus' },
                    { id: 'menu-rc-1', title: 'Create Receipt', path: 'Finance > Receipt > Add', icon: 'call_received', color: 'blue', href: '#', category: 'menus' },
                    { id: 'menu-pm-1', title: 'Create Payment', path: 'Finance > Payment > Add', icon: 'payments', color: 'red', href: '#', category: 'menus' }
                ],
                customers: [
                    { id: 'cust-1', title: 'LATHA MOHAN', mobile: '9876543210', gstin: '29AABCT1234F1ZP', city: 'Bangalore', walletBalance: 15000, icon: 'person', color: 'blue', category: 'customers' },
                    { id: 'cust-2', title: 'RAJESH KUMAR', mobile: '9876543211', gstin: '27AABCT5678G2ZQ', city: 'Mumbai', walletBalance: -5000, icon: 'person', color: 'blue', category: 'customers' }
                ],
                vendors: [
                    { id: 'vend-1', title: 'ABC Suppliers Pvt Ltd', mobile: '9988776655', gstin: '29AABCS1234A1ZA', city: 'Bangalore', walletBalance: -125000, icon: 'storefront', color: 'green', category: 'vendors' }
                ],
                ledgers: [
                    { id: 'led-1', title: 'Cash Account', group: 'Cash-in-Hand', walletBalance: 150000, icon: 'account_balance_wallet', color: 'orange', category: 'ledgers' },
                    { id: 'led-2', title: 'HDFC Bank Account', group: 'Bank Accounts', walletBalance: 2500000, icon: 'account_balance', color: 'orange', category: 'ledgers' }
                ]
            };
        }

        getFallbackISVData() {
            return {
                items: [
                    { id: 'prod-1', sku: 'PHONE-IP14-128', name: 'iPhone 14 Pro Max 128GB Space Black', stock: 25, price: 134900, cost: 120000, vendorStock: 150, status: 'active', category: 'items' },
                    { id: 'prod-2', sku: 'PHONE-IP14-256', name: 'iPhone 14 Pro Max 256GB Deep Purple', stock: 8, price: 144900, cost: 128000, vendorStock: 80, status: 'active', category: 'items' },
                    { id: 'prod-3', sku: 'PHONE-S23-256', name: 'Samsung Galaxy S23 Ultra 256GB Phantom Black', stock: 0, price: 124999, cost: 105000, vendorStock: 0, status: 'liquidation', category: 'items' },
                    { id: 'prod-4', sku: 'LAPTOP-MB-M2', name: 'MacBook Air M2 256GB Midnight', stock: 12, price: 114900, cost: 98000, vendorStock: 35, status: 'active', category: 'items' },
                    { id: 'prod-5', sku: 'AUDIO-APP-2', name: 'AirPods Pro 2nd Gen with MagSafe Case', stock: 45, price: 26900, cost: 22000, vendorStock: 300, status: 'active', category: 'items' }
                ]
            };
        }

        // ============================================
        // UI STATE HELPERS
        // ============================================
        showLoading() {
            if (this.loading) {
                this.loading.classList.add('visible');
            }
            if (this.resultsGrid) {
                this.resultsGrid.classList.remove('visible');
            }
            if (this.resultsList) {
                this.resultsList.classList.remove('visible');
            }
            this.hideEmptyState();
        }

        hideLoading() {
            if (this.loading) {
                this.loading.classList.remove('visible');
            }
        }

        showEmptyState() {
            if (this.emptyState) {
                this.emptyState.classList.add('visible');
            }
            if (this.resultsGrid) {
                this.resultsGrid.classList.remove('visible');
            }
            if (this.resultsList) {
                this.resultsList.classList.remove('visible');
            }
        }

        hideEmptyState() {
            if (this.emptyState) {
                this.emptyState.classList.remove('visible');
            }
        }

        /**
         * Show "No results found" state with appropriate icon
         */
        showNoResultsFound() {
            if (this.resultsGrid) this.resultsGrid.classList.remove('visible');
            if (this.resultsList) this.resultsList.classList.remove('visible');

            if (this.emptyState) {
                const iconEl = this.emptyState.querySelector('.so-search-empty-icon');
                const titleEl = this.emptyState.querySelector('.so-search-empty-title');
                const textEl = this.emptyState.querySelector('.so-search-empty-text');

                if (iconEl) iconEl.textContent = 'search_off';
                if (titleEl) titleEl.textContent = 'No results found';
                if (textEl) textEl.textContent = 'Try adjusting your search query or filters';

                this.emptyState.classList.add('visible');
            }
        }

        // ============================================
        // OPEN / CLOSE
        // ============================================
        open() {
            if (!this.overlay) return;

            this.overlay.classList.add('active');
            this.isOpen = true;
            document.body.style.overflow = 'hidden';

            // Reset state
            this.isISVSearch = false;
            this.searchQuery = '';
            this.activeFilters = { stock: 'all', status: 'all' };
            this.activeCategory = 'all';
            this.resetFiltersUI();
            this.resetCategoryTabs();

            // Hide filter bar and category tabs
            if (this.filterBar) this.filterBar.classList.remove('visible');
            if (this.categoryTabs) this.categoryTabs.classList.remove('visible');

            // Hide legacy sections
            const sections = this.overlay?.querySelectorAll('.so-search-overlay-section');
            sections?.forEach(s => s.style.display = 'none');

            // Hide results
            if (this.resultsGrid) this.resultsGrid.classList.remove('visible');
            if (this.resultsList) this.resultsList.classList.remove('visible');

            // Show default view with quick actions and hint
            this.showDefaultQuickActions();

            // Focus input after animation
            setTimeout(() => {
                if (this.input) {
                    this.input.focus();
                    this.input.select();
                }
            }, 100);

            // Update items list
            this.items = Array.from(this.overlay.querySelectorAll(this.options.itemSelector));
            this.focusedIndex = -1;
        }

        close() {
            if (!this.overlay) return;

            this.overlay.classList.remove('active');
            this.isOpen = false;
            document.body.style.overflow = '';

            // Clear input
            if (this.input) {
                this.input.value = '';
            }

            // Clear focus
            this.clearFocus();
        }

        resetFiltersUI() {
            if (!this.filterBar) return;

            // Reset filter buttons text
            this.filterBar.querySelectorAll('.so-search-filter-btn').forEach(btn => {
                btn.classList.remove('active');
                const labelSpan = btn.querySelector('.filter-label');
                const filterType = btn.closest('.so-search-filter-dropdown')?.dataset.filter;
                if (labelSpan && filterType) {
                    labelSpan.textContent = filterType.charAt(0).toUpperCase() + filterType.slice(1);
                }
            });

            // Reset selected options
            this.filterBar.querySelectorAll('.so-search-filter-option').forEach(opt => {
                opt.classList.toggle('selected', opt.dataset.value === 'all');
            });
        }

        resetCategoryTabs() {
            if (!this.categoryTabs) return;

            const tabs = this.categoryTabs.querySelectorAll('.so-search-category-tab');
            tabs.forEach(tab => {
                tab.classList.toggle('active', tab.dataset.category === 'all');
            });
        }

        // ============================================
        // KEYBOARD NAVIGATION
        // ============================================
        handleKeydown(e) {
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                this.focusNext();
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                this.focusPrev();
            } else if (e.key === 'Enter') {
                e.preventDefault();
                this.selectFocused();
            }
        }

        focusNext() {
            this.clearFocus();
            this.focusedIndex = Math.min(this.focusedIndex + 1, this.items.length - 1);
            this.applyFocus();
        }

        focusPrev() {
            this.clearFocus();
            this.focusedIndex = Math.max(this.focusedIndex - 1, 0);
            this.applyFocus();
        }

        clearFocus() {
            this.items.forEach(item => item.classList.remove('focused'));
        }

        applyFocus() {
            if (this.focusedIndex >= 0 && this.focusedIndex < this.items.length) {
                this.items[this.focusedIndex].classList.add('focused');
                this.items[this.focusedIndex].scrollIntoView({ block: 'nearest' });
            }
        }

        selectFocused() {
            if (this.focusedIndex >= 0 && this.focusedIndex < this.items.length) {
                const item = this.items[this.focusedIndex];
                if (item.href) {
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
            if (stock === undefined || stock === null) return '';
            if (stock > 10) return 'in-stock';
            if (stock > 0) return 'low-stock';
            return 'out-of-stock';
        }

        formatCurrency(value) {
            if (value === undefined || value === null) return 'N/A';
            return '₹' + parseFloat(value).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        formatWalletBalance(value) {
            if (value === undefined || value === null) return '₹0';
            const absValue = Math.abs(value);
            const formatted = '₹' + absValue.toLocaleString('en-IN');
            if (value < 0) return formatted + ' Dr';
            if (value > 0) return formatted + ' Cr';
            return formatted;
        }

        escapeHtml(text) {
            if (!text) return '';
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }

        highlightMatch(text, query) {
            if (!query || !text) return this.escapeHtml(text);
            const escapedText = this.escapeHtml(text);
            const escapedQuery = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
            const regex = new RegExp(`(${escapedQuery})`, 'gi');
            return escapedText.replace(regex, '<mark>$1</mark>');
        }
    }

    // ============================================
    // AUTO-INITIALIZE & EXPOSE
    // ============================================
    function initSixOrbitSearch() {
        const searchOverlay = new SixOrbitSearchOverlay();

        // Expose to global scope
        global.SixOrbitSearchOverlay = SixOrbitSearchOverlay;
        global.soSearchOverlay = searchOverlay;
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSixOrbitSearch);
    } else {
        initSixOrbitSearch();
    }

})(typeof window !== 'undefined' ? window : this);
