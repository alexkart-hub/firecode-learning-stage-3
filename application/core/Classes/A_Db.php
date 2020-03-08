<?php 
class A_Db
{
    protected $connect;

    private function __clone()
    {
        
    }

    public function Connect()
    {
        return $this->connect;
    }

    public function ExecuteQuery($query)
    {
        $result = $this->connect->query($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}