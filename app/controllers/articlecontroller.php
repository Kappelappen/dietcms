<?php

require_once __DIR__ . '/../models/article.php';
require_once __DIR__ . '/../models/user.php';

class ArticleController {

    public $pdo;
    private $links;
    private $errors;
    public $user;
    private $article;

    public function __construct($pdo) {

        $this->pdo = $pdo;
        $this->initialize();

    }

    private function initialize() {

        $this->errors = array();
        $this->user = new User($this->pdo);
        $this->article = new Article($this->pdo);

    }

    public function store() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $title = trim($_POST['title'] ?? '');
            $desc = trim($_POST['desc'] ?? '');
            $author = trim($_POST['author'] ?? '');
            $content = trim($_POST['content'] ?? '');

            if ($title == '') {

                $this->errors[] = "Title is required.";

            }

            if ($author == '') {

                $this->errors[] = "Author is required.";

            }

            if ($content == '') {

                $this->errors[] = "Story is required.";

            }

            if (count($this->errors) === 0) {

                $this->create($title,$desc,$author,$content);
                header("Location: index.php?page=1");
                exit;

            }

            if (count($this->errors) !== 0) {
                
                $this->showCreateView($this->errors);
                return;

            }
        }        
    }

    public function listAll() {
        return $this->article->getAll();
    }

    public function create($title,$desc,$author,$content) {
        return $this->article->create($title,$desc,$author,$content);
    }

    public function update($id,$title,$desc,$author,$content,$created_at) {
        return $this->article->update($id,$title,$desc,$author,$content,$created_at);
    }

    public function delete($id) {
        return $this->article->delete($id);
    }

    public function showCreateView($errors) {

        $view = '../../views/articles/new_article.php';            
        include '../../views/layouts/articleheader.php';
        include '../../views/layouts/main.php';
        include '../../views/layouts/footer.php';

    }

    public function listPaginated($page = 1, $perPage = 10) {

        $offset = ($page - 1) * $perPage;

        $stmt = $this->pdo->prepare("SELECT * FROM article " . 
        "ORDER BY created_at DESC LIMIT :perPage OFFSET :offset");
        
        $stmt->bindValue(':perPage', (int)$perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Räkna totalt antal artiklar för att räkna ut antal sidor
        $countStmt = $this->pdo->query("SELECT COUNT(*) as total FROM article");
        $total = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
        $totalPages = ceil($total / $perPage);

        // Returnera data till vyn
        return [
        
            'articles' => $articles,
            'currentPage' => $page,
            'totalPages' => $totalPages
        
        ];
    }

    public function show($id) {
    
        $stmt = $this->pdo->prepare("SELECT * FROM article WHERE id = :id");
        $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
        $stmt->execute();

        $article = $stmt->fetch(PDO::FETCH_ASSOC);    
        return $article;
    
    }

}


?>