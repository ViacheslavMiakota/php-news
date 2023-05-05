<?php 
session_start();
unset($_SESSION['user']);
header('Location: postNews.php');
unset($_SESSION['userId']);