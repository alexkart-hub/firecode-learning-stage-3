<?php 
class Db
{
    static private $instance = null;

    private function __construct() {} 
    private function __clone() {} 
    static public function getInstance()
    {
        if(self::$instance == null){
         $param = require_once 'config/configDb.php';  
          self::$instance = new Mysqli(
                $param['host'],
                $param['user'],
                $param['password'],
                $param['db_name']
               ); 
        }
        return self::$instance;
    }
    
}