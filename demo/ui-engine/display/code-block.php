<?php
/**
 * SixOrbit UI Engine - Code Block Element Demo
 */

$pageTitle = 'Code Block - UI Engine';
$pageDescription = 'Syntax-highlighted code display';

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
                <li class="so-breadcrumb-item so-active">Code Block</li>
            </ol>
        </nav>
        <h1 class="so-page-title">
            <span class="material-icons so-text-primary">code</span>
            Code Block
        </h1>
        <p class="so-page-subtitle">Display code with syntax highlighting, line numbers, and copy functionality.</p>
    </div>

    <div class="so-page-body">
        <!-- Basic Code Block -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Basic Code Block</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('basic-code', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "<?php
use Core\UiEngine\UiEngine;

\$code = UiEngine::codeBlock()
    ->language('php')
    ->code('<?php
echo \"Hello, World!\";
');

echo \$code->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const code = UiEngine.codeBlock()
    .language('javascript')
    .code(`function greet(name) {
    return 'Hello, ' + name + '!';
}`);

document.getElementById('container').innerHTML = code.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Line Numbers -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Line Numbers</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('code-lines', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$code = UiEngine::codeBlock()
    ->language('javascript')
    ->lineNumbers()  // Show line numbers
    ->code('function fibonacci(n) {
    if (n <= 1) return n;
    return fibonacci(n - 1) + fibonacci(n - 2);
}

console.log(fibonacci(10));');

echo \$code->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const code = UiEngine.codeBlock()
    .language('javascript')
    .lineNumbers()
    .code(`function fibonacci(n) {
    if (n <= 1) return n;
    return fibonacci(n - 1) + fibonacci(n - 2);
}

console.log(fibonacci(10));`);

document.getElementById('container').innerHTML = code.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Line Highlighting -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Line Highlighting</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('code-highlight', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$code = UiEngine::codeBlock()
    ->language('php')
    ->lineNumbers()
    ->highlight([3, 4, 5])  // Highlight specific lines
    ->code('\$users = User::where(\"active\", true)
    ->orderBy(\"name\")
    ->limit(10)      // highlighted
    ->offset(0)      // highlighted
    ->get();         // highlighted

foreach (\$users as \$user) {
    echo \$user->name;
}');

echo \$code->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const code = UiEngine.codeBlock()
    .language('php')
    .lineNumbers()
    .highlight([3, 4, 5])
    .code(`...`);

// Or highlight a range
code.highlight('3-5');  // Lines 3 through 5"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Copy Button -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Copy Button</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('code-copy', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$code = UiEngine::codeBlock()
    ->language('bash')
    ->copyable()  // Add copy button
    ->code('npm install @sixorbit/ui-engine');

echo \$code->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const code = UiEngine.codeBlock()
    .language('bash')
    .copyable()
    .code('npm install @sixorbit/ui-engine')
    .onCopy(() => {
        console.log('Code copied!');
    });

document.getElementById('container').innerHTML = code.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- With Filename/Title -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">With Filename</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('code-filename', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "\$code = UiEngine::codeBlock()
    ->language('javascript')
    ->filename('app.js')  // Show filename header
    ->lineNumbers()
    ->copyable()
    ->code('import { UiEngine } from \"@sixorbit/ui-engine\";

const app = UiEngine.create({
    theme: \"light\",
    locale: \"en\",
});

export default app;');

echo \$code->render();"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "const code = UiEngine.codeBlock()
    .language('javascript')
    .filename('app.js')
    .lineNumbers()
    .copyable()
    .code(`...`);

document.getElementById('container').innerHTML = code.toHtml();"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Supported Languages -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Supported Languages</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('code-languages', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Common languages supported:
// - php, javascript, typescript
// - html, css, scss, less
// - json, xml, yaml
// - python, ruby, go, rust
// - java, c, cpp, csharp
// - sql, bash, shell
// - markdown, diff

UiEngine::codeBlock()
    ->language('python')
    ->code('def hello(name):
    return f\"Hello, {name}!\"');

UiEngine::codeBlock()
    ->language('sql')
    ->code('SELECT * FROM users WHERE active = 1;');

UiEngine::codeBlock()
    ->language('json')
    ->code('{
    \"name\": \"example\",
    \"version\": \"1.0.0\"
}');"
                    ],
                ]) ?>
            </div>
        </div>

        <!-- Themes -->
        <div class="so-card so-mb-4">
            <div class="so-card-header">
                <h3 class="so-card-title">Code Block Themes</h3>
            </div>
            <div class="so-card-body">
                <!-- Code Tabs -->
                <?= so_code_tabs('code-themes', [
                    [
                        'label' => 'PHP',
                        'language' => 'php',
                        'icon' => 'data_object',
                        'code' => "// Light theme (default)
UiEngine::codeBlock()
    ->theme('light')
    ->language('php')
    ->code('...');

// Dark theme
UiEngine::codeBlock()
    ->theme('dark')
    ->language('php')
    ->code('...');

// GitHub theme
UiEngine::codeBlock()
    ->theme('github')
    ->language('php')
    ->code('...');

// Monokai theme
UiEngine::codeBlock()
    ->theme('monokai')
    ->language('php')
    ->code('...');"
                    ],
                    [
                        'label' => 'JavaScript',
                        'language' => 'javascript',
                        'icon' => 'javascript',
                        'code' => "// Available themes:
// 'light', 'dark', 'github', 'monokai',
// 'dracula', 'nord', 'one-dark'

UiEngine.codeBlock()
    .theme('dracula')
    .language('javascript')
    .code(`...`);"
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
                                <td><code>code()</code></td>
                                <td><code>string $code</code></td>
                                <td>Set the code content</td>
                            </tr>
                            <tr>
                                <td><code>language()</code></td>
                                <td><code>string $lang</code></td>
                                <td>Set syntax highlighting language</td>
                            </tr>
                            <tr>
                                <td><code>lineNumbers()</code></td>
                                <td>-</td>
                                <td>Show line numbers</td>
                            </tr>
                            <tr>
                                <td><code>highlight()</code></td>
                                <td><code>array|string $lines</code></td>
                                <td>Highlight specific lines</td>
                            </tr>
                            <tr>
                                <td><code>copyable()</code></td>
                                <td>-</td>
                                <td>Add copy to clipboard button</td>
                            </tr>
                            <tr>
                                <td><code>filename()</code></td>
                                <td><code>string $name</code></td>
                                <td>Show filename header</td>
                            </tr>
                            <tr>
                                <td><code>theme()</code></td>
                                <td><code>string $theme</code></td>
                                <td>Set color theme</td>
                            </tr>
                            <tr>
                                <td><code>maxHeight()</code></td>
                                <td><code>int $pixels</code></td>
                                <td>Set max height with scroll</td>
                            </tr>
                            <tr>
                                <td><code>wordWrap()</code></td>
                                <td>-</td>
                                <td>Enable word wrapping</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once '../../includes/footer.php'; ?>
