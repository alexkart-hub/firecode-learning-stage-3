<?php
class Db
{
    static private $instance = null;

    private function __construct()
    {
    }
    private function __clone()
    {
    }
    static public function getInstance()
    {
        if (self::$instance == null) {
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

    static public function ExecuteQuery($query)
    {
        $db = self::getInstance();
        $result = $db->query($query);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    static public function GetColors()
    {
        $result = self::ExecuteQuery("SELECT color_variants FROM settings");
        $result = $result->fetch_assoc();
        return json_decode($result['color_variants'], true);
    }

    static public function DeleteColor($number)
    {
        $result = self::GetColors();
        $counter = 0;
        foreach ($result as $key => $value) {
            if ($key != $number) {
                $newColorVariants["color" . ++$counter] = $value;
            }
        }
        $newColorVariants = json_encode($newColorVariants, JSON_UNESCAPED_UNICODE);
        self::ExecuteQuery("UPDATE settings SET color_variants = '$newColorVariants'");
    }
    static public function AddColor($color)
    {
        $colorVariants = self::GetColors();
        $countColors = count($colorVariants);
        $colorVariants['color' . ($countColors + 1)] = $color;
        $colorVariants = json_encode($colorVariants, JSON_UNESCAPED_UNICODE);
        self::ExecuteQuery("UPDATE settings SET color_variants = '$colorVariants' WHERE setting_id = 1");
    }

    static public function GetSetting()
    {
        $result = self::ExecuteQuery("SELECT * FROM settings WHERE setting_id = 1");
        $result = $result->fetch_assoc();
        foreach ($result as $key => $value) {
            if ($key != 'color_variants') {
                $data[$key] = $value;
            }
        }
        return $data;
    }

    static public function SetSetting($data)
    {
        foreach($data as $key => $value) {
            if(substr($key,0,5) == 'color'){
                $color_variants[$key] = $value;
            } elseif(substr($key,0,5) == 'price') {
            self::ExecuteQuery("UPDATE settings SET $key = '$value' WHERE setting_id = 1");
            }
        }
    }
}
