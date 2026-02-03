<?php
/**
 * SixOrbit UI Engine - Select Element Demo
 */

$pageTitle = 'Select - UI Engine';
$pageDescription = 'Dropdown select with single and multiple selection support';

require_once '../../includes/config.php';
require_once '../../includes/header.php';
require_once '../../includes/sidebar.php';
require_once '../../includes/navbar.php';
?>

<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Select</h1>
            <p class="so-page-subtitle">Dropdown select element with single and multiple selection, option groups, search functionality, and custom styling.</p>
        </div>
    </div>

    <div class="so-page-body">
        <!-- Basic Select -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Select</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-secondary so-mb-3">Basic select using SOSelect component with <code>data-so-select</code> attribute for enhanced styling and interactions.</p>

                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label" for="demo-country">Country</label>
                    <select class="so-form-control" id="demo-country" name="country" data-so-select>
                        <option value="">Select a country</option>
                        <option value="us">United States</option>
                        <option value="uk">United Kingdom</option>
                        <option value="ca">Canada</option>
                        <option value="au">Australia</option>
                    </select>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-select', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$select = UiEngine::select('country')
    ->label('Country')
    ->enhanced()  // Enables SOSelect component
    ->placeholder('Select a country')
    ->options([
        'us' => 'United States',
        'uk' => 'United Kingdom',
        'ca' => 'Canada',
        'au' => 'Australia',
    ]);

echo \$select->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const select = UiEngine.select('country')
    .label('Country')
    .enhanced()  // Enables SOSelect component
    .placeholder('Select a country')
    .options({
        us: 'United States',
        uk: 'United Kingdom',
        ca: 'Canada',
        au: 'Australia',
    });

document.getElementById('container').innerHTML = select.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Native select with data-so-select -->
<select class="so-form-control" id="country" name="country" data-so-select>
    <option value="">Select a country</option>
    <option value="us">United States</option>
    <option value="uk">United Kingdom</option>
    <option value="ca">Canada</option>
    <option value="au">Australia</option>
</select>

<!-- SOSelect generates -->
<div class="so-select">
    <div class="so-select-trigger" tabindex="0">
        <span class="so-select-placeholder">Select a country</span>
        <span class="so-select-arrow">
            <span class="material-icons">expand_more</span>
        </span>
    </div>
    <div class="so-select-dropdown">
        <div class="so-select-options">
            <div class="so-select-option" data-value="us">
                <span class="so-select-option-content">United States</span>
                <span class="so-select-option-check">
                    <span class="material-icons">check</span>
                </span>
            </div>
            <!-- more options... -->
        </div>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Enhanced Select (Custom SOSelect) -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Enhanced Select</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-secondary so-mb-3">Add <code>data-so-select</code> attribute to enable the enhanced select with custom styling, search, and advanced features.</p>

                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">Basic Enhanced</label>
                        <select class="so-form-control" data-so-select>
                            <option value="">Select a country</option>
                            <option value="us">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="ca">Canada</option>
                            <option value="au">Australia</option>
                        </select>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Searchable</label>
                        <select class="so-form-control" data-so-select data-so-searchable="true">
                            <option value="">Search countries...</option>
                            <option value="us">United States</option>
                            <option value="uk">United Kingdom</option>
                            <option value="ca">Canada</option>
                            <option value="au">Australia</option>
                            <option value="de">Germany</option>
                            <option value="fr">France</option>
                        </select>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-enhanced', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Enhanced select with JS features
\$select = UiEngine::select('country')
    ->label('Country')
    ->enhanced()  // Adds data-so-select attribute
    ->placeholder('Select a country')
    ->options([...]);

// Searchable enhanced select
\$select = UiEngine::select('country')
    ->enhanced()
    ->searchable()  // Adds data-so-searchable=\"true\"
    ->placeholder('Search countries...')
    ->options([...]);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Initialize enhanced select programmatically
