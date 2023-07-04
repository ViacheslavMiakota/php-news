<?php

require_once './application/models/reviewsModel.php';
require_once './application/controllers/connect.php';

$id = $_POST['reviewId'];
$reviewUser = $_POST['reviewUser'];
$articleId = $_SESSION['article']['id'];

$db = new Database();
$reviewModel = new Review($db);

// Оновити коментар
$result = $reviewModel->updateReviewById($id, $reviewUser);

if ($result) {
    // Оновити коментарі в сесії
    $reviews = $reviewModel->getReviewsForArticle($articleId);
    $_SESSION['reviews'] = $reviews;
    
    $_SESSION['message'] = "Коментар успішно змінено";
} else {
    $_SESSION['message'] = "Помилка: не вдалося змінити коментар";
}

header("Location: /index.php?page=postNewsId&id=" . $articleId);
exit();
?>


