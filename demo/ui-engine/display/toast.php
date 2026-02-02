<?php
/**
 * SixOrbit UI Engine - Toast Element Demo
 */

$pageTitle = 'Toast - UI Engine';
$pageDescription = 'Lightweight notifications for user feedback';

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
                <li class="so-breadcrumb-item so-active">Toast</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">notifications</span>
            Toast
        </h1>
        <p class="so-page-subtitle">Lightweight notifications for providing user feedback without interrupting workflow.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Toast -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Toast</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-toast show" role="alert" style="position: static;">
                        <div class="so-toast-header">
                            <strong class="so-me-auto">Notification</strong>
                            <small>Just now</small>
                            <button type="button" class="so-btn-close" data-bs-dismiss="toast"></button>
                        </div>
                        <div class="so-toast-body">
                            Hello! This is a toast message.
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-toast', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$toast = UiEngine::toast()
    ->title('Notification')
    ->message('Hello! This is a toast message.')
    ->time('Just now');

echo \$toast->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Create and show toast
UiEngine.toast()
    .title('Notification')
    .message('Hello! This is a toast message.')
    .show();

// Or using the shorthand
UiEngine.showToast('Hello! This is a toast message.', 'Notification');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Toast Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Toast Variants</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('toast-variants', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Success toast
UiEngine::toast()
    ->variant('success')
    ->title('Success!')
    ->message('Your changes have been saved.')
    ->icon('check_circle');

// Error toast
UiEngine::toast()
    ->variant('danger')
    ->title('Error!')
    ->message('Something went wrong.')
    ->icon('error');

// Warning toast
UiEngine::toast()
    ->variant('warning')
    ->title('Warning')
    ->message('Please review your input.')
    ->icon('warning');

// Info toast
UiEngine::toast()
    ->variant('info')
    ->title('Info')
    ->message('New features available.')
    ->icon('info');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Success toast
UiEngine.toast().success('Your changes have been saved.');

// Error toast
UiEngine.toast().error('Something went wrong.');

// Warning toast
UiEngine.toast().warning('Please review your input.');

// Info toast
UiEngine.toast().info('New features available.');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Toast Positions -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Toast Positions</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('toast-positions', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Position options
UiEngine::toast()->position('top-right');     // Default
UiEngine::toast()->position('top-left');
UiEngine::toast()->position('top-center');
UiEngine::toast()->position('bottom-right');
UiEngine::toast()->position('bottom-left');
UiEngine::toast()->position('bottom-center');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Position options
UiEngine.toast()
    .message('Message')
    .position('top-right')  // Default
    .show();

// Available positions:
// 'top-right', 'top-left', 'top-center'
// 'bottom-right', 'bottom-left', 'bottom-center'"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Auto-dismiss and Duration -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Auto-dismiss Options</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('toast-duration', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Auto-dismiss after 5 seconds (default)
UiEngine::toast()
    ->message('Auto-dismiss toast')
    ->duration(5000);

// Persistent toast (no auto-dismiss)
UiEngine::toast()
    ->message('This stays until dismissed')
    ->persistent();

// Custom duration
UiEngine::toast()
    ->message('Quick notification')
    ->duration(2000); // 2 seconds"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Auto-dismiss after 5 seconds (default)
UiEngine.toast()
    .message('Auto-dismiss toast')
    .duration(5000)
    .show();

// Persistent toast (no auto-dismiss)
UiEngine.toast()
    .message('This stays until dismissed')
    .persistent()
    .show();

// Quick notification
UiEngine.toast()
    .message('Quick notification')
    .duration(2000)
    .show();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Stacking Toasts -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Stacking Multiple Toasts</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('toast-stack', [
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Multiple toasts stack automatically
UiEngine.toast().success('File uploaded').show();
UiEngine.toast().info('Processing...').show();
UiEngine.toast().success('Complete!').show();

// Clear all toasts
UiEngine.clearAllToasts();

// Limit number of visible toasts
UiEngine.toast.maxVisible = 3; // Only show 3 at a time"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Actions -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Action Buttons</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('toast-actions', [
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "UiEngine.toast()
    .title('File deleted')
    .message('document.pdf has been deleted.')
    .action('Undo', () => {
        // Undo action
        restoreFile();
    })
    .duration(10000) // Give time to undo
    .show();"
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
                                <td><code>title()</code></td>
                                <td><code>string $title</code></td>
                                <td>Set toast title</td>
                            </tr>
                            <tr>
                                <td><code>message()</code></td>
                                <td><code>string $message</code></td>
                                <td>Set toast message</td>
                            </tr>
                            <tr>
                                <td><code>variant()</code></td>
                                <td><code>string $variant</code></td>
                                <td>Set variant: success, danger, warning, info</td>
                            </tr>
                            <tr>
                                <td><code>icon()</code></td>
                                <td><code>string $icon</code></td>
                                <td>Set toast icon</td>
                            </tr>
                            <tr>
                                <td><code>position()</code></td>
                                <td><code>string $position</code></td>
                                <td>Set position on screen</td>
                            </tr>
                            <tr>
                                <td><code>duration()</code></td>
                                <td><code>int $ms</code></td>
                                <td>Auto-dismiss duration in ms</td>
                            </tr>
                            <tr>
                                <td><code>persistent()</code></td>
                                <td>-</td>
                                <td>Disable auto-dismiss</td>
                            </tr>
                            <tr>
                                <td><code>show()</code></td>
                                <td>-</td>
                                <td>Display the toast (JS only)</td>
                            </tr>
                            <tr>
                                <td><code>hide()</code></td>
                                <td>-</td>
                                <td>Hide the toast (JS only)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
