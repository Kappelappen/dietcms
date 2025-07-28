<?php

    require_once '../../includes/config.php';
    require_once '../../controllers/articlecontroller.php';

    if (!isset($_SESSION["user_id"])) {

        header("Location: index.php");
        exit;

    }


    $id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

    $controller = new ArticleController($pdo);    
    $view = '../../views/articles/new_article.php';            
    include '../../views/layouts/articleheader.php';
    include '../../views/layouts/main.php';
    include '../../views/layouts/footer.php';


?>