const select = SOSelect.getInstance('#mySelect', {
    searchable: true,
    placeholder: 'Search countries...'
});

// Or create from scratch
const select = SOSelect.create({
    placeholder: 'Select a country',
    searchable: true,
    options: [
        { value: 'us', label: 'United States' },
        { value: 'uk', label: 'United Kingdom' },
        { value: 'ca', label: 'Canada' },
    ]
});"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Native select with data-so-select -->
<select class="so-form-control" data-so-select>
    <option value="">Select a country</option>
    <option value="us">United States</option>
    ...
</select>

<!-- SOSelect generates this custom structure -->
<div class="so-select">
    <div class="so-select-trigger" tabindex="0">
        <span class="so-select-placeholder">Select a country</span>
        <span class="so-select-arrow">
            <span class="material-icons">expand_more</span>
        </span>
    </div>
    <div class="so-select-dropdown">
        <div class="so-select-options">
            <div class="so-select-option" data-value="us">
                <span class="so-select-option-content">United States</span>
                <span class="so-select-option-check">
                    <span class="material-icons">check</span>
                </span>
            </div>
            <!-- more options... -->
        </div>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Custom Select Structure -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Custom Select Structure</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-secondary so-mb-3">You can also create the full custom select structure directly for complete control.</p>

                <!-- Live Demo -->
                <div class="so-form-group">
                    <label class="so-form-label">Custom Select</label>
                    <div class="so-select" id="demo-custom-select">
                        <div class="so-select-trigger" tabindex="0">
                            <span class="so-select-placeholder">Choose a framework</span>
                            <span class="so-select-arrow">
                                <span class="material-icons">expand_more</span>
                            </span>
                        </div>
                        <div class="so-select-dropdown">
                            <div class="so-select-options">
                                <div class="so-select-option" data-value="react">
                                    <span class="so-select-option-icon"><span class="material-icons">code</span></span>
                                    <span class="so-select-option-content">React</span>
                                    <span class="so-select-option-check"><span class="material-icons">check</span></span>
                                </div>
                                <div class="so-select-option" data-value="vue">
                                    <span class="so-select-option-icon"><span class="material-icons">code</span></span>
                                    <span class="so-select-option-content">Vue.js</span>
                                    <span class="so-select-option-check"><span class="material-icons">check</span></span>
                                </div>
                                <div class="so-select-option" data-value="angular">
                                    <span class="so-select-option-icon"><span class="material-icons">code</span></span>
                                    <span class="so-select-option-content">Angular</span>
                                    <span class="so-select-option-check"><span class="material-icons">check</span></span>
                                </div>
                                <div class="so-select-option so-disabled" data-value="svelte">
                                    <span class="so-select-option-icon"><span class="material-icons">code</span></span>
                                    <span class="so-select-option-content">Svelte (Coming Soon)</span>
                                    <span class="so-select-option-check"><span class="material-icons">check</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-custom', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$select = UiEngine::select('framework')
    ->label('Custom Select')
    ->enhanced()
    ->options([
        ['value' => 'react', 'label' => 'React', 'icon' => 'code'],
        ['value' => 'vue', 'label' => 'Vue.js', 'icon' => 'code'],
        ['value' => 'angular', 'label' => 'Angular', 'icon' => 'code'],
        ['value' => 'svelte', 'label' => 'Svelte (Coming Soon)', 'icon' => 'code', 'disabled' => true],
    ]);

echo \$select->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const select = SOSelect.create({
    placeholder: 'Choose a framework',
    options: [
        { value: 'react', label: 'React', icon: 'code' },
        { value: 'vue', label: 'Vue.js', icon: 'code' },
        { value: 'angular', label: 'Angular', icon: 'code' },
        { value: 'svelte', label: 'Svelte (Coming Soon)', icon: 'code', disabled: true },
    ]
});

