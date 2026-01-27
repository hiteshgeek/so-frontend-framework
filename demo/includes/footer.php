<?php
/**
 * SixOrbit UI Demo - Footer Include
 * Include this at the bottom of each page
 */
?>
    <!-- SixOrbit UI JavaScript -->
    <script src="<?= so_asset('js', 'sixorbit-full') ?>"></script>

    <!-- Global Search Controller -->
    <?php $searchJs = so_page_asset('search', 'js'); ?>
    <?php if ($searchJs): ?>
    <script src="<?= htmlspecialchars($searchJs) ?>"></script>
    <script>
    // Configure search with API URLs (like first_draft)
    // Wait for DOMContentLoaded to ensure globalSearch is ready
    function configureGlobalSearch() {
        if (window.globalSearch) {
            console.log("Configuring globalSearch with API URLs");
            window.globalSearch.configure({
                // URL for normal search (menus, customers, vendors, ledgers)
                searchUrl: 'data/search-results.json',
                // URL for ISV item search (products/items)
                isvSearchUrl: 'data/isv-search-results.json',
                // Debounce delay in milliseconds
                debounceDelay: 300,
                // Minimum query length to trigger search
                minQueryLength: 1,
                // Callbacks for debugging
                onSearchResult: function(data, query, isISV) {
                    console.log('Search results:', { query, isISV, data });
                }
            });
        } else {
            console.warn("globalSearch not found");
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', configureGlobalSearch);
    } else {
        configureGlobalSearch();
    }
    </script>
    <?php endif; ?>

    <?php if (!empty($additionalJs)): ?>
    <?php foreach ($additionalJs as $js): ?>
    <script src="<?= htmlspecialchars($js) ?>"></script>
    <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($inlineJs)): ?>
    <script>
    <?= $inlineJs ?>
    </script>
    <?php endif; ?>

</body>
</html>
