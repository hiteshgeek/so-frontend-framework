/**
 * Report List Plugin
 * Version: 1.0.0
 * A lightweight, framework-agnostic plugin for displaying report list
 */

class ReportListPlugin {
    constructor(selector, config = {}) {
        this.container = document.querySelector(selector);
        if (!this.container) {
            console.error(`ReportListPlugin: Container "${selector}" not found`);
            return;
        }

        // Search timeout for debouncing
        this.searchTimeout = null;

        // Default configuration
        const defaultConfig = {
            dataSource: 'json',
            jsonData: null,
            jsonUrl: null,
            onFavoriteAdd: null,
            onFavoriteRemove: null,
            onReportClick: null,
            persistView: true,
            persistFavorites: true,
            storageKey: 'reportListPlugin',
            defaultView: 'grid',
            showViewSwitcher: true,
            showSearch: true,
            autoLoadGoogleSans: true,
            autoLoadMaterialIcons: true,
            useFallbackIcons: true,
            materialIconsUrl: 'https://fonts.googleapis.com/icon?family=Material+Icons',
            labels: {
                title: 'Report List',
                searchPlaceholder: 'Search reports',
                allReports: 'All reports',
                favoritesAndMostUsed: 'Favorites & Most Used',
                favorites: 'Favorites',
                mostUsed: 'Most Used Reports',
                noResults: 'No reports found',
                tryDifferent: 'Try different keywords'
            }
        };

        // Deep merge labels if provided
        this.config = {
            ...defaultConfig,
            ...config,
            labels: {
                ...defaultConfig.labels,
                ...(config.labels || {})
            }
        };

        this.state = {
            currentCategory: 'all',
            searchTerm: '',
            currentView: this.config.defaultView,
            data: null
        };

        this.init();
    }

    init() {
        // Load Google Sans font if needed
        if (this.config.autoLoadGoogleSans && !this.isGoogleSansLoaded()) {
            this.loadGoogleSans();
        }

        // Load Material Icons if needed
        if (this.config.autoLoadMaterialIcons && !this.isMaterialIconsLoaded()) {
            this.loadMaterialIcons();
        }

        // Load saved preferences
        this.loadPreferences();

        // Load data
        this.loadData().then(() => {
            this.render();
            this.attachEventListeners();
        });
    }

    isGoogleSansLoaded() {
        const links = document.querySelectorAll('link[href*="Google+Sans"]');
        return links.length > 0;
    }

    loadGoogleSans() {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&display=swap';
        document.head.appendChild(link);
        
        // Also load Roboto as fallback
        const robotoLink = document.createElement('link');
        robotoLink.rel = 'stylesheet';
        robotoLink.href = 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap';
        document.head.appendChild(robotoLink);
    }

    isMaterialIconsLoaded() {
        const links = document.querySelectorAll('link[href*="Material+Icons"]');
        return links.length > 0;
    }

    loadMaterialIcons() {
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = this.config.materialIconsUrl;
        document.head.appendChild(link);
    }

    async loadData() {
        if (this.config.dataSource === 'json' && this.config.jsonData) {
            this.state.data = this.config.jsonData;
            return Promise.resolve();
        }

        if (this.config.dataSource === 'url' && this.config.jsonUrl) {
            try {
                const response = await fetch(this.config.jsonUrl);
                this.state.data = await response.json();
            } catch (error) {
                console.error('ReportListPlugin: Failed to load data', error);
                this.state.data = { categories: [] };
            }
        }
    }

    loadPreferences() {
        if (!this.config.persistView && !this.config.persistFavorites) return;

        const saved = localStorage.getItem(this.config.storageKey);
        if (saved) {
            try {
                const prefs = JSON.parse(saved);
                if (this.config.persistView && prefs.view) {
                    this.state.currentView = prefs.view;
                }
                if (this.config.persistFavorites && prefs.favorites) {
                    this.savedFavorites = prefs.favorites;
                }
            } catch (e) {
                console.warn('Failed to load preferences');
            }
        }
    }

