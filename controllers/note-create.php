<?php

$config = require('config.php');
$db = new Databse($config['database']);

$heading = 'Create Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // dd($_POST);
    $db->query('INSERT INTO notes (body, user_id) VALUES(:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
}

require 'views/note-create.view.php';
