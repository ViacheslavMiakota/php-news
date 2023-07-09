<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once './application/models/reviewsModel.php';;

if (isset($_POST['reviewId'])) {
    $id = $_POST['reviewId'];
    
    $reviewModel = new models\Review($db);

    if ($reviewModel->deleteReviewById($id)) {
        $_SESSION['message'] = "Коментар успішно видалено";
    } else {
        $_SESSION['message'] = "Помилка: не вдалося видалити коментар";
    }
  
  header("Location: ./application/views/cardNews.php");
  exit();
}else {
  $_SESSION['message'] = "Помилка: не вдалося видалити коментар";
  header("Location: ./application/views/cardNews.php");
  exit();
}

