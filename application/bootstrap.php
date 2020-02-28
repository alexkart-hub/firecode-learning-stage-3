<?php 
function autoload($class_name){
    
    require_once("core/".$class_name.".php");
}
spl_autoload_register('autoload');

Route::start(); // запускаем маршрутизатор