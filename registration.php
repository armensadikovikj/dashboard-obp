<?php
session_start();

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] :'';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$user = new User();
$user->setName($name);
$user->setEmail($email);
$user->setPassword($password);
$user->save();


if($user) {
    $_SESSION['user'] = $user->getId();
}

header('Location: /index.php');








