<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/application/autoload.php';
if(!empty($_POST['login'])){
    if(User::IsUserExist($_POST['login'])){
        echo "Такой пользователь уже есть. Будет изменен пароль пользователя.";
    } else {
        echo "";
    }
}