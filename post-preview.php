<div class="featured-posts__post">
    <img width="460" height="280" class="featured-post__picture" src="<?= $row['image_url'] ?>" alt="<?= $row['title'] ?>">
    <div class="post-type post-type__featured">a</div>
    <h3 class="featured-posts__tittle"><?= $row['title'] ?></h3>
    <a title='<?= $row['title'] ?>' href='/post?postId=<?= $row['id'] ?>'>
    <h4 class="featured-posts__sub-tittle"><?= $row['subtitle'] ?></h4></a>
    <div class="featured-posts__info">
        <img class="posts__author" src="<?= $row['author_url'] ?>" alt="<?= $row['author'] ?> author">
        <p class="featured-posts__author-name"><?= $row['author'] ?></p>
        <p class="featured-posts__author-date"><?= date("F d, Y", $row['publish_date']); ?></p>
    </div>
</div>