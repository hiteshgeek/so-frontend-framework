# Attendance Manager Plugin

A framework-agnostic JavaScript plugin for managing and displaying employee attendance data with Google Material Design.

## Version
1.0.0

## Features

- ✅ Framework-agnostic (Vanilla JavaScript)
- ✅ Google Material Design aesthetics
- ✅ Load data from JSON object or URL
- ✅ Frozen employee column for easy scrolling
- ✅ Filter by department and search employees
- ✅ Real-time statistics dashboard
- ✅ Attendance method indicators (Manual, Mobile, Biometric)
- ✅ Late arrival and short hours warnings
- ✅ Click callback for cell interactions
- ✅ Update individual cells without full reload
- ✅ Responsive design
- ✅ Date format: yyyy-mm-dd (ISO 8601)

## Installation

### 1. Include Required Dependencies

```html
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Plugin CSS -->
<link rel="stylesheet" href="path/to/attendance-plugin.css">

<!-- Plugin JS -->
<script src="path/to/attendance-plugin.js"></script>
```

### 2. Create Container Element

```html
<div id="attendance-container"></div>
```

## Usage

### Basic Initialization

```javascript
// Initialize with data URL
const attendance = new AttendanceManager('#attendance-container', {
    dataUrl: 'path/to/attendance-data.json'
});
```

### Initialization Options

```javascript
const attendance = new AttendanceManager('#attendance-container', {
    // Data source (provide either dataUrl or data)
    dataUrl: 'path/to/data.json',          // URL to fetch data from
    data: attendanceDataObject,             // Or provide data directly
    
    // Work timing configuration
    workTiming: {
        startTime: "10:00",                 // Expected start time (HH:mm)
        endTime: "19:00",                   // Expected end time (HH:mm)
        requiredHours: 9                    // Required work hours
    },
    
    // Date format (currently only yyyy-mm-dd supported)
    dateFormat: 'yyyy-mm-dd',
    
    // Cell click callback
    onCellClick: function(data) {
        console.log('Cell clicked:', data);
        // data contains: empid, employeeCode, date, attendance
    },
    
    // Auto-load data on initialization
    autoLoad: true                          // Default: true
});
```

## Data Format

### JSON Structure

```json
{
  "workTiming": {
    "startTime": "10:00",
    "endTime": "19:00",
    "requiredHours": 9
  },
  "employees": [
    {
      "empid": 1,
      "employeeCode": "EMP001",
      "name": "John Doe",
      "department": "Engineering",
      "attendance": {
        "2026-01-01": {
          "status": "present",
          "checkIn": "09:45",
          "checkOut": "19:30",
          "method": "biometric"
        },
        "2026-01-02": {
          "status": "absent",
          "checkIn": null,
          "checkOut": null,
          "method": null
        }
      }
    }
  ]
}
```

### Field Descriptions

#### Employee Object
- `empid` (number, required): Primary key for the employee
- `employeeCode` (string, required): Employee code/ID
- `name` (string, required): Employee full name
- `department` (string, required): Department name
- `attendance` (object, required): Date-keyed attendance records

#### Attendance Object (per date)
- `status` (string, required): One of: `"present"`, `"absent"`, `"leave"`, `"weekend"`
- `checkIn` (string|null): Check-in time in HH:mm format (24-hour)
- `checkOut` (string|null): Check-out time in HH:mm format or "NA"
- `method` (string|null): Attendance method: `"manual"`, `"mobile"`, `"biometric"`

#### Missing Dates
If attendance data is not available for a specific date, simply omit that date from the employee's attendance object. The system will display a blank cell (`-`).

## API Methods

### Load/Reload Data

```javascript
// Load from URL (initial or force reload)
attendance.fetchData('path/to/data.json', true); // force = true

// Load from object
attendance.loadData(dataObject);

// Reload from configured URL
attendance.reload(true); // force refresh

// Refresh with new data
attendance.refresh(newDataObject);
```

