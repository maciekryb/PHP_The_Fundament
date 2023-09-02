<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'please provide a valid email adress';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'please provide a valid password';
}

if (!empty($errors)) {
    return view("session/create.view.php", [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email =:email', ['email' => $email])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email,
        ]);
        header('location: /');
        exit();
    }
}

return view("session/create.view.php", [
    'errors' => [
        'email' => 'No matching account found for that email adress and password',
    ],
]);
