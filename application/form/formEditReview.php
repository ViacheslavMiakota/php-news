<?php

require_once './../models/reviewsModel.php';

$reviewUser = '';
$articleId = $_SESSION['article']['id'];

try {
    $reviewModel = new Review($db);
    $reviews = $reviewModel->getReviewsByArticleId($articleId);

    if (!empty($reviews)) {
        $reviewUser = isset($reviews[0]['reviewUser']) ? $reviews[0]['reviewUser'] : '';
    }
} catch (PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewUser = $_POST['reviewUser'];
    $reviewId = $_POST['reviewId'];

    $result = $reviewModel->updateReviewById($reviewId, $reviewUser);

    if ($result) {
        $_SESSION['message'] = "Коментар успішно змінено";
    } else {
        $_SESSION['message'] = "Помилка: не вдалося змінити коментар";
    }

    header("Location: /application/views/cardNews.php");
    exit();
}
?>

<form class="needs-validation" method="post" action="/application/controllers/editReview.php">
    <div class="row g-3">
        <div class="col-12">
            <label for="title" class="form-label">Заголовок</label>
            <h4><?= $_SESSION['article']['title'] ?></h4>
            <label for="title" class="form-label">Ім'я користувача</label>
            <h4><?= $_SESSION['user']['name'] ?></h4>
        </div>
    </div>
    <div class="form-group">
        <label for="reviewUser" class="form-label">Виправте свій коментар</label>
        <textarea name="reviewUser" id="reviewUser" rows="3" class="form-control"><?= $reviewUser ?></textarea>
        <input type="hidden" name="reviewId" value="<?= $reviews[0]['id'] ?>">
    </div>
    <br>
    <button class="w-100 mb-4 btn btn-primary btn-lg" type="submit">Змінити коментар</button><br>
</form>
