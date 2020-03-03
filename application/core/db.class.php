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
        extract($data);
        self::ExecuteQuery("UPDATE settings SET price_ceiling = '$price_ceiling',price_lamp = '$price_lamp',price_chandelier = '$price_chandelier',price_pipe = '$price_pipe',price_corner = '$price_corner',price_glossy_texture = '$price_glossy_texture',price_matte_texture = '$price_matte_texture' WHERE setting_id = 1");
    }
    static public function GetRequests()
    {
        $result = self::ExecuteQuery("SELECT * FROM requests");
        if ($result->num_rows > 0) {
            $num_row = 1;
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $value) {
                    if ($key == 'text_request') {
                        $value = json_decode($value, true);
                    }
                    if ($key == 'date_birth' || $key == 'date_request') {
                        $date = new DateTime($_POST[$key]);
                        $value = $date->format($key == 'date_birth' ? 'd.m.Y' : 'H:i:s d.m.Y');
                    }

                    $requests['request' . $num_row][$key] = $value;
                }
                $num_row++;
            }
            $result->free();
            return $requests;
        } else {
            return false;
        }
    }
    static public function SaveRequest($data)
    {
        $city_destination = $data['city_destination'];
        $date_birth = $data['date_birth'];
        $phone_number = $data['phone_number'];
        $text_request = json_encode($data['text_request'], JSON_UNESCAPED_UNICODE);
        $date_request = $data['date_request'];
        $user_ip = $data['user_ip'];
        $request = "INSERT INTO requests (city_destination,date_birth,phone_number,text_request,date_request,user_ip) VALUES ('$city_destination', '$date_birth', '$phone_number', '$text_request', '$date_request', '$user_ip' )";
        return $request . "    " . self::ExecuteQuery($request);
    }
    static public function DeleteRequest($id)
    {
        self::ExecuteQuery("DELETE FROM requests WHERE request_id = '$id'");
    }
}
