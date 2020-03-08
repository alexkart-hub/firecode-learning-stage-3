<?php 
class Model_Admin extends Model
{
    public function getData()
    {
        $db = DbMysqli::GetInstance();

        $data = User::GetAllUsers();
         $data += Color::GetAll($db);
         $data += Settings::Get($db);
         $data += Request::GetAll($db) == null ? [] : Request::GetAll($db);
         $data['db'] = $db;
        // debug($data);
        return $data;
    }
}