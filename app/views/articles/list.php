<h2 class="page-headline">Articles</h2>

<?php if ($controller->user->isLoggedIn()) { ?>

<div class="article-header">
    <a href="new_article.php" target="_top">New article</a>
</div>

<?php } ?>

<div class="article-list">

<?php 

    foreach ($data['articles'] as $article): ?>
    
    <div class="article-info">
        <h2><?= htmlspecialchars($article['title']) ?></h2>
        <p>Author:&nbsp;<?= htmlspecialchars($article['author']); ?></p>
        <p><?= nl2br(htmlspecialchars(substr($article['article_desc'], 0, 200))) ?>...</p>
        <a href="story.php?id=<?= $article['id'] ?>">Read more</a>
    </div>

<?php endforeach; ?>

</div>

<div class="pagination">
<?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
    <?php if ($i == $data['currentPage']): ?>
        <span class="current"><?= $i ?></span>
    <?php else: ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endif; ?>
<?php endfor; ?>
</div>
