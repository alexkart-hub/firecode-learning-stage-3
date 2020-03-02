<?php 
require_once "application/functions.php";
if(!empty($_POST['city'])){
    $data = [
        'city_destination'=> $_POST['city'],
        'date_birth'=> $_POST['date_birth'],
        'phone_number'=> $_POST['phone'],
        'text_request'=> $_POST['text'],
        'date_request'=> date('d-m-Y, H:i:s'),
        'user_ip'=> $_POST['user_ip']
    ];
    debug( $data['text_request']);
}
// header("Location: main");