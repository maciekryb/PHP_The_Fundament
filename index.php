<?php

require "functions.php";
require "Database.php";

$config = [
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'myapp',
    'charset' => 'utf8mb4',
];

$db = new Databse($config);

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
