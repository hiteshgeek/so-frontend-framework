/**
 * SixOrbit UI Framework - Build Script
 * Compiles SCSS to CSS, bundles JS, and generates manifest
 */
const esbuild = require("esbuild");
const sass = require("sass");
const postcss = require("postcss");
const autoprefixer = require("autoprefixer");
const JavaScriptObfuscator = require("javascript-obfuscator");
const chokidar = require("chokidar");
const fs = require("fs");
const path = require("path");
const crypto = require("crypto");

// ============================================
// CONFIGURATION
// ============================================
const isWatch = process.argv.includes("--watch");
const isDev = process.argv.includes("--dev");
const isProd = !isWatch && !isDev;

const rootDir = __dirname;
const srcDir = path.join(rootDir, "src");
const distDir = path.join(rootDir, "dist");

// CSS Modules Configuration
const cssModules = [
  { name: "sixorbit-base", entry: "sixorbit-base.scss", type: "base" },
  { name: "sixorbit-full", entry: "sixorbit-full.scss", type: "bundle" },
];

// JS Modules Configuration
const jsModules = [
  { name: "sixorbit-core", entry: "sixorbit-core.js", globalName: "SixOrbitCore" },
  { name: "sixorbit-full", entry: "sixorbit-full.js", globalName: "SixOrbit" },
];

// Obfuscator options (production only)
const obfuscatorOptions = {
  compact: true,
  controlFlowFlattening: true,
  controlFlowFlatteningThreshold: 0.5,
  deadCodeInjection: false,
  debugProtection: false,
  identifierNamesGenerator: "hexadecimal",
  renameGlobals: false,
  rotateStringArray: true,
  selfDefending: false,
  stringArray: true,
  stringArrayEncoding: ["base64"],
  stringArrayThreshold: 0.75,
  transformObjectKeys: true,
  unicodeEscapeSequence: false,
};

// ============================================
// UTILITY FUNCTIONS
// ============================================
function generateHash(content) {
  return crypto.createHash("md5").update(content).digest("hex").substring(0, 8);
}

function ensureDir(dir) {
  if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
  }
}

function cleanDir(dir) {
  if (!fs.existsSync(dir)) return;

  fs.readdirSync(dir).forEach((file) => {
    if (file === "manifest.json") return;

    const filePath = path.join(dir, file);
    if (fs.statSync(filePath).isDirectory()) {
      fs.rmSync(filePath, { recursive: true, force: true });
    } else {
      fs.unlinkSync(filePath);
    }
  });
}

function cleanOldVersions(dir, name, ext) {
  if (!fs.existsSync(dir)) return;

  const pattern = new RegExp(`^${name}\\.[a-f0-9]{8}\\.${ext}(\\.map)?$`);
  fs.readdirSync(dir).forEach((file) => {
    if (pattern.test(file)) {
      fs.unlinkSync(path.join(dir, file));
    }
  });
}

// ============================================
// SCSS COMPILATION
// ============================================
async function compileSCSS(module) {
  try {
    const scssPath = path.join(srcDir, "scss", module.entry);
    if (!fs.existsSync(scssPath)) {
      console.warn(`SCSS not found: ${module.entry}`);
      return null;
    }

    const generateSourceMap = isDev || isWatch;

    // Compile SCSS
    const result = sass.compile(scssPath, {
      style: isProd ? "compressed" : "expanded",
      sourceMap: generateSourceMap,
      sourceMapIncludeSources: generateSourceMap,
      loadPaths: [path.join(srcDir, "scss")],
    });

    // Process with PostCSS (autoprefixer only - no prefix selector for framework)
    const processed = await postcss([autoprefixer]).process(result.css, {
      from: scssPath,
      map: generateSourceMap
        ? { prev: result.sourceMap, inline: false, annotation: false }
        : false,
    });

    const hash = generateHash(processed.css);
    const filename = `${module.name}.${hash}.css`;
    const mapFilename = `${module.name}.${hash}.css.map`;
    const outputDir = path.join(distDir, "css");

    ensureDir(outputDir);

    // Write CSS
    let cssContent = processed.css;
    if (generateSourceMap) {
      cssContent += `\n/*# sourceMappingURL=${mapFilename} */`;
      fs.writeFileSync(path.join(outputDir, mapFilename), processed.map.toString());
    }

    fs.writeFileSync(path.join(outputDir, filename), cssContent);
    console.log(`CSS: css/${filename}${generateSourceMap ? ` + ${mapFilename}` : ""}`);

    return `css/${filename}`;
  } catch (error) {
    console.error(`SCSS Error (${module.name}):`, error.message);
    if (error.span) {
      console.error(`  at ${error.span.url || 'unknown'}:${error.span.start?.line || '?'}`);
    }
    return null;
  }
}

