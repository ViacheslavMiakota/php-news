<?php

require_once './application/models/reviewsModel.php';

$id = $_POST['reviewId'];
$reviewUser = $_POST['reviewUser'];

$articleId = $_SESSION['article']['id'];

$reviewModel = new Review($db);

//Оновити коментар
$result = $reviewModel->updateReviewById($id, $reviewUser);

if ($result) {
    // Оновити коментар в сесії
    $reviews = $reviewModel->getReviewsForArticle($articleId);
    $_SESSION['reviews'] = $reviews;
    
    $_SESSION['message'] = "Коментар успішно змінено";
} else {
    $_SESSION['message'] = "Помилка: не вдалося змінити коментар";
}

header("Location: /application/views/cardNews.php");
exit();

