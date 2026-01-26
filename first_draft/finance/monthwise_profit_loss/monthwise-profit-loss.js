/**
 * Profit & Loss Report Plugin
 * Framework-agnostic plugin for displaying Outlet/Monthly Profit & Loss
 * Version: 1.0.0
 *
 * Dependencies: profit-loss.css, sixorbit-common.css
 *
 * Usage:
 * const profitLoss = new ProfitLoss('container-id', {
 *     data: profitLossData,
 *     onGroupClick: function(groupData) { }
 * });
 */

(function(global) {
    'use strict';

    const ProfitLoss = function(containerId, options) {
        this.containerId = containerId;
        this.container = document.getElementById(containerId);

        if (!this.container) {
            throw new Error(`Container with id "${containerId}" not found`);
        }

        this.options = Object.assign({
            data: null,
            onGroupClick: null,
            firstColumnLabel: null  // Custom label for first column (e.g., "Outlet", "Month", "Period")
        }, options);

        this.state = {
            data: null,
            chartInstance: null
        };

        this.init();
    };

    ProfitLoss.prototype.init = function() {
        const self = this;
        this.loadDependencies().then(function() {
            self.render();
            if (self.options.data) {
                self.loadData(self.options.data);
            }
        });
    };

    ProfitLoss.prototype.loadDependencies = function() {
        const promises = [];

        // Load Google Fonts
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

        // Load ECharts if not already loaded
        if (typeof echarts === 'undefined') {
            const script = document.createElement('script');
            script.src = 'https://cdn.jsdelivr.net/npm/echarts@5.4.3/dist/echarts.min.js';
            const loadPromise = new Promise(function(resolve) {
                script.onload = resolve;
            });
            document.head.appendChild(script);
            promises.push(loadPromise);
        }

        return Promise.all(promises);
    };

    ProfitLoss.prototype.getTemplate = function() {
        return `
<div class="pl-statement">
    <!-- Header Section -->
    <div class="pl-header">
        <div class="pl-company-info">
            <h1 class="pl-company-name" data-company>Company Name</h1>
            <h2 class="pl-report-title">Profit & Loss Statement</h2>
            <div class="pl-period" data-period>Period</div>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="pl-chart-card">
        <div class="pl-chart-header">
            <div class="pl-chart-title">Profit & Loss Analysis</div>
        </div>
        <div class="pl-chart-container" id="pl-chart-${this.containerId}" style="width:100%; height:400px;"></div>
    </div>

    <!-- Table Section -->
    <div class="pl-table-card">
        <div class="pl-table-wrapper" data-table="profit-loss"></div>
    </div>
</div>
`;
    };

    ProfitLoss.prototype.render = function() {
        this.container.innerHTML = this.getTemplate();
        this.attachEventListeners();
    };

    ProfitLoss.prototype.attachEventListeners = function() {
        const self = this;
        const container = this.container.querySelector('.pl-statement');

        // Handle group clicks
        container.addEventListener('click', function(e) {
            const groupCell = e.target.closest('[data-group]');
            if (groupCell && self.options.onGroupClick) {
                const groupName = groupCell.dataset.group;
                const rowId = groupCell.closest('tr').dataset.rowId;
                const columnType = groupCell.dataset.columnType;

                self.options.onGroupClick({
                    rowId: rowId,
                    groupName: groupName,
                    columnType: columnType
                });
            }
        });
    };

    ProfitLoss.prototype.loadData = function(data) {
        this.state.data = data;
        this.updateUI();
    };

    ProfitLoss.prototype.updateUI = function() {
        if (!this.state.data) return;

        // Update header
        this.container.querySelector('[data-company]').textContent = this.state.data.company;
        this.container.querySelector('[data-period]').textContent =
            `For the period ${this.formatDate(this.state.data.period.start)} to ${this.formatDate(this.state.data.period.end)}`;

        // Render table
        this.renderTable();

        // Render chart
        this.renderChart();
    };

    ProfitLoss.prototype.renderTable = function() {
        const data = this.state.data.profitLoss;
        const tableEl = this.container.querySelector('[data-table="profit-loss"]');

        let html = '<div class="pl-table-scroll"><table class="pl-table">';

        // Table Header
        html += '<thead><tr>';
        // Use custom label if provided, otherwise fallback to viewType-based label
        const firstColumnLabel = this.options.firstColumnLabel ||
                                (this.state.data.viewType === 'monthly' ? 'Month' : 'Outlet');
        html += '<th class="pl-sticky-col">' + firstColumnLabel + '</th>';
        html += '<th colspan="4" class="pl-group-header">Trade Expenses</th>';
        html += '<th colspan="4" class="pl-group-header">Trade Income</th>';
        html += '<th colspan="2" class="pl-group-header">Gross Profit</th>';
        html += '<th colspan="5" class="pl-group-header">Indirect Expenses</th>';
        html += '<th colspan="2" class="pl-group-header">Indirect Income</th>';
        html += '<th colspan="2" class="pl-group-header">Net Profit</th>';
        html += '</tr>';

        html += '<tr class="pl-sub-header">';
        html += '<th class="pl-sticky-col"></th>';
        // Trade Expenses
        html += '<th>Opening Stock</th>';
        html += '<th>Direct Expenses</th>';
        html += '<th>Purchases</th>';
        html += '<th>Total</th>';
        // Trade Income
        html += '<th>Sales</th>';
        html += '<th>Direct Income</th>';
        html += '<th>Closing Stock</th>';
        html += '<th>Total</th>';
        // Gross Profit
        html += '<th>Amount</th>';
        html += '<th>%</th>';
        // Indirect Expenses
        html += '<th>Personnel</th>';
        html += '<th>Administrative</th>';
        html += '<th>Selling</th>';
        html += '<th>Other</th>';
        html += '<th>Total</th>';
        // Indirect Income
        html += '<th>Other Income</th>';
        html += '<th>Total</th>';
        // Net Profit
        html += '<th>Amount</th>';
        html += '<th>%</th>';
        html += '</tr></thead>';

        // Table Body
        html += '<tbody>';
        const self = this;
        data.forEach(function(row) {
            html += '<tr data-row-id="' + row.id + '">';
            html += '<td class="pl-sticky-col pl-row-name">' + row.name + '</td>';

            // Trade Expenses
            html += '<td class="pl-clickable pl-section-start" data-group="Opening Stock" data-column-type="tradeExpenses" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.tradeExpenses.openingStock.value) + '</td>';
            html += '<td class="pl-clickable" data-group="Direct Expenses" data-column-type="tradeExpenses" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.tradeExpenses.directExpenses.value) + '</td>';
            html += '<td class="pl-clickable" data-group="Purchases" data-column-type="tradeExpenses" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.tradeExpenses.purchases.value) + '</td>';
            html += '<td class="pl-total">' + self.formatCurrency(row.tradeExpenses.total) + '</td>';

            // Trade Income
            html += '<td class="pl-clickable pl-section-start" data-group="Sales" data-column-type="tradeIncome" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.tradeIncome.sales.value) + '</td>';
            html += '<td class="pl-clickable" data-group="Direct Income" data-column-type="tradeIncome" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.tradeIncome.directIncome.value) + '</td>';
            html += '<td class="pl-clickable" data-group="Closing Stock" data-column-type="tradeIncome" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.tradeIncome.closingStock.value) + '</td>';
            html += '<td class="pl-total">' + self.formatCurrency(row.tradeIncome.total) + '</td>';

            // Gross Profit
            const gpClass = row.grossProfit >= 0 ? 'pl-profit' : 'pl-loss';
            html += '<td class="' + gpClass + ' pl-section-start">' + self.formatCurrency(row.grossProfit) + '</td>';
            html += '<td class="' + gpClass + '">' + row.grossProfitPercent.toFixed(2) + '%</td>';

            // Indirect Expenses
            html += '<td class="pl-clickable pl-section-start" data-group="Personnel" data-column-type="indirectExpenses" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.indirectExpenses.personnel.value) + '</td>';
            html += '<td class="pl-clickable" data-group="Administrative" data-column-type="indirectExpenses" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.indirectExpenses.administrative.value) + '</td>';
            html += '<td class="pl-clickable" data-group="Selling" data-column-type="indirectExpenses" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.indirectExpenses.selling ? row.indirectExpenses.selling.value : 0) + '</td>';
            html += '<td>-</td>';
            html += '<td class="pl-total">' + self.formatCurrency(row.indirectExpenses.total) + '</td>';

            // Indirect Income
            html += '<td class="pl-clickable pl-section-start" data-group="Other Income" data-column-type="indirectIncome" data-row-id="' + row.id + '">' +
                    self.formatCurrency(row.indirectIncome.otherIncome.value) + '</td>';
            html += '<td class="pl-total">' + self.formatCurrency(row.indirectIncome.total) + '</td>';

            // Net Profit
            const npClass = row.netProfit >= 0 ? 'pl-profit' : 'pl-loss';
            html += '<td class="' + npClass + ' pl-net-profit pl-section-start">' + self.formatCurrency(row.netProfit) + '</td>';
            html += '<td class="' + npClass + '">' + row.netProfitPercent.toFixed(2) + '%</td>';

            html += '</tr>';
        });
        html += '</tbody>';

        // Table Footer with Totals
        html += '<tfoot>';
        html += '<tr class="pl-footer-row">';
        html += '<td class="pl-sticky-col pl-footer-label">Total</td>';

        // Calculate totals for each column
        const totals = data.reduce(function(acc, row) {
            return {
                tradeExpenses_openingStock: acc.tradeExpenses_openingStock + row.tradeExpenses.openingStock.value,
                tradeExpenses_directExpenses: acc.tradeExpenses_directExpenses + row.tradeExpenses.directExpenses.value,
                tradeExpenses_purchases: acc.tradeExpenses_purchases + row.tradeExpenses.purchases.value,
                tradeExpenses_total: acc.tradeExpenses_total + row.tradeExpenses.total,
                tradeIncome_sales: acc.tradeIncome_sales + row.tradeIncome.sales.value,
                tradeIncome_directIncome: acc.tradeIncome_directIncome + row.tradeIncome.directIncome.value,
                tradeIncome_closingStock: acc.tradeIncome_closingStock + row.tradeIncome.closingStock.value,
                tradeIncome_total: acc.tradeIncome_total + row.tradeIncome.total,
                grossProfit: acc.grossProfit + row.grossProfit,
                indirectExpenses_personnel: acc.indirectExpenses_personnel + row.indirectExpenses.personnel.value,
                indirectExpenses_administrative: acc.indirectExpenses_administrative + row.indirectExpenses.administrative.value,
                indirectExpenses_selling: acc.indirectExpenses_selling + (row.indirectExpenses.selling ? row.indirectExpenses.selling.value : 0),
                indirectExpenses_total: acc.indirectExpenses_total + row.indirectExpenses.total,
                indirectIncome_otherIncome: acc.indirectIncome_otherIncome + row.indirectIncome.otherIncome.value,
                indirectIncome_total: acc.indirectIncome_total + row.indirectIncome.total,
                netProfit: acc.netProfit + row.netProfit
            };
        }, {
            tradeExpenses_openingStock: 0, tradeExpenses_directExpenses: 0, tradeExpenses_purchases: 0, tradeExpenses_total: 0,
            tradeIncome_sales: 0, tradeIncome_directIncome: 0, tradeIncome_closingStock: 0, tradeIncome_total: 0,
            grossProfit: 0, indirectExpenses_personnel: 0, indirectExpenses_administrative: 0, indirectExpenses_selling: 0,
            indirectExpenses_total: 0, indirectIncome_otherIncome: 0, indirectIncome_total: 0, netProfit: 0
        });

        // Trade Expenses
        html += '<td class="pl-section-start">' + self.formatCurrency(totals.tradeExpenses_openingStock) + '</td>';
        html += '<td>' + self.formatCurrency(totals.tradeExpenses_directExpenses) + '</td>';
        html += '<td>' + self.formatCurrency(totals.tradeExpenses_purchases) + '</td>';
        html += '<td class="pl-total">' + self.formatCurrency(totals.tradeExpenses_total) + '</td>';

        // Trade Income
        html += '<td class="pl-section-start">' + self.formatCurrency(totals.tradeIncome_sales) + '</td>';
        html += '<td>' + self.formatCurrency(totals.tradeIncome_directIncome) + '</td>';
        html += '<td>' + self.formatCurrency(totals.tradeIncome_closingStock) + '</td>';
        html += '<td class="pl-total">' + self.formatCurrency(totals.tradeIncome_total) + '</td>';

        // Gross Profit
        const totalGpClass = totals.grossProfit >= 0 ? 'pl-profit' : 'pl-loss';
        html += '<td class="' + totalGpClass + ' pl-section-start">' + self.formatCurrency(totals.grossProfit) + '</td>';
        html += '<td class="' + totalGpClass + '">-</td>';

        // Indirect Expenses
        html += '<td class="pl-section-start">' + self.formatCurrency(totals.indirectExpenses_personnel) + '</td>';
        html += '<td>' + self.formatCurrency(totals.indirectExpenses_administrative) + '</td>';
        html += '<td>' + self.formatCurrency(totals.indirectExpenses_selling) + '</td>';
        html += '<td>-</td>';
        html += '<td class="pl-total">' + self.formatCurrency(totals.indirectExpenses_total) + '</td>';

        // Indirect Income
        html += '<td class="pl-section-start">' + self.formatCurrency(totals.indirectIncome_otherIncome) + '</td>';
        html += '<td class="pl-total">' + self.formatCurrency(totals.indirectIncome_total) + '</td>';

        // Net Profit
        const totalNpClass = totals.netProfit >= 0 ? 'pl-profit' : 'pl-loss';
        html += '<td class="' + totalNpClass + ' pl-net-profit pl-section-start">' + self.formatCurrency(totals.netProfit) + '</td>';
        html += '<td class="' + totalNpClass + '">-</td>';

        html += '</tr>';
        html += '</tfoot>';

        html += '</table></div>';
        tableEl.innerHTML = html;
    };

    ProfitLoss.prototype.renderChart = function() {
        const chartEl = this.container.querySelector('#pl-chart-' + this.containerId);
        if (!chartEl || typeof echarts === 'undefined') return;

        // Dispose existing chart
        if (this.state.chartInstance) {
            this.state.chartInstance.dispose();
        }

        const data = this.state.data.profitLoss;
        const categories = data.map(function(item) { return item.name; });
        const grossProfit = data.map(function(item) { return item.grossProfit; });
        const netProfit = data.map(function(item) { return item.netProfit; });
        const tradeExpenses = data.map(function(item) { return item.tradeExpenses.total; });
        const tradeIncome = data.map(function(item) { return item.tradeIncome.total; });
        const indirectExpenses = data.map(function(item) { return item.indirectExpenses.total; });
        const indirectIncome = data.map(function(item) { return item.indirectIncome.total; });

        this.state.chartInstance = echarts.init(chartEl);

        const option = {
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'shadow'
                },
                formatter: function(params) {
                    let result = params[0].name + '<br/>';
                    params.forEach(function(item) {
                        const value = item.value >= 0 ?
                            '₹' + item.value.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) :
                            '-₹' + Math.abs(item.value).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                        result += item.marker + ' ' + item.seriesName + ': ' + value + '<br/>';
                    });
                    return result;
                }
            },
            legend: {
                data: ['Trade Income', 'Trade Expenses', 'Indirect Expenses', 'Indirect Income', 'Gross Profit', 'Net Profit'],
                bottom: 10,
                left: 'center'
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '15%',
                top: '5%',
                containLabel: true
            },
            xAxis: {
                type: 'category',
                data: categories,
                axisLabel: {
                    interval: 0,
                    rotate: -90,
                    fontSize: 11,
                    align: 'left',
                    verticalAlign: 'middle',
                    margin: 30
                }
            },
            yAxis: {
                type: 'value',
                axisLabel: {
                    formatter: function(value) {
                        if (value >= 10000000) return '₹' + (value / 10000000).toFixed(0) + 'Cr';
                        if (value >= 100000) return '₹' + (value / 100000).toFixed(0) + 'L';
                        return '₹' + (value / 1000).toFixed(0) + 'K';
                    }
                }
            },
            series: [
                {
                    name: 'Trade Income',
                    type: 'bar',
                    stack: 'total',
                    data: tradeIncome,
                    itemStyle: { color: '#5470C6' },
                    label: {
                        show: true,
                        position: 'inside',
                        rotate: -90,
                        align: 'left',
                        verticalAlign: 'middle',
                        formatter: function(params) {
                            return params.value > 0 ? (params.value / 10000000).toFixed(0) : '';
                        },
                        fontSize: 11,
                        color: '#fff'
                    }
                },
                {
                    name: 'Trade Expenses',
                    type: 'bar',
                    stack: 'total',
                    data: tradeExpenses,
                    itemStyle: { color: '#91CC75' },
                    label: {
                        show: true,
                        position: 'inside',
                        rotate: -90,
                        align: 'left',
                        verticalAlign: 'middle',
                        formatter: function(params) {
                            return params.value > 0 ? (params.value / 10000000).toFixed(0) : '';
                        },
                        fontSize: 11,
                        color: '#fff'
                    }
                },
                {
                    name: 'Indirect Expenses',
                    type: 'bar',
                    stack: 'total',
                    data: indirectExpenses,
                    itemStyle: { color: '#FAC858' },
                    label: {
                        show: true,
                        position: 'inside',
                        rotate: -90,
                        align: 'left',
                        verticalAlign: 'middle',
                        formatter: function(params) {
                            return params.value > 0 ? (params.value / 10000000).toFixed(0) : '';
                        },
                        fontSize: 11,
                        color: '#fff'
                    }
                },
                {
                    name: 'Indirect Income',
                    type: 'bar',
                    stack: 'total',
                    data: indirectIncome,
                    itemStyle: { color: '#73C0DE' },
                    label: {
                        show: true,
                        position: 'inside',
                        rotate: -90,
                        align: 'left',
                        verticalAlign: 'middle',
                        formatter: function(params) {
                            return params.value > 0 ? (params.value / 10000000).toFixed(0) : '';
                        },
                        fontSize: 11,
                        color: '#fff'
                    }
                },
                {
                    name: 'Gross Profit',
                    type: 'bar',
                    stack: 'total',
                    data: grossProfit,
                    itemStyle: { color: '#EE6666' },
                    label: {
                        show: true,
                        position: 'inside',
                        rotate: -90,
                        align: 'left',
                        verticalAlign: 'middle',
                        formatter: function(params) {
                            return params.value > 0 ? (params.value / 10000000).toFixed(0) : '';
                        },
                        fontSize: 11,
                        color: '#fff'
                    }
                },
                {
                    name: 'Net Profit',
                    type: 'bar',
                    stack: 'total',
                    data: netProfit,
                    itemStyle: { color: '#9A60B4' },
                    label: {
                        show: true,
                        position: 'inside',
                        rotate: -90,
                        align: 'left',
                        verticalAlign: 'middle',
                        formatter: function(params) {
                            return params.value > 0 ? (params.value / 10000000).toFixed(0) : '';
                        },
                        fontSize: 11,
                        color: '#fff'
                    }
                }
            ]
        };

        this.state.chartInstance.setOption(option);

        // Handle window resize
        const self = this;
        window.addEventListener('resize', function() {
            if (self.state.chartInstance) {
                self.state.chartInstance.resize();
            }
        });
    };

    ProfitLoss.prototype.formatCurrency = function(amount) {
        if (amount === 0) return '-';
        const absAmount = Math.abs(amount);
        const formatted = '₹' + absAmount.toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        return amount < 0 ? '(' + formatted + ')' : formatted;
    };

    ProfitLoss.prototype.formatDate = function(dateString) {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return date.toLocaleDateString('en-IN', options);
    };

    // Export to global scope
    if (typeof module !== 'undefined' && module.exports) {
        module.exports = ProfitLoss;
    } else {
        global.ProfitLoss = ProfitLoss;
    }

})(this);
