<?php

session_start();
$article = isset($_SESSION['article']) ? $_SESSION['article'] : array(); // Get session data

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
  </div>
  <?php require "./../block/up_btn.php" ?>
  <?php require "./../block/footer.php" ?>

  <script>
    function showReviewForm() {
      document.getElementById("review-form").classList.toggle("d-none");
    }
  </script>
</body>

</html>