    savePreferences() {
        if (!this.config.persistView && !this.config.persistFavorites) return;

        const prefs = {};
        if (this.config.persistView) {
            prefs.view = this.state.currentView;
        }
        if (this.config.persistFavorites) {
            prefs.favorites = this.getFavoritesMap();
        }
        localStorage.setItem(this.config.storageKey, JSON.stringify(prefs));
    }

    getFavoritesMap() {
        const favorites = {};
        if (this.state.data && this.state.data.categories) {
            this.state.data.categories.forEach(category => {
                category.reports.forEach(report => {
                    if (report.isFavorite) {
                        favorites[report.id] = true;
                    }
                });
            });
        }
        return favorites;
    }

    applySavedFavorites() {
        if (!this.savedFavorites || !this.state.data) return;

        this.state.data.categories.forEach(category => {
            category.reports.forEach(report => {
                if (this.savedFavorites[report.id]) {
                    report.isFavorite = true;
                }
            });
        });
    }

    render() {
        this.applySavedFavorites();
        this.container.innerHTML = this.getHTML();
    }

    getHTML() {
        return `
            <div class="rlp-container">
                ${this.getHeaderHTML()}
                <div class="rlp-main-content">
                    ${this.getTabsHTML()}
                    <div class="rlp-reports-container">
                        ${this.getReportsHTML()}
                    </div>
                </div>
            </div>
        `;
    }

    getHeaderHTML() {
        return `
            <header class="rlp-header">
                <div class="rlp-header-content">
                    <div class="rlp-logo">
                        ${this.renderIcon('assessment')}
                        <span>${this.config.labels.title}</span>
                    </div>
                    ${this.config.showSearch ? `
                        <div class="rlp-search-container">
                            <div class="rlp-search-wrapper">
                                <span class="rlp-search-icon">${this.renderIcon('search')}</span>
                                <input type="text" class="rlp-search-input" placeholder="${this.config.labels.searchPlaceholder}" value="${this.state.searchTerm || ''}">
                            </div>
                        </div>
                    ` : ''}
                    ${this.config.showViewSwitcher ? `
                        <div class="rlp-header-actions">
                            <div class="rlp-view-switcher">
                                <button class="rlp-view-btn ${this.state.currentView === 'grid' ? 'rlp-active' : ''}" data-view="grid" title="Grid View">
                                    ${this.renderIcon('grid_view')}
                                </button>
                                <button class="rlp-view-btn ${this.state.currentView === 'list' ? 'rlp-active' : ''}" data-view="list" title="List View">
                                    ${this.renderIcon('view_list')}
                                </button>
                            </div>
                        </div>
                    ` : ''}
                </div>
            </header>
        `;
    }

    getTabsHTML() {
        if (!this.state.data || !this.state.data.categories) return '';

        const allReports = this.getAllReports();
        const favoritesCount = allReports.filter(r => r.isFavorite).length;
        const nonFavorites = allReports.filter(r => !r.isFavorite);
        const mostUsedCount = Math.min(nonFavorites.length, 10);
        const favMostUsedCount = favoritesCount + mostUsedCount;

        let tabsHTML = `
            <div class="rlp-tabs-wrapper">
                <div class="rlp-scroll-indicator srp-left">
                    <button class="rlp-scroll-btn">${this.renderIcon('chevron_left')}</button>
                </div>
                <div class="rlp-tabs">
                    <button class="rlp-tab" data-category="favorites-mostused">
                        ${this.renderIcon('star')}
                        ${this.config.labels.favoritesAndMostUsed} (${favMostUsedCount})
                    </button>
                    <button class="rlp-tab srp-active" data-category="all">
                        ${this.config.labels.allReports} (${allReports.length})
                    </button>
        `;

        this.state.data.categories.forEach(category => {
            tabsHTML += `
                <button class="rlp-tab" data-category="${category.id}">
                    ${category.displayName} (${category.reports.length})
                </button>
            `;
        });

        tabsHTML += `
                </div>
                <div class="rlp-scroll-indicator srp-right">
                    <button class="rlp-scroll-btn">${this.renderIcon('chevron_right')}</button>
                </div>
            </div>
        `;

        return tabsHTML;
    }

