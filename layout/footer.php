<?php require_once __DIR__ . '/../database.php'; ?>
</main>

<footer class="site-footer">
    <div class="container">
        <p>Trad Music &copy; <?= date('Y') ?></p>
        <ul>
            <?php $instruments = findAll('instrument'); ?>
            <?php foreach ($instruments as $instrument) : ?>
                <li>
                  <?= $instrument['name'] ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</footer>

</body>
</html>
