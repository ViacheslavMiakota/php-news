<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use controllers\Database\Database;
use models\User\User;

session_start();

$login = $_POST['login'];
$pass = $_POST['pass'];

$db = new Database();
$userModel = new User($db);

$user = $userModel->getUserByLoginAndPassword($login, $pass);

if ($user) {
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "avatar" => $user['avatar'],
        "login" => $user['login'],
        "role" => $user['role'],
    ];
    header('Location: /index.php?page=postMyNews');
    exit();
} else {
    $_SESSION['message'] = 'Невірний пароль або логін';
    header('Location: /index.php?page=postLogIn');
    exit();
}
