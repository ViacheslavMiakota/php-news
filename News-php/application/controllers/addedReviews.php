<?php

use controllers\Database\Database;
use models\Review\Review;

$db = new Database();

if (!isset($_SESSION['user']['name'], $_SESSION['user']['id'], $_SESSION['article']['id'])) {
    $_SESSION['message'] = 'Помилка: недостатньо даних для додавання коментаря';
    header('Location: /index.php?page=postAddedReviews');
    exit();
}

$name = $_SESSION['user']['name'];
$userId = $_SESSION['user']['id'];
$articleId = $_SESSION['article']['id'];
$reviewUser = isset($_POST['reviewUser']) ? $_POST['reviewUser'] : '';


if (empty($reviewUser)) {
    $_SESSION['message'] = 'Помилка: введіть коментар';
    header('Location: /index.php?page=postAddedReviews');
    exit();
}
$reviewModel = new Review($db);
// checking if the user has not already left a comment on this news
if ($reviewModel->hasUserReviewedArticle($userId, $articleId)) {
    $_SESSION['message'] = 'Ви вже залишали коментар до цієї новини';
    header('Location: ./application/views/cardNews.php');
    exit();
}

// adding a comment to the database
if ($reviewModel->addReview($name, $userId, $articleId, $reviewUser)) {
    $_SESSION['message'] = 'Коментар додано';
} else {
    $_SESSION['message'] = 'Помилка при додаванні коментаря';
}

header('Location: /index.php?page=postNewsId&id=' . $articleId);
exit();
