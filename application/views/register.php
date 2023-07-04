<?php

session_start();
?>

<body>
    <?php
    $title = 'Реєстрація';
    require "./../block/header.php" ?>
    <div class="container mt-5 mb-5">
    <?php require "./../block/message.php" ?>
        <h3>Реєстрація</h3>
        <?php require "./../form/formRegister.php" ?>  
    </div>
    <?php require "./../block/footer.php" ?>
</body>

</html>