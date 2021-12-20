<?php
require_once 'env.php';

class Database {
    private $conn = null;
    public function connect() {
        try {
            $this->conn = new PDO('mysql:host='.$_ENV['HOST'].';dbname=db;port=3306', $_ENV['USR'], $_ENV['PWD']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public function disconnect() {
        $this->conn = null;
    }
    public function getArticles() {
        $q = $this->conn->prepare("SELECT articles.*, users.name AS author FROM articles INNER JOIN users ON articles.userID = users.ID");
        $q->execute();
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getArticle($ID) {
        $q = $this->conn->prepare("SELECT articles.*, users.name AS author FROM articles INNER JOIN users ON articles.userID = users.ID WHERE articles.ID = :ID");
        $q->bindParam(':ID', $ID, PDO::PARAM_INT, 11);
        $q->execute();
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getIDS() {
        $q = $this->conn->prepare("SELECT ID from articles ORDER BY ID");
        $q -> execute();
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function checkAuth($username, $pwd) {
        $q = $this->conn->prepare("SELECT * FROM users WHERE name = :username");
        $q->bindParam(':username', $username, PDO::PARAM_STR, 55);
        $q->execute();
        $userDB = $q->fetch(PDO::FETCH_ASSOC);
        if(!$userDB) {
            return 'No user with that name : '. $username;
        }
        if(!password_verify($pwd, $userDB["pwd"])){
            return 'Wrong password for that user : '.$pwd.'<br>'.$userDB["pwd"];
        }
        return true;
    }
    public function createUser($username, $pwd, $mail) {
        // Checking if username used
        $q = $this->conn->prepare("SELECT name FROM users WHERE name = :name");
        $q->bindParam(':name', $username, PDO::PARAM_STR, 55);
        $q->execute();
        $dataLogin = $q->fetch(PDO::FETCH_ASSOC);
        if($dataLogin) {
            exit('Username already used');
        }
        // Checking if email already uesed
        $q = $this->conn->prepare('SELECT email FROM users WHERE email = :email');
        $q->bindParam(":email", $mail, PDO::PARAM_STR, 55);
        $q->execute();
        $dataLogin = $q->fetch(PDO::FETCH_ASSOC);
        if($dataLogin) {
            exit('Email already used');
        }
        // Putting user in database
        $q = $this->conn->prepare("INSERT INTO users(name, email, pwd) VALUES (:name, :email, :password)");
        $q->bindParam(":name", $username, PDO::PARAM_STR);
        $q->bindParam(":email", $mail, PDO::PARAM_STR);
        $q->bindParam(":password", $pwd, PDO::PARAM_STR);
        if(!$q->execute()) {
            exit('There was an error connecting to the database');
        }
    }
}