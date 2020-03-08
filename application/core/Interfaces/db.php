<?php 
interface Db
{
     static public function GetInstance();
     public function Connect();
     public function ExecuteQuery($query);
}