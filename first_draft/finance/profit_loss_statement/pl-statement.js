/**
 * Profit & Loss Statement Plugin
 * Framework-agnostic plugin for displaying P&L statement with Cash Flow inspired design
 * Version: 2.0.0
 *
 * Dependencies: pl-statement.css, sixorbit-common.css
 *
 * Usage:
 * const plStatement = new ProfitLossStatement('container-id', {
 *     data: jsonData,
 *     showPercentageOfSales: false
 * });
 */

(function(global) {
    'use strict';

    const ProfitLossStatement = function(containerId, options) {
        this.containerId = containerId;
        this.container = document.getElementById(containerId);

        if (!this.container) {
            throw new Error(`Container with id "${containerId}" not found`);
        }

        this.options = Object.assign({
            data: null,
            showPercentageOfSales: false,
            onGroupClick: null,    // Callback when a group is clicked
            onLedgerClick: null    // Callback when a ledger is clicked
        }, options);

        this.state = {
            expandedNodes: new Set(),
            tradeExpenseChart: null,
            tradeIncomeChart: null,
            tradeExpenseFullscreenChart: null,
            tradeIncomeFullscreenChart: null,
            showPercentage: this.options.showPercentageOfSales,
            showDebitCredit: true,
            data: null
        };

        this.init();
    };

    ProfitLossStatement.prototype.init = function() {
        const self = this;
        this.loadDependencies().then(function() {
            self.render();
            if (self.options.data) {
                self.loadData(self.options.data);
            }
        });
    };

    ProfitLossStatement.prototype.loadDependencies = function() {
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

        if (typeof echarts === 'undefined') {
            promises.push(this.loadScript('https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js'));
        }

        return Promise.all(promises);
    };

    ProfitLossStatement.prototype.loadScript = function(src) {
        return new Promise(function(resolve, reject) {
            const script = document.createElement('script');
            script.src = src;
            script.onload = resolve;
            script.onerror = reject;
            document.head.appendChild(script);
        });
    };

    ProfitLossStatement.prototype.getTemplate = function() {
        return `
<div class="pl-statement">
    <!-- Header Section -->
    <div class="pl-header">
        <div class="pl-company-info">
            <h1 class="pl-company-name" data-company>Company Name</h1>
            <div class="pl-period" data-period>Period</div>
        </div>
    </div>

    <!-- Metric Cards using common component -->
    <div class="so-metrics-grid">
        <div class="so-metric-card">
            <div class="so-metric-header">
                <div class="so-metric-label">Total Revenue</div>
                <div class="so-metric-icon green">
                    <span class="material-symbols-rounded">trending_up</span>
                </div>
            </div>
            <div class="so-metric-value" style="color:#34a853" data-metric="revenue">₹0</div>
        </div>
        <div class="so-metric-card">
            <div class="so-metric-header">
                <div class="so-metric-label" data-metric-label="gross-profit">Gross Profit</div>
                <div class="so-metric-icon blue">
                    <span class="material-symbols-rounded">payments</span>
                </div>
            </div>
            <div class="so-metric-value" data-metric="gross-profit">₹0</div>
        </div>
        <div class="so-metric-card">
            <div class="so-metric-header">
                <div class="so-metric-label" data-metric-label="net-profit">Net Profit</div>
                <div class="so-metric-icon blue">
                    <span class="material-symbols-rounded">account_balance_wallet</span>
                </div>
            </div>
            <div class="so-metric-value" data-metric="net-profit">₹0</div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="pl-charts-grid">
        <div class="pl-chart-card">
            <div class="pl-chart-card-header">
                <h3 class="pl-chart-title">Trade Expense Distribution</h3>
                <button class="so-fullscreen-btn" data-fullscreen="trade-expense" title="View Fullscreen">
                    <span class="material-symbols-rounded">fullscreen</span>
                </button>
            </div>
            <div class="pl-chart-container" data-chart="trade-expense" style="height:280px;"></div>
        </div>
        <div class="pl-chart-card">
            <div class="pl-chart-card-header">
                <h3 class="pl-chart-title">Trade Income Distribution</h3>
                <button class="so-fullscreen-btn" data-fullscreen="trade-income" title="View Fullscreen">
                    <span class="material-symbols-rounded">fullscreen</span>
                </button>
            </div>
            <div class="pl-chart-container" data-chart="trade-income" style="height:280px;"></div>
        </div>
    </div>

    <!-- Part 1: Trading Account (Detailed Breakdown) -->
    <div class="pl-tree-card">
        <div class="pl-tree-header">
            <div class="pl-tree-title">Trading Account - Detailed Breakdown</div>
            <div class="pl-tree-controls">
                <button class="pl-control-btn" data-action="expand-all">
                    <span class="material-symbols-rounded" style="font-size:16px">unfold_more</span>
                    Expand All
                </button>
                <button class="pl-control-btn" data-action="collapse-all">
                    <span class="material-symbols-rounded" style="font-size:16px">unfold_less</span>
                    Collapse All
                </button>
                <button class="pl-control-btn ${this.state.showPercentage ? 'active' : ''}" data-action="toggle-percentage">
                    <span class="material-symbols-rounded" style="font-size:16px">percent</span>
                    of Sales
                </button>
                <button class="pl-control-btn ${this.state.showDebitCredit ? 'active' : ''}" data-action="toggle-debit-credit">
                    <span class="material-symbols-rounded" style="font-size:16px">visibility</span>
                    Dr/Cr Columns
                </button>
            </div>
        </div>
        <div class="pl-two-column-grid" style="padding: 0;">
            <div class="pl-column">
                <div class="pl-tree-view" data-tree="trade-expense"></div>
            </div>
            <div class="pl-column">
                <div class="pl-tree-view" data-tree="trade-income"></div>
            </div>
        </div>
        <div class="pl-tree-footer" data-footer="trading">
            <div class="pl-footer-label" data-footer-label="gross">Gross Profit:</div>
            <div class="pl-footer-value" data-footer-value="gross-profit">₹0</div>
        </div>
    </div>

    <!-- Part 2: P&L Account (Detailed Breakdown) -->
    <div class="pl-tree-card">
        <div class="pl-tree-header">
            <div class="pl-tree-title">Profit & Loss Account - Detailed Breakdown</div>
        </div>
        <div class="pl-two-column-grid" style="padding: 0;">
            <div class="pl-column">
                <div class="pl-tree-view" data-tree="indirect-expense"></div>
            </div>
            <div class="pl-column">
                <div class="pl-tree-view" data-tree="indirect-income"></div>
            </div>
        </div>
        <div class="pl-tree-footer" data-footer="pl">
            <div class="pl-footer-label" data-footer-label="net">Net Profit:</div>
            <div class="pl-footer-value" data-footer-value="net-profit">₹0</div>
        </div>
    </div>

    <!-- Fullscreen Modals -->
    <div class="so-fullscreen-modal" data-modal="trade-expense">
        <div class="so-fullscreen-content">
            <div class="so-fullscreen-header">
                <h3 class="so-fullscreen-title">Trade Expense Distribution</h3>
                <button class="so-fullscreen-close" data-close-modal="trade-expense">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="so-fullscreen-body">
                <div class="pl-chart-container" data-chart="trade-expense-fullscreen" style="width:100%; height:100%;"></div>
            </div>
        </div>
    </div>

    <div class="so-fullscreen-modal" data-modal="trade-income">
        <div class="so-fullscreen-content">
            <div class="so-fullscreen-header">
                <h3 class="so-fullscreen-title">Trade Income Distribution</h3>
                <button class="so-fullscreen-close" data-close-modal="trade-income">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="so-fullscreen-body">
                <div class="pl-chart-container" data-chart="trade-income-fullscreen" style="width:100%; height:100%;"></div>
            </div>
        </div>
    </div>
</div>
`;
    };

    ProfitLossStatement.prototype.render = function() {
        this.container.innerHTML = this.getTemplate();
        this.attachEventListeners();
    };

    ProfitLossStatement.prototype.attachEventListeners = function() {
        const self = this;
        const container = this.container.querySelector('.pl-statement');

        container.addEventListener('click', function(e) {
            // Handle fullscreen button clicks
            const fullscreenBtn = e.target.closest('[data-fullscreen]');
            if (fullscreenBtn) {
                const chartType = fullscreenBtn.dataset.fullscreen;
                self.openFullscreen(chartType);
                return;
            }

            // Handle close modal button clicks
            const closeBtn = e.target.closest('[data-close-modal]');
            if (closeBtn) {
                const chartType = closeBtn.dataset.closeModal;
                self.closeFullscreen(chartType);
                return;
            }

            const target = e.target.closest('[data-action]');
            if (target) {
                const action = target.dataset.action;
                if (action === 'expand-all') self.expandAll();
                else if (action === 'collapse-all') self.collapseAll();
                else if (action === 'toggle-percentage') self.togglePercentage();
                else if (action === 'toggle-debit-credit') self.toggleDebitCredit();
            }

            // Check for node click (not on toggle icon)
            const node = e.target.closest('[data-node-id]');
            if (node && !e.target.closest('.pl-node-toggle')) {
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

            // Handle toggle click
            const toggleNode = e.target.closest('[data-node-id]');
            if (toggleNode && e.target.closest('.pl-node-toggle')) {
                self.toggleNode(toggleNode.dataset.nodeId);
            }
        });

        // Handle modal backdrop clicks
        const modals = this.container.querySelectorAll('.so-fullscreen-modal');
        modals.forEach(function(modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    const chartType = modal.dataset.modal;
                    self.closeFullscreen(chartType);
                }
            });
        });

        // Handle ESC key to close modals
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const activeModal = self.container.querySelector('.so-fullscreen-modal.active');
                if (activeModal) {
                    const chartType = activeModal.dataset.modal;
                    self.closeFullscreen(chartType);
                }
            }
        });
    };

    ProfitLossStatement.prototype.loadData = function(data) {
        this.state.data = data;
        this.updateUI();
    };

    ProfitLossStatement.prototype.reload = function(data) {
        this.loadData(data);
    };

    ProfitLossStatement.prototype.updateUI = function() {
        if (!this.state.data) return;

        // Update header
        this.container.querySelector('[data-company]').textContent = this.state.data.company;
        this.container.querySelector('[data-period]').textContent =
            `For the period ${this.formatDate(this.state.data.period.start)} to ${this.formatDate(this.state.data.period.end)}`;

        // Calculate and update metrics
        this.updateMetrics();

        // Render tree views
        this.renderTreeViews();

        // Create charts
        this.createCharts();
    };

    ProfitLossStatement.prototype.updateMetrics = function() {
        const totalRevenue = this.calculateTotalRevenue();
        const grossProfit = this.calculateGrossProfit();
        const netProfit = this.calculateNetProfit();

        // Update metric cards
        this.container.querySelector('[data-metric="revenue"]').textContent = this.formatCurrency(totalRevenue);

        // Update Gross Profit metric with dynamic label
        const grossProfitEl = this.container.querySelector('[data-metric="gross-profit"]');
        const grossProfitLabel = this.container.querySelector('[data-metric-label="gross-profit"]');
        grossProfitEl.textContent = this.formatCurrency(Math.abs(grossProfit));
        grossProfitEl.style.color = grossProfit >= 0 ? '#4285f4' : '#ea4335';
        if (grossProfitLabel) {
            grossProfitLabel.textContent = grossProfit >= 0 ? 'Gross Profit' : 'Gross Loss';
        }

        // Update Net Profit metric with dynamic label
        const netProfitEl = this.container.querySelector('[data-metric="net-profit"]');
        const netProfitLabel = this.container.querySelector('[data-metric-label="net-profit"]');
        netProfitEl.textContent = this.formatCurrency(Math.abs(netProfit));
        netProfitEl.style.color = netProfit >= 0 ? '#4285f4' : '#ea4335';
        if (netProfitLabel) {
            netProfitLabel.textContent = netProfit >= 0 ? 'Net Profit' : 'Net Loss';
        }

        // Update footer values
        const grossFooterEl = this.container.querySelector('[data-footer-value="gross-profit"]');
        const grossLabelEl = this.container.querySelector('[data-footer-label="gross"]');
        if (grossFooterEl && grossLabelEl) {
            grossFooterEl.textContent = this.formatCurrency(Math.abs(grossProfit));
            grossFooterEl.className = 'pl-footer-value ' + (grossProfit >= 0 ? 'profit' : 'loss');
            grossLabelEl.textContent = grossProfit >= 0 ? 'Gross Profit:' : 'Gross Loss:';
        }

        const netFooterEl = this.container.querySelector('[data-footer-value="net-profit"]');
        const netLabelEl = this.container.querySelector('[data-footer-label="net"]');
        if (netFooterEl && netLabelEl) {
            netFooterEl.textContent = this.formatCurrency(Math.abs(netProfit));
            netFooterEl.className = 'pl-footer-value ' + (netProfit >= 0 ? 'profit' : 'loss');
            netLabelEl.textContent = netProfit >= 0 ? 'Net Profit:' : 'Net Loss:';
        }
    };

    // Calculate node totals for both debit and credit
    ProfitLossStatement.prototype.calculateNodeTotals = function(node) {
        if (!node) return { debit: 0, credit: 0 };

        if (node.type === 'ledger') {
            return {
                debit: node.debit || 0,
                credit: node.credit || 0
            };
        }

        // For groups, sum up children
        if (node.children && node.children.length > 0) {
            const self = this;
            return node.children.reduce(function(sum, child) {
                const childTotals = self.calculateNodeTotals(child);
                return {
                    debit: sum.debit + childTotals.debit,
                    credit: sum.credit + childTotals.credit
                };
            }, { debit: 0, credit: 0 });
        }

        return { debit: 0, credit: 0 };
    };

    ProfitLossStatement.prototype.calculateTotalRevenue = function() {
        if (!this.state.data) return 0;
        const data = this.state.data.plstatement;

        let total = 0;
        if (data.trade_income) {
            total += this.calculateNodeTotals(data.trade_income).credit;
        }
        if (data.indirect_income) {
            total += this.calculateNodeTotals(data.indirect_income).credit;
        }
        return total;
    };

    // Calculate total sales from Sales Accounts group only
    ProfitLossStatement.prototype.calculateTotalSales = function() {
        if (!this.state.data) return 0;
        const data = this.state.data.plstatement;

        // Find Sales Accounts group within trade_income
        if (data.trade_income && data.trade_income.children) {
            const salesAccountsGroup = data.trade_income.children.find(function(child) {
                return child.id === 'sales_accounts';
            });

            if (salesAccountsGroup) {
                const totals = this.calculateNodeTotals(salesAccountsGroup);
                // Return the credit balance (sales)
                return totals.credit - totals.debit;
            }
        }
        return 0;
    };

    ProfitLossStatement.prototype.calculateGrossProfit = function() {
        if (!this.state.data) return 0;
        const data = this.state.data.plstatement;

        // Trade Income (Credit is positive)
        const tradeIncomeTotals = this.calculateNodeTotals(data.trade_income);
        const tradeIncome = tradeIncomeTotals.credit - tradeIncomeTotals.debit;

        // Trade Expense (Debit is positive expense)
        const tradeExpenseTotals = this.calculateNodeTotals(data.trade_expense);
        const tradeExpense = tradeExpenseTotals.debit - tradeExpenseTotals.credit;

        return tradeIncome - tradeExpense;
    };

    ProfitLossStatement.prototype.calculateNetProfit = function() {
        if (!this.state.data) return 0;
        const grossProfit = this.calculateGrossProfit();
        const data = this.state.data.plstatement;

        // Indirect Income (Credit is positive)
        const indirectIncomeTotals = this.calculateNodeTotals(data.indirect_income);
        const indirectIncome = indirectIncomeTotals.credit - indirectIncomeTotals.debit;

        // Indirect Expense (Debit is positive expense)
        const indirectExpenseTotals = this.calculateNodeTotals(data.indirect_expense);
        const indirectExpense = indirectExpenseTotals.debit - indirectExpenseTotals.credit;

        return grossProfit + indirectIncome - indirectExpense;
    };

    ProfitLossStatement.prototype.renderTreeViews = function() {
        this.renderTradeExpenseTree();
        this.renderTradeIncomeTree();
        this.renderIndirectExpenseTree();
        this.renderIndirectIncomeTree();
    };

    ProfitLossStatement.prototype.getNodeIcon = function(node, level) {
        // Check if node has custom icon property
        if (node.icon) return node.icon;

        if (level === 0) return 'analytics';
        if (node.type === 'group') return 'category';
        return 'receipt_long';
    };

    ProfitLossStatement.prototype.buildTreeNode = function(node, level, totalSales, section) {
        const self = this;
        level = level || 0;

        const nodeTotals = this.calculateNodeTotals(node);
        const isExpanded = this.state.expandedNodes.has(node.id);
        const hasChildren = node.type === 'group' && node.children && node.children.length > 0;
        const indent = level * 12;

        // Calculate balance based on section
        let balance = 0;
        let isAbnormal = false;

        if (section === 'trade-expense' || section === 'indirect-expense') {
            balance = nodeTotals.debit - nodeTotals.credit;
            // Abnormal if credit balance on expense side
            isAbnormal = balance < 0;
        } else {
            balance = nodeTotals.credit - nodeTotals.debit;
            // Abnormal if debit balance on income side
            isAbnormal = balance < 0;
        }

        // Calculate percentage based on Sales Accounts credit balance
        let percentageStr = 'N/A';
        if (totalSales > 0) {
            const percentage = ((Math.abs(balance) / totalSales) * 100).toFixed(1);
            percentageStr = percentage + '%';
        }

        let html = '<div class="pl-tree-node level-' + level + '">';
        html += '<div class="pl-node-content" data-node-id="' + node.id + '" data-node-type="' + node.type + '" data-node-name="' + node.name + '">';
        html += '<span class="pl-node-indent" style="width:' + indent + 'px"></span>';

        html += '<div class="pl-node-toggle' + (isExpanded ? ' expanded' : '') + '">';
        if (hasChildren) {
            html += '<span class="material-symbols-rounded" style="font-size:16px">chevron_right</span>';
        }
        html += '</div>';

        const iconName = this.getNodeIcon(node, level);
        html += '<div class="pl-node-icon ' + node.type + ' level-' + level + '">';
        html += '<span class="material-symbols-rounded" style="font-size:18px">' + iconName + '</span>';
        html += '</div>';

        html += '<div class="pl-node-label ' + node.type + ' level-' + level + '">' + node.name + '</div>';
        html += '<div class="pl-node-stats">';

        // Debit column (conditionally shown)
        if (this.state.showDebitCredit) {
            html += '<div class="pl-node-amount debit" style="min-width:100px">';
            html += nodeTotals.debit > 0 ? this.formatCurrency(nodeTotals.debit) : '';
            html += '</div>';
        }

        // Credit column (conditionally shown)
        if (this.state.showDebitCredit) {
            html += '<div class="pl-node-amount credit" style="min-width:100px">';
            html += nodeTotals.credit > 0 ? this.formatCurrency(nodeTotals.credit) : '';
            html += '</div>';
        }

        // Balance column - Red if abnormal, black otherwise
        const balanceColor = isAbnormal ? 'color:#ea4335' : 'color:#202124';
        html += '<div class="pl-node-amount balance" style="min-width:120px;' + balanceColor + '">';
        html += this.formatCurrency(Math.abs(balance));
        html += '</div>';

        // Percentage column
        if (this.state.showPercentage) {
            html += '<div class="pl-node-percentage">' + percentageStr + '</div>';
        }

        html += '</div>';
        html += '</div>';

        if (hasChildren) {
            html += '<div class="pl-node-children' + (isExpanded ? ' expanded' : '') + '">';
            node.children.forEach(function(child) {
                html += self.buildTreeNode(child, level + 1, totalSales, section);
            });
            html += '</div>';
        }

        html += '</div>';
        return html;
    };

    ProfitLossStatement.prototype.buildTreeHeader = function() {
        let html = '<div class="pl-tree-node" style="position:sticky; top:0; z-index:10; background:#f1f3f4; font-weight:600; border-bottom:2px solid #dadce0;">';
        html += '<div class="pl-node-content" style="cursor:default;">';
        html += '<span class="pl-node-indent" style="width:20px"></span>';
        html += '<div class="pl-node-toggle"></div>';
        html += '<div class="pl-node-icon"></div>';
        html += '<div class="pl-node-label" style="font-size:12px; color:#5f6368; text-transform:uppercase; letter-spacing:0.5px;">Particulars</div>';
        html += '<div class="pl-node-stats">';
        if (this.state.showDebitCredit) {
            html += '<div class="pl-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Debit</div>';
            html += '<div class="pl-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Credit</div>';
        }
        html += '<div class="pl-node-amount" style="min-width:120px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Balance</div>';
        if (this.state.showPercentage) {
            html += '<div class="pl-node-percentage" style="font-size:12px; color:#5f6368; text-transform:uppercase;">% of Sales</div>';
        }
        html += '</div></div></div>';
        return html;
    };

    ProfitLossStatement.prototype.renderTradeExpenseTree = function() {
        const self = this;
        const data = this.state.data.plstatement.trade_expense;
        const totalSales = this.calculateTotalSales();
        const treeEl = this.container.querySelector('[data-tree="trade-expense"]');

        let html = this.buildTreeHeader();

        if (data.children && data.children.length > 0) {
            data.children.forEach(function(child) {
                html += self.buildTreeNode(child, 0, totalSales, 'trade-expense');
            });
        }

        // Add Gross Profit row
        const grossProfit = this.calculateGrossProfit();
        if (grossProfit > 0) {
            html += this.buildBalancingRow('Gross Profit c/o', grossProfit, totalSales);
        }

        treeEl.innerHTML = html;
    };

    ProfitLossStatement.prototype.renderTradeIncomeTree = function() {
        const self = this;
        const data = this.state.data.plstatement.trade_income;
        const totalSales = this.calculateTotalSales();
        const treeEl = this.container.querySelector('[data-tree="trade-income"]');

        let html = this.buildTreeHeader();

        if (data.children && data.children.length > 0) {
            data.children.forEach(function(child) {
                html += self.buildTreeNode(child, 0, totalSales, 'trade-income');
            });
        }

        // Add Gross Loss row if applicable
        const grossProfit = this.calculateGrossProfit();
        if (grossProfit < 0) {
            html += this.buildBalancingRow('Gross Loss c/o', Math.abs(grossProfit), totalSales);
        }

        treeEl.innerHTML = html;
    };

    ProfitLossStatement.prototype.renderIndirectExpenseTree = function() {
        const self = this;
        const data = this.state.data.plstatement.indirect_expense;
        const totalSales = this.calculateTotalSales();
        const treeEl = this.container.querySelector('[data-tree="indirect-expense"]');

        let html = this.buildTreeHeader();

        // Add Gross Profit b/f if profit
        const grossProfit = this.calculateGrossProfit();
        if (grossProfit < 0) {
            html += this.buildBalancingRow('Gross Loss b/f', Math.abs(grossProfit), totalSales);
        }

        if (data.children && data.children.length > 0) {
            data.children.forEach(function(child) {
                html += self.buildTreeNode(child, 0, totalSales, 'indirect-expense');
            });
        }

        // Add Net Profit row
        const netProfit = this.calculateNetProfit();
        if (netProfit > 0) {
            html += this.buildBalancingRow('Net Profit', netProfit, totalSales);
        }

        treeEl.innerHTML = html;
    };

    ProfitLossStatement.prototype.renderIndirectIncomeTree = function() {
        const self = this;
        const data = this.state.data.plstatement.indirect_income;
        const totalSales = this.calculateTotalSales();
        const treeEl = this.container.querySelector('[data-tree="indirect-income"]');

        let html = this.buildTreeHeader();

        // Add Gross Profit b/f if profit
        const grossProfit = this.calculateGrossProfit();
        if (grossProfit > 0) {
            html += this.buildBalancingRow('Gross Profit b/f', grossProfit, totalSales);
        }

        if (data.children && data.children.length > 0) {
            data.children.forEach(function(child) {
                html += self.buildTreeNode(child, 0, totalSales, 'indirect-income');
            });
        }

        // Add Net Loss row
        const netProfit = this.calculateNetProfit();
        if (netProfit < 0) {
            html += this.buildBalancingRow('Net Loss', Math.abs(netProfit), totalSales);
        }

        treeEl.innerHTML = html;
    };

    ProfitLossStatement.prototype.buildBalancingRow = function(label, amount, totalSales) {
        let percentageStr = 'N/A';
        if (totalSales > 0) {
            const percentage = ((amount / totalSales) * 100).toFixed(1);
            percentageStr = percentage + '%';
        }

        let html = '<div class="pl-tree-node" style="background:#f8f9fa; font-style:italic;">';
        html += '<div class="pl-node-content" style="cursor:default;">';
        html += '<span class="pl-node-indent" style="width:20px"></span>';
        html += '<div class="pl-node-toggle"></div>';
        html += '<div class="pl-node-icon"></div>';
        html += '<div class="pl-node-label" style="color:#4285f4; font-weight:500;"><em>' + label + '</em></div>';
        html += '<div class="pl-node-stats">';
        if (this.state.showDebitCredit) {
            html += '<div class="pl-node-amount" style="min-width:100px"></div>';
            html += '<div class="pl-node-amount" style="min-width:100px"></div>';
        }
        html += '<div class="pl-node-amount" style="min-width:120px; color:#4285f4; font-weight:500;">' + this.formatCurrency(amount) + '</div>';
        if (this.state.showPercentage) {
            html += '<div class="pl-node-percentage">' + percentageStr + '</div>';
        }
        html += '</div></div></div>';
        return html;
    };

    ProfitLossStatement.prototype.toggleNode = function(nodeId) {
        if (this.state.expandedNodes.has(nodeId)) {
            this.state.expandedNodes.delete(nodeId);
        } else {
            this.state.expandedNodes.add(nodeId);
        }
        this.renderTreeViews();
    };

    ProfitLossStatement.prototype.expandAll = function() {
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
            const data = this.state.data.plstatement;
            addAllIds(data.trade_expense);
            addAllIds(data.trade_income);
            addAllIds(data.indirect_expense);
            addAllIds(data.indirect_income);
        }

        this.renderTreeViews();
    };

    ProfitLossStatement.prototype.collapseAll = function() {
        this.state.expandedNodes.clear();
        this.renderTreeViews();
    };

    ProfitLossStatement.prototype.togglePercentage = function() {
        this.state.showPercentage = !this.state.showPercentage;

        const btn = this.container.querySelector('[data-action="toggle-percentage"]');
        if (this.state.showPercentage) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }

        this.renderTreeViews();
    };

    ProfitLossStatement.prototype.toggleDebitCredit = function() {
        this.state.showDebitCredit = !this.state.showDebitCredit;

        const btn = this.container.querySelector('[data-action="toggle-debit-credit"]');
        if (this.state.showDebitCredit) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }

        this.renderTreeViews();
    };

    ProfitLossStatement.prototype.createCharts = function() {
        if (typeof echarts === 'undefined') return;

        this.createTradeExpenseChart();
        this.createTradeIncomeChart();
    };

    ProfitLossStatement.prototype.prepareHierarchicalData = function(node, limit, sectionType) {
        const self = this;
        limit = limit || 9;

        if (!node || !node.children) return [];

        // Determine if this is an income section (credit - debit) or expense section (debit - credit)
        const isIncomeSection = sectionType === 'income';

        const childrenWithTotals = node.children.map(function(child) {
            const totals = self.calculateNodeTotals(child);
            // For income sections: credit - debit
            // For expense sections: debit - credit
            const balance = isIncomeSection ? (totals.credit - totals.debit) : (totals.debit - totals.credit);
            const total = Math.abs(balance);
            return {
                node: child,
                total: total
            };
        });

        const sortedChildren = childrenWithTotals.sort(function(a, b) {
            return b.total - a.total;
        });

        const topChildren = sortedChildren.slice(0, limit);
        const result = [];

        topChildren.forEach(function(item) {
            const chartItem = {
                name: item.node.name,
                value: item.total,
                children: []
            };

            if (item.node.children) {
                item.node.children.forEach(function(grandChild) {
                    const grandChildTotals = self.calculateNodeTotals(grandChild);
                    // Apply same logic for grandchildren
                    const grandChildBalance = isIncomeSection ?
                        (grandChildTotals.credit - grandChildTotals.debit) :
                        (grandChildTotals.debit - grandChildTotals.credit);
                    const grandChildTotal = Math.abs(grandChildBalance);
                    chartItem.children.push({
                        name: grandChild.name,
                        value: grandChildTotal
                    });
                });
            }

            result.push(chartItem);
        });

        if (sortedChildren.length > limit) {
            const others = sortedChildren.slice(limit);
            const othersTotal = others.reduce(function(sum, item) {
                return sum + item.total;
            }, 0);
            result.push({
                name: 'Others',
                value: othersTotal,
                children: []
            });
        }

        return result;
    };

    ProfitLossStatement.prototype.createTradeExpenseChart = function() {
        const self = this;
        const expenseEl = this.container.querySelector('[data-chart="trade-expense"]');
        if (!expenseEl) return;

        if (this.state.tradeExpenseChart) {
            this.state.tradeExpenseChart.dispose();
        }

        this.state.tradeExpenseChart = echarts.init(expenseEl);

        const hierarchicalData = this.prepareHierarchicalData(this.state.data.plstatement.trade_expense, 9, 'expense');

        // Calculate total for percentage
        const total = hierarchicalData.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.tradeExpenseChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = total > 0 ? ((params.value / total) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['20%', '85%'],
                center: ['50%', '50%'],
                data: hierarchicalData,
                label: {
                    rotate: 'radial',
                    fontSize: 10,
                    fontFamily: 'Google Sans'
                },
                itemStyle: {
                    borderRadius: 4,
                    borderWidth: 2,
                    borderColor: '#fff'
                },
                levels: [{}, {
                    r0: '20%',
                    r: '50%',
                    label: { rotate: 0, fontSize: 11, fontWeight: 500 },
                    itemStyle: { borderWidth: 2 }
                }, {
                    r0: '50%',
                    r: '85%',
                    label: { fontSize: 9, fontWeight: 400 },
                    itemStyle: { borderWidth: 2 }
                }]
            }]
        });

        window.addEventListener('resize', function() {
            if (self.state.tradeExpenseChart) self.state.tradeExpenseChart.resize();
        });
    };

    ProfitLossStatement.prototype.createTradeIncomeChart = function() {
        const self = this;
        const incomeEl = this.container.querySelector('[data-chart="trade-income"]');
        if (!incomeEl) return;

        if (this.state.tradeIncomeChart) {
            this.state.tradeIncomeChart.dispose();
        }

        this.state.tradeIncomeChart = echarts.init(incomeEl);

        const hierarchicalData = this.prepareHierarchicalData(this.state.data.plstatement.trade_income, 9, 'income');

        // Calculate total for percentage
        const total = hierarchicalData.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.tradeIncomeChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = total > 0 ? ((params.value / total) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['20%', '85%'],
                center: ['50%', '50%'],
                data: hierarchicalData,
                label: {
                    rotate: 'radial',
                    fontSize: 10,
                    fontFamily: 'Google Sans'
                },
                itemStyle: {
                    borderRadius: 4,
                    borderWidth: 2,
                    borderColor: '#fff'
                },
                levels: [{}, {
                    r0: '20%',
                    r: '50%',
                    label: { rotate: 0, fontSize: 11, fontWeight: 500 },
                    itemStyle: { borderWidth: 2 }
                }, {
                    r0: '50%',
                    r: '85%',
                    label: { fontSize: 9, fontWeight: 400 },
                    itemStyle: { borderWidth: 2 }
                }]
            }]
        });

        window.addEventListener('resize', function() {
            if (self.state.tradeIncomeChart) self.state.tradeIncomeChart.resize();
        });
    };

    ProfitLossStatement.prototype.formatCurrency = function(amount) {
        return '₹' + amount.toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    };

    ProfitLossStatement.prototype.formatDate = function(dateString) {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return date.toLocaleDateString('en-IN', options);
    };

    // Fullscreen Methods
    ProfitLossStatement.prototype.openFullscreen = function(chartType) {
        const self = this;
        const modal = this.container.querySelector('[data-modal="' + chartType + '"]');
        if (!modal) return;

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';

        setTimeout(function() {
            if (chartType === 'trade-expense') {
                self.createTradeExpenseFullscreenChart();
            } else if (chartType === 'trade-income') {
                self.createTradeIncomeFullscreenChart();
            }
        }, 100);
    };

    ProfitLossStatement.prototype.closeFullscreen = function(chartType) {
        const modal = this.container.querySelector('[data-modal="' + chartType + '"]');
        if (!modal) return;

        modal.classList.remove('active');
        document.body.style.overflow = '';

        if (chartType === 'trade-expense' && this.state.tradeExpenseFullscreenChart) {
            this.state.tradeExpenseFullscreenChart.dispose();
            this.state.tradeExpenseFullscreenChart = null;
        } else if (chartType === 'trade-income' && this.state.tradeIncomeFullscreenChart) {
            this.state.tradeIncomeFullscreenChart.dispose();
            this.state.tradeIncomeFullscreenChart = null;
        }
    };

    ProfitLossStatement.prototype.createTradeExpenseFullscreenChart = function() {
        const self = this;
        const expenseEl = this.container.querySelector('[data-chart="trade-expense-fullscreen"]');
        if (!expenseEl) return;

        if (this.state.tradeExpenseFullscreenChart) {
            this.state.tradeExpenseFullscreenChart.dispose();
        }

        this.state.tradeExpenseFullscreenChart = echarts.init(expenseEl);

        const hierarchicalData = this.prepareHierarchicalData(this.state.data.plstatement.trade_expense, 9, 'expense');
        const total = hierarchicalData.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.tradeExpenseFullscreenChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = total > 0 ? ((params.value / total) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['20%', '85%'],
                center: ['50%', '50%'],
                data: hierarchicalData,
                label: {
                    rotate: 'radial',
                    fontSize: 12,
                    fontFamily: 'Google Sans'
                },
                itemStyle: {
                    borderRadius: 4,
                    borderWidth: 2,
                    borderColor: '#fff'
                },
                levels: [{}, {
                    r0: '20%',
                    r: '50%',
                    label: { rotate: 0, fontSize: 13, fontWeight: 500 },
                    itemStyle: { borderWidth: 2 }
                }, {
                    r0: '50%',
                    r: '85%',
                    label: { fontSize: 11, fontWeight: 400 },
                    itemStyle: { borderWidth: 2 }
                }]
            }]
        });
    };

    ProfitLossStatement.prototype.createTradeIncomeFullscreenChart = function() {
        const self = this;
        const incomeEl = this.container.querySelector('[data-chart="trade-income-fullscreen"]');
        if (!incomeEl) return;

        if (this.state.tradeIncomeFullscreenChart) {
            this.state.tradeIncomeFullscreenChart.dispose();
        }

        this.state.tradeIncomeFullscreenChart = echarts.init(incomeEl);

        const hierarchicalData = this.prepareHierarchicalData(this.state.data.plstatement.trade_income, 9, 'income');
        const total = hierarchicalData.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.tradeIncomeFullscreenChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = total > 0 ? ((params.value / total) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['20%', '85%'],
                center: ['50%', '50%'],
                data: hierarchicalData,
                label: {
                    rotate: 'radial',
                    fontSize: 12,
                    fontFamily: 'Google Sans'
                },
                itemStyle: {
                    borderRadius: 4,
                    borderWidth: 2,
                    borderColor: '#fff'
                },
                levels: [{}, {
                    r0: '20%',
                    r: '50%',
                    label: { rotate: 0, fontSize: 13, fontWeight: 500 },
                    itemStyle: { borderWidth: 2 }
                }, {
                    r0: '50%',
                    r: '85%',
                    label: { fontSize: 11, fontWeight: 400 },
                    itemStyle: { borderWidth: 2 }
                }]
            }]
        });
    };

    // Export to global scope
    global.ProfitLossStatement = ProfitLossStatement;

})(typeof window !== 'undefined' ? window : this);
