<?php 
class Model_Admin extends Model
{
    public function getData()
    {
        $data = User::GetAllUsers();
         $data += Db::GetColors();
        // debug($data);
        return $data;
    }
}