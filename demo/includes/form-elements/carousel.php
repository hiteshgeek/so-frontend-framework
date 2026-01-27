<!-- Carousel Pane -->
<div class="so-tab-pane" id="pane-carousel" role="tabpanel">
    <div class="so-grid so-grid-cols-1 so-gap-6">

        <!-- Basic Carousel -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Carousel</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">A simple image carousel with navigation controls and indicators.</p>

                <div class="so-carousel" data-so-carousel id="basic-carousel">
                    <div class="so-carousel-inner">
                        <div class="so-carousel-slide active">
                            <img src="https://picsum.photos/800/400?random=1" alt="Slide 1">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/400?random=2" alt="Slide 2">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/400?random=3" alt="Slide 3">
                        </div>
                    </div>

                    <button class="so-carousel-control so-carousel-control-prev" aria-label="Previous slide">
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button class="so-carousel-control so-carousel-control-next" aria-label="Next slide">
                        <span class="material-icons">chevron_right</span>
                    </button>

                    <div class="so-carousel-indicators">
                        <button class="so-carousel-indicator active" data-so-slide="0" aria-label="Go to slide 1"></button>
                        <button class="so-carousel-indicator" data-so-slide="1" aria-label="Go to slide 2"></button>
                        <button class="so-carousel-indicator" data-so-slide="2" aria-label="Go to slide 3"></button>
                    </div>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-carousel" data-so-carousel&gt;
    &lt;div class="so-carousel-inner"&gt;
        &lt;div class="so-carousel-slide active"&gt;
            &lt;img src="slide1.jpg" alt="Slide 1"&gt;
        &lt;/div&gt;
        &lt;div class="so-carousel-slide"&gt;
            &lt;img src="slide2.jpg" alt="Slide 2"&gt;
        &lt;/div&gt;
        &lt;div class="so-carousel-slide"&gt;
            &lt;img src="slide3.jpg" alt="Slide 3"&gt;
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;button class="so-carousel-control so-carousel-control-prev"&gt;
        &lt;span class="material-icons"&gt;chevron_left&lt;/span&gt;
    &lt;/button&gt;
    &lt;button class="so-carousel-control so-carousel-control-next"&gt;
        &lt;span class="material-icons"&gt;chevron_right&lt;/span&gt;
    &lt;/button&gt;

    &lt;div class="so-carousel-indicators"&gt;
        &lt;button class="so-carousel-indicator active" data-so-slide="0"&gt;&lt;/button&gt;
        &lt;button class="so-carousel-indicator" data-so-slide="1"&gt;&lt;/button&gt;
        &lt;button class="so-carousel-indicator" data-so-slide="2"&gt;&lt;/button&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="so-code-block so-mt-3">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-javascript">// Auto-initialized with data-so-carousel attribute
// Or initialize manually:
const carousel = new SOCarousel(document.getElementById('my-carousel'), {
    autoplay: false,
    interval: 5000,
    loop: true
});

// Navigate programmatically
carousel.next();
carousel.prev();
carousel.goTo(2);</code></pre>
                </div>
            </div>
        </div>

        <!-- Carousel with Captions -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Carousel with Captions</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Add captions with gradient overlay to provide context for each slide.</p>

                <div class="so-carousel" data-so-carousel id="caption-carousel">
                    <div class="so-carousel-inner">
                        <div class="so-carousel-slide active">
                            <img src="https://picsum.photos/800/450?random=4" alt="Mountains">
                            <div class="so-carousel-caption">
                                <h4 class="so-carousel-caption-title">Mountain Adventure</h4>
                                <p class="so-carousel-caption-text">Explore the beauty of nature's majestic peaks.</p>
                            </div>
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/450?random=5" alt="Ocean">
                            <div class="so-carousel-caption">
                                <h4 class="so-carousel-caption-title">Ocean Dreams</h4>
                                <p class="so-carousel-caption-text">Discover the tranquility of endless horizons.</p>
                            </div>
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/450?random=6" alt="Forest">
                            <div class="so-carousel-caption">
                                <h4 class="so-carousel-caption-title">Forest Escape</h4>
                                <p class="so-carousel-caption-text">Find peace in the heart of ancient woodlands.</p>
                            </div>
                        </div>
                    </div>

                    <button class="so-carousel-control so-carousel-control-prev" aria-label="Previous">
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button class="so-carousel-control so-carousel-control-next" aria-label="Next">
                        <span class="material-icons">chevron_right</span>
                    </button>

                    <div class="so-carousel-indicators">
                        <button class="so-carousel-indicator active" data-so-slide="0"></button>
                        <button class="so-carousel-indicator" data-so-slide="1"></button>
                        <button class="so-carousel-indicator" data-so-slide="2"></button>
                    </div>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-carousel-slide active"&gt;
    &lt;img src="image.jpg" alt="Description"&gt;
    &lt;div class="so-carousel-caption"&gt;
        &lt;h4 class="so-carousel-caption-title"&gt;Slide Title&lt;/h4&gt;
        &lt;p class="so-carousel-caption-text"&gt;Slide description text.&lt;/p&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Fade Transition -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Fade Transition</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Use <code>.so-carousel-fade</code> for a crossfade effect instead of sliding.</p>

                <div class="so-carousel so-carousel-fade" data-so-carousel id="fade-carousel">
                    <div class="so-carousel-inner">
                        <div class="so-carousel-slide active">
                            <img src="https://picsum.photos/800/400?random=7" alt="Slide 1">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/400?random=8" alt="Slide 2">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/400?random=9" alt="Slide 3">
                        </div>
                    </div>

                    <button class="so-carousel-control so-carousel-control-prev" aria-label="Previous">
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button class="so-carousel-control so-carousel-control-next" aria-label="Next">
                        <span class="material-icons">chevron_right</span>
                    </button>

                    <div class="so-carousel-indicators so-carousel-indicators-line">
                        <button class="so-carousel-indicator active" data-so-slide="0"></button>
                        <button class="so-carousel-indicator" data-so-slide="1"></button>
                        <button class="so-carousel-indicator" data-so-slide="2"></button>
                    </div>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-carousel so-carousel-fade" data-so-carousel&gt;
    &lt;!-- slides... --&gt;
