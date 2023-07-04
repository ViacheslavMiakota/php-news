<?php
session_start();

require_once './application/models/usersModel.php';

$db = new Database();
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
    header('Location: /index.php?page=postMyNews');
    exit();
    
} else {
    $_SESSION['message'] = 'Невірний пароль або логін';
    header('Location: /index.php?page=postLogIn');
    exit();
}



