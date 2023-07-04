<?php

require_once './application/models/usersModel.php';
require_once './application/models/newsModel.php';
$db = new Database();
$newsModel = new News($db);

$title = isset($_POST['title']) ? $_POST['title'] : '';
$description = isset($_POST['description']) ? $_POST['description'] : '';
$genre = isset($_POST['genre']) ? $_POST['genre'] : '';
$date = isset($_POST['date']) ? $_POST['date'] : '';
$photo = isset($_POST['photo']) ? $_POST['photo'] : '';

$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;

$path = 'uploads/' . time() . '_' . $_FILES['photo']['name'];

if (!move_uploaded_file($_FILES['photo']['tmp_name'], './' . $path)) {
    $_SESSION['message'] = 'Помилка завантаження фото';
    header('Location: /index.php?page=postAddedNews');
    exit();
}

if (trim($title) == '') {
    $_SESSION['message'] = 'Введіть заголовок новини';
    header('Location: /index.php?page=postAddedNews');
    exit();
}

if (trim($description) == '') {
    $_SESSION['message'] = 'Введіть опис новини';
    header('Location: /index.php?page=postAddedNews');
    exit();
}

if ($newsModel->checkDuplicateArticle($title, $date)) {
    $_SESSION['message'] = 'Новина під такою назвою сьогодні вже є. Перевірте назву та заповніть знову';
    header('Location: /index.php?page=postAddedNews');
    exit();
}

$sql = "INSERT INTO `articles` (`title`, `description`, `genre`, `date`, `photo`, `userId`) VALUES (:title, :description, :genre, :date, :path, :userId)";
$result = $db->prepare($sql);
$result->execute([
    'title' => $title,
    'description' => $description,
    'genre' => $genre,
    'date' => $date,
    'path' => $path,
    'userId' => $userId
]);

$_SESSION['message'] = 'Новину додано';
header('Location: /index.php?page=postMyNews');
exit();



