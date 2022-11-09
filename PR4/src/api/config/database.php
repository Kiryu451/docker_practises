<?php

class Database
{
    private $host = "database";
    private $db_name = "appDB2";
    private $username = "user";
    private $password = "password";
    public $connect;

    public function getConnection(): ?PDO
    {
        $this->connect = null;

        try {
            $this->connect = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password, );
            $this->connect->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Ошибка подключения: " . $exception->getMessage();
        }

        return $this->connect;
    }
}