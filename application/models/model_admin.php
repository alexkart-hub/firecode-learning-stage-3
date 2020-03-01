<?php 
class Model_Admin extends Model
{
    public function getData()
    {
        $data = User::GetAllUsers();
         $data += Db::GetColors();
         $data += Db::GetSetting();
        debug($data);
        return $data;
    }
}