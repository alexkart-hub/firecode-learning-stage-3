<?php 
$root = $_SERVER['DOCUMENT_ROOT'].'/application/core/';


function autoload($class_name){
    global $root;
    $fileClassPath = $root.$class_name.".php";
    if(file_exists($fileClassPath)){
        require_once($fileClassPath);
    } else {
        $fileClassPath1 = $root.'/Classes/'.$class_name.".php";
        $fileClassPath2 = $root.'/Interfaces/'.$class_name.".php";
        $fileClassPath3 = $root.'/Traites/'.$class_name.".php";
        if(file_exists($fileClassPath1)){
            $fileClassPath = $fileClassPath1;
        }
        if(file_exists($fileClassPath2)){
            $fileClassPath = $fileClassPath2;
        }
        if(file_exists($fileClassPath3)){
            $fileClassPath = $fileClassPath3;
        }
        require_once($fileClassPath);
    }
}
spl_autoload_register('autoload');

require_once $_SERVER['DOCUMENT_ROOT'].'/application/functions.php';