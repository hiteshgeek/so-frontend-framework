<?php
/**
 * SixOrbit UI Demo - Form Elements
 */
$pageTitle = 'Form Elements';
$pageDescription = 'SixOrbit UI Form Components Showcase';

require_once 'includes/config.php';
require_once 'includes/header.php';
require_once 'includes/sidebar.php';
require_once 'includes/navbar.php';
?>

<!-- Main Content -->
<main class="so-main-content">
    <!-- Page Header -->
    <div class="so-page-header">
        <div class="so-page-header-left">
            <h1 class="so-page-title">Form Elements</h1>
            <p class="so-page-subtitle">A showcase of all form components available in SixOrbit UI</p>
        </div>
    </div>

    <!-- Page Body -->
    <div class="so-page-body">
        <!-- Vertical Tabs Container -->
        <div class="so-tabs-container so-tabs-container-vertical">
            <!-- Tabbed Navigation (Vertical Left) -->
            <div class="so-tabs so-tabs-vertical so-tabs-pills so-tabs-sticky" role="tablist" data-so-tabs>
                <button class="so-tab active" role="tab" aria-selected="true" data-so-target="#pane-buttons">
                    <span class="material-icons">ads_click</span>
                    Buttons
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-button-groups">
                    <span class="material-icons">view_week</span>
                    Button Groups
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-inputs">
                    <span class="material-icons">edit_note</span>
                    Text Inputs
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-input-groups">
                    <span class="material-icons">input</span>
                    Input Groups
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-dropdowns">
                    <span class="material-icons">arrow_drop_down_circle</span>
                    Dropdowns
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-checkboxes">
                    <span class="material-icons">checklist</span>
                    Checkboxes & Radios
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-tags-avatars">
                    <span class="material-icons">sell</span>
                    Tags & Avatars
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-cards">
                    <span class="material-icons">dashboard</span>
                    Cards
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-tabs">
                    <span class="material-icons">tab</span>
                    Tabs
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-tooltips">
                    <span class="material-icons">info_outline</span>
                    Tooltips
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-context-menu">
                    <span class="material-icons">menu</span>
                    Context Menu
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-colors">
                    <span class="material-icons">palette</span>
                    Colors
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-utilities">
                    <span class="material-icons">build</span>
                    Utilities
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-alerts-toasts">
                    <span class="material-icons">notifications</span>
                    Alerts & Toasts
                </button>
                <button class="so-tab" role="tab" aria-selected="false" data-so-target="#pane-modals">
                    <span class="material-icons">open_in_new</span>
                    Modals
                </button>
            </div>

            <!-- Tab Content -->
            <div class="so-tab-content">
                <?php include 'includes/form-elements/buttons.php'; ?>
                <?php include 'includes/form-elements/button-groups.php'; ?>
                <?php include 'includes/form-elements/inputs.php'; ?>
                <?php include 'includes/form-elements/input-groups.php'; ?>
                <?php include 'includes/form-elements/dropdowns.php'; ?>
                <?php include 'includes/form-elements/checkboxes.php'; ?>
                <?php include 'includes/form-elements/tags-avatars.php'; ?>
                <?php include 'includes/form-elements/cards.php'; ?>
                <?php include 'includes/form-elements/tabs.php'; ?>
                <?php include 'includes/form-elements/tooltips.php'; ?>
                <?php include 'includes/form-elements/context-menu.php'; ?>
                <?php include 'includes/form-elements/colors.php'; ?>
                <?php include 'includes/form-elements/utilities.php'; ?>
                <?php include 'includes/form-elements/alerts-toasts.php'; ?>
                <?php include 'includes/form-elements/modals.php'; ?>
            </div>
        </div>
    </div>
</main>

<?php
$pageScripts = <<<JS
document.addEventListener('DOMContentLoaded', function() {
    // Progress button API demo
    const progressBtns = document.querySelectorAll('.so-btn-progress[data-so-progress]');
    progressBtns.forEach(btn => {
        btn.addEventListener('so:progress:start', function(e) {
            console.log('Progress started:', e.detail.progress);
        });
        btn.addEventListener('so:progress:update', function(e) {
            console.log('Progress update:', e.detail.progress);
        });
        btn.addEventListener('so:progress:complete', function(e) {
            console.log('Progress complete!');
        });
        btn.addEventListener('so:progress:reset', function(e) {
            console.log('Progress reset');
        });
    });

    const disableDropdownEl = document.querySelector('#demo-disable-dropdown');
    if (disableDropdownEl && typeof SODropdown !== 'undefined') {
        window.disableDropdown = SODropdown.getInstance(disableDropdownEl);
    }

    // Set indeterminate state for demo checkboxes
    const indeterminateCheckbox = document.querySelector('#indeterminate-checkbox input');
    if (indeterminateCheckbox) {
        indeterminateCheckbox.indeterminate = true;
    }
    const indeterminateCheckbox2 = document.querySelector('#indeterminate-checkbox-2 input');
    if (indeterminateCheckbox2) {
        indeterminateCheckbox2.indeterminate = true;
    }

    const demoTabs = document.querySelector('#demo-events-tabs');
    if (demoTabs) {
        demoTabs.addEventListener('so:tab:show', function(e) {
            console.log('so:tab:show - About to show:', e.target.textContent.trim());
            if (e.detail.relatedTarget) {
                console.log('  Previous tab:', e.detail.relatedTarget.textContent.trim());
            }
        });

        demoTabs.addEventListener('so:tab:shown', function(e) {
            console.log('so:tab:shown - Tab now active:', e.target.textContent.trim());
        });

        demoTabs.addEventListener('so:tab:hide', function(e) {
            console.log('so:tab:hide - About to hide:', e.target.textContent.trim());
        });

        demoTabs.addEventListener('so:tab:hidden', function(e) {
            console.log('so:tab:hidden - Tab now hidden:', e.target.textContent.trim());
        });
    }
});
JS;

require_once 'includes/footer.php';
?>
