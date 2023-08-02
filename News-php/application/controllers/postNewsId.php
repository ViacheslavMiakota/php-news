<?php

use controllers\Database\Database;
use models\News\News;
use models\Review\Review;

$db = new Database();
$newsModel = new News($db);
$reviewsModel = new Review($db);

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "Ідентифікатор статті не встановлено";
    exit;
}

$article = $newsModel->getArticleById($id);
$articleId = isset($_SESSION['article']['id']) ? $_SESSION['article']['id'] : null;

if ($article) {
    $_SESSION['article'] = $article;
    $_SESSION['articleId'] = $id; // Write the id without an additional variable
    header("Location: /application/views/cardNews.php?id=' . $id");
    exit();
} else {
    $_SESSION['articleId'] = null;
    include_once '/index.php?page=postNews';
    exit();
}
