<?php
require_once 'application/autoload.php';
if (!empty($_POST['login']) && !empty($_POST['password'])) {
        if (!User::IsUserExist($_POST['login'])) {
            User::CreateUser($_POST['login'], $_POST['password']);
        } else {
            if($_POST['login'] == $_COOKIE['login']){
                User::SessionStop();
            }
            User::UpdateUser($_POST['login'], $_POST['password']);
        }
}
header("Location: admin");
