/**
 * Attendance Manager Plugin
 * Version: 1.0.0
 * Framework-agnostic attendance management UI component
 * 
 * @author Your Name
 * @license MIT
 */

(function (global) {
    'use strict';

    class AttendanceManager {
        constructor(container, options = {}) {
            this.container = typeof container === 'string' 
                ? document.querySelector(container) 
                : container;
            
            if (!this.container) {
                throw new Error('Container element not found');
            }

            // Configuration
            this.config = {
                dataUrl: options.dataUrl || null,
                data: options.data || null,
                workTiming: options.workTiming || {
                    startTime: "10:00",
                    endTime: "19:00",
                    requiredHours: 9
                },
                dateFormat: options.dateFormat || 'yyyy-mm-dd',
                onCellClick: options.onCellClick || null,
                autoLoad: options.autoLoad !== false
            };

            // Data storage
            this.employees = [];
            this.filteredEmployees = [];
            this.dateRange = [];
            this.departments = [];

            // Initialize
            this.init();
        }

        /**
         * Initialize the plugin
         */
        init() {
            this.container.classList.add('attendance-manager');
            this.render();
            
            if (this.config.autoLoad) {
                if (this.config.data) {
                    this.loadData(this.config.data);
                } else if (this.config.dataUrl) {
                    this.fetchData(this.config.dataUrl);
                }
            }
        }

        /**
         * Render the initial HTML structure
         */
        render() {
            this.container.innerHTML = `
                <div class="am-stats-bar" id="amStatsBar"></div>
                <div class="am-filters-bar">
                    <div class="am-filter-group">
                        <span class="am-filter-label">Department:</span>
                        <div class="am-input-wrapper">
                            <select class="am-select" id="amDepartmentFilter">
                                <option value="">All Departments</option>
                            </select>
                        </div>
                    </div>
                    <div class="am-filter-group">
                        <span class="am-filter-label">Employee:</span>
                        <div class="am-search-wrapper">
                            <span class="material-icons am-search-icon">search</span>
                            <input type="text" class="am-input am-search-input" id="amSearchInput" placeholder="Search by name or ID...">
                        </div>
                    </div>
                </div>
                <div class="am-table-card">
                    <div class="am-table-header">
                        <h2 class="am-table-title">Attendance Records</h2>
                        <div class="am-legend">
                            <div class="am-legend-item">
                                <div class="am-legend-icon" style="background-color: #e6f4ea;"></div>
                                <span>Present</span>
                            </div>
                            <div class="am-legend-item">
                                <div class="am-legend-icon" style="background-color: #fce8e6;"></div>
                                <span>Absent</span>
                            </div>
                            <div class="am-legend-item">
                                <div class="am-legend-icon" style="background-color: #e8f0fe;"></div>
                                <span>On Leave</span>
                            </div>
                            <div class="am-legend-item">
                                <div class="am-legend-icon" style="background-color: #fef7e0;"></div>
                                <span>Weekend</span>
                            </div>
                            <div class="am-legend-divider"></div>
                            <div class="am-legend-item">
                                <div class="am-legend-icon" style="background-color: #fef7e0; border: 1.5px solid #f9ab00;"></div>
                                <span>Late</span>
                            </div>
                            <div class="am-legend-item">
                                <div class="am-legend-icon" style="background-color: #fce8e6; border: 1.5px solid #ea4335;"></div>
                                <span>Short Hrs</span>
                            </div>
                            <div class="am-legend-divider"></div>
                            <div class="am-legend-item">
                                <span class="material-icons" style="font-size: 14px; color: #e37400;">fingerprint</span>
                                <span>Biometric</span>
                            </div>
                            <div class="am-legend-item">
                                <span class="material-icons" style="font-size: 14px; color: #137333;">smartphone</span>
                                <span>Mobile App</span>
                            </div>
                            <div class="am-legend-item">
                                <span class="material-icons" style="font-size: 14px; color: #1967d2;">back_hand</span>
                                <span>Manual</span>
                            </div>
                        </div>
                    </div>
                    <div class="am-loading" id="amLoadingState">
                        <div class="am-spinner"></div>
                    </div>
                    <div class="am-empty-state" id="amEmptyState">
                        <span class="material-icons">search_off</span>
                        <p>No employees found matching your criteria</p>
                    </div>
                    <div class="am-table-wrapper" id="amTableWrapper" style="display: none;">
                        <table class="am-attendance-table" id="amAttendanceTable">
                            <thead id="amTableHead"></thead>
                            <tbody id="amTableBody"></tbody>
                        </table>
                    </div>
                    <div class="am-table-footer" style="display: none;" id="amTableFooter">
                        <div class="am-pagination-info">
                            Showing <strong><span id="amShowingCount">0</span></strong> of <strong><span id="amTotalCount">0</span></strong> employees
                        </div>
                    </div>
                </div>
            `;

            this.attachEventListeners();
        }

        /**
         * Attach event listeners
         */
        attachEventListeners() {
            const searchInput = this.container.querySelector('#amSearchInput');
            const deptFilter = this.container.querySelector('#amDepartmentFilter');

            if (searchInput) {
                searchInput.addEventListener('input', () => this.applyFilters());
            }

            if (deptFilter) {
                deptFilter.addEventListener('change', () => this.applyFilters());
            }
        }

        /**
         * Fetch data from URL
         */
        async fetchData(url, force = false) {
            this.showLoading(true);
            try {
                const response = await fetch(url, {
                    cache: force ? 'reload' : 'default'
                });
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                this.loadData(data);
            } catch (error) {
                console.error('Error fetching data:', error);
                this.showError('Failed to load attendance data');
            } finally {
                this.showLoading(false);
            }
        }

        /**
         * Load data from JSON object
         */
        loadData(data) {
            if (!data || !data.employees) {
                console.error('Invalid data format');
                return;
            }

            // Store work timing
            if (data.workTiming) {
                this.config.workTiming = data.workTiming;
            }

            // Store employees
            this.employees = data.employees;
            this.filteredEmployees = [...this.employees];

            // Extract departments
            this.departments = [...new Set(this.employees.map(emp => emp.department))];
            this.populateDepartmentFilter();

            // Extract date range from first employee
            if (this.employees.length > 0) {
                const dates = Object.keys(this.employees[0].attendance || {}).sort();
                this.dateRange = dates;
            }

            // Render table and stats
            this.renderTable();
            this.updateStats();
        }

        /**
         * Populate department filter dropdown
         */
        populateDepartmentFilter() {
            const deptFilter = this.container.querySelector('#amDepartmentFilter');
            if (!deptFilter) return;

            // Clear existing options except "All Departments"
            deptFilter.innerHTML = '<option value="">All Departments</option>';

            this.departments.forEach(dept => {
                const option = document.createElement('option');
                option.value = dept;
                option.textContent = dept;
                deptFilter.appendChild(option);
            });
        }

        /**
         * Render the attendance table
         */
        renderTable() {
            const tableHead = this.container.querySelector('#amTableHead');
            const tableBody = this.container.querySelector('#amTableBody');
            const tableWrapper = this.container.querySelector('#amTableWrapper');
            const tableFooter = this.container.querySelector('#amTableFooter');
            const emptyState = this.container.querySelector('#amEmptyState');

            if (this.filteredEmployees.length === 0) {
                tableWrapper.style.display = 'none';
                tableFooter.style.display = 'none';
                emptyState.classList.add('active');
                return;
            }

            emptyState.classList.remove('active');
            tableWrapper.style.display = 'block';
            tableFooter.style.display = 'flex';

            // Calculate daily stats
            const dailyStats = this.calculateDailyStats();

            // Render header
            this.renderTableHeader(tableHead, dailyStats);

            // Render body
            this.renderTableBody(tableBody);

            this.updatePagination();
        }

        /**
         * Calculate daily statistics
         */
        calculateDailyStats() {
            const stats = {};
            
            this.dateRange.forEach(date => {
                stats[date] = {
                    present: 0,
                    absent: 0,
                    leave: 0
                };

                this.filteredEmployees.forEach(emp => {
                    const attendance = emp.attendance?.[date];
                    if (attendance) {
                        if (attendance.status === 'present') {
                            stats[date].present++;
                        } else if (attendance.status === 'absent') {
                            stats[date].absent++;
                        } else if (attendance.status === 'leave') {
                            stats[date].leave++;
                        }
                    }
                });
            });

            return stats;
        }

        /**
         * Render table header
         */
        renderTableHeader(tableHead, dailyStats) {
            let headerHTML = '<tr><th class="frozen">Employee</th>';
            
            this.dateRange.forEach(date => {
                const dateObj = new Date(date);
                const dayName = dateObj.toLocaleDateString('en-US', { weekday: 'short' });
                const dayNum = dateObj.getDate();
                const month = dateObj.toLocaleDateString('en-US', { month: 'short' });
                
                const stats = dailyStats[date];
                
                headerHTML += `
                    <th>
                        <div class="am-date-header">
                            <div class="am-date-label">${month} ${dayNum}</div>
                            <div class="am-day-label">(${dayName})</div>
                            <div class="am-daily-stats">
                                <div class="am-daily-stat present" title="Present">
                                    <span>✓</span>
                                    <span>${stats.present}</span>
                                </div>
                                <div class="am-daily-stat absent" title="Absent">
                                    <span>✕</span>
                                    <span>${stats.absent}</span>
                                </div>
                                ${stats.leave > 0 ? `
                                <div class="am-daily-stat leave" title="On Leave">
                                    <span>◐</span>
                                    <span>${stats.leave}</span>
                                </div>
                                ` : ''}
                            </div>
                        </div>
                    </th>
                `;
            });
            
            headerHTML += '</tr>';
            tableHead.innerHTML = headerHTML;
        }

        /**
         * Render table body
         */
        renderTableBody(tableBody) {
            tableBody.innerHTML = '';

            this.filteredEmployees.forEach(employee => {
                const row = document.createElement('tr');
                
                // Employee column (frozen)
                const initials = this.getInitials(employee.name);
                const employeeCell = document.createElement('td');
                employeeCell.className = 'frozen';
                employeeCell.innerHTML = `
                    <div class="am-employee-info">
                        <div class="am-employee-avatar">${initials}</div>
                        <div class="am-employee-details">
                            <div class="am-employee-name">${employee.name}</div>
                            <div class="am-employee-meta">${employee.employeeCode} • ${employee.department}</div>
                        </div>
                    </div>
                `;
                row.appendChild(employeeCell);

                // Attendance columns
                this.dateRange.forEach(date => {
                    const cell = this.createAttendanceCell(employee, date);
                    row.appendChild(cell);
                });

                tableBody.appendChild(row);
            });
        }

        /**
         * Create individual attendance cell
         */
        createAttendanceCell(employee, date) {
            const attendance = employee.attendance?.[date];
            const cell = document.createElement('td');
            cell.className = 'am-status-cell';
            cell.dataset.empid = employee.empid;
            cell.dataset.employeeCode = employee.employeeCode;
            cell.dataset.date = date;

            // Add click event
            cell.addEventListener('click', () => {
                if (this.config.onCellClick) {
                    this.config.onCellClick({
                        empid: employee.empid,
                        employeeCode: employee.employeeCode,
                        date: date,
                        attendance: attendance
                    });
                }
            });

            if (!attendance) {
                cell.innerHTML = '<span style="color: #9aa0a6;">-</span>';
                return cell;
            }

            let statusClass = '';
            let statusText = '';

            switch (attendance.status) {
                case 'present':
                    statusClass = 'am-status-present';
                    statusText = 'Present';
                    break;
                case 'absent':
                    statusClass = 'am-status-absent';
                    statusText = 'Absent';
                    break;
                case 'leave':
                    statusClass = 'am-status-leave';
                    statusText = 'On Leave';
                    break;
                case 'weekend':
                    statusClass = 'am-status-weekend';
                    statusText = 'Weekend';
                    break;
            }

            let cellHTML = '';

            // Add method icon for present status
            if (attendance.status === 'present' && attendance.method) {
                const methodInfo = this.getMethodIcon(attendance.method);
                cellHTML += `<span class="material-icons am-method-icon ${methodInfo.class}">${methodInfo.icon}</span>`;
            }

            cellHTML += `<div class="am-status-badge ${statusClass}" style="display: inline-block;">${statusText}</div>`;

            if (attendance.status === 'present' && attendance.checkIn) {
                const hours = this.calculateHours(attendance.checkIn, attendance.checkOut);
                const late = this.isLate(attendance.checkIn);
                const shortHours = hours !== null && hours < this.config.workTiming.requiredHours;

                cellHTML += `
                    <div class="am-time-info">
                        <div class="am-time-row">
                            <span class="am-time-in">↓ ${attendance.checkIn}</span>
                            <span class="am-time-out">↑ ${attendance.checkOut || 'NA'}</span>
                        </div>
                    </div>
                `;

                if (late) {
                    cellHTML += `
                        <div class="am-warning-badge am-warning-late">
                            <span class="material-icons">schedule</span>
                            Late
                        </div>
                    `;
                }

                if (shortHours) {
                    cellHTML += `
                        <div class="am-warning-badge am-warning-hours">
                            <span class="material-icons">hourglass_empty</span>
                            ${hours.toFixed(1)}h
                        </div>
                    `;
                }
            }

            cell.innerHTML = cellHTML;
            return cell;
        }

        /**
         * Get method icon information
         */
        getMethodIcon(method) {
            const icons = {
                manual: { icon: 'back_hand', class: 'manual' },
                mobile: { icon: 'smartphone', class: 'mobile' },
                biometric: { icon: 'fingerprint', class: 'biometric' }
            };
            return icons[method] || { icon: '', class: '' };
        }

        /**
         * Get initials from name
         */
        getInitials(name) {
            return name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
        }

        /**
         * Calculate hours worked
         */
        calculateHours(checkIn, checkOut) {
            if (!checkIn || !checkOut || checkOut === 'NA') return null;

            const [inHour, inMin] = checkIn.split(':').map(Number);
            const [outHour, outMin] = checkOut.split(':').map(Number);

            const inMinutes = inHour * 60 + inMin;
            const outMinutes = outHour * 60 + outMin;

            return (outMinutes - inMinutes) / 60;
        }

        /**
         * Check if employee is late
         */
        isLate(checkIn) {
            if (!checkIn) return false;

            const [inHour, inMin] = checkIn.split(':').map(Number);
            const [startHour, startMin] = this.config.workTiming.startTime.split(':').map(Number);

            const inMinutes = inHour * 60 + inMin;
            const startMinutes = startHour * 60 + startMin;

            return inMinutes > startMinutes;
        }

        /**
         * Update statistics bar
         */
        updateStats() {
            const statsBar = this.container.querySelector('#amStatsBar');
            if (!statsBar) return;

            const totalEmp = this.filteredEmployees.length;
            const today = this.dateRange[this.dateRange.length - 1];

            let presentCount = 0;
            let absentCount = 0;
            let leaveCount = 0;
            let lateCount = 0;
            let shortHoursCount = 0;

            this.filteredEmployees.forEach(emp => {
                const todayAttendance = emp.attendance?.[today];
                if (todayAttendance) {
                    if (todayAttendance.status === 'present') {
                        presentCount++;

                        if (this.isLate(todayAttendance.checkIn)) {
                            lateCount++;
                        }

                        const hours = this.calculateHours(todayAttendance.checkIn, todayAttendance.checkOut);
                        if (hours !== null && hours < this.config.workTiming.requiredHours) {
                            shortHoursCount++;
                        }
                    } else if (todayAttendance.status === 'absent') {
                        absentCount++;
                    } else if (todayAttendance.status === 'leave') {
                        leaveCount++;
                    }
                }
            });

            statsBar.innerHTML = `
                <div class="am-stat-item">
                    <div class="am-stat-icon-small blue">
                        <span class="material-icons">people</span>
                    </div>
                    <div class="am-stat-content">
                        <span class="am-stat-label-small">Total</span>
                        <span class="am-stat-value-small">${totalEmp}</span>
                    </div>
                </div>
                <div class="am-stat-item">
                    <div class="am-stat-icon-small green">
                        <span class="material-icons">check_circle</span>
                    </div>
                    <div class="am-stat-content">
                        <span class="am-stat-label-small">Present</span>
                        <span class="am-stat-value-small" style="color: #34a853;">${presentCount}</span>
                    </div>
                </div>
                <div class="am-stat-item">
                    <div class="am-stat-icon-small red">
                        <span class="material-icons">cancel</span>
                    </div>
                    <div class="am-stat-content">
                        <span class="am-stat-label-small">Absent</span>
                        <span class="am-stat-value-small" style="color: #ea4335;">${absentCount}</span>
                    </div>
                </div>
                <div class="am-stat-item">
                    <div class="am-stat-icon-small yellow">
                        <span class="material-icons">beach_access</span>
                    </div>
                    <div class="am-stat-content">
                        <span class="am-stat-label-small">On Leave</span>
                        <span class="am-stat-value-small" style="color: #f9ab00;">${leaveCount}</span>
                    </div>
                </div>
                <div class="am-stat-item">
                    <div class="am-stat-icon-small" style="background-color: #fef7e0; color: #f9ab00;">
                        <span class="material-icons">schedule</span>
                    </div>
                    <div class="am-stat-content">
                        <span class="am-stat-label-small">Late</span>
                        <span class="am-stat-value-small" style="color: #f9ab00;">${lateCount}</span>
                    </div>
                </div>
                <div class="am-stat-item">
                    <div class="am-stat-icon-small" style="background-color: #fce8e6; color: #ea4335;">
                        <span class="material-icons">hourglass_empty</span>
                    </div>
                    <div class="am-stat-content">
                        <span class="am-stat-label-small">Short Hrs</span>
                        <span class="am-stat-value-small" style="color: #ea4335;">${shortHoursCount}</span>
                    </div>
                </div>
            `;
        }

        /**
         * Apply filters
         */
        applyFilters() {
            const searchInput = this.container.querySelector('#amSearchInput');
            const deptFilter = this.container.querySelector('#amDepartmentFilter');

            const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
            const department = deptFilter ? deptFilter.value : '';

            this.filteredEmployees = this.employees.filter(emp => {
                const matchesSearch = emp.name.toLowerCase().includes(searchTerm) ||
                    emp.employeeCode.toLowerCase().includes(searchTerm) ||
                    emp.empid.toString().includes(searchTerm);
                const matchesDept = !department || emp.department === department;
                return matchesSearch && matchesDept;
            });

            this.renderTable();
            this.updateStats();
        }

        /**
         * Update pagination info
         */
        updatePagination() {
            const showingCount = this.container.querySelector('#amShowingCount');
            const totalCount = this.container.querySelector('#amTotalCount');

            if (showingCount) showingCount.textContent = this.filteredEmployees.length;
            if (totalCount) totalCount.textContent = this.employees.length;
        }

        /**
         * Show/hide loading state
         */
        showLoading(show) {
            const loading = this.container.querySelector('#amLoadingState');
            if (loading) {
                if (show) {
                    loading.classList.add('active');
                } else {
                    loading.classList.remove('active');
                }
            }
        }

        /**
         * Show error message
         */
        showError(message) {
            const emptyState = this.container.querySelector('#amEmptyState');
            if (emptyState) {
                emptyState.innerHTML = `
                    <span class="material-icons">error_outline</span>
                    <p>${message}</p>
                `;
                emptyState.classList.add('active');
            }
        }

        /**
         * Update single cell
         */
        updateCell(identifier, date, attendanceData) {
            // Find employee by empid or employeeCode
            const employee = this.employees.find(emp => 
                emp.empid === identifier || emp.employeeCode === identifier
            );

            if (!employee) {
                console.error('Employee not found:', identifier);
                return;
            }

            // Update attendance data
            if (!employee.attendance) {
                employee.attendance = {};
            }
            employee.attendance[date] = attendanceData;

            // Find and update the specific cell
            const cell = this.container.querySelector(
                `.am-status-cell[data-empid="${employee.empid}"][data-date="${date}"], ` +
                `.am-status-cell[data-employee-code="${employee.employeeCode}"][data-date="${date}"]`
            );

            if (cell) {
                const newCell = this.createAttendanceCell(employee, date);
                cell.innerHTML = newCell.innerHTML;
                cell.dataset.empid = newCell.dataset.empid;
                cell.dataset.employeeCode = newCell.dataset.employeeCode;
                cell.dataset.date = newCell.dataset.date;

                // Reattach click event
                cell.addEventListener('click', () => {
                    if (this.config.onCellClick) {
                        this.config.onCellClick({
                            empid: employee.empid,
                            employeeCode: employee.employeeCode,
                            date: date,
                            attendance: attendanceData
                        });
                    }
                });
            }

            // Update stats
            this.updateStats();
        }

        /**
         * Reload data from URL
         */
        reload(force = false) {
            if (this.config.dataUrl) {
                this.fetchData(this.config.dataUrl, force);
            } else {
                console.warn('No dataUrl configured for reload');
            }
        }

        /**
         * Refresh with new data
         */
        refresh(data) {
            this.loadData(data);
        }

        /**
         * Destroy the instance
         */
        destroy() {
            this.container.innerHTML = '';
            this.container.classList.remove('attendance-manager');
        }
    }

    // Export to global scope
    if (typeof module !== 'undefined' && module.exports) {
        module.exports = AttendanceManager;
    } else {
        global.AttendanceManager = AttendanceManager;
    }

})(typeof window !== 'undefined' ? window : this);
