<?php

    require_once __DIR__ . '/../models/user.php';

    class AuthController {

        private $userModel;

        public function __construct(PDO $pdo) {

            $this->userModel = new User($pdo);

        }

        public function login() {

            $errors = array();
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $username = trim($_POST['username'] ?? '');
                $password = trim($_POST['password'] ?? '');

                if ($username && $password) {

                    $user = 
                        $this->userModel->authenticate($username,$password);

                    if ($user) {

                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];
                        header('Location: dashboard.php');

                    }                

                    else {

                        $errors[] = 'Invalid username or password.';                    

                    } else {

                        $errors[] = 'Please enter both fields.';
                    
                    }
                }

                include __DIR__ . '/../views/auth/login.php';

            }
        }
    }

?>