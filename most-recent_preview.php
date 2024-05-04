<div class="most-recent__post">
    <div class="image-border">
        <img class="post__picture" src="<?= $row['image_url'] ?>" alt="<?= $row['title'] ?>">
        <div class="post-type">a</div>
    </div>
    <div class="border-line"></div>
    <h3 class="most-recent__tittle"><?= $row['title'] ?></h3>
    <a title='<?= $row['title'] ?>' href='/post?postId=<?= $row['id'] ?>'>
    <h4 class="most-recent__sub-tittle"><?= $row['subtitle'] ?></h4></a>
    <div class="border-line second-line"></div>
    <div class="most-recent__post-info">
        <img class="posts__author" src="<?= $row['author_url'] ?>" alt="<?= $row['author'] ?> author">
        <p class="most-recent__post-author"><?= $row['author'] ?></p>
        <p class="most-recent__post-date"><?= date(" n/d/Y", $row['publish_date']); ?></p>
    </div>
</div>