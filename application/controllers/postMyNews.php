<?php

use controllers\connect\Database;

require_once './application/models/newsModel.php';
require_once './application/models/usersModel.php';


$db = new Database();
$newsModel = new models\News($db);
$userModel = new models\UserModel($db);


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

?>