document.getElementById('container').appendChild(select.element);"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-select" id="framework-select">
    <div class="so-select-trigger" tabindex="0">
        <span class="so-select-placeholder">Choose a framework</span>
        <span class="so-select-arrow">
            <span class="material-icons">expand_more</span>
        </span>
    </div>
    <div class="so-select-dropdown">
        <div class="so-select-options">
            <div class="so-select-option" data-value="react">
                <span class="so-select-option-icon">
                    <span class="material-icons">code</span>
                </span>
                <span class="so-select-option-content">React</span>
                <span class="so-select-option-check">
                    <span class="material-icons">check</span>
                </span>
            </div>
            <div class="so-select-option so-disabled" data-value="svelte">
                <span class="so-select-option-icon">
                    <span class="material-icons">code</span>
                </span>
                <span class="so-select-option-content">Svelte (Coming Soon)</span>
                <span class="so-select-option-check">
                    <span class="material-icons">check</span>
                </span>
            </div>
        </div>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Option Groups -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Option Groups</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">Basic</label>
                        <select class="so-form-control" id="demo-car" name="car" data-so-select>
                            <option value="">Select a car</option>
                            <optgroup label="German">
                                <option value="bmw">BMW</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </optgroup>
                            <optgroup label="Japanese">
                                <option value="toyota">Toyota</option>
                                <option value="honda">Honda</option>
                                <option value="nissan">Nissan</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Searchable</label>
                        <select class="so-form-control" data-so-select data-so-searchable="true">
                            <option value="">Select a car</option>
                            <optgroup label="German">
                                <option value="bmw">BMW</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </optgroup>
                            <optgroup label="Japanese">
                                <option value="toyota">Toyota</option>
                                <option value="honda">Honda</option>
                                <option value="nissan">Nissan</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-groups', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Basic with groups
\$select = UiEngine::select('car')
    ->label('Car Model')
    ->enhanced()
    ->placeholder('Select a car')
    ->optionGroups([
        'German' => [
            'bmw' => 'BMW',
            'mercedes' => 'Mercedes',
            'audi' => 'Audi',
        ],
        'Japanese' => [
            'toyota' => 'Toyota',
            'honda' => 'Honda',
            'nissan' => 'Nissan',
        ],
    ]);

// Searchable with groups
\$select = UiEngine::select('car')
    ->enhanced()
    ->searchable()  // Add search
    ->placeholder('Select a car')
    ->optionGroups([...]);

echo \$select->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const select = SOSelect.create({
    placeholder: 'Select a car',
    searchable: true,
    options: [
        {
            label: 'German',
            options: [
                { value: 'bmw', label: 'BMW' },
                { value: 'mercedes', label: 'Mercedes' },
                { value: 'audi', label: 'Audi' },
            ]
        },
        {
            label: 'Japanese',
            options: [
                { value: 'toyota', label: 'Toyota' },
                { value: 'honda', label: 'Honda' },
                { value: 'nissan', label: 'Nissan' },
            ]
        }
    ]
});"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Select with optgroups -->
<select class="so-form-control" data-so-select>
    <option value="">Select a car</option>
    <optgroup label="German">
        <option value="bmw">BMW</option>
        <option value="mercedes">Mercedes</option>
    </optgroup>
    <optgroup label="Japanese">
        <option value="toyota">Toyota</option>
        <option value="honda">Honda</option>
    </optgroup>
</select>

