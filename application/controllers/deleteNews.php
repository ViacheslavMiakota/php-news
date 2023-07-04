<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once './application/models/newsModel.php';
$db = new Database();
$newsModel = new News($db);

if (isset($_SESSION['article']['id'])) {
  $id = $_SESSION['article']['id'];

  if ($newsModel->deleteArticle($id)) {
      $_SESSION['message'] = "Статтю успішно видалено";
  } else {
      $_SESSION['message'] = "Помилка: не вдалося видалити статтю";
  }
} else {
  $_SESSION['message'] = "Помилка: не вдалося видалити статтю";
}

header("Location: /index.php?page=postMyNews");
exit();


