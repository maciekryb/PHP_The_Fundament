<?php

class Database
{
    public $connection;
    public $statment;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = ("mysql:" . http_build_query($config, '', ';'));
        $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function query($query, $params = [])
    {
        $this->statment = $this->connection->prepare($query);
        $this->statment->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statment->fetch();
    }

    public function get()
    {
        return $this->statment->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }
        return $result;
    }
}