<!-- SOSelect generates group structure -->
<div class="so-select">
    <div class="so-select-trigger" tabindex="0">
        <span class="so-select-placeholder">Select a car</span>
        <span class="so-select-arrow">
            <span class="material-icons">expand_more</span>
        </span>
    </div>
    <div class="so-select-dropdown">
        <div class="so-select-options">
            <div class="so-select-group">
                <div class="so-select-group-label">German</div>
                <div class="so-select-option" data-value="bmw">
                    <span class="so-select-option-content">BMW</span>
                    <span class="so-select-option-check">
                        <span class="material-icons">check</span>
                    </span>
                </div>
                <!-- more options... -->
            </div>
            <div class="so-select-group">
                <div class="so-select-group-label">Japanese</div>
                <!-- options... -->
            </div>
        </div>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Multiple Select -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Multiple Selection</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-2 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">Text Display</label>
                        <select class="so-form-control" id="demo-skills" name="skills[]" data-so-select data-so-selection-style="checkbox" multiple>
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                            <option value="js">JavaScript</option>
                            <option value="php">PHP</option>
                            <option value="python">Python</option>
                        </select>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Chips Display</label>
                        <select class="so-form-control" data-so-select data-so-multiple="true" data-so-display-mode="chips" data-so-selection-style="checkbox" data-so-show-actions="true" multiple>
                            <option value="html">HTML</option>
                            <option value="css">CSS</option>
                            <option value="js">JavaScript</option>
                            <option value="php">PHP</option>
                            <option value="python">Python</option>
                        </select>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-multiple', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Text display (default)
\$select = UiEngine::select('skills')
    ->label('Skills')
    ->enhanced()
    ->multiple()
    ->selectionStyle('checkbox')
    ->options([
        'html' => 'HTML',
        'css' => 'CSS',
        'js' => 'JavaScript',
    ]);

// Chips display with actions
\$select = UiEngine::select('skills')
    ->label('Skills')
    ->enhanced()
    ->multiple()
    ->displayMode('chips')          // Show selected as chips
    ->selectionStyle('checkbox')    // Show checkboxes
    ->showActions()                 // Show Select All / None
    ->options([...]);

echo \$select->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const select = SOSelect.getInstance('#skills', {
    multiple: true,
    displayMode: 'chips',
    selectionStyle: 'checkbox',
    showActions: true,
    selectAllText: 'All',
    selectNoneText: 'None',
});

// Select/deselect programmatically
select.addValue('html');
select.removeValue('css');
select.selectAll();
select.selectNone();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<select class="so-form-control" data-so-select
        data-so-multiple="true"
        data-so-display-mode="chips"
        data-so-selection-style="checkbox"
        data-so-show-actions="true" multiple>
    <option value="html">HTML</option>
    <option value="css">CSS</option>
    <option value="js">JavaScript</option>
</select>

<!-- SOSelect generates with chips and checkbox style -->
<div class="so-select so-select-multiple so-select-display-chips so-select-style-checkbox">
    <div class="so-select-trigger" tabindex="0">
        <div class="so-select-chips">
            <span class="so-select-chip" data-value="html">
                <span>HTML</span>
                <button class="so-select-chip-remove">
                    <span class="material-icons">close</span>
                </button>
            </span>
        </div>
        <span class="so-select-arrow">...</span>
    </div>
    <div class="so-select-dropdown">
        <div class="so-select-actions">
            <button class="so-select-action so-select-action-all">All</button>
            <span class="so-select-action-separator">|</span>
            <button class="so-select-action so-select-action-none">None</button>
        </div>
        <div class="so-select-options">
            <div class="so-select-option so-selected" data-value="html">
                <span class="so-checkbox-box">
                    <span class="material-icons">check</span>
                </span>
                <span class="so-select-option-content">HTML</span>
            </div>
        </div>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Selection Styles -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Selection Styles</h3>
            </div>
            <div class="so-card-body">
                <p class="so-text-secondary so-mb-3">Enhanced select supports different selection indicator styles.</p>

                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">Icon + Background (default)</label>
                        <select class="so-form-control" data-so-select data-so-selection-style="icon-bg">
                            <option value="">Select...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Radio Style</label>
                        <select class="so-form-control" data-so-select data-so-selection-style="radio">
                            <option value="">Select...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Background Only</label>
                        <select class="so-form-control" data-so-select data-so-selection-style="bg">
                            <option value="">Select...</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-styles', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Single select styles: 'icon-bg', 'icon', 'bg', 'radio', 'radio-bg'
// Multiple select styles: 'checkbox', 'checkbox-bg', 'icon', 'bg', 'icon-bg'

