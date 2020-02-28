<?php 
ini_set('display_errors', 1);
require_once 'application/bootstrap.php';
// print_r(Db::getInstance());
// $db = Db::getInstance();
// $param = require_once 'config/configDb.php';
//          $db = new Mysqli(
//              $param['host'],
//              $param['user'],
//              $param['password'],
//              $param['db_name']
//             ); 
// $db->query("INSERT INTO users (login, password) VALUES ('admin','555')");

// print_r(Db::InsertData(""));
// Db::getInstance();
echo "<pre>"; 
print_r(User::GetAllUsers());
echo "</pre>";