// ============================================
// JS BUNDLING
// ============================================
async function bundleJS(module) {
  try {
    const jsPath = path.join(srcDir, "js", module.entry);
    if (!fs.existsSync(jsPath)) {
      console.warn(`JS not found: ${module.entry}`);
      return null;
    }

    const generateSourceMap = isDev || isWatch;

    // Bundle with esbuild
    const result = await esbuild.build({
      entryPoints: [jsPath],
      bundle: true,
      minify: isProd,
      sourcemap: generateSourceMap ? "inline" : false,
      write: false,
      target: ["es2015"],
      format: "iife",
      globalName: module.globalName,
    });

    let content = result.outputFiles[0].text;
    let sourceMap = null;

    // Extract inline sourcemap
    if (generateSourceMap) {
      const sourceMapMatch = content.match(
        /\/\/# sourceMappingURL=data:application\/json;base64,(.+)$/
      );
      if (sourceMapMatch) {
        sourceMap = Buffer.from(sourceMapMatch[1], "base64").toString("utf8");
        content = content.replace(
          /\/\/# sourceMappingURL=data:application\/json;base64,.+$/,
          ""
        );
      }
    }

    // Production obfuscation
    if (isProd) {
      console.log(`  Obfuscating ${module.name}...`);
      const obfuscated = JavaScriptObfuscator.obfuscate(content, obfuscatorOptions);
      content = obfuscated.getObfuscatedCode();
    }

    const hash = generateHash(content);
    const filename = `${module.name}.${hash}.js`;
    const mapFilename = `${module.name}.${hash}.js.map`;
    const outputDir = path.join(distDir, "js");

    ensureDir(outputDir);

    // Write JS
    if (generateSourceMap && sourceMap) {
      content += `//# sourceMappingURL=${mapFilename}`;
      fs.writeFileSync(path.join(outputDir, mapFilename), sourceMap);
    }

    fs.writeFileSync(path.join(outputDir, filename), content);
    console.log(
      `JS: js/${filename}${generateSourceMap ? ` + ${mapFilename}` : isProd ? " (obfuscated)" : ""}`
    );

    return `js/${filename}`;
  } catch (error) {
    console.error(`JS Error (${module.name}):`, error.message);
    return null;
  }
}

// ============================================
// ASSET COPYING
// ============================================
function copyAssets() {
  const assetsDir = path.join(srcDir, "assets");
  const outputDir = path.join(distDir, "assets");

  if (!fs.existsSync(assetsDir)) return;

  // Copy fonts
  const fontsDir = path.join(assetsDir, "fonts");
  if (fs.existsSync(fontsDir)) {
    const outputFontsDir = path.join(outputDir, "fonts");
    ensureDir(outputFontsDir);

    fs.readdirSync(fontsDir).forEach((file) => {
      fs.copyFileSync(
        path.join(fontsDir, file),
        path.join(outputFontsDir, file)
      );
    });
    console.log("Assets: fonts copied");
  }

  // Copy images
  const imagesDir = path.join(assetsDir, "images");
  if (fs.existsSync(imagesDir)) {
    const outputImagesDir = path.join(outputDir, "images");
    ensureDir(outputImagesDir);

    fs.readdirSync(imagesDir).forEach((file) => {
      fs.copyFileSync(
        path.join(imagesDir, file),
        path.join(outputImagesDir, file)
      );
    });
    console.log("Assets: images copied");
  }
}

// ============================================
// MANIFEST GENERATION
// ============================================
function writeManifest(assets) {
  const manifest = {
    css: {},
    js: {},
    generated: new Date().toISOString(),
    mode: isProd ? "production" : "development",
    version: "1.0.0",
  };

  // Organize assets by type
  Object.entries(assets).forEach(([key, value]) => {
    // Keys are prefixed with 'css:' or 'js:' to avoid collisions
    const [type, name] = key.split(':');
    if (type === 'css' && value.startsWith("css/")) {
      manifest.css[name] = value;
    } else if (type === 'js' && value.startsWith("js/")) {
      manifest.js[name] = value;
    }
  });

  ensureDir(distDir);
  fs.writeFileSync(
    path.join(distDir, "manifest.json"),
    JSON.stringify(manifest, null, 2)
  );
  console.log("Manifest: updated");
}

