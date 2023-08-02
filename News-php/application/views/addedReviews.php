<?php
session_start();
?>

<body>
  <?php
  $title = 'Add News';
  require "./../block/header.php" ?>
  <div class="container mt-5 mb-5">
    <?php require "./../block/message.php" ?>
    <div class="d-flex">
      <?php require "./../form/formAddedReviews.php" ?>
    </div>

  </div>
  <?php require "./../block/footer.php" ?>
</body>

</html>