<div class="<?= $post['image_url'] ?>">
    <img width="460" height="280" class="featured-post__picture" src="<?= $post['img-background'] ?>" alt="<?= $post['img-alt'] ?>">
    <div class="<?= $post['type-color'] ?>"><?= $post['category'] ?></div>
    <h3 class="featured-posts__tittle"><?= $post['title'] ?></h3>
    <a title='<?= $post['title'] ?>' href='/post?postId=<?= $post['id'] ?>}'>
    <h4 class="featured-posts__sub-tittle"><?= $post['subtitle'] ?></h4></a>
    <div class="featured-posts__info">
        <img class="posts__author" src="<?= $post['author-face'] ?>" alt="<?= $post['author'] ?> author">
        <p class="featured-posts__author-name"><?= $post['author'] ?></p>
        <p class="featured-posts__author-date"><?= $post['date'] ?></p>
    </div>
</div>