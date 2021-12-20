<?php

declare(strict_types=1);

class Article
{
    private string $title;
    private ?string $description;
    private ?string $publishDate;
    private ?string $author;
    private ?int $ID;

    public function __construct(int $ID, string $title, ?string $description, ?string $publishDate, ?string $author)
    {
        $this->ID = $ID;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
        $this->author = $author;
    }
    
    public function formatPublishDate($format = "d-m-Y")
    {
        $date_time = new DateTime($this->publishDate);
        $date = date_format($date_time, $format);
        return $date;
    }

    public function getTitle() 
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAuthor() 
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getID() {
        return $this->ID;
    }
    public function getDescription() {
        return $this->description;
    }

    // TODO: write the others getters & setters

}