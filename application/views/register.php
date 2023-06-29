<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Реєстрація</title>
</head>

<body>
    <?php require "./../block/header.php" ?>
    <div class="container mt-5 mb-5">
    <?php require "./../block/message.php" ?>
        <h3>Реєстрація</h3>
        <?php require "./../form/formRegister.php" ?>  
    </div>
    <?php require "./../block/footer.php" ?>
</body>

</html>