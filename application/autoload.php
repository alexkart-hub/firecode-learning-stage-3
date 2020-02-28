<?php 
require_once 'application/functions.php';

function autoload($class_name){
    $fileClassPath = "application/core/".$class_name.".php";
    if(file_exists($fileClassPath)){
        require_once("core/".$class_name.".php");
    } else {
        require_once("core/".$class_name.".class.php");
    }
    
}
spl_autoload_register('autoload');