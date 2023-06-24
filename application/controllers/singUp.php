<?php
// session_start();
require_once './application/models/usersModel.php';

$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['pass_confirm'];
$role = $_POST['role'];
 
if ($pass !== $pass_confirm){
    $_SESSION['message'] = 'Паролі не збігаються';
    header('Location: ./../views/register.php');
    exit();
}
$path = 'uploads/' . time() . $_FILES['avatar']['name'];

if(!move_uploaded_file($_FILES['avatar']['tmp_name'],'../../../' . $path)){
    $_SESSION['message'] = 'Помилка завантаження фото';
    header('Location: /application/views/register.php');
    exit();
}

 if (trim($login) == ''){
    $_SESSION['message'] = 'Введіть ваш Email';
    header('Location: /application/views/register.php');
    exit();
}

 if (trim($pass) == ''){
    $_SESSION['message'] = 'Введіть пароль';
    header('Location: /application/views/register.php');
    exit();
}

if (strlen($name) < 3 || strlen($name) > 50){
    $_SESSION['message'] = 'Неприпустима довжина імені';
    header('Location: /application/views/register.php');
    exit();
}

 if (strlen($pass) < 6 || strlen($pass) > 30){
    $_SESSION['message'] = 'Пароль має мати не менше 6 символів та не більше 30';
        header('Location: /application/views/register.php');
    exit();
}

$pass = md5($pass);

if ($userModel->createUser($login, $pass, $name, $path, $role)) {
    $_SESSION['message'] = 'Реєстрація успішна';
    header('Location: /application/views/login.php');
} else {
    $_SESSION['message'] = 'Користувач з таким Email вже зареєстрований';
    header('Location: /application/views/register.php');
}


exit();