&lt;/div&gt;

&lt;!-- Line-style indicators --&gt;
&lt;div class="so-carousel-indicators so-carousel-indicators-line"&gt;
    &lt;button class="so-carousel-indicator active"&gt;&lt;/button&gt;
    &lt;button class="so-carousel-indicator"&gt;&lt;/button&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="so-code-block so-mt-3">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-javascript">// Fade transition is CSS-based via .so-carousel-fade class
// Initialize normally:
const carousel = new SOCarousel(element, {
    // options
});</code></pre>
                </div>
            </div>
        </div>

        <!-- Multi-Item Carousel -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Multi-Item Carousel</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Display multiple items at once using <code>.so-carousel-multi</code>. Perfect for product carousels or card galleries.</p>

                <div class="so-carousel so-carousel-multi so-carousel-cards" data-so-carousel data-so-items="3" id="multi-carousel">
                    <div class="so-carousel-inner">
                        <div class="so-carousel-slide active">
                            <div class="so-card">
                                <img src="https://picsum.photos/400/250?random=10" alt="Product 1" style="width:100%; border-radius: 8px 8px 0 0;">
                                <div class="so-card-body">
                                    <h5 class="so-card-title">Product One</h5>
                                    <p class="so-text-muted">Starting at $99</p>
                                </div>
                            </div>
                        </div>
                        <div class="so-carousel-slide">
                            <div class="so-card">
                                <img src="https://picsum.photos/400/250?random=11" alt="Product 2" style="width:100%; border-radius: 8px 8px 0 0;">
                                <div class="so-card-body">
                                    <h5 class="so-card-title">Product Two</h5>
                                    <p class="so-text-muted">Starting at $149</p>
                                </div>
                            </div>
                        </div>
                        <div class="so-carousel-slide">
                            <div class="so-card">
                                <img src="https://picsum.photos/400/250?random=12" alt="Product 3" style="width:100%; border-radius: 8px 8px 0 0;">
                                <div class="so-card-body">
                                    <h5 class="so-card-title">Product Three</h5>
                                    <p class="so-text-muted">Starting at $199</p>
                                </div>
                            </div>
                        </div>
                        <div class="so-carousel-slide">
                            <div class="so-card">
                                <img src="https://picsum.photos/400/250?random=13" alt="Product 4" style="width:100%; border-radius: 8px 8px 0 0;">
                                <div class="so-card-body">
                                    <h5 class="so-card-title">Product Four</h5>
                                    <p class="so-text-muted">Starting at $249</p>
                                </div>
                            </div>
                        </div>
                        <div class="so-carousel-slide">
                            <div class="so-card">
                                <img src="https://picsum.photos/400/250?random=14" alt="Product 5" style="width:100%; border-radius: 8px 8px 0 0;">
                                <div class="so-card-body">
                                    <h5 class="so-card-title">Product Five</h5>
                                    <p class="so-text-muted">Starting at $299</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="so-carousel-control so-carousel-control-prev" aria-label="Previous">
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button class="so-carousel-control so-carousel-control-next" aria-label="Next">
                        <span class="material-icons">chevron_right</span>
                    </button>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-carousel so-carousel-multi so-carousel-cards" data-so-carousel data-so-items="3"&gt;
    &lt;div class="so-carousel-inner"&gt;
        &lt;div class="so-carousel-slide active"&gt;
            &lt;div class="so-card"&gt;...&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class="so-carousel-slide"&gt;
            &lt;div class="so-card"&gt;...&lt;/div&gt;
        &lt;/div&gt;
        &lt;!-- more slides... --&gt;
    &lt;/div&gt;
    &lt;!-- controls... --&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="so-code-block so-mt-3">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-javascript">// Multi-item carousel with responsive items
