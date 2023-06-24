<?php 
session_start();
unset($_SESSION['user']);
unset($_SESSION['userId']);
header('Location: /index.php?page=postNews');
