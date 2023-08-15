<?php

require "functions.php";
require "Database.php";

$db = new Databse();

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
