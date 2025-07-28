<?php

class Article {

    private $pdo;

    public function __construct($pdo) {

        $this->pdo = $pdo;

    }

    public function getAll() {

        $stmt = $this->pdo->query("SELECT * FROM article ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function getById($id) {
    
        $stmt = $this->pdo->prepare("SELECT * FROM article WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    
    }

    public function getLatestArticles($limit) {
    
        try {
        
        $stmt = $this->pdo->prepare("
        
            SELECT id, title, article_desc, author, content, created_at
            FROM article
            ORDER BY created_at DESC
            LIMIT :limit

        ");
        
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function count() {

        try {

        $sql = "SELECT COUNT(*) AS total FROM article";
        $stmt = $this->pdo->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return (int) $row['total'];
        
        } catch (PDOException $e) {
            return 0;
        }
    }

    public function getLatestArticle() {
    
        try {
        
        $stmt = $this->pdo->query("
            
            SELECT * FROM article
            ORDER BY created_at DESC
            LIMIT 1
        
        ");
        
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        return $article ?: null;
        
        } catch (PDOException $e) {
        
        echo $e->getMessage();
        return null;
    
        }
    }


    public function create($title,$desc,$author,$content) {
    
        $stmt = $this->pdo->prepare("INSERT INTO article (title, " . 
        "article_desc,author,content, created_at) " . 
        "VALUES (:title,:article_desc,:author,:content, NOW())");
        
        return $stmt->execute([
            
            'title' => $title,
            'article_desc' => $desc,
            'author' => $author,
            'content' => $content,
            
        ]);
    }

    public function update($id,$title,$desc,
        $author,$content,$created_at) {
    
        $sql = "UPDATE article SET title = :title, " . 
        "article_desc = :article_desc,author = :author, " . 
        "content = :content,created_at = :created_at " . 
        "WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'title' => $title,
            'article_desc' => $desc,
            'author' => $author,
            'content' => $content,
            'created_at' => $created_at
        ]);

    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM article WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
