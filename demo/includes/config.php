<?php
/**
 * SixOrbit UI Demo - Configuration
 */

// Framework info
define('SO_VERSION', '1.0.0');
define('SO_PREFIX', 'so');
define('SO_DIST_PATH', '../dist');
define('SO_DATA_PATH', './data');

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
