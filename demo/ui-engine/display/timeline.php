<?php
/**
 * SixOrbit UI Engine - Timeline Element Demo
 */

$pageTitle = 'Timeline - UI Engine';
$pageDescription = 'Vertical timeline for displaying events';

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
                <li class="so-breadcrumb-item so-active">Timeline</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">timeline</span>
            Timeline
        </h1>
        <p class="so-page-subtitle">Vertical timeline for displaying chronological events and activity feeds.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Timeline -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Timeline</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('basic-timeline', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$timeline = UiEngine::timeline()
    ->event('Project Started', 'Initial project setup and configuration', 'Jan 15, 2026')
    ->event('Design Complete', 'UI/UX design finalized and approved', 'Jan 22, 2026')
    ->event('Development', 'Backend and frontend development in progress', 'Feb 1, 2026')
    ->event('Testing', 'QA testing and bug fixes', 'Feb 10, 2026');

echo \$timeline->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const timeline = UiEngine.timeline()
    .event('Project Started', 'Initial project setup and configuration', 'Jan 15, 2026')
    .event('Design Complete', 'UI/UX design finalized and approved', 'Jan 22, 2026')
    .event('Development', 'Backend and frontend development in progress', 'Feb 1, 2026')
    .event('Testing', 'QA testing and bug fixes', 'Feb 10, 2026');

document.getElementById('container').innerHTML = timeline.toHtml();"
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
                <!-- Code Tabs -->
                <?= so_code_tabs('timeline-icons', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$timeline = UiEngine::timeline()
    ->event('Order Placed', 'Your order has been placed', '10:30 AM', [
        'icon' => 'shopping_cart',
        'color' => 'primary',
    ])
    ->event('Payment Confirmed', 'Payment received successfully', '10:32 AM', [
        'icon' => 'payment',
        'color' => 'success',
    ])
    ->event('Processing', 'Order is being prepared', '11:00 AM', [
        'icon' => 'inventory',
        'color' => 'info',
    ])
    ->event('Shipped', 'Package dispatched', '2:00 PM', [
        'icon' => 'local_shipping',
        'color' => 'warning',
    ]);

echo \$timeline->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const timeline = UiEngine.timeline()
    .event('Order Placed', 'Your order has been placed', '10:30 AM', {
        icon: 'shopping_cart',
        color: 'primary',
    })
    .event('Payment Confirmed', 'Payment received successfully', '10:32 AM', {
        icon: 'payment',
        color: 'success',
    })
    .event('Processing', 'Order is being prepared', '11:00 AM', {
        icon: 'inventory',
        color: 'info',
    })
    .event('Shipped', 'Package dispatched', '2:00 PM', {
        icon: 'local_shipping',
        color: 'warning',
    });

document.getElementById('container').innerHTML = timeline.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Activity Feed -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Activity Feed</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('timeline-activity', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$timeline = UiEngine::timeline()
    ->compact()  // Compact style for activity feeds
    ->event(null, '<strong>John Doe</strong> created a new project', '2 hours ago', [
        'avatar' => '/avatars/john.jpg',
    ])
    ->event(null, '<strong>Jane Smith</strong> commented on the task', '4 hours ago', [
        'avatar' => '/avatars/jane.jpg',
    ])
    ->event(null, '<strong>Bob Wilson</strong> completed the milestone', 'Yesterday', [
        'avatar' => '/avatars/bob.jpg',
    ]);

echo \$timeline->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const timeline = UiEngine.timeline()
    .compact()
    .event(null, '<strong>John Doe</strong> created a new project', '2 hours ago', {
        avatar: '/avatars/john.jpg',
    })
    .event(null, '<strong>Jane Smith</strong> commented on the task', '4 hours ago', {
        avatar: '/avatars/jane.jpg',
    })
    .event(null, '<strong>Bob Wilson</strong> completed the milestone', 'Yesterday', {
        avatar: '/avatars/bob.jpg',
    });

document.getElementById('container').innerHTML = timeline.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Alternating Layout -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Alternating Layout</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('timeline-alternating', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$timeline = UiEngine::timeline()
    ->alternating()  // Events alternate left/right
    ->event('2020', 'Company Founded', 'Started with a small team of 3')
    ->event('2021', 'Series A', 'Raised \$5M in funding')
    ->event('2022', 'Global Expansion', 'Opened offices in 5 countries')
    ->event('2023', 'IPO', 'Successfully went public');

echo \$timeline->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const timeline = UiEngine.timeline()
    .alternating()
    .event('2020', 'Company Founded', 'Started with a small team of 3')
    .event('2021', 'Series A', 'Raised $5M in funding')
    .event('2022', 'Global Expansion', 'Opened offices in 5 countries')
    .event('2023', 'IPO', 'Successfully went public');

document.getElementById('container').innerHTML = timeline.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Custom Content -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Custom Content</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('timeline-custom', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$timeline = UiEngine::timeline()
    ->event('Meeting Scheduled', UiEngine::card()
        ->body('Team sync meeting')
        ->footer('10:00 AM - 11:00 AM')
        ->render()
    , 'Tomorrow', ['icon' => 'event'])
    ->event('Task Completed', UiEngine::alert('Great job!')
        ->variant('success')
        ->render()
    , 'Today', ['icon' => 'check_circle', 'color' => 'success']);

echo \$timeline->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const timeline = UiEngine.timeline()
    .event('Meeting Scheduled', UiEngine.card()
        .body('Team sync meeting')
        .footer('10:00 AM - 11:00 AM')
        .toHtml()
    , 'Tomorrow', {icon: 'event'})
    .event('Task Completed', UiEngine.alert('Great job!')
        .variant('success')
        .toHtml()
    , 'Today', {icon: 'check_circle', color: 'success'});

document.getElementById('container').innerHTML = timeline.toHtml();"
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
                                <td><code>event()</code></td>
                                <td><code>string $title, string $content, string $time, array $options</code></td>
                                <td>Add a timeline event</td>
                            </tr>
                            <tr>
                                <td><code>events()</code></td>
                                <td><code>array $events</code></td>
                                <td>Add multiple events</td>
                            </tr>
                            <tr>
                                <td><code>compact()</code></td>
                                <td>-</td>
                                <td>Use compact style</td>
                            </tr>
                            <tr>
                                <td><code>alternating()</code></td>
                                <td>-</td>
                                <td>Alternate left/right layout</td>
                            </tr>
                            <tr>
                                <td><code>reverse()</code></td>
                                <td>-</td>
                                <td>Reverse event order</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