const carousel = new SOCarousel(element, {
    itemsVisible: 3,           // Show 3 items at once
    itemsToScroll: 1,          // Scroll 1 item at a time
    responsive: {
        768: { itemsVisible: 2 },  // 2 items on tablet
        480: { itemsVisible: 1 }   // 1 item on mobile
    }
});</code></pre>
                </div>
            </div>
        </div>

        <!-- Hero Carousel -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Hero Carousel (Center with Peek)</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Material Design inspired hero carousel showing edges of adjacent slides.</p>

                <div class="so-carousel so-carousel-hero" data-so-carousel id="hero-carousel">
                    <div class="so-carousel-inner">
                        <div class="so-carousel-slide active">
                            <img src="https://picsum.photos/900/500?random=15" alt="Hero 1">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/900/500?random=16" alt="Hero 2">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/900/500?random=17" alt="Hero 3">
                        </div>
                    </div>

                    <button class="so-carousel-control so-carousel-control-prev" aria-label="Previous">
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button class="so-carousel-control so-carousel-control-next" aria-label="Next">
                        <span class="material-icons">chevron_right</span>
                    </button>

                    <div class="so-carousel-indicators">
                        <button class="so-carousel-indicator active" data-so-slide="0"></button>
                        <button class="so-carousel-indicator" data-so-slide="1"></button>
                        <button class="so-carousel-indicator" data-so-slide="2"></button>
                    </div>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-carousel so-carousel-hero" data-so-carousel&gt;
    &lt;div class="so-carousel-inner"&gt;
        &lt;div class="so-carousel-slide active"&gt;
            &lt;img src="hero1.jpg" alt="Hero 1"&gt;
        &lt;/div&gt;
        &lt;!-- more slides... --&gt;
    &lt;/div&gt;
    &lt;!-- controls and indicators... --&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Gallery with Thumbnails -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Gallery with Thumbnails</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">A gallery-style carousel with thumbnail navigation below.</p>

                <div class="so-carousel-gallery">
                    <div class="so-carousel" data-so-carousel id="gallery-carousel">
                        <div class="so-carousel-inner">
                            <div class="so-carousel-slide active">
                                <img src="https://picsum.photos/800/500?random=18" alt="Gallery 1">
                            </div>
                            <div class="so-carousel-slide">
                                <img src="https://picsum.photos/800/500?random=19" alt="Gallery 2">
                            </div>
                            <div class="so-carousel-slide">
                                <img src="https://picsum.photos/800/500?random=20" alt="Gallery 3">
                            </div>
                            <div class="so-carousel-slide">
                                <img src="https://picsum.photos/800/500?random=21" alt="Gallery 4">
                            </div>
                            <div class="so-carousel-slide">
                                <img src="https://picsum.photos/800/500?random=22" alt="Gallery 5">
                            </div>
                        </div>

                        <button class="so-carousel-control so-carousel-control-prev" aria-label="Previous">
                            <span class="material-icons">chevron_left</span>
                        </button>
                        <button class="so-carousel-control so-carousel-control-next" aria-label="Next">
                            <span class="material-icons">chevron_right</span>
                        </button>
                    </div>

                    <div class="so-carousel-thumbnails">
                        <button class="so-carousel-thumbnail active" data-so-slide="0">
                            <img src="https://picsum.photos/800/500?random=18" alt="Thumb 1">
                        </button>
                        <button class="so-carousel-thumbnail" data-so-slide="1">
                            <img src="https://picsum.photos/800/500?random=19" alt="Thumb 2">
                        </button>
                        <button class="so-carousel-thumbnail" data-so-slide="2">
                            <img src="https://picsum.photos/800/500?random=20" alt="Thumb 3">
                        </button>
                        <button class="so-carousel-thumbnail" data-so-slide="3">
                            <img src="https://picsum.photos/800/500?random=21" alt="Thumb 4">
                        </button>
                        <button class="so-carousel-thumbnail" data-so-slide="4">
                            <img src="https://picsum.photos/800/500?random=22" alt="Thumb 5">
                        </button>
                    </div>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-carousel-gallery"&gt;
    &lt;div class="so-carousel" data-so-carousel&gt;
        &lt;!-- main carousel... --&gt;
    &lt;/div&gt;

    &lt;div class="so-carousel-thumbnails"&gt;
        &lt;button class="so-carousel-thumbnail active" data-so-slide="0"&gt;
            &lt;img src="thumb1.jpg" alt="Thumbnail 1"&gt;
        &lt;/button&gt;
        &lt;button class="so-carousel-thumbnail" data-so-slide="1"&gt;
            &lt;img src="thumb2.jpg" alt="Thumbnail 2"&gt;
        &lt;/button&gt;
        &lt;!-- more thumbnails... --&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Autoplay with Progress -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Autoplay with Progress</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Automatically advance slides with a visual progress indicator. Pauses on hover.</p>

                <div class="so-carousel so-carousel-autoplay" data-so-carousel data-so-autoplay="true" data-so-interval="4000" id="autoplay-carousel">
                    <div class="so-carousel-inner">
                        <div class="so-carousel-slide active">
                            <img src="https://picsum.photos/800/400?random=23" alt="Auto 1">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/400?random=24" alt="Auto 2">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/400?random=25" alt="Auto 3">
                        </div>
                    </div>

                    <button class="so-carousel-control so-carousel-control-prev" aria-label="Previous">
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button class="so-carousel-control so-carousel-control-next" aria-label="Next">
                        <span class="material-icons">chevron_right</span>
                    </button>

                    <div class="so-carousel-indicators">
                        <button class="so-carousel-indicator active" data-so-slide="0"></button>
                        <button class="so-carousel-indicator" data-so-slide="1"></button>
                        <button class="so-carousel-indicator" data-so-slide="2"></button>
                    </div>

                    <div class="so-carousel-progress">
                        <div class="so-carousel-progress-bar"></div>
                    </div>
                </div>

                <div class="so-d-flex so-gap-2 so-mt-4">
                    <button class="so-btn so-btn-sm so-btn-primary" onclick="autoplayCarousel.play()">
                        <span class="material-icons">play_arrow</span> Play
                    </button>
                    <button class="so-btn so-btn-sm so-btn-outline-secondary" onclick="autoplayCarousel.pause()">
                        <span class="material-icons">pause</span> Pause
                    </button>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-carousel so-carousel-autoplay"
     data-so-carousel
     data-so-autoplay="true"
     data-so-interval="4000"&gt;
    &lt;!-- slides... --&gt;

    &lt;div class="so-carousel-progress"&gt;
        &lt;div class="so-carousel-progress-bar"&gt;&lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>

                <div class="so-code-block so-mt-3">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-javascript">// Initialize with autoplay
