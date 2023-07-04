<?php

session_start();
require_once './../controllers/connect.php';
require_once './../models/newsModel.php';
require_once './../models/usersModel.php';
$article = isset($_SESSION['article']) ? $_SESSION['article'] : array(); // Отримати дані з сесії]

?>

<body>
  <?php
  $title = $article['genre'];
  require "./../block/header.php" ?>
    <div class="container mt-5 mb-5">  
    <?php require "./../block/bigCardNews.php" ?>
      <div class="row p-5 g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative bgc">
      <h3>Коментарі</h3>
      <?php require "./../block/review.php" ?>
      </div>
  <?php require "./../block/footer.php" ?>

<script> function showReviewForm() { document.getElementById("review-form").classList.toggle("d-none") ; } </script> 
</body>
</html>

