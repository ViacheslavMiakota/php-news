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
        <div class="blog-login">
            <p style="vertical-align: inherit;">Якщо ви уже зареєстровані? </p>
            <a class="p-2 text-dark" href="/index.php?page=postLogIn">Увійти</a>
        </div>
    </div>
    <?php require "./application/block/up_btn.php" ?>
    <?php require "./../block/footer.php" ?>
</body>

</html>