const carousel = new SOCarousel(element, {
    autoplay: true,
    interval: 4000,    // 4 seconds between slides
    pauseOnHover: true // Pause when mouse hovers
});

// Control autoplay programmatically
carousel.play();   // Start autoplay
carousel.pause();  // Pause autoplay
carousel.stop();   // Stop and reset</code></pre>
                </div>
            </div>
        </div>

        <!-- Controls Variants -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Controls Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Different control visibility and position options.</p>

                <div class="so-grid so-grid-cols-1 md:so-grid-cols-2 so-gap-4">
                    <!-- Hover Controls -->
                    <div>
                        <label class="so-slider-label so-mb-2">Hover to Show Controls</label>
                        <div class="so-carousel so-carousel-controls-hover" data-so-carousel>
                            <div class="so-carousel-inner">
                                <div class="so-carousel-slide active">
                                    <img src="https://picsum.photos/400/250?random=26" alt="Hover 1">
                                </div>
                                <div class="so-carousel-slide">
                                    <img src="https://picsum.photos/400/250?random=27" alt="Hover 2">
                                </div>
                            </div>
                            <button class="so-carousel-control so-carousel-control-prev"><span class="material-icons">chevron_left</span></button>
                            <button class="so-carousel-control so-carousel-control-next"><span class="material-icons">chevron_right</span></button>
                        </div>
                    </div>

                    <!-- Dark Controls -->
                    <div>
                        <label class="so-slider-label so-mb-2">Dark Controls</label>
                        <div class="so-carousel so-carousel-dark" data-so-carousel>
                            <div class="so-carousel-inner">
                                <div class="so-carousel-slide active">
                                    <img src="https://picsum.photos/400/250?random=28" alt="Dark 1">
                                </div>
                                <div class="so-carousel-slide">
                                    <img src="https://picsum.photos/400/250?random=29" alt="Dark 2">
                                </div>
                            </div>
                            <button class="so-carousel-control so-carousel-control-prev"><span class="material-icons">chevron_left</span></button>
                            <button class="so-carousel-control so-carousel-control-next"><span class="material-icons">chevron_right</span></button>
                            <div class="so-carousel-indicators">
                                <button class="so-carousel-indicator active" data-so-slide="0"></button>
                                <button class="so-carousel-indicator" data-so-slide="1"></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;!-- Show controls on hover --&gt;
&lt;div class="so-carousel so-carousel-controls-hover"&gt;...&lt;/div&gt;

&lt;!-- Dark controls --&gt;
&lt;div class="so-carousel so-carousel-dark"&gt;...&lt;/div&gt;

&lt;!-- Controls inside (closer to edges) --&gt;
&lt;div class="so-carousel so-carousel-controls-inside"&gt;...&lt;/div&gt;

&lt;!-- Controls outside (with padding) --&gt;
&lt;div class="so-carousel so-carousel-controls-outside"&gt;...&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Size Variants -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Size Variants</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Adjust control sizes with <code>.so-carousel-sm</code> or <code>.so-carousel-lg</code>.</p>

                <div class="so-grid so-grid-cols-1 md:so-grid-cols-2 so-gap-4">
                    <!-- Small -->
                    <div>
                        <label class="so-slider-label so-mb-2">Small (.so-carousel-sm)</label>
                        <div class="so-carousel so-carousel-sm" data-so-carousel>
                            <div class="so-carousel-inner">
                                <div class="so-carousel-slide active">
                                    <img src="https://picsum.photos/400/250?random=30" alt="Small 1">
                                </div>
                                <div class="so-carousel-slide">
                                    <img src="https://picsum.photos/400/250?random=31" alt="Small 2">
                                </div>
                            </div>
                            <button class="so-carousel-control so-carousel-control-prev"><span class="material-icons">chevron_left</span></button>
                            <button class="so-carousel-control so-carousel-control-next"><span class="material-icons">chevron_right</span></button>
                        </div>
                    </div>

                    <!-- Large -->
                    <div>
                        <label class="so-slider-label so-mb-2">Large (.so-carousel-lg)</label>
                        <div class="so-carousel so-carousel-lg" data-so-carousel>
                            <div class="so-carousel-inner">
                                <div class="so-carousel-slide active">
                                    <img src="https://picsum.photos/400/250?random=32" alt="Large 1">
                                </div>
                                <div class="so-carousel-slide">
                                    <img src="https://picsum.photos/400/250?random=33" alt="Large 2">
                                </div>
                            </div>
                            <button class="so-carousel-control so-carousel-control-prev"><span class="material-icons">chevron_left</span></button>
                            <button class="so-carousel-control so-carousel-control-next"><span class="material-icons">chevron_right</span></button>
                        </div>
                    </div>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> HTML</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-html">&lt;div class="so-carousel so-carousel-sm"&gt;...&lt;/div&gt;
