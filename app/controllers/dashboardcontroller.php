<?php

require_once __DIR__ . '/../models/article.php';

class DashboardController {
    
    private $pdo;
    private $article;

    public function __construct($pdo) {
  
        $this->pdo = $pdo;  
        $this->initialize();
  
    }

    private function initialize() {

        $this->article = new Article($this->pdo);

    }

    public function index() {
                
        $latestArticles = $this->article->getLatestArticles(5);
        $articleCount = $this->article->count();
        $latestArticle = $this->article->getLatestArticle();

        $view = '../../views/dashboard/index.php';
        include '../../views/layouts/articleheader.php';
        include '../../views/layouts/main.php';
        include '../../views/layouts/footer.php';

    }
}
