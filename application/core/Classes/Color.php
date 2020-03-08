<?php 
class Color
{
    static public function GetAll(Db $db)
    {
        $result = $db->ExecuteQuery("SELECT color_variants FROM settings");
        $result = $result->fetch_assoc();
        return json_decode($result['color_variants'], true);
    }
    
    static public function Delete($number, Db $db)
    {
        $result = self::GetAll($db);
        $counter = 0;
        foreach ($result as $key => $value) {
            if ($key != $number) {
                $newColorVariants["color" . ++$counter] = $value;
            }
        }
        $newColorVariants = json_encode($newColorVariants, JSON_UNESCAPED_UNICODE);
        $db->ExecuteQuery("UPDATE settings SET color_variants = '$newColorVariants'");
    }
    
    static public function Add($color, Db $db)
    {
        $colorVariants = self::GetAll($db);
        $countColors = count($colorVariants);
        $colorVariants['color' . ($countColors + 1)] = $color;
        $colorVariants = json_encode($colorVariants, JSON_UNESCAPED_UNICODE);
        $db->ExecuteQuery("UPDATE settings SET color_variants = '$colorVariants' WHERE setting_id = 1");
    }
}