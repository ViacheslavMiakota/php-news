<?php
session_start();
require_once '../models/newsModel.php';
require_once '../models/usersModel.php';

$db = new Database();
$newsModel = new News($db);
$userModel = new UserModel($db);

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "Ідентифікатор статті не встановлено";
    exit;
}

$article = $newsModel->getArticleById($id);
if ($article) {
    $_SESSION['article'] = $article;
    $_SESSION['articleId'] = $id; // Записуємо id без додаткової змінної
    header("Location: /application/views/cardNews.php?id=" . $id);
    exit();
} else {
    $_SESSION['articleId'] = null;
    header("Location: /application/views/topNews.php");
    exit();
}
?>
