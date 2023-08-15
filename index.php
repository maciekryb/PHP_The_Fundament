<?php

require "functions.php";
require "Database.php";

$config = require('config.php');

$db = new Databse($config['database']);

$posts = $db->query("select * from posts")->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
