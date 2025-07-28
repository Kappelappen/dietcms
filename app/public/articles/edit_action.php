<?php
// public/articles/save.php

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../controllers/articlecontroller.php';

// Kontrollera att formuläret skickats med POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Hämta alla fält från formuläret och sanera
    $id          = $_POST['id'] ?? null;
    $title       = trim($_POST['title'] ?? '');
    $desc        = trim($_POST['desc'] ?? '');
    $author      = trim($_POST['author'] ?? '');
    $content     = trim($_POST['content'] ?? '');
    $created_at     = trim($_POST['created_at'] ?? '');

    // Skicka vidare till ArticleController
    $controller = new ArticleController($pdo);

    // Du kan låta update returnera true/false
    $success = $controller->update($id, 
        $title, $desc, $author, $content,$created_at);

    if ($success) {
        // Skicka tillbaka till artikellistan eller visa ett meddelande
        header('Location: index.php');
        exit;
    } else {
        // Något gick fel, visa redigeringssidan igen med ett felmeddelande
        header('Location: edit.php?id=' . urlencode($id) . '&error=1');
        exit;
    }
} else {
    // Om man försöker gå hit utan POST, redirecta tillbaka
    header('Location: index.php');
    exit;
}