UiEngine::select('style1')
    ->enhanced()
    ->selectionStyle('icon-bg');  // Default - check icon with background

UiEngine::select('style2')
    ->enhanced()
    ->selectionStyle('radio');    // Radio button indicator

UiEngine::select('style3')
    ->enhanced()
    ->selectionStyle('bg');       // Background only, no icon"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Selection style options
SOSelect.getInstance('#mySelect', {
    selectionStyle: 'icon-bg'  // 'icon-bg', 'icon', 'bg', 'radio', 'radio-bg', 'checkbox', 'checkbox-bg'
});"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Data attribute for selection style -->
<select data-so-select data-so-selection-style="radio">
    ...
</select>

<!-- Generated classes -->
<div class="so-select so-select-style-radio">
    ...
    <div class="so-select-option so-selected" data-value="1">
        <span class="so-radio-circle"></span>
        <span class="so-select-option-content">Option 1</span>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Select Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Select Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-grid so-grid-cols-3 so-grid-cols-sm-1">
                    <div class="so-form-group">
                        <label class="so-form-label">Small</label>
                        <select class="so-form-control so-form-control-sm" data-so-select data-so-size="sm">
                            <option>Small select</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                        </select>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Default</label>
                        <select class="so-form-control" data-so-select>
                            <option>Default select</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                        </select>
                    </div>
                    <div class="so-form-group">
                        <label class="so-form-label">Large</label>
                        <select class="so-form-control so-form-control-lg" data-so-select data-so-size="lg">
                            <option>Large select</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                        </select>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small select
UiEngine::select('small')
    ->size('sm')
    ->enhanced()
    ->options(['opt' => 'Small select']);

// Default select
UiEngine::select('default')
    ->enhanced()
    ->options(['opt' => 'Default select']);

// Large select
UiEngine::select('large')
    ->size('lg')
    ->enhanced()
    ->options(['opt' => 'Large select']);"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Size option
SOSelect.getInstance('#mySelect', {
    size: 'sm'  // 'sm', null (default), 'lg'
});"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<!-- Small -->
<select class="so-form-control so-form-control-sm" data-so-select data-so-size="sm">
    <option>Small select</option>
</select>
<!-- Generates: <div class="so-select so-select-sm">... -->

<!-- Default -->
<select class="so-form-control" data-so-select>
    <option>Default select</option>
</select>

<!-- Large -->
<select class="so-form-control so-form-control-lg" data-so-select data-so-size="lg">
    <option>Large select</option>
