<?php
/**
 * UI Demo - Minimal Header
 * Loads only framework CSS via manifest.json
 */

// Get page title (set by individual pages)
$pageTitle = isset($pageTitle) ? $pageTitle . ' - CloudStack' : 'CloudStack - SixOrbit UI Demo';
$pageDescription = isset($pageDescription) ? $pageDescription : 'CloudStack - A demo website built with SixOrbit UI Framework';

// Load manifest for versioned assets
$manifestPath = __DIR__ . '/../../dist/manifest.json';
$manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];

// Get versioned CSS path
$cssFile = isset($manifest['css']['sixorbit-full']) ? $manifest['css']['sixorbit-full'] : 'css/sixorbit-full.css';
$cssPath = '../dist/' . $cssFile;
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- SixOrbit Framework CSS -->
    <link rel="stylesheet" href="<?php echo $cssPath; ?>">
</head>
<body class="so-bg-light">
