<?php
/**
 * SixOrbit UI Engine - File Input Element Demo
 */

$pageTitle = 'File Input - UI Engine';
$pageDescription = 'File input with drag-and-drop and preview support';

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
                <li class="so-breadcrumb-item"><a href="../index.php#form">Form Elements</a></li>
                <li class="so-breadcrumb-item so-active">File Input</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">attach_file</span>
            File Input
        </h1>
        <p class="so-page-subtitle">File input element with file type restrictions, multiple file support, and preview functionality.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic File Input -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic File Input</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-file">Choose file</label>
                        <input type="file" class="so-form-control" id="demo-file" name="file">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-file', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$file = UiEngine::file('document')
    ->label('Choose file');

echo \$file->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const file = UiEngine.file('document')
    .label('Choose file');

document.getElementById('container').innerHTML = file.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label" for="document">Choose file</label>
    <input type="file" class="so-form-control" id="document" name="document">
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With File Type Restriction -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">File Type Restrictions</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-row so-g-3">
                        <div class="so-col-md-6">
                            <div class="so-form-group">
                                <label class="so-form-label" for="demo-image">Image files only</label>
                                <input type="file" class="so-form-control" id="demo-image" accept="image/*">
                                <small class="so-form-text so-text-muted">Accepts: JPG, PNG, GIF, etc.</small>
                            </div>
                        </div>
                        <div class="so-col-md-6">
                            <div class="so-form-group">
                                <label class="so-form-label" for="demo-pdf">PDF files only</label>
                                <input type="file" class="so-form-control" id="demo-pdf" accept=".pdf">
                                <small class="so-form-text so-text-muted">Accepts: PDF documents</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('file-types', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Image files only
UiEngine::file('image')
    ->label('Image files only')
    ->accept('image/*')
    ->help('Accepts: JPG, PNG, GIF, etc.');

// PDF files only
UiEngine::file('document')
    ->label('PDF files only')
    ->accept('.pdf')
    ->help('Accepts: PDF documents');

// Multiple specific types
UiEngine::file('media')
    ->label('Media files')
    ->accept('.jpg,.png,.mp4,.mp3');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Image files only
UiEngine.file('image')
    .label('Image files only')
    .accept('image/*')
    .help('Accepts: JPG, PNG, GIF, etc.');

// PDF files only
UiEngine.file('document')
    .label('PDF files only')
    .accept('.pdf')
    .help('Accepts: PDF documents');

// Multiple specific types
UiEngine.file('media')
    .label('Media files')
    .accept('.jpg,.png,.mp4,.mp3');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Multiple Files -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Multiple Files</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-files">Upload multiple files</label>
                        <input type="file" class="so-form-control" id="demo-files" name="files[]" multiple>
                        <small class="so-form-text so-text-muted">Hold Ctrl/Cmd to select multiple files</small>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('file-multiple', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$file = UiEngine::file('files')
    ->label('Upload multiple files')
    ->multiple()
    ->help('Hold Ctrl/Cmd to select multiple files');

echo \$file->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const file = UiEngine.file('files')
    .label('Upload multiple files')
    .multiple()
    .help('Hold Ctrl/Cmd to select multiple files');

document.getElementById('container').innerHTML = file.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Size Limit -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Size Limit</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-form-group">
                        <label class="so-form-label" for="demo-limited">Upload file (max 5MB)</label>
                        <input type="file" class="so-form-control" id="demo-limited" name="limited">
                        <small class="so-form-text so-text-muted">Maximum file size: 5MB</small>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('file-size', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$file = UiEngine::file('limited')
    ->label('Upload file (max 5MB)')
    ->maxSize(5 * 1024 * 1024) // 5MB in bytes
    ->help('Maximum file size: 5MB');

echo \$file->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const file = UiEngine.file('limited')
    .label('Upload file (max 5MB)')
    .maxSize(5 * 1024 * 1024) // 5MB in bytes
    .help('Maximum file size: 5MB');

document.getElementById('container').innerHTML = file.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- File Input Sizes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Input Sizes</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-mb-3">
                        <label class="so-form-label">Small</label>
                        <input type="file" class="so-form-control so-form-control-sm">
                    </div>
                    <div class="so-mb-3">
                        <label class="so-form-label">Default</label>
                        <input type="file" class="so-form-control">
                    </div>
                    <div>
                        <label class="so-form-label">Large</label>
                        <input type="file" class="so-form-control so-form-control-lg">
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('file-sizes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Small file input
UiEngine::file('small')->size('sm');

// Default file input
UiEngine::file('default');

// Large file input
UiEngine::file('large')->size('lg');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Small file input
UiEngine.file('small').size('sm').toHtml();

// Default file input
UiEngine.file('default').toHtml();

// Large file input
UiEngine.file('large').size('lg').toHtml();"
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
                                <td><code>accept()</code></td>
                                <td><code>string $types</code></td>
                                <td>Set accepted file types (e.g., 'image/*', '.pdf')</td>
                            </tr>
                            <tr>
                                <td><code>multiple()</code></td>
                                <td>-</td>
                                <td>Allow multiple file selection</td>
                            </tr>
                            <tr>
                                <td><code>maxSize()</code></td>
                                <td><code>int $bytes</code></td>
                                <td>Set maximum file size in bytes</td>
                            </tr>
                            <tr>
                                <td><code>preview()</code></td>
                                <td>-</td>
                                <td>Enable file preview (for images)</td>
                            </tr>
                            <tr>
                                <td><code>size()</code></td>
                                <td><code>string $size</code></td>
                                <td>Set size: 'sm' or 'lg'</td>
                            </tr>
                            <tr>
                                <td><code>required()</code></td>
                                <td>-</td>
                                <td>Mark as required</td>
                            </tr>
                            <tr>
                                <td><code>disabled()</code></td>
                                <td>-</td>
                                <td>Disable the file input</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
