<?php
/**
 * SixOrbit UI Demo - Footer Include
 * Include this at the bottom of each page
 */
?>
    <!-- SixOrbit UI JavaScript -->
    <script src="<?= so_asset('js', 'sixorbit-full') ?>"></script>

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
