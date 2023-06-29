<?php
session_start();
error_reporting(-1);

require_once './application/controllers/connect.php';
$db = new Database();

$controllers  = array('postNews', 'logUp', 'logIn', 'postNewsId', 'postAddedNews', 'postLogIn', 'postMyNews', 'postCardNews', 'logOut', 'editReview', 'deleteReview', 'deleteNews', 'addedReviews', 'addedNews', '404');
$controller  = $_GET['page'] ?? 'postNews';


if(!in_array($controller, $controllers )){
   header("Location: /index.php?page=404");
   exit();
}

include __DIR__ . '/application/controllers/' . $controller . '.php';

