<?php
class Model_Main extends Model
{
    public function getData()
    {
        $data = Color::GetAll(DbMysqli::GetInstance());
        // debug($data);
        return $data;
    }
}
