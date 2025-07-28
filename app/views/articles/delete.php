<form name="theForm" method="POST" action="delete_action.php" class="article-form">

    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

    <div class="article-group">
        <div class="article-label">Title</div>
        <div class="article-value"><?php echo htmlspecialchars($article['title']); ?></div>
    </div>

    <div class="article-group">
        <div class="article-label">Description</div>
        <div class="article-value"><?php echo htmlspecialchars($article['article_desc']); ?></div>
    </div>

    <div class="article-group">
        <div class="article-label">Author</div>
        <div class="article-value"><?php echo htmlspecialchars($article['author']); ?></div>
    </div>

    <div class="article-group">
        <div class="article-label">Content</div>
        <div class="article-value"><?php echo htmlspecialchars($article['content']); ?></div>
    </div>

    <div class="article-group">
        <div class="article-label">Created at</div>
        <div class="article-value"><?php echo htmlspecialchars($article['created_at']); ?></div>
    </div>

    <div class="form-buttons">
    <a href="index.php?page=1" class="cancel-btn" target="_top">Cancel</a>
    <button type="submit" class="submit-btn" name="delete">Delete</button>
    </div>

</form>