    getReportsHTML() {
        const filtered = this.filterCategories();
        
        if (filtered.length === 0) {
            return `
                <div class="rlp-empty-state">
                    ${this.renderIcon('search')}
                    <h3>${this.config.labels.noResults}</h3>
                    <p>${this.config.labels.tryDifferent}</p>
                </div>
            `;
        }

        return filtered.map(category => this.getSectionHTML(category)).join('');
    }

    getSectionHTML(category) {
        const viewClass = this.state.currentView === 'list' ? 'rlp-list-view' : '';
        
        return `
            <section class="rlp-reports-section">
                <div class="rlp-section-header">
                    <div class="rlp-section-title-wrapper">
                        <h2 class="rlp-section-title">${category.name}</h2>
                        <span class="rlp-section-count">${category.reports.length} ${category.reports.length === 1 ? 'report' : 'reports'}</span>
                    </div>
                </div>
                <div class="rlp-reports-grid ${viewClass}">
                    ${category.reports.map(report => this.getReportCardHTML(report)).join('')}
                </div>
            </section>
        `;
    }

    getReportCardHTML(report) {
        const allReports = this.getAllReports();
        const topReports = allReports.sort((a, b) => (b.viewCount || 0) - (a.viewCount || 0)).slice(0, 10);
        const isMostUsed = topReports.find(r => r.id === report.id);

        const tagsHTML = report.tags && report.tags.length > 0 ? 
            report.tags.map((tag, index) => {
                const isPrimary = index === 0 && ['Core', 'Trending', 'Daily', 'Profit', 'Action Required'].includes(tag);
                return `<span class="rlp-meta-chip ${isPrimary ? 'rlp-primary' : ''}">${tag}</span>`;
            }).join('') : '';

        const metadataHTML = this.getMetadataHTML(report);
        const borderClass = !tagsHTML ? 'rlp-no-border' : '';

        return `
            <div class="rlp-report-card ${isMostUsed ? 'rlp-most-used' : ''}">
                <div class="rlp-report-card-header">
                    <div class="rlp-report-icon-wrapper">
                        <div class="rlp-report-icon">
                            ${this.renderIcon(report.icon)}
                        </div>
                        <button class="rlp-favorite-star ${report.isFavorite ? 'rlp-active' : ''}" data-report-id="${report.id}">
                            ${this.renderIcon(report.isFavorite ? 'star' : 'star_outline')}
                        </button>
                    </div>
                    <div class="rlp-report-card-content">
                        <a href="${report.link || '#'}" class="rlp-report-link">
                            <h3 class="rlp-report-title">${report.title}</h3>
                            <p class="rlp-report-description">${report.description}</p>
                        </a>
                        <div class="rlp-report-metadata ${borderClass}">
                            ${metadataHTML}
                        </div>
                        ${tagsHTML ? `<div class="rlp-report-meta">${tagsHTML}</div>` : ''}
                    </div>
                </div>
            </div>
        `;
    }

    getMetadataHTML(report) {
        const items = [];

        const viewCount = report.viewCount !== undefined && report.viewCount !== null ? 
            `${report.viewCount} views` : 'No views yet';
        items.push(`
            <div class="rlp-report-metadata-item">
                ${this.renderIcon('visibility')}
                ${viewCount}
            </div>
        `);

        const lastViewed = report.lastViewed ? 
            this.formatLastViewed(report.lastViewed) : 'Never accessed';
        items.push(`
            <div class="rlp-report-metadata-item">
                ${this.renderIcon('schedule')}
                ${lastViewed}
            </div>
        `);

        return items.join('<span class="rlp-report-metadata-separator"></span>');
    }

