<?php
require_once './../models/usersModel.php';
require_once './../models/reviewsModel.php';

$articleId = $_SESSION['article']['id'];

$reviewModel = new Review($db);

// Отримуємо список коментарів для статті
$reviews = $reviewModel->getReviewsForArticle($articleId);

// Передаємо дані в шаблон
$data = [
    'reviews' => $reviews,
];
require_once './../block/review.php';
?>
