<?php

session_start();
?>

<body>
    <?php 
    $title = 'Login';
    require "./../block/header.php" ?>
        <div class="container mt-5 mb-5">
            <?php require "./../block/message.php" ?>
            <h3>Вхід</h3>
            <?php require "./../form/formLogin.php" ?>
            <p style="vertical-align: inherit;">Якщо ви не зареєстровані? </p>
            <a class="p-2 text-dark" href="./register.php">Зареєструватись</a>
        </div>
    <?php require "./../block/footer.php" ?>
</body>

</html>