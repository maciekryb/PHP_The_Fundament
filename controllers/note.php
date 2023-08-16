<?php

$config = require('config.php');
$db = new Databse($config['database']);

$heading = 'Note';


$note = $db->query('select * from notes where id = :id ', ['id' => $_GET['id']])->fetch();

if (!$note) {
    abort();
}
// dd($note);

if ($note['user_id'] !== '1') {
    abort(403);
}

require "views/note.view.php";
