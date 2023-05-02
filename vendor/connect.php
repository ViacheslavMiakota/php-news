<?php

$connect = new \MySQLi( 'localhost:8989', 'root', 'password', 'register-bd');
if(!$connect){
    die('Error connect to DataBase'); 
}



