<?php
// session_start();
require_once '../models/newsModel.php';
require_once '../models/usersModel.php'; 
?>

<form class="needs-validation" method="post" action="/application/controllers/addedReviews.php">
    <div class="row g-3">
        <div class="col-12">
        <label for="title" class="form-label">Заголовок</label>
        <h4><?=$_SESSION['article']['title'] ?></h4>
        <label for="title" class="form-label">Ім'я користувача</label>
        <h4><?=$_SESSION['user']['name'] ?></h4>
        </div>
    </div>
    <div class="form-group">
        <label for="reviewUser" class="form-label">Залиште свій коментар</label>
        <textarea type="text" name="reviewUser" rows="3" class="form-control" placeholder="Напишіть коментар"></textarea>
    </div>
    <br>
    <button class="w-100 mb-4 btn btn-primary btn-lg" type="submit">Додати коментар</button><br>
</form>  