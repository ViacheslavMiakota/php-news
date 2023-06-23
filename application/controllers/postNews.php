<?php
session_start();
require_once './../models/newsModel.php';

$db = new Database();
$newsModel = new News($db);
$articles = $newsModel->getArticles();

if (!empty($articles)) {
    $_SESSION['articles'] = $articles;
    ob_clean();
    header("Location: /application/views/topNews.php");
    exit();
} else {
    $_SESSION['message'] = 'Ви ще не додали жодної новини';
    ob_clean();
    header("Location: /application/views/topNews.php");
    exit();
}
$articles = isset($_SESSION['articles']) ? $_SESSION['articles'] : array();
