<?php

session_start();
require_once './../models/newsModel.php';
require_once './../models/usersModel.php';
$articles = isset($_SESSION['articles']) ? $_SESSION['articles'] : array(); // Отримати дані з сесії

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Мої новини</title>
</head>

<body>
 <?php require "./../block/header.php" ?>
    <div class="container mt-5">
        <div class="out-box">
            <img src="./../../<?= $_SESSION['user']['avatar']?>" width="250px"  alt="avatar">
            <?php echo $_SESSION['user']['name']?>
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['name'] ?></h2>
            <a href=""><?= $_SESSION['user']['login'] ?></a> 
            <h4 style="margin: 10px 0;"><?= $_SESSION['user']['role'] ?></h4>
        </div>  
    <div class="item-news">
      <a class="link-news" href="./../controllers/addedNews.php">Додати новину</a>
      <a class="link-news" href="./../controllers/logout.php">Вийти</a>
    </div>
        <h3 class="title-news">My news</h3>
        <?php require "./../block/message.php" ?>
        <div class="card-news">
        <?php foreach ($articles as $article) : ?>
            <?php require "./../block/cardNews.php" ?>
        <?php endforeach; ?>
        </div>   
    </div>
    <?php require "./../block/footer.php" ?>
</body>

</html>
