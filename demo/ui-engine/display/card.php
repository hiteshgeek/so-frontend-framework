<?php
/**
 * SixOrbit UI Engine - Card Element Demo
 */

$pageTitle = 'Card - UI Engine';
$pageDescription = 'Flexible content container with header, body, and footer';

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
                <li class="so-breadcrumb-item so-active">Card</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">credit_card</span>
            Card
        </h1>
        <p class="so-page-subtitle">Flexible content container with optional header, body, footer, and image support.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Card -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Card</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-card" style="max-width: 400px;">
                        <div class="so-card-body">
                            <h5 class="so-card-title">Card Title</h5>
                            <p class="so-card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="so-btn so-btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-card', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$card = UiEngine::card()
    ->title('Card Title')
    ->body('Some quick example text to build on the card title.')
    ->action(UiEngine::button('Go somewhere')->variant('primary'));

echo \$card->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const card = UiEngine.card()
    .title('Card Title')
    .body('Some quick example text to build on the card title.')
    .action(UiEngine.button('Go somewhere').variant('primary'));

document.getElementById('container').innerHTML = card.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Card with Header and Footer -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Header and Footer</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-card" style="max-width: 400px;">
                        <div class="so-card-header">Featured</div>
                        <div class="so-card-body">
                            <h5 class="so-card-title">Special title treatment</h5>
                            <p class="so-card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="so-btn so-btn-primary">Go somewhere</a>
                        </div>
                        <div class="so-card-footer so-text-muted">2 days ago</div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('card-header-footer', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$card = UiEngine::card()
    ->header('Featured')
    ->title('Special title treatment')
    ->body('With supporting text below as a natural lead-in to additional content.')
    ->action(UiEngine::button('Go somewhere')->variant('primary'))
    ->footer('2 days ago');

echo \$card->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const card = UiEngine.card()
    .header('Featured')
    .title('Special title treatment')
    .body('With supporting text below as a natural lead-in to additional content.')
    .action(UiEngine.button('Go somewhere').variant('primary'))
    .footer('2 days ago');

document.getElementById('container').innerHTML = card.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Card with Image -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Image</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-card" style="max-width: 300px;">
                        <div style="height:150px;background:#6c757d;display:flex;align-items:center;justify-content:center;">
                            <span class="material-icons so-text-white" style="font-size:48px;">image</span>
                        </div>
                        <div class="so-card-body">
                            <h5 class="so-card-title">Card with Image</h5>
                            <p class="so-card-text">This card has an image at the top.</p>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('card-image', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$card = UiEngine::card()
    ->image('/path/to/image.jpg', 'Image description')
    ->title('Card with Image')
    ->body('This card has an image at the top.');

// Image at bottom
\$card = UiEngine::card()
    ->title('Card with Image')
    ->body('This card has an image at the bottom.')
    ->image('/path/to/image.jpg', 'Image description', 'bottom');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const card = UiEngine.card()
    .image('/path/to/image.jpg', 'Image description')
    .title('Card with Image')
    .body('This card has an image at the top.');

// Image at bottom
const card2 = UiEngine.card()
    .title('Card with Image')
    .body('This card has an image at the bottom.')
    .image('/path/to/image.jpg', 'Image description', 'bottom');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Card Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Card Variants</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('card-variants', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Colored border
UiEngine::card()
    ->variant('primary')  // Border color
    ->title('Primary Card')
    ->body('Card with primary border.');

// Colored background
UiEngine::card()
    ->background('success')
    ->title('Success Card')
    ->body('Card with success background.');

// Shadow variations
UiEngine::card()
    ->shadow('sm')  // sm, md, lg, none
    ->title('Card with Shadow')
    ->body('This card has a subtle shadow.');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Colored border
UiEngine.card()
    .variant('primary')
    .title('Primary Card')
    .body('Card with primary border.');

// Colored background
UiEngine.card()
    .background('success')
    .title('Success Card')
    .body('Card with success background.');

// Shadow variations
UiEngine.card()
    .shadow('sm')
    .title('Card with Shadow')
    .body('This card has a subtle shadow.');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Horizontal Card -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Horizontal Card</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('card-horizontal', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$card = UiEngine::card()
    ->horizontal()
    ->image('/path/to/image.jpg')
    ->imageWidth(4)  // Grid columns (out of 12)
    ->title('Horizontal Card')
    ->body('This is a horizontal card layout with the image on the left.')
    ->footer('Last updated 3 mins ago');

echo \$card->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const card = UiEngine.card()
    .horizontal()
    .image('/path/to/image.jpg')
    .imageWidth(4)
    .title('Horizontal Card')
    .body('This is a horizontal card layout with the image on the left.')
    .footer('Last updated 3 mins ago');

document.getElementById('container').innerHTML = card.toHtml();"
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
                                <td><code>header()</code></td>
                                <td><code>string $content</code></td>
                                <td>Set card header content</td>
                            </tr>
                            <tr>
                                <td><code>title()</code></td>
                                <td><code>string $title</code></td>
                                <td>Set card title</td>
                            </tr>
                            <tr>
                                <td><code>subtitle()</code></td>
                                <td><code>string $subtitle</code></td>
                                <td>Set card subtitle</td>
                            </tr>
                            <tr>
                                <td><code>body()</code></td>
                                <td><code>string $content</code></td>
                                <td>Set card body content</td>
                            </tr>
                            <tr>
                                <td><code>footer()</code></td>
                                <td><code>string $content</code></td>
                                <td>Set card footer content</td>
                            </tr>
                            <tr>
                                <td><code>image()</code></td>
                                <td><code>string $src, string $alt, string $position</code></td>
                                <td>Add card image (top or bottom)</td>
                            </tr>
                            <tr>
                                <td><code>variant()</code></td>
                                <td><code>string $variant</code></td>
                                <td>Set border color variant</td>
                            </tr>
                            <tr>
                                <td><code>background()</code></td>
                                <td><code>string $color</code></td>
                                <td>Set background color</td>
                            </tr>
                            <tr>
                                <td><code>shadow()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set shadow: sm, md, lg, none</td>
                            </tr>
                            <tr>
                                <td><code>horizontal()</code></td>
                                <td>-</td>
                                <td>Use horizontal layout</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
