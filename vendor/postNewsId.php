<?php

session_start();
require_once 'connect.php';
$_SESSION['userId'] = $userId;

if (isset($_GET['id']) && $_GET['id'] > 0) {
  $id = intval($_GET['id']);
  echo "id = $id";
} else {
  echo "Статтю не знайдено";
  exit();
}

$query = "SELECT * FROM `articles` WHERE `id` = '$id'";
$result = mysqli_query($connect, $query);


if (!$result) {
  printf("Помилка запиту: %s\n", mysqli_error($connect));
  exit();
}

if (mysqli_num_rows($result) > 0) {
  $article = mysqli_fetch_assoc($result);
  $_SESSION['article'] = $article;
  mysqli_free_result($result);
  mysqli_close($connect);
  header('Location: ../cardNews.php?id='. $id);
  exit();
}else {
  $_SESSION['article'] = null;
  mysqli_free_result($result);
  mysqli_close($connect);
  header('Location: ../index.php');
  exit();
}
?>