&lt;div class="so-carousel so-carousel-lg"&gt;...&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Programmatic Controls -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Programmatic Controls</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Control carousels via JavaScript API.</p>

                <div class="so-carousel" data-so-carousel id="api-carousel">
                    <div class="so-carousel-inner">
                        <div class="so-carousel-slide active">
                            <img src="https://picsum.photos/800/350?random=34" alt="API 1">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/350?random=35" alt="API 2">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/350?random=36" alt="API 3">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/350?random=37" alt="API 4">
                        </div>
                    </div>
                    <div class="so-carousel-indicators">
                        <button class="so-carousel-indicator active" data-so-slide="0"></button>
                        <button class="so-carousel-indicator" data-so-slide="1"></button>
                        <button class="so-carousel-indicator" data-so-slide="2"></button>
                        <button class="so-carousel-indicator" data-so-slide="3"></button>
                    </div>
                </div>

                <div class="so-d-flex so-flex-wrap so-gap-2 so-mt-4">
                    <button class="so-btn so-btn-sm so-btn-primary" onclick="apiCarousel.prev()">
                        <span class="material-icons">chevron_left</span> Prev
                    </button>
                    <button class="so-btn so-btn-sm so-btn-primary" onclick="apiCarousel.next()">
                        Next <span class="material-icons">chevron_right</span>
                    </button>
                    <button class="so-btn so-btn-sm so-btn-outline-secondary" onclick="apiCarousel.goTo(0)">Go to 1</button>
                    <button class="so-btn so-btn-sm so-btn-outline-secondary" onclick="apiCarousel.goTo(1)">Go to 2</button>
                    <button class="so-btn so-btn-sm so-btn-outline-secondary" onclick="apiCarousel.goTo(2)">Go to 3</button>
                    <button class="so-btn so-btn-sm so-btn-outline-secondary" onclick="apiCarousel.goTo(3)">Go to 4</button>
                    <button class="so-btn so-btn-sm so-btn-outline-info" onclick="alert('Current: ' + (apiCarousel.getCurrentIndex() + 1))">Get Index</button>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-javascript">// Get carousel instance
const carousel = SOCarousel.getInstance(document.getElementById('my-carousel'));

// Navigate
carousel.next();           // Go to next slide
carousel.prev();           // Go to previous slide
carousel.goTo(2);          // Go to slide at index 2

// Autoplay control
carousel.play();           // Start autoplay
carousel.pause();          // Pause autoplay
carousel.stop();           // Stop autoplay completely

// Get state
carousel.getCurrentIndex(); // Get current slide index
carousel.getSlideCount();   // Get total number of slides
carousel.isPlaying();       // Check if autoplay is active

// Destroy instance
carousel.destroy();</code></pre>
                </div>
            </div>
        </div>

        <!-- Events -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Events</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Carousels emit events for slide transitions. Try navigating the carousel below.</p>

                <div class="so-carousel" data-so-carousel id="events-carousel">
                    <div class="so-carousel-inner">
                        <div class="so-carousel-slide active">
                            <img src="https://picsum.photos/800/350?random=38" alt="Event 1">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/350?random=39" alt="Event 2">
                        </div>
                        <div class="so-carousel-slide">
                            <img src="https://picsum.photos/800/350?random=40" alt="Event 3">
                        </div>
                    </div>
                    <button class="so-carousel-control so-carousel-control-prev"><span class="material-icons">chevron_left</span></button>
                    <button class="so-carousel-control so-carousel-control-next"><span class="material-icons">chevron_right</span></button>
                    <div class="so-carousel-indicators">
                        <button class="so-carousel-indicator active" data-so-slide="0"></button>
                        <button class="so-carousel-indicator" data-so-slide="1"></button>
                        <button class="so-carousel-indicator" data-so-slide="2"></button>
                    </div>
                </div>

                <div class="so-alert so-alert-info so-mt-4" id="carousel-event-log">
                    <span class="material-icons">info</span>
                    <span>Event log will appear here. Navigate the carousel above.</span>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-javascript">const carouselEl = document.getElementById('my-carousel');

// Before slide changes (cancelable)
carouselEl.addEventListener('so:carousel:slide', (e) => {
    console.log('Sliding from', e.detail.from, 'to', e.detail.to);
    // e.preventDefault(); // Cancel the slide
});

// After slide transition completes
carouselEl.addEventListener('so:carousel:slid', (e) => {
    console.log('Slid to slide', e.detail.to);
});

// Autoplay events
carouselEl.addEventListener('so:carousel:play', () => {
    console.log('Autoplay started');
});

carouselEl.addEventListener('so:carousel:pause', () => {
    console.log('Autoplay paused');
});</code></pre>
                </div>

                <h5 class="so-mt-6 so-mb-3">Available Events</h5>
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Description</th>
                                <th>Detail Properties</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>so:carousel:slide</code></td>
                                <td>Before slide change (cancelable)</td>
                                <td><code>{ from, to, direction }</code></td>
                            </tr>
                            <tr>
                                <td><code>so:carousel:slid</code></td>
                                <td>After slide transition completes</td>
                                <td><code>{ from, to, direction }</code></td>
                            </tr>
                            <tr>
                                <td><code>so:carousel:play</code></td>
                                <td>Autoplay started/resumed</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><code>so:carousel:pause</code></td>
                                <td>Autoplay paused</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Options -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">Options</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-muted so-mb-4">Configure carousels using data attributes or JavaScript options.</p>

                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>Data Attribute</th>
                                <th>Type</th>
                                <th>Default</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>autoplay</code></td>
                                <td><code>data-so-autoplay</code></td>
                                <td>boolean</td>
                                <td><code>false</code></td>
                                <td>Start autoplay automatically</td>
                            </tr>
                            <tr>
                                <td><code>interval</code></td>
                                <td><code>data-so-interval</code></td>
                                <td>number</td>
                                <td><code>5000</code></td>
                                <td>Autoplay interval in milliseconds</td>
                            </tr>
                            <tr>
                                <td><code>loop</code></td>
                                <td><code>data-so-loop</code></td>
                                <td>boolean</td>
                                <td><code>true</code></td>
                                <td>Loop back to start/end</td>
                            </tr>
                            <tr>
                                <td><code>pauseOnHover</code></td>
                                <td><code>data-so-pause-on-hover</code></td>
                                <td>boolean</td>
                                <td><code>true</code></td>
                                <td>Pause autoplay on mouse hover</td>
                            </tr>
                            <tr>
                                <td><code>keyboard</code></td>
                                <td><code>data-so-keyboard</code></td>
                                <td>boolean</td>
                                <td><code>true</code></td>
                                <td>Enable keyboard navigation</td>
                            </tr>
                            <tr>
                                <td><code>touch</code></td>
                                <td><code>data-so-touch</code></td>
                                <td>boolean</td>
                                <td><code>true</code></td>
                                <td>Enable touch/swipe gestures</td>
                            </tr>
                            <tr>
                                <td><code>items</code></td>
                                <td><code>data-so-items</code></td>
                                <td>number</td>
                                <td><code>1</code></td>
                                <td>Visible items (for multi-item)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="so-code-block so-mt-4">
                    <div class="so-code-header">
                        <span class="so-code-label"><span class="material-icons">code</span> JavaScript</span>
                        <button class="so-code-copy" onclick="copyCode(this)">
                            <span class="material-icons">content_copy</span>
                        </button>
                    </div>
                    <pre class="so-code-content"><code class="language-javascript">// Initialize with options
