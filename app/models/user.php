<?php

class User {
    
    private $pdo;

    public function __construct(PDO $pdo) {
    
        $this->pdo = $pdo;
    
    }

    public function isLoggedIn() {
        
        if (!isset($_SESSION['user_id'])) {
            return false; 
        }

        $sql = "SELECT id FROM users WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ? true : false;

    }

    public function authenticate($username, 
        $password) {
        
        $sql = "SELECT * FROM users WHERE " . 
        "username = :username LIMIT 1";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, 
            $user['password'])) {

            return $user;

        }

        return false;

    }
}
