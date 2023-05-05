<?php
ini_set('display_errors', 1); error_reporting(E_ALL);
session_start();
require_once 'connect.php';

if (isset($_SESSION['article']['id'])) {
    $id = $_SESSION['article']['id'];
    
    $stmt = mysqli_prepare($connect, "DELETE FROM `articles` WHERE `id` = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
      $_SESSION['message'] = "Статтю успішно видалено";
    } else {
      $_SESSION['message'] = "Помилка: не вдалося видалити статтю: " . mysqli_error($connect);
    }
    header("Location: ../myNews.php");
    exit();
} else {
  $_SESSION['message'] = "Помилка: не вдалося видалити статтю.";
  header("Location: ../myNews.php");
  exit();
}
?>
  
