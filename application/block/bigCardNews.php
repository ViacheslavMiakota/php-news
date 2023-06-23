<?php

require_once '../models/newsModel.php';
require_once '../models/usersModel.php'; 

?>

<div class="row p-5 g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bgc">
      
    <div class="col-auto d-none d-lg-block img-card">
        <img src="./../../<?= $_SESSION['article']['photo'] ?>" class="img-thumbnail" width="100%" alt="photo news">
    </div>

    <div class="col p-4 d-flex flex-column">
        <strong class="d-inline-block mb-2 text-primary"><?= $_SESSION['article']['genre'] ?></strong>
        <h3 class="mb-0"><?= $_SESSION['article']['title'] ?></h3>
        <div class="mb-1 text-muted"><?= $_SESSION['article']['date'] ?></div>
        <p class="card-text mb-auto"><?= $_SESSION['article']['description'] ?></p>
      
        <?php if (isset($_SESSION['user']['id'])) : ?>
            <a href="/application/views/addedReviews.php">Залишити відгук</a>
        <?php else : ?>
            <p class="mes-err">Якщо хочете залишити коментар, спочатку увійдіть до свого акаунту.</p>
        <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['user']['role']) && ($_SESSION['user']['role'] == 'admin' || $_SESSION['user']['id'] == $_SESSION['article']['userId'])) : ?>
        <a href="/application/controllers/deleteNews.php" class="btn btn-danger">Видалити новину</a>
    <?php endif; ?>

    <?php require "./../block/message.php" ?> 
</div>
