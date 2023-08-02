<?php

use controllers\Database\Database;
use models\News\News;
use models\User\User;

$db = new Database();
$newsModel = new News($db);
$userModel = new User($db);


$userId = $_SESSION['user']['id'];

$articles = $newsModel->getArticlesByUserId($userId);

if ($articles) {
    $_SESSION['articles'] = $articles;
    include_once './application/views/myNews.php';
    exit();
} else {
    $_SESSION['articles'] = [];
    $_SESSION['message'] = 'Ви ще не додали жодної новини';
    include_once './application/views/myNews.php';
    exit();
}
