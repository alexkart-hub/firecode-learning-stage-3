<?php 
class Request
{
    static public function GetAll(Db $db)
    {
        $result = $db->ExecuteQuery("SELECT * FROM requests");
        if ($result->num_rows > 0) {
            $num_row = 1;
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $value) {
                    if ($key == 'text_request') {
                        $value = json_decode($value, true);
                    }
                    if ($key == 'date_birth' || $key == 'date_request') {
                        $date = new DateTime($value);
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
    static public function Save($data, Db $db)
    {
        $city_destination = $data['city_destination'];
        $date_birth = $data['date_birth'];
        $phone_number = $data['phone_number'];
        $text_request = json_encode($data['text_request'], JSON_UNESCAPED_UNICODE);
        $date_request = $data['date_request'];
        $user_ip = $data['user_ip'];

        $result = $db->ExecuteQuery("INSERT INTO requests (city_destination,date_birth,phone_number,text_request,date_request,user_ip) VALUES ('$city_destination', '$date_birth', '$phone_number', '$text_request', '$date_request', '$user_ip' )");

        return $result;
    }
    static public function Delete($id,Db $db)
    {
        $result = $db->ExecuteQuery("DELETE FROM requests WHERE request_id = '$id'");
        return $result;
    }
}