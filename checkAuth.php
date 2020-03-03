<?php
require_once "application/autoload.php";

if (isset($_POST['login']) && isset($_POST['password'])) {

    $login = $_POST['login'];
    $password = $_POST['password'];


    if (User::IsUserExist($login) && User::CheckPassword($login, $password)) {

        User::SessionStart($login);

        header('Location: admin');
    } else {
        echo "";
       
    }
}
