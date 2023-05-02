<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Мої новини</title>
</head>

<body>
 <?php require "block/header.php" ?>
    <div class="container mt-5">
        <div class="out-box">
            <img src="<?= $_SESSION['user']['avatar']?>" width="250px"  alt="">
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['name'] ?></h2>
            <a href=""><?= $_SESSION['user']['login'] ?></a> 
        </div>  
    <div class="item-news">
      <a class="link-secondary" href="/formAddedNews.php">Додати новину</a>
      <a class="link-secondary logout" href="vendor/logout.php">Вийти</a>
    </div>
        <h3 class="title-news">My news</h3>
        <?php 
                     if (isset($_SESSION['message'])) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';
                        unset($_SESSION['message']);
                    }
                ?>
        <div class="card-news">
        <?php foreach ($_SESSION['articles'] as $article) : ?>
  <div class="card-title">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bgc">
      <div class="col p-4 d-flex flex-column position-static ">
        <strong class="d-inline-block mb-2 text-primary"><?= $article['genre'] ?></strong>
        <h3 class="mb-0"><?= substr($article['title'], 0, 70) ?></h3>
        <div class="mb-1 text-muted"><?= $article['date'] ?></div>
        <p class="card-text mb-auto"><?= substr($article['description'], 0, 120) ?></p>
        <a href="vendor/postNewsId.php?id=<?= $article['id'] ?>" class="stretched-link">Продовжити читання →</a>
      </div>
      <div class="col-auto d-none d-lg-block img">
        <img src="<?= $article['photo'] ?>" class="img-thumbnail" width="200px" height="250" alt="photo news">
      </div>
    </div>
  </div>
<?php endforeach; ?>
        </div>     
    </div>
    <?php require "block/footer.php" ?>
</body>

</html>
