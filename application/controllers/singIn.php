<?php
session_start();
require_once './../models/usersModel.php';

$userModel = new UserModel($db);

$login = $_POST['login'];
$pass = $_POST['pass'];

$user = $userModel->getUserByLoginAndPassword($login, $pass);

if ($user) {
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "avatar" => $user['avatar'],
        "login" => $user['login'],
        "role" => $user['role'],
    ];

    header('Location: /application/controllers/postMyNews.php');
    exit();
} else {
    $_SESSION['message'] = 'Невірний пароль або логін';
    header('Location: /application/views/login.php');
    exit();
}

?>