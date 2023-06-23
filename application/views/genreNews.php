<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>News <?php echo $_GET['genre']; ?></title>
</head>

<body>
 <?php require "../block/header.php"; ?>
    <div class="container mt-5">
        <h3 class="title-news">News <?php echo $_GET['genre']; ?></h3>
        <?php require "../block/genre.php"; ?>
        <div class="container mt-5"> 
        <?php require "../block/message.php" ?>
        <div class="card-news">
        <?php foreach ($_SESSION['articles'] as $article) : ?>
            <?php if ($article['genre'] == $_GET['genre']) : ?>
            <?php require "../block/cardNews.php" ?> 
            <?php endif; ?>
        <?php endforeach; ?>
        </div>     
    </div>    
    </div>
    <?php require "../block/footer.php"; ?>
</body>

</html>