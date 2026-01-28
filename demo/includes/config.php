<?php
/**
 * SixOrbit UI Demo - Configuration
 */

// Framework info
define('SO_VERSION', '1.0.0');
define('SO_PREFIX', 'so');

// Calculate base path based on current script location
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);
$demoBase = '/so-framework/demo';
$depth = substr_count(str_replace($demoBase, '', $scriptDir), '/');
$relativePrefix = $depth > 0 ? str_repeat('../', $depth) : '';

define('SO_DIST_PATH', $relativePrefix . '../dist');
define('SO_DATA_PATH', $relativePrefix . 'data');

// Demo company info
define('DEMO_COMPANY_NAME', 'Trove Innovation');
define('DEMO_COMPANY_INITIALS', 'TI');
define('DEMO_USER_NAME', 'Rajeev');
define('DEMO_USER_EMAIL', 'rajeev@trove.com');

// Load manifest for versioned assets
function loadManifest() {
    $manifestPath = SO_DIST_PATH . '/manifest.json';
    if (file_exists($manifestPath)) {
        return json_decode(file_get_contents($manifestPath), true);
    }
    return ['css' => [], 'js' => []];
}

$manifest = loadManifest();

/**
 * Get asset path from manifest
 * @param string $type - 'css' or 'js'
 * @param string $name - Asset name without extension
 * @return string - Full path to asset
 */
function so_asset($type, $name) {
    global $manifest;
    $key = $name;

    // Get versioned filename from manifest
    $filename = $manifest[$type][$key] ?? null;

    if ($filename) {
        return SO_DIST_PATH . '/' . $filename;
    }

    // Fallback to non-versioned
    return SO_DIST_PATH . "/{$type}/{$name}.{$type}";
}

/**
 * Get page-specific asset path from manifest
 * @param string $page - Page name (e.g., 'search')
 * @param string $type - 'css' or 'js'
 * @return string|null - Full path to asset or null if not found
 */
function so_page_asset($page, $type) {
    global $manifest;

    // Get versioned filename from manifest pages section
    $filename = $manifest['pages'][$page][$type] ?? null;

    if ($filename) {
        return SO_DIST_PATH . '/' . $filename;
    }

    // Fallback to non-versioned path
    $fallbackPath = SO_DIST_PATH . "/pages/{$page}/{$page}.{$type}";
    if (file_exists($fallbackPath)) {
        return $fallbackPath;
    }

    return null;
}

/**
 * Load JSON data file
 * @param string $filename - File name without path
 * @return array - Parsed JSON data
 */
function load_data($filename) {
    $path = SO_DATA_PATH . '/' . $filename;
    if (file_exists($path)) {
        return json_decode(file_get_contents($path), true);
    }
    return [];
}

/**
 * Get current page name
 * @return string - Current page name without extension
 */
function get_current_page() {
    return basename($_SERVER['PHP_SELF'], '.php');
}

/**
 * Check if current page matches
 * @param string|array $pages - Page name(s) to check
 * @return bool - Whether current page matches
 */
function is_page($pages) {
    $current = get_current_page();
    if (is_array($pages)) {
        return in_array($current, $pages);
    }
    return $current === $pages;
}

/**
 * Generate a single-language code block
 * @param string $code - The code to display (will be HTML escaped)
 * @param string $language - Language for syntax highlighting (html, css, javascript, php, etc.)
 * @return string - HTML for the code block
 */
function so_code_block($code, $language = 'html') {
    $escaped = htmlspecialchars($code, ENT_QUOTES, 'UTF-8');
    return <<<HTML
<div class="so-code-block">
    <div class="so-code-header">
        <span class="so-code-label"><span class="material-icons">code</span> {$language}</span>
        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
    </div>
    <pre class="so-code-content"><code class="language-{$language}">{$escaped}</code></pre>
</div>
HTML;
}

/**
 * Generate a tabbed code block with multiple languages
 * @param string $id - Unique ID for the tabs
 * @param array $tabs - Array of tabs: [['label' => 'HTML', 'language' => 'html', 'icon' => 'code', 'code' => '...'], ...]
 * @return string - HTML for the tabbed code block
 */
function so_code_tabs($id, $tabs) {
    $tabButtons = '';
    $tabPanes = '';

    foreach ($tabs as $index => $tab) {
        $isActive = $index === 0 ? ' so-active' : '';
        $label = $tab['label'] ?? strtoupper($tab['language']);
        $icon = $tab['icon'] ?? ($tab['language'] === 'javascript' ? 'javascript' : 'code');
        $escaped = htmlspecialchars($tab['code'], ENT_QUOTES, 'UTF-8');
        $paneId = "{$id}-{$tab['language']}";

        $tabButtons .= <<<HTML
            <button class="so-code-tab{$isActive}" data-so-target="#{$paneId}">
                <span class="material-icons">{$icon}</span> {$label}
            </button>
HTML;

        $tabPanes .= <<<HTML
        <div class="so-code-pane{$isActive}" id="{$paneId}">
            <pre class="so-code-content"><code class="language-{$tab['language']}">{$escaped}</code></pre>
        </div>
HTML;
    }

    return <<<HTML
<div class="so-code-block so-code-block-tabbed">
    <div class="so-code-header">
        <div class="so-code-tabs">
{$tabButtons}
        </div>
        <button class="so-code-copy" onclick="copyCode(this)"><span class="material-icons">content_copy</span></button>
    </div>
    <div class="so-code-body">
{$tabPanes}
    </div>
</div>
HTML;
}

/**
 * Generate random demo data
 * @param string $type - Type of data (name, email, amount, etc.)
 * @return string - Random value
 */
function demo_random($type = 'name') {
    $names = ['Ajay Kumar', 'Priya Sharma', 'Rahul Singh', 'Meera Patel', 'Vikash Gupta'];
    $companies = ['Tech Solutions', 'Global Traders', 'Sunrise Exports', 'Metro Industries'];

    switch ($type) {
        case 'name':
            return $names[array_rand($names)];
        case 'company':
            return $companies[array_rand($companies)];
        case 'amount':
            return number_format(rand(1000, 100000), 2);
        case 'date':
            return date('d M Y', strtotime('-' . rand(0, 30) . ' days'));
        default:
            return '';
    }
}
