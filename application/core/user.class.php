<?php 
class User
{
    static public function GetAllUsers()
    {
        $db = Db::getInstance();
        $result = $db->query("SELECT * FROM users"); 
        if ($result->num_rows > 0) {
            $num_row = 0;
            while ($row = $result->fetch_assoc()) {
                $num_row++;
                foreach($row as $key=>$vol){
                    $users_data[$num_row][$key] = $vol;
                }
            }
            $result->free();
            return $users_data;
        } else {
            return false;
        }
    }
} 