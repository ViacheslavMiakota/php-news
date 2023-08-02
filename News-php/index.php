<?php

require_once __DIR__ . '/vendor/autoload.php';

use controllers\Database\Database;

session_start();
error_reporting(-1);

$db = new Database();

$controllers  = array(
   'postNews', 'logUp', 'logIn', 'postEditReview', 'postNewsId', 'postAddedNews', 'postLogIn', 'postMyNews', 'postCardNews', 'postRegister', 'logOut',
   'editReview', 'deleteReview', 'deleteNews', 'addedReviews', 'postAddedReviews', 'addedNews', '404'
);
$controller  = $_GET['page'] ?? 'postNews';

if (!in_array($controller, $controllers)) {
   header("Location: /index.php?page=404");
   exit();
}

include __DIR__ . '/application/controllers/' . $controller . '.php';



// HOST = localhost
// DB_NAME = id20725479_register_db
// USER_NAME = id20725479_admin
// PASSWORD = Rttyrtty123789`
// CHARSET = utf8