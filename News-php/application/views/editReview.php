<?php
session_start();
?>

<body>
    <?php
    $title = 'Edit Review';
    require "./../block/header.php" ?>
    <div class="container mt-5 mb-5">
        <div class="d-flex">
            <?php require "./../form/formEditReview.php" ?>
        </div>
        <?php require "./../block/message.php" ?>
    </div>
    <?php require "./../block/footer.php" ?>
</body>

</html>