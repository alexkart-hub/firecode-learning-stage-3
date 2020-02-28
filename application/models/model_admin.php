<?php 
class Model_Admin extends Model
{
    public function getData()
    {
        return User::GetAllUsers();
    }
}