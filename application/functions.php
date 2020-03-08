<?php 
function debug($data){
    echo "<pre>"; 
    // var_dump($data);
    print_r($data);
    echo "</pre>";
}

$db = DbMysqli::GetInstance();