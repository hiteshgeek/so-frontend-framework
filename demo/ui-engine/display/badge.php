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
        <div class="so-page-header-left">
            <h1 class="so-page-title">Badge</h1>
            <p class="so-page-subtitle">Small labels for displaying counts, status indicators, and categorization.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Badges -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Badges</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                    <span class="so-badge so-badge-primary">Primary</span>
                    <span class="so-badge so-badge-secondary">Secondary</span>
                    <span class="so-badge so-badge-success">Success</span>
                    <span class="so-badge so-badge-danger">Danger</span>
                    <span class="so-badge so-badge-warning">Warning</span>
                    <span class="so-badge so-badge-info">Info</span>
                    <span class="so-badge so-badge-light">Light</span>
                    <span class="so-badge so-badge-dark">Dark</span>
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
echo UiEngine::badge('Info')->variant('info');
echo UiEngine::badge('Light')->variant('light');
echo UiEngine::badge('Dark')->variant('dark');"
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<span class="so-badge so-badge-primary">Primary</span>
<span class="so-badge so-badge-secondary">Secondary</span>
<span class="so-badge so-badge-success">Success</span>
<span class="so-badge so-badge-danger">Danger</span>
<span class="so-badge so-badge-warning">Warning</span>
<span class="so-badge so-badge-info">Info</span>
<span class="so-badge so-badge-light">Light</span>
<span class="so-badge so-badge-dark">Dark</span>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Soft Badges -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Soft Badges</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-3">Light background variants for a softer appearance.</p>
                <!-- Live Demo -->
                <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                    <span class="so-badge so-badge-soft-primary">Primary</span>
                    <span class="so-badge so-badge-soft-secondary">Secondary</span>
                    <span class="so-badge so-badge-soft-success">Success</span>
                    <span class="so-badge so-badge-soft-danger">Danger</span>
                    <span class="so-badge so-badge-soft-warning">Warning</span>
                    <span class="so-badge so-badge-soft-info">Info</span>
                    <span class="so-badge so-badge-soft-light">Light</span>
                    <span class="so-badge so-badge-soft-dark">Dark</span>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('soft-badges', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::badge('Primary')->variant('primary')->soft();
UiEngine::badge('Success')->variant('success')->soft();
UiEngine::badge('Danger')->variant('danger')->soft();
UiEngine::badge('Warning')->variant('warning')->soft();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.badge('Primary').variant('primary').soft().toHtml();
UiEngine.badge('Success').variant('success').soft().toHtml();
UiEngine.badge('Danger').variant('danger').soft().toHtml();
UiEngine.badge('Warning').variant('warning').soft().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<span class="so-badge so-badge-soft-primary">Primary</span>
<span class="so-badge so-badge-soft-success">Success</span>
<span class="so-badge so-badge-soft-danger">Danger</span>
<span class="so-badge so-badge-soft-warning">Warning</span>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Badge Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Badge Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-flex so-gap-2 so-items-center so-flex-wrap so-mb-4">
                    <span class="so-badge so-badge-primary so-badge-sm">Small</span>
                    <span class="so-badge so-badge-primary">Default</span>
                    <span class="so-badge so-badge-primary so-badge-lg">Large</span>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('badge-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small badge
UiEngine::badge('Small')->variant('primary')->small();

// Default badge
UiEngine::badge('Default')->variant('primary');

// Large badge
UiEngine::badge('Large')->variant('primary')->large();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small badge
UiEngine.badge('Small').variant('primary').small().toHtml();

// Default badge
UiEngine.badge('Default').variant('primary').toHtml();

// Large badge
UiEngine.badge('Large').variant('primary').large().toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<span class="so-badge so-badge-primary so-badge-sm">Small</span>
<span class="so-badge so-badge-primary">Default</span>
<span class="so-badge so-badge-primary so-badge-lg">Large</span>'
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
                <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                    <span class="so-badge so-badge-pill so-badge-primary">Primary</span>
                    <span class="so-badge so-badge-pill so-badge-secondary">Secondary</span>
                    <span class="so-badge so-badge-pill so-badge-success">Success</span>
                    <span class="so-badge so-badge-pill so-badge-danger">Danger</span>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<span class="so-badge so-badge-pill so-badge-primary">Primary</span>
<span class="so-badge so-badge-pill so-badge-secondary">Secondary</span>
<span class="so-badge so-badge-pill so-badge-success">Success</span>
<span class="so-badge so-badge-pill so-badge-danger">Danger</span>'
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
                <div class="so-flex so-gap-2 so-flex-wrap so-mb-4">
                    <span class="so-badge so-badge-success">
                        <span class="material-icons" style="font-size: 14px; vertical-align: middle;">check</span> Verified
                    </span>
                    <span class="so-badge so-badge-danger">
                        <span class="material-icons" style="font-size: 14px; vertical-align: middle;">close</span> Rejected
                    </span>
                    <span class="so-badge so-badge-warning">
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<span class="so-badge so-badge-success">
    <span class="material-icons" style="font-size: 14px; vertical-align: middle;">check</span> Verified
</span>
<span class="so-badge so-badge-danger">
    <span class="material-icons" style="font-size: 14px; vertical-align: middle;">close</span> Rejected
</span>
<span class="so-badge so-badge-warning">
    <span class="material-icons" style="font-size: 14px; vertical-align: middle;">schedule</span> Pending
</span>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Dot Badges (Status Indicators) -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Dot Badges (Status Indicators)</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-mb-4">
                    <div class="so-d-inline-flex so-align-items-center so-gap-2 so-mb-2 so-me-4">
                        <span class="so-badge so-badge-dot so-badge-success"></span>
                        <span>Online</span>
                    </div>
                    <div class="so-d-inline-flex so-align-items-center so-gap-2 so-mb-2 so-me-4">
                        <span class="so-badge so-badge-dot so-badge-warning"></span>
                        <span>Away</span>
                    </div>
                    <div class="so-d-inline-flex so-align-items-center so-gap-2 so-mb-2">
                        <span class="so-badge so-badge-dot so-badge-danger"></span>
                        <span>Offline</span>
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
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<span class="so-d-inline-flex so-align-items-center so-gap-2">
    <span class="so-badge so-badge-dot so-badge-success"></span>
    <span>Online</span>
</span>
<span class="so-d-inline-flex so-align-items-center so-gap-2">
    <span class="so-badge so-badge-dot so-badge-warning"></span>
    <span>Away</span>
</span>
<span class="so-d-inline-flex so-align-items-center so-gap-2">
    <span class="so-badge so-badge-dot so-badge-danger"></span>
    <span>Offline</span>
</span>'
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
                                <td>Set variant: primary, secondary, success, danger, warning, info, light, dark</td>
                            </tr>
                            <tr>
                                <td><code>soft()</code></td>
                                <td><code>bool $soft = true</code></td>
                                <td>Use soft/light background style</td>
                            </tr>
                            <tr>
                                <td><code>pill()</code></td>
                                <td><code>bool $pill = true</code></td>
                                <td>Use pill (fully rounded) style</td>
                            </tr>
                            <tr>
                                <td><code>small()</code></td>
                                <td>-</td>
                                <td>Use small size</td>
                            </tr>
                            <tr>
                                <td><code>large()</code></td>
                                <td>-</td>
                                <td>Use large size</td>
                            </tr>
                            <tr>
                                <td><code>icon()</code></td>
                                <td><code>string $icon</code></td>
                                <td>Add Material icon to badge</td>
                            </tr>
                            <tr>
                                <td><code>dot()</code></td>
                                <td><code>bool $dot = true</code></td>
                                <td>Show as dot indicator (no text)</td>
                            </tr>
                            <tr>
                                <td><code>label()</code></td>
                                <td><code>string $label</code></td>
                                <td>Add text label after dot badge</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h5 class="so-mt-4 so-mb-3">CSS Classes Reference</h5>
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead class="so-table-light">
                            <tr>
                                <th>Class</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>.so-badge</code></td>
                                <td>Base badge class</td>
                            </tr>
                            <tr>
                                <td><code>.so-badge-{variant}</code></td>
                                <td>Solid color variant (primary, success, danger, etc.)</td>
                            </tr>
                            <tr>
                                <td><code>.so-badge-soft-{variant}</code></td>
                                <td>Soft/light background variant</td>
                            </tr>
                            <tr>
                                <td><code>.so-badge-sm</code></td>
                                <td>Small size</td>
                            </tr>
                            <tr>
                                <td><code>.so-badge-lg</code></td>
                                <td>Large size</td>
                            </tr>
                            <tr>
                                <td><code>.so-badge-pill</code></td>
                                <td>Fully rounded pill style</td>
                            </tr>
                            <tr>
                                <td><code>.so-badge-dot</code></td>
                                <td>Dot indicator style</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
