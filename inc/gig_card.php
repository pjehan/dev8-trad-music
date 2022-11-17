<article class="card">
    <img src="uploads/<?= $gig['image'] ?>" alt="<?= $gig['pub'] ?>">
    <h3>
        <?= $gig['pub'] ?>
    </h3>
    <time datetime="<?= $gig['date']->format('Y-m-d h:i') ?>">
        <?= $gig['date']->format('l jS \o\f F \a\t g:i a') ?>
    </time>
    <a href="#" class="btn btn-primary">See more</a>
</article>
