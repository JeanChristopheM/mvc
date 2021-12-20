<?php
declare(strict_types = 1);
require_once 'Model/database.php';

class LoginController{
    public function index() {
        require 'View/login.php';
    }
    public function checkAuth() {
        if(!isset($_SESSION['usr'])) {
            if(isset($_POST["usernameInput"]) && isset($_POST["passwordInput"])) {
                $username = $_POST["usernameInput"];
                $pwd = $_POST["passwordInput"];
                
                $this->login($username, $pwd);
                header('Location: /home/');
                exit;
            } else {
                $this->index();
                exit;
            }
        }
    }
    public function login($name, $pwd) {
        $db = new Database();
        $db->connect();
        $auth = $db->checkAuth($name, $pwd);
        if($auth !== true) {
            echo $auth;
            exit;
        }
        $_SESSION['usr'] = [
            "username" => $name,
        ];
    }
    public function logout() {
        $_SESSION['usr'] = null;
        header('Location: /home/');
    }
}