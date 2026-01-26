/**
 * Trial Balance Report Plugin
 * Framework-agnostic plugin for displaying Trial Balance with nested groups
 * Version: 1.0.0
 *
 * Dependencies: trial-balance.css, sixorbit-common.css
 *
 * Usage:
 * const trialBalance = new TrialBalance('container-id', {
 *     data: jsonData,
 *     showOpening: true,
 *     showTransactions: true,
 *     showClosing: true,
 *     showDebitCreditSeparately: false
 * });
 */

(function(global) {
    'use strict';

    const TrialBalance = function(containerId, options) {
        this.containerId = containerId;
        this.container = document.getElementById(containerId);

        if (!this.container) {
            throw new Error(`Container with id "${containerId}" not found`);
        }

        this.options = Object.assign({
            data: null,
            showOpening: true,
            showTransactions: true,
            showClosing: true,
            showDebitCreditSeparately: true,
            onGroupClick: null,      // Callback when a group is clicked
            onLedgerClick: null      // Callback when a ledger is clicked
        }, options);

        this.state = {
            expandedNodes: new Set(),
            showOpening: this.options.showOpening,
            showTransactions: this.options.showTransactions,
            showClosing: this.options.showClosing,
            showDebitCreditSeparately: this.options.showDebitCreditSeparately,
            data: null,
            searchText: '',
            showFilters: false,
            filters: {
                opening: { enabled: false, operator: 'gt', value: 0 },
                debit: { enabled: false, operator: 'gt', value: 0 },
                credit: { enabled: false, operator: 'gt', value: 0 },
                closing: { enabled: false, operator: 'gt', value: 0 }
            }
        };

        this.init();
    };

    TrialBalance.prototype.init = function() {
        const self = this;
        this.loadDependencies().then(function() {
            self.render();
            if (self.options.data) {
                self.loadData(self.options.data);
            }
        });
    };

    TrialBalance.prototype.loadDependencies = function() {
        const promises = [];

        if (!document.querySelector('link[href*="Google+Sans"]')) {
            const fontLink = document.createElement('link');
            fontLink.rel = 'stylesheet';
            fontLink.href = 'https://fonts.googleapis.com/css2?family=Google+Sans:wght@300;400;500;700&display=swap';
            document.head.appendChild(fontLink);
        }

        if (!document.querySelector('link[href*="Material+Symbols+Rounded"]')) {
            const iconsLink = document.createElement('link');
            iconsLink.rel = 'stylesheet';
            iconsLink.href = 'https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200';
            document.head.appendChild(iconsLink);
        }

        return Promise.all(promises);
    };

    TrialBalance.prototype.getTemplate = function() {
        return `
<div class="tb-statement">
    <!-- Header Section -->
    <div class="tb-header">
        <div class="tb-company-info">
            <h1 class="tb-company-name" data-company>Company Name</h1>
            <h2 class="tb-report-title">Trial Balance</h2>
            <div class="tb-period" data-period>Period</div>
        </div>
    </div>

    <!-- Trial Balance Tree -->
    <div class="tb-tree-card">
        <div class="tb-tree-header">
            <div class="tb-tree-title">Trial Balance - Detailed Breakdown</div>
            <div class="tb-tree-controls">
                <button class="tb-control-btn" data-action="expand-all">
                    <span class="material-symbols-rounded" style="font-size:16px">unfold_more</span>
                    Expand All
                </button>
                <button class="tb-control-btn" data-action="collapse-all">
                    <span class="material-symbols-rounded" style="font-size:16px">unfold_less</span>
                    Collapse All
                </button>
                <button class="tb-control-btn ${this.state.showDebitCreditSeparately ? 'active' : ''}" data-action="toggle-dr-cr-separate">
                    <span class="material-symbols-rounded" style="font-size:16px">view_column</span>
                    Separate Dr/Cr
                </button>
                <button class="tb-control-btn ${this.state.showOpening ? 'active' : ''}" data-action="toggle-opening">
                    <span class="material-symbols-rounded" style="font-size:16px">visibility</span>
                    Opening
                </button>
                <button class="tb-control-btn ${this.state.showTransactions ? 'active' : ''}" data-action="toggle-transactions">
                    <span class="material-symbols-rounded" style="font-size:16px">visibility</span>
                    Transactions
                </button>
                <button class="tb-control-btn ${this.state.showClosing ? 'active' : ''}" data-action="toggle-closing">
                    <span class="material-symbols-rounded" style="font-size:16px">visibility</span>
                    Closing
                </button>
                <button class="tb-control-btn ${this.state.showFilters ? 'active' : ''}" data-action="toggle-filters">
                    <span class="material-symbols-rounded" style="font-size:16px">filter_alt</span>
                    Filters
                </button>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="tb-search-filter-section" style="padding:12px 16px; border-bottom:1px solid #e8eaed; background:#f8f9fa; box-sizing:border-box;">
            <!-- Search Box -->
            <div style="margin-bottom:${this.state.showFilters ? '12px' : '0'};">
                <div style="position:relative;">
                    <span class="material-symbols-rounded" style="position:absolute; left:10px; top:50%; transform:translateY(-50%); color:#5f6368; font-size:20px;">search</span>
                    <input type="text" class="tb-search-input" data-search-input placeholder="Search groups and ledgers..." value="${this.state.searchText}" style="width:100%; max-width:100%; padding:8px 8px 8px 38px; border:1px solid #dadce0; border-radius:4px; font-size:13px; font-family:'Google Sans',sans-serif; box-sizing:border-box;">
                </div>
            </div>

            <!-- Numeric Filters -->
            <div class="tb-filters-panel" style="display:${this.state.showFilters ? 'block' : 'none'};">
                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:12px;">
                    <!-- Opening Filter -->
                    <div class="tb-filter-item">
                        <label style="display:flex; align-items:center; gap:6px; margin-bottom:6px; font-size:12px; font-weight:500; color:#202124;">
                            <input type="checkbox" data-filter-enabled="opening" ${this.state.filters.opening.enabled ? 'checked' : ''} style="width:16px; height:16px;">
                            Opening Balance
                        </label>
                        <div style="display:flex; gap:4px;">
                            <select data-filter-operator="opening" style="padding:6px; border:1px solid #dadce0; border-radius:4px; font-size:12px; flex:0 0 80px;">
                                <option value="gt" ${this.state.filters.opening.operator === 'gt' ? 'selected' : ''}>&gt;</option>
                                <option value="lt" ${this.state.filters.opening.operator === 'lt' ? 'selected' : ''}>&lt;</option>
                                <option value="eq" ${this.state.filters.opening.operator === 'eq' ? 'selected' : ''}>&#61;</option>
                            </select>
                            <input type="number" data-filter-value="opening" value="${this.state.filters.opening.value}" placeholder="Amount" style="padding:6px; border:1px solid #dadce0; border-radius:4px; font-size:12px; flex:1; min-width:0;">
                        </div>
                    </div>

                    <!-- Debit Filter -->
                    <div class="tb-filter-item">
                        <label style="display:flex; align-items:center; gap:6px; margin-bottom:6px; font-size:12px; font-weight:500; color:#202124;">
                            <input type="checkbox" data-filter-enabled="debit" ${this.state.filters.debit.enabled ? 'checked' : ''} style="width:16px; height:16px;">
                            Net Debit
                        </label>
                        <div style="display:flex; gap:4px;">
                            <select data-filter-operator="debit" style="padding:6px; border:1px solid #dadce0; border-radius:4px; font-size:12px; flex:0 0 80px;">
                                <option value="gt" ${this.state.filters.debit.operator === 'gt' ? 'selected' : ''}>&gt;</option>
                                <option value="lt" ${this.state.filters.debit.operator === 'lt' ? 'selected' : ''}>&lt;</option>
                                <option value="eq" ${this.state.filters.debit.operator === 'eq' ? 'selected' : ''}>&#61;</option>
                            </select>
                            <input type="number" data-filter-value="debit" value="${this.state.filters.debit.value}" placeholder="Amount" style="padding:6px; border:1px solid #dadce0; border-radius:4px; font-size:12px; flex:1; min-width:0;">
                        </div>
                    </div>

                    <!-- Credit Filter -->
                    <div class="tb-filter-item">
                        <label style="display:flex; align-items:center; gap:6px; margin-bottom:6px; font-size:12px; font-weight:500; color:#202124;">
                            <input type="checkbox" data-filter-enabled="credit" ${this.state.filters.credit.enabled ? 'checked' : ''} style="width:16px; height:16px;">
                            Net Credit
                        </label>
                        <div style="display:flex; gap:4px;">
                            <select data-filter-operator="credit" style="padding:6px; border:1px solid #dadce0; border-radius:4px; font-size:12px; flex:0 0 80px;">
                                <option value="gt" ${this.state.filters.credit.operator === 'gt' ? 'selected' : ''}>&gt;</option>
                                <option value="lt" ${this.state.filters.credit.operator === 'lt' ? 'selected' : ''}>&lt;</option>
                                <option value="eq" ${this.state.filters.credit.operator === 'eq' ? 'selected' : ''}>&#61;</option>
                            </select>
                            <input type="number" data-filter-value="credit" value="${this.state.filters.credit.value}" placeholder="Amount" style="padding:6px; border:1px solid #dadce0; border-radius:4px; font-size:12px; flex:1; min-width:0;">
                        </div>
                    </div>

                    <!-- Closing Filter -->
                    <div class="tb-filter-item">
                        <label style="display:flex; align-items:center; gap:6px; margin-bottom:6px; font-size:12px; font-weight:500; color:#202124;">
                            <input type="checkbox" data-filter-enabled="closing" ${this.state.filters.closing.enabled ? 'checked' : ''} style="width:16px; height:16px;">
                            Closing Balance
                        </label>
                        <div style="display:flex; gap:4px;">
                            <select data-filter-operator="closing" style="padding:6px; border:1px solid #dadce0; border-radius:4px; font-size:12px; flex:0 0 80px;">
                                <option value="gt" ${this.state.filters.closing.operator === 'gt' ? 'selected' : ''}>&gt;</option>
                                <option value="lt" ${this.state.filters.closing.operator === 'lt' ? 'selected' : ''}>&lt;</option>
                                <option value="eq" ${this.state.filters.closing.operator === 'eq' ? 'selected' : ''}>&#61;</option>
                            </select>
                            <input type="number" data-filter-value="closing" value="${this.state.filters.closing.value}" placeholder="Amount" style="padding:6px; border:1px solid #dadce0; border-radius:4px; font-size:12px; flex:1; min-width:0;">
                        </div>
                    </div>
                </div>

                <div style="margin-top:12px; display:flex; gap:8px;">
                    <button class="tb-control-btn" data-action="apply-filters" style="background:#1a73e8; color:white; border-color:#1a73e8;">
                        <span class="material-symbols-rounded" style="font-size:16px">check</span>
                        Apply Filters
                    </button>
                    <button class="tb-control-btn" data-action="clear-filters">
                        <span class="material-symbols-rounded" style="font-size:16px">clear</span>
                        Clear All
                    </button>
                </div>
            </div>
        </div>

        <div class="tb-tree-view" data-tree="trial-balance"></div>
        <div class="tb-tree-footer" data-footer="trial-balance"></div>
    </div>
</div>
`;
    };

    TrialBalance.prototype.render = function() {
        this.container.innerHTML = this.getTemplate();
        this.attachEventListeners();
    };

    TrialBalance.prototype.attachEventListeners = function() {
        const self = this;
        const container = this.container.querySelector('.tb-statement');

        container.addEventListener('click', function(e) {
            const target = e.target.closest('[data-action]');
            if (target) {
                const action = target.dataset.action;
                if (action === 'expand-all') self.expandAll();
                else if (action === 'collapse-all') self.collapseAll();
                else if (action === 'toggle-dr-cr-separate') self.toggleDebitCreditSeparate();
                else if (action === 'toggle-opening') self.toggleOpening();
                else if (action === 'toggle-transactions') self.toggleTransactions();
                else if (action === 'toggle-closing') self.toggleClosing();
                else if (action === 'toggle-filters') self.toggleFilters();
                else if (action === 'apply-filters') self.applyFilters();
                else if (action === 'clear-filters') self.clearFilters();
            }

            // Check for node label click (only trigger on label, not entire row)
            if (e.target.closest('.tb-node-label')) {
                const node = e.target.closest('[data-node-id]');
                if (node) {
                    const nodeId = node.dataset.nodeId;
                    const nodeType = node.dataset.nodeType;
                    const nodeName = node.dataset.nodeName;

                    // Handle group/ledger click callbacks
                    if (nodeType === 'group' && self.options.onGroupClick) {
                        self.options.onGroupClick({
                            id: nodeId,
                            name: nodeName,
                            type: nodeType
                        });
                    } else if (nodeType === 'ledger' && self.options.onLedgerClick) {
                        self.options.onLedgerClick({
                            id: nodeId,
                            name: nodeName,
                            type: nodeType
                        });
                    }
                }
            }

            // Handle toggle click
            const toggleNode = e.target.closest('[data-node-id]');
            if (toggleNode && e.target.closest('.tb-node-toggle')) {
                self.toggleNode(toggleNode.dataset.nodeId);
            }
        });

        // Search input handler
        const searchInput = container.querySelector('[data-search-input]');
        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                self.state.searchText = e.target.value;
                self.renderTreeView();
            });
        }

        // Filter input handlers (capture filter changes but don't apply until button clicked)
        container.addEventListener('change', function(e) {
            if (e.target.hasAttribute('data-filter-enabled')) {
                const filterType = e.target.getAttribute('data-filter-enabled');
                self.state.filters[filterType].enabled = e.target.checked;
            } else if (e.target.hasAttribute('data-filter-operator')) {
                const filterType = e.target.getAttribute('data-filter-operator');
                self.state.filters[filterType].operator = e.target.value;
            }
        });

        // Handle input events for filter values (update state but don't apply)
        container.addEventListener('input', function(e) {
            if (e.target.hasAttribute('data-filter-value')) {
                const filterType = e.target.getAttribute('data-filter-value');
                self.state.filters[filterType].value = parseFloat(e.target.value) || 0;
            }
        });
    };

    TrialBalance.prototype.loadData = function(data) {
        this.state.data = data;
        this.updateUI();
    };

    TrialBalance.prototype.updateUI = function() {
        if (!this.state.data) return;

        // Update header
        this.container.querySelector('[data-company]').textContent = this.state.data.company;
        this.container.querySelector('[data-period]').textContent =
            `For the period ${this.formatDate(this.state.data.period.start)} to ${this.formatDate(this.state.data.period.end)}`;

        // Render tree view
        this.renderTreeView();
    };

    TrialBalance.prototype.calculateNodeTotals = function(node) {
        if (!node) return { openingDr: 0, openingCr: 0, debit: 0, credit: 0, closingDr: 0, closingCr: 0 };

        if (node.type === 'ledger') {
            return {
                openingDr: node.openingDr || 0,
                openingCr: node.openingCr || 0,
                debit: node.debit || 0,
                credit: node.credit || 0,
                closingDr: node.closingDr || 0,
                closingCr: node.closingCr || 0
            };
        }

        // For groups, sum up children
        if (node.children && node.children.length > 0) {
            const self = this;
            return node.children.reduce(function(sum, child) {
                const childTotals = self.calculateNodeTotals(child);
                return {
                    openingDr: sum.openingDr + childTotals.openingDr,
                    openingCr: sum.openingCr + childTotals.openingCr,
                    debit: sum.debit + childTotals.debit,
                    credit: sum.credit + childTotals.credit,
                    closingDr: sum.closingDr + childTotals.closingDr,
                    closingCr: sum.closingCr + childTotals.closingCr
                };
            }, { openingDr: 0, openingCr: 0, debit: 0, credit: 0, closingDr: 0, closingCr: 0 });
        }

        return { openingDr: 0, openingCr: 0, debit: 0, credit: 0, closingDr: 0, closingCr: 0 };
    };

    TrialBalance.prototype.getNodeIcon = function(node, level) {
        if (node.icon) return node.icon;
        if (node.type === 'ledger') return 'description';
        if (level === 0) return 'folder_open';
        if (node.type === 'group') return 'folder';
        return 'description';
    };

    TrialBalance.prototype.buildTreeHeader = function() {
        let html = '<div class="tb-tree-node" style="position:sticky; top:0; z-index:100; background:#f1f3f4; font-weight:600; border-bottom:2px solid #dadce0;">';
        html += '<div class="tb-node-content" style="cursor:default;">';
        html += '<span class="tb-node-indent" style="width:20px"></span>';
        html += '<div class="tb-node-toggle"></div>';
        html += '<div class="tb-node-icon"></div>';
        html += '<div class="tb-node-label" style="font-size:12px; color:#5f6368; text-transform:uppercase; letter-spacing:0.5px;">Account Groups / Ledgers</div>';
        html += '<div class="tb-node-stats">';

        if (this.state.showOpening) {
            if (this.state.showDebitCreditSeparately) {
                html += '<div class="tb-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Opening Dr</div>';
                html += '<div class="tb-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Opening Cr</div>';
            } else {
                html += '<div class="tb-node-amount" style="min-width:120px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Opening</div>';
            }
        }

        if (this.state.showTransactions) {
            if (this.state.showDebitCreditSeparately) {
                html += '<div class="tb-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Debit</div>';
                html += '<div class="tb-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Credit</div>';
            } else {
                html += '<div class="tb-node-amount" style="min-width:120px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Net Txn</div>';
            }
        }

        if (this.state.showClosing) {
            if (this.state.showDebitCreditSeparately) {
                html += '<div class="tb-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Closing Dr</div>';
                html += '<div class="tb-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Closing Cr</div>';
            } else {
                html += '<div class="tb-node-amount" style="min-width:120px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Closing</div>';
            }
        }

        html += '</div></div></div>';
        return html;
    };

    TrialBalance.prototype.buildTreeNode = function(node, level) {
        const self = this;
        level = level || 0;

        // Check if this node or any of its descendants match the filters
        if (!this.hasMatchingDescendant(node)) {
            return ''; // Skip this node entirely if it and all descendants are filtered out
        }

        const nodeTotals = this.calculateNodeTotals(node);
        const isExpanded = this.state.expandedNodes.has(node.id);
        const hasChildren = node.type === 'group' && node.children && node.children.length > 0;
        const indent = level * 12;

        let html = '<div class="tb-tree-node level-' + level + '">';
        html += '<div class="tb-node-content" data-node-id="' + node.id + '" data-node-type="' + node.type + '" data-node-name="' + node.name + '">';
        html += '<span class="tb-node-indent" style="width:' + indent + 'px"></span>';

        html += '<div class="tb-node-toggle' + (isExpanded ? ' expanded' : '') + '">';
        if (hasChildren) {
            html += '<span class="material-symbols-rounded" style="font-size:16px">chevron_right</span>';
        }
        html += '</div>';

        const iconName = this.getNodeIcon(node, level);
        html += '<div class="tb-node-icon ' + node.type + ' level-' + level + '">';
        html += '<span class="material-symbols-rounded" style="font-size:18px">' + iconName + '</span>';
        html += '</div>';

        html += '<div class="tb-node-label ' + node.type + ' level-' + level + '">' + node.name + '</div>';
        html += '<div class="tb-node-stats">';

        // Opening balance
        if (this.state.showOpening) {
            if (this.state.showDebitCreditSeparately) {
                html += '<div class="tb-node-amount debit" style="min-width:100px">';
                html += nodeTotals.openingDr > 0 ? this.formatCurrency(nodeTotals.openingDr) : '';
                html += '</div>';
                html += '<div class="tb-node-amount credit" style="min-width:100px">';
                html += nodeTotals.openingCr > 0 ? this.formatCurrency(nodeTotals.openingCr) : '';
                html += '</div>';
            } else {
                const openingBalance = nodeTotals.openingDr - nodeTotals.openingCr;
                const openingLabel = openingBalance >= 0 ? 'Dr' : 'Cr';
                html += '<div class="tb-node-amount balance" style="min-width:120px">';
                html += this.formatCurrency(Math.abs(openingBalance)) + ' ' + openingLabel;
                html += '</div>';
            }
        }

        // Transactions
        if (this.state.showTransactions) {
            if (this.state.showDebitCreditSeparately) {
                html += '<div class="tb-node-amount debit" style="min-width:100px">';
                html += nodeTotals.debit > 0 ? this.formatCurrency(nodeTotals.debit) : '';
                html += '</div>';
                html += '<div class="tb-node-amount credit" style="min-width:100px">';
                html += nodeTotals.credit > 0 ? this.formatCurrency(nodeTotals.credit) : '';
                html += '</div>';
            } else {
                const netBalance = nodeTotals.debit - nodeTotals.credit;
                const netLabel = netBalance >= 0 ? 'Dr' : 'Cr';
                html += '<div class="tb-node-amount balance" style="min-width:120px">';
                html += this.formatCurrency(Math.abs(netBalance)) + ' ' + netLabel;
                html += '</div>';
            }
        }

        // Closing balance
        if (this.state.showClosing) {
            if (this.state.showDebitCreditSeparately) {
                html += '<div class="tb-node-amount debit" style="min-width:100px">';
                html += nodeTotals.closingDr > 0 ? this.formatCurrency(nodeTotals.closingDr) : '';
                html += '</div>';
                html += '<div class="tb-node-amount credit" style="min-width:100px">';
                html += nodeTotals.closingCr > 0 ? this.formatCurrency(nodeTotals.closingCr) : '';
                html += '</div>';
            } else {
                const closingBalance = nodeTotals.closingDr - nodeTotals.closingCr;
                const closingLabel = closingBalance >= 0 ? 'Dr' : 'Cr';
                html += '<div class="tb-node-amount balance" style="min-width:120px">';
                html += this.formatCurrency(Math.abs(closingBalance)) + ' ' + closingLabel;
                html += '</div>';
            }
        }

        html += '</div>';
        html += '</div>';

        if (hasChildren) {
            html += '<div class="tb-node-children' + (isExpanded ? ' expanded' : '') + '">';
            node.children.forEach(function(child) {
                html += self.buildTreeNode(child, level + 1);
            });
            html += '</div>';
        }

        html += '</div>';
        return html;
    };

    TrialBalance.prototype.renderTreeView = function() {
        const self = this;
        const data = this.state.data.trialBalance;
        const treeEl = this.container.querySelector('[data-tree="trial-balance"]');

        let html = this.buildTreeHeader();

        if (data.children && data.children.length > 0) {
            data.children.forEach(function(child) {
                html += self.buildTreeNode(child, 0);
            });
        }

        treeEl.innerHTML = html;

        // Render footer with totals
        this.renderFooter();
    };

    TrialBalance.prototype.renderFooter = function() {
        const footerEl = this.container.querySelector('[data-footer="trial-balance"]');
        const totals = this.calculateNodeTotals(this.state.data.trialBalance);

        let html = '<div class="tb-tree-node" style="position:sticky; bottom:0; z-index:10; background:#e6f4ea; font-weight:600; border-top:2px solid #34a853;">';
        html += '<div class="tb-node-content" style="cursor:default;">';
        html += '<div style="width:20px; margin-right:6px;"></div>'; // Toggle placeholder
        html += '<div style="width:20px; margin-right:10px;"></div>'; // Icon placeholder
        html += '<div class="tb-node-label" style="color:#137333; font-weight:600;">Total</div>';
        html += '<div class="tb-node-stats">';

        // Opening balance
        if (this.state.showOpening) {
            if (this.state.showDebitCreditSeparately) {
                html += '<div class="tb-node-amount" style="min-width:100px; color:#34a853; font-weight:600;">';
                html += totals.openingDr > 0 ? this.formatCurrency(totals.openingDr) : '';
                html += '</div>';
                html += '<div class="tb-node-amount" style="min-width:100px; color:#ea4335; font-weight:600;">';
                html += totals.openingCr > 0 ? this.formatCurrency(totals.openingCr) : '';
                html += '</div>';
            } else {
                const openingBalance = totals.openingDr - totals.openingCr;
                const openingLabel = openingBalance >= 0 ? 'Dr' : 'Cr';
                html += '<div class="tb-node-amount" style="min-width:120px; color:#202124; font-weight:600;">';
                html += this.formatCurrency(Math.abs(openingBalance)) + ' ' + openingLabel;
                html += '</div>';
            }
        }

        // Transactions
        if (this.state.showTransactions) {
            if (this.state.showDebitCreditSeparately) {
                html += '<div class="tb-node-amount" style="min-width:100px; color:#34a853; font-weight:600;">';
                html += totals.debit > 0 ? this.formatCurrency(totals.debit) : '';
                html += '</div>';
                html += '<div class="tb-node-amount" style="min-width:100px; color:#ea4335; font-weight:600;">';
                html += totals.credit > 0 ? this.formatCurrency(totals.credit) : '';
                html += '</div>';
            } else {
                const netTransaction = totals.debit - totals.credit;
                const netLabel = netTransaction >= 0 ? 'Dr' : 'Cr';
                html += '<div class="tb-node-amount" style="min-width:120px; color:#202124; font-weight:600;">';
                html += this.formatCurrency(Math.abs(netTransaction)) + ' ' + netLabel;
                html += '</div>';
            }
        }

        // Closing balance
        if (this.state.showClosing) {
            if (this.state.showDebitCreditSeparately) {
                html += '<div class="tb-node-amount" style="min-width:100px; color:#34a853; font-weight:600;">';
                html += totals.closingDr > 0 ? this.formatCurrency(totals.closingDr) : '';
                html += '</div>';
                html += '<div class="tb-node-amount" style="min-width:100px; color:#ea4335; font-weight:600;">';
                html += totals.closingCr > 0 ? this.formatCurrency(totals.closingCr) : '';
                html += '</div>';
            } else {
                const closingBalance = totals.closingDr - totals.closingCr;
                const closingLabel = closingBalance >= 0 ? 'Dr' : 'Cr';
                html += '<div class="tb-node-amount" style="min-width:120px; color:#202124; font-weight:600;">';
                html += this.formatCurrency(Math.abs(closingBalance)) + ' ' + closingLabel;
                html += '</div>';
            }
        }

        html += '</div>'; // .tb-node-stats
        html += '</div>'; // .tb-node-content
        html += '</div>'; // .tb-tree-node

        footerEl.innerHTML = html;
    };

    TrialBalance.prototype.toggleNode = function(nodeId) {
        if (this.state.expandedNodes.has(nodeId)) {
            this.state.expandedNodes.delete(nodeId);
        } else {
            this.state.expandedNodes.add(nodeId);
        }
        this.renderTreeView();
    };

    TrialBalance.prototype.expandAll = function() {
        const self = this;

        function addAllIds(node) {
            if (node && node.id) {
                if (node.type === 'group' || (node.children && node.children.length > 0)) {
                    self.state.expandedNodes.add(node.id);
                    if (node.children) {
                        node.children.forEach(addAllIds);
                    }
                }
            }
        }

        if (this.state.data) {
            addAllIds(this.state.data.trialBalance);
        }

        this.renderTreeView();
    };

    TrialBalance.prototype.collapseAll = function() {
        this.state.expandedNodes.clear();
        this.renderTreeView();
    };

    TrialBalance.prototype.toggleDebitCreditSeparate = function() {
        this.state.showDebitCreditSeparately = !this.state.showDebitCreditSeparately;

        const btn = this.container.querySelector('[data-action="toggle-dr-cr-separate"]');
        if (this.state.showDebitCreditSeparately) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }

        this.renderTreeView();
    };

    TrialBalance.prototype.toggleOpening = function() {
        this.state.showOpening = !this.state.showOpening;

        const btn = this.container.querySelector('[data-action="toggle-opening"]');
        if (this.state.showOpening) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }

        this.renderTreeView();
    };

    TrialBalance.prototype.toggleTransactions = function() {
        this.state.showTransactions = !this.state.showTransactions;

        const btn = this.container.querySelector('[data-action="toggle-transactions"]');
        if (this.state.showTransactions) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }

        this.renderTreeView();
    };

    TrialBalance.prototype.toggleClosing = function() {
        this.state.showClosing = !this.state.showClosing;

        const btn = this.container.querySelector('[data-action="toggle-closing"]');
        if (this.state.showClosing) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }

        this.renderTreeView();
    };

    TrialBalance.prototype.toggleFilters = function() {
        this.state.showFilters = !this.state.showFilters;

        const btn = this.container.querySelector('[data-action="toggle-filters"]');
        if (this.state.showFilters) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }

        // Re-render to show/hide filter panel
        this.render();
        this.loadData(this.state.data);
    };

    TrialBalance.prototype.applyFilters = function() {
        // Re-render the tree view with current filter state
        this.renderTreeView();
    };

    TrialBalance.prototype.clearFilters = function() {
        // Reset all filters
        this.state.searchText = '';
        this.state.filters = {
            opening: { enabled: false, operator: 'gt', value: 0 },
            debit: { enabled: false, operator: 'gt', value: 0 },
            credit: { enabled: false, operator: 'gt', value: 0 },
            closing: { enabled: false, operator: 'gt', value: 0 }
        };

        // Re-render to reset filter inputs and tree view
        this.render();
        this.loadData(this.state.data);
    };

    TrialBalance.prototype.matchesSearch = function(node) {
        if (!this.state.searchText) return true;

        const searchLower = this.state.searchText.toLowerCase();
        const nameLower = (node.name || '').toLowerCase();
        return nameLower.includes(searchLower);
    };

    TrialBalance.prototype.matchesNumericFilters = function(nodeTotals) {
        const filters = this.state.filters;

        // Check if any filter is enabled
        const anyFilterEnabled = filters.opening.enabled || filters.debit.enabled ||
                                 filters.credit.enabled || filters.closing.enabled;

        // If no filters are enabled, return true (show all nodes)
        if (!anyFilterEnabled) {
            return true;
        }

        // Check opening filter
        if (filters.opening.enabled) {
            const openingBalance = Math.abs(nodeTotals.openingDr - nodeTotals.openingCr);
            if (!this.compareValue(openingBalance, filters.opening.operator, filters.opening.value)) {
                return false;
            }
        }

        // Check debit filter
        if (filters.debit.enabled) {
            if (!this.compareValue(nodeTotals.debit, filters.debit.operator, filters.debit.value)) {
                return false;
            }
        }

        // Check credit filter
        if (filters.credit.enabled) {
            if (!this.compareValue(nodeTotals.credit, filters.credit.operator, filters.credit.value)) {
                return false;
            }
        }

        // Check closing filter
        if (filters.closing.enabled) {
            const closingBalance = Math.abs(nodeTotals.closingDr - nodeTotals.closingCr);
            if (!this.compareValue(closingBalance, filters.closing.operator, filters.closing.value)) {
                return false;
            }
        }

        return true;
    };

    TrialBalance.prototype.compareValue = function(value, operator, filterValue) {
        switch (operator) {
            case 'gt': return value > filterValue;
            case 'lt': return value < filterValue;
            case 'eq': return value === filterValue;
            default: return true;
        }
    };

    TrialBalance.prototype.nodeMatchesFilters = function(node) {
        // Check search filter
        if (!this.matchesSearch(node)) return false;

        // Calculate node totals for numeric filters
        const nodeTotals = this.calculateNodeTotals(node);

        // Check numeric filters
        if (!this.matchesNumericFilters(nodeTotals)) return false;

        return true;
    };

    TrialBalance.prototype.hasMatchingDescendant = function(node) {
        // If this node matches, return true
        if (this.nodeMatchesFilters(node)) return true;

        // If it's a group, check children
        if (node.type === 'group' && node.children) {
            for (let i = 0; i < node.children.length; i++) {
                if (this.hasMatchingDescendant(node.children[i])) {
                    return true;
                }
            }
        }

        return false;
    };

    TrialBalance.prototype.formatCurrency = function(amount) {
        return '₹' + amount.toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    };

    TrialBalance.prototype.formatDate = function(dateString) {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return date.toLocaleDateString('en-IN', options);
    };

    // Export to global scope
    if (typeof module !== 'undefined' && module.exports) {
        module.exports = TrialBalance;
    } else {
        global.TrialBalance = TrialBalance;
    }

})(this);
