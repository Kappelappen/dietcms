<?php

require_once __DIR__ . '/../models/user.php';

class HomeController {

    private $pdo;
    public $user;

    public function HomeController(PDO $pdo) {

        $this->pdo = $pdo;
     
        $this->user = new User($this->pdo);

    }

    public function index() {
        
        $data = array();
        $data["headline"] = 'Welcome to our CMS';        
        $data["content"] = $this->getFileContent('../public/resources/text/introduction.txt');

        return $data;

    }

    private function getFileContent($path) {

        $content = file_get_contents($path);

        if ($content === false) {

            return "Could not read the selected file!";
            
        } else {

            return $content;
        
        }
    }
}


?>