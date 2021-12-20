<?php
require_once 'Model/database.php';

class SingleArticleController {
    private $ID;
    public function __construct($ID) {
        $this->ID = $ID;
    }
    public function index() {
        $article = $this->getArticle();
        $IDS = $this->getIDS();
        $currentIndex = $article->getId() -1;
        require 'View/article/index.php';
    }
    public function getArticle() {
        $db = new Database();
        $db->connect();
        $rawArticle = $db->getArticle($this->ID);
        $article = new Article(intval($rawArticle['ID']), $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'], $rawArticle['author']);
        return $article;
    }
    public function getIDS() {
        $db = new Database();
        $db->connect();
        $IDS = $db->getIDS();
        return $IDS;
    }
}