<?php

$connect = new mysqli( 'localhost:8989', 'root', 'password', 'register-bd');
if(!$connect){
    die('Error connect to DataBase'); 
}



