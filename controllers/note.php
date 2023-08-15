<?php

$config = require('config.php');
$db = new Databse($config['database']);

$heading = 'Note';


$note = $db->query('select * from notes where id = :id ', ['id' => $_GET['id']])->fetch();

// dd($notes);

require "views/note.view.php";