</select>
<!-- Generates: <div class="so-select so-select-lg">... -->'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Clearable Select -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Clearable Select</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-form-group" style="max-width: 400px;">
                    <label class="so-form-label">Select with Clear Button</label>
                    <select class="so-form-control" data-so-select data-so-clearable="true">
                        <option value="">Select a language</option>
                        <option value="en">English</option>
                        <option value="es">Spanish</option>
                        <option value="fr">French</option>
                        <option value="de">German</option>
                    </select>
                    <div class="so-form-hint">Select an option to see the clear button</div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('select-clearable', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$select = UiEngine::select('language')
    ->label('Language')
    ->enhanced()
    ->clearable()  // Adds clear button
    ->placeholder('Select a language')
    ->options([
        'en' => 'English',
        'es' => 'Spanish',
        'fr' => 'French',
        'de' => 'German',
    ]);

echo \$select->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const select = SOSelect.getInstance('#language', {
    clearable: true,
    placeholder: 'Select a language'
});

// Listen for clear event
select.element.addEventListener('select:clear', (e) => {
    console.log('Selection cleared');
});

// Clear programmatically
select.clear();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<select class="so-form-control" data-so-select data-so-clearable="true">
    <option value="">Select a language</option>
    <option value="en">English</option>
    ...
</select>

<!-- Generated with clear button -->
<div class="so-select so-select-clearable">
    <div class="so-select-trigger" tabindex="0">
        <span class="so-select-value">English</span>
        <button class="so-select-clear">
            <span class="material-icons">close</span>
        </button>
        <span class="so-select-arrow">
            <span class="material-icons">expand_more</span>
        </span>
    </div>
    ...
</div>'
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
                <!-- API Tabs -->
                <div class="so-tabs" role="tablist" data-so-tabs>
                    <button class="so-tab so-active" role="tab" data-so-target="#api-php">PHP Class</button>
                    <button class="so-tab" role="tab" data-so-target="#api-js">JS UiEngine</button>
                </div>

                <div class="so-tab-content">
                    <!-- PHP Class Reference -->
                    <div class="so-tab-pane so-fade so-show so-active" id="api-php" role="tabpanel">
                        <h5 class="so-mt-3">Core\\UiEngine\\Elements\\Form\\Select</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine::select(string $name)</code></td>
                                        <td>Create select dropdown with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Options Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>options(array $options)</code></td>
                                        <td>Set select options</td>
                                    </tr>
                                    <tr>
                                        <td><code>option(mixed $value, string $label, bool $disabled = false)</code></td>
                                        <td>Add single option</td>
                                    </tr>
                                    <tr>
                                        <td><code>optgroup(string $label, array $options)</code></td>
                                        <td>Add option group</td>
                                    </tr>
                                    <tr>
                                        <td><code>emptyOption(string $text, string $value = '')</code></td>
                                        <td>Add placeholder option</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Behavior Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>multiple(bool $val = true)</code></td>
                                        <td>Enable multiple selection</td>
                                    </tr>
                                    <tr>
                                        <td><code>visibleSize(int $size)</code></td>
                                        <td>Set visible options count</td>
                                    </tr>
                                    <tr>
                                        <td><code>searchable(bool $val = true)</code></td>
                                        <td>Enable search/filter (JS enhancement)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods (from FormElement)</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>name(string $name)</code></td>
                                        <td>Set input name</td>
                                    </tr>
                                    <tr>
                                        <td><code>value(mixed $value)</code></td>
                                        <td>Set selected value(s)</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(string $label)</code></td>
                                        <td>Set label</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(bool $val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(bool $val = true)</code></td>
                                        <td>Disable select</td>
                                    </tr>
                                    <tr>
                                        <td><code>help(string $text)</code></td>
                                        <td>Add help text</td>
                                    </tr>
                                    <tr>
                                        <td><code>error(string $message)</code></td>
                                        <td>Set error message</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render select element</td>
                                    </tr>
                                    <tr>
                                        <td><code>renderGroup()</code></td>
                                        <td>Render with label, help, error</td>
                                    </tr>
                                    <tr>
                                        <td><code>toArray()</code></td>
                                        <td>Export configuration array</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- JS UiEngine Reference -->
                    <div class="so-tab-pane so-fade" id="api-js" role="tabpanel">
                        <h5 class="so-mt-3">UiEngine.select()</h5>
                        <p class="so-text-muted">Extends FormElement</p>

                        <h6 class="so-mt-4">Constructor</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <tbody>
                                    <tr>
                                        <td><code>UiEngine.select(name)</code></td>
                                        <td>Create select dropdown with name</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Options Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>options(opts)</code></td>
                                        <td>Set select options</td>
                                    </tr>
                                    <tr>
                                        <td><code>option(value, label, disabled = false)</code></td>
                                        <td>Add single option</td>
                                    </tr>
                                    <tr>
                                        <td><code>optgroup(label, opts)</code></td>
                                        <td>Add option group</td>
                                    </tr>
                                    <tr>
                                        <td><code>emptyOption(text, value = '')</code></td>
                                        <td>Add placeholder option</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Behavior Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>multiple(val = true)</code></td>
                                        <td>Enable multiple selection</td>
                                    </tr>
                                    <tr>
                                        <td><code>visibleSize(size)</code></td>
                                        <td>Set visible options count</td>
                                    </tr>
                                    <tr>
                                        <td><code>searchable(val = true)</code></td>
                                        <td>Enable search/filter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Inherited Methods (from FormElement)</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>name(name)</code></td>
                                        <td>Set input name</td>
                                    </tr>
                                    <tr>
                                        <td><code>value(value)</code></td>
                                        <td>Set selected value(s)</td>
                                    </tr>
                                    <tr>
                                        <td><code>label(label)</code></td>
                                        <td>Set label</td>
                                    </tr>
                                    <tr>
                                        <td><code>required(val = true)</code></td>
                                        <td>Mark as required</td>
                                    </tr>
                                    <tr>
                                        <td><code>disabled(val = true)</code></td>
                                        <td>Disable select</td>
                                    </tr>
                                    <tr>
                                        <td><code>id(id)</code></td>
                                        <td>Set element ID</td>
                                    </tr>
                                    <tr>
                                        <td><code>addClass(className)</code></td>
                                        <td>Add CSS class</td>
                                    </tr>
                                    <tr>
                                        <td><code>attr(name, value)</code></td>
                                        <td>Set custom attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>data(key, value)</code></td>
                                        <td>Set data-* attribute</td>
                                    </tr>
                                    <tr>
                                        <td><code>toHtml()</code></td>
                                        <td>Get HTML string</td>
                                    </tr>
                                    <tr>
                                        <td><code>render()</code></td>
                                        <td>Render to DOM element</td>
                                    </tr>
                                    <tr>
                                        <td><code>renderGroup()</code></td>
                                        <td>Render with label, help, error</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">SOSelect Runtime Instance Methods</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Method</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>getValue()</code></td>
                                        <td>Get current value(s)</td>
                                    </tr>
                                    <tr>
                                        <td><code>setValue(value)</code></td>
                                        <td>Set selected value(s)</td>
                                    </tr>
                                    <tr>
                                        <td><code>addValue(value)</code></td>
                                        <td>Add to selection (multiple)</td>
                                    </tr>
                                    <tr>
                                        <td><code>removeValue(value)</code></td>
                                        <td>Remove from selection</td>
                                    </tr>
                                    <tr>
                                        <td><code>selectAll()</code></td>
                                        <td>Select all options</td>
                                    </tr>
                                    <tr>
                                        <td><code>selectNone()</code></td>
                                        <td>Deselect all options</td>
                                    </tr>
                                    <tr>
                                        <td><code>clear()</code></td>
                                        <td>Clear selection</td>
                                    </tr>
                                    <tr>
                                        <td><code>open()</code></td>
                                        <td>Open dropdown</td>
                                    </tr>
                                    <tr>
                                        <td><code>close()</code></td>
                                        <td>Close dropdown</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h6 class="so-mt-4">Events</h6>
                        <div class="so-table-responsive">
                            <table class="so-table so-table-bordered so-table-sm">
                                <thead class="so-table-light">
                                    <tr>
                                        <th style="width:40%">Event</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>select:change</code></td>
                                        <td>Fired when selection changes (detail: {value, values, text, texts})</td>
                                    </tr>
                                    <tr>
                                        <td><code>select:open</code></td>
                                        <td>Fired when dropdown opens</td>
                                    </tr>
                                    <tr>
                                        <td><code>select:close</code></td>
                                        <td>Fired when dropdown closes</td>
                                    </tr>
                                    <tr>
                                        <td><code>select:search</code></td>
                                        <td>Fired on search (detail: {query})</td>
                                    </tr>
                                    <tr>
                                        <td><code>select:clear</code></td>
                                        <td>Fired when cleared (detail: {previousValues})</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>

<script>
// Initialize all enhanced selects
document.addEventListener('DOMContentLoaded', function() {
    // Custom select demo initialization
    const customSelect = document.getElementById('demo-custom-select');
    if (customSelect && typeof SOSelect !== 'undefined') {
        SOSelect.getInstance(customSelect);
    }
});
</script>
