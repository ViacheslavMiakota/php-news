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
        <div class="blog-login">
            <p="vertical-align: inherit;">Якщо ви не зареєстровані? </p>
            <a class="p-2 text-dark" href="/index.php?page=postRegister">Зареєструватись</a>
        </div>
    </div>
    <?php require "./../block/footer.php" ?>
</body>

</html>