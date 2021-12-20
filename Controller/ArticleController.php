<?php

declare(strict_types = 1);
require_once 'Model/database.php';

//You should not echo anything inside your controller - only assign vars here
// then the view will actually display them.

class ArticleController
{
    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        $db = new Database();
        $db->connect();
        
        // TODO: prepare the database connection
        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        // TODO: fetch all articles as $rawArticles (as a simple array)
        $rawArticles = $db->getArticles();

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article(intval($rawArticle['ID']), $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date'], $rawArticle['author']);
        }

        return $articles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page
    }
}