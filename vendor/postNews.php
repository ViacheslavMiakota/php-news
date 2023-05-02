<?php

session_start();
require_once 'connect.php';


$query = "SELECT * FROM `articles`";
$result = mysqli_query($connect, $query);

$_SESSION['articles'] = [];

if($result && mysqli_num_rows($result) > 0) {
  $articles = [];
  while($article = mysqli_fetch_assoc($result)){
 $articles[] = [
    "id"=>$article['id'],
    "title"=>$article['title'],
    "description"=>$article['description'],
    "genre"=>$article['genre'],
    "date"=>$article['date'],
    "photo"=>$article['photo'],
    "userId"=>$article['userId'],
  ];
}
$_SESSION['articles'] = $articles;
  mysqli_free_result($result);
  mysqli_close($connect);
  header('Location: ../index.php');
  exit();
} else {
  $_SESSION['articles'] = [];
  $_SESSION['message'] = 'Ви ще не додали жодної новини' ;
  mysqli_close($connect);
  header('Location: ../index.php');
  exit();
}

?>