const carousel = new SOCarousel(element, {
    autoplay: true,
    interval: 4000,
    loop: true,
    pauseOnHover: true,
    keyboard: true,
    touch: true
});

// Or use data attributes
&lt;div class="so-carousel"
     data-so-carousel
     data-so-autoplay="true"
     data-so-interval="4000"&gt;
    ...
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- CSS Classes Reference -->
        <div class="so-card">
            <div class="so-card-header">
                <h3 class="so-card-title">CSS Classes Reference</h3>
            </div>
            <div class="so-card-body">
                <div class="so-table-responsive">
                    <table class="so-table so-table-bordered">
                        <thead>
                            <tr>
                                <th>Class</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><code>.so-carousel</code></td>
                                <td>Base carousel container</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-inner</code></td>
                                <td>Slides track/wrapper</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-slide</code></td>
                                <td>Individual slide</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-control</code></td>
                                <td>Navigation button base</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-control-prev</code></td>
                                <td>Previous button</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-control-next</code></td>
                                <td>Next button</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-indicators</code></td>
                                <td>Indicators container</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-indicator</code></td>
                                <td>Individual indicator dot</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-indicators-line</code></td>
                                <td>Line-style indicators</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-caption</code></td>
                                <td>Caption overlay</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-fade</code></td>
                                <td>Crossfade transition variant</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-multi</code></td>
                                <td>Multi-item carousel</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-hero</code></td>
                                <td>Hero with peek effect</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-gallery</code></td>
                                <td>Gallery layout wrapper</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-thumbnails</code></td>
                                <td>Thumbnails container</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-thumbnail</code></td>
                                <td>Individual thumbnail</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-sm</code></td>
                                <td>Small size variant</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-lg</code></td>
                                <td>Large size variant</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-dark</code></td>
                                <td>Dark controls variant</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-controls-hover</code></td>
                                <td>Show controls on hover only</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-autoplay</code></td>
                                <td>Enables autoplay progress animation</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-16x9</code></td>
                                <td>16:9 aspect ratio</td>
                            </tr>
                            <tr>
                                <td><code>.so-carousel-4x3</code></td>
                                <td>4:3 aspect ratio</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
// SOCarousel Class
class SOCarousel {
    static instances = new Map();

    static DEFAULTS = {
        autoplay: false,
        interval: 5000,
        loop: true,
        pauseOnHover: true,
        keyboard: true,
        touch: true,
        items: 1
    };

    constructor(element, options = {}) {
        if (!(element instanceof HTMLElement)) return;
        if (SOCarousel.instances.has(element)) return SOCarousel.instances.get(element);

        this.element = element;
        this.inner = element.querySelector('.so-carousel-inner');
        this.slides = Array.from(element.querySelectorAll('.so-carousel-slide'));
        this.prevBtn = element.querySelector('.so-carousel-control-prev');
        this.nextBtn = element.querySelector('.so-carousel-control-next');
        this.indicators = Array.from(element.querySelectorAll('.so-carousel-indicator'));
        this.progressBar = element.querySelector('.so-carousel-progress-bar');

        // Find thumbnails (may be outside carousel element)
        const gallery = element.closest('.so-carousel-gallery');
        this.thumbnails = gallery
            ? Array.from(gallery.querySelectorAll('.so-carousel-thumbnail'))
            : [];

        this.options = {
            ...SOCarousel.DEFAULTS,
            autoplay: element.dataset.soAutoplay === 'true',
            interval: parseInt(element.dataset.soInterval) || SOCarousel.DEFAULTS.interval,
            loop: element.dataset.soLoop !== 'false',
            pauseOnHover: element.dataset.soPauseOnHover !== 'false',
            keyboard: element.dataset.soKeyboard !== 'false',
            touch: element.dataset.soTouch !== 'false',
            items: parseInt(element.dataset.soItems) || SOCarousel.DEFAULTS.items,
            ...options
        };

        this.currentIndex = 0;
        this.isPlaying = false;
        this.isPaused = false;
        this.isSliding = false;
        this.autoplayTimer = null;

        // Touch state
        this.touchStartX = 0;
        this.touchCurrentX = 0;
        this.isDragging = false;

        this._init();
        SOCarousel.instances.set(element, this);
    }

    static getInstance(element) {
        return SOCarousel.instances.get(element);
    }

    static initAll() {
        document.querySelectorAll('[data-so-carousel]').forEach(el => {
            if (!SOCarousel.instances.has(el)) {
                new SOCarousel(el);
            }
        });
    }

