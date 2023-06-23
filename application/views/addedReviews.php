<?php

session_start();
require_once './../models/newsModel.php';
require_once './../models/usersModel.php';
require_once './../models/reviewsModel.php';

?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../../css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title>Add News</title>
</head>

<body>
  <?php require "./../block/header.php" ?>
  <div class="container mt-5">
    <div class="d-flex">
      <?php require "./../form/formAddedReviews.php" ?> 
    </div>
      <?php require "./../block/message.php" ?>
  </div>
  <?php require "./../block/footer.php" ?>
</body>

</html>