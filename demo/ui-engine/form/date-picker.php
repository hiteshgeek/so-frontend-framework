<?php
/**
 * SixOrbit UI Engine - Date Picker Element Demo
 */

$pageTitle = 'Date Picker - UI Engine';
$pageDescription = 'Date picker with range selection and formatting options';

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
                <li class="so-breadcrumb-item so-active">Date Picker</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">calendar_today</span>
            Date Picker
        </h1>
        <p class="so-page-subtitle">Date picker element with single date, date range, and various formatting options.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Date Picker -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Date Picker</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-date">Select Date</label>
                        <input type="date" class="so-form-control" id="demo-date" name="date">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-date', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$datePicker = UiEngine::datePicker('birthdate')
    ->label('Select Date');

echo \$datePicker->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const datePicker = UiEngine.datePicker('birthdate')
    .label('Select Date');

document.getElementById('container').innerHTML = datePicker.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="birthdate">Select Date</label>
    <input type="date" class="so-form-control" id="birthdate" name="birthdate">
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Min/Max Dates -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Min/Max Dates</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-booking">Booking Date</label>
                        <input type="date" class="so-form-control" id="demo-booking" min="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d', strtotime('+30 days')) ?>">
                        <small class="so-form-text so-text-muted">Select a date within the next 30 days</small>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('date-minmax', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$datePicker = UiEngine::datePicker('booking_date')
    ->label('Booking Date')
    ->min(date('Y-m-d'))                    // Today
    ->max(date('Y-m-d', strtotime('+30 days'))) // 30 days from now
    ->help('Select a date within the next 30 days');

echo \$datePicker->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const today = new Date().toISOString().split('T')[0];
const maxDate = new Date(Date.now() + 30*24*60*60*1000).toISOString().split('T')[0];

const datePicker = UiEngine.datePicker('booking_date')
    .label('Booking Date')
    .min(today)
    .max(maxDate)
    .help('Select a date within the next 30 days');

document.getElementById('container').innerHTML = datePicker.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Date Range -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Date Range</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-row so-g-3">
                        <div class="so-col-md-6">
                            <label class="so-form-label" for="demo-start">Start Date</label>
                            <input type="date" class="so-form-control" id="demo-start" name="start_date">
                        </div>
                        <div class="so-col-md-6">
                            <label class="so-form-label" for="demo-end">End Date</label>
                            <input type="date" class="so-form-control" id="demo-end" name="end_date">
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('date-range', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Option 1: Two separate date pickers
\$startDate = UiEngine::datePicker('start_date')
    ->label('Start Date');

\$endDate = UiEngine::datePicker('end_date')
    ->label('End Date');

// Option 2: Date range picker
\$dateRange = UiEngine::dateRange('dates')
    ->label('Select Dates')
    ->startName('start_date')
    ->endName('end_date');

echo \$dateRange->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Option 1: Two separate date pickers
const startDate = UiEngine.datePicker('start_date')
    .label('Start Date');

const endDate = UiEngine.datePicker('end_date')
    .label('End Date');

// Option 2: Date range picker
const dateRange = UiEngine.dateRange('dates')
    .label('Select Dates')
    .startName('start_date')
    .endName('end_date')
    .onChange((start, end) => {
        console.log('Range:', start, 'to', end);
    });

document.getElementById('container').innerHTML = dateRange.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Date Formats -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Date Formats</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('date-formats', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// ISO format (default): 2026-02-03
UiEngine::datePicker('iso_date')
    ->format('Y-m-d');

// US format: 02/03/2026
UiEngine::datePicker('us_date')
    ->format('m/d/Y')
    ->displayFormat('MM/DD/YYYY');

// European format: 03/02/2026
UiEngine::datePicker('eu_date')
    ->format('d/m/Y')
    ->displayFormat('DD/MM/YYYY');

// Long format: February 3, 2026
UiEngine::datePicker('long_date')
    ->format('Y-m-d')
    ->displayFormat('MMMM D, YYYY');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// ISO format (default): 2026-02-03
UiEngine.datePicker('iso_date')
    .format('Y-m-d');

// US format: 02/03/2026
UiEngine.datePicker('us_date')
    .format('m/d/Y')
    .displayFormat('MM/DD/YYYY');

// European format: 03/02/2026
UiEngine.datePicker('eu_date')
    .format('d/m/Y')
    .displayFormat('DD/MM/YYYY');

// Long format: February 3, 2026
UiEngine.datePicker('long_date')
    .format('Y-m-d')
    .displayFormat('MMMM D, YYYY');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Default Value -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Default Value</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-default">Event Date</label>
                        <input type="date" class="so-form-control" id="demo-default" value="<?= date('Y-m-d') ?>">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('date-default', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Today's date
\$datePicker = UiEngine::datePicker('event_date')
    ->label('Event Date')
    ->value(date('Y-m-d'));

// Specific date
\$datePicker = UiEngine::datePicker('deadline')
    ->label('Deadline')
    ->value('2026-12-31');

// From database
\$datePicker = UiEngine::datePicker('created_at')
    ->label('Created Date')
    ->value(\$record->created_at->format('Y-m-d'));"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Today's date
const datePicker = UiEngine.datePicker('event_date')
    .label('Event Date')
    .value(new Date().toISOString().split('T')[0]);

// Specific date
const deadline = UiEngine.datePicker('deadline')
    .label('Deadline')
    .value('2026-12-31');

// From data
const created = UiEngine.datePicker('created_at')
    .label('Created Date')
    .value(record.created_at);"
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
                                <td><code>string $date</code></td>
                                <td>Set the date value</td>
                            </tr>
                            <tr>
                                <td><code>min()</code></td>
                                <td><code>string $date</code></td>
                                <td>Set minimum selectable date</td>
                            </tr>
                            <tr>
                                <td><code>max()</code></td>
                                <td><code>string $date</code></td>
                                <td>Set maximum selectable date</td>
                            </tr>
                            <tr>
                                <td><code>format()</code></td>
                                <td><code>string $format</code></td>
                                <td>Set the value format (for submission)</td>
                            </tr>
                            <tr>
                                <td><code>displayFormat()</code></td>
                                <td><code>string $format</code></td>
                                <td>Set the display format</td>
                            </tr>
                            <tr>
                                <td><code>disabledDates()</code></td>
                                <td><code>array $dates</code></td>
                                <td>Disable specific dates</td>
                            </tr>
                            <tr>
                                <td><code>disabledDays()</code></td>
                                <td><code>array $days</code></td>
                                <td>Disable days of week (0=Sun, 6=Sat)</td>
                            </tr>
                            <tr>
                                <td><code>onChange()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Date change callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
