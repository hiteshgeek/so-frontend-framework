<?php
/**
 * SixOrbit UI Engine - Demo Index Page
 */

$pageTitle = 'UI Engine';
$pageDescription = 'Programmatic UI generation with symmetric PHP/JS API';

require_once '../includes/config.php';
require_once '../includes/header.php';
require_once '../includes/sidebar.php';
require_once '../includes/navbar.php';

// Element categories with their demos
$categories = [
    'form' => [
        'title' => 'Form Elements',
        'icon' => 'input',
        'color' => 'primary',
        'description' => '17 form elements for building interactive forms',
        'elements' => [
            ['name' => 'Input', 'icon' => 'text_fields', 'url' => 'form/input.php', 'desc' => 'Text inputs with types'],
            ['name' => 'Select', 'icon' => 'arrow_drop_down', 'url' => 'form/select.php', 'desc' => 'Dropdown selection'],
            ['name' => 'Checkbox', 'icon' => 'check_box', 'url' => 'form/checkbox.php', 'desc' => 'Checkboxes & switches'],
            ['name' => 'Radio', 'icon' => 'radio_button_checked', 'url' => 'form/radio.php', 'desc' => 'Radio button groups'],
            ['name' => 'Textarea', 'icon' => 'notes', 'url' => 'form/textarea.php', 'desc' => 'Multi-line text input'],
            ['name' => 'Button', 'icon' => 'smart_button', 'url' => 'form/button.php', 'desc' => 'Action buttons'],
            ['name' => 'File Input', 'icon' => 'attach_file', 'url' => 'form/file-input.php', 'desc' => 'File uploads'],
            ['name' => 'Hidden', 'icon' => 'visibility_off', 'url' => 'form/hidden.php', 'desc' => 'Hidden form fields'],
            ['name' => 'Form', 'icon' => 'description', 'url' => 'form/form.php', 'desc' => 'Form wrapper'],
            ['name' => 'Autocomplete', 'icon' => 'search', 'url' => 'form/autocomplete.php', 'desc' => 'Search with suggestions'],
            ['name' => 'Color Input', 'icon' => 'palette', 'url' => 'form/color-input.php', 'desc' => 'Color picker'],
            ['name' => 'Date Picker', 'icon' => 'calendar_today', 'url' => 'form/date-picker.php', 'desc' => 'Date selection'],
            ['name' => 'Time Picker', 'icon' => 'schedule', 'url' => 'form/time-picker.php', 'desc' => 'Time selection'],
            ['name' => 'Toggle', 'icon' => 'toggle_on', 'url' => 'form/toggle.php', 'desc' => 'Toggle switch'],
            ['name' => 'Slider', 'icon' => 'tune', 'url' => 'form/slider.php', 'desc' => 'Range slider'],
            ['name' => 'Dropzone', 'icon' => 'cloud_upload', 'url' => 'form/dropzone.php', 'desc' => 'Drag & drop upload'],
            ['name' => 'OTP Input', 'icon' => 'pin', 'url' => 'form/otp-input.php', 'desc' => 'One-time password'],
        ]
    ],
    'display' => [
        'title' => 'Display Elements',
        'icon' => 'widgets',
        'color' => 'success',
        'description' => '22 elements for content display and feedback',
        'elements' => [
            ['name' => 'Accordion', 'icon' => 'expand_more', 'url' => 'display/accordion.php', 'desc' => 'Collapsible panels'],
            ['name' => 'Alert', 'icon' => 'warning', 'url' => 'display/alert.php', 'desc' => 'Alert messages'],
            ['name' => 'Badge', 'icon' => 'new_releases', 'url' => 'display/badge.php', 'desc' => 'Status badges'],
            ['name' => 'Card', 'icon' => 'credit_card', 'url' => 'display/card.php', 'desc' => 'Content cards'],
            ['name' => 'Modal', 'icon' => 'open_in_new', 'url' => 'display/modal.php', 'desc' => 'Modal dialogs'],
            ['name' => 'Progress', 'icon' => 'donut_large', 'url' => 'display/progress.php', 'desc' => 'Progress bars'],
            ['name' => 'Table', 'icon' => 'table_chart', 'url' => 'display/table.php', 'desc' => 'Data tables'],
            ['name' => 'Tabs', 'icon' => 'tab', 'url' => 'display/tabs.php', 'desc' => 'Tabbed content'],
            ['name' => 'Toast', 'icon' => 'notifications', 'url' => 'display/toast.php', 'desc' => 'Toast notifications'],
            ['name' => 'Tooltip', 'icon' => 'chat_bubble_outline', 'url' => 'display/tooltip.php', 'desc' => 'Hover tooltips'],
            ['name' => 'Breadcrumb', 'icon' => 'navigation', 'url' => 'display/breadcrumb.php', 'desc' => 'Navigation breadcrumbs'],
            ['name' => 'Pagination', 'icon' => 'last_page', 'url' => 'display/pagination.php', 'desc' => 'Page navigation'],
            ['name' => 'Carousel', 'icon' => 'view_carousel', 'url' => 'display/carousel.php', 'desc' => 'Image carousel'],
            ['name' => 'Timeline', 'icon' => 'timeline', 'url' => 'display/timeline.php', 'desc' => 'Vertical timeline'],
            ['name' => 'Stepper', 'icon' => 'format_list_numbered', 'url' => 'display/stepper.php', 'desc' => 'Step wizard'],
            ['name' => 'List Group', 'icon' => 'list', 'url' => 'display/list-group.php', 'desc' => 'List of items'],
            ['name' => 'Rating', 'icon' => 'star', 'url' => 'display/rating.php', 'desc' => 'Star rating'],
            ['name' => 'Spinner', 'icon' => 'refresh', 'url' => 'display/spinner.php', 'desc' => 'Loading spinner'],
            ['name' => 'Skeleton', 'icon' => 'hourglass_empty', 'url' => 'display/skeleton.php', 'desc' => 'Loading skeleton'],
            ['name' => 'Empty State', 'icon' => 'inbox', 'url' => 'display/empty-state.php', 'desc' => 'Empty placeholder'],
            ['name' => 'Media Object', 'icon' => 'perm_media', 'url' => 'display/media-object.php', 'desc' => 'Media with text'],
            ['name' => 'Code Block', 'icon' => 'code', 'url' => 'display/code-block.php', 'desc' => 'Syntax highlighted code'],
        ]
    ],
    'navigation' => [
        'title' => 'Navigation Elements',
        'icon' => 'menu',
        'color' => 'info',
        'description' => '4 elements for navigation and menus',
        'elements' => [
            ['name' => 'Dropdown', 'icon' => 'arrow_drop_down_circle', 'url' => 'navigation/dropdown.php', 'desc' => 'Dropdown menus'],
            ['name' => 'Context Menu', 'icon' => 'more_vert', 'url' => 'navigation/context-menu.php', 'desc' => 'Right-click menus'],
            ['name' => 'Navbar', 'icon' => 'web', 'url' => 'navigation/navbar.php', 'desc' => 'Navigation bar'],
            ['name' => 'Collapse', 'icon' => 'unfold_less', 'url' => 'navigation/collapse.php', 'desc' => 'Collapsible content'],
        ]
    ],
    'layout' => [
        'title' => 'Layout Elements',
        'icon' => 'dashboard',
        'color' => 'warning',
        'description' => '6 elements for page structure and layout',
        'elements' => [
            ['name' => 'Container', 'icon' => 'crop_free', 'url' => 'layout/container.php', 'desc' => 'Content container'],
            ['name' => 'Row', 'icon' => 'table_rows', 'url' => 'layout/row.php', 'desc' => 'Grid row'],
            ['name' => 'Column', 'icon' => 'view_column', 'url' => 'layout/column.php', 'desc' => 'Grid column'],
            ['name' => 'Divider', 'icon' => 'horizontal_rule', 'url' => 'layout/divider.php', 'desc' => 'Visual divider'],
            ['name' => 'Grid', 'icon' => 'grid_on', 'url' => 'layout/grid.php', 'desc' => 'CSS Grid layout'],
            ['name' => 'Flex', 'icon' => 'view_agenda', 'url' => 'layout/flex.php', 'desc' => 'Flexbox container'],
        ]
    ],
];

