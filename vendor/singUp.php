<?php

session_start();
require_once 'connect.php';

$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['pass_confirm'];
 
if ($pass !== $pass_confirm){$_SESSION['message'] = 'Паролі не збігаються';
    header('Location: ../register.php');
    exit();
}
$path = 'uploads/' . time() . $_FILES['avatar']['name'];

if(!move_uploaded_file($_FILES['avatar']['tmp_name'],'../' . $path))
    {$_SESSION['message'] = 'Помилка завантаження фото';
    header('Location: ../register.php');
exit();}

 if (trim($login) == '')
{$_SESSION['message'] = 'Введіть ваш Email';
    header('Location: ../register.php');
    exit();}

 if (trim($pass) == '')
{$_SESSION['message'] = 'Введіть пароль';
header('Location: ../register.php');
exit();}

if (strlen($name) < 3 || strlen($name) > 50)
{$_SESSION['message'] = 'Неприпустима довжина імені';
header('Location: ../register.php');
exit();}

 if (strlen($pass) < 6 || strlen($pass) > 30)
{$_SESSION['message'] = 'Пароль має мати не менше 6 символів та не більше 30';
header('Location: ../register.php');
exit();}

$pass = md5($pass);

$result = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
if (mysqli_num_rows($result) > 0) {
    $_SESSION['message'] = 'Користувач з таким Email вже зареєстрований';
    header('Location: ../register.php');
    exit();
}

mysqli_query($connect, "INSERT INTO `users` (  `login`, `pass`, `name`, `avatar`)
VALUES( '$login', '$pass', '$name', '$path')");

$_SESSION['message'] = 'Реєстрація успішна';
header('Location: ../login.php');

exit();

?>
