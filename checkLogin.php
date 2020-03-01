<?php 
require_once "application/autoload.php";
if(!empty($_POST['login'])){
    if(User::IsUserExist($_POST['login'])){
        echo "Такой пользователь уже есть. Будет изменен пароль пользователя.";
    } else {
        echo "";
    }
}