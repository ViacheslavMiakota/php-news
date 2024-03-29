<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use controllers\Database\Database;
use models\Review\Review;

$db = new Database();

$reviewsModel = new Review($db);
$articleId = $_SESSION['articleId'];
$reviews = $reviewsModel->getReviewsForArticle($articleId);

$isAdmin = isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin';
?>

<div class="box-review">
    <?php if (!empty($reviews)) : ?>
        <?php foreach ($reviews as $row) : ?>

            <div class="card-review">
                <p><?= $row['name'] ?></p>
                <p class="card-text mb-auto"><?= $row['reviewUser'] ?></p>
                <?php if ($isAdmin || (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] === $row['userId'])) : ?>
                    <form method="post" action="/index.php?page=deleteReview">
                        <input type="hidden" name="reviewId" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-danger">Видалити коментар</button>
                    </form>
                    <a href="/application/views/editReview.php?reviewId=<?= $row['id'] ?>" class="btn btn-primary">Редагувати</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div>
            <p class="card-text mb-auto">Ще немає відгуків</p>
        </div>
    <?php endif; ?>
</div>