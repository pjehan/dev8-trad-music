<?php $date_start = new DateTime($gig['date_start']); ?>
<article class="card">
    <img src="uploads/<?= $gig['image'] ?>" alt="<?= $gig['name'] ?>">
    <h3>
        <?= $gig['name'] ?>
    </h3>
    <time datetime="<?= $date_start->format('Y-m-d h:i') ?>">
        <?= $date_start->format('l jS \o\f F \a\t g:i a') ?>
    </time>
    <a href="#" class="btn btn-primary">See more</a>
</article>
