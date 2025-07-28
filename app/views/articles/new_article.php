
<?php

    if (isset($_POST["create"]) && count($errors) !== 0) {

        $html = '<div class="article-error-list">' . "\n";
        $html .= '<ul>' . "\n";

        foreach ($errors as $item) {

            $html .= '<li>' . $item . '</li>' . "\n";

        }

        $html .= '</ul>' . "\n";
        $html .= '</div>' . "\n";
        echo $html;

    }

?>

<h2 class="page-headline">New article</h2>

<form name="theForm" method="POST" action="new_action.php" class="article-form">

    <label for="title">Title</label>
    <input type="text" id="title" name="title" class="text-field">

    <label for="desc">Description</label>
    <input type="text" id="desc" name="desc" class="text-field">

    <label for="author">Author</label>
    <input type="text" id="author" name="author" class="text-field">

    <label for="content">Content</label>
    <textarea id="content" name="content" rows="10" cols="65" class="article-view"></textarea>

    <div class="form-buttons">
    <button type="submit" class="submit-btn" name="create">Create</button>
    </div>

</form>