$totalElements = array_sum(array_map(fn($c) => count($c['elements']), $categories));
?>

<main class="so-main-content">
    <div class="so-container-fluid so-p-4">
        <!-- Page Header -->
        <div class="so-page-header so-mb-4">
            <div class="so-d-flex so-justify-content-between so-align-items-center so-flex-wrap so-gap-3">
                <div>
                    <h1 class="so-page-title so-d-flex so-align-items-center so-gap-2 so-mb-1">
                        <span class="material-icons so-text-primary">auto_awesome</span>
                        UI Engine
                    </h1>
                    <p class="so-text-muted so-mb-0">Programmatic UI generation with symmetric PHP/JS API</p>
                </div>
                <span class="so-badge so-bg-primary so-fs-6 so-px-3 so-py-2"><?= $totalElements ?> Elements</span>
            </div>
        </div>

        <!-- Overview Stats -->
        <div class="so-row so-g-4 so-mb-4">
            <?php foreach ($categories as $key => $cat): ?>
            <div class="so-col-6 so-col-lg-3">
                <div class="so-card so-card-hover so-h-100" style="border-top: 3px solid var(--so-<?= $cat['color'] ?>);">
                    <div class="so-card-body so-text-center so-py-4">
                        <span class="material-icons so-text-<?= $cat['color'] ?>" style="font-size: 2.5rem;"><?= $cat['icon'] ?></span>
                        <h3 class="so-h4 so-mb-1 so-mt-2"><?= count($cat['elements']) ?></h3>
                        <p class="so-text-muted so-small so-mb-0"><?= $cat['title'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Introduction -->
        <div class="so-card so-mb-4">
            <div class="so-card-body so-p-4">
                <h2 class="so-h5 so-mb-3 so-d-flex so-align-items-center so-gap-2">
                    <span class="material-icons so-text-primary">info</span>
                    About UI Engine
                </h2>
                <p class="so-mb-4">
                    UI Engine provides a consistent, fluent API for building user interfaces programmatically in both PHP (server-side) and JavaScript (client-side). The API is symmetric between the two languages, allowing seamless development.
                </p>
                <div class="so-row so-g-4">
                    <div class="so-col-md-6">
                        <h6 class="so-d-flex so-align-items-center so-gap-2 so-mb-3">
                            <span class="material-icons so-text-success">check_circle</span>
                            Key Features
                        </h6>
                        <ul class="so-mb-0">
                            <li class="so-mb-2">Symmetric PHP/JS API</li>
                            <li class="so-mb-2">Fluent method chaining</li>
                            <li class="so-mb-2">Config array support</li>
                            <li class="so-mb-2">Validation integration</li>
                            <li>Extensible with custom elements</li>
                        </ul>
                    </div>
                    <div class="so-col-md-6">
                        <h6 class="so-d-flex so-align-items-center so-gap-2 so-mb-3">
                            <span class="material-icons so-text-info">code</span>
                            Quick Example
                        </h6>
                        <?= so_code_block("// PHP
\$input = UiEngine::input('email')
    ->label('Email')
    ->required()
    ->rules('required|email');
echo \$input->render();", 'php') ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Element Categories -->
        <?php foreach ($categories as $key => $cat): ?>
        <div class="so-card so-mb-4" id="<?= $key ?>">
            <div class="so-card-header" style="border-left: 3px solid var(--so-<?= $cat['color'] ?>);">
                <h3 class="so-card-title"><?= $cat['title'] ?></h3>
            </div>
            <div class="so-card-body">
                <div class="so-row so-g-3">
                    <?php foreach ($cat['elements'] as $el): ?>
                    <div class="so-col-6 so-col-md-4 so-col-lg-3">
                        <a href="<?= $el['url'] ?>" class="so-card so-card-hover so-h-100 so-text-decoration-none so-border">
                            <div class="so-card-body so-d-flex so-align-items-center so-gap-3 so-p-3">
                                <span class="material-icons so-text-<?= $cat['color'] ?>"><?= $el['icon'] ?></span>
                                <div>
                                    <div class="so-fw-semibold so-text-dark"><?= $el['name'] ?></div>
                                    <small class="so-text-muted"><?= $el['desc'] ?></small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <!-- Getting Started Link -->
        <div class="so-card so-bg-primary so-text-white">
            <div class="so-card-body so-text-center so-py-5">
                <h3 class="so-h5 so-mb-2">Ready to Get Started?</h3>
                <p class="so-mb-4 so-opacity-75">Check out the getting started guide for setup instructions and basic usage.</p>
                <a href="getting-started.php" class="so-btn so-btn-light so-btn-lg">
                    <span class="material-icons so-me-2">play_arrow</span> Getting Started
                </a>
            </div>
        </div>
    </div>
</main>

<?php require_once '../includes/footer.php'; ?>
