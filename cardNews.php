<?php
session_start();
require_once 'vendor/connect.php';

if (isset($_SESSION['article']['id'])) {
  $articleId = $_SESSION['article']['id'];
} else {
  echo "Ідентифікатор статті не встановлено";
  exit;
}

if (!isset($_SESSION['userId'])) {
  $_SESSION['userId'] = $_SESSION['user']['id'];
}

$userResult = mysqli_query($connect, "SELECT role FROM users WHERE id = '{$_SESSION['userId']}'");
if ($userResult && mysqli_num_rows($userResult) > 0) {
  $user = mysqli_fetch_assoc($userResult);
  $role = isset($user['role']) ? $user['role'] : '';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title><?= $_SESSION['article']['title'] ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
 <?php require "block/header.php" ?>
    <div class="container mt-5">  
    <div class="row p-5 g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bgc">
      
      <div class="col-auto d-none d-lg-block img-card">
        <img src="<?= $_SESSION['article']['photo'] ?>" class="img-thumbnail" width="100%" alt="photo news">
      </div>
      <div class="col p-4 d-flex flex-column ">
        <strong class="d-inline-block mb-2 text-primary"><?= $_SESSION['article']['genre'] ?></strong>
        <h3 class="mb-0"><?=  $_SESSION['article']['title']; ?></h3>
        <div class="mb-1 text-muted"><?= $_SESSION['article']['date'] ?></div>
        <p class="card-text mb-auto"><?= $_SESSION['article']['description'] ?></p>
        
        <a href="/formAddedReviews.php"  >Залишити відгук</a>
      </div>
      <?php if (isset($_SESSION['userId'])) {
        if ($_SESSION['userId'] == $_SESSION['article']['userId'] || $role == 'admin') {
        echo '<a href="vendor/deleteNews.php" class="btn btn-danger">Видалити новину</a>';
        }
        }
      ?>
      <?php 
                     if (isset($_SESSION['message'])) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';
                        unset($_SESSION['message']);
                    }
                ?> 
  </div>
  <div class="row p-5 g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bgc">
    <h3>Коментарі</h3>
    <div class="box-review">
    <?php 
          $result = mysqli_query($connect, "SELECT * FROM `reviews` WHERE `articleId` = '$articleId'");
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<div class="card-review">
                  <p>' . $row['name'] . '</p>
                  <p class="card-text mb-auto">' . $row['reviewUser'] . '</p>';
                  if ($_SESSION['userId'] == $row['userId'] || $role == 'admin') {
                    echo '<form method="post" action="vendor/deleteReview.php">
                        <input type="hidden" name="reviewId" value="' . $row['id'] . '">
                        <button type="submit" class="btn btn-danger">Видалити коментар</button>
                    </form>
                    <a href="formEditReview.php?reviewId=' . $row['id'] . '" class="btn btn-primary">Редагувати</a>';
                  }
                  echo '</div>';
            }
          } else {
  echo '<div><p class="card-text mb-auto">Ще немає відгуків</p></div>';
}
?>
    </div>

</div>
    <?php require "block/footer.php" ?>
</body>
<script> function showReviewForm() { document.getElementById("review-form").classList.toggle("d-none") ; } </script> 
</html>