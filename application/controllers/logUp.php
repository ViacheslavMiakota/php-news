<?php

require_once './application/models/usersModel.php';

$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['pass_confirm'];
$role = $_POST['role'];
 
if ($pass !== $pass_confirm){
    $_SESSION['message'] = 'Паролі не збігаються';
    header('Location: /index.php?page=postRegister');
    exit();
}
$path = 'uploads/' . time() . $_FILES['avatar']['name'];

if(!move_uploaded_file($_FILES['avatar']['tmp_name'], './' . $path)){
    $_SESSION['message'] = 'Помилка завантаження фото';
    header('Location: /index.php?page=postRegister');
    exit();
}

 if (trim($login) == ''){
    $_SESSION['message'] = 'Введіть ваш Email';
    header('Location: /index.php?page=postRegister');
    exit();
}

 if (trim($pass) == ''){
    $_SESSION['message'] = 'Введіть пароль';
    header('Location: /index.php?page=postRegister');
    exit();
}

if (strlen($name) < 3 || strlen($name) > 50){
    $_SESSION['message'] = 'Неприпустима довжина імені';
    header('Location: /index.php?page=postRegister');
    exit();
}

 if (strlen($pass) < 6 || strlen($pass) > 30){
    $_SESSION['message'] = 'Пароль має мати не менше 6 символів та не більше 30';
        header('Location: /index.php?page=postRegister');
    exit();
}

$userModel = new models\UserModel($db); 
$user = $userModel->createUser($login, $pass, $name, $path, $role);


if ($user) {
    $_SESSION['message'] = 'Реєстрація успішна';
    header('Location: /index.php?page=postLogIn');
    exit();
} else {
    $_SESSION['message'] = 'Користувач з таким Email вже зареєстрований';
    header('Location: /index.php?page=postRegister');
    exit();
}


