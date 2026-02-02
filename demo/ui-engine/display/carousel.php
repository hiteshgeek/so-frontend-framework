<?php
/**
 * SixOrbit UI Engine - Carousel Element Demo
 */

$pageTitle = 'Carousel - UI Engine';
$pageDescription = 'Slideshow component for cycling through images';

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
                <li class="so-breadcrumb-item so-active">Carousel</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">view_carousel</span>
            Carousel
        </h1>
        <p class="so-page-subtitle">Slideshow component for cycling through images or content with navigation controls.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Carousel -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Carousel</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('basic-carousel', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$carousel = UiEngine::carousel('demo-carousel')
    ->slide('/images/slide1.jpg', 'First slide')
    ->slide('/images/slide2.jpg', 'Second slide')
    ->slide('/images/slide3.jpg', 'Third slide');

echo \$carousel->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const carousel = UiEngine.carousel('demo-carousel')
    .slide('/images/slide1.jpg', 'First slide')
    .slide('/images/slide2.jpg', 'Second slide')
    .slide('/images/slide3.jpg', 'Third slide');

document.getElementById('container').innerHTML = carousel.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Captions -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Captions</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('carousel-captions', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$carousel = UiEngine::carousel('caption-carousel')
    ->slide('/images/slide1.jpg', 'First slide', [
        'title' => 'Welcome to Our Platform',
        'description' => 'Discover amazing features',
    ])
    ->slide('/images/slide2.jpg', 'Second slide', [
        'title' => 'Powerful Tools',
        'description' => 'Everything you need in one place',
    ])
    ->slide('/images/slide3.jpg', 'Third slide', [
        'title' => 'Get Started Today',
        'description' => 'Join thousands of satisfied users',
    ]);

echo \$carousel->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const carousel = UiEngine.carousel('caption-carousel')
    .slide('/images/slide1.jpg', 'First slide', {
        title: 'Welcome to Our Platform',
        description: 'Discover amazing features',
    })
    .slide('/images/slide2.jpg', 'Second slide', {
        title: 'Powerful Tools',
        description: 'Everything you need in one place',
    })
    .slide('/images/slide3.jpg', 'Third slide', {
        title: 'Get Started Today',
        description: 'Join thousands of satisfied users',
    });

document.getElementById('container').innerHTML = carousel.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Controls and Indicators -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Controls and Indicators</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('carousel-controls', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$carousel = UiEngine::carousel('control-carousel')
    ->slides([...])
    ->controls()      // Show prev/next arrows
    ->indicators()    // Show dot indicators
    ->autoplay(5000)  // Auto-advance every 5 seconds
    ->pause('hover'); // Pause on hover

echo \$carousel->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const carousel = UiEngine.carousel('control-carousel')
    .slides([...])
    .controls()
    .indicators()
    .autoplay(5000)
    .pause('hover');

document.getElementById('container').innerHTML = carousel.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Crossfade Effect -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Crossfade Effect</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('carousel-fade', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$carousel = UiEngine::carousel('fade-carousel')
    ->slides([...])
    ->fade()  // Use crossfade instead of slide
    ->controls()
    ->autoplay(3000);

echo \$carousel->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const carousel = UiEngine.carousel('fade-carousel')
    .slides([...])
    .fade()
    .controls()
    .autoplay(3000);

document.getElementById('container').innerHTML = carousel.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Custom Content Slides -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Custom Content Slides</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('carousel-custom', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Use custom HTML content instead of images
\$carousel = UiEngine::carousel('content-carousel')
    ->slideContent(UiEngine::card()
        ->title('Product 1')
        ->body('Description here')
        ->render()
    )
    ->slideContent(UiEngine::card()
        ->title('Product 2')
        ->body('Another description')
        ->render()
    )
    ->controls()
    ->indicators();

echo \$carousel->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Use custom HTML content instead of images
const carousel = UiEngine.carousel('content-carousel')
    .slideContent(UiEngine.card()
        .title('Product 1')
        .body('Description here')
        .toHtml()
    )
    .slideContent(UiEngine.card()
        .title('Product 2')
        .body('Another description')
        .toHtml()
    )
    .controls()
    .indicators();

document.getElementById('container').innerHTML = carousel.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Programmatic Control -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Programmatic Control</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('carousel-control', [
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const carousel = UiEngine.carousel('control-carousel')
    .slides([...])
    .onSlide((from, to) => {
        console.log('Sliding from', from, 'to', to);
    });

// Control methods
carousel.next();      // Go to next slide
carousel.prev();      // Go to previous slide
carousel.goTo(2);     // Go to specific slide
carousel.pause();     // Pause autoplay
carousel.cycle();     // Resume autoplay"
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
                                <td><code>slide()</code></td>
                                <td><code>string $image, string $alt, array $options</code></td>
                                <td>Add an image slide</td>
                            </tr>
                            <tr>
                                <td><code>slideContent()</code></td>
                                <td><code>string $html</code></td>
                                <td>Add custom content slide</td>
                            </tr>
                            <tr>
                                <td><code>controls()</code></td>
                                <td>-</td>
                                <td>Show prev/next arrows</td>
                            </tr>
                            <tr>
                                <td><code>indicators()</code></td>
                                <td>-</td>
                                <td>Show dot indicators</td>
                            </tr>
                            <tr>
                                <td><code>autoplay()</code></td>
                                <td><code>int $interval</code></td>
                                <td>Auto-advance interval in ms</td>
                            </tr>
                            <tr>
                                <td><code>fade()</code></td>
                                <td>-</td>
                                <td>Use crossfade transition</td>
                            </tr>
                            <tr>
                                <td><code>pause()</code></td>
                                <td><code>string $event</code></td>
                                <td>Pause on event (hover, false)</td>
                            </tr>
                            <tr>
                                <td><code>onSlide()</code></td>
                                <td><code>callable $callback</code></td>
                                <td>Slide change callback</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
