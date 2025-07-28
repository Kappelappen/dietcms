<?php

    require_once '../../includes/config.php';
    require_once '../../controllers/articlecontroller.php';

    $id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

    $controller = new ArticleController($pdo);
    $article = $controller->show($id);

    $view = '../../views/articles/delete.php';     
    include '../../views/layouts/articleheader.php';
    include '../../views/layouts/main.php';
    include '../../views/layouts/footer.php';

?>