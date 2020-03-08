<?php
require_once 'application/autoload.php';
$id = $_POST['id'];
if (substr($id, 0, 1) == 'd') {
    $login = User::GetUserById(substr($id, 2))['login'];
    User::DeleteUser($login);
} elseif(substr($id,0,1) == 'c') {
     Color::Delete($id,$db);
} elseif(substr($id,0,1) == 'r') {
    Request::Delete(substr($id,2),$db);
    echo substr($id,2);
}
// header("Location: admin");
