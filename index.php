<?php
error_reporting(-1);


$pages = array('postNews', 'singUp', 'singIn', 'postNewsId', 'postMyNews', 'postCardNews', 'logout', 'editReview', 'deleteReview', 'deleteNews', 'addedReviews', 'addedNews', '404');
$page = $_GET['page'] ?? 'postNews';

if(!in_array($page, $pages )){
   header("Location: /index.php?page=404") ;
   exit();
}

include __DIR__ . '/application/controllers/' . $page . '.php';

?>