<?php

    require_once __DIR__ . '/../../includes/config.php';
    require_once __DIR__ . '/../../controllers/articlecontroller.php';

    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

    $controller = new ArticleController($pdo);
    $data = $controller->listPaginated($page);
    $view = __DIR__ . '/../../views/articles/list.php';

    include __DIR__ . '/../../views/layouts/articleheader.php';
    include __DIR__ . '/../../views/layouts/main.php';
    include __DIR__ . '/../../views/layouts/footer.php';


?>