    _init() {
        this._findInitialSlide();
        this._bindEvents();
        this._updateIndicators();

        // Delay transform update to ensure DOM is ready
        requestAnimationFrame(() => {
            this._updateTransform();
        });

        if (this.options.autoplay) {
            this.play();
        }

        // Set interval CSS variable for progress bar
        this.element.style.setProperty('--carousel-interval', `${this.options.interval}ms`);
    }

    _findInitialSlide() {
        const activeIndex = this.slides.findIndex(s => s.classList.contains('active'));
        this.currentIndex = activeIndex >= 0 ? activeIndex : 0;

        if (activeIndex < 0 && this.slides.length > 0) {
            this.slides[0].classList.add('active');
        }
    }

    _bindEvents() {
        // Navigation controls
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.prev();
            });
        }

        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.next();
            });
        }

        // Indicators
        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => this.goTo(index));
        });

        // Thumbnails
        this.thumbnails.forEach((thumb, index) => {
            thumb.addEventListener('click', () => this.goTo(index));
        });

        // Keyboard
        if (this.options.keyboard) {
            this.element.setAttribute('tabindex', '0');
            this.element.addEventListener('keydown', (e) => this._handleKeydown(e));
        }

        // Touch/swipe
        if (this.options.touch && this.inner) {
            this.inner.addEventListener('touchstart', (e) => this._handleTouchStart(e), { passive: true });
            this.inner.addEventListener('touchmove', (e) => this._handleTouchMove(e), { passive: false });
            this.inner.addEventListener('touchend', () => this._handleTouchEnd());

            // Mouse drag
            this.inner.addEventListener('mousedown', (e) => this._handleMouseDown(e));
        }

        // Pause on hover
        if (this.options.pauseOnHover) {
            this.element.addEventListener('mouseenter', () => {
                if (this.isPlaying) this._pauseAutoplay(true);
            });
            this.element.addEventListener('mouseleave', () => {
                if (this.isPlaying && this.isPaused) this._resumeAutoplay();
            });
        }

        // Visibility change
        document.addEventListener('visibilitychange', () => {
            if (document.hidden && this.isPlaying) {
                this._pauseAutoplay(false);
            } else if (!document.hidden && this.isPlaying && !this.isPaused) {
                this._resumeAutoplay();
            }
        });
    }

    _handleKeydown(e) {
        switch (e.key) {
            case 'ArrowLeft':
                e.preventDefault();
                this.prev();
                break;
            case 'ArrowRight':
                e.preventDefault();
                this.next();
                break;
            case 'Home':
                e.preventDefault();
                this.goTo(0);
                break;
            case 'End':
                e.preventDefault();
                this.goTo(this.slides.length - 1);
                break;
            case ' ':
                e.preventDefault();
                this.isPlaying ? this.pause() : this.play();
                break;
        }
    }

    _handleTouchStart(e) {
        if (this.isSliding) return;
        this.touchStartX = e.touches[0].clientX;
        this.touchCurrentX = this.touchStartX;
        this.isDragging = true;
        this.element.classList.add('so-carousel-dragging');
    }

    _handleTouchMove(e) {
        if (!this.isDragging) return;
        this.touchCurrentX = e.touches[0].clientX;
        const diff = this.touchCurrentX - this.touchStartX;
        if (Math.abs(diff) > 10) {
            e.preventDefault();
        }
    }

    _handleTouchEnd() {
        if (!this.isDragging) return;
        this.isDragging = false;
        this.element.classList.remove('so-carousel-dragging');

        const diff = this.touchCurrentX - this.touchStartX;
        const threshold = 50;

        if (Math.abs(diff) > threshold) {
            if (diff > 0) {
                this.prev();
            } else {
                this.next();
            }
        }
    }

    _handleMouseDown(e) {
        if (e.button !== 0) return;
        this.touchStartX = e.clientX;
        this.touchCurrentX = e.clientX;
        this.isDragging = true;
        this.element.classList.add('so-carousel-dragging');

        const handleMouseMove = (e) => {
            this.touchCurrentX = e.clientX;
        };

        const handleMouseUp = () => {
            document.removeEventListener('mousemove', handleMouseMove);
            document.removeEventListener('mouseup', handleMouseUp);

            this.isDragging = false;
            this.element.classList.remove('so-carousel-dragging');

            const diff = this.touchCurrentX - this.touchStartX;
            if (Math.abs(diff) > 50) {
                diff > 0 ? this.prev() : this.next();
            }
        };

        document.addEventListener('mousemove', handleMouseMove);
        document.addEventListener('mouseup', handleMouseUp);
    }

    // Public API
    next() {
        if (this.isSliding) return this;
        let nextIndex = this.currentIndex + 1;
        if (nextIndex >= this.slides.length) {
            nextIndex = this.options.loop ? 0 : this.slides.length - 1;
        }
        if (nextIndex !== this.currentIndex) {
            this.goTo(nextIndex);
        }
        return this;
    }

    prev() {
        if (this.isSliding) return this;
        let prevIndex = this.currentIndex - 1;
        if (prevIndex < 0) {
            prevIndex = this.options.loop ? this.slides.length - 1 : 0;
        }
        if (prevIndex !== this.currentIndex) {
            this.goTo(prevIndex);
        }
        return this;
    }

    goTo(index) {
        if (this.isSliding || index === this.currentIndex) return this;
        if (index < 0 || index >= this.slides.length) return this;

        const prevIndex = this.currentIndex;
        const direction = index > prevIndex ? 'next' : 'prev';

        // Emit slide event (cancelable)
        const slideEvent = new CustomEvent('so:carousel:slide', {
            detail: { from: prevIndex, to: index, direction },
            bubbles: true,
            cancelable: true
        });
        if (!this.element.dispatchEvent(slideEvent)) return this;

        this.isSliding = true;
        this.element.classList.add('so-carousel-sliding');

        // Update slides
        this.slides[prevIndex].classList.remove('active');
        this.slides[index].classList.add('active');
        this.currentIndex = index;

        // Update indicators
        this._updateIndicators();

        // Reset progress bar animation
        this._resetProgress();

        // Translate inner for hero/multi carousel
        this._updateTransform();

        // Complete transition
        setTimeout(() => {
            this.isSliding = false;
            this.element.classList.remove('so-carousel-sliding');

            this.element.dispatchEvent(new CustomEvent('so:carousel:slid', {
                detail: { from: prevIndex, to: index, direction },
                bubbles: true
            }));

            // Reset autoplay timer
            if (this.isPlaying && !this.isPaused) {
                this._resetAutoplayTimer();
            }
        }, 600);

        return this;
    }

    _updateTransform() {
        if (!this.inner) return;

        const isHero = this.element.classList.contains('so-carousel-hero');
        const isMulti = this.element.classList.contains('so-carousel-multi');

        if (isHero || isMulti) {
            const slide = this.slides[this.currentIndex];
            if (!slide) return;

            // Use the slide's offsetLeft relative to the inner container
            const slideOffset = slide.offsetLeft;
            const slideStyle = getComputedStyle(slide);
            const slideMargin = parseFloat(slideStyle.marginLeft) || 0;

            let translateX = slideOffset - slideMargin;

            // For hero carousel, center the slide
            if (isHero) {
                const containerPadding = parseFloat(getComputedStyle(this.element).paddingLeft) || 0;
                // First slide should be at 0 translate (already centered by padding)
                // Subsequent slides need to move by their full width including margins
                if (this.currentIndex > 0) {
                    const slideWidth = slide.offsetWidth;
                    const slideFullWidth = slideWidth + (slideMargin * 2);
                    translateX = this.currentIndex * slideFullWidth;
                } else {
                    translateX = 0;
                }
            }

            this.inner.style.transform = `translateX(-${translateX}px)`;
        }
    }

    _updateIndicators() {
        this.indicators.forEach((ind, i) => {
            ind.classList.toggle('active', i === this.currentIndex);
        });

        this.thumbnails.forEach((thumb, i) => {
            thumb.classList.toggle('active', i === this.currentIndex);
        });
    }

    _resetProgress() {
        if (this.progressBar) {
            this.progressBar.style.animation = 'none';
            this.progressBar.offsetHeight; // Force reflow
            this.progressBar.style.animation = '';
        }
    }

    play() {
        if (this.slides.length <= 1) return this;
        this.isPlaying = true;
        this.isPaused = false;
        this._resetAutoplayTimer();
        this.element.classList.remove('paused');

        this.element.dispatchEvent(new CustomEvent('so:carousel:play', { bubbles: true }));
        return this;
    }

    pause() {
        this._pauseAutoplay(true);
        this.element.dispatchEvent(new CustomEvent('so:carousel:pause', { bubbles: true }));
        return this;
    }

    stop() {
        this.isPlaying = false;
        this.isPaused = false;
        if (this.autoplayTimer) {
            clearInterval(this.autoplayTimer);
            this.autoplayTimer = null;
        }
        this.element.classList.remove('paused');
        return this;
    }

    _pauseAutoplay(updateState = true) {
        if (updateState) this.isPaused = true;
        if (this.autoplayTimer) {
            clearInterval(this.autoplayTimer);
            this.autoplayTimer = null;
        }
        this.element.classList.add('paused');
    }

    _resumeAutoplay() {
        this.isPaused = false;
        this.element.classList.remove('paused');
        this._resetAutoplayTimer();
    }

    _resetAutoplayTimer() {
        if (this.autoplayTimer) {
            clearInterval(this.autoplayTimer);
        }
        if (this.options.interval > 0 && this.isPlaying && !this.isPaused) {
            this.autoplayTimer = setInterval(() => this.next(), this.options.interval);
        }
    }

    getCurrentIndex() {
        return this.currentIndex;
    }

    getSlideCount() {
        return this.slides.length;
    }

    isPlaying() {
        return this.isPlaying;
    }

    destroy() {
        this.stop();
        SOCarousel.instances.delete(this.element);
    }
}

// Initialize all carousels when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    SOCarousel.initAll();

    // Get instances for demo buttons
    window.apiCarousel = SOCarousel.getInstance(document.getElementById('api-carousel'));
    window.autoplayCarousel = SOCarousel.getInstance(document.getElementById('autoplay-carousel'));

    // Events demo
    const eventsCarousel = document.getElementById('events-carousel');
    const eventLog = document.getElementById('carousel-event-log');

    if (eventsCarousel && eventLog) {
        eventsCarousel.addEventListener('so:carousel:slide', (e) => {
            eventLog.innerHTML = `<span class="material-icons">sync</span><span><strong>slide:</strong> from=${e.detail.from + 1} to=${e.detail.to + 1} direction=${e.detail.direction}</span>`;
        });

        eventsCarousel.addEventListener('so:carousel:slid', (e) => {
            eventLog.innerHTML = `<span class="material-icons">check_circle</span><span><strong>slid:</strong> now at slide ${e.detail.to + 1}</span>`;
        });
    }
});
</script>
