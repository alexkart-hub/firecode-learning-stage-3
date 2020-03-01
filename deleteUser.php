<?php 
require_once 'application/autoload.php';
$login = User::GetUserById(substr($_POST['id'],2))['login'];
User::DeleteUser($login);
header("Location: admin");