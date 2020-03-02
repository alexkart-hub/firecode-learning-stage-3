<?php
require_once 'application/autoload.php';
$id = $_POST['id'];
if (substr($id, 0, 1) == 'd') {
    $login = User::GetUserById(substr($id, 2))['login'];
    User::DeleteUser($login);
} elseif(substr($id,0,1) == 'c') {
     Db::DeleteColor($id);
} elseif(substr($id,0,1) == 'r') {
    Db::DeleteRequest(substr($id,2));
    echo substr($id,2);
}
// header("Location: admin");
