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
  <title>Add News</title>
</head>

<body>
  <?php require "block/header.php" ?>
  <div class="container mt-5">
    <form class="needs-validation" novalidate="" method="post" enctype="multipart/form-data" action="vendor/added.php">
      <div class="row g-3">
        <div class="col-12">
          <label for="title" class="form-label">Заголовок новини</label>
          <div class="input-group has-validation">
            <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок" required="">
          </div>
        </div>
        <div class="col-12">
          <label for="genre" class="form-label">Жанр новини</label>
          <select id="genre" name="genre" size="2">
            <option value="World">Новини світу</option>
            <option value="Technology">Технології</option>
            <option value="Desing">Дизайн</option>
            <option value="Business">Бізнес</option>
            <option value="Politics">Політика</option>
            <option value="Science">Наука</option>
            <option value="Culture">Культура</option>
            <option value="Style">Стиль</option>
            <option value="Travel">Подорожі</option>
          </select>
          <input type="button" name="genre" id="genre" value="Обрати">
        </div>
        <div class="col-12">
          <label for="date" class="form-label">Введіть дату</span></label>
          <input type="date" name="date" class="form-control" id="date" placeholder="">
        </div>
        <div class="col-md-3 m-20">
          <label for="photo" class="form-label">Додайте фото</label>
          <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control " name="photo" id="photo" placeholder="" required="">
        </div>
      </div>
      <div class="col-md-6">
        <label for="decsription" class="form-label">News</label>
        <textarea type="text" name="description" rows="5" class="form-control" placeholder="Опишіть новину"></textarea>
      </div>
      <br>
      <button class="w-100 mb-4 btn btn-primary btn-lg" type="submit">Додати новину</button><br>
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