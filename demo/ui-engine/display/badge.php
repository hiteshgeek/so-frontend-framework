<?php
/**
 * SixOrbit UI Engine - Badge Element Demo
 */

$pageTitle = 'Badge - UI Engine';
$pageDescription = 'Small labels for counts and status indicators';

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
                <li class="so-breadcrumb-item"><a href="../index.php#display">Display Elements</a></li>
                <li class="so-breadcrumb-item so-active">Badge</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">new_releases</span>
            Badge
        </h1>
        <p class="so-page-subtitle">Small labels for displaying counts, status indicators, and categorization.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Badges -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Badges</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <span class="so-badge so-bg-primary">Primary</span>
                    <span class="so-badge so-bg-secondary">Secondary</span>
                    <span class="so-badge so-bg-success">Success</span>
                    <span class="so-badge so-bg-danger">Danger</span>
                    <span class="so-badge so-bg-warning so-text-dark">Warning</span>
                    <span class="so-badge so-bg-info">Info</span>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-badges', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

echo UiEngine::badge('Primary')->variant('primary');
echo UiEngine::badge('Secondary')->variant('secondary');
echo UiEngine::badge('Success')->variant('success');
echo UiEngine::badge('Danger')->variant('danger');
echo UiEngine::badge('Warning')->variant('warning');
echo UiEngine::badge('Info')->variant('info');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.badge('Primary').variant('primary').toHtml();
UiEngine.badge('Secondary').variant('secondary').toHtml();
UiEngine.badge('Success').variant('success').toHtml();
UiEngine.badge('Danger').variant('danger').toHtml();
UiEngine.badge('Warning').variant('warning').toHtml();
UiEngine.badge('Info').variant('info').toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Pill Badges -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Pill Badges</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <span class="so-badge so-rounded-pill so-bg-primary">Primary</span>
                    <span class="so-badge so-rounded-pill so-bg-secondary">Secondary</span>
                    <span class="so-badge so-rounded-pill so-bg-success">Success</span>
                    <span class="so-badge so-rounded-pill so-bg-danger">Danger</span>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('pill-badges', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::badge('Primary')->variant('primary')->pill();
UiEngine::badge('Secondary')->variant('secondary')->pill();
UiEngine::badge('Success')->variant('success')->pill();
UiEngine::badge('Danger')->variant('danger')->pill();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.badge('Primary').variant('primary').pill().toHtml();
UiEngine.badge('Secondary').variant('secondary').pill().toHtml();
UiEngine.badge('Success').variant('success').pill().toHtml();
UiEngine.badge('Danger').variant('danger').pill().toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Badge with Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Icons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <span class="so-badge so-bg-success">
                        <span class="material-icons" style="font-size: 14px; vertical-align: middle;">check</span> Verified
                    </span>
                    <span class="so-badge so-bg-danger">
                        <span class="material-icons" style="font-size: 14px; vertical-align: middle;">close</span> Rejected
                    </span>
                    <span class="so-badge so-bg-warning so-text-dark">
                        <span class="material-icons" style="font-size: 14px; vertical-align: middle;">schedule</span> Pending
                    </span>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('badge-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::badge('Verified')->variant('success')->icon('check');
UiEngine::badge('Rejected')->variant('danger')->icon('close');
UiEngine::badge('Pending')->variant('warning')->icon('schedule');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.badge('Verified').variant('success').icon('check').toHtml();
UiEngine.badge('Rejected').variant('danger').icon('close').toHtml();
UiEngine.badge('Pending').variant('warning').icon('schedule').toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Badge as Counter -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">As Counter</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <button type="button" class="so-btn so-btn-primary so-position-relative">
                        Inbox
                        <span class="so-position-absolute so-top-0 so-start-100 so-translate-middle so-badge so-rounded-pill so-bg-danger">
                            99+
                        </span>
                    </button>
                    <button type="button" class="so-btn so-btn-secondary so-position-relative so-ms-3">
                        Notifications
                        <span class="so-position-absolute so-top-0 so-start-100 so-translate-middle so-badge so-rounded-pill so-bg-primary">
                            5
                        </span>
                    </button>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('badge-counter', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$button = UiEngine::button('Inbox')
    ->variant('primary')
    ->badge(UiEngine::badge('99+')->variant('danger')->pill());

\$button2 = UiEngine::button('Notifications')
    ->variant('secondary')
    ->badge(UiEngine::badge('5')->variant('primary')->pill());"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const button = UiEngine.button('Inbox')
    .variant('primary')
    .badge(UiEngine.badge('99+').variant('danger').pill());

const button2 = UiEngine.button('Notifications')
    .variant('secondary')
    .badge(UiEngine.badge('5').variant('primary').pill());"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Dot Badges -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Dot Badges (Status Indicators)</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-mb-2">
                        <span class="so-badge so-bg-success" style="width:10px;height:10px;padding:0;border-radius:50%;"></span>
                        <span class="so-ms-2">Online</span>
                    </div>
                    <div class="so-mb-2">
                        <span class="so-badge so-bg-warning" style="width:10px;height:10px;padding:0;border-radius:50%;"></span>
                        <span class="so-ms-2">Away</span>
                    </div>
                    <div>
                        <span class="so-badge so-bg-danger" style="width:10px;height:10px;padding:0;border-radius:50%;"></span>
                        <span class="so-ms-2">Offline</span>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('badge-dot', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Dot badge for status indicators
UiEngine::badge()->variant('success')->dot()->label('Online');
UiEngine::badge()->variant('warning')->dot()->label('Away');
UiEngine::badge()->variant('danger')->dot()->label('Offline');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Dot badge for status indicators
UiEngine.badge().variant('success').dot().label('Online').toHtml();
UiEngine.badge().variant('warning').dot().label('Away').toHtml();
UiEngine.badge().variant('danger').dot().label('Offline').toHtml();"
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
                                <td><code>variant()</code></td>
                                <td><code>string $variant</code></td>
                                <td>Set variant: primary, secondary, success, danger, warning, info</td>
                            </tr>
                            <tr>
                                <td><code>pill()</code></td>
                                <td>-</td>
                                <td>Use pill (rounded) style</td>
                            </tr>
                            <tr>
                                <td><code>icon()</code></td>
                                <td><code>string $icon</code></td>
                                <td>Add icon to badge</td>
                            </tr>
                            <tr>
                                <td><code>dot()</code></td>
                                <td>-</td>
                                <td>Show as dot indicator</td>
                            </tr>
                            <tr>
                                <td><code>label()</code></td>
                                <td><code>string $label</code></td>
                                <td>Add text label after dot badge</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