    formatLastViewed(timestamp) {
        const now = new Date();
        const viewed = new Date(timestamp);
        const diffMs = now - viewed;
        const diffMins = Math.floor(diffMs / 60000);
        const diffHours = Math.floor(diffMs / 3600000);
        const diffDays = Math.floor(diffMs / 86400000);

        if (diffMins < 1) return 'Just now';
        if (diffMins < 60) return `${diffMins} min ago`;
        if (diffHours < 24) return `${diffHours} hour${diffHours > 1 ? 's' : ''} ago`;
        if (diffDays < 7) return `${diffDays} day${diffDays > 1 ? 's' : ''} ago`;

        const options = { month: 'short', day: 'numeric' };
        if (viewed.getFullYear() !== now.getFullYear()) {
            options.year = 'numeric';
        }
        return viewed.toLocaleDateString('en-US', options);
    }

    getAllReports() {
        if (!this.state.data || !this.state.data.categories) return [];
        return this.state.data.categories.flatMap(cat => cat.reports);
    }

    filterCategories() {
        if (!this.state.data || !this.state.data.categories) return [];

        let categories = [...this.state.data.categories];

        // Handle Favorites & Most Used
        if (this.state.currentCategory === 'favorites-mostused') {
            const allReports = this.getAllReports();
            let favorites = allReports.filter(r => r.isFavorite);
            let mostUsed = allReports
                .filter(r => !r.isFavorite)
                .sort((a, b) => (b.viewCount || 0) - (a.viewCount || 0))
                .slice(0, 10);

            // Apply search filter to favorites and most used
            if (this.state.searchTerm) {
                const searchFilter = (report) => {
                    const titleMatch = report.title.toLowerCase().includes(this.state.searchTerm.toLowerCase());
                    const descMatch = report.description.toLowerCase().includes(this.state.searchTerm.toLowerCase());
                    const tagMatch = report.tags && report.tags.some(tag => 
                        tag.toLowerCase().includes(this.state.searchTerm.toLowerCase())
                    );
                    return titleMatch || descMatch || tagMatch;
                };
                
                favorites = favorites.filter(searchFilter);
                mostUsed = mostUsed.filter(searchFilter);
            }

            const sections = [];
            if (favorites.length > 0) {
                sections.push({ id: 'favorites', name: this.config.labels.favorites, reports: favorites });
            }
            if (mostUsed.length > 0) {
                sections.push({ id: 'mostused', name: this.config.labels.mostUsed, reports: mostUsed });
            }
            return sections;
        }

        // Filter by category
        if (this.state.currentCategory !== 'all') {
            categories = categories.filter(cat => cat.id === this.state.currentCategory);
        }

        // Filter by search
        if (this.state.searchTerm) {
            categories = categories.map(category => {
                const filteredReports = category.reports.filter(report => {
                    const titleMatch = report.title.toLowerCase().includes(this.state.searchTerm.toLowerCase());
                    const descMatch = report.description.toLowerCase().includes(this.state.searchTerm.toLowerCase());
                    const tagMatch = report.tags && report.tags.some(tag => 
                        tag.toLowerCase().includes(this.state.searchTerm.toLowerCase())
                    );
                    return titleMatch || descMatch || tagMatch;
                });
                return { ...category, reports: filteredReports };
            }).filter(category => category.reports.length > 0);
        }

        return categories;
    }

    renderIcon(iconName) {
        // Try Material Icons first
        if (this.isMaterialIconsLoaded() || this.config.autoLoadMaterialIcons) {
            return `<span class="material-icons srp-icon">${iconName}</span>`;
        }

        // Fallback to SVG icons
        if (this.config.useFallbackIcons) {
            const svg = this.getFallbackIcon(iconName);
            if (svg) return `<span class="rlp-icon">${svg}</span>`;
        }

        return `<span class="rlp-icon">●</span>`;
    }

