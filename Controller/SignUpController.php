<?php
declare(strict_types = 1);

class SignUpController
{
    public function index()
    {
        require 'View/signup.php';
    }
    public function signup($username, $pwd, $mail) {
        $db = new Database();
        $db->connect();
        $db->createUser($username, password_hash($pwd, PASSWORD_BCRYPT), $mail);
    }
    
}