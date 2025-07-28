<?php

require_once __DIR__ . '/../models/user.php';

class LoginController {

    public $pdo;
    private $user;
    private $errors;

    public function __construct($pdo) {

        $this->pdo = $pdo;
        $this->initialize();

    }

    private function initialize() {

        $this->user = new User($this->pdo);
        $this->errors = array();

    }

    public function checkLogin() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $checked = $this->user->authenticate($username,$password);

            if ($checked) {

                $_SESSION['user_id'] = $checked['id'];
                header("Location: dashboard.php");
            
            }        

            else {

                $this->errors[] = "Invalid username or password.";

            }
        }

        return $this->errors;

    }

    public function doLogout() {

        if ($this->user->isLoggedIn()) {

            unset($_SESSION["user_id"]);
            session_destroy();
            header("Location: index.php");
            exit;

        }
    }
}


?>