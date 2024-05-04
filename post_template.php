<div class="main-tittle">
    <h1 class="tittle">
        <?= $row['id'] ?>
        <?= $row['title'] ?>
    </h1>
    <h2 class="sub-tittle">
        <?= $row['subtitle'] ?>
    </h2>
</div>
<img class="main-image" src="<?= $row['image_url'] ?>" alt="<?= $row['image_url'] ?>">
<div class="main-block">
    <p class="main-block-text">
        <?= $row['content'] ?>
    </p>
</div>