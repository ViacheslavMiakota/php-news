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
  <title>Add News</title>
</head>

<body>
  <?php require "block/header.php" ?>
  <div class="container mt-5">
  <div class="d-flex">
    <form class="needs-validation" method="post"action="vendor/addedReviews.php">
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
      </div>
      <?php 
                     if (isset($_SESSION['message'])) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';
                        unset($_SESSION['message']);
                    }
                ?>
  </div>
  <?php require "block/footer.php" ?>
</body>

</html>