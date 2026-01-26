# Multi Employee Attendance Viewer - Developer Guide

## Overview

The Multi Employee Attendance Viewer is a comprehensive attendance tracking plugin that displays employee attendance data across multiple days with advanced filtering, search, and visualization capabilities.

**Version:** 1.0.0
**Module:** HR
**Plugin Type:** Framework-agnostic JavaScript

---

## Table of Contents

1. [Quick Start](#quick-start)
2. [Installation](#installation)
3. [Basic Usage](#basic-usage)
4. [Configuration Options](#configuration-options)
5. [Data Format](#data-format)
6. [Methods](#methods)
7. [Examples](#examples)
8. [Styling](#styling)
9. [Browser Support](#browser-support)

---

## Quick Start

### Minimum Setup

```html
<!DOCTYPE html>
<html>
<head>
    <!-- Required: Common Styles -->
    <link rel="stylesheet" href="../../common/sixorbit-common.css">

    <!-- Required: Plugin Styles -->
    <link rel="stylesheet" href="attendance-plugin.css">
</head>
<body>
    <!-- Container -->
    <div id="attendance-container"></div>

    <!-- Required: Plugin JavaScript -->
    <script src="attendance-plugin.js"></script>

    <script>
        // Initialize
        const attendanceManager = new AttendanceManager('attendance-container', {
            employees: yourEmployeesArray,
            dates: yourDatesArray,
            attendanceData: yourAttendanceData
        });
    </script>
</body>
</html>
```

---

## Installation

### Step 1: Include CSS Files

```html
<!-- Common Design System (Required) -->
<link rel="stylesheet" href="../../common/sixorbit-common.css">

<!-- Plugin-Specific Styles (Required) -->
<link rel="stylesheet" href="attendance-plugin.css">

<!-- Optional: Google Fonts & Icons -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
```

### Step 2: Include JavaScript

```html
<!-- Plugin JavaScript (Required) -->
<script src="attendance-plugin.js"></script>
```

### Step 3: Create Container

```html
<!-- Container where the attendance viewer will be rendered -->
<div id="attendance-container"></div>
```

---

## Basic Usage

### Initialize the Plugin

```javascript
// Create instance
const attendanceManager = new AttendanceManager(containerId, options);
```

**Parameters:**
- `containerId` (String): ID of the container element (without #)
- `options` (Object): Configuration options

**Example:**

```javascript
const attendanceManager = new AttendanceManager('attendance-container', {
    employees: employeesArray,
    dates: datesArray,
    attendanceData: attendanceDataObject
});
```

---

## Configuration Options

### Required Options

| Option | Type | Description |
|--------|------|-------------|
| `employees` | Array | List of employee objects |
| `dates` | Array | List of date strings (YYYY-MM-DD format) |
| `attendanceData` | Object | Attendance records keyed by employee ID |

### Complete Options

```javascript
{
    employees: [
        {
            id: "E001",
            name: "John Doe",
            employee_code: "EMP001",
            department: "Sales",
            designation: "Sales Manager"
        }
    ],
    dates: ["2025-01-01", "2025-01-02", "2025-01-03"],
    attendanceData: {
        "E001": {
            "2025-01-01": {
                status: "present",
                in_time: "09:00",
                out_time: "18:00",
                hours: 9,
                method: "biometric"  // or "mobile", "manual"
            }
        }
    }
}
```

---

## Data Format

### Employee Object

```javascript
{
    id: "unique_employee_id",           // Required: Unique identifier
    name: "Employee Full Name",         // Required: Display name
    employee_code: "EMP001",            // Required: Employee code/number
    department: "Department Name",      // Required: Department
    designation: "Job Title"            // Required: Designation
}
```

**Complete Example:**

```javascript
{
    id: "E001",
    name: "John Doe",
    employee_code: "EMP001",
    department: "Sales",
    designation: "Sales Manager"
}
```

### Dates Array

Array of date strings in `YYYY-MM-DD` format:

```javascript
[
    "2025-01-01",
    "2025-01-02",
    "2025-01-03",
    // ... more dates
]
```

### Attendance Data Object

Nested object structure: `attendanceData[employeeId][date]`

```javascript
{
    "employee_id": {
        "date": {
            status: "status_value",     // Required
            in_time: "HH:MM",          // Optional
            out_time: "HH:MM",         // Optional
            hours: number,             // Optional
            method: "method_type",     // Optional
            notes: "any notes"         // Optional
        }
    }
}
```

#### Status Values

| Status | Description |
|--------|-------------|
| `"present"` | Employee was present |
| `"absent"` | Employee was absent |
| `"leave"` | Employee was on leave |
| `"weekend"` | Weekend/Holiday |
| `"half_day"` | Half day attendance |

#### Method Values

| Method | Icon | Description |
|--------|------|-------------|
| `"biometric"` | 🔒 | Biometric attendance |
| `"mobile"` | 📱 | Mobile app check-in |
| `"manual"` | ✍️ | Manual entry |

### Complete Data Example

```javascript
const employees = [
    {
        id: "E001",
        name: "John Doe",
        employee_code: "EMP001",
        department: "Sales",
        designation: "Sales Manager"
    },
    {
        id: "E002",
        name: "Jane Smith",
        employee_code: "EMP002",
        department: "HR",
        designation: "HR Executive"
    }
];

const dates = [
    "2025-01-01",
    "2025-01-02",
    "2025-01-03",
    "2025-01-04",
    "2025-01-05"
];

const attendanceData = {
    "E001": {
        "2025-01-01": {
            status: "present",
            in_time: "09:00",
            out_time: "18:00",
            hours: 9,
            method: "biometric"
        },
        "2025-01-02": {
            status: "present",
            in_time: "09:15",
            out_time: "18:30",
            hours: 9.25,
            method: "mobile",
            notes: "Checked in via mobile app"
        },
        "2025-01-03": {
            status: "leave",
            notes: "Sick leave"
        },
        "2025-01-04": {
            status: "weekend"
        },
        "2025-01-05": {
            status: "present",
            in_time: "08:45",
            out_time: "17:45",
            hours: 9,
            method: "biometric"
        }
    },
    "E002": {
        "2025-01-01": {
            status: "present",
            in_time: "09:30",
            out_time: "18:00",
            hours: 8.5,
            method: "manual"
        },
        "2025-01-02": {
            status: "absent"
        },
        "2025-01-03": {
            status: "present",
            in_time: "09:00",
            out_time: "18:15",
            hours: 9.25,
            method: "biometric"
        },
        "2025-01-04": {
            status: "weekend"
        },
        "2025-01-05": {
            status: "half_day",
            in_time: "09:00",
            out_time: "13:00",
            hours: 4,
            method: "biometric"
        }
    }
};

// Initialize
const attendanceManager = new AttendanceManager('attendance-container', {
    employees: employees,
    dates: dates,
    attendanceData: attendanceData
});
```

---

## Methods

### Public Methods

#### `updateFilters(filters)`

Update filter criteria.

**Parameters:**
- `filters` (Object): Filter configuration

**Filter Options:**
```javascript
{
    search: "search term",           // Filter by employee name/code
    status: "present",               // Filter by status
    department: "Sales",             // Filter by department
    startDate: "2025-01-01",        // Filter by date range
    endDate: "2025-01-31"
}
```

**Example:**
```javascript
attendanceManager.updateFilters({
    search: "john",
    status: "present",
    department: "Sales"
});
```

#### `reload(newData)`

Reload the attendance viewer with fresh data.

**Parameters:**
- `newData` (Object): New data containing employees, dates, and attendance

**Example:**
```javascript
// Fetch fresh attendance data
const freshData = await fetchAttendanceData();

// Reload viewer
attendanceManager.reload({
    employees: freshData.employees,
    dates: freshData.dates,
    attendanceData: freshData.attendance
});
```

#### `exportToCSV()`

Export current attendance data to CSV file.

**Example:**
```javascript
attendanceManager.exportToCSV();
```

#### `getStatistics()`

Get attendance statistics.

**Returns:**
Object with statistics:
```javascript
{
    totalEmployees: 50,
    totalPresent: 45,
    totalAbsent: 3,
    totalLeave: 2,
    attendanceRate: 90.0
}
```

**Example:**
```javascript
const stats = attendanceManager.getStatistics();
console.log(`Attendance Rate: ${stats.attendanceRate}%`);
```

---

## Examples

### Example 1: Basic Implementation

```html
<!DOCTYPE html>
<html>
<head>
    <title>Employee Attendance</title>
    <link rel="stylesheet" href="../../common/sixorbit-common.css">
    <link rel="stylesheet" href="attendance-plugin.css">
</head>
<body>
    <div id="attendance-container"></div>

    <script src="attendance-plugin.js"></script>
    <script>
        const attendanceManager = new AttendanceManager('attendance-container', {
            employees: [
                { id: "E001", name: "John Doe", employee_code: "EMP001",
                  department: "Sales", designation: "Manager" }
            ],
            dates: ["2025-01-01", "2025-01-02"],
            attendanceData: {
                "E001": {
                    "2025-01-01": {
                        status: "present",
                        in_time: "09:00",
                        out_time: "18:00",
                        hours: 9
                    }
                }
            }
        });
    </script>
</body>
</html>
```

### Example 2: With Filters

```html
<div class="filters">
    <input type="text" id="searchBox" placeholder="Search employees...">
    <select id="statusFilter">
        <option value="">All Status</option>
        <option value="present">Present</option>
        <option value="absent">Absent</option>
        <option value="leave">On Leave</option>
    </select>
    <select id="departmentFilter">
        <option value="">All Departments</option>
        <option value="Sales">Sales</option>
        <option value="HR">HR</option>
        <option value="IT">IT</option>
    </select>
    <button onclick="applyFilters()">Apply</button>
</div>

<div id="attendance-container"></div>

<script>
    const attendanceManager = new AttendanceManager('attendance-container', {
        employees: employeesData,
        dates: datesData,
        attendanceData: attendanceDataObj
    });

    function applyFilters() {
        const search = document.getElementById('searchBox').value;
        const status = document.getElementById('statusFilter').value;
        const department = document.getElementById('departmentFilter').value;

        attendanceManager.updateFilters({
            search: search,
            status: status,
            department: department
        });
    }
</script>
```

### Example 3: Dynamic Data Loading

```javascript
// Function to load attendance for a date range
async function loadAttendance(startDate, endDate) {
    try {
        // Show loading state
        showLoading();

        // Fetch data from API
        const response = await fetch(
            `/api/attendance?start=${startDate}&end=${endDate}`
        );
        const data = await response.json();

        // Initialize or reload
        if (!window.attendanceManager) {
            window.attendanceManager = new AttendanceManager('attendance-container', {
                employees: data.employees,
                dates: data.dates,
                attendanceData: data.attendance
            });
        } else {
            window.attendanceManager.reload({
                employees: data.employees,
                dates: data.dates,
                attendanceData: data.attendance
            });
        }

        hideLoading();
    } catch (error) {
        console.error('Failed to load attendance:', error);
        showError('Failed to load attendance data');
    }
}

// Load current month
const today = new Date();
const startOfMonth = new Date(today.getFullYear(), today.getMonth(), 1);
const endOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

loadAttendance(
    formatDate(startOfMonth),
    formatDate(endOfMonth)
);
```

### Example 4: With Export Functionality

```html
<div class="toolbar">
    <button onclick="attendanceManager.exportToCSV()">
        📊 Export to CSV
    </button>
    <button onclick="showStatistics()">
        📈 View Statistics
    </button>
    <button onclick="refreshData()">
        🔄 Refresh
    </button>
</div>

<div id="attendance-container"></div>

<script>
    const attendanceManager = new AttendanceManager('attendance-container', {
        employees: employeesData,
        dates: datesData,
        attendanceData: attendanceDataObj
    });

    function showStatistics() {
        const stats = attendanceManager.getStatistics();

        alert(`
            Attendance Statistics:
            Total Employees: ${stats.totalEmployees}
            Present: ${stats.totalPresent}
            Absent: ${stats.totalAbsent}
            On Leave: ${stats.totalLeave}
            Attendance Rate: ${stats.attendanceRate}%
        `);
    }

    async function refreshData() {
        const response = await fetch('/api/attendance/current');
        const data = await response.json();

        attendanceManager.reload({
            employees: data.employees,
            dates: data.dates,
            attendanceData: data.attendance
        });
    }
</script>
```

### Example 5: Real-time Updates

```javascript
// Setup WebSocket for real-time updates
const ws = new WebSocket('ws://your-server/attendance-updates');

let attendanceManager;

// Initialize
document.addEventListener('DOMContentLoaded', async function() {
    const initialData = await fetchInitialData();

    attendanceManager = new AttendanceManager('attendance-container', {
        employees: initialData.employees,
        dates: initialData.dates,
        attendanceData: initialData.attendance
    });
});

// Listen for updates
ws.onmessage = function(event) {
    const update = JSON.parse(event.data);

    if (update.type === 'attendance_change') {
        // Refresh data
        fetchAndReloadData();
    }
};

async function fetchAndReloadData() {
    const data = await fetchAttendanceData();
    attendanceManager.reload({
        employees: data.employees,
        dates: data.dates,
        attendanceData: data.attendance
    });
}
```

---

## Styling

### Custom Styling

The plugin uses CSS classes prefixed with `am-` (attendance-manager). You can override these:

```css
/* Customize colors */
.am-status-present {
    background-color: #custom-green;
}

.am-status-absent {
    background-color: #custom-red;
}

/* Customize table */
.am-attendance-table {
    border: 1px solid #custom-color;
}

/* Customize header */
.am-stats-bar {
    background: linear-gradient(to right, #color1, #color2);
}
```

### Using Design Tokens

```css
/* Use common design system variables */
.am-custom-element {
    color: var(--so-primary);
    padding: var(--so-space-lg);
    border-radius: var(--so-radius-md);
    box-shadow: var(--so-shadow-1);
}
```

---

## Browser Support

- ✅ Chrome/Edge (latest)
- ✅ Firefox (latest)
- ✅ Safari (latest)
- ✅ Mobile Safari (iOS)
- ✅ Chrome Mobile (Android)

**Minimum Requirements:**
- ES6 JavaScript support
- CSS Grid & Flexbox support
- Sticky positioning support

---

## Troubleshooting

### Viewer not appearing

1. **Check container ID** - Must match exactly (without #)
2. **Verify CSS files** - Check for 404 errors in console
3. **Check data structure** - Ensure employees, dates, and attendance are correct

### Filters not working

```javascript
// Make sure filter structure is correct
attendanceManager.updateFilters({
    search: "john",        // lowercase for better matching
    status: "present",     // exact status value
    department: "Sales"    // exact department name
});
```

### Statistics not calculating

- Ensure attendance data has valid status values
- Check that dates array matches attendance data keys

---

## Complete Integration Example

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Attendance Tracker</title>

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Required Styles -->
    <link rel="stylesheet" href="../../common/sixorbit-common.css">
    <link rel="stylesheet" href="attendance-plugin.css">

    <style>
        body {
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }

        .page-header {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .toolbar {
            background: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .toolbar button {
            padding: 8px 16px;
            background: #1a73e8;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="page-header">
        <h1>Employee Attendance Tracker</h1>
        <p>January 2025</p>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
        <input type="text" id="search" placeholder="Search employees...">
        <select id="statusFilter">
            <option value="">All Status</option>
            <option value="present">Present</option>
            <option value="absent">Absent</option>
            <option value="leave">Leave</option>
        </select>
        <button onclick="applyFilters()">Apply Filters</button>
        <button onclick="attendanceManager.exportToCSV()">Export CSV</button>
        <button onclick="refreshData()">Refresh</button>
    </div>

    <!-- Attendance Container -->
    <div id="attendance-container"></div>

    <!-- Plugin JavaScript -->
    <script src="attendance-plugin.js"></script>

    <!-- Integration Code -->
    <script>
        let attendanceManager;

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', async function() {
            const data = await loadAttendanceData();

            attendanceManager = new AttendanceManager('attendance-container', {
                employees: data.employees,
                dates: data.dates,
                attendanceData: data.attendance
            });
        });

        // Load data from API
        async function loadAttendanceData() {
            const response = await fetch('/api/attendance/january-2025');
            return await response.json();
        }

        // Apply filters
        function applyFilters() {
            const search = document.getElementById('search').value;
            const status = document.getElementById('statusFilter').value;

            attendanceManager.updateFilters({
                search: search,
                status: status
            });
        }

        // Refresh data
        async function refreshData() {
            const data = await loadAttendanceData();
            attendanceManager.reload({
                employees: data.employees,
                dates: data.dates,
                attendanceData: data.attendance
            });
        }
    </script>
</body>
</html>
```

---

## Support

For questions or issues:
1. Check this guide
2. Review the demo file: `demo.html`
3. Check data format examples
4. Contact SixOrbit development team

---

**Plugin:** Multi Employee Attendance Viewer v1.0.0
**Last Updated:** 2026-01-08
**Module:** HR
