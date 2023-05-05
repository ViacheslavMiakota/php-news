<?php
session_start();

if ($_SESSION['user']){
    header('Location: vendor/postNews.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <?php require "block/header.php" ?>
    <div class="container mt-5 mb-5">
        <h3>Вхід</h3>
        <form action="vendor/singIn.php" method="post">
            <input type="email" name="login" placeholder="Введіть email" class="form-control"><br>
            <input type="pass" name="pass" placeholder="Введіть пароль" class="form-control"><br>
            <button type="submit" class="btn btn-success">Увійти</button>
            <div class="blog-login">
            
        </form>
        <p style="vertical-align: inherit;">Якщо ви не зареєстровані? </p>
            <a class="p-2 text-dark" href="/register.php">Зареєструватись</a>
            </div>
                <?php 
                     if (isset($_SESSION['message'])) {
                        echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';
                        unset($_SESSION['message']);
                    }
                ?>
    </div>
    <?php require "block/footer.php" ?>
</body>

</html>