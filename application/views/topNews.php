
<body>
    <?php
    $title = 'News today';
    require "./application/block/header.php" ?>
    <div class="container mt-5 mb-5">
        <h3 class="title-news">News today</h3>
        <?php require "./application/block/genre.php" ?>
        <div class="card-news">
            <?php foreach ($articles as $article) : ?>
                <?php require "./application/block/cardNews.php" ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php require "./application/block/up_btn.php" ?>
    <?php require "./application/block/footer.php" ?>
</body>

</html>


