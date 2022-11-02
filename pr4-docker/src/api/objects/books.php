<?php

class Books
{
    private $connect;
    private $table_name = "books";

    public $id;
    public $title;
    public $content;
    public $author;

    public function __construct($db)
    {
        $this->connect = $db;
    }

    function read()
    {
        $query = "SELECT id, title, content, author FROM " . $this->table_name;

        $stmt = $this->connect->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    function create()
    {
        
        $query = "INSERT INTO " . $this->table_name . " SET title=:title, content=:content, author=:author";

        $stmt = $this->connect->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->author = htmlspecialchars(strip_tags($this->author));
        
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":author", $this->author);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function update()
    {
        $this->id = htmlspecialchars(strip_tags($this->id));
        $sql = "SELECT title, content, author FROM " . $this->table_name . " WHERE id = " . $this->id;
        if (empty($this->connect->query($sql)->fetch(PDO::FETCH_ASSOC))) {
            return false;
        }
        $this->title = htmlspecialchars(strip_tags($this->name));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->author = htmlspecialchars(strip_tags($this->author));


        if (!empty($this->title) && !empty($this->content) && !empty($this->author)) {
            $query = "UPDATE " . $this->table_name . " SET title = :title, content = :content, author = :author WHERE id = :id";
        } elseif (!empty($this->title) && !empty($this->content)) {
            $query = "UPDATE " . $this->table_name . " SET title = :title, content = :content, author = author WHERE id = :id";
        } elseif (!empty($this->title)) {
            $query = "UPDATE " . $this->table_name . " SET title = :title, content = content, author = author WHERE id = :id";
        } else {
            $query = "UPDATE " . $this->table_name . " SET title = title, content = content, author = author WHERE id = :id";
        }

        $stmt = $this->connect->prepare($query);
        if (!empty($this->title)) {
            $stmt->bindParam(":title", $this->title);
        }
        if (!empty($this->content)) {
            $stmt->bindParam(":content", $this->content);
        }
        if (!empty($this->author)) {
            $stmt->bindParam(":author", $this->author);
        }
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete()
    {
        $sql = "SELECT id, title, content, author FROM " . $this->table_name . " WHERE id = ?";

        if ($sql == false)
            return false;
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        $stmt = $this->connect->prepare($query);

        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}