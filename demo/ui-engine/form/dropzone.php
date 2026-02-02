<?php
/**
 * SixOrbit UI Engine - Dropzone Element Demo
 */

$pageTitle = 'Dropzone - UI Engine';
$pageDescription = 'Drag-and-drop file upload area with previews';

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
                <li class="so-breadcrumb-item so-active">Dropzone</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">cloud_upload</span>
            Dropzone
        </h1>
        <p class="so-page-subtitle">Drag-and-drop file upload area with file previews, progress indicators, and validation.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Dropzone -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Dropzone</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-dropzone so-p-5 so-border so-border-dashed so-rounded so-text-center" style="border-color: #dee2e6;">
                        <span class="material-icons so-text-muted" style="font-size: 48px;">cloud_upload</span>
                        <p class="so-mt-2 so-mb-1">Drag and drop files here</p>
                        <p class="so-text-muted so-small">or click to browse</p>
                        <input type="file" class="so-d-none" multiple>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('basic-dropzone', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$dropzone = UiEngine::dropzone('files')
    ->label('Upload Files')
    ->message('Drag and drop files here')
    ->subMessage('or click to browse');

echo \$dropzone->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const dropzone = UiEngine.dropzone('files')
    .label('Upload Files')
    .message('Drag and drop files here')
    .subMessage('or click to browse');

document.getElementById('container').innerHTML = dropzone.toHtml();"
                    ],
                    [
                        'label' => 'HTML Output',
                        'language' => 'html',
                        'icon' => 'code',
                        'code' => '<div class="so-form-group">
    <label class="so-form-label">Upload Files</label>
    <div class="so-dropzone" data-dropzone>
        <div class="so-dropzone-message">
            <span class="material-icons">cloud_upload</span>
            <p>Drag and drop files here</p>
            <p class="so-text-muted">or click to browse</p>
        </div>
        <input type="file" name="files[]" multiple hidden>
    </div>
</div>'
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With File Type Restrictions -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">File Type Restrictions</h3>
            </div>
            <div class="so-card-body">
                <!-- Live Demo -->
                <div class="so-demo-preview so-mb-4 so-p-4 so-bg-light so-rounded">
                    <div class="so-dropzone so-p-5 so-border so-border-dashed so-rounded so-text-center" style="border-color: #dee2e6;">
                        <span class="material-icons so-text-muted" style="font-size: 48px;">image</span>
                        <p class="so-mt-2 so-mb-1">Drop images here</p>
                        <p class="so-text-muted so-small">Accepts: JPG, PNG, GIF (max 5MB)</p>
                    </div>
                </div>

                <!-- Code Tabs -->
                <?= so_code_tabs('dropzone-types', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$dropzone = UiEngine::dropzone('images')
    ->label('Upload Images')
    ->accept(['image/jpeg', 'image/png', 'image/gif'])
    ->maxSize(5 * 1024 * 1024)  // 5MB
    ->message('Drop images here')
    ->subMessage('Accepts: JPG, PNG, GIF (max 5MB)')
    ->icon('image');

echo \$dropzone->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const dropzone = UiEngine.dropzone('images')
    .label('Upload Images')
    .accept(['image/jpeg', 'image/png', 'image/gif'])
    .maxSize(5 * 1024 * 1024)
    .message('Drop images here')
    .subMessage('Accepts: JPG, PNG, GIF (max 5MB)')
    .icon('image');

document.getElementById('container').innerHTML = dropzone.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Previews -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With File Previews</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('dropzone-preview', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$dropzone = UiEngine::dropzone('gallery')
    ->label('Photo Gallery')
    ->accept('image/*')
    ->multiple()
    ->showPreviews()           // Show image previews
    ->previewSize(120)         // Preview thumbnail size
    ->removable();             // Allow removing files

echo \$dropzone->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const dropzone = UiEngine.dropzone('gallery')
    .label('Photo Gallery')
    .accept('image/*')
    .multiple()
    .showPreviews()
    .previewSize(120)
    .removable()
    .onAdd((file) => {
        console.log('File added:', file.name);
    })
    .onRemove((file) => {
        console.log('File removed:', file.name);
    });

document.getElementById('container').innerHTML = dropzone.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Upload Progress -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Upload Progress</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('dropzone-progress', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$dropzone = UiEngine::dropzone('documents')
    ->label('Upload Documents')
    ->url('/api/upload')       // Upload endpoint
    ->autoUpload()             // Upload immediately on drop
    ->showProgress()           // Show upload progress bar
    ->parallel(3);             // Max parallel uploads

echo \$dropzone->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const dropzone = UiEngine.dropzone('documents')
    .label('Upload Documents')
    .url('/api/upload')
    .autoUpload()
    .showProgress()
    .parallel(3)
    .onUploadProgress((file, progress) => {
        console.log(file.name, progress + '%');
    })
    .onUploadComplete((file, response) => {
        console.log('Uploaded:', file.name, response);
    })
    .onUploadError((file, error) => {
        console.error('Error:', file.name, error);
    });

document.getElementById('container').innerHTML = dropzone.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Max Files -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Maximum Files Limit</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('dropzone-max', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$dropzone = UiEngine::dropzone('attachments')
    ->label('Attachments')
    ->multiple()
    ->maxFiles(5)              // Maximum 5 files
    ->maxSize(10 * 1024 * 1024) // 10MB per file
    ->maxTotalSize(50 * 1024 * 1024) // 50MB total
    ->message('Drop up to 5 files')
    ->subMessage('Max 10MB per file, 50MB total');

echo \$dropzone->renderGroup();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const dropzone = UiEngine.dropzone('attachments')
    .label('Attachments')
    .multiple()
    .maxFiles(5)
    .maxSize(10 * 1024 * 1024)
    .maxTotalSize(50 * 1024 * 1024)
    .message('Drop up to 5 files')
    .subMessage('Max 10MB per file, 50MB total')
    .onMaxFilesExceeded(() => {
        alert('Maximum 5 files allowed');
    });

document.getElementById('container').innerHTML = dropzone.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Dropzone Variants -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Dropzone Variants</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('dropzone-variants', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Default variant
UiEngine::dropzone('default')
    ->variant('default');

// Compact variant (smaller)
UiEngine::dropzone('compact')
    ->variant('compact');

// Minimal variant (just text)
UiEngine::dropzone('minimal')
    ->variant('minimal')
    ->message('Click or drop files');

// Avatar upload variant
UiEngine::dropzone('avatar')
    ->variant('avatar')
    ->accept('image/*')
    ->circular();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Default variant
UiEngine.dropzone('default')
    .variant('default');

// Compact variant (smaller)
UiEngine.dropzone('compact')
    .variant('compact');

// Minimal variant (just text)
UiEngine.dropzone('minimal')
    .variant('minimal')
    .message('Click or drop files');

// Avatar upload variant
UiEngine.dropzone('avatar')
    .variant('avatar')
    .accept('image/*')
    .circular();"
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
                                <td><code>string|array $types</code></td>
                                <td>Set accepted file types</td>
                            </tr>
                            <tr>
                                <td><code>maxSize()</code></td>
                                <td><code>int $bytes</code></td>
                                <td>Maximum file size per file</td>
                            </tr>
                            <tr>
                                <td><code>maxFiles()</code></td>
                                <td><code>int $count</code></td>
                                <td>Maximum number of files</td>
                            </tr>
                            <tr>
                                <td><code>multiple()</code></td>
                                <td>-</td>
                                <td>Allow multiple file selection</td>
                            </tr>
                            <tr>
                                <td><code>url()</code></td>
                                <td><code>string $url</code></td>
                                <td>Set upload endpoint URL</td>
                            </tr>
                            <tr>
                                <td><code>autoUpload()</code></td>
                                <td>-</td>
                                <td>Upload immediately on drop</td>
                            </tr>
                            <tr>
                                <td><code>showPreviews()</code></td>
                                <td>-</td>
                                <td>Show file previews</td>
                            </tr>
                            <tr>
                                <td><code>showProgress()</code></td>
                                <td>-</td>
                                <td>Show upload progress</td>
                            </tr>
                            <tr>
                                <td><code>message()</code></td>
                                <td><code>string $text</code></td>
                                <td>Set main message text</td>
                            </tr>
                            <tr>
                                <td><code>variant()</code></td>
                                <td><code>string $variant</code></td>
                                <td>Set variant: default, compact, minimal, avatar</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
