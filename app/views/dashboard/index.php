<h2 class="page-headline">Dashboard</h2>

<div class="dashboard-group">

    <p class="dashboard-info">Latest 10 articles</p>
    <ul class="selected-articles-list">
        
    <?php

        foreach ($latestArticles as $article) {

            $id = $article["id"];

            echo '<li>' . '<a href="../articles/story.php?id=' . 
            $id . '" target="_top">' . $article["title"] . '</a>' . 
            '</li>' . "\n";


        }

    ?>
    
    </ul>

</div>

<hr size="3" noshade width="600" style="margin-top: 10px; margin-left: 12px;">

<div class="dashboard-group">

    <p class="dashboard-info">Total number of articles</p>

    <p class="article-count"><?php echo $articleCount; ?></p>

</div>

<hr size="3" noshade width="600" style="margin-top: 10px; margin-left: 12px;">

<div class="dashboard-group">

    <p class="dashboard-info">Latest published article</p>

    <div class="dashboard-action"><a href="../articles/story.php?id=<?php 
        echo $latestArticle['id'] ?>"><?php echo $latestArticle['title']; ?></a></div>   

</div>