// ============================================
// MAIN BUILD FUNCTION
// ============================================
async function build() {
  const mode = isProd ? "production" : "development";
  console.log(`\n========================================`);
  console.log(`SixOrbit UI Framework - Build (${mode})`);
  console.log(`========================================\n`);

  // Clean dist directories
  cleanDir(path.join(distDir, "css"));
  cleanDir(path.join(distDir, "js"));

  const assets = {};

  // Build CSS modules
  console.log("--- SCSS Compilation ---");
  for (const mod of cssModules) {
    const cssFile = await compileSCSS(mod);
    if (cssFile) {
      assets[`css:${mod.name}`] = cssFile;
    }
  }

  // Build JS modules
  console.log("\n--- JS Bundling ---");
  for (const mod of jsModules) {
    const jsFile = await bundleJS(mod);
    if (jsFile) {
      assets[`js:${mod.name}`] = jsFile;
    }
  }

  // Copy static assets
  console.log("\n--- Static Assets ---");
  copyAssets();

  // Write manifest
  console.log("\n--- Manifest ---");
  writeManifest(assets);

  console.log("\n========================================");
  console.log("Build complete!");
  console.log("========================================\n");
}

// ============================================
// WATCH MODE
// ============================================
function debounce(fn, delay) {
  let timeout = null;
  return (...args) => {
    if (timeout) clearTimeout(timeout);
    timeout = setTimeout(() => fn(...args), delay);
  };
}

async function watch() {
  console.log("Starting watch mode (development)...\n");
  await build();

  let isRebuilding = false;

  // Rebuild CSS
  const rebuildCSS = debounce(async () => {
    if (isRebuilding) return;
    isRebuilding = true;
    try {
      console.log("\n--- Rebuilding CSS ---");
      const manifestPath = path.join(distDir, "manifest.json");
      const manifest = JSON.parse(fs.readFileSync(manifestPath));

      for (const mod of cssModules) {
        cleanOldVersions(path.join(distDir, "css"), mod.name, "css");
        const cssFile = await compileSCSS(mod);
        if (cssFile) manifest.css[mod.name] = cssFile;
      }

      manifest.generated = new Date().toISOString();
      fs.writeFileSync(manifestPath, JSON.stringify(manifest, null, 2));
      console.log("CSS rebuild complete!");
    } catch (error) {
      console.error("CSS rebuild error:", error.message);
    } finally {
      isRebuilding = false;
    }
  }, 100);

  // Rebuild JS
  const rebuildJS = debounce(async () => {
    if (isRebuilding) return;
    isRebuilding = true;
    try {
      console.log("\n--- Rebuilding JS ---");
      const manifestPath = path.join(distDir, "manifest.json");
      const manifest = JSON.parse(fs.readFileSync(manifestPath));

      for (const mod of jsModules) {
        cleanOldVersions(path.join(distDir, "js"), mod.name, "js");
        const jsFile = await bundleJS(mod);
        if (jsFile) manifest.js[mod.name] = jsFile;
      }

      manifest.generated = new Date().toISOString();
      fs.writeFileSync(manifestPath, JSON.stringify(manifest, null, 2));
      console.log("JS rebuild complete!");
    } catch (error) {
      console.error("JS rebuild error:", error.message);
    } finally {
      isRebuilding = false;
    }
  }, 100);

  // Watch SCSS
  const scssWatcher = chokidar.watch(path.join(srcDir, "scss"), {
    ignoreInitial: true,
    usePolling: true,
    interval: 300,
    ignored: /(^|[\/\\])\../,
  });

  scssWatcher
    .on("change", (filePath) => {
      console.log(`\nSCSS changed: ${path.relative(srcDir, filePath)}`);
      rebuildCSS();
    })
    .on("add", (filePath) => {
      console.log(`\nSCSS added: ${path.relative(srcDir, filePath)}`);
      rebuildCSS();
    })
    .on("ready", () => console.log("SCSS watcher ready"));

  // Watch JS
  const jsWatcher = chokidar.watch(path.join(srcDir, "js"), {
    ignoreInitial: true,
    usePolling: true,
    interval: 300,
    ignored: /(^|[\/\\])\../,
  });

  jsWatcher
    .on("change", (filePath) => {
      console.log(`\nJS changed: ${path.relative(srcDir, filePath)}`);
      rebuildJS();
    })
    .on("add", (filePath) => {
      console.log(`\nJS added: ${path.relative(srcDir, filePath)}`);
      rebuildJS();
    })
    .on("ready", () => console.log("JS watcher ready"));

  console.log("\nWatching for changes... (Press Ctrl+C to stop)\n");

  // Graceful shutdown
  process.on("SIGINT", () => {
    console.log("\nStopping watch mode...");
    scssWatcher.close();
    jsWatcher.close();
    process.exit(0);
  });
}

// ============================================
// ENTRY POINT
// ============================================
if (isWatch) watch();
else build();
