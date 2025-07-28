<?php

    require_once __DIR__ . '/../../includes/config.php';
    require_once __DIR__ . '/../../controllers/articlecontroller.php';

    if (isset($_POST["create"])) {

        $controller = new ArticleController($pdo);
        $controller->store();
                
    }

?>