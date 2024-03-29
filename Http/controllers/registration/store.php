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
    $errors['password'] = 'please provide a password at least 7 characters';
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email =:email', ['email' => $email])->find();


if ($user) {

    header('location: /notes');
    exit();
} else {

    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT),
    ]);

    $_SESSION['user'] = ['email' => $email];

    header('location: /');
    exit();
}
