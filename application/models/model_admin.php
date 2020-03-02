<?php 
class Model_Admin extends Model
{
    public function getData()
    {
        $data = User::GetAllUsers();
         $data += Db::GetColors();
         $data += Db::GetSetting();
         $data += Db::GetRequests() == null ? [] : Db::GetRequests();
        // debug($data);
        return $data;
    }
}