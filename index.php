<?php

use controllers\connect\Database;

session_start();
error_reporting(-1);

require_once './application/controllers/connect.php';
$db = new Database();

$controllers  = array('postNews', 'logUp', 'logIn', 'postEditReview', 'postNewsId', 'postAddedNews', 'postLogIn', 'postMyNews', 'postCardNews', 'postRegister', 'logOut',
 'editReview', 'deleteReview', 'deleteNews', 'addedReviews', 'postAddedReviews', 'addedNews', '404');
$controller  = $_GET['page'] ?? 'postNews';


if(!in_array($controller, $controllers )){
   header("Location: /index.php?page=404");
   exit();
}

include __DIR__ . '/application/controllers/' . $controller . '.php';

