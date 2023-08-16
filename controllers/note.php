<?php

$config = require('config.php');
$db = new Databse($config['database']);

$heading = 'Note';
$currentUserId = '1';

$note = $db->query('select * from notes where id = :id ', ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] == $currentUserId);

// dd($note);
require "views/note.view.php";
