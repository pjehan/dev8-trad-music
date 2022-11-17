<?php $fullName = $musician['first_name'] . ' ' . $musician['last_name']; ?>
<article class="card">
    <img src="uploads/<?= $musician['image'] ?>" alt="<?= $fullName ?>">
    <h3>
        <?= $fullName ?>
    </h3>
    <!--
    <ul class="badge-list">
        <?php foreach ($musician['instruments'] as $instrument) : ?>
            <li>
                <a href="#" class="badge badge-primary">
                    <?php if (isset($instrument['picto'])): ?>
                        <i class="fa-solid fa-<?= $instrument['picto'] ?>"></i>
                    <?php endif; ?>
                    <?= $instrument['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    -->
</article>
