<?php

class UserController {

    public $user;

    public function __construct() {

        $this->initialize();

    }

    private function initialize() {

        $this->user = new User();

    }

    public function login() {

        require_once __DIR__ . '/../views/user/login.php';


    }
}


?>