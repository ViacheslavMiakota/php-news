<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Реєстрація</title>
</head>

<body>
    <?php require "block/header.php" ?>
    <div class="container mt-5 mb-5">
        <h3>Реєстрація</h3>
        <form action="vendor/singUp.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name" id="name" placeholder="Введіть Ваше Ім'я" class="form-control"><br>
            <label for="">Зображення</label>
            <input type="file" name="avatar" id="avatar" class="form-control"><br>
            <input type="email" name="login" id="login"  placeholder="Введіть email" class="form-control"><br>
            <input type="pass" name="pass" placeholder="Введіть пароль" class="form-control"><br>
            <input type="pass" name="pass_confirm" placeholder="Введіть пароль ще раз" class="form-control"><br>
            <select name="role" id="role" class="form-control">
                <option value="user">Користувач</option>
                <option value="admin">Адміністратор</option>
            </select>
            <button type="submit" name="send" href="/login.php" class="btn btn-success">Зареєструватись</button>
            <div class="blog-login">
            <p style="vertical-align: inherit;">Якщо ви уже зареєстровані? </p>
            <a class="p-2 text-dark" href="/login.php">Увійти</a>
            </div>
            <?php 
                if (isset($_SESSION['message'])) {
                    echo '<p class="msg"> ' . $_SESSION['message'] . '</p>';
                    unset($_SESSION['message']);
                }
            ?>
        </form>
    </div>
    <?php require "block/footer.php" ?>
</body>

</html>