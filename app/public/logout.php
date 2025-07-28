<?php

    require_once __DIR__ . '/../includes/config.php';
    require_once __DIR__ . '/../controllers/logincontroller.php';

    $controller = new LoginController($pdo);
    $controller->doLogout();
    
    include __DIR__ . '/../views/layouts/header.php';
    include __DIR__ . '/../views/layouts/main.php';
    include __DIR__ . '/../views/layouts/footer.php';


?>