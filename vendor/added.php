<?php

session_start();
require_once 'connect.php';

$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$genre = isset($_POST['genre']) ? $_POST['genre'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';

$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;


$path = 'uploads/' . time(). '_' . $_FILES['photo']['name'];

if(!move_uploaded_file($_FILES['photo']['tmp_name'], '../' . $path))
    {$_SESSION['message'] = 'Помилка завантаження фото';
    header('Location: ../formAddedNews.php');
exit();}

 if (trim($title) == '')
{$_SESSION['message'] = 'Введіть заголовок новини';
    header('Location: ../formAddedNews.php');
    exit();}

 if (trim($description) == '')
{$_SESSION['message'] = 'Введіть опис новини';
header('Location: ../formAddedNews.php');
exit();}

$result = mysqli_query($connect, "SELECT * FROM `articles` WHERE `title` = '$title' AND `date` = '$date'");
if (mysqli_num_rows($result) > 0) {
    $_SESSION['message'] = 'Новина під такою нозвою сьогодні вже є. Перевірте назву та заповніть знову';
    header('Location: ../formAddedNews.php');
    exit();
}

$description = mysqli_real_escape_string($connect, $description);
$sql = "INSERT INTO `articles` (`title`, `description`, `genre`, `date`, `photo`, `userId`) VALUES ('$title', '$description', '$genre', '$date', '$path', '$userId')";
mysqli_query($connect, $sql);

$_SESSION['message'] = 'Новину додано';
header('Location: ../myNews.php');

exit();

?>
