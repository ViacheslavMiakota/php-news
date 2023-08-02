<?php

session_start();
?>

<body>
  <?php
  $title = 'Add News';
  require "./../block/header.php" ?>
  <div class="container mt-5 mb-5">
    <?php require "./../block/message.php" ?>
    <?php require "./../form/formAddedNews.php" ?>

  </div>
  <?php require "./../block/footer.php" ?>
</body>

</html>