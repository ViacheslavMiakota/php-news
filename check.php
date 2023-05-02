<?php

$name = $_POST['name'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$pass_confirm = $_POST['pass_confirm'];


$error = '';

if (trim($login) == '')
  $error = 'Введіть ваш Email';
else if (trim($pass) == '')
  $error = 'Введіть пароль';
else if (strlen($name) < 3 || strlen($name) > 50)
  $error = 'Неприпустима довжина імені';
else if (strlen($pass) < 6 || strlen($pass) > 30)
  $error = 'Пароль має мати не менше 6 символів та не більше 30';
else if ($pass !== $pass_confirm)
  $error = 'Паролі не збігаються';
if ($error != '') {
  echo $error;
  exit;
};

$pass = md5($pass."qweqwe");

$host = 'localhost';
$username = 'root';
$password = 'password';
$dbname = 'register-bd';

$mysql = new \MySQLi($host, $username, $password, $dbname);
if ($mysql->connect_error) {
  die('Connect Error (' . $mysql->connect_errno . ') ' . $mysql->connect_error);
}

$login = $mysql->real_escape_string($login);
$pass = $mysql->real_escape_string($pass);
$name = $mysql->real_escape_string($name);
$mysql->query("INSERT INTO `users` ( `login`, `pass`, `name`)
VALUES('$login', '$pass', '$name')");

$mysql->close();

header('Location:/');
