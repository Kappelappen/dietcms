<?php


    require_once __DIR__ . '/../../includes/config.php';
    require_once __DIR__ . '/../../controllers/articlecontroller.php';

    if (isset($_POST["delete"])) {

        $id = $_POST["id"];

        $controller = new ArticleController($pdo);
        $controller->delete($id);

        header("Location: index.php?page=1");
        exit;

    }
?>