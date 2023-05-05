<?php
session_start();
require_once 'connect.php';

$id = $_POST['reviewId'];
$reviewUser = $_POST['reviewUser'];

$articleId = $_SESSION['article']['id'];
$sql = "SELECT * FROM reviews WHERE articleId = ?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "i", $articleId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $reviews = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $reviews[] = $row;
    }
    $_SESSION['reviews'] = $reviews;
}

$sql = "UPDATE `reviews` SET `reviewUser` = ? WHERE `id` = ?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "si", $reviewUser, $id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    foreach ($_SESSION['reviews'] as &$review) {
        if ($review['id'] == $id) {
            $review['reviewUser'] = $reviewUser;
            break;
        }
    }
    $_SESSION['message'] = "Коментар успішно змінено";
} else {
    $_SESSION['message'] = "Помилка: нііе вдалося змінити коментар: " . mysqli_error($connect);
}
mysqli_stmt_close($stmt);
mysqli_close($connect);
header("Location: ../cardNews.php");
exit();
?>
