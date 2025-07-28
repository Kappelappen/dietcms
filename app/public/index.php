<?php
    
    require_once __DIR__ . '/../includes/config.php';
    require_once __DIR__ . '/../controllers/HomeController.php';

    $controller = new HomeController($pdo);
    $data = $controller->index();
    $view = __DIR__ . '/../views/start/home.php';

    include __DIR__ . '/../views/layouts/header.php';
    include __DIR__ . '/../views/layouts/main.php';
    include __DIR__ . '/../views/layouts/footer.php';

?>