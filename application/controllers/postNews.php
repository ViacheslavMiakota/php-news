<?php
session_start();

require_once './application/models/newsModel.php';

$db = new Database();
$newsModel = new News($db);
$articles = $newsModel->getArticles();

if (!empty($articles)) {
    ob_clean();
    include_once './application/views/topNews.php';
} else {
    $_SESSION['message'] = 'Ви ще не додали жодної новини';
    ob_clean();
    header('Location: ./application/views/topNews.php');
    exit();
}