### Update Single Cell

```javascript
// Update by employee ID (empid)
attendance.updateCell(1, '2026-01-05', {
    status: 'present',
    checkIn: '09:30',
    checkOut: '18:45',
    method: 'biometric'
});

// Update by employee code
attendance.updateCell('EMP001', '2026-01-05', {
    status: 'leave',
    checkIn: null,
    checkOut: null,
    method: null
});
```

### Apply Filters

```javascript
// Filters are applied automatically when users interact with UI
// But you can trigger manually:
attendance.applyFilters();
```

### Destroy Instance

```javascript
// Clean up and remove the instance
attendance.destroy();
```

## Callbacks

### Cell Click Callback

```javascript
const attendance = new AttendanceManager('#attendance-container', {
    dataUrl: 'data.json',
    onCellClick: function(data) {
        console.log('Clicked cell data:', data);
        
        // Available properties:
        // data.empid - Employee primary key
        // data.employeeCode - Employee code
        // data.date - Date in yyyy-mm-dd format
        // data.attendance - Attendance object for that date
        
        // Example: Open edit modal
        openEditModal(data.empid, data.date, data.attendance);
    }
});
```

## Examples

### Example 1: Load from URL

```html
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="attendance-plugin.css">
</head>
<body>
    <div id="attendance-container"></div>
    
    <script src="attendance-plugin.js"></script>
    <script>
        const attendance = new AttendanceManager('#attendance-container', {
            dataUrl: 'attendance-data.json'
        });
    </script>
</body>
</html>
```

### Example 2: Load with Data Object

```javascript
const data = {
    workTiming: {
        startTime: "09:00",
        endTime: "18:00",
        requiredHours: 9
    },
    employees: [
        {
            empid: 1,
            employeeCode: "EMP001",
            name: "Jane Smith",
            department: "Sales",
            attendance: {
                "2026-01-07": {
                    status: "present",
                    checkIn: "09:15",
                    checkOut: "18:30",
                    method: "mobile"
                }
            }
        }
    ]
};

const attendance = new AttendanceManager('#attendance-container', {
    data: data
});
```

### Example 3: With Cell Click Handler

```javascript
const attendance = new AttendanceManager('#attendance-container', {
    dataUrl: 'data.json',
    onCellClick: function(data) {
        // Show attendance details
        alert(`Employee: ${data.employeeCode}\nDate: ${data.date}\nStatus: ${data.attendance?.status || 'No data'}`);
        
        // Or make AJAX call to get more details
        fetch(`/api/attendance/${data.empid}/${data.date}`)
            .then(response => response.json())
            .then(details => {
                console.log('Full details:', details);
            });
    }
});
```

### Example 4: Update Cell After Edit

```javascript
// After user edits attendance through your custom form/modal
function saveAttendance(empid, date, newData) {
    // Save to backend
    fetch('/api/attendance/update', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ empid, date, attendance: newData })
    })
    .then(response => response.json())
    .then(result => {
        // Update the cell in the UI
        attendance.updateCell(empid, date, newData);
    });
}
```

### Example 5: Periodic Refresh

```javascript
const attendance = new AttendanceManager('#attendance-container', {
    dataUrl: 'attendance-data.json'
});

// Refresh every 5 minutes
setInterval(() => {
    attendance.reload(true); // Force refresh
}, 5 * 60 * 1000);
```

## Styling Customization

You can customize colors by overriding CSS variables:

```css
.attendance-manager {
    --am-primary-blue: #1a73e8;
    --am-secondary-green: #34a853;
    --am-secondary-red: #ea4335;
    /* ... other variables ... */
}
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## License

MIT License

## Support

For issues, questions, or contributions, please contact the development team.

## Changelog

### Version 1.0.0
- Initial release
- Core attendance display functionality
- Filter and search capabilities
- Cell update methods
- Click callbacks
- Responsive design
