<?php
require_once 'application/autoload.php';
if (isset($_POST['submit_auth'])) {
    if (!empty($_POST['login']) && !empty($_POST['password'])) {
        if (User::IsUserExist($_POST['login'])) {
            if (User::CheckPassword($_POST['login'],$_POST['password'])) {
                User::SessionStart($_POST['login']);
                header('Location: admin');
                die();
            }
        }
    }
    header('Location: auth');
}
