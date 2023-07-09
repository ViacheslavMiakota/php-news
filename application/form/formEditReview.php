<?php

use controllers\connect\Database;

require_once './../models/reviewsModel.php';
require_once './../controllers/connect.php';

$reviewUser = '';
$articleId = $_SESSION['article']['id'];

$db = new Database();

try {
    $reviewModel = new models\Review($db);
    $reviews = $reviewModel->getReviewsForArticle($articleId);
if (!empty($reviews)) {
    $reviewUser = isset($reviews[0]['reviewUser']) ? $reviews[0]['reviewUser'] : '';
    if (!empty($reviews)) {
        foreach ($reviews as $review) {
            if ($review['id'] == $_GET['reviewId']) {
                $reviewUser = $review['reviewUser'];
                break;
            }
        }
    }
}
} catch (\PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
    die();
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewUser = $_POST['reviewUser'];
    $reviewId = $_POST['reviewId'];

    $result = $reviewModel->updateReviewById($reviewId, $reviewUser);
}
?>

<form class="needs-validation" method="post" action="/index.php?page=editReview&reviewId=<?= $_GET['reviewId'] ?>">
    <div class="row g-3">
        <div class="col-12">
            <label for="title" class="form-label">Заголовок</label>
            <h4><?= $_SESSION['article']['title'] ?></h4>
        </div>
    </div>
    <div class="form-group">
        <label for="reviewUser" class="form-label">Виправте свій коментар</label>
        <textarea name="reviewUser" id="reviewUser" rows="3" class="form-control"><?= $reviewUser ?></textarea>
        <input type="hidden" name="reviewId" value="<?= $_GET['reviewId'] ?>">
    </div>
    <br>
    <button class="w-100 mb-4 btn btn-primary btn-lg" type="submit">Змінити коментар</button><br>
</form>
