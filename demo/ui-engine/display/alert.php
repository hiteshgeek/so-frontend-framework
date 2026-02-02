<?php
/**
 * SixOrbit UI Engine - Alert Element Demo
 */

$pageTitle = 'Alert - UI Engine';
$pageDescription = 'Contextual feedback messages for user actions';

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
                <li class="so-breadcrumb-item so-active">Alert</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">warning</span>
            Alert
        </h1>
        <p class="so-page-subtitle">Contextual feedback messages for user actions and important notifications.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Alerts -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Alerts</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-alert so-alert-primary" role="alert">This is a primary alert message.</div>
                    <div class="so-alert so-alert-success" role="alert">This is a success alert message.</div>
                    <div class="so-alert so-alert-warning" role="alert">This is a warning alert message.</div>
                    <div class="so-alert so-alert-danger" role="alert">This is a danger alert message.</div>
                    <div class="so-alert so-alert-info so-mb-0" role="alert">This is an info alert message.</div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-alerts', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

echo UiEngine::alert('This is a primary alert message.')->variant('primary');
echo UiEngine::alert('This is a success alert message.')->variant('success');
echo UiEngine::alert('This is a warning alert message.')->variant('warning');
echo UiEngine::alert('This is a danger alert message.')->variant('danger');
echo UiEngine::alert('This is an info alert message.')->variant('info');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.alert('This is a primary alert message.').variant('primary').toHtml();
UiEngine.alert('This is a success alert message.').variant('success').toHtml();
UiEngine.alert('This is a warning alert message.').variant('warning').toHtml();
UiEngine.alert('This is a danger alert message.').variant('danger').toHtml();
UiEngine.alert('This is an info alert message.').variant('info').toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Icons -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Icons</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-alert so-alert-success so-d-flex so-align-items-center" role="alert">
                        <span class="material-icons so-me-2">check_circle</span>
                        <div>Your changes have been saved successfully!</div>
                    </div>
                    <div class="so-alert so-alert-danger so-d-flex so-align-items-center so-mb-0" role="alert">
                        <span class="material-icons so-me-2">error</span>
                        <div>An error occurred while processing your request.</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('alert-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "UiEngine::alert('Your changes have been saved successfully!')
    ->variant('success')
    ->icon('check_circle');

UiEngine::alert('An error occurred while processing your request.')
    ->variant('danger')
    ->icon('error');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.alert('Your changes have been saved successfully!')
    .variant('success')
    .icon('check_circle')
    .toHtml();

UiEngine.alert('An error occurred while processing your request.')
    .variant('danger')
    .icon('error')
    .toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Dismissible Alerts -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Dismissible Alerts</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-alert so-alert-warning so-alert-dismissible so-fade so-show" role="alert">
                        <strong>Warning!</strong> Your session will expire in 5 minutes.
                        <button type="button" class="so-btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('alert-dismissible', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$alert = UiEngine::alert('Your session will expire in 5 minutes.')
    ->variant('warning')
    ->title('Warning!')
    ->dismissible();

echo \$alert->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const alert = UiEngine.alert('Your session will expire in 5 minutes.')
    .variant('warning')
    .title('Warning!')
    .dismissible()
    .onDismiss(() => {
        console.log('Alert dismissed');
    });

document.getElementById('container').innerHTML = alert.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Additional Content -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Additional Content</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-alert so-alert-success" role="alert">
                        <h4 class="so-alert-heading">Well done!</h4>
                        <p>You have successfully completed the registration process. Your account is now active and ready to use.</p>
                        <hr>
                        <p class="so-mb-0">Need help getting started? Check out our <a href="#" class="so-alert-link">documentation</a>.</p>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('alert-content', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$alert = UiEngine::alert()
    ->variant('success')
    ->title('Well done!')
    ->content('You have successfully completed the registration process. Your account is now active and ready to use.')
    ->footer('Need help getting started? Check out our <a href=\"#\" class=\"so-alert-link\">documentation</a>.');

echo \$alert->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const alert = UiEngine.alert()
    .variant('success')
    .title('Well done!')
    .content('You have successfully completed the registration process. Your account is now active and ready to use.')
    .footer('Need help getting started? Check out our <a href=\"#\" class=\"so-alert-link\">documentation</a>.');

document.getElementById('container').innerHTML = alert.toHtml();"
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
                                <td>Set variant: primary, success, warning, danger, info</td>
                            </tr>
                            <tr>
                                <td><code>title()</code></td>
                                <td><code>string $title</code></td>
                                <td>Set alert heading</td>
                            </tr>
                            <tr>
                                <td><code>content()</code></td>
                                <td><code>string $content</code></td>
                                <td>Set alert body content</td>
                            </tr>
                            <tr>
                                <td><code>icon()</code></td>
                                <td><code>string $icon</code></td>
                                <td>Add icon to alert</td>
                            </tr>
                            <tr>
                                <td><code>dismissible()</code></td>
                                <td>-</td>
                                <td>Make alert dismissible</td>
                            </tr>
                            <tr>
                                <td><code>footer()</code></td>
                                <td><code>string $content</code></td>
                                <td>Add footer content with separator</td>
                            </tr>
                            <tr>
                                <td><code>onDismiss()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Callback when alert is dismissed</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
