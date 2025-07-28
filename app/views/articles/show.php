<h2 class="article-headline"><?= htmlspecialchars($article['title']) ?></h2>
<p class="article-author">Author:&nbsp;<?php echo $article['author']; ?></p>
<div class="article-content"><?= nl2br(htmlspecialchars($article['content'])) ?></div>
<p class="article-time">Created at:&nbsp;<?php echo $article["created_at"]; ?></p> 

<?php if ($controller->user->isLoggedIn()) { ?>

    <div class="article-links">
    <a href="index.php?page=1" target="_top">Back to articles</a>&nbsp;&#124;&nbsp;<a href="edit_article.php<?php echo '?id=' . $id; ?>" target="_top">Edit article</a>&nbsp;&#124;&nbsp;<a href="delete_article.php<?php echo '?id=' .$id; ?>" target="_top">Delete article</a>    
    </div>

<?php  }  ?>
