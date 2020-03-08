<?php
require_once "application/autoload.php";
if (!empty($_POST)) {

    if (!empty($_POST['text'])) {
        $text = $_POST['text'];
    }
    $date = new DateTime($_POST['date_birth']);
    $data = [
        'city_destination' => $_POST['city'],
        'date_birth' => $date->format('Y-m-d'),
        'phone_number' => $_POST['phone'],
        'text_request' => $text,
        'date_request' => date('Y-m-d H:i:s'),
        'user_ip' => $_SERVER['REMOTE_ADDR']
    ];
    // debug($text);
    // debug(DB::SaveRequest($data));
    if (Request::Save($data,$db)) {
        $to  = "<mail@example.com>";
        // $to .= "<mail2@example.com>";

        $subject = "Поступила новая заявка";
        $message = "";
        foreach($data as $key => $value){
            switch($key){
                case 'city_destination' : $message .= "Город доставки ".$value."\r\n"; break;
                case 'date_birth' :
                    $date = new DateTime($value);
                     $message .= "Дата рождения  ".$date->format('d-m-Y')."\r\n"; 
                    break;
                case 'phone_number' : $message .= "Номер телефона ".$value."\r\n"; break;
                case 'date_request' : 
                    $date = new DateTime($value);
                    $message .= "Дата заявки ".$date->format('H:i:s d-m-Y')."\r\n"; 
                break;
                case 'user_ip' : $message .= "ip-адрес заказчика ".$value."\r\n"; break;
                case 'text_request' : 
                    $message .= "Содержание заявки:\r\n ";
                    foreach($value as $k => $v){
                        $message .= $v[0].$v[1]."\r\n";
                    } 
                break;
            }
        }
        
        // $message = htmlspecialchars($message);
        $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
        $headers .= "From: От кого письмо <from@example.com>\r\n";
        $headers .= "Reply-To: reply-to@example.com\r\n";

        mail($to, $subject, $message, $headers);
    }
}
