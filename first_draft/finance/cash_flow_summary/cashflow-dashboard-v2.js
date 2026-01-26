/**
 * Cash Flow Dashboard Plugin
 * Framework-agnostic plugin for displaying hierarchical cash flow data
 * Version: 1.0.0
 * 
 * Dependencies: cashflow-dashboard.css
 * 
 * Usage:
 * const dashboard = new CashFlowDashboard('container-id', {
 *     data: jsonData,
 *     numberFormat: 'short',
 *     showProgressBarsOnMobile: false
 * });
 */

(function(global) {
    'use strict';

    const CashFlowDashboard = function(containerId, options) {
        this.containerId = containerId;
        this.container = document.getElementById(containerId);
        
        if (!this.container) {
            throw new Error(`Container with id "${containerId}" not found`);
        }
        
        this.options = Object.assign({
            data: null,
            numberFormat: 'short',
            showProgressBarsOnMobile: false,
            onGroupClick: null,    // Callback when a group is clicked
            onLedgerClick: null    // Callback when a ledger is clicked
        }, options);
        
        this.state = {
            expandedNodes: new Set(),
            inflowChart: null,
            outflowChart: null,
            inflowFullscreenChart: null,
            outflowFullscreenChart: null,
            currentTab: 'outflow',
            numberFormat: this.options.numberFormat,
            data: null
        };

        this.init();
    };

    CashFlowDashboard.prototype.init = function() {
        const self = this;
        this.loadDependencies().then(function() {
            self.render();
            if (self.options.data) {
                self.loadData(self.options.data);
            }
        });
    };

    CashFlowDashboard.prototype.loadDependencies = function() {
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

    CashFlowDashboard.prototype.loadScript = function(src) {
        return new Promise(function(resolve, reject) {
            const script = document.createElement('script');
            script.src = src;
            script.onload = resolve;
            script.onerror = reject;
            document.head.appendChild(script);
        });
    };

    CashFlowDashboard.prototype.getTemplate = function() {
        return `
<div class="cashflow-dashboard ${this.options.showProgressBarsOnMobile ? 'show-mobile-bars' : ''}">
    <!-- Format Toggle Section -->
    <div class="cf-format-section">
        <span class="cf-format-label">Number Format:</span>
        <div class="cf-format-toggle-group">
            <button class="cf-format-btn ${this.state.numberFormat === 'short' ? 'active' : ''}" data-format="short">
                Short (₹40.50L)
            </button>
            <button class="cf-format-btn ${this.state.numberFormat === 'full' ? 'active' : ''}" data-format="full">
                Full (₹40,49,985.91)
            </button>
        </div>
    </div>

    <!-- Metrics Grid -->
    <div class="cf-metrics-grid">
        <div class="cf-metric-card">
            <div class="cf-metric-header">
                <div class="cf-metric-label">Total Inflow</div>
                <div class="cf-metric-icon green">
                    <span class="material-symbols-rounded">trending_up</span>
                </div>
            </div>
            <div class="cf-metric-value" style="color:#34a853" data-metric="inflow">₹0</div>
        </div>
        <div class="cf-metric-card">
            <div class="cf-metric-header">
                <div class="cf-metric-label">Total Outflow</div>
                <div class="cf-metric-icon red">
                    <span class="material-symbols-rounded">trending_down</span>
                </div>
            </div>
            <div class="cf-metric-value" style="color:#ea4335" data-metric="outflow">₹0</div>
        </div>
        <div class="cf-metric-card">
            <div class="cf-metric-header">
                <div class="cf-metric-label">Net Cash Flow</div>
                <div class="cf-metric-icon blue">
                    <span class="material-symbols-rounded">account_balance_wallet</span>
                </div>
            </div>
            <div class="cf-metric-value" style="color:#4285f4" data-metric="net">₹0</div>
        </div>
    </div>

    <!-- Charts Grid -->
    <div class="cf-main-grid">
        <div class="cf-chart-card">
            <div class="cf-chart-card-header">
                <div>
                    <div class="cf-chart-title">Inflow Distribution</div>
                    <div class="cf-chart-subtitle">Hierarchical breakdown</div>
                </div>
                <button class="so-fullscreen-btn" data-fullscreen="inflow" title="View Fullscreen">
                    <span class="material-symbols-rounded">fullscreen</span>
                </button>
            </div>
            <div class="cf-chart-container" data-chart="inflow"></div>
        </div>
        <div class="cf-chart-card">
            <div class="cf-chart-card-header">
                <div>
                    <div class="cf-chart-title">Outflow Distribution</div>
                    <div class="cf-chart-subtitle">Hierarchical breakdown</div>
                </div>
                <button class="so-fullscreen-btn" data-fullscreen="outflow" title="View Fullscreen">
                    <span class="material-symbols-rounded">fullscreen</span>
                </button>
            </div>
            <div class="cf-chart-container" data-chart="outflow"></div>
        </div>

        <!-- Tree View -->
        <div class="cf-tree-card">
            <div class="cf-tree-header">
                <div class="cf-tree-title">Detailed Breakdown</div>
                <div class="cf-tree-controls">
                    <button class="cf-control-btn" data-action="expand-all">
                        <span class="material-symbols-rounded" style="font-size:16px">unfold_more</span>
                        Expand All
                    </button>
                    <button class="cf-control-btn" data-action="collapse-all">
                        <span class="material-symbols-rounded" style="font-size:16px">unfold_less</span>
                        Collapse All
                    </button>
                </div>
            </div>
            <div class="cf-tabs">
                <button class="cf-tab active" data-tab="outflow">Outflow Details</button>
                <button class="cf-tab" data-tab="inflow">Inflow Details</button>
            </div>
            <div class="cf-tab-content active" data-content="outflow">
                <div class="cf-tree-view" data-tree="outflow"></div>
            </div>
            <div class="cf-tab-content" data-content="inflow">
                <div class="cf-tree-view" data-tree="inflow"></div>
            </div>
        </div>
    </div>

    <!-- Fullscreen Modals -->
    <div class="so-fullscreen-modal" data-modal="inflow">
        <div class="so-fullscreen-content">
            <div class="so-fullscreen-header">
                <h3 class="so-fullscreen-title">Inflow Distribution</h3>
                <button class="so-fullscreen-close" data-close-modal="inflow">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="so-fullscreen-body">
                <div class="cf-chart-container" data-chart="inflow-fullscreen" style="width:100%; height:100%;"></div>
            </div>
        </div>
    </div>

    <div class="so-fullscreen-modal" data-modal="outflow">
        <div class="so-fullscreen-content">
            <div class="so-fullscreen-header">
                <h3 class="so-fullscreen-title">Outflow Distribution</h3>
                <button class="so-fullscreen-close" data-close-modal="outflow">
                    <span class="material-symbols-rounded">close</span>
                </button>
            </div>
            <div class="so-fullscreen-body">
                <div class="cf-chart-container" data-chart="outflow-fullscreen" style="width:100%; height:100%;"></div>
            </div>
        </div>
    </div>
</div>
        `;
    };

    CashFlowDashboard.prototype.render = function() {
        this.container.innerHTML = this.getTemplate();
        this.attachEventListeners();
    };

    CashFlowDashboard.prototype.attachEventListeners = function() {
        const self = this;
        const container = this.container.querySelector('.cashflow-dashboard');

        container.addEventListener('click', function(e) {
            const formatBtn = e.target.closest('[data-format]');
            if (formatBtn) {
                self.setNumberFormat(formatBtn.dataset.format);
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

            const target = e.target.closest('[data-action]');
            if (target) {
                const action = target.dataset.action;
                if (action === 'expand-all') self.expandAll();
                else if (action === 'collapse-all') self.collapseAll();
            }

            const tab = e.target.closest('[data-tab]');
            if (tab) {
                self.switchTab(tab.dataset.tab);
            }

            // Check for node click (not on toggle icon)
            const node = e.target.closest('[data-node-id]');
            if (node && !e.target.closest('.cf-node-toggle')) {
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
            if (toggleNode && e.target.closest('.cf-node-toggle')) {
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

    CashFlowDashboard.prototype.formatCurrency = function(amount) {
        if (this.state.numberFormat === 'full') {
            return '₹' + amount.toLocaleString('en-IN', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }
        
        if (amount >= 10000000) {
            return '₹' + (amount / 10000000).toFixed(2) + 'Cr';
        } else if (amount >= 100000) {
            return '₹' + (amount / 100000).toFixed(2) + 'L';
        } else if (amount >= 1000) {
            return '₹' + (amount / 1000).toFixed(2) + 'K';
        }
        return '₹' + amount.toLocaleString('en-IN');
    };

    CashFlowDashboard.prototype.calculateTotal = function(groups) {
        const self = this;
        let total = 0;
        groups.forEach(function(group) {
            total += self.calculateNodeTotal(group);
        });
        return total;
    };

    CashFlowDashboard.prototype.calculateNodeTotal = function(node) {
        const self = this;
        if (node.type === 'ledger') {
            return node.amount || 0;
        }
        if (node.children) {
            return node.children.reduce(function(sum, child) {
                return sum + self.calculateNodeTotal(child);
            }, 0);
        }
        return 0;
    };

    CashFlowDashboard.prototype.prepareHierarchicalData = function(groups, limit) {
        const self = this;
        limit = limit || 9;
        
        const sortedGroups = groups.slice().sort(function(a, b) {
            return self.calculateNodeTotal(b) - self.calculateNodeTotal(a);
        });
        
        const topGroups = sortedGroups.slice(0, limit);
        const result = [];

        topGroups.forEach(function(group) {
            const groupTotal = self.calculateNodeTotal(group);
            const item = {
                name: group.name,
                value: groupTotal,
                children: []
            };

            if (group.children) {
                group.children.forEach(function(child) {
                    const childTotal = self.calculateNodeTotal(child);
                    item.children.push({
                        name: child.name,
                        value: childTotal
                    });
                });
            }

            result.push(item);
        });

        if (sortedGroups.length > limit) {
            const othersGroups = sortedGroups.slice(limit);
            const othersTotal = othersGroups.reduce(function(sum, g) {
                return sum + self.calculateNodeTotal(g);
            }, 0);
            result.push({
                name: 'Others',
                value: othersTotal,
                children: []
            });
        }

        return result;
    };

    CashFlowDashboard.prototype.getNodeIcon = function(node, level) {
        if (level === 0) return 'analytics';
        if (node.type === 'group') return 'category';
        return 'receipt_long';
    };

    CashFlowDashboard.prototype.buildTreeNode = function(node, level, total, parentPath) {
        const self = this;
        level = level || 0;
        parentPath = parentPath || [];
        
        const nodeTotal = this.calculateNodeTotal(node);
        const percentage = ((nodeTotal / total) * 100).toFixed(1);
        const isExpanded = this.state.expandedNodes.has(node.id);
        const hasChildren = node.type === 'group' && node.children && node.children.length > 0;
        const indent = level * 24;

        let html = '<div class="cf-tree-node level-' + level + '">';
        html += '<div class="cf-node-content" data-node-id="' + node.id + '" data-node-type="' + node.type + '" data-node-name="' + node.name + '">';
        html += '<span class="cf-node-indent" style="width:' + indent + 'px"></span>';
        
        html += '<div class="cf-node-toggle' + (isExpanded ? ' expanded' : '') + '">';
        if (hasChildren) {
            html += '<span class="material-symbols-rounded" style="font-size:16px">chevron_right</span>';
        }
        html += '</div>';
        
        const iconName = this.getNodeIcon(node, level);
        html += '<div class="cf-node-icon ' + node.type + ' level-' + level + '">';
        html += '<span class="material-symbols-rounded">' + iconName + '</span>';
        html += '</div>';
        
        html += '<div class="cf-node-label ' + node.type + ' level-' + level + '">' + node.name + '</div>';
        html += '<div class="cf-node-stats">';
        html += '<div class="cf-node-amount">' + this.formatCurrency(nodeTotal) + '</div>';
        
        html += '<div class="cf-percentage-bar-container">';
        html += '<div class="cf-percentage-bar-track">';
        html += '<div class="cf-percentage-bar-fill ' + this.state.currentTab + '" style="width:' + percentage + '%"></div>';
        html += '</div>';
        html += '</div>';
        
        html += '<div class="cf-node-percentage">' + percentage + '%</div>';
        html += '</div>';
        html += '</div>';

        if (hasChildren) {
            html += '<div class="cf-node-children' + (isExpanded ? ' expanded' : '') + '">';
            node.children.forEach(function(child) {
                html += self.buildTreeNode(child, level + 1, total, parentPath.concat([node.id]));
            });
            html += '</div>';
        }

        html += '</div>';
        return html;
    };

    CashFlowDashboard.prototype.renderTree = function(type) {
        const self = this;
        this.state.currentTab = type;
        const groups = this.state.data.cashflow[type].groups;
        const total = this.calculateTotal(groups);
        const treeEl = this.container.querySelector('[data-tree="' + type + '"]');
        
        let html = '';
        groups.forEach(function(group) {
            html += self.buildTreeNode(group, 0, total);
        });
        
        treeEl.innerHTML = html;
    };

    CashFlowDashboard.prototype.toggleNode = function(nodeId) {
        if (this.state.expandedNodes.has(nodeId)) {
            this.state.expandedNodes.delete(nodeId);
        } else {
            this.state.expandedNodes.add(nodeId);
        }
        this.renderTree('inflow');
        this.renderTree('outflow');
    };

    CashFlowDashboard.prototype.expandAll = function() {
        const self = this;
        function addAllIds(groups) {
            groups.forEach(function(node) {
                if (node.type === 'group') {
                    self.state.expandedNodes.add(node.id);
                    if (node.children) {
                        addAllIds(node.children);
                    }
                }
            });
        }
        addAllIds(this.state.data.cashflow.inflow.groups);
        addAllIds(this.state.data.cashflow.outflow.groups);
        this.renderTree('inflow');
        this.renderTree('outflow');
    };

    CashFlowDashboard.prototype.collapseAll = function() {
        this.state.expandedNodes.clear();
        this.renderTree('inflow');
        this.renderTree('outflow');
    };

    CashFlowDashboard.prototype.switchTab = function(type) {
        this.state.currentTab = type;
        const tabs = this.container.querySelectorAll('.cf-tab');
        const contents = this.container.querySelectorAll('.cf-tab-content');
        
        tabs.forEach(function(tab) {
            tab.classList.toggle('active', tab.dataset.tab === type);
        });
        
        contents.forEach(function(content) {
            content.classList.toggle('active', content.dataset.content === type);
        });
    };

    CashFlowDashboard.prototype.updateCounters = function() {
        const inflowTotal = this.calculateTotal(this.state.data.cashflow.inflow.groups);
        const outflowTotal = this.calculateTotal(this.state.data.cashflow.outflow.groups);
        const netFlow = inflowTotal - outflowTotal;

        this.container.querySelector('[data-metric="inflow"]').textContent = this.formatCurrency(inflowTotal);
        this.container.querySelector('[data-metric="outflow"]').textContent = this.formatCurrency(outflowTotal);
        this.container.querySelector('[data-metric="net"]').textContent = this.formatCurrency(netFlow);
        this.container.querySelector('[data-metric="net"]').style.color = netFlow >= 0 ? '#34a853' : '#ea4335';
    };

    CashFlowDashboard.prototype.createCharts = function() {
        const self = this;

        const inflowHierarchical = this.prepareHierarchicalData(this.state.data.cashflow.inflow.groups);
        const inflowEl = this.container.querySelector('[data-chart="inflow"]');

        if (this.state.inflowChart) this.state.inflowChart.dispose();
        this.state.inflowChart = echarts.init(inflowEl);

        // Calculate total for percentage
        const inflowTotal = inflowHierarchical.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.inflowChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = inflowTotal > 0 ? ((params.value / inflowTotal) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['20%', '85%'],
                center: ['50%', '50%'],
                data: inflowHierarchical,
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

        const outflowHierarchical = this.prepareHierarchicalData(this.state.data.cashflow.outflow.groups);
        const outflowEl = this.container.querySelector('[data-chart="outflow"]');

        if (this.state.outflowChart) this.state.outflowChart.dispose();
        this.state.outflowChart = echarts.init(outflowEl);

        // Calculate total for percentage
        const outflowTotal = outflowHierarchical.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.outflowChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = outflowTotal > 0 ? ((params.value / outflowTotal) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['20%', '85%'],
                center: ['50%', '50%'],
                data: outflowHierarchical,
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
            if (self.state.inflowChart) self.state.inflowChart.resize();
            if (self.state.outflowChart) self.state.outflowChart.resize();
        });
    };

    CashFlowDashboard.prototype.setNumberFormat = function(format) {
        if (format !== 'short' && format !== 'full') {
            throw new Error('Number format must be "short" or "full"');
        }
        this.state.numberFormat = format;
        
        // Update button states
        const buttons = this.container.querySelectorAll('[data-format]');
        buttons.forEach(function(btn) {
            btn.classList.toggle('active', btn.dataset.format === format);
        });
        
        if (this.state.data) {
            this.updateCounters();
            this.renderTree('inflow');
            this.renderTree('outflow');
        }
    };

    CashFlowDashboard.prototype.loadData = function(jsonData) {
        try {
            this.state.data = typeof jsonData === 'string' ? JSON.parse(jsonData) : jsonData;
            this.state.expandedNodes.clear();
            
            this.updateCounters();
            this.createCharts();
            this.renderTree('inflow');
            this.renderTree('outflow');
        } catch (error) {
            console.error('Error loading data:', error);
            throw new Error('Invalid JSON data provided');
        }
    };

    // Fullscreen Methods
    CashFlowDashboard.prototype.openFullscreen = function(chartType) {
        const self = this;
        const modal = this.container.querySelector('[data-modal="' + chartType + '"]');
        if (!modal) return;

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';

        setTimeout(function() {
            if (chartType === 'inflow') {
                self.createInflowFullscreenChart();
            } else if (chartType === 'outflow') {
                self.createOutflowFullscreenChart();
            }
        }, 100);
    };

    CashFlowDashboard.prototype.closeFullscreen = function(chartType) {
        const modal = this.container.querySelector('[data-modal="' + chartType + '"]');
        if (!modal) return;

        modal.classList.remove('active');
        document.body.style.overflow = '';

        if (chartType === 'inflow' && this.state.inflowFullscreenChart) {
            this.state.inflowFullscreenChart.dispose();
            this.state.inflowFullscreenChart = null;
        } else if (chartType === 'outflow' && this.state.outflowFullscreenChart) {
            this.state.outflowFullscreenChart.dispose();
            this.state.outflowFullscreenChart = null;
        }
    };

    CashFlowDashboard.prototype.createInflowFullscreenChart = function() {
        const self = this;
        const inflowEl = this.container.querySelector('[data-chart="inflow-fullscreen"]');
        if (!inflowEl) return;

        if (this.state.inflowFullscreenChart) {
            this.state.inflowFullscreenChart.dispose();
        }

        this.state.inflowFullscreenChart = echarts.init(inflowEl);

        const inflowHierarchical = this.prepareHierarchicalData(this.state.data.cashflow.inflow.groups);
        const inflowTotal = inflowHierarchical.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.inflowFullscreenChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = inflowTotal > 0 ? ((params.value / inflowTotal) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['20%', '85%'],
                center: ['50%', '50%'],
                data: inflowHierarchical,
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

    CashFlowDashboard.prototype.createOutflowFullscreenChart = function() {
        const self = this;
        const outflowEl = this.container.querySelector('[data-chart="outflow-fullscreen"]');
        if (!outflowEl) return;

        if (this.state.outflowFullscreenChart) {
            this.state.outflowFullscreenChart.dispose();
        }

        this.state.outflowFullscreenChart = echarts.init(outflowEl);

        const outflowHierarchical = this.prepareHierarchicalData(this.state.data.cashflow.outflow.groups);
        const outflowTotal = outflowHierarchical.reduce(function(sum, item) {
            return sum + item.value;
        }, 0);

        this.state.outflowFullscreenChart.setOption({
            tooltip: {
                trigger: 'item',
                formatter: function(params) {
                    const percentage = outflowTotal > 0 ? ((params.value / outflowTotal) * 100).toFixed(1) + '%' : '0%';
                    return params.name + '<br/>' + self.formatCurrency(params.value) + ' (' + percentage + ')';
                }
            },
            series: [{
                type: 'sunburst',
                radius: ['20%', '85%'],
                center: ['50%', '50%'],
                data: outflowHierarchical,
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

    if (typeof module !== 'undefined' && module.exports) {
        module.exports = CashFlowDashboard;
    } else {
        global.CashFlowDashboard = CashFlowDashboard;
    }

})(typeof window !== 'undefined' ? window : this);
