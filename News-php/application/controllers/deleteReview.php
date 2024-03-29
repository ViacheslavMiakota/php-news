<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use models\Review\Review;

if (isset($_POST['reviewId'])) {
  $id = $_POST['reviewId'];

  $reviewModel = new Review($db);

  if ($reviewModel->deleteReviewById($id)) {
    $_SESSION['message'] = "Коментар успішно видалено";
  } else {
    $_SESSION['message'] = "Помилка: не вдалося видалити коментар";
  }

  header("Location: ./application/views/cardNews.php");
  exit();
} else {
  $_SESSION['message'] = "Помилка: не вдалося видалити коментар";
  header("Location: ./application/views/cardNews.php");
  exit();
}
