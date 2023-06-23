<?php

session_start();
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
    <title>News today</title>
</head>

<body>
    <?php require "./../block/header.php" ?>
    <div class="container mt-5">
        <h3 class="title-news">News today</h3>
        <?php require "./../block/genre.php" ?>
        <div class="card-news">
            <?php foreach ($articles as $article) : ?>
                <?php require "./../block/cardNews.php" ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php require "./../block/footer.php" ?>
</body>

</html>

