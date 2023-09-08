<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
$form->validate($email, $password);

if (!$form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('location:/');
    }
    $form->error('email', 'No matching account found for that email adress and password');
}


return view("session/create.view.php", [
    'errors' => $form->errors(),
]);
