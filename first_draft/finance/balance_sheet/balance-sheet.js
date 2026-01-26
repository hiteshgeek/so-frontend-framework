/**
 * Balance Sheet Plugin
 * Framework-agnostic plugin for displaying Balance Sheet with nested groups and ledgers
 * Version: 1.0.0
 *
 * Dependencies: balance-sheet.css, sixorbit-common.css
 *
 * Usage:
 * const balanceSheet = new BalanceSheet('container-id', {
 *     data: jsonData
 * });
 */

(function(global) {
    'use strict';

    const BalanceSheet = function(containerId, options) {
        this.containerId = containerId;
        this.container = document.getElementById(containerId);

        if (!this.container) {
            throw new Error(`Container with id "${containerId}" not found`);
        }

        this.options = Object.assign({
            data: null,
            onGroupClick: null,    // Callback when a group is clicked
            onLedgerClick: null    // Callback when a ledger is clicked
        }, options);

        this.state = {
            expandedNodes: new Set(),
            liabilitiesChart: null,
            assetsChart: null,
            liabilitiesFullscreenChart: null,
            assetsFullscreenChart: null,
            showDebitCredit: true,
            data: null
        };

        this.init();
    };

    BalanceSheet.prototype.init = function() {
        const self = this;
        this.loadDependencies().then(function() {
            self.render();
            if (self.options.data) {
                self.loadData(self.options.data);
            }
        });
    };

    BalanceSheet.prototype.loadDependencies = function() {
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

    BalanceSheet.prototype.loadScript = function(src) {
        return new Promise(function(resolve, reject) {
            const script = document.createElement('script');
            script.src = src;
            script.onload = resolve;
            script.onerror = reject;
            document.head.appendChild(script);
        });
    };

    BalanceSheet.prototype.getTemplate = function() {
        return `
<div class="bs-statement">
    <!-- Header Section -->
    <div class="bs-header">
        <div class="bs-company-info">
            <h1 class="bs-company-name" data-company>Company Name</h1>
            <div class="bs-period" data-period>As on Date</div>
        </div>
    </div>

    <!-- Metric Cards -->
    <div class="so-metrics-grid" style="grid-template-columns: 1fr 1fr;">
        <div class="so-metric-card">
            <div class="so-metric-header">
                <div class="so-metric-label">Total Liabilities</div>
                <div class="so-metric-icon green">
                    <span class="material-symbols-rounded">description</span>
                </div>
            </div>
            <div class="so-metric-value" style="color:#34a853" data-metric="total-liabilities">₹0</div>
        </div>
        <div class="so-metric-card">
            <div class="so-metric-header">
                <div class="so-metric-label">Total Assets</div>
                <div class="so-metric-icon blue">
                    <span class="material-symbols-rounded">account_balance</span>
                </div>
            </div>
            <div class="so-metric-value" style="color:#4285f4" data-metric="total-assets">₹0</div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="bs-charts-grid">
        <div class="bs-chart-card">
            <div class="bs-chart-card-header">
                <h3 class="bs-chart-title">Liabilities Distribution</h3>
                <button class="so-fullscreen-btn" data-fullscreen="liabilities" title="View Fullscreen">
                    <span class="material-symbols-rounded">fullscreen</span>
                </button>
            </div>
            <div class="bs-chart-container" data-chart="liabilities" style="height:280px;"></div>
        </div>
        <div class="bs-chart-card">
            <div class="bs-chart-card-header">
                <h3 class="bs-chart-title">Assets Distribution</h3>
                <button class="so-fullscreen-btn" data-fullscreen="assets" title="View Fullscreen">
                    <span class="material-symbols-rounded">fullscreen</span>
                </button>
            </div>
            <div class="bs-chart-container" data-chart="assets" style="height:280px;"></div>
        </div>
    </div>

    <!-- Fullscreen Modals -->
    <div class="so-fullscreen-modal" data-modal="liabilities">
        <div class="so-fullscreen-content">
            <div class="so-fullscreen-header">
                <h3 class="so-fullscreen-title">Liabilities Distribution</h3>
                <button class="so-fullscreen-close" data-close-modal="liabilities">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="so-fullscreen-body">
                <div class="bs-chart-container" data-chart="liabilities-fullscreen" style="width:100%; height:100%;"></div>
            </div>
        </div>
    </div>

    <div class="so-fullscreen-modal" data-modal="assets">
        <div class="so-fullscreen-content">
            <div class="so-fullscreen-header">
                <h3 class="so-fullscreen-title">Assets Distribution</h3>
                <button class="so-fullscreen-close" data-close-modal="assets">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="so-fullscreen-body">
                <div class="bs-chart-container" data-chart="assets-fullscreen" style="width:100%; height:100%;"></div>
            </div>
        </div>
    </div>

    <!-- Balance Sheet Details -->
    <div class="bs-tree-card">
        <div class="bs-tree-header">
            <div class="bs-tree-title">Balance Sheet - Detailed Breakdown</div>
            <div class="bs-tree-controls">
                <button class="bs-control-btn" data-action="expand-all">
                    <span class="material-symbols-rounded" style="font-size:16px">unfold_more</span>
                    Expand All
                </button>
                <button class="bs-control-btn" data-action="collapse-all">
                    <span class="material-symbols-rounded" style="font-size:16px">unfold_less</span>
                    Collapse All
                </button>
                <button class="bs-control-btn ${this.state.showDebitCredit ? 'active' : ''}" data-action="toggle-debit-credit">
                    <span class="material-symbols-rounded" style="font-size:16px">visibility</span>
                    Dr/Cr Columns
                </button>
            </div>
        </div>
        <div class="bs-two-column-grid" style="padding: 0;">
            <div class="bs-column">
                <div class="bs-section-header liabilities">LIABILITIES</div>
                <div class="bs-tree-view" data-tree="liabilities"></div>
            </div>
            <div class="bs-column">
                <div class="bs-section-header assets">ASSETS</div>
                <div class="bs-tree-view" data-tree="assets"></div>
            </div>
        </div>
        <div class="bs-tree-footer">
            <div class="bs-footer-label">Grand Total:</div>
            <div class="bs-footer-value" data-footer-value="grand-total">₹0</div>
        </div>
    </div>
</div>
`;
    };

    BalanceSheet.prototype.render = function() {
        this.container.innerHTML = this.getTemplate();
        this.attachEventListeners();
    };

    BalanceSheet.prototype.attachEventListeners = function() {
        const self = this;
        const container = this.container.querySelector('.bs-statement');

        container.addEventListener('click', function(e) {
            const target = e.target.closest('[data-action]');
            if (target) {
                const action = target.dataset.action;
                if (action === 'expand-all') self.expandAll();
                else if (action === 'collapse-all') self.collapseAll();
                else if (action === 'toggle-debit-credit') self.toggleDebitCredit();
                return;
            }

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

            // Check for node click (not on toggle icon)
            const node = e.target.closest('[data-node-id]');
            if (node && !e.target.closest('.bs-node-toggle')) {
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
            if (toggleNode && e.target.closest('.bs-node-toggle')) {
                self.toggleNode(toggleNode.dataset.nodeId);
            }
        });

        // Handle modal background click to close
        const modals = this.container.querySelectorAll('.so-fullscreen-modal');
        modals.forEach(function(modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    const chartType = modal.dataset.modal;
                    self.closeFullscreen(chartType);
                }
            });
        });

        // Handle ESC key to close fullscreen
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

    BalanceSheet.prototype.loadData = function(data) {
        this.state.data = data;
        this.updateUI();
    };

    BalanceSheet.prototype.reload = function(data) {
        this.loadData(data);
    };

    BalanceSheet.prototype.updateUI = function() {
        if (!this.state.data) return;

        // Update header
        this.container.querySelector('[data-company]').textContent = this.state.data.company;
        this.container.querySelector('[data-period]').textContent =
            `As on ${this.formatDate(this.state.data.asOnDate)}`;

        // Calculate and update metrics
        this.updateMetrics();

        // Render tree views
        this.renderTreeViews();

        // Create charts
        this.createCharts();
    };

    BalanceSheet.prototype.updateMetrics = function() {
        const totalAssets = this.calculateTotalAssets();
        const totalLiabilities = this.calculateTotalLiabilities();

        // Update metric cards
        this.container.querySelector('[data-metric="total-assets"]').textContent = this.formatCurrency(totalAssets);
        this.container.querySelector('[data-metric="total-liabilities"]').textContent = this.formatCurrency(totalLiabilities);

        // Update footer
        const footerEl = this.container.querySelector('[data-footer-value="grand-total"]');
        if (footerEl) {
            footerEl.textContent = this.formatCurrency(Math.max(totalAssets, totalLiabilities));
        }
    };

    // Calculate node totals for both debit and credit
    BalanceSheet.prototype.calculateNodeTotals = function(node) {
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

    BalanceSheet.prototype.calculateTotalLiabilities = function() {
        if (!this.state.data) return 0;
        const data = this.state.data.balancesheet;

        if (data.liabilities) {
            const totals = this.calculateNodeTotals(data.liabilities);
            // Liabilities: Credit is positive
            return totals.credit - totals.debit;
        }
        return 0;
    };

    BalanceSheet.prototype.calculateTotalAssets = function() {
        if (!this.state.data) return 0;
        const data = this.state.data.balancesheet;

        if (data.assets) {
            const totals = this.calculateNodeTotals(data.assets);
            // Assets: Debit is positive
            return totals.debit - totals.credit;
        }
        return 0;
    };

    BalanceSheet.prototype.calculateNetWorth = function() {
        const totalAssets = this.calculateTotalAssets();
        const totalLiabilities = this.calculateTotalLiabilities();
        return totalAssets - totalLiabilities;
    };

    BalanceSheet.prototype.renderTreeViews = function() {
        this.renderLiabilitiesTree();
        this.renderAssetsTree();
    };

    BalanceSheet.prototype.getNodeIcon = function(node, level) {
        // Check if node has custom icon property
        if (node.icon) return node.icon;

        if (level === 0) return 'analytics';
        if (node.type === 'group') return 'category';
        return 'receipt_long';
    };

    BalanceSheet.prototype.buildTreeNode = function(node, level, section) {
        const self = this;
        level = level || 0;

        const nodeTotals = this.calculateNodeTotals(node);
        const isExpanded = this.state.expandedNodes.has(node.id);
        const hasChildren = node.type === 'group' && node.children && node.children.length > 0;
        const indent = level * 12;

        // Calculate balance based on section
        let balance = 0;
        let isAbnormal = false;

        if (section === 'liabilities') {
            // Liabilities: Credit is positive
            balance = nodeTotals.credit - nodeTotals.debit;
            // Abnormal if debit balance on liabilities side
            isAbnormal = balance < 0;
        } else {
            // Assets: Debit is positive
            balance = nodeTotals.debit - nodeTotals.credit;
            // Abnormal if credit balance on assets side
            isAbnormal = balance < 0;
        }

        let html = '<div class="bs-tree-node level-' + level + '">';
        html += '<div class="bs-node-content" data-node-id="' + node.id + '" data-node-type="' + node.type + '" data-node-name="' + node.name + '">';
        html += '<span class="bs-node-indent" style="width:' + indent + 'px"></span>';

        html += '<div class="bs-node-toggle' + (isExpanded ? ' expanded' : '') + '">';
        if (hasChildren) {
            html += '<span class="material-symbols-rounded" style="font-size:16px">chevron_right</span>';
        }
        html += '</div>';

        const iconName = this.getNodeIcon(node, level);
        html += '<div class="bs-node-icon ' + node.type + ' level-' + level + '">';
        html += '<span class="material-symbols-rounded" style="font-size:18px">' + iconName + '</span>';
        html += '</div>';

        html += '<div class="bs-node-label ' + node.type + ' level-' + level + '">' + node.name + '</div>';
        html += '<div class="bs-node-stats">';

        // Debit column (conditionally shown)
        // Liabilities: Debit is red (abnormal), Assets: Debit is green (normal)
        if (this.state.showDebitCredit) {
            const debitColor = section === 'liabilities' ? 'color:#ea4335' : 'color:#34a853';
            html += '<div class="bs-node-amount debit" style="min-width:100px;' + debitColor + '">';
            html += nodeTotals.debit > 0 ? this.formatCurrency(nodeTotals.debit) : '';
            html += '</div>';
        }

        // Credit column (conditionally shown)
        // Liabilities: Credit is green (normal), Assets: Credit is red (abnormal)
        if (this.state.showDebitCredit) {
            const creditColor = section === 'liabilities' ? 'color:#34a853' : 'color:#ea4335';
            html += '<div class="bs-node-amount credit" style="min-width:100px;' + creditColor + '">';
            html += nodeTotals.credit > 0 ? this.formatCurrency(nodeTotals.credit) : '';
            html += '</div>';
        }

        // Balance column - Red if abnormal, black otherwise
        const balanceColor = isAbnormal ? 'color:#ea4335' : 'color:#202124';
        html += '<div class="bs-node-amount balance" style="min-width:120px;' + balanceColor + '">';
        html += this.formatCurrency(Math.abs(balance));
        html += '</div>';

        html += '</div>';
        html += '</div>';

        if (hasChildren) {
            html += '<div class="bs-node-children' + (isExpanded ? ' expanded' : '') + '">';
            node.children.forEach(function(child) {
                html += self.buildTreeNode(child, level + 1, section);
            });
            html += '</div>';
        }

        html += '</div>';
        return html;
    };

    BalanceSheet.prototype.buildTreeHeader = function() {
        let html = '<div class="bs-tree-node" style="position:sticky; top:0; z-index:10; background:#f1f3f4; font-weight:600; border-bottom:2px solid #dadce0;">';
        html += '<div class="bs-node-content" style="cursor:default;">';
        html += '<span class="bs-node-indent" style="width:20px"></span>';
        html += '<div class="bs-node-toggle"></div>';
        html += '<div class="bs-node-icon"></div>';
        html += '<div class="bs-node-label" style="font-size:12px; color:#5f6368; text-transform:uppercase; letter-spacing:0.5px;">Particulars</div>';
        html += '<div class="bs-node-stats">';
        if (this.state.showDebitCredit) {
            html += '<div class="bs-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Debit</div>';
            html += '<div class="bs-node-amount" style="min-width:100px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Credit</div>';
        }
        html += '<div class="bs-node-amount" style="min-width:120px; text-align:right; font-size:12px; color:#5f6368; text-transform:uppercase;">Balance</div>';
        html += '</div></div></div>';
        return html;
    };

    BalanceSheet.prototype.renderLiabilitiesTree = function() {
        const self = this;
        const data = this.state.data.balancesheet.liabilities;
        const treeEl = this.container.querySelector('[data-tree="liabilities"]');

        let html = this.buildTreeHeader();

        if (data.children && data.children.length > 0) {
            data.children.forEach(function(child) {
                html += self.buildTreeNode(child, 0, 'liabilities');
            });
        }

        treeEl.innerHTML = html;
    };

    BalanceSheet.prototype.renderAssetsTree = function() {
        const self = this;
        const data = this.state.data.balancesheet.assets;
        const treeEl = this.container.querySelector('[data-tree="assets"]');

        let html = this.buildTreeHeader();

        if (data.children && data.children.length > 0) {
            data.children.forEach(function(child) {
                html += self.buildTreeNode(child, 0, 'assets');
            });
        }

        treeEl.innerHTML = html;
    };

    BalanceSheet.prototype.toggleNode = function(nodeId) {
        if (this.state.expandedNodes.has(nodeId)) {
            this.state.expandedNodes.delete(nodeId);
        } else {
            this.state.expandedNodes.add(nodeId);
        }
        this.renderTreeViews();
    };

    BalanceSheet.prototype.expandAll = function() {
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
            const data = this.state.data.balancesheet;
            addAllIds(data.liabilities);
            addAllIds(data.assets);
        }

        this.renderTreeViews();
    };

    BalanceSheet.prototype.collapseAll = function() {
        this.state.expandedNodes.clear();
        this.renderTreeViews();
    };

    BalanceSheet.prototype.toggleDebitCredit = function() {
        this.state.showDebitCredit = !this.state.showDebitCredit;

        const btn = this.container.querySelector('[data-action="toggle-debit-credit"]');
        if (this.state.showDebitCredit) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }

        this.renderTreeViews();
    };

    BalanceSheet.prototype.createCharts = function() {
        if (typeof echarts === 'undefined') return;

        this.createLiabilitiesChart();
        this.createAssetsChart();
    };

    BalanceSheet.prototype.prepareHierarchicalData = function(node, limit, sectionType) {
        const self = this;
        limit = limit || 9;

        if (!node || !node.children) return [];

        // Determine if this is liabilities (credit - debit) or assets (debit - credit)
        const isLiabilities = sectionType === 'liabilities';

        const childrenWithTotals = node.children.map(function(child) {
            const totals = self.calculateNodeTotals(child);
            // For liabilities: credit - debit
            // For assets: debit - credit
            const balance = isLiabilities ? (totals.credit - totals.debit) : (totals.debit - totals.credit);
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
                    const grandChildBalance = isLiabilities ?
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

    BalanceSheet.prototype.createLiabilitiesChart = function() {
        const self = this;
        const liabilitiesEl = this.container.querySelector('[data-chart="liabilities"]');
        if (!liabilitiesEl) return;

        if (this.state.liabilitiesChart) {
            this.state.liabilitiesChart.dispose();
        }

        this.state.liabilitiesChart = echarts.init(liabilitiesEl);

        const hierarchicalData = this.prepareHierarchicalData(this.state.data.balancesheet.liabilities, 9, 'liabilities');

        // Calculate total for percentage
        const total = hierarchicalData.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.liabilitiesChart.setOption({
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
            if (self.state.liabilitiesChart) self.state.liabilitiesChart.resize();
        });
    };

    BalanceSheet.prototype.createAssetsChart = function() {
        const self = this;
        const assetsEl = this.container.querySelector('[data-chart="assets"]');
        if (!assetsEl) return;

        if (this.state.assetsChart) {
            this.state.assetsChart.dispose();
        }

        this.state.assetsChart = echarts.init(assetsEl);

        const hierarchicalData = this.prepareHierarchicalData(this.state.data.balancesheet.assets, 9, 'assets');

        // Calculate total for percentage
        const total = hierarchicalData.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.assetsChart.setOption({
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
            if (self.state.assetsChart) self.state.assetsChart.resize();
        });
    };

    BalanceSheet.prototype.formatCurrency = function(amount) {
        return '₹' + amount.toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    };

    BalanceSheet.prototype.formatDate = function(dateString) {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return date.toLocaleDateString('en-IN', options);
    };

    BalanceSheet.prototype.openFullscreen = function(chartType) {
        const self = this;
        const modal = this.container.querySelector('[data-modal="' + chartType + '"]');
        if (!modal) return;

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Create fullscreen chart
        setTimeout(function() {
            if (chartType === 'liabilities') {
                self.createLiabilitiesFullscreenChart();
            } else if (chartType === 'assets') {
                self.createAssetsFullscreenChart();
            }
        }, 100);
    };

    BalanceSheet.prototype.closeFullscreen = function(chartType) {
        const modal = this.container.querySelector('[data-modal="' + chartType + '"]');
        if (!modal) return;

        modal.classList.remove('active');
        document.body.style.overflow = '';

        // Dispose fullscreen chart
        if (chartType === 'liabilities' && this.state.liabilitiesFullscreenChart) {
            this.state.liabilitiesFullscreenChart.dispose();
            this.state.liabilitiesFullscreenChart = null;
        } else if (chartType === 'assets' && this.state.assetsFullscreenChart) {
            this.state.assetsFullscreenChart.dispose();
            this.state.assetsFullscreenChart = null;
        }
    };

    BalanceSheet.prototype.createLiabilitiesFullscreenChart = function() {
        const self = this;
        const chartEl = this.container.querySelector('[data-chart="liabilities-fullscreen"]');
        if (!chartEl || typeof echarts === 'undefined') return;

        if (this.state.liabilitiesFullscreenChart) {
            this.state.liabilitiesFullscreenChart.dispose();
        }

        this.state.liabilitiesFullscreenChart = echarts.init(chartEl);

        const hierarchicalData = this.prepareHierarchicalData(this.state.data.balancesheet.liabilities, 9, 'liabilities');

        const total = hierarchicalData.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.liabilitiesFullscreenChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = total > 0 ? ((params.value / total) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['15%', '90%'],
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
                    r0: '15%',
                    r: '50%',
                    label: { rotate: 0, fontSize: 13, fontWeight: 500 },
                    itemStyle: { borderWidth: 2 }
                }, {
                    r0: '50%',
                    r: '90%',
                    label: { fontSize: 11, fontWeight: 400 },
                    itemStyle: { borderWidth: 2 }
                }]
            }]
        });

        window.addEventListener('resize', function() {
            if (self.state.liabilitiesFullscreenChart) self.state.liabilitiesFullscreenChart.resize();
        });
    };

    BalanceSheet.prototype.createAssetsFullscreenChart = function() {
        const self = this;
        const chartEl = this.container.querySelector('[data-chart="assets-fullscreen"]');
        if (!chartEl || typeof echarts === 'undefined') return;

        if (this.state.assetsFullscreenChart) {
            this.state.assetsFullscreenChart.dispose();
        }

        this.state.assetsFullscreenChart = echarts.init(chartEl);

        const hierarchicalData = this.prepareHierarchicalData(this.state.data.balancesheet.assets, 9, 'assets');

        const total = hierarchicalData.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.assetsFullscreenChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = total > 0 ? ((params.value / total) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['15%', '90%'],
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
                    r0: '15%',
                    r: '50%',
                    label: { rotate: 0, fontSize: 13, fontWeight: 500 },
                    itemStyle: { borderWidth: 2 }
                }, {
                    r0: '50%',
                    r: '90%',
                    label: { fontSize: 11, fontWeight: 400 },
                    itemStyle: { borderWidth: 2 }
                }]
            }]
        });

        window.addEventListener('resize', function() {
            if (self.state.assetsFullscreenChart) self.state.assetsFullscreenChart.resize();
        });
    };

    // Export to global scope
    global.BalanceSheet = BalanceSheet;

})(typeof window !== 'undefined' ? window : this);
