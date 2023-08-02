<?php

use controllers\Database\Database;
use models\Review\Review;

$id = $_POST['reviewId'];
$reviewUser = $_POST['reviewUser'];
$articleId = $_SESSION['article']['id'];

$db = new Database();
$reviewModel = new Review($db);

// Update comment
$result = $reviewModel->updateReviewById($id, $reviewUser);

if ($result) {
    // Update comments in the session
    $reviews = $reviewModel->getReviewsForArticle($articleId);
    $_SESSION['reviews'] = $reviews;

    $_SESSION['message'] = "Коментар успішно змінено";
} else {
    $_SESSION['message'] = "Помилка: не вдалося змінити коментар";
}

header("Location: /index.php?page=postNewsId&id=" . $articleId);
exit();
