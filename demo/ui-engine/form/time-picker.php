<?php
/**
 * SixOrbit UI Engine - Time Picker Element Demo
 */

$pageTitle = 'Time Picker - UI Engine';
$pageDescription = 'Time picker with 12/24 hour format and step options';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <nav aria-label="breadcrumb">
            <ol class="so-breadcrumb">
                <li class="so-breadcrumb-item"><a href="../index.php">UI Engine</a></li>
                <li class="so-breadcrumb-item"><a href="../index.php#form">Form Elements</a></li>
                <li class="so-breadcrumb-item so-active">Time Picker</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">schedule</span>
            Time Picker
        </h1>
        <p class="so-page-subtitle">Time picker element with 12/24 hour format support, minute steps, and time range selection.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Time Picker -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Time Picker</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-time">Select Time</label>
                        <input type="time" class="so-form-control" id="demo-time" name="time">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-time', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$timePicker = UiEngine::timePicker('appointment_time')
    ->label('Select Time');

echo \$timePicker->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const timePicker = UiEngine.timePicker('appointment_time')
    .label('Select Time');

document.getElementById('container').innerHTML = timePicker.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="appointment_time">Select Time</label>
    <input type="time" class="so-form-control" id="appointment_time" name="appointment_time">
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Min/Max Time -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Min/Max Time</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-business">Business Hours</label>
                        <input type="time" class="so-form-control" id="demo-business" min="09:00" max="17:00">
                        <small class="so-form-text so-text-muted">Select a time between 9:00 AM and 5:00 PM</small>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('time-minmax', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$timePicker = UiEngine::timePicker('meeting_time')
    ->label('Business Hours')
    ->min('09:00')
    ->max('17:00')
    ->help('Select a time between 9:00 AM and 5:00 PM');

echo \$timePicker->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const timePicker = UiEngine.timePicker('meeting_time')
    .label('Business Hours')
    .min('09:00')
    .max('17:00')
    .help('Select a time between 9:00 AM and 5:00 PM');

document.getElementById('container').innerHTML = timePicker.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Step -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Step Intervals</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-row so-g-3">
                        <div class="so-col-md-4">
                            <label class="so-form-label">15 minute steps</label>
                            <input type="time" class="so-form-control" step="900">
                        </div>
                        <div class="so-col-md-4">
                            <label class="so-form-label">30 minute steps</label>
                            <input type="time" class="so-form-control" step="1800">
                        </div>
                        <div class="so-col-md-4">
                            <label class="so-form-label">1 hour steps</label>
                            <input type="time" class="so-form-control" step="3600">
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('time-step', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// 15 minute intervals
UiEngine::timePicker('slot_15')
    ->label('15 minute steps')
    ->step(15); // minutes

// 30 minute intervals
UiEngine::timePicker('slot_30')
    ->label('30 minute steps')
    ->step(30);

// 1 hour intervals
UiEngine::timePicker('slot_60')
    ->label('1 hour steps')
    ->step(60);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// 15 minute intervals
UiEngine.timePicker('slot_15')
    .label('15 minute steps')
    .step(15); // minutes

// 30 minute intervals
UiEngine.timePicker('slot_30')
    .label('30 minute steps')
    .step(30);

// 1 hour intervals
UiEngine.timePicker('slot_60')
    .label('1 hour steps')
    .step(60);"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Time Formats -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Time Formats</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('time-formats', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// 24-hour format (default)
UiEngine::timePicker('time_24')
    ->label('24-hour format')
    ->format('H:i'); // 14:30

// 12-hour format with AM/PM
UiEngine::timePicker('time_12')
    ->label('12-hour format')
    ->format('h:i A')   // For submission: 02:30 PM
    ->use12Hour();      // Enable 12-hour picker

// With seconds
UiEngine::timePicker('time_seconds')
    ->label('With seconds')
    ->format('H:i:s')
    ->showSeconds();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// 24-hour format (default)
UiEngine.timePicker('time_24')
    .label('24-hour format')
    .format('H:i'); // 14:30

// 12-hour format with AM/PM
UiEngine.timePicker('time_12')
    .label('12-hour format')
    .format('h:i A')
    .use12Hour();

// With seconds
UiEngine.timePicker('time_seconds')
    .label('With seconds')
    .format('H:i:s')
    .showSeconds();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Time Range -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Time Range</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-row so-g-3">
                        <div class="so-col-md-6">
                            <label class="so-form-label" for="demo-start-time">Start Time</label>
                            <input type="time" class="so-form-control" id="demo-start-time" name="start_time">
                        </div>
                        <div class="so-col-md-6">
                            <label class="so-form-label" for="demo-end-time">End Time</label>
                            <input type="time" class="so-form-control" id="demo-end-time" name="end_time">
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('time-range', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Two separate time pickers
\$startTime = UiEngine::timePicker('start_time')
    ->label('Start Time');

\$endTime = UiEngine::timePicker('end_time')
    ->label('End Time');

// Or use time range component
\$timeRange = UiEngine::timeRange('schedule')
    ->label('Schedule')
    ->startName('start_time')
    ->endName('end_time');

echo \$timeRange->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Two separate time pickers
const startTime = UiEngine.timePicker('start_time')
    .label('Start Time');

const endTime = UiEngine.timePicker('end_time')
    .label('End Time');

// Or use time range component
const timeRange = UiEngine.timeRange('schedule')
    .label('Schedule')
    .startName('start_time')
    .endName('end_time')
    .onChange((start, end) => {
        console.log('Schedule:', start, 'to', end);
    });

document.getElementById('container').innerHTML = timeRange.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- API Reference -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">API Reference</h3>
            </div>
            <div class="so-card-body">
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead class="so-table-light">
                            <tr>
                                <th>Method</th>
                                <th>Parameters</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>value()</code></td>
                                <td><code>string $time</code></td>
                                <td>Set the time value</td>
                            </tr>
                            <tr>
                                <td><code>min()</code></td>
                                <td><code>string $time</code></td>
                                <td>Set minimum selectable time</td>
                            </tr>
                            <tr>
                                <td><code>max()</code></td>
                                <td><code>string $time</code></td>
                                <td>Set maximum selectable time</td>
                            </tr>
                            <tr>
                                <td><code>step()</code></td>
                                <td><code>int $minutes</code></td>
                                <td>Set minute step interval</td>
                            </tr>
                            <tr>
                                <td><code>format()</code></td>
                                <td><code>string $format</code></td>
                                <td>Set the time format</td>
                            </tr>
                            <tr>
                                <td><code>use12Hour()</code></td>
                                <td>-</td>
                                <td>Use 12-hour format with AM/PM</td>
                            </tr>
                            <tr>
                                <td><code>showSeconds()</code></td>
                                <td>-</td>
                                <td>Include seconds in picker</td>
                            </tr>
                            <tr>
                                <td><code>onChange()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Time change callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
