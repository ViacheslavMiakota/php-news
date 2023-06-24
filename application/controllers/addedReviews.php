<?php
session_start();

require_once './application/models/reviewsModel.php';
$db = new Database();

if (!isset($_SESSION['user']['name'], $_SESSION['user']['id'], $_SESSION['article']['id'])) {
    $_SESSION['message'] = 'Помилка: недостатньо даних для додавання коментаря';
    header('Location: ../addedReviews.php');
    exit();
}

$name = $_SESSION['user']['name'];
$userId = $_SESSION['user']['id'];
$articleId = $_SESSION['article']['id'];
$reviewUser = isset($_POST['reviewUser']) ? $_POST['reviewUser'] : '';

if (empty($reviewUser)) {
    $_SESSION['message'] = 'Помилка: введіть коментар';
    header('Location: ../addedReviews.php');
    exit();
}
$reviewModel = new Review($db);
// перевірка, чи користувач не залишав вже коментар до цієї новини
if ($reviewModel->hasUserReviewedArticle($userId, $articleId)) {
    $_SESSION['message'] = 'Ви вже залишали коментар до цієї новини';
    header('Location: /application/views/cardNews.php');
    exit();
}

// додавання коментаря до бази даних
if ($reviewModel->addReview($name, $userId, $articleId, $reviewUser)) {
    $_SESSION['message'] = 'Коментар додано';
} else {
    $_SESSION['message'] = 'Помилка при додаванні коментаря';
}

header('Location: /application/views/cardNews.php');
exit();



