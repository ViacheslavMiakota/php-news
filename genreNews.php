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
    <title>News genre</title>
</head>

<body>
 <?php require "block/header.php" ?>
    <div class="container mt-5">
        <h3 class="title-news">News <?php echo $_GET['genre']; ?></h3>
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
        <div class="container mt-5"> 
        <?php 
                     if (isset($_SESSION['message'])) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';
                        unset($_SESSION['message']);
                    }
                ?>
        <div class="card-news">
        <?php foreach ($_SESSION['articles'] as $article) : ?>
    <?php if ($article['genre'] == $_GET['genre']) : ?>
        <div class="card-title">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bgc">
                <div class="col p-4 d-flex flex-column position-static ">
                    <strong class="d-inline-block mb-2 text-primary"><?php echo $article['genre'] ?></strong>
                    <h3 class="mb-0"><?php echo substr($article['title'], 0, 70) ?></h3>
                    <div class="mb-1 text-muted"><?php echo $article['date'] ?></div>
                    <p class="card-text mb-auto"><?php echo substr($article['description'], 0, 120) ?></p>
                    <a href="vendor/postNewsId.php?id=<?php echo $article['id'] ?>" class="stretched-link">Продовжити читання →</a>
                </div>
                <div class="col-auto d-none d-lg-block img">
                    <img src="<?php echo $article['photo'] ?>" class="img-thumbnail" width="200px" height="250" alt="photo news">
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
        </div>     
    </div>
    <?php require "block/footer.php" ?>
</body>

</html>