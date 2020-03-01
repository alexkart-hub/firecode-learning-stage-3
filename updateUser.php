<?php 
require_once 'application/autoload.php';
echo User::GetUserById(substr($_POST['id'],2))['login'];
    