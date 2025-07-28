<form name="theForm" method="POST" action="edit_action.php" class="article-form">

    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($data['title']); ?>" class="text-field">

    <label for="desc">Description</label>
    <input type="text" id="desc" name="desc" value="<?php echo htmlspecialchars($data['article_desc']); ?>" class="text-field">

    <label for="author">Author</label>
    <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($data['author']); ?>" class="text-field">

    <label for="content">Content</label>
    <textarea id="content" name="content" rows="10" cols="65" class="article-view"><?php echo htmlspecialchars($data['content']); ?></textarea>

    <label for="created_at">Created At</label>
    <input type="text" id="created_at" name="created_at" value="<?php echo htmlspecialchars($data['created_at']); ?>" class="text-field">
  
    <div class="form-buttons">
    <a href="index.php" class="cancel-btn" target="_top">Cancel</a>
    <button type="submit" class="submit-btn">Save</button>
    </div>

</form>