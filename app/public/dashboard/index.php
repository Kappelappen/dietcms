<?php
require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../controllers/DashboardController.php';

$controller = new DashboardController($pdo);
$controller->index(); // här inne inkluderar controllern själv vyer/layouts


?>