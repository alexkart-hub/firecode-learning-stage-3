<?php 
class Settings
{
    static public function Get(Db $db)
    {
        $result = $db->ExecuteQuery("SELECT * FROM settings WHERE setting_id = 1");
        $result = $result->fetch_assoc();
        foreach ($result as $key => $value) {
            if ($key != 'color_variants') {
                $data[$key] = $value;
            }
        }
        return $data; 
    }

    static public function Save(array $data, Db $db)
    {
        extract($data);
        $db->ExecuteQuery("UPDATE settings SET price_ceiling = '$price_ceiling',price_lamp = '$price_lamp',price_chandelier = '$price_chandelier',price_pipe = '$price_pipe',price_corner = '$price_corner',price_glossy_texture = '$price_glossy_texture',price_matte_texture = '$price_matte_texture' WHERE setting_id = 1");
    }
}