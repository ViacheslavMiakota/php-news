<?php

require_once './../controllers/connect.php';
$db = new Database();

// Виконуємо запит до бази даних, щоб отримати статті
$query = "SELECT * FROM articles";
$stmt = $db->prepare($query);
$stmt->execute();

$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
 <?php 
 $title = 'News ' . $_GET['genre'];
 require "./../block/header.php"; ?>
    <div class="container mt-5 mb-5">
        <h3 class="title-news">News <?php echo $_GET['genre']; ?></h3>
        <?php require "./../block/genre.php"; ?>
        <div class="container mt-5"> 
        <?php require "./../block/message.php" ?>
        <div class="card-news">
        <?php foreach ($articles as $article) : ?>
            <?php if ($article['genre'] == $_GET['genre']) : ?>
            <?php require "./../block/cardNews.php" ?> 
            <?php endif; ?>
        <?php endforeach; ?>
        </div>     
    </div>    
    </div>
    <?php require "./../block/footer.php"; ?>
</body>

</html>