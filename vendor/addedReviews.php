<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['user']['name'], $_SESSION['user']['id'], $_SESSION['article']['id'])) {
    $_SESSION['message'] = 'Помилка: недостатньо даних для додавання коментаря';
    header('Location: ../cardNews.php');
    exit();
}

$name = $_SESSION['user']['name'];
$userId = $_SESSION['user']['id'];
$articleId = $_SESSION['article']['id'];
$reviewUser = isset($_POST['reviewUser']) ? $_POST['reviewUser'] : '';

if (empty($reviewUser)) {
    $_SESSION['message'] = 'Помилка: введіть коментар';
    header('Location: ../cardNews.php');
    exit();
}

// перевірка, чи користувач не залишав вже коментар до цієї новини
$result = mysqli_query($connect, "SELECT * FROM `reviews` WHERE `userId` = '$userId' AND `articleId` = '$articleId'");
if (mysqli_num_rows($result) > 0) {
    $_SESSION['message'] = 'Ви вже залишали коментар до цієї новини';
    header('Location: ../cardNews.php');
    exit();
}

// додавання коментаря до бази даних
$reviewUser = mysqli_real_escape_string($connect, $reviewUser); // захист від SQL ін'єкцій
$sql = "INSERT INTO `reviews` (`name`, `userId`, `articleId`, `reviewUser`) VALUES ('$name', '$userId', '$articleId', '$reviewUser')";
if (mysqli_query($connect, $sql)) {
    $_SESSION['message'] = 'Коментар додано';
} else {
    $_SESSION['message'] = 'Помилка при додаванні коментаря: ' . mysqli_error($connect);
}

header('Location: ../cardNews.php');
exit();
?>


