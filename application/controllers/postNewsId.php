<?php

use controllers\connect\Database;

require_once './application/models/newsModel.php';
require_once './application/models/reviewsModel.php';

$db = new Database();
$newsModel = new models\News($db);
$reviewsModel = new models\Review($db);

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "Ідентифікатор статті не встановлено";
    exit;
}

$article = $newsModel->getArticleById($id);
$articleId = isset($_SESSION['article']['id']) ? $_SESSION['article']['id'] : null;

if ($article) {
    $_SESSION['article'] = $article;
    $_SESSION['articleId'] = $id; // Записуємо id без додаткової змінної
    header("Location: /application/views/cardNews.php?id=' . $id");
    exit();
} else {
    $_SESSION['articleId'] = null;
    include_once '/index.php?page=postNews';
    exit();
}
?>










