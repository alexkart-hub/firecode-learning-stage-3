<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/application/autoload.php';
echo User::GetUserById(substr($_POST['id'],2))['login'];
    