<?php
session_start();
// Підключення до бази даних
require_once 'vendor/connect.php';

// Отримання всіх новин з бази даних
$query = "SELECT * FROM `articles`";
$result = $connect->query($query);
if (!$result) {
    die('Error getting news from DataBase');
}

// Збереження новин в сесії
$articles = [];
while ($row = $result->fetch_assoc()) {
    $articles[] = $row;
}
$_SESSION['articles'] = $articles;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>News today</title>
</head>

<body>
 <?php require "block/header.php" ?>
    <div class="container mt-5">
        <h3 class="title-news">News today</h3>
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 link-secondary" href="genreNews.php?genre=World">World</a>
                <a class="p-2 link-secondary" href="genreNews.php?genre=Technology">Technology</a>
                <a class="p-2 link-secondary" href="genreNews.php?genre=Design">Design</a>
                <a class="p-2 link-secondary" href="genreNews.php?genre=Culture">Culture</a>
                <a class="p-2 link-secondary" href="genreNews.php?genre=Business">Business</a>
                <a class="p-2 link-secondary" href="genreNews.php?genre=Politics">Politics</a>
                <a class="p-2 link-secondary" href="genreNews.php?genre=Science">Science</a>
                <a class="p-2 link-secondary" href="genreNews.php?genre=Style">Style</a>
                <a class="p-2 link-secondary" href="genreNews.php?genre=Travel">Travel</a>
            </nav>
        </div>
        <div class="card-news">
        <?php foreach ($_SESSION['articles'] as $article) : ?>
                <div class="card-title">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bgc">
                        <div class="col p-4 d-flex flex-column position-static ">
                            <strong class="d-inline-block mb-2 text-primary">
                                    <p style="vertical-align: inherit;"><?= $article['genre'] ?></p>
                            </strong>
                            <h3 class="mb-0"><?= substr($article['title'], 0, 70) ?></h3>
                            <div class="mb-1 text-muted">
                                <div style="vertical-align: inherit;">
                                    <p style="vertical-align: inherit;"><?= $article['date'] ?></p>
                                </div>
                            </div>
                            <p class="card-text mb-auto">
                                <div style="vertical-align: inherit;">
                                    <p style="vertical-align: inherit;"><?= substr($article['description'], 0, 120) ?></p>
                                </div>
                            </p>
                            <a href="vendor/postNewsId.php?id=<?= $article['id'] ?>" class="stretched-link">Продовжити читання →</a>
                        </div>
                        <div class="col-auto d-none d-lg-block img">
                            <img src="<?= $article['photo'] ?>" alt="" class="img-thumbnail" width="200" height="250">
                        </div>
                    </div>
                </div>
             <?php endforeach; ?>
        </div>
    </div>
    <?php require "block/footer.php" ?>
</body>

</html>