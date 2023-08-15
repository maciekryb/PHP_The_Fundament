<?php

class Databse
{
    public $connection;

    public function __construct()
    {
        $dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";
        $this->connection = new PDO($dsn);
    }

    public function query($query)
    {

        $statment = $this->connection->prepare($query);
        $statment->execute();

        return $statment;
    }
}
