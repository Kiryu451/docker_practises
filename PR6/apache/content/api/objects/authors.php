<?php

class Authors
{
    private $connect;
    private $table_name = "authors";

    public $id;
    public $name;
    public $surName;
    public $age;

    public function __construct($db)
    {
        $this->connect = $db;
    }

    function read()
    {
        $query = "SELECT id, name, surName, age FROM " . $this->table_name;

        $stmt = $this->connect->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    function create()
    {
        $query = "INSERT INTO " . $this->table_name . " SET name=:name, surName=:surName, age=:age";

        $stmt = $this->connect->prepare($query);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surName = htmlspecialchars(strip_tags($this->surName));
        $this->age = htmlspecialchars(strip_tags($this->age));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":surName", $this->surName);
        $stmt->bindParam(":age", $this->age);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function update()
    {
        $this->id = htmlspecialchars(strip_tags($this->id));
        $sql = "SELECT name, surName, age FROM " . $this->table_name . " WHERE id = " . $this->id;
        if (empty($this->connect->query($sql)->fetch(PDO::FETCH_ASSOC))) {
            return false;
        }
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->surName = htmlspecialchars(strip_tags($this->surName));
        $this->age = htmlspecialchars(strip_tags($this->age));


        if (!empty($this->name) && !empty($this->surName) && !empty($this->age)) {
            $query = "UPDATE " . $this->table_name . " SET name = :name, surName = :surName, age = :age WHERE id = :id";
        } elseif (!empty($this->name) && !empty($this->surName)) {
            $query = "UPDATE " . $this->table_name . " SET name = :name, surName = :surName, age = age WHERE id = :id";
        } elseif (!empty($this->name)) {
            $query = "UPDATE " . $this->table_name . " SET name = :name, surName = surName, age = age WHERE id = :id";
        } else {
            $query = "UPDATE " . $this->table_name . " SET name = name, surName = surName, age = age WHERE id = :id";
        }

        $stmt = $this->connect->prepare($query);
        if (!empty($this->name)) {
            $stmt->bindParam(":name", $this->name);
        }
        if (!empty($this->surName)) {
            $stmt->bindParam(":surName", $this->surName);
        }
        if (!empty($this->age)) {
            $stmt->bindParam(":age", $this->age);
        }
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete()
    {
        $sql = "SELECT id, name, surName, age FROM " . $this->table_name . " WHERE id = ?";

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