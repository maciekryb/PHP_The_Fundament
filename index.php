<?php

require "functions.php";
// require "router.php";

$dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";
$pdo = new PDO($dsn);
// $statment = $pdo->prepare("select * from posts");
$statment = $pdo->prepare("select * from posts where id=1");
$statment->execute();

$posts = $statment->fetchAll(PDO::FETCH_ASSOC);

echo $posts;
foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}

// dd($posts);
// class Person
// {
//     public $name;
//     public $age;

//     public function breathe()
//     {
//         echo $this->name . " is breathing";
//     }
// }

// $person = new Person();

// $person->name = 'John Doe';
// $person->age = 25;

// dd($person->breathe());
