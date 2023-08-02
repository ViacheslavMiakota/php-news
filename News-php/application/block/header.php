<?php
if (session_status() == PHP_SESSION_NONE) {
}
if (!isset($_SESSION['user'])) {
  $_SESSION['user'] = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <title><?php echo $title ?></title>
  <link rel="stylesheet" href="./../../css/normalize.css">
  <link rel="stylesheet" href="./../../css/style.css">
</head>

<body>
  <header class="box-header">
    <div class="title-header">
      <div>
        <button type="button" class="title-header link" data-modal-open>
          Підпишіться
        </button>
      </div>
    </div>
    <div class="title-header">
      <a class="link" href="/index.php?page=postNews">Головна</a>
      <a class="link" href="#" aria-label="Пошук">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
          <title>Search</title>
          <circle cx="10.5" cy="10.5" r="7.5"></circle>
          <path d="M21 21l-5.2-5.2"></path>
        </svg>
      </a>
    </div>
    <div class="title-header">
      <?php
      if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
      ?>
        <a class="link" href="/index.php?page=postLogIn">
          <div>
            <p>Увійти</p>
          </div>
        </a>
      <?php } else { ?>
        <a class="link" href="/index.php?page=postMyNews">Moї новини</a>
      <?php } ?>
    </div>
    <div class="backdrop is-hidden" data-modal>
      <div class="modal">
        <button type="button" class="close-btn" data-modal-close>
          <svg class="icon-close">
            <use href="/img/close.svg#icon-close_40px"></use>
          </svg>
        </button>
        <h2 class="modal__title">Ваша підписка на розсилання новин</h2>
        <form action=" /index.php?page=postNews" method="post">
          <input type="text" name="name" id="name" placeholder="Введіть Ваше Ім'я" class="form-control"><br>
          <input type="email" name="login" placeholder="Введіть електронну адресу" class="form-control"><br>
          <button type="submit" class="btn btn-success btn-news">Підписатись</button>
        </form>
      </div>
    </div>
  </header>