    getFallbackIcon(name) {
        const icons = {
            'receipt_long': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>',
            'description': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>',
            'star': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
            'star_outline': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
            'visibility': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>',
            'schedule': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>',
            'grid_view': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>',
            'view_list': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>',
            'search': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.35-4.35"></path></svg>',
            'chevron_left': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"></polyline></svg>',
            'chevron_right': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>',
            'assessment': '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>'
        };
        return icons[name] || '';
    }

    attachEventListeners() {
        const container = this.container.querySelector('.rlp-container');
        if (!container) return;

        // Search with debounce for performance
        const searchInput = container.querySelector('.rlp-search-input');
        if (searchInput) {
            searchInput.addEventListener('input', (e) => {
                clearTimeout(this.searchTimeout);
                this.searchTimeout = setTimeout(() => {
                    this.state.searchTerm = e.target.value;
                    this.updateReports();
                }, 150); // 150ms debounce - fast but smooth
            });
        }

        // View switcher
        const viewBtns = container.querySelectorAll('.rlp-view-btn');
        viewBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                this.state.currentView = btn.dataset.view;
                viewBtns.forEach(b => b.classList.remove('rlp-active'));
                btn.classList.add('rlp-active');
                this.savePreferences();
                this.updateReports();
            });
        });

        // Tabs
        const tabs = container.querySelectorAll('.rlp-tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                this.state.currentCategory = tab.dataset.category;
                tabs.forEach(t => t.classList.remove('rlp-active'));
                tab.classList.add('rlp-active');
                this.updateReports();
            });
        });

        // Tab scroll buttons
        const tabsContainer = container.querySelector('.rlp-tabs');
        const scrollLeft = container.querySelector('.rlp-scroll-indicator.rlp-left .rlp-scroll-btn');
        const scrollRight = container.querySelector('.rlp-scroll-indicator.rlp-right .rlp-scroll-btn');

        if (scrollLeft && scrollRight && tabsContainer) {
            this.updateScrollIndicators(tabsContainer);

            scrollLeft.addEventListener('click', () => {
                tabsContainer.scrollBy({ left: -200, behavior: 'smooth' });
            });

            scrollRight.addEventListener('click', () => {
                tabsContainer.scrollBy({ left: 200, behavior: 'smooth' });
            });

            tabsContainer.addEventListener('scroll', () => {
                this.updateScrollIndicators(tabsContainer);
            });

            window.addEventListener('resize', () => {
                this.updateScrollIndicators(tabsContainer);
            });
        }

        // Favorite buttons
        this.attachFavoriteListeners();

        // Report clicks
        this.attachReportClickListeners();
    }

    updateScrollIndicators(tabsContainer) {
        const container = this.container.querySelector('.rlp-container');
        const leftIndicator = container.querySelector('.rlp-scroll-indicator.rlp-left');
        const rightIndicator = container.querySelector('.rlp-scroll-indicator.rlp-right');

        const isScrollable = tabsContainer.scrollWidth > tabsContainer.clientWidth;
        const scrollLeft = tabsContainer.scrollLeft;
        const maxScroll = tabsContainer.scrollWidth - tabsContainer.clientWidth;

        if (!isScrollable) {
            leftIndicator?.classList.remove('rlp-visible');
            rightIndicator?.classList.remove('rlp-visible');
            return;
        }

        if (scrollLeft > 10) {
            leftIndicator?.classList.add('rlp-visible');
        } else {
            leftIndicator?.classList.remove('rlp-visible');
        }

        if (scrollLeft < maxScroll - 10) {
            rightIndicator?.classList.add('rlp-visible');
        } else {
            rightIndicator?.classList.remove('rlp-visible');
        }
    }

    updateReports() {
        const mainContent = this.container.querySelector('.rlp-main-content');
        if (!mainContent) return;

        // Only update the reports container, not tabs
        const reportsContainer = mainContent.querySelector('.rlp-reports-container');
        if (reportsContainer) {
            reportsContainer.innerHTML = this.getReportsHTML();
        } else {
            // First time, create structure
            const tabsHTML = this.getTabsHTML();
            const reportsHTML = this.getReportsHTML();
            mainContent.innerHTML = tabsHTML + '<div class="rlp-reports-container">' + reportsHTML + '</div>';
        }

        // Re-attach event listeners for new content
        this.attachFavoriteListeners();
        this.attachReportClickListeners();
    }

    attachFavoriteListeners() {
        const container = this.container.querySelector('.rlp-container');
        if (!container) return;

        const favoriteStars = container.querySelectorAll('.rlp-favorite-star');
        favoriteStars.forEach(btn => {
            btn.onclick = (e) => {
                e.preventDefault();
                e.stopPropagation();
                const reportId = btn.dataset.reportId;
                this.toggleFavorite(reportId);
            };
        });
    }

    attachReportClickListeners() {
        const container = this.container.querySelector('.rlp-container');
        if (!container) return;

        const reportLinks = container.querySelectorAll('.rlp-report-link');
        reportLinks.forEach(link => {
            if (this.config.onReportClick) {
                link.onclick = (e) => {
                    e.preventDefault();
                    const reportCard = link.closest('.rlp-report-card');
                    const reportId = reportCard.querySelector('.rlp-favorite-star').dataset.reportId;
                    const report = this.findReport(reportId);
                    if (report) {
                        this.config.onReportClick(reportId, report);
                    }
                };
            }
        });
    }

    toggleFavorite(reportId) {
        const report = this.findReport(reportId);
        if (!report) return;

        report.isFavorite = !report.isFavorite;

        // Call callbacks
        if (report.isFavorite && this.config.onFavoriteAdd) {
            this.config.onFavoriteAdd(reportId, report);
        } else if (!report.isFavorite && this.config.onFavoriteRemove) {
            this.config.onFavoriteRemove(reportId, report);
        }

        this.savePreferences();

        if (this.state.currentCategory === 'favorites-mostused') {
            this.updateReports();
        } else {
            // Just update the star
            const container = this.container.querySelector('.rlp-container');
            const favoriteBtn = container.querySelector(`[data-report-id="${reportId}"]`);
            if (favoriteBtn) {
                if (report.isFavorite) {
                    favoriteBtn.classList.add('rlp-active');
                    favoriteBtn.innerHTML = this.renderIcon('star');
                } else {
                    favoriteBtn.classList.remove('rlp-active');
                    favoriteBtn.innerHTML = this.renderIcon('star_outline');
                }
            }

            // Update tab counts
            this.updateTabCounts();
        }
    }

    updateTabCounts() {
        const container = this.container.querySelector('.rlp-container');
        const allReports = this.getAllReports();
        const favoritesCount = allReports.filter(r => r.isFavorite).length;
        const nonFavorites = allReports.filter(r => !r.isFavorite);
        const mostUsedCount = Math.min(nonFavorites.length, 10);
        const favMostUsedCount = favoritesCount + mostUsedCount;

        const favTab = container.querySelector('[data-category="favorites-mostused"]');
        if (favTab) {
            // Recreate the entire tab content with icon
            favTab.innerHTML = `
                ${this.renderIcon('star')}
                ${this.config.labels.favoritesAndMostUsed} (${favMostUsedCount})
            `;
        }
    }

    findReport(reportId) {
        if (!this.state.data || !this.state.data.categories) return null;
        for (const category of this.state.data.categories) {
            const report = category.reports.find(r => r.id === reportId);
            if (report) return report;
        }
        return null;
    }

    // Public API
    refresh() {
        this.loadData().then(() => {
            this.render();
            this.attachEventListeners();
        });
    }

    destroy() {
        this.container.innerHTML = '';
    }

    setView(view) {
        if (view === 'grid' || view === 'list') {
            this.state.currentView = view;
            this.savePreferences();
            this.updateReports();
        }
    }

    getReport(id) {
        return this.findReport(id);
    }

    getFavorites() {
        return this.getAllReports().filter(r => r.isFavorite);
    }
}

// Export for use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = ReportListPlugin;
}
