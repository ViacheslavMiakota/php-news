<?php

session_start();
require_once 'connect.php';

$login = $_POST['login'];
$pass = md5($_POST['pass']);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass' ");

if (mysqli_num_rows($check_user) > 0){
    $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id"=>$user['id'],
            "name"=>$user['name'],
            "avatar"=>$user['avatar'],
            "login"=>$user['login'],
        ];

        mysqli_close($connect);
        header('Location: postMyNews.php');
        exit();
    
}

$_SESSION['message'] = 'Невірний пароль або логін';
mysqli_close($connect);
header('Location: ../login.php');
exit();


?>
