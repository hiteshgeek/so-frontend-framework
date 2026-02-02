<?php
/**
 * SixOrbit UI Engine - Media Object Element Demo
 */

$pageTitle = 'Media Object - UI Engine';
$pageDescription = 'Layout for media with text content';

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
                <li class="so-breadcrumb-item so-active">Media Object</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">perm_media</span>
            Media Object
        </h1>
        <p class="so-page-subtitle">Layout pattern for media (image, icon) alongside text content, commonly used for comments and feeds.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Media Object -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Media Object</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-d-flex">
                        <div class="so-flex-shrink-0">
                            <div style="width:64px;height:64px;background:#6c757d;border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                <span class="material-icons so-text-white">person</span>
                            </div>
                        </div>
                        <div class="so-flex-grow-1 so-ms-3">
                            <h5 class="so-mt-0">John Doe</h5>
                            <p class="so-mb-0">This is some placeholder content for the media object. It demonstrates how text wraps around the media element.</p>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-media', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$media = UiEngine::mediaObject()
    ->avatar('/avatars/john.jpg', 'John Doe')
    ->title('John Doe')
    ->body('This is some placeholder content for the media object.');

echo \$media->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const media = UiEngine.mediaObject()
    .avatar('/avatars/john.jpg', 'John Doe')
    .title('John Doe')
    .body('This is some placeholder content for the media object.');

document.getElementById('container').innerHTML = media.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Icon -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Icon Instead of Image</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('media-icon', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$media = UiEngine::mediaObject()
    ->icon('notifications', 'primary')
    ->title('New Notification')
    ->body('You have received a new message from the support team.');

echo \$media->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const media = UiEngine.mediaObject()
    .icon('notifications', 'primary')
    .title('New Notification')
    .body('You have received a new message from the support team.');

document.getElementById('container').innerHTML = media.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Media Position -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Media Position</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('media-position', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Media on the left (default)
UiEngine::mediaObject()
    ->avatar('/avatar.jpg')
    ->position('start')  // or 'left'
    ->title('Left Aligned')
    ->body('Media is on the left side.');

// Media on the right
UiEngine::mediaObject()
    ->avatar('/avatar.jpg')
    ->position('end')  // or 'right'
    ->title('Right Aligned')
    ->body('Media is on the right side.');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Media on the left (default)
UiEngine.mediaObject()
    .avatar('/avatar.jpg')
    .position('start')
    .title('Left Aligned')
    .body('Media is on the left side.');

// Media on the right
UiEngine.mediaObject()
    .avatar('/avatar.jpg')
    .position('end')
    .title('Right Aligned')
    .body('Media is on the right side.');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Vertical Alignment -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Vertical Alignment</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('media-align', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Top aligned (default)
UiEngine::mediaObject()
    ->avatar('/avatar.jpg')
    ->align('top')
    ->title('Top Aligned')
    ->body('Long content here...');

// Center aligned
UiEngine::mediaObject()
    ->avatar('/avatar.jpg')
    ->align('center')
    ->title('Center Aligned')
    ->body('Long content here...');

// Bottom aligned
UiEngine::mediaObject()
    ->avatar('/avatar.jpg')
    ->align('bottom')
    ->title('Bottom Aligned')
    ->body('Long content here...');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Top aligned (default)
UiEngine.mediaObject()
    .avatar('/avatar.jpg')
    .align('top')
    .title('Top Aligned')
    .body('Long content here...');

// Center aligned
UiEngine.mediaObject()
    .avatar('/avatar.jpg')
    .align('center')
    .title('Center Aligned')
    .body('Long content here...');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Nested Media Objects -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Nested Media Objects (Comments)</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('media-nested', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$comment = UiEngine::mediaObject()
    ->avatar('/avatars/john.jpg')
    ->title('John Doe')
    ->subtitle('2 hours ago')
    ->body('This is a parent comment.')
    ->child(UiEngine::mediaObject()
        ->avatar('/avatars/jane.jpg')
        ->title('Jane Smith')
        ->subtitle('1 hour ago')
        ->body('This is a reply to the comment.')
    )
    ->child(UiEngine::mediaObject()
        ->avatar('/avatars/bob.jpg')
        ->title('Bob Wilson')
        ->subtitle('30 minutes ago')
        ->body('Another reply here.')
    );

echo \$comment->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const comment = UiEngine.mediaObject()
    .avatar('/avatars/john.jpg')
    .title('John Doe')
    .subtitle('2 hours ago')
    .body('This is a parent comment.')
    .child(UiEngine.mediaObject()
        .avatar('/avatars/jane.jpg')
        .title('Jane Smith')
        .subtitle('1 hour ago')
        .body('This is a reply to the comment.')
    )
    .child(UiEngine.mediaObject()
        .avatar('/avatars/bob.jpg')
        .title('Bob Wilson')
        .subtitle('30 minutes ago')
        .body('Another reply here.')
    );

document.getElementById('container').innerHTML = comment.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Media Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Media Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('media-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small media (32px)
UiEngine::mediaObject()
    ->avatar('/avatar.jpg')
    ->mediaSize('sm')
    ->title('Small');

// Medium media (48px) - default
UiEngine::mediaObject()
    ->avatar('/avatar.jpg')
    ->title('Medium');

// Large media (64px)
UiEngine::mediaObject()
    ->avatar('/avatar.jpg')
    ->mediaSize('lg')
    ->title('Large');

// Custom size
UiEngine::mediaObject()
    ->avatar('/avatar.jpg')
    ->mediaSize(100) // 100px
    ->title('Custom Size');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small media (32px)
UiEngine.mediaObject()
    .avatar('/avatar.jpg')
    .mediaSize('sm')
    .title('Small');

// Large media (64px)
UiEngine.mediaObject()
    .avatar('/avatar.jpg')
    .mediaSize('lg')
    .title('Large');

// Custom size
UiEngine.mediaObject()
    .avatar('/avatar.jpg')
    .mediaSize(100)
    .title('Custom Size');"
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
                                <td><code>avatar()</code></td>
                                <td><code>string $src, string $alt</code></td>
                                <td>Set avatar image</td>
                            </tr>
                            <tr>
                                <td><code>icon()</code></td>
                                <td><code>string $icon, string $color</code></td>
                                <td>Use icon instead of image</td>
                            </tr>
                            <tr>
                                <td><code>title()</code></td>
                                <td><code>string $title</code></td>
                                <td>Set title text</td>
                            </tr>
                            <tr>
                                <td><code>subtitle()</code></td>
                                <td><code>string $subtitle</code></td>
                                <td>Set subtitle text</td>
                            </tr>
                            <tr>
                                <td><code>body()</code></td>
                                <td><code>string $content</code></td>
                                <td>Set body content</td>
                            </tr>
                            <tr>
                                <td><code>position()</code></td>
                                <td><code>string $position</code></td>
                                <td>Media position: start, end</td>
                            </tr>
                            <tr>
                                <td><code>align()</code></td>
                                <td><code>string $align</code></td>
                                <td>Vertical align: top, center, bottom</td>
                            </tr>
                            <tr>
                                <td><code>mediaSize()</code></td>
                                <td><code>string|int $size</code></td>
                                <td>Media size: sm, lg, or pixels</td>
                            </tr>
                            <tr>
                                <td><code>child()</code></td>
                                <td><code>MediaObject $child</code></td>
                                <td>Add nested media object</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
