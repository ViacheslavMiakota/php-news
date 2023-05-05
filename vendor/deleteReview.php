<?php
ini_set('display_errors', 1); error_reporting(E_ALL);
session_start();
require_once 'connect.php';
 

if (isset($_POST['reviewId'])) {
    $id = $_POST['reviewId'];
    
    $stmt = mysqli_prepare($connect, "DELETE FROM `reviews` WHERE `id` = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
      $_SESSION['message'] = "Коментар успішно видалено";
    } else {
      $_SESSION['message'] = "Помилка: не вдалося видалити коментар: " . mysqli_error($connect);
    }
    header("Location: ../cardNews.php");
    exit();
} else {

  $_SESSION['message'] = "Помилка: не вдалося видалити коментар.";
  
  header("Location: ../cardNews.php");
  exit();
}
?>
