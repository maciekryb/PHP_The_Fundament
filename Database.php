<?php

class Databse
{
    public $connection;

    public function __construct($config)
    {
        $dsn = ("mysql:" . http_build_query($config, '', ';'));
        // $dsn =
        //     "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbanme']};charset={$config['charset']}";
        $this->connection = new PDO($dsn, 'root', '', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public function query($query)
    {

        $statment = $this->connection->prepare($query);
        $statment->execute();

        return $statment;
    }
}
