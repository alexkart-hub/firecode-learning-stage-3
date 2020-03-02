<?php
class Model_Main extends Model
{
    public function getData()
    {
        $data = Db::GetColors();
        // debug($data);
        return $data;
    }
}
