<?php

require_once './application/controllers/connect.php';

require_once './application/models/newsModel.php';
require_once './application/models/usersModel.php';
require_once './application/models/reviewsModel.php';

$db = new Database();
$newsModel = new News($db);
$userModel = new UserModel($db);
$reviewsModel = new Review($db);

$id = isset($_GET['id']) ? $_GET['id'] : null;
if ($id === null) {
    echo "Ідентифікатор статті не встановлено";
    exit;
}

$article = $newsModel->getArticleById($id);
$articleId = $_SESSION['article']['id'];
$reviews = $reviewsModel->getReviewsForArticle($articleId);

if ($article) {
    $_SESSION['article'] = $article;
    $_SESSION['articleId'] = $id; // Записуємо id без додаткової змінної
    header("Location: /application/views/cardNews.php?id=" . $id);
    exit();
} else {
    $_SESSION['articleId'] = null;
    header("Location: /index.php?page=postNews");
    exit();
}
?>


